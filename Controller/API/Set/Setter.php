<?php

namespace Ziehzeit\Burnengine\Controller\API\Set;

use Exception;
use Ziehzeit\Burnengine\Controller\API\APIBase;
use Ziehzeit\Burnengine\Extensions\Model\Parameter\UpdateValidator;
use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;
use Ziehzeit\Burnengine\Model\Parameter\Validator;
use Ziehzeit\Burnengine\Model\Post;

class Setter extends APIBase
{
    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();

        $updateValidator = new UpdateValidator($_GET);

        $this->setValidator($updateValidator);

        $this->getValidator()->correctPass() ? $this->run() : throw new \Exception('Token is incorrect!');

        $post = new Post(new Connection());
        $post->write($this->getDataset());
    }
}