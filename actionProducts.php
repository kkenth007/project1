<?php
include("db.php");

// echo $_POST['getProduct'];
if(isset($_POST["getProduct"])){
    echo "Good";
}else{
    // $product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
    $product_query = "SELECT * FROM products";
    $run_query_pro = mysqli_query($con,$product_query);
    // print_r( $run_query_pro);
    if(mysqli_num_rows($run_query_pro)> 0){
        while($row = mysqli_fetch_array($run_query_pro)){
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
}

?>