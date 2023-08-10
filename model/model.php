<?php
require 'con.php';

class UserModule extends Database
{
    public function logincheck($data)
    {

        $username = $data['email'];
        $userpassword = $data['password'];


        $fetch = $this->db->query("SELECT * from users where email_id ='$username' and  password='$userpassword'");
        $datas = $fetch->fetchall();

        if ($datas) {
            $_SESSION['username'] = $datas[0]['username'];
            $_SESSION['userid'] = $datas[0]['id'];

            header('Location:/LandingPage');
        } else {
            header('location:/login');
        }
    }
    public function signUp($data)
    {

        $email = $data['email'];
        $check = $this->db->query("SELECT * FROM users WHERE email_id = '$email'");
        $exists = $check->fetchAll(PDO::FETCH_OBJ);
        if ($exists) {
            header('location:/login');

            $_SESSION['guest_user'] = "Kindly Please Login";
        } else {
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            $insert = $this->db->query("INSERT INTO users(username,email_id,password)VALUES ('$name','$email','$password')");


            $check = $this->db->query("SELECT * FROM users WHERE email_id = '$email'");
            $exists = $check->fetchAll();
            $_SESSION['username'] = $exists[0]['username'];


            $check = $this->db->query("SELECT id FROM users WHERE email_id = '$email'");
            $exists = $check->fetchAll();
            $_SESSION['id'] = $exists[0]['id'];
            header('location:/LandingPage');
        }
    }
    public function UserId()
    {
    }

    public function store($data)
    {

        var_dump($data);
        $taskName = $data['Task_name'];
        $dueDate = $data['dateTime'];
        $userId = $data['user_id'];
        $categoryId = $data['task_type'];
        $urgent = $data['urgent'];
        $important = $data['important'];

        if ($urgent == 1 && $important == 1) {
            $urgeImp = 1;
            echo "Do";
        } elseif ($urgent == 0 && $important == 1) {
            $urgeImp = 2;
            echo "Defer";
        } elseif ($urgent == 1 && $important == 0) {
            $urgeImp = 3;
            echo "Delegate";
        } elseif ($urgent == 0 && $important == 0) {
            $urgeImp = 4;
            echo "Delete";
        }

        // var_dump($urgeImp);

        $insertIntoTable = $this->db->query("INSERT INTO tasks(task_name,dates,user_id,category_id,matrix_id)VALUES('$taskName','$dueDate','$userId','$categoryId','$urgeImp')");
        header('location:/list');
    }

    public function addTask($value)
    {
        $userId = $_SESSION['userid'];

        $taskId = $value["value"];

        $insertUserAddedTask = $this->db->query("INSERT INTO userAddedTask(user_id,addTask_id)VALUES ('$userId','$taskId')");
        header('location:/LandingPage');
    }

    public function addedTaskDetails()
    {
        //        var_dump($_POST);

        $userId = $_SESSION['userid'];
        //        $fetchAddedTasks = $this->db->query("SELECT id,name FROM addTask JOIN userAddedTask on addTask.id = userAddedTask.addTask_id where userAddedTask.user_id = '$userId'");
        $fetchAddedTasks = $this->db->query("select userAddedTask.id,name from addTask join userAddedTask on addTask.id = userAddedTask.addTask_id where userAddedTask.user_id = '$userId'");
        $exists = $fetchAddedTasks->fetchAll();
        //        var_dump($exists);
        return $exists;
    }

    public function deleteAddedTask($value)
    {
       
        $taskId = $value["value"];

        $deleteAddedHabits = $this->db->query("DELETE FROM userAddedTask WHERE id = '$taskId';");
        header('location:/LandingPage');
    }

    public function fetchDataFromDo(){
       $userId=$_SESSION['userid'];
        return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 1 And deleted_at IS NULl " )->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchDataFromdefer()
    {
        $userId = $_SESSION['userid'];

        return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 2 and deleted_at Is null")->fetchAll(PDO::FETCH_OBJ);

    }
    public function fetchDataFromdelegate()
    {
        $userId = $_SESSION['userid'];

        return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 3 and  deleted_at Is null ")->fetchAll(PDO::FETCH_OBJ);

    }

    public function fetchDataFromdelete()
    {
       $userId=$_SESSION['userid'];
        return $this->db->query("SELECT * from tasks where user_id =$userId AND  matrix_id = 4 and   deleted_at Is null")->fetchAll(PDO::FETCH_OBJ);

    }

    public function editTask($id) {
        
        $userId = $id;
        $fetchUserAddedTask = $this->db->query("SELECT * FROM tasks WHERE userId = '$userId'");
    }
    public function DeleteTask($id){
        $this->db->query("UPDATE tasks SET deleted_at =now() Where id='$id'");
         header('location:/viewAllTask');
    }

    public function viewAllTask($data)
    {

        $userId = $_SESSION['userid'];
        $matrix_id = $data['matrixId'];

        return $this->db->query("SELECT * from tasks where user_id = $userId AND matrix_id = $matrix_id AND deleted_at is NULL ")->fetchAll(PDO::FETCH_OBJ);
    }

    public function addComment($values){
        // var_dump($values);
        $commentId = $values['commentId'];
        $comment = $values['comment'];
        $this->db->query("UPDATE tasks SET comments = '$comment' where id='$commentId' ");
        header('location:/viewAllTask');
    }

}