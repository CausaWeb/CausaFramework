<?php

namespace App\Api\Classes;

use App\Traits\ApiCache;
use GuzzleHttp\Exception\RequestException;

abstract class BaseEndpoint
{
	use ApiCache;

	protected static string $endpoint = ''; // must be defined in child

	protected static function get(string $path = '', array $query = [], int $ttl = 600): ?array
	{
		$url = static::$endpoint . $path;
		$key = self::cacheKey($url, $query);

		if ($cached = self::cacheGet($key, $ttl)) {
			return json_decode($cached, true);
		}

		try {
			$response = Api::client()->get($url, ['query' => $query]);
			$json = $response->getBody()->getContents();

			if ($response->getStatusCode() === 200) {
				self::cachePut($key, $json);
			}

			return json_decode($json, true);
		} catch (RequestException $e) {
			error_log("API Error [{$url}]: " . $e->getMessage());

			if ($cached = self::cacheGet($key, PHP_INT_MAX)) {
				error_log("Serving stale cache for {$url}");
				return json_decode($cached, true);
			}

			return null;
		}
	}

	protected static function post(string $path, array $data = []): ?array
	{
		$url = static::$endpoint . $path;

		try {
			$response = Api::client()->post($url, ['json' => $data]);
			$json = $response->getBody()->getContents();

			return json_decode($json, true);
		} catch (RequestException $e) {
			error_log("API POST Error [{$url}]: " . $e->getMessage());
			return null;
		}
	}
}
