<?php

namespace App\Core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $pos = strpos($path, '?');
    }
}