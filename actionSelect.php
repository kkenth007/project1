<?php
include("db.php");
if(isset($_POST['cat_id']) || isset($_POST['brand_id']) || isset($_POST['search'])){
    // $cid = $_POST['cat_id'];
    // $bid = $_POST['brand_id'];
    // print_r($bid);
    // print_r($cid);
    if(isset($_POST['cat_id'])){
        $cid = $_POST['cat_id'];
        $selected_product = "SELECT * FROM products WHERE product_cat ='$cid'";
    }elseif(isset($_POST['brand_id'])){
        $bid = $_POST['brand_id'];
        $selected_product = "SELECT * FROM products WHERE product_brand ='$bid'";
    }else{
        $id = $_POST['keyword'];
        $selected_product = "SELECT * FROM products WHERE product_title or product_keywords LIKE '%$id%'";
    }



    // if(isset($_POST['id'])){
    //     $id = $_POST['cat_id'];
    //     $brand_query = "SELECT * FROM products WHERE product_cat ='$id'";
    // }elseif(isset($_POST['selectBrand'])){
    //     $id = $_POST['brand_id'];
    //     $brand_query = "SELECT * FROM products WHERE product_brand ='$id'";
    // }


    // $selected_product = "SELECT * FROM products WHERE product_cat ='$cid'";
    $run_query_pro = mysqli_query($con, $selected_product);
    // print_r($run_query_pro);

    while($row = mysqli_fetch_array($run_query_pro )){
            $pro_id = $row["product_id"];
            $pro_cat = $row["product_cat"];
            $pro_brand = $row["product_brand"];
            $pro_title = $row["product_title"];
            $pro_price = $row["product_price"];
            $pro_image = $row["product_image"];
            
            // echo $pro_brand;
            echo "
            <div class='card'>
            <img class='card-img-top' src='$pro_image'>
                        <div class='card-body'>
                            <p class='card-text'>$pro_title</p>
                        </div>
                        <div class='tab-price'>
                            <div class='old-price'>฿230</div>
                            <div class='new-price'>฿$pro_price</div>
                        </div>
                        <div class='card-footer'>
                            <button class='btn btn-primary btn-sm'><i class='fas fa-cart-plus'></i></button>
                            <button class='btn btn-outline-primary btn-sm'><a href='DetailProduct.php?item_id={$pro_id}';><i class='fas fa-list-ul'></i> รายละเอียด</a></button>
                        </div>
                </div>
            ";

        }
    
}

?>