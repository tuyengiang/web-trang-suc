<section id="single-post">
    <div class="container">
        <div class="col-md-9">
            <div class="header-single-post">
                <h3><?php echo $row['title']; ?></h3>
            </div>
            <div class="post-content--show">
                <?php echo $row['content']; ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php include("sidebar/sidebar-product.php"); ?>
        </div>
    </div>
</section>