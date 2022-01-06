<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use William\SchoonerCommand\ScoreCommand;
use William\SchoonerCommand\TopCategoryCommand;

$app = new Application('Schooner Dice');
$app->add(new ScoreCommand());
$app->add(new TopCategoryCommand());
$app->run();