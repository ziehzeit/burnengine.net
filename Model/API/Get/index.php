<?php

use Ziehzeit\Burnengine\Model\API\Get\Getter;

if ($_POST['debug'] === 'true' or $_GET['debug'] === 'true'){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL & ~E_WARNING);
}

require_once __DIR__.'/../../../../../autoload.php';
require_once __DIR__.'/../../../core.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../');
$dotenv->load();

try {
    new Getter();
}catch (PDOException | Exception $e){
    echo $e->getMessage();
}