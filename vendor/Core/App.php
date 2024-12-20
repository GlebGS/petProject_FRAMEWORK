<?php

namespace Core;

use \Core\Patterns\Registry;

class App
{
    public static $app;
    public static $db;

    public function __construct()
    {
        new ErrorHandler();

        self::$app = Registry::getInstance();
        self::$db = DB::getInstance();
        
        $this->getDB_params();
        self::$db::connect(self::$app::getProperties());
    }

    public static function getUser_params()
    {
        $instance = require_once CONFIG . "/user.php";
        foreach($instance as $k => $v){
            self::$app::setProperty($k, $v);
        }
    }

    public static function getAdmin_params()
    {
        $instance = require_once CONFIG . "/admin.php";
        foreach($instance as $k => $v){
            self::$app::setProperty($k, $v);
        }
    }

    public static function getDB_params()
    {
        $instance = require_once CONFIG . "/env.php";
        foreach($instance as $k => $v){
            self::$app::setProperty($k, $v);
        }
    }

}