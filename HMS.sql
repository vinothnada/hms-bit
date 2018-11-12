-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hms
CREATE DATABASE IF NOT EXISTS `hms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hms`;

-- Dumping structure for table hms.advance_booking_room
CREATE TABLE IF NOT EXISTS `advance_booking_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `roomno` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Cancelled','Linked','Expired') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.advance_booking_room: ~9 rows (approximately)
DELETE FROM `advance_booking_room`;
/*!40000 ALTER TABLE `advance_booking_room` DISABLE KEYS */;
INSERT INTO `advance_booking_room` (`id`, `name`, `start`, `end`, `roomno`, `added_by`, `added_date`, `status`) VALUES
	(10, 'AB1', '2018-11-01 00:00:00', '2018-11-03 00:00:00', 6, 'vicky nada', '2018-11-11 13:16:22', 'Expired'),
	(11, 'Ab2', '2018-11-03 00:00:00', '2018-11-05 00:00:00', 3, 'vicky nada', '2018-11-06 08:54:57', 'Expired'),
	(13, 'Ab4', '2018-11-05 00:00:00', '2018-11-10 00:00:00', 5, 'vicky nada', '2018-11-10 19:32:25', 'Expired'),
	(14, 'Ac3', '2018-11-06 00:00:00', '2018-11-07 00:00:00', 3, 'vicky nada', '2018-11-09 22:35:43', 'Expired'),
	(15, 'pudd', '2018-11-08 00:00:00', '2018-11-09 00:00:00', 6, 'vicky nada', '2018-11-09 22:35:43', 'Expired'),
	(16, 'asd', '2018-11-06 00:00:00', '2018-11-08 00:00:00', 2, 'vicky nada', '2018-11-09 22:35:43', 'Expired'),
	(18, '123', '2018-11-06 00:00:00', '2018-11-08 00:00:00', 3, 'vicky_nada', '2018-11-09 22:35:43', 'Expired'),
	(19, '123', '2018-11-13 00:00:00', '2018-11-15 00:00:00', 3, 'vicky nada', '2018-11-12 19:31:24', 'Linked'),
	(20, '123', '2018-11-15 00:00:00', '2018-11-16 00:00:00', 2, 'vicky nada', '2018-11-12 19:36:40', 'Cancelled');
/*!40000 ALTER TABLE `advance_booking_room` ENABLE KEYS */;

-- Dumping structure for table hms.booking_room
CREATE TABLE IF NOT EXISTS `booking_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_no` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `chkin_date` datetime DEFAULT NULL,
  `chkout_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_By` varchar(50) DEFAULT NULL,
  `status` enum('in','out') DEFAULT 'in',
  PRIMARY KEY (`id`),
  KEY `guest_id` (`guest_id`),
  KEY `room_id` (`room_no`),
  KEY `mofified_By` (`modified_By`),
  KEY `booking_no` (`booking_no`),
  CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`),
  CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`room_no`) REFERENCES `room_master` (`roomno`),
  CONSTRAINT `booking_room_ibfk_3` FOREIGN KEY (`modified_By`) REFERENCES `employee` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.booking_room: ~3 rows (approximately)
DELETE FROM `booking_room`;
/*!40000 ALTER TABLE `booking_room` DISABLE KEYS */;
INSERT INTO `booking_room` (`id`, `booking_no`, `room_no`, `guest_id`, `chkin_date`, `chkout_date`, `modified_date`, `modified_By`, `status`) VALUES
	(1, 5, 1, 1, '2018-11-11 00:00:00', '2018-11-12 00:00:00', '2018-11-12 22:12:17', 'Vicky Nada', 'in'),
	(4, 6, 6, 1, '2018-11-11 18:53:00', '2018-11-13 22:41:00', '2018-11-13 00:07:47', 'vicky nada', 'in'),
	(5, 7, 3, 1, '2018-11-12 19:30:00', '2018-11-13 19:30:00', '2018-11-12 22:13:30', 'vicky nada', 'in');
/*!40000 ALTER TABLE `booking_room` ENABLE KEYS */;

-- Dumping structure for table hms.debit
CREATE TABLE IF NOT EXISTS `debit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Booking','Bar','Restaurant','Others') NOT NULL,
  `advance` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `due` int(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_no` (`booking_no`),
  CONSTRAINT `debit_ibfk_1` FOREIGN KEY (`booking_no`) REFERENCES `booking_room` (`booking_no`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.debit: ~2 rows (approximately)
DELETE FROM `debit`;
/*!40000 ALTER TABLE `debit` DISABLE KEYS */;
INSERT INTO `debit` (`id`, `type`, `advance`, `total`, `due`, `datecreated`, `booking_no`) VALUES
	(1, 'Booking', 2000, 6000, 4000, '2018-11-11 18:59:38', 6),
	(2, 'Booking', 2000, 11000, 9000, '2018-11-12 19:31:24', 7);
/*!40000 ALTER TABLE `debit` ENABLE KEYS */;

-- Dumping structure for table hms.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(50) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.departments: ~7 rows (approximately)
DELETE FROM `departments`;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`deptid`, `deptname`) VALUES
	(1, 'Administration'),
	(2, 'Front Office'),
	(3, 'House Keeping'),
	(4, 'Restaurant'),
	(5, 'Bar'),
	(6, 'IT'),
	(7, 'Back office');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table hms.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `empid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `tp` int(10) NOT NULL,
  `department` int(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `notes` text,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`empid`),
  KEY `department` (`department`),
  KEY `role` (`role`),
  KEY `name` (`name`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`deptid`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.employee: ~11 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
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
	(11, 'Ram Kumar', 1, 775896557, 4, '202cb962ac59075b964b07152d234b70', 1, 'hello', '2018-08-12 12:49:56', '2018-11-06 08:37:09', NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table hms.floor_type
CREATE TABLE IF NOT EXISTS `floor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `building` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.floor_type: ~4 rows (approximately)
DELETE FROM `floor_type`;
/*!40000 ALTER TABLE `floor_type` DISABLE KEYS */;
INSERT INTO `floor_type` (`id`, `name`, `building`) VALUES
	(1, 'Ground Floor', 'Building1'),
	(2, 'Floor1', 'Building1'),
	(3, 'Floor2', 'Building1'),
	(4, 'Floor3', 'Building1');
/*!40000 ALTER TABLE `floor_type` ENABLE KEYS */;

-- Dumping structure for table hms.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` enum('Active','Blocked') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.guests: ~2 rows (approximately)
DELETE FROM `guests`;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` (`id`, `title`, `firstname`, `lastname`, `gender`, `address`, `city`, `mobile`, `nationality`, `identityType`, `identityNo`, `status`) VALUES
	(1, 'Mr', 'Ram', 'Gopal', 'Male', '30', 'Colombo', 25658, 'Srilankan', 'Nic', '902900085V', 'Active'),
	(4, 'Mr', 'Chandra', 'Mouli', 'Male', '36,Malay Street', 'Colombo-2', 776546789, 'Sri Lankan', 'Nic', '897678765V', 'Active');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;

-- Dumping structure for table hms.hotel_info
CREATE TABLE IF NOT EXISTS `hotel_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fax` int(10) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.hotel_info: ~0 rows (approximately)
DELETE FROM `hotel_info`;
/*!40000 ALTER TABLE `hotel_info` DISABLE KEYS */;
INSERT INTO `hotel_info` (`id`, `name`, `slogan`, `address1`, `address2`, `address3`, `phone`, `email`, `fax`, `mobile`) VALUES
	(1, 'K.S Food and Hotels', 'Quality and Luxury is our Aim', 'No 35', 'Central Street', 'Colombo-11', 214748364, 'ksfood@gmail.com', 214748364, 214783647);
/*!40000 ALTER TABLE `hotel_info` ENABLE KEYS */;

-- Dumping structure for table hms.menu_category
CREATE TABLE IF NOT EXISTS `menu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `status` enum('Active','Blocked') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.menu_category: ~5 rows (approximately)
DELETE FROM `menu_category`;
/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;
INSERT INTO `menu_category` (`id`, `name`, `status`) VALUES
	(1, 'cat1', 'Active'),
	(2, 'cat2', 'Blocked'),
	(3, 'cat3', 'Active'),
	(4, 'cat4', 'Active'),
	(5, 'cat5', 'Active');
/*!40000 ALTER TABLE `menu_category` ENABLE KEYS */;

-- Dumping structure for table hms.menu_master
CREATE TABLE IF NOT EXISTS `menu_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `itemcat` int(11) NOT NULL,
  `itemunit` int(11) NOT NULL,
  `status` enum('Active','Blocked') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itemcat` (`itemcat`),
  KEY `itemunit` (`itemunit`),
  CONSTRAINT `menu_master_ibfk_1` FOREIGN KEY (`itemcat`) REFERENCES `menu_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `menu_master_ibfk_2` FOREIGN KEY (`itemunit`) REFERENCES `menu_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.menu_master: ~7 rows (approximately)
DELETE FROM `menu_master`;
/*!40000 ALTER TABLE `menu_master` DISABLE KEYS */;
INSERT INTO `menu_master` (`id`, `itemname`, `rate`, `itemcat`, `itemunit`, `status`) VALUES
	(1, 'hytuwww', 2563, 3, 4, 'Active'),
	(3, 'bgt', 2555, 2, 4, 'Active'),
	(4, 'hytu', 2563, 2, 3, 'Active'),
	(5, 'samj', 6546, 3, 3, 'Blocked'),
	(6, 'lop', 531, 2, 3, 'Active'),
	(7, 'khkhkh', 54645, 5, 3, 'Active');
/*!40000 ALTER TABLE `menu_master` ENABLE KEYS */;

-- Dumping structure for table hms.menu_unit
CREATE TABLE IF NOT EXISTS `menu_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `status` enum('Active','Blocked') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.menu_unit: ~5 rows (approximately)
DELETE FROM `menu_unit`;
/*!40000 ALTER TABLE `menu_unit` DISABLE KEYS */;
INSERT INTO `menu_unit` (`id`, `name`, `status`) VALUES
	(1, 'pkg', 'Active'),
	(2, 'pkg2', 'Active'),
	(3, 'pkg3', 'Active'),
	(4, 'pkg4', 'Blocked'),
	(5, 'pkg5', 'Active');
/*!40000 ALTER TABLE `menu_unit` ENABLE KEYS */;

-- Dumping structure for table hms.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`role_id`, `role_name`) VALUES
	(1, 'Superadmin'),
	(2, 'Admin'),
	(3, 'Frontstaff'),
	(4, 'Pos');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table hms.room_master
CREATE TABLE IF NOT EXISTS `room_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomno` int(11) NOT NULL DEFAULT '0',
  `roomtype` int(11) NOT NULL DEFAULT '0',
  `floortype` int(11) NOT NULL DEFAULT '0',
  `toilet` varchar(50) NOT NULL DEFAULT '0',
  `availibility` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `roomtype` (`roomtype`),
  KEY `floortype` (`floortype`),
  KEY `roomno` (`roomno`),
  CONSTRAINT `room_master_ibfk_1` FOREIGN KEY (`roomtype`) REFERENCES `room_type` (`id`),
  CONSTRAINT `room_master_ibfk_2` FOREIGN KEY (`floortype`) REFERENCES `floor_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.room_master: ~5 rows (approximately)
DELETE FROM `room_master`;
/*!40000 ALTER TABLE `room_master` DISABLE KEYS */;
INSERT INTO `room_master` (`id`, `roomno`, `roomtype`, `floortype`, `toilet`, `availibility`) VALUES
	(1, 1, 3, 3, 'English', 'Available'),
	(2, 2, 1, 1, 'English', 'Housekeeping'),
	(3, 3, 2, 2, 'English', 'Occupied'),
	(4, 4, 2, 2, 'English', 'Available'),
	(5, 5, 4, 4, 'English', 'Maintanance'),
	(6, 6, 1, 1, 'English', 'Occupied'),
	(7, 7, 1, 2, 'English', 'Maintanance');
/*!40000 ALTER TABLE `room_master` ENABLE KEYS */;

-- Dumping structure for table hms.room_type
CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tariff` int(10) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '0',
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.room_type: ~4 rows (approximately)
DELETE FROM `room_type`;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
INSERT INTO `room_type` (`id`, `tariff`, `type`, `status`, `remarks`) VALUES
	(1, 6000, 'DELUXE ROOM', 'Active', 'Deluxe type rooms'),
	(2, 11000, 'EXECUTIVE ROOM', 'Active', 'Executive type'),
	(3, 4000, 'SINGLE ROOM', 'Active', 'One person'),
	(4, 7000, 'TWIN ROOM', 'Active', 'idle for two people');
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;

-- Dumping structure for table hms.table_master
CREATE TABLE IF NOT EXISTS `table_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tblnum` int(11) NOT NULL DEFAULT '0',
  `seats` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','Blocked') NOT NULL,
  `cat` enum('Bar','Restaurant') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.table_master: ~4 rows (approximately)
DELETE FROM `table_master`;
/*!40000 ALTER TABLE `table_master` DISABLE KEYS */;
INSERT INTO `table_master` (`id`, `tblnum`, `seats`, `status`, `cat`) VALUES
	(1, 1, 10, 'Blocked', 'Restaurant'),
	(2, 2, 6, 'Active', 'Restaurant'),
	(3, 3, 4, 'Active', 'Restaurant'),
	(4, 5, 4, 'Active', 'Bar');
/*!40000 ALTER TABLE `table_master` ENABLE KEYS */;

-- Dumping structure for table hms.taxservices
CREATE TABLE IF NOT EXISTS `taxservices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type` enum('Tax','ServiceCharge') DEFAULT NULL,
  `value` double NOT NULL,
  `modifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.taxservices: ~7 rows (approximately)
DELETE FROM `taxservices`;
/*!40000 ALTER TABLE `taxservices` DISABLE KEYS */;
INSERT INTO `taxservices` (`id`, `name`, `type`, `value`, `modifiedDate`, `modifiedBy`) VALUES
	(1, 'Tax', 'Tax', 4.5, '2018-10-23 00:13:46', 'Admin'),
	(2, 'Bar', 'ServiceCharge', 18, '2018-10-22 23:40:54', 'Admin'),
	(3, 'Restaurant', 'ServiceCharge', 15, '2018-10-22 23:40:58', 'Admin'),
	(4, 'TAX', 'ServiceCharge', 5, '2018-10-28 20:02:07', 'Admin'),
	(5, 'Tax', 'Tax', 7, '2018-10-28 20:02:09', 'Admin'),
	(6, 'Restaurant', 'ServiceCharge', 12, '2018-10-28 20:02:12', 'Admin'),
	(7, 'Bar', 'ServiceCharge', 12, '2018-10-28 20:02:14', 'Admin');
/*!40000 ALTER TABLE `taxservices` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
