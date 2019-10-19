<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('Tài khoản này không tồn tại !!!');</script>";
}
$select = "SELECT * FROM users WHERE user_id='{$id}'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thongbao = array();
    $name = isset($_POST['name']) ? $_POST['name'] : "NULL";
    $email = isset($_POST['email']) ? $_POST['email'] : "NULL";
    $password = isset($_POST['password']) ? md5($_POST['password']) : "NULL";
    $id_status = isset($_POST['permition']) ? $_POST['permition'] : "NULL";
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
            $sql = "UPDATE users SET name='{$name}',email='{$email}',password='{$password}',images='{$anh}',id_status='{$id_status}',username='{$username}' WHERE user_id='{$id}'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Sửa tài khoản thành công !!!');</script>";
            } else {
                echo "<script>alert('Sửa tài khoản thất bại !!!'); </script>";
                //echo mysqli_error($conn);
            }
        }
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-md-offset-6 col-lg-offset-3">
        <div class="form-group">
            <label>Tên hiển thị</label>
            <input type="text" name="name" required class="form-control" value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required class="form-control" readonly
                   value="<?php echo $row['username']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required class="form-control" readonly
                   value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
            <label>Vai trò trên website</label>
            <select name="permition" class="form-control">
                <?php
                $sql = "SELECT * FROM permision_users";
                $query = mysqli_query($conn, $sql);
                while ($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                    ?>
                    <option <?php if ($row['id_status'] == $row1['id_status']): echo "selected"; endif; ?>
                            value="<?php echo $row1['id_status']; ?>"><?php echo $row1['title']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input id="input-b1" name="images" type="file" class="file" data-browse-on-zone-click="true">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-edit"></i> Sửa tài khoản
            </button>
            <a href="<?php echo curPageURL(); ?>admin/user/" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Quay lại</a>
        </div>
    </div>
</form>