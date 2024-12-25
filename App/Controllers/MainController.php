<?php

namespace App\Controllers;

use RedBeanPHP\R;
use Core\Controller;

class MainController extends Controller
{
    
    public function index()
    {
        $this->setData([
            "id" => 1,
            "role" => "User",
            "name" => "Gleb",
            "email" => "gleb6@mail.ru"
        ]);

        $this->setMeta("/ SHOP");
    }

}