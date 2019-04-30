$(document).ready(function () {

    $("#but_upload").click(function () {
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
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

$("body").delegate(".processSave", "click", function (event) {
    event.preventDefault();
    // var pid = $(this).attr("update_id");
    var bankname = $('#bankname').val();
    var num_bank = $('#num_bank').val();
    var bank_detail = $('#bank_detail').val();

    // console.log(adress,phone);
    // console.log(bank);
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            addbanks: 1,
            bankname: bankname,
            num_bank: num_bank,
            bank_detail: bank_detail
        },
        success: function (data) {
            $('#bank_msg').html(data);
            setTimeout(function () {
                location.reload();
            }, 3000)

        }
    })
});

//edit bank 
$("body").delegate(".edit_banK", "click", function (event) {
    event.preventDefault();
    var bank_id = $(this).attr("bid");
    // alert(user_id);
    $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
            Edit_bank: 1,
            bank_id: bank_id,
        },
        success: function (data) {
            $('#bank_msg').html(data);
            $('#editBank').modal('show');
        }
    })
});

// Edit_save
$("body").delegate(".Edit_save_re", "click", function (event) {
    event.preventDefault();
    // var pid = $(this).attr("update_id");
    var bankname = $('#bankname').val();
    var num_bank = $('#num_bank').val();
    var bank_detail = $('#bank_detail').val();
    var bank_id = $('#bank_id').val();
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            editbank: 1,
            bankname: bankname,
            num_bank: num_bank,
            bank_detail: bank_detail,
            bank_id: bank_id
        },
        success: function () {
            // $('#bank_msg').html(data);
            setTimeout(function () {
                location.reload();
            }, 100)

        }
    })
});

//delete bank
$("body").delegate(".did", "click", function (event) {
    event.preventDefault();
    var del_id = $(this).attr("did");
    // alert(del_id);
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            del_id: del_id
        },
        success: function (data) {
            $('#bank_msg').html(data);
            setTimeout(function () {
                location.reload();
            }, 3000)

        }
    })
});
//product upload
$(document).ready(function () {

    $("#product_upload").click(function () {
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: 'uploadProduct.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
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

//edit Product edit_product
$("body").delegate(".edit_product", "click", function (event) {
    event.preventDefault();
    var pro_id = $(this).attr("pro_duct");
    // alert(pro_id);
    $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
            pro_id: pro_id
        },
        success: function (data) {
            $('#EditProduct').html(data);
            $('#EditProductShow').modal('show');
        }
    })
});

// delete product
$("body").delegate(".del_pro", "click", function (event) {
    event.preventDefault();
    var del_pro = $(this).attr("del_pro_duct");
    // alert(del_pro);
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            del_pro: del_pro
        },
        success: function (data) {
            $('#EditProduct').html(data);
            setTimeout(function () {
                location.reload();
            }, 3000)
        }
    })
});