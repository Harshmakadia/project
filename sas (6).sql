-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 04:39 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE IF NOT EXISTS `ledger` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Group_ID` int(11) NOT NULL,
  `OpeningBalance` decimal(15,2) NOT NULL,
  `CrDr` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Group_ID` (`Group_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`Id`, `Name`, `FullName`, `Group_ID`, `OpeningBalance`, `CrDr`) VALUES
(137, 'Harsh', 'Makadia', 2, '-2000.00', 'credit'),
(138, 'Harh', 'mm', 3, '-12000.00', 'credit'),
(139, 'gfgfhgf', 'ghgfhg', 2, '-333.00', 'credit'),
(140, 'xcxvcxv', 'cvcvc', 2, '343.00', 'debit'),
(141, 'HARSH MAKADIAaza', 'qq', 1, '1000.00', 'credit'),
(142, 'Name', 'harsh', 2, '-12.55', 'credit'),
(143, 'hello', 'world ', 3, '-15.01', 'debit'),
(144, 'NAya', 'jdasg', 2, '-21.00', 'debit'),
(145, 'MDN', 'fdgdfg', 6, '-15854.00', 'credit'),
(146, 'mxnx', 'xmcxc', 4, '-154.00', 'debit'),
(147, 'ball', 'cup', 2, '-300.00', 'Cr'),
(148, 'A11', 'mahn', 3, '-300.00', 'Cr'),
(149, 'CreditBoss', 'boss', 2, '25000.00', 'Dr');

-- --------------------------------------------------------

--
-- Table structure for table `ledgeraddressdetail`
--

CREATE TABLE IF NOT EXISTS `ledgeraddressdetail` (
  `LedgerId` int(10) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Zipcode` int(10) NOT NULL,
  `Country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledgercontactdetails`
--

CREATE TABLE IF NOT EXISTS `ledgercontactdetails` (
  `LedgerId` int(10) NOT NULL,
  `MobileNo` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledgergroup`
--

CREATE TABLE IF NOT EXISTS `ledgergroup` (
  `Group_Id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Group_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ledgergroup`
--

INSERT INTO `ledgergroup` (`Group_Id`, `Name`) VALUES
(1, 'Bank Account'),
(2, 'Cash in Hand'),
(3, 'Expenses'),
(4, 'Sundry Creditors'),
(5, 'Sundry Debitors'),
(6, 'Supari A/c');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE IF NOT EXISTS `logindetails` (
  `DateTime` datetime NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `IPAddress` varchar(100) NOT NULL,
  `IsSuccess` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`DateTime`, `Email`, `Password`, `IPAddress`, `IsSuccess`) VALUES
('2015-08-18 10:36:11', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 10:36:35', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 11:39:53', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 12:28:22', 'ankur.vyas@marutitech.com', '121212121', '127.0.0.1', 0),
('2015-08-18 15:54:41', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 17:46:58', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 18:51:01', 'harsh.makadia@marutitech.com', 'h2AvxF9N8', '127.0.0.1', 1),
('2015-08-18 20:08:06', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 20:30:18', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 20:33:06', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-18 21:11:22', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 09:21:16', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 14:22:05', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 1),
('2015-08-19 14:31:15', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 1),
('2015-08-19 14:31:19', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 1),
('2015-08-19 18:17:55', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 18:17:59', 'harsh.makadia@marutitech.com', 'g6dY7V7Rn', '127.0.0.1', 1),
('2015-08-19 18:42:00', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 18:42:20', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 20:10:46', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 20:10:56', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 20:24:53', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 20:25:02', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 20:28:42', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 20:28:51', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-19 20:34:36', 'harsh.makadia@marutitech.com', 'jnCAoW213', '127.0.0.1', 1),
('2015-08-19 20:34:41', 'harsh.makadia@marutitech.com', 'r9fDJ57Gz', '127.0.0.1', 0),
('2015-08-19 20:34:46', 'harsh.makadia@marutitech.com', 'jnCAoW213', '127.0.0.1', 1),
('2015-08-19 20:34:49', 'harsh.makadia@marutitech.com', 'jnCAoW213', '127.0.0.1', 1),
('2015-08-20 09:17:43', 'harsh.makadia@marutitech.com', 'jnCAoW213', '127.0.0.1', 1),
('2015-08-20 10:26:35', 'harsh.makadia@marutitech.com', '62LUqZ2vi', '127.0.0.1', 1),
('2015-08-21 15:03:31', 'harsh.makadia@marutitech.com', '1K4NZ5jnu', '127.0.0.1', 0),
('2015-08-21 15:03:34', 'harsh.makadia@marutitech.com', '1K4NZ5jnu', '127.0.0.1', 0),
('2015-08-21 15:03:44', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-21 16:19:59', 'ankur.vyas@marutitech.com', '123456', '192.168.1.35', 1),
('2015-08-21 16:20:09', 'ankur.vyas@marutitech.com', '123456', '192.168.1.35', 1),
('2015-08-21 16:43:46', 'ankur.vyas@marutitech.com', '123456', '192.168.1.35', 1),
('2015-08-21 17:10:14', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-21 19:14:46', 'ankur.vyas@marutitech.com', '123456', '192.168.1.35', 1),
('2015-08-24 10:31:35', 'harsh.makadia@marutitech.com', '1K4NZ5jnu', '127.0.0.1', 0),
('2015-08-24 10:31:46', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-24 10:51:15', 'harsh.makadia@marutitech.com', '4mh0fX5MU', '127.0.0.1', 1),
('2015-08-24 12:37:39', 'harsh.makadia@marutitech.com', '4mh0fX5MU', '127.0.0.1', 1),
('2015-08-24 12:40:15', 'harsh.makadia@marutitech.com', '4mh0fX5MU', '127.0.0.1', 1),
('2015-08-24 15:29:06', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-24 18:26:31', 'harsh.makadia@marutitech.com', '4mh0fX5MU', '127.0.0.1', 0),
('2015-08-24 18:26:50', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-24 18:28:06', 'ankur.vyas@marutitech.com', '123456', '192.168.1.24', 1),
('2015-08-24 19:02:15', 'ankur.vyas@marutitech.com', '123455', '192.168.1.130', 0),
('2015-08-24 19:02:40', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-24 19:09:45', 'Ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-24 19:36:08', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-24 19:40:39', 'harsh.makadia@marutitech.com', 'harshmakadia', '192.168.1.130', 0),
('2015-08-24 20:01:26', 'ankur.vyas@marutitech.com', '123456', '192.168.1.87', 1),
('2015-08-24 20:09:48', 'harsh.makadia@marutitech.com', '31tOHeoX9', '192.168.1.130', 1),
('2015-08-24 20:11:04', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 09:29:11', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 16:31:46', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 16:32:15', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 16:32:15', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 16:35:32', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 16:35:50', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 17:30:02', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-25 17:30:51', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-25 17:34:50', 'ankur.vyas@marutitech.com', '123456', '192.168.1.87', 1),
('2015-08-25 17:45:27', '', '', '192.168.1.24', 0),
('2015-08-25 17:45:29', '', '', '192.168.1.24', 0),
('2015-08-25 17:45:32', '', '', '192.168.1.24', 0),
('2015-08-25 18:38:36', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-25 18:39:21', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-25 19:47:16', 'makaaaaaaaaa', 'aadaadddddadada', '192.168.1.24', 0),
('2015-08-27 09:14:42', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-27 12:50:29', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-27 16:56:19', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-27 16:58:06', 'harsh.makadia@marutitech.com', 'QWERTY', '192.168.1.130', 0),
('2015-08-27 16:58:11', 'ankur.vyas@marutitech.com', '', '192.168.1.130', 0),
('2015-08-27 16:58:20', 'ankur.vyas@marutitech.com', '123456', '192.168.1.130', 1),
('2015-08-27 18:22:55', 'harsh.makadia@marutitech.cofdfm', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-27 18:22:59', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-27 19:32:06', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-27 19:48:02', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 1),
('2015-08-27 19:49:03', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 0),
('2015-08-27 19:49:09', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 0),
('2015-08-27 19:49:37', 'ankur.vyas@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-27 19:50:34', 'harsh.makadia@marutitech.com', '0AYwk12Is', '127.0.0.1', 1),
('2015-08-27 19:52:50', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 09:30:43', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-28 09:30:49', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 10:04:13', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-28 10:04:13', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-28 10:04:18', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 10:35:11', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-28 10:35:11', 'harsh.makadia@marutitech.com', '31tOHeoX9', '127.0.0.1', 0),
('2015-08-28 10:35:16', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 11:02:41', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 11:54:21', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 14:16:44', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-28 18:19:35', 'harsh.makadia@marutitech.com', '123456', '192.168.1.99', 1),
('2015-08-28 18:49:24', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-31 09:33:18', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-31 10:21:11', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-08-31 15:53:45', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-09-01 09:19:32', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-09-01 16:16:40', 'harsh.makadia@marutitech.com', '123456', '127.0.0.1', 1),
('2015-09-08 09:19:09', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-08 17:54:42', 'harsh.makadia@marutitech.com', '123456', '192.168.1.24', 1),
('2015-09-08 18:32:20', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-08 20:06:42', 'ankur.vyas@marutitech.com', '123456', '::1', 1),
('2015-09-08 20:23:44', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-08 20:36:06', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-08 20:54:16', 'ankur.vyas@marutitech.com', '123456', '::1', 1),
('2015-09-09 09:25:07', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-09 12:25:02', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-09 14:39:49', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-10 09:20:22', 'harsh.makadia@marutitech.com', '123456', '::1', 1),
('2015-09-10 14:11:46', 'harsh.makadia@marutitech.com', '123456', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crdr` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `debit` int(10) NOT NULL,
  `openingbalance` int(10) NOT NULL,
  `Created_by` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(10) NOT NULL,
  `date` date NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `crdr`, `name`, `debit`, `openingbalance`, `Created_by`, `created_at`, `amount`, `date`, `total`) VALUES
(7, 'Dr', 'Name', 100, 112, 'Harsh', '2015-09-09 11:18:29', 0, '0000-00-00', 200),
(8, 'Dr', 'NAya', 100, 121, 'Harsh', '2015-09-09 11:18:29', 0, '0000-00-00', 200);

-- --------------------------------------------------------

--
-- Table structure for table `scrollmaster`
--

CREATE TABLE IF NOT EXISTS `scrollmaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `lastNo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `scrollmaster`
--

INSERT INTO `scrollmaster` (`id`, `month`, `year`, `lastNo`) VALUES
(25, 9, 15, 36);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `t_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_amount` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `t_id`, `type_id`, `date`, `created_by`, `created_at`, `updated_by`, `updated_at`, `total_amount`) VALUES
(119, 29, 1, '2015-09-10', 'Harsh', '2015-09-10 12:54:27', '', '0000-00-00 00:00:00', 6),
(120, 30, 1, '2015-09-10', 'Harsh', '2015-09-10 12:58:19', '', '0000-00-00 00:00:00', 100),
(121, 31, 1, '2015-09-10', 'Harsh', '2015-09-10 13:27:49', '', '0000-00-00 00:00:00', 1000),
(122, 32, 1, '2015-09-10', 'Harsh', '2015-09-10 13:28:22', '', '0000-00-00 00:00:00', 1000),
(123, 33, 1, '2015-09-10', 'Harsh', '2015-09-10 13:28:55', '', '0000-00-00 00:00:00', 100),
(124, 34, 1, '2015-09-10', 'Harsh', '2015-09-10 13:30:31', '', '0000-00-00 00:00:00', 100),
(125, 35, 1, '2015-09-10', 'Harsh', '2015-09-10 14:37:50', '', '0000-00-00 00:00:00', 200),
(126, 36, 1, '2015-09-10', 'Harsh', '2015-09-10 14:38:54', '', '0000-00-00 00:00:00', 200);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) NOT NULL,
  `ledger` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `ledger`, `amount`) VALUES
(8, 119, 'A11', 1),
(9, 119, 'ball', 2),
(10, 119, 'gfgfhgf', 3),
(11, 120, 'CreditBoss', 100),
(12, 121, 'NAya', 1000),
(13, 122, 'NAya', 1000),
(14, 123, 'NAya', 100),
(15, 124, 'Name', 100),
(16, 125, 'CreditBoss', 200),
(17, 126, 'MDN', 200);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE IF NOT EXISTS `userdetail` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Email` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`Id`, `Email`, `FirstName`, `LastName`, `Password`) VALUES
(1, 'ankur.vyas@marutitech.com', 'Ankur', 'Vyas', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'ankur@marutitech.com', 'Ankur', 'Vyas', 'e10adc3949ba59abbe56e057f20f883e'),
(46, 'harsh.makadia@marutitech.com', 'Harsh', 'Makadia', 'e10adc3949ba59abbe56e057f20f883e'),
(47, 'harshmakadia11@gmail.com', 'sample', 'last', '3797cca025f1c164ca1abb2a062fe71d');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE IF NOT EXISTS `voucher_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`id`, `type`) VALUES
(1, 'payment'),
(2, 'receipt'),
(3, 'journal');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `ledger_ibfk_1` FOREIGN KEY (`Group_ID`) REFERENCES `ledgergroup` (`Group_Id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `voucher_type` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
