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
        require "index.html";
    }

    public function loginLogic()
    {
        $this->userModel->logincheck($_POST);
    }

    public function signUp()
    {
        require "index.html";
    }


    public function list()
    {

        $fetchAllDataDo = $this->userModel->fetchDataFromDo();
        $fetchAllDataDefer = $this->userModel->fetchDataFromdefer();
        // var_dump($fetchAllDataDefer[0]->task_name);
        $fetchAllDataDelegate = $this->userModel->fetchDataFromdelegate();
        $fetchAllDataDelete = $this->userModel->fetchDataFromdelete();
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
        // var_dump($_REQUEST);

        $this->userModel->addTask($_REQUEST);
    }

    public function addedTaskDetails()
    {
        require "View/homepage.php";
    }

    public function logout()
    {
        session_destroy();
        header("location:/login");
    }

    public function deleteAddedTask()
    {
        // var_dump($_REQUEST);
        $this->userModel->deleteAddedTask($_REQUEST);
    }


    public function fetchData()
    {
        $this->userModel->fetchDataFromDo();
    }

    // public function editTask(){
    //     var_dump($_POST);
    //     $this->userModel->editTask($_POST);
    // }


    
    public function addComment(){
       
        $this->userModel->addComment($_REQUEST);

    }

    public function deleteTask()
    {

        $this->userModel->deleteTask($_REQUEST);
    }

    public function viewAllTask()
    {
        $allTask = $this->userModel->viewAllTask($_POST);
        // print_r($allTask);
        require "View/taskDetails.php";
    }
}
