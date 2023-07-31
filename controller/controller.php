<?php

require 'model/model.php';

class UserController {

    private $userModel;

    public function __construct() {

        $this->userModel = new UserModule();
    }
    
     public function LandingPage(){
         require "View/homepage.php";
//        $this->userModel->homePage();
      
    }

    public function login(){
        require "index.html";
    }

    public function loginLogic(){
        $this->userModel->logincheck($_POST);
    }

    public function signUp(){
        require "index.html";
    }

    public function signupLogic(){
        $this->userModel->signUp($_POST);
    }
    
    public function store(){
        $this->userModel->store($_REQUEST);
    }
<<<<<<< HEAD

    public function addTask($tasks){
//        var_dump($tasks);
        $this->userModel->addTask($tasks);
    }

    public function addedTaskDetails(){
        $tasks = $this->userModel->addedTaskDetails();
        require "View/homepage.php";
    }
=======
   
    public function list(){
        require 'View/listing.html';
    }

>>>>>>> 21a6b17c4ec7dfc9773eedd951075fc3d209c174
    

    
}