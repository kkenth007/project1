<?php
include("db.php");
// echo $_POST['categories'];
if(isset($_POST["categories"])){
    echo "Good";
}else{
    // echo "Not Good";
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query);
    echo "
    <ul class='list-group' style='margin-top:10px;width:100%;'>
    <li class='list-group-item active'>หมวดหมู่สินค้า</li>
    ";
    if(mysqli_num_rows($run_query)>0){
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row['cat_id'];
            $cat_name = $row['cat_title'];
            echo " 
            <li class='list-group-item'><a href='#'>$cat_name</a></li>
            ";
        }
        echo "</ul>";
        
    }

}

?>