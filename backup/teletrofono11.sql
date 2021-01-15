-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2021 at 11:19 AM
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
(5, 'Xanh lam'),
(6, 'Bạc');

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
(2, 'product_2');

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
(2, '123456789123', 'vantoan', 'vantoan', 'vantoan@gmail.com', 1, '2001-05-22', 'Hà Nội', 'Nam Định', NULL, '2021-01-15 13:49:18', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manu_product`
--

CREATE TABLE `manu_product` (
  `id` int(11) NOT NULL,
  `manu_name` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manu_product`
--

INSERT INTO `manu_product` (`id`, `manu_name`) VALUES
(1, 'APPLE'),
(2, 'SAMSUNG'),
(3, 'OPPO'),
(4, 'LENOVO');

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
  `product_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_color`, `product_manu`, `product_os`, `product_des`, `product_tech_screen`, `product_resolution_screen`, `product_width_screen`, `product_touch_glass`, `product_resolution_camerarear`, `product_record_camerarear`, `product_flash_camerarear`, `product_feature_camerarear`, `product_resolution_frontcamera`, `product_videocall_frontcamera`, `product_feature_frontcamera`, `product_cpu`, `product_specification_cpu`, `product_gpu`, `product_specification_gpu`, `product_ram`, `product_storage`, `product_memorycard`, `product_mobilenetwork`, `product_sim`, `product_wifi`, `product_gps`, `product_bluetooth`, `product_chargingport`, `product_jack`, `product_otherconnect`, `product_design`, `product_material`, `product_size`, `product_weight`, `product_batterycapacity`, `product_batterytype`, `product_timeoflaunch`, `product_timeofposting`, `product_guarantee`, `product_quanlity`, `product_name`, `product_status`) VALUES
(2, 1, 1, 'iOS 14', '', 'IPS LCD', 'HD (750 x 1334 Pixels)', '4.7\"', 'Kính cường lực Oleophobic (ion cường lực)', '12 MP', '4K 2160p@30fps', '4 đèn LED 2 tông màu', '', '7 MP', 1, '', 'Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 'Apple GPU 4 nhân', 3, 64, 'Không', 'Hỗ trợ 4G', '1 Nano SIM & 1 eSIM', '', 'A-GPS, GLONASS', '', 'Lightning', 'Lightning', 'OTG', 'Nguyên khối', 'Khung kim loại & Mặt lưng kính', 'Dài 138.4 mm - Ngang 67.3 mm - Dày 7.3 mm', '148', '1821 mAh', 'Li-Ion', '2020-10-10', '2021-01-15', 12, 10, 'iPhone SE 64GB (2020', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
