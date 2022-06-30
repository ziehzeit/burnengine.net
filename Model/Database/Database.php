<?php

namespace Ziehzeit\Burnengine\Model\Database;

use Exception;

class Database
{
    private string $databasename;
    private string $username;
    private string $password;
    private string $host;
    private string $port;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if ('false' === $_ENV['zz_WAS_NOTICED']){
            throw new Exception('The .env file was not noticed. Please, check it out. :)');
        }else{
            $this->setDatabasename($_ENV['ZZ_DATABASENAME']);
            $this->setUsername($_ENV['ZZ_USERNAME']);
            $this->setPassword($_ENV['ZZ_PASSWORD']);
            $this->setHost($_ENV['ZZ_HOST']);
            $this->setPort($_ENV['ZZ_PORT']);
        }
    }

    /**
     * @param mixed|string $databasename
     */
    protected function setDatabasename(mixed $databasename): void
    {
        $this->databasename = $databasename;
    }

    /**
     * @param mixed|string $username
     */
    protected function setUsername(mixed $username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed|string $password
     */
    protected function setPassword(mixed $password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed|string $host
     */
    protected function setHost(mixed $host): void
    {
        $this->host = $host;
    }

    /**
     * @param mixed|string $port
     */
    protected function setPort(mixed $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getDatabasename(): string
    {
        return $this->databasename;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }
}