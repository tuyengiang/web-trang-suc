<?php
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
            $sql = "INSERT INTO users (name,email,password,images,id_status,username)
					VALUES('{$name}','{$email}','{$password}','{$anh}','{$id_status}','{$username}')
				";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Thêm tài khoản thành công !!!');</script>";
            } else {
                echo "<script>alert('Thêm tài khoản thất bại !!!'); </script>";
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
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="text" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <label>Vai trò trên website</label>
            <select name="permition" class="form-control">
                <?php
                $sql = "SELECT * FROM permision_users";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                    ?>
                    <option value="<?php echo $row['id_status']; ?>"><?php echo $row['title']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input id="input-b1" name="images" type="file" class="file" data-browse-on-zone-click="true">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm tài khoản
            </button>
        </div>
    </div>
</form>