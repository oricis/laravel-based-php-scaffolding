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

$func = 'normalizeChars';
if (!function_exists($func)) {
    function normalizeChars(string $str):? string
    {
        $arrInputGroups = [
            'ÀÁÂÃÄÅ',
            'àáâãäå',
            'ÈÉÊË',
            'èéêë',
            'ÌÍÎÏ',
            'ìíîï',
            'ÒÓÔÕÖ',
            'òóôõö',
            'ÙÚÛÜ',
            'ùúûü',
            'ÝŸ',
            'ýÿ',
            'Ñ',
            'ñ',
        ];
        $arrReplaces = [
            'A',
            'a',
            'E',
            'e',
            'I',
            'i',
            'O',
            'o',
            'U',
            'u',
            'Y',
            'y',
            'N',
            'n',
        ];
        try {
            $str = trim($str);
            foreach ($arrInputGroups as $key => $inputChars) {
                $inputChars = explode(',', $inputChars);
                $str = str_replace($inputChars, $arrReplaces[$key], $str);
            }

            return $str;
        } catch (\Exception $e) {
            error(getExceptionStr($e));
        }

        return null;
    }
}

$funcName = 'prepareStr';
if (!function_exists($funcName)) {
    function prepareStr(array $arrStrs, string $separator = ','): string
    {
        return implode($separator, $arrStrs);
    }
}

$func = 'slugify';
if (!function_exists($func)) {
    function slugify(string $str, string $char = '-'): string
    {
        return str_replace(' ', $char, normalizeChars($str) ?? '');
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
