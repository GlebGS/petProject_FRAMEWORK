<?php

namespace Core;

abstract class Model
{
    public function __construct()
    {
        DB::getInstance();
    }
}
