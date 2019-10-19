<?php $title = "Danh sách bài viết";
include "../layouts/header-admin.php";
include "../layouts/menu-admin.php";
if ($_SERVER['REQUEST_METHOD'] =="GET" && isset($_GET['delete'])):
    $delete = $_GET['delete'];
    $sql = "DELETE FROM posts WHERE id_post='{$delete}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Xóa bài viết thành công !!!');</script>";
    } else {
        echo "<script>alert('Xóa bài viết thất bại !!!'); </script>";
    }
endif;
?>
<style>
    .avatar-product img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-product {
        width: 80px;
        height: 80px;
    }
</style>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách bài viết</h2>
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
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <a class="btn btn-primary"
                       href="<?php echo curPageURL(); ?>admin/posts/_form.php?action=create"><i
                            class="fa fa-plus"></i> Thêm bài viết mới</a>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-xs-12">
                    <table class="table table-striped" style="margin-top:10px;">
                        <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên bài viết</th>
                            <th>Slug</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Author</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM posts";
                        $query = mysqli_query($conn, $sql);
                        if ($query) {
                            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td>
                                        <div class="avatar-product">
                                            <img src="<?php echo curPageURL(); ?>assets/images/posts/<?php echo $row['images']; ?>"
                                                 alt="">
                                        </div>
                                    </td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['slug'];?></td>
                                    <td>
                                        <?php
                                        $id_cate = $row['category_id'];
                                        $category = "SELECT category_id,title FROM categories WHERE category_id='{$id_cate}'";
                                        $_query = mysqli_query($conn, $category);
                                        $row1 = mysqli_fetch_array($_query, MYSQLI_ASSOC);
                                        echo $row1['title']
                                        ?>
                                    </td>
                                    <td style="color:#337ab7;padding-left:20px;">
                                        <?php
                                        if ($row['is_active'] == 1) {
                                            echo "<i class='fa fa-star'></i>";
                                        } else {
                                            echo "<i class='fa fa-star-o'></i>";
                                        }
                                        ?>
                                    </td>
                                    <td>Giảng</td>
                                    <td>
                                        <a style="float: left;"
                                           href="<?php echo curPageURL(); ?>admin/posts/_form.php?action=edit&id=<?php echo $row['id_post']; ?>"
                                           class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <form method="GET" style="float:left">
                                            <input type="hidden" value="<?php echo $row['id_post']; ?>"
                                                   name="delete">
                                            <button type="submit" name="delete-btn" class="btn btn-danger"
                                                    onclick="return confirm('Bạn muốn xóa bài viết này không ?'); "><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile;
                        } else { ?>
                            <tr>
                                Không có dữ liệu
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/footer.php"; ?>
