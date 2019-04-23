<?php
session_start();
include "db.php";
$user_id = $_SESSION["UserID"];
$sql = "SELECT * FROM carts WHERE user_id='$user_id'";
$result = mysqli_query($con, $sql);

// if(isset($_SESSION["number_pay"])){
//     unset($_SESSION["number_pay"]);
// }

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
    <!-- <link rel="stylesheet" href="./asset/css/main1.css"> -->
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
    <style>
        img {
            margin: 5px 0 5px 0;
        }
    </style>


</head>
<!-- heelo -->
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php
    ?>
    <?php include "./include/navBar_Admin.php"; ?>
    <!-- navBar_Admin.php -->
    <!-- The Modal -->
    <div class="modal" id="resetPW">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">กู้คืนรหัสผ่าน</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usr"> กรุณากรอกอีเมลล์ของคุณ ระบบจะส่งรหัสผ่านไห้ทางอีเมล</label>
                        <input type="text" class="form-control" id="usr" placeholder="example@gmail.com">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">ดำเนินการ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8">
                <div class="col-md-12" id="product_msg"></div>
                <div class="row" style="margin-top:16px;">
                    <div class="col-md-12" id="cart_msg"></div>
                </div>
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3><b>ตระกร้าสินค้าทั้งหมด <i class="fas fa-cart-arrow-down"></i></b></h3>
                    </div>
                    <br />
                    <div class="panel-body"></div>
                    <div class="row">
                        <div class="col-md-2"><b>Action</b></div>
                        <div class="col-md-2"><b>Product Image</b></div>
                        <div class="col-md-2"><b>Product Name</b></div>
                        <div class="col-md-2"><b>Product Price</b></div>
                        <div class="col-md-2"><b>Quantity</b></div>
                        <div class="col-md-2"><b>Price in ฿</b></div>
                    </div>
                    <br>
                    <!-- <div class="cart_checkout"> -->

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div id='cartdetail'>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-danger remove" remove_id='<?php echo $row['p_id']; ?>'><i class="fas fa-trash-alt">ลบ</i></a>
                                    <a href="#" class="btn btn-success update" update_id='<?php echo $row['p_id']; ?>'><i class="fas fa-cart-arrow-down">อัพเดท</i></i></a>
                                </div>
                                <div class="col-md-2"><img src="<?php echo $row['product_image'] ?>" width="80px" height="80px"></div>
                                <div class="col-md-2" class="title-hide"><?php echo substr($row['product_title'], 0,); ?></div>
                                <div class="col-md-2"><input class="form-control price" type="text" size="10px" pid='<?php echo $row['p_id']; ?>' id='price-<?php echo $row['p_id']; ?>' value='<?php echo $row['price']; ?>' disabled></div>
                                <div class="col-md-2"><input class="form-control qty" type="number" min='1' max="20" size="10px" pid='<?php echo $row['p_id']; ?>' id='qty-<?php echo $row['p_id']; ?>' value='<?php echo $row['qty']; ?>'></div>
                                <div class="col-md-2"><input class="form-control total" type="text" size="10px" pid='<?php echo $row['p_id']; ?>' id='total-<?php echo $row['p_id']; ?>' value='<?php echo number_format($row['total_amount'], 2); ?>' disabled></div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <?php
                            $total = "SELECT SUM(total_amount) AS total FROM  carts WHERE user_id='$user_id'";
                            $run = mysqli_query($con, $total);
                            $total_price = mysqli_fetch_array($run);
                            //  print_r($total_price);
                            $total = $total_price['total'];
                            if ($total >= 500) {
                                $shipping = "<del>ฟรีค่าจัดส่ง</del>";
                            } else {
                                $items = mysqli_num_rows($result);
                                $shipping = 120.00;
                            }
                            if (is_numeric($shipping)) {
                                $total += $shipping;
                            }


                            ?>
                            <div class="row">
                                <table class="table-borderless">
                                    <tbody class="text-center">
                                        <tr>
                                            <div class="div" style="width:670px;">

                                            </div>
                                            <td colspan="6" style="text-align:left;">
                                                <!-- <div>
                                        <span class="list-price" style="width:80%;">ภาษีมูลค่าเพิ่ม 7%
                                            <div class="div" style="width:130px;display: inline-block;"></div>
                                        </span>
                                        <span class="price">4250.00 ฿</span>
                                    </div> -->
                                                <div>

                                                    <h4><b>ค่าจัดส่งพัสดุ : ฿ <span id="sum-product"><?php echo $shipping; ?></span></b><span class="mt-3">
                                                            <a href="#" data-toggle="tooltip" title="ซื้อมากกว่า 500 บาท ฟรีค่าจัดส่ง "><i class="far fa-question-circle"></i></a>
                                                        </span></h4>
                                                </div>
                                                <div>
                                                    <h4><b>รวมทั้งหมด &nbsp;&nbsp;&nbsp;: ฿ <span id="sum-product">
                                                                <?php echo number_format($total, 2); ?></span></b></h4>
                                                </div>
                                                <div>
                                                    <span class="list-price" style="width:80%;">
                                                    </span>
                                                    <!-- <span> <button class="btn btn-success payBtn" style="margin-top:20px">ชำระเงิน</button></span> -->
                                                    <button class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal"><a href='m_pay_order.php'>ชำระเงิน</a></button>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <h4><b>รวมทั้งหมด : ฿ <span id="sum-product"><?php
                                                                                ?></span></b></h4> -->
                        </div>
                    </div>


                    <!-- </div> -->
                    <div class="panel-footer">

                    </div>
                </div>
                <!-- <button class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Checkout</button> -->
            </div>
            <div class="col-md-1 ">

            </div>
        </div>
    </div>

    <div class="toast">
        <div class="toast-header">
            ลบสินค้า
        </div>
        <div class="toast-body">
            ลบสินค้าสำเร็จ <i class="fas fa-check-circle"></i>
        </div>
    </div>

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
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>