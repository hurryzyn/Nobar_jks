-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lads_app
CREATE DATABASE IF NOT EXISTS `lads_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lads_app`;

-- Dumping structure for table lads_app.absens
CREATE TABLE IF NOT EXISTS `absens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `status` enum('not attended','attended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not attended',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absens_booking_id_foreign` (`booking_id`),
  CONSTRAINT `absens_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.absens: ~0 rows (approximately)
DELETE FROM `absens`;
INSERT INTO `absens` (`id`, `booking_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 8, 'not attended', '2025-01-13 09:27:52', '2025-01-13 09:27:52'),
	(2, 8, 'not attended', '2025-01-13 09:28:20', '2025-01-13 09:28:20'),
	(3, 8, 'not attended', '2025-01-13 09:28:26', '2025-01-13 09:28:26'),
	(4, 9, 'attended', '2025-01-13 09:29:40', '2025-01-13 09:32:02');

-- Dumping structure for table lads_app.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `checkout_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `unique_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookings_unique_code_unique` (`unique_code`),
  KEY `bookings_event_id_foreign` (`event_id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  CONSTRAINT `bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.bookings: ~9 rows (approximately)
DELETE FROM `bookings`;
INSERT INTO `bookings` (`id`, `event_id`, `user_id`, `checkout_link`, `external_id`, `quantity`, `unique_code`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 'https://checkout-staging.xendit.co/web/678527296602876c83b6737c', '07b922dc-b70a-4f3c-aed7-846baf0bd9f7', 1, '740884', 'PAID', '2025-01-13 07:45:53', '2025-01-13 07:46:28'),
	(2, 1, 5, 'https://checkout-staging.xendit.co/web/678527b757c966ca1d1c199c', '4e90ab8b-96cf-421b-a9ac-769b00ed561a', 1, '445149', 'PAID', '2025-01-13 07:48:14', '2025-01-13 07:48:29'),
	(3, 1, 5, 'https://checkout-staging.xendit.co/web/6785282257c96644271c1a2e', '930e634d-0f56-4294-b765-753fcff585fe', 1, '406620', 'PAID', '2025-01-13 07:50:01', '2025-01-13 07:50:16'),
	(4, 1, 5, 'https://checkout-staging.xendit.co/web/6785287c57c96614291c1a77', '3ff8551d-5ce1-4407-aaac-0a08f0ec3681', 1, '297005', 'PAID', '2025-01-13 07:51:32', '2025-01-13 07:51:47'),
	(5, 1, 5, 'https://checkout-staging.xendit.co/web/6785298157c9660ea41c1b8c', '0d2ed49f-9748-4d17-89d3-24b29d5a44ff', 1, '667796', 'PAID', '2025-01-13 07:56:02', '2025-01-13 07:56:17'),
	(6, 1, 5, 'https://checkout-staging.xendit.co/web/67852c676602873cdab67921', 'b01d8e6c-404d-4a50-92e3-669b135131af', 1, '482417', 'PAID', '2025-01-13 08:08:23', '2025-01-13 08:08:49'),
	(7, 1, 2, 'https://checkout-staging.xendit.co/web/67853e6d660287b1fab68cd8', 'd700e4dd-9ebe-4005-ba6a-1f6558f8b7cb', 1, '745032', 'PAID', '2025-01-13 09:25:18', '2025-01-13 09:25:33'),
	(8, 1, 2, 'https://checkout-staging.xendit.co/web/67853ef8660287c6a8b68d70', 'b2fefc4d-df6e-40af-bdf0-6757bfd2536c', 1, '641993', 'PAID', '2025-01-13 09:27:37', '2025-01-13 09:27:52'),
	(9, 1, 5, 'https://checkout-staging.xendit.co/web/67853f6157c96670341c342e', '3f04c9a3-0b3c-4698-a06e-bc2b8c6ece50', 1, '134836', 'PAID', '2025-01-13 09:29:22', '2025-01-13 09:29:40');

-- Dumping structure for table lads_app.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.cache: ~0 rows (approximately)
DELETE FROM `cache`;

-- Dumping structure for table lads_app.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table lads_app.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.category: ~0 rows (approximately)
DELETE FROM `category`;

-- Dumping structure for table lads_app.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` timestamp NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.events: ~0 rows (approximately)
DELETE FROM `events`;
INSERT INTO `events` (`id`, `name`, `description`, `date`, `location`, `photo`, `price`, `created_at`, `updated_at`) VALUES
	(1, 'PERSIJADAY', 'AYO NOBAR', '2025-01-18 17:00:00', 'JAKARTA MINGGIR KALI', 'images/lB3eq53ygRzSnAQknuIKPF8jVg24hZoyRYAbgIY6.png', 120000, '2025-01-13 07:45:27', '2025-01-13 07:45:27');

-- Dumping structure for table lads_app.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table lads_app.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table lads_app.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table lads_app.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.migrations: ~7 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(144, '2025_01_07_105113_tickets', 1),
	(159, '0001_01_01_000000_create_users_table', 2),
	(160, '0001_01_01_000001_create_cache_table', 2),
	(161, '0001_01_01_000002_create_jobs_table', 2),
	(162, '2025_01_07_105051_events', 2),
	(163, '2025_01_07_105139_bookings', 2),
	(164, '2025_01_07_155118_absens', 2);

-- Dumping structure for table lads_app.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table lads_app.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.sessions: ~1 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('31sKg526sAtxbbNYt4DyXOF64iYpYpswkUL5rHIe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVBTYWF5aW5QU2V0d09lN3AxdVYwTVZFekVSWTV4cmxkYnJNVWxGUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1736786013),
	('ueTUoAd1Vn72GZqXvJKeFuiauFxGu9eeDSzNOH7w', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDN1bnFVVnJoTmVUM1JTVlpMR1p0aXlLU3luV1Z2Mm56SXJBdWhieiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYnNlbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1736783714);

-- Dumping structure for table lads_app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lads_app.users: ~5 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', '$2y$12$C6bCzAGJIfDtjTNLWXPWLegKczMKQ2.KR.gCKowDRpbJFV3zgZpiS', 'admin', '2025-01-13 05:42:15', '2025-01-13 05:42:15'),
	(2, 'user', 'user@gmail.com', '$2y$12$4q16Rc7zEMNrJvAbza.PteYXq/0bEu52wS.MV5ux0BYmLvuuvXcvC', 'user', '2025-01-13 05:42:15', '2025-01-13 05:42:15'),
	(3, 'test', 'test@gmail.com', '$2y$12$0ovAlQRWJ2oOucoBr1xzXOcKY.Rbnntm/f0mFM3C/vsPr.cOq4pV.', 'user', '2025-01-13 06:17:59', '2025-01-13 06:17:59'),
	(4, 'test1', 'test1@gmail.com', '$2y$12$4pGEc2yPqXRuMMsVUF2tYuVPhi2fmAGu8U41xvYGistAsIxo1.mAq', 'user', '2025-01-13 06:19:05', '2025-01-13 06:19:05'),
	(5, 'harry', 'ahmadharry.muzayin@students.esqbs.ac.id', '$2y$12$CF4tOyXL/oThGcTNOf0SzuTJG5FMjOE5UnpSvqilyWxfjSyqYYupS', 'user', '2025-01-13 07:43:58', '2025-01-13 07:43:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
