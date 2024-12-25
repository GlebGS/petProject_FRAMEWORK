<?php

namespace Core;

use \Core\Patterns\Registry;

class App
{
    public static $app;

    public function __construct()
    {
        new ErrorHandler();
        new Router();

        self::$app = Registry::getInstance();      

        Router::matchRoute($_SERVER["REQUEST_URI"]);
    }

}