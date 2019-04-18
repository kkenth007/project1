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
    $p_id = $_POST['ProId'];
    $qty = $_POST['ProQty'];
    $user_id = '';
    $user_id = $_SESSION["UserID"];

    // $sql = "SELECT * FROM products WHERE product_id='$p_id'";
    $sql = "SELECT * FROM carts WHERE p_id='$p_id' AND user_id='$user_id'";
    $run_query1 = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query1);
    if ($count > 0) {
        echo "สินค้าถูกเพิ่มไปยังตะกร้าแล้ว! the cart Continue Shoping...!";
    } else {
        $sql = "SELECT * FROM products WHERE product_id='$p_id'";
        $run_query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($run_query);
        $id = $row['product_id'];
        $pro_name = $row['product_title'];
        $pro_img = $row['product_image'];
        $pro_price = $row['product_price'];
        $total_price = $pro_price * $qty;
        $sql = "INSERT INTO carts ( p_id, ip_add, user_id, product_title, product_image, qty, price, total_amount) VALUES ('1', '', '$user_id', '$pro_name', '$pro_img', '$qty', '$pro_price', '$total_price')";
        if (mysqli_query($con, $sql)) {
            // echo "Product is Added";
            // echo '<div class="alert alert-success" role="alert" style="margin-top:16px;" data-dismiss="alert">สินค้าถูกเพิ่มไปยังตะกร้าแล้ว</div>';
            echo '<div style="margin-top:16px;" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>สินค้าถูกเพิ่มไปยังตะกร้าแล้ว!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
        }
    }

    
    }

