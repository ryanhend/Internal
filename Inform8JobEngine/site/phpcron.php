<?php

// TODO: Delete this
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

require_once 'config/settings.php';

$finder = new DBFinder();

$manager = new ExecutionManager($finder);

$manager->run();