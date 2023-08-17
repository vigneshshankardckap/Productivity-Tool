<?php

require 'model/model.php';

class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModule();
    }

    public function LandingPage()
    {
        $tasks = $this->userModel->addedTaskDetails();
        require "View/homepage.php";
    }


    public function login()
    {
        require "signup.php";
    }

    public function loginLogic()
    {
        $this->userModel->logincheck($_POST);
    }

    public function signUp()
    {
        require "signup.php";
    }


    public function list()
    {

        $category_id =  $_REQUEST['category_id'];
        // var_dump($category_id);
        $fetchAllDataDo = $this->userModel->fetchDataFromDo($category_id);
        var_dump($fetchAllDataDo);
        $fetchAllDataDefer = $this->userModel->fetchDataFromdefer($category_id);
        $fetchAllDataDelegate = $this->userModel->fetchDataFromdelegate($category_id);
        $fetchAllDataDelete = $this->userModel->fetchDataFromdelete($category_id);

        $tasks = $this->userModel->addedTaskDetails();

        require "View/listing.php";
    }
    public function signupLogic()
    {
        $this->userModel->signUp($_POST);
    }
    public function store()
    {

        $this->userModel->store($_REQUEST);
    }

    public function addTask()
    {


        $this->userModel->addTask($_REQUEST);
    }

    public function addedTaskDetails()
    {
        require "View/homepage.php";
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["picture"]);
        session_destroy();
        header("location:/");
    }

    public function deleteAddedTask()
    {

        $this->userModel->deleteAddedTask($_REQUEST);
    }

    //     public function editTask(){
    //         var_dump($_POST);
    //         $this->userModel->editTask($_POST);
    //     }

    public function addComment()
    {

        $this->userModel->addComment($_REQUEST);
    }

    public function completedTask()
    {
        // var_dump($_REQUEST);
        $this->userModel->completedTask($_REQUEST['id']);
    }

    public function deleteTask()
    {

        // var_dump($_REQUEST);

        $this->userModel->deleteTask($_REQUEST['id']);
    }

    public function particulartask()
    {
        //   var_dump($_REQUEST['id']);
        $this->userModel->viewAllTask($_REQUEST['id']);


        // require "View/listing.php";
    }

    public function completed()
    {
        // var_dump($_REQUEST);
        $this->userModel->completed($_REQUEST);
    }
}
