-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2025 at 10:26 AM
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
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('e-commerce-cache-902ba3cda1883801594b6e1b452790cc53948fda', 'i:1;', 1762159934),
('e-commerce-cache-902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1762159934;', 1762159934),
('e-commerce-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1762105955),
('e-commerce-cache-ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1762105955;', 1762105955);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(12, 'Fruits'),
(13, 'Vegetables'),
(14, 'Bakery'),
(15, 'Dairy'),
(16, 'Beverages'),
(17, 'Frozen Foods'),
(18, 'Snacks'),
(20, 'Rice'),
(23, 'Juices'),
(24, 'Nuts');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_10_30_062011_create_settings_table', 2),
(9, '2025_10_30_101419_create_categories_table', 3),
(10, '2025_11_02_074757_create_products_table', 4),
(11, '2025_11_02_075604_create_product_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sania123@gmail.com', '$2y$12$AmhvjloHtQDYbRgiD7tIceB3uVUc1qsBusdmHGdJ3h6kRtkD61IgO', '2025-11-02 11:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `is_discounted` tinyint(1) NOT NULL DEFAULT 0,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `description`, `slug`, `price`, `discount`, `is_discounted`, `in_stock`, `is_active`, `featured_image`, `created_at`, `updated_at`) VALUES
(27, 12, 'Apples', 'Crunchy and naturally sweet apples full of fiber and nutrients', 'apples', 350.00, 0, 0, 1, 1, '1762340417.jpg', '2025-11-05 06:00:17', '2025-11-05 06:00:17'),
(28, 12, 'Bananas', 'Sweet and soft bananas, a healthy energy boost for any time of day', 'bananas', 150.00, 0, 0, 1, 1, '1762340489.jpg', '2025-11-05 06:01:29', '2025-11-05 06:01:29'),
(29, 12, 'Strawberry', 'Fresh, sweet, and juicy strawberries packed with natural flavor and vitamins.', 'strawberry', 590.00, 3, 0, 1, 1, '1762340704.jpg', '2025-11-05 06:05:04', '2025-11-05 06:05:04'),
(30, 13, 'Tomato', 'Fresh, juicy, and rich in flavor. Perfect for salads, sauces, and everyday cooking.', 'tomato', 230.00, 0, 0, 1, 1, '1762422187.jpg', '2025-11-06 04:43:07', '2025-11-06 04:43:07'),
(31, 13, 'Capsicum', 'Fresh and crisp capsicum with a mild, sweet flavor—perfect for salads, stir-fries, and pizzas.', 'capsicum', 320.00, 5, 1, 1, 1, '1762422254.jpg', '2025-11-06 04:44:14', '2025-11-06 04:50:45'),
(32, 14, 'Croissant', 'Flaky, buttery croissant baked to golden perfection—soft on the inside and crisp on the outside, perfect for breakfast or a light snack.', 'croissant', 700.00, 5, 1, 1, 1, '1762422617.jpg', '2025-11-06 04:50:17', '2025-11-06 04:50:17'),
(33, 15, 'Olper\'s Milk', 'Fresh, pure, and creamy milk rich in calcium and nutrients—perfect for drinking, cooking, or adding to your tea and coffee.', 'olpers-milk', 240.00, 0, 0, 1, 1, '1762422814.png', '2025-11-06 04:53:34', '2025-11-06 04:53:34'),
(34, 13, 'Potatoes', 'Fresh and firm potatoes with smooth skin—ideal for boiling, frying, baking, or adding to your favorite curries.', 'potatoes', 280.00, -11, 0, 1, 1, '1762423063.jpg', '2025-11-06 04:57:43', '2025-11-06 04:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(18, 27, '690b2e412429b.jpg', '2025-11-05 06:00:17', '2025-11-05 06:00:17'),
(19, 27, '690b2e4126072.jpg', '2025-11-05 06:00:17', '2025-11-05 06:00:17'),
(21, 28, '690b2e8985d1a.jpg', '2025-11-05 06:01:29', '2025-11-05 06:01:29'),
(23, 29, '690b2f60c735d.jpg', '2025-11-05 06:05:04', '2025-11-05 06:05:04'),
(25, 29, '690b2f60cae49.jpg', '2025-11-05 06:05:04', '2025-11-05 06:05:04'),
(26, 30, '690c6dab73787.jpg', '2025-11-06 04:43:07', '2025-11-06 04:43:07'),
(27, 30, '690c6dab74fa5.jpg', '2025-11-06 04:43:07', '2025-11-06 04:43:07'),
(28, 31, '690c6dee8406d.jpg', '2025-11-06 04:44:14', '2025-11-06 04:44:14'),
(29, 32, '690c6f591e4f9.jpg', '2025-11-06 04:50:17', '2025-11-06 04:50:17'),
(30, 32, '690c6f5920c24.jpg', '2025-11-06 04:50:17', '2025-11-06 04:50:17'),
(31, 32, '690c6f5922db8.jpg', '2025-11-06 04:50:17', '2025-11-06 04:50:17'),
(32, 33, '690c701e21d78.png', '2025-11-06 04:53:34', '2025-11-06 04:53:34'),
(33, 34, '690c7117515cf.jpg', '2025-11-06 04:57:43', '2025-11-06 04:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IFIdhWPp39nGzLcxzGZALCUb2fdMlDPZJnNUJIUL', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmxRWmNLalNKb09yTG9vNk54OTUyd0Vac21HZ0VkeHlBbUllQnNoMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xdWlja2Jhc2tldC9ob21lIjtzOjU6InJvdXRlIjtzOjEyOiJxdWlja2Jhc2tldC4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2MjUwMTYzNzt9fQ==', 1762515071),
('M0P9YMraqgYRncU5sPLBWbIEqj9sRPGbqJ9mAFcT', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSmlhcFk1am03SXVxdFZMSWpoNXdmWTJvYWljOHgwQVo3YnlNWm5YWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xdWlja2Jhc2tldC9ob21lIjtzOjU6InJvdXRlIjtzOjEyOiJxdWlja2Jhc2tldC4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2MjU5ODM1MTt9fQ==', 1762598402);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'My E-Commerce Site', '2025-10-30 01:26:53', '2025-10-30 01:26:53'),
(2, 'contact_email', 'support@ecommerce.com', '2025-10-30 01:26:53', '2025-10-30 01:26:53');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sania', 'saniyamehmood0506@gmail.com', '2025-10-28 04:29:20', '$2y$12$Fsnpelvu2RiskJxlDx7QGOMAKmsb1QYwuRIkJuJQe6qxKmScz.P06', NULL, '2025-10-27 06:01:24', '2025-10-28 04:29:20'),
(2, 'Saniya Mehmood', 'saniyamehmood@gmail.com', '2025-10-27 06:33:22', '$2y$12$y/MAEvkUIKGxNzrhby/3FOqDO5NNiTlOFhRuXFbuSET.xqITtsB9q', NULL, '2025-10-27 06:32:55', '2025-10-27 06:33:22'),
(4, 'sania12', 'sania123@gmail.com', '2025-10-29 05:42:47', '$2y$12$fSi7zbLoiv/CX6ojNl09bO.Nwv437DEf.37BvS3QQka2UKacD/UCy', NULL, '2025-10-29 00:36:54', '2025-10-29 00:36:54'),
(7, 'saniyamehmood', 'saniya@gmail.com', '2025-11-03 03:51:14', '$2y$12$PTAUpl652FCr2EYAbaF4MOY2KwgWTlxYIAk1rTW17WyVi5TBZqb8u', NULL, '2025-11-03 03:50:30', '2025-11-03 03:51:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
