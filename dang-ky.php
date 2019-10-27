<?php $title = "Đăng ký thành viên"; ?>
<?php require_once("inc/ketnoi.php"); ?>
<?php
if (isset($_POST["dang-ky"])) {
    $user = $_POST["username"];
    $email = $_POST["email"];
    $hoten = $_POST["hoten"];
    $password1 = $_POST["matkhau"];
    $password2 = $_POST["matkhau1"];
    $status = 6;
    $error_array = array();
    if (validate_hoten_exits($hoten)) {
        $error_array["hoten"] = "Họ tên có quá nhiều khoảng cách giữa các chữ !!!";
    }
    if (is_numeric($hoten)) {
        $error_array["hoten"] = "Họ tên bạn nhập phải là ký tự !!!";
    }
    if (validate_email($email)) {
        $error_array["email"] = "Email phải đúng định dạng !!!";
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'")) > 0) {
        $error_array["email"] = "Email đã được đăng ký !!! Mời bạn chọn email khác.";
    }
    if ($password1 != $password2 || !validate_password($password1) || validate_strlen($password1)) {
        $error_array["matkhau"] = "Mật khẩu phải thỏa mãn: Mật khẩu nhập phải khớp nhau hoặc lớn hơn 8 và nhỏ hơn 16 ký tự !!!";
    }

    if (empty($error_array)) {
        $user = mysqli_escape_string($conn, $user);
        $email = mysqli_escape_string($conn, $email);
        $hoten = mysqli_escape_string($conn, $hoten);
        $pass = mysqli_escape_string($conn, md5($password1));
        $sql = "INSERT INTO users(email,name,password,username,id_status)
					VALUES('{$email}','{$hoten}','{$pass}','{$user}','{$status}')
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
                            <label><h4>Username</h4></label>
                            <input type="text" name="username"
                                   placeholder="Username" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label><h4>Email</h4></label>
                            <input type="text" class="form-control" name="email" placeholder="Email"
                                   required="">
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