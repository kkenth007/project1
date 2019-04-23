<?php
session_start();
include("db.php");

if (isset($_POST["id"])) {
    // echo "Good";
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con, $category_query);
    echo "
    <ul class='list-group' style='margin-top:10px;width:100%;'>
    <li class='list-group-item active'>หมวดหมู่สินค้า</li>
    ";
    if (mysqli_num_rows($run_query) > 0) {
        $str = "";
        while ($row = mysqli_fetch_array($run_query)) {
            $cid = $row['cat_id'];
            $cat_name = $row['cat_title'];
            $str .= "
            <li class='list-group-item'><a href='#' class='category' cid='$cid'>$cat_name</a></li>";;
        }
        $str .= "</ul>";
    }
    echo $str;
} else {
    // echo "ค้นหา หมวดหมู่สินค้า ไม่เจอ";


}

if (isset($_POST["addToProduct"])) {
    $payNum = $_SESSION["number_pay"];
    $p_id = $_POST['ProId'];
    // $qty = $_POST['ProQty'];
    $user_id = '';
    $user_id = $_SESSION["UserID"];

    // $sql = "SELECT * FROM products WHERE product_id='$p_id'";
    $sql = "SELECT * FROM carts WHERE p_id='$p_id' AND user_id='$user_id'";
    $run_query1 = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query1);
    if ($count > 0) {
        // echo "สินค้าถูกเพิ่มไปยังตะกร้าแล้ว! the cart Continue Shoping...!";
        echo '<div style="margin-top:16px;" class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>สินค้าชิ้นถูกเพิ่มไปยังตะกร้าแล้ว! ช็อปต่อได้เลย</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    } else {
        $sql = "SELECT * FROM products WHERE product_id='$p_id'";
        $run_query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($run_query);
        $id = $row['product_id'];
        $pro_name = $row['product_title'];
        $pro_img = $row['product_image'];
        $pro_price = $row['product_price'];
        $total_price = $pro_price * 1;
        $statusUser = $_SESSION["Userlevel"];
        if ($statusUser == 'M') {
            $statusUser = 'member';
        } else {
            exit();
        }
        $sql = "INSERT INTO carts ( p_id, status_user, user_id, product_title, product_image, qty, price, total_amount,tr_id) VALUES ('$id', '$statusUser', '$user_id', '$pro_name', '$pro_img', '1', '$pro_price', '$total_price','$payNum')";
        if (mysqli_query($con, $sql)) {
            // echo "Product is Added";
            // echo '<div class="alert alert-success" role="alert" style="margin-top:16px;" data-dismiss="alert">สินค้าถูกเพิ่มไปยังตะกร้าแล้ว</div>';
            echo '<div style="margin-top:16px;" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>เพิ่มไปยังตะกร้าสำเร็จ!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
        }
    }
}

?>
<?php
if (isset($_POST['cart_checkout'])) {
    $user_id = $_SESSION["UserID"];
    $sql = "SELECT * FROM cart where user_id = $user_id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    echo '<div id="cartdetail">
					<div class="row">
						<div class="col-md-2"><a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
						<a href="#" class="btn btn-success"><i class="fas fa-calculator"></i></a>
						</div>
						<div class="col-md-2"><img src="assets/prod_images/tshirt.JPG" width="60px" height="60px"></div>
						<div class="col-md-2">Tshirt</div>
						<div class="col-md-2">$700</div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value="1"></div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value="700" disabled></div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total: $500000</b>
						</div>
        </div>

    }';
}
//delete product 
if (isset($_POST['remove_id'])) {

    $pid = $_POST['remove_id'];
    $uid = $_SESSION["UserID"];
    $sql = "DELETE FROM `carts` WHERE p_id=$pid";
    $run_query = mysqli_query($con, $sql);
    if ($run_query) {
        echo '<div style="margin-top:16px;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </span> &nbsp;&nbsp;&nbsp;
            <strong>ลบสินค้าสินค้าสำเร็จ!</strong> &nbsp;
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
}


//update product 
if (isset($_POST['updateFromCart'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['update_id'];
    $uid = $_SESSION["UserID"];
    // ไม่ปลอดภัย
    $total = $_POST['total_price'];
    $sql = "UPDATE carts SET qty ='$qty',total_amount='$total' WHERE p_id=$pid";
    $run_query = mysqli_query($con, $sql);
    if ($run_query) {
        echo '<div style="margin-top:16px;" class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
          </span> &nbsp;&nbsp;&nbsp;<strong>อัพเดทสินค้าสำเร็จ!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    }
}

//กระบวการอัพโหลด ลบcart update payment update track 

if (isset($_POST['payMoney'])) {
    $bank =$_POST['bank'];
    $adress =  $_POST['adress'];
    $phone = $_POST['phone'];
    $img =  $_SESSION["imgupload"];
    if(isset($_SESSION["number_pay"])){
        $payNum = $_SESSION["number_pay"];
    }
    $id = $_SESSION["UserID"];
    $sql = "SELECT * FROM user_info WHERE user_id='$id'";
    $run = mysqli_query($con,$sql);
    $result = mysqli_fetch_array($run);
    if($result['phone'] != $phone){
        $sql1 = "UPDATE `user_info` SET `phone` = '$phone' WHERE `user_info`.`user_id` = $id";
        mysqli_query($con,$sql1);
    }
    if($result['adress2'] != $adress){
        $sql2 = "UPDATE user_info SET `adress2` = '$adress' WHERE `user_info`.`user_id` = $id";
        mysqli_query($con,$sql2);
    }

    $copytable = "INSERT INTO order_store (p_id, user_id,qty,price,tr_id) SELECT p_id, user_id,qty,price,tr_id FROM carts WHERE user_id=$id";
    mysqli_query($con,$copytable);
    
    // $updatenewtable ="INSERT INTO  order_store (tr_id) VALUES ('$payNum') WHERE user_id=$id";
    // mysqli_query($con,$updatenewtable);
    if(isset($_SESSION["number_pay"])){
        $addBank = "INSERT INTO payment_store (ref_user_id,ref_cart_id,pay_bill, ref_bank_id) VALUES ('$id','$payNum','$img', '$bank')";
        mysqli_query($con,$addBank);
    }
    if(isset($_SESSION["number_pay"])){
    $addtrack_store = "INSERT INTO track_store (ref_pay_id, ref_user_id) VALUES ('$payNum', '$id')";
    mysqli_query($con,$addtrack_store);
    }
    $deleteCart = "DELETE FROM carts WHERE user_id=$id";
    mysqli_query($con,$deleteCart);

    // session_unset($_SESSION["number_pay"]);
    unset($_SESSION["number_pay"]);
    $del = "DELETE FROM `track_store` WHERE ref_pay_id=0";
    $del = "DELETE FROM `payment_store` WHERE ref_cart_id=0";
    $del = "DELETE FROM `track_store` WHERE ref_pay_id=0";
    mysqli_multi_query($con,$del);

    echo '<div style="margin-top:16px;" class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
          </span> &nbsp;&nbsp;&nbsp;<strong>ทำการชำระเสร็จสิ้น !</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';

}
?>