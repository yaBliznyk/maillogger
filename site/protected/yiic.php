<?php

// change the following paths if necessary
require dirname(__FILE__) . '/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$yiic=dirname(__FILE__).'/../framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);