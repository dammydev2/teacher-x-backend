ALTER TABLE `users` ADD `created_at` TIMESTAMP NOT NULL AFTER `join_names`, ADD `updated_at` TIMESTAMP NOT NULL AFTER `created_at`;


ALTER TABLE `users` CHANGE `user_id` `user_id` INT NOT NULL AUTO_INCREMENT, CHANGE `phone` `phone` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `lname` `lname` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `fname` `fname` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `pix` `pix` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `subject` `subject` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `country` `country` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `gender` `gender` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `class` `class` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `school` `school` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `quali` `quali` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `website` `website` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `facebook` `facebook` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `twitter` `twitter` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `instagram` `instagram` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `linkedin` `linkedin` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `token` `token` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `join_names` `join_names` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `tempusers` CHANGE `phone` `phone` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `users` ADD `remember_token` VARCHAR(200) NULL AFTER `updated_at`;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2023 at 02:25 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `posts` CHANGE `user_posted_to` `user_posted_to` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `post_likes` `post_likes` INT NULL DEFAULT '0', CHANGE `postpix` `postpix` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `ext` `ext` VARCHAR(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `views` `views` INT NULL;

ALTER TABLE `ordered_course` ADD `created_at` TIMESTAMP NOT NULL AFTER `reference`, ADD `updated_at` TIMESTAMP NOT NULL AFTER `created_at`;

ALTER TABLE `ordered_course` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;