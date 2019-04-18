<?php
session_start();
if ($_SESSION["Userlevel"] == "A") {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>index</title>
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel='shortcut icon' type='image/x-icon' href='../asset/img/logo.ico' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="../asset/js/jquery-3.3.1.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/popper.min.js"></script>
        <!-- <script src="./asset/js/main.js"></script> -->
        <link rel="stylesheet" href="../asset/css/main1.css">
        <script src="../asset/js/bootstrap-password-toggler.min.js"></script>
        <!-- <script src="../main.js"></script> -->
        <link href="../asset/css/bsDatepicker.css" rel="stylesheet" />
        <script src="../asset/js/boot-datepicker.js"></script>
        <script src="../asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

    </head>
    <?php include "../include/scriptAfterHead.php"; ?>

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
                            <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text" id="search" placeholder="Search">
                            <button class="btn btn-primary my-2 my-sm-0" type="button" style="border:1px solid#ffffff;">Search</button>
                        </form>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- <?php include 'listProduct.php' ?> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="#" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มสินค้า</button>
                            <tr>
                                <th scope="col">รหัส</th>
                                <th scope="col">ชิ่อ</th>
                                <th scope="col">รูปภาพ</th>
                                <th scope="col">Stock</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">Brand</th>
                                <th scope="col">keyword</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "./include/connect.php";
                            // $selectpro = "SELECT * FROM products";
                            $brand = "SELECT product_id ,product_keywords,product_price,product_stock,product_title,product_image, product_brand, brand_title FROM products INNER JOIN brand ON product_brand = brand_id where product_brand ORDER BY product_id ASC";
                            $result1 = mysqli_query($conn, $brand);

                            // $result = mysqli_query($conn,$select);
                            // $data = mysqli_fetch_array($result1);
                            // print_r($data);
                            // print_r($data);
                            // $data1 = mysqli_fetch_assoc($result1);
                            // print_r($data1);
                            // while($brands = mysqli_fetch_assoc($result1)){;
                            //     echo $brands['brand_title'];
                            while ($row = mysqli_fetch_assoc($result1)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['product_id']; ?></th>
                                    <td><?php echo $row['product_title']; ?></td>
                                    <td><img src="../<?php echo $row['product_image']; ?>" ; width="120px" alt=""></td>
                                    <td><?php echo $row['product_stock']; ?></td>
                                    <td><?php echo $row['product_price']; ?></td>
                                    <td><?php echo $row['brand_title']; ?></td>
                                    <td><?php echo $row['product_keywords']; ?></td>
                                    <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                            <?php }  ?>
                            <!-- <tr>
                                <th scope="row">2</th>
                                <td>Iphone 6</td>
                                <td><img src="../asset/products_img/2f9672dba846.jpg" width="120px" alt=""></td>
                                <td>80</td>
                                <td>16200</td>
                                <td>Apple</td>
                                <td>Iphone 6</td>
                                <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                <td><button class="btn btn-danger">ลบ</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Iphone 6</td>
                                <td><img src="../asset/products_img/2f9672dba846.jpg" width="120px" alt=""></td>
                                <td>80</td>
                                <td>16200</td>
                                <td>Apple</td>
                                <td>Iphone 6</td>
                                <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                <td><button class="btn btn-danger">ลบ</button></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Iphone 6</td>
                                <td><img src="../asset/products_img/2f9672dba846.jpg" width="120px" alt=""></td>
                                <td>80</td>
                                <td>16200</td>
                                <td>Apple</td>
                                <td>Iphone 6</td>
                                <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                <td><button class="btn btn-danger">ลบ</button></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Iphone 6</td>
                                <td><img src="../asset/products_img/2f9672dba846.jpg" width="120px" alt=""></td>
                                <td>80</td>
                                <td>16200</td>
                                <td>Apple</td>
                                <td>Iphone 6</td>
                                <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                <td><button class="btn btn-danger">ลบ</button></td>
                            </tr> -->
                        </tbody>
                    </table>

                    <?php
                    $allBrand = "SELECT * from brand";
                    $cal = mysqli_query($conn, $allBrand);
                    ?>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มสินค้า</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="usr">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">แบรนด์</label>
                                        <select class="form-control" id="sel1" name="sellist1">
                                            <?php while ($bran = mysqli_fetch_assoc($cal)) { ?>
                                                <option value="<?php echo $bran['brand_id']; ?>"><?php echo $bran['brand_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="form-group">
                                            <label for="usr">ราคา</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">สินค้าคงเหลือ</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">รายละเอียดสินค้า</label>
                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                        </div>
                                        <div style="margin-bottom:.5rem;">รูปภาพ</div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileLangHTML">
                                            <label class="custom-file-label" for="customFileLangHTML" data-browse="อัพโหลด"></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">keyword</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">หน่วย</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">ราคานำเข้า</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">ราคาสินค้าดั่งเดิม</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>


                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                                    </div>

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

<?php  } else { ?>

    <?php
    unset($_SESSION['Userlevel']);
    session_destroy();
    header("Location: ../index.php ");
} ?>