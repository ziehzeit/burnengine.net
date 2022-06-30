<?php

use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Post;

class Read
{
    /**
     * @throws Exception
     */
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $postObject = new Post(new Connection());

        $result = $postObject->read();

        $num = $result->rowCount();

        if ($num > 0){
            $data = [];

            $data['data'] = [];

            foreach ($result->fetch(PDO::FETCH_ASSOC) as $row){
                extract($row);

                $data_item = [
                    'userID' => $id,
                    'userType' => $userType,
                    'dateTime' => $dateTime,
                    'username' => $username,
                ];

                $data['data'] = $data_item;
            }

            echo json_encode($data);
        }else{
            throw new Exception('No Data found in Database!');
        }
    }
}