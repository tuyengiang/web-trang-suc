<?php require_once("../../inc/ketnoi.php");
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php if (!empty($title)) {
            echo $title;
        } else {
            echo "Trang quản trị";
        } ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/font-awesome/css/font-awesome.css"
          rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/google-code-prettify/bin/prettify.min.css"
          rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/google-code-prettify/bin/prettify.min.css"
          rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/select2/dist/css/select2.min.css"
          rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/switchery/dist/switchery.min.css"
          rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css"
          rel="stylesheet">
    <!--table-->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
          rel="stylesheet">
    <!--main-css-->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo curPageURL(); ?>admin/public/admin/vendors/inputfile/fileinput.css" media="all"
          rel="stylesheet"
          type="text/css"/>
    <!-- Custom styling plus plugins -->
    <link href="<?php echo curPageURL(); ?>admin/public/admin/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
