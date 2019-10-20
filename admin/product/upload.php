<?php
if (isset($_GET['id'])) {
    $id_p = $_GET['id'];
} else {
    echo "<script>alert('Sản phẩm này không tồn tại !!!');</script>";
}
$select = "SELECT * FROM products WHERE id_product='{$id_p}'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_FILES["hinhanh"]["name"] as $id => $name) {
        $name = $_FILES["hinhanh"]["name"][$id];
        $images_tmp = $_FILES["hinhanh"]["tmp_name"][$id];
        $images_size = $_FILES["hinhanh"]["size"][$id];
        $images_type = $_FILES["hinhanh"]["type"][$id];
        $explode = explode(".", $name);
        $ext = end($explode);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/anhsanpham/';;
        $path = $path . basename($explode[0] . time() . "." . $ext);
        $thongbao = array();
        $anh = basename($explode[0] . time() . "." . $ext);
        /**them san pham nen csdl**/
        if (empty($images_tmp)) {
            $thongbao["hinhanh"] = "Mời chọn file ảnh !!!";
        } else {
            $check_images = array("jpg", "png", "jpeg", "gif");
            if (in_array($ext, $check_images) === false) {
                $thongbao["hinhanh"] = "Files ảnh không đúng định dạng jpg,png,jpeg,gif !!!";

            }
        }
        if (empty($thongbao)) {
            if (move_uploaded_file($images_tmp, $path)) {
                $sql = "INSERT INTO images_gallery (id_product,name)
						VALUES('{$id_p}','{$anh}');
					";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    $mess = "Upload thành công !!!";
                } else {
                    $mess = "Upload không thành công !!!" . mysqli_error($conn);
                }
            } else {
                $thongbao["hinhanh"] = "Lỗi uploads ảnh !!1";
            }

        }
    }

}
?>
<div class="col-md-12">
    <h2 class="title-admin">Upload list hình ảnh sản phẩm: <?php echo $row['title']; ?></h2>
</div>
<div class="col-md-12">
    <?php if (!empty($mess)) { ?>
        <div class="alert alert-success"><?php echo $mess; ?></div>
    <?php } else if (!empty($thongbao['hinhanh'])) { ?>
        <div class="alert alert-danger"><?php echo $thongbao['hinhanh']; ?></div>
    <?php } ?>
</div>
<div class="col-md-12">
    <form method="post" enctype="multipart/form-data" action="">
        <div class="file-loading">
            <input id="input-24" name="hinhanh[]" type="file" multiple>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
        <a href="<?php echo curPageURL(); ?>admin/product/" class="btn btn-primary"><i
                    class="fa fa-angle-double-left"></i> Quay lại</a>
    </form>
</div>

