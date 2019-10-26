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
    <script src="<?php echo curPageURL(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/owl/dist/owl.carousel.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/main.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo-header">
                    <a href="/"><img src="<?php echo curPageURL(); ?>assets/images/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="header-menu">
                    <?php showCategories($categories); ?>
                    <?php showCategoriesPost($categories1); ?>
                </div>
            </div><!--menu-->
            <div class="col-md-2">
                <div class="header-account">
                    <div class="login"><i class="fa fa-user"></i></div>
                    <div class="login-list">
                        <ul>
                            <?php if (isset($_SESSION['email'])) { ?>
                                <li><a href="<?php echo curPageURL(); ?>admin/"><i class="fa fa-tachometer"></i>
                                        Dashbroad</a></li>
                                <li><a href="<?php echo curPageURL(); ?>admin/user/profile.php"><i
                                                class="fa fa-user"></i> Thông tin của bạn</a></li>
                                <li><a href="<?php echo curPageURL(); ?>admin/product/_form.php?action=create"><i
                                                class="fa fa-plus"></i> Thêm sản phẩm</a></li>
                                <li><a href="<?php echo curPageURL(); ?>admin/posts/_form.php?action=create"><i
                                                class="fa fa-plus"></i> Thêm bài viết</a></li>
                                <li><a href="<?php echo curPageURL(); ?>admin/logout.php"><i
                                                class="fa fa-sign-out"></i> Đăng xuất</a></li>
                            <?php } else { ?>
                                <li><a href="dang-nhap.php"><i class="fa fa-sign-in "></i> Đăng nhập</a></li>
                                <li><a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="header-cart">
                    <a href="cart.php"><i class="fa fa-shopping-cart"></i> (0)</a>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="header-main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="menu-summary">
                    <ul>
                        <li><a href="tel:0358452011">HOTLINE: 0358.452.011</a></li>
                        <li><a href="">Các hình thức thanh toán</a></li>
                        <li><a href="">GIỎ HÀNG (っ ＾▿＾)💨</a></li>
                        <li><a href="">Yêu thích</a></li>
                        <li><a href="">Facebook</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-s">
                    <form method="GET" action="<?php echo curPageURL(); ?>search.php">
                        <input type="search" class="input-s" name="s" placeholder="Bạn tìm kiếm gì nào"
                               value="<?php if (isset($_GET['s'])): echo $_GET['s']; endif; ?>">
                        <i class="fa fa-search" id="search-icon"></i>
                    </form>
                </div>
            </div><!--header-->
        </div>
    </div>
</section>
<main id="main">