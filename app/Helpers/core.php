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

$funcName = 'config';
if (!function_exists($funcName)) {
    function config(string $fileAndKey, mixed $default = null): mixed
    {
		$fileAndKey = trim(strtolower($fileAndKey));
		if (empty($fileAndKey)
			|| !strpos($fileAndKey, '.')) {
            dd('Empty or wrong file and key');
        }

		$filepath = __DIR__ . '/../../config/'
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
		foreach (func_get_args() as $arg) {
			if (is_array($arg)) {
				foreach ($arg as $key => $value) {
					if (is_numeric($value) || is_string($value)) {
						echo $key . ' => ' . $value . '<br>';
						continue;
					}
					if (is_array($value)) {
						dump($value);
						continue;
					}

					var_dump($value);
					echo '<br>';
				}
			} else {
				if (is_string($arg) || is_numeric($arg)) {
					echo $arg . '<br>';
					continue;
				}
				var_dump($arg);
			}
			echo '<br>';
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
		$filepath = __DIR__ . '/../../.env';
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
