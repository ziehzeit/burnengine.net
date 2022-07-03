<?php

namespace Ziehzeit\Burnengine\Controller\API\Update;

use Ziehzeit\Burnengine\Controller\API\APIBase;
use Ziehzeit\Burnengine\Extensions\Model\Parameter\UpdateValidator;

class Updater extends APIBase
{
    public function __construct()
    {
        parent::__construct();

        $this->getParameterRegistry()->registerParameter('token');

        $updateValidator = new UpdateValidator($_GET);

        $this->setValidator($updateValidator);

        $this->getValidator()->correctPass() ? $this->run() : throw new \Exception('Token is incorrect!');

        #ToDo: add table for tokens in db
        # hash/ hide them with pw given in .env
    }
}