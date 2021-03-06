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

    $(document).ready(function() {

        $("#but_upload").click(function() {
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);

            $.ajax({
                url: 'upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $("#img").attr("src", response);
                        $('.preview img').show();
                    } else {
                        alert('File not uploaded');
                    }
                }
            });
        });
    });

    // processSave
    $("body").delegate(".processSave", "click", function (event) {
        event.preventDefault();
        // var pid = $(this).attr("update_id");
        var adress = $('#sendAdress').val();
        var phone = $('#num_phone').val();
        var bank = $('#selectBank').val();
        
        // console.log(adress,phone);
        // console.log(bank);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {payMoney:1,adress:adress,phone:phone,bank:bank},
            success: function(data){
                $('#product_msg').html(data);
                setTimeout(function(){ 
                    location.replace(window.location.origin+"/project1/sys.php");
                }, 9000)
                
            }
        })
    });

    //change pwd
    $("body").delegate(".changepwd", "click", function (event) {
        event.preventDefault();
        var oldpwd = $('#oldpwd').val();
        var newpwd = $('#pass').val();
        var conpwd = $('#newpass').val();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {changepwd:1,old:oldpwd,new:newpwd,con:conpwd},
            success: function(data){
                $('#cart_msg_change').html(data);
                //#cart_msg_change จำเอาไว่ที่ไม่ขึ้นสักทีเพราะชื่อมันเซ้ากันหลายที่เเล้ว
                console.log(data);
                setTimeout(function(){ 
                    location.replace(window.location.origin+"/project1/home.php");
                }, 3000)
            }
        })
    });

    // cancel payment
    $("body").delegate(".cancelpayment", "click", function (event) {
        event.preventDefault();
        var code = $(this).attr("cancel_id");
        // alert(code);
        $('#cancelModal').modal('show');
        $("body").delegate(".confirm-cancel", "click", function (event) {
            event.preventDefault();
            var cancel = code;
            // alert(cancel);
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {cencelpayment:1,cancel:cancel},
                success: function(data){
                    $('#cart_msg_cencel').html(data);
                    setTimeout(function(){ 
                        location.reload();
                    }, 3000)
                }
            })
        });

    });

    // view payment
    $("body").delegate(".viewpayment", "click", function (event) {
        event.preventDefault();
        var view = $(this).attr("view_id");
        // alert(view);
        $.ajax({
            url: "view_payment.php",
            method: "POST",
            data: {viewpayment:1,view:view},
            success: function(data){
                $('#cart_msg_view').html(data);
                // setTimeout(function(){ 
                //     location.reload();
                // }, 3000)
                $('#viewModal').modal('show');
            }
        })
    });
});