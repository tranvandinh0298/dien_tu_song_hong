-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 07:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_songhong`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: không hoạt động, 1: hoạt động',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `image`, `status`, `created_time`, `updated_time`) VALUES
(15, 'Khóa khách sạn RFID', 'khoa-khach-san-rfid', 'public/assets/images/categories/icon_hotel_lock.png', 1, '2023-03-10 14:06:59', '2023-03-10 14:06:59'),
(16, 'Két sắt khách sạn', 'ket-sat-khach-san', 'public/assets/images/categories/icon_hotel_safe.png', 1, '2023-03-10 14:08:01', '2023-03-10 14:08:01'),
(17, 'Minibar', 'minibar', 'public/assets/images/categories/icon_minibar.png', 1, '2023-03-10 14:10:26', '2023-03-10 14:10:26'),
(18, 'Khách sạn thông minh', 'khach-san-thong-minh', 'public/assets/images/categories/icon_smart_hotel.png', 1, '2023-03-10 14:11:19', '2023-03-10 14:11:19'),
(19, 'Khóa nhà tắm', 'khoa-nha-tam', 'public/assets/images/categories/icon_bathroom_lock.png', 1, '2023-03-10 14:12:02', '2023-03-10 14:12:02'),
(20, 'Khóa tủ', 'khoa-tu', 'public/assets/images/categories/icon_clothset_lock.png', 1, '2023-03-10 14:13:25', '2023-03-10 14:13:25'),
(21, 'Phụ kiện khóa ', 'phu-kien-khoa', 'public/assets/images/categories/icon_addition.png', 1, '2023-03-10 14:14:41', '2023-03-10 14:14:41'),
(22, 'Điện thoại khách sạn', 'dien-thoai-khach-san', 'public/assets/images/categories/icon_hotel_phone.png', 1, '2023-03-10 14:15:15', '2023-03-10 14:15:15'),
(23, 'Công tắc phòng', 'cong-tac-phong', 'public/assets/images/categories/icon_switch.png', 1, '2023-03-10 14:15:50', '2023-03-10 14:15:50'),
(24, 'Máy sấy tóc khách sạn', 'may-say-toc-khach-san', 'public/assets/images/categories/icon_hair_driver.png', 1, '2023-03-10 14:16:36', '2023-03-10 14:16:36'),
(25, 'Ấm siêu tốc khách sạn', 'am-sieu-toc-khach-san', 'public/assets/images/categories/icon_kettel.png', 1, '2023-03-10 14:17:16', '2023-03-10 14:17:16'),
(26, 'Biển tên phòng', 'bien-ten-phong', 'public/assets/images/categories/icon_door_plate.png', 1, '2023-03-10 14:18:40', '2023-03-10 14:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: chưa đọc, 1: đã đọc',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: hình ảnh sản phẩm, 1: chi tiết sản phẩm dạng ảnh',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: không hoạt động, 1: có hoạt động',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `image`, `type`, `status`, `created_time`, `updated_time`) VALUES
(1, 1, 'public/assets/images/products/1/1-22060611112R43.jpg', 0, 1, '2023-03-12 00:18:13', '2023-03-12 00:18:13'),
(2, 1, 'public/assets/images/products/1/1-220606111151M1.jpg', 0, 1, '2023-03-12 00:18:16', '2023-03-12 00:18:16'),
(3, 1, 'public/assets/images/products/1/1-22060611113T15.jpg', 0, 1, '2023-03-12 00:18:17', '2023-03-12 00:18:17'),
(4, 1, 'public/assets/images/products/1/1-220606111203205.jpg', 0, 1, '2023-03-12 00:18:58', '2023-03-12 00:18:58'),
(5, 1, 'public/assets/images/products/1/1-220606111223R3.jpg', 0, 1, '2023-03-12 00:18:59', '2023-03-12 00:18:59'),
(6, 1, 'public/assets/images/products/1/1-220606111232101.jpg', 0, 1, '2023-03-12 00:18:59', '2023-03-12 00:18:59'),
(7, 1, 'public/assets/images/products/1/1-2206061112139E.jpg', 0, 1, '2023-03-12 00:19:06', '2023-03-12 00:19:06'),
(8, 1, 'public/assets/images/products/1/1-220606115213U9.jpg', 1, 1, '2023-03-12 00:21:54', '2023-03-12 00:21:54'),
(9, 1, 'public/assets/images/products/1/1-220606115255T8.jpg', 1, 1, '2023-03-12 00:21:55', '2023-03-12 00:21:55'),
(10, 1, 'public/assets/images/products/1/1-220606115304552.jpg', 1, 1, '2023-03-12 00:21:56', '2023-03-12 00:21:56'),
(11, 1, 'public/assets/images/products/1/1-220606115313201.jpg', 1, 1, '2023-03-12 00:21:57', '2023-03-12 00:21:57'),
(12, 1, 'public/assets/images/products/1/1-2206061153214Z.jpg', 1, 1, '2023-03-12 00:21:58', '2023-03-12 00:21:58'),
(13, 1, 'public/assets/images/products/1/1-220606115329123.jpg', 1, 1, '2023-03-12 00:22:00', '2023-03-12 00:22:00'),
(14, 1, 'public/assets/images/products/1/1-22060611533I45.jpg', 1, 1, '2023-03-12 00:22:00', '2023-03-12 00:22:00'),
(15, 1, 'public/assets/images/products/1/1-22112514495AJ.jpg', 1, 1, '2023-03-12 00:22:01', '2023-03-12 00:22:01'),
(16, 1, 'public/assets/images/products/1/1-2204020S35R91.jpg', 1, 1, '2023-03-12 00:22:02', '2023-03-12 00:22:02'),
(17, 2, 'public/assets/images/products/2/1-200414114Z01b.jpg', 0, 1, '2023-03-12 12:38:48', '2023-03-12 12:38:48'),
(18, 2, 'public/assets/images/products/2/1-200414114915923.jpg', 0, 1, '2023-03-12 12:38:50', '2023-03-12 12:38:50'),
(19, 2, 'public/assets/images/products/2/1-20041411441SY.jpg', 0, 1, '2023-03-12 12:38:52', '2023-03-12 12:38:52'),
(20, 2, 'public/assets/images/products/2/1-2004141144462V.jpg', 0, 1, '2023-03-12 12:38:53', '2023-03-12 12:38:53'),
(21, 2, 'public/assets/images/products/2/1-200414114504Z0.jpg', 0, 1, '2023-03-12 12:38:55', '2023-03-12 12:38:55'),
(22, 2, 'public/assets/images/products/2/1-2111300RR2129.jpg', 1, 1, '2023-03-12 12:40:17', '2023-03-12 12:40:17'),
(23, 2, 'public/assets/images/products/2/1-2111300RS2209.jpg', 1, 1, '2023-03-12 12:40:20', '2023-03-12 12:40:20'),
(24, 2, 'public/assets/images/products/2/1-2111300RT0206.jpg', 1, 1, '2023-03-12 12:40:22', '2023-03-12 12:40:22'),
(25, 2, 'public/assets/images/products/2/1-2205060T501553.jpg', 1, 1, '2023-03-12 12:40:23', '2023-03-12 12:40:23'),
(26, 2, 'public/assets/images/products/2/1-2111300RUWV.jpg', 1, 1, '2023-03-12 12:40:24', '2023-03-12 12:40:24'),
(27, 2, 'public/assets/images/products/2/1-2204020S35R91 (1).jpg', 1, 1, '2023-03-12 12:40:26', '2023-03-12 12:40:26'),
(28, 2, 'public/assets/images/products/2/1-2111300RZW04.jpg', 1, 1, '2023-03-12 12:40:30', '2023-03-12 12:40:30'),
(29, 3, 'public/assets/images/products/3/1-200QQ35ZCc.jpg', 0, 1, '2023-03-12 12:41:44', '2023-03-12 12:41:44'),
(30, 3, 'public/assets/images/products/3/1-200QQ41226396.jpg', 0, 1, '2023-03-12 12:41:46', '2023-03-12 12:41:46'),
(31, 3, 'public/assets/images/products/3/1-200QQ405102B.jpg', 0, 1, '2023-03-12 12:41:47', '2023-03-12 12:41:47'),
(32, 3, 'public/assets/images/products/3/1-2206231H324P3.jpg', 0, 1, '2023-03-12 12:41:48', '2023-03-12 12:41:48'),
(33, 3, 'public/assets/images/products/3/1-2206231H354T2.jpg', 0, 1, '2023-03-12 12:41:49', '2023-03-12 12:41:49'),
(34, 3, 'public/assets/images/products/3/1-2206231H334G4.jpg', 0, 1, '2023-03-12 12:41:49', '2023-03-12 12:41:49'),
(35, 3, 'public/assets/images/products/3/1-2206231H344302.jpg', 0, 1, '2023-03-12 12:41:50', '2023-03-12 12:41:50'),
(36, 3, 'public/assets/images/products/3/1-211201162Q4548.jpg', 1, 1, '2023-03-12 12:42:42', '2023-03-12 12:42:42'),
(37, 3, 'public/assets/images/products/3/1-211201162RL20.jpg', 1, 1, '2023-03-12 12:42:43', '2023-03-12 12:42:43'),
(38, 3, 'public/assets/images/products/3/1-211201162S4931.jpg', 1, 1, '2023-03-12 12:42:44', '2023-03-12 12:42:44'),
(39, 3, 'public/assets/images/products/3/1-2205060STVE.jpg', 1, 1, '2023-03-12 12:42:45', '2023-03-12 12:42:45'),
(40, 3, 'public/assets/images/products/3/1-211201162U4F6.jpg', 1, 1, '2023-03-12 12:42:46', '2023-03-12 12:42:46'),
(42, 3, 'public/assets/images/products/3/1-221125150532Z4.jpg', 1, 1, '2023-03-12 12:42:54', '2023-03-12 12:42:54'),
(43, 3, 'public/assets/images/products/3/1-2204020S35R91 (2).jpg', 1, 1, '2023-03-12 12:44:52', '2023-03-12 12:44:52'),
(44, 4, 'public/assets/images/products/4/1-210511154120262.jpg', 0, 1, '2023-03-12 12:51:44', '2023-03-12 12:51:44'),
(45, 4, 'public/assets/images/products/4/1-21051115432N25.jpg', 0, 1, '2023-03-12 12:51:47', '2023-03-12 12:51:47'),
(46, 4, 'public/assets/images/products/4/1-210511154154b9.jpg', 0, 1, '2023-03-12 12:51:48', '2023-03-12 12:51:48'),
(47, 4, 'public/assets/images/products/4/1-210511154143456.jpg', 0, 1, '2023-03-12 12:51:48', '2023-03-12 12:51:48'),
(48, 4, 'public/assets/images/products/4/1-21111G12619309.jpg', 1, 1, '2023-03-12 12:55:40', '2023-03-12 12:55:40'),
(49, 4, 'public/assets/images/products/4/1-21111G1263G42.jpg', 1, 1, '2023-03-12 12:55:41', '2023-03-12 12:55:41'),
(50, 4, 'public/assets/images/products/4/1-220429112642564.jpg', 1, 1, '2023-03-12 12:55:42', '2023-03-12 12:55:42'),
(51, 4, 'public/assets/images/products/4/1-21111G12F6245.jpg', 1, 1, '2023-03-12 12:55:42', '2023-03-12 12:55:42'),
(52, 4, 'public/assets/images/products/4/1-21111G12H0b0.jpg', 1, 1, '2023-03-12 12:55:43', '2023-03-12 12:55:43'),
(53, 4, 'public/assets/images/products/4/1-21111G1323Y23.jpg', 1, 1, '2023-03-12 12:55:44', '2023-03-12 12:55:44'),
(54, 4, 'public/assets/images/products/4/1-21111G13I2393.jpg', 1, 1, '2023-03-12 12:55:45', '2023-03-12 12:55:45'),
(55, 4, 'public/assets/images/products/4/1-21111G12K2303.jpg', 1, 1, '2023-03-12 12:55:46', '2023-03-12 12:55:46'),
(56, 4, 'public/assets/images/products/4/1-21111G12PE24.jpg', 1, 1, '2023-03-12 12:55:47', '2023-03-12 12:55:47'),
(57, 4, 'public/assets/images/products/4/1-21111G1405V94.jpg', 1, 1, '2023-03-12 12:55:48', '2023-03-12 12:55:48'),
(58, 4, 'public/assets/images/products/4/1-2204020S35R91.jpg', 1, 1, '2023-03-12 12:55:49', '2023-03-12 12:55:49'),
(59, 5, 'public/assets/images/products/5/1-2004131H346159.jpg', 0, 1, '2023-03-12 12:57:47', '2023-03-12 12:57:47'),
(60, 5, 'public/assets/images/products/5/1-2004131H403K2.jpg', 0, 1, '2023-03-12 12:57:47', '2023-03-12 12:57:47'),
(61, 5, 'public/assets/images/products/5/1-2004131H503394.jpg', 0, 1, '2023-03-12 12:57:48', '2023-03-12 12:57:48'),
(62, 5, 'public/assets/images/products/5/1-2004131H52B24.jpg', 0, 1, '2023-03-12 12:57:48', '2023-03-12 12:57:48'),
(63, 5, 'public/assets/images/products/5/1-200413151H05I.jpg', 0, 1, '2023-03-12 12:57:49', '2023-03-12 12:57:49'),
(64, 5, 'public/assets/images/products/5/1-20041315214S15.jpg', 0, 1, '2023-03-12 12:57:49', '2023-03-12 12:57:49'),
(65, 5, 'public/assets/images/products/5/1-20041315210U57.jpg', 0, 1, '2023-03-12 12:57:50', '2023-03-12 12:57:50'),
(66, 5, 'public/assets/images/products/5/1-200413152131K3.jpg', 0, 1, '2023-03-12 12:57:51', '2023-03-12 12:57:51'),
(67, 5, 'public/assets/images/products/5/1-211201113041L2.jpg', 1, 1, '2023-03-12 13:00:14', '2023-03-12 13:00:14'),
(68, 5, 'public/assets/images/products/5/1-221216103412247.jpg', 1, 1, '2023-03-12 13:00:14', '2023-03-12 13:00:14'),
(69, 5, 'public/assets/images/products/5/1-22121610342L17.jpg', 1, 1, '2023-03-12 13:00:15', '2023-03-12 13:00:15'),
(70, 5, 'public/assets/images/products/5/1-22121610344J03.jpg', 1, 1, '2023-03-12 13:00:15', '2023-03-12 13:00:15'),
(71, 5, 'public/assets/images/products/5/1-221216103459507.jpg', 1, 1, '2023-03-12 13:00:16', '2023-03-12 13:00:16'),
(72, 5, 'public/assets/images/products/5/1-211201113152331.jpg', 1, 1, '2023-03-12 13:00:16', '2023-03-12 13:00:16'),
(73, 5, 'public/assets/images/products/5/1-22121610353DC.jpg', 1, 1, '2023-03-12 13:00:17', '2023-03-12 13:00:17'),
(74, 5, 'public/assets/images/products/5/1-221216103522915.jpg', 1, 1, '2023-03-12 13:00:18', '2023-03-12 13:00:18'),
(75, 6, 'public/assets/images/products/6/1-200414095643325.jpg', 0, 1, '2023-03-12 13:38:45', '2023-03-12 13:38:45'),
(76, 6, 'public/assets/images/products/6/1-200414095A62H.jpg', 0, 1, '2023-03-12 13:38:45', '2023-03-12 13:38:45'),
(77, 6, 'public/assets/images/products/6/1-200414095G1H4.jpg', 0, 1, '2023-03-12 13:38:45', '2023-03-12 13:38:45'),
(78, 6, 'public/assets/images/products/6/1-200414095HUA.jpg', 0, 1, '2023-03-12 13:38:46', '2023-03-12 13:38:46'),
(79, 6, 'public/assets/images/products/6/1-2212160QP12R.jpg', 0, 1, '2023-03-12 13:38:46', '2023-03-12 13:38:46'),
(80, 6, 'public/assets/images/products/6/1-2004141002103Q.jpg', 0, 1, '2023-03-12 13:38:47', '2023-03-12 13:38:47'),
(81, 6, 'public/assets/images/products/6/1-2212160QJ4221.jpg', 0, 1, '2023-03-12 13:38:48', '2023-03-12 13:38:48'),
(82, 6, 'public/assets/images/products/6/1-20052FS94C92.jpg', 1, 1, '2023-03-12 13:44:23', '2023-03-12 13:44:23'),
(83, 6, 'public/assets/images/products/6/1-200QQ4313NB.jpg', 1, 1, '2023-03-12 13:44:24', '2023-03-12 13:44:24'),
(84, 6, 'public/assets/images/products/6/1-220429113224S4.jpg', 1, 1, '2023-03-12 13:44:26', '2023-03-12 13:44:26'),
(85, 6, 'public/assets/images/products/6/1-2006011H932192.jpg', 1, 1, '2023-03-12 13:44:26', '2023-03-12 13:44:26'),
(86, 6, 'public/assets/images/products/6/1-221125145400441.jpg', 1, 1, '2023-03-12 13:44:26', '2023-03-12 13:44:26'),
(87, 6, 'public/assets/images/products/6/1-200F6161330I8.jpg', 1, 1, '2023-03-12 13:44:27', '2023-03-12 13:44:27'),
(88, 6, 'public/assets/images/products/6/1-21111G1405V94.jpg', 1, 1, '2023-03-12 13:44:28', '2023-03-12 13:44:28'),
(89, 6, 'public/assets/images/products/6/1-2006020U025614.jpg', 1, 1, '2023-03-12 13:44:29', '2023-03-12 13:44:29'),
(90, 6, 'public/assets/images/products/6/1-2204020S35R91.jpg', 1, 1, '2023-03-12 13:44:30', '2023-03-12 13:44:30'),
(91, 7, 'public/assets/images/products/7/1-2004140Z423545.jpg', 0, 1, '2023-03-12 13:45:47', '2023-03-12 13:49:02'),
(92, 7, 'public/assets/images/products/7/1-200414092325b6.jpg', 0, 1, '2023-03-12 13:45:48', '2023-03-12 13:49:05'),
(93, 7, 'public/assets/images/products/7/1-200414092341562.jpg', 0, 1, '2023-03-12 13:45:48', '2023-03-12 13:49:08'),
(94, 7, 'public/assets/images/products/7/1-2004140RFT95.jpg', 0, 1, '2023-03-12 13:45:49', '2023-03-12 13:49:11'),
(95, 7, 'public/assets/images/products/7/1-2004140R644304.jpg', 0, 1, '2023-03-12 13:45:49', '2023-03-12 13:49:13'),
(96, 7, 'public/assets/images/products/7/1-2004140RH53X.jpg', 0, 1, '2023-03-12 13:45:58', '2023-03-12 13:49:16'),
(97, 7, 'public/assets/images/products/7/1-21113016102SU.jpg', 1, 1, '2023-03-12 13:49:32', '2023-03-12 13:49:32'),
(98, 7, 'public/assets/images/products/7/1-2112010SP0227.jpg', 1, 1, '2023-03-12 13:49:33', '2023-03-12 13:49:33'),
(99, 7, 'public/assets/images/products/7/1-21113016103Q02.jpg', 1, 1, '2023-03-12 13:49:33', '2023-03-12 13:49:33'),
(100, 7, 'public/assets/images/products/7/1-21113016104RI.jpg', 1, 1, '2023-03-12 13:49:34', '2023-03-12 13:49:34'),
(101, 7, 'public/assets/images/products/7/1-2205060T214406.jpg', 1, 1, '2023-03-12 13:49:34', '2023-03-12 13:49:34'),
(102, 7, 'public/assets/images/products/7/1-211130161103417.jpg', 1, 1, '2023-03-12 13:49:35', '2023-03-12 13:49:35'),
(103, 7, 'public/assets/images/products/7/1-221125145540L8.jpg', 1, 1, '2023-03-12 13:49:36', '2023-03-12 13:49:36'),
(104, 7, 'public/assets/images/products/7/1-2204020S35R91.jpg', 1, 1, '2023-03-12 13:49:38', '2023-03-12 13:49:38'),
(105, 8, 'public/assets/images/products/8/1-221125154149529.jpg', 0, 1, '2023-03-12 13:52:06', '2023-03-12 13:52:06'),
(106, 8, 'public/assets/images/products/8/1-2004141051194C.jpg', 0, 1, '2023-03-12 13:52:07', '2023-03-12 13:52:07'),
(107, 8, 'public/assets/images/products/8/1-200414105134405.jpg', 0, 1, '2023-03-12 13:52:07', '2023-03-12 13:52:07'),
(108, 8, 'public/assets/images/products/8/1-20041410515J63.jpg', 0, 1, '2023-03-12 13:52:08', '2023-03-12 13:52:08'),
(109, 8, 'public/assets/images/products/8/1-200414110435527.jpg', 0, 1, '2023-03-12 13:52:08', '2023-03-12 13:52:08'),
(110, 8, 'public/assets/images/products/8/1-200414110402641.jpg', 0, 1, '2023-03-12 13:52:08', '2023-03-12 13:52:08'),
(111, 8, 'public/assets/images/products/8/1-20041411041TH.jpg', 0, 1, '2023-03-12 13:52:09', '2023-03-12 13:52:09'),
(112, 8, 'public/assets/images/products/8/1-2006020Z625N4.png', 1, 1, '2023-03-12 13:54:32', '2023-03-12 13:54:32'),
(113, 8, 'public/assets/images/products/8/1-2006020Z641C9.png', 1, 1, '2023-03-12 13:54:33', '2023-03-12 13:54:33'),
(114, 8, 'public/assets/images/products/8/1-2006020ZF2b9.png', 1, 1, '2023-03-12 13:54:34', '2023-03-12 13:54:34'),
(115, 8, 'public/assets/images/products/8/1-200602115021322.jpg', 1, 1, '2023-03-12 13:54:35', '2023-03-12 13:54:35'),
(116, 8, 'public/assets/images/products/8/1-2006020ZI23X.png', 1, 1, '2023-03-12 13:54:35', '2023-03-12 13:54:35'),
(117, 8, 'public/assets/images/products/8/1-221125150931457.jpg', 1, 1, '2023-03-12 13:54:36', '2023-03-12 13:54:36'),
(118, 8, 'public/assets/images/products/8/1-2006020ZP3248.jpg', 1, 1, '2023-03-12 13:54:37', '2023-03-12 13:54:37'),
(119, 8, 'public/assets/images/products/8/1-2204020S35R91.jpg', 1, 1, '2023-03-12 13:54:38', '2023-03-12 13:54:38'),
(120, 8, 'public/assets/images/products/8/1-21111G40424308.jpg', 1, 1, '2023-03-12 13:54:39', '2023-03-12 13:54:39'),
(121, 9, 'public/assets/images/products/9/1-20041416015IB.jpg', 0, 1, '2023-03-12 13:57:12', '2023-03-12 13:57:12'),
(122, 9, 'public/assets/images/products/9/1-200414161023221.jpg', 0, 1, '2023-03-12 13:57:12', '2023-03-12 13:57:12'),
(123, 9, 'public/assets/images/products/9/1-200414161103339.jpg', 0, 1, '2023-03-12 13:57:13', '2023-03-12 13:57:13'),
(124, 9, 'public/assets/images/products/9/1-200414155225564.jpg', 0, 1, '2023-03-12 13:57:13', '2023-03-12 13:57:13'),
(125, 9, 'public/assets/images/products/9/1-200414155254447.jpg', 0, 1, '2023-03-12 13:57:14', '2023-03-12 13:57:14'),
(126, 9, 'public/assets/images/products/9/1-20041415534E30.jpg', 0, 1, '2023-03-12 13:57:15', '2023-03-12 13:57:15'),
(127, 9, 'public/assets/images/products/9/1-200414155409128.jpg', 0, 1, '2023-03-12 13:57:15', '2023-03-12 13:57:15'),
(128, 9, 'public/assets/images/products/9/1-2111261GPJ24.jpg', 1, 1, '2023-03-12 13:58:14', '2023-03-12 13:58:14'),
(129, 9, 'public/assets/images/products/9/1-2111261GR0F0.jpg', 1, 1, '2023-03-12 13:58:15', '2023-03-12 13:58:15'),
(130, 9, 'public/assets/images/products/9/1-2111261GS0407.jpg', 1, 1, '2023-03-12 13:58:15', '2023-03-12 13:58:15'),
(131, 9, 'public/assets/images/products/9/1-2205060T0433T.jpg', 1, 1, '2023-03-12 13:58:15', '2023-03-12 13:58:15'),
(132, 9, 'public/assets/images/products/9/1-2111261GU0b7.jpg', 1, 1, '2023-03-12 13:58:16', '2023-03-12 13:58:16'),
(133, 9, 'public/assets/images/products/9/1-2111291102212H.jpg', 1, 1, '2023-03-12 13:58:16', '2023-03-12 13:58:16'),
(134, 9, 'public/assets/images/products/9/1-221125151250440.jpg', 1, 1, '2023-03-12 13:58:18', '2023-03-12 13:58:18'),
(135, 9, 'public/assets/images/products/9/1-2204020S35R91.jpg', 1, 1, '2023-03-12 13:58:26', '2023-03-12 13:58:26'),
(136, 10, 'public/assets/images/products/10/1-200414101241330.jpg', 0, 1, '2023-03-12 14:00:16', '2023-03-12 14:00:16'),
(137, 10, 'public/assets/images/products/10/1-200414101255423.jpg', 0, 1, '2023-03-12 14:00:17', '2023-03-12 14:00:17'),
(138, 10, 'public/assets/images/products/10/1-2004141013115Q.jpg', 0, 1, '2023-03-12 14:00:17', '2023-03-12 14:00:17'),
(139, 10, 'public/assets/images/products/10/1-200414101330L6.jpg', 0, 1, '2023-03-12 14:00:18', '2023-03-12 14:00:18'),
(140, 10, 'public/assets/images/products/10/1-2005121H2503R.jpg', 0, 1, '2023-03-12 14:00:18', '2023-03-12 14:00:18'),
(141, 10, 'public/assets/images/products/10/1-2005121H22aL.jpg', 0, 1, '2023-03-12 14:00:19', '2023-03-12 14:00:19'),
(142, 10, 'public/assets/images/products/10/1-2005121H239325.jpg', 0, 1, '2023-03-12 14:00:20', '2023-03-12 14:00:20'),
(143, 10, 'public/assets/images/products/10/1-2112011510393X.jpg', 1, 1, '2023-03-12 14:01:18', '2023-03-12 14:01:18'),
(144, 10, 'public/assets/images/products/10/1-211201151102U4.jpg', 1, 1, '2023-03-12 14:01:19', '2023-03-12 14:01:19'),
(145, 10, 'public/assets/images/products/10/1-2112011510512O.jpg', 1, 1, '2023-03-12 14:01:21', '2023-03-12 14:01:21'),
(146, 10, 'public/assets/images/products/10/1-2205060T351W3.jpg', 1, 1, '2023-03-12 14:01:22', '2023-03-12 14:01:22'),
(147, 10, 'public/assets/images/products/10/1-21120115111Q60.jpg', 1, 1, '2023-03-12 14:01:23', '2023-03-12 14:01:23'),
(148, 10, 'public/assets/images/products/10/1-221125151119210.jpg', 1, 1, '2023-03-12 14:01:25', '2023-03-12 14:01:25'),
(149, 10, 'public/assets/images/products/10/1-2204020S35R91.jpg', 1, 1, '2023-03-12 14:01:26', '2023-03-12 14:01:26'),
(150, 11, 'public/assets/images/products/11/1-200414150Q52Q.jpg', 0, 1, '2023-03-12 14:02:48', '2023-03-12 14:02:48'),
(151, 11, 'public/assets/images/products/11/1-200414150S5C7.jpg', 0, 1, '2023-03-12 14:02:49', '2023-03-12 14:02:49'),
(152, 11, 'public/assets/images/products/11/1-200414150U5135.jpg', 0, 1, '2023-03-12 14:02:49', '2023-03-12 14:02:49'),
(153, 11, 'public/assets/images/products/11/1-200414151221594.jpg', 0, 1, '2023-03-12 14:02:50', '2023-03-12 14:02:50'),
(154, 11, 'public/assets/images/products/11/1-200414151333196.jpg', 0, 1, '2023-03-12 14:02:51', '2023-03-12 14:02:51'),
(155, 11, 'public/assets/images/products/11/1-200414151042595.jpg', 0, 1, '2023-03-12 14:02:51', '2023-03-12 14:02:51'),
(156, 11, 'public/assets/images/products/11/1-200602103H53V.jpg', 1, 1, '2023-03-12 14:04:39', '2023-03-12 14:04:39'),
(157, 11, 'public/assets/images/products/11/1-200602103I3331.jpg', 1, 1, '2023-03-12 14:04:40', '2023-03-12 14:04:40'),
(158, 11, 'public/assets/images/products/11/1-2211251514344W.jpg', 1, 1, '2023-03-12 14:04:42', '2023-03-12 14:04:42'),
(159, 11, 'public/assets/images/products/11/1-22050G03544324.jpg', 1, 1, '2023-03-12 14:04:44', '2023-03-12 14:04:44'),
(160, 11, 'public/assets/images/products/11/1-21111G42020445.jpg', 1, 1, '2023-03-12 14:04:44', '2023-03-12 14:04:44'),
(161, 11, 'public/assets/images/products/11/1-2006020U025614.jpg', 1, 1, '2023-03-12 14:04:45', '2023-03-12 14:04:45'),
(162, 11, 'public/assets/images/products/11/1-2204020S35R91.jpg', 1, 1, '2023-03-12 14:04:46', '2023-03-12 14:04:46'),
(163, 12, 'public/assets/images/products/12/1-200414111529193.jpg', 0, 1, '2023-03-12 14:06:14', '2023-03-12 14:06:14'),
(164, 12, 'public/assets/images/products/12/1-200414111555522.jpg', 0, 1, '2023-03-12 14:06:15', '2023-03-12 14:06:15'),
(165, 12, 'public/assets/images/products/12/1-20041411161Q27.jpg', 0, 1, '2023-03-12 14:06:15', '2023-03-12 14:06:15'),
(166, 12, 'public/assets/images/products/12/1-200414112033V4.jpg', 0, 1, '2023-03-12 14:06:16', '2023-03-12 14:06:16'),
(167, 12, 'public/assets/images/products/12/1-200414111JH34.jpg', 0, 1, '2023-03-12 14:06:17', '2023-03-12 14:06:17'),
(168, 12, 'public/assets/images/products/12/1-200414112RXB.jpg', 0, 1, '2023-03-12 14:06:17', '2023-03-12 14:06:17'),
(169, 12, 'public/assets/images/products/12/1-211130094Q5464.jpg', 1, 1, '2023-03-12 14:07:30', '2023-03-12 14:07:30'),
(170, 12, 'public/assets/images/products/12/1-211130094RNL.jpg', 1, 1, '2023-03-12 14:07:30', '2023-03-12 14:07:30'),
(171, 12, 'public/assets/images/products/12/1-211130094S6450.jpg', 1, 1, '2023-03-12 14:07:31', '2023-03-12 14:07:31'),
(172, 12, 'public/assets/images/products/12/1-2205060T631235.jpg', 1, 1, '2023-03-12 14:07:32', '2023-03-12 14:07:32'),
(173, 12, 'public/assets/images/products/12/1-211130094U1425.jpg', 1, 1, '2023-03-12 14:07:32', '2023-03-12 14:07:32'),
(174, 12, 'public/assets/images/products/12/1-22112515035b18.jpg', 1, 1, '2023-03-12 14:07:34', '2023-03-12 14:07:34'),
(175, 12, 'public/assets/images/products/12/1-2204020S35R91.jpg', 1, 1, '2023-03-12 14:07:35', '2023-03-12 14:07:35'),
(176, 13, 'public/assets/images/products/13/1-2206141521562W.jpg', 0, 1, '2023-03-12 14:57:45', '2023-03-12 14:57:45'),
(177, 13, 'public/assets/images/products/13/1-22061415220M52.jpg', 0, 1, '2023-03-12 14:57:46', '2023-03-12 14:57:46'),
(178, 13, 'public/assets/images/products/13/1-22061415221VD.jpg', 0, 1, '2023-03-12 14:57:46', '2023-03-12 14:57:46'),
(179, 13, 'public/assets/images/products/13/1-22061415222U51.jpg', 0, 1, '2023-03-12 14:57:47', '2023-03-12 14:57:47'),
(180, 13, 'public/assets/images/products/13/1-220614152542O2.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(181, 13, 'public/assets/images/products/13/1-220614152411925.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(182, 13, 'public/assets/images/products/13/1-220614152402H3.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(183, 13, 'public/assets/images/products/13/1-22061415232NL.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(184, 13, 'public/assets/images/products/13/1-220614152350545.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(185, 13, 'public/assets/images/products/13/1-2206141523412L.jpg', 1, 1, '2023-03-12 14:58:36', '2023-03-12 14:58:36'),
(186, 14, 'public/assets/images/products/14/1-220614145213512.jpg', 0, 1, '2023-03-12 14:59:20', '2023-03-12 14:59:20'),
(187, 14, 'public/assets/images/products/14/1-220614145221639.jpg', 0, 1, '2023-03-12 14:59:20', '2023-03-12 14:59:20'),
(188, 14, 'public/assets/images/products/14/1-22061414523H34.jpg', 0, 1, '2023-03-12 14:59:20', '2023-03-12 14:59:20'),
(189, 14, 'public/assets/images/products/14/1-22061414522W55.jpg', 0, 1, '2023-03-12 14:59:20', '2023-03-12 14:59:20'),
(190, 14, 'public/assets/images/products/14/1-22061414545Y48.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(191, 14, 'public/assets/images/products/14/1-220614145509420.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(192, 14, 'public/assets/images/products/14/1-2206141454005D.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(193, 14, 'public/assets/images/products/14/1-22061414544N03.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(194, 14, 'public/assets/images/products/14/1-220614145435439.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(195, 14, 'public/assets/images/products/14/1-2206141454239D.jpg', 1, 1, '2023-03-12 15:00:20', '2023-03-12 15:00:20'),
(196, 14, 'public/assets/images/products/14/1-220614145411619.jpg', 1, 1, '2023-03-12 15:00:21', '2023-03-12 15:00:21'),
(197, 15, 'public/assets/images/products/15/1-200622111152B6.jpg', 0, 1, '2023-03-12 15:01:22', '2023-03-12 15:01:22'),
(198, 15, 'public/assets/images/products/15/1-20062211121A25.jpg', 0, 1, '2023-03-12 15:01:22', '2023-03-12 15:01:22'),
(199, 15, 'public/assets/images/products/15/1-2006221112041L.jpg', 0, 1, '2023-03-12 15:01:23', '2023-03-12 15:01:23'),
(200, 15, 'public/assets/images/products/15/1-200622111140318.jpg', 0, 1, '2023-03-12 15:01:23', '2023-03-12 15:01:23'),
(201, 15, 'public/assets/images/products/15/1-210Q31G6302P.jpg', 1, 1, '2023-03-12 15:02:48', '2023-03-12 15:02:48'),
(202, 15, 'public/assets/images/products/15/1-210Q31GAK19.jpg', 1, 1, '2023-03-12 15:02:50', '2023-03-12 15:02:50'),
(203, 15, 'public/assets/images/products/15/1-210Q31GG04D.jpg', 1, 1, '2023-03-12 15:02:52', '2023-03-12 15:02:52'),
(204, 15, 'public/assets/images/products/15/1-210Q31GH5c7.jpg', 1, 1, '2023-03-12 15:02:55', '2023-03-12 15:02:55'),
(205, 15, 'public/assets/images/products/15/1-210Q31GJ04C.jpg', 1, 1, '2023-03-12 15:02:59', '2023-03-12 15:02:59'),
(206, 15, 'public/assets/images/products/15/1-210Q31GK51F.jpg', 1, 1, '2023-03-12 15:03:02', '2023-03-12 15:03:02'),
(207, 15, 'public/assets/images/products/15/1-210Q31GQ2334.jpg', 1, 1, '2023-03-12 15:03:06', '2023-03-12 15:03:06'),
(208, 15, 'public/assets/images/products/15/1-210Q31GR4255.jpg', 1, 1, '2023-03-12 15:03:08', '2023-03-12 15:03:08'),
(210, 15, 'public/assets/images/products/15/1-210Q31GU0I3.jpg', 1, 1, '2023-03-12 15:04:04', '2023-03-12 15:04:04'),
(211, 15, 'public/assets/images/products/15/1-210Q31GZ2R0.jpg', 1, 1, '2023-03-12 15:04:05', '2023-03-12 15:04:05'),
(212, 16, 'public/assets/images/products/16/1-201202135534636.jpg', 0, 1, '2023-03-12 15:06:17', '2023-03-12 15:06:17'),
(213, 16, 'public/assets/images/products/16/1-201202135511335.jpg', 0, 1, '2023-03-12 15:06:17', '2023-03-12 15:06:17'),
(214, 16, 'public/assets/images/products/16/1-201202135501M8.jpg', 0, 1, '2023-03-12 15:06:17', '2023-03-12 15:06:17'),
(215, 16, 'public/assets/images/products/16/1-201202135523496.jpg', 0, 1, '2023-03-12 15:06:17', '2023-03-12 15:06:17'),
(216, 16, 'public/assets/images/products/16/1-201202134G4B7.jpg', 1, 1, '2023-03-12 15:07:08', '2023-03-12 15:07:08'),
(217, 16, 'public/assets/images/products/16/1-201202134I4413.jpg', 1, 1, '2023-03-12 15:07:11', '2023-03-12 15:07:11'),
(218, 16, 'public/assets/images/products/16/1-201202134920337.jpg', 1, 1, '2023-03-12 15:07:13', '2023-03-12 15:07:13'),
(219, 16, 'public/assets/images/products/16/1-201202134RJ12.jpg', 1, 1, '2023-03-12 15:07:17', '2023-03-12 15:07:17'),
(220, 16, 'public/assets/images/products/16/1-201202134KN27.jpg', 1, 1, '2023-03-12 15:07:18', '2023-03-12 15:07:18'),
(221, 16, 'public/assets/images/products/16/1-201202134T4923.jpg', 1, 1, '2023-03-12 15:07:24', '2023-03-12 15:07:24'),
(222, 17, 'public/assets/images/products/17/1-200426111124Y9.jpg', 0, 1, '2023-03-12 15:08:16', '2023-03-12 15:08:16'),
(223, 17, 'public/assets/images/products/17/1-200426111141537.jpg', 0, 1, '2023-03-12 15:08:16', '2023-03-12 15:08:16'),
(224, 17, 'public/assets/images/products/17/1-200426111213592.jpg', 0, 1, '2023-03-12 15:08:16', '2023-03-12 15:08:16'),
(225, 17, 'public/assets/images/products/17/1-200426111250M5.jpg', 0, 1, '2023-03-12 15:08:31', '2023-03-12 15:08:31'),
(226, 17, 'public/assets/images/products/17/1-201202133T6494.jpg', 1, 1, '2023-03-12 15:09:15', '2023-03-12 15:09:15'),
(227, 17, 'public/assets/images/products/17/1-201202133913156.jpg', 1, 1, '2023-03-12 15:09:17', '2023-03-12 15:09:17'),
(228, 17, 'public/assets/images/products/17/1-20120213393N39.jpg', 1, 1, '2023-03-12 15:09:20', '2023-03-12 15:09:20'),
(229, 17, 'public/assets/images/products/17/1-20120213402A32.jpg', 1, 1, '2023-03-12 15:09:21', '2023-03-12 15:09:21'),
(230, 17, 'public/assets/images/products/17/1-201202134000122.jpg', 1, 1, '2023-03-12 15:09:23', '2023-03-12 15:09:23'),
(231, 18, 'public/assets/images/products/18/1-210QQ35324J1.jpg', 0, 1, '2023-03-12 15:10:51', '2023-03-12 15:10:51'),
(232, 18, 'public/assets/images/products/18/1-210QQ3530L47.jpg', 0, 1, '2023-03-12 15:10:51', '2023-03-12 15:10:51'),
(233, 18, 'public/assets/images/products/18/1-210QQ353415D.jpg', 0, 1, '2023-03-12 15:10:51', '2023-03-12 15:10:51'),
(234, 18, 'public/assets/images/products/18/1-210QQ3535OR.jpg', 0, 1, '2023-03-12 15:10:51', '2023-03-12 15:10:51'),
(235, 18, 'public/assets/images/products/18/1-210QQ32ZT00.jpg', 1, 1, '2023-03-12 15:11:31', '2023-03-12 15:11:31'),
(236, 18, 'public/assets/images/products/18/1-220P316022CV.jpg', 1, 1, '2023-03-12 15:11:32', '2023-03-12 15:11:32'),
(237, 18, 'public/assets/images/products/18/1-210930104129356.jpg', 1, 1, '2023-03-12 15:11:34', '2023-03-12 15:11:34'),
(238, 18, 'public/assets/images/products/18/1-210QQ32943933.jpg', 1, 1, '2023-03-12 15:11:35', '2023-03-12 15:11:35'),
(239, 19, 'public/assets/images/products/19/1-200F61405131a.jpg', 0, 1, '2023-03-12 15:13:05', '2023-03-12 15:13:05'),
(240, 19, 'public/assets/images/products/19/1-200F614053I07.jpg', 0, 1, '2023-03-12 15:13:06', '2023-03-12 15:13:06'),
(241, 19, 'public/assets/images/products/19/1-200F61405261L.jpg', 0, 1, '2023-03-12 15:13:06', '2023-03-12 15:13:06'),
(242, 19, 'public/assets/images/products/19/1-200F6140500X7.jpg', 0, 1, '2023-03-12 15:13:06', '2023-03-12 15:13:06'),
(243, 19, 'public/assets/images/products/19/1-210302133230453.jpg', 1, 1, '2023-03-12 15:13:50', '2023-03-12 15:13:50'),
(244, 19, 'public/assets/images/products/19/1-21093010422S94.jpg', 1, 1, '2023-03-12 15:13:51', '2023-03-12 15:13:51'),
(245, 19, 'public/assets/images/products/19/1-210302133155533.jpg', 1, 1, '2023-03-12 15:13:53', '2023-03-12 15:13:53'),
(246, 19, 'public/assets/images/products/19/1-210QQ43KX26.jpg', 1, 1, '2023-03-12 15:13:55', '2023-03-12 15:13:55'),
(247, 19, 'public/assets/images/products/19/1-21030213320YB.jpg', 1, 1, '2023-03-12 15:14:03', '2023-03-12 15:14:03'),
(248, 20, 'public/assets/images/products/20/1-210QQ4131KF.jpg', 0, 1, '2023-03-12 15:15:31', '2023-03-12 15:15:31'),
(249, 20, 'public/assets/images/products/20/1-210QQ41241Q2.jpg', 0, 1, '2023-03-12 15:15:31', '2023-03-12 15:15:31'),
(250, 20, 'public/assets/images/products/20/1-210QQ41334344.jpg', 0, 1, '2023-03-12 15:15:31', '2023-03-12 15:15:31'),
(251, 20, 'public/assets/images/products/20/1-210QQ413515T.jpg', 0, 1, '2023-03-12 15:15:32', '2023-03-12 15:15:32'),
(252, 20, 'public/assets/images/products/20/1-20122QGU33M.jpg', 1, 1, '2023-03-12 15:16:11', '2023-03-12 15:16:11'),
(253, 20, 'public/assets/images/products/20/1-210930103955H1.jpg', 1, 1, '2023-03-12 15:16:12', '2023-03-12 15:16:12'),
(254, 20, 'public/assets/images/products/20/1-210QQ41P4255.jpg', 1, 1, '2023-03-12 15:16:13', '2023-03-12 15:16:13'),
(255, 20, 'public/assets/images/products/20/1-2012021402343H.jpg', 1, 1, '2023-03-12 15:16:14', '2023-03-12 15:16:14'),
(256, 21, 'public/assets/images/products/21/1-201202142433410.jpg', 0, 1, '2023-03-12 15:17:09', '2023-03-12 15:17:09'),
(257, 21, 'public/assets/images/products/21/1-2012021424212B.jpg', 0, 1, '2023-03-12 15:17:10', '2023-03-12 15:17:10'),
(258, 21, 'public/assets/images/products/21/1-2012021424534Q.jpg', 0, 1, '2023-03-12 15:17:10', '2023-03-12 15:17:10'),
(259, 21, 'public/assets/images/products/21/1-201202142505B3.jpg', 0, 1, '2023-03-12 15:17:10', '2023-03-12 15:17:10'),
(260, 21, 'public/assets/images/products/21/1-201202141Q1H5.jpg', 1, 1, '2023-03-12 15:17:54', '2023-03-12 15:17:54'),
(261, 21, 'public/assets/images/products/21/1-201202141S4616.jpg', 1, 1, '2023-03-12 15:17:55', '2023-03-12 15:17:55'),
(262, 21, 'public/assets/images/products/21/1-201202141ZHH.jpg', 1, 1, '2023-03-12 15:17:56', '2023-03-12 15:17:56'),
(263, 21, 'public/assets/images/products/21/1-201202141U4160.jpg', 1, 1, '2023-03-12 15:17:57', '2023-03-12 15:17:57'),
(264, 21, 'public/assets/images/products/21/1-20120214192D28.jpg', 1, 1, '2023-03-12 15:17:57', '2023-03-12 15:17:57'),
(265, 22, 'public/assets/images/products/22/1-200426140UJJ.jpg', 0, 1, '2023-03-12 15:18:39', '2023-03-12 15:18:39'),
(266, 22, 'public/assets/images/products/22/1-200426140911961.jpg', 0, 1, '2023-03-12 15:18:39', '2023-03-12 15:18:39'),
(267, 22, 'public/assets/images/products/22/1-20042614094J18.jpg', 0, 1, '2023-03-12 15:18:39', '2023-03-12 15:18:39'),
(268, 22, 'public/assets/images/products/22/1-200426141013F3.jpg', 0, 1, '2023-03-12 15:18:40', '2023-03-12 15:18:40'),
(269, 22, 'public/assets/images/products/22/1-1ZG6111205392.jpg', 1, 1, '2023-03-12 15:19:18', '2023-03-12 15:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: hoạt động, 1: không hoạt động',
  `feature` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `description`, `detail`, `note`, `image`, `status`, `feature`, `category_id`, `created_time`, `updated_time`) VALUES
(1, 'Khóa khách sạn RFID mã S3479A nhãn hiệu ORBITA', 'khoa-khach-san-rfid-ma-s3479a-nhan-hieu-orbita', '                                    <ul><li>Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 35-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare</li><li>Kích thước：60mm x 60mm x 12mm<br></li></ul>\r\n            \r\n            \r\n            ', '                                    <ul><li>Giao diện với hầu hết hệ thống PMS,  đã đăng ký Fidelio/Opera</li><li>Chứng nhận CE & FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn<br></li></ul>\r\n            \r\n            \r\n            ', NULL, 'public/assets/images/products/1/1-22060611131R22.jpg', 1, 1, 15, '2023-03-11 14:59:41', '2023-03-12 21:49:54'),
(2, 'Khóa lỗ mộng khách sạn E3464P ORBITA EU', 'khoa-lo-mong-khach-san-e3464p-orbita-eu', '<ul><li>Vật chất: Vật liệu thép không gỉ 304</li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：280mm x 40mm x 13mm<br></li></ul>', '<ul><li>Hỗ trợ công nghệ RFID &amp; NFC mới nhất với công nghệ Mifare 13.56MHz</li><li>Giải pháp Bluetooth &amp; trực tuyến không dây tùy chọn</li><li>Chống ẩm &amp; chống bụi</li><li>Tay cầm và tấm chống ăn mòn bằng thép không gỉ 304</li><li>Xi lanh ghi đè cơ học ẩn</li><li>1680 sự kiện tiêu chuẩn, 3260&nbsp; sự kiện tùy chọn</li><li>Giao diện với định dạng Opera hoặc FIAS PMS</li><li>Hoạt động với 4 pin kiềm AA tiêu chuẩn kéo dài 12 ~ 24 tháng</li><li>Cảnh báo điện áp pin yếu</li><li>Lập trình viên di động không dây</li><li>Thẻ phòng tương thích với đầu đọc thang máy của khách sạn &amp; đầu đọc truy cập chung cho&nbsp; bãi đậu xe/ bể bơi/ phòng xông hơi/ sân tennis, v.v</li></ul>', NULL, 'public/assets/images/products/2/1-200414114430947.jpg', 1, 0, 15, '2023-03-11 15:27:39', '2023-03-11 15:28:31'),
(3, 'Khóa RFID khách sạn S3474 ORBITA', 'khoa-rfid-khach-san-s3474-orbita', '<ul><li>Vật chất: Vật liệu thép không gỉ 304</li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 35-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare</li><li>Kích thước: 52mm x 52mm x 12mm<br></li></ul>', '<ul><li>Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.            \r\n            </li></ul>', NULL, 'public/assets/images/products/3/1-200QQ3510YM.jpg', 1, 1, 15, '2023-03-11 15:33:50', '2023-03-12 21:50:30'),
(4, 'Khóa khách sạn điện tử thông minh LCD E4041', 'khoa-khach-san-dien-tu-thong-minh-lcd-e4041', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 35-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：285mm x 75mm x 16mm</li></ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Màn hình LCD hiển thị Chào mừng、Số phòng、Ngày、Giờ、Ngày trong tuần、Tình trạng pin、Chỉ báo hoạt động sai</span><br></li><li>Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi bằng đèn LED và tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/4/1-210622162150N7.jpg', 1, 0, 15, '2023-03-11 15:36:27', '2023-03-11 16:16:41'),
(5, 'Khóa khách sạn LCD ORBITA E4131', 'khoa-khach-san-lcd-orbita-e4131', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 35-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare</li><li>Kích thước：280mm x 75mm x 22mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Màn hình LCD hiển thị Chào mừng、Số phòng、Ngày、Giờ、Ngày trong tuần、Tình trạng pin、Chỉ báo hoạt động sai</span><br></li><li>Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi bằng đèn LED và tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/5/1-2004131H331Q0.jpg', 1, 0, 15, '2023-03-11 15:37:59', '2023-03-11 16:16:32'),
(6, 'Khóa RFID khách sạn E3041 ORBITA', 'khoa-rfid-khach-san-e3041-orbita', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare</li><li>Kích thước：290mm x 60mm x 15mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/6/1-200QQ42036401.jpg', 1, 0, 15, '2023-03-11 16:08:46', '2023-03-11 16:16:23'),
(7, 'Khóa khách sạn thiết kế sang trọng LCD S4032G', 'khoa-khach-san-thiet-ke-sang-trong-lcd-s4032g', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AAA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：100mm x 65mm x 15mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Màn hình LCD hiển thị Chào mừng、Số phòng、Ngày、Giờ、Ngày trong tuần、Tình trạng pin、Chỉ báo hoạt động sai</span><br></li><li>Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Thép không gỉ Châu Âu Lỗ mộng Chức năng chống hoảng loạn</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi bằng đèn LED và tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/7/1-2004140R620P3.jpg', 1, 0, 15, '2023-03-11 16:10:42', '2023-03-11 16:16:10'),
(8, 'Khóa khách sạn S3072H ORBITA', 'khoa-khach-san-s3072h-orbita', '            <ul><li><span style=\"font-size: 1rem;\">Vật chất: Vật liệu thép không gỉ 304</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 35-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：95mm x 62mm x 26mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/8/1-2004141050423C.jpg', 1, 0, 15, '2023-03-11 16:12:21', '2023-03-11 16:15:59'),
(9, 'Khóa khách sạn E3592 ORBITA', 'khoa-khach-san-e3592-orbita', '                                    <ul><li><span style=\"font-size: 1rem;\">Vật chất: Vật liệu thép không gỉ 304</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước: 295mm x 76mm x 17mm</li>            \r\n            </ul>\r\n            \r\n            \r\n            ', '                                    <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE & FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            \r\n            \r\n            ', NULL, 'public/assets/images/products/9/1-200414155409128.jpg', 1, 0, 15, '2023-03-11 16:13:35', '2023-03-11 16:15:38'),
(10, 'Khóa khách sạn S3078 ORBITA', 'khoa-khach-san-s3078-orbita', '                        <ul><li><span style=\"font-size: 1rem;\">Vật chất: Vật liệu thép không gỉ 304</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 38-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：125mm x 61mm x 22mm</li>            \r\n            </ul>\r\n            \r\n            ', '                        <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE & FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            \r\n            ', NULL, 'public/assets/images/products/10/1-200414101422C9.jpg', 1, 0, 15, '2023-03-11 16:14:51', '2023-03-11 16:18:40'),
(11, 'Khóa khách sạn E3010S ORBITA', 'khoa-khach-san-e3010s-orbita', '                        <ul><li><span style=\"font-size: 1rem;\">Vật chất: Vật liệu thép không gỉ 304</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：242mm x 76mm x 17mm</li>            \r\n            </ul>\r\n            \r\n            ', '                        <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE & FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            \r\n            ', NULL, 'public/assets/images/products/11/1-200414150K9519.jpg', 1, 0, 15, '2023-03-11 16:18:17', '2023-03-11 16:18:55'),
(12, 'Khóa cửa khách sạn S3063P ORBITA', 'khoa-cua-khach-san-s3063p-orbita', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép không gỉ, Chống ẩm, Chống cháy</span><br></li><li>Điện áp làm việc：DC6V hoặc 4 pin AAA Alkaline</li><li>Báo động điện áp thấp:＜4,8V</li><li>Môi trường làm việc：-20℃~60℃</li><li>Kỷ lục mở khóa: 1680 PCS</li><li>Độ dày cửa: 32-70mm</li><li>Tùy chọn thẻ khóa：1 thẻ Mifare&nbsp;</li><li>Kích thước：94mm x 36mm x 20mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Giao diện với hầu hết hệ thống PMS, đã đăng ký Fidelio/Opera</span><br></li><li>Chứng nhận CE &amp; FCC</li><li>Màu thép không gỉ kéo dài hơn 10 năm</li><li>Lỗ mộng tiêu chuẩn ANSI</li><li>Chốt chốt bên trong, Tay cầm bên trong rút chốt và chốt chết</li><li>Thẻ Mifare 1K, tương thích với Mifare Energy Saver</li><li>Mất Thẻ khách bị đình chỉ đơn giản bằng cách cấp thẻ khách mới có chức năng treo</li><li>Nhiều nhà khai thác với ủy quyền phát hành thẻ khác nhau</li><li>Cảnh báo điện áp pin yếu. (Thấp hơn 4,8V).</li><li>Tự phát hiện lỗi với tiếng “Bíp”</li><li>Chức năng Passage Model có sẵn</li><li>Có thể tích hợp với 16 khu vực công cộng như Thang máy/Bãi đậu xe/Bể bơi/Phòng xông hơi/Sân tennis/Gym...v.v.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/12/1-200414111504G7.jpg', 1, 0, 15, '2023-03-11 16:20:29', '2023-03-11 16:20:39'),
(13, 'Két Sắt Phòng Khách Sạn OBT-4135MJ', 'ket-sat-phong-khach-san-obt-4135mj', '            <ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép hợp kim chất lượng cao, được sử dụng rộng rãi trong nhiều lĩnh vực như động cơ ô tô, máy tiện, hàng không vũ trụ, v.v. chống khoan và chống mite</span><br></li><li>Kích thước: 410mm&nbsp; x 150mm x 350mm</li>            \r\n            </ul>\r\n            ', '                        \r\n            \r\n            ', NULL, 'public/assets/images/products/13/1-2206141521440-L.jpg', 1, 1, 16, '2023-03-11 16:50:14', '2023-03-12 21:50:15'),
(14, 'Két Sắt Phòng Khách Sạn OBT-2042MJ', 'ket-sat-phong-khach-san-obt-2042mj', '<ul><li><span style=\"font-size: 1rem;\">Chất liệu: Thép hợp kim chất lượng cao, chống khoan và chống ve bụi, được sử dụng rộng rãi trong nhiều lĩnh vực như động cơ ô tô, máy tiện, hàng không vũ trụ, v.v.&nbsp;</span><br></li><li>Kích thước: 420mm&nbsp; x 200mm x 370mm</li></ul>', '            \r\n            ', NULL, 'public/assets/images/products/14/1-220614145203255.jpg', 1, 0, 16, '2023-03-11 16:54:05', '2023-03-11 16:54:05'),
(15, 'Két Sắt Phòng Khách Sạn OBT-4135MG', 'ket-sat-phong-khach-san-obt-4135mg', '            <ul><li><span style=\"font-size: 1rem;\">Vật chất:Thép cán nguội</span><br></li><li>Cửa thép cán nguội 5 MM</li><li>Hai bu lông khóa thép có đường kính 3/4 inch (19MM)</li><li>Lớp sơn tĩnh điện chống trầy xước</li></ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">Màn hình LED nâng cao</span><br></li><li>Cho phép nhiều mã gồm 4 chữ số</li><li>Nhật ký kiểm tra sự kiện</li><li>Bảng điều khiển pin truy cập dễ dàng</li><li>Hộp nhảy pin khẩn cấp</li><li>Phím ghi đè không an toàn cơ học</li><li>Thảm bên trong</li><li>Cửa lò xo</li><li>Các lỗ lắp đặt ở phía dưới và phía sau bằng vít chống giả mạo</li><li>Hết thời gian sai mã Tính năng bảo mật</li><li>Cảnh Báo Pin Yếu</li><li>Bảo hành 1 năm</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/15/1-200PF93Q54P.jpg', 1, 0, 16, '2023-03-11 16:56:04', '2023-03-11 16:57:24'),
(16, 'Két Sắt Phòng Khách Sạn OBT-2043MB', 'ket-sat-phong-khach-san-obt-2043mb', '            <ul><li><span style=\"font-size: 1rem;\">Vật chất: Thép cán nguội</span><br></li><li>Cửa thép cán nguội 5 MM</li><li>Hai bu lông khóa thép có đường kính 3/4 inch (19MM)</li><li>Sơn tĩnh điện chống trầy xước</li>            \r\n            </ul>\r\n            ', '                        \r\n            \r\n            ', NULL, 'public/assets/images/products/16/1-201202135443A3.jpg', 1, 0, 16, '2023-03-11 16:57:12', '2023-03-11 16:59:19'),
(17, 'Két Sắt Phòng Khách Sạn OBT-2042MG', 'ket-sat-phong-khach-san-obt-2042mg', '            <ul><li><span style=\"font-size: 1rem;\">Vật chất:Thép cán nguội</span><br></li><li>Cửa thép cán nguội 5 MM</li><li>Hai bu lông khóa thép có đường kính 3/4 inch (19MM)</li><li>Sơn tĩnh điện chống trầy xước</li>            \r\n            </ul>\r\n            ', '                        \r\n            \r\n            ', NULL, 'public/assets/images/products/17/1-200PF93421T7.jpg', 1, 0, 16, '2023-03-11 16:58:51', '2023-03-11 16:59:15'),
(18, 'Máy làm lạnh rượu bằng điện bán dẫn OBT-TE40B/minbar', 'may-lam-lanh-ruou-bang-dien-ban-dan-obt-te40bminbar', '            <ul><li><span style=\"font-size: 1rem;\">Tiếng ồn（DB）：25DB</span><br></li><li>Thể tích hiệu dụng: 40L</li><li>Nhiệt độ làm mát： 7-18℃</li><li>Trọng lượng tịnh : 8,9 KGS</li><li>Tổng trọng lượng: 10,0 KGS</li><li>Tải trọng: container \'20\' 220, container \'40\' 460, container \'40\' HC 572</li><li>Kích thước (WxDxH)mm : 430 x 410 x 501mm</li><li>Kích thước đóng gói（W*D*H）mm : 460 x 440 x 530mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">An toàn tuyệt đối: không có bất kỳ chất lỏng làm mát và phụ kiện đường ống hàn nào, không có nguy cơ rò rỉ tiềm ẩn và không cần phải lo lắng về chất lượng của mối hàn và mật độ hoặc sự ăn mòn của phụ kiện đường ống, do đó không có nguy cơ tiềm ẩn về an toàn. có thể nói là an toàn tuyệt đối</span><br></li><li>Bảo vệ môi trường và carbon thấp: không có chất làm lạnh, không gây hại cho khí quyển, không gây hại cho môi trường và không gây ô nhiễm thứ cấp.</li><li>Tiết kiệm năng lượng: không có máy nén, tiết kiệm năng lượng hơn.</li><li>Vật liệu bán dẫn làm mát liên tục, cấu trúc hệ thống được tối ưu hóa bằng \"hiệu ứng Peltier\" và nhiệt độ có thể được điều chỉnh thành 8-18 ° C hoặc 11-18 ° C ở nhiệt độ môi trường 25 ° C. Đây là hằng số phù hợp nhất nhiệt độ bảo quản rượu vang đỏ.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/18/1-210QQ352400-L.jpg', 1, 1, 17, '2023-03-11 17:02:13', '2023-03-12 21:50:21'),
(19, 'Minibar khách sạn OBT-te40G', 'minibar-khach-san-obt-te40g', '            <ul><li><span style=\"font-size: 1rem;\">Tiếng ồn（DB）：25DB</span><br></li><li>Thể tích hiệu dụng: 40L</li><li>Nhiệt độ làm mát： 7-18℃</li><li>Trọng lượng tịnh : 8,9 KGS</li><li>Tổng trọng lượng: 10,0 KGS</li><li>Tải trọng: container \'20\' 220, container \'40\' 460, container \'40\' HC 572</li><li>Kích thước (WxDxH)mm : 430*410*501mm</li><li>Kích thước đóng gói（W*D*H）mm : 460*440*530 mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">An toàn tuyệt đối: không có bất kỳ chất lỏng làm mát và phụ kiện đường ống hàn nào, không có nguy cơ rò rỉ tiềm ẩn và không cần phải lo lắng về chất lượng của mối hàn và mật độ hoặc sự ăn mòn của phụ kiện đường ống, do đó không có nguy cơ tiềm ẩn về an toàn. có thể nói là an toàn tuyệt đối</span><br></li><li>Bảo vệ môi trường và carbon thấp: không có chất làm lạnh, không gây hại cho khí quyển, không gây hại cho môi trường và không gây ô nhiễm thứ cấp.</li><li>Tiết kiệm năng lượng: không có máy nén, tiết kiệm năng lượng hơn.</li><li>Vật liệu bán dẫn làm mát liên tục, cấu trúc hệ thống được tối ưu hóa bằng \"hiệu ứng Peltier\" và nhiệt độ có thể được điều chỉnh thành 8-18 ° C hoặc 11-18 ° C ở nhiệt độ môi trường 25 ° C. Đây là hằng số phù hợp nhất nhiệt độ bảo quản rượu vang đỏ.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/19/1-210QQ42S1230.jpg', 1, 0, 17, '2023-03-11 17:03:58', '2023-03-11 17:04:14'),
(20, 'Máy làm lạnh rượu vang bằng điện bán dẫn OBT-TE40D/minbar', 'may-lam-lanh-ruou-vang-bang-dien-ban-dan-obt-te40dminbar', '            <ul><li><span style=\"font-size: 1rem;\">Tiếng ồn（DB）：25DB</span><br></li><li>Thể tích hiệu dụng: 40L</li><li>Nhiệt độ làm mát： 13-18℃</li><li>Trọng lượng tịnh: 11,8 KGS</li><li>Tổng trọng lượng: 12,8 KGS</li><li>Tải trọng: container \'20\' 220, container \'40\' 460, container \'40\' HC 572</li><li>Kích thước (WxDxH)mm : 430*410*501mm</li><li>Kích thước đóng gói（W*D*H）mm : 460*440*530 mm</li>            \r\n            </ul>\r\n            ', '            <ul><li><span style=\"font-size: 1rem;\">An toàn tuyệt đối: không có bất kỳ chất lỏng làm mát và phụ kiện đường ống hàn nào, không có nguy cơ rò rỉ tiềm ẩn và không cần phải lo lắng về chất lượng của mối hàn và mật độ hoặc sự ăn mòn của phụ kiện đường ống, do đó không có nguy cơ tiềm ẩn về an toàn. có thể nói là tuyệt đối an toàn;</span><br></li><li>Bảo vệ môi trường và carbon thấp: không có chất làm lạnh, không gây hại cho khí quyển, không gây hại cho môi trường và không gây ô nhiễm thứ cấp.</li><li>Tiết kiệm năng lượng: không có máy nén, tiết kiệm năng lượng hơn.</li><li>Vật liệu bán dẫn làm mát liên tục, cấu trúc hệ thống được tối ưu hóa bằng \"hiệu ứng Peltier\" và nhiệt độ có thể được điều chỉnh thành 8-18 ° C hoặc 11-18 ° C ở nhiệt độ môi trường 25 ° C. Đây là hằng số phù hợp nhất nhiệt độ bảo quản rượu vang đỏ.</li>            \r\n            </ul>\r\n            ', NULL, 'public/assets/images/products/20/1-210QQ4125H47.jpg', 1, 0, 17, '2023-03-11 17:05:47', '2023-03-11 17:05:55'),
(21, 'Minibar khách sạn OBT-40X', 'minibar-khach-san-obt-40x', '            <ul><li><span style=\"font-size: 1rem;\">Làm mát bằng amoniac</span><br></li><li>Không bộ phận chuyển động, không máy nén, không quạt, không rung, không tiếng ồn (0 db)</li><li>Bảo trì miễn phí và lâu dài</li>            \r\n            </ul>\r\n            ', '                        \r\n            \r\n            ', '', 'public/assets/images/products/21/1-201202142403548.jpg', 1, 0, 17, '2023-03-11 17:06:47', '2023-03-12 23:11:01'),
(22, 'Minibar khách sạn OBT-40DX', 'minibar-khach-san-obt-40dx', '            <ul><li><span style=\"font-size: 1rem;\">Làm mát bằng amoniac</span><br></li><li>Không bộ phận chuyển động, không máy nén, không quạt, không rung, không tiếng ồn (0 db)</li><li>Bảo trì miễn phí và lâu dài</li>            \r\n            </ul>\r\n            ', '            <table border=\"1\" cellspacing=\"0\" style=\"margin: 0px; padding: 0px; font-size: 14px; width: 800px; border-spacing: 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Mẫu</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> OBT-30</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> OBT-40</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> OBT-60</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Phương pháp làm lạnh</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> Hấp thụ</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Hấp thụ</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Hấp thụ</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Nhiệt độ lưu trữ (℃</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 0-12</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 0-12</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 0-12</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Công suất đầu vào(W)</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 65</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 65</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 65</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Năng lượng tiêu thụ (kwh/24h)</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 0.9</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 0.9</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 0.9</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Hiệu lực Dung lượng(L）</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 30</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 40</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 60</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Điện áp(V)</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> AC220/110</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> AC220/110</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> AC220/110</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Loại Bộ điều khiển</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> Kỹ thuật số</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Kỹ thuật số</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Kỹ thuật số</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Loại niêm phong cửa</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> Có thể tháo rời</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Có thể tháo rời</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> Có thể tháo rời</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Trọng lượng tịnh/Tổng (kg)</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 16/18</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 16/18</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 16/18</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Hình dạng Kích thước(W*D*H)mm</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 400*420*517</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 400*470*517</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 482*480*521</td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; width: 175px;\"> Kích thước đóng gói(W*D*H)mm</td><td style=\"margin: 0px; padding: 0px; width: 109px;\"> 460*450*460</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 460*500*560</td><td style=\"margin: 0px; padding: 0px; width: 142px;\"> 530*510*600</td></tr></tbody></table>            \r\n            \r\n            ', NULL, 'public/assets/images/products/22/1-200426141013F3.jpg', 1, 0, 17, '2023-03-11 17:12:13', '2023-03-16 00:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: không hoạt động, 1: hoạt động',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `description`, `status`, `created_time`, `updated_time`) VALUES
(1, 'email', 'sales5@orbitatech.com', 'Địa chỉ email để liên lạc', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:57'),
(2, 'phone', '+8618928480199', 'Số điện thoại liên hệ', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:57'),
(3, 'telephone', '+86-752-3633501', 'Số điện thoại bàn', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:57'),
(4, 'fax', '+8675583617778', 'Số Fax', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:58'),
(5, 'skype', 'orbita-sales5', 'Liên hệ Skype', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:58'),
(6, 'address', 'Room 801-804, Building A, Zhongmin Time Plaza, 12 Sungang East Road, Luohu District,Shenzhen.', 'Địa chỉ cơ quan', 1, '2023-03-13 23:10:02', '2023-03-13 23:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: không hoạt động, 1: hoạt động',
  `category_id` int(11) DEFAULT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `description`, `image`, `status`, `category_id`, `created_time`, `updated_time`) VALUES
(1, 'Khóa cửa thông minh ORBITA', '                                                                                                                                                                                                                                                                                                <ul><li>                                                <span style=\"color: rgb(32, 33, 36); font-family: consolas, \" lucida=\"\" console\",=\"\" \"courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 12px;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Chúng tôi cam kết cung cấp cho khách hàng những sản phẩm và dịch vụ chất lượng cao</span></li><li><span style=\"\" lucida=\"\" console\",=\"\" \"courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 12px;=\"\" white-space:=\"\" pre-wrap;\"=\"\"><font color=\"#202124\">Phục vụ hơn 20.000 khách sạn tại hơn 120 quốc gia trên thế giới</font><br></span></li></ul>                                                                                                                                                                                                                                                                        ', 'public/assets/images/slides/banner_hotel_lock2.webp', 1, NULL, '2023-03-10 16:13:40', '2023-03-10 17:57:11'),
(4, 'Minibar khách sạn ORBITA', '                                                <ul><li>Làm mát bằng amoniac</li><li>Không có bộ phận di chuyển, không có máy nén</li><li>Bảo trì miễn phí và lâu dài                                                                                            </li></ul>                                            ', 'public/assets/images/slides/banner_minibar.webp', 1, NULL, '2023-03-10 18:00:17', '2023-03-10 18:00:49'),
(5, 'Két sắt khách sạn ORBITA', '<ul><li>Cửa thép cán nguội dày 5 MM</li><li>Hai bu lông khóa thép có đường kính 3/4 inch (19MM)</li><li>Sơn tĩnh điện chống trầy xước                                                                                            </li></ul>', 'public/assets/images/slides/banner_safe.webp', 1, NULL, '2023-03-10 18:03:08', '2023-03-10 18:03:08'),
(6, 'Hệ thống khách sạn thông minh ORBITA', '<p>Chúng tôi cung cấp cho bạn Giải pháp khách sạn thông minh thông minh chuyên nghiệp                                                                                            </p>', 'public/assets/images/slides/banner_system.jpg', 1, NULL, '2023-03-10 18:04:37', '2023-03-10 18:04:37'),
(9, 'Minibar khách sạn ORBITA', '            <ul><li><span style=\"font-size: 1rem;\">Làm mát bằng chất bán dẫn</span><br></li><li>Không cần thêm chất làm lạnh</li><li>Bảo vệ môi trường xanh</li>            \r\n            </ul>\r\n            ', 'public/assets/images/slides/list-minibar.jpg', 1, 17, '2023-03-12 15:47:09', '2023-03-12 15:49:02'),
(10, 'ORBITA Khóa khách sạn & Hệ thống khóa khách sạn', 'Hơn 20.000 khách sạn trên toàn thế giới đang sử dụng khóa khách sạn của chúng tôi            \r\n            ', 'public/assets/images/slides/pro-banner1.jpg', 1, 15, '2023-03-12 15:49:45', '2023-03-12 15:49:45'),
(11, 'Khóa phòng tắm khách sạn ORBITA', 'Hơn 20.000 khách sạn trên toàn thế giới đang sử dụng sản phẩm của chúng tôi            \r\n            ', 'public/assets/images/slides/bath-banner.webp', 1, 19, '2023-03-12 15:50:59', '2023-03-12 15:50:59'),
(12, 'Két sắt phòng khách sạn ORBITA', 'Thép cán nguội, Hai bu lông khóa thép có đường kính 3/4 inch (19MM)            \r\n            ', 'public/assets/images/slides/list-bxx.jpg', 1, 16, '2023-03-12 15:51:59', '2023-03-12 15:51:59'),
(13, 'Phụ kiện khách sạn ORBITA', 'Công tắc tiết kiệm năng lượng của khách sạn, Thẻ vòng đeo tay, Thẻ Mifare, Kiểm soát truy cập            \r\n            ', 'public/assets/images/slides/acce.jpg', 1, 21, '2023-03-12 15:54:09', '2023-03-12 15:54:09'),
(14, 'Tấm cửa khách sạn ORBITA', '            \r\n            ', 'public/assets/images/slides/list-doorPlate.jpg', 1, 26, '2023-03-12 15:55:22', '2023-03-12 15:55:22'),
(15, 'Ổ Khóa Tủ ORBITA', 'Độc lập không có bộ mã hóa thẻ và phần mềm liên quan hoặc chức năng điều khiển phần mềm tùy chọn            \r\n            ', 'public/assets/images/slides/list-CabinetLocks.jpg', 1, 20, '2023-03-12 15:56:52', '2023-03-12 15:56:52'),
(16, 'Điện thoại khách sạn ORBITA', 'Điện thoại phòng khách sạn &amp; điện thoại phòng tắm            \r\n            ', 'public/assets/images/slides/telphone.jpg', 1, 22, '2023-03-12 15:59:11', '2023-03-12 15:59:11'),
(17, 'Máy Sấy Tóc ORBITA', 'Máy sấy tóc treo tường sẽ dễ quản lý            \r\n            ', 'public/assets/images/slides/Hair.jpg', 1, 24, '2023-03-12 16:00:40', '2023-03-12 16:00:40'),
(18, 'Ấm đun nước điện khách sạn ORBITA', 'Chất liệu nhựa PP cao cấp, Tự động ngắt            \r\n            ', 'public/assets/images/slides/kettle.jpg', 1, 25, '2023-03-12 16:01:32', '2023-03-12 16:01:32'),
(19, 'Công tắc ORBITA trong phòng', 'Công tắc khách sạn Smart Rocker &amp; Công tắc màn hình cảm ứng            \r\n            ', 'public/assets/images/slides/inroom.jpg', 1, 23, '2023-03-12 16:02:26', '2023-03-15 23:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `expire_login_at` int(16) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: không hoạt động, 1: hoạt động',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `remember_code`, `expire_login_at`, `role`, `status`, `created_time`, `updated_time`) VALUES
(1, '127.0.0.1', 'admin', '$2y$10$hqGMNG0O6HzKDZccGOK.EuAfmKizkYQCRctHO8flIvxsWc7XR2sOO', '$2y$10$IxBxUWz9lY2Le6REP7O0vOAMUJSGdiM0DZN6FPfVxzysfustFVyAO', 1681488883, 1, 1, '2023-03-05 22:36:00', '2023-03-15 23:14:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_to_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_to_category` (`category_id`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_slide_to_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `fk_gallery_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_to_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `fk_slide_to_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
