<?php

namespace App\Http\Controllers;

class AcercaDeController extends Controller
{
	public function index()
	{
		$this->view = 'acerca-de';
		$this->data = [
			'title' => 'Acerca de',
		];

		echo $this->render();
	}
}
