-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 17, 2021 at 05:27 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TodoList`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_todos`
--

CREATE TABLE `create_todos` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `createdAT` datetime DEFAULT NULL,
  `updatedAT` datetime DEFAULT NULL,
  `deadLine` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_todos`
--

INSERT INTO `create_todos` (`id`, `task`, `createdAT`, `updatedAT`, `deadLine`) VALUES
(34, 'faire en sorte de push une task sans la deadline', '2021-02-16 22:45:07', NULL, '2020-02-02 00:00:00'),
(35, 'check / rayer les tasks', '2021-02-16 22:45:41', NULL, '2020-02-02 00:00:00'),
(36, 'trier les tasks en fonction de la date max ', '2021-02-16 22:47:53', NULL, '2020-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `email`, `pass`) VALUES
(1, 'be@be.be', 'be'),
(2, 'AZE@aze.aze', '$2y$10$2BDw5Np0D8lz5K0WKvvu5.1QpDIkXp6/oE.MOl9EMJixlZWwaj9N.'),
(3, 'aze@aze.aze', '$2y$10$4rtt5O6/auu42tkOiHtKr.f9mGJUmS7CiLyPXpNbnZyUQ2dZt7joq'),
(4, 'to@to.to', '$2y$10$e8Il7xtAF6IZrRIJg0fTte7LoM9CBj3I22/a8HlZnEFST2MaETHAm'),
(5, 'totor@totor.totor', '$2y$10$wHaJtV6py0YGSvorA63jhuFrGxCFYS0MXYW0UbaRR44BUw4YHH8e2'),
(6, 'a@a.a', '$2y$10$h5RxhyIyylmG1erP.1yoB.2qShxiE9AVdJYpV5jnqgQ1f4PnoLY46'),
(9, 'a@aaa.a', '$2y$10$b57FhrKuH51djNEG7KUfYeAyc4FaZrR.vYEgsIPuQb/xWWLcLmBry'),
(12, 'aa@aa.aa', '$2y$10$pGyztS9Ly2REhOld8sQHyebTMHs1HRSZ93Ey/8RH2HOjCgUOA4te.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_todos`
--
ALTER TABLE `create_todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_todos`
--
ALTER TABLE `create_todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;