<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use App\Config;

class DB
{

    protected Connection $connection;


    public function __construct(array $config)
    {

        $this->connection = DriverManager::getConnection($config);
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }
}
