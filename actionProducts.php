<?php
include("db.php");

// echo $_POST['id'];
// $id =$_POST['id'];
// $id=2;'
// if(isset($_POST["getProduct"])){

if(isset($_POST["id"])){
    $product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
    // $product_query = "SELECT * FROM products;";
    $run_query_pro = mysqli_query($con,$product_query);
    // print_r( $run_query_pro);    
    if(mysqli_num_rows($run_query_pro)> 0){
        while($row = mysqli_fetch_array($run_query_pro)){
            $pro_id = $row["product_id"];
            $pro_cat = $row["product_cat"];
            $pro_brand = $row["product_brand"];
            $pro_title = $row["product_title"];
            $pro_price = number_format($row["product_price"],2);
            $pro_image = $row["product_image"];
            // <div class='old-price'>$pro_price</div>
            // echo $pro_brand;
            echo "
            <form method='post' action='index.php?action=add&id={$pro_id}'>
            <div class='card'>
            <img class='card-img-top' src='$pro_image'>
                        <div class='card-body'>
                            <p class='card-text'>$pro_title</p>
                        </div>
                        <div class='tab-price'>
                            <div class='new-price'>฿$pro_price</div>
                        </div>
                        <div class='card-footer'>
                            <input type='number' class='product-quantity form-control' name='quantity' min='1' max='100' value='1' size='2' />
                            <br/>
                            <!--<button class='btn btn-primary btn-sm'><i class='fas fa-cart-plus'></i></button> -->
                            <button class='btn btn-primary btn-md product' type='submit' name='add_product' pid='$pro_id' value='add_product' class='btnAddAction'><i class='fas fa-cart-plus'></i>  Add to Cart</button>
                            <button class='btn btn-outline-primary btn-md'><a href='DetailProduct.php?item_id={$pro_id}';>
                            <i class='fas fa-list-ul'></i> รายละเอียด</a></button>
                        </div>
                </div></form>
            ";

        }
    }
}else{
    echo "ไม่มีสินค้าเเนะนำ ";
}

?>