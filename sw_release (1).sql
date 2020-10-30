-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 29, 2020 at 12:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sw_release`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cur_softwares`
--

CREATE TABLE `tb_cur_softwares` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `sw_status` varchar(50) DEFAULT NULL,
  `sw_status_desc` varchar(50) DEFAULT NULL,
  `master_rev` varchar(50) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  `Platform` varchar(50) DEFAULT NULL,
  `tester` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cur_softwares`
--

INSERT INTO `tb_cur_softwares` (`id`, `product_name`, `sw_status`, `sw_status_desc`, `master_rev`, `operation`, `Platform`, `tester`, `timestamp`, `emp_id`, `delete_flag`, `created_at`, `updated_at`) VALUES
(24, 'DRAGFLY1D_HE', 'EVALUATION', 'Cut-in 50%', 'H0M65EB015', 'HXFILLER', 'HDF', '*', '2017-10-18 12:45:35', NULL, 1, '2017-10-17 09:35:09', '2017-10-18 12:45:35'),
(25, 'TRESXLB', 'PRODUCTION', 'Cut-in 100%', 'HBN5A28000', 'HXFILLER', 'HDF+', '*', '2017-10-17 10:49:34', NULL, 1, '2017-10-17 10:48:21', '2017-10-17 11:57:55'),
(26, 'TRESXLB2', 'PRODUCTION', 'Cut-in 100%', 'JKK3500', 'HXFILLER', 'HDF+', '*', '2017-10-17 10:49:02', NULL, 0, '2017-10-17 10:49:02', '2017-10-17 10:49:02'),
(27, 'DIABLO2S', 'PRODUCTION', 'Cut-in 100%', 'HKJ3501', 'HXFILLER', 'HDF+', '*', '2017-10-17 10:54:03', NULL, 1, '2017-10-17 10:54:03', '2017-10-17 10:54:20'),
(28, 'DIABLO3S', 'PRODUCTION', 'Cut-in 100%', 'HTLHA28008', 'HXFILLER', 'HDF+', '*', '2017-10-17 11:55:44', NULL, 0, '2017-10-17 11:55:45', '2017-10-17 11:55:45'),
(29, 'TRAILXLB', 'PRODUCTION', 'Cut-in 100%', 'FYT4701', 'HXFILLER', 'HDF+', '*', '2017-10-17 11:57:38', NULL, 0, '2017-10-17 11:57:38', '2017-10-17 11:57:38'),
(30, 'TRESXLB', 'PRODUCTION', 'Cut-in 100%', 'HBN5A28000', 'HXFILLER', 'HDF+', '*', '2017-10-17 11:58:20', NULL, 0, '2017-10-17 11:58:20', '2017-10-17 11:58:20'),
(31, 'TAHOE2D', 'PRODUCTION', 'Cut-in 100%', 'TJ.CR.01.E5', 'SEEDER', 'SEEDER', '*', '2017-10-17 12:04:15', NULL, 0, '2017-10-17 12:04:15', '2017-10-17 12:04:15'),
(32, 'VULCAN', 'PRODUCTION', 'Cut-in 100%', 'TJ.DF.03.T5', 'SEEDER', 'SEEDER', '*', '2017-10-17 16:27:35', NULL, 0, '2017-10-17 16:27:35', '2017-10-17 16:27:35'),
(33, 'DRAGFLY1D_HE', 'EVALUATION', 'Cut-in 50%', 'H0M65Eb016', 'HXFILLER', 'HDF', '*', '2017-10-18 12:44:55', NULL, 0, '2017-10-17 17:39:53', '2017-10-18 12:44:55'),
(34, 'TAHOE_XL', 'PRODUCTION', 'Cut-in 100%', 'ERM1200', 'HXFILLER', 'SIO', '*', '2017-10-17 18:13:01', NULL, 0, '2017-10-17 18:13:01', '2017-10-17 18:13:01'),
(35, 'DRAGFLY1D_HE', 'EVALUATION', '5 Tester', 'hfghfgh', 'HXFILLER', 'HDF', '7532753', '2017-10-19 17:43:10', '1000188509', 0, '2017-10-19 17:43:10', '2017-10-19 17:43:10'),
(36, 'MALIBU', 'PRODUCTION', 'Cut-in 100%', 'hkhjkjyhkjh', 'HXFILLER', 'HDF', '4444', '2017-10-19 17:43:33', '1000188509', 0, '2017-10-19 17:43:33', '2017-10-19 17:43:33'),
(37, 'KJN3D_RE', 'PRODUCTION', 'Cut-in 100%', 'HGR05Gs002', 'HXFILLER', 'HDF', '*', '2017-10-19 17:48:06', '1000188509', 0, '2017-10-19 17:48:06', '2017-10-19 17:48:06'),
(38, 'VRU', 'PRODUCTION', 'Cut-in 100%', '11111111', 'SELECT ITEMS', 'HDF', '#', '2017-10-20 10:42:48', '99999999', 0, '2017-10-20 10:42:48', '2017-10-20 10:42:48'),
(39, 'VRUA', 'EVALUATION', 'Cut-in 20%', '1294/5', 'HXFILLER', 'HDF', NULL, '2020-10-19 09:21:12', '1000188509', 0, '2020-10-19 09:21:12', '2020-10-19 09:21:12'),
(40, 'VRUA', 'EVALUATION', 'Cut-in 20%', '1294/5', 'HXFILLER', 'HDF', NULL, '2020-10-19 09:21:17', '1000188509', 0, '2020-10-19 09:21:17', '2020-10-19 09:21:17'),
(41, 'APOLLO', 'EVALUATION', 'Cut-in 20%', 'AAAAA', 'HXFILLER', 'HDF', NULL, '2020-10-19 09:21:46', '1000188509', 0, '2020-10-19 09:21:46', '2020-10-19 09:21:46'),
(42, 'APOLLO', 'EVALUATION', 'Cut-in 20%', 'AAAAA', 'HXFILLER', 'HDF', NULL, '2020-10-19 09:22:28', '1000188509', 0, '2020-10-19 09:22:28', '2020-10-19 09:22:28'),
(43, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:06', '1000188509', 0, '2020-10-19 09:23:06', '2020-10-19 09:23:06'),
(44, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:07', '1000188509', 0, '2020-10-19 09:23:07', '2020-10-19 09:23:07'),
(45, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:08', '1000188509', 0, '2020-10-19 09:23:08', '2020-10-19 09:23:08'),
(46, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:08', '1000188509', 0, '2020-10-19 09:23:08', '2020-10-19 09:23:08'),
(47, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:12', '1000188509', 0, '2020-10-19 09:23:12', '2020-10-19 09:23:12'),
(48, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:12', '1000188509', 0, '2020-10-19 09:23:12', '2020-10-19 09:23:12'),
(49, 'APOLLO', 'PRODUCTION', 'Cut-in 100%', 'fdsfsdfsdfsdfsd', 'HXFILLER', 'SIO', NULL, '2020-10-19 09:23:47', '1000188509', 0, '2020-10-19 09:23:47', '2020-10-19 09:23:47'),
(50, 'AAAA', 'PRODUCTION', 'Cut-in 100%', 'xdfgdfgfgdfgdf', 'HXFILLER', 'HDF', NULL, '2020-10-19 09:24:40', '1000188509', 0, '2020-10-19 09:24:40', '2020-10-19 09:24:40'),
(51, 'DIABLO3S', 'SELECT ITEMS', '1 Tester', 'HGR05Gs002', 'SEEDER', 'SEEDER', '2222', '2020-10-19 09:25:59', NULL, 0, '2020-10-19 09:25:59', '2020-10-19 09:25:59'),
(52, 'DIABLO3S', 'SELECT ITEMS', '1 Tester', 'HGR05Gs002', 'SEEDER', 'SEEDER', '2222', '2020-10-19 09:44:18', NULL, 0, '2020-10-19 09:44:18', '2020-10-19 09:44:18'),
(53, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:35', '1000188509', 0, '2020-10-26 20:07:35', '2020-10-26 20:07:35'),
(54, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:36', '1000188509', 0, '2020-10-26 20:07:36', '2020-10-26 20:07:36'),
(55, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:36', '1000188509', 0, '2020-10-26 20:07:36', '2020-10-26 20:07:36'),
(56, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:36', '1000188509', 0, '2020-10-26 20:07:36', '2020-10-26 20:07:36'),
(57, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:37', '1000188509', 0, '2020-10-26 20:07:37', '2020-10-26 20:07:37'),
(58, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:37', '1000188509', 0, '2020-10-26 20:07:37', '2020-10-26 20:07:37'),
(59, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:37', '1000188509', 0, '2020-10-26 20:07:37', '2020-10-26 20:07:37'),
(60, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:37', '1000188509', 0, '2020-10-26 20:07:37', '2020-10-26 20:07:37'),
(61, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:07:37', '1000188509', 0, '2020-10-26 20:07:37', '2020-10-26 20:07:37'),
(62, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:32', '1000188509', 0, '2020-10-26 20:09:32', '2020-10-26 20:09:32'),
(63, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:32', '1000188509', 0, '2020-10-26 20:09:32', '2020-10-26 20:09:32'),
(64, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:33', '1000188509', 0, '2020-10-26 20:09:33', '2020-10-26 20:09:33'),
(65, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:34', '1000188509', 0, '2020-10-26 20:09:34', '2020-10-26 20:09:34'),
(66, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:34', '1000188509', 0, '2020-10-26 20:09:34', '2020-10-26 20:09:34'),
(67, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:09:35', '1000188509', 0, '2020-10-26 20:09:35', '2020-10-26 20:09:35'),
(68, 'TAHOE2D', 'EVALUATION', '5 Tester', 'HSPE5Gx000', 'HXFILLER', 'HDF', NULL, '2020-10-26 20:10:11', '1000188509', 0, '2020-10-26 20:10:11', '2020-10-26 20:10:11'),
(69, 'APOLLO', 'EVALUATION', 'Cut-in 10%', 'fffff', 'HXFILLER', 'HDF', 'xxxx', '2020-10-26 20:18:18', '1000188509', 0, '2020-10-26 20:18:18', '2020-10-26 20:18:18'),
(70, 'APOLLO', 'EVALUATION', 'Cut-in 10%', 'fffff', 'HXFILLER', 'HDF', 'xxxx', '2020-10-26 20:20:47', '1000188509', 0, '2020-10-26 20:20:47', '2020-10-26 20:20:47'),
(71, 'TRAIL', 'EVALUATION', 'Cut-in 20%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '222222,66666', '2020-10-26 20:22:21', '1000188509', 1, '2020-10-26 20:22:21', '2020-10-28 20:05:38'),
(72, 'PINCLITE', 'EVALUATION', 'Cut-in 10%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:05:18', '1000188509', 0, '2020-10-28 20:05:18', '2020-10-28 20:05:18'),
(73, 'DRACO', 'EVALUATION', 'Cut-in 10%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:05:55', '1000188509', 0, '2020-10-28 20:05:55', '2020-10-28 20:05:55'),
(74, 'PYRAMID', 'EVALUATION', 'Cut-in 50%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:06:58', '1000188509', 0, '2020-10-28 20:06:58', '2020-10-28 20:06:58'),
(75, 'REMBRNDT', 'EVALUATION', 'Cut-in 20%', 'KK.08T', 'HXFILLER', NULL, NULL, '2020-10-28 20:07:35', '1000188509', 0, '2020-10-28 20:07:35', '2020-10-28 20:07:35'),
(76, 'MALIBU', 'EVALUATION', 'Cut-in 10%', 'HD6N5GK001', 'SELECT ITEMS', NULL, NULL, '2020-10-28 20:11:03', '1000188509', 0, '2020-10-28 20:11:03', '2020-10-28 20:11:03'),
(77, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:16:29', '1000188509', 0, '2020-10-28 20:16:29', '2020-10-28 20:16:29'),
(78, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:16:52', '1000188509', 0, '2020-10-28 20:16:52', '2020-10-28 20:16:52'),
(79, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '2222', '2020-10-28 20:17:09', '1000188509', 0, '2020-10-28 20:17:09', '2020-10-28 20:17:09'),
(80, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '2222', '2020-10-28 20:18:41', '1000188509', 0, '2020-10-28 20:18:41', '2020-10-28 20:18:41'),
(81, 'REMBRNDT', 'PRODUCTION', 'Cut-in 100%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:19:05', '1000188509', 0, '2020-10-28 20:19:05', '2020-10-28 20:19:05'),
(82, 'TAHOE_XL', 'PRODUCTION', 'Cut-in 20%', 'HGR05Gs002', 'SELECT ITEMS', 'HDF', NULL, '2020-10-28 20:24:36', '1000188509', 0, '2020-10-28 20:24:36', '2020-10-28 20:24:36'),
(83, 'EIGERRE', 'PRODUCTION', 'Cut-in 50%', 'HGR05Gs009', 'HXFILLER', 'HDF', '5555,6666', '2020-10-28 20:25:50', '1000188509', 0, '2020-10-28 20:25:50', '2020-10-28 20:25:50'),
(84, 'VERDI_RE ( 5D )', 'EVALUATION', 'Cut-in 20%', 'HYFN5Gk000', 'HXFILLER', 'HDF', NULL, '2020-10-28 21:10:35', '1000188509', 0, '2020-10-28 21:10:35', '2020-10-28 21:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_developers`
--

CREATE TABLE `tb_developers` (
  `id` int(11) NOT NULL,
  `dev_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev_dept` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev_product` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_flag` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_developers`
--

INSERT INTO `tb_developers` (`id`, `dev_id`, `dev_name`, `dev_email`, `dev_dept`, `dev_picture`, `dev_product`, `delete_flag`, `created_at`, `updated_at`) VALUES
(10, '1000155555', 'Soontaragorn Srisaiyas', 'Soontaragorn.Srisaiyas@wdc.com', 'FILLER', '', 'DIABLO3S', 0, '2017-10-06 07:33:28', '2017-10-06 07:33:28'),
(11, '1000166666', 'Panya Umbangtalad', 'Panya.Umbangtalad@wdc.com', 'SEEDER', '', 'DIABLO3S', 0, '2017-10-06 07:34:39', '2017-10-06 07:34:39'),
(12, '1000155556', 'Phongkul Nantrathip', 'Phongkul.Nantrathip@wdc.com', 'FILLER', '', 'VULCAN', 0, '2017-10-06 07:39:17', '2017-10-06 07:39:50'),
(13, '1000155557', 'Anan Jaidee', 'Anan.Jaidee@wdc.com', 'FILLER', '', 'EIGERRE', 0, '2017-10-06 07:41:34', '2017-10-06 07:41:34'),
(14, '1000188112', 'Subin Jaemsri', 'Subin.Jeamsri@wdc.com', 'MFG', '', 'MANTIS_PL', 0, '2017-10-13 09:30:33', '2017-10-13 09:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_his_software`
--

CREATE TABLE `tb_his_software` (
  `product` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `master_rev` varchar(50) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `tester` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `een` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `tde_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `sw_rev` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  `log_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_softwares`
--

CREATE TABLE `tb_log_softwares` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `sw_status` varchar(50) DEFAULT NULL,
  `sw_status_desc` varchar(50) DEFAULT NULL,
  `master_rev` varchar(50) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `tester` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log_softwares`
--

INSERT INTO `tb_log_softwares` (`id`, `product_name`, `sw_status`, `sw_status_desc`, `master_rev`, `operation`, `platform`, `tester`, `timestamp`, `emp_id`, `delete_flag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'EVALUATION', '1 Tester', 'MMMMMMMMMMM', 'HXFILLER', 'HDF', 'MMMMM', '2017-10-27 20:34:02', '333333', 0, 'I', '2017-10-27 20:34:03', '2017-10-27 20:34:03'),
(2, 'ABC', 'EVALUATION', 'Cut-in 50%', 'MMMMMMMMMMM', 'HXFILLER', 'HDF', 'MMMMM', '2017-10-27 20:34:32', '333333', 0, 'U', '2017-10-27 20:34:32', '2017-10-27 20:34:32'),
(3, 'ABC', 'EVALUATION', 'Cut-in 50%', 'MMMMMMMMMMM', 'HXFILLER', 'HDF', 'MMMMM', '2017-10-27 20:35:11', '333333', 0, 'D', '2017-10-27 20:35:11', '2017-10-27 20:35:11'),
(4, 'ABC', 'PRODUCTION', 'Cut-in 100%', 'AAAAAAAAABffff', 'HXFILLER', 'HDF+', 'fffff', '2017-10-27 20:35:55', '1000222222', 0, 'U', '2017-10-27 20:35:55', '2017-10-27 20:35:55'),
(5, 'XXXXX', 'EVALUATION', 'SELECT ITEMS', 'eeeeeewwww', 'SELECT ITEMS', 'HDF', 'eeeeee', '2017-10-27 20:39:23', '333333', 0, 'I', '2017-10-27 20:39:23', '2017-10-27 20:39:23'),
(6, 'XXXXX', 'PRODUCTION', 'SELECT ITEMS', 'eeeeeewwww', 'SELECT ITEMS', 'HDF', 'eeeeee', '2017-10-27 20:39:37', '333333', 0, 'U', '2017-10-27 20:39:37', '2017-10-27 20:39:37'),
(7, 'XXXXX', 'PRODUCTION', 'Cut-in 50%', 'eeeeeewwww', 'SELECT ITEMS', 'HDF', 'eeeeee', '2017-10-27 20:40:05', '333333', 0, 'U', '2017-10-27 20:40:05', '2017-10-27 20:40:05'),
(8, 'MANTIS_PL', 'EVALUATION', 'Cut-in 100%', 'GGGGGFFFF', 'SEEDER', 'HDF', 'FFFFF', '2017-10-27 20:40:19', '333333', 0, 'U', '2017-10-27 20:40:20', '2017-10-27 20:40:20'),
(9, 'MANTIS_PL', 'EVALUATION', 'Cut-in 100%', 'GGGGGFFFF', 'SEEDER', 'HDF', 'FFFFFGGGGGGGGGGG', '2017-10-27 20:40:42', '333333', 0, 'U', '2017-10-27 20:40:42', '2017-10-27 20:40:42'),
(10, 'A', 'PRODUCTION', '5 Tester', 'qqqq', 'HXFILLER', 'HDF', 'qqqq', '2017-10-27 21:56:11', '1000222972', 0, 'I', '2017-10-27 21:56:11', '2017-10-27 21:56:11'),
(11, NULL, NULL, NULL, NULL, NULL, 'HDF', NULL, '2017-11-11 11:45:23', NULL, 0, 'I', '2017-11-11 11:45:24', '2017-11-11 11:45:24'),
(12, NULL, NULL, NULL, NULL, NULL, 'HDF', NULL, '2017-11-11 11:45:27', NULL, 0, 'I', '2017-11-11 11:45:27', '2017-11-11 11:45:27'),
(13, 'GGGGGGGG', 'EVALUATION', 'Cut-in 20%', 'XXXXXDDDDD', 'SELECT ITEMS', 'HDF', 'DDDDx', '2018-05-01 10:25:16', '1000188509', 0, 'D', '2018-05-01 10:25:16', '2018-05-01 10:25:16'),
(14, 'GGGGGG', 'PRODUCTION', 'Cut-in 20%', '333333', 'HXFILLER', 'HDF', '33333', '2018-05-01 10:25:22', '1000188509', 0, 'D', '2018-05-01 10:25:22', '2018-05-01 10:25:22'),
(15, 'XXXXX', 'PRODUCTION', 'Cut-in 50%', 'eeeeeewwww', 'SELECT ITEMS', 'HDF', 'eeeeee', '2018-05-01 10:25:25', '1000188509', 0, 'D', '2018-05-01 10:25:25', '2018-05-01 10:25:25'),
(16, 'DRAGFLY1D', 'PRODUCTION', 'Cut-in 20%', 'QQQQQ', 'SEEDER', 'HDF', 'SDSDSbbbb', '2018-05-01 10:25:28', '1000188509', 0, 'D', '2018-05-01 10:25:28', '2018-05-01 10:25:28'),
(17, 'AXC', 'PRODUCTION', '5 Tester', 'RRRSSSSS', 'HXFILLER', 'HDF', 'SssS', '2018-05-01 10:25:32', '1000188509', 0, 'D', '2018-05-01 10:25:32', '2018-05-01 10:25:32'),
(18, 'APOLLO', 'EVALUATION', 'Cut-in 10%', 'fffff', 'HXFILLER', 'HDF', 'xxxx', '2020-10-26 20:20:47', '1000188509', 0, 'I', '2020-10-26 20:20:47', '2020-10-26 20:20:47'),
(19, 'TRAIL', 'EVALUATION', 'Cut-in 20%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '222222,66666', '2020-10-26 20:22:21', '1000188509', 0, 'I', '2020-10-26 20:22:21', '2020-10-26 20:22:21'),
(20, 'PINCLITE', 'EVALUATION', 'Cut-in 10%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:05:18', '1000188509', 0, 'I', '2020-10-28 20:05:18', '2020-10-28 20:05:18'),
(21, 'TRAIL', 'EVALUATION', 'Cut-in 20%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '222222,66666', '2020-10-28 20:05:38', '1000188509', 0, 'D', '2020-10-28 20:05:38', '2020-10-28 20:05:38'),
(22, 'DRACO', 'EVALUATION', 'Cut-in 10%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:05:55', '1000188509', 0, 'I', '2020-10-28 20:05:55', '2020-10-28 20:05:55'),
(23, 'PYRAMID', 'EVALUATION', 'Cut-in 50%', 'TJ.KL.00.G8E', 'SEEDER', NULL, NULL, '2020-10-28 20:06:58', '1000188509', 0, 'I', '2020-10-28 20:06:58', '2020-10-28 20:06:58'),
(24, 'REMBRNDT', 'EVALUATION', 'Cut-in 20%', 'KK.08T', 'HXFILLER', NULL, NULL, '2020-10-28 20:07:35', '1000188509', 0, 'I', '2020-10-28 20:07:35', '2020-10-28 20:07:35'),
(25, 'MALIBU', 'EVALUATION', 'Cut-in 10%', 'HD6N5GK001', 'SELECT ITEMS', NULL, NULL, '2020-10-28 20:11:03', '1000188509', 0, 'I', '2020-10-28 20:11:03', '2020-10-28 20:11:03'),
(26, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:16:29', '1000188509', 0, 'I', '2020-10-28 20:16:29', '2020-10-28 20:16:29'),
(27, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:16:52', '1000188509', 0, 'I', '2020-10-28 20:16:52', '2020-10-28 20:16:52'),
(28, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '2222', '2020-10-28 20:17:09', '1000188509', 0, 'I', '2020-10-28 20:17:09', '2020-10-28 20:17:09'),
(29, 'TAHOE2D', 'EVALUATION', 'Cut-in 10%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', '2222', '2020-10-28 20:18:41', '1000188509', 0, 'I', '2020-10-28 20:18:41', '2020-10-28 20:18:41'),
(30, 'REMBRNDT', 'PRODUCTION', 'Cut-in 100%', 'TJ.EH.00.H1J', 'SEEDER', 'SEEDER', NULL, '2020-10-28 20:19:05', '1000188509', 0, 'I', '2020-10-28 20:19:05', '2020-10-28 20:19:05'),
(31, 'TAHOE_XL', 'PRODUCTION', 'Cut-in 20%', 'HGR05Gs002', 'SELECT ITEMS', 'HDF', NULL, '2020-10-28 20:24:36', '1000188509', 0, 'I', '2020-10-28 20:24:36', '2020-10-28 20:24:36'),
(32, 'EIGERRE', 'PRODUCTION', 'Cut-in 50%', 'HGR05Gs009', 'HXFILLER', 'HDF', '5555,6666', '2020-10-28 20:25:50', '1000188509', 0, 'I', '2020-10-28 20:25:50', '2020-10-28 20:25:50'),
(33, 'VERDI_RE ( 5D )', 'EVALUATION', 'Cut-in 20%', 'HYFN5Gk000', 'HXFILLER', 'HDF', NULL, '2020-10-28 21:10:35', '1000188509', 0, 'I', '2020-10-28 21:10:35', '2020-10-28 21:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_dept` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_flag` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`id`, `emp_id`, `emp_name`, `emp_email`, `emp_dept`, `emp_picture`, `emp_password`, `delete_flag`, `created_at`, `updated_at`) VALUES
(1, '1000188509', 'SITTHIPONG PUTTHANU', 'Sitthipong.Putthanu@wdc.com', 'TAO', '', '', 0, '2017-09-02 15:09:38', '2017-10-05 03:00:18'),
(2, '1000222972', 'NIMIT SRISONGKRAM', 'Nimit.Srisongkram@wdc.com', 'TAO', '', '', 0, '2017-09-02 15:09:39', '2017-10-05 02:59:49'),
(7, '1000102919', 'NIKHOM CHOMRASRI', 'Nikhom.Chomrasri@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:35:28', '2017-10-06 06:35:28'),
(8, '1000060175', 'SUWICHA KEAWTAD', 'suwicha.keawtad@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:36:37', '2017-10-06 06:36:37'),
(9, '1000108670', 'WASANA INPAKTAN', 'wasana.inpaktan@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:37:51', '2017-10-06 06:37:51'),
(10, '1000225968', 'SODA PHOSRISOI', 'soda.phosrisoi@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:39:58', '2017-10-06 06:39:58'),
(11, '1000220845', 'NAMTHIP ATHITTHIANG', 'namthip.athitthiang@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:44:29', '2017-10-06 06:44:29'),
(12, '1000220952', 'AWATCHAPONG ORANKANJANACHOT', 'anat.orankanjanachot@wdc.com', 'TAO', '', '', 0, '2017-10-06 06:47:46', '2017-10-06 06:48:14'),
(13, '1000223555', 'SOMMAI TREESARN', 'Sommai.Treesarn@wdc.com', 'TAO', '', '', 0, '2017-10-06 09:38:46', '2017-10-06 09:38:46'),
(14, '1000220911', 'THANISORN PANYA', 'Thanisorn.Panya@wdc.com', 'TAO', '', '', 0, '2017-10-06 09:39:36', '2017-10-06 09:39:36'),
(15, '1000028546', 'WASUN HARINSALAI', 'Wasun.Harinsalai@wdc.com', 'TAO', '', '', 0, '2017-10-06 09:40:19', '2017-10-06 09:40:19'),
(16, '1000220892', 'CHALERMVUT HANJAD', 'Chalermvut.Hanjad@wdc.com', 'TAO', '', '', 0, '2017-10-06 09:43:15', '2017-10-06 09:43:15'),
(17, '9999999999', 'Buckwinter', 'Buckwinter@wdc.com', 'TAO', '', '', 0, '2017-10-19 06:28:19', '2017-10-19 06:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_platforms`
--

CREATE TABLE `tb_platforms` (
  `id` int(11) NOT NULL,
  `Platform` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_platforms`
--

INSERT INTO `tb_platforms` (`id`, `Platform`) VALUES
(1, 'HDF'),
(2, 'HDF+'),
(3, 'SIO'),
(4, 'SEEDER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_family` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_owner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `delete_flag` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `product_name`, `product_family`, `product_owner`, `emp_id`, `timestamp`, `delete_flag`, `created_at`, `updated_at`) VALUES
(4, 'DRAGFLY1D_HE', 'DRAGFLY1D_HE', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-17 09:45:23', 0, NULL, '2017-10-17 09:45:23'),
(9, 'MANTIS_PL', 'MANTIS_PL_11', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:31:10', 0, NULL, '2017-10-06 14:31:10'),
(10, 'MANTIS_PL', 'MANTIS_PL_2', 'SITTHIPONG PUTTHANU', '1000188509', '2017-06-28 00:00:00', 0, NULL, NULL),
(14, 'TAHOE2D', 'TAHOE2D_1', 'SITTHIPONG PUTTHANU', '1000188509', '2017-06-27 00:00:00', 0, NULL, NULL),
(15, 'TAHOE2D', 'TAHOE2D_2', 'SITTHIPONG PUTTHANU', '1000188509', '2017-06-27 00:00:00', 0, NULL, NULL),
(16, 'TRAILXLS', 'TRAILXLS_2', 'SITTHIPONG PUTTHANU', '1000188509', '2017-06-27 00:00:00', 0, NULL, NULL),
(17, 'TRAILXLS', 'TRAILXLS1', 'SITTHIPONG PUTTHANU', '1000188509', '2017-06-27 00:00:00', 0, NULL, NULL),
(18, 'TRESSELB', 'TRESSELB_1', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:30:49', 0, NULL, '2017-10-06 14:30:49'),
(27, 'DIABLO3S', 'DIABLO2S', 'SITTHIPONG PUTTHANU', '1000060175', '2017-10-06 14:19:23', 0, '2017-10-06 14:19:23', '2017-10-06 14:19:23'),
(28, 'PYRAMID', 'RAIN2DT', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:20:15', 0, '2017-10-06 14:20:15', '2017-10-06 14:20:15'),
(29, 'REMBRNDT', 'REMBRNRE', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:23:33', 0, '2017-10-06 14:21:05', '2017-10-06 14:23:33'),
(30, 'EIGERRE', 'FRASERRE', 'SUWICHA KEAWTAD', '1000220845', '2017-10-06 14:28:21', 0, '2017-10-06 14:28:21', '2017-10-06 14:28:21'),
(31, 'PINCLITE', 'PINCLITE', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:28:53', 0, '2017-10-06 14:28:53', '2017-10-06 14:28:53'),
(32, 'VULCAN', 'VULCAN', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:29:22', 0, '2017-10-06 14:29:22', '2017-10-06 14:29:22'),
(33, 'DRACO', 'DRACO', 'NAMTHIP ATHITTHIANG', '1000220845', '2017-10-06 14:30:26', 0, '2017-10-06 14:30:26', '2017-10-06 14:30:26'),
(34, 'TAHOE_XL', 'TAHOE_XL', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 14:46:35', 0, '2017-10-06 14:46:35', '2017-10-06 14:46:35'),
(35, 'TRESSELS', 'TRESSELS', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 17:36:05', 0, '2017-10-06 17:36:05', '2017-10-06 17:36:05'),
(36, 'APOLLO', 'APOLLO', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-06 17:55:26', 0, '2017-10-06 17:55:26', '2017-10-06 17:55:26'),
(37, 'TRESXLB2', 'TRESXLB2', 'SITTHIPONG PUTTHANU', '1000188509', '2017-10-13 15:18:48', 0, '2017-10-13 15:18:48', '2017-10-13 15:18:48'),
(38, 'KJN3D_RE', 'KOJIN', 'Sitthipong Putthanu', '1000188509', '2017-10-17 10:00:17', 0, '2017-10-17 10:00:17', '2017-10-17 10:00:17'),
(39, 'TRESXLB', 'TRESXLB', 'Sitthipong Putthanu', '1000188509', '2017-10-17 10:47:47', 0, '2017-10-17 10:47:47', '2017-10-17 10:47:47'),
(40, 'DIABLO2S', 'DIABLO3S', 'Sitthipong Putthanu', '1000188509', '2017-10-17 10:53:29', 0, '2017-10-17 10:53:29', '2017-10-17 10:53:29'),
(41, 'TRAILXLB', 'TRAILXLS', 'Sitthipong Putthanu', '1000188509', '2017-10-17 11:56:40', 0, '2017-10-17 11:56:40', '2017-10-17 11:56:40'),
(42, 'TRAIL', 'TRAIL', 'Sitthipong Putthanu', '1000188509', '2017-10-19 13:54:42', 0, '2017-10-19 13:54:42', '2017-10-19 13:54:42'),
(43, 'MALIBU', 'MALIBU', 'Sitthipong Putthanu', '1000188509', '2017-10-19 14:00:06', 0, '2017-10-19 14:00:06', '2017-10-19 14:00:06'),
(44, 'VRU', 'VRU', 'Chavalit Covveeran', '99999999', '2017-10-20 10:41:48', 0, '2017-10-20 10:41:48', '2017-10-20 10:41:48'),
(45, 'VRUA', 'VRUA-B', 'Sitthipong Putthanu', '1000188509', '2020-10-19 00:15:11', 0, '2020-10-19 00:15:11', '2020-10-19 00:15:11'),
(46, 'AAAA', 'BBBB', 'Sitthipong Putthanu', '1000188509', '2020-10-19 09:22:42', 1, '2020-10-19 09:22:42', '2020-10-28 12:45:34'),
(47, 'VRU_B', 'VRU_B', 'Sitthipong Putthanu', '1000188509', '2020-10-19 10:37:28', 0, '2020-10-19 10:37:28', '2020-10-19 10:37:28'),
(48, 'VERDI_RE ( 5D )', 'VERDI_RE ( 5D )', 'Sitthipong Putthanu', '1000188509', '2020-10-28 21:09:58', 0, '2020-10-28 21:09:58', '2020-10-28 21:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_family`
--

CREATE TABLE `tb_product_family` (
  `id` int(11) DEFAULT NULL,
  `Column 2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sio_menu`
--

CREATE TABLE `tb_sio_menu` (
  `me_id` int(11) NOT NULL,
  `me_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sw_status`
--

CREATE TABLE `tb_sw_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_sw_status`
--

INSERT INTO `tb_sw_status` (`id`, `status_name`) VALUES
(1, '1 Tester'),
(2, '5 Tester'),
(3, 'Cut-in 10%'),
(4, 'Cut-in 20%'),
(5, 'Cut-in 50%'),
(6, 'Cut-in 100%');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tester_inventory`
--

CREATE TABLE `tb_tester_inventory` (
  `TestInven_Id` int(11) NOT NULL,
  `TesterName` varchar(10) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `ModelCCC` varchar(20) DEFAULT NULL,
  `Operation` varchar(20) DEFAULT NULL,
  `MasterRev` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TimeStamp` timestamp NULL DEFAULT current_timestamp(),
  `Platform` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tester_inventory`
--

INSERT INTO `tb_tester_inventory` (`TestInven_Id`, `TesterName`, `ProductName`, `ModelCCC`, `Operation`, `MasterRev`, `Quantity`, `TimeStamp`, `Platform`, `updated_at`, `created_at`) VALUES
(1, 'EQ-5598', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'EQ-5599', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014002', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'EQ-5600', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'EQ-5601', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'EQ-5602', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'EQ-5603', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'EQ-5604', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'EQ-5605', 'TRESXLB2', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HJKK014001 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'EQ-5606', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014002 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'EQ-5607', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014004', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'EQ-5608', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014002 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'EQ-5609', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014002 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'EQ-5610', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014002 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'EQ-5611', 'DIABLO3S ', 'WD40EMRX-82UZ0N0', 'HXFILLER', 'HTLH014002 ', 1, '0000-00-00 00:00:00', 'HDF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '257-1001', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '257-1002', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '257-1003', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '257-1004', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '257-1005', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '257-1006', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '257-1007', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '257-1008', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '257-1009', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '257-1010', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '257-1011', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '257-1012', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '257-1013', 'TRESXLB2', 'WD40EZRZ-00GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '257-1014', 'TRESXLB2', 'WD40EZRZ-22GXCB0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '257-1015', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '257-1016', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '257-1017', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '257-1018', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '257-1019', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '257-1020', 'TRESXLB2', 'WD40PURX-64N96Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '257-1021', 'TRESXLB2', 'WD40PURX-78NZ6Y0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '257-1022', 'TRESXLB2', 'WD40PURZ-85TTDY0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '257-1036', 'TRESXLB2', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.01.S3D ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '257-1037', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '257-1038', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '257-1039', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '257-1040', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '257-1041', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '257-1042', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '257-1043', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '257-1044', 'DIABLO3S', 'WD10PURZ-85U8XY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '257-1045', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '257-1046', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '257-1047', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '257-1048', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '257-1049', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '257-1050', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '257-1051', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '257-1052', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '257-1053', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '257-1054', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '257-1055', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '257-1056', 'DIABLO3S', 'WD10PURX-78E5EY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '257-1057', 'DIABLO3S', 'WD5000AZRZ-00HTKB0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '257-1058', 'DIABLO3S', 'WD5000AZRZ-00HTKB0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '257-1059', 'DIABLO3S', 'WD5000AZRZ-00HTKB0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '257-1060', 'DIABLO3S', 'WD40EFRX-68N32N0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '257-1061', 'DIABLO3S', 'WD40EFRX-68N32N0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '257-1062', 'DIABLO3S', 'WD40EFRX-68N32N0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '257-1063', 'DIABLO3S', 'WD40EFRX-68N32N0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '257-1064', 'DIABLO3S', 'WD60PURZ-85ZUFY1', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '257-1065', 'DIABLO3S', 'WD60PURZ-85ZUFY1', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '257-1066', 'DIABLO3S', 'WD60PURZ-85ZUFY1', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '257-1067', 'DIABLO3S', 'WD5000AZLX-60K2TA0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '257-1068', 'DIABLO3S', 'WD40PURZ-85TTDY0', 'SEEDER', 'TJ.KS.00.TLH ', 1, '0000-00-00 00:00:00', 'SEEDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'SIO-7G29', 'PALMER\r\n', 'WD40PURZ-85TTDY0', 'HXFILLER', 'Z105200 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'SIO-7G30', 'PALMER\r\n', 'WD40PURZ-85TTDY0', 'HXFILLER', 'Z105200 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'SIO-7G31', 'PALMER\r\n', 'WD40PURZ-85TTDY0', 'HXFILLER', 'Z105200 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'SIO-7G32', 'PALMER\r\n', 'WD40PURZ-85TTDY0', 'HXFILLER', 'Z105200 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'SIO-7G33', 'TAHOE_XL', 'WD4001FYYG-79NCVW3', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'SIO-7G34', 'TAHOE_XL', 'WD4001FYYG-79NCVW3', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'SIO-7G35', 'TAHOE_XL', 'WD20NMVW-11EDZS7', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'SIO-7G36', 'TAHOE_XL', 'WD20NMVW-11EDZS7', 'HXFILLER', 'ERM1201', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'SIO-7G37', 'TAHOE_XL', 'WD5003AZEX-00K3CA0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'SIO-7G38', 'TAHOE_XL', 'WD5003AZEX-00K3CA0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'SIO-7G39', 'PALMER\r\n', 'WD5003AZEX-00K3CA0', 'HXFILLER', 'Z105200 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'SIO-7G40', 'TAHOE_XL', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'SIO-7G41', 'TAHOE_XL', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'SIO-7G42', 'RAINIER\r\n', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'SIO-7G43', 'RAINIER\r\n', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'SIO-7G44', 'RAINIER\r\n', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'SIO-7G45', 'RAINIER\r\n', 'WD30PURZ-85GU6Y0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'SIO-7G46', 'RAINIER\r\n', 'WD30PURX-78P6ZY0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'SIO-7G47', 'RAINIER', 'WD30PURX-64PFUY0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'SIO-7G48', 'RAINIER', 'WD30PURX-64PFUY0', 'HXFILLER', 'BRW4000 \r\n', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'SIO-7G49', 'TAHOE_XL', 'WD30PURX-64PFUY0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'SIO-7G50', 'TAHOE_XL', 'WD30PURX-64PFUY0', 'HXFILLER', 'ERM1200', 1, '0000-00-00 00:00:00', 'SIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'HB001', 'TRESXLB2', 'WD30PURX-64PFUY0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'HB002', 'TRESXLB2', 'WD30PURX-64PFUY0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'HB003', 'TRESXLB2', 'WD30PURX-64PFUY0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'HB004', 'TRESXLB2', 'WD30EZRX-19D8PB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'HB005', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'HB006', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3512 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'HB007', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3512 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'HB008', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'HB009', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'HB010', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'HB011', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'HB012', 'TRESXLB2', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'JKK3500 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'HB013', 'DIABLO3S', 'WD30EZRZ-00Z5HB0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'HB014', 'DIABLO3S', 'WD30EZRZ-22Z5HB0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'HB015', 'DIABLO3S', 'WD30EZRZ-22Z5HB0', 'HXFILLER', 'HTLHA28009', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'HB016', 'DIABLO3S', 'WD30EZRZ-22Z5HB0', 'HXFILLER', 'HTLHA28009', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'HB017', 'DIABLO3S', 'WD30EZRZ-22Z5HB0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'HB018', 'DIABLO3S', 'WD30EZRZ-22Z5HB0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'HB019', 'DIABLO3S', 'WD30PURX-64PFUY0', 'HXFILLER', 'HTLHA28007 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'HB020', 'DIABLO3S', 'WD30PURX-64PFUY0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'EQ-8888', 'VRU', '456', 'HXFILLER', 'HD6N5GK001', 1, '2020-10-27 14:40:23', 'HDF', '2020-10-27 14:40:23', '2020-10-27 14:40:23'),
(114, 'SIO-7673', 'TRESXLB2\r\n', 'WD20NMVW-16EDZS2', 'HXFILLER', 'JKK1501', 1, '2020-10-28 07:33:05', 'SIO', '2020-10-28 07:33:05', '2020-10-28 07:33:05'),
(115, 'HB021', 'DIABLO3S', 'WD30PURX-64PFUY0', 'HXFILLER', 'HTLHA28008 ', 1, '0000-00-00 00:00:00', 'HDF+', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_test_type`
--

CREATE TABLE `tb_test_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','board') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `images` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `online` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `employee_id`, `name`, `email`, `password`, `location`, `department`, `phone`, `mobile`, `role`, `images`, `online`, `remember_token`, `active`, `key`, `created_at`, `updated_at`) VALUES
(64, '1000188509', '1000188509', 'Sitthipong Putthanu', 'Sitthipong.Putthanu@wdc.com', '$2y$10$yZazzYJ3vSmFlfW07GXuTeogPmBRwzk1lSJxt/RN/v2Wz7qH4Ucz2', 'BPI', NULL, NULL, NULL, 'user', '1000188509.png', '0', 'lB1AJvALl7fVI3MZScmYvGGAJvAWZrCGK0SBaLoNiuAInny7tTY4UevLqc8x', '1', NULL, '2017-10-20 03:40:10', '2017-10-20 03:00:23'),
(65, '99999999', '99999999', 'Chavalit Covveeran', 'Chavalit.Covveeran@vru.com', '$2y$10$2qL0VJGHd/ACeysKyaV5oe8/A9SW3qYVHvbnzyAx0erGXQZmkdM/W', 'BPI', NULL, NULL, NULL, 'user', '99999999.png', '0', NULL, '1', NULL, '2017-10-20 03:41:03', '2017-10-20 03:41:03'),
(66, '1000188508', '1000188508', 'Gift', 'falcaodo@gmail.com', '$2y$10$knRNmqTariAa2LD8RZg7vOMCPEb3d5tq4OBh/fIQ2M..8/RH0/3re', 'BPI', NULL, NULL, NULL, 'user', '1000188508.png', '0', 'W30ZdA9YjCdbzwPKfdWfnTtpdqdkCIsx14S19fIarFJ1WHqYESLTbzk950LL', '1', NULL, '2020-10-17 07:24:00', '2020-10-17 07:23:49'),
(67, '152915', '152915', 'สิทธิพงษ์ พุทธานุ', 'buckwinter.cyberwarfare@gmail.com', '$2y$10$Xgt3ymAu009PYuw4xjFvKOy7pUj0U5qrhk//3X6q2HSS2C5i/BGIy', 'BPI', NULL, NULL, NULL, 'user', '152915.png', '0', NULL, '1', NULL, '2020-10-28 05:44:02', '2020-10-28 05:44:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cur_softwares`
--
ALTER TABLE `tb_cur_softwares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_developers`
--
ALTER TABLE `tb_developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_log_softwares`
--
ALTER TABLE `tb_log_softwares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_platforms`
--
ALTER TABLE `tb_platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name_product_family` (`product_name`,`product_family`);

--
-- Indexes for table `tb_sio_menu`
--
ALTER TABLE `tb_sio_menu`
  ADD PRIMARY KEY (`me_id`);

--
-- Indexes for table `tb_sw_status`
--
ALTER TABLE `tb_sw_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tester_inventory`
--
ALTER TABLE `tb_tester_inventory`
  ADD PRIMARY KEY (`TestInven_Id`);

--
-- Indexes for table `tb_test_type`
--
ALTER TABLE `tb_test_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cur_softwares`
--
ALTER TABLE `tb_cur_softwares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_developers`
--
ALTER TABLE `tb_developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_log_softwares`
--
ALTER TABLE `tb_log_softwares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_platforms`
--
ALTER TABLE `tb_platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_sio_menu`
--
ALTER TABLE `tb_sio_menu`
  MODIFY `me_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sw_status`
--
ALTER TABLE `tb_sw_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tester_inventory`
--
ALTER TABLE `tb_tester_inventory`
  MODIFY `TestInven_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_test_type`
--
ALTER TABLE `tb_test_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
