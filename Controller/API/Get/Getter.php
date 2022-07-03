<?php

namespace Ziehzeit\Burnengine\Controller\API\Get;

use Exception;
use PDO;
use Ziehzeit\Burnengine\Controller\API\APIBase;
use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Post;

class Getter extends APIBase
{
    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $postObject = new Post(new Connection());

        $result = $postObject->read();

        $num = $result->rowCount();

        if ($num > 0){
            $data = [];

            $data['data'] = [];

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row){
                $data_item = [
                    'USER_ID'           => $row['beuserid'],
                    'USER_TYPE'         => $row['beusertype'],
                    'USER_IP_ADDRESS'   => $row['beipaddress'],
                    'USER_MAC_ADDRESS'  => $row['bemacaddress'],
                    'TIMESTAMP'         => $row['bemacaddress'],
                ];
                $data['data'][] = $data_item;
            }
            echo json_encode($data);
        }else{
            throw new Exception('No Data found in Database!');
        }
    }
}