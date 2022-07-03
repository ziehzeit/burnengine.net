<?php

namespace Ziehzeit\Burnengine\Model;

use PDOStatement;
use Ziehzeit\Burnengine\Model\Database\Connection;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;
use Ziehzeit\Burnengine\Model\Parameter\ParameterRegistry;

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
     * @param Dataset $dataset
     * @return void
     */
    public function update(Dataset $dataset):void
    {
        $paramReg = new ParameterRegistry();
        $paramReg->setParameterList($_GET);
        $paramReg->setParameterList($paramReg->removeParameter('token'));

        $arrayLength = count($dataset->getRawContent());
        $arrayKeys = array_keys($paramReg->getParameterList());

        $query = 'update '.$this->table.' set (';

        for($i = 0; $i < $arrayLength-1; $i++){
            $arrayKey = $arrayKeys[$i];

            if (false === $dataset->isToken($arrayKey)){
                if ($this->assertSame($i, $arrayLength-2)){
                    $query = $query.''.$arrayKeys[$i].')';
                }else{
                    $query = $query.''.$arrayKeys[$i].',';
                }
            }
        }

        $query .= ' VALUES(';

        for($i = 0; $i < $arrayLength-1; $i++){
            $arrayValue = $dataset->getRawContent()[$arrayKeys[$i]];
            $arrayKey = $arrayKeys[$i];

            if ($this->assertSame($i, ($arrayLength-2))){
                if ($this->assertSame($arrayKey, 'ut')){
                    $query = $query."".$arrayValue.")";
                }else{
                    $query = $query."'".$arrayValue."')";
                }
            }else{
                if ($this->assertSame($arrayKey, 'ut')){
                    $query = $query.$arrayValue.",";
                }else{
                    $query = $query."'".$arrayValue."',";
                }
            }
        }

        echo $query;
        die();
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