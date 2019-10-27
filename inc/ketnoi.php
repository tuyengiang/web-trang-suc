<?php
session_start();


//ket noi
$conn = mysqli_connect("localhost", "root", "", "trang-suc");
if ($conn) {
    mysqli_set_charset($conn, "utf8");
} else {
    die("Không thể kết nối csdl") . mysqli_error($conn);
}

//securi login
function check_login()
{
    global $_SESSION;
    $user = curPageURL() . 'dang-nhap.php';
    if (!isset($_SESSION['email'])) {
        header('location:' . $user);
    }
}

// functon validate du lieu
function validate_email($email)
{
    $pattern = "/^\S+@gmail\.com|hotmail\.com|yahoo\.com$/";
    return !preg_match($pattern, $email);
}


function validate_phone($dienthoai)
{
    $pattern = "/^\+84[0-9]+|[0-9]+$/";
    return !preg_match($pattern, $dienthoai);
}

function validate_hoten($hoten)
{
    $pattern = "/(\S)+/";
    return !preg_match($pattern, $hoten);
}

function validate_password($password)
{
    return strlen($password) > 6 ? true : false;
}

function validate_hoten_exits($hoten)
{
    return strpos($hoten, "  "); /// ktra nhap nhieu khoang cach qua
}

function hoten_exists($hoten)
{
    return is_numeric($hoten);
}

function validate_strlen($password)
{
    return strlen($password) > 16 ? true : false;
}

/**phan trang product admin **/

$post_page = 9;
function get_page_admin_product()
{
    global $conn;
    $sql = "SELECT COUNT(id_product) as total FROM products";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_fetch_array($query, MYSQLI_ASSOC);
    return $total["total"];
}

//define urrl
function curPageURL()
{
    $pageURL = "http://" . $_SERVER["SERVER_NAME"] . "/";
    return $pageURL;
}

//menu de quy product category

$sql = "SELECT * FROM categories WHERE taxonomy='product_cat'";

$result = mysqli_query($conn, $sql);

$categories = array();

while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
{
    $cate_child = array();
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id) {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    if ($cate_child) {
        if ($stt == 0) {
            echo "<li><a href='" . curPageURL() . "'>Trang chủ</a></li>";
        } else if ($stt == 1) {

        } else if ($stt == 2) {
            // là cấp 3
        }
        echo ' <ul class="submenu" > ';
        foreach ($cate_child as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            echo '<li ><a href = "category.php?id=' . $item['category_id'] . '&taxonomy=product_cat" > ' . $item['title'] . ' </a > ';
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['category_id'], $char . ' | ---', ++$stt);
            echo ' </li > ';
        }
        echo '</ul > ';
    }
}


//category post
$sql1 = "SELECT * FROM categories WHERE taxonomy='category'";

$result1 = mysqli_query($conn, $sql1);

$categories1 = array();

while ($row1 = mysqli_fetch_assoc($result1)) {
    $categories1[] = $row1;
}
function showCategoriesPost($categories1, $parent_id = 0, $char = '', $stt = 0)
{
    $cate_child = array();
    foreach ($categories1 as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id) {
            $cate_child[] = $item;
            unset($categories1[$key]);
        }
    }

    if ($cate_child) {
        if ($stt == 0) {

        } else if ($stt == 1) {

        } else if ($stt == 2) {
            // là cấp 3
        }
        echo ' <ul class="submenu" > ';
        foreach ($cate_child as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            echo '<li ><a href = "category.php?id=' . $item['category_id'] . '&taxonomy=category" > ' . $item['title'] . ' </a > ';
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories1, $item['category_id'], $char . ' | ---', ++$stt);
            echo ' </li > ';
        }
        echo '</ul > ';
    }
}

?>