<?php

session_start();

// it will return true/false .....
session_unset();

//it will logged it out.....
session_destroy();

header("location:login.php");
?>