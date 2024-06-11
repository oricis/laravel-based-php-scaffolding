<?php

declare(strict_types=1);


$funcName = 'dd';
if (!function_exists($funcName)) {
    function dd(): void
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            dump($arg);
        }
        die();
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}

$funcName = 'dump';
if (!function_exists($funcName)) {
    function dumpArr(array $arr, int $indentation = 4): void
    {
        if (empty($arr)) {
            echo '[]' . getLineBreak();
            return;
        }
        $indent = '';
        while ($indentation) {
            $indentation--;
            $indent .= ' ';
        }

        echo 'array(' . count($arr) . ') => [' . getLineBreak();
        foreach ($arr as $key => $value) {
            if (is_numeric($value) || is_string($value)) {
                echo $indent . $key . ' => ' . $value . ',' . getLineBreak();
                continue;
            }
            if (is_array($value)) {
                if (empty($value)) {
                    echo $indent . $key . ' => [],' . getLineBreak();
                    continue;
                }
                $arrValues = [];

                echo $indent . $key . ' => Array(' . count($value) . '):[';
                foreach ($value as $key => $internalValue) {
                    if (is_array($internalValue)) {
                        echo 'Array(' . count($internalValue) . '):[' . implode(',' , $internalValue) . '], ';
                        continue;
                    }
                    $arrValues[] = $internalValue;
                }
                echo implode(',' , $arrValues) . '],' . getLineBreak();
            }

            // print_r($value);
            // echo getLineBreak();
        }
        echo ']' . getLineBreak();
    }

    function dumpStr(string $str): void
    {
        if (empty(trim($str))) {
            echo '"" (' . strlen($str) . ')' . getLineBreak();
            return;
        }

        echo $str . getLineBreak();
    }

    function dump(): void
    {
        foreach (func_get_args() as $key => $arg) {
            if (is_array($arg)) {
                dumpArr($arg);
                continue;
            }
            if (is_string($arg)) {
                dumpStr($arg);
                continue;
            }
            if (is_numeric($arg)) {
                echo $arg . getLineBreak();
                continue;
            }

            var_dump($arg);
            echo getLineBreak();
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
        return (php_sapi_name() === 'cli')
            ? PHP_EOL
            : '<br>';
    }
} else {
    echo 'ERR: function "' . $funcName . '" already defined!';
    die();
}
