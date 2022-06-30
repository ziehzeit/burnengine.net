<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_WARNING);


require_once __DIR__.'/../../../../autoload.php';
require_once __DIR__.'/../../../core.php';

dumpvar(new \Ziehzeit\Burnengine\Model\API\Post\Read());