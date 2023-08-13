-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2023 at 02:55 PM
-- Server version: 8.0.33-0ubuntu0.20.04.4
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` int NOT NULL COMMENT 'user_id=student_id',
  `roll` int DEFAULT NULL,
  `class_id` int NOT NULL,
  `year_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  `shift_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 1, 2, 2, 2, '2023-08-06 01:00:03', '2023-08-06 01:00:03'),
(2, 5, NULL, 1, 2, 1, 1, '2023-08-06 01:11:05', '2023-08-06 01:11:05'),
(3, 6, NULL, 2, 1, 2, 2, '2023-08-06 08:38:31', '2023-08-06 08:38:31'),
(4, 7, NULL, 4, 3, 1, 3, '2023-08-06 08:39:30', '2023-08-06 08:39:30'),
(5, 8, NULL, 4, 1, 2, 2, '2023-08-06 08:40:35', '2023-08-06 08:40:35'),
(6, 9, 3, 3, 4, 1, 2, '2023-08-06 08:41:42', '2023-08-09 23:12:24'),
(7, 10, 4, 3, 4, 4, 1, '2023-08-06 08:43:39', '2023-08-09 23:12:24'),
(8, 11, 1, 1, 1, 1, 3, '2023-08-06 08:44:46', '2023-08-09 23:09:37'),
(9, 12, 2, 1, 1, 3, 2, '2023-08-06 08:45:11', '2023-08-09 23:09:37'),
(10, 13, 5, 3, 4, 1, 3, '2023-08-06 08:45:47', '2023-08-09 23:12:24'),
(11, 14, 8, 4, 4, 1, 2, '2023-08-06 08:58:04', '2023-08-13 05:15:20'),
(12, 12, NULL, 2, 2, 3, 2, '2023-08-08 10:37:42', '2023-08-08 10:37:42'),
(13, 15, NULL, 4, 2, 1, 3, '2023-08-12 23:12:45', '2023-08-12 23:12:45'),
(14, 16, NULL, 4, 3, 4, 3, '2023-08-12 23:21:25', '2023-08-12 23:21:25'),
(15, 17, 8, 4, 4, 4, 3, '2023-08-13 04:59:39', '2023-08-13 05:15:20'),
(16, 18, NULL, 4, 4, 2, 2, '2023-08-13 05:16:55', '2023-08-13 05:16:55'),
(17, 19, NULL, 3, 2, 2, 3, '2023-08-13 21:50:42', '2023-08-13 21:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 100, 60, 100, '2023-08-03 00:38:28', '2023-08-03 00:38:28'),
(6, 2, 2, 100, 60, 100, '2023-08-03 00:38:28', '2023-08-03 00:38:28'),
(7, 2, 3, 100, 60, 100, '2023-08-03 00:38:28', '2023-08-03 00:38:28'),
(8, 2, 5, 100, 60, 100, '2023-08-03 00:38:28', '2023-08-03 00:38:28'),
(9, 3, 1, 100, 60, 100, '2023-08-03 00:40:20', '2023-08-03 00:40:20'),
(10, 3, 2, 100, 60, 100, '2023-08-03 00:40:20', '2023-08-03 00:40:20'),
(11, 3, 3, 100, 60, 100, '2023-08-03 00:40:20', '2023-08-03 00:40:20'),
(12, 3, 5, 100, 60, 100, '2023-08-03 00:40:20', '2023-08-03 00:40:20'),
(13, 3, 6, 100, 60, 100, '2023-08-03 00:40:20', '2023-08-03 00:40:20'),
(14, 4, 1, 100, 60, 100, '2023-08-03 00:41:22', '2023-08-03 00:41:22'),
(15, 4, 2, 100, 60, 100, '2023-08-03 00:41:22', '2023-08-03 00:41:22'),
(20, 1, 1, 100, 70, 100, '2023-08-03 05:19:16', '2023-08-03 05:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Director', '2023-08-03 11:16:02', '2023-08-03 11:16:02'),
(3, 'Subdirector', '2023-08-03 11:16:09', '2023-08-03 11:16:09'),
(4, 'Maestro', '2023-08-03 11:16:16', '2023-08-03 11:16:16'),
(5, 'Asistente de Maestro', '2023-08-03 11:16:44', '2023-08-03 11:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint UNSIGNED NOT NULL,
  `assign_student_id` int NOT NULL,
  `fee_category_id` int DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2023-08-06 01:00:03', '2023-08-06 01:00:03'),
(2, 2, 1, 10, '2023-08-06 01:11:05', '2023-08-06 01:11:05'),
(3, 3, 1, 5, '2023-08-06 08:38:31', '2023-08-06 08:38:31'),
(4, 4, 1, 10, '2023-08-06 08:39:30', '2023-08-06 08:39:30'),
(5, 5, 1, 5, '2023-08-06 08:40:35', '2023-08-06 08:40:35'),
(6, 6, 1, 10, '2023-08-06 08:41:42', '2023-08-06 08:41:42'),
(7, 7, 1, 10, '2023-08-06 08:43:39', '2023-08-06 08:43:39'),
(8, 8, 1, 5, '2023-08-06 08:44:46', '2023-08-06 08:44:46'),
(9, 9, 1, 5, '2023-08-06 08:45:11', '2023-08-06 08:45:11'),
(10, 10, 1, 10, '2023-08-06 08:45:47', '2023-08-06 08:45:47'),
(11, 11, 1, 15, '2023-08-06 08:58:04', '2023-08-06 08:58:04'),
(12, 12, 1, 5, '2023-08-08 10:37:42', '2023-08-08 10:37:42'),
(13, 13, 1, 43, '2023-08-12 23:12:45', '2023-08-12 23:12:45'),
(14, 14, 1, 94, '2023-08-12 23:21:25', '2023-08-12 23:21:25'),
(15, 15, 1, 10, '2023-08-13 04:59:39', '2023-08-13 04:59:39'),
(16, 16, 1, 56, '2023-08-13 05:16:55', '2023-08-13 05:16:55'),
(17, 17, 1, 5, '2023-08-13 21:50:42', '2023-08-13 21:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL COMMENT 'employee_id=User_id',
  `previous_salary` int DEFAULT NULL,
  `present_salary` int DEFAULT NULL,
  `increment_salary` int DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Parcial 1', '2023-08-02 04:40:28', '2023-08-02 04:40:28'),
(3, 'Parcial 2', '2023-08-02 04:56:34', '2023-08-02 04:56:34'),
(4, 'Parcial 3', '2023-08-02 04:56:40', '2023-08-02 04:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Inscripción', '2023-08-01 01:11:00', '2023-08-01 01:11:00'),
(2, 'Mensualidad', '2023-08-01 01:11:43', '2023-08-01 03:17:02'),
(3, 'Examen', '2023-08-01 01:12:31', '2023-08-01 01:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint UNSIGNED NOT NULL,
  `fee_category_id` int NOT NULL,
  `class_id` int NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 900, '2023-08-01 22:31:19', '2023-08-01 22:31:19'),
(6, 3, 2, 850, '2023-08-01 22:31:19', '2023-08-01 22:31:19'),
(7, 2, 1, 450, '2023-08-01 22:32:23', '2023-08-01 22:32:23'),
(8, 2, 3, 450, '2023-08-01 22:32:23', '2023-08-01 22:32:23'),
(22, 1, 1, 1600, '2023-08-10 07:45:41', '2023-08-10 07:45:41'),
(23, 1, 2, 1800, '2023-08-10 07:45:41', '2023-08-10 07:45:41'),
(24, 1, 3, 0, '2023-08-10 07:45:41', '2023-08-10 07:45:41'),
(25, 1, 4, 0, '2023-08-10 07:45:41', '2023-08-10 07:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_28_153636_create_sessions_table', 1),
(7, '2023_07_29_171025_create_student_classes_table', 1),
(8, '2023_07_30_143602_create_student_years_table', 1),
(9, '2023_07_30_230124_create_student_groups_table', 1),
(10, '2023_07_31_161053_create_student_shifts_table', 2),
(11, '2023_07_31_173914_create_fee_categories_table', 3),
(12, '2023_07_31_203212_create_fee_category_amounts_table', 4),
(14, '2023_08_01_211554_create_exam_types_table', 5),
(15, '2023_08_01_220823_create_school_subjects_table', 6),
(16, '2023_08_02_140629_create_assign_subjects_table', 7),
(17, '2023_08_03_034853_create_designations_table', 8),
(18, '2014_10_12_000000_create_users_table', 9),
(19, '2023_08_03_153241_create_assign_students_table', 10),
(20, '2023_08_03_153916_create_discount_students_table', 10),
(21, '2023_08_12_224343_create_employee_salary_logs_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Curso de Matematicas I', '2023-08-02 05:19:55', '2023-08-02 05:19:55'),
(2, 'Curso de Matematicas II', '2023-08-02 05:22:17', '2023-08-02 05:22:17'),
(3, 'Fisica I', '2023-08-02 05:22:27', '2023-08-02 05:22:27'),
(5, 'Español I', '2023-08-03 00:08:45', '2023-08-03 00:08:45'),
(6, 'Musica I', '2023-08-03 00:09:09', '2023-08-03 00:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nfhbixQ15A67jCf1UIiKPOjypO39iFn0r8qjQKX4', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidlpRdlBvZ2o4WnBVSG1Dako5YnhhVlhnc0s0Sno0dHNMQTlsem5UOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vc2Nob29sLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRoWDF5MWouM2xrTzNaUGJuWTl0RGl1T0F0Qi5XNVZMTklGZHpnaXNEaEJ5djU1d1VIVEhDdSI7fQ==', 1691895532),
('TJBV5kWVwdemChgogH9S8puCBuJota14YJ6tQHgN', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVJSU1JIUXYwOURDSmR4aDQyUFI0WU5ReUE2NkxjeVByWnhMRnM4MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9zY2hvb2wudGVzdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGhYMXkxai4zbGtPM1pQYm5ZOXREaXVPQXRCLlc1VkxOSUZkemdpc0RoQnl2NTV3VUhUSEN1Ijt9', 1691938260),
('Y8Uxrfbx2wXA2mWSnnZf8Ahjzz5B6Oo8bRuHYzkc', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYVk1T0tQVXRGQnZwODZzdjlVNVd4YWJYTURZczlpTXZqNURWTXJVaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9zY2hvb2wudGVzdC9zZXR1cHMvZGVzaWduYXRpb24vdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkaFgxeTFqLjNsa08zWlBiblk5dERpdU9BdEIuVzVWTE5JRmR6Z2lzRGhCeXY1NXdVSFRIQ3UiO30=', 1691879982);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class Uno', '2023-07-31 10:01:08', '2023-07-31 10:01:08'),
(2, 'Clase Dos', '2023-07-31 10:02:11', '2023-07-31 10:02:11'),
(3, 'Clase Tres', '2023-07-31 10:02:22', '2023-07-31 10:02:22'),
(4, 'Clase 4', '2023-08-03 00:07:58', '2023-08-03 00:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Artes', '2023-07-31 10:04:02', '2023-07-31 10:06:18'),
(2, 'Matematicas', '2023-07-31 10:04:10', '2023-07-31 10:04:10'),
(3, 'Grupo 3 - Musica', '2023-08-06 08:42:28', '2023-08-06 08:42:28'),
(4, 'Grupo 4 - Enfermeria', '2023-08-06 08:43:04', '2023-08-06 08:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Turno A', '2023-07-31 23:54:10', '2023-07-31 23:54:10'),
(2, 'Turno B', '2023-07-31 23:54:38', '2023-07-31 23:54:38'),
(3, 'Turno C', '2023-07-31 23:54:54', '2023-07-31 23:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2019', '2023-07-31 10:02:34', '2023-07-31 10:02:34'),
(2, '2020', '2023-07-31 10:02:44', '2023-07-31 10:02:44'),
(3, '2021', '2023-07-31 10:02:51', '2023-07-31 10:02:51'),
(4, '2022', '2023-07-31 10:02:56', '2023-07-31 10:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student or Admin or Employee',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Father Name',
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mother Name',
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Religion',
  `id_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ID number',
  `dob` date DEFAULT NULL COMMENT 'Date of Birth',
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Para generar user password',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin: head of software, operator: computer operator, user: employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$hX1y1j.3lkO3ZPbnY9tDiuOAtB.W5VLNIFdzgisDhByv55wUHTHCu', '(664) 123-4566', 'CARR TAMPICO-MANTE KM 10.5 S/N, AEROPUERTO INTERNACIONAL, 89339', 'Male', '20230806164192.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-08-06 23:41:07'),
(3, 'Admin', 'Juan', 'juan@gmail.com', NULL, '$2y$10$tHnAmj5LNmTvSUcAkv1Vye3XlWn80ZDO9.WuV1bvR1IU0WaBWn/Aq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1489', 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-03 23:24:23', '2023-08-03 23:57:09'),
(4, 'Student', 'Gregory Merritt', NULL, NULL, '$2y$10$JY2YbziOPGbIOnHKpzlEEe4eiBDRtaeAO3kNGAXxVzCFQQS.EJrqS', '(678) 090-0999', 'Esse, qui duis facil.', 'Male', '20230805180062.jpg', 'Jameson Harris', 'Justin Humphrey', 'católico', '20200001', '1975-12-15', '7983', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 01:00:03', '2023-08-06 01:00:03'),
(5, 'Student', 'Hamish Mcdowell', NULL, NULL, '$2y$10$tbW/IN3txvr8Nr5rPseVyu48aewaXekQJMeN9Zw4riouUH8adz9FK', '(555) 555-5522', 'Suscipit quia eu inc.', 'Female', '20230808023329.jpg', 'Nerea Sweeney', 'Karly Flowers', 'ateo', '20200005', '1970-01-21', '8006', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 01:11:05', '2023-08-08 09:33:07'),
(6, 'Student', 'Carl Rosales', NULL, NULL, '$2y$10$31knKO.q7yOZkUKyhWdhwOjRi6PWeVcwbSk9L3ebMagPWIBXtC6OO', '(345) 456-6666', 'Provident, voluptate.', 'Male', '20230806013850.jpg', 'Aristotle Head', 'Colette Stephenson', 'ateo', '20190006', '2000-05-08', '3640', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:38:31', '2023-08-06 08:38:31'),
(7, 'Student', 'Todd Savage', NULL, NULL, '$2y$10$Um4ELLme.Mv4bkAZ9hkzeuO2aC/K0v2oNGDFyaRl7tRDW6ZBXU34W', '(664) 789-5666', 'Consequuntur dolorem.', 'Female', '2023080601395.jpg', 'Rama Lopez', 'Jason Schneider', 'ateo', '20210007', '1998-02-26', '7517', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:39:30', '2023-08-06 08:39:30'),
(8, 'Student', 'Montana Carroll', NULL, NULL, '$2y$10$OVH859hTlSvRTwGAsNfzs.nbnFNKRDkMCVvqHDFZpJNVYSTJxvQCK', '(664) 555-4565', 'Voluptatem, ut nemo .', 'Female', '20230806014066.jpg', 'Adrienne Finley', 'Sara Silva', 'católico', '20190008', '2013-04-02', '4872', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:40:35', '2023-08-06 08:40:35'),
(9, 'Student', 'Curran Crane', NULL, NULL, '$2y$10$/UwWu3TovCt1T6ZldHca2e4vdzfJ1Q.9tUoFTE4YlceN2ztKJi25W', '(616) 666-5555', 'Enim dolorem ea aliq.', 'Male', '20230806014128.jpg', 'Dean House', 'Timon Sampson', 'ateo', '20220009', '1991-04-02', '2070', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:41:42', '2023-08-06 08:41:42'),
(10, 'Student', 'Kennedy Nixon', NULL, NULL, '$2y$10$sOTMm3xeQzorvZrPCAqJMOoPmf7p22gimyflugpCB67MSrI2Y8EPK', '(789) 987-8999', 'Esse, laboris ipsam .', 'Female', '20230806014375.jpg', 'Susan Sherman', 'Reed Frye', 'ateo', '20220010', '2002-03-16', '710', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:43:39', '2023-08-06 08:43:39'),
(11, 'Student', 'Dennis Pace', NULL, NULL, '$2y$10$ZxROTNB/49GMfwBpXwGhPOy.hPWi5FihJK5HlWw/TwDFG5aymPqWu', '(456) 666-6666', 'Deleniti consequat. .', 'Female', '20230806014488.jpg', 'Ronan Bullock', 'Kareem Romero', 'ateo', '20190011', '1975-07-22', '3417', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:44:46', '2023-08-06 08:44:46'),
(12, 'Student', 'Dana Wiley', NULL, NULL, '$2y$10$1.tM0h2C0rYv7pg2TzfDQenGiYGNeprLA2PwdwQ0eLxsV7BhLFL1.', '(233) 333-3333', 'Error impedit, aliqu.', 'Female', '20230806014582.jpg', 'Brenden Buckner', 'Michael Gutierrez', 'ateo', '20190012', '1995-12-23', '5458', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:45:11', '2023-08-06 08:45:11'),
(13, 'Student', 'Shaine Walls', NULL, NULL, '$2y$10$O.EGE0Y5pNgpijhQve7w7.lYmDPcKZyuJ7KndWTn7VIcJTvh4mfoK', '(159) 545-6666', 'Dolore commodo ea co.', 'Female', '20230806014584.jpg', 'Scarlet Gray', 'Bevis Mercer', 'cristiano', '20220013', '2021-11-08', '8782', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:45:47', '2023-08-06 08:45:47'),
(14, 'Student', 'Patricia Kramer', NULL, NULL, '$2y$10$ff4MObi82y39hA/9P8iSMuoJRnD0Wq8EDhwMqLg249auEnV6cCODa', '(159) 545-6667', 'Nostrud sint, consec.', 'Female', '20230806015869.jpg', 'Madeline Paul', 'Sierra Meyers', 'católico', '20220014', '2010-10-09', '5825', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:58:04', '2023-08-06 08:58:04'),
(15, 'Student', 'Brianna Hurley', NULL, NULL, '$2y$10$kjioi3a/qO2nsdBmhd4TBu/TND9p7Wcef26VANAhB/oWFe/jlmqqe', '(664) 676-7878', 'Dolor enim tempore, .', 'Female', '20230812161224.jpg', 'Jordan Kelley', 'McKenzie Gonzales', 'católico', '20200015', '2020-03-21', '4023', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-12 23:12:45', '2023-08-12 23:12:45'),
(16, 'Student', 'Erich Holland', 'erich@mailinator.com', NULL, '$2y$10$vn7CBlLF1weNKagUzPxHdOJLaqseLRM5ikNjlaaa32oFsd9yjyEIi', NULL, 'Quisquam quo corrupt.', 'Male', '20230812162194.jpg', 'Audrey Stanley', 'Dorian Newton', 'católico', '20210016', '1990-12-28', '237', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-12 23:21:25', '2023-08-12 23:21:25'),
(17, 'Student', 'Igor Wright', 'igor@mailinator.com', NULL, '$2y$10$I7vrc9Mats.1LaStlBzfb.jr3xisJUxNGyZScvfPM8VmmO8BVJkmq', '(665) 676-7677', 'Facere quis vitae eu', 'Male', '20230812215936.jpg', 'Zenia Maynard', 'Heidi Herrera', 'católico', '20220017', '1970-06-06', '2922', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-13 04:59:39', '2023-08-13 05:14:20'),
(18, 'Student', 'Ignatius Sweeney', 'ignatius@mailinator.com', NULL, '$2y$10$8nMPmDsQFpDh6F8Aiw4BbenkqZDJ4SiLD38.B5zxE4ip96n.PSqtG', '(664) 567-6666', 'Eu aut deleniti quas', 'Male', '20230812221693.jpg', 'Allen Sanford', 'Upton Hanson', 'ateo', '20220018', '1976-09-09', '5323', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-13 05:16:55', '2023-08-13 05:16:55'),
(19, 'Student', 'Judah Velasquez', 'judah@mailinator.com', NULL, '$2y$10$tug25s93aF1f5C/UyclmeeeFTKv6nD1cEQwDIBn5Cy8BbwbBS66aa', NULL, 'Sit officia aut ad q', 'Male', '20230813145015.jpg', 'April Barlow', 'Branden Daugherty', 'católico', '20200019', '1979-04-13', '9638', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-13 21:50:42', '2023-08-13 21:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
