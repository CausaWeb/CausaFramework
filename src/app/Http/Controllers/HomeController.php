<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
	public function index()
	{
		$this->view = 'home';
		$this->data = [
			'title' => env('APP_NAME'),
			'page' => 'product-detail',
			'controllerName' => 'ProductDetail',
			'appUrl' => env('APP_URL'),
		];

		echo $this->render();
	}
}
