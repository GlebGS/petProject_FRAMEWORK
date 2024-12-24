<?php

namespace Core;

abstract class Controller
{

    public static array $data = [];

    public function __construct(public $route = []){}

    public static function getView($route)
    {
        (new View($route))->render(self::$data);
    }

}