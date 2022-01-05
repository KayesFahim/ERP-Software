<?php

  require '../config.php';

  $email =$_GET['email'];
  $password =$_GET['password'];

  $checkUser="SELECT EMP_ID FROM employee WHERE email = '$email' and password = '$password'";

  $result=mysqli_query($conn,$checkUser);



  if(mysqli_num_rows($result)>0){ 

    $checkUserquery="SELECT EMP_ID fROM employee WHERE email='$email' and password='$password'";
    $resultant=mysqli_query($conn,$checkUserquery);

    if(mysqli_num_rows($resultant)>0){

      while($row=$resultant->fetch_assoc())
      
      $response['user']=$row;
      $response['error']="200";
      $response['message']="login success";
    }
    else{
      $response['user']=(object)[];
      $response['error']="400";
      $response['message']="Wrong credentials";

    }
   
    
  }
  else{

    $response['user']=(object)[];
    $response['error']="400";
  	$response['message']="user does not exist";


  }

  echo json_encode($response);
    
?>