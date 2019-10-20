<?php require_once("template/header.php"); ?>
<?php require_once("template/slider.php"); ?>
    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-home">
                        <span><h2>Sản phẩm bán chạy</h2></span>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM products WHERE is_hot=1 LIMIT 4";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                    ?>
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                        <div class="box-product">
                            <a href="<?php echo curPageURL(); ?>/single.php?id=<?php echo $row['id_product']; ?>&slug=<?php echo $row['slug']; ?>">
                                <div class="product-avatar">
                                    <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['images']; ?>"
                                         alt="">
                                    <div class="product-hot">
                                        Hot
                                    </div>
                                </div>
                                <div class="product-sumary">
                                    <h2><?php echo $row['title']; ?></h2>
                                </div>
                                <div class="price">
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
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-home">
                        <span><h2>Sản phẩm mới</h2></span>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM products  LIMIT 8";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                    ?>
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                        <div class="box-product">
                            <a href="<?php echo curPageURL(); ?>/single.php?id=<?php echo $row['id_product']; ?>&slug=<?php echo $row['slug']; ?>">
                                <div class="product-avatar">
                                    <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['images']; ?>"
                                         alt="">
                                    <?php if ($row['is_hot'] == 1): ?>
                                        <div class="product-hot">
                                            Hot
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-sumary">
                                    <h2><?php echo $row['title']; ?></h2>
                                </div>
                                <div class="price">
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
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-home">
                        <span><h2>Tin tức nổi bật</h2></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once('template/footer.php'); ?>