<?php
session_start();
if ($_SESSION["Userlevel"] == "A") {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

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
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" data-target="#addCatModal">เพิ่มหมวดหมู่</button>
                            <tr>
                                <th scope="col">ชื่อหมวดหมู่</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                            </tr>
                        </thead>

                        <div class="modal" id="editCat">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">แก้ไขหมวดหมู่</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="usr">ชื่อหมวดหมู่</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <tbody>
                                <tr>
                                    <th scope="row">อุปกรณ์ อิเล็กทรอนิกส์</th>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editCat">แก้ไข</button></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">เครื่องประดับ</th>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editCat">แก้ไข</button></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">แฟชั่นผู้ชาย</th>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editCat">แก้ไข</button></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">เเฟชั่นผู้หญิง</th>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editCat">แก้ไข</button></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                            </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" data-target="#addBrand">เพิ่ม
                                เเบรนด์</button>
                            <!-- add brand -->
                            <!-- The Modal -->
                            <div class="modal" id="addBrand">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มเเบรนด์</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="usr"> ชื่อเเบรนด์ </label>
                                                <input type="text" class="form-control" id="usr">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <th scope="col" style="width:598.91px;">ชื่อหมวดหมู่</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                        </thead>
                        <!-- edit brand -->
                        <!-- The Modal -->
                        <div class="modal" id="ediBrand">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">แก้ไขเเบรนด์</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="usr"> ชื่อเเบรนด์ </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <tbody>
                                <tr>
                                    <th scope="row">Apple</th>
                                    <td><input type="button" class="btn btn-warning" value="แก้ไข" data-toggle="modal" data-target="#ediBrand"></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">Samsung</th>
                                    <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">HP</th>
                                    <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">H & M</th>
                                    <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                                    <td><button class="btn btn-danger">ลบ</button></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <div class="col-md-1 ">

                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="addCatModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มหมวดหมู่</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control" id="usr">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <input type="hidden" name="hidden" id="hidden" value="1">

            <!-- The Modal -->
            <div class="modal" id="editCatModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">เพิ่มหมวดหมู่</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="usr">ชื่อหมวดหมู่</label>
                                <input type="text" class="form-control" id="usr">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>


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