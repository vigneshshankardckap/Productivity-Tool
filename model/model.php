<?php 
require 'con.php';

class UserModule extends Database
{

    // public function homePage()
    // {

    //     require "index.html";
        
    // }
    public function logincheck($data){
        $username=$data['email'];
        $userpassword=$data['password'];


        $fetch = $this->db->query("SELECT * from users where email_id ='$username' and  password='$userpassword'");
        $datas=$fetch->fetchall();
        
        if($datas){
      
            $_SESSION['name'] = $datas[0]['username'];

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

    public function lists(){

        $query = $this->db->prepare("SELECT * FROM tasks where category_id = 1");
        $query->execute();
        $details = $query->fetchAll();
        echo json_encode($details);
    }
    

}
