-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2026 at 09:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `school`;
USE `school`;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `years` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `code`, `title`, `years`) VALUES
(2, '0404', 'IT', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `code`, `title`, `unit`) VALUES
(1, 'GE 4126', 'CS ELECTIVE - PHP', 5),
(4, 'GE 4125', 'PE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('admin','staff','teacher','student') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `account_type`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'admin', '$2y$10$bPxVknIoqMqYaNpgSf9zGOjK.UQ.4jeiSOsOhqgQAWLeFYIQ1oST2', 'admin', '2026-02-03 15:26:19', 0, '2026-02-26 17:16:26', 1),
(3, 'user', '$2y$10$oah/yPGf/5TXxpk1hDxn4.Q3uUb9KW/NvrcG7stWVJ62EN1r2LpL.', 'student', '0000-00-00 00:00:00', 1, '2026-02-03 15:35:10', 3),
(4, 'admin2', '$2y$10$6k71DWUmMxTk3.wN0mQYJ.0qQ12CuFBvkAg5Cuez/sJ7mrhHOo2c6', 'admin', '2026-02-03 15:40:54', 1, '2026-02-03 15:40:54', 1),
(5, 'admin3', '$2y$10$mf4n5Rp0d.sqhaaOuTV9JefAWIvQ3X6MrWvMDC809IHqyfFCnZSwa', 'admin', '2026-02-03 15:43:36', 1, '2026-02-03 15:53:33', 1),
(6, 'user1', '$2y$10$iEamjUiHrx.RwMJiO6Bva.yi.PbglGXtPOk6cfznT/aFyFTyye7.u', 'student', '2026-02-03 15:47:15', 1, '0000-00-00 00:00:00', 0),
(7, 'user2', '$2y$10$XlXegLXcrmIOpwPPzgRtG.P3hHs5iPEzyhn28p8UJtpIB79Lgqcpi', 'student', '2026-02-03 08:49:33', 1, '0000-00-00 00:00:00', 0),
(9, 'teacher 1', '$2y$10$Y/Yx8ozH6tPtJPczGk.9kOAwqrVjouWE1bQuQzLMEgXHWLrJ4jxy6', 'teacher', '2026-02-26 16:06:43', 1, '0000-00-00 00:00:00', 0),
(10, 'teacher 2', '$2y$10$P.yPinLIFP5N5kQnm50I9OobcdDW91GBlTwWgTc6nmDJYr6VJB9Ju', 'teacher', '2026-02-26 16:09:28', 1, '2026-02-26 16:18:47', 10),
(12, 'teacher 4', '$2y$10$rXhn1teTGSjNZk7t3jMPrOD4aIHw41x1XG6JEjKtBYz5zG3zjffJK', 'teacher', '2026-02-26 17:02:19', 1, '2026-02-26 17:03:46', 12),
(13, 'teacher1', '$2y$10$OEYJUweR.qG.Paf/G5I69OzJrxZ/uM0T4das32krpkFYRgtE9Ue7S', 'teacher', '2026-02-26 17:14:21', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
