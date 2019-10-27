<?php $title = "Giở hàng"; ?>
<?php require_once("../template/header-single.php"); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn-remove'])) {
    $delete = $_POST['delete'];
    $key = $_POST['key'];
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart'][$key][$delete]);
        $message = "Xóa sản phẩm thành công !!!";
    }
    if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}
?>
<section id="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="br">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="/">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="line"></div>
            </div>
            <div class="col-md-4">
                <div class="title-home">
                    <span><h2>Giỏ hàng của bạn</h2></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-success showHidden">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>
            <script>
                (function ($) {
                    setTimeout(function () {
                        $('.showHidden').slideUp();
                    }, 3000);
                })(jQuery);
            </script>
            <div class="col-md-12">
                <table class="table table-borded">
                    <thead>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item => $value):
                            foreach ($value as $key => $items):
                                ?>
                                <tr>
                                    <td>#<?php echo $items['id']; ?></td>
                                    <td>
                                        <div class="cart-avatar">
                                            <img src="<?php echo curPageURL() . 'assets/images/sanpham/' . $items['images']; ?>"
                                                 alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $items['id']; ?>&taxonomy=product_cat">
                                            <?php echo $items['title']; ?>
                                        </a>
                                    </td>
                                    <td><b><?php echo $items['count']; ?></b></td>
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
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="delete" value="<?php echo $key; ?>">
                                            <input type="hidden" name="key" value="<?php echo $item; ?>">
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng không ?'); "
                                                    name="btn-remove"><i
                                                        class="fa fa-trash"></i></button>
                                        </form>
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
            </div>
            <div class="col-md-4 col-md-offset-8">
                <div class="cart-title">Tổng tiền cần thanh toán</div>
                <table class="table table-bordered">
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <?php
                            $count = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $value):
                                    foreach ($value as $key => $items):
                                        ?>
                                        <?php
                                        $count += (int)$items['count'];
                                        ?>
                                    <?php endforeach;
                                endforeach;
                                echo $count;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng tiền</td>
                        <td>
                            <?php
                            $price = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $value):
                                    foreach ($value as $key => $items):
                                        $args = explode(' ', $items['price']);
                                        $price += (int)$args[0];
                                    endforeach;
                                endforeach;
                                echo '<b style="color:#ff3333;">' . number_format($price) . ' VNĐ' . '</b>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <div class="btn-checkout">
                    <a href="<?php echo curPageURL(); ?>cart/checkout.php">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("../template/footer.php"); ?>
