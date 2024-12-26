<?php

namespace App\Controllers\Admin;

use Core\Controller;

class MainController extends Controller
{

    public function index()
    {
        $this->setData([
            "id" => 2,
            "role" => "Admin",
            "name" => "Tester Admin",
            "email" => "Admin@mail.ru"
        ]);

        $this->setMeta("/admin TEST");
    }

}