<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel='shortcut icon' type='image/x-icon' href='./asset/img/logo.ico' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <!-- <script src="./asset/js/main.js"></script> -->
    <link rel="stylesheet" href="./asset/css/main1.css">
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <script src="main.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

</head>
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include "./include/navBar_Admin.php"; ?>

    <!-- <?php include 'listProduct.php' ?> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8" style="margin-top:16px;">
            <div class="col-md-12" id="cart_msg_change"></div>
                <h4>เปลี่ยนรหัสผ่าน</h4>
                <div class="form-group">
                    <label for="usr">รหัสผ่านเดิม</label>
                    <input type="text" class="form-control col-sm-4" id="oldpwd">
                </div>
                <div class="form-group">
                    <label for="usr">รหัสผ่านใหม่</label>
                    <input type="text" class="form-control col-sm-4" id="pass">
                </div>
                <div class="form-group">
                    <label for="usr">ยืนยันรหัสผ่านใหม่</label>
                    <input type="text" class="form-control col-sm-4" id="newpass">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-success changepwd" id="changepwd" name="changepwd" value="1">ยืนยัน</button>
                    <button type="button" class="btn btn-outline-danger" onclick="location.replace(window.location.origin+'/project1/home.php')";>ยกเลิก</button>
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
            }).datepicker("setDate", '0'); //กำหนดเป็นวันปัจุบัน
        });
    </script>

</body>

</html>