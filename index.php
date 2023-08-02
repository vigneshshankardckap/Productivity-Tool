<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require 'controller/controller.php';

require 'router.php';


// $controller = new UserController();

$router = new router();


$router->get('/LandingPage','LandingPage');

$router->get('/','login');

$router->get('/login',"login");

$router->post('/loginLogic',"loginLogic");


$router->get('/signup',"signUp");

$router->post('/signupLogic',"signupLogic");

//$router->post('/store',"store");

$router->get('/list','list');

$router->get('/logout',"logout");


$router->post('/addTask','addTask');

$router->post('/addedTaskDetails','addedTaskDetails');

$router->post('/deleteAddedTask','deleteAddedTask');

$router->routing();