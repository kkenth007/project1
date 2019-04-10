<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'shopstore';

$conn = mysqli_connect($host,$user,$pass,$dbName);
mysqli_set_charset($conn,'utf8');

// if($conn){
//     // echo "Succ";
// }

?>