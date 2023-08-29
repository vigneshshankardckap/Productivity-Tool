<?php 

$servername = "localhost";



include "sample/gc_config.php";

if(isset($_GET["code"])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET["code"]);

    $client->setAccessToken($token["access_token"]);
    
    $obj=new Google_Service_Oauth2($client);
    $data=$obj->userinfo->get();

    if(!empty($data["email"])&&!empty($data["name"])){
        
        $email_id = $data["email"];
        $name = $data["name"];
        


            $_SESSION["email"]= $data["email"];


        $conn = new PDO("mysql:host=$servername;dbname=EisenDo", "admin", "welcome");
        $exits = $conn->query("SELECT * FROM users WHERE email_id = '$email_id'");
        $exits = $exits->fetchAll(PDO::FETCH_OBJ);
        
        if($exits){
            $_SESSION["error"] = "already exits";
            header("location:/LandingPage");

        }
        else{
            // var_dump("register succesfull");
            $conn->query("INSERT INTO users(username,email_id)VALUES('$name','$email_id')");
            $_SESSION['username'] = $name;
            header("location:/list");
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f3bda5e226.js" crossorigin="anonymous"></script>
</head>
<body>
            <?php if (isset($_SESSION["error"])) { ?>
                <?php echo  $_SESSION["error"]?>
                <?php unset($_SESSION["error"])?>
            <?php } ?>
       <div class="container" id="container">
     
        <div class="form-container sign-up-container">
            <form action="/signupLogic" method="post" onsubmit="return validateSignUpForm()">
            <!-- <form action="/signupLogic" method="post" onsubmit="return validated()"> -->

                <h1>Create Account</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a> -->
                    <a href='<?php echo  $client->createAuthUrl(); ?>' class="social"><i class="fab fa-google-plus-g"></i></a>
                    <!-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>  -->
            <!-- <p></p> -->
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" required name="name" pattern="[a-z,A-Z]*" autocomplete="off"/>
                <input type="email" placeholder="Email" required name="email" autocomplete="off" />
                <input type="password" placeholder="Password" required name="password" autocomplete="off" />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <!-- <form action="/loginLogic" method="post" name="form" onsubmit="return validated()"> -->
            <form action="/loginLogic" method="post" name="form" onsubmit="return validated()">
                <h1>Log in</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a> -->
                    <a href='<?php echo  $client->createAuthUrl(); ?>' class="social"><i class="fab fa-google-plus-g"></i></a>
                    <!-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" value="sunil123@gmail.com" required name="email" pattern="[a-z,A-Z,0-9,@,.]*"/>
                <p class="emailError">Please Fill Up Your Email </p>
                <input type="password" value="sunil123" placeholder="Password" required name="password"/>
                <p class="passError">Please Fill Up Your Password </p>
                <button>login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Log In</button>
                </div>


                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
     
    </footer>
    <script src="./JS/login.js"></script>
</body>
</html>