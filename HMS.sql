-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 01:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `advance_booking_room`
--

CREATE TABLE `advance_booking_room` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `roomno` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Cancelled','Linked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advance_booking_room`
--

INSERT INTO `advance_booking_room` (`id`, `name`, `start`, `end`, `roomno`, `added_by`, `added_date`, `status`) VALUES
(10, 'AB1', '2018-11-01 00:00:00', '2018-11-03 00:00:00', 6, 'vicky nada', '2018-11-04 10:50:05', 'Active'),
(11, 'Ab2', '2018-11-03 00:00:00', '2018-11-05 00:00:00', 3, 'vicky nada', '2018-11-04 10:50:13', 'Active'),
(12, 'Ab3', '2018-11-01 00:00:00', '2018-11-06 00:00:00', 1, 'vicky nada', '2018-11-04 10:50:18', 'Active'),
(13, 'Ab4', '2018-11-05 00:00:00', '2018-11-10 00:00:00', 5, 'vicky nada', '2018-11-04 16:40:16', 'Cancelled'),
(14, 'Ac3', '2018-11-06 00:00:00', '2018-11-07 00:00:00', 3, 'vicky nada', '2018-11-04 17:06:16', 'Active'),
(15, 'pudd', '2018-11-08 00:00:00', '2018-11-09 00:00:00', 6, 'vicky nada', '2018-11-04 17:24:31', 'Cancelled'),
(16, 'asd', '2018-11-06 00:00:00', '2018-11-08 00:00:00', 2, 'vicky nada', '2018-11-04 18:13:23', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `id` int(11) NOT NULL,
  `booking_no` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `chkin_date` datetime DEFAULT NULL,
  `chkout_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_By` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`id`, `booking_no`, `room_no`, `guest_id`, `chkin_date`, `chkout_date`, `modified_date`, `modified_By`) VALUES
(1, 1, 2, 1, '2018-10-29 14:00:00', '2018-10-30 18:47:39', '2018-11-04 09:42:10', 'Vicky Nada'),
(2, 2, 3, 1, '2018-10-27 14:00:00', '2018-10-28 14:00:00', '2018-11-04 09:42:36', 'vicky nada'),
(3, 3, 4, 4, '2018-10-25 22:13:00', '2018-10-26 19:20:00', '2018-11-04 09:43:13', 'vicky nada');

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
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `mobile` int(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `identityType` varchar(50) DEFAULT NULL,
  `identityNo` varchar(50) DEFAULT NULL,
  `status` enum('Active','Blocked') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `title`, `firstname`, `lastname`, `gender`, `address`, `city`, `mobile`, `nationality`, `identityType`, `identityNo`, `status`) VALUES
(1, 'Mr', 'Ram', 'Gopal', 'Male', '30', 'Colombo', 25658, 'Srilankan', 'Nic', '902900085V', 'Active'),
(4, 'Mr', 'Chandra', 'Mouli', 'Male', '36,Malay Street', 'Colombo-2', 776546789, 'Sri Lankan', 'Nic', '897678765V', 'Active');

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
(3, 'bgt', 2555, 2, 4, 'Active'),
(4, 'hytu', 2563, 2, 3, 'Active'),
(5, 'samj', 6546, 3, 3, 'Blocked'),
(6, 'lop', 531, 2, 3, 'Active'),
(7, 'khkhkh', 54645, 5, 3, 'Active');

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
(2, 2, 1, 1, 'English', 'Occupied'),
(3, 3, 2, 2, 'English', 'Occupied'),
(4, 4, 2, 2, 'English', 'Available'),
(5, 5, 4, 4, 'English', 'Maintanance'),
(6, 6, 1, 1, 'English', 'Available'),
(7, 7, 1, 2, 'English', 'Maintanance');

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
(1, 6000, 'DELUXE ROOM', 'Active', 'Deluxe type rooms'),
(2, 11000, 'EXECUTIVE ROOM', 'Active', 'Executive type'),
(3, 4000, 'SINGLE ROOM', 'Active', 'One person'),
(4, 7000, 'TWIN ROOM', 'Active', 'idle for two people');

-- --------------------------------------------------------

--
-- Table structure for table `table_master`
--

CREATE TABLE `table_master` (
  `id` int(11) NOT NULL,
  `tblnum` int(11) NOT NULL DEFAULT '0',
  `seats` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','Blocked') NOT NULL,
  `cat` enum('Bar','Restaurant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_master`
--

INSERT INTO `table_master` (`id`, `tblnum`, `seats`, `status`, `cat`) VALUES
(1, 1, 10, 'Blocked', 'Restaurant'),
(2, 2, 6, 'Active', 'Restaurant'),
(3, 3, 4, 'Active', 'Restaurant'),
(4, 5, 4, 'Active', 'Bar');

-- --------------------------------------------------------

--
-- Table structure for table `taxservices`
--

CREATE TABLE `taxservices` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` enum('Tax','ServiceCharge') DEFAULT NULL,
  `value` double NOT NULL,
  `modifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxservices`
--

INSERT INTO `taxservices` (`id`, `name`, `type`, `value`, `modifiedDate`, `modifiedBy`) VALUES
(1, 'Tax', 'Tax', 4.5, '2018-10-23 00:13:46', 'Admin'),
(2, 'Bar', 'ServiceCharge', 18, '2018-10-22 23:40:54', 'Admin'),
(3, 'Restaurant', 'ServiceCharge', 15, '2018-10-22 23:40:58', 'Admin'),
(4, 'TAX', 'ServiceCharge', 5, '2018-10-28 20:02:07', 'Admin'),
(5, 'Tax', 'Tax', 7, '2018-10-28 20:02:09', 'Admin'),
(6, 'Restaurant', 'ServiceCharge', 12, '2018-10-28 20:02:12', 'Admin'),
(7, 'Bar', 'ServiceCharge', 12, '2018-10-28 20:02:14', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_booking_room`
--
ALTER TABLE `advance_booking_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `room_id` (`room_no`),
  ADD KEY `mofified_By` (`modified_By`);

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
  ADD KEY `role` (`role`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `floor_type`
--
ALTER TABLE `floor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
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
  ADD KEY `floortype` (`floortype`),
  ADD KEY `roomno` (`roomno`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_master`
--
ALTER TABLE `table_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxservices`
--
ALTER TABLE `taxservices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_booking_room`
--
ALTER TABLE `advance_booking_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_master`
--
ALTER TABLE `table_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxservices`
--
ALTER TABLE `taxservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`),
  ADD CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`room_no`) REFERENCES `room_master` (`roomno`),
  ADD CONSTRAINT `booking_room_ibfk_3` FOREIGN KEY (`modified_By`) REFERENCES `employee` (`name`);

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
