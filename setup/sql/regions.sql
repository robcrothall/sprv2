-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2020 at 01:57 PM
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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(8) NOT NULL,
  `region` varchar(50) NOT NULL,
  `notes` text,
  `country_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region`, `notes`, `country_id`, `user_id`, `changed`) VALUES
(2, 'Makhana', '', 1, 1, '2019-01-01 21:03:11'),
(4, 'Ndlambe', 'In the Eastern Cape.', 1, 1, '2019-01-10 07:52:57'),
(6, 'England', '', 3, 1, '2019-01-09 08:05:44'),
(7, 'Scotland', '', 3, 1, '2019-01-10 06:04:29'),
(8, 'Cape', '', 1, 1, '2019-01-10 07:05:51'),
(10, 'Ireland', '', 12, 1, '2019-01-10 14:16:02'),
(11, 'No specific region', 'Use this region when an event is not geographically limited.', 0, 1, '2019-01-10 07:48:19'),
(13, 'Eastern Cape', '', 1, 1, '2019-01-27 07:03:47'),
(14, 'Transkei', '', 1, 6, '2019-05-01 12:29:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_idx` (`region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
