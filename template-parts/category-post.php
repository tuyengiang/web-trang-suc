<div class="row">
    <?php
    $page = empty($_GET["page"]) ? 1 : ($_GET["page"]);
    $totalpost = get_page_admin_product();
    $startform = ($page - 1) * $post_page;
    $totalpage = round($totalpost / $post_page);
    $post = "SELECT * FROM posts WHERE category_id='{$id}' ORDER BY id_post DESC LIMIT $startform,$post_page";
    $query = mysqli_query($conn, $post);
    $i = 1;
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
        ?>
        <div class="col-md-4">
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