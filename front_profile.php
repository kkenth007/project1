<?php
session_start();
include "db.php";
$id = $_SESSION["UserID"];
$sql = "SELECT * FROM user_info where user_id='$id'";
$info = mysqli_query($con, $sql);
if (mysqli_num_rows($info) > 0) {
    $row = mysqli_fetch_array($info);
    $fname = $row["fname"];
    $lname= $row["lname"];
    $email= $row["email"];
    $phone= $row["phone"];
    $adress1= $row["adress1"];
    $adress2= $row["adress2"];
}

function changeBack($dateBorn)
{
    $temp = explode("-", $dateBorn);
    $temp[0] = $temp[0] - (543);
    return "$temp[2]/$temp[1]/$temp[0]";
}

$dateBorn = $row['born'];
$date = changeBack($dateBorn);

// print_r($date);
$sext = $row['gender'];
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <!-- <script src="./asset/js/main.js"></script> -->
    <link rel="stylesheet" href="./asset/css/main1.css">
    <script src="./asset/js/bootstrap-password-toggler.min.js"></script>
    <script src="main.js"></script>
    <link href="./asset/css/bsDatepicker.css" rel="stylesheet" />
    <script src="./asset/js/boot-datepicker.js"></script>
    <script src="./asset/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

</head>
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include "./include/navBar_Admin.php"; ?>

    <!-- <?php include 'listProduct.php' ?> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>
            <div class="col-md-8" style="margin-top:16px;">
                <button class="btn btn-warning" style="float:right" onclick="editData();">แก้ไขข้อมูล</button>

                <form method="POST" action="update_profile.php">
                    <div class="form-inline ">
                        <label for="usr">ชื่อ</label>
                        <input type="text" id="fname" class="form-control mx-sm-3" name='fname' value='<?php echo $fname; ?>' aria-describedby="fnames" disabled>
                        <label for="inputPassword6">นามสกุล</label>
                        <input type="text" id="lname" class="form-control mx-sm-3" name='lname' value="<?php echo $lname?>" aria-describedby="lanmes" disabled><br>
                    </div>
                    <br>
                    <DIV class="form-inline col-6" style="padding:0">
                        <label for="usr">อีเมลล์</label>
                        <input type="text" class="form-control col-10 mx-auto" name='email' value="<?php echo $email ?>" id="email" disabled placeholder="">
                    </DIV>
                    เพศ
                    <div class="check-box" style="margin-left:20px;">
                        <label class="form-check-label" style="margin-left:20px;">
                            <input type="radio" name="gender" id="female" value='female' disabled> หญิง
                        </label>

                        <label class="form-check-label" style="margin-left:40px;">
                            <input type="radio" name="gender" id="male" value='male' disabled> ชาย
                        </label>
                    </div>
                    <div class="col-3">
                        <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                        <input id="inputdatepicker" class="datepicker form-control" name='born' id="birth" data-date-format="mm/dd/yyyy" disabled>
                    </div>
                    <br>

                    <div class="form-inline" style="padding:0">
                        <div class="form-group">
                            <label for="usr">เบอร์โทร</label>
                            <input type="text" id="tel" name='phone' class="form-control mx-sm-3" value="<?php echo $phone; ?>" aria-describedby="passwordHelpInline" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="form-group col-sm-6" style="padding-left: 0px;">
                        <label for="comment">ที่อยู่ปัจจุบัน</label>
                        <textarea class="form-control" rows="4" id="address1" name='adress1' disabled><?php echo $adress1; ?></textarea>
                    </div>
                    <div class="form-group col-sm-6" style="padding-left: 0px;">
                        <label for="comment">ที่อยู่ในการจัดส่ง</label>
                        <textarea class="form-control" rows="4" id="address_recive" name='adress2' disabled><?php echo $adress2; ?></textarea>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-success" id="saveBtn" type="submit" style="display:none">บันทึกข้อมูล</button>
                        <button class="btn btn-danger" id="cancelBtn" onclick="reload();" style="display:none">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1 ">

        </div>
    </div>
    </div>

    </div>
    </div>
    </div>

    <?php


    ?>

    <script src="main.js"></script>
    <script>
        if ('<?php echo $sext ?>' == 'male') {
            document.getElementById('male').checked = true;
        } else {
            document.getElementById('female').checked = true;
        }
    </script>

    <script>
        function reload() {
            location.reload();
        }

        function editData() {
            document.getElementById('address1').disabled = false;
            document.getElementById('address_recive').disabled = false;
            document.getElementById("male").disabled = false;
            document.getElementById("female").disabled = false;
            document.getElementById('tel').disabled = false;
            document.getElementById('fname').disabled = false;
            document.getElementById('lname').disabled = false;
            document.getElementById('email').disabled = false;
            document.getElementById('inputdatepicker').disabled = false;

            document.getElementById('cancelBtn').style.display = 'initial';
            document.getElementById('saveBtn').style.display = 'initial';
        }
    </script>
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
            }).datepicker("setDate", '<?php echo $date ?>'); //กำหนดเป็นวันปัจุบัน
        });
    </script>

</body>

</html>