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

use Ironwoods\Exceptions\FileNotFoundException;
use Ironwoods\Exceptions\FileReadException;
use Ironwoods\Exceptions\RequiredActionException;

class DataReaderService
{

    /**
     * @return array<int, mixed>
     */
    public static function readCsv(
        string $filename,
        string $separator = ','
    ): array
    {
        $output = [];

        try {
            if (!is_file($filename) || !is_readable($filename)) {
                $message = 'Fichero NO encontrado o ilegible: ' . $filename;
                throw new FileNotFoundException($message);
            }
            $fileToRead = fopen($filename, 'r');
            if (! $fileToRead) {
                $message = 'No se ha abierto el fichero: ' . $filename;
                throw new RequiredActionException($message);
            }

            while (!feof($fileToRead) ) {
                if ($row = fgetcsv($fileToRead, 2000, $separator)) {
                    $output[] = $row;
                }
            }
            fclose($fileToRead);

        } catch (FileReadException $e) {
            error(go() . ' >> ' . getExceptionStr($e));
        }

        return removeArrayEmpties($output);
    }

    /**
     * @return array<int, mixed>
     */
    public static function readRowByRow(string $filename): array
    {
        $output = [];
        try {
            if (!is_file($filename) || !is_readable($filename)) {
                $message = 'Fichero NO encontrado o ilegible: ' . $filename;
                throw new FileNotFoundException($message);
            }
            $output = ($rows = file($filename)) ? $rows : [];

        } catch (FileReadException $e) {
            error(go() . ' >> ' . getExceptionStr($e));
        }

        return removeArrayEmpties($output);
    }
}
