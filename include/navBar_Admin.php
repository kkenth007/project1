<?php
// session_start();
include "./db.php";
$user_id = $_SESSION["UserID"];
$sql = "SELECT * FROM carts WHERE user_id='$user_id'";
$run_query = mysqli_query($con, $sql);
$bage = mysqli_num_rows($run_query);
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#007bff;">
    <!-- <a class="navbar-brand" href="javascript:void(0)"> -->
    <a class="navbar-brand" href="index.php">
        <h2>Shopee</h2>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fab fa-buromobelexperte"></i> Product </a>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text" id="search" placeholder="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="button" style="border:1px solid#ffffff;" id="search_btn"><i class="fas fa-search"></i> Search</button>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown show myshow">
                <a class="nav-link dropdown cart_container" style="padding-right: 20px;" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light"><?php echo $bage; ?></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                    <div style="width:300px;padding: 16px;">
                        <div class="panel panel-success">
                            <div class="card-body">
                                <?php
                                $total = 0;
                                while ($row = mysqli_fetch_assoc($run_query)) {
                                    $pro_name = $row['product_title'];
                                    $pro_img = $row['product_image'];
                                    $pro_price = $row["price"];
                                    $qty = $row["qty"];
                                    $amoung_price =  $row["total_amount"];
                                    $total += $amoung_price;
                                    ?>
                                    <div class="pop-list"><img src="<?php echo $pro_img; ?>" class="img-thumb">
                                        <div class="d-inline-block name-pro">
                                            <ul class="text-left">
                                                <li><?php echo $pro_name; ?></li>
                                            </ul>
                                        </div>
                                        <div id="pro_price"><label class="text-primary"><?php echo number_format($pro_price,2); ?></label>
                                        <label class="text-warning">จำนวน <?php echo $row["qty"]; ?></label>
                                    </div>
                                    </div>
                                <?php }
                            ?>
                                <div class="sub-total"><label class="text-uppercase">ราคารวม :</label><label class="all-price"><?php echo number_format($total,2); ?></label></div>
                                <a href="order_detail.php" style="text-decoration:none;"><button class="btn btn-primary btn-block" type="button">ไปยังตะกร้าสินค้า</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown show myshow">

                <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-users-cog"></i>
                    เมนู </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                    <div>
                        <div class="panel panel-primary">
                            <a class="dropdown-item" href="front_profile.php"><i class="far fa-address-card"></i> โปรไฟล์</a>
                            <a class="dropdown-item" href="his_payment.php"><i class="fas fa-clipboard-list"></i> ประวัติการสั่งซื้อ</a>
                            <a class="dropdown-item" href="m_change_pwd.php"><i class="fas fa-exchange-alt"></i> เปลี่ยนรหัสผ่าน</a>
                            <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                        </div>
                    </div>
                </div>
    </div>
    </li>
    </ul>

    </div>

</nav>