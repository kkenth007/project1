<?php
session_start();

if(isset($_SESSION["UserID"])){
   $usr_id = $_SESSION["UserID"];
}
$date=date("Y/m/d");
function change ($date){
  $temp = explode("/",$date);
  return "$temp[0]$temp[1]$temp[2]";
}
$dateTrue = change($date);

$hour=date("h:i:sa");
function changeH($hour){
  $temp = explode(":",$hour);
  return "$temp[0]$temp[1]$temp[2]";
}
$HourTrue = changeH($hour);
$newname = $dateTrue.$HourTrue;

/* Getting file name */
$filename = $_FILES['file']['name'];

$newname = $newname.$usr_id.$filename;
/* Location */
$location = "../asset/bank_img/".$newname;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png");

/* Check file extension */
if(!in_array(strtolower($imageFileType), $valid_extensions)) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     echo $location;
     $_SESSION["imgupload"] = $location;
   }else{
     echo 0;
   }
}