<?php

namespace App;

use App\DB;
use Exception;
use App\Exception\RouteNotFoundException;

class Load
{
    private static DB $db;

    public function __construct(
        protected Routing $routing,
        protected array $request,
        protected Config $config
    ) {

        static::$db = new DB($config->db ?? []);
    }

    public static function db(): DB
    {
        return static::$db;
    }


    public function run()
    {
        try {
            echo $this->routing->resolve(
                $this->request['uri'],
                strtolower($this->request['method']),
            );
        } catch (Exception $e) {
            http_response_code(404);
            echo $e->getMessage();
        }
    }
}
