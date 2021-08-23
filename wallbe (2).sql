-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 02:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins_info`
--

CREATE TABLE `tbl_admins_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_admins_info`
--

INSERT INTO `tbl_admins_info` (`id`, `first_name`, `last_name`, `email`, `password`, `is_active`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '$2y$10$XJoxXmqeuavf9fkRzxUpT.Dyg1jXlFd/Q2rNEGCzdETqsy9CwNgR.', 1, NULL, '2021-04-24 19:38:30', '2021-05-04 04:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries_info`
--

CREATE TABLE `tbl_countries_info` (
  `id` int(11) NOT NULL,
  `country` varchar(75) NOT NULL,
  `un_code` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_countries_info`
--

INSERT INTO `tbl_countries_info` (`id`, `country`, `un_code`, `created_at`) VALUES
(1, 'Pakistan', 0, '2021-04-24 15:58:27'),
(2, 'USA', 0, '2021-04-24 15:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marketplace_settings_info`
--

CREATE TABLE `tbl_marketplace_settings_info` (
  `id` int(11) NOT NULL,
  `comission` float NOT NULL,
  `gst` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_marketplace_settings_info`
--

INSERT INTO `tbl_marketplace_settings_info` (`id`, `comission`, `gst`, `created_at`, `updated_at`) VALUES
(2, 20, 5, '2021-04-27 11:18:00', '2021-04-27 11:18:00'),
(3, 21, 5, '2021-04-27 11:18:09', '2021-04-27 11:18:09'),
(4, 21, 15, '2021-04-28 07:31:42', '2021-04-28 07:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cancellation_info`
--

CREATE TABLE `tbl_order_cancellation_info` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `cust_due` int(11) DEFAULT NULL,
  `pract_due` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_cancellation_info`
--

INSERT INTO `tbl_order_cancellation_info` (`id`, `order_id`, `reason`, `user_id`, `is_admin`, `cust_due`, `pract_due`, `created_at`, `updated_at`) VALUES
(6, 1012, 'testing reason', 1, NULL, 1, NULL, '2021-05-18 17:09:53', '2021-05-18 12:09:53'),
(7, 1045, 'email testing', 3, NULL, NULL, NULL, '2021-05-27 02:13:38', '2021-05-27 02:13:38'),
(8, 1045, 'email testing', 3, NULL, NULL, NULL, '2021-05-27 02:13:50', '2021-05-27 02:13:50'),
(9, 1032, 'sadasd', 1, NULL, NULL, NULL, '2021-05-27 02:23:49', '2021-05-27 02:23:49'),
(10, 1043, 'admin email testing', NULL, 1, NULL, NULL, '2021-05-27 02:33:10', '2021-05-27 02:33:10'),
(11, 1023, 'sdadsadsad', NULL, 1, NULL, NULL, '2021-05-27 02:37:48', '2021-05-27 02:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_chat_conversation`
--

CREATE TABLE `tbl_order_chat_conversation` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_chat_conversation`
--

INSERT INTO `tbl_order_chat_conversation` (`id`, `order_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1011, 3, 'hey', '2021-05-08 10:51:05', '2021-05-08 10:51:05'),
(2, 1011, 1, 'hello', '2021-05-08 10:51:09', '2021-05-08 10:51:09'),
(3, 1011, 3, 'test', '2021-05-08 07:10:30', '2021-05-08 07:10:30'),
(4, 1011, 3, 'test', '2021-05-08 07:11:23', '2021-05-08 07:11:23'),
(5, 1011, 3, 'sdafasdf asdfasdf', '2021-05-08 07:11:29', '2021-05-08 07:11:29'),
(6, 1011, 3, 'sdafasdf', '2021-05-08 07:11:49', '2021-05-08 07:11:49'),
(7, 1011, 3, 'asdfasdf asdfasdf', '2021-05-08 07:11:52', '2021-05-08 07:11:52'),
(8, 1011, 3, 'asdfasd asdfasdfsad', '2021-05-08 07:11:54', '2021-05-08 07:11:54'),
(10, 1012, 1, 'test', '2021-05-10 01:15:55', '2021-05-10 01:15:55'),
(11, 1012, 1, 'sdfasd', '2021-05-10 01:16:12', '2021-05-10 01:16:12'),
(12, 1011, 1, 'test', '2021-05-10 01:28:51', '2021-05-10 01:28:51'),
(13, 1011, 3, 'test', '2021-05-10 02:16:24', '2021-05-10 02:16:24'),
(14, 1011, 3, 'test', '2021-05-10 02:18:06', '2021-05-10 02:18:06'),
(15, 1011, 3, 'test', '2021-05-10 02:18:52', '2021-05-10 02:18:52'),
(16, 1011, 3, 'test', '2021-05-10 02:19:05', '2021-05-10 02:19:05'),
(17, 1011, 3, 'test', '2021-05-10 02:19:13', '2021-05-10 02:19:13'),
(18, 1011, 3, 'test', '2021-05-10 02:20:13', '2021-05-10 02:20:13'),
(19, 1011, 1, 'hi', '2021-05-10 02:20:42', '2021-05-10 02:20:42'),
(20, 1011, 1, 'sadfsad', '2021-05-10 02:21:49', '2021-05-10 02:21:49'),
(21, 1011, 1, '123', '2021-05-10 02:22:33', '2021-05-10 02:22:33'),
(22, 1011, 1, 'test', '2021-05-10 02:23:24', '2021-05-10 02:23:24'),
(23, 1011, 3, 'testing', '2021-05-10 02:25:04', '2021-05-10 02:25:04'),
(24, 1011, 3, 'test', '2021-05-10 02:27:17', '2021-05-10 02:27:17'),
(25, 1011, 3, 'hi', '2021-05-10 02:27:26', '2021-05-10 02:27:26'),
(26, 1011, 1, 'test', '2021-05-10 02:27:34', '2021-05-10 02:27:34'),
(27, 1011, 1, 'ts', '2021-05-10 02:28:49', '2021-05-10 02:28:49'),
(28, 1011, 1, 'yrdy', '2021-05-10 02:32:55', '2021-05-10 02:32:55'),
(29, 1011, 1, 'hello', '2021-05-10 02:36:30', '2021-05-10 02:36:30'),
(30, 1011, 3, 'testing', '2021-05-10 02:41:48', '2021-05-10 02:41:48'),
(31, 1011, 3, 'test', '2021-05-10 02:42:45', '2021-05-10 02:42:45'),
(32, 1011, 3, 'test', '2021-05-10 02:43:50', '2021-05-10 02:43:50'),
(33, 1011, 3, 'test', '2021-05-10 02:44:06', '2021-05-10 02:44:06'),
(34, 1002, 1, 'test', '2021-05-10 02:44:19', '2021-05-10 02:44:19'),
(35, 1011, 3, 'test', '2021-05-10 02:44:36', '2021-05-10 02:44:36'),
(36, 1011, 1, 'he', '2021-05-10 02:44:43', '2021-05-10 02:44:43'),
(37, 1011, 1, 'test', '2021-05-10 02:52:31', '2021-05-10 02:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail_info`
--

CREATE TABLE `tbl_order_detail_info` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `serve_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail_info`
--

INSERT INTO `tbl_order_detail_info` (`id`, `order_id`, `service_id`, `qty`, `price`, `serve_date`, `start_time`, `end_time`) VALUES
(1, 1002, 2, 2, 25, '2021-05-09', '17:00:00', '11:55:06'),
(2, 1002, 4, 1, 25, '2021-05-09', '17:30:32', '12:55:06'),
(7, 1011, 2, 2, 200, '2021-05-27', '19:30:00', '20:00:00'),
(8, 1011, 5, 2, 200, '2021-05-27', '19:30:00', '20:30:00'),
(9, 1011, 6, 1, 50, '2021-05-27', '19:30:00', '20:00:00'),
(10, 1012, 2, 1, 100, '2021-05-16', '17:00:00', '17:30:00'),
(11, 1012, 3, 1, 50, '2021-05-16', '17:00:00', '17:30:00'),
(12, 1013, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(13, 1014, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(14, 1015, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(15, 1016, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(16, 1017, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(17, 1018, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(18, 1019, 2, 1, 100, '2021-05-23', '17:00:00', '17:30:00'),
(19, 1020, 2, 1, 100, '2021-05-28', '12:00:00', '12:30:00'),
(20, 1020, 3, 1, 50, '2021-05-28', '12:00:00', '12:30:00'),
(21, 1021, 2, 1, 100, '2021-05-28', '12:00:00', '12:30:00'),
(22, 1021, 3, 1, 50, '2021-05-28', '12:00:00', '12:30:00'),
(23, 1022, 2, 1, 100, '2021-05-28', '12:00:00', '12:30:00'),
(24, 1022, 3, 1, 50, '2021-05-28', '12:00:00', '12:30:00'),
(25, 1023, 2, 2, 200, '2021-05-28', '18:00:00', '18:30:00'),
(26, 1023, 3, 2, 100, '2021-05-28', '18:00:00', '18:30:00'),
(27, 1024, 5, 1, 100, '2021-05-30', '17:00:00', '18:00:00'),
(28, 1025, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(29, 1025, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(30, 1026, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(31, 1026, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(32, 1027, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(33, 1027, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(34, 1028, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(35, 1028, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(36, 1029, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(37, 1029, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(38, 1030, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(39, 1030, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(40, 1031, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(41, 1031, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(42, 1032, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(43, 1032, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(44, 1033, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(45, 1033, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(46, 1034, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(47, 1034, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(48, 1035, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(49, 1035, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(50, 1036, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(51, 1036, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(52, 1037, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(53, 1037, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(54, 1038, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(55, 1038, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(56, 1039, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(57, 1039, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(58, 1040, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(59, 1040, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(60, 1041, 8, 1, 50, '2021-05-30', '18:30:00', '18:50:00'),
(61, 1041, 6, 1, 50, '2021-05-30', '18:30:00', '19:00:00'),
(62, 1042, 6, 1, 50, '2021-05-28', '21:00:00', '21:30:00'),
(63, 1043, 6, 1, 50, '2021-05-28', '21:00:00', '21:30:00'),
(64, 1044, 2, 1, 100, '2021-05-31', '12:00:00', '12:30:00'),
(65, 1044, 3, 1, 50, '2021-05-31', '12:00:00', '12:30:00'),
(66, 1044, 4, 1, 50, '2021-05-31', '12:00:00', '12:30:00'),
(67, 1045, 2, 1, 100, '2021-05-31', '12:00:00', '12:30:00'),
(68, 1045, 3, 1, 50, '2021-05-31', '12:00:00', '12:30:00'),
(69, 1045, 4, 1, 50, '2021-05-31', '12:00:00', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_info`
--

CREATE TABLE `tbl_order_info` (
  `id` int(11) NOT NULL,
  `pract_id` int(11) NOT NULL,
  `booker_id` int(11) NOT NULL,
  `start_at` date DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `gst` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `pract_earning` double DEFAULT NULL,
  `payment_status` int(11) DEFAULT 0 COMMENT '(0="In-Escrow") (1="Paid")\r\n(2="Refunded")',
  `refund_payment` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `reminder_email` int(11) NOT NULL COMMENT '1=send, 0=pending ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_info`
--

INSERT INTO `tbl_order_info` (`id`, `pract_id`, `booker_id`, `start_at`, `sub_total`, `gst`, `total_amount`, `pract_earning`, `payment_status`, `refund_payment`, `status`, `reminder_email`, `created_at`, `updated_at`) VALUES
(1002, 1, 3, '2021-05-09', 50, 5, 55, 41, 1, NULL, 3, 0, '2021-04-29 08:08:14', '2021-05-08 02:26:25'),
(1011, 1, 3, '2021-05-27', 450, 67.5, 517.5, 360, NULL, NULL, 1, 1, '2021-05-06 01:59:04', '2021-05-27 18:00:22'),
(1012, 1, 3, '2021-05-16', 150, 22.5, 172.5, 31.5, NULL, NULL, 4, 0, '2021-05-06 02:12:46', '2021-05-06 05:14:18'),
(1013, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 03:58:38', '2021-05-10 03:58:38'),
(1014, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 03:59:41', '2021-05-10 03:59:41'),
(1015, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 04:32:48', '2021-05-10 04:32:48'),
(1016, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 04:35:11', '2021-05-10 04:35:11'),
(1017, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 04:37:21', '2021-05-10 04:37:21'),
(1018, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-10 04:39:47', '2021-05-10 04:39:47'),
(1019, 1, 3, '2021-05-23', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-10 04:43:14', '2021-05-10 04:43:28'),
(1020, 1, 3, '2021-05-28', 150, 22.5, 172.5, 31.5, 0, NULL, 9, 0, '2021-05-26 06:03:48', '2021-05-26 06:03:48'),
(1021, 1, 3, '2021-05-28', 150, 22.5, 172.5, 31.5, 0, NULL, 9, 0, '2021-05-26 06:04:28', '2021-05-26 06:04:28'),
(1022, 1, 3, '2021-05-28', 150, 22.5, 172.5, 31.5, 0, NULL, 1, 0, '2021-05-26 06:35:38', '2021-05-26 06:36:00'),
(1023, 1, 3, '2021-05-28', 300, 45, 345, 63, 0, NULL, 4, 0, '2021-05-26 06:38:51', '2021-05-27 02:37:48'),
(1024, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 06:39:58', '2021-05-26 06:40:20'),
(1025, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 07:11:33', '2021-05-26 07:11:53'),
(1026, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-26 07:49:43', '2021-05-26 07:49:43'),
(1027, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 07:50:01', '2021-05-26 07:50:19'),
(1028, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 07:51:07', '2021-05-26 07:51:24'),
(1029, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 07:52:17', '2021-05-26 07:52:40'),
(1030, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 07:59:47', '2021-05-26 08:00:09'),
(1031, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:08:34', '2021-05-26 08:08:54'),
(1032, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 4, 0, '2021-05-26 08:10:06', '2021-05-27 02:23:49'),
(1033, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-26 08:10:45', '2021-05-26 08:10:45'),
(1034, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:10:58', '2021-05-26 08:11:10'),
(1035, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 9, 0, '2021-05-26 08:12:48', '2021-05-26 08:12:48'),
(1036, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:12:55', '2021-05-26 08:13:08'),
(1037, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:16:37', '2021-05-26 08:16:51'),
(1038, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:26:26', '2021-05-26 08:26:43'),
(1039, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 08:30:50', '2021-05-26 08:31:06'),
(1040, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 09:27:45', '2021-05-26 09:28:04'),
(1041, 1, 3, '2021-05-30', 100, 15, 115, 21, 0, NULL, 1, 0, '2021-05-26 09:29:19', '2021-05-26 09:29:39'),
(1042, 1, 3, '2021-05-28', 50, 7.5, 57.5, 10.5, 0, NULL, 9, 0, '2021-05-26 10:25:14', '2021-05-26 10:25:14'),
(1043, 1, 3, '2021-05-28', 50, 7.5, 57.5, 10.5, 0, NULL, 4, 0, '2021-05-26 10:27:18', '2021-05-27 02:33:10'),
(1045, 1, 3, '2021-05-31', 200, 30, 230, 42, 0, NULL, 4, 0, '2021-05-26 10:39:02', '2021-05-27 02:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_billing_type`
--

CREATE TABLE `tbl_package_billing_type` (
  `id` int(11) NOT NULL,
  `label` enum('semi_annually','annually') NOT NULL,
  `no_months` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_package_billing_type`
--

INSERT INTO `tbl_package_billing_type` (`id`, `label`, `no_months`, `created_at`, `updated_at`) VALUES
(1, 'semi_annually', 6, '2021-04-24 20:23:53', '2021-04-24 20:23:53'),
(2, 'annually', 12, '2021-04-24 20:23:53', '2021-04-24 20:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_plan`
--

CREATE TABLE `tbl_package_plan` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `billing_type_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_package_plan`
--

INSERT INTO `tbl_package_plan` (`id`, `title`, `billing_type_id`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hobby Annual', 1, 37.42, 'images/package-icon1.png', '2021-04-24 20:26:24', '2021-04-24 20:26:24'),
(2, 'Startup Annual', 1, 93.5, 'images/package-icon2.png', '2021-04-24 20:26:24', '2021-04-24 20:26:24'),
(3, 'Standard Annual', 2, 149.75, 'images/package-icon3.png', '2021-04-24 20:26:24', '2021-04-24 20:26:24'),
(4, 'Growth Annual', 2, 199.5, 'images/package-icon4.png', '2021-04-24 20:26:24', '2021-04-24 20:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_plan_details`
--

CREATE TABLE `tbl_package_plan_details` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `feature_item` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_package_plan_details`
--

INSERT INTO `tbl_package_plan_details` (`id`, `plan_id`, `feature_item`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ordering Website (Non-Whitelabeled)', '2021-04-24 20:27:33', '2021-04-24 20:27:33'),
(2, 1, 'All Ordering Features', '2021-04-24 20:27:33', '2021-04-24 20:27:33'),
(3, 2, 'Ordering Website (Non-Whitelabeled)', '2021-04-24 20:27:33', '2021-04-24 20:27:33'),
(4, 2, 'Customer Mobile Apps (Whitelabeled)', '2021-04-24 20:27:33', '2021-04-24 20:27:33'),
(5, 2, 'All Ordering Features', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(6, 3, 'Ordering Website (Non-Whitelabeled)', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(7, 3, 'Customer Mobile Apps (Whitelabeled)', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(8, 3, 'Merchant Mobile Apps (Whitelabeled)', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(9, 3, 'All Ordering Features', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(10, 4, 'Ordering Website (Non-Whitelabeled)', '2021-04-24 20:28:36', '2021-04-24 20:28:36'),
(11, 4, 'Customer Mobile Apps (Whitelabeled)', '2021-04-24 20:29:18', '2021-04-24 20:29:18'),
(12, 4, 'Merchant Mobile Apps (Whitelabeled)', '2021-04-24 20:29:18', '2021-04-24 20:29:18'),
(13, 4, 'Integrated Delivery Management System (Tookan\'s Growth Plan)', '2021-04-24 20:29:18', '2021-04-24 20:29:18'),
(14, 4, 'Multi Merchant Delivery Extension', '2021-04-24 20:29:18', '2021-04-24 20:29:18'),
(15, 4, 'Delivery Agent Apps', '2021-04-24 20:29:18', '2021-04-24 20:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_users_subscription`
--

CREATE TABLE `tbl_package_users_subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `auto_renew` int(11) NOT NULL,
  `is_active` int(11) NOT NULL COMMENT '1 = active, 0 inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_package_users_subscription`
--

INSERT INTO `tbl_package_users_subscription` (`id`, `user_id`, `plan_id`, `start_date`, `end_date`, `auto_renew`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-04-26', '2021-10-26', 1, 1, '2021-04-26 03:38:10', '2021-04-26 03:38:10'),
(2, 1, 4, '2021-05-03', '2022-05-03', 1, 1, '2021-05-03 06:15:48', '2021-05-03 06:15:48'),
(3, 1, 2, '2021-05-10', '2021-11-10', 1, 1, '2021-05-10 05:01:09', '2021-05-10 05:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review_info`
--

CREATE TABLE `tbl_review_info` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `review_by` int(11) NOT NULL,
  `review_to` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review_info`
--

INSERT INTO `tbl_review_info` (`id`, `order_id`, `review_by`, `review_to`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(3, 1002, 3, 1, 4, 'test', '2021-05-04 03:08:25', '2021-05-04 03:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_info`
--

CREATE TABLE `tbl_services_info` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` double NOT NULL,
  `final_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `long_description` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `id` int(11) NOT NULL,
  `category` varchar(75) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_category`
--

INSERT INTO `tbl_service_category` (`id`, `category`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Massage', 'public/upload/category_img/2021/1619506540_9q8QZdWfMcSG9Lw_treatment-icon2.jpg', 1, '2021-04-21 07:16:17', '2021-04-27 01:55:40'),
(2, 'Hair', 'public/upload/category_img/2021/1619508185_megSSfU9PAVvXFL_treatment-icon3.jpg', 1, '2021-04-21 07:16:37', '2021-04-27 02:23:05'),
(3, 'Brows and Lashes', 'public/upload/category_img/2021/1619508243_Sm0VX4e4UyDSZxZ_treatment-icon4.jpg', 1, '2021-04-27 02:24:03', '2021-04-27 02:24:03'),
(4, 'Nails', 'public/upload/category_img/2021/1619508284_fJEFRNpdkxHsAUv_treatment-icon5.jpg', 1, '2021-04-27 02:24:44', '2021-04-27 02:24:44'),
(5, 'Make Up', 'public/upload/category_img/2021/1619508317_LxQVRnFQaOE5RnV_treatment-icon6.jpg', 1, '2021-04-27 02:25:17', '2021-04-27 02:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_address_info`
--

CREATE TABLE `tbl_users_address_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(75) DEFAULT NULL,
  `suburb` varchar(50) DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `state` varchar(75) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_address_info`
--

INSERT INTO `tbl_users_address_info` (`id`, `user_id`, `street`, `suburb`, `city`, `postcode`, `state`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pakistan', 'asd', 'Hyderabad', '71000', 'Omusati Region', 1, '2021-04-24 09:33:09', '2021-04-24 09:33:09'),
(2, 3, 'test', 'deomo', 'paris', '65156', 'test', 1, '2021-04-24 06:15:24', '2021-04-24 06:16:36'),
(3, 4, 'test', 'deomo', 'deomo', '65156', NULL, NULL, '2021-04-24 15:01:08', '2021-06-17 10:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_geofences`
--

CREATE TABLE `tbl_users_geofences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `radious` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_geofences`
--

INSERT INTO `tbl_users_geofences` (`id`, `user_id`, `lat`, `lng`, `radious`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, '24.9728707', '67.0643315', '10', 'North Karachi, Karachi, Pakistan', 'weqweqweqwe', '2021-05-19 00:10:17', '2021-06-21 08:15:02'),
(2, 1, '25.3718188', '68.35628539999999', '4', 'Latifabad Unit 7 Latifabad, Hyderabad, Pakistan', 'adasdasdasd', '2021-05-19 09:56:12', '2021-05-26 10:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_info`
--

CREATE TABLE `tbl_users_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `bio_description` varchar(500) DEFAULT NULL,
  `profile_img` text DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `newsletter` int(11) NOT NULL DEFAULT 0 COMMENT '1 = yes , 0 = no',
  `email_verify` int(11) NOT NULL DEFAULT 0 COMMENT '1 = yes , 0 = no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_info`
--

INSERT INTO `tbl_users_info` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`, `bio_description`, `profile_img`, `user_type`, `status`, `newsletter`, `email_verify`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Waseem', 'wasi@gmail.com', '$2y$10$JIp5v1Ae/6KgZjFN76kSHO9VH6nVbpp0PyPM8hYTxLSkB4bxtLCDi', '03030303030', 'male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/upload/user_images/2021/1619085454_qHQbMAL9LaroYkD_1519952466851.png', 1, 1, 0, 0, '2021-06-25 17:12:57', '2021-06-25 17:12:57'),
(3, 'Captain', 'Wasi', 'booker@gmail.com', '$2y$10$JIp5v1Ae/6KgZjFN76kSHO9VH6nVbpp0PyPM8hYTxLSkB4bxtLCDi', '8964531', 'male', NULL, NULL, 2, 1, 0, 0, '2021-05-20 17:07:20', '2021-05-20 17:07:20'),
(4, 'Daniyal', 'Khan', 'test@gmail.com', '$2y$10$JIp5v1Ae/6KgZjFN76kSHO9VH6nVbpp0PyPM8hYTxLSkB4bxtLCDi', '8964531', 'male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/upload/user_images/2021/1624297349_TpsMTYcZSwdlyCf_banner-image.jpg', 1, 1, 0, 0, '2021-06-21 17:42:29', '2021-06-21 12:42:29'),
(5, 'test', 'test', 'testt@gmail.com', '$2y$10$31qyPHqpl2hVArO2KI4zHerQozOnZjYpLt4UfnF4oish.ccv9m3J6', '21212', NULL, NULL, NULL, 2, 1, 0, 0, '2021-05-04 07:04:03', '2021-05-04 07:04:03'),
(6, 'anas', 'Mojo', 'mojo@gmail.com', '$2y$10$zK8TzNV8A9isfMBHYpNAMOy74yHNKr1UCcsiEFncKxVdJSrYUHx2a', '121212', NULL, NULL, NULL, 2, 1, 0, 0, '2021-05-10 05:47:23', '2021-05-10 05:47:23'),
(22, 'Mohammad Daniyal', 'Khan', 'mdanikhan555@gmail.com', '$2y$10$F2FPdb6Eb6c0FrPz/HV4lOSOrVBY/n3hqX9yYqwHjny95dR8OXXWe', '03123686399', NULL, NULL, NULL, 2, 0, 0, 0, '2021-05-26 04:41:31', '2021-05-26 04:41:31'),
(26, 'James', 'Robert', 'test333@gmail.com', '$2y$10$yiIlROf/fNR1ToqbhfpElONKuMHj9/niva8Up62oBBkchSiAy5DTa', '83232323', NULL, NULL, NULL, 1, 1, 0, 0, '2021-05-26 16:42:29', '2021-05-26 11:42:29'),
(28, 'user2', 'Khan', 'user2@gmail.com', '$2y$10$P4tX3qtr42npmPQ2qCnCn.BGGRPBSL.KQhn7z2cS/iuXdJ6QIc4bW', '8964531', NULL, NULL, NULL, 2, 0, 0, 0, '2021-06-17 05:49:51', '2021-06-17 05:49:51'),
(29, 'James', 'Robert', 'shayank7700@gmail.com', '$2y$10$TUv2UTfbuzuxXrwaqzniTekNERTN4wimJDdHPxdPkmFu0lYjjCxJW', '83232323', NULL, NULL, NULL, 1, 0, 0, 0, '2021-06-17 06:22:34', '2021-06-17 06:22:34'),
(30, 'test', 'Yes', 'test232@gmail.com', '$2y$10$tmha5mPO3WOvaqkx37qNP.Vu311VmPc7o/CBWFLv1JEzHx5aX.zR.', '8451651', NULL, NULL, NULL, 2, 1, 0, 0, '2021-06-17 11:37:03', '2021-06-17 06:37:03'),
(31, 'dani', 'khan', 'dani@test.com', '$2y$10$bHuRLDjgeedTxRpSmrMIjuWCvpHd7Jsjwimop/5ps47idll5chX02', '8451651', NULL, NULL, NULL, 2, 0, 0, 0, '2021-06-25 12:59:54', '2021-06-25 12:59:54'),
(32, 'new booker', 'testing', 'newbooker@wellbe.com', '$2y$10$IRvRe5.WXqBMububxTbare8MT3XKP0INMGNwdba4/0SI.aK4hsaaG', '123', NULL, NULL, NULL, 2, 1, 0, 0, '2021-06-26 15:38:56', '2021-06-26 15:38:56'),
(33, 'test', 'Yes', 'test1111@gmail.com', '$2y$10$yS3v340Rw1LCR0u3Mcu/Xu9calAJmYCDJWCllxecQLfu2TrLR9xfO', '8451651', NULL, NULL, NULL, 2, 1, 0, 0, '2021-06-26 16:06:07', '2021-06-26 11:06:07'),
(35, 'test', 'Yes', '09test@gmail.com', '$2y$10$1dPneqyHgi.1J6dOhWumreZmjDFzHRMRTyT3XD3/Vo/2IUS1AYjde', '8451651', NULL, NULL, NULL, 1, 0, 0, 0, '2021-06-26 11:43:45', '2021-06-26 11:43:45'),
(36, 'Ahmad', 'Khan', 'test11@gmail.com', '$2y$10$9Tp3rz2o9GX1DfcJwRcT0O6kWKRB3AbeJO1MoYXAA9IN04Og70qjG', '456456456', NULL, NULL, NULL, 1, 1, 0, 1, '2021-07-20 11:20:51', '2021-07-20 11:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_payout_details_info`
--

CREATE TABLE `tbl_users_payout_details_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account_name` varchar(225) NOT NULL,
  `bank_account_number` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users_payout_details_info`
--

INSERT INTO `tbl_users_payout_details_info` (`id`, `user_id`, `bank_account_name`, `bank_account_number`, `created_at`, `updated_at`) VALUES
(1, 4, 'Al-Habib', '3432432423423000', '2021-04-24 20:01:08', '2021-04-24 20:01:08'),
(2, 1, 'MBL', '112233445566778899', '2021-04-28 05:43:51', '2021-04-28 05:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_store_info`
--

CREATE TABLE `tbl_users_store_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_services` enum('mobile','my_address','both') NOT NULL,
  `minimum_booking_amount` float NOT NULL,
  `buffer_between_appointments` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users_store_info`
--

INSERT INTO `tbl_users_store_info` (`id`, `user_id`, `offer_services`, `minimum_booking_amount`, `buffer_between_appointments`, `created_at`, `updated_at`) VALUES
(1, 4, '', 50, '30', '2021-04-24 20:01:08', '2021-06-21 17:42:29'),
(2, 1, 'mobile', 75, '30', '2021-04-24 20:01:08', '2021-04-24 20:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_availability_info`
--

CREATE TABLE `tbl_user_availability_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `week_day` varchar(15) NOT NULL,
  `availability_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_availability_info`
--

INSERT INTO `tbl_user_availability_info` (`id`, `user_id`, `week_day`, `availability_status`) VALUES
(69, 1, 'sunday', 1),
(70, 1, 'monday', 1),
(71, 1, 'wednesday', 1),
(72, 1, 'friday', 1),
(74, 4, 'monday', 1),
(75, 4, 'tuesday', 1),
(76, 4, 'wednesday', 1),
(77, 4, 'thursday', 1),
(78, 4, 'friday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_availability_slots_info`
--

CREATE TABLE `tbl_user_availability_slots_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start_booking` time NOT NULL,
  `end_booking` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_availability_slots_info`
--

INSERT INTO `tbl_user_availability_slots_info` (`id`, `user_id`, `day_id`, `start_booking`, `end_booking`, `created_at`, `updated_at`) VALUES
(50, 1, 69, '17:00:00', '20:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(51, 1, 69, '21:00:00', '12:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(52, 1, 70, '12:00:00', '15:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(53, 1, 71, '12:00:00', '15:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(54, 1, 71, '16:00:00', '18:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(55, 1, 72, '12:00:00', '18:00:00', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(56, 4, 74, '09:00:00', '17:00:00', '2021-06-26 06:13:53', '2021-06-26 06:13:53'),
(57, 4, 75, '21:00:00', '17:00:00', '2021-06-26 06:13:53', '2021-06-26 06:13:53'),
(58, 4, 76, '21:00:00', '17:00:00', '2021-06-26 06:13:53', '2021-06-26 06:13:53'),
(59, 4, 77, '21:00:00', '17:00:00', '2021-06-26 06:13:53', '2021-06-26 06:13:53'),
(60, 4, 78, '21:00:00', '17:00:00', '2021-06-26 06:13:53', '2021-06-26 06:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_holidays_info`
--

CREATE TABLE `tbl_user_holidays_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `closed_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_holidays_info`
--

INSERT INTO `tbl_user_holidays_info` (`id`, `user_id`, `closed_date`, `created_at`, `updated_at`) VALUES
(10, 1, '2021-04-26', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(11, 1, '2021-04-28', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(12, 1, '2021-05-21', '2021-05-03 06:16:19', '2021-05-03 06:16:19'),
(13, 1, '2021-06-06', '2021-06-05 16:43:38', '2021-06-05 16:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_services_addons`
--

CREATE TABLE `tbl_user_services_addons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_services_addons`
--

INSERT INTO `tbl_user_services_addons` (`id`, `user_id`, `service_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'test', '2021-05-06 05:27:35', '2021-05-06 05:27:35'),
(6, 4, 12, 'adad', '2021-06-21 11:59:48', '2021-06-21 11:59:48'),
(7, 4, 12, 'adad', '2021-06-21 11:59:49', '2021-06-21 11:59:49'),
(8, 4, 9, 'ewr werwerweouiweiew oriweoewr werwerweouiweiew oriweoewr werwerweouiweiew ', '2021-06-21 12:00:21', '2021-06-21 12:00:21'),
(9, 4, 9, 'dfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdfsddfsdf', '2021-06-21 12:00:44', '2021-06-21 12:00:44'),
(10, 36, 14, 'asdadasd', '2021-07-20 07:30:30', '2021-07-20 07:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_services_info`
--

CREATE TABLE `tbl_user_services_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` double NOT NULL,
  `final_price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `long_description` longtext NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=  Pending, 2 =  Approved, 3 =  Rejected ',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_services_info`
--

INSERT INTO `tbl_user_services_info` (`id`, `user_id`, `category_id`, `name`, `duration`, `price`, `final_price`, `description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Classic Manicure', 30, 100, 0, 'test test', 'test test test test', 2, '2021-04-21 11:37:53', '2021-04-27 08:36:09'),
(3, 1, 1, 'Classic Pedicure', 30, 50, 0, 'test', 'test', 2, '2021-04-21 11:38:15', '2021-04-27 08:36:07'),
(4, 1, 1, 'Gel Manicure', 30, 50, 0, 'test', 'test', 3, '2021-04-21 11:38:17', '2021-04-27 08:36:00'),
(5, 1, 1, 'Gel', 60, 100, 0, 'test', 'test', 2, '2021-04-22 05:44:40', '2021-04-27 08:35:47'),
(6, 1, 1, 'Gel Pedicure', 30, 50, 0, 'test', 'test', 2, '2021-04-21 11:41:00', '2021-04-27 08:35:53'),
(7, 1, 2, 'test', 20, 50, 0, 'test', 'test', 3, '2021-04-21 11:38:22', '2021-04-27 08:35:57'),
(8, 1, 1, 'test', 20, 50, 0, 'test', 'test', 1, '2021-05-06 05:20:21', '2021-05-06 05:20:21'),
(9, 4, 1, 'asd', 23, 7.99, 0, 'asdasd', 'asdsadasdasd', 1, '2021-06-17 08:35:18', '2021-06-17 08:35:18'),
(10, 4, 1, 'asd', 2, 32, 0, '2323sdfs', 'asfsfsfsf', 1, '2021-06-17 08:41:34', '2021-06-17 08:41:34'),
(11, 4, 1, 'asd', 23, 232, 0, 'sadsdasdas', 'dasdasdasds', 1, '2021-06-17 08:51:58', '2021-06-17 08:51:58'),
(12, 4, 1, 'pending service test', 4, 44, 0, '444564565', '4564', 1, '2021-06-19 09:55:33', '2021-06-19 09:55:33'),
(13, 4, 2, 'hair massage', 20, 41, 0, 'jhjkh', 'jkhjkh', 2, '2021-06-25 11:04:14', '2021-06-25 16:05:22'),
(14, 36, 1, 'pending service test', 56, 45, 0, 'dsfsdf', 'sdfsdfsdfsdf', 1, '2021-07-20 07:30:13', '2021-07-20 07:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_service_addons_detail`
--

CREATE TABLE `tbl_user_service_addons_detail` (
  `id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` double NOT NULL,
  `default_addon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_service_addons_detail`
--

INSERT INTO `tbl_user_service_addons_detail` (`id`, `addon_id`, `duration`, `price`, `default_addon`) VALUES
(1, 5, 20, 30, NULL),
(2, 6, 34, 23, NULL),
(3, 7, 34, 23, NULL),
(4, 8, 23, 23, NULL),
(5, 9, 3, 43, NULL),
(6, 10, 0, 34, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins_info`
--
ALTER TABLE `tbl_admins_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_countries_info`
--
ALTER TABLE `tbl_countries_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marketplace_settings_info`
--
ALTER TABLE `tbl_marketplace_settings_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_cancellation_info`
--
ALTER TABLE `tbl_order_cancellation_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_chat_conversation`
--
ALTER TABLE `tbl_order_chat_conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_detail_info`
--
ALTER TABLE `tbl_order_detail_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_info`
--
ALTER TABLE `tbl_order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package_billing_type`
--
ALTER TABLE `tbl_package_billing_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package_plan`
--
ALTER TABLE `tbl_package_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package_plan_details`
--
ALTER TABLE `tbl_package_plan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package_users_subscription`
--
ALTER TABLE `tbl_package_users_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review_info`
--
ALTER TABLE `tbl_review_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_info`
--
ALTER TABLE `tbl_services_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_address_info`
--
ALTER TABLE `tbl_users_address_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_geofences`
--
ALTER TABLE `tbl_users_geofences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_info`
--
ALTER TABLE `tbl_users_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_users_payout_details_info`
--
ALTER TABLE `tbl_users_payout_details_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_store_info`
--
ALTER TABLE `tbl_users_store_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_availability_info`
--
ALTER TABLE `tbl_user_availability_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_availability_slots_info`
--
ALTER TABLE `tbl_user_availability_slots_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_holidays_info`
--
ALTER TABLE `tbl_user_holidays_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_services_addons`
--
ALTER TABLE `tbl_user_services_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_services_info`
--
ALTER TABLE `tbl_user_services_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_service_addons_detail`
--
ALTER TABLE `tbl_user_service_addons_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins_info`
--
ALTER TABLE `tbl_admins_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countries_info`
--
ALTER TABLE `tbl_countries_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_marketplace_settings_info`
--
ALTER TABLE `tbl_marketplace_settings_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order_cancellation_info`
--
ALTER TABLE `tbl_order_cancellation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order_chat_conversation`
--
ALTER TABLE `tbl_order_chat_conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_order_detail_info`
--
ALTER TABLE `tbl_order_detail_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_order_info`
--
ALTER TABLE `tbl_order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1046;

--
-- AUTO_INCREMENT for table `tbl_package_billing_type`
--
ALTER TABLE `tbl_package_billing_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_package_plan`
--
ALTER TABLE `tbl_package_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_package_plan_details`
--
ALTER TABLE `tbl_package_plan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_package_users_subscription`
--
ALTER TABLE `tbl_package_users_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_review_info`
--
ALTER TABLE `tbl_review_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_services_info`
--
ALTER TABLE `tbl_services_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users_address_info`
--
ALTER TABLE `tbl_users_address_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users_geofences`
--
ALTER TABLE `tbl_users_geofences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users_info`
--
ALTER TABLE `tbl_users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_users_payout_details_info`
--
ALTER TABLE `tbl_users_payout_details_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users_store_info`
--
ALTER TABLE `tbl_users_store_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_availability_info`
--
ALTER TABLE `tbl_user_availability_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_user_availability_slots_info`
--
ALTER TABLE `tbl_user_availability_slots_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_user_holidays_info`
--
ALTER TABLE `tbl_user_holidays_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_services_addons`
--
ALTER TABLE `tbl_user_services_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_services_info`
--
ALTER TABLE `tbl_user_services_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_service_addons_detail`
--
ALTER TABLE `tbl_user_service_addons_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
