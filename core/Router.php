<?php

namespace App\Core;


class Router 
{   
    protected $routes = [
        '/' => '.....',
        '/about' => '.....',
    ];
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
}
