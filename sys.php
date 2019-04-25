<?php
session_start();
include "db.php";
$user_id = $_SESSION["UserID"];
$sql = "DELETE FROM carts WHERE user_id='$user_id'";
mysqli_query($con,$sql);

if(isset($_SESSION["number_pay"])){
    unset($_SESSION["number_pay"]);
}
header("Location:home.php");

?>