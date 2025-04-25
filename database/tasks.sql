-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 05:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_ms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `task_list` ()  BEGIN
SELECT t.id,t.title,t.desciption Desciption,t.status,t.created_att,t.due_date Due_date,
t.userid,u.fullname username,
case 
when  DATEDIFF(t.due_date,SYSDATE())=0 then 'today'
when DATEDIFF(t.due_date,SYSDATE())=1 then 'tommorow'
when DATEDIFF(t.due_date,SYSDATE())>=0 then datediff(t.due_date,SYSDATE())
else 'OverDue' end  remainingDays
,uu.fullname assign_to
FROM `tasks` t 
left join users u on t.userid=u.id
LEFT JOIN users uu ON t.assign_to=uu.id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `Desciption` text DEFAULT NULL,
  `status` enum('Pending','In Proccess','Completed') NOT NULL DEFAULT 'Pending',
  `created_att` timestamp NOT NULL DEFAULT current_timestamp(),
  `Due_date` date DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `assign_to` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `Desciption`, `status`, `created_att`, `Due_date`, `userid`, `assign_to`) VALUES
(2, 'Create two table ', 'Create users and table tasks ', 'Completed', '2025-03-14 03:33:58', '2025-03-21', 26, 29),
(9, 'tijaabo', 'tijaabo', 'In Proccess', '2025-04-18 14:44:41', '2025-04-30', 31, 30),
(10, 'tst', 'test', 'In Proccess', '2025-04-18 14:45:18', '2025-04-19', NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `created_att` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `PASSWORD`, `created_att`) VALUES
(26, 'Tusbahle', 'cali@vali.com', 'root', 'admin', NULL),
(28, 'Tusbahle Abdirazak', 'ali@ali.com', 'root', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(29, 'Caasha', 'admin2@admin', 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(30, 'siciid', 'sici@sicii', 'siciid', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(31, 'admin', 'admin@golis.so', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
