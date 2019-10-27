<?php $title = "Thanh toán"; ?>
<?php require_once("../template/header-single.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $address = isset($_POST['address']) ? $_POST['address'] : NULL;
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : NULL;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item => $value):
            foreach ($value as $key => $items):
                $sql = "INSERT INTO cart (title,count,price,id_images,user_id,is_active,name,email,address) 
                VALUES('{$items["title"]}','{$items["count"]}','{$items["price"]}','{$items["images"]}','{$user_id}','{$items["active"]}','{$name}','{$email}','{$address}')";
                $query = mysqli_query($conn, $sql);
            endforeach;
        endforeach;
    }
    if ($query) {
        $messages = "Thanh toán thành công !!!";
        unset($_SESSION['cart']);
    } else {
        echo mysqli_error($conn);
    }
}
?>
<?php if (!empty($messages)) { ?>
    <section id="product-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" style="text-align: center;">
                        Đặt hàng thành công. Chúng tôi sẽ nhanh chóng liên hệ với bạn trong vòng 24h tới !!!
                        Chân thành cảm ơn bạn đã ửng hộ và tin tưởng chúng tôi
                    </div>
                </div>
                <div class="col-md-12" style="text-align: center;">
                    <a href="<?php echo curPageURL(); ?>" class="btn btn-success btn-store">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section id="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="br">
                        <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="/">Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="product-content">
        <div class="container">
            <div class="row">
                <form method="post">
                    <div class="col-md-6">
                        <div class="form-checkout">
                            <h2>Thông tin thanh toán của bạn</h2>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required=""
                                       value="<?php echo $_SESSION['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" name="address" required="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id"
                                       value="<?php if (isset($_SESSION['user_id'])): echo $_SESSION['user_id'];
                                       endif; ?>">
                            </div>
                        </div>
                    </div><!--form-check-out-->

                    <div class="col-md-6">
                        <div class="form-order">
                            <h2>Đơn hàng của bạn</h2>
                            <table class="table table-bordered">
                                <thead>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Giá bán</th>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item => $value):
                                        foreach ($value as $key => $items):
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="cart-avatar">
                                                        <img src="<?php echo curPageURL() . 'assets/images/sanpham/' . $items['images']; ?>"
                                                             alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $items['id']; ?>&taxonomy=product_cat">
                                                        <?php echo $items['title']; ?><b style="color:#ff3333;">
                                                            x<?php echo $items['count']; ?></b>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="price-cart">
                                                        <?php
                                                        $args = explode(' ', $items['price']);
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
                                        <?php
                                        endforeach;
                                    endforeach;
                                } else { ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-danger">Giỏ hàng bạn hiện đang trống !!!</div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <div class="btn-checkout">
                                <button type="submit" class="btn btn-success btn-store">Tiến hành thanh toán</button>
                            </div>
                        </div>
                    </div><!---form-info-product-->
                </form>
            </div>
        </div>
    </section><!--checkout-->
<?php } ?>

<?php require_once("../template/footer.php"); ?>
