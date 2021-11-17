<?php

namespace App\Core;

use App\Core\Request;

class Router 
{   
    protected $routes = [ ];
    public Request $request;

    public function __construct(Request $request)
    {   
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        echo "<pre>";
        var_dump($path);
        echo "</pre>";
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        echo call_user_func($callback);
    }
}
