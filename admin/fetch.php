<?php
session_start();
include "../db.php";

// managecat
if (isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $query = "SELECT * FROM categories WHERE cat_id = '$edit_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
    mysqli_close($con);
}
if (isset($_POST['idcat'])) {
    $newCat = $_POST['new_edit_id'];
    $idcat = $_POST['idcat'];
    $sql = "UPDATE `categories` SET `cat_title` = '$newCat' WHERE `categories`.`cat_id` = '$idcat'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM categories where cat_id ='$delete_id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<div class="alert alert-danger" role="alert">
    <strong>ลบหมวดหมู่สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
    <span class="sr-only">Loading...</span>
  </span>
  </div>';
}
// add cat
if (isset($_POST['addcat'])) {
    $textcat = $_POST['addcat'];
    $sql = "INSERT INTO categories (cat_title) VALUES ('$textcat')";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<div class="alert alert-success" role="alert">
    <strong>เพิ่มหมวดหมู่สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-success" role="status">
    <span class="sr-only">Loading...</span>
  </span>
  </div>';
}


//=Brand
//add brand

if (isset($_POST['textbrand'])) {
    $textbrand = $_POST['textbrand'];
    $sql = "INSERT INTO brand (brand_title) VALUES ('$textbrand')";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<div class="alert alert-success" role="alert">
    <strong>เพิ่มแบรนสำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-success" role="status">
    <span class="sr-only">Loading...</span>
  </span>
  </div>';
}
// Delete brand
if (isset($_POST['del_brand'])) {
    $del_brand = $_POST['del_brand'];
    $sql = "DELETE FROM brand WHERE brand_id ='$del_brand'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<div class="alert alert-danger" role="alert">
        <strong>ลบ Brand สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
        <span class="sr-only">Loading...</span>
      </span>
      </div>';
        mysqli_close($con);
    } else {
        echo "err";
        mysqli_close($con);
    }
}

//edit brand

if (isset($_POST['editbrand'])) {
    $editbrand = $_POST['editbrand'];
    $query = "SELECT * FROM brand WHERE brand_id = '$editbrand'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
    mysqli_close($con);
}

if (isset($_POST['idbrand'])) {
    $newtextbrand = $_POST['newtextbrand'];
    $idbrand = $_POST['idbrand'];
    $sql = "UPDATE `brand` SET `brand_title` = '$newtextbrand' WHERE `brand`.`brand_id` = $idbrand";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<div class="alert alert-danger" role="alert">
        <strong>ลบ Brand สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
        <span class="sr-only">Loading...</span>
      </span>
      </div>';
        mysqli_close($con);
    } else {
        echo "err";
        mysqli_close($con);
    }
}




// ส่วนของ จัดการสมาชิก
// วิวสมาชิก
if (isset($_POST['user_id'])) {
    $usr_info = $_POST['user_id'];
    $sql = "SELECT * FROM `user_info` WHERE user_id = '$usr_info'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
    mysqli_close($con);
}
if (isset($_POST['edit_user_id'])) {
    $usr_id = $_POST['edit_user_id'];
    $sql = "SELECT * FROM `user_info` WHERE user_id = '$usr_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
    mysqli_close($con);
    // exit();
}

if (isset($_POST['editrunner'])) {
    $fname = $_POST['editfname'];
    $lname = $_POST['editlname'];
    $email = $_POST['editemail'];
    $password = $_POST['editpassword'];
    $phone = $_POST['editphone'];
    $adress1 = $_POST['editadress1'];
    $adress2 = $_POST['editadress2'];
    $ur_id = $_POST['userEditt'];
    $sql = "UPDATE `user_info` SET `fname` = '$fname', `lname` = '$lname', `email` = '$email', `password` = '$password',
     `phone` = '$phone', `adress1` = '$adress1', `adress2` = '$adress2',
      `born` = '2541-08-05' WHERE `user_info`.`user_id` = '$ur_id'";
    $Edits = mysqli_query($con, $sql);
    // echo $run;
    if ($Edits) {
        echo '<div class="alert alert-success" role="alert">
        <strong>แก้ไขสมาชิก สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-success" role="status">
        <span class="sr-only">Loading...</span>
      </span>
      </div>';
        mysqli_close($con);
        header("Location:manageuser.php");
    } else {
        echo "err";
        header("Location:manageuser.php");
    }
}

// delete member
if (isset($_POST['u_id'])) {
    $u_id = $_POST['u_id'];
    $sql = "DELETE FROM user_info WHERE user_id ='$u_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<div class="alert alert-danger" role="alert">
        <strong>ลบ Brand สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
        <span class="sr-only">Loading...</span>
      </span>
      </div>';
        mysqli_close($con);
    } else {
        echo "err";
        mysqli_close($con);
    }
}

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
