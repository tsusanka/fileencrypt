<?php

namespace App;

use Defuse\Crypto\File;


class DecryptCommand extends CryptCommand
{

	protected function configure()
	{
		$this->setName('decrypt')
			->setDescription('Decrypts a file');
	}

	protected function runAction($password)
	{
		File::decryptFileWithPassword($this->inputFile, $this->outputFile, $password);
	}

}
