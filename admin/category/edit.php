<?php $title = "Sửa chuyên mục";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$select = "SELECT * FROM categories WHERE category_id='{$id}'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : "NULL";
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "NULL";
    $category_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
    $excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : "NULL";
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : "NULL";

    $update = "UPDATE categories SET title='{$title}',slug='{$slug}',parent_id='{$category_id}',excerpt='{$excerpt}',taxonomy='{$taxonomy}' WHERE category_id='{$id}'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        echo "<script>alert('Sửa danh mục thành công !!!');</script>";
    } else {
        echo "<script>alert('Sửa danh mục thất bại !!!'); </script>";
    }
}
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Sửa danh mục</h2>
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
                <div class="col-md-6 col-xs-6 col-sm-12 col-xs-12 col-md-offet-3 col-lg-offset-3">
                    <h2 class="title-admin">Sửa danh mục</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="title" id="title" required class="form-control"
                                   onkeyup="ChangeToSlug();" value="<?php echo $row['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input type="text" name="slug" id="slug" required class="form-control"
                                   value="<?php echo $row['slug']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Trống</option>
                                <?php
                                $category = "SELECT * FROM categories WHERE parent_id='0'";
                                $_query = mysqli_query($conn, $category);
                                while ($row1 = mysqli_fetch_array($_query, MYSQLI_ASSOC)):
                                    ?>
                                    <option
                                        <?php ?>value="<?php echo $row1['category_id']; ?>"><?php echo $row1['title']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại danh mục</label>
                            <select name="taxonomy" class="form-control">
                                <option value="product_cat" <?php if ($row['taxonomy'] == "product_cat"): echo "selected"; endif; ?>>
                                    Danh mục sản phẩm
                                </option>
                                <option value="category"
                                    <?php if ($row['taxonomy'] == "category"): echo "selected"; endif; ?>>Danh mục
                                    bài viết
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả (có thể có</label>
                            <textarea name="excerpt" class="form-control"
                                      rows="3"><?php echo $row['excerpt']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add-category" class="btn btn-success"><i class="fa fa-edit"></i>
                                Sửa danh mục
                            </button>
                            <a class="btn btn-primary"
                               href="<?php echo curPageURL(); ?>admin/category/?taxonomy=<?php echo $_GET['taxonomy']; ?>"><i
                                        class="fa fa-angle-double-left"></i> Quay lại danh mục</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../layouts/footer.php"; ?>
