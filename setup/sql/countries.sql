-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2020 at 01:56 PM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(8) NOT NULL,
  `country` varchar(50) NOT NULL,
  `notes` text,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `notes`, `user_id`, `changed`) VALUES
(0, 'No specific country', 'Use this country for events which were not geographically relevant.', 1, '2019-01-10 07:49:36'),
(1, 'South Africa', 'Also known as &quot;Republic of South Africa&quot;.', 1, '2019-01-01 15:00:16'),
(2, 'Southern Rhodesia', 'Now called Zimbabwe.', 1, '2019-01-01 15:47:11'),
(3, 'United Kingdom', 'Also known as &quot;UK&quot;.', 1, '2019-01-22 10:36:25'),
(4, 'Northern Rhodesia', 'Now known as Zambia.', 1, '2019-01-01 15:49:53'),
(5, 'Zimbabwe', 'Used to be called Southern Rhodesia.', 1, '2019-01-01 15:57:07'),
(12, 'Ireland, or Eire', 'Southern Ireland', 1, '2019-01-10 14:15:11'),
(15, 'Egypt', 'test1', 1, '2019-01-22 10:26:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_idx` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
