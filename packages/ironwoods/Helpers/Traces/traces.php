<?php

declare(strict_types=1);


$funcName = 'error';
if (!function_exists($funcName)) {
    function error(string $message, $data = null): void
    {
        dd('<p class="b cred">' . $message . '</p>', $data);
    }
}

$funcName = 'getExceptionStr';
if (!function_exists($funcName)) {
    function getExceptionStr(\Exception $exception): string
    {
        if (! defined('APP_NAME')) {
            define('APP_NAME', null);
        }
        $dateTime = date('d-m-Y - h:m:s');

        return $dateTime . ((APP_NAME) ? (' - ' . APP_NAME) : '')
            . PHP_EOL . 'File: ' . $exception->getFile() . PHP_EOL
            . ' / Line: ' . $exception->getLine() . PHP_EOL . PHP_EOL
            . 'Exception: ' . $exception->getMessage();
    }
}

$funcName = 'go';
if (!function_exists($funcName)) {
    function go(array $backtrace = [], int $level = 1): string
    {
        $backtrace = ($backtrace)
            ? $backtrace
            : debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $level + 1);

        $funcName = (isset($backtrace[$level]['function']))
            ? $backtrace[$level]['function']
            : 'function_name_no_present';
        $shortedClassName = (isset($backtrace[$level]['class']))
            ? getLastSlice($backtrace[$level]['class'], '\\')
            : 'func ';

        return $shortedClassName . '@' . $funcName;
    }
}

$funcName = 'logger';
if (!function_exists($funcName)) {
    function logger(string $message, string $level = 'warn'): void
    {
        if (! defined('LOGS_STORAGE')) {
            define('LOGS_STORAGE', null);
            return;
        }

        $level = trim(strtoupper($level));
        if ($level === 'WARN') {
            $level = 'WARNING';
        }
        $message = $level . ': ' . $message;
        $dateTime = date('d-m-Y - h:m:s');
        $today = date('d_m_Y');

        $filePath = LOGS_STORAGE . $today . '.md';
        if (!file_put_contents(
            $filePath,
            $dateTime . ' > ' . $message . PHP_EOL,
            FILE_APPEND
        )) {
            error('Log failing, path: ' . $filePath);
        }
    }
}

$funcName = 'warn';
if (!function_exists($funcName)) {
    function warn(string $message): void
    {
        logger($message . '<br>', 'warn');
    }
}
