<?php

namespace Ziehzeit\Burnengine\Model\Database;

use PDO;
use PDOException;

class Connection
{
    protected Database $database;

    public function __construct()
    {
        $this->setDatabase();
    }

    /**
     * @return PDO
     */
    public function connect(): PDO
    {
        $database = $this->getDatabase();
        $connection = false;

        try {
            $connection = new PDO('mysql:host='.$database->getHost()
                .';dbname=' .$database->getDatabasename(),
                $database->getUsername(), $database->getPassword());

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $pdo){
            echo $pdo->getMessage()."<br>";
        }

        return $connection;
    }

    /**
     * @return void
     */
    public function setDatabase(): void
    {
        $this->database = new Database();
    }

    /**
     * @return Database
     */
    public function getDatabase(): Database
    {
        return $this->database;
    }
}

