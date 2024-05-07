<?php

declare(strict_types=1);


$funcName = 'arr_contains'; // NOTE: before PHP8+
if (!function_exists($funcName)) {
    function arr_contains(array $arr, string $needle): bool
    {
        foreach ($arr as $value) {
            if (is_string($value)
                && str_contains($value, $needle)) {
                return true;
            }
        }

        return false;
    }
}

$funcName = 'arr_only_keys';
if (!function_exists($funcName)) {
    function arr_only_keys(array $arr, array $keysToSave): array
    {
        $result = [];
        foreach ($arr as $key => $value) {
            if (in_array($key, $keysToSave, true)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

$funcName = 'arr_remove_keys';
if (!function_exists($funcName)) {
    function arr_remove_keys(array $arr, array $keysToSave): array
    {
        $result = [];
        foreach ($arr as $key => $value) {
            if (!in_array($key, $keysToSave, true)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

$funcName = 'reindexArr';
if (!function_exists($funcName)) {
    function reindexArr(array $arr): array
    {
        return ($arr === [])
            ? []
            : array_combine(
                range(0, count($arr) - 1),
                array_values($arr)
            );
    }
}
