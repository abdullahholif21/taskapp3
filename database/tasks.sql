-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2025 at 07:59 AM
-- Server version: 8.2.0
-- PHP Version: 8.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Desciption` text COLLATE utf8mb4_general_ci,
  `status` enum('Pending','In Proccess','Completed') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `created_att` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Due_date` date DEFAULT NULL,
  `userid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `Desciption`, `status`, `created_att`, `Due_date`, `userid`) VALUES
(1, 'Create database ', 'Create databse name it Tasks', 'Completed', '2025-03-14 06:31:21', '2025-03-21', 1),
(2, 'Create two table  ', 'Create users and table tasks ', 'Completed', '2025-03-14 06:33:58', '2025-03-21', 1),
(3, 'select data   ', 'select data from table ', 'In Proccess', '2025-03-14 06:33:58', '2025-03-21', 1),
(4, 'select perform crud    ', 'create insert and udpate and delete and truncate', 'Pending', '2025-03-14 06:33:58', '2025-03-21', 1),
(5, 'test', 'test', 'Pending', '2025-03-14 06:45:44', '2025-01-05', 1),
(6, 'tijaabo', 'Test', 'Pending', '2025-03-14 08:10:46', '2025-03-14', 1),
(7, 'New Task Title', 'New Task Description', 'Pending', '2025-03-14 08:14:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_att` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `PASSWORD`, `created_att`) VALUES
(26, 'Tusbahle', 'cali@vali.com', 'root', 'admin', NULL),
(28, 'Tusbahle Abdirazak', 'ali@ali.com', 'root', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(29, 'Caasha', 'admin2@admin', 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(30, 'siciid', 'sici@sicii', 'siciid', '827ccb0eea8a706c4c34a16891f84e7b', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
