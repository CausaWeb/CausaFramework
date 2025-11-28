<?php

namespace App\DevTools\Commands;

use App\DevTools\Commands\MakeViewCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakePageCommand extends Command
{
	protected static $defaultName = 'make:page';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('Creates a new blade view, controller and registers it in web.php routes file')
			->addArgument('name', InputArgument::REQUIRED, 'Page name (may include dashes/underscores)');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$rawName = strtolower($input->getArgument('name'));

		// Normalize slug: replace underscores with dashes
		$slug = str_replace('_', '-', $rawName);

		// Normalize controller name: about-us → AboutUs, product_details → ProductDetails
		$controllerName = $this->normalizeControllerName($slug);

		// Create view file
		MakeViewCommand::createBladeFile($slug, $output);

		// Create controller via existing command
		$this->makeController($controllerName, $output);

		// Append route to routes/web.php
		$route = $this->appendRoute($slug, $controllerName);

		$output->writeln("<info>Route added:</info> <comment>$route</comment>");

		return Command::SUCCESS;
	}

	// privates
	private function normalizeControllerName(string $slug): string
	{
		// Split on dashes/underscores
		$parts = preg_split('/[-_]+/', $slug);

		// Capitalize each part and join
		return implode('', array_map('ucfirst', $parts));
	}

	private function makeController($controllerName, $output)
	{
		$command = 'make:controller';
		$cliApp = $this->getApplication()->find($command);
		$arguments = [
			'command' => $command,
			'name' => $controllerName,
		];
		$cliApp->run(new ArrayInput($arguments), $output);
	}

	private function appendRoute($slug, $controllerName)
	{
		$route = "\n\$app->get('/{$slug}', 'App\\Http\\Controllers\\{$controllerName}Controller@index');\n";
		$routesPath = __DIR__ . '/../../src/routes/web.php';

		file_put_contents($routesPath, $route, FILE_APPEND);

		return "{$_ENV['APP_URL']}/$slug";
	}
}
