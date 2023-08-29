<?php
require 'con.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class UserModule extends Database
{
    public $all = [];

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


            //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                        //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vigneshshankardckap@gmail.com';                     //SMTP username
        $mail->Password   = 'fkrdvwhaombezelw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('vigneshshankardckap@gmail.com', 'Welocome To the Productivity Tool');
        $mail->addAddress($email, 'HI');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // for($i=2;$i<count($allfiles);$i++){
        //     $mail->addAttachment("visitors/$allfiles[$i]"); //Add attachments
        //     // $mail->addAttachment('user.txt');    //Optional name
        // }
    
    
        //Content
        $mail->isHTML(true);                          //Set email format to HTML
        $mail->Subject = 'Welcome to Productivity Tool-Your Journey Begins Here !';
        $mail->Body    =' <p>Dear User,</p>
        <p>At Productivity Tool, our mission is to  we are simplifying tasks based on urgent and important is helpful in planning our daily schedules.were here to make sure your experience is nothing short of amazing</p>
        <img src="https://i.postimg.cc/Dykc03w5/Produtivity-Tool.png" width="800" height="400" alt=""> ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';


    } 
    
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }   

    echo '
    <script type="text/javascript">
       window.location.replace("/LandingPage");
    </script>
    </script>
    ';
            
        
        }
    }

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

        $insertIntoTable = $this->db->query("INSERT INTO tasks(task_name,dates,user_id,category_id,matrix_id,comments)VALUES('$taskName','$dueDate','$userId','$categoryId','$urgeImp','null')");
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
        // var_dump($exists);
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

    public function fetch_proofession()

    {
        
        $userId = intval($_SESSION['userid']);
      $profissional = $this->db->query("SELECT * FROM tasks WHERE category_id = '1' AND user_id = '$userId' AND completed_at is null and deleted_at is null")->fetchAll();
    
      echo json_encode($profissional);
    }

    public function editTask($id)
    {
        $userId = $_SESSION['userid'];
        $id = $_REQUEST['id'];

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
        $matrix_id = $data["matrixId"];
        $categoryId = $data["categoryId"];


        $datas = $this->db->query("SELECT * from tasks where user_id = $userId AND matrix_id = $matrix_id AND category_id = $categoryId AND deleted_at is NULL")->fetchAll(PDO::FETCH_OBJ);


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
        //select * from tasks where completed_at is not null and matrix_id = 1;

        // $datas = $this->db->query("SELECT matrix_id,user_id,completed_at,category_id FROM tasks WHERE completed_at is not null and category_id = 1;")->fetchAll(PDO::FETCH_OBJ);
        $datas = $this->db->query("SELECT id,task_name,dates,user_id,category_id,matrix_id,completed_at FROM tasks WHERE completed_at is not null and category_id = 1 and matrix_id ='$matrix_id' AND user_id = '$userId;'")->fetchAll(PDO::FETCH_OBJ);



        echo json_encode($datas);
    }

    public function list_page($category_id){
        $userId = intval($_SESSION['userid']);
    
        $cat = $this->db->query("SELECT * FROM tasks WHERE category_id = '$category_id' AND user_id = '$userId' AND completed_at is null")->fetchAll();
        echo json_encode($cat);
    }

    public function commFetch($val){

        $id = $val["id"];
        $matrix_id = $val["matrixId"];
        $userId = $_SESSION['userid'];


        $v = $this->db->query("SELECT id,comments from tasks WHERE  comments IS not null and user_id = '$userId' and matrix_id ='$matrix_id' and id='$id'");
        
        
        $fetcedTables = $v->fetchAll();
        
        $allTable = [];

        foreach ($fetcedTables as $a) {
            $allTable[]=$a["comments"];
        }
       
        echo json_encode($allTable);
    }
    public function permanentDel($delId)
    {
        $delBtnId = $delId;
        $delFun = $this->db->query("DELETE FROM `tasks` WHERE `tasks`.`id` = '$delBtnId'");
        echo json_encode($delFun);
        header("location:/list");
    }

    public function  profileView($id) 
     {
        $pro = $this->db->query("SELECT * FROM users WHERE id = '$id'")->fetchAll();
        echo json_encode($pro);        
    }

    // multi form data login
    public function multiFormData($values)
    {

        $loopId = count($_POST["Task_name"]);
        $userId = $_SESSION['userid'];

        for($i=0;$i<$loopId;$i++){
            $taskName = $_POST["Task_name"][$i];
            $date = $_POST["date"][$i];
            $userId = $_SESSION['userid'];
            $id = strval($i);
            $category = $_POST[$id."catogrey"][0];
            $urgent = $_POST[$id."urgent"][0];
            $importent = $_POST[$id."important"][0];

            if ($urgent == 1 && $importent == 1) {
                $urgeImp = 1;
                
            } elseif ($urgent == 0 && $importent == 1) {
                $urgeImp = 2;
                
            } elseif ($urgent == 1 && $importent == 0) {
                $urgeImp = 3;
            } elseif ($urgent == 0 && $importent == 0) {
                $urgeImp = 4;
    
            }

            $this->db->query("INSERT INTO tasks(task_name,dates,user_id,category_id,matrix_id)VALUES('$taskName','$date','$userId','$category','$urgeImp')");

            header("location:/list");

        }

    }
}
