<?php session_start();
include "db.php";
$user_id = $_SESSION["UserID"];
$select = "SELECT `cart_id`, `p_id`, `user_id`, `qty`, SUM(price*qty) AS price , `ref_track_code`, `p_status`, `tr_id` FROM order_store WHERE user_id= 11 GROUP BY tr_id ORDER BY cart_id";
$result = mysqli_query($con, $select);

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
        span.list-price {
            width: 300px !important;
        }

        span.price {
            font-weight: bold;
        }

        .price {
            text-align: right;
        }

        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: .25rem;
        }
    </style>

</head>
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include "./include/navBar_Admin.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>

            <!-- The Modal -->
            <div class="modal" id="viewModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">รายการที่สั่งซื้อ</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputPassword">รหัสการสั่งซื้อ</label>
                                <input class="form-control" id="disabledInput" type="text" value="16471345" disabled>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">รหัสสมาชิก</label>
                                <input class="form-control" id="disabledInput" type="text" disabled value="654315455">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">หมายเลขจัดส่ง</label>
                                <input class="form-control" id="disabledInput" type="text" disabled value="BYAI001033333">
                            </div>
                            <div class="row" style="margin: 8px 8px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">รูปสินค้า</th>
                                            <th scope="col">จำนวนสินค้า</th>
                                            <th scope="col">ราคาสินค้า</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>เสื้อเเขนยาว</td>
                                            <td><img src="./images/gallery/thumbs/01_b_car.jpg" alt="" srcset=""></td>
                                            <td>2</td>
                                            <td>2569.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>รถยนต์</td>
                                            <td><img src="./images/gallery/thumbs/02_o_car.jpg" alt="" srcset=""></td>
                                            <td>1</td>
                                            <td>25890.00</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="row" style="margin-left:150px;">
                                <table class="table-borderless">
                                    <tbody class="text-center">
                                        <tr>
                                            <div class="div" style="width:150px;display: inline-block">

                                            </div>
                                            <td colspan="6" style="text-align:left;">
                                                <div>
                                                    <span class="list-price">ภาษีมูลค่าเพิ่ม 7%
                                                        <div class="div" style="width:85px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">4250.00 ฿</span>
                                                </div>
                                                <div>
                                                    <span class="list-price" style="width:80%;">ค่าจัดส่งพัสดุ
                                                        <div class="div" style="width:120px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">4250.00 ฿</span>
                                                </div>
                                                <div>
                                                    <span class="list-price" style="width:80%;">รวมทั้งหมด
                                                        <div class="div" style="width:130px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">98751.00 ฿</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clear" style="clear:both"></div>


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- edit payment -->
            <!-- The Modal -->
            <div class="modal" id="editModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">แก้ไขรายการที่สั่งซื้อ</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputPassword">รหัสการสั่งซื้อ</label>
                                <input class="form-control" id="disabledInput" type="text" value="16471345" disabled>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">รหัสสมาชิก</label>
                                <input class="form-control" id="disabledInput" type="text" disabled value="654315455">
                            </div>
                            <div class="form-group">
                                <label for="usr">หมายเลขจัดส่ง</label>
                                <input type="text" class="form-control" id="track">
                            </div>
                            <div class="row" style="margin: 8px 8px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col" style="width:105px;">รูปสินค้า</th>
                                            <th scope="col">จำนวนสินค้า</th>
                                            <th scope="col">ราคาสินค้า</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>เสื้อเเขนยาว</td>
                                            <td><img src="asset/products_img/samsungS10+.jpg" style="width:105px;" alt="" srcset=""></td>
                                            <td>2</td>
                                            <td>2569.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>รถยนต์</td>
                                            <td><img src="./images/gallery/thumbs/03_r_car.jpg" style="width:105px;" alt="" srcset=""></td>
                                            <td>1</td>
                                            <td>25890.00</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="row" style="margin-left:150px;">
                                <table class="table-borderless">
                                    <tbody class="text-center">
                                        <tr>
                                            <div class="div" style="width:150px;display: inline-block">

                                            </div>
                                            <td colspan="6" style="text-align:left;">
                                                <!-- <div>
                                                    <span class="list-price">ภาษีมูลค่าเพิ่ม 7%
                                                        <div class="div" style="width:85px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">4250.00 ฿</span>
                                                </div> -->
                                                <div>
                                                    <span class="list-price" style="width:80%;">ค่าจัดส่งพัสดุ
                                                        <div class="div" style="width:120px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">4250.00 ฿</span>
                                                </div>
                                                <div>
                                                    <span class="list-price" style="width:80%;">รวมทั้งหมด
                                                        <div class="div" style="width:130px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price">98751.00 ฿</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clear" style="clear:both"></div>


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-8" style="margin-top:16px;">
                <h3> ประวัติการสั่งซื้อ</h3>
                <div class="alert alert-warning">
                    <strong>ขอเเนะนำ!</strong> ถ้าต้องการยกเลิกการสั่งซื้อที่ชำระไปเเล้ว กรุณา ติดต่อ sb6040248104lru.ac.th พร้อมทั้งแจ้งรหัสการสั่งซื้อ เราจะตรวจสอบเมื่อถูกต้อง จะโอนเงินคืนสู่บัญชีธนาคารของท่าน
                </div>
                <table class="table table-bordered" style="margin-top:16px;">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับการสั่งซื้อ</th>
                            <!-- width="140px;" -->
                            <th scope="col">รหัสการสั่งซื้อ</th>
                            <th scope="col">รหัสสมาชิก</th>
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">ดูรายละเอียด</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        while ($row = mysqli_fetch_array($result)) {  ?>

                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row['tr_id']; ?><input type="hidden" code-id="<?php echo $row['tr_id']; ?>" value="<?php echo $row['tr_id']; ?>"></td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><button class="btn btn-success" data-toggle="modal" data-target="#viewModal">รายละเอียด</button></td>
                                <td><?php echo $row['p_status']; ?></td>
                                <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal">ยกเลิก </button>
                                    <!-- <span class="mt-3">
                                        <a href="#" data-toggle="tooltip" title="ถ้าต้องการยกเลิกการสั่งศื้อที่ชำระไปเเล้ว กรุณา ติดต่อ sb6040248104lru.ac.th พร้อมทั้งแจ้งหมายเลขการสั่งซื้อ เราจะตรวจสอบเมื่อถุกต้อง จะโอนเงินคืนสู่บัญชีธนาคารของท่าน "><i class="far fa-question-circle"></i></a>
                                    </span> -->

                                </td>
                            </tr>
                            <?php $count++;
                        } ?>
                    </tbody>
                </table>
                <br>

            </div>
            <div class="col-md-1 ">

            </div>
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