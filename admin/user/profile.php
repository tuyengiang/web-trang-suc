<?php $title = "Thông tin tài khoản";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thongbao = array();
    $name = isset($_POST['name']) ? $_POST['name'] : "NULL";
    $email = isset($_POST['email']) ? $_POST['email'] : "NULL";
    $username = isset($_POST['username']) ? $_POST['username'] : "NULL";
    $images = $_FILES['images']['name'];
    /**hinh anh**/
    $images = $_FILES['images']["name"];
    $images_tmp = $_FILES['images']["tmp_name"];
    $images_size = $_FILES['images']["size"];
    $images_type = $_FILES['images']["type"];
    $explode = explode(".", $images);
    $ext = end($explode);
    $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/images-user/';
    $path = $path . basename($explode[0] . time() . "." . $ext);
    $thongbao = array();
    $anh = basename($explode[0] . time() . "." . $ext);

    $check_images = array("jpg", "png", "jpeg", "gif");
    $max_size = 4000000;
    if (in_array($ext, $check_images) === false) {
        $thongbao["hinhanh"] = "Files ảnh không đúng định dạng jpg,png,jpeg,gif";

    }
    if ($images_size > $max_size) {
        $thongbao["hinhanh"] = "Files ảnh kích thước quá lớn <4MB";
    }
    if (empty($thongbao)) {
        if (move_uploaded_file($images_tmp, $path)) {
            $sql = "UPDATE users SET name='{$name}',email='{$email}',images='{$anh}',id_status='{$id_status_u}',username='{$username}' WHERE user_id='{$id_u}'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Cập nhật tài khoản thành công !!!');</script>";
            } else {
                echo "<script>alert('Cập nhật khoản thất bại !!!'); </script>";
                //echo mysqli_error($conn);
            }
        }
    }
}

?>

<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thông tin của bạn</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <div class="author-avatar">
                        <img src="<?php echo curPageURL(); ?>assets/images/images-user/<?php echo $images_u; ?>" alt="">
                    </div>
                    <div class="author-content">
                        <h3><?php echo $name_u; ?></h3>
                        <div class="infomation">
                            <h4><i class="fa fa-info-circle"></i> Thông tin</h4>
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo $email_u; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 col-lg-8">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
                                   aria-expanded="true">Cập nhật thông tin</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"
                                   aria-expanded="false">Đổi mật khẩu</a>
                            </li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                 aria-labelledby="home-tab">
                                <div class="box-block bg-white">
                                    <br>
                                    <div class="col-md-12">
                                    </div>
                                    <br>
                                    <form method="POST"
                                          action=""
                                          accept-charset="UTF-8" class="form-horizontal form-label-left"
                                          id="demo-form2" data-parsley-validate="" role="form"
                                          enctype="multipart/form-data" novalidate="">
                                        <div class="form-group row">
                                            <label for="name"
                                                   class="col-xs-2 col-form-label">Tên hiển thị</label>
                                            <div class="col-xs-10">
                                                <input required="required" placeholder="Name" id="name"
                                                       name="name" type="text" class="form-control"
                                                       value="<?php echo $name_u; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email"
                                                   class="col-xs-2 col-form-label">Email</label>
                                            <div class="col-xs-10">
                                                <input required="required" placeholder="Email"
                                                       id="email" name="email" type="email"
                                                       value="<?php echo $email_u; ?>" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email"
                                                   class="col-xs-2 col-form-label">Username</label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text"
                                                       id="phone" name="username" type="text" readonly
                                                       value="<?php echo $id_user; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Ảnh đại diện</label>
                                            <div class="col-xs-10">
                                                <input id="input-b1" name="images" type="file" class="file"
                                                       data-browse-on-zone-click="true">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="zipcode"
                                                   class="col-xs-2 col-form-label"></label>
                                            <div class="col-xs-10">
                                                <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-save" name="update"></i> Cập nhật
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                 aria-labelledby="profile-tab">

                                <form method="POST"
                                      action=""
                                      accept-charset="UTF-8" class="form-horizontal form-label-left"
                                      id="demo-form" data-parsley-validate="" role="form"
                                      enctype="multipart/form-data" novalidate="">

                                    <div class="form-group row">
                                        <label for="password" class="col-xs-2 col-form-label">Mật khẩu mới</label>
                                        <div class="col-xs-10">
                                            <input required="required" placeholder=""
                                                   min="6" class="form-control col-md-7 col-xs-12"
                                                   id="password" name="password" type="password"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirmation"
                                               class="col-xs-2 col-form-label">Nhập lại mật khẩu</label>
                                        <div class="col-xs-10">
                                            <input required="required" data-parsley-equalto="#password"
                                                   min="6"
                                                   data-parsley-equalto-message=""

                                                   class="form-control col-md-7 col-xs-12"
                                                   id="password_confirmation"
                                                   name="password_confirmation" type="password"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit" class="btn btn-primary" name="change">Đổi mật khẩu
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--persion-->
</div>
<!--end page content-->
<?php include "../layouts/footer.php"; ?>
