-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 02:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `coquan`
--

CREATE TABLE `coquan` (
  `id_CQ` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `parent_CQ` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coquan`
--

INSERT INTO `coquan` (`id_CQ`, `ten`, `diaChi`, `email`, `phone`, `parent_CQ`, `created_at`, `updated_at`) VALUES
(1, 'Tỉnh Đoàn BR-VT', 'Bà Rịa', ' brvt@gmail.com', '0123456789', 0, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(2, 'Thành Đoàn VT', 'Vũng Tàu', ' vtu@gmail.com', '0123456789', 1, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(3, 'Đoàn thanh niên Xuyên Mộc', 'Xuyên Mộc', ' xmu@gmail.com', '0123456789', 1, '2023-11-10 06:47:06', '2023-11-10 06:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id_DG` bigint(20) UNSIGNED NOT NULL,
  `ten_tieu_chi` varchar(255) NOT NULL,
  `diem` int(11) NOT NULL DEFAULT 0,
  `diemQuyDinh` int(11) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_TC` bigint(20) UNSIGNED DEFAULT NULL,
  `id_DDG` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id_DG`, `ten_tieu_chi`, `diem`, `diemQuyDinh`, `link`, `ghiChu`, `date`, `id_TC`, `id_DDG`, `created_at`, `updated_at`) VALUES
(1, 'Năng lực', 2, 10, NULL, NULL, '2023-11-10 13:48:59', 1, 1, '2023-11-10 06:48:59', '2023-11-10 06:48:59'),
(2, 'Tính Chất', 2, 10, NULL, NULL, '2023-11-10 13:48:59', 2, 1, '2023-11-10 06:48:59', '2023-11-10 06:48:59'),
(3, 'Năng lực', 2, 10, NULL, NULL, '2023-11-10 13:58:07', 1, 2, '2023-11-10 06:58:07', '2023-11-10 06:58:07'),
(4, 'Tính Chất', 2, 10, NULL, NULL, '2023-11-10 13:58:07', 2, 2, '2023-11-10 06:58:07', '2023-11-10 06:58:07'),
(5, 'Năng lực', 2, 10, NULL, NULL, '2023-11-10 13:59:36', 1, 3, '2023-11-10 06:59:36', '2023-11-10 06:59:36'),
(6, 'Tính Chất', 2, 10, NULL, NULL, '2023-11-10 13:59:36', 2, 3, '2023-11-10 06:59:36', '2023-11-10 06:59:36'),
(7, 'Năng lực', 3, 10, NULL, NULL, '2023-11-10 14:28:19', 1, 4, '2023-11-10 07:28:19', '2023-11-10 07:28:19'),
(8, 'Tính Chất', 3, 10, NULL, NULL, '2023-11-10 14:28:19', 2, 4, '2023-11-10 07:28:19', '2023-11-10 07:28:19'),
(9, 'Năng lực', 3, 10, NULL, NULL, '2023-11-10 14:30:18', 1, 5, '2023-11-10 07:30:18', '2023-11-10 07:30:18'),
(10, 'Tính Chất', 3, 10, NULL, NULL, '2023-11-10 14:30:18', 2, 5, '2023-11-10 07:30:18', '2023-11-10 07:30:18'),
(13, 'Năng lực', 2, 10, NULL, NULL, '2023-11-10 15:19:09', 1, 7, '2023-11-10 08:19:09', '2023-11-10 08:19:09'),
(14, 'Tính Chất', 2, 10, NULL, NULL, '2023-11-10 15:19:09', 2, 7, '2023-11-10 08:19:09', '2023-11-10 08:19:09'),
(15, 'Năng lực', 5, 10, NULL, NULL, '2023-11-10 15:25:03', 1, 8, '2023-11-10 08:25:03', '2023-11-10 08:25:03'),
(16, 'Tính Chất', 5, 10, NULL, NULL, '2023-11-10 15:25:03', 2, 8, '2023-11-10 08:25:03', '2023-11-10 08:25:03'),
(17, 'Năng lực', 5, 10, NULL, NULL, '2023-11-10 15:25:13', 1, 9, '2023-11-10 08:25:13', '2023-11-10 08:25:13'),
(18, 'Năng lực', 5, 10, NULL, NULL, '2023-11-10 15:25:28', 1, 10, '2023-11-10 08:25:28', '2023-11-10 08:25:28'),
(19, 'Tính Chất', 5, 10, NULL, NULL, '2023-11-10 15:25:28', 2, 10, '2023-11-10 08:25:28', '2023-11-10 08:25:28'),
(20, 'Năng lực', 3, 10, NULL, NULL, '2023-11-10 15:45:32', 1, 11, '2023-11-10 08:45:32', '2023-11-10 08:45:32'),
(21, 'Tính Chất', 3, 10, NULL, NULL, '2023-11-10 15:45:32', 2, 11, '2023-11-10 08:45:32', '2023-11-10 08:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `dotdanhgia`
--

CREATE TABLE `dotdanhgia` (
  `id_DDG` bigint(20) UNSIGNED NOT NULL,
  `tenDot` varchar(255) NOT NULL,
  `trangThai` tinyint(1) NOT NULL DEFAULT 0,
  `ghiChu` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_CQ` bigint(20) UNSIGNED NOT NULL,
  `id_ND` bigint(20) UNSIGNED NOT NULL,
  `id_thang` bigint(20) UNSIGNED DEFAULT NULL,
  `id_quy` bigint(20) UNSIGNED DEFAULT NULL,
  `id_nam` bigint(20) UNSIGNED DEFAULT NULL,
  `id_LDG` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dotdanhgia`
--

INSERT INTO `dotdanhgia` (`id_DDG`, `tenDot`, `trangThai`, `ghiChu`, `date`, `id_CQ`, `id_ND`, `id_thang`, `id_quy`, `id_nam`, `id_LDG`, `created_at`, `updated_at`) VALUES
(1, 'text', 2, NULL, '2023-11-10 13:48:59', 1, 10, NULL, NULL, 3, 51, '2023-11-10 06:48:59', '2023-11-10 08:19:55'),
(2, 'text', 0, 'dở', '2023-11-10 13:58:07', 1, 10, 1, NULL, 1, 1, '2023-11-10 06:58:07', '2023-11-10 08:20:06'),
(3, 'text', 1, NULL, '2023-11-10 13:59:36', 1, 10, NULL, NULL, 1, 17, '2023-11-10 06:59:36', '2023-11-10 06:59:36'),
(4, 'text', 1, NULL, '2023-11-10 14:28:19', 1, 10, NULL, 3, 5, 83, '2023-11-10 07:28:19', '2023-11-10 07:28:19'),
(5, 'text', 1, NULL, '2023-11-10 14:30:18', 1, 10, NULL, 3, 2, 32, '2023-11-10 07:30:18', '2023-11-10 07:30:18'),
(7, 'text', 1, NULL, '2023-11-10 15:19:09', 1, 10, 1, NULL, 1, 1, '2023-11-10 08:19:09', '2023-11-10 08:19:09'),
(8, 'text', 1, NULL, '2023-11-10 15:25:03', 1, 10, 6, NULL, 1, 6, '2023-11-10 08:25:03', '2023-11-10 08:25:03'),
(9, 'text', 1, NULL, '2023-11-10 15:25:13', 1, 10, NULL, 3, 1, 15, '2023-11-10 08:25:13', '2023-11-10 08:25:13'),
(10, 'text', 1, NULL, '2023-11-10 15:25:28', 1, 10, NULL, 1, 1, 13, '2023-11-10 08:25:28', '2023-11-10 08:25:28'),
(11, 'text', 1, NULL, '2023-11-10 15:45:32', 1, 10, 2, NULL, 4, 53, '2023-11-10 08:45:32', '2023-11-10 08:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `OTP` varchar(7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaidanhgia`
--

CREATE TABLE `loaidanhgia` (
  `id_LDG` bigint(20) UNSIGNED NOT NULL,
  `id_thang` bigint(20) UNSIGNED DEFAULT NULL,
  `id_quy` bigint(20) UNSIGNED DEFAULT NULL,
  `id_nam` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaidanhgia`
--

INSERT INTO `loaidanhgia` (`id_LDG`, `id_thang`, `id_quy`, `id_nam`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(2, 2, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(3, 3, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(4, 4, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(5, 5, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(6, 6, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(7, 7, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(8, 8, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(9, 9, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(10, 10, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(11, 11, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(12, 12, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(13, NULL, 1, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(14, NULL, 2, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(15, NULL, 3, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(16, NULL, 4, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(17, NULL, NULL, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(18, 1, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(19, 2, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(20, 3, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(21, 4, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(22, 5, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(23, 6, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(24, 7, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(25, 8, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(26, 9, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(27, 10, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(28, 11, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(29, 12, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(30, NULL, 1, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(31, NULL, 2, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(32, NULL, 3, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(33, NULL, 4, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(34, NULL, NULL, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(35, 1, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(36, 2, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(37, 3, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(38, 4, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(39, 5, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(40, 6, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(41, 7, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(42, 8, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(43, 9, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(44, 10, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(45, 11, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(46, 12, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(47, NULL, 1, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(48, NULL, 2, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(49, NULL, 3, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(50, NULL, 4, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(51, NULL, NULL, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(52, 1, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(53, 2, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(54, 3, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(55, 4, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(56, 5, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(57, 6, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(58, 7, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(59, 8, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(60, 9, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(61, 10, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(62, 11, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(63, 12, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(64, NULL, 1, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(65, NULL, 2, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(66, NULL, 3, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(67, NULL, 4, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(68, NULL, NULL, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(69, 1, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(70, 2, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(71, 3, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(72, 4, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(73, 5, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(74, 6, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(75, 7, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(76, 8, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(77, 9, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(78, 10, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(79, 11, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(80, 12, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(81, NULL, 1, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(82, NULL, 2, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(83, NULL, 3, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(84, NULL, 4, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(85, NULL, NULL, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(86, 1, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(87, 2, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(88, 3, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(89, 4, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(90, 5, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(91, 6, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(92, 7, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(93, 8, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(94, 9, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(95, 10, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(96, 11, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(97, 12, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(98, NULL, 1, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(99, NULL, 2, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(100, NULL, 3, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(101, NULL, 4, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(102, NULL, NULL, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_11_01_141343_create_coquan_table', 1),
(5, '2023_11_01_141346_create_users_table', 1),
(6, '2023_11_01_142242_create_tieuchi_table', 1),
(7, '2023_11_01_142847_create_thang_table', 1),
(8, '2023_11_01_142900_create_quy_table', 1),
(9, '2023_11_01_142909_create_nam_table', 1),
(10, '2023_11_01_142924_create_loaidanhgia_table', 1),
(11, '2023_11_01_143543_create_dotdanhgia_table', 1),
(12, '2023_11_02_084658_create_xac_thuc_email_table', 1),
(13, '2023_11_12_142509_create_danhgia_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nam`
--

CREATE TABLE `nam` (
  `id_nam` bigint(20) UNSIGNED NOT NULL,
  `nam` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nam`
--

INSERT INTO `nam` (`id_nam`, `nam`, `created_at`, `updated_at`) VALUES
(1, 2020, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(2, 2021, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(3, 2022, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(4, 2023, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(5, 2024, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(6, 2025, '2023-11-10 06:47:07', '2023-11-10 06:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quy`
--

CREATE TABLE `quy` (
  `id_quy` bigint(20) UNSIGNED NOT NULL,
  `quy` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quy`
--

INSERT INTO `quy` (`id_quy`, `quy`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(2, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(3, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(4, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `thang`
--

CREATE TABLE `thang` (
  `id_thang` bigint(20) UNSIGNED NOT NULL,
  `thang` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thang`
--

INSERT INTO `thang` (`id_thang`, `thang`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(2, 2, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(3, 3, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(4, 4, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(5, 5, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(6, 6, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(7, 7, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(8, 8, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(9, 9, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(10, 10, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(11, 11, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(12, 12, '2023-11-10 06:47:07', '2023-11-10 06:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `tieuchi`
--

CREATE TABLE `tieuchi` (
  `id_TC` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `diemQuyDinh` int(11) NOT NULL DEFAULT 0,
  `id_CQ` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieuchi`
--

INSERT INTO `tieuchi` (`id_TC`, `ten`, `diemQuyDinh`, `id_CQ`, `created_at`, `updated_at`) VALUES
(1, 'Năng lực', 10, 1, '2023-11-10 06:48:38', '2023-11-10 06:48:38'),
(2, 'Tính Chất', 10, 1, '2023-11-10 06:48:48', '2023-11-10 06:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `id_CQ` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `phone`, `email`, `password`, `role`, `id_CQ`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trần  Duy', '0439788980', 'kk1@gmail.com', '$2y$10$BqT5OsgsIkNYHj8ms9fU0eF3KCByL.8lIRFvErBen6Idh/NmCelo.', 0, 3, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(2, 'Phan Đức Duy', '0814322759', 'xVI@gmail.com', '$2y$10$Sgr/TJ.V7axcbsqtHHYrW.e4MAk.onebwchLwUJeneZqluUz.O.8S', 0, 2, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(3, 'Hồ Kim Hiếu', '0985923302', 'j6V@gmail.com', '$2y$10$/Pg6sDhB0YO/BrsU.blLsO248aE0F7MvSCqLWFyXqDI4Wvg65AYm6', 0, 2, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(4, 'Phạm Thị Hiếu', '0682006032', 'ApO@gmail.com', '$2y$10$PzMkIp6ecQCnpxQXj8LRf.OKY4M0bAG82pq.tYeSZ3ai1QeDG1R9S', 0, 1, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(5, 'Nguyễn Ngọc Vy', '0455434654', 'h6t@gmail.com', '$2y$10$OK8C807OJec/w2uqKtzkcO0RqiILpgS9m4Cn2MxTEJvdFF6CULA4W', 0, 2, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(6, 'Bùi  Mai', '0192647667', 'GJe@gmail.com', '$2y$10$Oc3DbrOaTGVuQoBgYnE2Au9Ie8bTCWi7b5BTbZrNuC0gvu32HF1Ye', 0, 1, NULL, NULL, '2023-11-10 06:47:06', '2023-11-10 06:47:06'),
(7, 'Phạm Ngọc Hiếu', '0165995342', 'LUX@gmail.com', '$2y$10$MoupJJ9SQlv0g5ptGF4Q4e6SqvwNvlFnNQLrXClW4bzezFkn4tGM2', 0, 3, NULL, NULL, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(8, 'Bùi Văn Thuận', '0816138556', '61B@gmail.com', '$2y$10$1WubjxhaC.A9b1qBl/4e0uKvEZjQ8/mcOYdwA1ofvqLHHRY4dYOte', 0, 1, NULL, NULL, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(9, 'Lê Kim Anh', '0442898366', 'dvt@vtu.com', '$2y$10$8gqlz.CxiBPOX17w3BqOq.r2qDOoQjIMHgr0ZMqo7oiDa.rD83VGC', 1, 1, NULL, NULL, '2023-11-10 06:47:07', '2023-11-10 06:47:07'),
(10, 'Phạm  Mai', '0206524039', 'trunghieu1042003@gmail.com', '$2y$10$C6UnSH7A2.Hi5QvDI2784eWUYWO6ogsfSW4yiViy4aR2zc.C3oKbi', 0, 1, NULL, NULL, '2023-11-10 06:47:07', '2023-11-10 06:47:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coquan`
--
ALTER TABLE `coquan`
  ADD PRIMARY KEY (`id_CQ`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_DG`),
  ADD KEY `danhgia_id_tc_foreign` (`id_TC`),
  ADD KEY `danhgia_id_ddg_foreign` (`id_DDG`);

--
-- Indexes for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  ADD PRIMARY KEY (`id_DDG`),
  ADD KEY `dotdanhgia_id_cq_foreign` (`id_CQ`),
  ADD KEY `dotdanhgia_id_nd_foreign` (`id_ND`),
  ADD KEY `dotdanhgia_id_ldg_foreign` (`id_LDG`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loaidanhgia`
--
ALTER TABLE `loaidanhgia`
  ADD PRIMARY KEY (`id_LDG`),
  ADD KEY `loaidanhgia_id_thang_foreign` (`id_thang`),
  ADD KEY `loaidanhgia_id_quy_foreign` (`id_quy`),
  ADD KEY `loaidanhgia_id_nam_foreign` (`id_nam`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nam`
--
ALTER TABLE `nam`
  ADD PRIMARY KEY (`id_nam`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quy`
--
ALTER TABLE `quy`
  ADD PRIMARY KEY (`id_quy`);

--
-- Indexes for table `thang`
--
ALTER TABLE `thang`
  ADD PRIMARY KEY (`id_thang`);

--
-- Indexes for table `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`id_TC`),
  ADD KEY `tieuchi_id_cq_foreign` (`id_CQ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_cq_foreign` (`id_CQ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coquan`
--
ALTER TABLE `coquan`
  MODIFY `id_CQ` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_DG` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  MODIFY `id_DDG` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaidanhgia`
--
ALTER TABLE `loaidanhgia`
  MODIFY `id_LDG` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nam`
--
ALTER TABLE `nam`
  MODIFY `id_nam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quy`
--
ALTER TABLE `quy`
  MODIFY `id_quy` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thang`
--
ALTER TABLE `thang`
  MODIFY `id_thang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tieuchi`
--
ALTER TABLE `tieuchi`
  MODIFY `id_TC` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_id_ddg_foreign` FOREIGN KEY (`id_DDG`) REFERENCES `dotdanhgia` (`id_DDG`),
  ADD CONSTRAINT `danhgia_id_tc_foreign` FOREIGN KEY (`id_TC`) REFERENCES `tieuchi` (`id_TC`);

--
-- Constraints for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  ADD CONSTRAINT `dotdanhgia_id_cq_foreign` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`),
  ADD CONSTRAINT `dotdanhgia_id_ldg_foreign` FOREIGN KEY (`id_LDG`) REFERENCES `loaidanhgia` (`id_LDG`),
  ADD CONSTRAINT `dotdanhgia_id_nd_foreign` FOREIGN KEY (`id_ND`) REFERENCES `users` (`id`);

--
-- Constraints for table `loaidanhgia`
--
ALTER TABLE `loaidanhgia`
  ADD CONSTRAINT `loaidanhgia_id_nam_foreign` FOREIGN KEY (`id_nam`) REFERENCES `nam` (`id_nam`),
  ADD CONSTRAINT `loaidanhgia_id_quy_foreign` FOREIGN KEY (`id_quy`) REFERENCES `quy` (`id_quy`),
  ADD CONSTRAINT `loaidanhgia_id_thang_foreign` FOREIGN KEY (`id_thang`) REFERENCES `thang` (`id_thang`);

--
-- Constraints for table `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD CONSTRAINT `tieuchi_id_cq_foreign` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cq_foreign` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
