<?php $title = "Đăng nhập  |  Shop bán hành online"; ?>
<?php require_once("inc/ketnoi.php"); ?>
<?php
if (isset($_POST["dang-nhap"])) {
    $email = $_POST["email"];
    $matkhau = md5($_POST["password"]);
    $error_array = array();
    if (validate_email($email)) {
        $error_array["email"] = "Email bạn nhập không đúng định dạng !!!";
    } else {

        $sql = "SELECT email,password,id_status,user_id FROM users WHERE email='{$email}' AND password='{$matkhau}'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($row == 0) {
            $error_array["error"] = "Tài khoản hoặc mật khẩu không đúng !!! Mời nhập lại.";
        } else {
            $status = $row['id_status'];
            $id_user = $row['user_id'];
            if ($status == "6") {
                $_SESSION["email"] = $email;
                $_SESSION["status"] = $status;
                $_SESSION["user_id"] = $id_user;
                header(('location:cart/'));
            } else {
                $_SESSION["email"] = $email;
                $_SESSION["status"] = $status;
                $_SESSION["user_id"] = $id_user;
                header('location:admin/');
            }
        }
    }
}

?>
<?php require_once("template/header.php") ?>
    <section id="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="br">
                        <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="dang-nhap.php">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-form">
                        <p style="font-size:25px;padding:30px 0 10px 0;color:#333;"> Đăng ký</p>
                        <p style="word-wrap: break-word;">Bằng việc tạo tài khoản bạn có thể mua sắm nhanh hơn, theo dõi
                            trạng thái đơn hàng, và theo dõi đơn hàng mà bạn đã đặt.</p>
                        <a href="dang-ky.php">
                            <button class="btn-dang-nhap btn btn-success">Đăng ký</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Đăng nhập</h2>
                    <div class="login-form">
                        <?php
                        if (!empty($error_array["error"])) {
                            echo "<div class='alert alert-danger'>" . $error_array["error"] . "</div>";
                        }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label><h4>Email</h4></label>
                                <?php
                                if (!empty($error_array["email"])) {
                                    echo "<div class='alert alert-danger'>" . $error_array["email"] . "</div>";
                                }
                                ?>
                                <input type="text" name="email" placeholder="Email" required=""
                                       class="form-control input-text">
                            </div>
                            <div class="form-group">
                                <label><h4>Mật khẩu</h4></label>
                                <input type="password" name="password" required="" placeholder="Mật khẩu"
                                       class="form-control input-text">
                            </div>
                            <div class="form-group">
                                <label>
                                    <a href="quenmatkhau.php" class="question">Quên mật khẩu ?</a>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="dang-nhap" value="dang-nhap">
                                <button type="submit" class="btn-dang-nhap btn btn-danger" name="dang-nhap">Đăng nhập
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require_once('template/footer.php'); ?>