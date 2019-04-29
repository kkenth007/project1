<?php
session_start();

if ($_SESSION["Userlevel"] == "A") {
    include "../db.php";

    $select = "SELECT `cart_id`, `p_id`, `user_id`, `qty`, SUM(price*qty) AS price , `ref_track_code`, `p_status`, `tr_id` FROM order_store GROUP BY tr_id ORDER BY cart_id";
    $result = mysqli_query($con, $select);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>index</title>
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel='shortcut icon' type='image/x-icon' href='../asset/img/logo.ico' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="../asset/js/jquery-3.3.1.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/popper.min.js"></script>
        <!-- <script src="./asset/js/main.js"></script> -->
        <link rel="stylesheet" href="../asset/css/main1.css">
        <script src="../asset/js/bootstrap-password-toggler.min.js"></script>
        <!-- <script src="../main.js"></script> -->
        <link href="../asset/css/bsDatepicker.css" rel="stylesheet" />
        <script src="../asset/js/boot-datepicker.js"></script>
        <script src="../asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

    </head>
    <?php include "../include/scriptAfterHead.php"; ?>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#007bff;">
            <a class="navbar-brand" href="javascript:void(0)">
                <h2>Shopee</h2>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href=""><i class="fas fa-home"></i> Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fab fa-buromobelexperte"></i> Product </a>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text" id="search" placeholder="Search">
                            <button class="btn btn-primary my-2 my-sm-0" type="button" style="border:1px solid#ffffff;">Search</button>
                        </form>
                    </li>
                </ul>
            </div>

        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <!-- The Modal -->
                <div class="modal" id="viewModalX">
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
                                                <td><img src="../images/gallery/thumbs/01_b_car.jpg" alt="" srcset=""></td>
                                                <td>2</td>
                                                <td>2569.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>รถยนต์</td>
                                                <td><img src="../images/gallery/thumbs/02_o_car.jpg" alt="" srcset=""></td>
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
                                                <th scope="col">รูปสินค้า</th>
                                                <th scope="col">จำนวนสินค้า</th>
                                                <th scope="col">ราคาสินค้า</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>เสื้อเเขนยาว</td>
                                                <td><img src="../images/gallery/thumbs/01_b_car.jpg" alt="" srcset=""></td>
                                                <td>2</td>
                                                <td>2569.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>รถยนต์</td>
                                                <td><img src="../images/gallery/thumbs/02_o_car.jpg" alt="" srcset=""></td>
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
                                <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                <button type="button" class="btn btn-danger exereload" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-8" style="margin-top:16px;">
                <div class="col-md-12" id="cart_msg_view"></div>
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <!-- <button class="btn btn-success">เพิ่มธนาคาร</button> -->
                            <tr>
                                <th scope="col">ลำดับการสั่งซื้อ</th>
                                <th scope="col">รหัสการสั่งซื้อ</th>
                                <th scope="col">รหัสสมาชิก</th>
                                <th scope="col">จำนวนเงิน</th>
                                <th scope="col">ดูรายละเอียด</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['p_status'] == 'ยกเลิกการสั่งซื้อ') {
                                    $status = '<span class="badge badge-danger">ยกเลิกการสั่งซื้อ</span>';
                                } elseif ($row['p_status'] == 'รอการตรวจสอบ') {
                                    $status = '<span class="badge badge-warning">รอการตรวจสอบ</span>';
                                } elseif ($row['p_status'] == 'ชำระเรียบร้อย') {
                                    $status = '<span class="badge badge-success">ชำระเรียบร้อย</span>';
                                } else {
                                    $status = $row['p_status'];
                                }


                                ?>

                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $row['tr_id']; ?><input type="hidden" code-id="<?php echo $row['tr_id']; ?>" value="<?php echo $row['tr_id']; ?>"></td>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <!-- <td><button class="btn btn-success viewpayment" data-toggle="modal" data-target="#viewModal">รายละเอียด</button></td> -->
                                    <td><button class="btn btn-success viewpayment" data-toggle="modal" view_id='<?php echo $row['tr_id']; ?>' user_id='<?php echo $row['user_id']; ?>' data-target="#viewModal">รายละเอียด</button></td>
                                    <td><?php echo $status; ?></td>
                                    <!-- <td><input type="button" class="btn btn-warning" value="แก้ไข" data-toggle="modal"
                                                data-target="#editModal"></td> -->
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal">แก้ไข</button></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1 ">

                </div>
            </div>
        </div>
        <!-- <script src="main.js"></script> -->

        <script>
            $("body").delegate(".viewpayment", "click", function(event) {
                event.preventDefault();
                var view = $(this).attr("view_id");
                var user_id = $(this).attr("user_id");
                // alert(user_id);
                $.ajax({
                    url: "view_payment.php",
                    method: "POST",
                    data: {
                        viewpayment: 1,
                        view: view,
                        user_id:user_id
                    },
                    success: function(data) {
                        $('#cart_msg_view').html(data);
                        // setTimeout(function(){ 
                        //     location.reload();
                        // }, 3000)
                        $('#viewModal').modal('show');
                    }
                })
            });
        </script>
        <script>
        
        $("body").delegate(".exereload", "click", function (event) {
                setTimeout(function(){ 
                        location.reload();
                    }, 2000)
            });
        </script>

    </body>

    </html>
<?php  } else { ?>

    <?php
    unset($_SESSION['Userlevel']);
    session_destroy();
    header("Location: ../index.php ");
} ?>