<?php

namespace Ziehzeit\Burnengine\Model\Database\Handling\Set;

use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;
use Ziehzeit\Burnengine\Model\Post;

class PlaceDataSet
{
    public function placeDataSet(Connection $conn, Dataset $dataset){
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