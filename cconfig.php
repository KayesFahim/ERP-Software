<?php
    $servername = "localhost";
    $username = "flyfcksv_erp";
    $password = "@FlyFarTech360";
    $dbname = "flyfcksv_erp";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
        echo ' ';
  }
    
?>