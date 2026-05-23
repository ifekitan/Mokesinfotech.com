<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Namecheap Shared Hosting — index.php for public_html/
|--------------------------------------------------------------------------
| Upload THIS file to public_html/index.php
| Upload the rest of the Laravel app to a sibling folder: mokesinfotech/
|
| Expected server layout:
|   /home/<cpanel-user>/
|   ├── public_html/          ← web root (this file lives here)
|   │   ├── index.php         ← this file
|   │   ├── .htaccess
|   │   ├── favicon.ico
|   │   ├── robots.txt
|   │   └── build/
|   └── mokesinfotech/        ← the full Laravel app
|       ├── app/
|       ├── bootstrap/
|       ├── storage/
|       ├── vendor/
|       └── ...
|
| If you named the app folder differently, update the path below.
*/

$appPath = __DIR__ . '/../mokesinfotech';

if (file_exists($maintenance = $appPath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $appPath . '/vendor/autoload.php';

/** @var Application $app */
$app = require_once $appPath . '/bootstrap/app.php';

$app->handleRequest(Request::capture());
