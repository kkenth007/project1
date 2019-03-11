<?php 
    include("db.php");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['birth'];
    // echo $date;
    function change ($date){
        $temp = explode("/",$date);
        return "$temp[2]/$temp[1]/$temp[0]";
    }
    $dateTrue= change($date);
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    
	//query 
    $sql="INSERT INTO user_info (fname,lname,email,password,Userlevel,born,gender) 
    VALUES ('$fname', '$lname', '$email', '$password', '$level', '$dateTrue', '$gender')";
    $result = mysqli_query($con,$sql);
    header("Location: index.php ");


?>