<?php

declare(strict_types=1);


define('APP_START', microtime(true));
define('BASE_PATH', dirname(__DIR__) . '/');


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require_once BASE_PATH . 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Check for Under Maintenance mode
|--------------------------------------------------------------------------
|
|
*/

if (env('APP_ENV') === 'maintenance') {
    if (file_exists($maintenance = BASE_PATH . 'storage/maintenance.php')) {
        require $maintenance;
    }

    echo '<h1>We are working now...</h1>';
    die();
}

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
|
*/

require_once BASE_PATH . 'resources/views/app.php';
