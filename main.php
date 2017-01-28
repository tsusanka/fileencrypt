#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/EncryptCommand.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;


$application = new Application('fileencrypt', '0.1');

$encryptCommand = new \App\EncryptCommand();
$encryptCommand->addArgument('input', InputArgument::REQUIRED, 'Input file to be encrypted')
	->addArgument('output', InputArgument::REQUIRED, 'Output file');


$application->add($encryptCommand);

$application->run();
