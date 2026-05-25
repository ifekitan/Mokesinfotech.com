<?php
/**
 * Mokes Infotech – Namecheap Shared Hosting Patcher
 * ──────────────────────────────────────────────────
 * Strategy: patch the existing Laravel install in the home directory.
 * The vendor/ directory there is kept (avoiding composer install).
 * Only app/, routes/, resources/, database/, config/ are replaced.
 *
 * 1. Upload ONLY this file to public_html/installer.php
 * 2. Visit https://mokesinfotech.com/installer.php
 * 3. Fill in your DB credentials and click Install
 * 4. DELETE this file immediately after installation
 */

define('REPO_ZIP',        'https://github.com/ifekitan/Mokesinfotech.com/archive/refs/heads/main.zip');
define('INSTALLER_TOKEN', 'mokesinstall2026');

$token      = $_POST['token'] ?? $_GET['token'] ?? '';
$publicHtml = __DIR__;           // /home/mokejclh/public_html
$appRoot    = dirname(__DIR__);  // /home/mokejclh  ← patch in place

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES); }
function ok(string $msg): void  { echo "<p class='ok'>✓ {$msg}</p>\n"; flush(); }
function fail(string $msg): void { echo "<p class='err'>✗ {$msg}</p>\n"; flush(); }
function info(string $msg): void { echo "<p class='info'>→ {$msg}</p>\n"; flush(); }

$step = $_POST['step'] ?? 'form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Mokes Infotech Installer</title>
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:system-ui,sans-serif;background:#f3f4f6;color:#1f2937;padding:2rem}
  .box{max-width:640px;margin:auto;background:#fff;border-radius:12px;padding:2rem;box-shadow:0 2px 12px rgba(0,0,0,.08)}
  h1{font-size:1.5rem;font-weight:700;margin-bottom:.25rem}
  .sub{color:#6b7280;font-size:.875rem;margin-bottom:1.5rem}
  label{display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.25rem;margin-top:1rem}
  input{width:100%;padding:.625rem .875rem;border:1px solid #d1d5db;border-radius:8px;font-size:.875rem;outline:none}
  input:focus{border-color:#7c3aed;box-shadow:0 0 0 3px rgba(124,58,237,.15)}
  button{margin-top:1.5rem;width:100%;padding:.875rem;background:#7c3aed;color:#fff;font-weight:700;border:none;border-radius:8px;cursor:pointer;font-size:1rem}
  button:hover{background:#6d28d9}
  .log{margin-top:1.5rem;background:#111827;color:#f9fafb;border-radius:8px;padding:1.25rem;font-family:monospace;font-size:.8rem;line-height:1.7}
  .ok{color:#34d399}.err{color:#f87171}.info{color:#93c5fd}
  .warn{background:#fef3c7;border:1px solid #fde68a;border-radius:8px;padding:.875rem;font-size:.8rem;color:#92400e;margin-bottom:1.25rem}
  .done{background:#d1fae5;border:1px solid #6ee7b7;border-radius:8px;padding:1rem;color:#065f46;font-weight:600;margin-top:1rem}
</style>
</head>
<body>
<div class="box">
  <h1>🚀 Mokes Infotech Installer</h1>
  <p class="sub">Patches the existing app with the latest code from GitHub</p>

<?php if ($step === 'form'): ?>
  <div class="warn">⚠ Delete this file immediately after installation completes.</div>
  <form method="POST">
    <input type="hidden" name="step" value="install">

    <label>Installer token</label>
    <input type="text" name="token" placeholder="<?= INSTALLER_TOKEN ?>" required>

    <hr style="margin:1.5rem 0;border-color:#e5e7eb">
    <p style="font-size:.8rem;color:#6b7280;margin-bottom:.5rem">MySQL credentials (cPanel → MySQL Databases)</p>

    <label>DB Host</label>
    <input type="text" name="db_host" value="localhost" required>

    <label>DB Name</label>
    <input type="text" name="db_name" placeholder="cpaneluser_dbname" required>

    <label>DB Username</label>
    <input type="text" name="db_user" placeholder="cpaneluser_dbuser" required>

    <label>DB Password</label>
    <input type="password" name="db_pass" required>

    <label>Email password for info@mokesinfotech.com</label>
    <input type="password" name="mail_pass" placeholder="cPanel email password">

    <button type="submit">▶ Patch &amp; Deploy Now</button>
  </form>

<?php elseif ($step === 'install'):

  @set_time_limit(600);
  @ini_set('max_execution_time', 600);

  if ($token !== INSTALLER_TOKEN) {
      echo "<p class='err'>Invalid token.</p></div></body></html>"; exit;
  }

  $dbHost   = trim($_POST['db_host']  ?? 'localhost');
  $dbName   = trim($_POST['db_name']  ?? '');
  $dbUser   = trim($_POST['db_user']  ?? '');
  $dbPass   = $_POST['db_pass']       ?? '';
  $mailPass = $_POST['mail_pass']     ?? '';

  if (!$dbName || !$dbUser) {
      echo "<p class='err'>DB name and user are required.</p></div></body></html>"; exit;
  }

  echo '<div class="log">';

  info("App root: {$appRoot}");
  info("Vendor exists: " . (is_dir($appRoot . '/vendor') ? 'YES' : 'NO'));

  // ── Step 1: Test DB connection ─────────────────────────────────────────
  info('Testing database connection…');
  try {
      $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass,
          [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      ok('Database connection successful');
  } catch (Exception $e) {
      fail('DB connection failed: ' . h($e->getMessage()));
      echo '</div></div></body></html>'; exit;
  }

  // ── Step 2: Download repo zip ──────────────────────────────────────────
  info('Downloading repository from GitHub…');
  $zipPath = $appRoot . '/mokesinfotech_patch_' . time() . '.zip';

  $ch = curl_init(REPO_ZIP);
  curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_TIMEOUT        => 120,
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_USERAGENT      => 'MokesInstaller/1.0',
  ]);
  $zipData  = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if (!$zipData || $httpCode !== 200) {
      fail("Download failed (HTTP {$httpCode}).");
      echo '</div></div></body></html>'; exit;
  }
  file_put_contents($zipPath, $zipData);
  ok('Downloaded ' . number_format(strlen($zipData) / 1024 / 1024, 1) . ' MB');

  // ── Step 3: Extract zip ────────────────────────────────────────────────
  info('Extracting…');
  $zip = new ZipArchive();
  if ($zip->open($zipPath) !== true) {
      fail('Could not open zip archive.');
      echo '</div></div></body></html>'; exit;
  }
  $extractTo = $appRoot . '/mokesinfotech_extract_' . time();
  mkdir($extractTo, 0755, true);
  $zip->extractTo($extractTo);
  $zip->close();
  unlink($zipPath);

  $srcDir = rtrim(glob($extractTo . '/*/')[0] ?? '', '/');
  if (!$srcDir || !is_dir($srcDir)) {
      fail('Could not find extracted folder.');
      echo '</div></div></body></html>'; exit;
  }
  ok('Extracted to ' . h(basename($srcDir)));

  // ── Step 4: Patch code directories (keep existing vendor) ─────────────
  function rrmdir(string $dir): void {
      if (!is_dir($dir)) return;
      $iter = new RecursiveIteratorIterator(
          new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
          RecursiveIteratorIterator::CHILD_FIRST
      );
      foreach ($iter as $f) {
          $f->isDir() ? @rmdir($f->getPathname()) : @unlink($f->getPathname());
      }
      @rmdir($dir);
  }

  function rcopy(string $src, string $dst): int {
      @mkdir($dst, 0755, true);
      $count = 0;
      $iter  = new RecursiveIteratorIterator(
          new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS),
          RecursiveIteratorIterator::SELF_FIRST
      );
      foreach ($iter as $f) {
          $target = $dst . '/' . $iter->getSubPathname();
          if ($f->isDir()) { @mkdir($target, 0755, true); }
          else { if (@copy($f->getPathname(), $target)) $count++; }
      }
      return $count;
  }

  // Only replace these directories — leave vendor, storage, bootstrap/cache alone
  $patchDirs = ['app', 'routes', 'resources', 'database', 'config', 'bootstrap/app.php'];
  $totalCopied = 0;
  foreach ($patchDirs as $item) {
      $src = $srcDir . '/' . $item;
      $dst = $appRoot . '/' . $item;
      if (!file_exists($src)) { info("Skipping {$item} (not in zip)"); continue; }
      if (is_dir($src)) {
          rrmdir($dst);
          $n = rcopy($src, $dst);
          $totalCopied += $n;
          info("Patched {$item}/ ({$n} files)");
      } else {
          @copy($src, $dst);
          $totalCopied++;
          info("Patched {$item}");
      }
  }

  // Copy public assets (build/, .htaccess, favicon, robots)
  foreach (['build', 'favicon.ico', 'robots.txt', '.htaccess'] as $item) {
      $src = $srcDir . '/public/' . $item;
      $dst = $publicHtml . '/' . $item;
      if (!file_exists($src)) continue;
      if (is_dir($src)) {
          rrmdir($dst);
          rcopy($src, $dst);
      } else {
          @copy($src, $dst);
      }
  }

  // Clean up extraction temp dir
  rrmdir($extractTo);
  ok("Code patched ({$totalCopied} files)");

  // ── Step 5: Write .env ────────────────────────────────────────────────
  info('Writing .env…');
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
  ok('.env written (DB_CONNECTION=mysql)');

  // ── Step 6: Storage permissions ───────────────────────────────────────
  foreach (['storage', 'bootstrap/cache'] as $dir) {
      $path = $appRoot . '/' . $dir;
      if (!is_dir($path)) @mkdir($path, 0755, true);
      @chmod($path, 0755);
  }
  foreach (['storage/app', 'storage/app/public', 'storage/framework',
            'storage/framework/cache', 'storage/framework/sessions',
            'storage/framework/views', 'storage/logs'] as $dir) {
      $path = $appRoot . '/' . $dir;
      if (!is_dir($path)) @mkdir($path, 0755, true);
  }
  ok('Storage directories ready');

  // ── Step 7: Bootstrap Laravel + artisan commands ──────────────────────
  info('Bootstrapping Laravel from ' . h($appRoot) . '…');
  if (function_exists('opcache_reset')) opcache_reset();

  // Delete stale caches before bootstrapping
  foreach (glob($appRoot . '/bootstrap/cache/*.php') as $f) { @unlink($f); }

  require $appRoot . '/vendor/autoload.php';
  $app    = require_once $appRoot . '/bootstrap/app.php';
  $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

  foreach ([
      ['migrate',      ['--force' => true, '--seed' => true]],
      ['config:cache', []],
      ['route:cache',  []],
      ['view:cache',   []],
  ] as [$cmd, $args]) {
      info("php artisan {$cmd}");
      $exit = $kernel->call($cmd, $args);
      $out  = trim($kernel->output());
      if ($out) echo '<span style="color:#d1d5db;font-size:.75rem">' . h($out) . '</span>' . "\n";
      $exit === 0 ? ok($cmd) : fail("{$cmd} exited {$exit}");
  }

  // ── Step 8: Write public_html/index.php ───────────────────────────────
  info('Writing public_html/index.php…');
  $indexPhp = <<<'PHP'
<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
$appPath = dirname(__DIR__);
if (file_exists($m = $appPath . '/storage/framework/maintenance.php')) require $m;
require $appPath . '/vendor/autoload.php';
/** @var Application $app */
$app = require_once $appPath . '/bootstrap/app.php';
$app->handleRequest(Request::capture());
PHP;
  file_put_contents($publicHtml . '/index.php', $indexPhp);
  ok('index.php written (app path = home root)');

  echo '</div>';
  echo '<div class="done">🎉 Patch complete! <strong>Delete this file now.</strong><br>';
  echo '<a href="/" style="color:#065f46">→ Open mokesinfotech.com</a></div>';

endif; ?>
</div>
</body>
</html>
