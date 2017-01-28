<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;


abstract class CryptCommand extends Command
{

	protected function checkPaths($inputFile, $outputFile)
	{
		if (!file_exists($inputFile) || !file_exists($outputFile)) {
			return FALSE;
		}
		return TRUE;
	}

	protected function askForPassword(InputInterface $input, OutputInterface $output)
	{
		$helper = $this->getHelper('question');

		$question = new Question('Enter passphrase: ');
		$question->setHidden(TRUE);

		return $helper->ask($input, $output, $question);
	}

}
