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
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(8) NOT NULL,
  `place` varchar(50) NOT NULL,
  `notes` text,
  `region_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place`, `notes`, `region_id`, `user_id`, `changed`) VALUES
(0, ' ', 'None, or unknown', 0, 1, '2019-01-12 09:45:52'),
(1, 'Port Alfred', '', 4, 1, '2019-01-10 07:23:25'),
(4, 'Portsmouth', '', 6, 1, '2019-01-09 08:06:29'),
(5, 'Edinburgh', '', 7, 1, '2019-01-10 06:05:03'),
(9, 'Gravesend, Kent', '', 6, 1, '2019-01-10 09:01:46'),
(11, 'Cape Town', '', 8, 1, '2019-01-10 09:16:15'),
(12, 'Battinglass', NULL, 6, 1, '2019-01-10 14:18:32'),
(13, 'Berkshire', NULL, 6, 1, '2019-01-10 14:18:32'),
(14, 'Buckinghamshire', NULL, 6, 1, '2019-01-10 14:18:32'),
(15, 'Coleraine', NULL, 6, 1, '2019-01-10 14:18:32'),
(16, 'Cork', NULL, 6, 1, '2019-01-10 14:18:32'),
(17, 'Cornwall', NULL, 6, 1, '2019-01-10 14:18:32'),
(18, 'Dalkeith', NULL, 6, 1, '2019-01-10 14:18:32'),
(19, 'Devon', NULL, 6, 1, '2019-01-10 14:18:32'),
(20, 'East Lothian', NULL, 7, 1, '2019-01-10 14:18:32'),
(21, 'Edinburgh', NULL, 7, 1, '2019-01-10 14:18:32'),
(22, 'England', NULL, 6, 1, '2019-01-10 14:18:32'),
(23, 'Gloucester', NULL, 6, 1, '2019-01-10 14:18:33'),
(24, 'Gloucestershire', NULL, 6, 1, '2019-01-10 14:18:33'),
(25, 'Hampshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(26, 'Highlands', NULL, 7, 1, '2019-01-10 14:18:33'),
(27, 'Kent', NULL, 6, 1, '2019-01-10 14:18:33'),
(28, 'Lanarkshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(29, 'Lancashire', NULL, 6, 1, '2019-01-10 14:18:33'),
(30, 'London', NULL, 6, 1, '2019-01-10 14:18:33'),
(31, 'Middlesex', NULL, 6, 1, '2019-01-10 14:18:33'),
(32, 'Norfolk', NULL, 6, 1, '2019-01-10 14:18:33'),
(33, 'Nottinghamshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(34, 'Oxfordshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(35, 'Pigot', NULL, 6, 1, '2019-01-10 14:18:33'),
(36, 'Rowles', NULL, 6, 1, '2019-01-10 14:18:33'),
(38, 'Somersetshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(39, 'Staffordshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(40, 'Surrey', NULL, 6, 1, '2019-01-10 14:18:33'),
(41, 'Trowbridge', NULL, 6, 1, '2019-01-10 14:18:33'),
(42, 'Wapping', NULL, 6, 1, '2019-01-10 14:18:33'),
(43, 'Warwickshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(44, 'Westminster', NULL, 6, 1, '2019-01-10 14:18:33'),
(45, 'Weymouth', NULL, 6, 1, '2019-01-10 14:18:33'),
(46, 'Wicklow', NULL, 6, 1, '2019-01-10 14:18:33'),
(47, 'Wiltshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(48, 'Worcestershire', NULL, 6, 1, '2019-01-10 14:18:33'),
(49, 'Yorkshire', NULL, 6, 1, '2019-01-10 14:18:33'),
(50, 'Port Elizabeth', 'Site of most of the 1820 settler landings.', 8, 1, '2019-01-10 14:20:57'),
(53, 'Saldanha Bay', 'On the West Coast of the Cape.', 8, 1, '2019-01-19 10:33:01'),
(54, 'Zuurveld', 'Between the Sundays River Valley and the Fish River', 8, 1, '2019-01-19 10:42:46'),
(55, 'Paarl', '', 8, 1, '2019-01-19 10:45:23'),
(56, 'Fort Frederick', '', 8, 1, '2019-01-22 10:31:00'),
(57, 'Grahamstown', '', 8, 1, '2019-01-27 06:33:59'),
(58, 'Bathurst', '', 4, 1, '2019-01-27 07:03:06'),
(59, 'Simonstown', '', 8, 4, '2019-02-06 08:57:38'),
(60, 'Fort Beaufort', '', 13, 6, '2019-02-08 14:36:45'),
(61, 'Alice', '', 13, 6, '2019-02-08 14:44:54'),
(62, 'Liverpool', '', 6, 6, '2019-05-01 12:23:26'),
(63, 'Butterworth', '', 14, 6, '2019-05-01 12:35:03'),
(64, 'Clumber', '', 4, 6, '2019-05-01 12:54:14'),
(65, 'Sunday\'s River', '', 13, 3, '2019-05-01 13:52:37'),
(66, 'Queenstown', '', 13, 6, '2019-05-01 14:05:15'),
(67, 'Southwell', '', 4, 6, '2019-05-15 09:15:38'),
(68, 'Algoa Bay', '', 13, 6, '2019-05-15 09:38:14'),
(69, 'Assegai Bush', '', 4, 6, '2019-05-15 09:38:47'),
(70, 'Bloemfontein', '', 11, 6, '2019-05-15 09:40:58'),
(71, 'Trappes Valley', '', 4, 6, '2019-05-15 11:59:29'),
(72, 'Cradock', '', 13, 6, '2019-05-15 12:08:56'),
(73, 'Kimberley', '', 8, 6, '2019-05-15 12:15:14'),
(74, 'Reed Fountain', '', 4, 6, '2019-05-17 11:46:45'),
(75, 'Potchefstroom', '', 11, 6, '2019-05-17 13:56:55'),
(76, 'Rustenberg', '', 11, 6, '2019-05-17 13:58:33'),
(77, 'Middelburg', '', 11, 6, '2019-05-17 14:04:32'),
(78, 'Sidbury', '', 11, 6, '2019-05-18 10:16:33'),
(79, 'Salem', '', 13, 6, '2019-05-18 10:17:19'),
(80, 'Richardson\'s Locn', '', 11, 6, '2019-05-18 10:18:08'),
(81, 'Kroomen', '', 11, 6, '2019-05-18 10:28:22'),
(82, 'Rufane River', '', 4, 6, '2019-05-18 10:39:26'),
(83, 'Newcastle', '', 6, 6, '2019-05-20 13:23:41'),
(84, 'Plymouth', '', 6, 6, '2019-05-20 13:26:42'),
(85, 'Bethelsdorp', '', 13, 6, '2019-05-20 13:31:32'),
(86, 'Theopolis', '', 13, 6, '2019-05-20 13:35:26'),
(87, 'Tyumie Mission', '', 13, 10, '2019-05-22 09:23:03'),
(88, 'Elephant Fountain', '', 4, 10, '2019-05-22 09:23:44'),
(89, 'Kaffir Drift', '', 13, 5, '2019-05-22 10:02:46'),
(90, 'Port Frances', '', 4, 5, '2019-05-28 13:10:41'),
(91, 'Fort England', '', 13, 10, '2019-05-28 09:26:24'),
(92, 'Simon\'s Bay', '', 8, 10, '2019-05-28 10:12:45'),
(93, 'Cuylerville', '', 4, 5, '2019-05-28 13:46:03'),
(94, 'Bushman\'s River', '', 13, 6, '2019-05-31 08:57:13'),
(95, 'Addo', '', 13, 6, '2019-05-31 09:06:45'),
(96, 'Lampeter', '', 4, 5, '2019-06-01 19:36:08'),
(97, 'Theopolis Mission', '', 4, 5, '2019-06-01 19:39:24'),
(98, 'Port Kowie', '', 4, 5, '2019-06-01 19:41:37'),
(99, 'Swellendam', '', 8, 5, '2019-06-01 19:49:38'),
(100, 'Riversdale', '', 8, 5, '2019-06-01 19:51:55'),
(101, 'Barville Park', '', 4, 5, '2019-06-01 20:09:44'),
(102, 'Deptford', '', 6, 6, '2019-06-11 13:34:10'),
(103, 'King Williams Town', '', 13, 6, '2019-06-11 13:41:53'),
(104, 'Albany', '', 13, 6, '2019-06-12 09:09:34'),
(105, 'Kentani', '', 13, 6, '2019-06-12 14:51:40'),
(106, 'Fort Hare', '', 13, 6, '2019-06-14 12:03:03'),
(107, 'Fort Murray', '', 13, 6, '2019-06-14 12:06:29'),
(108, 'Fort Willshire', '', 13, 6, '2019-06-14 12:27:58'),
(109, 'Graaff Reinet', '', 8, 6, '2019-06-29 09:47:17'),
(110, 'Deal', '', 11, 6, '2019-07-23 09:31:11'),
(111, 'Blaauw Krantz River', '', 13, 6, '2019-07-23 09:31:46'),
(113, 'Bly River', 'Bly River near Somerset', 11, 10, '2019-07-31 08:41:13'),
(114, 'Smithfield', '', 13, 10, '2019-07-31 09:19:03'),
(115, 'Clarkebury Mission', '', 13, 10, '2019-07-31 09:38:31'),
(116, 'Kariega River', '', 4, 10, '2019-08-02 09:06:27'),
(117, 'Tulbagh', '', 8, 10, '2019-08-03 07:53:26'),
(118, 'Stellenbosch', '', 8, 10, '2019-08-03 07:53:53'),
(119, 'Klein Valley', '', 13, 10, '2019-08-06 10:24:38'),
(120, 'Farmersfield Mission', '', 13, 10, '2019-08-06 10:25:05'),
(121, 'de Jager\'s Drift', '', 13, 10, '2019-08-06 10:27:10'),
(122, 'Uitenhage', '', 13, 6, '2019-08-13 13:31:39'),
(123, 'Fort Brown', '', 13, 6, '2019-08-14 11:35:00'),
(124, 'Bristol', '', 6, 6, '2019-08-14 11:47:46'),
(125, 'Lisbon', 'survivors of Abcona taken to Lisbon', 11, 6, '2019-08-14 13:10:34'),
(126, 'Bechuanaland', '', 11, 6, '2019-08-26 14:28:59'),
(127, 'Wesleyville', '', 13, 6, '2019-09-13 13:37:15'),
(128, 'Rio de Janeiro', '', 11, 6, '2019-09-13 14:04:47'),
(129, 'Ireland', '', 10, 6, '2019-10-01 10:20:39'),
(130, 'Dublin', '', 10, 6, '2019-10-01 10:22:51'),
(131, 'Long Hope', '', 13, 6, '2019-10-03 10:03:18'),
(132, 'Whittlesea', '', 13, 6, '2019-10-12 10:12:37'),
(133, 'Indutwya', '', 14, 6, '2019-10-12 10:19:50'),
(134, 'Durban', '', 11, 6, '2019-10-12 10:48:30'),
(135, 'Fort Peddie', '', 13, 6, '2019-10-12 10:54:49'),
(136, 'Pietermaritzburg', '', 11, 6, '2019-10-12 11:10:21'),
(137, 'Colesberg', '', 13, 6, '2019-10-15 07:12:46'),
(138, 'Bedford', '', 13, 6, '2019-10-15 07:52:13'),
(139, 'New Bristol', '', 13, 10, '2019-11-01 09:44:06'),
(140, 'Standerwick', '', 13, 10, '2019-11-01 09:44:22'),
(141, 'Myrtle Green', '', 13, 10, '2019-11-01 10:10:02'),
(142, 'Thornhill', '', 13, 10, '2019-11-01 10:10:53'),
(143, 'Green Fountain', '', 4, 10, '2019-11-06 10:07:31'),
(144, 'Zonder End River', '', 13, 10, '2019-11-13 10:06:18'),
(145, 'Tharfield', '', 4, 10, '2019-11-28 12:26:56'),
(146, 'Kap River', '', 13, 10, '2019-11-28 12:54:19'),
(147, 'Kaffraria', '', 13, 11, '2019-12-23 14:09:12'),
(148, 'Aliwal North', '', 13, 11, '2019-12-27 10:59:23'),
(149, 'Trompetter\'s Drift', '', 4, 11, '2020-01-15 14:31:57'),
(150, 'Peddie', '', 4, 11, '2020-01-17 11:10:40'),
(151, 'Table Bay', '', 8, 11, '2020-01-26 16:45:38'),
(152, 'Kasouga', '', 13, 11, '2020-01-28 14:33:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_idx` (`place`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
