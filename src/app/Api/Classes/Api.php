<?php

namespace App\Api\Classes;

use GuzzleHttp\Client;
use RuntimeException;

final class Api
{
	private static ?Client $client = null;

	public static function client(array $extraHeaders = []): Client
	{
		if (self::$client === null) {
			$baseUrl = env('API_BASE_URL') ?: null;
			$token   = env('API_BEARER_TOKEN') ?: null;

			if (!$baseUrl) {
				throw new RuntimeException('API_BASE_URL missing in environment');
			}

			// Base headers
			$headers = [
				'Accept'     => 'application/json',
				'User-Agent' => 'CausaFramework/1.0 (+https://wpe.net.pe)',
			];

			// Add Authorization only if token is set
			if (!empty($token)) {
				$headers['Authorization'] = 'Bearer ' . $token;
			}

			// Merge with any extra headers
			$headers = array_merge($headers, $extraHeaders);

			self::$client = new Client([
				'base_uri' => $baseUrl,
				'timeout'  => 10.0,
				'headers'  => $headers,
			]);
		}

		return self::$client;
	}

	public static function reboot(): void
	{
		self::$client = null;
		self::client();
	}
}
