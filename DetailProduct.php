<?php
session_start();
include "db.php";
$id = $_GET['item_id'];

// echo $_SESSION["Userlevel"];
if (isset($_SESSION["Userlevel"])) {
    // $_SESSION["Userlevel"]='';
    if ($_SESSION["Userlevel"] == "M") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
        Header("Location: m_detail_product.php?item_id=$id");
    } else {
        // Header("Location: index.php");
    }
}


// $queryProduct = "SELECT * FROM products where product_id = '$id'";
$queryProduct = "SELECT product_id ,product_price,product_stock,product_title,product_image, product_brand, brand_title,product_desc,product_stock,product_unit FROM products INNER JOIN brand ON product_brand = brand_id where product_id='$id'";

$detailProduct = mysqli_query($con, $queryProduct);
$row = mysqli_fetch_array($detailProduct);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/main1.css">
    <link rel='shortcut icon' type='image/x-icon' href='./asset/img/logo.ico' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>

    <!-- <script src="./asset/js/main.js"></script> -->
    <link rel="stylesheet" href="./asset/css/main1.css">
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

    <!-- plug in js css -->
    <link rel="stylesheet" href="./asset/css/normalize.css" />
    <!-- <link rel="stylesheet" href="./asset/css/foundation.css" /> -->
    <link rel="stylesheet" href="./asset/css/demo.css" />
    <script src="./asset/js/vendor/modernizr.js"></script>
    <!-- xzoom plugin here -->
    <script type="text/javascript" src="./asset/dist/xzoom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./asset/dist/xzoom.css" media="all" />
    <script type="text/javascript" src="./asset/js/hammer.js/1.0.5/jquery.hammer.min.js"></script>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link type="text/css" rel="stylesheet" media="all" href="./asset/js/fancybox/source/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" media="all" href="./asset/js/magnific-popup/css/magnific-popup.css" />
    <script type="text/javascript" src="./asset/js/fancybox/source/jquery.fancybox.js"></script>
    <script type="text/javascript" src="./asset/js/magnific-popup/js/magnific-popup.js"></script>
    <style>
        .card-columns {
            float: left;
            padding: 8px;
        }

        #fancy {
            width: 45%;
        }

        .box-containt-2 {
            /* display: flex; */
            width: 80%;
            display: block;
        }

        .clearfix {
            clear: both;
            /* display: table; */
        }

        @media (min-width: 576px) .card-columns {
            #fancy {
                width: 45%;
                display: block;
            }

            .large-7 {
                clear: both;
            }
        }
    </style>

</head>
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php
    if (isset($_SESSION["Userlevel"])) {
        if ($_SESSION["Userlevel"] == "M") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            include "./include/navBar_Admin.php";
        } else {
            include('./include/navBar.php');
        }
    }else {
        include('./include/navBar.php');
    }


    ?>
    <?php
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-0 col-xs-12 col-sm-6">
                            <div class="product-images">
                                <div class="gallery-container clearfix">
                                    <div class="pdd-imagezoom">
                                        <img src="<?php echo $row['product_image']; ?>" style="display: inline; width: 100%;">
                                    </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-0 col-xs-12 col-sm-6">
                            <div class="product-main-info">
                                <h3><?php echo $row['product_title']; ?></h3>
                                <p class="entry-by">by <span><?php echo $row['brand_title']; ?></span></p>
                                <div class="detail-product" style="height:150px;">
                                    <?php echo $row['product_desc']; ?>
                                </div>
                                <div class="entry-price" style="float: left;">
                                    <div class="inline-price">
                                        ราคา <span><?php echo number_format($row['product_price'], 2); ?></span> บาท
                                    </div>
                                    <div style="display:block">
                                        <span style="color:red; font-weight: bold; font-size: 14px;">*ราคารวมภาษีมูลค่าเพิ่มแล้ว*</span>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <ul style="list-style-type:none;">
                                    <li><img src="https://img.advice.co.th/images_nas/advice/icon-free-04.png" width="60"> <label>ของแท้ประกันศูนย์</label></li>
                                    <!-- <li><img src="https://img.advice.co.th/images_nas/advice/icon-free-03.png" width="60"> <label>การันตีเคลมเร็ว 20 วัน</label></li> -->
                                    <li><img src="https://img.advice.co.th/images_nas/advice/icon-free-01.png" width="60"> <label>ส่งฟรีทั่วไทย</label></li>
                                    <!-- <li><img src="https://img.advice.co.th/images_nas/advice/icon-free-02.png" width="60"> <label>ส่งด่วน 2-5 ชั่วโมง</label></li> -->
                                    <li><img src="https://img.advice.co.th/images_nas/advice/icon-free-05.png" width="60"> <label>บริการเก็บเงินปลายทาง</label></li>
                                </ul>
                                <div class="text">
                                    มี <span><?php echo $row['product_stock']; ?></span> <span><?php echo $row['product_unit']; ?><span> สต๊อกสินค้า
                                </div>
                                <div class="btn" style="display:block; float:left">
                                    <input type='number' class='product-quantity form-control' name='quantity' min='1' max='<?php echo $row['product_stock']; ?>' value='1' size='2' />
                                    <!-- <button class="btn btn-primary">เพิ่มในตะกร้าสินค้า</button> -->
                                    <button style="margin-top:16px;" class='btn btn-primary btn-md' type='submit' value='Add to Cart' class='btnAddAction'><i class='fas fa-cart-plus'></i> Add to Cart</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 ">

        </div>
    </div>
    </div>
    <input type="hidden" name="hidden" id="hidden" value="1">


    <script src="main.js"></script>
    <script>
        $(document).on('click', '.myshow .dropdown-menu', function(e) {
            e.stopPropagation();
        });

        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',
                thaiyear: true //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0"); //กำหนดเป็นวันปัจุบัน
        });
    </script>

</body>

</html>