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
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มสมาชิก</button>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มสมาชิก</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="usr">ชื่อ</label>
                                                <input type="text" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">นามสกุล</label>
                                                <input type="text" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">อีเมลล์</label>
                                                <input type="email" class="form-control" id="usr" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">รหัสผ่าน</label>
                                                <input type="password" class="form-control" id="usr" required>
                                            </div>
                                            <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                                            <input id="inputdatepicker" class="datepicker form-control" name="birth" data-date-format="mm/dd/yyyy">
                                            เพศ
                                            <div class="check-box" style="margin-left:20px;margin-top:16px;">
                                                <label class="form-check-label" for="radio1" style="margin-left:20px;">
                                                    <input type="radio" class="form-check-input" id="radio1" name="gender" value="female" checked>หญิง
                                                </label>
                                                <label class="form-check-label" style="margin-left:40px;" for="radio1">
                                                    <input type="radio" class="form-check-input" id="radio2" name="gender" value="male" checked>ชาย
                                                </label>
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
                <tr>
                    <th scope="col">ชื่อ - สกุล</th>
                    <th scope="col">เบอร์โทร</th>
                    <th scope="col">เพศ</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">เพิ่มเติม</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">คณิต วิจิตรปัญญา</th>
                        <td>063-028-0119</td>
                        <td>ชาย</td>
                        <td>Kanit_it@gmail.com</td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#viewModal">รายละเอียด</button></td>
                        <td><input type="button" class="btn btn-warning" value="แก้ไข" data-toggle="modal" data-target="#editModal"></td>
                        <td><button class="btn btn-danger">ลบ</button></td>
                    </tr>
                    <tr>
                        <th scope="row">วรินทร์ ประภาพร</th>
                        <td>098-326-1230</td>
                        <td>หญิง</td>
                        <td>Warin_it@gmail.com</td>
                        <td><button class="btn btn-success">รายละเอียด</button></td>
                        <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                        <td><button class="btn btn-danger">ลบ</button></td>
                    </tr>
                    <tr>
                        <th scope="row">สุนิสา ชัชวาล</th>
                        <td>085-564-1346</td>
                        <td>หญิง</td>
                        <td>Sunisa_it@gmail.com</td>
                        <td><button class="btn btn-success">รายละเอียด</button></td>
                        <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                        <td><button class="btn btn-danger">ลบ</button></td>
                    </tr>
                    <tr>
                        <th scope="row">กฎษฎา นาวกูล</th>
                        <td>089-213-1416</td>
                        <td>ชาย</td>
                        <td>Krist_it@gmail.com</td>
                        <td><button class="btn btn-success">รายละเอียด</button></td>
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
        <!-- ส่วนการเเก้ไข -->
        <!-- The Modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขสมาชิก</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">ชื่อ</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">นามสกุล</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">อีเมลล์</label>
                            <input type="email" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="usr">
                        </div>
                        <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                        <input id="inputdatepicker" class="datepicker form-control" name="birth" data-date-format="mm/dd/yyyy">
                        <br>
                        เพศ
                        <div class="check-box" style="margin-left:20px;margin-top:16px;">
                            <label class="form-check-label" for="radio1" style="margin-left:20px;">
                                <input type="radio" class="form-check-input" id="radio1" name="gender" value="female" checked>หญิง
                            </label>
                            <label class="form-check-label" style="margin-left:40px;" for="radio1">
                                <input type="radio" class="form-check-input" id="radio2" name="gender" value="male" checked>ชาย
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="usr">เบอร์โทร</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ปัจจุบัน</label>
                            <textarea class="form-control" rows="4" id="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ในการจัดส่ง</label>
                            <textarea class="form-control" rows="4" id="comment"></textarea>
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

        <!-- ส่วนการวิว -->
        <!-- The Modal -->
        <div class="modal fade" id="viewModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">รายละเอียดสมาชิก</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">ชื่อ</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">นามสกุล</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">อีเมลล์</label>
                            <input type="email" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="usr">
                        </div>
                        <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                        <input id="inputdatepicker" class="datepicker form-control" name="birth" data-date-format="mm/dd/yyyy">
                        <br>
                        เพศ
                        <div class="check-box" style="margin-left:20px;margin-top:16px;">
                            <label class="form-check-label" for="radio1" style="margin-left:20px;">
                                <input type="radio" class="form-check-input" id="radio1" name="gender" value="female" checked>หญิง
                            </label>
                            <label class="form-check-label" style="margin-left:40px;" for="radio1">
                                <input type="radio" class="form-check-input" id="radio2" name="gender" value="male" checked>ชาย
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="usr">เบอร์โทร</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ปัจจุบัน</label>
                            <textarea class="form-control" rows="4" id="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ในการจัดส่ง</label>
                            <textarea class="form-control" rows="4" id="comment"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                    </div>

                </div>


            </div>
        </div>
        </div>


        <input type="hidden" name="hidden" id="hidden" value="1">


        <!-- <script src="main.js"></script> -->


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