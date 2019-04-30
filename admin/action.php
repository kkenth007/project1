<?php
session_start();
include "../db.php";
//กระบวการอัพโหลด ลบcart update payment update track 

if (isset($_POST['addbanks'])) {
  $bankname = $_POST['bankname'];
  $num_bank =  $_POST['num_bank'];
  $bank_detail = $_POST['bank_detail'];
  $img =  $_SESSION["imgupload"];
  $sql = "INSERT INTO bank_info (bank_name,bank_number,bank_detail,bank_img)
    VALUES('$bankname','$num_bank','$bank_detail','$img')";
  mysqli_query($con, $sql);
  echo '<div class="alert alert-success" role="alert">
    <strong>เพิ่มธนาคารสำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-success" role="status">
    <span class="sr-only">Loading...</span>
  </span>
  </div>';
  exit();
}


if (isset($_POST['editbank'])) {
  $bankname = $_POST['bankname'];
  $num_bank =  $_POST['num_bank'];
  $bank_detail = $_POST['bank_detail'];
  $img =  $_SESSION["imgupload"];
  $bank_id = $_POST['bank_id'];

  $sql = "UPDATE `bank_info` SET `bank_name` = '$bankname', `bank_number` = '$num_bank', `bank_detail` = '$bank_detail', `bank_img` = '$img' 
  WHERE `bank_info`.`bank_id` = '$bank_id'";
  mysqli_query($con, $sql);
  mysqli_close($con);
  exit();
}

//delete bank
if (isset($_POST['del_id'])) {
  $id = $_POST['del_id'];
  $sql = "DELETE FROM `bank_info` WHERE bank_id='$id';";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo '<div class="alert alert-danger" role="alert">
  <strong>ลบธนาคารสำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
  <span class="sr-only">Loading...</span>
</span>
</div>';
  } else {
    echo $id;
  }

  mysqli_close($con);
  exit();
}

if (isset($_POST['SAVE_PRO_EDIT'])) {
    $ptitle = $_POST['product_title'];
    $product_id = $_POST['product_id'];
    $pcat = $_POST['product_cat'];
    $pbrand = $_POST['product_brand'];
    $pprice = $_POST['product_price'];
    $pstock = $_POST['product_stock'];
    $pdesc = $_POST['product_desc'];
    $pimg = $_SESSION["imgupload"];
    $pkeyword = $_POST['product_keywords'];
    $punit = $_POST['product_unit'];
    $poprice = $_POST['product_original_price'];
    $sql = "UPDATE `products` SET `product_cat` = '$pcat', `product_brand` = '$pbrand', `product_title` = '$ptitle',
     `product_price` = '$pprice', `product_stock` = '$pstock', `product_desc` = '$pdesc', `product_image` = '$pimg',
      `product_keywords` = '$pkeyword', `product_unit` = '$punit', `product_original_price` = '$poprice' WHERE `products`.`product_id` = '$product_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "เพิ่มสำเร็จ";
    } else {
        echo "เพิ่มไม่สำเร็จ";
    }
    header("Location:manageproduct.php");
    exit();
}

//delete product
if (isset($_POST['del_pro'])) {
  $id = $_POST['del_pro'];
  $sql = "DELETE FROM `products` WHERE product_id='$id';";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo '<div class="alert alert-danger" role="alert">
  <strong>ลบสินค้าสำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
  <span class="sr-only">Loading...</span>
</span>
</div>';
  } else {
    echo $id;
  }

  mysqli_close($con);
  exit();
}