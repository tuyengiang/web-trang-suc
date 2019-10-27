<?php
include "../layouts/header-admin.php";
if ($_GET['id']) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM cart WHERE id_cart='{$id}'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$title = "Đơn hàng #" . $row['id_cart'];
include "../layouts/menu-admin.php";
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $is_active = $_POST['is_active'];
    $sql = "UPDATE cart SET is_active='{$is_active}' WHERE id_cart='{$id}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $message = "Cập nhật đơn hàng thành công !!!";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thông tin đơn hàng</h2>
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
                <div class="col-md-12">
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-success showHidden">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-8 col-xs-8 col-sm-12 col-xs-12">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 15%">Hình ảnh</td>
                            <td>
                                <div class="avatar-product-order">
                                    <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['id_images']; ?>"
                                         alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Tên sản phẩm</td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Số lượng</td>
                            <td>
                                <?php echo $row['count']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Giá bán</td>
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
                        </tr>
                        <tr>
                            <td style="width: 15%">Trang thái</td>
                            <td>
                                <?php
                                $status = $row['is_active'];
                                if ($status == 0) {
                                    ?>
                                    <div class="btn btn-warning">Đang xử lý</div>
                                    <?php
                                } else { ?>
                                    <div class="btn btn-warning">Đang giao hàng</div>
                                <?php }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Người mua</td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Email</td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15%">Địa chỉ</td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                        </tr>
                    </table>
                    <a href="<?php echo curPageURL(); ?>admin/order/order-all.php" class="btn btn-primary"><i
                                class="fa fa-angle-double-left"></i> Quay lại danh sách đơn hàng</a>
                </div>

                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
                    <?php if ($row['is_active'] == 0) : ?>
                        <form method="post">
                            <div class="form-group">
                                <input type="checkbox" class="js-switch" name="is_active" value="1"
                                       data-switchery="true"
                                       style="display: none;">
                                Xuất hàng
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Cập nhật
                                </button>
                            </div>
                        </form>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/footer.php"; ?>
