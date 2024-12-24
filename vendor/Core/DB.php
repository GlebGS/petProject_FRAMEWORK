<?php

namespace Core;

use Core\Patterns\TSingleton;
use PDO;

class DB
{

    use TSingleton;

    public static object $connect;

    public static function connect($data){
        try{
            self::$connect = new PDO("{$data['db']}:host={$data['host']};dbname={$data['db_name']}", $data['login'], $data['password']);
        }catch(\Exception){
            throw new \Exception("Не удалось подключиться в БАЗЕ ДАННЫХ", 500);
        }
    }

    

}