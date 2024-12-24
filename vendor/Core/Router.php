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
        $uri_Controller = upperCamelCase(self::$route[self::$uri]["controller"]) . "Controller";
        $controller = "App\Controllers\\" . self::$controller_prefix . "{$uri_Controller}";

        $action = lowerCamelCase(self::$route[self::$uri]["method"]);


        if(class_exists($controller))
        {
            $controllerObject = new $controller(self::$route);

            if(method_exists($controllerObject, $action)){
                $controllerObject->$action();
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
        foreach(self::$routes as $k => $v)
        {
            if($k == $uri){
                self::$route[$k] = $v;
            }

        }

        // self::$controller_method
        self::$controller_prefix = self::$route[$uri]["method"];
        // self::$controller_method
        self::$routes[$uri]["prefix"] !== '' ? self::$controller_prefix = '' . self::$routes[$uri]["prefix"] . '\\' : self::$controller_prefix = '';
    }
}