<?php
session_start();


echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">iForum</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT category_name , category_sno FROM `categories` LIMIT 3";
        $result = mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
         echo '<li><a class="dropdown-item" href="threads.php?catid='.$row['category_sno'].'">'.$row['category_name'].'</a></li>';
        }
       echo ' </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" tabindex="-1" >Contact</a>
      </li>
    </ul>

    <div class="row mx-2">';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<form class="d-flex"  method="get" action="search.php">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        <p class="text-light my-0 mx-2">  Welcome '.$_SESSION['useremail'].'</p>
        <a href="partial/_logout.php" class="btn btn-outline-success ml-2">logout</a>
          </form>';
    }
        else{
          echo '<form class="d-flex">
                  <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-success" type="submit">Search</button>
              </form>
          </div>
          <div>
                  <button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
                  <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signinModal">signup</button>';
      }
      echo '</div>
  </div>
</div>
</nav>';

include 'partial/_loginmodal.php';
include 'partial/_signinmodal.php';

if(isset($_GET['signinsucess']) && $_GET['signinsucess']=="true"){
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can  now login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
else{
    if(isset($_GET['signinsucess']) && $_GET['signinsucess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
              <strong>Success!</strong> You cannot login please enter the correct password.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

}

?>