-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2022 at 01:36 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ismart1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `cartId` int NOT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`cartId`, `userId`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(31, 3),
(32, 8),
(27, 14),
(28, 14),
(29, 14),
(30, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `itemId` int NOT NULL,
  `productId` int NOT NULL,
  `cartId` int NOT NULL,
  `qtyOrdered` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cart_items`
--

INSERT INTO `tbl_cart_items` (`itemId`, `productId`, `cartId`, `qtyOrdered`, `createdAt`, `updatedAt`) VALUES
(1, 18, 3, 4, '2022-05-04 04:05:05', '2022-05-04 04:05:05'),
(2, 1, 3, 1, '2022-05-04 04:30:15', '2022-05-04 04:30:15'),
(3, 17, 3, 1, '2022-05-04 04:30:37', '2022-05-04 04:30:37'),
(4, 17, 4, 1, '2022-05-04 05:10:16', '2022-05-04 05:10:16'),
(5, 17, 4, 1, '2022-05-04 05:16:31', '2022-05-04 05:16:31'),
(6, 16, 5, 1, '2022-05-04 05:16:56', '2022-05-04 05:16:56'),
(7, 16, 6, 1, '2022-05-04 05:17:06', '2022-05-04 05:17:06'),
(8, 16, 7, 4, '2022-05-04 05:24:10', '2022-05-04 05:24:10'),
(9, 17, 7, 4, '2022-05-04 05:27:59', '2022-05-04 05:27:59'),
(10, 18, 8, 3, '2022-05-04 07:27:54', '2022-05-04 07:27:54'),
(11, 12, 8, 3, '2022-05-04 07:28:45', '2022-05-04 07:28:45'),
(12, 1, 9, 4, '2022-05-04 07:31:17', '2022-05-04 07:31:17'),
(13, 14, 9, 4, '2022-05-04 07:31:24', '2022-05-04 07:31:24'),
(15, 2, 9, 1, '2022-05-04 08:03:34', '2022-05-04 08:03:34'),
(16, 14, 10, 2, '2022-05-04 08:03:57', '2022-05-04 08:03:57'),
(17, 18, 10, 1, '2022-05-04 08:27:36', '2022-05-04 08:27:36'),
(18, 18, 11, 5, '2022-05-04 10:00:30', '2022-05-04 10:00:30'),
(19, 1, 11, 1, '2022-05-04 10:26:50', '2022-05-04 10:26:50'),
(20, 13, 11, 3, '2022-05-04 10:55:08', '2022-05-04 10:55:08'),
(21, 16, 12, 3, '2022-05-04 12:15:00', '2022-05-04 12:15:00'),
(22, 1, 13, 6, '2022-05-04 16:07:36', '2022-05-04 16:07:36'),
(23, 17, 14, 3, '2022-05-04 16:41:23', '2022-05-04 16:41:23'),
(24, 1, 14, 2, '2022-05-04 17:21:12', '2022-05-04 17:21:12'),
(25, 9, 15, 1, '2022-05-04 19:45:51', '2022-05-04 19:45:51'),
(26, 18, 15, 1, '2022-05-04 19:57:11', '2022-05-04 19:57:11'),
(27, 13, 16, 1, '2022-05-04 20:07:44', '2022-05-04 20:07:44'),
(28, 17, 17, 4, '2022-05-04 20:12:14', '2022-05-04 20:12:14'),
(29, 18, 17, 1, '2022-05-04 20:12:27', '2022-05-04 20:12:27'),
(30, 18, 18, 2, '2022-05-04 20:19:24', '2022-05-04 20:19:24'),
(31, 11, 19, 4, '2022-05-06 13:22:32', '2022-05-06 13:22:32'),
(32, 1, 20, 3, '2022-05-06 22:15:57', '2022-05-06 22:15:57'),
(33, 17, 21, 1, '2022-05-06 22:16:30', '2022-05-06 22:16:30'),
(34, 1, 22, 1, '2022-05-07 01:13:25', '2022-05-07 01:13:25'),
(35, 1, 23, 1, '2022-05-09 04:09:54', '2022-05-09 04:09:54'),
(36, 18, 23, 2, '2022-05-09 04:10:38', '2022-05-09 04:10:38'),
(37, 13, 24, 1, '2022-05-09 06:47:03', '2022-05-09 06:47:03'),
(38, 18, 25, 1, '2022-05-09 12:01:27', '2022-05-09 12:01:27'),
(39, 1, 25, 1, '2022-05-09 12:30:33', '2022-05-09 12:30:33'),
(40, 18, 26, 1, '2022-05-09 17:40:35', '2022-05-09 17:40:35'),
(41, 22, 27, 1, '2022-05-10 09:45:01', '2022-05-10 09:45:01'),
(42, 22, 28, 1, '2022-05-10 09:47:36', '2022-05-10 09:47:36'),
(43, 1, 28, 1, '2022-05-10 09:48:21', '2022-05-10 09:48:21'),
(44, 22, 29, 1, '2022-05-10 10:02:42', '2022-05-10 10:02:42'),
(45, 23, 29, 1, '2022-05-10 10:02:50', '2022-05-10 10:02:50'),
(46, 22, 30, 1, '2022-05-10 10:45:10', '2022-05-10 10:45:10'),
(47, 23, 30, 1, '2022-05-10 10:45:25', '2022-05-10 10:45:25'),
(48, 22, 31, 1, '2022-05-11 12:01:29', '2022-05-11 12:01:29'),
(49, 1, 32, 1, '2022-05-11 17:39:57', '2022-05-11 17:39:57'),
(50, 24, 32, 1, '2022-05-11 17:40:12', '2022-05-11 17:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `catId` int NOT NULL,
  `catTitle` varchar(100) NOT NULL,
  `parentId` int NOT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updatedBy` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`catId`, `catTitle`, `parentId`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'Điện thoại', 0, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:47'),
(2, 'Máy tính bảng', 0, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:52'),
(3, 'Laptop', 0, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:55'),
(5, 'Tablet', 0, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:59'),
(6, 'Phụ kiện thiết yếu', 0, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-16 16:03:32'),
(7, 'Iphone', 1, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:08'),
(8, 'Samsung', 1, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:15'),
(9, 'Oppo', 1, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:20'),
(10, 'Redmi', 1, 'huyendau', 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:26'),
(12, 'Realmi', 1, 'huyendau', 'huyendau', '2022-04-03 03:13:56', '2022-04-06 16:43:39'),
(13, 'Tai nghe', 6, NULL, 'huyendau', '2022-04-03 05:37:10', '2022-04-16 16:03:45'),
(15, 'Macbook', 0, 'huyendau', 'huyendau', '2022-04-03 10:11:51', '2022-04-03 10:12:01'),
(16, 'Sony', 1, NULL, 'huyendau', '2022-04-03 10:49:01', '2022-04-06 16:44:45'),
(17, 'Huawei', 1, 'huyendau', 'huyendau', '2022-04-03 10:50:55', '2022-04-06 16:44:55'),
(18, 'Chuột máy tính', 6, 'huyendau', NULL, '2022-04-16 16:03:59', '2022-04-16 16:03:59'),
(19, 'Lenovo', 3, NULL, NULL, '2022-05-10 03:22:35', '2022-05-10 03:22:35'),
(20, 'Asus', 3, NULL, NULL, '2022-05-10 03:22:43', '2022-05-10 03:22:43'),
(21, 'Acer', 3, NULL, NULL, '2022-05-10 03:23:04', '2022-05-10 03:23:04'),
(22, 'Dell', 3, NULL, NULL, '2022-05-10 03:23:16', '2022-05-10 03:23:16'),
(23, 'MSI', 3, NULL, NULL, '2022-05-10 03:23:25', '2022-05-10 03:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `colorId` int NOT NULL,
  `colorCode` varchar(50) NOT NULL,
  `colorName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`colorId`, `colorCode`, `colorName`) VALUES
(1, 'vang', 'Vàng'),
(2, 'hong-nhat', 'Hồng nhạt'),
(3, 'do', 'Đỏ'),
(4, 'xanh-duong', 'Xanh dương'),
(5, 'xanh-da-troi', 'Xanh da trời'),
(6, 'den', 'Đen'),
(8, 'trang', 'Trắng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `orderId` int NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  `customerPhone` varchar(15) NOT NULL,
  `note` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `orderCreatedAt` timestamp NULL DEFAULT NULL,
  `orderUpdatedAt` timestamp NOT NULL,
  `status` varchar(20) NOT NULL,
  `cartId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`orderId`, `customerName`, `customerEmail`, `customerAddress`, `customerPhone`, `note`, `orderCreatedAt`, `orderUpdatedAt`, `status`, `cartId`) VALUES
(3, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-05-04 20:07:01', '2022-05-04 20:07:01', 'Giao thành công', 15),
(4, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-05-04 20:07:47', '2022-05-04 20:07:47', 'Giao thành công', 16),
(5, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-05-04 20:19:34', '2022-05-04 20:19:34', 'Giao thành công', 18),
(6, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-05-04 20:21:34', '2022-05-04 20:21:34', 'Đang xử lý', 17),
(7, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', 'hhhh', '2022-05-06 13:23:20', '2022-05-06 13:23:20', 'Đặt hàng thành công', 19),
(8, 'Đậu Thị Huyền', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-05-09 06:53:52', '2022-05-09 06:53:52', 'Đặt hàng thành công', 24),
(9, 'Đậu Thị Huyền', 'dh.magento2@gmail.com', 'Diễn Tân - Diễn Châu - Nghệ An', '0123456789', NULL, '2022-05-10 10:48:20', '2022-05-10 10:48:20', 'Đang xử lý', 30),
(10, 'Nguyễn  Thị Hương', 'huyendau0712+2@gmail.com', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', '0385930875', NULL, '2022-04-30 20:07:47', '2022-04-30 20:07:47', 'Giao thành công', 4),
(11, 'Cao Nga', 'huyendau0712+4@gmail.com', 'Nghệ An', '0385930875', 'Không', '2022-05-11 17:40:27', '2022-05-11 17:40:27', 'Đặt hàng thành công', 32),
(12, 'Cao Nga', 'huyendau0712+4@gmail.com', 'Nghệ An', '0385930875', 'Không', '2022-05-01 17:40:27', '2022-05-11 17:40:27', 'Giao thành công', 32),
(13, 'Cao Nga', 'huyendau0712+4@gmail.com', 'Nghệ An', '0385930875', 'Không', '2022-05-11 17:40:27', '2022-05-11 17:40:27', 'Đặt hàng thành công', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pageId` int NOT NULL,
  `pageTitle` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pageDesc` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pageDetail` longtext NOT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `updatedBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pageId`, `pageTitle`, `pageDesc`, `pageDetail`, `createdBy`, `createdAt`, `updatedAt`, `updatedBy`) VALUES
(1, 'TỔNG QUAN VỀ THẾ GIỚI DI ĐỘNG (NEW)', 'Thegioididong.com là thương hiệu thuộc Công ty Cổ phần Thế giới di động, Tên tiếng Anh là Mobile World JSC, (mã Chứng Khoán: MWG) là một tập đoàn bán lẻ tại Việt Nam với lĩnh vực kinh doanh chính là bán lẻ điện thoại di động, thiết bị số và điện tử tiêu dùng.', '<p>Khi th&agrave;nh lập v&agrave;o th&aacute;ng 3 năm 2004, Thế giới di động lựa chọn m&ocirc; h&igrave;nh&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%C6%B0%C6%A1ng_m%E1%BA%A1i_%C4%91i%E1%BB%87n_t%E1%BB%AD\" title=\"Thương mại điện tử\">thương mại điện tử</a>&nbsp;sơ khai với một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Website\" title=\"Website\">website</a>&nbsp;giới thiệu th&ocirc;ng tin sản phẩm<span style=\"font-size: 10.8333px;\"> </span>v&agrave; 3 cửa h&agrave;ng nhỏ tr&ecirc;n đường&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ho%C3%A0ng_V%C4%83n_Th%E1%BB%A5\" title=\"Hoàng Văn Thụ\">Ho&agrave;ng Văn Thụ</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%C3%A0nh_ph%E1%BB%91_H%E1%BB%93_Ch%C3%AD_Minh\" title=\"Thành phố Hồ Chí Minh\">Th&agrave;nh phố Hồ Ch&iacute; Minh</a>&nbsp;để giao dịch.<span style=\"font-size: 10.8333px;\"> </span>Th&aacute;ng 10 năm 2004, c&ocirc;ng ty chuyển đổi m&ocirc; h&igrave;nh kinh doanh, đầu tư v&agrave;o một cửa h&agrave;ng b&aacute;n lẻ lớn tr&ecirc;n đường Nguyễn Đ&igrave;nh Chiểu v&agrave; bắt đầu c&oacute; l&atilde;i. Tới th&aacute;ng 3 năm 2006, Thế giới di động c&oacute; tổng cộng 4 cửa h&agrave;ng tại Th&agrave;nh phố Hồ Ch&iacute; Minh.</p>\r\n\r\n<p>Năm 2007, c&ocirc;ng ty th&agrave;nh c&ocirc;ng trong việc k&ecirc;u gọi vốn đầu tư của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Mekong_Capital\" title=\"Mekong Capital\">Mekong Capital</a>&nbsp;v&agrave; ph&aacute;t triển nhanh ch&oacute;ng về quy m&ocirc;, đạt 40 cửa h&agrave;ng v&agrave;o năm 2009.</p>\r\n\r\n<p>Cuối năm 2010, Thế giới di động mở rộng lĩnh vực kinh doanh sang ng&agrave;nh h&agrave;ng điện tử ti&ecirc;u d&ugrave;ng với thương hiệu Dienmay.com (nay đổi th&agrave;nh Dienmayxanh.com).</p>\r\n\r\n<p>Tới cuối năm 2012, Thế giới di động c&oacute; tổng cộng 220 cửa h&agrave;ng tại Việt Nam.</p>\r\n\r\n<p>Th&aacute;ng 5/2013, Thế giới di động nhận đầu tư của Robert A. Willett- cựu&nbsp;<a href=\"https://vi.wikipedia.org/wiki/CEO\" title=\"CEO\">CEO</a>&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=BestBuy&amp;action=edit&amp;redlink=1\" title=\"BestBuy (trang không tồn tại)\">BestBuy</a>&nbsp;International v&agrave; c&ocirc;ng ty CDH Electric Bee Limited.</p>\r\n\r\n<p>Năm 2017, C&ocirc;ng ty cổ phần Thế giới di động tiến h&agrave;nh phi vụ s&aacute;p nhập v&agrave; mua lại hệ thống b&aacute;n lẻ điện m&aacute;y Trần Anh. Th&aacute;ng 10, 2018, phi vụ s&aacute;p nhập ho&agrave;n th&agrave;nh. Tổng cộng 34 si&ecirc;u thị Trần Anh sẽ được gỡ bỏ t&ecirc;n v&agrave; thay bằng biển hiệu Điện m&aacute;y Xanh, website của Trần Anh cũng đ&atilde; chuyển hướng hoạt động về dienmayxanh.com.</p>\r\n\r\n<p><img src=\"public/images/tgdd-gioithieu.jpg\" /></p>\r\n\r\n<p>T&iacute;nh đến thời điểm th&aacute;ng 11 năm 2017, C&ocirc;ng ty Thế giới di động đ&atilde; mở th&ecirc;m 668 si&ecirc;u thị mới, với 117 si&ecirc;u thị thegioididong.com, 351 si&ecirc;u thị Điện M&aacute;y Xanh v&agrave; 200 si&ecirc;u thị B&aacute;ch h&oacute;a Xanh. Kết quả n&agrave;y đưa tổng số si&ecirc;u thị đang hoạt động của c&ocirc;ng ty l&ecirc;n 1.923 si&ecirc;u thị, tăng hơn 50% so với thời điểm đầu năm. Cũng trong 11 th&aacute;ng của năm 2017, doanh thu của hệ thống đạt gần&nbsp;<abbr>59.000 tỷ đồng.</abbr></p>\r\n\r\n<p>Sang đến năm 2018, con số tổng cửa h&agrave;ng đ&atilde; l&ecirc;n đến 2.160 cửa h&agrave;ng, c&oacute; mặt tr&ecirc;n tất cả 63 tỉnh th&agrave;nh.</p>\r\n', 'huyendau', '2022-04-10 03:35:46', '0000-00-00 00:00:00', NULL),
(2, 'THẾ GIỚI DI ĐỘNG XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH', 'Tìm siêu thị Thế Giới Di Động? Xin mời ghé thăm trang Tìm siêu thị để xem bản đồ và địa chỉ các siêu thị trên toàn quốc.', '<p>B&aacute;o ch&iacute;, hợp t&aacute;c: li&ecirc;n hệ&nbsp;<a href=\"mailto:tu.lethi@thegioididong.com\">baochi@thegioididong.com</a></p>\r\n\r\n<p>Tổng đ&agrave;i tư vấn, hỗ trợ kh&aacute;ch h&agrave;ng (7h30 đến 22h):&nbsp;1800.1060&nbsp;hoặc&nbsp;028.3622.1060</p>\r\n\r\n<p>Tổng đ&agrave;i khiếu nại:&nbsp;1800.1062</p>\r\n\r\n<p>Email:&nbsp;<a href=\"mailto:cskh@thegioididong.com\">cskh@thegioididong.com</a></p>\r\n', 'huyendau', '2022-04-10 04:10:17', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `postId` int NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postThumb` varchar(50) NOT NULL,
  `postDesc` varchar(500) NOT NULL,
  `postDetail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updatedBy` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `postCatId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`postId`, `postTitle`, `postThumb`, `postDesc`, `postDetail`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`, `postCatId`) VALUES
(1, 'Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh', 'img-post-01 - Copy (2).jpg', 'Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào miền Trung phát triển...', '<p>Một trong số đ&oacute; l&agrave; nhiều tiểu bang c&oacute; luật &ldquo;mua lại điện&rdquo; đỏi hỏi c&aacute;c c&ocirc;ng ty lưới điện phải mua lại lượng điện dư thừa m&agrave; kh&aacute;ch h&agrave;ng tạo ra bởi năng lượng mặt trời. Cũng c&oacute; những lo ngại rằng người ta c&oacute; thể d&ugrave;ng ng&oacute;i năng lượng mặt trời tự sản xuất điện năng lượng mặt trời độc lập với lưới &ndash; v&agrave; như vậy sẽ giảm số người phụ thuộc v&agrave;o lưới điện v&agrave; chuyển c&aacute;c chi ph&iacute; điện lưới đ&oacute; cho những người kh&ocirc;ng d&ugrave;ng điện năng lượng mặt trời.</p>\r\n\r\n<p>Ph&aacute;t biểu tại buổi ra mắt sản phẩm m&aacute;i ng&oacute;i năng lượng mặt trời v&agrave; hệ thống pin dự trữ mới của Tesla v&agrave; SolarCity v&agrave;o thứ S&aacute;u vừa rồi, Musk, người vừa l&agrave; chủ tịch của cả hai c&ocirc;ng ty vừa l&agrave; CEO của Tesla, n&oacute;i về l&yacute; do tại sao tầm nh&igrave;n của &ocirc;ng ấy về điện năng lượng mặt trời tại Mỹ s&acirc;u xa hơn sẽ c&oacute; nhiều việc cho c&aacute;c c&ocirc;ng lưới điện chứ kh&ocirc;ng phải &iacute;t hơn</p>\r\n', 'huyendau', NULL, '2022-04-10 07:37:11', '2022-04-10 07:37:11', 3),
(2, 'Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu', 'img-detail - Copy (1).jpg', '(Dân trí) - Tính đến hết năm 2021, các thiết bị tích hợp công nghệ Plasmacluster Ion của Sharp đã cán mốc 100 triệu sản phẩm bán ra trên toàn cầu.', '<p>Nhắc đến đồ gia dụng, điện tử, chắc chắn người Việt ai cũng sẽ nhớ đến Sharp với h&agrave;ng loạt d&ograve;ng sản phẩm chất lượng cao đi đ&ocirc;i với gi&aacute; tiền, bền bỉ theo năm th&aacute;ng v&agrave; những c&ocirc;ng nghệ t&acirc;n tiến đến từ Nhật Bản. Điển h&igrave;nh trong số n&agrave;y ch&iacute;nh l&agrave; c&aacute;c thiết bị t&iacute;ch hợp c&ocirc;ng nghệ Plasmacluster Ion m&agrave; mới cuối năm ngo&aacute;i, Sharp đ&atilde; c&aacute;n mốc 100 triệu sản phẩm b&aacute;n ra to&agrave;n cầu.</p>\r\n\r\n<figure contenteditable=\"false\"><img alt=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 1\" data-adbro-processed=\"true\" data-content-name=\"article-content-image\" data-content-piece=\"article-content-image_1905650\" data-content-target=\"/kinh-doanh/hon-100-trieu-san-pham-sharp-cong-nghe-plasmacluster-ion-da-ban-toan-cau-20220409063150879.htm\" data-height=\"1080\" data-original=\"https://icdn.dantri.com.vn/2022/04/09/sharpdocx-1649460511476.png\" data-photo-id=\"1905650\" data-track-content=\"\" data-width=\"1080\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/09/sharpdocx-1649460511476.png\" title=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 1\" />\r\n<ul>\r\n	<li data-block-reason=\"4\" data-trans-vn=\"Che nội dung\">&nbsp;</li>\r\n	<li data-block-reason=\"2\" data-trans-vn=\"Không quan tâm\">&nbsp;</li>\r\n	<li data-block-reason=\"3\" data-trans-vn=\"Không phù hợp\">&nbsp;</li>\r\n	<li data-block-reason=\"1\" data-trans-vn=\"Thấy quá nhiều\">&nbsp;</li>\r\n</ul>\r\n\r\n<figcaption>T&iacute;nh đến cuối năm 2021, đ&atilde; c&oacute; hơn 100 triệu sản phẩm trang bị c&ocirc;ng nghệ Plasmacluster Ion đ&atilde; được b&aacute;n ra tr&ecirc;n to&agrave;n cầu (Ảnh: Sharp Việt Nam).</figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;100 triệu sản phẩm t&iacute;ch hợp c&ocirc;ng nghệ diệt khuẩn Plasmacluster Ion b&aacute;n ra tr&ecirc;n to&agrave;n cầu - cao hơn cả d&acirc;n số của kh&ocirc;ng &iacute;t quốc gia. Đ&acirc;y thật sự l&agrave; một con số biết n&oacute;i, l&agrave; minh chứng r&otilde; r&agrave;ng nhất cho độ uy t&iacute;n v&agrave; chất lượng sản phẩm từ Sharp&quot;, đại diện thương hiệu chia sẻ.</p>\r\n\r\n<p>Cũng theo đại diện Sharp, doanh nghiệp lu&ocirc;n s&aacute;ng tạo v&agrave; nghi&ecirc;m t&uacute;c trong việc nghi&ecirc;n cứu c&aacute;c c&ocirc;ng nghệ mới, hữu &iacute;ch trong cuộc sống mỗi người. Thương hiệu Nhật Bản n&agrave;y lấy sức khỏe của kh&aacute;ch h&agrave;ng l&agrave;m trung t&acirc;m, đặt chất lượng l&ecirc;n h&agrave;ng đầu với từng sản phẩm, d&ugrave; l&agrave; m&aacute;y lọc kh&ocirc;ng kh&iacute;, tủ lạnh hay điều h&ograve;a.</p>\r\n\r\n<p>C&ocirc;ng nghệ Plasmacluster Ion l&agrave; c&ocirc;ng nghệ quan trọng trong việc đưa Sharp trở th&agrave;nh thương hiệu m&aacute;y lọc kh&ocirc;ng kh&iacute; h&agrave;ng đầu trong l&ograve;ng người d&acirc;n Nhật Bản n&oacute;i ri&ecirc;ng v&agrave; Đ&ocirc;ng Nam &Aacute; n&oacute;i chung, bao gồm cả Việt Nam.</p>\r\n\r\n<figure contenteditable=\"false\"><img alt=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 2\" data-content-name=\"article-content-image\" data-content-piece=\"article-content-image_1905651\" data-content-target=\"/kinh-doanh/hon-100-trieu-san-pham-sharp-cong-nghe-plasmacluster-ion-da-ban-toan-cau-20220409063150879.htm\" data-height=\"856\" data-original=\"https://icdn.dantri.com.vn/2022/04/09/sharpdocx-1649460511853.png\" data-photo-id=\"1905651\" data-track-content=\"\" data-width=\"1600\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/09/sharpdocx-1649460511853.png\" title=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 2\" />\r\n<figcaption>Những hạt ion &acirc;m v&agrave; ion dương gi&uacute;p m&ocirc;i trường sống trở n&ecirc;n thật sự sạch sẽ, trong l&agrave;nh (Ảnh: Sharp Việt Nam).</figcaption>\r\n</figure>\r\n\r\n<p>Đại diện Sharp cho biết, c&aacute;c d&ograve;ng m&aacute;y lọc kh&ocirc;ng kh&iacute; với c&ocirc;ng nghệ Plasmacluster Ion ph&aacute;t t&aacute;n c&aacute;c ion &acirc;m v&agrave; ion dương tương tự như c&aacute;c ion c&oacute; trong tự nhi&ecirc;n v&agrave;o kh&ocirc;ng kh&iacute;. Tiếp đến, c&aacute;c ion dương v&agrave; ion &acirc;m li&ecirc;n kết tr&ecirc;n bề mặt của vi r&uacute;t, vi khuẩn, nấm mốc trong kh&ocirc;ng kh&iacute; v&agrave; ph&acirc;n hủy protein, ức chế hoạt động của ch&uacute;ng. Sau đ&oacute;, c&aacute;c ion trở lại dưới dạng ph&acirc;n tử nước mang đến nguồn kh&ocirc;ng kh&iacute; sạch khuẩn trong l&agrave;nh cho ng&ocirc;i nh&agrave;.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, mỗi chiếc m&aacute;y lọc kh&ocirc;ng kh&iacute; của Sharp lu&ocirc;n được kết hợp với m&agrave;ng lọc 3 lớp:</p>\r\n\r\n<p>- Bộ lọc bụi th&ocirc; - lọc bụi th&ocirc; với k&iacute;ch thước 240 micromet, l&ocirc;ng th&uacute; cưng, t&oacute;c&hellip;</p>\r\n\r\n<p>- Bộ lọc than hoạt t&iacute;nh - lọc m&ugrave;i h&ocirc;i, m&ugrave;i từ th&uacute; cưng, m&ugrave;i thuốc l&aacute;, m&ugrave;i mồ h&ocirc;i&hellip;</p>\r\n\r\n<p>- Bộ lọc HEPA - lọc sạch bụi đến 99,97% với k&iacute;ch thước từ 0,3 microm&eacute;t v&agrave; c&aacute;c chất g&acirc;y dị ứng.</p>\r\n\r\n<p>Nhờ đ&oacute;, bầu kh&ocirc;ng kh&iacute; trở n&ecirc;n sạch sẽ, trong l&agrave;nh hơn.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ với m&aacute;y lọc kh&ocirc;ng kh&iacute;, c&ocirc;ng nghệ Plasmacluster Ion c&ograve;n được Sharp t&iacute;ch hợp v&agrave;o c&aacute;c d&ograve;ng thiết bị kh&aacute;c. Tr&ecirc;n tủ lạnh, c&ocirc;ng nghệ n&agrave;y gi&uacute;p khử m&ugrave;i h&ocirc;i, loại bỏ vi khuẩn, nấm mốc v&agrave; tăng độ ẩm trong ngăn chứa gi&uacute;p thực phẩm tươi ngon l&acirc;u hơn, hạn chế &aacute;m m&ugrave;i.</p>\r\n\r\n<p>Trong khi đ&oacute;, h&atilde;ng c&ocirc;ng bố Plasmacluster Ion tr&ecirc;n c&aacute;c mẫu điều h&ograve;a kh&ocirc;ng kh&iacute; của Sharp ngo&agrave;i t&aacute;c dụng diệt khuẩn c&ograve;n c&oacute; thể ngăn chặn sự ph&aacute;t triển của nấm mốc, khử c&aacute;c m&ugrave;i kh&oacute; chịu trong căn ph&ograve;ng, kể cả m&ugrave;i thuốc l&aacute;, m&ugrave;i h&ocirc;i từ th&uacute; cưng v&agrave; ngăn ngừa c&aacute;c t&aacute;c nh&acirc;n g&acirc;y dị ứng như phấn hoa, bụi bẩn lơ lửng trong kh&ocirc;ng kh&iacute;. Từ đ&oacute; trả lại kh&ocirc;ng gian sự m&aacute;t mẻ, trong l&agrave;nh v&agrave; sạch khuẩn cho cả gia đ&igrave;nh.</p>\r\n\r\n<figure contenteditable=\"false\"><img alt=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 3\" data-content-name=\"article-content-image\" data-content-piece=\"article-content-image_1905652\" data-content-target=\"/kinh-doanh/hon-100-trieu-san-pham-sharp-cong-nghe-plasmacluster-ion-da-ban-toan-cau-20220409063150879.htm\" data-height=\"628\" data-original=\"https://icdn.dantri.com.vn/2022/04/09/sharpdocx-1649460512107.png\" data-photo-id=\"1905652\" data-track-content=\"\" data-width=\"1380\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/09/sharpdocx-1649460512107.png\" title=\"Hơn 100 triệu sản phẩm Sharp công nghệ Plasmacluster Ion đã bán toàn cầu - 3\" />\r\n<figcaption>C&ocirc;ng nghệ Plasmacluster Ion được Sharp t&iacute;ch hợp v&agrave;o rất nhiều d&ograve;ng sản phẩm gia dụng, điện tử của h&atilde;ng, mang lại kh&ocirc;ng gian sống trong l&agrave;nh hơn (Ảnh: Sharp Việt Nam).</figcaption>\r\n</figure>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, nhờ c&oacute; những c&ocirc;ng dụng diệt khuẩn v&agrave; tạo ẩm tương tự, c&ocirc;ng nghệ Plasmacluster Ion cũng đ&atilde; được chứng nhận hiệu quả tại c&aacute;c tổ chức kiểm nghiệm của Nhật Bản v&agrave; tr&ecirc;n to&agrave;n thế giới. Điển h&igrave;nh như khả năng ức chế đến 99% với vi r&uacute;t c&uacute;m gia cầm H7N9/vi r&uacute;t c&uacute;m H1N1, ức chế 99,7% với vi r&uacute;t c&uacute;m gia cầm H5N1 v&agrave; c&oacute; thể ức chế virus SARS g&acirc;y suy h&ocirc; hấp cấp (c&aacute;c thử nghiệm được thực hiện trong ph&ograve;ng th&iacute; nghiệm v&agrave; c&oacute; thời gian nhất định).</p>\r\n\r\n<p>&quot;Sharp tự h&agrave;o l&agrave; thương hiệu h&agrave;ng đầu Nhật Bản v&agrave; Đ&ocirc;ng Nam &Aacute; với 100 triệu sản phẩm t&iacute;ch hợp c&ocirc;ng nghệ Plasmacluster Ion đ&atilde; được b&aacute;n ra tr&ecirc;n to&agrave;n thế giới, lu&ocirc;n đồng h&agrave;nh v&agrave; bảo vệ kh&ocirc;ng gian sống mọi gia đ&igrave;nh&quot;, đại diện h&atilde;ng c&ocirc;ng nghệ khẳng định.</p>\r\n', 'huyendau', NULL, '2022-04-10 07:38:49', '2022-04-10 07:38:49', 3),
(3, 'Top các nhóm công nghệ gia dụng dẫn đầu xu hướng 2022', 'img-post-01 - Copy (2) - Copy.jpg', '(Dân trí) - Sau đại dịch, cuộc chơi công nghệ trong lĩnh vực đồ gia dụng đã hoàn toàn thay đổi. Người dùng bắt đầu chuyển hướng tìm kiếm cho mình những sản phẩm có trải nghiệm tối ưu, đáp ứng được nhu cầu của thời đại bình thường mới.', '<p>Trải qua hai năm đầy biến động, mọi trải nghiệm về cuộc sống v&agrave; x&atilde; hội đều thay đổi. Từ việc hạn chế ra đường, giao lưu gặp gỡ, đến việc phải ở nh&agrave; trong thời gian kh&aacute; d&agrave;i đ&atilde; khiến ch&uacute;ng ta ch&uacute; trọng hơn về những trải nghiệm ngay ch&iacute;nh tại kh&ocirc;ng gian sống của m&igrave;nh.</p>\r\n\r\n<p>C&aacute;c &ocirc;ng lớn trong nh&oacute;m c&ocirc;ng nghệ gia dụng đang nhanh tay bắt kịp xu thế v&agrave; cho ra đời những sản phẩm với c&ocirc;ng nghệ vượt bậc. H&atilde;y c&ugrave;ng điểm qua top c&aacute;c nh&oacute;m c&ocirc;ng nghệ gia dụng sẽ dẫn đầu xu hướng năm 2022 v&agrave; c&oacute; thể cả những năm sau nữa!&nbsp;</p>\r\n\r\n<p><strong>1. Chọn tủ lạnh n&agrave;o cho b&igrave;nh thường mới?</strong></p>\r\n\r\n<p>Vốn đ&atilde; l&agrave; một &quot;trợ thủ&quot; kh&ocirc;ng thể thiếu của mọi ng&ocirc;i nh&agrave; từ trước đại dịch, sau khoảng thời gian gi&atilde;n c&aacute;ch k&eacute;o d&agrave;i, chiếc tủ lạnh c&agrave;ng th&ecirc;m khẳng định vai tr&ograve; quan trọng trong đời sống hiện đại.</p>\r\n\r\n<p>L&agrave;m sao để tận dụng tối đa kh&ocirc;ng gian lưu trữ, bảo to&agrave;n dinh dưỡng thực phẩm, giữ rau củ quả tươi l&acirc;u hơn, đặc biệt l&agrave; việc tr&aacute;nh nhiễm khuẩn ch&eacute;o giữa c&aacute;c m&oacute;n ăn? Đ&oacute; ch&iacute;nh l&agrave; những c&acirc;u hỏi m&agrave; người d&ugrave;ng cần t&igrave;m lời giải đ&aacute;p cho chiếc tủ lạnh nh&agrave; m&igrave;nh.</p>\r\n\r\n<p>Những băn khoăn tr&ecirc;n của người d&ugrave;ng đ&atilde; th&uacute;c đẩy c&aacute;c c&ocirc;ng ty điện m&aacute;y nhanh ch&oacute;ng bắt tay v&agrave;o sản xuất v&agrave; cho ra đời h&agrave;ng loạt c&ocirc;ng nghệ ti&ecirc;n tiến. Trong đ&oacute; kh&ocirc;ng thể kh&ocirc;ng nhắc tới c&ocirc;ng nghệ hai d&agrave;n lạnh độc lập hay &aacute;nh s&aacute;ng vi chất.</p>\r\n\r\n<figure contenteditable=\"false\"><img alt=\"Top các nhóm công nghệ gia dụng dẫn đầu xu hướng 2022 - 1\" data-adbro-processed=\"true\" data-content-name=\"article-content-image\" data-content-piece=\"article-content-image_1903643\" data-content-target=\"/suc-manh-so/top-cac-nhom-cong-nghe-gia-dung-dan-dau-xu-huong-2022-20220407181353277.htm\" data-height=\"1200\" data-original=\"https://icdn.dantri.com.vn/2022/04/07/smsdocx-1649329829028.png\" data-photo-id=\"1903643\" data-track-content=\"\" data-width=\"1200\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/07/smsdocx-1649329829028.png\" title=\"Top các nhóm công nghệ gia dụng dẫn đầu xu hướng 2022 - 1\" /></figure>\r\n\r\n<p>Để đ&aacute;p ứng nhu cầu trữ lạnh nhanh v&agrave; đồng đều, tối ưu h&oacute;a độ ẩm v&agrave; ngăn m&ugrave;i c&ugrave;ng vi khuẩn l&acirc;y lan, NeoFrost ch&iacute;nh l&agrave; c&aacute;i t&ecirc;n kh&ocirc;ng thể bỏ qua. Với c&ocirc;ng nghệ n&agrave;y, ngăn m&aacute;t v&agrave; ngăn đ&ocirc;ng của tủ lạnh đều được trang bị hai d&agrave;n lạnh độc lập, ngăn chặn sự lu&acirc;n chuyển kh&ocirc;ng kh&iacute; giữa c&aacute;c ngăn, gi&uacute;p bảo quản thực phẩm tươi ngon v&agrave; tối ưu h&oacute;a hiệu quả sử dụng điện năng.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, nhu cầu ăn ngon, sống khỏe v&agrave; n&acirc;ng cao sức đề kh&aacute;ng sau đại dịch của người d&ugrave;ng c&agrave;ng th&ecirc;m được ch&uacute; trọng. Nhắc đến yếu tố dinh dưỡng để sống khỏe l&agrave; kh&ocirc;ng thể kh&ocirc;ng nhắc đến c&ocirc;ng nghệ &aacute;nh s&aacute;ng vi chất HarvestFresh. Đ&acirc;y l&agrave; một c&ocirc;ng nghệ th&ocirc;ng minh m&ocirc; phỏng chu kỳ &aacute;nh s&aacute;ng tự nhi&ecirc;n 24h với hệ thống chiếu đ&egrave;n 3 m&agrave;u tự động trong ngăn rau củ quả. Đ&oacute;ng vai tr&ograve; như một mặt trời thu nhỏ trong tủ lạnh, HarvestFresh gi&uacute;p rau quả tiếp tục quang hợp v&agrave; bảo to&agrave;n vitamin A &amp; C c&ugrave;ng c&aacute;c chất chống &ocirc;xy h&oacute;a, đồng thời giữ trọn hương vị tươi ngon như l&uacute;c vừa thu hoạch.</p>\r\n\r\n<p>Sau c&ugrave;ng, kh&ocirc;ng thể kh&ocirc;ng kể đến yếu tố tiết kiệm điện năng. Với những c&ocirc;ng nghệ ti&ecirc;n tiến, chẳng hạn như c&ocirc;ng nghệ m&aacute;y n&eacute;n tiết kiệm điện ProSmart Inverter, người d&ugrave;ng c&oacute; thể nhẹ g&aacute;nh lo mỗi khi h&oacute;a đơn tiền điện h&agrave;ng th&aacute;ng gh&eacute; nh&agrave;.</p>\r\n', 'huyendau', NULL, '2022-04-10 07:43:23', '2022-04-10 07:43:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_cat`
--

CREATE TABLE `tbl_post_cat` (
  `postCatId` int NOT NULL,
  `postCatTitle` varchar(50) NOT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updatedBy` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_post_cat`
--

INSERT INTO `tbl_post_cat` (`postCatId`, `postCatTitle`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'Điện thoại', 'huyendau', NULL, '2022-04-10 05:01:01', '2022-04-10 06:22:15'),
(2, 'Macbook', 'huyendau', NULL, '2022-04-10 05:01:11', '2022-04-10 05:01:11'),
(3, 'Công nghệ', 'huyendau', NULL, '2022-04-10 06:22:27', '2022-04-10 06:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `productId` int NOT NULL,
  `productSku` varchar(50) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productThumb` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `promotionPrice` int DEFAULT NULL,
  `productDesc` varchar(400) NOT NULL,
  `productDetail` varchar(8000) NOT NULL,
  `qty` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `createdBy` varchar(50) DEFAULT NULL,
  `updatedBy` varchar(50) DEFAULT NULL,
  `catId` int NOT NULL,
  `supplierId` int NOT NULL,
  `colorId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`productId`, `productSku`, `productName`, `productThumb`, `price`, `promotionPrice`, `productDesc`, `productDetail`, `qty`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `catId`, `supplierId`, `colorId`) VALUES
(1, 'IPXR-128GB', 'Điện thoại iPhone XR 128GB', 'iphone-xr-128gb-trang-1-1-org - Copy.jpg', 15190000, 13490000, '<p>M&agrave;n h&igrave;nh: IPS LCD6.1&quot;Liquid Retina</p>\r\n\r\n<p>Hệ điều h&agrave;nh: iOS 15</p>\r\n\r\n<p>Camera sau: 12 MP</p>\r\n\r\n<p>Camera trước: 7 MP</p>\r\n\r\n<p>Bộ nhớ trong: 128 GB</p>\r\n\r\n<p>Pin, Sạc: 2942 mAh15 W</p>\r\n', '<h2>ược xem l&agrave; phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại iPhone\" type=\"Tham khảo các dòng điện thoại iPhone\">iPhone</a>&nbsp;gi&aacute; rẻ đầy ho&agrave;n hảo,&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-xr-128gb\" target=\"_blank\" title=\"Chi tiết điện thoại iPhone XR 128GB\" type=\"Chi tiết điện thoại iPhone XR 128GB\">iPhone Xr 128GB</a>&nbsp;khiến người d&ugrave;ng c&oacute; nhiều sự lựa chọn hơn về m&agrave;u sắc&nbsp;đa dạng nhưng vẫn sở hữu cấu h&igrave;nh mạnh mẽ v&agrave; thiết kế sang trọng.</h2>\r\n\r\n<h3>M&agrave;n h&igrave;nh tr&agrave;n viền c&ocirc;ng nghệ LCD - True Tone</h3>\r\n\r\n<p>Thay v&igrave; sở hữu m&agrave;n h&igrave;nh OLED truyền thống, chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">smartphone</a>&nbsp;n&agrave;y sở hữu m&agrave;n h&igrave;nh LCD.</p>\r\n\r\n<p>B&ugrave; lại với c&ocirc;ng nghệ&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cong-nghe-man-hinh-true-tone-992705\" target=\"_blank\" title=\"Tìm hiểu công nghệ màn hình True Tone\" type=\"Tìm hiểu công nghệ màn hình True Tone\">True Tone</a>&nbsp;c&ugrave;ng m&agrave;n h&igrave;nh tr&agrave;n viền rộng tới 6.1 inch, mọi trải nghiệm tr&ecirc;n m&aacute;y vẫn đem lại sự th&iacute;ch th&uacute; v&agrave; ho&agrave;n hảo, như d&ograve;ng cao cấp kh&aacute;c của Apple.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/191483/iphone-xr-128gb-1-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại iPhone Xr chính hãng\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/191483/iphone-xr-128gb-1-1.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/191483/iphone-xr-128gb-1-1.jpg\" title=\"Màn hình điện thoại iPhone Xr chính hãng\" /></a></p>\r\n\r\n<p>Ngo&agrave;i ra, Apple cũng giới thiệu rằng, iPhone Xr được trang bị một loại c&ocirc;ng nghệ mới c&oacute; t&ecirc;n&nbsp;Liquid Retina. M&aacute;y c&oacute; độ ph&acirc;n giải 1792 x 828 Pixels c&ugrave;ng 1.4 triệu điểm ảnh.</p>\r\n', 10, '2022-05-10 03:44:03', '2022-05-10 03:44:03', NULL, NULL, 7, 1, 8),
(2, 'IP002', 'Iphone XS', 'img-pro-2.png', 21190000, 20190000, 'Iphone XS', 'Iphone XS', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 7, 1, 1),
(3, 'SS001', 'Samsung Galaxy S8 Plus', 'img-ss-01.png', 24140000, 22110000, 'Samsung Galaxy S8 Plus', 'Samsung Galaxy S8 Plus', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 8, 5, 1),
(4, 'SS002', 'Motorola Moto G5S Plus', 'img-pro-16.png', 8999000, 6999000, 'Motorola Moto G5S Plus', 'Motorola Moto G5S Plus', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 8, 4, 3),
(6, 'SN001', 'Sony Xperia XA Ultra', 'img-pro-14.png', 7999000, 6999000, 'Sony Xperia XA Ultra', 'Sony Xperia XA Ultra', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 16, 2, 8),
(8, 'XM001', 'Xiaomi Mi A1', 'img-pro-12.png', 6700000, 5800000, 'Xiaomi Mi A1', 'Xiaomi Mi A1', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 10, 1, 6),
(9, 'XM002', 'HTC U Ultra Sapphire', 'img-pro-11.png', 6700000, 5800000, 'HTC U Ultra Sapphire', 'HTC U Ultra Sapphire', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 10, 1, 6),
(10, 'SN003', 'Sony Xperia XZ Dual', 'img-pro-08.png', 8799000, 7799000, 'Sony Xperia XZ Dual', 'Sony Xperia XZ Dual', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', NULL, NULL, 16, 1, 6),
(11, 'LT001', 'Laptop Asus X441NA', 'img-pro-17.png', 15699000, 14799000, 'Laptop Asus X441NA', 'Laptop Asus X441NA', 15, NULL, NULL, NULL, NULL, 3, 5, 8),
(12, 'LTLenovo-Idp3', 'Laptop Lenovo Ideapad i3', 'lenovo-ideapad-3-15iml05-i3-81wb01dpvn-1-1.jpg', 14490000, 12490000, '<p>CPU: i310110U2.1GHz</p>\r\n\r\n<p>RAM: 4 GBDDR4 (On board 4GB +1 khe rời)2666 MHz</p>\r\n\r\n<p>Ổ cứng: 256 GB SSD NVMe PCIe (C&oacute; thể th&aacute;o ra, lắp thanh kh&aacute;c tối đa 1TB (2280) / 512GB (2242))Hỗ trợ th&ecirc;m 1 khe cắm HDD SATA (n&acirc;ng cấp tối đa 1TB)</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Windows 11 Home SL</p>\r\n', '<p>Laptop Lenovo IdeaPad 110</p>\r\n', 15, '2022-05-10 07:00:37', '2022-05-10 07:00:37', NULL, NULL, 19, 5, 8),
(13, 'LT003', 'Laptop Acer ES1 533', 'img-pro-19.png', 19699000, 16799000, 'Laptop Acer ES1 533', 'Laptop Acer ES1 533', 25, '2022-04-03 10:56:10', '2022-04-03 10:56:10', NULL, NULL, 3, 5, 6),
(14, 'LT004', 'Laptop Lenovo IdeaPad 110', 'img-pro-20.png', 21000000, 19999000, 'Laptop Lenovo IdeaPad 110', 'Laptop Lenovo IdeaPad 110', 15, NULL, NULL, NULL, NULL, 3, 5, 8),
(15, 'LT005', 'Laptop Asus X441NA', 'img-pro-21.png', 19699000, 17779000, 'Laptop Asus X441NA', 'Laptop Asus X441NA', 15, '2022-04-03 10:56:10', '2022-04-03 10:56:10', NULL, NULL, 3, 5, 6),
(16, 'LT006', 'Laptop Acer Aspire ES1', 'img-pro-22.png', 22999000, 20899000, 'Laptop Acer Aspire ES1', 'Laptop Acer Aspire ES1', 25, '2022-04-03 10:56:10', '2022-04-03 10:56:10', NULL, NULL, 3, 5, 6),
(17, 'LTAsus-ZenBooki7', 'Laptop Asus ZenBook UX325EA i7', 'vi-vn-asus-zenbook-ux325ea-i7-kg658w-1.jpg', 32699000, 29990000, '<p>CPU: i71165G72.8GHz</p>\r\n\r\n<p>RAM: 16 GBLPDDR4X (On board)4267 MHz</p>\r\n\r\n<p>Ổ cứng: 512 GB SSD NVMe PCIe (C&oacute; thể th&aacute;o ra, lắp thanh kh&aacute;c tối đa 1TB)</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 13.3&quot;Full HD (1920 x 1080) OLED</p>\r\n', '<h3>Chi&ecirc;m ngưỡng sự đẳng cấp đến từ<a href=\"https://www.thegioididong.com/laptop/asus-zenbook-ux325ea-i7-kg658w\" target=\"_blank\" title=\"Laptop Asus ZenBook UX325EA i7 (KG658W)\">&nbsp;laptop Asus ZenBook UX325EA i7 (KG658W)</a>&nbsp;với cấu h&igrave;nh vượt trội c&ugrave;ng diện mạo cao cấp, hứa hẹn mang đến những trải nghiệm độc đ&aacute;o, đ&aacute;p ứng mọi nhu cầu sử dụng của người d&ugrave;ng.</h3>\r\n\r\n<h3>G&acirc;y ấn tượng với thiết kế&nbsp;thời thượng</h3>\r\n\r\n<p>Mang tr&ecirc;n m&igrave;nh lớp vỏ<strong>&nbsp;kim loại nguy&ecirc;n khối&nbsp;</strong>cứng c&aacute;p c&oacute; gam&nbsp;<strong>m&agrave;u x&aacute;m&nbsp;</strong>chủ đạo v&agrave; những đường n&eacute;t sắc sảo tr&ecirc;n m&aacute;y, ZenBook UX325EA sở hữu d&aacute;ng vẻ sang chảnh của d&ograve;ng&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=cao-cap-sang-trong\" target=\"_blank\" title=\"Xem thêm mẫu laptop cao cấp - sang trọng tại thegioididong.com\">laptop&nbsp;cao cấp</a>. Bề d&agrave;y&nbsp;<strong>13.9 mm</strong>&nbsp;v&agrave; trọng lượng chỉ vỏn vẹn&nbsp;<strong>1.14 kg</strong>, cực kỳ ph&ugrave; hợp cho những ai thường xuy&ecirc;n di chuyển nhiều nơi với khả năng linh hoạt ấn tượng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/267787/asus-zenbook-ux325ea-i7-kg658w-2-1.jpg\" onclick=\"return false;\"><img alt=\"Asus ZenBook UX325EA i7 1165G7 (KG658W) - Thiết kế\" data-src=\"https://cdn.tgdd.vn/Products/Images/44/267787/asus-zenbook-ux325ea-i7-kg658w-2-1.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/267787/asus-zenbook-ux325ea-i7-kg658w-2-1.jpg\" title=\"Asus ZenBook UX325EA i7 1165G7 (KG658W) - Thiết kế\" /></a></p>\r\n\r\n<p>Tiết diện b&agrave;n ph&iacute;m rộng r&atilde;i với h&agrave;nh tr&igrave;nh s&acirc;u, độ nảy ổn định c&ugrave;ng&nbsp;<strong>đ&egrave;n nền ph&iacute;m</strong>&nbsp;nổi bật mang đến trải nghiệm soạn thảo &ecirc;m tay, thoải m&aacute;i với tốc độ g&otilde; nhanh v&agrave; chuẩn x&aacute;c tr&ecirc;n từng con ph&iacute;m ngay cả khi bạn l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/267787/asus-zenbook-ux325ea-i7-kg658w-6-1.jpg\" onclick=\"return false;\"><img alt=\"Asus ZenBook UX325EA i7 1165G7 (KG658W) - Bàn phím\" data-src=\"https://cdn.tgdd.vn/Products/Images/44/267787/asus-zenbook-ux325ea-i7-kg658w-6-1.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/44/267787/asus-zenbook-ux325ea-i7-kg658w-6-1.jpg\" title=\"Asus ZenBook UX325EA i7 1165G7 (KG658W) - Bàn phím\" /></a></p>\r\n', 25, '2022-05-10 03:59:01', '2022-05-10 03:59:01', NULL, NULL, 3, 5, 6),
(18, 'MS001', 'Samsung S9', 'img-pro-15 - Copy.png', 8799983, 6873861, 'huyen dau 08122 ', '<p>huyen</p>\r\n', 10, '2022-04-10 10:51:21', '2022-04-10 10:51:21', NULL, NULL, 8, 2, 2),
(22, 'IP13-PROMAX', 'Điện thoại iPhone 13 Pro Max', 'iphone-13-pro-xanh-xa-1.jpg', 33990000, 31290000, '<p>M&agrave;n h&igrave;nh: OLED6.7&quot;Super Retina XDR</p>\r\n\r\n<p>Hệ điều h&agrave;nh: iOS 15</p>\r\n\r\n<p>Camera sau: 3 camera 12 MP&nbsp;</p>\r\n\r\n<p>Bộ nhớ trong: 128 GB</p>\r\n\r\n<p>Pin, Sạc: 4352 mAh20 W</p>\r\n', '<h3><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 13 Pro Max chính hãng\">iPhone 13 Pro Max 128 GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone iPhone chính hãng\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</h3>\r\n\r\n<h3>Thi&ecirc;́t k&ecirc;́ đẳng cấp h&agrave;ng đầu</h3>\r\n\r\n<p>iPhone mới kế thừa thiết kế đặc trưng từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro Max chính hãng\">iPhone 12 Pro Max</a>&nbsp;khi sở hữu khung viền vu&ocirc;ng vức, mặt lưng k&iacute;nh c&ugrave;ng m&agrave;n h&igrave;nh tai thỏ tr&agrave;n viền nằm ở ph&iacute;a trước.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/230529/iphone-13-pro-max-3.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế vuông vức đặc trưng - iPhone 13 Pro Max 128GB\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-3.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-3.jpg\" title=\"Thiết kế vuông vức đặc trưng - iPhone 13 Pro Max 128GB\" /></a></p>\r\n\r\n<p>Với iPhone 13 Pro Max phần tai thỏ đ&atilde; được thu gọn lại 20% so với thế hệ trước, kh&ocirc;ng chỉ giải ph&oacute;ng nhiều kh&ocirc;ng gian hiển thị hơn m&agrave; c&ograve;n gi&uacute;p mặt trước chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo điện thoại kinh doanh tại Thế Giới Di Động\">điện thoại</a>&nbsp;trở n&ecirc;n hấp dẫn hơn m&agrave; vẫn đảm bảo được hoạt động của c&aacute;c cảm biến.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 10, '2022-05-10 06:59:19', '2022-05-10 06:59:19', NULL, NULL, 7, 3, 5),
(23, 'IP11-64GB', 'Điện thoại iPhone 11 64GB', 'iphone-11-do-1-1-1-org.jpg', 15990000, 14990000, '<p>M&agrave;n h&igrave;nh: IPS LCD6.1&quot;Liquid Retina</p>\r\n\r\n<p>Hệ điều h&agrave;nh: iOS 15</p>\r\n\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n\r\n<p>Camera trước: 12 MP</p>\r\n\r\n<p>Chip: Apple A13 Bionic</p>\r\n\r\n<p>Bộ nhớ trong: 64 GB</p>\r\n\r\n<p>Pin, Sạc: 3110 mAh18 W</p>\r\n', '<h3>Apple đ&atilde; ch&iacute;nh thức tr&igrave;nh l&agrave;ng bộ 3 si&ecirc;u phẩm iPhone 11, trong đ&oacute; phi&ecirc;n bản&nbsp;<a href=\"https://www.topzone.vn/iphone/iphone-11\" target=\"_blank\" title=\"Tham khảo thông tin sản phẩm tại TopZone.vn\">iPhone 11 64GB</a>&nbsp;c&oacute; mức gi&aacute; rẻ nhất nhưng vẫn được n&acirc;ng cấp mạnh mẽ như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-xr-128gb\" target=\"_blank\" title=\"Tham khảo điện thoại iPhone Xr chính hãng\">iPhone Xr</a>&nbsp;ra mắt&nbsp;trước đ&oacute;.</h3>\r\n\r\n<h3>N&acirc;ng cấp mạnh mẽ về camera</h3>\r\n\r\n<p>N&oacute;i về n&acirc;ng cấp th&igrave; camera ch&iacute;nh l&agrave; điểm c&oacute; nhiều cải tiến nhất tr&ecirc;n thế hệ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo giá điện thoại smartphone iPhone chính hãng\">iPhone</a>&nbsp;mới.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/153856/iphone-11-tgdd42.jpg\" onclick=\"return false;\"><img alt=\"Điện thoại iPhone 11 64GB | Thiết kế nhiều màu sắc\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-tgdd42.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-tgdd42.jpg\" title=\"Điện thoại iPhone 11 64GB | Thiết kế nhiều màu sắc\" /></a></p>\r\n\r\n<p>Nếu như trước đ&acirc;y iPhone Xr chỉ c&oacute; một camera th&igrave; nay với&nbsp;<a href=\"https://www.topzone.vn/iphone-11\" target=\"_blank\" title=\"Tham khảo điện thoại iPhone 11 đang kinh doanh tại TopZone thương hiệu của Thế Giới Di Động\">iPhone 11</a>&nbsp;ch&uacute;ng ta sẽ c&oacute; tới hai camera ở mặt sau.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/153856/iphone-114-1.jpg\" onclick=\"return false;\"><img alt=\"Điện thoại iPhone 11 64GB | Camera sau\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/153856/iphone-114-1.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/153856/iphone-114-1.jpg\" title=\"Điện thoại iPhone 11 64GB | Camera sau\" /></a></p>\r\n\r\n<p>Ngo&agrave;i camera ch&iacute;nh vẫn c&oacute; độ ph&acirc;n giải 12 MP th&igrave; ch&uacute;ng ta sẽ c&oacute; th&ecirc;m một camera g&oacute;c si&ecirc;u rộng v&agrave; cũng với độ ph&acirc;n giải tương tự.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 15, '2022-05-10 03:39:16', '2022-05-10 03:39:16', NULL, NULL, 7, 3, 3),
(24, 'OPPO-Reno7-5G', 'Điện thoại OPPO Reno7 Z 5G', 'oppo-reno7-z-1-2.jpg', 12890000, 10490000, '<p>M&agrave;n h&igrave;nh: AMOLED6.43&quot;Full HD+</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Android 11</p>\r\n\r\n<p>Camera sau: Ch&iacute;nh 64 MP &amp; Phụ 2 MP, 2 MP</p>\r\n\r\n<p>Camera trước: 16 MP</p>\r\n\r\n<p>SIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</p>\r\n', '<h3><a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" title=\"Tham khảo thông tin điện thoại OPPO kinh doanh tại Thế Giới Di Động\">OPPO</a>&nbsp;đ&atilde;&nbsp;tr&igrave;nh l&agrave;ng mẫu&nbsp;<a href=\"https://www.thegioididong.com/dtdd/oppo-reno7-z\" target=\"_blank\" title=\"Tham khảo thông tin sản phẩm tại Thế Giới Di Động\">Reno7 Z 5G</a>&nbsp;với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như m&aacute;y DSLR chuy&ecirc;n nghiệp c&ugrave;ng viền s&aacute;ng k&eacute;p, m&aacute;y c&oacute; một cấu h&igrave;nh mạnh mẽ v&agrave; đạt chứng nhận xếp hạng A về độ mượt.</h3>\r\n\r\n<h3>Dễ d&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo điện thoại kinh doanh tại Thế Giới Di Động\">Điện thoại</a>&nbsp;OPPO Reno7 Z 5G c&oacute; khung vi&ecirc;̀n v&aacute;t phẳng, vu&ocirc;ng vức trendy l&agrave;m cho m&aacute;y to&aacute;t l&ecirc;n n&eacute;t hiện đại v&agrave; năng động. Bốn g&oacute;c được bo cong mềm mại tạo cảm gi&aacute;c thoải m&aacute;i v&agrave; nhẹ nh&agrave;ng (chỉ 173 g). Với thiết kế nguy&ecirc;n khối l&agrave;m tổng thể m&aacute;y trở n&ecirc;n cực kỳ chắc chắn, kh&ocirc;ng chỉ đẹp m&agrave; c&ograve;n tăng độ bền.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/271717/oppo-reno7-z-1-3.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế khung viền phẳng - OPPO Reno7 Z 5G\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/271717/oppo-reno7-z-1-3.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/271717/oppo-reno7-z-1-3.jpg\" title=\"Thiết kế khung viền phẳng - OPPO Reno7 Z 5G\" /></a></p>\r\n\r\n<p>Điểm ấn tượng nhất tr&ecirc;n Reno7 Z l&agrave; d&ugrave;ng thiết kế OPPO Glow độc quyền, mang đến một mặt lưng tinh tế, c&oacute; thể chuyển m&agrave;u sắc khi thay đổi g&oacute;c nh&igrave;n. M&aacute;y c&oacute; 2 phi&ecirc;n bản m&agrave;u: Đen V&ocirc; Cực sang trọng, tinh tế v&agrave; Bạc Đa Sắc nổi bật. D&ugrave; lựa chọn phi&ecirc;n bản m&agrave;u n&agrave;o th&igrave; mặt lưng m&aacute;y cũng được phủ nh&aacute;m gi&uacute;p hạn chế t&igrave;nh trạng b&aacute;m v&acirc;n tay v&agrave; mồ h&ocirc;i, cho điện thoại sẽ lu&ocirc;n giữ được vẻ &ldquo;sang chảnh&rdquo; mọi l&uacute;c.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/271717/oppo-reno7-z-2-3.jpg\" onclick=\"return false;\"><img alt=\"Màu sắc trendy - OPPO Reno7 Z 5G\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/271717/oppo-reno7-z-2-3.jpg\" src=\"https://cdn.tgdd.vn/Products/Images/42/271717/oppo-reno7-z-2-3.jpg\" title=\"Màu sắc trendy - OPPO Reno7 Z 5G\" /></a></p>\r\n', 18, '2022-05-10 03:48:14', '2022-05-10 03:48:14', NULL, NULL, 9, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `supplierId` int NOT NULL,
  `supplierName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(200) NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `createdBy` varchar(50) DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`supplierId`, `supplierName`, `address`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`) VALUES
(1, 'Công ty TTHH Thương Mại CP Hoàng Phát', 'Số 4, Lô 2A Lê Hồng Phong, Ngô Quyền, Tp. Hải Phòng', '0000-00-00 00:00:00', '2022-04-03 10:00:12', NULL, ''),
(2, 'Công ty TTHH Công Nghệ Máy Tính An Phát', 'Số 19, Ngõ 178 Thái Hà - Đống Đa - Tp. Hà Nội (TPHN)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(3, 'Công ty TNHH Toàn Cầu Phương Trâm', ' 76/28/5 Lê Văn Phan, P. Phú Thọ Hòa, Q. Tân Phú, TP. Hồ Chí Minh (TPHCM)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(4, 'Công ty TNHH IT System Việt Nam\r\n', ' 321/10 Phan Đình Phùng, Phường 15, Quận Phú Nhuận, TP. Hồ Chí Minh (TPHCM)\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(5, 'Công ty TTHH Thương Mại An Phát', 'Xuân Phương - Nam Từ Liêm - Hà Nội', '2022-04-03 08:26:25', '2022-04-03 08:26:25', NULL, ''),
(6, 'Công ty TTHH Thương Mại Thái Hà', 'Xuân Phương - Nam Từ Liêm - Hà Nội', '2022-04-03 08:44:55', '2022-04-03 08:44:55', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `updatedBy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `activeToken` varchar(50) DEFAULT NULL,
  `isActive` int NOT NULL DEFAULT '0',
  `resetPassToken` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `resetPassDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `username`, `password`, `firstName`, `lastName`, `email`, `phoneNumber`, `address`, `role`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `activeToken`, `isActive`, `resetPassToken`, `resetPassDate`) VALUES
(2, 'huyendau', '2637a5c30af69a7bad877fdb65fbd78b', ' Đậu Thị', 'Huyền', 'huyendau0712+1@gmail.com', '0385930875', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', 1, NULL, NULL, NULL, '', NULL, 1, '', '0000-00-00 00:00:00'),
(3, 'huyendt', '2637a5c30af69a7bad877fdb65fbd78b', 'Đậu Thị', 'Huyền', 'huyendau0712+2@gmail.com', '0385930875', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', 0, NULL, '2022-05-07 21:01:58', NULL, 'huyendau', NULL, 1, '', '2022-05-09 17:16:53'),
(6, 'huyendau01', '2637a5c30af69a7bad877fdb65fbd78b', 'dau', 'huyen hh', 'huyendau0712@gmail.com', '0969210013', 'XP - NTL - HN', 0, '2022-04-24 05:39:47', '2022-04-24 09:04:38', NULL, '', '6d3b071f51687b72e6df01ea6d2f2398', 1, '4099cdf0fc603704e22732afb40cf2e7', '2022-05-08 20:39:04'),
(7, 'nguyen huong', '0e7517141fb53f21ee439b355b5a1d0a', 'Nguyễn', 'Hương', 'huyendau0712+3@gmail.com', '0123456789', 'DC- NA', 0, '2022-05-07 15:12:01', '2022-05-07 15:12:01', 'huyendau', 'huyendau', NULL, 1, NULL, NULL),
(8, 'caonga', '2637a5c30af69a7bad877fdb65fbd78b', 'Cao', 'Nga', 'huyendau0712+4@gmail.com', '0385930875', 'Nghệ An', 0, '2022-05-07 15:13:58', '2022-05-07 15:13:58', 'huyendau', 'huyendau', NULL, 1, NULL, NULL),
(14, 'dauthihuyen', '2637a5c30af69a7bad877fdb65fbd78b', 'Đậu Thị', 'Huyền', 'dh.magento2@gmail.com', '0123456789', 'Diễn Tân - Diễn Châu - Nghệ An', 0, '2022-05-10 09:41:19', '2022-05-10 09:41:19', NULL, NULL, '94c13e8da89c7557e30217b435af8e21', 1, 'adaf863073de6e655afc750c7ba8e70d', '2022-05-09 21:44:39'),
(15, 'admin', '0e7517141fb53f21ee439b355b5a1d0a', 'Admin', 'Admin', 'admin@gmail.com', '0123456789', 'NA', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(16, 'thanhnga', '0e7517141fb53f21ee439b355b5a1d0a', 'Lê Thanh', 'Nga', 'ngalt@gmail.com', '0123456789', 'Xuân Phương - Hà Nội', 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `cart_customer` (`userId`);

--
-- Indexes for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `cart_cartItem` (`cartId`),
  ADD KEY `cart_product` (`productId`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`colorId`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `cart_order` (`cartId`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `post_post_cat` (`postCatId`);

--
-- Indexes for table `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  ADD PRIMARY KEY (`postCatId`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_cat` (`catId`),
  ADD KEY `manufacturer_product` (`supplierId`),
  ADD KEY `product_color` (`colorId`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `cartId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `itemId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `catId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `colorId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `postId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  MODIFY `postCatId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `productId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `supplierId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD CONSTRAINT `cart_customer` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD CONSTRAINT `cart_cartItem` FOREIGN KEY (`cartId`) REFERENCES `tbl_carts` (`cartId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`productId`) REFERENCES `tbl_products` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `cart_order` FOREIGN KEY (`cartId`) REFERENCES `tbl_carts` (`cartId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `post_post_cat` FOREIGN KEY (`postCatId`) REFERENCES `tbl_post_cat` (`postCatId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `manufacturer_product` FOREIGN KEY (`supplierId`) REFERENCES `tbl_suppliers` (`supplierId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_cat` FOREIGN KEY (`catId`) REFERENCES `tbl_categories` (`catId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_color` FOREIGN KEY (`colorId`) REFERENCES `tbl_colors` (`colorId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
