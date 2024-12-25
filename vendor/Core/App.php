<?php

namespace Core;

use \Core\Patterns\Registry;

class App
{
    public static $app;
    public static $dataBase;

    public function __construct()
    {
        new ErrorHandler();
        new Router();

        self::$app = Registry::getInstance();
        self::$dataBase = DB::getInstance();        
        
        // DataBase
        $this->getDataBaseParams();
        self::$dataBase::connect(self::$app::getProperties());
        
        Router::matchRoute($_SERVER["REQUEST_URI"]);
    }

    public static function getDataBaseParams()
    {
        $instance = require_once CONFIG . "/env.php";
        foreach($instance as $k => $v){
            self::$app::setProperty($k, $v);
        }

    }

}