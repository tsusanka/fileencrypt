#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/CryptCommand.php';
require __DIR__ . '/EncryptCommand.php';
require __DIR__ . '/DecryptCommand.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;


$application = new Application('fileencrypt', '0.1');

$encryptCommand = new \App\EncryptCommand();
$encryptCommand->addArgument('input', InputArgument::REQUIRED, 'Input file to be encrypted (plaintext)')
	->addArgument('output', InputArgument::REQUIRED, 'Output file');

$decryptCommand = new \App\DecryptCommand();
$decryptCommand->addArgument('input', InputArgument::REQUIRED, 'Input file to be decrypted (ciphertext)')
	->addArgument('output', InputArgument::REQUIRED, 'Output file');


$application->add($encryptCommand);
$application->add($decryptCommand);

$application->run();
