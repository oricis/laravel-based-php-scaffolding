<?php

declare(strict_types=1);

/**
 * DON'T DELETE or MODIFY !
 *
 * Here are the app's core functions
 *
 *
 */

$funcName = 'app_path';
if (! function_exists($funcName)) {
    function app_path(): string
    {
        return BASE_PATH . 'app/';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}

$funcName = 'base_path';
if (! function_exists($funcName)) {
    function base_path(): string
    {
        return BASE_PATH;
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}

$funcName = 'config_path';
if (! function_exists($funcName)) {
    function config_path(): string
    {
        return BASE_PATH . 'config/';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}

$funcName = 'public_path';
if (! function_exists($funcName)) {
    function public_path(): string
    {
        return BASE_PATH . 'public/';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}

$funcName = 'resources_path';
if (! function_exists($funcName)) {
    function resources_path(): string
    {
        return BASE_PATH . 'resources/';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}

$funcName = 'storage_path';
if (! function_exists($funcName)) {
    function storage_path(): string
    {
        return BASE_PATH . 'storage/';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
}
