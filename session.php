<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from users where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   $userRole = $row['role'];
   $userName = $row['username'];

   
   if(!isset($_SESSION['login_user'])){
      header("location:../index.php");
      die();
   }

?>