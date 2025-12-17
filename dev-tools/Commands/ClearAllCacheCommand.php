<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearAllCacheCommand extends Command
{

	protected static $defaultName = 'cache:clear-all';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('It clears Blade views & API data cache');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$commands = ['cache:clear', 'cache:clear-api'];
		$app = $this->getApplication();

		foreach ($commands as $command) {
			$cliApp = $app->find($command);
			$cliApp->run($input, $output);
		}

		return Command::SUCCESS;
	}
}
