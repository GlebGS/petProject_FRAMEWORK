<?php

namespace Core;

use Core\Patterns\TSingleton;
use RedBeanPHP\R;

class DB
{

    use TSingleton;

    public function __construct()
    {
        $db = require_once CONFIG . "/env.php";

        R::setup($db["dsn"], $db['login'], $db['password']);

        if(!R::testConnection())
        {
            throw new \Exception("Не удалось подключиться в БАЗЕ ДАННЫХ", 500);
        }
    }
}