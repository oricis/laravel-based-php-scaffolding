<?php

/**
 * Load the functions files
 *
 */

require_once __DIR__ . "/Helpers/loader.php";

if (!function_exists('loadClasses')) {
    function loadClasses(string $directoryPath): bool
    {
        if (!is_dir($directoryPath)) {
            error('Invalid Path to load classes: ' . $directoryPath);
        }

        try {
            if ($resource = opendir($directoryPath)) {
                while ($temp = readdir($resource)) {
                    if ($temp === '.'
                        || $temp === '..'
                        || !str_contains($temp, '.php')) {
                        continue;
                    }
                    require_once $directoryPath . $temp;
                }
            } else {
                error('Something was bad opening the directory !!!');
            }
        } catch (\Exception $e) {
            error(getExceptionStr($e));
            return false;
        }

        return true;
    }
}

$basePath = dirname(__DIR__, 2) . '/packages/ironwoods/';

dump('HACK: alternative-loader.php > basePath: ' . $basePath);
loadClasses($basePath . 'Exceptions/src/');
loadClasses($basePath . 'Services/Array/');
loadClasses($basePath . 'Services/File/');
