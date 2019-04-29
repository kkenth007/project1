<?php
session_start();
include "../db.php";
if (isset($_POST['adduser'])) {
    echo $fname = $_POST['fname'];
    echo $lname = $_POST['lname'];
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];
    echo $born = $_POST['birth'];
    echo $gender = $_POST['gender'];

    $level = "M";

    //check email same
    $checksame = "SELECT email from user_info";
    $allmail = mysqli_query($con, $checksame);

    while ($row = mysqli_fetch_array($allmail)) {
        if ($email == $row['email']) {
            echo "<script>alert('อีเมลซ้ำ น่ะครับ ');</script>";
            echo "<script>window.history.back()</script>";
            header("Location:manageuser.php");
            exit;
        }
    }
    function change($date)
    {
        $temp = explode("/", $date);
        return "$temp[2]/$temp[1]/$temp[0]";
    }
    $dateTrue = change($born);

    if (empty($fname) && empty($lname) && empty($email) && empty($password) && empty($born) && empty($gender)) {
        header("Location:manageuser.php");
    } else {
        $sql = "INSERT INTO user_info (fname,lname,email,password,Userlevel,born,gender) 
        VALUES ('$fname', '$lname', '$email', '$password', '$level', '$dateTrue', '$gender')";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        header("Location:manageuser.php");
    }
}
