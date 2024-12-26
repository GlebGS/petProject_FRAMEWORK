<?php

namespace App\Controllers;

use Core\Controller;

class MainController extends Controller
{
    
    public function index()
    {
        $this->setData([
            "id" => 1,
            "role" => "User",
            "name" => "Testr User",
            "email" => "user@mail.ru"
        ]);

        $this->setMeta("/ TEST");
    }

}