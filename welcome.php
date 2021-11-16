<?php
require_once "config.php";

$token_id = $_GET['id'];

class Fruit {
    public $joinAt;
    public $salary;
  
    function __construct($joinAt) {
      $this->joinAt = $joinAt;
    }
    function get_joinAt() {
      return $this->joinAt;
    }
  }



$path = 'Employee/'.$token_id.'/JobInfo';

$reference = $database->getReference($path);

$value = $reference->getValue();

$apple = new Fruit($value);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo $token_id; ?></b>. Welcome to our site.</h1>
    <h6> <?php 
    foreach($value as $x){
        echo $apple->get_joinAt;
        echo '</br>';

    }
     
    ?> </6>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>