-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 09:49 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `id` int(11) NOT NULL,
  `booking_no` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `chkin_date` datetime DEFAULT NULL,
  `chkout_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mofified_By` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `deptid` int(11) NOT NULL,
  `deptname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptid`, `deptname`) VALUES
(1, 'Administration'),
(2, 'Front Office'),
(3, 'House Keeping'),
(4, 'Restaurant'),
(5, 'Bar'),
(6, 'IT'),
(7, 'Back office');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `tp` int(10) NOT NULL,
  `department` int(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `notes` text,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `name`, `Status`, `tp`, `department`, `password`, `role`, `notes`, `createdDate`, `updatedDate`, `created`) VALUES
(1, 'Madan', 1, 758965475, 4, '202cb962ac59075b964b07152d234b70', 3, 'khkj', '2018-08-12 12:38:00', '2018-08-14 23:37:04', NULL),
(2, 'Arun Kumar', 1, 755855855, 1, '202cb962ac59075b964b07152d234b70', 2, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(3, 'Joshop Kison', 1, 712569874, 7, '202cb962ac59075b964b07152d234b70', 4, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(4, 'Yanusa Cooray', 1, 712548962, 2, '202cb962ac59075b964b07152d234b70', 2, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(5, 'Afrad Ameer', 1, 775849632, 4, '202cb962ac59075b964b07152d234b70', 3, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(6, 'Isfaq Imthiyas', 0, 712657895, 5, '202cb962ac59075b964b07152d234b70', 4, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(7, 'Vicky Nada', 1, 756495844, 6, '202cb962ac59075b964b07152d234b70', 1, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(8, 'Steve Rogers', 1, 725485632, 5, '202cb962ac59075b964b07152d234b70', 4, NULL, '2018-08-12 11:37:17', '2018-08-12 11:37:17', NULL),
(10, 'Raj Kumar Hirani', 1, 758965475, 5, '202cb962ac59075b964b07152d234b70', 3, 'hy', '2018-08-12 12:48:15', '2018-08-14 23:37:57', NULL),
(11, 'Ram Kumar', 1, 775896587, 4, '202cb962ac59075b964b07152d234b70', 1, 'hello', '2018-08-12 12:49:56', '2018-08-14 06:15:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floor_type`
--

CREATE TABLE `floor_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `building` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `floor_type`
--

INSERT INTO `floor_type` (`id`, `name`, `building`) VALUES
(1, 'Ground Floor', 'Building1'),
(2, 'Floor1', 'Building1'),
(3, 'Floor2', 'Building1'),
(4, 'Floor3', 'Building1');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fax` int(10) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `slogan`, `address1`, `address2`, `address3`, `phone`, `email`, `fax`, `mobile`) VALUES
(1, 'K.S Food and Hotels', 'Quality and Luxury is our Aim', 'No 35', 'Central Street', 'Colombo-11', 214748364, 'ksfood@gmail.com', 214748364, 214783647);

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT '0',
  `status` enum('Active','Blocked') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `name`, `status`) VALUES
(1, 'cat1', 'Blocked'),
(2, 'cat2', 'Active'),
(3, 'cat3', 'Active'),
(4, 'cat4', 'Active'),
(5, 'cat5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `itemcat` int(11) NOT NULL,
  `itemunit` int(11) NOT NULL,
  `status` enum('Active','Blocked') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `itemname`, `rate`, `itemcat`, `itemunit`, `status`) VALUES
(1, 'hytuwww', 2563, 3, 4, 'Active'),
(2, 'ccv', 2232, 4, 5, 'Active'),
(3, 'bgt', 2555, 2, 4, 'Active'),
(4, 'hytu', 2563, 2, 3, 'Active'),
(5, 'samj', 6546, 3, 3, 'Blocked'),
(6, 'lop', 531, 2, 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `menu_unit`
--

CREATE TABLE `menu_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `status` enum('Active','Blocked') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_unit`
--

INSERT INTO `menu_unit` (`id`, `name`, `status`) VALUES
(1, 'pkg', 'Active'),
(2, 'pkg2', 'Active'),
(3, 'pkg3', 'Active'),
(4, 'pkg4', 'Blocked'),
(5, 'pkg5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Frontstaff'),
(4, 'Pos');

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL DEFAULT '0',
  `roomtype` int(11) NOT NULL DEFAULT '0',
  `floortype` int(11) NOT NULL DEFAULT '0',
  `toilet` varchar(50) NOT NULL DEFAULT '0',
  `availibility` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`id`, `roomno`, `roomtype`, `floortype`, `toilet`, `availibility`) VALUES
(1, 1, 3, 3, 'English', 'Available'),
(2, 2, 1, 1, 'English', 'Available'),
(3, 3, 2, 2, 'English', 'Available'),
(4, 4, 2, 2, 'English', 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `tariff` int(10) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '0',
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `tariff`, `type`, `status`, `remarks`) VALUES
(1, 6000, 'DELUXE ROOMS', 'Active', ''),
(2, 11000, 'EXECUTIVE ROOMS', 'Active', ''),
(3, 4000, 'SINGLE ROOMS', 'Active', ''),
(4, 7000, 'TWIN ROOMS', 'Active', 'idle for two people');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `department` (`department`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `floor_type`
--
ALTER TABLE `floor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemcat` (`itemcat`),
  ADD KEY `itemunit` (`itemunit`);

--
-- Indexes for table `menu_unit`
--
ALTER TABLE `menu_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomtype` (`roomtype`),
  ADD KEY `floortype` (`floortype`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `floor_type`
--
ALTER TABLE `floor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_unit`
--
ALTER TABLE `menu_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_master`
--
ALTER TABLE `room_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`room_no`) REFERENCES `room_master` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`deptid`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD CONSTRAINT `menu_master_ibfk_1` FOREIGN KEY (`itemcat`) REFERENCES `menu_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `menu_master_ibfk_2` FOREIGN KEY (`itemunit`) REFERENCES `menu_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_master`
--
ALTER TABLE `room_master`
  ADD CONSTRAINT `room_master_ibfk_1` FOREIGN KEY (`roomtype`) REFERENCES `room_type` (`id`),
  ADD CONSTRAINT `room_master_ibfk_2` FOREIGN KEY (`floortype`) REFERENCES `floor_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
