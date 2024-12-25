<?php

namespace App\Controllers;

use Core\Controller;

class MainController extends Controller
{
    
    public function index()
    {
        debug(self::$model->getAllUsers());

        $this->setData([
            "id" => 1,
            "role" => "User",
            "name" => "Gleb",
            "email" => "gleb6@mail.ru"
        ]);

        $this->setMeta("/ SHOP");
    }

}