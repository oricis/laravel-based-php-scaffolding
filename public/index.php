<?php

declare(strict_types=1);


define('APP_START', microtime(true));

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

require_once dirname(__DIR__) . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Check for Under Maintenance mode
|--------------------------------------------------------------------------
|
|
*/

if (env('APP_ENV') === 'maintenance') {
    if (file_exists($maintenance = __DIR__.'/../storage/maintenance.php')) {
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

require_once dirname(__DIR__) . '/resources/views/app.php';
