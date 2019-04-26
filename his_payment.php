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

            <div class="col-md-8" style="margin-top:16px;">
                <h3> ประวัติการสั่งซื้อ</h3>
                <div class="alert alert-warning">
                    <strong>ขอเเนะนำ!</strong> ถ้าต้องการยกเลิกการสั่งซื้อที่ชำระไปเเล้ว กรุณา ติดต่อ sb6040248104lru.ac.th พร้อมทั้งแจ้งรหัสการสั่งซื้อ เราจะตรวจสอบเมื่อถูกต้อง จะโอนเงินคืนสู่บัญชีธนาคารของท่าน
                </div>
                <div class="col-md-12" id="cart_msg_cencel"></div>
                <div class="col-md-12" id="cart_msg_view"></div>
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
                        while ($row = mysqli_fetch_array($result)) {  
                            if($row['p_status'] == 'ยกเลิกการสั่งซื้อ'){
                                $status = '<span class="badge badge-danger">ยกเลิกการสั่งซื้อ</span>';
                            }elseif($row['p_status'] == 'รอการตรวจสอบ'){
                                $status = '<span class="badge badge-warning">รอการตรวจสอบ</span>';
                            }elseif($row['p_status'] == 'ชำระเรียบร้อย'){
                                $status = '<span class="badge badge-success">ชำระเรียบร้อย</span>';
                            }else{
                                $status = $row['p_status'];
                            }

                            
                            ?>

                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row['tr_id']; ?><input type="hidden" code-id="<?php echo $row['tr_id']; ?>" value="<?php echo $row['tr_id']; ?>"></td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><button class="btn btn-success viewpayment" data-toggle="modal" view_id='<?php echo $row['tr_id']; ?>' data-target="#viewModal">รายละเอียด</button></td>
                                <td><?php echo $status ;?></td>
                                <td><button class="btn btn-warning cancelpayment" data-toggle="modal" data-target="#cancelModal" id="<?php echo "pro".$row['tr_id']; ?>" cancel_id='<?php echo $row['tr_id']; ?>'>ยกเลิก </button>
                                </td>
                            </tr>
                            <?php $count++;
                            
                        } ?>
                    </tbody>
                </table>
                <br>
                <!-- cancel -->
                <div class="modal fade" id="cancelModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ยกเลิกรายการที่สั่งซื้อ</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                               คุณต้องการที่จะยกเลิกรายการที่สั่งซื้อหรือไม่ ?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success confirm-cancel" cancel_id='<?php echo $row['tr_id']; ?>'data-dismiss="modal">ยืนยัน</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            </div>

                        </div>
                    </div>
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

            $("body").delegate(".exereload", "click", function (event) {
                setTimeout(function(){ 
                        location.reload();
                    }, 3000)
            });
        </script>
</body>

</html>