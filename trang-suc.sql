-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2019 lúc 02:11 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trang-suc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id_attribute` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `title`, `count`, `price`, `id_images`, `user_id`, `is_active`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm 2', 1, '90000 100000', 'e2d54cb51f464675e7e6d9c7640912361571647454.jpg', 5, 1, 'Tuyển Giảng', 'nguyentuyengiangbn@gmail.com', 'Hà Nội, Hà Nội', '2019-10-27 19:15:48', '2019-10-27 19:15:48'),
(2, 'Sản phẩm 2', 1, '90000 100000', 'e2d54cb51f464675e7e6d9c7640912361571647454.jpg', 5, 1, 'wp', 'nguyentuyengiangbn@gmail.com', 'Hà Nội, Hà Nội', '2019-10-27 19:16:23', '2019-10-27 19:16:23'),
(3, 'Sản phẩm 1', 1, '65000', 'Screenshot (48)1572105140.png', 5, 0, 'wp', 'nguyentuyengiangbn@gmail.com', 'Hà Nội, Hà Nội', '2019-10-27 19:16:23', '2019-10-27 19:16:23'),
(4, 'Sản phẩm 2', 1, '90000 100000', 'e2d54cb51f464675e7e6d9c7640912361571647454.jpg', 5, 0, 'Tuyển Giảng', 'nguyentuyengiangbn@gmail.com', 'Hà Nội, Hà Nội', '2019-10-27 19:21:43', '2019-10-27 19:21:43'),
(5, 'Sản phẩm 2', 1, '90000 100000', 'e2d54cb51f464675e7e6d9c7640912361571647454.jpg', 5, 0, 'Tuyển Giảng', 'nguyentuyengiangbn@gmail.com', 'Hà Nội, Hà Nội', '2019-10-27 19:22:15', '2019-10-27 19:22:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `taxonomy` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product_cat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `excerpt`, `slug`, `parent_id`, `taxonomy`) VALUES
(3, 'Trang sức', '', 'trang-suc', 0, 'product_cat'),
(4, 'Nhẫn cưới', '', 'nhan-cuoi', 3, 'product_cat'),
(5, 'Vòng dây bạc', '', 'vong-day-bac', 3, 'product_cat'),
(6, 'Khuyên tai bạc', '', 'khuyen-tai-bac', 3, 'product_cat'),
(8, 'Kim cương', '', 'kim-cuong', 0, 'product_cat'),
(9, 'Tin tức', '', 'tin-tuc', 0, 'category');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_gallery`
--

CREATE TABLE `images_gallery` (
  `images_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_gallery`
--

INSERT INTO `images_gallery` (`images_id`, `name`, `id_product`) VALUES
(1, 'e2d54cb51f464675e7e6d9c7640912361571478875.jpg', 3),
(2, 'e2d54cb51f464675e7e6d9c7640912361571478910.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permision_users`
--

CREATE TABLE `permision_users` (
  `id_status` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permision_users`
--

INSERT INTO `permision_users` (`id_status`, `title`) VALUES
(5, 'Quản trị viên'),
(6, 'Khách hàng'),
(7, 'Biên tập viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `excerpt`, `content`, `images`, `category_id`, `slug`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10', 'One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10', '<p>One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10</p>\r\n', 'Wall381571584487.png', 9, 'one-ui-20-beta-se-som-duoc-samsung-phat-hanh-dua-tren-android-10', 'admin', 1, '2019-10-19 17:34:59', '2019-10-19 17:34:59'),
(3, 'One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10', 'One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Android 10One UI 2.0 beta sẽ sớm được Samsung phát hành dựa trên Andro', '<p>One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10</p>\r\n', 'Screenshot (53)1572108112.png', 9, 'one-ui-20-beta-se-som-duoc-samsung-phat-hanh-dua-tren-android-101', 'admin', 0, '2019-10-26 23:41:52', '2019-10-26 23:41:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_hot` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `is_plus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `title`, `excerpt`, `content`, `images`, `category_id`, `tags`, `post_type`, `is_hot`, `price`, `price_sale`, `is_plus`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Sản phẩm 1', '', '<p>One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10One UI 2.0 beta sẽ sớm được Samsung ph&aacute;t h&agrave;nh dựa tr&ecirc;n Android 10</p>\r\n', 'Screenshot (48)1572105140.png', 5, 'khuyên tai', 'product', 1, 65000, 0, '<p>Đặc điểm:</p>\r\n\r\n<p>Chất liệu</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'san-pham-1', '2019-10-19 16:01:45', '2019-10-19 16:01:45'),
(6, 'Sản phẩm 2', 'Sản phẩm 2Sản phẩm 2Sản phẩm 2Sản phẩm 2', '<p>Sản phẩm 2Sản phẩm 2Sản phẩm 2</p>\r\n', 'e2d54cb51f464675e7e6d9c7640912361571647454.jpg', 3, 'khuyên tai', 'product', 1, 100000, 90000, '0', 'san-pham-2', '2019-10-20 22:28:40', '2019-10-20 22:28:40'),
(7, 'Sản phẩm 3', 'Sản phẩm 2Sản phẩm 2Sản phẩm 2Sản phẩm 2', '<p>Sản phẩm 2&nbsp;Sản phẩm 2&nbsp;Sản phẩm 2&nbsp;Sản phẩm 2</p>\r\n', 'Screenshot (50)1572106849.png', 3, 'khuyên tai', 'product', 0, 65000, 0, '<p>Sản phẩm 2</p>\r\n\r\n<p>Sản phẩm 2</p>\r\n\r\n<p>Sản phẩm 2</p>\r\n\r\n<p>Sản phẩm 2</p>\r\n', 'san-pham-3', '2019-10-26 23:20:49', '2019-10-26 23:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `images`, `id_status`) VALUES
(1, 'Trương Lệ 1', 'lemom2711@gmail.com', 'admin', 'b658ca3fb20ffc865ec378d941994c21', 'Wall881571486009.png', 5),
(3, 'Viet Anh', 'cuongdcdev@gmail.com', 'tuyengiang', 'b658ca3fb20ffc865ec378d941994c21', 'Wall1231571485710.png', 5),
(5, 'Nguyễn Tuyển Giảng', 'nguyentuyengiangbn@gmail.com', 'tuyengiang', 'ceea23519f6f86ad67e9f798bf8002cb', '', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id_attribute`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_gallery`
--
ALTER TABLE `images_gallery`
  ADD PRIMARY KEY (`images_id`);

--
-- Chỉ mục cho bảng `permision_users`
--
ALTER TABLE `permision_users`
  ADD PRIMARY KEY (`id_status`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id_attribute` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images_gallery`
--
ALTER TABLE `images_gallery`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `permision_users`
--
ALTER TABLE `permision_users`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
