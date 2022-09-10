-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(7, 'iphone OK', '2022-08-31 03:15:24', '2022-08-31 06:21:54'),
(8, 'iphoneoi jkjkkj', '2022-08-31 03:15:30', '2022-08-31 06:25:29'),
(18, '90', '2022-08-31 05:46:46', '2022-08-31 05:46:46'),
(20, 'HP', '2022-08-31 05:51:49', '2022-08-31 05:51:49'),
(21, 'ASUS', '2022-08-31 05:51:55', '2022-08-31 05:51:55'),
(22, 'Dean Boyle', '2022-08-31 05:52:02', '2022-08-31 05:52:02'),
(23, 'Lillian Manning', '2022-08-31 05:52:09', '2022-08-31 05:52:09'),
(24, 'ASUS', '2022-08-31 05:52:15', '2022-08-31 05:52:15'),
(26, 'ASUS ok', '2022-08-31 06:02:36', '2022-08-31 06:02:36'),
(28, 'ASUS ASFD', '2022-08-31 06:12:11', '2022-08-31 06:12:11'),
(29, 'iphone OK', '2022-08-31 06:13:27', '2022-08-31 06:13:27'),
(30, 'NB', '2022-08-31 06:14:02', '2022-08-31 06:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'logo.png',
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'favlogo.png',
  `mobile_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'mobilelogo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_phone`, `company_address`, `company_logo`, `company_email`, `company_favicon`, `mobile_logo`, `created_at`, `updated_at`) VALUES
(1, 'bitBirds', '01714350207', 'Dhaka,Bangladesh', 'logo.png', 'bitbirds@gmail.com', '1.jpeg', '1.png', NULL, '2022-09-06 06:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_30_082224_create_companies_table', 2),
(6, '2022_08_31_040441_create_brands_table', 3),
(7, '2022_09_01_033005_create_product_features_table', 4),
(8, '2022_09_06_064323_create_suppliers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yarn_type` tinyint(1) DEFAULT 0,
  `brand` tinyint(1) DEFAULT 0,
  `matiral_type` tinyint(1) DEFAULT 0,
  `color` tinyint(1) DEFAULT 0,
  `color_name` tinyint(1) DEFAULT NULL,
  `color_code` tinyint(1) DEFAULT NULL,
  `unit_type` tinyint(1) DEFAULT 0,
  `weight` tinyint(1) DEFAULT 0,
  `weight_kg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `weight_pound` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cartoon` tinyint(1) DEFAULT 0,
  `cartoon_small` int(11) DEFAULT 0,
  `cartoon_qty_small` int(11) DEFAULT NULL,
  `cartoon_medium` tinyint(1) DEFAULT 0,
  `cartoon_medium_qty` int(11) DEFAULT NULL,
  `cartoon_large` tinyint(1) DEFAULT 0,
  `cartoon_large_qty` int(11) DEFAULT NULL,
  `cartoon_exrta_large` tinyint(1) DEFAULT 0,
  `cartoon_extar_large_qty` int(11) DEFAULT NULL,
  `cartoon_exrta_xxl` tinyint(1) DEFAULT 0,
  `cartoon_extar_large_xxl_qty` int(11) DEFAULT NULL,
  `dozon` tinyint(1) DEFAULT 0,
  `dozon_qty` int(11) DEFAULT NULL,
  `box` tinyint(1) DEFAULT 0,
  `box_qty` int(11) DEFAULT NULL,
  `pices` tinyint(1) DEFAULT 0,
  `pices_qty` int(11) DEFAULT NULL,
  `roll` tinyint(1) DEFAULT 0,
  `roll_qty` int(11) DEFAULT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_name`, `category`, `description`, `yarn_type`, `brand`, `matiral_type`, `color`, `color_name`, `color_code`, `unit_type`, `weight`, `weight_kg`, `weight_pound`, `cartoon`, `cartoon_small`, `cartoon_qty_small`, `cartoon_medium`, `cartoon_medium_qty`, `cartoon_large`, `cartoon_large_qty`, `cartoon_exrta_large`, `cartoon_extar_large_qty`, `cartoon_exrta_xxl`, `cartoon_extar_large_xxl_qty`, `dozon`, `dozon_qty`, `box`, `box_qty`, `pices`, `pices_qty`, `roll`, `roll_qty`, `rate`, `created_at`, `updated_at`) VALUES
(33, 'pencil', 'Accessories', 'chuya', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Button', 'Accessories', 'chuya', 0, 0, 0, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, NULL, NULL, NULL, NULL, '2022-09-04 05:31:35'),
(35, 'Rabar', 'Accessories', 'stock', 0, 0, 0, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 20, NULL, NULL, NULL, NULL, NULL),
(36, 'Suta', 'Accessories', 'stock', 1, 1, 1, 1, NULL, NULL, 1, 1, '1', NULL, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-05 04:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defult.jpg',
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `profile_photo`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'zubair ahmed', '019217978988', 'zubair@pencilbox.edu.bd', 'Dhaka,bangladesh', '2.jpg', 1, NULL, '$2y$10$FeuyM4TJJma3H88AT7aFpeDyXPznLSN2iSY9bStJhldkOCDiE/wWy', NULL, '2022-08-29 09:17:25', '2022-09-05 22:54:27'),
(12, 'Tobias Deleon', '01921797988', 'bijodym@mailinator.com', 'Dhaka,bangladesh', 'defult.jpg', 0, NULL, '$2y$10$LnhHl8tiyNhXLaTFUKClSeQ0VhQ4J2CpNmc6l7TX.jFGIp5t1RCwW', NULL, '2022-08-30 06:31:26', '2022-08-30 07:02:23'),
(13, 'Holmes Burnett', '019217978988', 'lypefi@mailinator.com', 'Dhaka,bangladesh', '13.JPG', 1, NULL, '$2y$10$M3D3/QUMxa73eHH1HNxtAubUKyw4FKYsDqE7WNDjPWUfGYo/UnDUq', NULL, '2022-08-30 06:31:36', '2022-09-05 06:41:49'),
(14, 'Jacob Berry', NULL, 'norakexat@mailinator.com', NULL, '14.JPG', 1, NULL, '$2y$10$3v5uw47g4yxBdiNvv6azCe61uiGyN1lkAnTK9xaQnEAA5dB5LScvO', NULL, '2022-08-30 06:31:43', '2022-09-05 06:29:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
