var categories=1;
var brands = 1;
var products= 1;
$(document).ready(function(){
cat();
brand();
product();
function cat(){
    $.ajax({
                url:"action.php",
                method:"post",
                data:{id:categories},
                success:function(data){
                    $('#get_category').html(data);
                }
            });
}
function brand(){
    $.ajax({
                url:"actionBrand.php",
                method:"post",
                data:{id:brands},
                success:function(data){
                    $('#get_brand').html(data);
                }
            });
}

function product(){
    $.ajax({
                url:"actionProducts.php",
                method:"post",
                data:{id:products},
                success:function(data){
                    $('#geter_product').html(data);
                }
            });
}

});