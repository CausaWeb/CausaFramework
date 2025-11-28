<?php

namespace App\Api\Endpoints;

use App\Api\Classes\BaseEndpoint;

class Products extends BaseEndpoint
{
	protected static string $endpoint = '/api/products/';

	public static function all(int $ttl = 600): ?array
	{
		return self::get('', [], $ttl);
	}

	public static function find(int $id, int $ttl = 1800): ?array
	{
		return self::get($id, [], $ttl);
	}
}
