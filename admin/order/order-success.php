<?php
$title = "Danh sách đơn hàng đã bán";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM cart WHERE id_cart='{$delete}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Xóa đơn hàng thành công !!!'); </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách đơn hàng</h2>
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
                <div class="col-md-12 col-xs-12 col-sm-12 col-xs-12">
                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM cart WHERE is_active=1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                            if ($row > 0) {
                                ?>
                                <tr>
                                    <td>#<?php echo $row['id_cart']; ?></td>
                                    <td>
                                        <div class="avatar-product-order">
                                            <img src="<?php echo curPageURL() . 'assets/images/sanpham/' . $row['id_images']; ?>"
                                                 alt="">
                                        </div>
                                    </td>
                                    <td> <?php echo $row['title']; ?>
                                    </td>
                                    <td><b><?php echo $row['count']; ?></b></td>
                                    <td>
                                        <div class="price-cart">
                                            <?php
                                            $args = explode(' ', $row['price']);
                                            if (count($args) >= 2) {
                                                ?>
                                                <span class="price-sale">
                                                    <?php echo number_format($args[0]) . " VNĐ"; ?>
                                                </span>
                                                <span class="price-regular-under">
                                                    <?php echo number_format($args[1]) . " VNĐ"; ?>
                                                 </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="price-regular-under">
                                                    <?php echo number_format($args[0]) . " VNĐ"; ?>
                                                 </span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $status = $row['is_active'];
                                        if ($status == 0) {
                                            ?>
                                            <div class="btn btn-warning">Đang xử lý</div>
                                            <?php
                                        } else { ?>
                                            <div class="btn btn-success">Đang giao hàng</div>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" style="float: left;"
                                           href="<?php echo curPageURL() . 'admin/order/view.php?id=' . $row['id_cart']; ?>"><i
                                                    class="fa fa-eye"></i></a>
                                        <form method="POST" style="float: left;">
                                            <input type="hidden" name="delete" value="<?php echo $row['id_cart']; ?>">
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn muốn xóa đơn hàng không ? '); "
                                                    name="btn-delete"><i
                                                        class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php

                            } else { ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger">Bạn chưa có đơn hàng nào !!!</div>
                                    </td>
                                </tr>
                                <?php
                            }
                        endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/footer.php"; ?>
