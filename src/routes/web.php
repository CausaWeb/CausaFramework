<?php

// Define routes (Laravel-style)

/** @var \App\App $app */
$app->get('/', 'App\Http\Controllers\HomeController@index');

$app->get('/acerca-de', 'App\Http\Controllers\AcercaDeController@index');
