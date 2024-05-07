<?php

declare(strict_types=1);


$funcName = 'getLastSlice';
if (!function_exists($funcName)) {
    function getLastSlice(string $str = '', string $separator = '/'): string
    {
        $slices = explode($separator, $str);

        return $slices[count($slices) - 1];
    }
}
$funcName = 'prepareStr';
if (!function_exists($funcName)) {
    function prepareStr(array $arrStrs, string $separator = ','): string
    {
        return implode($separator, $arrStrs);
    }
}

$funcName = 'str_contains'; // NOTE: before PHP8+
if (!function_exists($funcName)) {
    function str_contains(string $haystack, string $needle): bool
    {
        return $needle !== ''
            && mb_strpos($haystack, $needle) !== false;
    }
}

$funcName = 'str_contains_some'; // NOTE: before PHP8+
if (!function_exists($funcName)) {
    function str_contains_some(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }
}
