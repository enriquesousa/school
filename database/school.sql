-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2023 at 08:53 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.2.9

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
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `fee_category_id` int DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 6, 2, '2023-08', 428, '2023-08-30 20:51:41', '2023-08-30 20:51:41'),
(5, 1, 3, 11, 1, '2023-08', 1710, '2023-08-30 20:52:14', '2023-08-30 20:52:14');

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
(8, 11, 1, 1, 1, 1, 3, '2023-08-06 08:44:46', '2023-08-30 18:27:36'),
(9, 12, 2, 1, 1, 3, 2, '2023-08-06 08:45:11', '2023-08-30 18:27:36'),
(10, 13, 5, 3, 4, 1, 3, '2023-08-06 08:45:47', '2023-08-09 23:12:24'),
(11, 14, 8, 4, 4, 1, 2, '2023-08-06 08:58:04', '2023-08-13 05:15:20'),
(12, 12, NULL, 2, 2, 3, 2, '2023-08-08 10:37:42', '2023-08-08 10:37:42'),
(13, 15, NULL, 4, 2, 1, 3, '2023-08-12 23:12:45', '2023-08-12 23:12:45'),
(14, 16, NULL, 4, 3, 4, 3, '2023-08-12 23:21:25', '2023-08-12 23:21:25'),
(15, 17, 8, 4, 4, 4, 3, '2023-08-13 04:59:39', '2023-08-13 05:15:20'),
(16, 18, NULL, 4, 4, 2, 2, '2023-08-13 05:16:55', '2023-08-13 05:16:55'),
(17, 19, NULL, 3, 2, 2, 3, '2023-08-13 21:50:42', '2023-08-13 21:50:42'),
(18, 26, 2, 1, 1, 2, 1, '2023-08-25 01:19:20', '2023-08-30 18:27:36'),
(19, 26, NULL, 2, 1, 1, 2, '2023-08-30 18:43:18', '2023-08-30 18:43:18'),
(20, 11, NULL, 3, 1, 1, 3, '2023-08-30 18:45:03', '2023-08-30 18:45:03'),
(21, 12, NULL, 3, 1, 3, 3, '2023-08-30 18:45:54', '2023-08-30 18:45:54'),
(22, 27, NULL, 1, 1, 2, 2, '2023-08-30 18:59:00', '2023-08-30 18:59:00');

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
(14, 14, 1, 15, '2023-08-12 23:21:25', '2023-08-30 18:40:04'),
(15, 15, 1, 10, '2023-08-13 04:59:39', '2023-08-13 04:59:39'),
(16, 16, 1, 56, '2023-08-13 05:16:55', '2023-08-13 05:16:55'),
(17, 17, 1, 5, '2023-08-13 21:50:42', '2023-08-13 21:50:42'),
(18, 18, 1, 5, '2023-08-25 01:19:20', '2023-08-25 01:19:20'),
(19, 19, 1, 5, '2023-08-30 18:43:18', '2023-08-30 18:43:18'),
(20, 20, 1, 5, '2023-08-30 18:45:03', '2023-08-30 18:45:03'),
(21, 21, 1, 5, '2023-08-30 18:45:54', '2023-08-30 18:45:54'),
(22, 22, 1, 15, '2023-08-30 18:59:00', '2023-08-30 18:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(13, 20, '2023-08-22', 'Presente', '2023-08-23 03:42:57', '2023-08-23 03:42:57'),
(14, 21, '2023-08-22', 'Presente', '2023-08-23 03:42:57', '2023-08-23 03:42:57'),
(15, 22, '2023-08-22', 'Presente', '2023-08-23 03:42:58', '2023-08-23 03:42:58'),
(16, 23, '2023-08-22', 'Presente', '2023-08-23 03:42:58', '2023-08-23 03:42:58'),
(17, 24, '2023-08-22', 'Presente', '2023-08-23 03:42:58', '2023-08-23 03:42:58'),
(18, 25, '2023-08-22', 'Presente', '2023-08-23 03:42:58', '2023-08-23 03:42:58'),
(37, 20, '2023-08-21', 'Presente', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(38, 21, '2023-08-21', 'Permiso', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(39, 22, '2023-08-21', 'Presente', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(40, 23, '2023-08-21', 'Ausente', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(41, 24, '2023-08-21', 'Presente', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(42, 25, '2023-08-21', 'Ausente', '2023-08-23 14:58:50', '2023-08-23 14:58:50'),
(43, 20, '2023-08-15', 'Ausente', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(44, 21, '2023-08-15', 'Presente', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(45, 22, '2023-08-15', 'Presente', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(46, 23, '2023-08-15', 'Presente', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(47, 24, '2023-08-15', 'Permiso', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(48, 25, '2023-08-15', 'Presente', '2023-08-23 17:08:52', '2023-08-23 17:08:52'),
(49, 20, '2023-07-12', 'Presente', '2023-08-23 17:22:39', '2023-08-23 17:22:39'),
(50, 21, '2023-07-12', 'Presente', '2023-08-23 17:22:39', '2023-08-23 17:22:39'),
(51, 22, '2023-07-12', 'Presente', '2023-08-23 17:22:39', '2023-08-23 17:22:39'),
(52, 23, '2023-07-12', 'Presente', '2023-08-23 17:22:39', '2023-08-23 17:22:39'),
(53, 24, '2023-07-12', 'Presente', '2023-08-23 17:22:39', '2023-08-23 17:22:39'),
(54, 25, '2023-07-12', 'Ausente', '2023-08-23 17:22:39', '2023-08-23 17:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 21, 3, '2023-08-21', '2023-08-25', '2023-08-20 01:13:54', '2023-08-20 01:13:54'),
(3, 22, 4, '2023-08-21', '2023-08-22', '2023-08-21 17:13:04', '2023-08-21 17:13:04'),
(4, 21, 3, '2023-08-14', '2023-08-15', '2023-08-23 17:11:27', '2023-08-23 17:11:27');

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

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1, 20, 3000, 3000, 0, '2022-12-22', '2023-08-15 23:39:09', '2023-08-15 23:39:09'),
(2, 21, 4500, 4500, 0, '2018-02-16', '2023-08-15 23:43:38', '2023-08-15 23:43:38'),
(3, 20, 3000, 3500, 500, '2023-08-18', '2023-08-18 17:18:45', '2023-08-18 17:18:45'),
(4, 21, 4500, 4750, 250, '2023-08-18', '2023-08-18 18:01:27', '2023-08-18 18:01:27'),
(5, 22, 2500, 2500, 0, '2018-06-03', '2023-08-20 01:21:30', '2023-08-20 01:21:30'),
(6, 23, 3600, 3600, 0, '2011-06-24', '2023-08-22 16:36:21', '2023-08-22 16:36:21'),
(7, 24, 2300, 2300, 0, '1993-01-16', '2023-08-22 16:36:58', '2023-08-22 16:36:58'),
(8, 25, 6000, 6000, 0, '2007-03-23', '2023-08-22 16:37:42', '2023-08-22 16:37:42');

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
(32, 2, 1, 400, '2023-08-30 18:33:14', '2023-08-30 18:33:14'),
(33, 2, 2, 450, '2023-08-30 18:33:14', '2023-08-30 18:33:14'),
(34, 2, 3, 500, '2023-08-30 18:33:14', '2023-08-30 18:33:14'),
(35, 2, 4, 600, '2023-08-30 18:33:14', '2023-08-30 18:33:14'),
(36, 1, 1, 1600, '2023-08-30 18:34:39', '2023-08-30 18:34:39'),
(37, 1, 2, 1700, '2023-08-30 18:34:39', '2023-08-30 18:34:39'),
(38, 1, 3, 1800, '2023-08-30 18:34:39', '2023-08-30 18:34:39'),
(39, 1, 4, 1900, '2023-08-30 18:34:39', '2023-08-30 18:34:39'),
(40, 3, 1, 200, '2023-08-30 18:36:11', '2023-08-30 18:36:11'),
(41, 3, 2, 300, '2023-08-30 18:36:11', '2023-08-30 18:36:11'),
(42, 3, 3, 350, '2023-08-30 18:36:11', '2023-08-30 18:36:11'),
(43, 3, 4, 370, '2023-08-30 18:36:11', '2023-08-30 18:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Problemas Familiares', NULL, NULL),
(2, 'Problema Personal', NULL, NULL),
(3, 'Problemas de Salud', '2023-08-20 01:13:54', '2023-08-20 01:13:54'),
(4, 'Problemas con la Lluvia', '2023-08-21 17:13:04', '2023-08-21 17:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.00', '80', '100', '5.00', '5.00', 'Excelente!', '2023-08-27 15:34:30', '2023-08-27 17:32:40'),
(2, 'A', '4.00', '70', '79', '4.00', '4.99', 'Muy Bien', '2023-08-27 17:40:42', '2023-08-27 17:40:42'),
(3, 'A-', '3.50', '60', '69', '3.50', '3.99', 'Bueno', '2023-08-27 17:41:59', '2023-08-27 17:41:59'),
(4, 'B', '3.00', '50', '59', '3.00', '3.49', 'Regular', '2023-08-27 17:43:35', '2023-08-27 17:47:39'),
(5, 'C', '2.00', '40', '49', '2.00', '2.99', 'Suficiente', '2023-08-27 17:46:27', '2023-08-27 17:46:27'),
(6, 'D', '1.00', '33', '39', '1.00', '1.99', 'Malo', '2023-08-27 17:49:05', '2023-08-27 17:50:07'),
(7, 'F', '0.00', '00', '32', '0.00', '0.99', 'Reprobado', '2023-08-27 17:50:55', '2023-08-27 17:50:55');

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
(21, '2023_08_12_224343_create_employee_salary_logs_table', 11),
(22, '2023_08_19_074541_create_leave_purposes_table', 12),
(23, '2023_08_19_074619_create_employee_leaves_table', 12),
(24, '2023_08_21_212118_create_employee_attendances_table', 13),
(25, '2023_08_23_170520_create_student_marks_table', 14),
(26, '2023_08_26_120341_create_marks_grades_table', 15),
(27, '2023_08_27_172028_create_account_student_fees_table', 16),
(28, '2023_08_30_203643_create_account_employee_salaries_table', 17);

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
('F7FY0wFjZaxAROWNfqq6NeUESdYwbU3YPQLznnyT', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOXBkZm80cmFoTFFkZXM0cnFnRXFyNG9XRzk2bTdqMXNMcjFoZUpTYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9zY2hvb2wudGVzdC9hY2NvdW50cy9lbXBsb3llZS9zYWxhcnkvYWRkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRoWDF5MWouM2xrTzNaUGJuWTl0RGl1T0F0Qi5XNVZMTklGZHpnaXNEaEJ5djU1d1VIVEhDdSI7fQ==', 1693493567),
('g0FCiOluPWebfRRMwzI96pe1d64zgR0kKLWrOyze', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZxd1ZVaVpiaXNhV0c2M3dQVWliYTh3VDhKSTg0YzZVQ0xHTGF3MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9zY2hvb2wudGVzdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1693457076),
('IVuDyV8ffCFJPozlITrUZoB7tJzna731UkJRvoID', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid01NeWJhNWE3d1lFMFZhODFNRThHYjFVV3RpektxSkdKMFlVT1A0cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9zY2hvb2wudGVzdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGhYMXkxai4zbGtPM1pQYm5ZOXREaXVPQXRCLlc1VkxOSUZkemdpc0RoQnl2NTV3VUhUSEN1Ijt9', 1693461229),
('qMBUlFl8SlzKTkAkPYNSSiOmtXWq1c3PXO7O5cf1', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/116.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1NtRHgzZlhIdEJrUFpxaU1NZWk3QndSdXBuQ256SVJVcGh5anc4bCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0ODoiaHR0cDovL3NjaG9vbC50ZXN0L2VtcGxveWVlcy9tb250aGx5L3NhbGFyeS92aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9zY2hvb2wudGVzdC9lbXBsb3llZXMvbW9udGhseS9zYWxhcnkvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1693457076);

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
(4, 'Clase Cuatro', '2023-08-03 00:07:58', '2023-08-30 18:36:26');

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
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` int NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `assign_subject_id` int DEFAULT NULL,
  `exam_type_id` int DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(4, 7, '20210007', 3, 4, 14, 1, 80, '2023-08-25 01:56:33', '2023-08-25 01:56:33'),
(5, 16, '20210016', 3, 4, 14, 1, 75, '2023-08-25 01:56:33', '2023-08-25 01:56:33'),
(6, 11, '20190011', 1, 1, 20, 1, 50, '2023-08-26 18:32:30', '2023-08-26 18:32:30'),
(7, 12, '20190012', 1, 1, 20, 1, 60, '2023-08-26 18:32:30', '2023-08-26 18:32:30'),
(8, 26, '20190020', 1, 1, 20, 1, 70, '2023-08-26 18:32:30', '2023-08-26 18:32:30');

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
(3, 'Admin', 'Juan', 'juan@gmail.com', NULL, '$2y$10$tHnAmj5LNmTvSUcAkv1Vye3XlWn80ZDO9.WuV1bvR1IU0WaBWn/Aq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1489', 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-03 23:24:23', '2023-08-23 23:36:11'),
(4, 'Student', 'Gregory Merritt', NULL, NULL, '$2y$10$JY2YbziOPGbIOnHKpzlEEe4eiBDRtaeAO3kNGAXxVzCFQQS.EJrqS', '(678) 090-0999', 'Esse, qui duis facil.', 'Male', '20230805180062.jpg', 'Jameson Harris', 'Justin Humphrey', 'católico', '20200001', '1975-12-15', '7983', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 01:00:03', '2023-08-06 01:00:03'),
(5, 'Student', 'Hamish Mcdowell', NULL, NULL, '$2y$10$tbW/IN3txvr8Nr5rPseVyu48aewaXekQJMeN9Zw4riouUH8adz9FK', '(555) 555-5522', 'Suscipit quia eu inc.', 'Female', '20230808023329.jpg', 'Nerea Sweeney', 'Karly Flowers', 'ateo', '20200005', '1970-01-21', '8006', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 01:11:05', '2023-08-08 09:33:07'),
(6, 'Student', 'Carl Rosales', NULL, NULL, '$2y$10$31knKO.q7yOZkUKyhWdhwOjRi6PWeVcwbSk9L3ebMagPWIBXtC6OO', '(345) 456-6666', 'Provident, voluptate.', 'Male', '20230806013850.jpg', 'Aristotle Head', 'Colette Stephenson', 'ateo', '20190006', '2000-05-08', '3640', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:38:31', '2023-08-06 08:38:31'),
(7, 'Student', 'Todd Savage', 'erwe@gh.com', NULL, '$2y$10$Um4ELLme.Mv4bkAZ9hkzeuO2aC/K0v2oNGDFyaRl7tRDW6ZBXU34W', '(664) 789-5666', 'Consequuntur dolorem.', 'Female', '2023080601395.jpg', 'Rama Lopez', 'Jason Schneider', 'ateo', '20210007', '1998-02-26', '7517', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-06 08:39:30', '2023-08-30 18:23:46'),
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
(19, 'Student', 'Judah Velasquez', 'judah@mailinator.com', NULL, '$2y$10$tug25s93aF1f5C/UyclmeeeFTKv6nD1cEQwDIBn5Cy8BbwbBS66aa', NULL, 'Sit officia aut ad q', 'Male', '20230813145015.jpg', 'April Barlow', 'Branden Daugherty', 'católico', '20200019', '1979-04-13', '9638', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-13 21:50:42', '2023-08-13 21:50:42'),
(20, 'Employee', 'Oralia Cooke', 'tyfedin@mailinator.com', NULL, '$2y$10$ihlgrkLv56CZo/66xiZRbuHEBzo.gON3aDWcBUPBoVRWT9DCrhofS', '(664) 456-5456', 'Vel id do quasi acc', 'Female', '202308162333yangyi-shi-ee-student-2-compressed-Cropped-293x228.jpg', 'Jose Laurel Jackson', 'Maria Anne Roberson', 'ateo', '2022120001', '2008-01-25', '3590', NULL, '2022-12-22', 4, 3500, 1, NULL, NULL, NULL, '2023-08-15 23:39:09', '2023-08-18 17:18:45'),
(21, 'Employee', 'Austin Santana', 'livyjelu@mailinator.com', NULL, '$2y$10$KgkTq/uhsGayTjQaVxPTle75mHm95h86hoy1wHTiIFnnsMtH5G9Nm', '(661) 789-8789', 'In sit placeat mol', 'Male', '202308151643student-profile-javon-nathaniel.jpg', 'Macaulay Jacobson', 'Angela Morales', 'ateo', '2018020021', '1987-02-28', '1613', NULL, '2018-02-16', 5, 4750, 1, NULL, NULL, NULL, '2023-08-15 23:43:38', '2023-08-18 18:01:27'),
(22, 'Employee', 'Rebecca Pace', 'rebeca_li@mailinator.com', NULL, '$2y$10$pl7..u.yFNwTgw9QZ8ob0ON7d7doke50ktRqFF9yTKXhB4ZTH04Em', '(664) 565-4566', 'Sit aut iste dolorem', 'Female', '202308191821student-profile.jpg', 'Virginia Daniels', 'Zeph Mccray', 'católico', '2018060022', '2006-04-10', '7997', NULL, '2018-06-03', 5, 2500, 1, NULL, NULL, NULL, '2023-08-20 01:21:30', '2023-08-20 01:21:30'),
(23, 'Employee', 'Yuli Stout', 'mekezigyt@mailinator.com', NULL, '$2y$10$slRSfp9TPtmXzB/MOWTvZ.yX4aZq5NCtDoFC2Jf3tS5a7Z1pKNwZ6', '(664) 888-9889', 'Sed explicabo Illo', 'Male', '202308220936patrick2.jpg', 'Pascale Castro', 'Raphael Newton', 'cristiano', '2011060023', '1994-10-27', '543', NULL, '2011-06-24', 3, 3600, 1, NULL, NULL, NULL, '2023-08-22 16:36:21', '2023-08-22 16:36:21'),
(24, 'Employee', 'Susan Raymond', 'hijybyxuh@mailinator.com', NULL, '$2y$10$18KHvJQny.Of81zAXjjTAOwbZG1e8Nn4ymxmIKOXt5E/a4sAErbZ2', '(664) 565-4568', 'Non sunt et sed ad', 'Female', '202308220936Zoe-Colman-original-1.jpg', 'Melyssa Poole', 'Jocelyn Ramsey', 'ateo', '1993010024', '1979-04-02', '7501', NULL, '1993-01-16', 5, 2300, 1, NULL, NULL, NULL, '2023-08-22 16:36:58', '2023-08-22 16:36:58'),
(25, 'Employee', 'Troy Wells', 'cesehydizu@mailinator.com', NULL, '$2y$10$FKbO6ui2FgJt8sNzqdNUle0QJW74QUburVMpGwNgyb67iCgYWDDgS', '(664) 456-7899', 'Sunt dignissimos cup', 'Male', '202308220937Koos-Tamminga.jpg', 'Karleigh Eaton', 'Maggy Camacho', 'cristiano', '2007030025', '1991-06-20', '5757', NULL, '2007-03-23', 2, 6000, 1, NULL, NULL, NULL, '2023-08-22 16:37:42', '2023-08-22 16:37:42'),
(26, 'Student', 'Allistair Barnett', 'xovety@mailinator.com', NULL, '$2y$10$e2tq0qNMz3YwF5l/ouljBO3tbYpr2KznOYGpu7yNxCCMAAEz5CFhK', '(664) 789-4566', 'Facilis duis do cons', 'Male', '2023082418197837_Profile-2.rev.1572210489.jpg', 'Steel Foreman', 'Jescie Frederick', 'cristiano', '20190020', '2003-04-22', '2472', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-25 01:19:20', '2023-08-25 01:19:20'),
(27, 'Student', 'Carlos Galloway', 'gyquliwuvy@mailinator.com', NULL, '$2y$10$V2OCcjXT8dE6W8tuKtE1leSlHgkQ35WGDDSrX6vOT2.PW.OuNnDjm', '(664) 797-1125', 'Eum quisquam ipsum u', 'Male', '202308301159tobinsouth_vrs_2017-18.jpeg', 'Nevada Watkins', 'Phelan Chandler', 'católico', '20190027', '2006-10-09', '2437', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-08-30 18:59:00', '2023-08-30 18:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
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
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
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
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
