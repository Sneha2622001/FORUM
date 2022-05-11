<?php

$showError= "false";
if($_SERVER['REQUEST_METHOD']=="POST"){

    include '_dbconnect.php';
    $user_email = $_POST['signinemail'];     //all are  called from name"";
    $password = $_POST['signinpassword'];
    $cpassword = $_POST['signincpassword'];

    //check whether this email exists...
    $existsql = "SELECT * FROM `users` where user_email='$user_email'";
    $result = mysqli_query($conn,$existsql);
    $numrows = mysqli_num_rows($result);

    if($numrows>0){
        $showError = "Email already in use";
    }
    else{
        if($password==$cpassword){
          $hash= password_hash($password, PASSWORD_DEFAULT);
          $sql= "INSERT INTO `users` ( `user_email`, `user_password`, `timestamp`)
           VALUES ( '$user_email', '$hash', current_timestamp())";
          $result = mysqli_query($conn,$sql);
          $showAlert = true;
          header ("Location: /FORUM/index.php?signinsucess=true");
          exit();
        }
        else{
            $showError = "Passwords don't matched";
         
        }
    }
    header ("Location: /FORUM/index.php?signinsucess=false&error=$showError ");
}
?>