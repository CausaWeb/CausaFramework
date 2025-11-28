<?php

if (!function_exists('log_error')) {
	function log_error(string|array $message): void
	{
		$date = date('Y-m-d H:i:s');
		$logLine = "[{$date}] ";

		if (gettype($message) === 'array') {
			$logLine .= json_encode($message);
		} else {
			$logLine .= $message;
		}

		error_log("{$logLine}\n", 3, __DIR__ . '/../../../error.log');
	}
}

if (!function_exists('env')) {
	function env(string $key)
	{
		return $_ENV[$key] ?? '';
	}
}

if (!function_exists('get_star_rating')) {
	function get_star_rating(float|int|string $rate, int $max = 5): float|int
	{
		return $rate * 100 / $max;
	}
}
