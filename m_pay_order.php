<?php session_start();

include "db.php";
if (isset($_SESSION["UserID"])) {
    $id = $_SESSION["UserID"];
}
$bank = "SELECT bank_id,bank_name FROM bank_info";
$result = mysqli_query($con, $bank);

$userinfo = "SELECT adress2,phone FROM user_info WHERE user_id='$id'";
$usr = mysqli_query($con, $userinfo);
$rowusr = mysqli_fetch_array($usr);
// print_r($rowusr);


if (isset($_SESSION["number_pay"])) {
    $number_pay = $_SESSION["number_pay"];
} else {
    $_SESSION["number_pay"] = rand(1264654, 99999999);
}


// if(isset($_SESSION["imgupload"])){
//     $_SESSION["imgupload"]; //paht imf 
// }
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
    <style>
        /* Container */
        .container {
            margin: 0 auto;
            border: 0px solid black;
            width: 50%;
            height: 250px;
            border-radius: 3px;
            background-color: ghostwhite;
            text-align: center;
        }

        /* Preview */
        .preview {
            /* width: 100px;
    height: 100px; */
            /* border: 1px solid black; */
            margin: 0 auto;
            background: white;
        }

        .preview img {
            display: none;
        }


        /* Button */
        .button {
            border: 0px;
            background-color: deepskyblue;
            color: white;
            padding: 5px 15px;
            margin-left: 10px;
        }
    </style>

</head>
<?php include('./include/scriptAfterHead.php') ?>

<body>
    <?php include "./include/navBar_Admin.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="get_category" style="padding-left: 0px;"></ul>
                <ul id="get_brand" style="padding-left: 0px;"></ul>
            </div>

            <div class="col-md-8" style="margin-top:16px;">
                <div class="col-md-12" id="product_msg"></div>
                <h4>หมายเลขการสั่งซื้อ # <strong value="<?php echo $number_pay; ?>"> <?php echo $number_pay; ?></strong></h4>
                <div class="form-group col-sm-8" style="padding-left: 0px;">
                    <label for="comment">ที่อยู่ในการจัดส่ง</label>
                    <textarea class="form-control" rows="5" id="sendAdress"><?php echo $rowusr['adress2']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="usr">เบอร์โทร</label>
                    <input type="text" class="form-control col-sm-3" id="num_phone" value="<?php echo $rowusr['phone']; ?>">
                </div>
                ช่องทางชำระ
                <div class="check-box">
                    <div class="input-group mb-auto col-sm-3" style="margin-top:10px;padding-right: 0px;
                        padding-left: 0px">
                        <select class="custom-select" id="selectBank">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['bank_id']; ?>"><?php echo $row['bank_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </label>
                </div>
                <br>

                <input type="hidden" name="hidden" id="hidden" value="1">
                <form method="post" action="" enctype="multipart/form-data" id="myform">
                    <div>
                        <input type="file" id="file" name="file" />
                        <input type="button" class="btn btn-success" value="Upload" id="but_upload">
                    </div>
                    <div class='preview'>
                        <img src="upload/default.png" id="img" class="img-thumbnail" width="100" height="100">
                    </div>
                </form>
                <div class="button-2" style="margin-top:20px;">
                    <button type="button" class="btn btn-success processSave" data-dismiss="modal" id="processSave">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
                </div>
            </div>
        </div>
        <div class="col-md-1 ">

        </div>
    </div>
    <script src="main.js"></script>

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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>



</body>

</html>