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
        new Router();

        self::$app = Registry::getInstance();
        self::$db = DB::getInstance();
        
        // DB
        $this->getDB_params();
        self::$db::connect(self::$app::getProperties());
        
        $uri = $_SERVER["REQUEST_URI"];

        Router::matchRoute($uri);
        Router::dispatch();

    }

    public static function getDB_params()
    {
        $instance = require_once CONFIG . "/env.php";
        foreach($instance as $k => $v){
            self::$app::setProperty($k, $v);
        }

    }

}