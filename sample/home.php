<?php 
  session_start();
  if(!isset($_SESSION["email"])){
    header("location:login.php");
  }
?>
<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <h1>Login Successfully. Welcome <?php echo $_SESSION["username"]; ?></h1>
    <img src="<?php echo $_SESSION["picture"] ?>" alt="photo">
    <a href='logout.php'>Logout</a>
  </body>
</html>