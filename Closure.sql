-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2019 at 11:24 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alg`
--

-- --------------------------------------------------------

--
-- Table structure for table `Closure`
--

CREATE TABLE `Closure` (
  `id` int(11) NOT NULL,
  `ancestor` int(11) NOT NULL,
  `descendant` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Closure`
--

INSERT INTO `Closure` (`id`, `ancestor`, `descendant`, `depth`, `text`) VALUES
(1, 1, 1, 0, 'some text'),
(2, 0, 1, 0, 'somebody wrote here'),
(3, 2, 2, 0, 'random'),
(4, 1, 2, 1, 'message'),
(5, 0, 2, 1, 'blabla'),
(6, 3, 3, 0, 'hi'),
(7, 1, 3, 2, 'hey'),
(8, 2, 3, 1, '))'),
(9, 0, 3, 2, 'alallala'),
(10, 4, 4, 0, 'hgfew'),
(11, 1, 4, 1, 'dsfdf'),
(12, 0, 4, 1, 'lorem'),
(13, 5, 5, 0, 'vsr'),
(14, 1, 5, 2, 'refsr'),
(15, 2, 5, 1, 'gdfsfe'),
(16, 0, 5, 2, 'ima message'),
(17, 6, 6, 0, 'gerw'),
(18, 1, 6, 3, 'erwgfer'),
(19, 2, 6, 2, 'heger'),
(20, 3, 6, 1, 'gersfds'),
(21, 0, 6, 3, 'ewrg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Closure`
--
ALTER TABLE `Closure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Closure`
--
ALTER TABLE `Closure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
