<?php

namespace Core\Patterns;

trait TSingleton
{
    private static $instance = null;

    private function __construct(){}

    public static function getInstance(): mixed
    {
        return static::$instance ?? static::$instance = new static();
    }

}