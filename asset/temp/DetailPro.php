<?php

$ID_Pro = $_GET['item_id'];
echo $ID_Pro;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/normalize.css" />
    <link rel="stylesheet" href="./asset/css/foundation.css" />
    <link rel="stylesheet" href="./asset/css/demo.css" />
    <script src="./asset/js/vendor/modernizr.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="./asset/js/jquery-3.3.1.min.js"></script> -->
    <script src="./asset/js/jquery-3.3.1.min.js"></script>

      <!-- xzoom plugin here -->
    <script type="text/javascript" src="./asset/dist/xzoom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./asset/dist/xzoom.css" media="all" /> 
    <!-- hammer plugin here -->
    <script type="text/javascript" src="./asset/js/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link type="text/css" rel="stylesheet" media="all" href="./asset/js/fancybox/source/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" media="all" href="./asset/js/magnific-popup/css/magnific-popup.css" />
    <script type="text/javascript" src="./asset/js/fancybox/source/jquery.fancybox.js"></script>
    <script type="text/javascript" src="./asset/js/magnific-popup/js/magnific-popup.js"></script>  

    <!-- main css js -->
    
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./asset/css/main1.css"> -->
    <link rel='shortcut icon' type='image/x-icon' href='./asset/img/logo.ico' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- <script src="./asset/js/jquery-3.3.1.min.js"></script> -->
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>

    <!-- <script src="./asset/js/main.js"></script> -->
    <!-- <link rel="stylesheet" href="./asset/css/main1.css"> -->
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
</head>
<script>
    $(document).ready(function () {
        $("#email").keyup(function () {
            if (validateEmail()) {
                $("#email").css("border", "2px solid green");
                $("#emailMsg").html("<p class='text-success'>อีเมล์ถูกต้อง </p>");
            } else {
                $("#email").css("border", "2px solid red");
                $("#emailMsg").html("<p class='text-danger'>อุ๊ป อีเมล์ไม่ถูกต้อง</p>");
            }
        });

        $("#pass").keyup(function () {
            if (validatePassword()) {
                $("#pass").css("border", "2px solid green");
                $("#passMsg").html("<p class='text-success'>รหัสผ่านถูกต้อง</p>");
            } else {
                $("#pass").css("border", "2px solid red");
                $("#passMsg").html("<p class='text-danger'>รหัสผ่านไม่ถูกต้อง</p>");
            }
        });

    });

    function validateEmail() {
        var email = $("#email").val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if (reg.test(email)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePassword() {
        var pass = $("#pass").val();
        //ตรวจสอบความยาว
        if (pass.length > 7) {
            return true;
        } else {
            return false;
        }
    }

</script>
<body>
    
        <!-- fancy start -->
        <section id="fancy">
    <div class="row">
      <div class="large-12 column"><h3>With Fancy Box</h3>Left click while zooming</div>
      <div class="large-5 column">
        <div class="xzoom-container">
          <img class="xzoom4" id="xzoom-fancy" src="images/gallery/preview/01_b_car.jpg" xoriginal="images/gallery/original/01_b_car.jpg" />
          <div class="xzoom-thumbs" style="margin-top:10px;">
            <a href="images/gallery/original/01_b_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/thumbs/01_b_car.jpg"  xpreview="images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>
            <a href="images/gallery/original/02_o_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/02_o_car.jpg" title="The description goes here"></a>
            <a href="images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/03_r_car.jpg" title="The description goes here"></a>
            <a href="images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>
          </div>
        </div>          
      </div>
      <div class="large-7 column"></div>
    </div>
    </section>   
    <!-- fancy end -->

    <script src="./asset/js/foundation.min.js"></script>
    <script src="./asset/js/setup.js"></script>
</body>
</html>