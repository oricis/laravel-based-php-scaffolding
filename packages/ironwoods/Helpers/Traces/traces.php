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
        $dateTime = date('d-m-Y - h:m:s');

        return $dateTime . defined('APP_NAME') ? (' - ' . APP_NAME) : ''
            . '<br>File: ' . $exception->getFile() . PHP_EOL
            . ' / Line: ' . $exception->getLine() . PHP_EOL
            . '<br>Exception: ' . $exception->getMessage();
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
		$level = trim(strtoupper($level));
		if ($level === 'WARN') {
			$level = 'WARNING';
		}
		$message = $level . ': ' . $message;
		$dateTime = date('d-m-Y - h:m:s');
		$today = date('d_m_Y');
		$path = dirname(__DIR__, 1) . '/storage/logs/' . $today . '.md';
		file_put_contents(
			$path,
			$dateTime . ' > ' . $message . PHP_EOL,
			FILE_APPEND
		);
	}
}

function test(string $testFile): void
{
	require_once($testFile);

	$testClass = str_replace('.php', '', $testFile);
	$testClass = str_replace('/', '\\', $testClass);

	if (class_exists($testClass)) {
		new $testClass;
	}
}

function traceRemain(string $callFrom = ''): void
{
	echo '<hr>';
	if ($callFrom) {
		dump($callFrom);
	}
	dump('HACK: session trace ! <br>');
	dump($_SESSION['remain_buy']['quantity'] ?? 'NO remain buy quantity');
	dump($_SESSION['remain_buy']['date'] ?? 'NO remain buy date');
	dump($_SESSION['remain_buy']['cost'] ?? 'NO remain buy cost');
	dump('<hr>');
	dump($_SESSION['remain_sell']['quantity'] ?? 'NO remain sell quantity');
	dump($_SESSION['remain_sell']['date'] ?? 'NO remain sell date');
	dump($_SESSION['remain_sell']['cost'] ?? 'NO remain sell cost');
	echo '<hr>';
}


$funcName = 'warn';
if (!function_exists($funcName)) {
	function warn(string $message): void
	{
		logger($message . '<br>', 'warn');
	}
}
