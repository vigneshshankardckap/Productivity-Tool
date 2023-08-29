<?php
session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// require 'controller/controller.php';

require 'router.php';

$router = new router();


$router->get('/LandingPage', 'LandingPage');

$router->get('/', 'login');

$router->get('/login', "login");

$router->post('/loginLogic', "loginLogic");

$router->get('/signup', "signUp");

$router->post('/signupLogic', "signupLogic");

$router->post('/store', "store");

$router->get('/list', 'list');

$router->get('/logout', "logout");

$router->post('/viewAllTask', 'viewAllTask');

$router->post('/addTask', 'addTask');

$router->post('/completedTask', 'completedTask');

$router->post('/deleteTask', 'deleteTask');

$router->post('/addedTaskDetails', 'addedTaskDetails');

$router->post('/deleteAddedTask', 'deleteAddedTask');

$router->post('/addComment', 'addComment');

$router->post('/particulartask','particulartask');

$router->post('/completed','completed');

$router->post('/commFetch','commFetch');


$router->post('/editTask','editTask');

$router->post('/list_page','list_page');

$router->post('/permanentDel','permanentDel');


$router->get('/fetch_proofession','fetch_proofession');

$router->post('/updateTask','updateTask');
$router->post('/profileView','profileView');

$router->post('/multiFormData','multiFormData');

$router->routing();
