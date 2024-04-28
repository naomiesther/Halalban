-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 02:58 AM
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
-- Database: `halalban`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `facility` varchar(255) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkin_time` time DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `checkout_time` time DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `num_of_ppl` int(11) DEFAULT NULL,
  `status` enum('Pending','Approved','Declined') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `facility`, `checkin_date`, `checkin_time`, `checkout_date`, `checkout_time`, `event_name`, `org_name`, `num_of_ppl`, `status`) VALUES
(122, 150, 'Butterfly Park', '2024-03-29', '10:10:00', '2024-03-30', '22:10:00', 'Yoooow', 'ILY', 129, 'Declined'),
(123, 150, 'Wildlife Rescue Center', '2024-03-21', '10:10:00', '2024-03-22', '21:09:00', 'HIKHOK', 'NGAA', 736, 'Declined'),
(126, 125, 'Jose & Claudio Alunan Vanugirard Gardens', '2024-04-05', '10:00:00', '2024-04-05', '11:00:00', 'sOOO STUPID INLOVE', 'WITH UUUU', 10, 'Approved'),
(127, 125, 'Clay Chapel', '2024-03-31', '07:00:00', '2024-03-31', '10:00:00', 'BEAUTIFUL BEAUTIFUL BEAUTIFUL', 'THERES SOMETHING ABT UR EYES', 200, 'Approved'),
(128, 148, 'USLS Ecopark', '2024-03-28', '10:00:00', '2024-03-28', '22:00:00', 'eyo', 'heyyyy', 123, 'Approved'),
(129, 148, 'USLS Ecopark', '2024-03-27', '07:00:00', '2024-03-28', '17:00:00', 'Mimamooo', 'Weweoooo', 80, 'Declined'),
(130, 141, 'USLS Ecopark', '2024-03-29', '10:00:00', '2024-03-29', '22:00:00', 'Hatdog', 'Eskawd', 90, 'Approved'),
(131, 141, 'Kiddie Park', '2024-04-04', '19:07:00', '2024-05-04', '04:44:00', 'Field Trip', 'love it these days sm', 66, 'Declined'),
(132, 125, 'Fr. Gratian\'s Garden (Orchid Farm)', '2024-03-28', '19:00:00', '2024-03-28', '22:00:00', 'YAAA', 'remy boooys', 1738, 'Pending'),
(144, 148, 'Multi Purpose Hall', '2024-03-06', '10:00:00', '2024-03-06', '22:00:00', 'Hatdog', 'Andre', 100, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `donation_type` varchar(255) DEFAULT NULL,
  `giving_option` varchar(255) DEFAULT NULL,
  `amount` varchar(225) DEFAULT NULL,
  `mode_of_payment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `user_id`, `donation_type`, `giving_option`, `amount`, `mode_of_payment`) VALUES
(50, 128, 'Education and Research', 'One-Time Donation', '21', 'Gcash'),
(51, 148, 'Facility Maintenance, Environmental Conservation', 'One-Time Donation', '1000', 'Gcash'),
(52, 127, 'Facility Maintenance, Education and Research', 'Monthly Donation', '100', 'CreditCard'),
(53, 148, 'Facility Maintenance, Community Engagement, Environmental Conservation, Education and Research', 'One-Time Donation', '1000', 'PayPal'),
(54, 125, 'Facility Maintenance, Community Engagement', 'Monthly Donation', '2000', 'Gcash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(125, 'Aye', 'Magbanua', 'aye@gmail.com', '$2y$10$DKdPcojwkBaeT3E2KlFbR.YAqIa76kB8jOeqsjL1rmbBjXf4cY.ci', 'User'),
(141, 'Rivenson Angelo', 'Mahoraga', 'esquad2234@gmail.com', '$2y$10$joMNvvD/Hj3M/dtOEs1EbOF2B8UOc.O8HukdR5TaiS2v5c3G7Op4a', 'User'),
(148, 'Naonao', 'Liu', 'liunaomi@gmail.com', '$2y$10$Tg25VyfcuT5aUwijlVi.4.tUm2UHqyse9Iu86kyc7S0phCfdlNAJa', 'User'),
(150, 'Csmille ', 'Segara', 'cjsegara@gmail.com', '$2y$10$11MbMlaXSdaxm00S7m9ZZOhOXlFo5RhfXN1ClKKUhPpFLj1JaMXSi', 'User'),
(153, 'Mark', 'Masellones', 'm.zyrel@gmail.com', '$2y$10$.vbqJsz9uHWu.EGt7wNykeksGDVkvP4cVGKdhiJQ4i1O3zuKdq2DW', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_bio`
--

CREATE TABLE `user_bio` (
  `bio_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bio_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_bio`
--

INSERT INTO `user_bio` (`bio_id`, `user_id`, `bio_desc`) VALUES
(125, 153, 'im mark'),
(126, 153, 'wtvr<br />\r\n'),
(128, 148, 'hi my name niao<br />\r\n'),
(129, 153, 'wtvr'),
(130, 153, 'wtvr');

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`file_id`, `user_id`, `filename`) VALUES
(102, 125, '125_1708848888.gif'),
(103, 125, '125_1708913460.png'),
(104, 125, '125_1708913482.png'),
(105, 125, '125_1708913487.gif'),
(106, 125, '125_1708913491.gif'),
(107, 125, '125_1708913501.gif'),
(124, 141, '141_1709046490.jpg'),
(125, 148, '148_1709095307.png'),
(126, 148, '148_1709095322.jpg'),
(127, 150, '150_1709127259.jpg'),
(159, 153, '153_1709465704.png'),
(167, 153, '153_1709529396.jpg'),
(169, 148, '148_1709609115.jpg'),
(170, 153, '153_1709611128.jpg'),
(171, 153, '153_1709611132.jpg'),
(172, 153, '153_1709611141.jpg'),
(173, 153, '153_1709611298.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bio`
--
ALTER TABLE `user_bio`
  ADD PRIMARY KEY (`bio_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `user_bio`
--
ALTER TABLE `user_bio`
  MODIFY `bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_bio`
--
ALTER TABLE `user_bio`
  ADD CONSTRAINT `user_bio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_files`
--
ALTER TABLE `user_files`
  ADD CONSTRAINT `user_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
