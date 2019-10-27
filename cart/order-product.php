<?php $title = "Thanh toán thành công"; ?>
<?php require_once("../template/header-single.php"); ?>
    <section id="product-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
                <div class="col-md-4">
                    <div class="title-home">
                        <span><h2>Đơn hàng bạn đã đặt mua</h2></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Trạng thái</th>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM cart WHERE user_id='{$_SESSION["user_id"]}'";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                            if ($row > 0) {
                                ?>
                                <tr>
                                    <td>#<?php echo $row['id_cart']; ?></td>
                                    <td>
                                        <div class="cart-avatar">
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
                <div class="col-md-12" style="text-align: center;">
                    <a href="<?php echo curPageURL(); ?>" class="btn btn-success btn-store">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </section>
<?php require_once("../template/footer.php");
