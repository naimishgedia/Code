-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 07:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suk_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user', NULL, '2019-02-17 09:00:53', '2019-04-02 07:36:45'),
(2, 'Exam Group', 'group', NULL, '2019-02-17 09:00:53', '2020-04-17 01:40:23'),
(3, 'Section', 'section', NULL, '2019-02-17 09:00:53', '2019-02-17 09:00:53'),
(4, 'Question', 'question', NULL, '2019-02-17 09:00:53', '2019-02-17 09:00:53'),
(5, 'Exam', 'exam', NULL, '2019-02-17 09:00:53', '2019-02-17 09:00:53'),
(6, 'Exam Question', 'exam_question', NULL, '2019-04-06 20:30:00', '2019-04-06 20:30:00'),
(7, 'Student Group', 'student_group', NULL, '2019-04-06 20:30:00', '2019-04-06 20:30:00'),
(8, 'Reports', 'student_reports', NULL, '2020-04-27 13:00:00', '2020-04-30 02:28:41'),
(9, 'Exam Assesment', 'exam_assesment', NULL, NULL, NULL),
(10, 'Proctoring Table View', 'proctoring_table_view', NULL, NULL, NULL),
(11, 'View Student Paper', 'view_student_paper', NULL, NULL, NULL),
(12, 'Proctoring List View', 'proctoring_list_view', NULL, NULL, '2020-07-21 04:14:59'),
(13, 'View Feedback Menu', 'view_feedback_menu', NULL, NULL, NULL),
(14, 'Exam Teacher Group', 'exam_teacher_group', '2020-12-21 03:38:03', '2020-12-21 03:38:05', '2020-12-21 03:38:06'),
(15, 'Exam Assign to Proctor', 'exam_assign_to_proctor', NULL, NULL, NULL),
(16, 'Activity Log Report', 'activity_log_report', NULL, NULL, NULL),
(17, 'Assign Students', 'assiggn_students', NULL, NULL, NULL),
(18, 'Question Paper Preview', 'question_paper_preview', NULL, NULL, NULL),
(19, 'Student Assesment', 'student_assesment', NULL, NULL, NULL),
(20, 'Teacher Question', 'teacher_question', NULL, '2019-02-17 09:00:53', '2019-02-17 09:00:53'),
(21, 'Session Report', 'session_report', NULL, NULL, NULL),
(22, 'Suspect Report', 'suspect_report', NULL, NULL, '2022-07-22 10:07:00'),
(23, 'Center Session Report', 'center_session_report', NULL, NULL, NULL),
(24, 'Center Download Report', 'center_download_report', NULL, NULL, NULL),
(25, 'Allotment Report', 'allotment_report', NULL, NULL, NULL),
(26, 'Pendency Report', 'pendency_report', NULL, NULL, NULL),
(27, 'Answer Key', 'answer_key', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
