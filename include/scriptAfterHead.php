<script>
    $(document).ready(function () {
        $("#email").keyup(function () {
            if (validateEmail()) {
                $("#email").css("border", "2px solid green");
                $("#emailMsg").html("<p class='text-success'>อีเมล์ถูกต้อง </p>");
            } else {
                $("#email").css("border", "2px solid red");
                $("#emailMsg").html("<p class='text-danger'>อุ๊ป อีเมล์ไม่ถูกต้อง</p>");
            }
        });

        $("#pass").keyup(function () {
            if (validatePassword()) {
                $("#pass").css("border", "2px solid green");
                $("#passMsg").html("<p class='text-success'>รหัสผ่านถูกต้อง</p>");
            } else {
                $("#pass").css("border", "2px solid red");
                $("#passMsg").html("<p class='text-danger'>รหัสผ่านไม่ถูกต้อง</p>");
            }
        });

    });

    function validateEmail() {
        var email = $("#email").val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if (reg.test(email)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePassword() {
        var pass = $("#pass").val();
        //ตรวจสอบความยาว
        if (pass.length > 7) {
            return true;
        } else {
            return false;
        }
    }

</script>