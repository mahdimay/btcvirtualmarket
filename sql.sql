-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2017 at 12:07 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linuper_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `btcbala` decimal(50,8) NOT NULL,
  `usdbala` decimal(50,8) NOT NULL,
  `avgbuy` decimal(50,8) NOT NULL,
  `avgsell` decimal(50,8) NOT NULL,
  `totapro` decimal(50,8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `user`, `pass`, `btcbala`, `usdbala`, `avgbuy`, `avgsell`, `totapro`) VALUES
(1, 'test', 'test0', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(0, 'test5', 'hello', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(0, '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(0, 'h', 'h', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(0, 'test0', 'test0', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(1, 'test6', 'test6', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(1, 'test7', 'test7', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(1, 'test8', 'test8', '100001.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000'),
(1, 'test9', 'test9', '1.00000000', '68838.74000000', '1302.60666667', '4697.47233333', '-23322.88000000'),
(1, 'user1', 'ueser1', '7.00000000', '45214.43000000', '7826.51000000', '1306.39666667', '0.00000000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
