<?php
session_start();
include "../db.php";
if ($_SESSION["Userlevel"] == "A") {
    $sql = "SELECT * FROM categories";
    $allcat = mysqli_query($con, $sql);
    $brand = "SELECT * FROM brand";
    $allbrand = mysqli_query($con, $brand);
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


        <?php include "./include/navbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul id="get_category" style="padding-left: 0px;"></ul>
                    <?php include "./include/tab.html"; ?>
                </div>
                <div class="col-md-8" style="margin-top:16px;">
                    <div id="msg-alert"></div>
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
                                            <input type="text" class="form-control" id="editmenu" value="">
                                            <input type="hidden" name="id_cat" id="idcat" value="idcat">
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" id="confirm_OK" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($allcat)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['cat_title'] ?></th>
                                        <td><button class="btn btn-warning editmenus" data-toggle="modal" data-target="#editCat" value="<?php echo $row['cat_id']; ?>">แก้ไข</button></td>
                                        <td><button class="btn btn-danger deletemenus" value="<?php echo $row['cat_id']; ?>">ลบ</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" id="addbrand" data-target="#addBrand">เพิ่ม
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
                                                <input type="text" class="form-control" id="textbrand">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="save_brand" data-dismiss="modal">บันทึก</button>
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
                                            <input type="text" class="form-control" id="editbrandtext">
                                            <input type="hidden" id="idbrand">
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success " id="confirm_Brand" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($allbrand)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['brand_title']; ?></th>
                                        <td><button type="button" class="btn btn-warning editbrand" value="<?php echo $row['brand_id']; ?>" data-toggle="modal" data-target="#ediBrand">แก้ไข</button></td>
                                        <td><button class="btn btn-danger deletebrand" value="<?php echo $row['brand_id']; ?>">ลบ</button></td>
                                    </tr>
                                <?php } ?>
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
                            <input type="text" class="form-control" id="addcatText">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success addcat_save" data-dismiss="modal">บันทึก</button>
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
                    $(document).ready(function() {
                        $(document).on('click', '.editmenus', function() {
                            var edit_id = $(this).val();
                            //   alert(edit_id);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    edit_id: edit_id
                                },
                                dataType: "json",
                                success: function(data) {
                                    $('#editmenu').val(data.cat_title);
                                    $('#editCat').modal('show');
                                    $('#idcat').val(data.cat_id);
                                    // alert(data.cat_title);
                                }
                            });
                        });

                        $(document).on('click', '#confirm_OK', function() {
                            var new_edit_id = $("#editmenu").val();
                            var idcat = $("#idcat").val();
                            // alert(new_edit_id);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    new_edit_id: new_edit_id,
                                    idcat: idcat
                                },
                                success: function(data) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 100)
                                }
                            });

                        });

                        $(document).on('click', '.deletemenus', function() {
                            var delete_id = $(this).val();
                            // alert(delete_id);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    delete_id: delete_id
                                },
                                success: function(data) {
                                    $('#msg-alert').html(data);

                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000)
                                }
                            });
                        });

                        // addcat
                        $(document).on('click', '#addcat', function() {
                            $('#addCatModal').modal('show');
                        });
                        $(document).on('click', '.addcat_save', function() {
                            var addcat = $("#addcatText").val();
                            // alert(addcat);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    addcat: addcat
                                },
                                success: function(data) {
                                    $('#msg-alert').html(data);

                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000)
                                }
                            });
                        });

                        //add brand 
                        $(document).on('click', '#addbrand', function() {
                            $('#addBrand').modal('show');
                        });
                        $(document).on('click', '#save_brand', function() {
                            var textbrand = $("#textbrand").val();
                            // alert(addcat);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    textbrand: textbrand
                                },
                                success: function(data) {
                                    $('#msg-alert').html(data);

                                    setTimeout(function() {
                                        location.reload();
                                    }, 100)
                                }
                            });
                        });
                        // delete brand
                        $(document).on('click', '.deletebrand', function() {
                            var id_brand = $(this).val();
                            // alert(id_brand);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    del_brand: id_brand
                                },
                                success: function(data) {
                                    $('#msg-alert').html(data);
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000)
                                }
                            });
                        });
                        // edit brand
                        $(document).on('click', '.editbrand', function() {
                            var editbrand = $(this).val();
                            // alert(editbrand);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    editbrand: editbrand
                                },
                                dataType: "json",
                                success: function(data) {
                                    $('#editbrandtext').val(data.brand_title);
                                    // $('#editCat').modal('show');
                                    $('#idbrand').val(data.brand_id);
                                }
                            });
                        });

                        $(document).on('click', '#confirm_Brand', function() {
                            var newtextbrand = $("#editbrandtext").val();
                            var idbrand = $("#idbrand").val();
                            // alert(newtextbrand);
                            // alert(idbrand);
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    newtextbrand: newtextbrand,
                                    idbrand: idbrand
                                },
                                success: function(data) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 100)
                                }
                            });

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