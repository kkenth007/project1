<?php
session_start();
include "db.php";
$user_id = $_SESSION["UserID"];
$sql = "SELECT * FROM carts WHERE user_id='$user_id'";
$run_query = mysqli_query($con,$sql);
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
        .center {
            width: 115px;
            margin: 0px auto;
        }

        .mini-table {
            /* margin-right: 100px; */
            position: absolute;
            /* top:20; */
            /* left:55%;
            font-size: 22px;
            line-height: 28px; */
        }

        .table-mini {
            margin-left: 250px;
            position: absolute;
            /* top:20;  */
            /* left:55%; */

        }

        .payBtn {
            margin-left: 390px;
        }

        span.list-price {
            width: 200px;
        }

        .list-price {
            font-size: 20px;
            line-height: 28px;
        }

        span.list-price {
            width: 300px !important;
        }

        span.price {
            font-weight: bold;
        }

        .price {
            text-align: right;
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
			<div class="row" style="margin-top:16px;">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading"><h4>ตระกร้าสินค้าทั้งหมด</h4></div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>Price in $</b></div>
					</div>
					<br><br>
					<div id='cartdetail'>
					<div class="row">
						<div class="col-md-2"><a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
						<a href="#" class="btn btn-success"><i class="fas fa-calculator"></i></a>
						</div>
						<div class="col-md-2"><img src="assets/prod_images/tshirt.JPG" width="60px" height="60px"></div>
						<div class="col-md-2">Tshirt</div>
						<div class="col-md-2">$700</div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value='1'></div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value='700'></div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total: $500000</b>
						</div>
					</div>
					<div class="panel-footer">

					</div>
				</div>
				<button class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Checkout</button>
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
        $(document).on('click', '.product', function() {
            setInterval(function() {
                location.reload();
            }, 3000);
        });
    </script>
        <script type='text/javascript'>
        $(document).ready(function () {

            //plugin bootstrap minus and plus
            //http://jsfiddle.net/laelitenetwork/puJ6G/
            $('.btn-number').click(function (e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function () {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr(
                        'disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });

        });
    </script>
</body>

</html>