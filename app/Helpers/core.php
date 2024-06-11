<?php

declare(strict_types=1);

use Ironwoods\Exceptions\FileNotFoundException;

/**
 * DON'T DELETE or MODIFY !
 *
 * Here are the app's core functions
 *
 *
 */

$funcName = 'asset';
if (!function_exists($funcName)) {
    function asset(string $path): string
    {
        return './' . $path;
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}

$funcName = 'config';
if (!function_exists($funcName)) {
    function config(string $fileAndKey, mixed $default = null): mixed
    {
        $fileAndKey = trim(strtolower($fileAndKey));
        $dotPosition = (int) strpos($fileAndKey, '.');
        if (empty($fileAndKey)
            || $dotPosition === 0) {
            dd('Empty or wrong file and key');
        }

        $filepath = BASE_PATH . 'config/'
            . substr($fileAndKey, 0, $dotPosition) . '.php';
        if (!file_exists($filepath)) {
            dd('File not found: ' . $filepath);
        }

        $key = substr($fileAndKey, strpos($fileAndKey, '.') + 1);
        if (!is_file($filepath) || !is_readable($filepath)) {
            $message = 'Fichero NO encontrado o ilegible: ' . $filepath;
            throw new FileNotFoundException($message);
        }
        $content = require_once($filepath);

        return ($content && is_array($content))
            ? $content[$key] ?? $default
            : $default;
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}

$funcName = 'env';
if (! function_exists($funcName)) {
    function env(string $key, string|null $default = null):? string
    {
        $filepath = BASE_PATH . '.env';
        $key = trim(strtoupper($key));

        if (!is_file($filepath) || !is_readable($filepath)) {
            $message = 'Fichero NO encontrado o ilegible: ' . $filepath;
            throw new FileNotFoundException($message);
        }

        if (($content = file($filepath))
            && is_array($content)) {
            $value = null;
            foreach ($content as $value) {
                if (strpos($value, $key) === 0) {
                    return substr($value, strpos($value, '=') + 1);
                }
            }
        }

        return $default;
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}
