<?php

declare(strict_types=1);

namespace App\Services\Common;

use Ironwoods\Exceptions\FileNotFoundException;
use Ironwoods\Exceptions\FileReadException;

final class DataReaderService
{

    public static function readCsv(string $filename, string $separator = ','): array
    {
        $output = [];
        try {
            if (!is_file($filename) || !is_readable($filename)) {
                $message = 'Fichero NO encontrado o ilegible: ' . $filename;
                throw new FileNotFoundException($message);
            }
            $fileToRead = fopen($filename, 'r');
            while (!feof($fileToRead) ) {
                $output[] = fgetcsv($fileToRead, 2000, $separator);
            }
            fclose($fileToRead);

        } catch (FileReadException $e) {
            error(go() . ' >> ' . getExceptionStr($e));
        }

        return $output;
    }

    public static function readRowByRow(string $filename): array
    {
        $output = [];
        try {
            if (!is_file($filename) || !is_readable($filename)) {
                $message = 'Fichero NO encontrado o ilegible: ' . $filename;
                throw new FileNotFoundException($message);
            }
            return file($filename);

        } catch (FileReadException $e) {
            error(go() . ' >> ' . getExceptionStr($e));
        }

        return $output;
    }
}
