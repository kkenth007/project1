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
        <style>
            .preview {
                margin: 0 auto;
                background: white;
            }

            .preview img {
                display: none;
            }
            .previews{
                margin: 0 auto;
                background: white;
            }
            .previews img{
                display:block;
            }
        </style>

    </head>
    <?php include "../include/scriptAfterHead.php"; ?>

    <body>
        <?php include "./include/navbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="#" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                <div class="EditProductShows" id="EditProduct"></div>
                <!-- <div class="bank_msgs" id="bank_msg"></div> -->
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

                            while ($row = mysqli_fetch_assoc($result1)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['product_id']; ?></th>
                                    <td><?php echo $row['product_title']; ?></td>
                                    <td><img src="../<?php echo $row['product_image']; ?>" ; width="120px" alt=""></td>
                                    <td><?php echo $row['product_stock']; ?></td>
                                    <td><?php echo $row['product_price']; ?></td>
                                    <td><?php echo $row['brand_title']; ?></td>
                                    <td><?php echo $row['product_keywords']; ?></td>
                                    <td><input type="button" class="btn btn-warning edit_product" pro_duct='<?php echo $row['product_id']; ?>' value="แก้ไข"></td>
                                    <td><button class="btn btn-danger del_pro" del_pro_duct='<?php echo $row['product_id']; ?>'>ลบ</button></td>
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>

                    <?php
                    $allBrand = "SELECT * from brand";
                    $cal = mysqli_query($conn, $allBrand);
                    $allcat = "SELECT * FROM categories";
                    $catgory = mysqli_query($conn, $allcat);
                    ?>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="fetch.php" method="post">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">เพิ่มสินค้า</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="usr">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" name="product_title">
                                    </div>
                                    <div class="form-group">
                                    <label for="sel1">หมวดหมู่</label>
                                        <select class="form-control" id="sel1" name="product_cat">
                                            <?php while ($bran = mysqli_fetch_assoc($catgory)) { ?>
                                                <option value="<?php echo $bran['cat_id']; ?>"><?php echo $bran['cat_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="sel1">แบรนด์</label>
                                        <select class="form-control" id="sel1" name="product_brand">
                                            <?php while ($bran = mysqli_fetch_assoc($cal)) { ?>
                                                <option value="<?php echo $bran['brand_id']; ?>"><?php echo $bran['brand_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="form-group">
                                            <label for="usr">ราคา</label>
                                            <input type="text" class="form-control" name="product_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">สินค้าคงเหลือ</label>
                                            <input type="text" class="form-control" name="product_stock">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">รายละเอียดสินค้า</label>
                                            <textarea class="form-control" rows="4" name="product_desc"></textarea>
                                        </div>
                                        <div style="margin-bottom:.5rem;">รูปภาพ</div>
                                        <form method="post" action="" enctype="multipart/form-data" id="myform">
                                            <div>
                                                <input type="file" id="file" name="file" />
                                                <input type="button" class="btn btn-success" value="อัพโหลดรูป" id="product_upload">
                                            </div>
                                            <div class='preview'>
                                                <img src="../asset/bank_img/default.png" id="img" class="img-thumbnail" width="100" height="100">
                                            </div>
                                        </form>
                                        <!-- <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFileLangHTML">
                                                    <label class="custom-file-label" for="customFileLangHTML" data-browse="อัพโหลด"></label>
                                                </div> -->
                                        <div class="form-group">
                                            <label for="usr">Keyword (คีย์เวิร์ด)</label>
                                            <input type="text" class="form-control" name="product_keywords">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">หน่วย</label>
                                            <input type="text" class="form-control" name="product_unit">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">ราคาสินค้าดั่งเดิม</label>
                                            <input type="text" class="form-control" name="product_original_price">
                                        </div>


                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="SAVE_PRO" value="SAVE_PRO">บันทึก</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 ">

                    </div>
                </div>
            </div>

            <script src="mainadmin.js"></script>
    </body>

    </html>

<?php  } else { ?>

    <?php
    unset($_SESSION['Userlevel']);
    session_destroy();
    header("Location: ../index.php ");
} ?>