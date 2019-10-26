<div class="row">
    <?php
    $page = empty($_GET["page"]) ? 1 : ($_GET["page"]);
    $totalpost = get_page_admin_product();
    $startform = ($page - 1) * $post_page;
    $totalpage = round($totalpost / $post_page);
    $sql = "SELECT * FROM products WHERE category_id='{$id}' ORDER BY id_product DESC  LIMIT $startform,$post_page";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
        ?>
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
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
<div class="row">
    <div class="col-md-12">
        <div class="next">
            <ul>
                <?php
                for ($i = 0; $i < $totalpage; $i++):
                    ?>

                    <li><a class="<?php echo ($i + 1) == $page ? "active" : ""; ?>"
                           href='category.php?page=<?php echo($i + 1); ?><?php echo "&id=" . $id . "&taxonomy=product_cat"; ?>'><?php echo($i + 1) ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div><!--next-->
    </div>
</div>
