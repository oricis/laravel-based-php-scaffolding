<?php

declare(strict_types=1);


$funcName = 'arr_contains'; // NOTE: before PHP8+
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     */
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

$funcName = 'preserveArrayKeys';
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     * @param array<int, int|string> $keysToSave
     * @return array<int|string, mixed>
     */
    function preserveArrayKeys(array $arr, array $keysToSave): array
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

$funcName = 'preserveArrayValues';
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     * @param array<int, int|string> $valuesToSave
     * @return array<int|string, mixed>
     */
    function preserveArrayValues(array $arr, array $valuesToSave): array
    {
        $result = [];
        foreach ($arr as $key => $value) {
            if (in_array($value, $valuesToSave, true)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

$funcName = 'removeArrayKeys';
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     * @param array<int, int|string> $keysToRemove
     * @return array<int|string, mixed>
     */
    function removeArrayKeys(array $arr, array $keysToRemove): array
    {
        $result = [];
        foreach ($arr as $key => $value) {
            if (!in_array($key, $keysToRemove, true)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

$funcName = 'removeArrayValues';
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     * @param array<int, int|string> $valuesToRemove
     * @return array<int|string, mixed>
     */
    function removeArrayValues(array $arr, array $valuesToRemove): array
    {
        $result = [];
        foreach ($arr as $key => $value) {
            if (!in_array($value, $valuesToRemove, true)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

$funcName = 'isAssocArray';
if (!function_exists($funcName)) {
    /**
     * @param array<int|string, mixed> $arr
     */
    function isAssocArray(array $arr): bool
    {
        foreach ($arr as $key => $value) {
            if (is_integer($key)) {
                return false;
            }
        }

        return (!empty($arr)); // if the array is empty also return false
    }
}

$funcName = 'reindexArr';
if (!function_exists($funcName)) {
    /**
     * @param array<int, mixed> $arr
     * @return array<int, mixed>
     */
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

$funcName = 'removeArrayEmpties';
if (!function_exists($funcName)) {
    /**
     * @param array<int, null|integer|float|string|object|array<int|string, mixed>> $arr
     * @return array<int, mixed>
     */
    function removeArrayEmpties(
        array $arr,
        bool $reindex = true
    ): array
    {
        $filteredArr = array_filter($arr, function ($value) {
            return ((is_numeric($value)
                || is_string($value)
                || is_object($value)
                ) && $value);
        });

        return ($reindex) ? reindexArr($filteredArr): $filteredArr;
    }
}
