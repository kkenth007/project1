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


// confirm_OK_save_track
if (isset($_POST['confirm_OK_save_track'])) {
    $tr_id = $_POST['codepayment'];
    $id_member = $_POST['c_member'];
    $track = $_POST['track'];

    $update = "UPDATE `order_store` SET `p_status` = 'ชำระเรียบร้อย' WHERE `order_store`.`tr_id` = '$tr_id'";
    $update1 = "UPDATE `track_store` SET `track_code`='$track' WHERE ref_pay_id ='$tr_id'";
    mysqli_query($con, $update);
    mysqli_query($con, $update1);
    mysqli_close($con);
    header("Location:managepayment.php");
}

if (isset($_POST['delete_pay'])) {
    $del = $_POST['del'];
    // $user_id = $_POST['user_id'];
    $sql = "DELETE FROM track_store where ref_pay_id = '$del'";
    $sql = "DELETE FROM payment_store where ref_pay_id = '$del'";
    $sql = "DELETE FROM order_store where tr_id = '$del'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<div class="alert alert-danger" role="alert">
    <strong>ลบหมวดหมู่สำเร็จ ! </strong>  &nbsp;&nbsp;&nbsp; <span class="spinner-border text-danger" role="status">
    <span class="sr-only">Loading...</span>
  </span>
  </div>';
}


//edit_bank
if (isset($_POST['Edit_bank'])) { ?>
    <?php

    $bank_num = $_POST['bank_id'];
    $sql = "SELECT * FROM `bank_info` WHERE bank_number='$bank_num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <!-- The Modal -->
    <div class="modal" id="editBank">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">แก้ไขธนาคาร</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="action.php" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">ชื่อธนาคาร</label>
                            <input type="text" class="form-control" id="bankname" value="<?php echo $row['bank_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="usr">เลขที่บัญชีธนาคาร</label>
                            <input type="text" class="form-control" id="num_bank" value="<?php echo $row['bank_number']; ?>">
                            <input type="hidden" id="bank_id" value="<?php echo $row['bank_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="comment">รายละเอียดธนาคาร</label>
                            <textarea class="form-control" rows="4" id="bank_detail"><?php echo $row['bank_detail']; ?></textarea>
                        </div> รูปภาพ
                        <form method="post" action="" enctype="multipart/form-data" id="myform">
                            <div>
                                <input type="file" id="file" name="file" />
                                <input type="button" class="btn btn-success" value="อัพโหลดรูป" id="but_upload">
                            </div>
                            <div class='preview'>
                                <img src="../asset/bank_img/default.png" id="img" class="img-thumbnail" width="100" height="100">
                            </div>
                        </form>
                    </div>
                    <script>
                        $(document).ready(function() {

                            $("#but_upload").click(function() {
                                var fd = new FormData();
                                var files = $('#file')[0].files[0];
                                fd.append('file', files);

                                $.ajax({
                                    url: 'upload.php',
                                    type: 'post',
                                    data: fd,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        if (response != 0) {
                                            $("#img").attr("src", response);
                                            $('.preview img').show();
                                        } else {
                                            alert('File not uploaded');
                                        }
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success Edit_save_re" name="Edit_save_re">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php } ?>

<!-- Add product to DB -->
<?php
if (isset($_POST['SAVE_PRO'])) {
    $ptitle = $_POST['product_title'];
    $pcat = $_POST['product_cat'];
    $pbrand = $_POST['product_brand'];
    $pprice = $_POST['product_price'];
    $pstock = $_POST['product_stock'];
    $pdesc = $_POST['product_desc'];
    $pimg = $_SESSION["imgupload"];
    $pkeyword = $_POST['product_keywords'];
    $punit = $_POST['product_unit'];
    $poprice = $_POST['product_original_price'];
    $sql = "INSERT INTO `products` (`product_cat`, `product_brand`, `product_title`, `product_price`,
     `product_stock`, `product_desc`, `product_image`, `product_keywords`, `product_unit`, `product_original_price`) 
    VALUES ('$pcat', '$pbrand', '$ptitle', '$pprice', '$pstock', '$pdesc', '$pimg', '$pkeyword', '$punit', '$poprice')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "เพิ่มสำเร็จ";
    } else {
        echo "เพิ่มไม่สำเร็จ";
    }
    header("Location:manageproduct.php");
    exit();
}


if (isset($_POST['pro_id'])) {
    $pro_id = $_POST['pro_id'];
    $sql = "SELECT * FROM `products` WHERE product_id='$pro_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $allBrand = "SELECT * from brand";
    $cal = mysqli_query($con, $allBrand);

    $allcat = "SELECT * FROM categories";
    $catgory = mysqli_query($con, $allcat);

    ?>
    <div class="modal" id="EditProductShow">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="action.php" method="post">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขสินค้า</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">ชื่อสินค้า</label>
                            <input type="text" class="form-control" value="<?php echo $row['product_title']; ?>" name="product_title">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sel1">หมวดหมู่</label>
                            <select class="form-control" id="sel1" name="product_cat">
                                <?php while ($catgorys = mysqli_fetch_assoc($catgory)) { ?>
                                    <option value="<?php echo $catgorys['cat_id']; ?>" <?php if ($catgorys['cat_id'] == $row['product_cat']) echo 'selected' ?>><?php echo $catgorys['cat_title']; ?></option>
                                <?php } ?>
                            </select>
                            <?php $check = $row['product_brand']; ?>
                            <label for="sel1">แบรนด์</label>
                            <select class="form-control" id="sel1" name="product_brand">
                                <?php while ($bran = mysqli_fetch_assoc($cal)) { ?>
                                    <option value="<?php echo $bran['brand_id']; ?>" <?php if ($bran['brand_id'] == $row['product_brand']) echo 'selected' ?>> <?php echo $bran['brand_title']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                                <label for="usr">ราคา</label>
                                <input type="text" class="form-control" value="<?php echo $row['product_price']; ?>" name="product_price">
                            </div>
                            <div class="form-group">
                                <label for="usr">สินค้าคงเหลือ</label>
                                <input type="text" class="form-control" value="<?php echo $row['product_stock']; ?>" name="product_stock">
                            </div>
                            <div class="form-group">
                                <label for="comment">รายละเอียดสินค้า</label>
                                <textarea class="form-control" rows="4" name="product_desc"><?php echo $row['product_desc']; ?> </textarea>
                            </div>
                            <div style="margin-bottom:.5rem;">รูปภาพ</div>
                            <form method="post" action="" enctype="multipart/form-data" id="myform">
                                <div>
                                    <input type="file" id="file" name="file" />
                                    <input type="button" class="btn btn-success" value="อัพโหลดรูป" id="product_upload">
                                </div>

                                <div class='previews'>
                                    <img src="<?php echo "../" . $row['product_image']; ?>" id="img" class="img-thumbnail" width="100" height="100">
                                </div>
                            </form>

                            <div class="form-group">
                                <label for="usr">Keyword (คีย์เวิร์ด)</label>
                                <input type="text" class="form-control" value="<?php echo $row['product_keywords']; ?>" name="product_keywords">
                            </div>
                            <div class="form-group">
                                <label for="usr">หน่วย</label>
                                <input type="text" class="form-control" value="<?php echo $row['product_unit']; ?>" name="product_unit">
                            </div>
                            <div class="form-group">
                                <label for="usr">ราคาสินค้าดั่งเดิม</label>
                                <input type="text" class="form-control" value="<?php echo $row['product_original_price']; ?>" name="product_original_price">
                            </div>


                        </div>
                        <script>
                            $(document).ready(function() {

                                $("#but_upload").click(function() {
                                    var fd = new FormData();
                                    var files = $('#file')[0].files[0];
                                    fd.append('file', files);

                                    $.ajax({
                                        url: 'upload.php',
                                        type: 'post',
                                        data: fd,
                                        contentType: false,
                                        processData: false,
                                        success: function(response) {
                                            if (response != 0) {
                                                $("#img").attr("src", response);
                                                $('.preview img').show();
                                            } else {
                                                alert('File not uploaded');
                                            }
                                        }
                                    });
                                });
                            });
                        </script>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="SAVE_PRO_EDIT" value="SAVE_PRO_EDIT">บันทึก</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>