<?php

declare(strict_types=1);


$funcName = 'getYearFromDate';
if (!function_exists($funcName)) {
    function getYearFromDate(string $date, string $separator = '-'): int
    {
        $slices = explode($separator, $date);
        foreach ($slices as $slice) {
            if (strlen($slice) === 4) {
                return (int) $slice;
            }
        }
        return 0;
    }
}

$funcName = 'isOutOFYear';
if (!function_exists($funcName)) {
    function isOutOFYear(int $year, string $date): bool
    {
        return $year !== getYearFromDate($date);
    }
}
