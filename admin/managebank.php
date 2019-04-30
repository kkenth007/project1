<?php
session_start();
if ($_SESSION["Userlevel"] == "A") {
    include "../db.php";
    $bankinfo = "SELECT * FROM `bank_info`";
    $result = mysqli_query($con, $bankinfo);

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
                <div class="bank_msgs" id="bank_msg"></div>
                    <table class="table table-bordered" style="margin-top:16px;">
                        <thead>
                            <button class="btn btn-success" data-toggle="modal" data-target="#addBank">เพิ่มธนาคาร</button>
                            <!-- The Modal -->
                            <div class="modal" id="addBank">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มธนาคาร</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="usr">ชื่อธนาคาร</label>
                                                <input type="text" class="form-control" id="bankname">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">เลขที่บัญชีธนาคาร</label>
                                                <input type="text" class="form-control" id="num_bank">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">รายละเอียดธนาคาร</label>
                                                <textarea class="form-control" rows="4" id="bank_detail"></textarea>
                                            </div> รูปภาพ
                                            <form method="post" action="" enctype="multipart/form-data" id="myform">
                                                <div>
                                                    <input type="file" id="file" name="file" />
                                                    <input type="button" class="btn btn-success" value="อัพโหลดรูป" id="but_upload">
                                                </div>
                                                <div class='preview'>
                                                    <img src="../asset/bank_img/default.png" id="img" class="img-thumbnail" width="100" height="100">
                                                </div>
                                            </form>
                                            <!-- <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFileLangHTML">
                                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="อัพโหลด"></label>
                                                    </div> -->

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success processSave" id="processSave" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- edit_bank  -->
                            

                            <tr>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">รูปภาพ</th>
                                <th scope="col">หมายเลขบัญชี</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th width="180px;" scope="row"><?php echo $row['bank_name']; ?></th>
                                    <td width="120px;"><img src="<?php echo $row['bank_img']; ?>" width="120px" alt=""></td>
                                    <td width="180px;"><?php echo $row['bank_number']; ?></td>
                                    <td width="180px;"><?php echo $row['bank_detail']; ?></td>
                                    <td width="120px;"><button type="button" class="btn btn-warning edit_banK" bid='<?php echo $row['bank_number']; ?>'>แก้ไข</button></td>
                                    <td width="120px;"><button class="btn btn-danger did" did='<?php echo $row['bank_id']; ?>'>ลบ</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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