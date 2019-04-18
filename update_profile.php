<?php 
session_start();
$id = $_SESSION["UserID"];
include "db.php";
function change($date)
    {
        $temp = explode("/", $date);
        return "$temp[2]/$temp[1]/$temp[0]";
    }
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $adress1 = $_POST['adress1'];
        $adress2 = $_POST['adress2'];
        $gender = $_POST['gender'];
        $born_o = $_POST['born'];
        // print_r($born_o);
        $born = change($born_o);
        // print_r($born);

        $update = "UPDATE user_info SET fname = '$fname', `lname` = '$lname', `email` = '$email',
         `phone` = '$phone', `adress1` = '$adress1', `adress2` = '$adress2', `born` = '$born', `gender` = '$gender' WHERE `user_info`.`user_id` = '$id'";
        $result = mysqli_query($con, $update);
        print_r($result);
        echo "<br/>";
        print_r($update);
        header("Location: front_profile.php");
    ?>