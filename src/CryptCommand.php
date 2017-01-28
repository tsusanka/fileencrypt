<?php

namespace App;

use Defuse\Crypto\Exception\IOException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;


abstract class CryptCommand extends Command
{

	/** @var string */
	protected $inputFile;

	/** @var string */
	protected $outputFile;


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->inputFile = $input->getArgument('input');
		$this->outputFile = $input->getArgument('output');

		if (!$this->checkPaths()) {
			$output->writeln('Error: No such files exist');
			return 1;
		}

		$password = $this->askForPassword($input, $output);
		try {
			$this->runAction($password);
		} catch (IOException $e) {
			$output->writeln('Unexpected error occurred: ' . $e->getMessage());
			return 2;
		}

		return 0;
	}

	abstract protected function runAction($password);


	private function checkPaths()
	{
		if (!file_exists($this->inputFile) || !file_exists($this->outputFile)) {
			return FALSE;
		}
		return TRUE;
	}

	private function askForPassword(InputInterface $input, OutputInterface $output)
	{
		$helper = $this->getHelper('question');

		$question = new Question('Enter passphrase: ');
		$question->setHidden(TRUE);

		return $helper->ask($input, $output, $question);
	}

}
