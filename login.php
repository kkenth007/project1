<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                  include("db.php");
				//รับค่า user & password
                  $Username = $_POST['username'];
                  $Password = $_POST['password'];
				//query 
                  $sql="SELECT * FROM user_info Where email='".$Username."' and password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["user_id"];
                      $_SESSION["User"] = $row["fname"]." ".$row["lname"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        Header("Location: ./admin/manageproduct.php");
                        // echo "คุณคือแอดมิน";
                      }

                      if ($_SESSION["Userlevel"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                        echo "คุณคือสมาชิก";
                        Header("Location: home.php");
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
            //  Header("Location: admin_page.php"); //user & password incorrect back to login again
        }
?>