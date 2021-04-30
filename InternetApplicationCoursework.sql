-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2021 at 04:09 PM
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
(1, 'Bella', '2020-10-12', 'She is active and likes to play around a lot. Ideal as a family pet.', 'Bella1_1619634666.jpg', 'Bella2_1619634666.jpeg', 'Daisy3_1619634666.jpg', 'no', 'Cat', 'mammals', '2021-04-28 17:31:06', '2021-04-28 17:47:16'),
(2, 'Alfie', '2020-11-10', 'Playful but calm at times. Really good in adjusting with children.', 'Alfie1_1619634838.jpeg', 'Alfie3_1619634838.jpg', 'noimage.jpg', 'yes', 'Dog', 'mammals', '2021-04-28 17:32:27', '2021-04-28 17:33:58'),
(3, 'Daisy', '2020-11-20', 'Really smart and independent.', 'Daisy1_1619634815.jpg', 'Daisy2_1619634815.png', 'Daisy3_1619634815.jpg', 'yes', 'Cat', 'mammals', '2021-04-28 17:33:35', '2021-04-28 17:33:35'),
(4, 'Duke', '2020-12-19', 'Beautiful colours, pleasing to the eyes. better kept with good lighting.', 'duke1_1619634923.jpg', 'duke2_1619634923.jpg', 'noimage.jpg', 'yes', 'other', 'reptiles', '2021-04-28 17:35:23', '2021-04-28 17:35:23'),
(5, 'Poppy', '2021-01-04', 'Recommended to be kept in a quiet and slow-moving water environment with good lighting and vegetation around.', 'Poppy1_1619635181.jpg', 'poppy2_1619635181.jpg', 'poppy3_1619635181.jpg', 'yes', 'other', 'fish', '2021-04-28 17:39:41', '2021-04-28 17:39:41'),
(6, 'Leo', '2021-01-25', 'Playful and excellent with children.', 'Leo1_1619635262.jpg', 'Leo2_1619635262.jpg', 'Leo3_1619635262.jpg', 'yes', 'Cat', 'mammals', '2021-04-28 17:41:02', '2021-04-28 17:41:02'),
(7, 'Mia', '2021-02-12', 'Calm but loves to have fun, gets along with children.', 'Mia1_1619635309.jpg', 'Mia2_1619635309.jfif', 'Mia3_1619635309.jpg', 'yes', 'Cat', 'mammals', '2021-04-28 17:41:49', '2021-04-28 17:41:49'),
(8, 'Harper', '2021-02-28', 'Intelligent and perfect for families.', 'Harper1_1619635362.jpg', 'Harper2_1619635362.jpg', 'Harper3_1619635362.jpg', 'yes', 'Cat', 'mammals', '2021-04-28 17:42:42', '2021-04-28 17:42:42'),
(9, 'Coco', '2020-06-15', 'A family pet, always active and loves outdoor plays.', 'coco1_1619635464.jpg', 'coco2_1619635464.jpeg', 'coco3_1619635464.jpg', 'yes', 'Dog', 'mammals', '2021-04-28 17:44:24', '2021-04-28 17:44:24'),
(10, 'Ace', '2021-03-01', 'Friendly and playful.', 'Ace1_1619635529.jpg', 'Ace2_1619635529.jfif', 'noimage.jpg', 'yes', 'Dog', 'mammals', '2021-04-28 17:45:29', '2021-04-28 17:45:29');

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
(1, 2, 1, 'User', 'Bella', 'approved', '2021-04-28 17:46:27', '2021-04-28 17:47:16'),
(2, 2, 4, 'User', 'Duke', 'pending', '2021-04-28 17:46:32', '2021-04-28 17:46:32'),
(3, 2, 8, 'User', 'Harper', 'denied', '2021-04-28 17:46:42', '2021-04-28 17:47:20'),
(4, 3, 6, 'monkymonky', 'Leo', 'pending', '2021-04-29 20:54:43', '2021-04-29 20:54:43'),
(5, 3, 2, 'monkymonky', 'Alfie', 'pending', '2021-04-29 20:54:44', '2021-04-29 20:54:44'),
(6, 3, 3, 'monkymonky', 'Daisy', 'pending', '2021-04-29 20:54:45', '2021-04-29 20:54:45'),
(7, 3, 5, 'monkymonky', 'Poppy', 'pending', '2021-04-29 20:54:45', '2021-04-29 20:54:45'),
(8, 3, 7, 'monkymonky', 'Mia', 'pending', '2021-04-29 20:54:47', '2021-04-29 20:54:47'),
(9, 3, 9, 'monkymonky', 'Coco', 'pending', '2021-04-29 20:54:49', '2021-04-29 20:54:49'),
(10, 3, 10, 'monkymonky', 'Ace', 'pending', '2021-04-29 20:54:50', '2021-04-29 20:54:50');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_04_06_123007_create_animals_table', 1),
(25, '2021_04_06_175606_create_animal_requests_table', 1);

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
(1, 'Admin', 'admin@sanctuary.com', NULL, 1, '$2y$10$H5rFYkyx6CvaffMNBNLE8.D7yU55BaKN7Xf.1H8DkSbb.e/iCcMtq', NULL, '2021-04-28 17:29:07', '2021-04-28 17:29:07'),
(2, 'User', 'user@gmail.com', NULL, 0, '$2y$10$CYNKmemdTmAP0NEdmiWCuuI9.yrHmQBIfFig2XexPW9rugHyebdj.', NULL, '2021-04-28 17:46:06', '2021-04-28 17:46:06'),
(3, 'monkymonky', 'monkymonky@monky.ac.uk', NULL, 0, '$2y$10$5TA7.a.U83EqdCN980p74OSelh1ohR6mUVr5Q1ByjmOCEHZreMUj6', NULL, '2021-04-29 20:54:21', '2021-04-29 20:54:21');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_requests_userid_foreign` (`userid`),
  ADD KEY `animal_requests_animalid_foreign` (`animalid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animal_requests`
--
ALTER TABLE `animal_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_requests`
--
ALTER TABLE `animal_requests`
  ADD CONSTRAINT `animal_requests_animalid_foreign` FOREIGN KEY (`animalid`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `animal_requests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
