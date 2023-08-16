<?php 
  session_start();
  unset($_SESSION["name"]);
  unset($_SESSION["email"]);
  session_destroy();
  header("location:login.php");
?>