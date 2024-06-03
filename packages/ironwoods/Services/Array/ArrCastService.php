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

use Ironwoods\Exceptions\BadDataException;

class ArrCastService
{

    /**
     * @param array<mixed, mixed> $arr
     * @return array<mixed, mixed>
     */
    public static function clear(array $arr): array
    {
        foreach ($arr as $key => $value) {
            if (!$value || !is_string($value)) {
                continue;
            }
            $arr[$key] = str_replace(['\'', '"'], '', $value);
        }

        return $arr;
    }

    /**
     * @param array<mixed, int|float|string> $arr
     * @return array<mixed, int|float|string>
     */
    public static function parseFloat(array $arr): array
    {
        try {
            foreach ($arr as $key => $value) {
                if (! $value
                    || ! is_numeric($value)) {
                    throw new BadDataException();
                }
                $arr[$key] = (float) $value;
            }
        } catch (\Exception $e) {
            error(getExceptionStr($e));
        }

        return $arr;
    }

    /**
     * @param array<mixed, float|int|string> $arr
     * @return array<mixed, float|int|string>
     */
    public static function parseInt(array $arr): array
    {
        try {
            foreach ($arr as $key => $value) {
                if (! $value
                    || ! is_numeric($value)) {
                    throw new BadDataException();
                }
                $arr[$key] = (int) $value;
            }
        } catch (\Exception $e) {
            error(getExceptionStr($e));
        }

        return $arr;
    }

    /**
     * @param array<mixed, string> $arr
     * @return array<mixed, string>
     */
    public static function slugify(array $arr): array
    {
        foreach ($arr as $key => $value) {
            $arr[$key] = slugify($value);
        }

        return $arr;
    }

    /**
     * @param array<mixed, mixed> $arr
     * @return array<mixed, mixed>
     * $expected = [1, 2, 5, 6, 'name' => 'Foo'];
     * $result = squash([1, 2, [5, 6], ['name' => 'Foo']]);
     * var_dump($expected === $result); // true
     */
    public static function squash(array $arr): array
    {
        $result = [];
        foreach ($arr as $expectedArr) {
            if (is_array($expectedArr)) {
                $result = array_merge($result, $expectedArr);
                continue;
            }
            $result[] = $expectedArr;
        }

        return $result;
    }

    /**
     * @param array<mixed, object> $arr
     * @return array<mixed, object>
     */
    public static function squashObjects(
        array $arr,
        string $key = 'id',
        bool $allowRepeated = false
    ): array
    {
        $output = [];
        foreach ($arr as $temp) {
            $value = $temp->{$key};

            if (!$allowRepeated && in_array($value, $output, true)) {
                continue;
            }
            $output[] = $value;
        }

        return $output;
    }

    /**
     * @param array<mixed, string> $arr
     * @return array<mixed, string>
     */
    public static function ucfirst(array $arr): array
    {
        foreach ($arr as $key => $str) {
            if (is_string($str)) {
                $arr[$key] = ucfirst($str);
            }
        }

        return $arr;
    }
}
