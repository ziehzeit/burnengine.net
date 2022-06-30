<?php

namespace Ziehzeit\Burnengine\Model;

use PDOStatement;
use Ziehzeit\Burnengine\Model\Database\Connection;

class Post extends \Ziehzeit\Burnengine\Model\Core
{
    # dbs tuff
    private Connection $connection;
    private string $table = 'Users';

    #post stuff
    protected string $userId;
    protected string $userType;
    protected string $userName;
    protected string $timeDate;

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