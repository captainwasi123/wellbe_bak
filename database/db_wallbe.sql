-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 04:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wallbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `first_name`, `token`, `created_at`) VALUES
('jarrodahearn@hotmail.co.nz', NULL, '59hLTwZDUCr5mUq58JZiIY6xXcrqehX3N2Vl8SClped4z08gCc7iP48yjTXgXDX9', '2021-11-30 14:00:01'),
('wasi@gmail.com', 'Muhammad', 'Zeopu5iDnzI4CFkcVwnFrTO5SXJT0BiW3NrHGkI4ge3tm6QZvP6HmcxzBwjDAuF8', '2022-01-19 19:33:07'),
('wasi@gmail.com', 'Muhammad', 'Euuq3mOOvZQsNxtWSAx0lTHrfjGWehWIV2Qp8QnBwgbsWhBk9aSL5SZTkszflVTj', '2022-03-15 21:54:45'),
('wasi@gmail.com', 'Muhammad', 'i1nYsattSqA4kieOoC5nYZsiJccE3YuF4ypgqnQR5Nn44VRUnwIim10WMFXs3qGo', '2022-05-17 02:24:11'),
('wasi@gmail.com', 'Muhammad', 'Sni7mkEIuPxMgWQY2vNZqKIwjbfWUMfUfVLGCT3RRJpvy8pTSnzzs0n3CnTyi1fN', '2022-05-17 02:25:11');

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
(1, 'Admin', NULL, 'admin@gmail.com', '$2y$10$dXSb.w9pXqsMZbMdtuvSl.iFpTHUSGbELM.CRcPKfAAuosorZL8em', 1, NULL, '2021-04-24 19:38:30', '2021-05-04 04:37:05');

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
(4, 21, 15, '2021-04-28 07:31:42', '2021-04-28 07:31:42'),
(5, 15, 15, '2021-06-13 20:35:57', '2021-06-13 20:35:57');

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
  `pract_per` double DEFAULT NULL,
  `cust_per` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_cancellation_info`
--

INSERT INTO `tbl_order_cancellation_info` (`id`, `order_id`, `reason`, `user_id`, `is_admin`, `cust_due`, `pract_due`, `pract_per`, `cust_per`, `created_at`, `updated_at`) VALUES
(6, 1012, 'testing reason', 1, NULL, 1, NULL, 75, 25, '2021-05-25 15:49:17', '2022-02-22 17:11:19'),
(7, 1022, 'lo', 9, NULL, NULL, NULL, 75, 25, '2021-05-21 22:15:52', '2022-02-22 17:11:19'),
(8, 1034, 'email testing', 19, NULL, 1, NULL, 75, 25, '2021-05-27 14:26:22', '2022-02-22 17:11:19'),
(9, 1035, 'email testing', 19, NULL, NULL, NULL, 75, 25, '2021-05-27 17:29:35', '2022-02-22 17:11:19'),
(10, 1033, 'Can\'t make it anymore.', NULL, 1, NULL, NULL, 75, 25, '2021-05-27 20:25:58', '2022-02-22 17:11:19'),
(11, 1025, 'Test Cancellation', NULL, 1, NULL, NULL, 75, 25, '2021-05-27 20:27:05', '2022-02-22 17:11:19'),
(12, 1065, 'test', 1, NULL, NULL, NULL, 75, 25, '2021-12-21 02:10:35', '2022-02-22 17:11:19'),
(13, 1065, 'test', 1, NULL, NULL, NULL, 75, 25, '2021-12-21 02:11:17', '2022-02-22 17:11:19'),
(14, 1065, 'test', 1, NULL, NULL, NULL, 75, 25, '2021-12-21 02:12:27', '2022-02-22 17:11:19'),
(15, 1080, 'test', 1, NULL, 1, NULL, 75, 25, '2021-12-30 12:16:44', '2022-02-22 17:11:19'),
(16, 1096, 'test', 3, NULL, NULL, NULL, 40, 30, '2022-01-07 22:02:58', '2022-02-24 22:50:10'),
(17, 1097, 'I`m not available', 1, NULL, NULL, NULL, 75, 25, '2022-01-08 15:23:09', '2022-02-22 17:11:19'),
(18, 1098, 'test', NULL, 1, NULL, NULL, 75, 25, '2022-01-08 15:58:19', '2022-02-22 17:11:19'),
(19, 1099, 'test', NULL, 1, NULL, NULL, 75, 25, '2022-01-08 16:02:51', '2022-02-22 17:11:19'),
(20, 1112, 'sdafasd', 3, NULL, NULL, NULL, 75, 0, '2022-02-23 02:38:29', '2022-02-23 02:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_chat_conversation`
--

CREATE TABLE `tbl_order_chat_conversation` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_chat_conversation`
--

INSERT INTO `tbl_order_chat_conversation` (`id`, `order_id`, `user_id`, `message`, `view`, `created_at`, `updated_at`) VALUES
(1, 1011, 3, 'hey', 0, '2021-05-08 10:51:05', '2021-05-08 10:51:05'),
(2, 1011, 1, 'hello', 0, '2021-05-08 10:51:09', '2021-05-08 10:51:09'),
(3, 1011, 3, 'test', 0, '2021-05-08 07:10:30', '2021-05-08 07:10:30'),
(4, 1011, 3, 'test', 0, '2021-05-08 07:11:23', '2021-05-08 07:11:23'),
(5, 1011, 3, 'sdafasdf asdfasdf', 0, '2021-05-08 07:11:29', '2021-05-08 07:11:29'),
(6, 1011, 3, 'sdafasdf', 0, '2021-05-08 07:11:49', '2021-05-08 07:11:49'),
(7, 1011, 3, 'asdfasdf asdfasdf', 0, '2021-05-08 07:11:52', '2021-05-08 07:11:52'),
(8, 1011, 3, 'asdfasd asdfasdfsad', 0, '2021-05-08 07:11:54', '2021-05-08 07:11:54'),
(10, 1012, 1, 'test', 0, '2021-05-10 01:15:55', '2021-05-10 01:15:55'),
(11, 1012, 1, 'sdfasd', 0, '2021-05-10 01:16:12', '2021-05-10 01:16:12'),
(12, 1011, 1, 'test', 0, '2021-05-10 01:28:51', '2021-05-10 01:28:51'),
(13, 1011, 3, 'test', 0, '2021-05-10 02:16:24', '2021-05-10 02:16:24'),
(14, 1011, 3, 'test', 0, '2021-05-10 02:18:06', '2021-05-10 02:18:06'),
(15, 1011, 3, 'test', 0, '2021-05-10 02:18:52', '2021-05-10 02:18:52'),
(16, 1011, 3, 'test', 0, '2021-05-10 02:19:05', '2021-05-10 02:19:05'),
(17, 1011, 3, 'test', 0, '2021-05-10 02:19:13', '2021-05-10 02:19:13'),
(18, 1011, 3, 'test', 0, '2021-05-10 02:20:13', '2021-05-10 02:20:13'),
(19, 1011, 1, 'hi', 0, '2021-05-10 02:20:42', '2021-05-10 02:20:42'),
(20, 1011, 1, 'sadfsad', 0, '2021-05-10 02:21:49', '2021-05-10 02:21:49'),
(21, 1011, 1, '123', 0, '2021-05-10 02:22:33', '2021-05-10 02:22:33'),
(22, 1011, 1, 'test', 0, '2021-05-10 02:23:24', '2021-05-10 02:23:24'),
(23, 1011, 3, 'testing', 0, '2021-05-10 02:25:04', '2021-05-10 02:25:04'),
(24, 1011, 3, 'test', 0, '2021-05-10 02:27:17', '2021-05-10 02:27:17'),
(25, 1011, 3, 'hi', 0, '2021-05-10 02:27:26', '2021-05-10 02:27:26'),
(26, 1011, 1, 'test', 0, '2021-05-10 02:27:34', '2021-05-10 02:27:34'),
(27, 1011, 1, 'ts', 0, '2021-05-10 02:28:49', '2021-05-10 02:28:49'),
(28, 1011, 1, 'yrdy', 0, '2021-05-10 02:32:55', '2021-05-10 02:32:55'),
(29, 1011, 1, 'hello', 0, '2021-05-10 02:36:30', '2021-05-10 02:36:30'),
(30, 1011, 3, 'testing', 0, '2021-05-10 02:41:48', '2021-05-10 02:41:48'),
(31, 1011, 3, 'test', 0, '2021-05-10 02:42:45', '2021-05-10 02:42:45'),
(32, 1011, 3, 'test', 0, '2021-05-10 02:43:50', '2021-05-10 02:43:50'),
(33, 1011, 3, 'test', 0, '2021-05-10 02:44:06', '2021-05-10 02:44:06'),
(34, 1002, 1, 'test', 0, '2021-05-10 02:44:19', '2021-05-10 02:44:19'),
(35, 1011, 3, 'test', 0, '2021-05-10 02:44:36', '2021-05-10 02:44:36'),
(36, 1011, 1, 'he', 0, '2021-05-10 02:44:43', '2021-05-10 02:44:43'),
(37, 1011, 1, 'test', 0, '2021-05-10 02:52:31', '2021-05-10 02:52:31'),
(38, 1022, 9, 'Hi thanks for sharing the information we are providing the similar services as yours in NJ', 0, '2021-05-21 22:05:13', '2021-05-21 22:05:13'),
(39, 1022, 9, 'Hi thanks for sharing the information we are providing the similar services as yours in NJ https://www.phoenixrecyclingnj.com/', 0, '2021-05-21 22:05:24', '2021-05-21 22:05:24'),
(40, 1022, 9, 'hi', 0, '2021-05-21 22:05:31', '2021-05-21 22:05:31'),
(41, 1022, 9, 'hi', 0, '2021-05-21 22:05:33', '2021-05-21 22:05:33'),
(42, 1022, 9, 'Hi', 0, '2021-05-21 22:05:36', '2021-05-21 22:05:36'),
(43, 1022, 9, 'Hi', 0, '2021-05-21 22:05:37', '2021-05-21 22:05:37'),
(44, 1022, 9, 'Hi', 0, '2021-05-21 22:05:37', '2021-05-21 22:05:37'),
(45, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(46, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(47, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(48, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(49, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(50, 1022, 9, 'Hi', 0, '2021-05-21 22:05:38', '2021-05-21 22:05:38'),
(51, 1022, 8, 'hello', 0, '2021-05-21 22:06:08', '2021-05-21 22:06:08'),
(52, 1022, 9, 'How are you?> burger khaogy?', 0, '2021-05-21 22:06:20', '2021-05-21 22:06:20'),
(53, 1022, 9, '1 ayega', 0, '2021-05-21 22:06:27', '2021-05-21 22:06:27'),
(54, 1022, 8, 'treat karao AC ki', 0, '2021-05-21 22:06:36', '2021-05-21 22:06:36'),
(55, 1022, 9, 'project set hoga', 0, '2021-05-21 22:06:47', '2021-05-21 22:06:47'),
(78, 1093, 3, 'test', 0, '2021-12-31 02:13:01', '2021-12-31 02:13:01'),
(79, 1093, 3, 'helo', 0, '2021-12-31 02:13:52', '2021-12-31 02:13:52'),
(80, 1095, 3, 'test', 0, '2022-01-05 23:58:13', '2022-01-05 23:58:13'),
(81, 1095, 3, 'hi', 0, '2022-01-05 23:59:22', '2022-01-05 23:59:22'),
(82, 1095, 3, 'hello', 0, '2022-01-05 23:59:25', '2022-01-05 23:59:25'),
(83, 1095, 3, 'this is wasi', 0, '2022-01-05 23:59:35', '2022-01-05 23:59:35'),
(84, 1115, 3, 'test', 0, '2022-03-15 23:18:16', '2022-03-15 23:18:16'),
(85, 1116, 3, 'test', 1, '2022-03-16 14:02:55', '2022-03-16 22:46:50'),
(86, 1116, 3, 'hello', 1, '2022-03-16 14:02:55', '2022-03-16 22:46:50'),
(87, 1116, 3, 'hello', 1, '2022-03-16 14:02:55', '2022-03-16 22:46:50'),
(88, 1116, 3, 'test', 1, '2022-03-16 22:05:16', '2022-03-16 22:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail_addon_info`
--

CREATE TABLE `tbl_order_detail_addon_info` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail_addon_info`
--

INSERT INTO `tbl_order_detail_addon_info` (`id`, `detail_id`, `addon_id`, `price`) VALUES
(4, 137, 12, NULL),
(5, 139, 12, 40),
(6, 141, 12, 40),
(7, 142, 12, 40),
(8, 146, 12, 40),
(9, 148, 12, 40),
(10, 150, 12, 40),
(11, 151, 12, 40),
(12, 152, 12, 40),
(13, 154, 12, 100),
(14, 155, 15, 50);

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
(93, 1067, 3, 1, 50, '2021-12-23', '10:00:00', '10:30:00'),
(94, 1068, 3, 1, 50, '2021-12-23', '12:00:00', '12:30:00'),
(95, 1069, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(96, 1069, 6, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(97, 1070, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(98, 1071, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(99, 1072, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(100, 1073, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(101, 1074, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(102, 1075, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(103, 1076, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(104, 1077, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(105, 1078, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(106, 1079, 3, 1, 50, '2021-12-24', '10:00:00', '10:30:00'),
(107, 1080, 3, 1, 50, '2021-12-24', '10:30:00', '11:00:00'),
(108, 1081, 3, 1, 50, '2021-12-30', '10:00:00', '10:30:00'),
(109, 1082, 3, 2, 100, '2021-12-30', '12:00:00', '13:00:00'),
(110, 1083, 3, 1, 50, '2021-12-30', '14:00:00', '14:30:00'),
(111, 1083, 2, 1, 10, '2021-12-30', '14:00:00', '14:30:00'),
(112, 1084, 3, 1, 50, '2021-12-30', '14:00:00', '14:30:00'),
(113, 1085, 3, 1, 50, '2021-12-30', '14:30:00', '15:00:00'),
(114, 1086, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(115, 1087, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(116, 1088, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(117, 1089, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(118, 1090, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(119, 1091, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(120, 1092, 3, 1, 50, '2021-12-30', '15:00:00', '15:30:00'),
(121, 1093, 3, 1, 50, '2021-12-31', '05:00:00', '05:30:00'),
(122, 1094, 3, 1, 50, '2022-01-06', '09:00:00', '09:30:00'),
(123, 1095, 3, 1, 50, '2022-01-06', '05:30:00', '06:00:00'),
(124, 1095, 2, 1, 10, '2022-01-06', '05:30:00', '06:00:00'),
(125, 1096, 2, 1, 10, '2022-01-08', '04:30:00', '05:00:00'),
(126, 1096, 3, 1, 50, '2022-01-08', '04:30:00', '05:00:00'),
(127, 1097, 3, 1, 50, '2022-01-09', '11:30:00', '12:00:00'),
(128, 1098, 3, 1, 50, '2022-01-09', '12:00:00', '12:30:00'),
(129, 1099, 3, 1, 50, '2022-01-09', '12:00:00', '12:30:00'),
(130, 1100, 2, 1, 10, '2022-01-12', '05:00:00', '05:30:00'),
(131, 1101, 2, 1, 10, '2022-01-12', '05:00:00', '05:30:00'),
(132, 1101, 3, 1, 50, '2022-01-12', '05:00:00', '05:30:00'),
(133, 1102, 2, 1, 10, '2022-01-12', '06:30:00', '07:30:00'),
(134, 1102, 3, 1, 50, '2022-01-12', '06:30:00', '07:00:00'),
(135, 1103, 2, 1, 10, '2022-01-12', '08:00:00', '09:00:00'),
(136, 1103, 3, 1, 50, '2022-01-12', '09:00:00', '09:30:00'),
(137, 1104, 2, 1, 10, '2022-01-12', '10:30:00', '11:30:00'),
(138, 1104, 3, 1, 50, '2022-01-12', '11:30:00', '12:00:00'),
(139, 1105, 2, 1, 10, '2022-01-12', '12:30:00', '13:30:00'),
(140, 1105, 3, 1, 50, '2022-01-12', '13:30:00', '14:00:00'),
(141, 1106, 2, 1, 10, '2022-01-14', '04:30:00', '05:30:00'),
(142, 1107, 2, 1, 10, '2022-01-14', '06:00:00', '07:00:00'),
(143, 1107, 3, 1, 50, '2022-01-14', '07:00:00', '07:30:00'),
(144, 1108, 2, 2, 200, '2022-01-30', '10:00:00', '11:00:00'),
(145, 1108, 3, 1, 50, '2022-01-30', '11:00:00', '11:30:00'),
(146, 1110, 2, 1, 10, '2022-02-18', '05:00:00', '06:00:00'),
(147, 1110, 2, 1, 10, '2022-02-18', '06:00:00', '06:30:00'),
(148, 1111, 2, 1, 10, '2022-02-22', '01:30:00', '02:30:00'),
(149, 1111, 2, 1, 10, '2022-02-22', '02:30:00', '03:00:00'),
(150, 1112, 2, 1, 15, '2022-02-23', '09:00:00', '10:00:00'),
(151, 1112, 2, 1, 15, '2022-02-23', '10:00:00', '11:00:00'),
(152, 1113, 2, 1, 15, '2022-03-02', '09:00:00', '10:00:00'),
(153, 1114, 2, 1, 8, '2022-03-15', '09:00:00', '09:30:00'),
(154, 1114, 2, 1, 8, '2022-03-15', '09:30:00', '10:30:00'),
(155, 1115, 2, 1, 100, '2022-03-16', '05:00:00', '06:00:00'),
(156, 1116, 2, 1, 100, '2022-03-17', '03:00:00', '03:30:00'),
(157, 1117, 2, 1, 100, '2022-03-18', '09:00:00', '09:30:00');

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
  `comission` double DEFAULT NULL,
  `gst` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `pract_earning` double DEFAULT NULL,
  `payment_status` int(11) DEFAULT 0 COMMENT '(0="In-Escrow") (1="Paid")\r\n(2="Refunded")',
  `refund_payment` double DEFAULT NULL,
  `refund_amount` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `reminder_email` int(11) NOT NULL COMMENT '1=send, 0=pending ',
  `address` varchar(500) DEFAULT NULL,
  `instructions` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_info`
--

INSERT INTO `tbl_order_info` (`id`, `pract_id`, `booker_id`, `start_at`, `sub_total`, `comission`, `gst`, `total_amount`, `pract_earning`, `payment_status`, `refund_payment`, `refund_amount`, `status`, `reminder_email`, `address`, `instructions`, `created_at`, `updated_at`) VALUES
(1067, 1, 3, '2021-12-23', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-22 20:31:19', '2022-02-22 14:32:01'),
(1068, 1, 3, '2021-12-23', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-22 20:51:13', '2022-02-22 14:32:01'),
(1069, 1, 3, '2021-12-24', 100, 15, 15, 115, 85, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:08:31', '2022-02-22 14:32:01'),
(1070, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:10:20', '2022-02-22 14:32:01'),
(1071, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:10:46', '2022-02-22 14:32:01'),
(1072, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:11:58', '2022-02-22 14:32:01'),
(1073, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:12:31', '2022-02-22 14:32:01'),
(1074, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:19:06', '2022-02-22 14:32:01'),
(1075, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:19:40', '2022-02-22 14:32:01'),
(1076, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:22:07', '2022-02-22 14:32:01'),
(1077, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:31:02', '2022-02-22 14:32:01'),
(1078, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-23 22:32:08', '2022-02-22 14:32:01'),
(1079, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 1, NULL, 0, 3, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-24 00:51:44', '2022-02-25 01:14:17'),
(1080, 1, 3, '2021-12-24', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 4, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', NULL, '2021-12-24 00:55:31', '2022-02-22 14:32:01'),
(1081, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 6, 0, 'Sector 11-A Sector 11 A North Karachi Twp, Karachi, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-12-29 18:45:37', '2022-02-22 14:32:01'),
(1082, 1, 3, '2021-12-30', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'Sector 11-A Sector 11 A North Karachi Twp, Karachi, Pakistan', NULL, '2021-12-29 19:37:11', '2022-02-22 14:32:01'),
(1083, 1, 3, '2021-12-30', 60, 15, 9, 69, 51, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:16:11', '2022-02-22 14:32:01'),
(1084, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:16:56', '2022-02-22 14:32:01'),
(1085, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:17:35', '2022-02-22 14:32:01'),
(1086, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'Sector 11-A Sector 11 A North Karachi Twp, Karachi, Pakistan', '', '2021-12-29 21:18:19', '2022-02-22 14:32:01'),
(1087, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:20:03', '2022-02-22 14:32:01'),
(1088, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:24:21', '2022-02-22 14:32:01'),
(1089, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:27:47', '2022-02-22 14:32:01'),
(1090, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:29:09', '2022-02-22 14:32:01'),
(1091, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:33:38', '2022-02-22 14:32:01'),
(1092, 1, 3, '2021-12-30', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2021-12-29 21:36:34', '2022-02-22 14:32:01'),
(1093, 1, 3, '2021-12-31', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 6, 0, 'Sector 11-A Sector 11 A North Karachi Twp, Karachi, Pakistan', '', '2021-12-30 23:26:10', '2022-02-22 14:32:01'),
(1094, 1, 3, '2022-01-06', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-05 23:00:18', '2022-02-22 14:32:01'),
(1095, 1, 3, '2022-01-06', 60, 15, 9, 69, 51, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-05 23:57:43', '2022-02-22 14:32:01'),
(1096, 1, 3, '2022-01-08', 60, 15, 9, 69, 51, 0, NULL, 0, 4, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-07 22:01:09', '2022-02-22 14:32:01'),
(1097, 1, 3, '2022-01-09', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 4, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-08 15:13:38', '2022-02-22 14:32:01'),
(1098, 1, 3, '2022-01-09', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 4, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-08 15:56:22', '2022-02-22 14:32:01'),
(1099, 1, 3, '2022-01-09', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 4, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-08 16:01:51', '2022-02-22 14:32:01'),
(1100, 1, 3, '2022-01-12', NULL, 15, NULL, NULL, NULL, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', 'test instructions', '2022-01-11 23:23:39', '2022-02-22 14:32:01'),
(1101, 1, 3, '2022-01-12', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', 'test instructions', '2022-01-11 23:23:59', '2022-02-22 14:32:01'),
(1102, 1, 3, '2022-01-12', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-11 23:34:20', '2022-02-22 14:32:01'),
(1103, 1, 3, '2022-01-12', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-11 23:39:16', '2022-02-22 14:32:01'),
(1104, 1, 3, '2022-01-12', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-12 00:11:53', '2022-02-22 14:32:01'),
(1105, 1, 3, '2022-01-12', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-12 01:30:03', '2022-02-22 14:32:01'),
(1106, 1, 3, '2022-01-14', 50, 15, 7.5, 57.5, 42.5, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-13 22:55:41', '2022-02-22 14:32:01'),
(1107, 1, 3, '2022-01-14', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-13 23:08:32', '2022-02-22 14:32:01'),
(1108, 39, 3, '2022-01-30', 250, 15, 37.5, 287.5, 212.5, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-01-29 15:06:12', '2022-02-22 14:32:01'),
(1109, 1, 3, '2022-02-18', NULL, 15, NULL, NULL, NULL, 0, NULL, 0, 9, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-02-17 23:11:30', '2022-02-22 14:32:01'),
(1110, 1, 3, '2022-02-18', 60, 15, 9, 69, 51, 0, NULL, 0, 6, 0, 'SECTOR 11/A North Karachi, Sector 5c/3 Sector 5 C 3 New Karachi Town, Karachi, Pakistan', '', '2022-02-17 23:12:51', '2022-02-22 14:32:01'),
(1111, 1, 3, '2022-02-22', 60, 15, 9, 69, 51, 0, NULL, 0, 9, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-02-21 19:11:43', '2022-02-22 14:32:01'),
(1112, 1, 3, '2022-02-23', 110, 15, 16.5, 126.5, 93.5, 1, NULL, 25, 3, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-02-23 02:37:44', '2022-02-26 01:29:25'),
(1113, 1, 3, '2022-03-02', 55, 15, 8.25, 63.25, 46.75, 0, NULL, 0, 6, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-03-01 20:56:20', '2022-03-07 19:39:14'),
(1114, 1, 3, '2022-03-15', 116, 15, 17.4, 133.4, 98.6, 0, NULL, 0, 9, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-03-14 23:06:55', '2022-03-14 23:06:55'),
(1115, 1, 3, '2022-03-16', 150, 15, 22.5, 172.5, 127.5, 0, NULL, 0, 6, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-03-15 23:17:42', '2022-03-16 21:28:34'),
(1116, 1, 3, '2022-03-17', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-03-16 21:55:11', '2022-03-17 19:05:45'),
(1117, 1, 3, '2022-03-18', 100, 15, 15, 115, 85, 0, NULL, 0, 6, 0, '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', '', '2022-03-17 22:10:43', '2022-03-18 21:02:06');

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
(3, 1, 2, '2021-05-10', '2021-11-10', 1, 1, '2021-05-10 05:01:09', '2021-05-10 05:01:31'),
(4, 9, 1, '2021-05-21', '2021-11-21', 1, 0, '2021-05-21 21:29:08', '2021-05-21 21:29:08'),
(5, 9, 1, '2021-05-21', '2021-11-21', 1, 0, '2021-05-21 21:58:36', '2021-05-21 21:58:36'),
(6, 9, 1, '2021-05-21', '2021-11-21', 1, 1, '2021-05-21 21:58:55', '2021-05-21 21:59:16'),
(7, 9, 4, '2021-05-21', '2022-05-21', 1, 1, '2021-05-21 21:59:22', '2021-05-21 21:59:35'),
(8, 9, 1, '2021-05-21', '2021-11-21', 1, 0, '2021-05-21 21:59:39', '2021-05-21 21:59:39'),
(9, 9, 1, '2021-05-21', '2021-11-21', 1, 1, '2021-05-21 21:59:54', '2021-05-21 22:00:06'),
(10, 1, 1, '2021-05-25', '2021-11-25', 1, 0, '2021-05-25 20:32:22', '2021-05-25 20:32:22');

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
(3, 1002, 3, 1, 4, 'test', '2021-05-04 03:08:25', '2021-05-04 03:08:25'),
(4, 1039, 30, 28, 2, 'average', '2021-06-22 01:22:44', '2021-06-22 01:22:44'),
(5, 1079, 3, 1, 3, 'test', '2021-12-30 23:16:33', '2021-12-30 23:16:33'),
(6, 1112, 3, 1, 5, 'test', '2022-03-16 21:58:21', '2022-03-16 21:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_info`
--

CREATE TABLE `tbl_services_info` (
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
-- Dumping data for table `tbl_services_info`
--

INSERT INTO `tbl_services_info` (`id`, `user_id`, `category_id`, `name`, `duration`, `price`, `final_price`, `description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Classic Manicure', 30, 1000.25, 0, 'test test', 'test test test test', 2, '2021-04-21 11:37:53', '2022-03-18 00:49:11'),
(3, 1, 1, 'Classic Pedicure', 30, 50, 0, 'test', 'test', 2, '2021-04-21 11:38:15', '2021-04-27 08:36:07'),
(4, 1, 1, 'Gel Manicure', 30, 50, 0, 'test', 'test', 3, '2021-04-21 11:38:17', '2021-04-27 08:36:00'),
(5, 1, 1, 'Gel', 60, 100, 0, 'test', 'test', 2, '2021-04-22 05:44:40', '2021-04-27 08:35:47'),
(6, 1, 1, 'Gel Pedicure', 30, 50, 0, 'test', 'test', 2, '2021-04-21 11:41:00', '2021-04-27 08:35:53'),
(16, 22, 1, 'Massage', 60, 100, 0, 'Short Description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac', 'Long Description \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac lacus hendrerit luctus. In hac habitasse platea dictumst. Phasellus pretium iaculis venenatis. In commodo a neque et varius. Nunc in purus et metus posuere bibendum a ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis, nulla quis tincidunt volutpat, odio ex varius ligula, a luctus dui lorem in erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 3, '2021-06-14 02:08:38', '2021-07-19 13:32:10'),
(17, 22, 2, 'Haircut', 60, 50, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac lacus hendrerit luctus. In hac habitasse platea dictumst. Phasellus pretium iaculis venenatis. In commodo a neque et varius. Nunc in purus et metus posuere bibendum a ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis, nulla quis tincidunt volutpat, odio ex varius ligula, a luctus dui lorem in erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 2, '2021-06-14 02:09:33', '2021-08-23 12:29:47'),
(18, 22, 3, 'Eyebrow Dye', 30, 200, 0, 'Short \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac lacus hend', 'Long \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac lacus hendrerit luctus. In hac habitasse platea dictumst. Phasellus pretium iaculis venenatis. In commodo a neque et varius. Nunc in purus et metus posuere bibendum a ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis, nulla quis tincidunt volutpat, odio ex varius ligula, a luctus dui lorem in erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 2, '2021-06-14 02:34:54', '2021-06-13 20:35:02'),
(28, 1, 2, 'test', 20, 20, 0, 'asdfasdf', 'asdfasdf', 3, '2021-08-23 11:35:24', '2021-08-23 11:45:16'),
(29, 1, 2, 'test', 34, 343, 0, 'asdfasd asdf', 'asdfasdf', 3, '2021-08-23 11:48:36', '2021-08-23 11:48:56'),
(30, 1, 1, 'test', 30, 50, 0, 'test', 'test', 2, '2021-09-29 01:31:30', '2021-09-29 01:31:30'),
(31, 1, 4, 'test', 30, 120, 0, 'test', 'test', 2, '2022-03-14 22:40:13', '2022-03-14 22:40:13');

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
(1, 'Massage', 'public/upload/category_img/2021/1629900458_wakinoBtzKeHYix_feature-icon2.jpg', 1, '2021-04-21 07:16:17', '2021-08-25 09:07:38'),
(2, 'Hair', 'public/upload/category_img/2021/1629900472_UTmzH0WmLu1JWt0_feature-icon3.jpg', 1, '2021-04-21 07:16:37', '2021-08-25 09:07:52'),
(3, 'Brows', 'public/upload/category_img/2021/1629900495_UdgGWG9eHoymKtl_feature-icon9.jpg', 1, '2021-04-27 02:24:03', '2021-08-25 14:23:02'),
(4, 'Nails', 'public/upload/category_img/2021/1629900517_HvIgS5Dq2QDtkbt_feature-icon1.jpg', 1, '2021-04-27 02:24:44', '2021-08-25 09:08:37'),
(5, 'Tanning', 'public/upload/category_img/2021/1629900573_yxma5XirLLYPlZR_feature-icon5.jpg', 1, '2021-04-27 02:25:17', '2021-08-25 09:09:33'),
(6, 'Fitness', 'public/upload/category_img/2021/1629900602_pK838n6mDcfMamI_feature-icon4.jpg', 1, '2021-08-25 09:10:02', '2021-08-25 09:10:02'),
(7, 'Facials', 'public/upload/category_img/2021/1629900665_0QFLaQlYR8AXUDM_feature-icon6.jpg', 1, '2021-08-25 09:11:05', '2021-08-25 09:11:05'),
(8, 'Facials', 'public/upload/category_img/2021/1629900665_0QFLaQlYR8AXUDM_feature-icon6.jpg', 1, '2021-08-25 09:11:05', '2021-08-25 09:11:05');

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
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-24 09:33:09', '2021-09-03 18:52:28'),
(2, 3, 'test', 'deomo', 'paris', '65156', 'test', 1, '2021-04-24 06:15:24', '2021-04-24 06:16:36'),
(3, 4, 'test', 'deomo', 'deomo', '65156', 'test', 1, '2021-04-24 15:01:08', '2021-04-24 15:01:08'),
(4, 9, 'asdsadasdsada', 'asdasdas', 'Karachi', '75850', 'Sindh', 1, '2021-05-21 21:40:06', '2021-05-21 21:40:06'),
(5, 19, 'zvxv', 'zxcc', 'zxcc', '65156', 'Idaho', 1, '2021-05-27 03:27:48', '2021-05-27 03:27:48'),
(6, 22, '13 Trickle Street', 'Elderslea', 'Upper Hutt', '5018', 'Wellington', NULL, '2021-06-14 02:31:01', '2021-06-14 02:31:01'),
(7, 23, 'aaasdasd', 'sada', 'Karachi', '75850', NULL, NULL, '2021-06-19 19:21:21', '2021-06-19 19:21:21'),
(8, 27, 'rwerwerrwerwe', 'rwerwe', 'werwe', '32423432432', NULL, NULL, '2021-06-21 23:40:13', '2021-06-21 23:40:13'),
(9, 28, 'North Karachi 5c4', 'abc', 'Karachi', '75850', NULL, NULL, '2021-06-22 01:06:45', '2021-06-22 01:06:45'),
(10, 30, 'New Karachi Town', 'Karachi', 'Karachi', '75850', 'Sindh', 1, '2021-06-22 01:17:39', '2021-06-22 01:20:19');

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
(1, 1, '-41.12451679999999', '175.0589243', '10', '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', 'test', '2021-05-19 23:50:19', '2022-02-18 01:52:53'),
(2, 9, '24.9728707', '67.0643315', '10', 'North Karachi, Karachi, Pakistan', 'New Karachi', '2021-05-21 21:55:20', '2021-05-21 21:55:20'),
(3, 22, '-41.11880458494791', '175.08567684199218', '6', '1072 Fergusson Drive, Clouston Park, Upper Hutt 5018, New Zealand', 'Outer Wellington', '2021-06-14 02:24:12', '2021-07-24 08:00:53'),
(4, 23, '25.0004851', '67.06497000000002', '5', 'Do Minute Ki Chorangi, Sector 5 D New Karachi Town, Karachi, Pakistan', '2 minute', '2021-06-19 19:14:04', '2021-06-19 19:14:04'),
(5, 27, '24.9728707', '67.0643315', '8', 'North Karachi, Karachi, Pakistan', 'asdasdasd', '2021-06-21 23:44:14', '2021-06-21 23:44:14'),
(6, 28, '24.999885', '67.0648263', '5', 'New Karachi, Karachi, Pakistan', 'new Karachi', '2021-06-22 01:07:06', '2021-06-22 01:19:47'),
(7, 39, '-41.12451679999999', '175.0589243', '20', '13 Te Puni Grove, Elderslea, Upper Hutt, New Zealand', 'test', '2022-01-06 22:16:43', '2022-02-25 02:16:22');

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
  `store_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_info`
--

INSERT INTO `tbl_users_info` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`, `bio_description`, `profile_img`, `user_type`, `status`, `newsletter`, `email_verify`, `store_status`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Waseem', 'wasi@gmail.com', '$2y$10$13Mfo2nKgWe.u7aLi3tOi.BzrNldJ9F1EZBLrG9CWwHEQJI2Vn7Rm', '03030303030', 'male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/upload/user_images/2022/1648640976_gI6mIXP9FAJLGxQ_download.jpg', 1, 1, 0, 0, 1, '2022-05-16 19:25:39', '2022-05-16 19:25:39'),
(3, 'Captain', 'Wasi', 'booker@gmail.com', '$2y$10$dXSb.w9pXqsMZbMdtuvSl.iFpTHUSGbELM.CRcPKfAAuosorZL8em', '8964531', 'male', NULL, NULL, 2, 1, 0, 0, 1, '2022-03-26 16:22:01', '2022-03-27 00:22:01'),
(4, 'user3', 'Khan', 'test@gmail.com', '$2y$10$JIp5v1Ae/6KgZjFN76kSHO9VH6nVbpp0PyPM8hYTxLSkB4bxtLCDi', '8964531', 'male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'public/upload/user_images/2021/1619127384_DuylZca6XiCOb0B_G4Eph8s.jpg', 1, 1, 0, 0, 1, '2021-10-27 17:13:24', '2021-10-27 12:13:24'),
(5, 'test', 'test', 'testt@gmail.com', '$2y$10$31qyPHqpl2hVArO2KI4zHerQozOnZjYpLt4UfnF4oish.ccv9m3J6', '21212', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-04 07:04:03', '2021-05-04 07:04:03'),
(6, 'anas', 'Mojo', 'mojo@gmail.com', '$2y$10$zK8TzNV8A9isfMBHYpNAMOy74yHNKr1UCcsiEFncKxVdJSrYUHx2a', '121212', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-10 05:47:23', '2021-05-10 05:47:23'),
(7, 'asdasd', 'asdas', 'pkkctedykjrcdgqwoj@twzhhq.com', '$2y$10$IpP7HLe17Fj.N9kWLN7r7eBQLFXYG7eGCW7yBm52TGt6DZVwFoAFa', '24324234324232432', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-20 23:53:16', '2021-05-20 23:53:16'),
(8, 'Muhammad', 'Abdullah', 'vyd02062@cuoly.com', '$2y$10$ZfYzTUAhKz1BIf8tE1uYbeEdFV04vEjPIerbBsPTULp9WdgGp4DCu', '0300000000', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-21 21:24:26', '2021-05-21 21:24:26'),
(9, 'Katappa', 'KatappaHero', 'katappa@gmail.com', '$2y$10$p3MiyfFsQCX9mxygZ.WFQ.mTH1KON0dloLCfFv04LgW02q1LsMbOe', '12345678', 'male', 'asdsadas', 'public/upload/user_images/2021/1621612315_w7S1DRgsdR3toh0_Eagle1.png', 1, 1, 0, 0, 1, '2021-10-27 18:30:45', '2021-10-27 13:30:45'),
(10, 'new', 'member', 'new@gmail.com', '$2y$10$OUaJZtBRiBbdeFJwfhJ3MuZ5HDXUEa5zpTCHI8VqBrk56QxOD92BW', '11111111111111', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-21 22:19:06', '2021-05-21 22:19:06'),
(11, 'new', 'member', 'new11@gmail.com', '$2y$10$nInggqqDmbWZggcXYmXMBODJyQdqqhYBx3gNyIghvIC5u3ExnPUVa', '123456', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-21 22:19:58', '2021-05-21 22:19:58'),
(12, 'mr', 'xyz', 'xyzz@gmail.com', '$2y$10$drADxT6r4StFM.nfAj7SDOiVdQQB5HaAl0n/mLbCJ6qT.BvuOtwHa', '111111111', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-21 22:52:07', '2021-05-21 22:52:07'),
(13, 'peter', 'parker', 'peter@gmail.com', '$2y$10$6WVgw0oUHWVrJXUJi/FFWOppqLlEMPTAFOTaJZXbi4rby1lU5q2Q2', '12345678989', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-25 20:15:28', '2021-05-25 20:15:28'),
(14, 'test', 'test', 'peterparker@gmail.com', '$2y$10$mk1pQ4TR04Dew7Y7jIogJ.hf17jAWue/4qx0D71q7Ht5p4wFatQBS', '1232323232', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-26 00:44:20', '2021-05-26 00:44:20'),
(16, 'shayan', 'Khan', 'shayank7700@gmail.com', '$2y$10$Dd4zPvOjdswKWOIZpn85heN1MN3iaHkZcJ6TccT0TQVNyRvw59GtK', '8964531', NULL, NULL, NULL, 1, 1, 0, 0, 1, '2021-10-27 18:09:43', '2021-10-27 13:09:43'),
(19, 'James', 'Robert', 'daniyal@divsnpixel.com', '$2y$10$fK.f3ijsIDpXjhlfJm5xjuhlVEuvXi2pDFUL3tpJo4Ond/6rwJDyi', '83232323', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-05-26 21:19:24', '2021-05-27 03:19:24'),
(20, 'm', 'abdullah', 'abc@gmail.com', '$2y$10$7yNWCuqiV/UqtBdRJdJwduCU3HnZqYR3JZQRetEEr4gZm7yKqpz0e', '1223322323', NULL, NULL, NULL, 1, 1, 0, 0, 1, '2021-10-27 18:16:30', '2021-10-27 13:16:30'),
(21, 'Jarrod', 'Ahearn', 'jarrod.ahearn@arlo.co', '$2y$10$VN3mvZWWogXTStIqNAOcGe1b7eLnsrG3lD19FGKo/ZYitSQnPIgZC', '07846687201', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-06-11 17:43:09', '2021-06-11 23:43:09'),
(22, 'Jarrod', 'Ahearn', 'jarrodahearn@hotmail.co.nz', '$2y$10$umcwHJZM2uJZ47GGy8LEGuv0xMicLAcAiF8Ui8zuW65IGMxy41ER.', '07846687201', 'male', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget risus dolor. Curabitur nec laoreet eros, nec volutpat est. Nulla sodales dictum elit quis maximus. Etiam pharetra semper fringilla. Praesent vestibulum neque ac lacus hendrerit luctus. In hac habitasse platea dictumst. Phasellus pretium iaculis venenatis. In commodo a neque et varius. Nunc in purus et metus posuere bibendum a ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis, nulla quis tincidu', 'public/upload/user_images/2021/1623616282_8iMfNZMIZfj22OZ_Stevo.jpg', 1, 1, 0, 0, 1, '2021-06-23 19:23:17', '2021-06-24 01:23:17'),
(23, 'Minhaj Pract', 'Practitioner', 'Minhaj@gmail.com', '$2y$10$762gdNSyKt0P26SqkyzFUeiosXUk3RTqhZDP4wioLlXcsQCOYkVRC', '123', 'male', 'aaa', 'public/upload/user_images/2021/1624111497_WLgbmuRDVUvA0jv_053f84fb20cc76b332ef46f1b3b6bd01.png', 1, 2, 0, 0, 1, '2021-10-27 18:16:49', '2021-10-27 13:16:49'),
(24, 'James', 'Robert', 'pefif31017@greenkic.com', '$2y$10$RgekV1qzLOcdl3WTLA.uDOnZuLTMxFWwp5rQxRdwULDGr1PKyXPo2', '83232323', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-06-21 17:11:01', '2021-06-21 23:11:01'),
(25, 'James', 'Robert', 'catowa1022@d4wan.com', '$2y$10$pYhL1fftP/DcO0yEdN1j0eolx872EJYZ9X3s1owtnZj4P.recdBia', '83232323', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2021-06-21 17:15:31', '2021-06-21 23:15:31'),
(26, 'user2', '1213131', 'xowot54664@d4wan.com', '$2y$10$TD6cOPBrMDsvz87xwTVnRuIQT5FwzJRLXEC.x/w09D4AfS5X9blZu', '8964531', NULL, NULL, NULL, 1, 0, 0, 1, 1, '2021-06-21 17:31:12', '2021-06-21 23:31:12'),
(27, 'test', 'Yes', 'joxegi6199@0ranges.com', '$2y$10$9Uk4KfcKSFIw3jVyQoztjeHOsPEPUNpPV3kt42RvWRkSJbI21W6vC', '8451651', 'male', '324324', 'public/upload/user_images/2021/1624297430_M8kjcJppl8Q1ojy_work-icon3.jpg', 1, 1, 0, 1, 1, '2021-06-21 17:43:50', '2021-06-21 23:43:50'),
(28, 'Min Prac', 'Test 2', 'MinPrac@gmail.com', '$2y$10$VqfMfSWsYge5aY9kRpCCT.NmlLaDJhCMwix6zeWTRdVKOLOcQUgw.', '12212121', 'male', 'asdsadsadsadsa', 'public/upload/user_images/2021/1624302405_MQ3QxUq1HG0juEI_treatment-icon5.jpg', 1, 1, 0, 0, 1, '2021-06-21 19:06:45', '2021-06-22 01:06:45'),
(29, 'MinBuyer', 'Buy', 'buyer@gmail.com', '$2y$10$Qu93msU1.0R8KU9Y2JOiS.KZbAqTr2Kc4Ng6E/RzCSKRy0TzFzCXW', '123', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2021-06-22 01:14:03', '2021-06-22 01:14:03'),
(30, 'Buyer', 'Buyer', 'akfpkamerpvuecpqxg@twzhhq.com', '$2y$10$5A8iGobKco0LAiA4WWgNoOHKRc4IbI.gsau/TsH0nSwDarC/ipSGW', '123', NULL, NULL, NULL, 2, 1, 1, 0, 1, '2021-06-21 19:17:39', '2021-06-22 01:17:39'),
(31, 'Paige', 'Williams', 'paigehwilliams@outlook.com', '$2y$10$ntKV0BoabR7j19HVe4nucOeis6iLxr1YpYzqbBIxK0wdJbhhqbS4W', '07846687201', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2021-06-24 01:12:49', '2021-06-24 01:12:49'),
(32, 'm', 'abdullah', 'abdullah@gmail.com', '$2y$10$JVwLNu3ErjX6tVHCNPJnU.zEVxYr0iq6oVFV9hHt5rSBn06qx.qGK', '112222222', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2021-06-28 18:27:32', '2021-06-28 18:27:32'),
(35, 'Muhammad', 'Waseem', 'captain.wasi@gmail.com', '$2y$10$7EzwrM1QO.G6hAtMUkqqkOHmBXykI8xr7skwDlE7DRKKYyrlR8cW6', '0303030303', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2021-09-03 18:02:04', '2021-09-03 18:02:04'),
(36, 'shai', 'shai', 'shai@gmail.com', '$2y$10$bgSAbUNHOceVik.3mPEUc.5HjxHs.paIL4rWJKKXI0Y7AgbCa42mu', '12123', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2021-10-27 09:44:54', '2021-10-27 09:44:54'),
(37, 'shai', 'shai1', 'shai1@gmail.com', '$2y$10$/5z.3aurQ1LcXzoYKkNF6uxygKcEBo8/X8Q/LEMblSEGHkEq.VAHy', '11111', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2021-10-27 09:48:46', '2021-10-27 09:48:46'),
(38, 'hafiz', 'hafiz', 'hafiz@gmail.com', '$2y$10$1zxPM1BSJn.xp8N.a9PbiOXv8FT21l7JJtAotb7jN.1losqKpTPdm', '1234567', NULL, NULL, NULL, 2, 1, 0, 1, 1, '2021-10-27 15:44:06', '2021-10-27 15:44:06'),
(39, 'Captain', 'Wasi', 'wasi.test@gmail.com', '$2y$10$Dd4zPvOjdswKWOIZpn85heN1MN3iaHkZcJ6TccT0TQVNyRvw59GtK', '03030303030', 'male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/upload/user_images/2021/1619085454_qHQbMAL9LaroYkD_1519952466851.png', 1, 1, 0, 0, 1, '2022-01-06 14:13:35', '2022-01-06 14:13:35'),
(40, 'test', 'test', 'testing@gmail.com', '$2y$10$1H3Vsd2btAnz0tuBnJq0C.ZY1Dhgzz0JJTmZzT38X9aYxxvNVMCyy', '123456789', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2022-03-16 01:38:04', '2022-03-16 01:38:04'),
(41, 'test', 'test', 'testingg@gmail.com', '$2y$10$xBkUhp9RbaPI8sQuj7ZT8.7Dgr71UfL4rgAtQN876xoK7A7o.JXqW', '123456789', NULL, NULL, NULL, 2, 1, 0, 0, 1, '2022-03-15 18:53:03', '2022-03-16 02:53:03'),
(42, 'test', 'test', 'test123@gmail.com', '$2y$10$.1vr8acgTetu8jxKa3efhuA4DGF34pFt7pL9i/YUsdPOqdae1HHgm', '123456789', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2022-03-16 15:56:00', '2022-03-16 15:56:00'),
(43, 'test', 'test', 'wasi123@gmail.com', '$2y$10$geqlghQFo/BnT.QGmb2dpOa0qwXcn25vvEDJxJ7GshKCcsIqmOVwG', '12345678', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2022-03-17 21:37:06', '2022-03-17 21:37:06'),
(44, 'test', 'test', 'testtest@gmail.com', '$2y$10$h6n6rXWVnJJnChJezmOBOOwZgzAEkIENI1A2E6XBns9mnBqvbJvwe', '123456789', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2022-04-29 02:34:42', '2022-04-29 02:34:42'),
(45, 'testtt', 'tset', 'tttt@gmail.com', '$2y$10$ylVQRLh/27Dm0kL.ASTSju7D/sCV54zbDAI3X0694yquj8MpW1uo2', '123456789', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2022-04-29 02:36:21', '2022-04-29 02:36:21'),
(46, 'ttt', 'ttt', 'ttttt@gmail.com', '$2y$10$Ncwjy9MgdeYCBdCKjCw60.BWHROio/chybzGNmwIcOUUYVFQKuQie', '123456789', NULL, NULL, NULL, 1, 0, 0, 0, 1, '2022-04-29 02:39:23', '2022-04-29 02:39:23'),
(47, 'test', 'test', 'admintest@gmail.com', '$2y$10$/5WyLDPzMc1CoZu0SuRwMO6SsY5ia1uQgm261r4FDnkYjR3Pib6US', '12345678', NULL, NULL, NULL, 2, 0, 0, 0, 1, '2022-04-29 03:32:30', '2022-04-29 03:32:30');

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
(2, 1, 'MBL', '112233445566778899', '2021-04-28 05:43:51', '2021-04-28 05:43:51'),
(3, 9, 'adasd', '123213213213', '2021-05-21 15:40:06', '2021-05-21 15:40:06'),
(4, 22, 'Bank Name Test', 'Bank Number Test', '2021-06-13 20:31:01', '2021-06-13 20:31:01'),
(5, 23, 'sd', '3453453', '2021-06-19 13:25:41', '2021-06-19 13:25:41'),
(6, 27, '34', '343', '2021-06-21 17:40:13', '2021-06-21 17:40:13'),
(7, 28, 'UBL', '123456', '2021-06-21 19:06:45', '2021-06-21 19:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_store_info`
--

CREATE TABLE `tbl_users_store_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_services` enum('mobile','my_address','both') DEFAULT NULL,
  `minimum_booking_amount` float NOT NULL,
  `buffer_between_appointments` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users_store_info`
--

INSERT INTO `tbl_users_store_info` (`id`, `user_id`, `offer_services`, `minimum_booking_amount`, `buffer_between_appointments`, `created_at`, `updated_at`) VALUES
(1, 4, 'mobile', 50, '30', '2021-04-24 20:01:08', '2021-04-24 20:01:08'),
(2, 1, NULL, 0, '30', '2021-04-24 20:01:08', '2022-03-31 00:49:36'),
(3, 9, 'both', 500, '30', '2021-05-21 15:40:06', '2021-05-21 15:40:06'),
(4, 22, 'both', 20, '90', '2021-06-13 20:31:01', '2021-06-13 20:54:46'),
(5, 23, NULL, 1000, '10', '2021-06-19 13:25:41', '2021-06-19 13:25:41'),
(6, 27, NULL, 34, '343', '2021-06-21 17:40:13', '2021-06-21 17:40:13'),
(7, 28, NULL, 2500, '20', '2021-06-21 19:06:45', '2021-06-21 19:08:36');

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
(75, 9, 'friday', 1),
(116, 23, 'sunday', 1),
(117, 23, 'monday', 1),
(118, 23, 'tuesday', 1),
(119, 23, 'wednesday', 1),
(120, 23, 'thursday', 1),
(121, 23, 'friday', 1),
(122, 23, 'saturday', 1),
(130, 22, 'sunday', 1),
(131, 22, 'monday', 1),
(132, 22, 'tuesday', 1),
(133, 22, 'wednesday', 1),
(134, 22, 'thursday', 1),
(135, 22, 'friday', 1),
(136, 22, 'saturday', 1),
(137, 28, 'sunday', 1),
(138, 28, 'monday', 1),
(139, 28, 'tuesday', 1),
(140, 28, 'wednesday', 1),
(141, 28, 'thursday', 1),
(142, 28, 'friday', 1),
(143, 28, 'saturday', 1),
(281, 39, 'sunday', 1),
(282, 39, 'monday', 1),
(283, 39, 'tuesday', 1),
(284, 39, 'wednesday', 1),
(285, 39, 'thursday', 1),
(286, 39, 'friday', 1),
(287, 39, 'saturday', 1),
(337, 1, 'sunday', 1),
(338, 1, 'monday', 1),
(339, 1, 'tuesday', 1),
(340, 1, 'wednesday', 1),
(341, 1, 'thursday', 1),
(342, 1, 'friday', 1),
(343, 1, 'saturday', 1);

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
(60, 9, 75, '18:00:00', '12:00:00', '2021-05-22 00:24:38', '2021-05-22 00:24:38'),
(61, 9, 75, '12:57:00', '08:57:00', '2021-05-22 00:24:38', '2021-05-22 00:24:38'),
(109, 23, 116, '21:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(110, 23, 117, '09:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(111, 23, 118, '21:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(112, 23, 119, '21:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(113, 23, 120, '21:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(114, 23, 121, '21:00:00', '17:00:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(115, 23, 122, '09:00:00', '23:55:00', '2021-06-19 19:18:27', '2021-06-19 19:18:27'),
(123, 22, 130, '21:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(124, 22, 130, '20:30:00', '22:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(125, 22, 131, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(126, 22, 132, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(127, 22, 133, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(128, 22, 134, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(129, 22, 135, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(130, 22, 136, '09:00:00', '20:00:00', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(131, 28, 137, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(132, 28, 138, '09:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(133, 28, 139, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(134, 28, 140, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(135, 28, 140, '17:00:00', '18:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(136, 28, 140, '19:00:00', '20:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(137, 28, 141, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(138, 28, 142, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(139, 28, 143, '21:00:00', '17:00:00', '2021-06-25 18:18:33', '2021-06-25 18:18:33'),
(305, 39, 281, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(306, 39, 282, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(307, 39, 283, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(308, 39, 284, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(309, 39, 285, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(310, 39, 286, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(311, 39, 287, '09:00:00', '17:00:00', '2022-01-06 22:14:30', '2022-01-06 22:14:30'),
(362, 1, 337, '08:00:00', '17:00:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(363, 1, 338, '08:00:00', '17:00:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(364, 1, 339, '08:00:00', '17:00:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(365, 1, 340, '04:00:00', '17:00:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(366, 1, 341, '01:00:00', '17:00:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(367, 1, 342, '08:00:00', '23:19:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43'),
(368, 1, 343, '08:00:00', '23:15:00', '2022-03-18 21:02:43', '2022-03-18 21:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_categories`
--

CREATE TABLE `tbl_user_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_categories`
--

INSERT INTO `tbl_user_categories` (`id`, `user_id`, `category_id`) VALUES
(17, 1, 1),
(18, 1, 4),
(19, 1, 5),
(26, 39, 1),
(27, 39, 2),
(28, 39, 6);

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
(21, 22, '2021-07-14', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(22, 22, '2021-06-30', '2021-06-24 01:17:30', '2021-06-24 01:17:30'),
(55, 1, '2021-11-19', '2022-03-18 21:02:43', '2022-03-18 21:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_services`
--

CREATE TABLE `tbl_user_services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_services`
--

INSERT INTO `tbl_user_services` (`id`, `user_id`, `service_id`, `price`) VALUES
(11, 1, 2, 98),
(14, 1, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_services_addons`
--

CREATE TABLE `tbl_user_services_addons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_services_addons`
--

INSERT INTO `tbl_user_services_addons` (`id`, `user_id`, `service_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 9, 9, 'VR 1', 1, '2021-05-21 21:54:00', '2022-01-08 10:49:32'),
(7, 9, 10, 'VR 2', 1, '2021-05-21 22:07:17', '2022-01-08 10:49:34'),
(8, 22, 16, 'Oil Treatment', 1, '2021-06-14 02:48:08', '2022-01-08 10:49:36'),
(9, 22, 16, 'dgdfdgfdg', 1, '2021-06-24 01:20:59', '2022-01-08 10:49:39'),
(10, 22, 17, 'Nail Treatment', 1, '2021-07-19 13:33:36', '2022-01-08 10:49:41'),
(11, 1, 17, 'test variant', 1, '2021-08-23 11:40:53', '2022-01-08 10:49:43'),
(12, 1, 2, 'Test', 2, '2022-01-08 19:04:41', '2022-01-08 21:31:12'),
(13, 1, 2, 'Testing', 3, '2022-01-08 19:05:12', '2022-02-26 15:40:05'),
(14, 1, 2, 'testing', 3, '2022-02-25 02:52:41', '2022-02-26 15:39:13'),
(15, 1, 2, 'Massage', 2, '2022-03-01 00:26:31', '2022-03-01 00:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_service_addons`
--

CREATE TABLE `tbl_user_service_addons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_service_addons`
--

INSERT INTO `tbl_user_service_addons` (`id`, `user_id`, `addon_id`, `price`) VALUES
(4, 1, 12, 0),
(5, 39, 12, 0),
(6, 39, 15, 0),
(7, 1, 15, 0);

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
(2, 6, 20, 200, NULL),
(3, 7, 30, 2500, NULL),
(4, 8, 15, 10, NULL),
(5, 9, 50, 30, NULL),
(6, 10, 60, 25, NULL),
(7, 11, 10, 25, NULL),
(8, 12, 30, 100.25, NULL),
(9, 13, 20, 50, NULL),
(10, 14, 30, 100, NULL),
(11, 15, 30, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `email` (`email`);

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
-- Indexes for table `tbl_order_detail_addon_info`
--
ALTER TABLE `tbl_order_detail_addon_info`
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
-- Indexes for table `tbl_user_categories`
--
ALTER TABLE `tbl_user_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_holidays_info`
--
ALTER TABLE `tbl_user_holidays_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_services`
--
ALTER TABLE `tbl_user_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_services_addons`
--
ALTER TABLE `tbl_user_services_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_service_addons`
--
ALTER TABLE `tbl_user_service_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_service_addons_detail`
--
ALTER TABLE `tbl_user_service_addons_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admins_info`
--
ALTER TABLE `tbl_admins_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countries_info`
--
ALTER TABLE `tbl_countries_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_marketplace_settings_info`
--
ALTER TABLE `tbl_marketplace_settings_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_cancellation_info`
--
ALTER TABLE `tbl_order_cancellation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_order_chat_conversation`
--
ALTER TABLE `tbl_order_chat_conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_order_detail_addon_info`
--
ALTER TABLE `tbl_order_detail_addon_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order_detail_info`
--
ALTER TABLE `tbl_order_detail_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tbl_order_info`
--
ALTER TABLE `tbl_order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_review_info`
--
ALTER TABLE `tbl_review_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_services_info`
--
ALTER TABLE `tbl_services_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users_address_info`
--
ALTER TABLE `tbl_users_address_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users_geofences`
--
ALTER TABLE `tbl_users_geofences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users_info`
--
ALTER TABLE `tbl_users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_users_payout_details_info`
--
ALTER TABLE `tbl_users_payout_details_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users_store_info`
--
ALTER TABLE `tbl_users_store_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_availability_info`
--
ALTER TABLE `tbl_user_availability_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `tbl_user_availability_slots_info`
--
ALTER TABLE `tbl_user_availability_slots_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `tbl_user_categories`
--
ALTER TABLE `tbl_user_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_user_holidays_info`
--
ALTER TABLE `tbl_user_holidays_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_user_services`
--
ALTER TABLE `tbl_user_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_services_addons`
--
ALTER TABLE `tbl_user_services_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_service_addons`
--
ALTER TABLE `tbl_user_service_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_service_addons_detail`
--
ALTER TABLE `tbl_user_service_addons_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
