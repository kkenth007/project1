<?php
header ('Content-type: text/html; charset=UTF-8');
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
            <ul class="navbar-nav ml-auto">
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
                <p><a href="logout.php" class="btn btn-danger">Log out</strong></a></p>

            </ul>

        </div>

    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>

            </div>
            <div class="col-md-8">
                <div class="card-columns" style="margin-top:16px;">
                    <div class="card">
                        <img class="card-img-top" src="https://cf.shopee.co.th/file/3b4080484aa1ef4943b2422fed8e9325">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Title</h5> -->
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
                    </div>

                    <div class="card">
                        <img class="card-img-top" src="https://cf.shopee.co.th/file/080f373a998015f1a1306e147639a787">
                        <div class="card-body">
                            <p class="card-text">⚡️สินค้าขายดี2019⚡️ถูกที่สุดในshopee เสื้อฮาวาย ลายเกาหลี👉CODE ลด :
                                NEWMEW👈</p>
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
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://cf.shopee.co.th/file/8ccc3b262c2cb595d993f02a0c4b4be0">
                        <div class="card-body">
                            <p class="card-text">🔥งานเกาหลี🔥Hawaii Shirt เสื้อเชิ้ตลายทาง เชิ้ตเกาหลี ฮาวาย
                                เกาหลีมาแรง</p>
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
                    </div>

                    <!-- card2 -->
                    <div class="card">
                        <img class="card-img-top"
                            src="http://wallpaperen.com/wp-content/uploads/2018/01/deluxe-stylish-girl-with-attitude-wallpaper-best-top-50-whatsapp-dp-images-for-girls-cool-stylish-stylish-girl-with-attitude-wallpaper.jpg">
                        <div class="card-body">
                            <p class="card-text">ไม่พูดเยอะเจ็บคอ เสื้อเชิ้ตเกาหลีชาย ลายสุดฮิตถูกสุดใน
                                Shopeeส่งของวันพุธนะจ่ะ</p>
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
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://data.whicdn.com/images/76846832/large.jpg">
                        <div class="card-body">
                            <p class="card-text">⚡️รับcoin12%โค้ดMENSALE12⚡️ กางเกง จ็อกเกอร์ Jogger Pants
                                เนื้อผ้าดีมาก S-2XL [F02]</p>
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
                    </div>
                    <div class="card">
                        <img class="card-img-top"
                            src="http://www.sarkarinaukrisearch.in/wp-content/uploads/2019/01/Stylish-Girls-Whatsapp-DP-Images-1-6.jpg">
                        <div class="card-body">
                            <p class="card-text">💥โปรโมชั่น!!!💥กางเกงกระบอกเล็ก เรามี Code ลด 100฿!!!! </p>
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
                    </div>
                </div>
            </div>
            <div class="col-md-1 ">

            </div>
        </div>
    </div>
    <input type="hidden" name="hidden" id="hidden" value="1">
    <script>
        $(document).on('click', '.myshow .dropdown-menu', function (e) {
        e.stopPropagation();
        });

        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });

        bootstrapValidate(
        '#docs-demo',
        'email:Enter a valid E-Mail Address!'
        );
</script>

</body>

</html>