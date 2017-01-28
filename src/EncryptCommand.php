<?php

namespace App;

use Defuse\Crypto\File;


class EncryptCommand extends CryptCommand
{

	protected function configure()
	{
		$this->setName('encrypt')
			->setDescription('Encrypts a file');
	}

	protected function runAction($password)
	{
		File::encryptFileWithPassword($this->inputFile, $this->outputFile, $password);
	}

}
