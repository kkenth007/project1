<?php
session_start();
include "db.php";

// $_SESSION["Userlevel"]='';
if (isset($_SESSION["Userlevel"])) {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
    Header("Location: home.php");
}

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

</head>
<!-- heelo -->
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include "./include/navBar.php"; ?>
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
                <!-- <div class="row">
                    <div class="col-md-12" >
                        <div class="alert alert-success" id="product_msg" role="alert">
                        </div>
                    </div>
                </div> -->
                <div class="card-columns" style="margin-top:16px;">
                    <div id="geter_product">

                    </div>
                    <?php
                    ?>


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