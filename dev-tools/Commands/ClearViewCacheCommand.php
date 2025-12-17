<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearViewCacheCommand extends Command
{

	protected static $defaultName = 'cache:clear';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('It clears Blade views cache');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$path = __DIR__ . '/../../cache/*.bladec';
		$files = glob($path);

		foreach ($files as $file) {
			unlink($file);
		}

		$output->writeln("Cleared Blade views cache.");

		return Command::SUCCESS;
	}
}
