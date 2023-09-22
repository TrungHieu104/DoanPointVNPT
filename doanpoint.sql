-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 05:00 AM
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
  `id_CQ` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `parent_CQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coquan`
--

INSERT INTO `coquan` (`id_CQ`, `ten`, `diaChi`, `email`, `phone`, `parent_CQ`) VALUES
(1, 'Tỉnh Đoàn BRVT', 'BRVT', 'doan@brvt.com', '0123456789', 0),
(2, 'Thành Đoàn Vũng Tàu', '04 Hoàng Hoa Thám', 'doan@vtu.com', '0123456789', 1),
(3, 'Thi Đoàn Phú Mỹ', 'Phú Mỹ', 'doan@pmu.com', '0123456789', 1),
(4, 'Huyện Đoàn Long Điền', 'Long Điền', 'doan@ldu.com', '0123456789', 1),
(5, 'Huyện Đoàn Xuyên Mộc', 'Xuyên Mộc', 'doan@xmu.com', '0123456789', 1),
(6, 'Huyện Đoàn Đất Đỏ', 'Đất Đỏ', 'doan@ddu.com', '0123456789', 1),
(7, 'Huyện Đoàn Châu Đức', 'Châu Đức', 'doan@cdu.com', '0123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id_DG` int(11) NOT NULL,
  `id_TC` int(11) NOT NULL,
  `diem` int(2) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `ghiChu` text DEFAULT NULL,
  `id_DDG` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id_DG`, `id_TC`, `diem`, `link`, `ghiChu`, `id_DDG`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'abc', '123', 1, NULL, NULL),
(4, 1, 12, 'abc', NULL, 8, '2023-09-20 01:11:58', '2023-09-21 19:58:54'),
(5, 2, 2, NULL, NULL, 8, '2023-09-20 01:11:58', '2023-09-20 01:11:58'),
(13, 3, 34, NULL, NULL, 15, '2023-09-20 02:06:35', '2023-09-20 02:06:35'),
(37, 1, 2, NULL, NULL, 5, '2023-09-21 19:12:45', '2023-09-21 19:13:03'),
(38, 2, 2, NULL, NULL, 5, '2023-09-21 19:12:45', '2023-09-21 19:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `dotdanhgia`
--

CREATE TABLE `dotdanhgia` (
  `id_DDG` int(11) NOT NULL,
  `tenDot` varchar(100) NOT NULL,
  `trangThai` tinyint(1) NOT NULL DEFAULT 0,
  `ghiChu` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_CQ` int(11) NOT NULL,
  `id_ND` int(11) UNSIGNED NOT NULL,
  `id_LDG` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dotdanhgia`
--

INSERT INTO `dotdanhgia` (`id_DDG`, `tenDot`, `trangThai`, `ghiChu`, `date`, `id_CQ`, `id_ND`, `id_LDG`, `created_at`, `updated_at`) VALUES
(1, 'Đánh giá chất lượng Đoàn viên theo tháng', 1, '', '2023-09-20 02:16:09', 2, 9, 9, NULL, NULL),
(2, 'Đánh giá chất lượng Đoàn viên theo tháng', 0, '', '2023-09-19 08:20:42', 2, 9, 1, NULL, NULL),
(4, 'Đánh giá chất lượng Đoàn viên theo tháng', 0, '', '2023-09-19 08:20:46', 3, 3, 9, NULL, NULL),
(5, 'Đánh giá theo Qúy 4', 1, 'Cần cập nhật thêm điểm', '2023-09-22 02:13:03', 4, 10, 9, '2023-09-19 02:52:35', '2023-09-21 19:13:03'),
(8, 'Đánh giá theo tháng 11', 1, NULL, '2023-09-22 02:58:54', 4, 10, 9, '2023-09-20 01:11:58', '2023-09-21 19:58:54'),
(15, 'Đánh giá theo tháng 11', 1, NULL, '2023-09-20 09:06:35', 2, 8, 9, '2023-09-20 02:06:35', '2023-09-20 02:06:35');

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
  `id_LDG` int(11) NOT NULL,
  `thang` varchar(2) NOT NULL,
  `quy` varchar(2) NOT NULL,
  `nam` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loaidanhgia`
--

INSERT INTO `loaidanhgia` (`id_LDG`, `thang`, `quy`, `nam`) VALUES
(1, '1', '1', '2023'),
(2, '2', '1', '2023'),
(3, '3', '1', '2023'),
(4, '4', '2', '2023'),
(5, '5', '2', '2023'),
(6, '6', '2', '2023'),
(7, '7', '3', '2023'),
(8, '8', '3', '2023'),
(9, '9', '3', '2023'),
(10, '10', '4', '2023'),
(11, '11', '4', '2023'),
(12, '12', '4', '2023');

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
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_09_12_120216_create_users_table', 1),
(20, '2023_09_19_094535_update_dotdanhgia_table', 2),
(21, '2023_09_20_080613_update_danhgia_table', 3);

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
-- Table structure for table `tieuchi`
--

CREATE TABLE `tieuchi` (
  `id_TC` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `diemQuyDinh` int(3) NOT NULL,
  `id_CQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tieuchi`
--

INSERT INTO `tieuchi` (`id_TC`, `ten`, `diemQuyDinh`, `id_CQ`) VALUES
(1, 'Thái độ làm việc', 10, 4),
(2, 'Trình độ chuyên môn', 100, 4),
(3, 'Kinh nghiệm làm việc', 10, 2),
(4, 'Điểm tích cực', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_CQ` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `phone`, `email`, `password`, `id_CQ`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Mai', '7497536315', '0Qp@gmail.com', '$2y$10$wgvNSg1giEQoYkRirF8hL.K4SjsxHaEs9odtj4lN2q5NMRAdvOY/C', 3, 0, NULL, NULL, NULL),
(2, 'Nguyễn Kim Duy', '5003314440', 'aSl@gmail.com', '$2y$10$xsW6eT6vYP6W98/yKQMrVeAUeOizMZOmL02TWxhfo/iJhLKcX8OL.', 7, 0, NULL, NULL, NULL),
(3, 'Hồ Thị Mai', '2107577635', 'roU@gmail.com', '$2y$10$mN5D1wpUehwPwZVHZTTMv.sgDVl9m/XlSd3/5.jG3g0n0OG3qdhSa', 4, 0, NULL, NULL, NULL),
(4, 'Phan Đức Anh', '9975234712', 'XRX@gmail.com', '$2y$10$fX1J4Mqk7ekR5Gz8vsrj3OGslYhhPTXqQmKPXcQvaMV9ct9RKujZq', 5, 0, NULL, NULL, NULL),
(5, 'Hồ Kim Quân', '4205368461', '2VS@gmail.com', '$2y$10$XHB733b4/XK2ciSKNOpJuOhKYnK8RGha81h6kuknoQTD3esUfT3/.', 3, 0, NULL, NULL, NULL),
(6, 'Bùi  Anh', '5691480668', 'Oym@gmail.com', '$2y$10$V4bnubUlKgdyw8CgdIoCyOetbABPGgtUvQnf2ii4U65VzD20iUGpy', 7, 0, NULL, NULL, NULL),
(7, 'Phan  Thuận', '6264805360', 'nm@gmail.com', '$2y$10$.CD6KPe0nrQVut2xexw/X.HRwfM.F0ZkK3aAfhf9n7RzCg33Zog1y', 3, 0, NULL, NULL, NULL),
(8, 'Lê Ngọc Anh', '5818869743', 'Mno@gmail.com', '$2y$10$VZnG5OweCrGzbIF0Su6EdeIfD8C6bY2XtqoGAo4pVJcSg2FxIFcXW', 2, 0, NULL, NULL, NULL),
(9, 'Bùi Văn Mai', '1328796123', 'dvt@vtu.com', '$2y$10$1zTJUfXzL6.mFCMSBgvyZOIOOEAUzgiFr0R.p1NyzSQty.B3SkXLO', 4, 1, NULL, NULL, NULL),
(10, 'Hồ Văn Vy', '6908228068', 'nvt@vtu.com', '$2y$10$FG93ic1VFnjEAHGHqAY0HuEPeAoSAYrrrjn7TOSYwukmhZ6igVRw2', 4, 0, NULL, NULL, NULL);

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
  ADD KEY `id_TC` (`id_TC`),
  ADD KEY `id_DDG` (`id_DDG`);

--
-- Indexes for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  ADD PRIMARY KEY (`id_DDG`),
  ADD KEY `id_CQ` (`id_CQ`),
  ADD KEY `id_ND` (`id_ND`),
  ADD KEY `id_LDG` (`id_LDG`);

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
  ADD PRIMARY KEY (`id_LDG`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`id_TC`),
  ADD KEY `id_CQ` (`id_CQ`);

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
  MODIFY `id_CQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_DG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  MODIFY `id_DDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaidanhgia`
--
ALTER TABLE `loaidanhgia`
  MODIFY `id_LDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tieuchi`
--
ALTER TABLE `tieuchi`
  MODIFY `id_TC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_TC`) REFERENCES `tieuchi` (`id_TC`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_DDG`) REFERENCES `dotdanhgia` (`id_DDG`);

--
-- Constraints for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  ADD CONSTRAINT `dotdanhgia_ibfk_1` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`),
  ADD CONSTRAINT `dotdanhgia_ibfk_2` FOREIGN KEY (`id_LDG`) REFERENCES `loaidanhgia` (`id_LDG`);

--
-- Constraints for table `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD CONSTRAINT `tieuchi_ibfk_1` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cq_foreign` FOREIGN KEY (`id_CQ`) REFERENCES `coquan` (`id_CQ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
