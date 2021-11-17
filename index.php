<?php

    require_once "config.php";

    $error ='';


    if(!empty($_POST['userEmail']) && !empty($_POST['userPassword'])){

        $email = $_POST['userEmail'];
        $clearTextPassword = $_POST['userPassword'];
    if (empty($email)) {
          echo "Email is empty";
        }elseif(empty($clearTextPassword)){
            echo "Password is empty";
        }else{

            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $user_Id = $signInResult->firebaseUserId();
            if($user_Id == NULL){
                $error = 'Login Credentials Is Incorrect';
            }else{
                header("location: welcome.php?id=$user_Id");
            }

    }


    }else{

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
                <h2><?php echo $error; ?></h2>
                <form class="my_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form_icon">
                        <i class="fas fa-user-circle"></i>  
                    </div>
                    <h3 class="title">login form</h3>
                    <div class="form_group">
                        <span class="icon">
                      <i class="fab fa-accessible-icon"></i>
                        </span>
                        <input class="form_control" type="email" name="userEmail" placeholder="user Id">
                    </div>

                    <div class="form_group">
                        <span class="icon">
                         <i class="fas fa-lock"></i>
                        </span>
                        <input class="form_control" type="password" name="userPassword" placeholder="password">
                    </div>


                   <button  class= "btn  signin" > Log in </button>


                </form>


            </div>
        </div>
    </div>
</div>
 
</body>
</html>