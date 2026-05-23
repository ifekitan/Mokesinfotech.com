<?php
/**
 * Mokes Infotech – Namecheap Shared Hosting Installer
 * ─────────────────────────────────────────────────────
 * 1. Upload ONLY this file to public_html/installer.php
 * 2. Visit https://mokesinfotech.com/installer.php
 * 3. Fill in your DB credentials and click Install
 * 4. DELETE this file immediately after installation
 */

define('REPO_ZIP', 'https://github.com/ifekitan/Mokesinfotech.com/archive/refs/heads/main.zip');
define('APP_FOLDER', 'mokesinfotech');   // folder created one level above public_html
define('INSTALLER_TOKEN', 'mokesinstall2026'); // change before uploading if desired

// ── Security token ────────────────────────────────────────────────────────
$token = $_POST['token'] ?? $_GET['token'] ?? '';

// ── Helpers ───────────────────────────────────────────────────────────────
function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES); }
function ok(string $msg): void { echo "<p class='ok'>✓ {$msg}</p>\n"; flush(); }
function fail(string $msg): void { echo "<p class='err'>✗ {$msg}</p>\n"; flush(); }
function info(string $msg): void { echo "<p class='info'>→ {$msg}</p>\n"; flush(); }

$publicHtml = __DIR__;                        // /home/user/public_html
$homeDir    = dirname($publicHtml);           // /home/user
$appRoot    = $homeDir . '/' . APP_FOLDER;    // /home/user/mokesinfotech

// ── HTML shell ────────────────────────────────────────────────────────────
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
  input,select{width:100%;padding:.625rem .875rem;border:1px solid #d1d5db;border-radius:8px;font-size:.875rem;outline:none}
  input:focus,select:focus{border-color:#7c3aed;box-shadow:0 0 0 3px rgba(124,58,237,.15)}
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
  <p class="sub">Pulls the app from GitHub and configures it on this server</p>

<?php if ($step === 'form'): ?>
  <div class="warn">⚠ Delete this file immediately after installation completes.</div>
  <form method="POST">
    <input type="hidden" name="step" value="install">

    <label>Installer token</label>
    <input type="text" name="token" value="" placeholder="<?= INSTALLER_TOKEN ?>" required>

    <hr style="margin:1.5rem 0;border-color:#e5e7eb">
    <p style="font-size:.8rem;color:#6b7280;margin-bottom:.5rem">MySQL credentials (from cPanel → MySQL Databases)</p>

    <label>DB Host</label>
    <input type="text" name="db_host" value="localhost" required>

    <label>DB Name <span style="font-weight:400;color:#6b7280">(e.g. mksinft_mokesinfotech)</span></label>
    <input type="text" name="db_name" placeholder="cpaneluser_dbname" required>

    <label>DB Username <span style="font-weight:400;color:#6b7280">(e.g. mksinft_dbuser)</span></label>
    <input type="text" name="db_user" placeholder="cpaneluser_dbuser" required>

    <label>DB Password</label>
    <input type="password" name="db_pass" required>

    <label>Email password for info@mokesinfotech.com</label>
    <input type="password" name="mail_pass" placeholder="cPanel email password">

    <button type="submit">▶ Install Now</button>
  </form>

<?php elseif ($step === 'install'):

  if ($token !== INSTALLER_TOKEN) {
      echo "<p class='err'>Invalid token. Refresh and try again.</p></div></body></html>";
      exit;
  }

  $dbHost  = trim($_POST['db_host'] ?? 'localhost');
  $dbName  = trim($_POST['db_name'] ?? '');
  $dbUser  = trim($_POST['db_user'] ?? '');
  $dbPass  = $_POST['db_pass'] ?? '';
  $mailPass = $_POST['mail_pass'] ?? '';

  if (!$dbName || !$dbUser) {
      echo "<p class='err'>DB name and user are required.</p></div></body></html>";
      exit;
  }

  echo '<div class="log">';

  // ── Step 1: Test DB connection ────────────────────────────────────────
  info('Testing database connection…');
  try {
      $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      ok('Database connection successful');
  } catch (Exception $e) {
      fail('DB connection failed: ' . h($e->getMessage()));
      echo '</div></div></body></html>'; exit;
  }

  // ── Step 2: Download repo zip ─────────────────────────────────────────
  info('Downloading repository from GitHub…');
  $zipPath = sys_get_temp_dir() . '/mokesinfotech_' . time() . '.zip';

  $ch = curl_init(REPO_ZIP);
  curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_TIMEOUT => 120,
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_USERAGENT => 'MokesInstaller/1.0',
  ]);
  $zipData = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if (!$zipData || $httpCode !== 200) {
      fail("Download failed (HTTP {$httpCode}). Check the repo is public.");
      echo '</div></div></body></html>'; exit;
  }
  file_put_contents($zipPath, $zipData);
  ok('Downloaded ' . number_format(strlen($zipData) / 1024 / 1024, 1) . ' MB');

  // ── Step 3: Extract zip ───────────────────────────────────────────────
  info('Extracting to ' . h($homeDir) . '…');
  $zip = new ZipArchive();
  if ($zip->open($zipPath) !== true) {
      fail('Could not open zip archive.');
      echo '</div></div></body></html>'; exit;
  }

  $extractTo = sys_get_temp_dir() . '/mokesinfotech_extract_' . time();
  mkdir($extractTo, 0755, true);
  $zip->extractTo($extractTo);
  $zip->close();
  unlink($zipPath);

  // GitHub zips extract as RepoName-branch/
  $extracted = glob($extractTo . '/*/')[0] ?? null;
  if (!$extracted) {
      fail('Could not find extracted folder.');
      echo '</div></div></body></html>'; exit;
  }
  ok('Extracted successfully');

  // ── Step 4: Move app into place ───────────────────────────────────────
  info("Moving app to {$appRoot}…");
  if (is_dir($appRoot)) {
      // Back up existing
      rename($appRoot, $appRoot . '_backup_' . date('YmdHis'));
      info('Existing install backed up');
  }
  rename(rtrim($extracted, '/'), $appRoot);
  rmdir($extractTo);
  ok('App files in place');

  // ── Step 5: Move public assets to public_html ─────────────────────────
  info('Copying public assets to public_html…');
  $publicSrc = $appRoot . '/public';
  foreach (['build', 'favicon.ico', 'robots.txt', '.htaccess'] as $item) {
      $src = $publicSrc . '/' . $item;
      $dst = $publicHtml . '/' . $item;
      if (!file_exists($src)) continue;
      if (is_dir($src)) {
          // Recursive copy for build/
          $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
          foreach ($iter as $f) {
              $target = $dst . '/' . $iter->getSubPathname();
              if ($f->isDir()) { @mkdir($target, 0755, true); }
              else { @copy($f->getPathname(), $target); }
          }
      } else {
          @copy($src, $dst);
      }
  }
  ok('Public assets copied');

  // ── Step 6: Write .env ────────────────────────────────────────────────
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
  ok('.env written');

  // ── Step 7: Set permissions ───────────────────────────────────────────
  info('Setting storage permissions…');
  foreach (['storage', 'bootstrap/cache'] as $dir) {
      $path = $appRoot . '/' . $dir;
      if (is_dir($path)) {
          chmod($path, 0755);
          $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS));
          foreach ($iter as $f) { @chmod($f->getPathname(), $f->isDir() ? 0755 : 0644); }
      }
  }
  ok('Permissions set');

  // ── Step 8: Bootstrap Laravel + run migrations ────────────────────────
  info('Bootstrapping Laravel…');
  require $appRoot . '/vendor/autoload.php';
  $app = require_once $appRoot . '/bootstrap/app.php';
  $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

  foreach ([
      ['migrate',       ['--force' => true, '--seed' => true]],
      ['config:cache',  []],
      ['route:cache',   []],
      ['view:cache',    []],
  ] as [$cmd, $args]) {
      info("php artisan {$cmd}");
      $exit = $kernel->call($cmd, $args);
      $out  = trim($kernel->output());
      if ($out) echo '<span style="color:#d1d5db;font-size:.75rem">' . h($out) . '</span>' . "\n";
      $exit === 0 ? ok($cmd) : fail("{$cmd} exited {$exit}");
  }

  // ── Step 9: Write new index.php to public_html ────────────────────────
  info('Installing public_html/index.php…');
  $indexPhp = <<<'PHP'
<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
$appPath = __DIR__ . '/../mokesinfotech';
if (file_exists($m = $appPath . '/storage/framework/maintenance.php')) require $m;
require $appPath . '/vendor/autoload.php';
/** @var Application $app */
$app = require_once $appPath . '/bootstrap/app.php';
$app->handleRequest(Request::capture());
PHP;
  file_put_contents($publicHtml . '/index.php', $indexPhp);
  ok('index.php installed');

  echo '</div>';
  echo '<div class="done">🎉 Installation complete! <strong>Delete this file now.</strong><br>';
  echo '<a href="/" style="color:#065f46">→ Open mokesinfotech.com</a></div>';

endif; ?>
</div>
</body>
</html>
