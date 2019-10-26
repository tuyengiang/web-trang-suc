<?php require_once('inc/ketnoi.php');
$id = $_GET["id"];
$taxonomy = $_GET['taxonomy'];
if ($taxonomy == "product_cat") {
    $sql = "SELECT * FROM categories WHERE category_id='{$id}' AND taxonomy='product_cat'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $title = $row["title"];
} else if ($taxonomy == "category") {
    $sql = "SELECT * FROM categories WHERE category_id='{$id}' AND taxonomy='category'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $title = $row["title"];
}
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
                        <li><a href=""><?php echo $row["title"]; ?></a></li>
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
            <?php
            if ($taxonomy == "product_cat") {
                include('template-parts/category-product.php');
            } else if ($taxonomy == "category") {
                include('template-parts/category-post.php');
            }
            ?>
        </div><!--list-category-->
    </div>
</div>
<?php require_once('template/footer.php'); ?>
