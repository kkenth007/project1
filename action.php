<?php
include("db.php");

if(isset($_POST["id"])){
    // echo "Good";
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query);
    echo "
    <ul class='list-group' style='margin-top:10px;width:100%;'>
    <li class='list-group-item active'>หมวดหมู่สินค้า</li>
    ";
    if(mysqli_num_rows($run_query)>0){
        $str = "";
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row['cat_id'];
            $cat_name = $row['cat_title'];
            $str .= "
            <li class='list-group-item'><a href='#' class='category' cid='$cid'>$cat_name</a></li>";
            ;
        }
        $str .="</ul>";
        
    }
    echo $str;
}else{
    echo "ค้นหา หมวดหมู่สินค้า ไม่เจอ";
    

}


?>