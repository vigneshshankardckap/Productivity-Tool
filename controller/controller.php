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
       
        $category_id =  $_POST['category_id'];
        $fetchAllDataDo = $this->userModel->fetchDataFromDo($category_id);
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
        session_destroy();
        header("location:/login");
    }

    public function deleteAddedTask()
    {

        $this->userModel->deleteAddedTask($_REQUEST);
    }

//     public function editTask(){
//         var_dump($_POST);
//         $this->userModel->editTask($_POST);
//     }

    public function addComment(){
       
        $this->userModel->addComment($_REQUEST);

    }

    public function deleteTask()
    {

        $this->userModel->deleteTask($_REQUEST);
    }

    public function particulartask()
    {
    //   var_dump($_REQUEST['id']);
        $this->userModel->viewAllTask($_REQUEST['id']);
       
        
        // require "View/listing.php";
    }
}
