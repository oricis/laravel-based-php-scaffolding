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
}
