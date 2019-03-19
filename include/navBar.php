<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#007bff;">
<!-- <a class="navbar-brand" href="javascript:void(0)"> -->
        <a class="navbar-brand" href="index.php">
            <h2>Shopee</h2>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fab fa-buromobelexperte"></i> Product </a>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input style="width:300px;margin-left: 10px;" class="form-control mr-sm-2" type="text"
                            id="search" placeholder="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="button"
                            style="border:1px solid#ffffff;" id="search_btn">Search</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown show myshow">
                    <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                            class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">0</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                        <div style="width:500px;padding: 16px;">
                            <div class="panel panel-success">
                                <div class="panel-heading text-center">
                                    <h4> <i class="fas fa-shopping-basket"></i> ตะกร้าสินค้า</h4>
                                </div>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-3">
                                            ลำดับสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            รูปภาพสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            ชื่อสินค้า
                                        </div>
                                        <div class="col-md-3">
                                            ราคาสินค้า
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-body"></div>
                                <div class="panel-footer" id="e_msg"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown show myshow">
                    <a class="nav-link dropdown" style="padding-right: 20px;" href="#" id="dropdown03"
                        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-user"></i>
                        สมัครสมาชิก </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                        <div style="width:320px;padding: 16px;">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4>สมัครสมาชิก</h4>
                                </div>
                                <form action="register.php" method="post">
                                    <div class="panel-heading">
                                        <label for="fname">ชื่อ</label>
                                        <input type="text" class="form-control" id="name" name="fname"
                                            autocomplete="off" placeholder="กรอกชื่อของคุณ.." required>
                                        <label for="lname">นามสกุล</label>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            autocomplete="off" placeholder="กรอกนามของคุณ.." required>
                                        <div class="form-group">
                                            <label for="email">อีเมล์</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                autocomplete="off" placeholder="กรอกอีเมล์ของคุณ.." required>
                                            <span id="emailMsg"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">รหัสผ่าน</label>
                                            <input class="form-control" id="pass" name="password" name="password"
                                                placeholder="กรอกรหัสผ่าน.." required data-toggle="password">
                                            <div id="passMsg"></div>
                                        </div>
                                        <label for="date" style="margin-top:9px;">วัน/เดือน/ปี เกิด</label>
                                        <input id="inputdatepicker" class="datepicker form-control" name="birth"
                                            data-date-format="mm/dd/yyyy">
                                        <div class="check-box" style="margin-left:20px;margin-top:16px;">
                                            <label class="form-check-label" for="radio1" style="margin-left:20px;">
                                                <input type="radio" class="form-check-input" id="radio1" name="gender"
                                                    value="female" checked>หญิง
                                            </label>
                                            <label class="form-check-label" style="margin-left:40px;" for="radio1">
                                                <input type="radio" class="form-check-input" id="radio2" name="gender"
                                                    value="male" checked>ชาย
                                            </label>
                                        </div>
                                        <p><br /></p>
                                        <a href="#" style="color:#e84118;list-style:none;">Forgotten Password</a>
                                        <input type="submit" class="btn btn-primary" style="float:right;"
                                            id="btn" value="สมัครสมาชิก">
                                </form>
                            </div>
                            <div class="panel-footer" id="e_msg"></div>
                        </div>
                    </div>
        </div>
        </li>
        <li class="nav-item dropdown show myshow">
            <a class="nav-link dropdown-toggle" style="padding-right: 20px;" href="#" id="dropdown03"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-user"></i>
                เข้าสู่ระบบ</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown03">
                <div style="width:320px;padding: 16px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h4>เข้าสู่ระบบ</h4>
                        </div>
                        <form action="login.php" method="post">
                            <div class="panel-heading">
                                <label for="email">อีเมล์</label>
                                <input type="eamil" class="form-control" id="remail" name="username"
                                    placeholder="กรอกอีเมล์ของคุณ.." required>
                                <label for="password">รหัสผ่าน</label>
                                <input class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน.."
                                    required data-toggle="password">
                                <p><br /></p>
                                <a href="#" style="color:#e84118;list-style:none;">Forgotten Password</a>
                                <input type="submit" class="btn btn-primary" style="float:right;" id="login"
                                    value="Login">
                            </div>
                        </form>
                        <div class="panel-footer" id="e_msg"></div>
                    </div>
                </div>
            </div>
        </ul>

        </div>

    </nav>