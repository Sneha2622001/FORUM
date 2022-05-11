<?php

//if you are not logged in.....

session_start();
if(!isset($_SESSION['loggedin'] )|| $_SESSION['loggedin']!=true){
header("location:login.php");
exit;
}


?>


<!--TEMPLATE-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome  - <?php $_SESSION['username']  ?></title>
  </head>
  <body>

    <!--Navigation bar from bootsrap-->
    <?php require'partials/_nav.php' ?>
      


    <!--alert......from bootstrap...-->
     

    <div class="container my-5">
     <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome  - <?php echo $_SESSION['username']  ?></h4>
        <p>Hey!!! How are you doing? WELCOME to Login-system. You are logged in as <?php echo $_SESSION['username'] ?> </p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to loggout <a href="/Login-System/log-out.php"> using this link.</a></p>
     </div>
   </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>