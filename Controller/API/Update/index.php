<?php

use Ziehzeit\Burnengine\Controller\API\Update\Updater;

require_once '../standardEnvironment.php';

try {
    new Updater();
}catch (Exception $e){
    echo $e->getMessage();
}