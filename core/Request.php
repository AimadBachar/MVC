<?php

namespace App\Core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');

        if($pos === false) {
            return $path;
        }
        return substr($path, 0, $pos);
    }

    public function getMethod()
    {   
        // pour faire correspondre 'GET' et 'get' strtolower on pourait utiliser 'GET' mais cela permet d'éviter de confondre avec les superglobale et les const
        return strtolower($_SERVER['REQUEST_METHOD']) ?? 'get';
    }
}