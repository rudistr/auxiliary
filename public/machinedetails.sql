-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:30 AM
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
-- Table structure for table `machinedetails`
--

CREATE TABLE `machinedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idmachine` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machinedetails`
--

INSERT INTO `machinedetails` (`id`, `idmachine`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ZR-5 POLY', '2021-12-07 07:18:04', '2021-12-07 07:18:04'),
(1, 2, 'CVGD-390', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 3, 'AC UNIT POLY', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 4, 'DRYER POLY', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 5, 'AC AHU SPINNING 1', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 6, 'TRAFO LCC', '2021-12-07 07:17:31', '2021-12-07 07:17:31'),
(1, 7, 'DEMIN WATER', NULL, NULL),
(1, 8, 'n2 Plant', NULL, NULL),
(1, 9, 'COMP IR', NULL, NULL),
(1, 10, 'ZR-425', NULL, NULL),
(1, 11, 'DRYER FD1600', NULL, NULL),
(1, 12, 'CVHE-590', NULL, NULL),
(1, 13, 'AHU SPINNING2', NULL, NULL),
(1, 14, 'TRAFO LCC', NULL, NULL),
(1, 16, 'TRAFO GENSET', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 17, 'Diesel Engine(1)', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 18, 'Gas Engine(1)', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 19, 'Chemical', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 20, 'Panel Starter', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 21, 'Auxiliary1', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 22, 'Flow Meter', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 23, 'Machine Status&FM', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 24, 'TRAFO', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 25, 'DRYER IR DTY1', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 26, 'CHILLER', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 27, 'AC STATION DTY1', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 28, 'TRAFO LCC', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 29, 'WATER TREATMENT', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(1, 30, 'AREA', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 1, 'ZR-400 POLY', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 2, 'CVGD-330/590', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 10, 'ELLIOT PLF 2', NULL, NULL),
(2, 17, 'Diesel Engine(2)', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 18, 'Gas Engine(2)', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 21, 'Auxiliary2', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(2, 23, 'PARAMETER WWT', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(3, 1, 'KAESER', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(3, 23, 'DAILY REPORT', '2021-12-07 07:11:05', '2021-12-07 07:11:05'),
(4, 1, 'ELLIOT', '2021-12-07 07:11:05', '2021-12-07 07:11:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machinedetails`
--
ALTER TABLE `machinedetails`
  ADD PRIMARY KEY (`id`,`idmachine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machinedetails`
--
ALTER TABLE `machinedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
