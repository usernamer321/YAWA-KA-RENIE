-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 07:16 AM
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
-- Database: `sportsleague_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`userid`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$6LlVkxxds.t0FCX1UU4BnOsueZXb67HKWWTPmjjedkTgeStByIl3m'),
(2, 'marc', 'marc@gmail.com', '$2y$10$KL1H81HB1uB/2ys3/4trVe7JJvyiWvSX7fFYCu378kDlZmw7mLc.K'),
(3, 'jared', 'jared@gmail.com', '$2y$10$Fuuwcl73rZVw6UbG/UdaSOFOLmOyBcfQaOCDpyiR3HGmejNMZYFGK'),
(4, 'leemar.na.scam', 'urotmarygrace318@gmail.com', '$2y$10$/z8jnL1TGom9uQjgzZ9ttOs9zzb0oKG7ETmL8iWWX3skqMjrPPF2i'),
(5, 'leemar.scammer', 'ericjamesmacayan9@gmail.com', '$2y$10$e3UmTJegtwrQJSwzlgTPsuWq8L83zxvbkqwdNQ.hzKyfGYj8NMsnS'),
(6, 'leemar.na.scam', 'qwe@gmail.com', '$2y$10$mqH.Fs7ya7v1E.cG1i5dE.i8lxgEyHMUaLf9GEwvO.logjP89CQ2i');

-- --------------------------------------------------------

--
-- Table structure for table `adminregister`
--

CREATE TABLE `adminregister` (
  `user_ID` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `description` text DEFAULT NULL,
  `sport_type` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `coach_name` varchar(100) NOT NULL,
  `coach_contact` varchar(15) NOT NULL,
  `captain_name` varchar(100) NOT NULL,
  `captain_contact` varchar(15) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `coach_name`, `coach_contact`, `captain_name`, `captain_contact`, `sport`, `date_registered`, `Address`) VALUES
(1, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Badminton', '2024-11-11 14:22:57', ''),
(2, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Volleyball', '2024-11-11 14:25:12', ''),
(3, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Volleyball', '2024-11-11 14:26:02', ''),
(4, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Volleyball', '2024-11-11 14:26:25', ''),
(5, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Badminton', '2024-11-11 14:26:32', ''),
(6, 'Section 6 ', 'Francis', '09452560280', 'Leemar', '21213123213', 'Badminton', '2024-11-11 14:30:35', ''),
(7, 'ooooooooo', 'fdfdfffff', '1123123', 'uuuuuuuuu', '2134123123', 'Badminton', '2024-11-11 14:53:47', ''),
(8, 'ooooooooo', 'fdfdfffff', '1123123', 'uuuuuuuuu', '2134123123', 'Badminton', '2024-11-11 14:54:30', ''),
(9, 'ooooooooo', 'fdfdfffff', '1123123', 'uuuuuuuuu', '2134123123', 'Badminton', '2024-11-11 14:54:40', ''),
(10, 'hahays', 'hahays', '12', 'hahays', '12', 'Volleyball', '2024-11-11 15:01:25', ''),
(11, 'fff', 'ff', '1111', 'fff', '1', 'Basketball', '2024-11-11 15:22:12', 'buhisan'),
(12, 'Leemar WFW', 'Leemar Baril', '094204206969', 'Baril ', '0312023110520', 'Basketball', '2024-11-13 06:14:39', 'Barangay Leemar, Sitio Baril');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `adminregister`
--
ALTER TABLE `adminregister`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adminregister`
--
ALTER TABLE `adminregister`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
