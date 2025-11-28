<?php

namespace App;

use App\Services\BladeServiceProvider;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use eftec\bladeone\BladeOne;

class App
{
	protected $routes = [];

	protected $middlewares = [];

	public function __construct(protected BladeOne $blade)
	{
		$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$currentPath = rawurldecode($currentPath);

		$vitePort = env('VITE_PORT');

		BladeServiceProvider::register($blade, $currentPath, $vitePort);

		/*$this->blade->share('currentPath', $currentPath);
		$this->blade->share('appLinks', Navigation::getAppLinks());*/
	}

	public function get(string $path, string $handler): void
	{
		$this->routes[] = ['GET', $path, $handler];
	}

	public function post(string $path, string $handler): void
	{
		$this->routes[] = ['POST', $path, $handler];
	}

	public function put(string $path, string $handler): void
	{
		$this->routes[] = ['PUT', $path, $handler];
	}

	public function delete(string $path, string $handler): void
	{
		$this->routes[] = ['DELETE', $path, $handler];
	}

	public function addMiddleware(string $middlewareClass): void
	{
		$this->middlewares[] = $middlewareClass;
	}

	public function dispatch(): void
	{
		// run middlewares
		$this->runMiddlewares();

		$dispatcher = simpleDispatcher(function (RouteCollector $r) {
			foreach ($this->routes as [$method, $path, $handler]) {
				$r->addRoute($method, $path, $handler);
			}
		});

		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];
		if (false !== $pos = strpos($uri, '?')) {
			$uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
			case \FastRoute\Dispatcher::NOT_FOUND:
				echo "404 Not Found";
				break;
			case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
				echo "405 Method Not Allowed";
				break;
			case \FastRoute\Dispatcher::FOUND:
				$this->resolve($routeInfo[1], $routeInfo[2]);
				break;
		}
	}

	// protecteds
	protected function resolve(string $handler, array $vars): void
	{
		[$class, $method] = explode('@', $handler);

		// controller instatiation
		$controller = new $class($this->blade);

		call_user_func_array([$controller, $method], $vars);
	}

	public function runMiddlewares()
	{
		foreach ($this->middlewares as $i) {
			$i::handle();
		}
	}
}
