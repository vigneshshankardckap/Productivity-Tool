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


    function addSingleTask($data){


    //   $date= date("Y-m-d H:i:s", strtotime($data['DateAndTime']));
   
    }

    

}