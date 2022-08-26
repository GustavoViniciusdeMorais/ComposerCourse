<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Gustavo\Package\Controllers\MainController;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('gustavo.log', Level::Warning));

// add records to the log
$log->warning((new MainController)->test("May the force be with you."));
// $log->error('Bar');