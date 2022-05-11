<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
        <style>
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
      }
      </style>


    <title>Welcome to iForums!</title>
</head>

<body>

    <?php include 'partial/_dbconnect.php';?>
    <?php include 'partial/_header.php';?>
    

   <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM `thread_list` WHERE thread_id=$id";
        $result = mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_user_id=$row['thread_user_id'];
            $sql2="SELECT user_email FROM `users` WHERE sno=$thread_user_id";
            $result2 = mysqli_query($conn,$sql2);
            $row2= mysqli_fetch_assoc($result2);
            $posted_by =  $row2['user_email'];
        }
    ?>
<?php
    $showalert=false;
     $method = $_SERVER['REQUEST_METHOD'];
     if($method=='POST'){
         //insert into comment database....
         $comment=$_POST['comment'];
         $sno=$_POST['sno'];
         $comment = str_replace("<", "&lt;" , $comment);
         $comment = str_replace(">", "&gt;" , $comment);
         $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`)
          VALUES ('$comment', '$id', '$sno', current_timestamp())";
         $result = mysqli_query($conn,$sql);
         $showalert=true;
         if($showalert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESSFULLY!</strong> You comment has been added!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
         }
       }

    ?>



    <!-- container category starts here -->
    <div class="container my-4">
        <!-- used jumbotron from bootstrap -->

        <div class="jumbotron" >
            <h1 class="display-4"><?php  echo $title ;?></h1>
            <p class="lead"> <?php  echo $desc ;?></p>
            <hr class="my-4">
            <p>This is a perr to peer forum sharing knowledge with each other.No Spam / Advertising / Self-promote in the forums is not allowed.Do not post copyright-infringing material.
               Do not post “offensive” posts, links or images.Do not cross post questions.Do not PM users asking for help.Remain respectful of other members at all times.
          </p>
            <p class="lead">
             <p>Posted by :<b><?php echo $posted_by;?> <b></p>
            </p>
        </div>
    </div>
  
<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
   echo '<div class="container">
                <h1 class="py-3">Post a Comment</h1>
                <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
                    <div class="form-group mb-3">
                        <label for="eampleFormControlTextarea1">Type your comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                    </div>
                    <button type="submit" class="btn btn-success">Post comment</button>
                </form>
            </div>';
 }
        else{
            // if person is not logged in then show this....
        echo '<div class="container">
               <h1 class="py-3">Post a Comment</h1>
                <p class="lead">You are not logged in. Please login to Post  a comment</p>
              </div>';
        }
?>

    <div class="container mb-5"  id="ques">
        <h1 class="py-3">Dicussion</h1>
       
   <?php
      $id=$_GET['threadid'];
      $sql="SELECT * FROM `comments` WHERE thread_id=$id";
      $result = mysqli_query($conn,$sql);
      $noresult=true;
      while($row=mysqli_fetch_assoc($result)){
          $noresult=false;
          $id=$row['comment_id'];
          $content=$row['comment_content'];
          $comment_time=$row['comment_time'];

          $thread_user_id=$row['comment_by'];
          $sql2="SELECT user_email FROM `users` WHERE sno=$thread_user_id";
          $result2 = mysqli_query($conn,$sql2);
          $row2= mysqli_fetch_assoc($result2);
          
      

     echo '<div class="d-flex my-3">
              <div class="flex-shrink-0">
                  <img src="img/userdefault.png" width="75px" alt="...">
              </div>
              <div class="flex-grow-1 ms-3">
              <p class="font-weight-bold my-0">'.$row2['user_email'].' at ('.$comment_time.')</p>
               '.$content.'
          </div>
      </div>';
      }
     if($noresult){
        echo '<div class="jumbotron jumbotron-fluid">
                  <div class="container">
                  <p class="display-4">No Comment Found.</p>
                  <p class="lead">Be the first person to ask  comment</p>
                  </div>
              </div>';
      }
    ?>
    <?php include 'partial/_footer.php';?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>