<?php

declare(strict_types=1);


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
