<?php
/*
|--------------------------------------------------------------------------
| One-time setup script — DELETE THIS FILE after running
|--------------------------------------------------------------------------
| Upload to public_html/setup.php, visit https://mokesinfotech.com/setup.php
| It runs migrations and caches config/routes/views.
| IMPORTANT: Delete immediately after use.
*/

// Basic protection — change this token before uploading
$token = $_GET['token'] ?? '';
if ($token !== 'CHANGE_THIS_SECRET_TOKEN') {
    http_response_code(403);
    die('Forbidden. Add ?token=CHANGE_THIS_SECRET_TOKEN to the URL.');
}

$appPath = __DIR__ . '/../mokesinfotech';

require $appPath . '/vendor/autoload.php';

$app = require_once $appPath . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$commands = [
    ['migrate', ['--force' => true, '--seed' => true]],
    ['config:cache',  []],
    ['route:cache',   []],
    ['view:cache',    []],
    ['storage:link',  ['--force' => true]],
];

echo '<pre style="font-family:monospace;padding:20px">';
echo "=== Mokes Infotech – One-Time Setup ===\n\n";

foreach ($commands as [$cmd, $args]) {
    echo "▶ php artisan $cmd\n";
    $exitCode = $kernel->call($cmd, $args);
    echo $kernel->output();
    echo ($exitCode === 0 ? "✓ Done\n" : "✗ Failed (exit $exitCode)\n");
    echo "\n";
}

echo "=== Complete. DELETE this file now! ===\n";
echo '</pre>';
