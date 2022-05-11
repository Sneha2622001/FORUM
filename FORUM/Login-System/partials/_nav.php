
<?php

//if you are logged in.....

if(isset($_SESSION['loggedin'] ) && $_SESSION['loggedin']==true){
 $loggedin=true;
}
else{
  $loggedin=false; 
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Login-System">LOGIN-SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

        <!-- CREATED  HREF LINK TO CONNECT WITH HOME PAGE-->

          <a class="nav-link active" aria-current="page" href="/Login-System/welcome.php">Home</a>
        </li>';


        //show when we are logged in..........
    if(!$loggedin){
       echo '<li class="nav-item">
          <a class="nav-link" href="/Login-System/login.php">Login</a>  
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/Login-System/sign-up.php">sign-up</a> 
        </li>';
    }
        //show when we are logged in..........
      if($loggedin){
        echo ' <li class="nav-item">
          <a class="nav-link" href="/Login-System/log-out.php">log-out</a> 
        </li>';
      }
  
     echo '</ul>
     
    </div>
  </div>
</nav>';

?>