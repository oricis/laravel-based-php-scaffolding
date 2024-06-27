<?php

declare(strict_types=1);


$funcName = 'getFilePaths';
if (!function_exists($funcName)) {
    /**
     * @return array<int, string>
     */
    function getFilePaths(
        string $directoryPath,
        string $fileExtension = 'php',
        string $pattern = ''
    ): array
    {
        if (!is_dir($directoryPath)) {
            error('Invalid Path to read files: ' . $directoryPath);
        }

        $output = [];
        try {
            if ($resource = opendir($directoryPath)) {
                while ($temp = readdir($resource)) {
                    if ($temp === '.'
                        || $temp === '..'
                        || ($fileExtension
                            && !str_contains($temp, '.' . $fileExtension))) {
                        continue;
                    }

                    if ($pattern) {
                        if (str_contains($temp, 'grouped')) {
                            $output[] = $temp;
                        }
                    } else {
                        $output[] = $temp;
                    }
                }
            } else {
                error('Something was bad opening the directory !!!');
            }
        } catch (\Exception $e) {
            error(getExceptionStr($e));
            $output = [];
        }

        return $output;
    }
}

$funcName = 'existsDirectories';
if (!function_exists($funcName)) {
    /**
     * @param array<int, string> $directoryPaths
     */
    function existsDirectories(array $directoryPaths): bool
    {
        $flag = true;
        foreach ($directoryPaths as $path) {
            if (!file_exists($path)) {
                dump('Directory not found: ' . $path);
                $flag = false;
            }
        }

        return $flag;
    }
}

$funcName = 'removeFiles';
if (!function_exists($funcName)) {
    /**
     * @param array<int, string> $fileExtensions
     */
    function removeFiles(string $path, array $fileExtensions = []): bool
    {
        if ($logFiles = getFilePaths($path)) {
            foreach ($logFiles as $path) {
                if ($fileExtensions
                    && !in_array(getLastSlice($path, '.'), $fileExtensions, true)) {
                    continue;
                }

                if(!unlink($path)) {
                    return false;
                }
            }
        }

        return true;
    }
}
