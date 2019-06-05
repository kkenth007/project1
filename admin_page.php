<?php session_start();?>
<?php
header ('Content-type: text/html; charset=UTF-8');
?>

<?php 
if(isset($_SESSION) && $_SESSION["Userlevel"]=="A"){ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel='shortcut icon' type='image/x-icon' href='./asset/img/logo.ico' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <!-- <script src="./asset/js/main.js"></script> -->
    <link rel="stylesheet" href="./asset/css/main1.css">
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <!-- <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
    <script src="main.js"></script>

    <script src="./asset/js/bootstrap-validate.js"></script>

    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
</head>

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
                        <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text"
                            id="search" placeholder="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="button"
                            style="border:1px solid#ffffff;">Search</button>
                    </form>
                </li>
            </ul>
            <!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown show myshow">
                    <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                            class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">0</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                        <div style="width:500px;padding: 16px;">
                            <div class="panel panel-success">
                                <div class="panel-heading text-center">
                                         <h4> <i class="fas fa-shopping-basket"></i> ตะกร้าสินค้า</h4>
                                </div>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-3">
                                            ลำดับสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            รูปภาพสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            ชื่อสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            ราคาสินค้า
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-body"></div>
                                <div class="panel-footer" id="e_msg"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown show myshow">
                    <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-user"></i>
                        สมัครสมาชิก </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                        <div style="width:320px;padding: 16px;">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4>สมัครสมาชิก</h4>
                                </div>
                                <form action="login.php" method="post">
                                <div class="panel-heading">
                                    <label for="fname">ชื่อ</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="กรอกชื่อของคุณ.." required>
                                    <label for="lname">นามสกุล</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามของคุณ.."required>
                                    <div class="form-group">
                                    <label for="email">อีเมล์</label>
                                    <input type="eamil" class="form-control" id="email" name="email" placeholder="กรอกอีเมล์ของคุณ.." required>
                                    <script>
                                    bootstrapValidate('#email', 'email:กรุณากรอกอีเมล์ไห้ถูกต้อง ');
                                    </script>
                                    </div>

                                    <label for="password">รหัสผ่าน</label>  
                                    <input class="form-control" id="password" name="password" name="password" placeholder="กรอกรหัสผ่าน.." required 
			    	                data-toggle="password">
                                    <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                                    <input id="inputdatepicker" class="datepicker form-control" name="birth" name="date" data-date-format="mm/dd/yyyy">
                                    <div class="check-box" style="margin-left:20px;margin-top:16px;">
                                   <label class="form-check-label" for="radio1" style="margin-left:20px;">
                                    <input type="radio" class="form-check-input" id="radio1" name="optradio" name="gender" value="female" checked>หญิง
                                    </label>
                                    <label class="form-check-label" style="margin-left:40px;"for="radio1">
                                    <input type="radio" class="form-check-input" id="radio1" name="optradio" name="gender" value="male" checked>ชาย
                                    </label>
                                    </div>
                                    <p><br /></p>
                                    <a href="#" style="color:#e84118;list-style:none;">Forgotten Password</a>
                                    <input type="submit" class="btn btn-primary" style="float:right;" id="login"
                                        value="สมัครสมาชิก">
                                </form>
                                </div>
                                <div class="panel-footer" id="e_msg"></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown show myshow">
                    <a class="nav-link dropdown-toggle" style="padding-right: 20px;" href="#" id="dropdown03"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-user"></i> เข้าสู่ระบบ</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                        <div style="width:320px;padding: 16px;">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4>เข้าสู่ระบบ</h4>
                                </div>
                            <form action="login.php" method="post">
                                <div class="panel-heading">
                                    <label for="email">อีเมล์</label>
                                    <input type="eamil" class="form-control" id="email" name="username" placeholder="กรอกอีเมล์ของคุณ.." required>
                                    <label for="password">รหัสผ่าน</label>  
                                    <input class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน.." required 
			    	                data-toggle="password">
                                    <p><br /></p>
                                    <a href="#" style="color:#e84118;list-style:none;">Forgotten Password</a>
                                    <input type="submit" class="btn btn-primary" style="float:right;" id="login"
                                        value="Login">
                                </div>
                            </form>
                                <div class="panel-footer" id="e_msg"></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                            <a class="nav-link" style="padding-right: 20px;" href="#"><i class="fas fa-user"></i> Log In</a>
                </li>
            </ul> -->

        </div>

    </nav>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <!-- <ul id="get_brand" style="padding-left: 0px;"></ul> -->
                </div>
                <div class="col-md-8">
                <div style="margin-left:50px;">
                    <h1>คุณคือผู้ดูเเลระบบ </h1>
                        <p><strong>hi</strong> :&nbsp;<?php print_r($_SESSION);?>
                        <?php //session_destroy();?>
                        <?PHP 
                        //  if($_SESSION["Userlevel"] == null){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        //     Header("Location: admin_page.php");
                        //     // echo "คุณคือแอดมิน";
    
                        //   }
                        // if (!isset($_SESSION)){
                        //     Header("Location: admin_page.php");
                        // }

                        ?>
                        </p>
                        <p>&nbsp;</p>
                        <p><a href="logout.php" class="btn btn-danger">Log out</strong></a></p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
    </div>


</body>

</html>




<?php }else{ ?>

<script>
//  location.reload();
location.replace("index.php");
// console.log(window.location.hostname + window.location.pathname;);

</script>

<?php } ?>

