-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 10:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `southethipian_ctb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cultural_heritage`
--

CREATE TABLE `cultural_heritage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `date_created` text DEFAULT NULL,
  `locations` varchar(255) DEFAULT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `importance` varchar(110) NOT NULL,
  `history` text DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cultural_heritage`
--

INSERT INTO `cultural_heritage` (`id`, `name`, `description`, `type`, `sub_type`, `date_created`, `locations`, `conditions`, `importance`, `history`, `photo_url`, `status`) VALUES
(1, 'Great Wall of China', 'A series of fortifications made of stone, brick, wood, and earth', 'Building', 'Fortification', '0000-00-00', '1', 'Good', '0', 'Built by the Qin dynasty to defend against nomadic invaders', NULL, 1),
(4, 'The Gedeo Cultural Landscape', 'The area is densely populated by the Gedeo people whose traditional knowledge support local forest management. ', 'tradition', 'religious building', 'BEFORE 200GC\r\n', 'Gedeo Zone', 'good', 'International', 'The area is densely populated by the Gedeo people whose traditional knowledge support local forest management. ', 'heritages/gedio.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reserverooms`
--

CREATE TABLE `reserverooms` (
  `rid` int(50) NOT NULL,
  `roomid` int(50) NOT NULL,
  `roomnumber` int(50) NOT NULL,
  `hotelname` varchar(100) NOT NULL,
  `remail` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserverooms`
--

INSERT INTO `reserverooms` (`rid`, `roomid`, `roomnumber`, `hotelname`, `remail`, `sdate`, `ddate`) VALUES
(2, 728, 2, 'Abebe Zeleke', 'benjamin@gmail.com', '2023-12-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rid` int(11) NOT NULL,
  `roomid` int(50) NOT NULL,
  `remail` varchar(50) NOT NULL,
  `roomnumber` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `types` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rid`, `roomid`, `remail`, `roomnumber`, `price`, `hname`, `status`, `types`) VALUES
(1, 775, 'zola@gmail.com', 1, 800, 'Abebe Zeleke', 0, 'Single'),
(2, 728, 'zola@gmail.com', 2, 1500, 'Abebe Zeleke', 1, 'Double');

-- --------------------------------------------------------

--
-- Table structure for table `tur_flow`
--

CREATE TABLE `tur_flow` (
  `tfid` int(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `name` text NOT NULL,
  `income` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tur_flow`
--

INSERT INTO `tur_flow` (`tfid`, `qty`, `nationality`, `arrival_date`, `departure_date`, `name`, `income`) VALUES
(1, '7', 'From Spain , Germany', '2023-12-09', '2023-12-11', 'The Gedeo Cultural Landscape', '120000'),
(2, '5', 'From Italy', '2023-12-08', '2023-12-12', 'The Gedeo Cultural Landscape', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `otp` int(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `fullname`, `password`, `email`, `status`, `role`, `created_at`, `otp`, `phone`) VALUES
(8, 'Dinknew Fenta', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dinknew@gmail.com', 1, 'Administrator', '2023-11-28', 35676, '0987654321'),
(19, 'Betelehem Dejene', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'betyit@gmail.com', 1, 'Clerk', '2023-12-06', 76036, '0989898990'),
(20, 'Zinaw Dawit', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'zinaw@gmail.com', 1, 'Conservation Officer', '2023-12-10', 74208, '0978241472'),
(21, 'Zelalem Abreham', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'zola@gmail.com', 1, 'Hotel Reception', '2023-12-10', 31219, '0920498295'),
(22, 'Benjam in Pavard', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'benjamin@gmail.com', 1, 'Vistors', '2023-12-10', 20990, '0989898989');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cultural_heritage`
--
ALTER TABLE `cultural_heritage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserverooms`
--
ALTER TABLE `reserverooms`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tur_flow`
--
ALTER TABLE `tur_flow`
  ADD PRIMARY KEY (`tfid`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cultural_heritage`
--
ALTER TABLE `cultural_heritage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reserverooms`
--
ALTER TABLE `reserverooms`
  MODIFY `rid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tur_flow`
--
ALTER TABLE `tur_flow`
  MODIFY `tfid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
