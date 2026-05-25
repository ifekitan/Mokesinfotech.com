<?php
/*
|--------------------------------------------------------------------------
| DB Fix & Reset — DELETE THIS FILE after running
|--------------------------------------------------------------------------
| Upload to public_html/setup.php
| Visit https://mokesinfotech.com/setup.php
| IMPORTANT: Delete immediately after use.
*/

define('SETUP_TOKEN', 'mokesrepair2026');

$appRoot    = dirname(__DIR__); // /home/mokejclh
$token      = $_POST['token'] ?? $_GET['token'] ?? '';
$step       = $_POST['step']  ?? 'form';

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Mokes Infotech – DB Fix</title>
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:system-ui,sans-serif;background:#f3f4f6;color:#1f2937;padding:2rem}
  .box{max-width:600px;margin:auto;background:#fff;border-radius:12px;padding:2rem;box-shadow:0 2px 12px rgba(0,0,0,.08)}
  h1{font-size:1.4rem;font-weight:700;margin-bottom:1rem}
  label{display:block;font-size:.875rem;font-weight:600;margin-top:1rem;margin-bottom:.25rem}
  input{width:100%;padding:.6rem .85rem;border:1px solid #d1d5db;border-radius:8px;font-size:.875rem}
  button{margin-top:1.5rem;width:100%;padding:.85rem;background:#7c3aed;color:#fff;font-weight:700;border:none;border-radius:8px;cursor:pointer}
  pre{margin-top:1.5rem;background:#111;color:#eee;padding:1.25rem;border-radius:8px;font-size:.78rem;line-height:1.7;white-space:pre-wrap}
</style>
</head>
<body>
<div class="box">
<h1>🔧 Mokes Infotech – DB Fix &amp; Reset</h1>

<?php if ($step === 'form'): ?>
<form method="POST">
  <input type="hidden" name="step" value="run">
  <label>Token</label>
  <input type="text" name="token" placeholder="<?= SETUP_TOKEN ?>" required>
  <label>DB Host</label>
  <input type="text" name="db_host" value="localhost">
  <label>DB Name</label>
  <input type="text" name="db_name" placeholder="cpaneluser_dbname" required>
  <label>DB Username</label>
  <input type="text" name="db_user" placeholder="cpaneluser_dbuser" required>
  <label>DB Password</label>
  <input type="password" name="db_pass" required>
  <label>Email password for info@mokesinfotech.com</label>
  <input type="password" name="mail_pass">
  <button type="submit">▶ Fix DB &amp; Rebuild</button>
</form>

<?php elseif ($step === 'run'):

  @set_time_limit(300);

  if ($token !== SETUP_TOKEN) { die('<p style="color:red">Invalid token.</p>'); }

  $dbHost   = trim($_POST['db_host']  ?? 'localhost');
  $dbName   = trim($_POST['db_name']  ?? '');
  $dbUser   = trim($_POST['db_user']  ?? '');
  $dbPass   = $_POST['db_pass']       ?? '';
  $mailPass = $_POST['mail_pass']     ?? '';

  echo '<pre>';

  // Find PHP CLI
  $phpBin = null;
  foreach (['/usr/local/bin/php', '/usr/bin/php81', '/usr/bin/php'] as $p) {
      $o = []; $rc = 0;
      exec(escapeshellarg($p) . ' -r "echo 1;" 2>/dev/null', $o, $rc);
      if ($rc === 0 && implode('', $o) === '1') { $phpBin = $p; break; }
  }
  echo "PHP CLI : " . ($phpBin ?? 'NOT FOUND') . "\n";
  echo "App root: {$appRoot}\n\n";

  if (!$phpBin) { echo "✗ PHP CLI not found. Cannot continue.\n</pre>"; exit; }

  // Write fresh .env with MySQL
  $appKey = 'base64:' . base64_encode(random_bytes(32));
  $env = <<<ENV
APP_NAME="Mokes Infotech"
APP_ENV=production
APP_KEY={$appKey}
APP_DEBUG=false
APP_URL=https://mokesinfotech.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_MAINTENANCE_DRIVER=file
BCRYPT_ROUNDS=12

LOG_CHANNEL=single
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST={$dbHost}
DB_PORT=3306
DB_DATABASE={$dbName}
DB_USERNAME={$dbUser}
DB_PASSWORD={$dbPass}

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_PATH=/
SESSION_DOMAIN=.mokesinfotech.com

CACHE_STORE=file

MAIL_MAILER=smtp
MAIL_HOST=mail.mokesinfotech.com
MAIL_PORT=465
MAIL_USERNAME=info@mokesinfotech.com
MAIL_PASSWORD={$mailPass}
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=info@mokesinfotech.com
MAIL_FROM_NAME="Mokes Infotech"

FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

VITE_APP_NAME="Mokes Infotech"
ENV;
  file_put_contents($appRoot . '/.env', $env);
  echo "✓ .env written (DB_CONNECTION=mysql, DB_DATABASE={$dbName})\n\n";

  // Patch migration: remove composite index that exceeds MySQL key length limit
  $migFile = $appRoot . '/database/migrations/0001_01_01_000002_create_jobs_table.php';
  if (file_exists($migFile)) {
      $mig = file_get_contents($migFile);
      $mig = preg_replace('/\s*\$table->index\(\[.*?failed_at.*?\]\);/s', '', $mig);
      file_put_contents($migFile, $mig);
      echo "✓ Migration patched (removed oversized index)\n";
  }

  // Patch AppServiceProvider: ensure defaultStringLength(191)
  $asp = $appRoot . '/app/Providers/AppServiceProvider.php';
  if (file_exists($asp) && strpos(file_get_contents($asp), 'defaultStringLength') === false) {
      $content = file_get_contents($asp);
      $content = str_replace(
          'use Illuminate\Support\ServiceProvider;',
          "use Illuminate\Support\Facades\Schema;\nuse Illuminate\Support\ServiceProvider;",
          $content
      );
      $content = str_replace('public function boot(): void
    {
        //', "public function boot(): void\n    {\n        Schema::defaultStringLength(191);\n        //", $content);
      file_put_contents($asp, $content);
      echo "✓ AppServiceProvider patched (defaultStringLength 191)\n";
  }

  // Copy build assets to public/build/ (where Vite looks for manifest.json)
  $buildSrc = $appRoot . '/public_html/build';
  $buildDst = $appRoot . '/public/build';
  if (is_dir($buildSrc)) {
      @mkdir($buildDst, 0755, true);
      $iter = new RecursiveIteratorIterator(
          new RecursiveDirectoryIterator($buildSrc, FilesystemIterator::SKIP_DOTS),
          RecursiveIteratorIterator::SELF_FIRST
      );
      $bc = 0;
      foreach ($iter as $f) {
          $target = $buildDst . '/' . $iter->getSubPathname();
          if ($f->isDir()) { @mkdir($target, 0755, true); }
          else { if (@copy($f->getPathname(), $target)) $bc++; }
      }
      echo "✓ Build assets copied to public/build/ ({$bc} files)\n";
  } else {
      echo "✗ public_html/build/ not found — Vite assets missing\n";
  }

  // Clear stale bootstrap cache
  if (function_exists('opcache_reset')) opcache_reset();
  foreach (glob($appRoot . '/bootstrap/cache/*.php') ?: [] as $f) { @unlink($f); }
  echo "✓ Bootstrap cache cleared\n\n";

  // Run artisan commands
  $artisan = escapeshellarg($appRoot . '/artisan');
  foreach ([
      'migrate:fresh --force --seed',
      'config:cache',
      'route:cache',
      'view:cache',
  ] as $cmd) {
      echo "▶ php artisan {$cmd}\n";
      $out = []; $exit = 0;
      exec(escapeshellarg($phpBin) . " {$artisan} {$cmd} 2>&1", $out, $exit);
      echo implode("\n", $out) . "\n";
      echo ($exit === 0 ? "✓ Done\n" : "✗ Failed (exit {$exit})\n") . "\n";
      flush();
  }

  echo "=== Complete. DELETE this file now! ===\n</pre>";
  echo '<p style="margin-top:1rem"><a href="/">→ Open mokesinfotech.com</a></p>';

endif; ?>
</div>
</body>
</html>
