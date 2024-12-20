<?php

namespace Core\Patterns;


class Registry
{
    
    use TSingleton;

    protected static array $properties = [];

    public static function setProperty($key, $value)
    {
        self::$properties[$key] = $value;
    }
    
    public static function getProperty($key)
    {
        return self::$properties[$key] ?? null;
    }

    public static function getProperties()
    {
        return self::$properties;
    }

}