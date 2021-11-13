-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2020 at 01:42 PM
-- Server version: 5.6.45
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kowiemus_history`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(8) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `occupation_id` int(8) NOT NULL,
  `party_id` int(8) NOT NULL,
  `voyage_id` int(8) DEFAULT '0',
  `ref_no` varchar(10) DEFAULT NULL,
  `checked` varchar(6) DEFAULT 'N',
  `notes` text,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `surname`, `first_name`, `other_name`, `title`, `age`, `birth_year`, `occupation_id`, `party_id`, `voyage_id`, `ref_no`, `checked`, `notes`, `user_id`, `changed`) VALUES
(0, ' ', NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 'Y', 'No person was selected - select a person first.', 1, '2019-01-19 09:19:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
