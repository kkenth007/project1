<?php

$ID_Pro = $_GET['item_id'];
// echo $ID_Pro;

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>

    <!-- <script src="./asset/js/main.js"></script> -->
    <link rel="stylesheet" href="./asset/css/main1.css">
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

    <!-- plug in js css -->
    <link rel="stylesheet" href="./asset/css/normalize.css" />
    <!-- <link rel="stylesheet" href="./asset/css/foundation.css" /> -->
    <link rel="stylesheet" href="./asset/css/demo.css" />
    <script src="./asset/js/vendor/modernizr.js"></script>
          <!-- xzoom plugin here -->
    <script type="text/javascript" src="./asset/dist/xzoom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./asset/dist/xzoom.css" media="all" /> 
    <script type="text/javascript" src="./asset/js/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link type="text/css" rel="stylesheet" media="all" href="./asset/js/fancybox/source/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" media="all" href="./asset/js/magnific-popup/css/magnific-popup.css" />
    <script type="text/javascript" src="./asset/js/fancybox/source/jquery.fancybox.js"></script>
    <script type="text/javascript" src="./asset/js/magnific-popup/js/magnific-popup.js"></script>  

</head>
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
                <div class="card-columns" style="margin-top:20px;">
    <!-- fancy start -->
        <section id="fancy" class="col-md-6">
        <div class="large-5 column">
        <div class="xzoom-container">
          <img class="xzoom4" id="xzoom-fancy" src="images/gallery/preview/01_b_car.jpg" xoriginal="images/gallery/original/01_b_car.jpg" />
          <div class="xzoom-thumbs" style="margin-top:10px;">
            <a href="images/gallery/original/01_b_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/thumbs/01_b_car.jpg"  xpreview="images/gallery/preview/01_b_car.jpg" ></a>
            <a href="images/gallery/original/02_o_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/02_o_car.jpg" ></a>
            <a href="images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/03_r_car.jpg" ></a>
            <a href="images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery4" width="80" src="images/gallery/preview/04_g_car.jpg" ></a>
          </div>
        </div>          
      </div>
      <div class="large-7 column col-md-4">
      <h1>รถยนต์</h1>
      </div>
    </section>   
    <!-- fancy end -->
        
    <script src="./asset/js/foundation.min.js"></script>
    <script src="./asset/js/setup.js"></script>
            </div>
            <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">รายละเอียดสินค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active">
      <h4>รายละเอียดสินค้า</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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