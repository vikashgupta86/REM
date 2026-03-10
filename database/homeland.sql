-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 06:06 AM
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
-- Database: `homeland`
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
-- Table structure for table `home_types`
--

CREATE TABLE `home_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_types`
--

INSERT INTO `home_types` (`id`, `home_type`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(2, 'Villa', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(3, 'Independent House', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(4, 'Studio Apartment', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(5, 'Penthouse', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(6, 'Duplex', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(7, 'Farmhouse', '2026-02-25 10:24:51', '2026-02-25 10:24:51'),
(8, 'Townhouse', '2026-02-25 10:24:51', '2026-02-25 10:24:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2026_01_23_112539_create_properties_table', 2),
(8, '2026_02_09_070955_create_prop_images_table', 3),
(9, '2026_02_10_061620_create_requests_table', 4),
(10, '2026_02_11_053813_create_save_props_table', 5),
(11, '2026_02_25_102223_create_home_types_table', 6);

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `sq_ft` int(11) NOT NULL,
  `home_type` varchar(255) NOT NULL,
  `year_built` year(4) NOT NULL,
  `city_type` varchar(100) DEFAULT NULL,
  `price_sqft` decimal(10,2) NOT NULL,
  `more_info` text DEFAULT NULL,
  `agent_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `price`, `image`, `location`, `beds`, `baths`, `sq_ft`, `home_type`, `year_built`, `city_type`, `price_sqft`, `more_info`, `agent_name`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Villa', 'Beautiful luxury villa with modern amenities', 10.40, 'hero_bg_2.jpg', 'New Delhi', 4, 3, 2500, 'Villa', '2018', 'Bihar', 5000.00, 'Swimming pool, garden, parking available', 'Rahul Sharma', '2026-01-23 11:49:27', '2026-01-23 11:49:27'),
(2, 'Affordable Apartment', '2BHK apartment suitable for small family', 4500000.00, 'hero_bg_1.jpg', 'Noida', 2, 2, 1200, 'Apartment', '2020', 'UP', 3750.00, 'Near metro station and market', 'Amit Verma', '2026-01-23 11:49:27', '2026-01-23 11:49:27'),
(4, '625 S. Berendo St', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 4500000.00, 'hero_bg_1.jpg', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 2, 2, 1200, 'Apartment', '2020', 'MP', 3750.00, 'Near metro station and market', 'Amit Verma', '2026-01-23 11:49:27', '2026-01-23 11:49:27'),
(5, '871 Crenshaw Blvd', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 450.00, 'hero_bg_2.jpg', ' 1 New York Ave, Warners Bay, NSW 2282', 2, 2, 1200, 'Apartment', '2020', 'UK', 3750.00, 'Near metro station and market', 'Amit Verma', '2026-01-23 11:49:27', '2026-01-23 11:49:27'),
(6, '853 S Lucerne Blvd', ' 625 S. Berendo St Unit 607 Los Angeles, CA 90005', 45000000000.00, 'hero_bg_2.jpg', '  853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005', 2, 2, 1200, 'Apartment', '2020', NULL, 3750.00, 'Near metro station and market', 'Amit Verma', '2026-01-23 11:49:27', '2026-01-23 11:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `prop_images`
--

CREATE TABLE `prop_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prop_images`
--

INSERT INTO `prop_images` (`id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'hero_bg_1.jpg', NULL, NULL),
(2, 1, 'hero_bg_2.jpg', '2026-02-09 07:15:29', '2026-02-09 07:15:29'),
(3, 3, 'hero_bg_3.jpg', '2026-02-09 07:15:29', '2026-02-09 07:15:29'),
(4, 1, 'hero_bg_4.jpg', '2026-02-09 07:17:10', '2026-02-09 07:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `property_id`, `agent_name`, `user_id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:43:22', '2026-02-10 01:43:22'),
(2, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:43:36', '2026-02-10 01:43:36'),
(3, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:43:46', '2026-02-10 01:43:46'),
(4, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:44:14', '2026-02-10 01:44:14'),
(5, 1, 'Rahul Sharma', 1, 'ER', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:49:47', '2026-02-10 01:49:47'),
(6, 1, 'Rahul Sharma', 1, 'ER', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 01:49:56', '2026-02-10 01:49:56'),
(7, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumar201087@gmail.com', '09523919654', '2026-02-10 01:50:44', '2026-02-10 01:50:44'),
(8, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumar201087@gmail.com', '09523919654', '2026-02-10 03:43:06', '2026-02-10 03:43:06'),
(9, 1, 'Rahul Sharma', 1, 'Vikash Kumar', 'vikashkumar201087@gmail.com', '09523919654', '2026-02-10 03:47:37', '2026-02-10 03:47:37'),
(10, 5, 'Amit Verma', 1, 'ER', 'vikashkumarbth381@gmail.com', '07766839606', '2026-02-10 23:46:23', '2026-02-10 23:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `save_props`
--

CREATE TABLE `save_props` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `save_props`
--

INSERT INTO `save_props` (`id`, `property_id`, `user_id`, `title`, `image`, `location`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Luxury Villa', 'hero_bg_2.jpg', 'New Delhi', 10.40, '2026-02-25 01:34:24', '2026-02-25 01:34:24'),
(2, 1, 1, 'Luxury Villa', 'hero_bg_2.jpg', 'New Delhi', 10.40, '2026-02-25 01:34:42', '2026-02-25 01:34:42'),
(3, 1, 1, 'Luxury Villa', 'hero_bg_2.jpg', 'New Delhi', 10.40, '2026-02-25 01:36:03', '2026-02-25 01:36:03');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$ogdKy.G1LLsLE4SPtShS4ufwNmG17PCIRei7L7IlZnwGNVyuOPbJi', NULL, '2026-01-23 00:37:23', '2026-01-23 00:37:23'),
(2, 'Vikash', 'vikashkumar201086@gmail.com', NULL, '$2y$12$Zty.6epy1pku2V7uu0IyJOjEYMSC9HYrJUXCkE9rzMAs02X69BR42', NULL, '2026-01-23 05:42:31', '2026-01-23 05:42:31');

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
-- Indexes for table `home_types`
--
ALTER TABLE `home_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prop_images`
--
ALTER TABLE `prop_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_props`
--
ALTER TABLE `save_props`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_types`
--
ALTER TABLE `home_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prop_images`
--
ALTER TABLE `prop_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `save_props`
--
ALTER TABLE `save_props`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
