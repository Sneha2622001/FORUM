<?php

$showError= "false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];     //all are  called from name"";
    $password = $_POST['loginpassword'];
   

    //check whether this email exists...
    $sql = "SELECT * FROM `users` where user_email='$email'";
    $result = mysqli_query($conn,$sql);
    $numrows = mysqli_num_rows($result);

    if($numrows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['user_password'])){
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['sno']= $row['sno'];
            $_SESSION['useremail']= $email;
            echo "logged in".$email;
           
        }
         header ("Location: /FORUM/index.php");
    }
    header ("Location: /FORUM/index.php");
}

?>