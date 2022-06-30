<?php

use Ziehzeit\Burnengine\Model\API\Get\Getter;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_WARNING);


require_once __DIR__.'/../../../../../autoload.php';
require_once __DIR__.'/../../../core.php';

echo "<hr>";
dumpvar($_POST);
dumpvar($_GET);
echo "<hr>";

echo "nice";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../');
$dotenv->load();

new Getter();