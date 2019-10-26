<?php require_once("template/header.php"); ?>
<?php require_once("template/slider.php"); ?>
    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
                <div class="col-md-4">
                    <div class="title-home">
                        <span><h2>Sản phẩm bán chạy</h2></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM products  ORDER BY id_product DESC LIMIT 8";
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
    </section><!--sp-moi-->

    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
                <div class="col-md-4">
                    <div class="title-home">
                        <span><h2>Sản phẩm bán chạy</h2></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM products WHERE is_hot=1 ORDER BY id_product DESC LIMIT 4";
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
    </section><!--sn-pham-ban-chay-->

    <section id="product-hot">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
                <div class="col-md-4">
                    <div class="title-home">
                        <span><h2>Tin tức nổi bật</h2></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <?php
                $post = "SELECT * FROM posts ORDER BY id_post DESC LIMIT 4";
                $query = mysqli_query($conn, $post);
                $i = 1;
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                    ?>
                    <div class="col-md-3">
                        <div class="post-summary">
                            <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_post']; ?>&taxonomy=category">
                                <div class="posts-summary-avatar">
                                    <img src="<?php echo curPageURL(); ?>assets/images/posts/<?php echo $row['images']; ?>"
                                         alt="">
                                </div>
                                <div class="posts-summary-content">
                                    <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_post']; ?>&taxonomy=category">
                                        <h3><?php echo $row['title']; ?></h3></a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $i++;endwhile; ?>
            </div>
        </div>
    </section><!--tin-tuc-->

<?php require_once('template/footer.php'); ?>