-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 08:03 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Drink'),
(3, 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_code` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_code`, `p_name`, `p_price`, `c_id`) VALUES
('123', 'Coffee', 40, 1),
('456', 'Milk', 20.2, 1),
('4569', 'Beef', 50.5, 3),
('789', 'Chicken', 40.8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sum` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sum`, `date`) VALUES
(12, '1', '2018-07-04'),
(13, '1', '2018-07-04'),
(14, '059', '2018-07-04'),
(15, '12230', '2018-07-04'),
(16, '60.2', '2018-07-04'),
(17, '100.2', '2018-07-04'),
(18, '80.4', '2018-07-04'),
(19, '40.4', '2018-07-04'),
(20, '140.1', '2018-07-04'),
(21, '60.2', '2018-07-04'),
(22, '180.1', '2018-07-04'),
(23, '80.4', '2018-07-04'),
(24, '60.2', '2018-07-04'),
(25, '0', '2018-07-04'),
(26, '0', '2018-07-04'),
(27, '0', '2018-07-04'),
(28, '0', '2018-07-04'),
(29, '140.1', '2018-07-04'),
(30, '0', '2018-07-04'),
(31, '0', '2018-07-04'),
(32, '20.2', '2018-07-04'),
(33, '40', '2018-07-04'),
(34, '120.3', '2018-07-04'),
(35, '20.2', '2018-07-04'),
(36, '220.5', '2018-07-04'),
(37, '0', '2018-07-04'),
(38, '20.2', '2018-07-04'),
(39, '0', '2018-07-04'),
(40, '0', '2018-07-04'),
(41, '140.1', '2018-07-04'),
(42, '160.3', '2018-07-04'),
(43, '20.2', '2018-07-04'),
(44, '60.2', '2018-07-04'),
(45, '111.5', '2018-07-04'),
(46, '40.8', '2018-07-04'),
(47, '40.8', '2018-07-04'),
(48, '91.3', '2018-07-05'),
(49, '40.8', '2018-07-05'),
(50, '50.5', '2018-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `s_detail_id` int(11) NOT NULL,
  `sale_no` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`s_detail_id`, `sale_no`, `product_id`) VALUES
(38, 44, '123'),
(37, 44, '456'),
(41, 45, '456'),
(40, 45, '4569'),
(45, 48, '4569'),
(47, 50, '4569'),
(39, 45, '789'),
(42, 46, '789'),
(43, 47, '789'),
(44, 48, '789'),
(46, 49, '789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_code`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`s_detail_id`,`sale_no`),
  ADD KEY `s_detail_id` (`s_detail_id`),
  ADD KEY `sale_no` (`sale_no`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `s_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`);

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`sale_no`) REFERENCES `sales` (`sale_id`),
  ADD CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
