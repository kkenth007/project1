<?php
session_start();
include "db.php";
$user_id = $_SESSION["UserID"];
$sql = "DELETE FROM carts WHERE user_id='$user_id'";
mysqli_query($con,$sql);
unset($_SESSION['Userlevel']);
session_destroy();
header("Location: index.php ");	

?>