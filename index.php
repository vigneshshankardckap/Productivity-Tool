<?php

require 'controller/controller.php';

require 'router.php';

$controller = new UserController();

$router = new router();


$router->get('/','activityPage');

$router->post('/addSingleTask',"addSingleTask");


$router->routing();