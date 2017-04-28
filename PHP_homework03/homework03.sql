-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 08:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework02`
--

-- --------------------------------------------------------

--
-- Table structure for table `homework03`
--

CREATE TABLE `homework03` (
  `id` int(10) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ref_comp` text,
  `ref_emp` text,
  `ref_cus` text,
  `on_job` varchar(255) DEFAULT NULL,
  `on_det` text,
  `oth_det` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homework03`
--

INSERT INTO `homework03` (`id`, `fname`, `lname`, `phone`, `email`, `ref_comp`, `ref_emp`, `ref_cus`, `on_job`, `on_det`, `oth_det`) VALUES
(1, 'Levi', 'Kavadas', '6514039612', 'lkavadas@gmail.com', 'asdasdasdsa', 'asdasdasdsad', 'asdasdasdsa', '', 'asdasdasdad', 'asdasddasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework03`
--
ALTER TABLE `homework03`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework03`
--
ALTER TABLE `homework03`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
