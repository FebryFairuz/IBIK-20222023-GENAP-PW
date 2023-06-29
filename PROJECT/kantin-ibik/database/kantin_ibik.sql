-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2023 at 05:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin_ibik`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2023_04_07_082231_create_products_table', 1),
(23, '2023_06_28_063709_categories', 1),
(30, '2023_06_29_111322_orders', 2),
(31, '2023_06_29_112301_payments', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `total`, `payment_id`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'TNX019001', 78400.00, 1, NULL, 'febrid@ibik.ac.id', '2023-06-29 06:36:56', '2023-06-29 06:36:56'),
(2, 'TNX039002', 39200.00, 1, NULL, 'febrid@ibik.ac.id', '2023-06-29 07:21:01', '2023-06-29 07:21:01'),
(3, 'TNX081003', 117600.00, 3, NULL, 'febrid@ibik.ac.id', '2023-06-29 15:52:10', '2023-06-29 15:52:10'),
(4, 'TNX048004', 39200.00, 2, NULL, 'febrid@ibik.ac.id', '2023-06-29 15:53:07', '2023-06-29 15:53:07'),
(5, 'TNX052005', 39200.00, 1, NULL, 'febrid@ibik.ac.id', '2023-06-29 15:54:23', '2023-06-29 15:54:23'),
(6, 'TNX016006', 84000.00, 1, NULL, 'febrid@ibik.ac.id', '2023-06-29 15:55:47', '2023-06-29 15:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_rel_product`
--

CREATE TABLE `order_rel_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(3) NOT NULL,
  `price` float(8,2) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_rel_product`
--

INSERT INTO `order_rel_product` (`product_id`, `quantity`, `price`, `order_id`, `created_at`, `updated_at`) VALUES
(2, '1', 35000.00, 1, '2023-06-29 06:36:56', '2023-06-29 06:36:56'),
(3, '1', 35000.00, 1, '2023-06-29 06:36:56', '2023-06-29 06:36:56'),
(3, '1', 35000.00, 2, '2023-06-29 07:21:01', '2023-06-29 07:21:01'),
(2, '1', 35000.00, 3, '2023-06-29 15:52:10', '2023-06-29 15:52:10'),
(1, '2', 25000.00, 3, '2023-06-29 15:52:10', '2023-06-29 15:52:10'),
(4, '1', 20000.00, 3, '2023-06-29 15:52:10', '2023-06-29 15:52:10'),
(3, '1', 35000.00, 4, '2023-06-29 15:53:07', '2023-06-29 15:53:07'),
(3, '1', 35000.00, 5, '2023-06-29 15:54:23', '2023-06-29 15:54:23'),
(2, '1', 35000.00, 6, '2023-06-29 15:55:47', '2023-06-29 15:55:47'),
(1, '1', 25000.00, 6, '2023-06-29 15:55:47', '2023-06-29 15:55:47'),
(5, '1', 15000.00, 6, '2023-06-29 15:55:47', '2023-06-29 15:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `is_active`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 1, 'bi-cash', '2023-06-29 11:58:27', '2023-06-29 12:01:19'),
(2, 'Debit', 1, 'bi-credit-card', '2023-06-29 11:58:41', '2023-06-29 12:02:08'),
(3, 'E-Wallet', 1, 'bi-wallet2', '2023-06-29 11:58:47', '2023-06-29 12:01:39');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_active`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Soto Ayam', 'Soto santen dan bening', 25000.00, 1, '1688036091-Soto-Ayam.jpg', '2023-06-29 03:54:51', '2023-06-29 03:54:51'),
(2, 'Ayam Penyet', 'Level 0-3', 35000.00, 1, '1688036145-Ayam-Penyet.jpg', '2023-06-29 03:55:45', '2023-06-29 03:55:45'),
(3, 'Ikan Mas Goreng', 'Goreng atau bakar', 35000.00, 1, '1688036172-Ikan-Mas-Goreng.jpg', '2023-06-29 03:56:12', '2023-06-29 03:56:12'),
(4, 'Sayur Asem', 'Seger sampe ke ubun-ubun', 20000.00, 1, '1688036204-Sayur-Asem.jpg', '2023-06-29 03:56:44', '2023-06-29 03:56:44'),
(5, 'Kecoak Garing', 'Goreng kriuk atau balado', 15000.00, 1, '1688036887-Kecoak-Garing.jpg', '2023-06-29 04:08:07', '2023-06-29 04:08:07');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M Subhan Rizki Afiat', '212310020@student.ibik.ac.id', NULL, '$2y$10$1TyI9JNgs0DzNJR05WbMleCV4kWYJM8sUYCsjT3rhkQbF1qh2wVyu', NULL, NULL, NULL),
(2, 'Febry D Fairuz', 'febrid@ibik.ac.id', NULL, '$2y$10$1TyI9JNgs0DzNJR05WbMleCV4kWYJM8sUYCsjT3rhkQbF1qh2wVyu', NULL, NULL, NULL),
(3, 'Adrian', 'adrian@student.ibik.ac.id', NULL, '123456', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_rel_product`
--
ALTER TABLE `order_rel_product`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `order_rel_product`
--
ALTER TABLE `order_rel_product`
  ADD CONSTRAINT `order_rel_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_rel_product_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
