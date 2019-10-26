<div class="widget-title">
    <span>Sản phẩm mới</span>
</div>
<div class="widget-post">
    <?php
    $sql = "SELECT * FROM products  LIMIT 8";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
        ?>
        <div class="widget-post-content">
            <div class="widget-post-avatar">
                <img src="<?php echo curPageURL(); ?>assets/images/sanpham/<?php echo $row['images']; ?>"
                     alt="">
            </div>
            <div class="widget-post-summary">
                <a href="<?php echo curPageURL(); ?>single.php?id=<?php echo $row['id_product']; ?>&taxonomy=product_cat"><?php echo $row['title']; ?></a>
                <div class="product-price-widget">
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
        </div>
    <?php endwhile; ?>
</div>