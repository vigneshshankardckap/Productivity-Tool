<?php 
require 'con.php';

class UserModule extends Database
{
    public function logincheck($data){

        $username=$data['email'];
        $userpassword=$data['password'];


        $fetch = $this->db->query("SELECT * from users where email_id ='$username' and  password='$userpassword'");
        $datas=$fetch->fetchall();
        
        if($datas){
<<<<<<< HEAD
           $_SESSION['name']=$datas[0]['username'];
           $_SESSION['id'] = $datas[0]['id'];
=======
            $_SESSION['name']=  $datas[0]['username'];
>>>>>>> e74bec6e48603902e238986b59175da3691a20ea

            header('Location:/LandingPage');

        }
        else{
            header('location:/login');
        }

    }
    public function signUp($data){

        $email = $data['email'];
        $check = $this->db->query("SELECT * FROM users WHERE email_id = '$email'");
        $exists = $check->fetchAll(PDO::FETCH_OBJ);
        if ($exists)
        {
            header('location:/login');

            $_SESSION['guest_user'] ="Kindly Please Login";
            
        }
        else {
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            $insert = $this->db->query("INSERT INTO users(username,email_id,password)VALUES ('$name','$email','$password')");


                $check = $this->db->query("SELECT * FROM users WHERE email_id = '$email'");
                    $exists = $check->fetchAll();
                    $_SESSION['name'] = $exists[0]['username'];
           header('location:/LandingPage');


        }

    }
     public function UserId(){
         
     }

    public function store($data)
    {
      $key = array_keys($data);
  
      $val = array_values($data);
  
          $sql = "INSERT INTO tasks (" . implode(', ', $key) . ") "
          . "VALUES ('" . implode("', '", $val) . "')";
        $query =   $this->db->prepare($sql);
        $query->execute();
        header("location:/list");

    }

    public function addTask($value){
        $userId = $_SESSION['id'];
//        var_dump($userId);
        $valueId = array_keys($value);
        $taskId = $valueId[0];
        $insertUserAddedTask = $this->db->query("INSERT INTO userAddedTask(user_id,addTask_id)VALUES ('$userId','$taskId')");
        header('location:/LandingPage');
    }

    public function addedTaskDetails(){
//        var_dump($_POST);
        $userId = $_SESSION['id'];
//        $fetchAddedTasks = $this->db->query("SELECT id,name FROM addTask JOIN userAddedTask on addTask.id = userAddedTask.addTask_id where userAddedTask.user_id = '$userId'");
        $fetchAddedTasks = $this->db->query("select userAddedTask.id,name from addTask join userAddedTask on addTask.id = userAddedTask.addTask_id where userAddedTask.user_id = '$userId'");
        $exists = $fetchAddedTasks->fetchAll();
        return $exists;
    }

<<<<<<< HEAD
    public function deleteAddedTask($id){
        $userId = $id;
        $userAddedId = array_keys($userId);
        $taskId = $userAddedId[0];
        $deleteAddedHabits = $this->db->query("DELETE FROM userAddedTask WHERE id = '$taskId';");
        header('location:/LandingPage');
    }
=======

>>>>>>> e74bec6e48603902e238986b59175da3691a20ea
}
