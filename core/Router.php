<?php

namespace App\core;

use App\core\Request;

class Router
{
    protected $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {   
        
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function renderView($views)
    {
        include_once __DIR__ ."/../views/".$views.".php";
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        
        if (!$callback) {
            echo "404 | Not Found";
            exit;
        }

        if(is_string($callback)){
            return $this->renderView($callback);
            exit;
        }

        echo call_user_func($callback);
    }
}