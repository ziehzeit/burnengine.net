<?php

use Ziehzeit\Burnengine\Controller\API\Set\Setter;

require_once '../standardEnvironment.php';

try {
    new Setter();
}catch (Exception $e){
    echo $e->getMessage();
}