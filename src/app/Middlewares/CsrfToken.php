<?php

namespace App\Middlewares;

class CsrfToken
{
	private const TOKEN_KEY = 'csrf_token';

	protected static $allowed = ['POST', 'PUT', 'DELETE'];

	public static function handle()
	{
		if (in_array($_SERVER['REQUEST_METHOD'], self::$allowed)) {
			$token = $_POST[self::TOKEN_KEY] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

			if (!isset($_SESSION[self::TOKEN_KEY]) || !hash_equals($_SESSION[self::TOKEN_KEY], $token)) {
				http_response_code(403);
				exit('CSRF token mismatch');
			}
		}
	}

	public static function getCsrfToken()
	{
		if (!isset($_SESSION[self::TOKEN_KEY])) {
			$_SESSION[self::TOKEN_KEY] = bin2hex(random_bytes(32));
		}

		// append csrf_token to $this->data
		return $_SESSION[self::TOKEN_KEY];
	}
}
