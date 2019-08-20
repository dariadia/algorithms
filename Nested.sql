-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2019 at 04:26 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
-- Table structure for table `Nested`
--

CREATE TABLE `Nested` (
  `node` varchar(100) NOT NULL,
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Nested`
--

INSERT INTO `Nested` (`node`, `left`, `right`, `depth`) VALUES
('blouses', 19, 20, 2),
('clothing', 1, 22, 0),
('dresses', 11, 16, 2),
('evening_gowns', 12, 13, 3),
('jackets', 6, 7, 3),
('men', 2, 9, 1),
('skirts', 17, 18, 2),
('slacks', 4, 5, 3),
('suits', 3, 8, 2),
('sun_dresses', 14, 15, 3),
('women', 10, 21, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Nested`
--
ALTER TABLE `Nested`
  ADD PRIMARY KEY (`node`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
