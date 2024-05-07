<?php

namespace App\Helpers\Common\Arrays;

final class ArrContent
{

    public static function lowerize(array $arr): array
    {
        foreach ($arr as $key => $str) {
            $arr[$key] = trim(strtolower($str));
        }

        return $arr;
    }

    public static function upperize(array $arr): array
    {
        foreach ($arr as $key => $str) {
            $arr[$key] = trim(strtoupper($str));
        }

        return $arr;
    }
}
