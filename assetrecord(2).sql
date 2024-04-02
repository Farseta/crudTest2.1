-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 03:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetrecord`
--

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
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2024_02_21_011229_create_transportations_table', 1),
(39, '2024_02_21_011254_create_vehicle_lendings_table', 1),
(40, '2024_02_21_011346_create_vehicle_returns_table', 1),
(41, '2024_02_21_011406_create_other_assets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_assets`
--

CREATE TABLE `other_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `pict` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_assets`
--

INSERT INTO `other_assets` (`id`, `type`, `pict`, `created_at`, `updated_at`) VALUES
(10, 'test data1', 'post-images/20240307023911.pdf', '2024-03-06 19:39:12', '2024-03-06 19:39:12'),
(11, 'test data2', 'post-images/20240318013724.pdf', '2024-03-06 19:42:45', '2024-03-17 18:37:24'),
(12, 'data1', 'post-images/20240318013514.pdf', '2024-03-17 18:35:15', '2024-03-17 18:35:15'),
(13, 'testData2', 'post-images/20240318042102.pdf', '2024-03-17 21:07:39', '2024-03-17 21:21:02'),
(14, 'testData3', 'post-images/20240318042039.pdf', '2024-03-17 21:20:39', '2024-03-17 21:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `tax_date` date NOT NULL,
  `oil_date` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `last_gas` varchar(255) NOT NULL,
  `last_km` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `type`, `brand`, `plate`, `tax_date`, `oil_date`, `status`, `last_gas`, `last_km`, `created_at`, `updated_at`) VALUES
(1, 'mobil', 'toyota', 'P 19B82 AW', '2024-03-20', '2024-04-12', 'ready', '3 bar', 400, '2024-03-03 14:03:51', '2024-03-20 19:35:36'),
(2, 'mobil', 'mitsubishi', 'P 23R45 JJ', '2024-04-18', '2024-03-30', 'ready', '3 Bar', 4000, '2024-03-03 14:06:02', '2024-03-20 20:16:32'),
(3, 'mobil', 'panther', 'G 31K90 WE', '2024-03-29', '2024-03-21', 'ready', '3 bar', 700, '2024-03-03 14:07:51', '2024-03-27 20:13:27'),
(4, 'mobil', 'daihatsu', 'P 19Q38 AW', '2024-03-27', '2024-03-27', 'ready', '2 bar', 10, '2024-03-03 21:40:07', '2024-03-27 19:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'firmanda', 'senabrata2001@gmail.com', '2024-03-28 01:31:08', '$2y$12$.wMR7XjHrAzc6rZVLE9.t.oZIE8nW.PTR8UHWlnEdxQN.OLMa0ISe', 'admin', NULL, '2024-02-28 21:11:43', '2024-02-28 21:11:43'),
(2, 'sena', 'firmanda@gmail.com', NULL, '$2y$12$zspres2ewlZIsBVNXTOVLeFfa/h5M4GHe.rq.P9LBAOw0Z.aG.kXK', 'member', NULL, '2024-03-03 17:49:15', '2024-03-03 17:49:15'),
(3, 'testDummy1', 'testDummy1@gmail.com', NULL, '$2y$12$UKlpPYeCT0PImI8W5u8bde7O10VYbRrKE.UWdY0lzlTOPd2EO.9Xe', 'admin', NULL, '2024-03-17 18:15:39', '2024-03-17 18:15:39'),
(10, 'pengguna1', 'testingpengguna1@gmail.com', '2024-03-19 18:57:59', '$2y$12$0QrdgpvrzZbZPZ6cekmcKehsnDPMtrcKzt7cn6kTyP77FLQ6Q7cy2', 'member', NULL, '2024-03-19 18:57:09', '2024-03-19 18:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_lendings`
--

CREATE TABLE `vehicle_lendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_transportation` bigint(20) UNSIGNED NOT NULL,
  `needs` varchar(255) NOT NULL,
  `gas_money` int(11) NOT NULL,
  `status_lending` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_lendings`
--

INSERT INTO `vehicle_lendings` (`id`, `id_user`, `id_transportation`, `needs`, `gas_money`, `status_lending`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test1', 50000, 'returned', '2024-03-03 15:22:30', '2024-03-03 19:02:16'),
(2, 1, 3, 'test2', 100000, 'returned', '2024-03-03 19:21:20', '2024-03-03 19:21:48'),
(3, 1, 2, 'test3', 250000, 'canceled', '2024-03-03 19:58:11', '2024-03-03 20:02:11'),
(4, 1, 1, 'test4', 2312, 'canceled', '2024-03-03 20:04:48', '2024-03-03 20:07:08'),
(5, 1, 3, 'test5', 250000, 'returned', '2024-03-03 20:12:51', '2024-03-03 20:15:49'),
(6, 1, 3, 'test6', 500000, 'returned', '2024-03-03 21:21:47', '2024-03-03 21:22:19'),
(7, 1, 3, 'test6', 450000, 'returned', '2024-03-04 21:47:28', '2024-03-04 23:19:58'),
(8, 1, 4, 'test7.1', 5000000, 'canceled', '2024-03-06 18:24:57', '2024-03-06 19:10:49'),
(9, 1, 3, 'test8', 4500000, 'canceled', '2024-03-06 19:11:54', '2024-03-06 19:14:45'),
(10, 1, 2, 'test9', 900000, 'canceled', '2024-03-06 19:30:29', '2024-03-06 19:30:37'),
(11, 1, 2, 'test10', 850000, 'canceled', '2024-03-06 19:30:59', '2024-03-06 19:32:20'),
(12, 1, 1, 'test11', 100000, 'returned', '2024-03-06 19:32:33', '2024-03-06 19:32:53'),
(13, 1, 1, 'test13', 1500000, 'canceled', '2024-03-12 17:02:17', '2024-03-12 17:02:26'),
(14, 1, 1, 'testBersama1', 140000, 'canceled', '2024-03-12 17:58:40', '2024-03-12 19:17:57'),
(15, 1, 2, 'testBersama2', 1500000, 'canceled', '2024-03-12 17:59:40', '2024-03-12 19:18:02'),
(16, 1, 2, 'testBersama2', 1500000, 'canceled', '2024-03-12 17:59:41', '2024-03-12 19:18:07'),
(17, 1, 2, 'testBersama2', 1500000, 'canceled', '2024-03-12 17:59:43', '2024-03-12 18:10:20'),
(18, 1, 3, 'testBersama3', 160000, 'canceled', '2024-03-12 18:07:40', '2024-03-12 19:18:12'),
(19, 1, 2, 'testModal', 170000, 'canceled', '2024-03-12 19:19:22', '2024-03-12 19:29:46'),
(20, 1, 3, 'testModal', 190000, 'canceled', '2024-03-12 19:20:54', '2024-03-12 19:29:34'),
(21, 1, 3, 'testModal2', 10989, 'canceled', '2024-03-12 19:21:17', '2024-03-12 19:21:37'),
(22, 1, 1, 'testModal', 2000000, 'canceled', '2024-03-12 19:30:09', '2024-03-12 19:31:50'),
(23, 1, 2, 'testModal', 2100000, 'canceled', '2024-03-12 19:30:47', '2024-03-12 19:31:04'),
(24, 1, 2, 'testModal', 2100000, 'canceled', '2024-03-12 19:30:50', '2024-03-12 19:31:00'),
(25, 1, 1, 'testModal', 180000, 'canceled', '2024-03-12 19:41:49', '2024-03-12 19:44:20'),
(26, 1, 2, 'testModal', 200000, 'canceled', '2024-03-12 19:42:22', '2024-03-12 19:44:24'),
(27, 1, 3, 'testModal', 2100000, 'canceled', '2024-03-12 19:42:53', '2024-03-12 19:44:13'),
(28, 1, 4, 'testModal', 170000, 'canceled', '2024-03-12 19:43:50', '2024-03-12 19:43:59'),
(29, 1, 3, 'testModal', 130000, 'canceled', '2024-03-12 19:49:20', '2024-03-12 19:51:27'),
(30, 1, 2, 'test', 120000, 'canceled', '2024-03-12 19:51:14', '2024-03-12 19:51:31'),
(31, 1, 1, 'testModal', 1930000, 'canceled', '2024-03-12 19:54:56', '2024-03-12 20:07:10'),
(32, 1, 3, 'asd', 132, 'canceled', '2024-03-12 20:04:34', '2024-03-12 20:06:57'),
(33, 1, 1, 'test', 12345, 'canceled', '2024-03-12 20:17:04', '2024-03-12 20:17:52'),
(34, 1, 1, 'tes', 12354, 'canceled', '2024-03-12 20:18:46', '2024-03-12 20:18:57'),
(35, 1, 1, 'tes', 1231213, 'canceled', '2024-03-12 21:24:29', '2024-03-13 18:08:27'),
(36, 1, 2, 'test', 12341, 'canceled', '2024-03-13 18:06:43', '2024-03-13 18:08:32'),
(37, 1, 3, 'test123', 12354, 'canceled', '2024-03-13 18:08:14', '2024-03-13 18:08:35'),
(38, 1, 1, 'test2', 123456, 'canceled', '2024-03-13 18:20:57', '2024-03-13 18:54:10'),
(39, 1, 2, 'test123', 123532, 'canceled', '2024-03-13 18:32:40', '2024-03-13 18:53:59'),
(40, 1, 3, 'testModel', 1234564, 'canceled', '2024-03-13 18:46:02', '2024-03-13 18:46:23'),
(41, 1, 1, 'test123', 123454, 'canceled', '2024-03-13 18:54:29', '2024-03-13 18:56:57'),
(42, 1, 1, 'testModel123', 123456, 'canceled', '2024-03-13 18:57:19', '2024-03-13 18:57:34'),
(43, 1, 1, 'tesstModel', 123456, 'canceled', '2024-03-13 19:04:01', '2024-03-13 19:09:08'),
(44, 1, 1, 'testM1', 123456, 'canceled', '2024-03-13 19:10:30', '2024-03-13 20:36:33'),
(45, 1, 2, 'tesA1', 12345, 'canceled', '2024-03-13 19:11:11', '2024-03-13 20:36:37'),
(46, 1, 3, 'testA2', 123453, 'canceled', '2024-03-13 19:19:50', '2024-03-13 20:36:41'),
(47, 1, 2, 'testModel', 123453, 'canceled', '2024-03-13 20:36:59', '2024-03-13 20:47:59'),
(48, 1, 1, 'test', 12313, 'canceled', '2024-03-13 20:48:22', '2024-03-13 20:48:33'),
(49, 1, 2, 'test2345', 123564, 'canceled', '2024-03-13 20:48:44', '2024-03-13 20:52:12'),
(50, 1, 3, 'test12', 123453, 'returned', '2024-03-13 20:52:25', '2024-03-14 19:49:34'),
(51, 1, 2, 'test123', 1500000, 'canceled', '2024-03-13 21:25:10', '2024-03-13 22:30:21'),
(52, 1, 1, 'test312', 3000000, 'returned', '2024-03-13 22:46:06', '2024-03-14 19:55:21'),
(53, 1, 3, 'testPengembalian1', 6000000, 'returned', '2024-03-14 19:56:02', '2024-03-14 19:56:28'),
(54, 1, 2, 'testPengembalian2', 400000, 'returned', '2024-03-14 19:58:23', '2024-03-14 20:00:03'),
(55, 1, 3, 'testPengembalian2', 5000000, 'returned', '2024-03-14 19:58:48', '2024-03-14 19:59:44'),
(56, 3, 2, 'dumyy1Test1', 75000, 'returned', '2024-03-17 18:16:19', '2024-03-17 18:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_returns`
--

CREATE TABLE `vehicle_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vehicle_lending` bigint(20) UNSIGNED NOT NULL,
  `last_gas` varchar(255) NOT NULL,
  `last_km` int(11) NOT NULL,
  `gas_money` int(11) NOT NULL,
  `lending_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_returns`
--

INSERT INTO `vehicle_returns` (`id`, `id_vehicle_lending`, `last_gas`, `last_km`, `gas_money`, `lending_status`, `created_at`, `updated_at`) VALUES
(1, 1, '3 bar', 15, 20000, 'returned', '2024-03-03 19:02:16', '2024-03-03 19:02:16'),
(2, 2, '4 bar', 20, 10000, 'returned', '2024-03-03 19:22:17', '2024-03-03 19:22:17'),
(3, 5, '2 bar', 30, 200000, 'returned', '2024-03-03 20:15:49', '2024-03-03 20:15:49'),
(4, 6, '5 bar', 45, 23000, 'returned', '2024-03-03 21:22:19', '2024-03-03 21:22:19'),
(5, 7, '4 bar', 100, 20000, 'returned', '2024-03-04 23:19:58', '2024-03-04 23:19:58'),
(6, 12, '5 bar', 100, 10000, 'returned', '2024-03-06 19:32:53', '2024-03-06 19:32:53'),
(7, 13, '5 bar', 100, 1500000, 'canceled', '2024-03-12 17:02:26', '2024-03-12 17:02:26'),
(8, 17, '1 bar', 8, 1500000, 'canceled', '2024-03-12 18:10:20', '2024-03-12 18:10:20'),
(9, 14, '5 bar', 100, 140000, 'canceled', '2024-03-12 19:17:57', '2024-03-12 19:17:57'),
(10, 15, '1 bar', 8, 1500000, 'canceled', '2024-03-12 19:18:02', '2024-03-12 19:18:02'),
(11, 16, '1 bar', 8, 1500000, 'canceled', '2024-03-12 19:18:07', '2024-03-12 19:18:07'),
(12, 18, '4 bar', 100, 160000, 'canceled', '2024-03-12 19:18:12', '2024-03-12 19:18:12'),
(13, 21, '4 bar', 100, 10989, 'canceled', '2024-03-12 19:21:37', '2024-03-12 19:21:37'),
(14, 20, '4 bar', 100, 190000, 'canceled', '2024-03-12 19:29:34', '2024-03-12 19:29:34'),
(15, 19, '1 bar', 8, 170000, 'canceled', '2024-03-12 19:29:46', '2024-03-12 19:29:46'),
(16, 24, '1 bar', 8, 2100000, 'canceled', '2024-03-12 19:31:00', '2024-03-12 19:31:00'),
(17, 23, '1 bar', 8, 2100000, 'canceled', '2024-03-12 19:31:04', '2024-03-12 19:31:04'),
(18, 22, '5 bar', 100, 2000000, 'canceled', '2024-03-12 19:31:50', '2024-03-12 19:31:50'),
(19, 28, '2 bar', 10, 170000, 'canceled', '2024-03-12 19:43:59', '2024-03-12 19:43:59'),
(20, 27, '4 bar', 100, 2100000, 'canceled', '2024-03-12 19:44:13', '2024-03-12 19:44:13'),
(21, 25, '5 bar', 100, 180000, 'canceled', '2024-03-12 19:44:20', '2024-03-12 19:44:20'),
(22, 26, '1 bar', 8, 200000, 'canceled', '2024-03-12 19:44:24', '2024-03-12 19:44:24'),
(23, 29, '4 bar', 100, 130000, 'canceled', '2024-03-12 19:51:27', '2024-03-12 19:51:27'),
(24, 30, '1 bar', 8, 120000, 'canceled', '2024-03-12 19:51:31', '2024-03-12 19:51:31'),
(25, 32, '4 bar', 100, 132, 'canceled', '2024-03-12 20:06:57', '2024-03-12 20:06:57'),
(26, 31, '5 bar', 100, 1930000, 'canceled', '2024-03-12 20:07:10', '2024-03-12 20:07:10'),
(27, 33, '5 bar', 100, 12345, 'canceled', '2024-03-12 20:17:52', '2024-03-12 20:17:52'),
(28, 34, '5 bar', 100, 12354, 'canceled', '2024-03-12 20:18:57', '2024-03-12 20:18:57'),
(29, 35, '5 bar', 100, 1231213, 'canceled', '2024-03-13 18:08:27', '2024-03-13 18:08:27'),
(30, 36, '1 bar', 8, 12341, 'canceled', '2024-03-13 18:08:32', '2024-03-13 18:08:32'),
(31, 37, '4 bar', 100, 12354, 'canceled', '2024-03-13 18:08:35', '2024-03-13 18:08:35'),
(32, 40, '4 bar', 100, 1234564, 'canceled', '2024-03-13 18:46:23', '2024-03-13 18:46:23'),
(33, 39, '1 bar', 8, 123532, 'canceled', '2024-03-13 18:53:59', '2024-03-13 18:53:59'),
(34, 38, '5 bar', 100, 123456, 'canceled', '2024-03-13 18:54:10', '2024-03-13 18:54:10'),
(35, 41, '5 bar', 100, 123454, 'canceled', '2024-03-13 18:56:57', '2024-03-13 18:56:57'),
(36, 42, '5 bar', 100, 123456, 'canceled', '2024-03-13 18:57:34', '2024-03-13 18:57:34'),
(37, 43, '5 bar', 100, 123456, 'canceled', '2024-03-13 19:09:08', '2024-03-13 19:09:08'),
(38, 44, '5 bar', 100, 123456, 'canceled', '2024-03-13 20:36:33', '2024-03-13 20:36:33'),
(39, 45, '1 bar', 8, 12345, 'canceled', '2024-03-13 20:36:37', '2024-03-13 20:36:37'),
(40, 46, '4 bar', 100, 123453, 'canceled', '2024-03-13 20:36:41', '2024-03-13 20:36:41'),
(41, 47, '1 bar', 8, 123453, 'canceled', '2024-03-13 20:47:59', '2024-03-13 20:47:59'),
(42, 48, '5 bar', 100, 12313, 'canceled', '2024-03-13 20:48:33', '2024-03-13 20:48:33'),
(43, 49, '1 bar', 8, 123564, 'canceled', '2024-03-13 20:52:12', '2024-03-13 20:52:12'),
(44, 51, '1 bar', 8, 1500000, 'canceled', '2024-03-13 22:30:21', '2024-03-13 22:30:21'),
(45, 52, '3 bar', 400, 400000, 'returned', '2024-03-14 19:55:21', '2024-03-14 19:55:21'),
(46, 53, '1 bar', 300, 400000, 'returned', '2024-03-14 19:56:28', '2024-03-14 19:56:28'),
(47, 55, '3 bar', 700, 40000, 'returned', '2024-03-14 19:59:44', '2024-03-14 19:59:44'),
(48, 54, '4 bar', 400, 300000, 'returned', '2024-03-14 20:00:03', '2024-03-14 20:00:03'),
(49, 56, '3 Bar', 4000, 40000, 'returned', '2024-03-17 18:17:50', '2024-03-17 18:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_assets`
--
ALTER TABLE `other_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_lendings`
--
ALTER TABLE `vehicle_lendings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_lendings_id_user_foreign` (`id_user`),
  ADD KEY `vehicle_lendings_id_transportation_foreign` (`id_transportation`);

--
-- Indexes for table `vehicle_returns`
--
ALTER TABLE `vehicle_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_returns_id_vehicle_lending_foreign` (`id_vehicle_lending`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `other_assets`
--
ALTER TABLE `other_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_lendings`
--
ALTER TABLE `vehicle_lendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `vehicle_returns`
--
ALTER TABLE `vehicle_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle_lendings`
--
ALTER TABLE `vehicle_lendings`
  ADD CONSTRAINT `vehicle_lendings_id_transportation_foreign` FOREIGN KEY (`id_transportation`) REFERENCES `transportations` (`id`),
  ADD CONSTRAINT `vehicle_lendings_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicle_returns`
--
ALTER TABLE `vehicle_returns`
  ADD CONSTRAINT `vehicle_returns_id_vehicle_lending_foreign` FOREIGN KEY (`id_vehicle_lending`) REFERENCES `vehicle_lendings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
