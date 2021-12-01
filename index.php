<?php

include("config.php");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
 
   $userEmail = mysqli_real_escape_string($conn,$_POST['userEmail']);
   $mypassword = mysqli_real_escape_string($conn,$_POST['userPassword']); 
   
   $sql = "SELECT id FROM users WHERE email = '$userEmail' and password = '$mypassword'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);

   if($count == 1) {
    $_SESSION['login_user'] = $userEmail;      
    header("location: dashboard.php");
    }else {
        $error = 0;
    }
}
     
            
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!--font awsome-->
    <script src="https://kit.fontawesome.com/43c323b536.js" crossorigin="anonymous"></script>
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400&display=swap" rel="stylesheet">

    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

</head>
<body>
<div class="form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="my_form" action="" method="POST">
                    <div class="form_icon">
                        <i class="fas fa-user-circle"></i>  
                    </div>
                    <h3 class="title">login form</h3>

                    <?php

                    if( isset( $error) ) {
                        echo "<h3>Username and password is wrong </h3>";
                    }                       
                    ?>


                    <div class="form_group">
                            <select class="form_control" aria-label=".form-select-lg example" style="padding-right: 50px;">
                                <option selected>Select your Role</option>
                                <option value="1">Administrator</option>
                                <option value="2">HR/Admin</option>
                                <option value="3">Employee</option>
                            </select>
                    </div>
                    <div class="form_group">
                        <span class="icon">
                      <i class="fab fa-accessible-icon"></i>
                        </span>
                        <input class="form_control" type="email" name="userEmail" placeholder="user Id" required>
                    </div>

                    <div class="form_group">
                        <span class="icon">
                         <i class="fas fa-lock"></i>
                        </span>
                        <input class="form_control" type="password" name="userPassword" placeholder="password" required>
                    </div>
                    

                   <button class= "btn  signin"> Log in </button>

                </form>

            </div>
        </div>
    </div>
</div>
 
</body>
</html>