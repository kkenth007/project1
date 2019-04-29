<?php
session_start();
include "../db.php";
if ($_SESSION["Userlevel"] == "A") {
    $sql = "SELECT * FROM user_info";
    $alluser = mysqli_query($con, $sql);
    // $brand = "SELECT * FROM brand";
    // $allbrand = mysqli_query($con, $brand);
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
        <?php include "./include/navbar.php"; ?>

        <!-- <?php include 'listProduct.php' ?> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                    <div class="msg-alert-user" id="msg-alert-user"></div>
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

                                        <form action="fetch.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="fname">ชื่อ</label>
                                                    <input type="text" class="form-control" name="fname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="lname">นามสกุล</label>
                                                    <input type="text" class="form-control" name="lname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">อีเมลล์</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">รหัสผ่าน</label>
                                                    <input type="password" class="form-control" name="password" required>
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
                                                <button type="submit" class="btn btn-success" name="adduser" value="adduser">บันทึก</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                                            </div>
                                        </form>
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
                    <?php while ($row = mysqli_fetch_assoc($alluser)) {
                        if ($row['gender'] == 'male') {
                            $gender = 'ชาย';
                        } else {
                            $gender = 'หญิง';
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['fname'] . " " . $row['lname']; ?></th>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><button class="btn btn-success view_user" data-toggle="modal" data-target="#viewUser" value="<?php echo $row['user_id']; ?>">รายละเอียด</button></td>
                            <td><button type="button" class="btn btn-warning edit_user" data-toggle="modal" value="<?php echo $row['user_id']; ?>" data-target="#editModal">แก้ไข</button></td>
                            <td><button value="<?php echo $row['user_id']; ?>" class="btn btn-danger del-member">ลบ</button></td>
                        </tr>
                    <?php }  ?>
                </tbody>
                </table>
            </div>
            <div class="col-md-1 ">

            </div>
        </div>
        </div>
        <!-- ส่วนการเเก้ไข -->
        <!-- The Modal -->
        <div class="modal fade" id="editUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="fetch.php" method="post">


                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">แก้ไขสมาชิก</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="fname">ชื่อ</label>
                                <input type="text" class="form-control" name="editfname" id="editfname">
                            </div>
                            <div class="form-group">
                                <label for="lname">นามสกุล</label>
                                <input type="text" class="form-control" name="editlname" id="editlname">
                            </div>
                            <div class="form-group">
                                <label for="email">อีเมลล์</label>
                                <input type="email" class="form-control" name="editemail" id="editemail">
                            </div>
                            <div class="form-group">
                                <label for="pwd">รหัสผ่าน</label>
                                <input type="text" class="form-control" name="editpassword" id="editpassword">
                            </div>
                            <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                            <input id="inputdatepickers" class="datepicker form-control" name="birth" data-date-format="mm/dd/yyyy">
                            <br>
                            <div class="form-group">
                                <label for="usr">เบอร์โทร</label>
                                <input type="text" class="form-control" name="editphone" id="editphone">
                            </div>
                            <div class="form-group">
                                <label for="comment">ที่อยู่ปัจจุบัน</label>
                                <textarea class="form-control" rows="4" name="editadress1" id="editadress1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment">ที่อยู่ในการจัดส่ง</label>
                                <textarea class="form-control" rows="4" name="editadress2" id="editadress2"></textarea>
                            </div>
                            <input type="hidden" name="userEditt" id="user_idX">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="edit_user" name="editrunner" value="<?php echo $row['user_id']; ?>">บันทึก</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        </div>

        <!-- ส่วนการวิว -->
        <!-- The Modal -->
        <div class="modal fade" id="viewUser">
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
                            <label for="name">ชื่อ</label>
                            <input type="text" class="form-control" id="viewfname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="lname">นามสกุล</label>
                            <input type="text" class="form-control" id="viewlname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">อีเมลล์</label>
                            <input type="email" class="form-control" id="viewemail" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pwd">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="viewpassword" disabled>
                        </div>
                        <label for="date" style="margin-top:9px;">ปี/เดือน/วัน เกิด</label>
                        <input id="inputdatepickerss" disabled class="datepicker form-control" name="viewborn" data-date-format="mm/dd/yyyy">
                        <br>
                        <div class="form-group">
                            <label for="phone">เบอร์โทร</label>
                            <input type="text" class="form-control" id="viewphone" disabled>
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ปัจจุบัน</label>
                            <textarea class="form-control" rows="4" id="viewadress1" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">ที่อยู่ในการจัดส่ง</label>
                            <textarea class="form-control" rows="4" id="viewadress2" disabled></textarea>
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
        <script>
            $(document).on('click', '.view_user', function() {
                var user_id = $(this).val();
                // alert(user_id);
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#viewfname').val(data.fname);
                        $('#viewlname').val(data.lname);
                        $('#viewemail').val(data.email);
                        $('#viewpassword').val(data.password);
                        $('#viewphone').val(data.phone);
                        $('#viewadress1').val(data.adress1);
                        $('#viewadress2').val(data.adress2);
                        $('#inputdatepickerss').val(data.born);
                        $('#viewUser').modal('show');
                    }
                });
            });

            //edit
            $(document).on('click', '.edit_user', function() {
                var edit_user_id = $(this).val();
                // alert(user_id);
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        edit_user_id: edit_user_id
                    },
                    dataType: "json",
                    success: function(data) {

                        $('#editfname').val(data.fname);
                        $('#editlname').val(data.lname);
                        $('#editemail').val(data.email);
                        $('#editpassword').val(data.password);
                        $('#editphone').val(data.phone);
                        $('#editadress1').val(data.adress1);
                        $('#editadress2').val(data.adress2);
                        $('#inputdatepickers').val(data.born);
                        $('#user_idX').val(data.user_id);
                        $('#editUser').modal('show');
                    }
                });
            });

            // del-member
            $(document).on('click', '.del-member', function() {
                var u_id = $(this).val();
                // alert(id_brand);
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        u_id: u_id
                    },
                    success: function(data) {
                        $('#msg-alert-user').html(data);
                        setTimeout(function() {
                            location.reload();
                        }, 2000)
                    }
                });
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