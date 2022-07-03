<?php

namespace Ziehzeit\Burnengine\Controller\API\Set;

use Exception;
use Ziehzeit\Burnengine\Controller\API\APIBase;
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

        $post = new Post(new Connection());
        $post->write($this->getDataset());
    }
}