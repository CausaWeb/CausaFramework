<?php

namespace App\DevTools\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestPestCommand extends Command
{

	protected static $defaultName = 'pest:test';

	protected function configure()
	{
		$this->setName(self::$defaultName)
			->setDescription('Runs PEST tests');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$run = shell_exec("./vendor/bin/pest");

		if ($run) {
			$output->writeln($run);

			return Command::SUCCESS;
		}

		return Command::FAILURE;
	}
}
