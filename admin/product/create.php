<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thongbao = array();
    $title = isset($_POST['title']) ? $_POST['title'] : "NULL";
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "NULL";
    $content = isset($_POST['content']) ? $_POST['content'] : "NULL";
    $is_plus = isset($_POST['is_plus']) ? $_POST['is_plus'] : "NULL";
    $excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : "NULL";
    $price = isset($_POST['price']) ? $_POST['price'] : "NULL";
    $price_sale = isset($_POST['price_sale']) ? $_POST['price_sale'] : "NULL";
    $is_hot = isset($_POST['is_hot']) ? $_POST['is_hot'] : "0";
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : "NULL";
    $tags = isset($_POST['tags']) ? $_POST['tags'] : "NULL";
    $images = $_FILES['images']['name'];
    /**hinh anh**/
    $images = $_FILES['images']["name"];
    $images_tmp = $_FILES['images']["tmp_name"];
    $images_size = $_FILES['images']["size"];
    $images_type = $_FILES['images']["type"];
    $explode = explode(".", $images);
    $ext = end($explode);
    $path =  $_SERVER['DOCUMENT_ROOT'] . '/assets/images/sanpham/';
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
            $sql = "INSERT INTO products (title,excerpt,content,images,category_id,tags,post_type,is_hot,price,price_sale,is_plus,slug)
					VALUES('{$title}','{$excerpt}','{$content}','{$anh}','{$category_id}','{$tags}','product','{$is_hot}','{$price}','{$price_sale}','{$is_plus}','{$slug}')
				";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Thêm sản phẩm thành công !!!');</script>";
            } else {
                echo "<script>alert('Thêm sản phẩm thất bại !!!'); </script>";
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
            <label>Tên sản phẩm</label>
            <input type="text" name="title" id="title" required class="form-control"
                   onkeyup="ChangeToSlug();">
        </div>
        <div class="form-group">
            <label>Đường dẫn</label>
            <input type="text" name="slug" id="slug" required class="form-control">
        </div>
        <div class="form-group">
            <label>Nội dung sản phẩm</label>
            <textarea name="content" id="textarea" rows="15"></textarea>
        </div>
        <div class="form-group">
            <label>Thuộc tính sản phẩm</label>
            <textarea name="is_plus" id="textarea1" rows="15"></textarea>
        </div>
        <div class="form-group">
            <label>Nội dung mô tả</label>
            <textarea name="excerpt" class="form-control"></textarea>
        </div>
    </div>
    <div class="col-md-4 col-xs-4 col-sm-12 col-xs-12">
        <div class="form-group">
            <label>Giá bán</label>
            <input type="text" name="price" required class="form-control">
        </div>
        <div class="form-group">
            <label>Giá khuyến mại (nếu có)</label>
            <input type="text" name="price_sale" class="form-control" value="0">
        </div>
        <div class="form-group">
            <label>Sản phẩm nổi bật</label>
            <div class="">
                <label>
                    <input type="checkbox" class="js-switch" name="is_hot" value="1" data-switchery="true"
                           style="display: none;">
                    Nổi bật
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <?php
                $category = "SELECT * FROM categories WHERE taxonomy='product_cat'";
                $_query = mysqli_query($conn, $category);
                while ($row1 = mysqli_fetch_array($_query, MYSQLI_ASSOC)):
                    ?>
                    <option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['title']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Từ khóa</label>
            <input type="text" name="tags" required class="form-control">
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input id="input-b1" name="images" type="file" class="file" data-browse-on-zone-click="true">
        </div>
        <div class="form-group">
            <button type="submit" name="add-category" class="btn btn-success"><i class="fa fa-plus"></i>
                Thêm sản phẩm
            </button>
        </div>
    </div>
</form>