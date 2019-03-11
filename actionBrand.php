<?php
include("db.php");
// echo $_POST['categories'];
if(isset($_POST["categories"])){
    echo "Good";
}else{
    //brand
    
$brand_query = "SELECT * FROM brand";
$run_query = mysqli_query($con,$brand_query);
echo "
<ul class='list-group' style='margin-top:10px;width:100%;'>
<li class='list-group-item active'>แบรนด์</li>
";
if(mysqli_num_rows($run_query)>0){
    while($row = mysqli_fetch_array($run_query)){
        $bid = $row['brand_id'];
        $brand_name = $row['brand_title'];
        echo " 
        <li class='list-group-item'><a href='#'>$brand_name</a></li>
        ";
    }
    echo "</ul>";
}
}


?>