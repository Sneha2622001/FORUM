<?php

$servername="localhost";
$username="root";
$password="";
$database="users";

//create a connection..............

$conn= mysqli_connect($servername,$username,$password,$database);


//die if connection was not successful............
if(!$conn){
    die("sorry you are fail to connect:" . mysqli_connect_error());
}
?>