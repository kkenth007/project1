<?php 
session_start();

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
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
    <style>
        .center {
            width: 115px;
            margin: 0px auto;
        }
    </style>

</head>
<!-- heelo -->
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include('./include/navBar_member.php') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8">
                <div style="margin-top:16px;">
                    <!-- <div id="geter_product"> -->
                    <div class="">
                        <h3>ตระกร้าสินค้าทั้งหมด</h3>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ลำดับ</th>
                                <th scope="col">รูปสินค้า</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col" width="150px;">จำนวนสินค้า</th>
                                <th scope="col" width="150px;">ราคาสินค้า</th>
                                <th scope="col" width="150px;">ราคารวม</th>
                                <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="./images/gallery/thumbs/01_b_car.jpg" alt="" srcset=""></td>
                                <td>Mark</td>
                                <td><input type="text" class="form-control" name="qty" value="1"></td>
                                <td>2569</td>
                                <td><input type="text" class="form-control" disabled name="price" value="2569"></td>
                                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-info"><i class="fas fa-calculator"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
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
    <script src="main.js"></script>
</body>

</html> 