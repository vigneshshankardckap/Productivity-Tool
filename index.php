<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require 'controller/controller.php';

require 'router.php';


// $controller = new UserController();

$router = new router();


$router->get('/','LandingPage');

$router->get('/login',"login");

$router->post('/loginLogic',"loginLogic");

$router->get('/signup',"signUp");

$router->post('/signupLogic',"signupLogic");

$router->post('/store',"store");

$router->post('/addTask','addTask');

$router->post('/addedTaskDetails','addedTaskDetails');



$router->routing();