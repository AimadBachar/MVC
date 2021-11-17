<?php

namespace App\Core;

use App\Core\Request;

class Router 
{   
    protected $routes = [ ];
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
         $this->request->getPath();
    }
}
