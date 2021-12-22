<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from users where email = '$user_check' ");
   $ses_sql1 = mysqli_query($conn,"select * from employee where email = '$user_check' "); 

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);  
   $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);

   if(!empty($row)){
   $login_session = $row['email'];
   $userRole = $row['role'];
   $userName = $row['username'];
   $AddPermission = $row['add'];
   $EditPermission = $row['edit'];
   $DeletePermission = $row['delete'];
  
   if(!isset($_SESSION['login_user'])){
      header("location:../index.php");
      die();
   }

   }elseif(!empty($row1)){
   $login_session = $row1['email'];
   $userRole = "employee";
   $userName = $row1['name'];
   $EMP_Id = $row1['EMP_ID'];
  
   if(!isset($_SESSION['login_user'])){
      header("location:../index.php");
      die();
   }

   }
   
   

?>