<?php
session_start();

if(isset($_SESSION["number_pay"])){
    unset($_SESSION["number_pay"]);
}
header("Location:home.php");

?>