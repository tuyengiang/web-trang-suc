<?php
if (isset($_GET['taxonomy'])) {
    $tax = $_GET['taxonomy'];
}
if ($tax == "product_cat") {
    $title = "Danh sách chuyên mục sản phẩm";
} else if ($tax == "category") {
    $title = "Danh sách chuyên mục bài viết";
}
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : "NULL";
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "NULL";
    $category_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
    $excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : "NULL";
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : "NULL";

    $insert = "INSERT INTO categories (title,slug,parent_id,excerpt,taxonomy) 
    VALUES ('{$title}','{$slug}','{$category_id}','{$excerpt}','{$taxonomy}')";
    $query = mysqli_query($conn, $insert);
    if ($query) {
        echo "<script>alert('Thêm danh mục thành công !!!');</script>";
    } else {
        echo "<script>alert('Thêm danh mục thất bại !!!'); </script>";
    }
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $sql = "DELETE FROM categories WHERE category_id='{$delete}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Xóa danh mục thành công !!!');</script>";
    } else {
        echo "<script>alert('Xóa danh mục thất bại !!!'); </script>";
    }
}
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách chuyên mục</h2>
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
                <div class="col-md-6 col-xs-6 col-sm-12 col-xs-12">
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="title" id="title" required class="form-control"
                                   onkeyup="ChangeToSlug();">
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input type="text" name="slug" id="slug" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Trống</option>
                                <?php
                                $category = "SELECT * FROM categories WHERE parent_id='0' AND taxonomy='{$tax}'";
                                $_query = mysqli_query($conn, $category);
                                while ($row1 = mysqli_fetch_array($_query, MYSQLI_ASSOC)):
                                    ?>
                                    <option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['title']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại danh mục</label>
                            <select name="taxonomy" class="form-control">
                                <option value="product_cat">Danh mục sản phẩm</option>
                                <option value="category">Danh mục bài viết</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả (có thể có)</label>
                            <textarea name="excerpt" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add-category" class="btn btn-success"><i class="fa fa-plus"></i>
                                Thêm danh mục
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-12 col-xs-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên chuyên mục</th>
                            <th>Mục cha</th>
                            <th>Slug</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM categories WHERE taxonomy='{$tax}'";
                        $query = mysqli_query($conn, $sql);
                        if ($query) {
                            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?php echo $row['category_id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['parent_id']; ?></td>
                                    <td><?php echo $row['slug']; ?></td>
                                    <td>
                                        <a style="float: left;"
                                           href="<?php echo curPageURL(); ?>admin/category/edit.php?taxonomy=<?php echo $tax; ?>&id=<?php echo $row['category_id']; ?>"
                                           class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <form method="GET" style="float:left">
                                            <input type="hidden" value="<?php echo $row['category_id']; ?>"
                                                   name="delete">
                                            <button type="submit" name="delete" class="btn btn-danger"
                                                    onclick="return confirm('Bạn muốn xóa danh mục không ?'); "><i
                                                        class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile;
                        } else { ?>
                            <tr>
                                Không có dữ liệu
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/footer.php"; ?>
