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
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(8) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `notes` text,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `occupation`, `notes`, `user_id`, `changed`) VALUES
(0, 'None or unknown', NULL, 1, '2019-01-05 13:51:52'),
(5, 'Surgeon', '', 1, '2019-01-10 05:55:37'),
(6, 'Agriculturalist', 'Could be an Agriculturist, or Farmer.', 1, '2019-01-21 14:52:46'),
(8, 'Schoolmaster, Assistant', '', 1, '2019-01-12 07:27:45'),
(9, 'Baker', NULL, 1, '2019-01-10 15:17:26'),
(10, 'Baker & Mealman', NULL, 1, '2019-01-10 15:17:26'),
(11, 'Basket Maker', NULL, 1, '2019-01-10 15:17:26'),
(13, 'Blacksmith', NULL, 1, '2019-01-10 15:17:26'),
(14, 'Botanist', NULL, 1, '2019-01-10 15:17:26'),
(15, 'Bricklayer', NULL, 1, '2019-01-10 15:17:27'),
(16, 'Buckle-Maker', NULL, 1, '2019-01-10 15:17:27'),
(17, 'Butcher', NULL, 1, '2019-01-10 15:17:27'),
(18, 'Cabinet-Maker', NULL, 1, '2019-01-10 15:17:27'),
(19, 'Military, Captain', '', 1, '2019-01-12 08:12:28'),
(20, 'Military, Capt Dublin Militia', '', 1, '2019-01-12 08:12:07'),
(21, 'Military, Capt.(Half Pay)', '', 1, '2019-01-12 08:11:43'),
(22, 'Carpenter', NULL, 1, '2019-01-10 15:17:27'),
(23, 'Catechist', NULL, 1, '2019-01-10 15:17:27'),
(24, 'Chandler', NULL, 1, '2019-01-10 15:17:27'),
(25, 'Chaplain', NULL, 1, '2019-01-10 15:17:27'),
(26, 'Clergyman', NULL, 1, '2019-01-10 15:17:27'),
(27, 'Clerk', NULL, 1, '2019-01-10 15:17:27'),
(28, 'Clockmaker', NULL, 1, '2019-01-10 15:17:27'),
(29, 'Military, Commander R.N.', '', 1, '2019-01-12 08:12:57'),
(30, 'Compositor', NULL, 1, '2019-01-10 15:17:27'),
(31, 'Cooper', NULL, 1, '2019-01-10 15:17:27'),
(32, 'Coppersmith', NULL, 1, '2019-01-10 15:17:27'),
(33, 'Countryman', NULL, 1, '2019-01-10 15:17:27'),
(34, 'Cutler', NULL, 1, '2019-01-10 15:17:27'),
(35, 'Draper', NULL, 1, '2019-01-10 15:17:27'),
(36, 'Farmer', NULL, 1, '2019-01-10 15:17:27'),
(38, 'Farmer/Grocer', NULL, 1, '2019-01-10 15:17:27'),
(40, 'Fisherman', NULL, 1, '2019-01-10 15:17:27'),
(41, 'Frame-worker', '', 1, '2019-01-12 07:53:19'),
(42, 'Gardener', NULL, 1, '2019-01-10 15:17:27'),
(43, 'Husbandman', NULL, 1, '2019-01-10 15:17:27'),
(44, 'Ironmonger', NULL, 1, '2019-01-10 15:17:27'),
(45, 'Labourer', NULL, 1, '2019-01-10 15:17:27'),
(46, 'Machinist', NULL, 1, '2019-01-10 15:17:27'),
(47, 'Maltster', NULL, 1, '2019-01-10 15:17:27'),
(48, 'Mariner', NULL, 1, '2019-01-10 15:17:27'),
(49, 'Mason', NULL, 1, '2019-01-10 15:17:27'),
(50, 'Mariner, Master', '', 1, '2019-01-12 07:27:16'),
(51, 'Merchant', NULL, 1, '2019-01-10 15:17:27'),
(52, 'Miller', NULL, 1, '2019-01-10 15:17:27'),
(53, 'Millwright', NULL, 1, '2019-01-10 15:17:27'),
(54, 'Minister', NULL, 1, '2019-01-10 15:17:27'),
(55, 'Missionary', NULL, 1, '2019-01-10 15:17:27'),
(56, 'Navigator', NULL, 1, '2019-01-10 15:17:27'),
(57, 'Painter', NULL, 1, '2019-01-10 15:17:27'),
(58, 'Parker', NULL, 1, '2019-01-10 15:17:27'),
(59, 'Pensioner', NULL, 1, '2019-01-10 15:17:27'),
(60, 'Ploughman', NULL, 1, '2019-01-10 15:17:27'),
(61, 'Priest', NULL, 1, '2019-01-10 15:17:28'),
(62, 'Rat-Killer', NULL, 1, '2019-01-10 15:17:28'),
(63, 'Ropemaker', NULL, 1, '2019-01-10 15:17:28'),
(64, 'Saddler', NULL, 1, '2019-01-10 15:17:28'),
(65, 'Sawyer', NULL, 1, '2019-01-10 15:17:28'),
(66, 'Schoolmaster', NULL, 1, '2019-01-10 15:17:28'),
(67, 'Seaman', NULL, 1, '2019-01-10 15:17:28'),
(68, 'Shoemaker', NULL, 1, '2019-01-10 15:17:28'),
(69, 'Silversmith', NULL, 1, '2019-01-10 15:17:28'),
(70, 'Smith', NULL, 1, '2019-01-10 15:17:28'),
(72, 'Surveyor', NULL, 1, '2019-01-10 15:17:28'),
(73, 'Tailor', NULL, 1, '2019-01-10 15:17:28'),
(74, 'Turner', NULL, 1, '2019-01-10 15:17:28'),
(75, 'Weaver', NULL, 1, '2019-01-10 15:17:28'),
(76, 'Wheelwright', NULL, 1, '2019-01-10 15:17:28'),
(77, 'Wife', NULL, 1, '2019-01-10 15:17:28'),
(78, 'Wine Merchant', NULL, 1, '2019-01-10 15:17:28'),
(79, 'Wire-Worker', NULL, 1, '2019-01-10 15:17:28'),
(80, 'Gentleman', '', 1, '2019-01-12 08:09:30'),
(81, 'Military, Lieutenant', '', 1, '2019-01-12 08:11:20'),
(82, 'Military Officer', '', 1, '2019-01-12 08:16:00'),
(83, 'Military, Soldier', '', 1, '2019-01-12 08:20:14'),
(84, 'Farmworker', '', 6, '2019-05-01 12:14:27'),
(85, 'Servant', '', 9, '2019-05-01 13:26:20'),
(86, 'Umbrella maker', '', 6, '2019-05-17 11:36:11'),
(87, 'Gaoler', '', 6, '2019-05-20 13:12:28'),
(88, 'Corn Dealer', '', 5, '2019-05-22 13:00:31'),
(89, 'Farmer/Silversmith', '', 10, '2019-05-23 08:07:57'),
(90, 'Jeweller', '', 10, '2019-05-23 08:23:11'),
(91, 'Footman', '', 5, '2019-06-01 19:21:01'),
(92, 'Wharfmaster', '', 5, '2019-06-01 19:23:56'),
(93, 'Soldier', '', 6, '2019-06-14 13:36:25'),
(94, 'Sailor', '', 6, '2019-06-29 09:24:12'),
(95, 'Teacher', '', 10, '2019-08-03 07:40:09'),
(96, 'Naval, Captain', '', 6, '2019-08-13 11:47:25'),
(97, 'Undertaker', '', 6, '2019-08-23 12:58:24'),
(98, 'Captain', 'Madras Establishment', 6, '2019-09-13 12:48:26'),
(99, 'Builder', '', 6, '2019-10-03 09:24:42'),
(100, 'Planter', '', 6, '2019-10-03 10:32:42'),
(101, 'Stonemason', '', 6, '2019-10-15 07:32:03'),
(102, 'Civil Engineer', '', 10, '2019-11-14 09:08:14'),
(103, 'Cotton Dealer', '', 10, '2019-11-20 09:35:49'),
(104, 'Shopkeeper', '', 10, '2019-11-28 12:26:35'),
(105, 'Hatter', '', 11, '2020-01-28 13:15:04'),
(106, 'Shipwright', '', 11, '2020-01-28 14:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
