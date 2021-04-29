-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2021 at 04:21 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_190032324_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image1` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `type_of_animal` enum('Dog','Cat','Rabbit','Snake','Salamander','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `species` enum('mammals','fish','birds','reptiles','amphibians','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `date_of_birth`, `description`, `image1`, `image2`, `image3`, `available`, `type_of_animal`, `species`, `created_at`, `updated_at`) VALUES
(1, 'Bella', '2020-10-20', 'She is active and likes to play around a lot. Ideal as a family pet.', 'Bella1_1619455363.jpg', 'Bella2_1619455363.jpeg', 'Bella3_1619455363.jpg', 'no', 'Cat', 'mammals', '2021-04-26 15:42:43', '2021-04-26 16:02:20'),
(3, 'Daisy', '2020-12-28', 'Really smart and independent.', 'Daisy1_1619456253.jpg', 'Daisy2_1619456253.png', 'Daisy3_1619456253.jpg', 'yes', 'Dog', 'mammals', '2021-04-26 15:48:46', '2021-04-26 15:57:33'),
(4, 'Duke', '2020-09-22', 'Beautiful colours, pleasing to the eyes. better kept with good lighting.', 'duke1_1619455772.jpg', 'duke2_1619455772.jpg', 'duke3_1619455772.jfif', 'yes', 'other', 'reptiles', '2021-04-26 15:49:32', '2021-04-26 15:49:32'),
(5, 'Poppy', '2020-06-17', 'Recommended to be kept in a quiet and slow-moving water environment with good lighting and vegetation around.', 'Poppy1_1619455931.jpg', 'poppy2_1619455931.jpg', 'poppy3_1619455931.jpg', 'yes', 'other', 'fish', '2021-04-26 15:52:11', '2021-04-26 15:52:11'),
(6, 'Leo', '2020-05-02', 'Playful and excellent with children', 'Leo1_1619455995.jpg', 'Leo2_1619455995.jpg', 'Leo3_1619455995.jpg', 'yes', 'Cat', 'mammals', '2021-04-26 15:53:15', '2021-04-26 15:53:15'),
(7, 'Mia', '2020-10-20', 'Calm but loves to have fun, gets along with children.', 'Mia1_1619456053.jpg', 'Mia2_1619456053.jfif', 'Mia3_1619456053.jpg', 'yes', 'Cat', 'mammals', '2021-04-26 15:54:13', '2021-04-26 15:54:13'),
(8, 'Harper', '2020-12-13', 'Intelligent and perfect for families', 'Harper1_1619456088.jpg', 'Harper2_1619456088.jpg', 'Harper3_1619456088.jpg', 'yes', 'Cat', 'mammals', '2021-04-26 15:54:48', '2021-04-26 15:54:48'),
(9, 'Coco', '2020-12-28', 'A family pet, always active and loves outdoor plays.', 'coco1_1619456134.jpg', 'coco2_1619456134.jpeg', 'coco3_1619456134.jpg', 'yes', 'Dog', 'mammals', '2021-04-26 15:55:34', '2021-04-26 15:55:34'),
(10, 'Ace', '2021-01-31', 'Friendly and playful.', 'Ace1_1619456173.jpg', 'Ace2_1619456173.jfif', 'Ace3_1619456173.jfif', 'yes', 'Dog', 'mammals', '2021-04-26 15:56:13', '2021-04-26 15:56:13'),
(11, 'Alfie', '2020-12-23', 'Playful but calm at times. Really good in adjusting with children.', 'Alfie1_1619539060.jpeg', 'noimage.jpg', 'noimage.jpg', 'yes', 'Dog', 'mammals', '2021-04-27 14:42:36', '2021-04-27 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `animal_requests`
--

CREATE TABLE `animal_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `animalid` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approved','pending','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_requests`
--

INSERT INTO `animal_requests` (`id`, `userid`, `animalid`, `user_name`, `animal_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'User', 'Bella', 'approved', '2021-04-26 15:58:27', '2021-04-26 16:02:20'),
(2, 2, 6, 'User', 'Leo', 'pending', '2021-04-26 15:58:36', '2021-04-26 15:58:36'),
(3, 2, 9, 'User', 'Coco', 'denied', '2021-04-26 15:58:42', '2021-04-26 16:02:26');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_04_06_123007_create_animals_table', 1),
(20, '2021_04_06_175606_create_animal_requests_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@sanctuary.com', NULL, 1, '$2y$10$Itpn/ABTEfy0RSOhLqcdzeJWTmv6FliDfPJjte3O1Lr.kKcaiIN.m', NULL, '2021-04-26 14:57:27', '2021-04-26 14:57:27'),
(2, 'User', 'user@gmail.com', NULL, 0, '$2y$10$pcsqi91Vuv3oA9LCmRghWujYRP1CKLpaYMCUro7wtREodE5iu9qsK', NULL, '2021-04-26 15:58:22', '2021-04-26 15:58:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_requests`
--
ALTER TABLE `animal_requests`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `animal_requests`
--
ALTER TABLE `animal_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
