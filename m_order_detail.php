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
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">รูปสินค้า</th>
                                <th scope="col">จำนวนสินค้า</th>
                                <th scope="col">ราคาสินค้า</th>
                                <th scope="col">ลบสินค้า</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td><img src="./images/gallery/thumbs/01_b_car.jpg" alt="" srcset=""></td>
                                <td>
                                    <!-- add product -->
                                    <div class="center">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="30">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>

                                </td>
                                <td>2569</td>
                                <td><button class="btn btn-danger">ลบสินค้า</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td><img src="./images/gallery/thumbs/02_o_car.jpg" alt="" srcset=""></td>
                                <td>
                                    <!-- add product -->
                                    <div class="center">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="30">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>

                                </td>
                                <td>2530</td>

                                <td><button class="btn btn-danger">ลบสินค้า</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td><img src="./images/gallery/thumbs/03_r_car.jpg" alt="" srcset=""></td>
                                <td>
                                    <!-- add product -->
                                    <div class="center">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[3]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[3]" class="form-control input-number" value="1" min="1" max="30">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[3]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>

                                </td>
                                <td>162000</td>
                                <td><button class="btn btn-danger">ลบสินค้า</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati ad doloribus, consectetur tempora delectus, debitis enim quae eaque, ducimus voluptatibus minima optio repudiandae eius reiciendis? Debitis, harum eveniet. Sit, minima.</p>
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
    <script type='text/javascript'>
        $(document).ready(function() {

            //plugin bootstrap minus and plus
            //http://jsfiddle.net/laelitenetwork/puJ6G/
            $('.btn-number').click(function(e) {
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
            $('.input-number').focusin(function() {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function() {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
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
            $(".input-number").keydown(function(e) {
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
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

        });
    </script>
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

        $(document).on('click', '.product', function() {
            setInterval(function(){ 
                location.reload(); 
            }, 2000);
        });
    </script>
    <script src="main.js"></script>
</body>

</html> 