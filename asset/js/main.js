var categories=1;
$(document).ready(function(){
cat();
function cat(){
    var categories = $('#hidden').val();
    console.log(categories);
    
    $.ajax({
                url:".../action.php",
                method:"post",
                data:{id:categories},
                success:function(data){
                    $('#get_category').html(data);
                }
            });
}
});