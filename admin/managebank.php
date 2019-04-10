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
                <?php  include "./include/tab.html"; ?>
            </div>
            <div class="col-md-8" style="margin-top:16px;">
                <table class="table table-bordered" style="margin-top:16px;">
                    <thead>
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มธนาคาร</button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
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
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">เลขที่บัญชีธนาคาร</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">รายละเอียดธนาคาร</label>
                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                        </div> รูปภาพ
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileLangHTML">
                                            <label class="custom-file-label" for="customFileLangHTML" data-browse="อัพโหลด"></label>
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

                        <tr>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">หมายเลขบัญชี</th>
                            <th scope="col">ดูรายละเอียด</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">ธนาคารกรุงไทย</th>
                            <td><img src="https://www.khaosod.co.th/wp-content/uploads/2017/09/Logo-KTB.jpg" width="120px" alt=""></td>
                            <td>805-1-88516-3</td>
                            <td>ธนาคารกรุงไทย สาขา<br />ศาลากลางเลย <br />จังหวัดเลย 42000</td>
                            <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                            <td><button class="btn btn-danger">ลบ</button></td>
                        </tr>
                        <tr>
                            <th scope="row">ธนาคารกสิกร</th>
                            <td><img src="data:image/jpeg;base64,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" width="120px" alt=""></td>
                            <td>102-2-09145-8</td>
                            <td>ธนาคารกสิกร สาขา<br />ศาลากลางเลย <br />จังหวัดเลย 42000</td>
                            <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                            <td><button class="btn btn-danger">ลบ</button></td>
                        </tr>
                        <tr>
                            <th scope="row">ธนาคารออมสิน</th>
                            <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlemP0ugkWIGqwM6jdeGhaybqR8hfBTW6ZqWsFvbxVv-VRW_EW" width="120px" alt=""></td>
                            <td>537-400858-6</td>
                            <td>ธนาคารออมสิน สาขา<br />ศาลากลางเลย <br />จังหวัดเลย 42000</td>
                            <td><input type="button" class="btn btn-warning" value="แก้ไข"></td>
                            <td><button class="btn btn-danger">ลบ</button></td>
                        </tr>
                        <tr>
                            <th scope="row">ธนาคารกรุงเทพ</th>
                            <td><img src="https://f.ptcdn.info/282/023/000/1410354573-o.jpg" width="120px" alt=""></td>
                            <td>264-440413-5</td>
                            <td>ธนาคารกรุงเทพ สาขา<br />ศาลากลางเลย <br />จังหวัดเลย 42000</td>
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