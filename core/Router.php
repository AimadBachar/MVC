<?php

namespace App\Core;

use App\Core\Request;

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
        $template = '../views/'.$views;
        include "../views/layout.phtml";
        /* include_once __DIR__ ."/../controllers/". $views .".php"; */
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        
        if (!$callback) {
            return "404 | Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

<<<<<<< HEAD
        return call_user_func($callback);
=======
        if(is_string($callback)){
            return $this->renderView($callback);
            exit;
        }

        echo call_user_func($callback);
>>>>>>> 2383d016eea0fbb079da368b88fe7522b6c54d42
    }
}