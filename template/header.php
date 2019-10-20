<?php require_once('inc/ketnoi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php if (isset($title)) {
            echo $title . " |  Website bán trang sức uy tín";
        } else {
            echo "Trang Chủ | website bán trang sức uy tín";
        } ?>
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo curPageURL(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo curPageURL(); ?>assets/css/style.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo curPageURL(); ?>assetscss/animate.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo curPageURL(); ?>assets/css/awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo curPageURL(); ?>assets/css/jquery.bxslider.css"/>
    <link rel="stylesheet" href="<?php echo curPageURL(); ?>assets/owl/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo curPageURL(); ?>assets/owl/dist/assets/owl.carousel.css">
    <script src="<?php echo curPageURL(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/owl/dist/owl.carousel.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/main.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</head>
<body>
<?php if (isset($_SESSION['email'])): ?>
    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-bar-left">
                        <ul>
                            <li><a href="<?php echo curPageURL(); ?>admin/"><i class="fa fa-tachometer"></i> Trang quản
                                    trị</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/posts/_form.php?action=create"><i
                                            class="fa fa fa-clipboard"></i> Thêm bài viết</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/product/_form.php?action=create"><i
                                            class="fa fa-product-hunt"></i> Thêm sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <div class="logo-header">
                    <a href="/"><img src="<?php echo curPageURL(); ?>assets/images/logo/logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="header-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="clear:left;"></div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                        <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                        <li><a href="#">Sản phẩm <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                $sql = "SELECT * FROM danhmuc";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                                    ?>
                                    <li>
                                        <a href="list-category.php?id=<?php echo $row['madanhmuc']; ?>"><?php echo $row['tendanhmuc']; ?></a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </li>
                        <li><a href="#">Mua xe <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="#">Bảng gía xe</a></li>
                                <li><a href="#">Mua xe trả góp</a></li>
                                <li><a href="#">Đăng ký lái thử</a></li>

                            </ul>
                        </li>
                        <li><a href="#">Khuyến mại</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="lien-he.php">Liên hệ</a></li>
                        <?php if (!isset($_SESSION['email'])): ?>
                            <li><a href="dang-nhap.php">Đăng nhập</a></li>
                            <li><a href="dang-ky.php">Đăng ký</a></li>
                        <?php endif; ?>
                        <li style="float:right;" id="click-search">
                            <form>
                                <input type="text" placeholder="Tìm kiếm..." class="input-s">
                                <i class="fa fa-search"></i>
                </div>
                </form>
                </li>
                </ul>
            </div><!--menu-center-->
        </div>
    </div>
    </div>
</section>
<main id="main">