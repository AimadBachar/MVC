<?php

namespace App\Core;

use App\Core\Router;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Respond $respond;

    /**
     * Application constructor.
     * @param string $rootDir
     * @return void
     */
    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->respond = new Respond();
        $this->router = new Router($this->request, $this->respond);
    }

    /**
     * resolve the application routes
     * @return void
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}