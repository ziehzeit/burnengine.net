<?php

namespace Ziehzeit\Burnengine\Controller\API\Set;

use Exception;
use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;
use Ziehzeit\Burnengine\Model\Parameter\Validator;
use Ziehzeit\Burnengine\Model\Post;

class Setter
{
    /**
     * @throws Exception
     */
    public function __construct()
    {
        $validator = new Validator($_GET);

        if (false === empty($_GET) and $validator->urlParameterCheck()){
            $dataset = new Dataset();
            $dataset->setRawContent($_GET);
            $dataset->setUserIpAddress($_GET['ip']);
            $dataset->setUserMacAddress($_GET['mac']);
            $dataset->setUserType($_GET['ut']);

            $post = new Post(new Connection());
            $post->write($dataset);
        }
    }
}