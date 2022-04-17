-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2022 at 08:30 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `itemId` int NOT NULL,
  `productId` int NOT NULL,
  `cartId` int NOT NULL,
  `qtyOrderd` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`catId`, `catTitle`, `parentId`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'Điện thoại', 0, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:47'),
(2, 'Máy tính bảng', 0, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:52'),
(3, 'Laptop', 0, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:55'),
(5, 'Tablet', 0, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:43:59'),
(6, 'Thiết bị văn phòng', 0, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:02'),
(7, 'Iphone', 1, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:08'),
(8, 'Samsung', 1, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:15'),
(9, 'Oppo', 1, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:20'),
(10, 'Redmi', 1, NULL, 'huyendau', '0000-00-00 00:00:00', '2022-04-06 16:44:26'),
(11, 'Văn phòng', 0, NULL, 'huyendau', '2022-04-03 03:12:41', '2022-04-06 16:44:33'),
(12, 'Realmi', 1, NULL, 'huyendau', '2022-04-03 03:13:56', '2022-04-06 16:43:39'),
(13, 'Ốp lưng', 6, NULL, 'huyendau', '2022-04-03 05:37:10', '2022-04-06 16:44:40'),
(15, 'Macbook', 0, 'huyendau', 'huyendau', '2022-04-03 10:11:51', '2022-04-03 10:12:01'),
(16, 'Sony', 1, NULL, 'huyendau', '2022-04-03 10:49:01', '2022-04-06 16:44:45'),
(17, 'Huawei', 1, 'huyendau', 'huyendau', '2022-04-03 10:50:55', '2022-04-06 16:44:55');

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
(8, 'trang', 'Trắng'),
(9, 'tram', 'Tràm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturers`
--

CREATE TABLE `tbl_manufacturers` (
  `manufactureId` int NOT NULL,
  `manufactureName` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_manufacturers`
--

INSERT INTO `tbl_manufacturers` (`manufactureId`, `manufactureName`, `address`, `createdAt`, `updatedAt`) VALUES
(1, 'Công ty TTHH Thương Mại CP Hoàng Phát', 'Số 4, Lô 2A Lê Hồng Phong, Ngô Quyền, Tp. Hải Phòng', '0000-00-00 00:00:00', '2022-04-03 10:00:12'),
(2, 'Công ty TTHH Công Nghệ Máy Tính An Phát', 'Số 19, Ngõ 178 Thái Hà - Đống Đa - Tp. Hà Nội (TPHN)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Công ty TNHH Toàn Cầu Phương Trâm', ' 76/28/5 Lê Văn Phan, P. Phú Thọ Hòa, Q. Tân Phú, TP. Hồ Chí Minh (TPHCM)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Công ty TNHH IT System Việt Nam\r\n', ' 321/10 Phan Đình Phùng, Phường 15, Quận Phú Nhuận, TP. Hồ Chí Minh (TPHCM)\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Công ty TTHH Thương Mại An Phát', 'Xuân Phương - Nam Từ Liêm - Hà Nội', '2022-04-03 08:26:25', '2022-04-03 08:26:25'),
(6, 'Công ty TTHH Thương Mại Thái Hà', 'Xuân Phương - Nam Từ Liêm - Hà Nội', '2022-04-03 08:44:55', '2022-04-03 08:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `orderId` int NOT NULL,
  `orderPayment` varchar(50) NOT NULL,
  `orderCreatedAt` timestamp NULL DEFAULT NULL,
  `cartId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pageId` int NOT NULL,
  `pageTitle` varchar(50) NOT NULL,
  `pageDesc` varchar(500) NOT NULL,
  `pageDetail` longtext NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `postId` int NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postThumb` varchar(50) NOT NULL,
  `postDesc` varchar(500) NOT NULL,
  `postDetail` varchar(8000) NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `catId` int NOT NULL,
  `manufactureId` int NOT NULL,
  `colorId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`productId`, `productSku`, `productName`, `productThumb`, `price`, `promotionPrice`, `productDesc`, `productDetail`, `qty`, `createdAt`, `updatedAt`, `catId`, `manufactureId`, `colorId`) VALUES
(1, 'IP001', 'Iphone X Plus', 'img-pro-1.png', 17190000, 15190000, 'Iphone X Plus', 'Iphone X ', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 7, 1, 1),
(2, 'IP002', 'Iphone XS', 'img-pro-2.png', 21190000, 20190000, 'Iphone XS', 'Iphone XS', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 7, 1, 1),
(3, 'SS001', 'Samsung Galaxy S8 Plus', 'img-ss-01.png', 24140000, 22110000, 'Samsung Galaxy S8 Plus', 'Samsung Galaxy S8 Plus', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 8, 5, 1),
(4, 'SS002', 'Motorola Moto G5S Plus', 'img-pro-16.png', 8999000, 6999000, 'Motorola Moto G5S Plus', 'Motorola Moto G5S Plus', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 8, 4, 3),
(5, 'SS003', 'Samsung Galaxy A5', 'img-pro-15.png', 9165000, 8499000, 'Samsung Galaxy A5', 'Samsung Galaxy A5', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 8, 4, 6),
(6, 'SN001', 'Sony Xperia XA Ultra', 'img-pro-14.png', 7999000, 6999000, 'Sony Xperia XA Ultra', 'Sony Xperia XA Ultra', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 16, 2, 8),
(7, 'HW001', 'Huawei Nova 2i', 'img-pro-13.png', 7999000, 6999000, 'Huawei Nova 2i', 'Huawei Nova 2i', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 17, 1, 6),
(8, 'XM001', 'Xiaomi Mi A1', 'img-pro-12.png', 6700000, 5800000, 'Xiaomi Mi A1', 'Xiaomi Mi A1', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 10, 1, 6),
(9, 'XM002', 'HTC U Ultra Sapphire', 'img-pro-11.png', 6700000, 5800000, 'HTC U Ultra Sapphire', 'HTC U Ultra Sapphire', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 10, 1, 6),
(10, 'SN003', 'Sony Xperia XZ Dual', 'img-pro-08.png', 8799000, 7799000, 'Sony Xperia XZ Dual', 'Sony Xperia XZ Dual', 10, '2022-04-03 10:29:20', '2022-04-03 10:29:20', 16, 1, 6),
(11, 'LT001', 'Laptop Asus X441NA', 'img-pro-17.png', 15699000, 14799000, 'Laptop Asus X441NA', 'Laptop Asus X441NA', 15, NULL, NULL, 3, 5, 8),
(12, 'LT002', 'Laptop Lenovo IdeaPad 110', 'img-pro-18.png', 19699000, 16799000, 'Laptop Lenovo IdeaPad 110', 'Laptop Lenovo IdeaPad 110', 15, '2022-04-03 10:56:10', '2022-04-03 10:56:10', 3, 5, 6),
(13, 'LT003', 'Laptop Acer ES1 533', 'img-pro-19.png', 19699000, 16799000, 'Laptop Acer ES1 533', 'Laptop Acer ES1 533', 25, '2022-04-03 10:56:10', '2022-04-03 10:56:10', 3, 5, 6),
(14, 'LT004', 'Laptop Lenovo IdeaPad 110', 'img-pro-20.png', 21000000, 19999000, 'Laptop Lenovo IdeaPad 110', 'Laptop Lenovo IdeaPad 110', 15, NULL, NULL, 3, 5, 8),
(15, 'LT005', 'Laptop Asus X441NA', 'img-pro-21.png', 19699000, 17779000, 'Laptop Asus X441NA', 'Laptop Asus X441NA', 15, '2022-04-03 10:56:10', '2022-04-03 10:56:10', 3, 5, 6),
(16, 'LT006', 'Laptop Acer Aspire ES1', 'img-pro-22.png', 22999000, 20899000, 'Laptop Acer Aspire ES1', 'Laptop Acer Aspire ES1', 25, '2022-04-03 10:56:10', '2022-04-03 10:56:10', 3, 5, 6),
(17, 'LT007', 'Laptop Lenovo IdeaPad 120S', 'img-pro-23.png', 22699000, 20999000, 'Laptop Lenovo IdeaPad 120S', 'Laptop Lenovo IdeaPad 120S', 25, '2022-04-03 10:56:10', '2022-04-03 10:56:10', 3, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `imageId` int NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `productId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `sliderId` int NOT NULL,
  `sliderName` varchar(50) NOT NULL,
  `sliderUrl` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `gender` tinyint(1) NOT NULL,
  `role` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `username`, `password`, `firstName`, `lastName`, `email`, `phoneNumber`, `address`, `gender`, `role`, `createdAt`, `updateAt`) VALUES
(2, 'huyendau', '2637a5c30af69a7bad877fdb65fbd78b', 'Nguyễn  Thị', 'Hương', 'huyendau0712@gmail.com', '0385930875', 'Xóm 2, Diễn Tân, Diễn Châu, Nghệ An', 1, 1, NULL, NULL);

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
-- Indexes for table `tbl_manufacturers`
--
ALTER TABLE `tbl_manufacturers`
  ADD PRIMARY KEY (`manufactureId`);

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
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_cat` (`catId`),
  ADD KEY `manufacturer_product` (`manufactureId`),
  ADD KEY `product_color` (`colorId`);

--
-- Indexes for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`sliderId`);

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
  MODIFY `cartId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `itemId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `catId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `colorId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_manufacturers`
--
ALTER TABLE `tbl_manufacturers`
  MODIFY `manufactureId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pageId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `postId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `productId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `imageId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `sliderId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `manufacturer_product` FOREIGN KEY (`manufactureId`) REFERENCES `tbl_manufacturers` (`manufactureId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_cat` FOREIGN KEY (`catId`) REFERENCES `tbl_categories` (`catId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_color` FOREIGN KEY (`colorId`) REFERENCES `tbl_colors` (`colorId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
