<?php

declare(strict_types=1);

use App\Exceptions\FileNotFoundException;

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
		if (empty($fileAndKey)
			|| !strpos($fileAndKey, '.')) {
            dd('Empty or wrong file and key');
        }

		$filepath = BASE_PATH . 'config/'
			. substr($fileAndKey, 0, strpos($fileAndKey, '.')) . '.php';
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

$funcName = 'dd';
if (!function_exists($funcName)) {
	function dd(): void
	{
		dump(func_get_args());
		die();
	}
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}

$funcName = 'dump';
if (!function_exists($funcName)) {
	function dump(): void
	{
		$lineBreak = getLineBreak();
		foreach (func_get_args() as $arg) {
			if (is_array($arg)) {
				foreach ($arg as $key => $value) {
					if (is_numeric($value) || is_string($value)) {
						echo $key . ' => ' . $value . $lineBreak;
						continue;
					}
					if (is_array($value)) {
						dump($value);
						continue;
					}

					print_r($value);
					echo $lineBreak;
				}
			} else {
				if (is_string($arg) || is_numeric($arg)) {
					echo $arg . $lineBreak;
					continue;
				}
				var_dump($arg);
			}
			echo $lineBreak;
		}
	}
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}

$funcName = 'env';
if (! function_exists($funcName)) {
    function env(string $key, mixed $default = null): string
    {
		$filepath = BASE_PATH . '.env';
		$key = trim(strtoupper($key));

        if (!is_file($filepath) || !is_readable($filepath)) {
			$message = 'Fichero NO encontrado o ilegible: ' . $filepath;
			throw new FileNotFoundException($message);
		}
		$content = file($filepath);
		// dump(go(), $content);

        if ($content && is_array($content)) {
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

$funcName = 'getLineBreak';
if (!function_exists($funcName)) {
	function getLineBreak()
	{
		$backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$origin = $backtrace[1]['file'];
		if (str_contains($origin, 'tests')) {
			return PHP_EOL;
		}

		return '<br>';
	}
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
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
