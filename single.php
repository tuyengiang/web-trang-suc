<?php
require_once('inc/ketnoi.php');
$id = $_GET["id"];
$taxonomy = $_GET['taxonomy'];
if ($taxonomy == "product_cat") {
    $sql = "SELECT * FROM products WHERE id_product='{$id}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $title = $row["title"];
} else if ($taxonomy == "category") {
    $sql = "SELECT * FROM posts WHERE id_post='{$id}'";
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

<?php
if ($taxonomy == "product_cat") {
    include('template-parts/content-product.php');
} else if ($taxonomy == "category") {
    include('template-parts/content-post.php');
}
?>

<?php require_once('template/footer.php'); ?>
