-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 11:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `date` datetime NOT NULL,
  `nature` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `badge_number` varchar(255) NOT NULL,
  `witness_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `followUp` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`date`, `nature`, `location`, `description`, `officer_name`, `badge_number`, `witness_name`, `phone_number`, `followUp`, `status`, `id`) VALUES
('2024-03-14 17:51:00', 'asdfgh', 'WFG', 'WERFGH', 'AFGH', 'ASDFG', 'AFG', '0795 704273', 'AFG', 'ASDFG', 1),
('2024-02-25 18:49:00', 'sdfgh', 'WERT', 'QWERT', 'ZDFGN', '22', 'alex mwai', '0795704273', 'ASDFG', 'ZXCV', 2),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'ertyui', 'clare witi', '99', 'dery', '+254708089291', 'wertyu', 'ASDFG', 3),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'ertyui', 'clare witi', '99', 'dery', '+254708089291', 'wertyu', 'ASDFG', 4),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'ertyui', 'clare witi', '99', 'dery', '+254708089291', 'wertyu', 'ASDFG', 5),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'ertyui', 'clare witi', '99', 'dery', '+254708089291', 'wertyu', 'ASDFG', 6),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'ertyui', 'clare witi', '99', 'dery', '+254708089291', 'wertyu', 'ASDFG', 7),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'WERTYUIO', 'clare witi', '99', 'dery', '+254795704273', 'wertyu', 'ASDFG', 8),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'WERTYUIO', 'clare witi', '99', 'dery', '+254795704273', 'wertyu', 'ASDFG', 9),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'WERTYUIO', 'clare witi', '99', 'dery', '+254795704273', 'wertyu', 'ASDFG', 10),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'WERTYUIO', 'clare witi', '99', 'dery', '+254795704273', 'wertyu', 'ASDFG', 11),
('2024-03-28 11:47:00', 'deadly', 'kilimani', 'WERTYUIO', 'clare witi', '99', 'dery', '+254795704273', 'wertyu', 'ASDFG', 12),
('2024-03-23 16:24:00', 'deadly', 'kilimani', 'ertyui', 'ZDFGN', '23', 'alex mwai', '+254708089291', 'wert', 'er', 13),
('2024-03-23 16:24:00', 'deadly', 'kilimani', 'ertyui', 'ZDFGN', '23', 'alex mwai', '+254708089291', 'wert', 'er', 14);

-- --------------------------------------------------------

--
-- Table structure for table `crime_report`
--

CREATE TABLE `crime_report` (
  `date` datetime(6) NOT NULL,
  `nature` varchar(500) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `officerName` varchar(50) NOT NULL,
  `badgeNumber` varchar(50) NOT NULL,
  `witness` varchar(50) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `followUp` varchar(200) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime_report`
--

INSERT INTO `crime_report` (`date`, `nature`, `location`, `description`, `officerName`, `badgeNumber`, `witness`, `phone_number`, `followUp`, `id`, `status`) VALUES
('2024-03-08 11:59:00.000000', 'Nature of occurence', 'Location', 'Description', 'Officer', 'Badge456', 'Witness name', '+254773958498', 'Action', 'ID1709888394-3041', 'active'),
('2024-03-07 13:55:00.000000', 'deadly', 'salgaa', 'motorbike hits truck', 'james mwingi', '23', 'alex mwai', '0795 704273', 'derecodes', 'ID1710413754-6082', 'savere');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
