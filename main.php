#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->setName('Simple file encrypt/decrypt script');

// ... register commands

$application->run();
