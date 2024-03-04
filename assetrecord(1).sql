-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 08:52 AM
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
(3, 'test1', 'post-images/20240229041748.png', '2024-02-28 21:17:33', '2024-02-28 21:17:48'),
(4, 'test3', 'post-images/20240304071522.png', '2024-03-04 00:15:05', '2024-03-04 00:15:22');

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
(1, 'mobil', 'toyota', 'P 19B82 AW', '2024-04-05', '2024-04-12', 'ready', '3 bar', 15, '2024-03-03 14:03:51', '2024-03-03 20:13:04'),
(2, 'mobil', 'mitsubishi', 'P 23R45 JJ', '2024-04-18', '2024-04-19', 'ready', '1 bar', 8, '2024-03-03 14:06:02', '2024-03-03 20:15:17'),
(3, 'mobil', 'toyota', 'G 31K90 WE', '2024-03-29', '2024-03-21', 'ready', '5 bar', 45, '2024-03-03 14:07:51', '2024-03-03 21:22:19'),
(4, 'mobil', 'daihatsu', 'P 19Q38 AW', '2024-03-29', '2024-03-28', 'ready', '2 bar', 10, '2024-03-03 21:40:07', '2024-03-03 21:43:18');

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
(1, 'firmanda', 'senabrata2001@gmail.com', NULL, '$2y$12$.wMR7XjHrAzc6rZVLE9.t.oZIE8nW.PTR8UHWlnEdxQN.OLMa0ISe', 'admin', NULL, '2024-02-28 21:11:43', '2024-02-28 21:11:43'),
(2, 'sena', 'firmanda@gmail.com', NULL, '$2y$12$zspres2ewlZIsBVNXTOVLeFfa/h5M4GHe.rq.P9LBAOw0Z.aG.kXK', 'member', NULL, '2024-03-03 17:49:15', '2024-03-03 17:49:15');

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
(6, 1, 3, 'test6', 500000, 'returned', '2024-03-03 21:21:47', '2024-03-03 21:22:19');

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
(4, 6, '5 bar', 45, 23000, 'returned', '2024-03-03 21:22:19', '2024-03-03 21:22:19');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_lendings`
--
ALTER TABLE `vehicle_lendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_returns`
--
ALTER TABLE `vehicle_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
