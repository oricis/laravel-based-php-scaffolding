<?php

declare(strict_types=1);


define('APP_START', microtime(true));
define('BASE_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('LOGS_STORAGE', BASE_PATH . 'storage/logs/');


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

// Load with Composer:
// require_once BASE_PATH . 'vendor/autoload.php';

// Load with requires
require_once BASE_PATH . 'app/Helpers/loader.php';
require_once BASE_PATH . 'packages/ironwoods/alternative-loader.php';

/*
|--------------------------------------------------------------------------
| Check for Under Maintenance mode
|--------------------------------------------------------------------------
|
|
*/

if (env('APP_ENV') === 'maintenance') {
    logger('maintenance activated!');

    if (file_exists($maintenance = BASE_PATH . 'storage/maintenance.php')) {
        require $maintenance;
    }

    echo '<h1>We are working now...</h1>';
    die();
}

/*
|--------------------------------------------------------------------------
| Set Errors Reporting
|--------------------------------------------------------------------------
|
|
*/

if (env('APP_ENV') !== 'production') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
// To check apache errors log: sudo tail /var/log/apache2/error.log

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
|
*/

logger('starting app...', 'notice');
require_once BASE_PATH . 'resources/views/app.php';
