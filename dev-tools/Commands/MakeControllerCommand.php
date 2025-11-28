<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeControllerCommand extends Command
{
	protected static $defaultName = 'make:controller';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('Creates a new controller')
			->addArgument('name', InputArgument::REQUIRED, 'Controller name');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$name = $input->getArgument('name');
		$className = "{$name}Controller";
		$view = $this->getViewName($name);

		$stub = file_get_contents(__DIR__ . '/../stubs/controller.stub');
		$content = str_replace(['{{class}}', '{{view}}', '{{title}}'], [$className, $view, $this->getTitle($view)], $stub);

		$path = __DIR__ . '/../../src/app/Http/Controllers/' . $className . '.php';
		if (!is_dir(dirname($path))) {
			mkdir(dirname($path), 0755, true);
		}

		file_put_contents($path, $content);

		// clean path from '../'
		$path = realpath($path);

		$output->writeln("<info>Controller created: $className </info><comment>$path</comment>");

		return Command::SUCCESS;
	}

	// privates
	private function getViewName(string $name): string
	{
		// Insert a dash before each uppercase letter (except at start)
		$slug = preg_replace('/(?<!^)[A-Z]/', '-$0', $name);

		// Lowercase the whole string
		return strtolower($slug);
	}

	private function getTitle(string $view): string
	{
		return ucfirst(str_replace(['-', '_'], ' ', $view));
	}
}
