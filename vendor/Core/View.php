<?php

namespace Core;

class View
{
    public function __construct(
        public $route,
        public $meta = []
    ){}

    public function render($data)
    {
        if(is_array($data)){
            extract($data);
        }

        $view = lowerCamelCase($this->route["method"]);
        $view_prefix = '/' . $this->route["prefix"];

        $view_file = VIEW . $view_prefix . "/{$view}.php";

        if(is_file($view_file)){
            require_once $view_file; 
        }else{
            throw new \Exception("Фала: {$view_file} не существует!", 500);
        }
    }

    public function getMeta()
    {
        return "<title>" . $this->meta["title"] . "</title>" . PHP_EOL;
    }
}