<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    $title = isset($_POST['title']) ? $_POST['title'] : NULL;
    $price = isset($_POST['price']) ? $_POST['price'] : NULL;
    $images = isset($_POST['images']) ? $_POST['images'] : NULL;
    $count = isset($_POST['count']) ? $_POST['count'] : NULL;
    $active = '0';
    $array = array(
        'id' => $id,
        'title' => $title,
        'price' => $price,
        'images' => $images,
        'count' => $count,
        'active' => $active
    );

    $args[] = $array;
    $rs = empty($_SESSION['cart']) ? [] : $_SESSION['cart'];
    foreach ($args as $i) {
        $id = $i['id'];
        if (!isset($rs[$id])) {
            $rs[$id] = [];
        }
        $rs[$id][] = $i;
    }
    $_SESSION['cart'] = $rs;
    $message = "Thêm sản phẩm vào giỏ hàng thành công !!!";
}
?>
<section id="product-content">
    <div class="container">
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
            <div class="col-md-6">
                <div class="product-gallery">
                    <?php
                    $sql = "SELECT * FROM images_gallery WHERE id_product='{$id}'";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        ?>
                        <div id="sync1" class="owl-carousel owl-theme">
                            <?php while ($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
                                <div class="item">
                                    <img src="<?php echo curPageURL(); ?>assets/images/anhsanpham/<?php echo $row1['name']; ?>"
                                         alt="">
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme">
                            <?php while ($row2 = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
                                <div class="item">
                                    <img src="<?php echo curPageURL(); ?>assets/images/anhsanpham/<?php echo $row2['name']; ?>"
                                         alt="">
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php } else { ?>
                        <div class="avatar-product-single">
                            <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['images']; ?>"
                                 alt="">
                        </div>
                    <?php } ?>
                </div>
            </div><!--album-hinh-anh-->
            <div class="col-md-6">
                <div class="header-title">
                    <h2><?php echo $row['title']; ?></h2>
                    <div class="product-rate" style="text-align: left;">
                        <p style="margin-bottom:0px!important;">
                            <span class="icon-star-empty"></span>
                            <span class="icon-star-empty"></span>
                            <span class="icon-star-empty"></span>
                            <span class="icon-star-empty"></span>
                            <span class="icon-star-empty"></span>
                        </p>
                    </div>
                </div>
                <div class="price-single">
                    <?php
                    $sale = $row['price_sale'];
                    if ($sale == 0) {
                        ?>
                        <span class="price-regular">
                                        <?php echo number_format($row['price']) . " VNĐ"; ?>
                                        </span>
                    <?php } else { ?>
                        <span class="price-sale">
                                        <?php echo number_format($sale) . " VNĐ"; ?>
                                        </span>
                        <span class="price-regular-under">
                                        <?php echo number_format($row['price']) . " VNĐ"; ?>
                                        </span>
                    <?php } ?>
                </div>
                <div class="product-description">
                    <?php echo $row['is_plus']; ?>
                </div>
                <div class="form-add-to-cart">
                    <form method="post">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="hidden" name="title" value="<?php echo $row['title']; ?>">
                            <input type="hidden" name="id" value="<?php echo $row['id_product']; ?>">
                            <input type="hidden" name="price" value="<?php if ($row['price_sale'] == 0) {
                                echo $row['price'];
                            } else {
                                echo $row['price_sale'] . " " . $row['price'];
                            } ?>">
                            <input type="hidden" name="images" value="<?php echo $row['images']; ?>">
                            <input type="number" min="1" name="count" value="1" class="form-control input-number">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success add-to-cart">Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div><!--tong-tin-hinh-annh-->
        </div>
    </div>
</section><!--product-->
<section id="product-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="line"></div>
            </div>
            <div class="col-md-4">
                <div class="title-home">
                    <span><h2>Thông tin sản phẩm</h2></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product--content">
                    <?php echo $row['title']; ?>
                </div>
            </div>
        </div>
    </div>
</section><!--product-content-->

<section id="product-related">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="line"></div>
            </div>
            <div class="col-md-4">
                <div class="title-home">
                    <span><h2>Bạn có thể xem thêm</h2></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM products ORDER BY RAND()  LIMIT 4 ";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                ?>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <div class="box-product">
                        <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_product']; ?>&taxonomy=product_cat">
                            <div class="box-product-avatar">
                                <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['images']; ?>"
                                     alt="">
                                <?php if ($row['is_hot'] == 1): ?>
                                    <div class="product-hot">
                                        Hot
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-sumary">
                                <div class="product-title">
                                    <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_product']; ?>&taxonomy=product_cat"
                                       title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                    <div class="product-rate">
                                        <p style="margin-bottom:0px!important;">
                                            <span class="icon-star-empty"></span>
                                            <span class="icon-star-empty"></span>
                                            <span class="icon-star-empty"></span>
                                            <span class="icon-star-empty"></span>
                                            <span class="icon-star-empty"></span>
                                        </p>
                                    </div>
                                    <div class="product-price">
                                        <?php
                                        $sale = $row['price_sale'];
                                        if ($sale == 0) {
                                            ?>
                                            <span class="price-regular">
                                        <?php echo number_format($row['price']) . " VNĐ"; ?>
                                        </span>
                                        <?php } else { ?>
                                            <span class="price-sale">
                                        <?php echo number_format($sale) . " VNĐ"; ?>
                                        </span>
                                            <span class="price-regular-under">
                                        <?php echo number_format($row['price']) . " VNĐ"; ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-add-to-cart">
                                    <a class="box-cart add_to_cart_button ajax_add_to_cart sessionAddCart"
                                       href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_product']; ?>&taxonomy=product_cat">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>