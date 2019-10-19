<?php $title = "Sửa phân quyền";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$select = "SELECT * FROM permision_users WHERE id_status='{$id}'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : "NULL";

    $update = "UPDATE permision_users SET title='{$title}' WHERE id_status='{$id}'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        echo "<script>alert('Sửa phân quyền thành công !!!');</script>";
    } else {
        echo "<script>alert('Sửa phân quyền thất bại !!!'); </script>";
    }
}
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Sửa phân quyền</h2>
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
                    <h2 class="title-admin">Sửa phân quyền: <?php echo $row['title']; ?></h2>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="title" id="title" required class="form-control"
                                   onkeyup="ChangeToSlug();" value="<?php echo $row['title']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add-category" class="btn btn-success"><i class="fa fa-edit"></i>
                                Sửa phân quyền
                            </button>
                            <a class="btn btn-primary"
                               href="<?php echo curPageURL(); ?>admin/user-permition/"><i
                                    class="fa fa-angle-double-left"></i> Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../layouts/footer.php"; ?>
