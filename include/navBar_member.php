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
                    <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text" id="search"
                        placeholder="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="button" style="border:1px solid#ffffff;"
                        id="search_btn"><i class="fas fa-search"></i> Search</button>
                </form>
            </li>
        </ul>
        <?php

            if (!empty($_GET["action"])) {

                switch ($_GET['action']) {
                    case "add":
                        $code = $_GET['code'];
                        $sql = "SELECT product_id,product_title,product_price,product_image FROM products WHERE product_id='" . $_GET["code"] . "'";
                        $add = mysqli_query($con, $sql);
                        $result = mysqli_fetch_assoc($add);
                        // print_r($result);
                        // echo $code;
                        $qty = $_POST['quantity'];
                        $total = $qty*$result['product_price'];
                        // echo $qty;
                        break;


                    case "remove":
                        break;
                }
            }

            ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown show myshow">
                <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                        class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">2</span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                    <div style="width:300px;padding: 16px;">
                        <div class="panel panel-success">
                            <div class="card-body">
                                <div class="pop-list"><img src="<?php echo $result['product_image']; ?>"
                                        class="img-thumb">
                                    <div class="d-inline-block" id="name-pro">
                                        <ul class="text-left">
                                            <li><?php echo $result['product_title']; ?></li>
                                        </ul>
                                    </div>
                                    <div id="pro_price"><label class="text-primary">฿
                                            <?php echo $result['product_price']; ?></label></div>
                                </div>
                                <div class="pop-list"><img src="https://i.imgur.com/jC0y6Dm.jpg" class="img-thumb">
                                    <div class="d-inline-block" id="name-pro">
                                        <ul class="text-left">
                                            <li>Samsung S10</li>
                                        </ul>
                                    </div>
                                    <div id="pro_price"><label class="text-primary">$60.00</label></div>
                                </div>
                                <div class="sub-total"><label class="text-uppercase">ราคารวม :</label><label
                                        class="all-price"><?php echo $total; ?></label></div>
                                <a href="order_detail.php" style="text-decoration:none;"><button
                                        class="btn btn-primary btn-block" type="button">ไปยังตะกร้าสินค้า</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown show myshow">

                <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                    data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-users-cog"></i>
                    เมนู </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                    <div>
                        <div class="panel panel-primary">
                            <a class="dropdown-item" href="#"><i class="far fa-address-card"></i> โปรไฟล์</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-clipboard-list"></i>
                                ประวัติการสั่งซื้อ</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-exchange-alt"></i> เปลี่ยนรหัสผ่าน</a>
                            <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i>
                                ออกจากระบบ</a>
                        </div>
                    </div>
                </div>
    </div>
    </li>
    </ul>

    </div>

</nav>