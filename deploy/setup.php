<?php
/*
|--------------------------------------------------------------------------
| Repair & cache script — DELETE THIS FILE after running
|--------------------------------------------------------------------------
| Upload to public_html/setup.php
| Visit https://mokesinfotech.com/setup.php?token=mokesrepair2026
| IMPORTANT: Delete immediately after use.
*/

$token = $_GET['token'] ?? '';
if ($token !== 'mokesrepair2026') {
    http_response_code(403);
    die('Forbidden. Add ?token=mokesrepair2026 to the URL.');
}

$appPath = realpath(__DIR__ . '/../mokesinfotech');

echo '<pre style="font-family:monospace;padding:20px;background:#111;color:#eee">';
echo "=== Mokes Infotech – Repair & Cache ===\n\n";

// Reset opcache so stale compiled files are cleared
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✓ opcache cleared\n";
}

// Show resolved app path
echo "  App path : {$appPath}\n";

// Show .env DB settings
$envFile = $appPath . '/.env';
if (file_exists($envFile)) {
    $env = file_get_contents($envFile);
    preg_match('/^DB_CONNECTION=(.+)$/m', $env, $m);
    echo "  DB driver: " . trim($m[1] ?? 'NOT FOUND') . "\n";
    preg_match('/^DB_DATABASE=(.+)$/m', $env, $m);
    echo "  DB name  : " . trim($m[1] ?? 'NOT FOUND') . "\n\n";
} else {
    echo "  ✗ .env NOT FOUND at {$envFile}\n\n";
}

// Delete stale cache files directly before artisan runs
$cacheDir = $appPath . '/bootstrap/cache';
foreach (glob($cacheDir . '/config.php') + glob($cacheDir . '/routes-*.php') as $f) {
    @unlink($f);
    echo "  Deleted: " . basename($f) . "\n";
}
echo "\n";

require $appPath . '/vendor/autoload.php';
$app = require_once $appPath . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$commands = [
    ['config:clear',  []],
    ['route:clear',   []],
    ['view:clear',    []],
    ['config:cache',  []],
    ['route:cache',   []],
    ['view:cache',    []],
    ['storage:link',  ['--force' => true]],
];

foreach ($commands as [$cmd, $args]) {
    echo "▶ php artisan {$cmd}\n";
    $exitCode = $kernel->call($cmd, $args);
    $out = trim($kernel->output());
    if ($out) echo "  {$out}\n";
    echo ($exitCode === 0 ? "  ✓ Done\n" : "  ✗ Failed (exit {$exitCode})\n");
    echo "\n";
}

// Confirm active DB connection from cached config
$cachedConfig = $cacheDir . '/config.php';
if (file_exists($cachedConfig)) {
    $cfg = require $cachedConfig;
    $active = $cfg['database']['default'] ?? 'unknown';
    echo "Active DB connection (from cache): {$active}\n";
}

echo "\n=== Done. DELETE this file now! ===\n";
echo '</pre>';
