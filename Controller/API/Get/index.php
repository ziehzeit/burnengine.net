<?php
use Ziehzeit\Burnengine\Controller\API\Get\Getter;

require_once __DIR__.'/../standardEnvironment.php';

try {
    new Getter();
}catch (PDOException | Exception $e){
    echo $e->getMessage();
}