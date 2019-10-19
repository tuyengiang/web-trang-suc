<?php include "layouts/header.php"; ?>
<?php include "layouts/menu-admin.php"; ?>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bảng tin</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6">
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
<?php include "layouts/footer.php"; ?>