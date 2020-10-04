-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2020 at 03:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_todos`
--

DROP TABLE IF EXISTS `create_todos`;
CREATE TABLE IF NOT EXISTS `create_todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `createdAT` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_todos`
--

INSERT INTO `create_todos` (`id`, `task`, `createdAT`) VALUES
(1, 'first task', NULL),
(2, 'another task\r\n', NULL),
(3, 'homeWork', NULL),
(4, 'Do the shopping', NULL),
(5, 'take a walk with the dogs', NULL),
(36, 'test with DATETIME', '2020-10-04 17:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `email`, `pass`) VALUES
(2, 'AZE@aze.aze', '$2y$10$2BDw5Np0D8lz5K0WKvvu5.1QpDIkXp6/oE.MOl9EMJixlZWwaj9N.'),
(3, 'aze@aze.aze', '$2y$10$4rtt5O6/auu42tkOiHtKr.f9mGJUmS7CiLyPXpNbnZyUQ2dZt7joq'),
(4, 'another@account.com', '$2y$10$e8Il7xtAF6IZrRIJg0fTte7LoM9CBj3I22/a8HlZnEFST2MaETHAm'),
(5, 'a@a.a', '$2y$10$h5RxhyIyylmG1erP.1yoB.2qShxiE9AVdJYpV5jnqgQ1f4PnoLY46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
