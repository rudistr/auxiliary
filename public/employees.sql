-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 09:10 AM
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeid` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeid`, `surname`) VALUES
(1, 'Jumari'),
(2, 'Jumari'),
(3, 'Achmad G'),
(4, 'Sopian J'),
(5, 'Kurniawan'),
(6, 'Asep W.'),
(7, 'Sudirja'),
(8, 'Aye K.'),
(9, 'Elan K'),
(10, 'Amang D'),
(11, 'Tedi A.'),
(12, 'Dadan CH'),
(13, 'Panji B'),
(14, 'Mat Karim'),
(15, 'Acun C.'),
(16, 'Ason S.'),
(17, 'Sudarsono'),
(18, 'Ferri'),
(19, 'Kusaeri'),
(20, 'Ade'),
(21, 'Adi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
