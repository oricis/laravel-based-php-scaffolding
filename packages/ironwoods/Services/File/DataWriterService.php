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

namespace Ironwoods\Services\File;

use Ironwoods\Exceptions\RequiredActionException;

class DataWriterService
{
    /**
     * @param array<int, array<int|string,bool|float|int|string|null>> $rows
     */
    public static function writeCsv(
        array $rows,
        string $path,
        string $separator = ';',
        bool $removeCancelled = true
    ): bool
    {
        try {
            $file = fopen($path, 'w'); // Open a file in write mode ('w')
            if (!$file) {
                $message = 'NO se ha abierto/creado el fichero: ' . $path;
                throw new RequiredActionException($message);
            }
            foreach ($rows as $row) {
                if ($removeCancelled
                    && arr_contains($row, 'CANCEL')) {
                    continue;
                }
                fputcsv($file, $row, $separator);
            }
            fclose($file);
        } catch (\Exception $e) {
            error(getExceptionStr($e));
            return false;
        }

        return true;
    }

    /**
     * @param array<int, string> $rows
     */
    public static function writeRowByRow(array $rows, string $path): bool
    {
        try {
            $file = fopen($path, 'w'); // Open a file in write mode ('w')
            if (!$file) {
                $message = 'NO se ha abierto/creado el fichero: ' . $path;
                throw new RequiredActionException($message);
            }
            foreach ($rows as $row) {
                fwrite($file, $row . PHP_EOL);
            }
            fclose($file);
        } catch (\Exception $e) {
            error(getExceptionStr($e));
            return false;
        }

        return true;
    }
    public static function touch666(): void
    {
        echo 666;
    }
}
