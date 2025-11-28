<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeViewCommand extends Command
{
	protected static $defaultName = 'make:view';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('Creates a new blade view file')
			->addArgument('name', InputArgument::REQUIRED, 'Blade view name (may include dashes/underscores)');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$rawName = strtolower($input->getArgument('name'));

		// Normalize slug: replace underscores with dashes
		$slug = str_replace('_', '-', $rawName);

		// Create view file
		self::createBladeFile($slug, $output);

		return Command::SUCCESS;
	}

	public static function createBladeFile($slug, $output)
	{
		$content = file_get_contents(__DIR__ . '/../stubs/page.stub');
		$path = __DIR__ . '/../../src/views/pages/' . $slug . '.blade.php';

		if (!is_dir(dirname($path))) {
			mkdir(dirname($path), 0755, true);
		}

		file_put_contents($path, $content);

		// remove '../' from path
		$path = realpath($path);

		$output->writeln("<info>Blade view created:</info> <comment>$path</comment>");
	}
}
