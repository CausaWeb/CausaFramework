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

if (!function_exists('get_manifest_libs')) {
	function get_manifest_libs(): array
	{
		$s = [];
		$path = __DIR__ . '/../../../public/assets/.vite/manifest.json';

		$manifest = file_exists($path)
			? json_decode(file_get_contents($path), true)
			: [];

		$libs = $manifest['src/assets/js/app.js'];

		$s[] = '<script type="module" src="/assets/' . $libs['file'] . '"></script>';
		foreach ($libs['css'] as $css) {
			$s[] = '<link rel="stylesheet" href="/assets/' . $css . '">';
		}

		return $s;
	}
}

if (!function_exists('get_vite_libs')) {
	function get_vite_libs($vitePort = 5173): array
	{
		$s = [];

		$libs = [
			['type' => 'js', 'file' => '@vite/client'],
			['type' => 'js', 'file' => 'src/assets/js/app.js'],
			['type' => 'css', 'file' => 'src/assets/css/app.css']
		];

		foreach ($libs as $lib) {
			if ($lib['type'] === 'js') {
				$s[] = '<script type="module" src="http://localhost:' . $vitePort . '/' . $lib['file'] . '"></script>';
			} elseif ($lib['type'] === 'css') {
				$s[] = '<link rel="stylesheet" href="http://localhost:' . $vitePort . '/' . $lib['file'] . '">';
			}
		}

		return $s;
	}
}

if (!function_exists('get_htmx_link')) {
	function get_htmx_link(string $href)
	{
		return '<a href="' . $href . '" hx-get="' . $href . '" hx-target="#app-content" hx-push-url="true" hx-indicator="#htmx-loader">';
	}
}
