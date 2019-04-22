var categories = 1;
var brands = 1;
var products = 1;
$(document).ready(function () {

    cat();
    brand();
    product();

    function cat() {
        $.ajax({
            url: "action.php",
            method: "post",
            data: {
                id: categories
            },
            success: function (data) {
                $('#get_category').html(data);
            }
        });
    }

    function brand() {
        $.ajax({
            url: "actionBrand.php",
            method: "post",
            data: {
                id: brands
            },
            success: function (data) {
                $('#get_brand').html(data);
            }
        });
    }

    function product() {
        $.ajax({
            url: "actionProducts.php",
            method: "post",
            data: {
                id: products
            },
            success: function (data) {
                $('#geter_product').html(data);
            }
        });
    }

    $("body").delegate(".category", "click", function (event) {
        event.preventDefault();
        var cid = $(this).attr('cid');
        // alert(cid);  
        $.ajax({
            url: "actionSelect.php",
            method: "post",
            data: {
                id: categories,
                cat_id: cid
            },
            success: function (data) {
                $('#geter_product').html(data);
            }
        });
    });

    $("body").delegate(".selectBrand", "click", function (event) {
        event.preventDefault();
        var bid = $(this).attr('bid');
        // console.log(bid);

        // alert(bid);
        $.ajax({
            url: "actionSelect.php",
            method: "post",
            data: {
                id: brands,
                brand_id: bid
            },
            success: function (data) {
                $('#geter_product').html(data);
            }
        });
    });

    $("#search_btn").click(function () {
        var keyword = $("#search").val();
        if (keyword != "") {
            $.ajax({
                url: "actionSelect.php",
                method: "post",
                data: {
                    search: 1,
                    keyword: keyword
                },
                success: function (data) {
                    $('#geter_product').html(data);
                }
            });
        }
    });

    $("body").delegate(".product", "click", function (event) {
        event.preventDefault();
        var p_id = $(this).attr('pid');
        // var qty = $(this).attr('pid');
        // var qty = $(this).attr("name");
        var qty = $("input[name*='quantity']").val();
        // alert(qty);
        // alert(p_id);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                addToProduct: 1,
                ProId: p_id,
                ProQty: qty
            },
            success: function (data) {
                // alert(data);
                $('#product_msg').html(data);
            }
        })

    });
    // $("#cart_checkout").click(function(event){
    //     event.preventDefault();
    //     alert(0);

    // })
    cart_checkout();

    function cart_checkout() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                cart_checkout: 1
            },
            success: function (data) {
                $('#cart_checkout').html(data);
            }
        });
    };

    $("body").delegate(".qty", "click", function () {
        var pid = $(this).attr("pid");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();
        var total = qty * price;
        $('#total-' + pid).val(total + '.00');
        // $('#total-3').val(999);
        // alert(total);

    });

    $("body").delegate(".remove", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("remove_id");
        // alert(pid);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {removeFromCart:1,remove_id:pid},
            success: function(data){
                $('#product_msg').html(data);
                // console.log(data);
                setTimeout(function(){ 
                    location.reload(); 
                }, 2000)
            }
        })
    });


    $("body").delegate(".update", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("update_id");
        var Quantity = $("#qty-" + pid).val();
         var total = $('#total-' + pid).val();
        //  alert(total);
        // alert(pid);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {updateFromCart:1,update_id:pid,qty:Quantity,total_price:total},
            success: function(data){
                // console.log(data);
                $('#product_msg').html(data);
                setTimeout(function(){ 
                    location.reload(); 
                }, 2000)
            }
        })
    });
});