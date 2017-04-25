-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2017 at 10:44 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinfo_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `homework02`
--

CREATE TABLE `homework02` (
  `uid` int(11) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `securityQues` varchar(255) NOT NULL,
  `securityAns` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `homework02`
--

INSERT INTO `homework02` (`uid`, `userName`, `password`, `securityQues`, `securityAns`) VALUES
(1, 'lkavadas', '649faff124066573666f834c4fbd85a7', 'Your place of birth?', 'home'),
(2, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Your place of birth?', 'home'),
(3, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 'How old are you?', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework02`
--
ALTER TABLE `homework02`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework02`
--
ALTER TABLE `homework02`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
