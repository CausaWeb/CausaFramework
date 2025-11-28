<?php

namespace App\Http\Controllers;

use App\Traits\HtmxRenderable;
use Dotenv\Dotenv;
use eftec\bladeone\BladeOne;

class Controller
{
	use HtmxRenderable;

	public function __construct(protected BladeOne $blade) {}
}
