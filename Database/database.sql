-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2020 at 12:59 PM
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
  `task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_todos`
--

INSERT INTO `create_todos` (`id`, `task`) VALUES
(1, 'first task'),
(2, 'another task\r\n'),
(3, 'homeWork'),
(4, 'Do the shopping'),
(5, 'take a walk with the dogs');


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
(2, 'AZE@aze.aze', '$2y$10$2BDw5Np0D8lz5K0WKvvu5.1QpDIkXp6/oE.MOl9EMJixlZWwaj9N.'),
(3, 'aze@aze.aze', '$2y$10$4rtt5O6/auu42tkOiHtKr.f9mGJUmS7CiLyPXpNbnZyUQ2dZt7joq'),
(4, 'another@account.com', '$2y$10$e8Il7xtAF6IZrRIJg0fTte7LoM9CBj3I22/a8HlZnEFST2MaETHAm'),
(5, 'a@a.a', '$2y$10$h5RxhyIyylmG1erP.1yoB.2qShxiE9AVdJYpV5jnqgQ1f4PnoLY46');


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;