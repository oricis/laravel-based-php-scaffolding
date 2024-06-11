<?php

declare(strict_types=1);


$funcName = 'getLastSlice';
if (!function_exists($funcName)) {
    function getLastSlice(string $str = '', string $separator = '/'): string
    {
        $slices = explode($separator ? $separator : '/', $str);

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
            $output = trim($str);
            foreach ($arrInputGroups as $key => $inputChars) {
                $output = str_replace(
                    mb_str_split($inputChars, 1),
                    $arrReplaces[$key],
                    $output
                );
            }
        } catch (\Exception $e) {
            error(getExceptionStr($e));
        }

        return $output ?? null;
    }
}

$funcName = 'prepareStr';
if (!function_exists($funcName)) {
    /**
     * @param array<int, string|int> $arrStrsOrIds
     */
    function prepareStr(array $arrStrsOrIds, string $separator = ','): string
    {
        return implode($separator ? $separator : ',', $arrStrsOrIds);
    }
}

$func = 'random';
if (!function_exists($func)) {
    function random(int $length = 12, string $chars = ''): string
    {
        $chars = ($chars)
            ? $chars
            : '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength = strlen($chars);

        $output = '';
        for ($i = 0; $i < $length; $i++) {
            $output .= $chars[random_int(0, $charsLength - 1)];
        }

        return $output;
    }
}

$func = 'slugify';
if (!function_exists($func)) {
    function slugify(string $str, string $char = '-'): string
    {
        $reservedChars = '[]{}#:@/¿?!¡=&+$,;';

        $output = str_replace(
            mb_str_split($reservedChars, 1),
            $char,
            str_replace(
                ' ',
                $char,
                normalizeChars($str) ?? ''
            )
        );

        return ($output[strlen($output) - 1] === '-')
            ? substr($output, 0, strlen($output) - 1)
            : $output;
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
    /**
     * @param array<int, string> $needles
     */
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
