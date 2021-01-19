-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 07:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teletrofono`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_bill`
--

CREATE TABLE `active_bill` (
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time_active` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_edit_product`
--

CREATE TABLE `add_edit_product` (
  `id_product` int(11) NOT NULL,
  `id_user_add` int(11) NOT NULL,
  `id_user_edit_last` int(11) NOT NULL,
  `time_add` datetime NOT NULL,
  `time_edit_last` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_edit_product`
--

INSERT INTO `add_edit_product` (`id_product`, `id_user_add`, `id_user_edit_last`, `time_add`, `time_edit_last`) VALUES
(2, 1, 1, '2021-01-17 21:56:11', '2021-01-17 21:56:11'),
(3, 2, 1, '2021-01-17 21:57:55', '2021-01-17 21:57:55'),
(4, 1, 1, '2021-01-17 21:58:15', '2021-01-17 21:58:15'),
(5, 1, 1, '2021-01-17 21:58:35', '2021-01-17 21:58:35'),
(6, 1, 1, '2021-01-17 21:57:29', '2021-01-17 21:57:29'),
(7, 1, 1, '2021-01-17 21:59:10', '2021-01-17 21:59:10'),
(8, 1, 1, '2021-01-17 21:59:24', '2021-01-17 21:59:24'),
(9, 2, 2, '2021-01-17 22:12:26', '2021-01-17 22:12:26'),
(10, 2, 2, '2021-01-17 22:23:47', '2021-01-17 22:23:47'),
(11, 2, 2, '2021-01-17 22:34:03', '2021-01-17 22:34:03'),
(12, 2, 2, '2021-01-17 22:39:59', '2021-01-17 22:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_time` datetime NOT NULL,
  `bill_namecustomer` varchar(40) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_phonenumber` varchar(15) DEFAULT NULL,
  `bill_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id_product` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `money` float NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` int(11) NOT NULL,
  `color_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_name`) VALUES
(1, 'Trắng'),
(2, 'Đen'),
(3, 'Đỏ'),
(4, 'Xanh lục'),
(5, 'Xanh dương'),
(6, 'Bạc'),
(7, 'Xám');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_account` varchar(30) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_phonenumber` varchar(15) DEFAULT NULL,
  `customer_dob` date DEFAULT NULL,
  `customer_sex` tinyint(4) DEFAULT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `customer_avatar` varchar(200) DEFAULT NULL,
  `customer_type` int(11) NOT NULL,
  `user_type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_account`, `customer_password`, `customer_name`, `customer_phonenumber`, `customer_dob`, `customer_sex`, `customer_address`, `customer_avatar`, `customer_type`, `user_type`) VALUES
(1, 'vantoan', 'vantoan', 'nguyenvantoan', NULL, NULL, NULL, NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cus_type`
--

CREATE TABLE `cus_type` (
  `id` int(11) NOT NULL,
  `cus_type` int(11) NOT NULL,
  `name_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_type`
--

INSERT INTO `cus_type` (`id`, `cus_type`, `name_type`) VALUES
(1, 1, 'Khách hàng thường'),
(2, 2, 'Khách hàng VIP');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `product_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`product_id`, `image_name`) VALUES
(2, 'product_2.jpg'),
(3, 'product_3.jpg'),
(4, 'product_4_iphone-12-xanh-duong.jpg'),
(5, 'product_5_iphone-11-red.jpg'),
(6, 'product_6_iphone-xr-hopmoi-den.jpg'),
(7, 'product_7_iphone-se-2020-128gb.jpg'),
(8, 'product_8_iphone-xr-hopmoi-den.jpg'),
(9, 'product_9_iphone-12-pro-max-xam.jpg'),
(10, 'product_10_iphone-23-mini-den-new.jpg'),
(11, 'product_11_iphone-12-trang.jpg'),
(12, 'product_12_iphone-11-256gb-black.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `manager_code` char(12) NOT NULL,
  `manager_name` varchar(40) NOT NULL,
  `manager_password` varchar(50) NOT NULL,
  `manager_email` varchar(100) NOT NULL,
  `manager_sex` tinyint(4) NOT NULL,
  `manager_dob` date NOT NULL,
  `manager_address` varchar(200) DEFAULT NULL,
  `manager_hometown` varchar(200) DEFAULT NULL,
  `manager_avatar` varchar(150) DEFAULT NULL,
  `manager_timestart` datetime NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `manager_salary_basic` float DEFAULT NULL,
  `manager_allowance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `manager_code`, `manager_name`, `manager_password`, `manager_email`, `manager_sex`, `manager_dob`, `manager_address`, `manager_hometown`, `manager_avatar`, `manager_timestart`, `user_type`, `manager_salary_basic`, `manager_allowance`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1, '2001-05-22', 'Hà Nội', 'Nam Định', NULL, '2021-01-15 13:48:00', 1, NULL, NULL),
(2, '123456789123', 'vantoan', 'vantoan', 'vantoan@gmail.com', 1, '2001-05-22', 'Hà Nội', 'Nam Định', '2_television.png', '2021-01-15 13:49:18', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manu_product`
--

CREATE TABLE `manu_product` (
  `id` int(11) NOT NULL,
  `manu_name` varchar(170) NOT NULL,
  `manu_image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manu_product`
--

INSERT INTO `manu_product` (`id`, `manu_name`, `manu_image`) VALUES
(1, 'APPLE', 'iPhone_logo.png'),
(2, 'SAMSUNG', 'sam.png'),
(3, 'OPPO', 'OPPO_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_color` int(11) DEFAULT NULL,
  `product_manu` int(11) DEFAULT NULL,
  `product_os` varchar(150) DEFAULT NULL,
  `product_des` text DEFAULT NULL,
  `product_tech_screen` varchar(150) DEFAULT NULL,
  `product_resolution_screen` varchar(150) DEFAULT NULL,
  `product_width_screen` varchar(150) DEFAULT NULL,
  `product_touch_glass` varchar(150) DEFAULT NULL,
  `product_resolution_camerarear` varchar(150) DEFAULT NULL,
  `product_record_camerarear` varchar(150) DEFAULT NULL,
  `product_flash_camerarear` varchar(150) DEFAULT NULL,
  `product_feature_camerarear` varchar(200) DEFAULT NULL,
  `product_resolution_frontcamera` varchar(100) DEFAULT NULL,
  `product_videocall_frontcamera` tinyint(4) DEFAULT NULL,
  `product_feature_frontcamera` varchar(200) DEFAULT NULL,
  `product_cpu` varchar(150) DEFAULT NULL,
  `product_specification_cpu` varchar(150) DEFAULT NULL,
  `product_gpu` varchar(150) DEFAULT NULL,
  `product_specification_gpu` varchar(150) DEFAULT NULL,
  `product_ram` int(11) DEFAULT NULL,
  `product_storage` int(11) DEFAULT NULL,
  `product_memorycard` varchar(150) DEFAULT NULL,
  `product_mobilenetwork` varchar(150) DEFAULT NULL,
  `product_sim` varchar(150) DEFAULT NULL,
  `product_wifi` varchar(150) DEFAULT NULL,
  `product_gps` varchar(150) DEFAULT NULL,
  `product_bluetooth` varchar(150) DEFAULT NULL,
  `product_chargingport` varchar(150) DEFAULT NULL,
  `product_jack` varchar(150) DEFAULT NULL,
  `product_otherconnect` varchar(150) DEFAULT NULL,
  `product_design` varchar(150) DEFAULT NULL,
  `product_material` varchar(150) DEFAULT NULL,
  `product_size` varchar(150) DEFAULT NULL,
  `product_weight` varchar(150) DEFAULT NULL,
  `product_batterycapacity` varchar(150) DEFAULT NULL,
  `product_batterytype` varchar(150) DEFAULT NULL,
  `product_timeoflaunch` date DEFAULT NULL,
  `product_timeofposting` date DEFAULT NULL,
  `product_guarantee` int(11) DEFAULT NULL,
  `product_quanlity` int(11) DEFAULT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `product_status` tinyint(4) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_color`, `product_manu`, `product_os`, `product_des`, `product_tech_screen`, `product_resolution_screen`, `product_width_screen`, `product_touch_glass`, `product_resolution_camerarear`, `product_record_camerarear`, `product_flash_camerarear`, `product_feature_camerarear`, `product_resolution_frontcamera`, `product_videocall_frontcamera`, `product_feature_frontcamera`, `product_cpu`, `product_specification_cpu`, `product_gpu`, `product_specification_gpu`, `product_ram`, `product_storage`, `product_memorycard`, `product_mobilenetwork`, `product_sim`, `product_wifi`, `product_gps`, `product_bluetooth`, `product_chargingport`, `product_jack`, `product_otherconnect`, `product_design`, `product_material`, `product_size`, `product_weight`, `product_batterycapacity`, `product_batterytype`, `product_timeoflaunch`, `product_timeofposting`, `product_guarantee`, `product_quanlity`, `product_name`, `product_status`, `product_price`) VALUES
(2, 1, 1, 'iOS 14', '', 'IPS LCD', 'HD (750 x 1334 Pixels)', '4.7\"', 'Kính cường lực Oleophobic (ion cường lực)', '12 MP', '4K 2160p@30fps', '4 đèn LED 2 tông màu', '', '7 MP', 1, '', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 3, 64, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', '', 'A-GPS, GLONASS', '', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung kim loại & Mặt lưng kính', 'Dài 138.4 mm - Ngang 67.3 mm - Dày 7.3 mm', '148', '1821 mAh', 'Li-Ion', '2020-10-10', '2021-01-15', 12, 10, 'iPhone SE 64GB (2020', 1, 10490000),
(3, 3, 1, 'iOS 14', '', 'OLED', 'Full HD+ (1080 x 2340 Pixels)', '5.4\"', 'Kính cường lực Ceramic Shield', '2 camera 12 MP', '4K 2160p@30fps', 'Đèn LED kép', 'HDR', '12 MP', 1, 'Quay phim 4K', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 6 nhân', 'Apple GPU 6 nhân', 4, 64, 'Không', 'Hỗ trợ 5G', '1 Nano SIM & 1 eSIM', 'Wi-Fi MIMO', 'A-GPS', 'v5.0, A2DP', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 131.5 mm - Ngang 64.2 mm - Dày 7.4 mm', '135', '2227 mAh', 'Li-Ion', '2020-10-10', '2021-01-17', 12, 10, 'iPhone 12 mini 64GB', 1, 19090000),
(4, 5, 1, 'iOS 14', '', 'OLED', '1170 x 2532 Pixels', '6.1\"', 'Kính cường lực Ceramic Shield', '2 camera 12 MP', '4K 2160p@30fps', 'Đèn LED kép', 'HDR', '12 MP', 1, 'Quay chậm (Slow Motion)', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 6 nhân', 'Apple GPU 6 nhân', 4, 64, 'Không', 'Hỗ trợ 5G', '1 Nano SIM & 1 eSIM', 'Wi-Fi MIMO', 'BDS', 'v5.0, A2DP', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 146.7 mm - Ngang 71.5 mm - Dày 7.4 mm', '164', '2815 mAh', 'Li-Ion', '2020-10-10', '2021-01-17', 12, 10, 'Bracket Pair Colorizer', 1, 23990000),
(5, 3, 1, 'IPS LCD', '', 'IPS LCD', '828 x 1792 Pixels', '6.1\"', 'Kính cường lực Oleophobic (ion cường lực)', '2 camera 12 MP', '4K 2160p@60fps', '3 đèn LED 2 tông màu', 'Ban đêm (Night Mode)', '12 MP', 1, 'Xóa phông', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 4, 64, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', 'Dual-band (2.4 GHz/5 GHz)', 'A-GPS', 'LE, A2DP', 'Lightning', 'Lightning', 'OTG, NFC', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 150.9 mm - Ngang 75.7 mm - Dày 8.3 mm', '194', '3110 mAh', 'Li-Ion', '2019-11-01', '2021-01-17', 12, 10, 'iPhone 11 64GB', 1, 17690000),
(6, 2, 1, 'iOS 12', '', 'IPS LCD', '828 x 1792 Pixels', '6.1\"', 'Kính cường lực Oleophobic (ion cường lực)', '12 MP', '4K 2160p@24fps', '4 đèn LED 2 tông màu', 'Điều chỉnh khẩu độ', '7 MP', 1, 'Nhận diện khuôn mặt', 'Apple A12 Bionic 6 nhân', '2 nhân 2.5 GHz & 4 nhân 1.6 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 3, 64, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', 'Wi-Fi hotspot', 'A-GPS, GLONASS', 'A2DP', 'Lightning', 'Lightning', 'NFC', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 150.9 mm - Ngang 75.7 mm - Dày 8.3 mm', '194', '2942 mAh', 'Li-Ion', '2018-11-05', '2021-01-17', 12, 12, 'iPhone XR 64GB', 1, 12190000),
(7, 1, 1, 'iOS 14', '', 'IPS LCD', 'HD (750 x 1334 Pixels)', '4.7\"', 'Kính cường lực Oleophobic (ion cường lực)', '12 MP', '4K 2160p@30fps', '4 đèn LED 2 tông màu', 'Zoom kỹ thuật số', '7 MP', 1, 'Xóa phông', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 3, 128, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', 'Wi-Fi 802.11 a/b/g/n/ac/ax', 'A-GPS, GLONASS', 'LE', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung kim loại & Mặt lưng kính', 'Dài 138.4 mm - Ngang 67.3 mm - Dày 7.3 mm', '148', '1821 mAh', 'Li-Ion', '2020-10-25', '2021-01-17', 12, 10, 'iPhone SE 128GB (2020)', 1, 11790000),
(8, 2, 1, 'iOS 14', '', 'IPS LCD', 'HD (750 x 1334 Pixels)', '4.7\"', 'Kính cường lực Oleophobic (ion cường lực)', '12 MP', '4K 2160p@60fps', '4 đèn LED 2 tông màu', 'Zoom kỹ thuật số', '7 MP', 1, 'Chống rung điện tử kỹ thuật số (EIS)', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 3, 256, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', 'Wi-Fi 802.11 a/b/g/n/ac/ax', 'A-GPS, GLONASS', 'LE, A2DP, v5.0', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung kim loại & Mặt lưng kính', 'Dài 138.4 mm - Ngang 67.3 mm - Dày 7.3 mm', '148', '1821 mAh', 'Li-Ion', '2020-10-15', '2021-01-17', 12, 10, 'iPhone SE 256GB (2020)', 1, 16990000),
(9, 1, 1, 'iOS 14', '', 'OLED', '1284 x 2778 Pixels', '6.7\"', 'Kính cường lực Ceramic Shield', '3 camera 12 MP', 'HD 720p@30fps', 'Đèn LED kép', 'Ban đêm (Night Mode)', '12 MP', 1, 'Xóa phông', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 6 nhân', 'Apple GPU 6 nhân', 6, 256, 'Không', 'Hỗ trợ 5G', '1 Nano SIM & 1 eSIM', 'Dual-band (2.4 GHz/5 GHz)', 'GLONASS', 'A2DP, v5.0', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung thép không gỉ & Mặt lưng kính cường lực', 'Dài 160.8 mm - Ngang 78.1 mm - Dày 7.4 mm', '228', '3687 mAh', 'Li-Ion', '2020-10-10', '2021-01-17', 12, 13, 'iPhone 12 Pro Max 256GB', 1, 36990000),
(10, 2, 1, 'IOS 14', '', 'OLED', 'Full HD+ (1080 x 2340 Pixels)', '5.4\"', 'Kính cường lực Ceramic Shield', '2 camera 12 MP', '4K 2160p@30fps', 'Đèn LED kép', 'HDR', '12 MP', 1, 'Quay chậm (Slow Motion)', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 6 nhân', '', 4, 256, 'Không', 'Hỗ trợ 5G', '1 Nano SIM & 1 eSIM', 'Wi-Fi MIMO', 'A-GPS', 'v5.0, A2DP', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 131.5 mm - Ngang 64.2 mm - Dày 7.4 mm', '135', '2227 mAh', 'Li-Ion', '2020-10-10', '2021-01-17', 12, 13, 'iPhone 12 mini 256GB', 1, 22490000),
(11, 1, 1, 'IOS 14', '', 'OLED', '1170 x 2532 Pixels', 'Màn hình rộng	6.1\"', 'Kính cường lực Ceramic Shield', '2 camera 12 MP', '4K 2160p@30fps', 'Đèn LED kép', 'HDR', '12 MP', 1, 'Quay chậm (Slow Motion)', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 6 nhân', 'Apple GPU 6 nhân', 4, 128, 'Không', 'Hỗ trợ 5G', '1 Nano SIM & 1 eSIM', 'Wi-Fi MIMO', 'BDS', 'v5.0, A2DP', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 146.7 mm - Ngang 71.5 mm - Dày 7.4 mm', '164', '2815 mAh', 'Li-Ion', '2020-10-10', '2021-01-17', 12, 15, 'iPhone 12 128GB', 1, 256920000),
(12, 2, 1, 'IOS 14', '', 'IPS LCD', '828 x 1792 Pixels', '6.1\"', 'Kính cường lực Oleophobic (ion cường lực)', '2 camera 12 MP', '4K 2160p@60fps', '4 đèn LED 2 tông màu', 'Ban đêm (Night Mode)', '12 MP', 1, 'Xóa phông', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 4, 256, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', 'Dual-band (2.4 GHz/5 GHz)', 'A-GPS', 'v5.0, LE', 'Lightning', 'Lightning', 'OTG, NFC', 'Nguyên khối', 'Khung nhôm & Mặt lưng kính cường lực', 'Dài 150.9 mm - Ngang 75.7 mm - Dày 8.3 mm', '194', '3110 mAh', 'Li-Ion', '2019-11-10', '2021-01-17', 12, 20, 'iPhone 11 256GB', 1, 21990000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_bill`
--
ALTER TABLE `active_bill`
  ADD PRIMARY KEY (`id_bill`,`id_user`);

--
-- Indexes for table `add_edit_product`
--
ALTER TABLE `add_edit_product`
  ADD PRIMARY KEY (`id_product`,`id_user_add`,`id_user_edit_last`),
  ADD KEY `id_user_add` (`id_user_add`),
  ADD KEY `id_user_edit_last` (`id_user_edit_last`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id_product`,`id_bill`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_account` (`customer_account`),
  ADD KEY `customer_type` (`customer_type`);

--
-- Indexes for table `cus_type`
--
ALTER TABLE `cus_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cus_type` (`cus_type`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`product_id`,`image_name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manager_code` (`manager_code`),
  ADD UNIQUE KEY `manager_email` (`manager_email`);

--
-- Indexes for table `manu_product`
--
ALTER TABLE `manu_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color` (`product_color`),
  ADD KEY `product_manu` (`product_manu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cus_type`
--
ALTER TABLE `cus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manu_product`
--
ALTER TABLE `manu_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_bill`
--
ALTER TABLE `active_bill`
  ADD CONSTRAINT `active_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Constraints for table `add_edit_product`
--
ALTER TABLE `add_edit_product`
  ADD CONSTRAINT `add_edit_product_ibfk_1` FOREIGN KEY (`id_user_add`) REFERENCES `manager` (`id`),
  ADD CONSTRAINT `add_edit_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `add_edit_product_ibfk_3` FOREIGN KEY (`id_user_edit_last`) REFERENCES `manager` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customer_type`) REFERENCES `cus_type` (`cus_type`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_color`) REFERENCES `color_product` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_manu`) REFERENCES `manu_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
