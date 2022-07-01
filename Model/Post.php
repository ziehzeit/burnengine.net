<?php

namespace Ziehzeit\Burnengine\Model;

use PDOStatement;
use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;

class Post extends Core
{
    # dbs tuff
    private Connection $connection;
    private string $table = 'users';

    public function __construct(Connection $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * @return bool|PDOStatement
     */
    public function read(): bool|PDOStatement
    {
        $query = 'Select * from '.$this->table.';';

        $instance = $this->getConnection()->connect()->prepare($query);

        $instance->execute();

        return $instance;
    }

    /**
     * @param Dataset $dataset
     * @return false|PDOStatement
     */
    public function write(Dataset $dataset): bool|PDOStatement
    {
        $query =
            'insert into '.$this->table
            .' (`beusertype`, `beipaddress`, `bemacaddress`) 
            VALUES('.quote($dataset->getUserType()).','.quote($dataset->getUserIpAddress()).','.quote($dataset->getUserMacAddress()).');';
        $instance = $this->getConnection()->connect()->prepare($query);
        $instance->execute();
        return $instance;
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->connection;
    }

    /**
     * @param Connection $connection
     */
    public function setConnection(Connection $connection): void
    {
        $this->connection = $connection;
    }
}