<?php $title = "Danh sách phân quyển tài khoản";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_name = $_POST['title'];
    $error = array();
    if (empty($_name)) {
        $error['title'] = 'Bạn chưa nhập tên phân quyền';
    } else {
        $sql = "INSERT INTO permision_users (title) VALUES('{$_name}')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Thêm phân quyền thành công');</script>";
        } else {
            echo "<script>alert('Thêm phân quyền thành công'); </script>";
        }
    }
}
else if ($_SERVER['REQUEST_METHOD'] =="GET" && isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $sql = "DELETE FROM permision_users WHERE id_status='{$delete}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Xóa phân quyền thành công !!!');</script>";
    } else {
        echo "<script>alert('Xóa phân quyền thất bại !!!'); </script>";
    }
}
?>
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
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Tên phân quyền</label>
                            <input type="text" class="form-control" placeholder="Tên phân quyền" name="title">
                            <?php
                            if (!empty($error['title'])) {
                                echo '<p>' . $error['title'] . '</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="add"><i class="fa fa-plus"></i> Thêm
                                phân
                                quyền
                                mới</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid"
                           aria-describedby="datatable_info">
                        <thead>
                        <tr role="row">
                            <th style="width:20px" class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                style="width: 157px;">STT
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 259px;">Tên phân
                                quyền
                            </th>
                            <th style="width: 102px !important;" class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 259px;">Hành động
                            </th>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM permision_users";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                            ?>
                            <tr role="row" class="odd">
                                <td style="width:20px" class="sorting_1"><?php echo $row['id_status']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td style="width:130px;">
                                    <a href="<?php echo curPageURL(); ?>admin/user-permition/edit.php?id=<?php echo $row['id_status']; ?>" class="btn btn-primary" style="float: left"><i class="fa fa-edit"></i></a>
                                   <form method="GET" style="float:left">
                                       <input type="hidden" name="delete" value="<?php echo $row['id_status']; ?>">
                                       <button type="submit" onclick="return confirm('Bạn muốn xóa phân quyền này không?'); " class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
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
