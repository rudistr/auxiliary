-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auxiliary`
--

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `created_at`, `updated_at`, `area`) VALUES
(1, 'COMPRESSOR', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'POLY'),
(2, 'CHILLER', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'POLY'),
(3, 'AC UNIT', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'POLY'),
(5, 'AHU', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'POLY'),
(6, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'POLY'),
(7, 'DEMIN', '2021-12-07 07:16:29', '2021-12-07 07:16:01', 'POLY'),
(8, 'N2 PLANT', '2021-12-08 08:06:36', '2021-12-08 08:06:36', 'POLY'),
(9, 'COMPRESSOR', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(10, 'COMPRESSOR', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(11, 'DRYER', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(12, 'CHILLER', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(13, 'AHU', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(14, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(15, 'AC STATION', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'PLF2'),
(16, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(17, 'Diesel Engine', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(18, 'Gas Engine', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(19, 'Chemical', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(20, 'Panel Starter', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(21, 'Auxiliary', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(22, 'Flow Meter', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'GENSET'),
(23, 'WWT', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'WWT'),
(24, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'WWT'),
(25, 'DRYER', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(26, 'CHILLER', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(27, 'AC STATION', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(28, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(29, 'WT', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1'),
(30, 'GARDU INDUK', '2021-12-07 07:11:05', '2021-12-07 07:11:05', 'DTY1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
