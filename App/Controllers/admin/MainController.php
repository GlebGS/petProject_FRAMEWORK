<?php

namespace App\Controllers\Admin;

use Core\Controller;

class MainController extends Controller
{

    //public function __construct(public $route = []){}

    public function index()
    {
        debug($this->route);
    }

}