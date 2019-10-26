<?php
require_once('inc/ketnoi.php');
$key = $_GET["s"];
$title = "Tìm kiếm với từ khóa " . $key;

?>
<?php require_once("template/header.php"); ?>
<section id="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="br">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="">Tìm kiếm từ khóa : <b style="color:rgba(253, 29, 29, 1)"><?php echo $key; ?></b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--breadcrumb-->
<div class="category-product">
    <div class="container">
        <div class="col-md-3">
            <?php include "sidebar/sidebar-product.php"; ?>
        </div><!--sidevbar-->
        <div class="col-md-9">
            <div class="row">
                <?php
                $sql = "SELECT * FROM products WHERE title LIKE 'N%$key%'";
                $query = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($query);
                if ($num > 0 && !empty($search)) {
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
                    <?php endwhile;
                } else {
                    echo "Không có sản phẩm nào được tìm thấy !!!";
                } ?>
            </div>
        </div><!--list-category-->
    </div>
</div>
<?php require_once('template/footer.php'); ?>
