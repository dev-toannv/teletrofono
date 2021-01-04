-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2020 at 03:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_time` datetime NOT NULL,
  `bill_nameproduct` varchar(150) NOT NULL,
  `bill_namecustomer` varchar(40) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_phonenumber` int(11) NOT NULL,
  `bill_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_idproduct` int(11) NOT NULL,
  `cart_idcustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` int(11) NOT NULL,
  `color_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `count_bill_customer`
--

CREATE TABLE `count_bill_customer` (
  `id` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `customer_type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cus_type`
--

CREATE TABLE `cus_type` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manu_product`
--

CREATE TABLE `manu_product` (
  `id` int(11) NOT NULL,
  `manu_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE `nation` (
  `id` int(11) NOT NULL,
  `nation_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_product`
--

CREATE TABLE `os_product` (
  `id` int(11) NOT NULL,
  `os_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `phonenumber`, `usertype`, `user_id`) VALUES
(1, '0376886282', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_price` float NOT NULL,
  `product_color` int(11) DEFAULT NULL,
  `product_manu` int(11) DEFAULT NULL,
  `product_os` int(11) DEFAULT NULL,
  `product_des` text CHARACTER SET latin1 DEFAULT NULL,
  `product_tech_screen` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `product_resolution_screen` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `product_width_screen` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `product_touch_glass` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_resolution_camerarear` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `product_record_camerarear` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `product_flash_camerarear` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_feature_camerarear` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `product_resolution_frontcamera` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `product_videocall_frontcamera` tinyint(4) DEFAULT NULL,
  `product_feature_frontcamera` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `product_cpu` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_specification_cpu` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `product_gpu` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_specification_gpu` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `product_ram` int(10) DEFAULT NULL,
  `product_storage` int(10) DEFAULT NULL,
  `product_memorycard` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `product_mobilenetwork` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `product_sim` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_wifi` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `product_gps` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `product_bluetooth` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `product_chargingport` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `product_jack` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `product_otherconnect` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `product_design` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_material` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `product_size` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `product_weight` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `product_batterycapacity` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `product_batterytype` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `product_timeoflaunch` date DEFAULT NULL,
  `product_timeofposting` date DEFAULT NULL,
  `product_guarantee` tinyint(4) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `img_product_id` int(11) DEFAULT NULL,
  `img_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary_id_user` int(11) NOT NULL,
  `salary_basic` float DEFAULT NULL,
  `salary_allowance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_code` char(6) NOT NULL,
  `staff_name` varchar(40) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_sex` tinyint(4) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_address` varchar(200) DEFAULT NULL,
  `staff_hometown` varchar(200) DEFAULT NULL,
  `staff_avatar` varchar(150) DEFAULT NULL,
  `staff_timestart` datetime NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2,
  `staff_nation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `admin_acc` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(120) NOT NULL,
  `admin_phonenumbertype` int(11) NOT NULL DEFAULT 1,
  `admin_avatar` varchar(120) DEFAULT NULL,
  `admin_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `admin_acc`, `admin_pass`, `admin_name`, `admin_email`, `admin_phonenumbertype`, `admin_avatar`, `admin_address`) VALUES
(1, 'vantoan', 'vantoan', 'Nguyen Van Toan', 'ntoan2205@gmail.com', 1, 'abc', 'Ha Huy Tap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bill_phonenumber` (`bill_phonenumber`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_idproduct` (`cart_idproduct`),
  ADD KEY `cart_idcustomer` (`cart_idcustomer`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count_bill_customer`
--
ALTER TABLE `count_bill_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cus` (`id_cus`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_account` (`customer_account`);

--
-- Indexes for table `cus_type`
--
ALTER TABLE `cus_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `manu_product`
--
ALTER TABLE `manu_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manu_name` (`manu_name`),
  ADD UNIQUE KEY `manu_name_2` (`manu_name`);

--
-- Indexes for table `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nation_name` (`nation_name`);

--
-- Indexes for table `os_product`
--
ALTER TABLE `os_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `os_name` (`os_name`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `product_color` (`product_color`),
  ADD KEY `product_manu` (`product_manu`),
  ADD KEY `product_os` (`product_os`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_product_id` (`img_product_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_id_user` (`salary_id_user`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_code` (`staff_code`),
  ADD UNIQUE KEY `staff_email` (`staff_email`),
  ADD KEY `staff_nation` (`staff_nation`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_acc` (`admin_acc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `count_bill_customer`
--
ALTER TABLE `count_bill_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cus_type`
--
ALTER TABLE `cus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manu_product`
--
ALTER TABLE `manu_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `os_product`
--
ALTER TABLE `os_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `cart` (`cart_idproduct`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `cart` (`cart_idcustomer`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`bill_phonenumber`) REFERENCES `phone` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_idproduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_idcustomer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `count_bill_customer`
--
ALTER TABLE `count_bill_customer`
  ADD CONSTRAINT `count_bill_customer_ibfk_1` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id`);

--
-- Constraints for table `cus_type`
--
ALTER TABLE `cus_type`
  ADD CONSTRAINT `cus_type_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_color`) REFERENCES `color_product` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_manu`) REFERENCES `manu_product` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`product_os`) REFERENCES `os_product` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`img_product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`salary_id_user`) REFERENCES `staff` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`staff_nation`) REFERENCES `nation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
