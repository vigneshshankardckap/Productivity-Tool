<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'controller/controller.php';

require 'router.php';

session_start();

$controller = new UserController();

$router = new router();


$router->get('/','welocme');

$router->post('/login',"login");

$router->post('/signup',"signup");




$router->routing();