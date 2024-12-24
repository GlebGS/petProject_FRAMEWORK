<?php

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// CamelCase
function upperCamelCase($str)
{
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
}

// camelCase
function lowerCamelCase($str)  
{
    return lcfirst(upperCamelCase($str));
}