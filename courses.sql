-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2026 at 04:42 PM
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
-- Database: `laravel_student_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `level` enum('Beginner','Intermediate','Advance') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `level`, `price`, `original_price`, `category_id`, `thumbnail`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'The Ultimate Content Creator Bootcamp - All Secrets Revealed', 'Learn how to become a successful content creator from scratch with The Ultimate Content Creator Bootcamp. This complete Hindi course covers everything from choosing your niche and creating your first channel to scripting, recording, editing, thumbnails, AI-powered workflows, publishing, copyright, and monetization.', 'Beginner', 30.00, 50.00, 2, 'thumbnail/VSXhoIuXRKcZiPQJEuTaQwyS1PnCFfpk8k78witW.png', '2026-11-24 03:05:25', '2026-11-24 03:05:25', 'the-ultimate-content-creator-bootcamp-all-secrets-revealed'),
(2, 'Ultimate Job-Ready AI-Powered Data Analytics Course', 'This is a to-the-point, CodeWithHarry style AI-Powered Data Analytics course! This all-in-one Ultimate Job-Ready AI-Powered Data Analytics Course is designed for beginners and intermediate learners who want to master modern data analytics, leverage AI tools, and become industry-ready with hands-on practical projects.', 'Beginner', 26.00, 40.00, 1, 'thumbnail/V5W5xxpN47cQgrZhlE6SBYV9DWIK3yoZz8QcmB17.png', '2026-11-24 03:06:17', '2026-11-24 03:06:17', 'ultimate-job-ready-ai-powered-data-analytics-course'),
(3, 'The Ultimate Job Ready Data Science Course', 'This is a to-the-point, CodeWithHarry style Data Science course! This all-in-one Job-Ready Data Science Course is designed for beginners and intermediate learners who want to master data science skills and become industry-ready with hands-on experience.', 'Beginner', 29.00, 45.00, 1, 'thumbnail/JHOrULI12jbMXM0nt1jsnK2iz6J228pmPvG2RUqA.png', '2026-11-24 03:06:57', '2026-11-24 03:06:57', 'the-ultimate-job-ready-data-science-course'),
(4, 'C Programming For Beginners - Learn C Language from Scratch', 'This is a beginner friendly C language course with a solid PDF Handbook and thorough explanations for absolute beginners', 'Beginner', 4.00, 20.00, 5, 'thumbnail/roEc8o2uiGNw5KZVHGmnFb5paKBuiMIk7mWnnrWO.jpg', '2026-11-24 03:07:32', '2026-11-24 03:07:32', 'c-programming-for-beginners-learn-c-language-from-scratch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
