<?php

namespace App;

use Defuse\Crypto\Exception\IOException;
use Defuse\Crypto\File;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class EncryptCommand extends CryptCommand
{

	protected function configure()
	{
		$this->setName('encrypt')
			->setDescription('Encrypts a file');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$inputFile = $input->getArgument('input');
		$outputFile = $input->getArgument('output');

		if (!$this->checkPaths($inputFile, $outputFile)) {
			$output->writeln('Error: No such files exist');
			return 1;
		}

		$password = $this->askForPassword($input, $output);

		try {
			File::encryptFileWithPassword($inputFile, $outputFile, $password);
		} catch (IOException $e) {
			$output->writeln('Unexpected error occurred: ' . $e->getMessage());
			return 2;
		}
	}

}
