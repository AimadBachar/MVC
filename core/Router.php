<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Respond;

class Router
{
    protected $routes = [];
    public Request $request;
    public Respond $respond;

    /**
     * Router constructor.
     * @param Request $request
     * @param Respond $respond
     * @return void
     */
    public function __construct(Request $request, Respond $respond)
    {
        $this->request = $request;
        $this->respond = $respond;
    }
   
    /**
     * subscribe get request to the router
     * @param string $path
     * @param callable|string $callback
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * subscribe post request to the router
     * @param string $path
     * @param callable|string $callback
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * resolve the request with approriate callback
     * @return callable|string
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {

            $this->respond->setStatusCode(404);
            return $this->renderView("404");
            
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    /**
     * render view
     * @param string $view
     * @return string
     */
    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->viewContent($view);
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    /**
     * get layout content
     * @return string
     */
    public function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR. "/views/layouts/main.phtml";
        return ob_get_clean();
    }

    /**
     * get view content
     * @param string $view
     * @return string
     */
    public function viewContent($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/{$view}.phtml";
        return ob_get_clean();
    }
}