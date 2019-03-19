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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
<?php  include('./include/scriptAfterHead.php') ?>

<body>
    <?php  include('./include/navBar.php') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8">
                <div class="card-columns" style="margin-top:16px;">
                <div id="geter_product">

                </div>
                    <!-- <div class="card" >
                        <img class="card-img-top" src="asset/products_img/06300fd8c70c731b.jpg">
                        <div class="card-body">
                            <p class="card-text">⚡️โปร2.2⚡️เสื้อกันหนาว [สารพัดกัน] กันลม กันแดด กันร้อน ฮู้ดแขนยาว
                                Hoodie [F01]</p>
                        </div>
                        <div class="tab-price">
                            <div class="old-price">฿230</div>
                            <div class="new-price">฿180</div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-cart-plus"></i></button>
                            <button class="btn btn-outline-primary btn-sm"><i class="fas fa-list-ul"></i>
                                รายละเอียด</button>
                        </div>
                    </div> -->
                    <?php //include('actionProducts.php'); ?>


                </div>
            </div>
            <div class="col-md-1 ">

            </div>
        </div>
    </div>
    <input type="hidden" name="hidden" id="hidden" value="1">


    <script src="main.js"></script>


    <script>
        $(document).on('click', '.myshow .dropdown-menu', function (e) {
            e.stopPropagation();
        });

        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });

    </script>

</body>

</html>