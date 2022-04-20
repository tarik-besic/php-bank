-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2022 at 10:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `kurs`
--

DROP TABLE IF EXISTS `kurs`;
CREATE TABLE IF NOT EXISTS `kurs` (
  `eur` text COLLATE utf8_bin NOT NULL,
  `vrijednost` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`eur`, `vrijednost`) VALUES
('eur', 1.95);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_bin NOT NULL,
  `currency` text COLLATE utf8_bin NOT NULL,
  `value` float NOT NULL,
  `bought` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `currency`, `value`, `bought`) VALUES
(1, 'tarik besic', 'eur', 1.95, 10),
(2, 'test', 'eur', 1.95, 10),
(3, 'tarik besic', 'eur', 1.95, 1),
(7, 'john', 'eur', 1.95, 12),
(6, 'tarik besic', 'eur', 2, 10),
(8, 'tarik besic', 'eur', 2.1, 1),
(9, 'tarik besic', 'eur', 1.95, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `novac` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `email`, `novac`) VALUES
(5, 'tare', 'tare2@gmail.com', 200),
(41, 'tarik alic', 'tarikalic@gmail.com', 205.21),
(9, 'tare', 'tare2@gmail.com', 231),
(11, 'john', 'doe@gmail.com', 22),
(13, 'evvel', 'kamenjas@gmail.com', 11),
(15, 'tare', 'tare2@gmail.com', 231),
(16, 'testtt', 'testic@gmail.com', 111),
(17, 'tare', 'tare2', 231),
(18, 'qewqwe', 'qweqwe', 123123),
(40, 'tarik besic', 'tarik@gmail.com', 302.9),
(45, 'John', 'john@gmail123.com', 450);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
