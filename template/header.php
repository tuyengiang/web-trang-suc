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
    <link rel="stylesheet" type="text/css" href="<?php echo curPageURL(); ?>assets/css/awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo curPageURL(); ?>assets/css/jquery.bxslider.css"/>
    <script src="<?php echo curPageURL(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo curPageURL(); ?>assets/js/main.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</head>
<body>
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
                        <li><a href="dang-nhap.php">Đăng nhập</a></li>
                        <li><a href="dang-ky.php">Đăng ký</a></li>
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