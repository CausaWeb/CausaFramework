<?php

namespace App\Services;

class Navigation
{
	private static $links = [
		['url' => '/', 'label' => 'Inicio'],
		['url' => '/acerca-de', 'label' => 'Acerca De'],
		//
	];

	public static function getAppLinks(): array
	{
		return self::$links;
	}

	public static function getNavLinks(): array
	{
		// usually header links obviate 'home'
		return \array_slice(self::$links, 1);
	}
}
