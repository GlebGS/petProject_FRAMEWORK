<?php

namespace Core;

use Exception;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];
    protected static $uri = '';

    protected static $controller;
    protected static $controller_prefix;


    public static function add($uri, $route = [])
    {
        return self::$routes[$uri] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch()
    {
        $uri_Controller = upperCamelCase(self::$route["controller"]) . "Controller";
        $controller = "App\Controllers\\" . self::$controller_prefix . "{$uri_Controller}";

        $action = lowerCamelCase(self::$route["method"]);

        if(class_exists($controller))
        {
            $controllerObject = new $controller(self::$route);

            if(method_exists($controllerObject, $action)){
                $controllerObject->$action();
                $controllerObject->getView(self::$route);
            }else{
                throw new Exception("Метод {$controller}::" . $action . " не найден!", 500);
            }

        }else{
            throw new Exception("Класса {$controller} не существует!", 500);
        }
    }

    public static function matchRoute($uri)
    {
        self::$uri = $uri;
    
        // Понять, что если текущий uri имеется в таблице маршрутов, то записать в текущий маршрут
        foreach(self::$routes as $path => $route)
        {
            if($path == $uri){

                foreach($route as $k => $v){
                    $route[$k] = $v;
                
                    self::$route = $route;
                }
            }

        }

        if(empty(self::$route["method"])) {self::$route["method"] = 'index';}

        if(empty(self::$route["prefix"])) {self::$route["prefix"] = '';}

        // self::$controller_method
        self::$controller_prefix = self::$route["method"];

        // self::$controller_method
        self::$route["prefix"] !== '' ? self::$controller_prefix = '' . self::$route["prefix"] . '\\' : self::$controller_prefix = ''; 
    }
}