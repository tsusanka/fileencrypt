<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;


class EncryptCommand extends Command
{

	protected function configure()
	{
		$this->setName('encrypt')
			->setDescription('Encrypts a file');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$password = $this->askForPassword($input, $output);
	}

	private function askForPassword(InputInterface $input, OutputInterface $output)
	{
		$helper = $this->getHelper('question');

		$question = new Question('Enter passphrase: ');
		$question->setHidden(true);

		return $helper->ask($input, $output, $question);
	}

}
