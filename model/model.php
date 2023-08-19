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
            header('location:/');
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
    // public function fetchedComment()  {
    //     // $value = $this->db->("SELECT id,comments from tasks WHERE  comments IS not null and user_id = 1 and category_id =1 AND matrix_id =3 and id=91")
        
    // }

    public function store($data)
    {

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

        $insertIntoTable = $this->db->query("INSERT INTO tasks(task_name,dates,user_id,category_id,matrix_id)VALUES('$taskName','$dueDate','$userId','$categoryId','$urgeImp')");
        header('location:/list');
    }

    public function addTask($value)
    {
        $userId = $_SESSION['userid'];

        $taskId = $value["value"];

        $insertUserAddedTask = $this->db->query("INSERT INTO userAddedTask(user_id,addTask_id,is_added)VALUES ('$userId','$taskId',1)");
        header('location:/LandingPage');
    }

    public function addedTaskDetails()
    {

        $userId = $_SESSION['userid'];
        $fetchAddedTasks = $this->db->query("SELECT userAddedTask.id,name FROM addTask JOIN userAddedTask ON addTask.id = userAddedTask.addTask_id WHERE userAddedTask.user_id = '$userId'");
        $exists = $fetchAddedTasks->fetchAll();

        return $exists;
    }

    public function completedTask($value)
    {
      
        $this->db->query("UPDATE tasks SET completed_at = now() WHERE id = '$value'");
    
    }

    public function deleteAddedTask($value)
    {
        
        $taskId = $value["value"];
        $deleteAddedHabits = $this->db->query("DELETE FROM userAddedTask WHERE id = '$taskId';");
        header('location:/LandingPage');
    }

    public function fetchDataFromDo($category_id)
    {
        $userId = $_SESSION['userid'];

        if ($category_id) {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 1 AND deleted_at is NULL and category_id = $category_id ")->fetchAll(PDO::FETCH_OBJ);

        } else {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 1 AND deleted_at is NULL and category_id = 1 ")->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function fetchDataFromdefer($category_id)
    {

        $userId = $_SESSION['userid'];
        if ($category_id) {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 2 and category_id = $category_id AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 2 and category_id = 1 AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        }
    }
    public function fetchDataFromdelegate($category_id)
    {

        $userId = $_SESSION['userid'];
        if ($category_id) {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 3 and category_id = $category_id AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 3 and category_id = 1 AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function fetchDataFromdelete($category_id)
    {
        $userId = $_SESSION['userid'];
        if ($category_id) {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 4 and category_id = $category_id AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $this->db->query("SELECT * from tasks where user_id =$userId AND matrix_id = 4 and category_id = 1 AND deleted_at is NULL AND completed_at is NULL")->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function editTask($id)
    {
        $userId = $_SESSION['userid'];
       $id=$_REQUEST['id'];
       
        $fetchUserAddedTask = $this->db->query("SELECT * FROM tasks WHERE id=$id")->fetchAll();
        echo json_encode($fetchUserAddedTask);
    }
    public function updateTask($data)
    {
        
        
        $editId = $data["EditId"];
        $editTaskName = $data["editTaskName"];
        $editTaskDate = $data["editTaskDate"];
        $user_id = $data["user_id"];

        $updatetask = $this->db->query("UPDATE tasks SET task_name='$editTaskName',dates ='$editTaskDate' WHERE id = '$editId' AND user_id='$user_id'");

        $al = $updatetask->fetchAll(PDO::FETCH_OBJ);

        header("location:/list");
    
    
    }

    public function DeleteTask($id)
    {

        $this->db->query("UPDATE tasks SET deleted_at =now() Where id='$id'");
        echo json_encode('Sucess');
    }

    public function viewAllTask($data)
    {

        $userId = $_SESSION['userid'];
        $matrix_id = $data;

        $datas = $this->db->query("SELECT * from tasks where user_id = $userId AND matrix_id = $matrix_id AND deleted_at is NULL AND completed_at is NULL ")->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($datas);
    }

    public function addComment($values)
    {

        $commentId = $values['id'];
        $comment = $values['comments'];
        $this->db->query("UPDATE tasks SET comments = '$comment' where id='$commentId' ");
    }

    public function completed($matrixId)
    {
        $matrix_id = $matrixId["value"];
        $userId = $_SESSION['userid'];
        // $datas = $this->db->query("SELECT matrix_id,user_id,completed_at,category_id FROM tasks WHERE completed_at is not null and category_id = 1;")->fetchAll(PDO::FETCH_OBJ);
        $datas = $this->db->query("SELECT id,task_name,dates,user_id,category_id,matrix_id,completed_at FROM tasks WHERE completed_at is not null and category_id = 1 and matrix_id ='$matrix_id'")->fetchAll(PDO::FETCH_OBJ);
        // var_dump($datas);


        echo json_encode($datas);
    }

    //     $datas = $this->db->query("SELECT * from tasks where user_id = $userId AND matrix_id = $matrix_id AND deleted_at is NULL AND completed_at is NULL ")->fetchAll(PDO::FETCH_OBJ);
    //     echo json_encode($datas);
    // }

    public function commFetch($val){
        // var_dump($val);
        $id = $val["id"];
        $matrix_id = $val["matrixId"];
        $userId = $_SESSION['userid'];
        // var_dump($id);
        // var_dump($matrix_id);
        // var_dump($userId);

        $v = $this->db->query("SELECT id,comments from tasks WHERE  comments IS not null and user_id = '$userId' and matrix_id ='$matrix_id' and id='$id'");
        // $v = $this->db->query("SELECT id,comments from tasks WHERE  comments IS not null and user_id = '$userId' and matrix_id ='$matrix_id' and id='$id'")->fetchAll(PDO::FETCH_OBJ);
        // var_dump($v);
        // echo json_encode($v);   
        
        $fetcedTables = $v->fetchAll();
        // var_dump($fetcedTables);
        $allTable = [];

        foreach ($fetcedTables as $a) {
            $allTable[]=$a["comments"];
        }
        // print_r($allTable);
        echo json_encode($allTable);
    }
}
    public function permanentDel($delId)
    {
        // var_dump($delId);
        $delBtnId = $delId;
        $delFun = $this->db->query("DELETE FROM `tasks` WHERE `tasks`.`id` = '$delBtnId'");
        echo json_encode($delId);
        header("location:/list");
    }
}
