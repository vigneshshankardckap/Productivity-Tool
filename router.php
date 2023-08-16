<?php
require 'controller/controller.php';
class router
{

    public $router = [];
    public $controller;


    public function __construct()
    {
        $this->controller = new UserController();
    }


    public function get($uri, $controller)

    {
        $this->router[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
            'middleware' => null
        ];
        return $this;
    }

    public function post($uri, $controller)
    {
        $this->router[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
            'middleware' => null
        ];
        return $this;
    }




    public function routing()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        foreach ($this->router as $router) {

            if ($router['uri'] == $uri) {

                $action = $router['controller'];
            }
        }

        if ($action) {
            $this->controller->$action();
        } else {
            require 'error.php';
        }
    }
}
