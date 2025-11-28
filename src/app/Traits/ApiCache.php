<?php

namespace App\Traits;

use RuntimeException;

trait ApiCache
{
	private static string $cacheDir = __DIR__ . '/../../../cache/api/';

	private static function cacheGet(string $key, int $ttl): ?string
	{
		$file = self::$cacheDir . $key . '.json';

		if (file_exists($file) && (time() - filemtime($file)) < $ttl) {
			return file_get_contents($file) ?: null;
		}

		return null;
	}

	private static function cachePut(string $key, string $json): void
	{
		if (!is_dir(self::$cacheDir) && !mkdir(self::$cacheDir, 0755, true) && !is_dir(self::$cacheDir)) {
			throw new RuntimeException("Failed to create cache directory: " . self::$cacheDir);
		}

		if (false === file_put_contents(self::$cacheDir . $key . '.json', $json, LOCK_EX)) {
			throw new RuntimeException("Failed to write cache file for key {$key}");
		}
	}

	private static function cacheKey(string $endpoint, array $query = []): string
	{
		ksort($query);
		return md5($endpoint . json_encode($query));
	}

	public static function invalidate(string $pattern = '*'): void
	{
		foreach (glob(self::$cacheDir . ($pattern === '*' ? '*' : $pattern) . '.json') as $file) {
			@unlink($file);
		}
	}
}
