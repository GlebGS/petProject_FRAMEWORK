<?php

use Core\Router;

// Admin
Router::add("/admin", ["controller" => "main", "method" => "index", "prefix" => "admin"]);

// Default
Router::add("/", ["controller" => "main", "method" => "index", "prefix" => '']);