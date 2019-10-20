<?php
if (isset($_SESSION['email'])) {
    $username = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$username'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $id_u = $rows['user_id'];
    $id_user = $rows['username'];
    $images_u = $rows['images'];
    $email_u = $rows['email'];
    $name_u = $rows['name'];
    $id_status_u = $rows['id_status'];
}
?>
<style>
    img.img-circle.profile_img {
        height: 55px;
        object-fit: cover;
    }

    .author-avatar img {
        object-fit: cover;
    }

    .user-profile img {
        object-fit: cover;
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo curPageURL(); ?>" class="site_title"><span>Admin</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo curPageURL(); ?>assets/images/images-user/<?php echo $images_u; ?>" alt="..."
                     class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Xin chào,</span>
                <?php echo '<h2>' . $rows['name'] . '</h2>'; ?>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="<?php echo curPageURL(); ?>admin/index.php"><i class="fa fa-tachometer"></i> Bảng tin
                        </a></li>

                    <li><a><i class="fa fa-thumb-tack"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo curPageURL(); ?>admin/posts/">Tất cả bài viết</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/posts/_form.php?action=create">Thêm bài viết
                                    mới</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/category/?taxonomy=category">Chuyên mục bài
                                    viết</a></li>
                        </ul>
                    </li><!--bai-viet-->

                    <li><a><i class="fa fa-product-hunt"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo curPageURL(); ?>admin/product/">Tất cả sản phẩm</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/product/_form.php?action=create">Thêm sản phẩm
                                    mới</a></li>
                            <li><a href="<?php echo curPageURL(); ?>admin/category/?taxonomy=product_cat">Chuyên mục sản
                                    phẩm</a></li>
                        </ul>
                    </li><!--product-->

                    <li><a><i class="fa fa-shopping-cart"></i> Đơn hàng<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/">Tất cả đơn hàng</a></li>
                            <li><a href="/">Đơn đã bán</a></li>
                            <li><a href="/">Đơn chờ xử lý</a></li>
                        </ul>
                    </li><!--product-->

                    <li><a href="/"><i class="fa fa-envelope"></i> Liên hệ </a></li><!--lien-he-->

                    <li><a><i class="fa fa-user-circle-o" aria-hidden="true"></i> Thành viên <span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo curPageURL() . 'admin/user/'; ?>">Tất cả thành viên</a></li>
                            <li><a href="<?php echo curPageURL() . 'admin/user/_form.php?action=create'; ?>">Thêm thành
                                    viên mới</a></li>
                            <li><a href="<?php echo curPageURL() . 'admin/user-permition/'; ?>">Menu
                                    phân quyền</a>
                            </li>
                            <li><a href="<?php echo curPageURL() . 'admin/user/profile.php'; ?>">Thông tin về bạn</a>
                            </li>
                        </ul>
                    </li><!--thanh-vien-->
                    <li><a href="/"><i class="fa fa-history"></i> Lịch sử</a></li>
                    <li><a href="/"><i class="fa fa-cog"></i> Cài đặt</a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="<?php echo curPageURL(); ?>assets/images/images-user/<?php echo $images_u; ?>"
                             alt=""><?php echo $rows['name']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="<?php echo curPageURL(); ?>admin/logout.php"><i
                                        class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">