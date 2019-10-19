<?php $title = "Đăng ký thành viên |  Shop bán hành online"; ?>
<?php require_once("inc/ketnoi.php"); ?>
<?php
if (isset($_POST["dang-ky"])) {
    $email = $_POST["email"];
    $hoten = $_POST["hoten"];
    $password1 = $_POST["matkhau"];
    $password2 = $_POST["matkhau1"];
    $phone = $_POST["dienthoai"];
    $ngaysinh = $_POST["ngaysinh"];
    $thangsinh = $_POST["thangsinh"];
    $namsinh = $_POST["namsinh"];
    $sex = $_POST["gioitinh"];
    $brithday = $namsinh . "-" . $thangsinh . "-" . $ngaysinh;
    $error_array = array();
    $dienthoai = substr($phone, 0, 1);
    if (validate_hoten_exits($hoten)) {
        $error_array["hoten"] = "Họ tên có quá nhiều khoảng cách giữa các chữ !!!";
    }
    if (is_numeric($hoten)) {
        $error_array["hoten"] = "Họ tên bạn nhập phải là ký tự !!!";
    }
    if (validate_email($email)) {
        $error_array["email"] = "Email phải đúng định dạng !!!";
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM taikhoan WHERE email='{$email}'")) > 0) {
        $error_array["email"] = "Email đã được đăng ký !!! Mời bạn chọn email khác.";
    }
    if (validate_phone($phone)) {
        $error_array["phone"] = "Số điện phải đúng định dạng [0-9]";
    }
    if (strlen($phone) < 9 || strlen($phone) > 11) {
        $error_array["phone"] = "Số điện thoại phải lớn hơn 9 và nhỏ hơn 12 ký tự !!!";
    }
    if ($dienthoai != "0") {
        $error_array["phone"] = "Số điện thoại bạn nhập phải bắt đầu là số 0 !!!";
    }
    if ($password1 != $password2 || !validate_password($password1) || validate_strlen($password1)) {
        $error_array["matkhau"] = "Mật khẩu phải thỏa mãn: Mật khẩu nhập phải khớp nhau hoặc lớn hơn 8 và nhỏ hơn 16 ký tự !!!";
    }

    if (empty($error_array)) {
        $email = mysqli_escape_string($conn, $email);
        $hoten = mysqli_escape_string($conn, $hoten);
        $pass = mysqli_escape_string($conn, md5($password1));
        $phone = mysqli_escape_string($conn, $phone);
        $sql = "INSERT INTO taikhoan(email,hoten,matkhau,gioitinh,sodienthoai,ngaysinh,trangthai)
					VALUES('{$email}','{$hoten}','{$pass}','{$sex}','{$phone}','{$brithday}',2)
				";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Đăng ký thành công !!!'); </script>";
        } else {
            echo "Dang ky that bai" . mysqli_error($conn);
        }

    }
}
?>
<?php require_once("template/header.php") ?>
    <section id="form-dang-ky">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 style="text-align: center;">Đăng ký tài khoản</h2>
                    <?php
                    if (!empty($error_array["hoten"])) {
                        echo "<p class='alert alert-danger'>" . $error_array["hoten"] . "</p>";
                    }
                    if (!empty($error_array["email"])) {
                        echo "<p class='alert alert-danger'>" . $error_array["email"] . "</p>";
                    }
                    if (!empty($error_array["phone"])) {
                        echo "<p class='alert alert-danger'>" . $error_array["phone"] . "</p>";
                    }
                    if (!empty($error_array["matkhau"])) {
                        echo "<p class='alert alert-danger'>" . $error_array["matkhau"] . "</p>";
                    }
                    if (!empty($error_array["matkhau"])) {
                        echo "<p class='alert alert-danger'>" . $error_array["matkhau"] . "</p>";
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label><h4>Họ tên</h4></label>
                            <input type="text" name="hoten"
                                   placeholder="Họ tên" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Email</h4></label>
                            <input type="text" class="form-control" name="email" placeholder="Email"
                                   required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Ngày sinh</h4></label>
                            <input type="date" class="form-control" name="date" placeholder="Email"
                                   required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Điện thoại</h4></label>
                            <input type="number" class="form-control" name="dienthoai"
                                   placeholder="Điện thoại" required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Mật khẩu</h4></label>
                            <input type="password" class="form-control" name="matkhau"
                                   placeholder="Mật khẩu" required="">
                        </div>
                        <div class="form-group">
                            <label for=""><h4>Xác nhận mật khẩu</h4></label>
                            <input type="password" class="form-control" name="matkhau1"
                                   placeholder="Mật khẩu xác nhận" required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Giới tính</h4></label>
                            <input type="radio" name="gioitinh" value="1" checked="">Nam
                            <input type="radio" name="gioitinh" value="1">Nữ
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-dang-nhap btn btn-success" name="dang-ky">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require_once('template/footer.php'); ?>