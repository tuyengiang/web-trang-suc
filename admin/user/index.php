<?php $title = "Danh sách phân quyền tài khoản";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if ($_SERVER['REQUEST_METHOD'] =="GET" && isset($_GET['delete'])):
    $delete = $_GET['delete'];
    $sql = "DELETE FROM users WHERE user_id='{$delete}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Xóa tài khoản thành công !!!');</script>";
    } else {
        echo "<script>alert('Xóa tài khoản thất bại !!!'); </script>";
    }
endif;
?>
<style>
    .avatar-product img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-product {
        width: 80px;
        height: 80px;
    }
</style>
<div class="col-md-12">
    <a href=""></a>
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách thành viên</h2>
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
            <div class="form-button-action">
                <a href="_form.php?action=create" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm thành viên mới</a>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 col-xs-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tên hiển thị</th>
                            <th>Phân quyền</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM users WHERE username!='{$id_user}'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array( $query, MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td>
                                    <div class="avatar-product">
                                        <img src="<?php echo curPageURL(); ?>assets/images/images-user/<?php echo $row['images']; ?>"
                                             alt="">
                                    </div>
                                </td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['id_status']; ?></td>
                                <td>
                                    <a style="float: left;"
                                       href="<?php echo curPageURL(); ?>admin/user/_form.php?action=edit&id=<?php echo $row['user_id']; ?>"
                                       class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <form method="GET" style="float:left">
                                        <input type="hidden" value="<?php echo $row['user_id']; ?>"
                                               name="delete">
                                        <button type="submit" name="delete-btn" class="btn btn-danger"
                                                onclick="return confirm('Bạn muốn xóa tài khoản này này không ?'); "><i
                                                    class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/footer.php"; ?>
