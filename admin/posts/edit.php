<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('Bài viết này không tồn tại !!!');</script>";
}
$select = "SELECT * FROM posts WHERE id_post='{$id}'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thongbao = array();
    $title = isset($_POST['title']) ? $_POST['title'] : "NULL";
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "NULL";
    $content = isset($_POST['content']) ? $_POST['content'] : "NULL";
    $excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : "NULL";
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : "0";
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : "NULL";
    $images = $_FILES['images']['name'];
    /**hinh anh**/
    $images = $_FILES['images']["name"];
    $images_tmp = $_FILES['images']["tmp_name"];
    $images_size = $_FILES['images']["size"];
    $images_type = $_FILES['images']["type"];
    $explode = explode(".", $images);
    $ext = end($explode);
    $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/posts/';
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
            $sql = "UPDATE posts SET title='{$title}',excerpt='{$excerpt}',content='{$content}',images='{$anh}',category_id='{$category_id}',is_active='{$is_active}',slug='{$slug}' WHERE id_post='{$id}'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Sửa bài viết thành công !!!');</script>";
            } else {
                echo "<script>alert('Sửa bài viết thành thất bại !!!');</script>";
            }
        }
    }
}
?>
<div class="col-md-12">
    <?php if (!empty($thongbao["hinhanh"])): ?>
        <div class="alert alert-danger"><?php echo $thongbao["hinhanh"]; ?></div>
    <?php endif; ?>
</div>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="col-md-8 col-xs-8 col-sm-12 col-xs-12">
        <div class="form-group">
            <label>Tên bài viết</label>
            <input type="text" name="title" id="title" required class="form-control"
                   onkeyup="ChangeToSlug();" value="<?php echo $row['title']; ?>">
        </div>
        <div class="form-group">
            <label>Đường dẫn</label>
            <input type="text" name="slug" id="slug" required class="form-control" value="<?php echo $row['slug']; ?>">
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea name="content" id="textarea" rows="15"><?php echo $row['content']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Mô tả bài viết</label>
            <textarea name="excerpt" class="form-control"><?php echo $row['excerpt']; ?></textarea>
        </div>
    </div>
    <div class="col-md-4 col-xs-4 col-sm-12 col-xs-12">

        <div class="form-group">
            <label>Trạng thái</label>
            <div class="">
                <label>
                    <input type="checkbox" class="js-switch" name="is_active"
                           value="1" <?php if ($row['is_active'] == 1): echo 'checked=""'; endif; ?> data-switchery="true"
                           style="display: none;">
                    Tắt/bật
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <?php
                $category = "SELECT * FROM categories WHERE taxonomy='category'";
                $_query = mysqli_query($conn, $category);
                while ($row1 = mysqli_fetch_array($_query, MYSQLI_ASSOC)):
                    ?>
                    <option <?php if ($row['category_id'] == $row1['category_id']): echo "selected"; endif; ?>
                            value="<?php echo $row1['category_id']; ?>"><?php echo $row1['title']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input id="input-b1" name="images" type="file" class="file" data-browse-on-zone-click="true"
                   value="<?php echo curPageURL() . "assets/images/sanpham/" . $row['images']; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="add-category" class="btn btn-success"><i class="fa fa-edit"></i>
                Sửa bài viết
            </button>
        </div>
    </div>
</form>