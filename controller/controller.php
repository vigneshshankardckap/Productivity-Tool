<?php

require 'model/model.php';

class UserController {

    private $userModel;

    public function __construct() {

        $this->userModel = new UserModule();
    }
    
     public function LandingPage(){
        require "View/homepage.html";
      
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
   
    public function list(){
        require 'View/listing.html';
    }

       
    public function logout(){
        session_destroy();
        header("location:/login");
    }


    
    

    
}