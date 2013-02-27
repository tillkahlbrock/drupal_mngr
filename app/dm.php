#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DrupalMngr\Command\UpgradeCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new UpgradeCommand());
$application->run();
