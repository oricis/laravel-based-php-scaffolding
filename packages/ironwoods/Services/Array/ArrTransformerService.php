<?php

declare(strict_types = 1);

/*
 * This file is part of Ironwoods\Services.
 *
 * Copyright (c) Moisés Alcocer, 2024
 * https://www.ironwoods.es
 *
 * Please view the LICENSE file distributed with this source code.
 *
 */

namespace Ironwoods\Services\Array;

use Ironwoods\Enums\SortOption;
use Ironwoods\Exceptions\RequiredActionException;

final class ArrTransformerService
{

    /**
     * @param array<mixed, string> $arr
     * @return array<mixed, string>
     */
    public static function lowerize(array $arr): array
    {
        foreach ($arr as $key => $str) {
            $arr[$key] = trim(strtolower($str));
        }

        return $arr;
    }

    /**
     * @param array<mixed, string> $arr
     * @return array<mixed, string>
     */
    public static function upperize(array $arr): array
    {
        foreach ($arr as $key => $str) {
            $arr[$key] = trim(strtoupper($str));
        }

        return $arr;
    }

    /**
     * Sort the internal arrays by the given key
     *
     * @param array<int, array<int, mixed>|null> $arr
     * @return array<int<0, max>, mixed>
     */
    public static function sortNestedArraysByKey(
        array $arr,
        int $keyToSort = 0,
        SortOption $sortOption = SortOption::ASC
    ): array
    {
        $arr = removeArrayEmpties($arr);
        $output = [];

        try {
            $column = array_column($arr, $keyToSort);
            if ($sortOption === SortOption::ASC) {
                asort($column);
            } else {
                arsort($column);
            }

            foreach($column as $key => $value) {
                $output[] = $arr[$key];
            }

        } catch (RequiredActionException ) {
            echo 'ERROR ordenando';
        }

        return $output;
    }
}
