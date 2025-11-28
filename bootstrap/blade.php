<?php

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/../src/views';
$cache = __DIR__ . '/../cache';

$displayErrors = env('APP_DISPLAY_ERRORS') ?? false;

if ($displayErrors === true) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

return new BladeOne($views, $cache, BladeOne::MODE_AUTO);
