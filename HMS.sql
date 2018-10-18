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

-- Dumping structure for table hms.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table hms.booking: ~0 rows (approximately)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;

-- Dumping structure for table hms.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(50) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.departments: ~7 rows (approximately)
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
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`deptid`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.employee: ~11 rows (approximately)
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
	(11, 'Ram Kumar', 1, 775896587, 4, '202cb962ac59075b964b07152d234b70', 1, 'hello', '2018-08-12 12:49:56', '2018-08-14 06:15:19', NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table hms.floor_type
CREATE TABLE IF NOT EXISTS `floor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `building` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.floor_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `floor_type` DISABLE KEYS */;
INSERT INTO `floor_type` (`id`, `name`, `building`) VALUES
	(1, 'Ground Floor', 'Building1'),
	(2, 'Floor1', 'Building1'),
	(3, 'Floor2', 'Building1'),
	(4, 'Floor3', 'Building1');
/*!40000 ALTER TABLE `floor_type` ENABLE KEYS */;

-- Dumping structure for table hms.guest
CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `secondname` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `mobile` int(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `identityType` varchar(50) DEFAULT NULL,
  `identityNo` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table hms.guest: ~0 rows (approximately)
/*!40000 ALTER TABLE `guest` DISABLE KEYS */;
/*!40000 ALTER TABLE `guest` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;
INSERT INTO `menu_category` (`id`, `name`, `status`) VALUES
	(1, 'cat1', 'Blocked'),
	(2, 'cat2', 'Active'),
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
  CONSTRAINT `room_master_ibfk_1` FOREIGN KEY (`roomtype`) REFERENCES `room_type` (`id`),
  CONSTRAINT `room_master_ibfk_2` FOREIGN KEY (`floortype`) REFERENCES `floor_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table hms.room_master: ~5 rows (approximately)
/*!40000 ALTER TABLE `room_master` DISABLE KEYS */;
INSERT INTO `room_master` (`id`, `roomno`, `roomtype`, `floortype`, `toilet`, `availibility`) VALUES
	(1, 1, 3, 3, 'English', 'Available'),
	(2, 2, 1, 1, 'English', 'Available'),
	(3, 3, 2, 2, 'English', 'Available'),
	(4, 4, 2, 2, 'English', 'Occupied'),
	(5, 5, 4, 4, 'English', 'Available');
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
/*!40000 ALTER TABLE `table_master` DISABLE KEYS */;
INSERT INTO `table_master` (`id`, `tblnum`, `seats`, `status`, `cat`) VALUES
	(1, 1, 10, 'Blocked', 'Restaurant'),
	(2, 2, 6, 'Active', 'Restaurant'),
	(3, 3, 4, 'Active', 'Restaurant'),
	(4, 5, 4, 'Active', 'Bar');
/*!40000 ALTER TABLE `table_master` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
