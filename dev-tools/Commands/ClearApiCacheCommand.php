<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearApiCacheCommand extends Command
{

	protected static $defaultName = 'cache:clear-api';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('It clears API data cache');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$path = __DIR__ . '/../../cache/api/*.json';
		$files = glob($path);

		foreach ($files as $file) {
			unlink($file);
		}

		$output->writeln("Cleared API data cache.");

		return Command::SUCCESS;
	}
}
