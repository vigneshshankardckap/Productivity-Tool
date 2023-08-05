<?php

require 'model/model.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModule();
    }
    
     public function LandingPage(){
         $tasks = $this->userModel->addedTaskDetails();
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
    public function list(){

        $fetchAllDataDo = $this->userModel->fetchDataFromDo();
        $fetchAllDataDefer=$this->userModel->fetchDataFromdefer();
        $fetchAllDataDelegate=$this->userModel->fetchDataFromdelegate();
        $fetchAllDataDelete=$this->userModel->fetchDataFromdelete();
        require "View/listing.php";

    }
    public function signupLogic(){
        $this->userModel->signUp($_POST);
    }
    

    public function store(){
        // var_dump($_POST);
        $this->userModel->store($_REQUEST);
    }

    public function addTask($tasks){

        $this->userModel->addTask($tasks);
    }

    public function addedTaskDetails(){
        require "View/homepage.php";
    }
       
    public function logout(){
        session_destroy();
        header("location:/login");
    }

    public function deleteAddedTask(){
        $this->userModel->deleteAddedTask($_POST);
    }


    public function fetchData(){
        $this->userModel->fetchDataFromDb();

    }

}