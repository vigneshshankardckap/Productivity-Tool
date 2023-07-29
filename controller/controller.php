<?php

require 'model/model.php';


class UserController {

    private $userModel;

    public function __construct() {

        $this->userModel = new UserModule();
    }
    

     public function LandingPage(){

      $this->userModel->homePage();
    }

    public function login($data){

        $this->userModel->logincheck($data);
        require "index.html";

    }
    public function signUp($data){
        $this->userModel->signUp($data);
        require "index.html";
    }

    

}