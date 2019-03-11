<?php

$servername="localhost";
$username= "root";
$password = "";
$db = "shopstore";

$con = mysqli_connect($servername,$username,$password,$db);
$con->set_charset("utf8");

if(!$con){
    die("Connect Err ".mysqli_connect_error());
}else{
    // echo "Connect complete";
}
?>