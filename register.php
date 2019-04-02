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
    $level = "M";

    //check email same
    $checksame = "SELECT email from user_info";
    $allmail = mysqli_query($con,$checksame);

    while($row = mysqli_fetch_array($allmail)){
        if($email == $row['email']){
            echo "<script>alert('อีเมลซ้ำ น่ะครับ ');</script>";
            echo "<script>window.history.back()</script>";
            exit;
        }
    }

    
	//query 
    $sql="INSERT INTO user_info (fname,lname,email,password,Userlevel,born,gender) 
    VALUES ('$fname', '$lname', '$email', '$password', '$level', '$dateTrue', '$gender')";
    $result = mysqli_query($con,$sql);
    // header("Location: index.php ");
    echo "<script>alert('สมัครเรียบร้อย เข้าสู่ระบบกันได้เลย ');</script>";
    mysqli_close($con);
    echo "<script>window.history.back()</script>";
    // echo '<div class="alert alert-success" role="alert">สมัครเรียบร้อย</div>';


?>