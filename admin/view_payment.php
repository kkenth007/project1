<?php
session_start();
include "../db.php";
if (isset($_POST['viewpayment'])) {
    $id = $_POST['user_id'];
    $view = $_POST['view'];
    $viewSQL = "SELECT * FROM order_store INNER JOIN products ON order_store.p_id = products.product_id WHERE user_id ='$id' AND tr_id='$view'";
    $runView = mysqli_query($con, $viewSQL);
    $track = "SELECT track_code FROM `track_store` WHERE ref_user_id = '$id' AND ref_pay_id='$view'";
    $gettrack = mysqli_query($con, $track);
    //แสดงข้อผิดพลาดดีนัก
    if (!$gettrack) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    $result = mysqli_fetch_array($gettrack);
    $track_code = $result['track_code'];
    // $rows = mysqli_fetch_array($gettrack);
    // $track_code = $rows['track_id'];

    // bill pay
    $sqlimg = "SELECT DISTINCT(pay_bill) FROM payment_store where ref_cart_id = '$view'";
    $imgup = mysqli_query($con, $sqlimg);
    $imgbillpay = mysqli_fetch_array($imgup);
    // "SELECT DISTINCT(pay_bill) FROM `payment_store` WHERE ref_cart_id=245505706"
    $realimg = "../";
    $realimg .= $imgbillpay[0];

    if (mysqli_num_rows($runView) > 0) { ?>

        <div class="modal" id="viewModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">รายการที่สั่งซื้อ</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputPassword">รหัสการสั่งซื้อ</label>
                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $view;  ?>" disabled>

                        </div>
                        <div class="form-group">
                            <label for="inputPassword">รหัสสมาชิก</label>
                            <input class="form-control" id="disabledInput" type="text" disabled value="<?php echo $id;  ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">หมายเลขจัดส่ง</label>
                            <input type="text" class="form-control" id="disabledInput" value='<?php echo $track_code; ?>' name="track" disabled>
                        </div>
                        <div class="row" style="margin: 8px 8px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อสินค้า</th>
                                        <th scope="col">รูปสินค้า</th>
                                        <th scope="col">จำนวนสินค้า</th>
                                        <th scope="col">ราคาสินค้า</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $sum = 0;
                                    $total = 0;
                                    $count = 1;
                                    while ($row = mysqli_fetch_array($runView)) {
                                        static $sum;
                                        $total = $row['qty'] * $row['price'];
                                        $sum = $sum + $total;
                                        //    echo $sum;
                                        $total = $sum;
                                        if ($total >= 500) {
                                            $shipping = "<del>ฟรีค่าจัดส่ง</del>";
                                        } else {
                                            $shipping = 120.00;
                                        }
                                        if (is_numeric($shipping)) {
                                            $total += $shipping;
                                        }
                                        ?>


                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row['product_title']; ?></td>
                                            <td><img src="<?php echo "../" . $row['product_image']; ?>" width="105px;" alt="" srcset=""></td>
                                            <td><?php echo $row['qty']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                        </tr>
                                        <?php $count++;
                                    } ?>
                                    <tr>
                                        <td colspan="6">
                                            <img src="<?php echo $realimg; ?>" width="100%;" alt="" srcset="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="margin-left:150px;">
                            <table class="table-borderless">
                                <tbody class="text-center">
                                    <tr>
                                        <td colspan="6" style="text-align:left;">
                                            <div>
                                                <span class="list-price" style="width:80%;">ค่าจัดส่งพัสดุ
                                                    <div class="div" style="width:120px;display: inline-block;">
                                                    </div>
                                                </span>
                                                <span class="price"><?php echo $shipping; ?></span>
                                            </div>
                                            <div>
                                                <span class="list-price" style="width:80%;">รวมทั้งหมด
                                                    <div class="div" style="width:130px;display: inline-block;">
                                                    </div>
                                                </span>
                                                <span class="price"><?php echo number_format($total, 2); ?> ฿</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="clear" style="clear:both"></div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger exereload" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    <?php }
}
?>
<?php

//Edit payment +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if (isset($_POST['editpayment'])) {
    $id = $_POST['user_id'];
    $edit = $_POST['edit'];
    $viewSQL = "SELECT * FROM order_store INNER JOIN products ON order_store.p_id = products.product_id WHERE user_id ='$id' AND tr_id='$edit'";
    $runView = mysqli_query($con, $viewSQL);
    $track = "SELECT track_code FROM `track_store` WHERE ref_user_id = '$id' AND ref_pay_id='$edit'";
    $gettrack = mysqli_query($con, $track);
    //แสดงข้อผิดพลาดดีนัก
    if (!$gettrack) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    $result = mysqli_fetch_array($gettrack);
    $track_code = $result['track_code'];
    // $rows = mysqli_fetch_array($gettrack);
    // $track_code = $rows['track_id'];

    // bill pay
    $sqlimg = "SELECT DISTINCT(pay_bill) FROM payment_store where ref_cart_id = '$edit'";
    $imgup = mysqli_query($con, $sqlimg);
    $imgbillpay = mysqli_fetch_array($imgup);
    // "SELECT DISTINCT(pay_bill) FROM `payment_store` WHERE ref_cart_id=245505706"
    $realimg = "../";
    $realimg .= $imgbillpay[0];

    if (mysqli_num_rows($runView) > 0) { ?>

        <div class="modal" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="fetch.php" method="post">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">รายการที่สั่งซื้อ</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputPassword">รหัสการสั่งซื้อ</label>
                                <input class="form-control" type="text" value="<?php echo $edit;?>" name="codepayment">

                            </div>
                            <div class="form-group">
                                <label for="inputPassword">รหัสสมาชิก</label>
                                <input class="form-control" type="text" value="<?php echo $id;?>" name="c_member">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">หมายเลขจัดส่ง</label>
                                <input type="text" class="form-control" id="disabledInput" value='<?php echo $track_code; ?>' name="track">
                            </div>
                            <div class="row" style="margin: 8px 8px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">รูปสินค้า</th>
                                            <th scope="col">จำนวนสินค้า</th>
                                            <th scope="col">ราคาสินค้า</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $sum = 0;
                                        $total = 0;
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($runView)) {
                                            static $sum;
                                            $total = $row['qty'] * $row['price'];
                                            $sum = $sum + $total;
                                            //    echo $sum;
                                            $total = $sum;
                                            if ($total >= 500) {
                                                $shipping = "<del>ฟรีค่าจัดส่ง</del>";
                                            } else {
                                                $shipping = 120.00;
                                            }
                                            if (is_numeric($shipping)) {
                                                $total += $shipping;
                                            }
                                            ?>


                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row['product_title']; ?></td>
                                                <td><img src="<?php echo "../" . $row['product_image']; ?>" width="105px;" alt="" srcset=""></td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                            </tr>
                                            <?php $count++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row" style="margin-left:150px;">
                                <table class="table-borderless">
                                    <tbody class="text-center">
                                        <tr>
                                            <td colspan="6" style="text-align:left;">
                                                <div>
                                                    <span class="list-price" style="width:80%;">ค่าจัดส่งพัสดุ
                                                        <div class="div" style="width:120px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price"><?php echo $shipping; ?></span>
                                                </div>
                                                <div>
                                                    <span class="list-price" style="width:80%;">รวมทั้งหมด
                                                        <div class="div" style="width:130px;display: inline-block;">
                                                        </div>
                                                    </span>
                                                    <span class="price"><?php echo number_format($total, 2); ?> ฿</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clear" style="clear:both"></div>


                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="confirm_OK_save_track" value="confirm_OK_save_track">บันทึกหมายเลขจัดส่ง</button>
                            <button type="button" class="btn btn-danger exereload" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <?php }
}
?>