<?php 

class router
{

    public $router = [];
    public $controller;


    public function __construct()
    {
        $this->controller = new UserController();
    }


    public function get($uri, $action)

    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }

    public function post($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
            'middleware' => null
        ];
        return $this;
    }



    
    public function routing()
    {
        foreach ($this->router as $router) {

            if ($router['uri']==$_SERVER['REQUEST_URI']){

                if ($router['action']) {

                    switch ($router['action']) {

                           case"addSingleTask":
                            $this->controller->addSingleTask($_POST);
                            break;

                        default:
                            $this->controller->LandingPage();

                        }

                    }
                }

                else{
                    $this->controller->LandingPage();

                }
            }
        }
           

}