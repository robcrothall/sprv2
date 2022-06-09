SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

USE `afpxyykk_sprv`;

DROP TABLE IF EXISTS `usersx`;
CREATE TABLE `usersx` (
  `id` int(8) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `people_id` int(8) DEFAULT NULL,
  `notes` text,
  `member_exp` date NOT NULL,
  `last_logon` date NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'VISITOR',
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE TABLE `usersx`;
INSERT INTO `usersx` (`id`, `username`, `hash`, `surname`, `first_name`, `phone`, `mobile`, `email`, `people_id`, `notes`, `member_exp`, `last_logon`, `user_role`, `user_id`, `changed`) VALUES
(1, 'rob@crothall.co.za', 'roomdgp/XwvnU', 'Crothall', 'Rob', '046 604 0441', '083 678 5055', 'rob@crothall.co.za', 260, NULL, '2050-12-31', '2022-01-23', 'ADMIN', 1, '2022-01-23 10:23:38'),
(12, 'gm@settlerspark.co.za', 'gmSWmwXXCbvc.', 'Thompson', 'Derek', '046 604 0200', '', 'gm@settlerspark.co.za', 1081, NULL, '2020-03-05', '2022-01-11', 'ADMIN', 13, '2022-01-11 07:40:59'),
(13, 'irene@settlerspark.co.za', 'irYkFcLqfDzFM', 'Marais', 'Irene', '0466040502', '0826527522', 'irene@settlerspark.co.za', 522, NULL, '2021-04-27', '2022-01-27', 'ADMIN', 13, '2022-01-27 06:21:01'),
(15, 'admin2@settlerspark.co.za', 'adrxzm72svfXs', 'Biller', 'Mercedes', '046 604 0200', '', 'admin2@settlerspark.co.za', 523, NULL, '2021-05-22', '2021-11-12', 'STAFF', 1, '2021-11-13 14:33:46'),
(16, 'susan@settlerspark.co.za', 'sueUvZf1oEbmw', 'McGarvie', 'Susan', '046 604 0375', '082 574 7556', 'susan@settlerspark.co.za', 567, NULL, '2021-09-22', '2021-01-14', 'INACTIVE', 1, '2021-09-23 12:33:06'),
(17, 'sue@settlerspark.co.za', 'suM52dlQxuvHo', 'Croukamp', 'Sue', '046 604 0540', '073 264 1613', 'sue@settlerspark.co.za', 512, NULL, '2021-05-29', '2022-01-26', 'STAFF', 1, '2022-01-26 06:58:23'),
(18, 'kittie@settlerspark.co.za', 'kii4itlvnVLXw', 'Joubert', 'Kittie', '046 604 0541', '061 741 3665', 'kittie@settlerspark.co.za', 513, NULL, '2021-05-29', '2022-01-17', 'STAFF', 13, '2022-01-17 12:49:09'),
(19, 'johan@settlerspark.co.za', 'joz7jZHImjI/I', 'Wolmarans', 'Johan', '046 604 0550', '079 279 7085', 'johan@settlerspark.co.za', 599, NULL, '2021-05-29', '2022-01-26', 'STAFF', 1, '2022-01-26 05:47:07'),
(20, 'bukiwe@settlerspark.co.za', 'bu6wGZSBaDZGA', 'Mafele', 'Bukiwe', '046 604 0542', '', 'bukiwe@settlerspark.co.za', 521, NULL, '2021-07-08', '2022-01-26', 'STAFF', 1, '2022-01-26 06:03:40'),
(21, 'norah@settlerspark.co.za', 'noJZs3XczMf.c', 'Plaatjie', 'Norah', '046 604 0602', '', 'norah@settlerspark.co.za', NULL, NULL, '2021-09-22', '2020-10-30', 'INACTIVE', 1, '2021-09-23 12:32:16'),
(23, 'triciaborder@mweb.co.za', 'trFv1/pNXtyQA', 'Border', 'Tricia', '046 604 0269', '083 228 0099', 'triciaborder@mweb.co.za', 88, NULL, '2021-08-23', '2022-01-23', 'STAFF', 1, '2022-01-23 15:08:30'),
(24, 'johanna@settlerspark.co.za', 'jox3FxmFauc7k', 'de Wet', 'Johanna', '046 604 0551', '', 'johanna@settlerspark.co.za', 600, NULL, '2021-08-27', '2022-01-27', 'STAFF', 1, '2022-01-27 06:15:09'),
(25, 'CROR01', 'CR00xii7481D.', 'Crothall', 'Robert', NULL, NULL, NULL, 260, 'This is a Test ID with &quot;Resident&quot; status', '2021-10-04', '2022-01-21', 'RESIDENT', 1, '2022-01-21 14:35:26'),
(26, 'GILE01', 'GIwkhJndgBy8s', 'GILFILLAN', 'EDWARD', NULL, NULL, NULL, 174, NULL, '2021-10-07', '2021-12-01', 'STAFF', 1, '2021-12-01 10:50:54'),
(27, 'SURY01', 'sum9GvQ0jiHmI', 'SURTEES', 'YVONNE', NULL, NULL, NULL, 140, NULL, '2021-10-07', '2022-01-11', 'RESIDENT', 1, '2022-01-11 10:40:17'),
(28, 'PROP01', 'PRDgtwxoZUkzw', 'Probert', 'Paul', NULL, NULL, NULL, 139, NULL, '2021-10-07', '2021-08-17', 'RESIDENT', 1, '2021-08-17 10:42:02'),
(29, 'CROG01', 'crNYaBnErHw1o', 'Crothall', 'Gwynneth', NULL, NULL, NULL, 261, NULL, '2021-10-12', '2020-10-12', 'RESIDENT', 1, '2020-12-26 08:39:40'),
(30, 'admin@settlerspark.co.za', 'adbsQAd3FtiwM', 'Magobiyana', 'Akhona', '046 604 0200', '', 'admin@settlerspark.co.za', 525, NULL, '2021-12-21', '2022-01-27', 'STAFF', 1, '2022-01-27 08:33:29'),
(31, 'FOXJ01', 'FO48EZVZ7F0Vk', 'FOX', 'JIM', NULL, NULL, NULL, NULL, NULL, '2022-02-01', '2021-04-09', 'RESIDENT', 1, '2021-04-09 13:48:54'),
(32, 'KEMC01', 'KERM9KFO/benA', 'KEMP', 'CLIFFORD', NULL, NULL, NULL, NULL, NULL, '2022-02-01', '2021-10-25', 'RESIDENT', 1, '2021-10-25 05:01:54'),
(33, 'ATKR01', 'AT7wYfdeCeEQQ', 'ATKINSON', 'ROB', NULL, NULL, NULL, NULL, NULL, '2022-02-01', '2021-02-01', 'RESIDENT', 1, '2021-02-01 15:21:51'),
(34, 'MITT01', 'MIGQUZeC9SFdY', 'MITCHELL', 'TONY', NULL, NULL, NULL, NULL, NULL, '2022-02-02', '2022-01-12', 'RESIDENT', 1, '2022-01-12 11:10:44'),
(35, 'DUGB01', 'DU7YIfcfjH0vk', 'DUGGAN', 'BOB', NULL, NULL, NULL, NULL, NULL, '2022-02-02', '2021-03-31', 'RESIDENT', 1, '2021-03-31 12:40:50'),
(36, 'MARW01', 'MA956lIZMZQ7U', 'Martin', 'William', NULL, NULL, NULL, NULL, NULL, '2022-02-02', '2021-11-26', 'RESIDENT', 1, '2021-11-26 07:20:26'),
(37, 'MITP01', 'MIxMGGC/Dg5So', 'MITCHELL', 'TRISH', NULL, NULL, NULL, NULL, NULL, '2022-02-02', '2021-12-28', 'RESIDENT', 1, '2021-12-28 11:57:16'),
(38, 'LOBJ01', 'LoxQDIm98HZgc', 'Lobban', 'James', NULL, NULL, NULL, NULL, NULL, '2022-02-03', '2021-03-31', 'RESIDENT', 1, '2021-03-31 17:31:23'),
(39, 'PACB01', 'PAJ1gZLu5DIRU', 'Pachonick', 'Brian', NULL, NULL, NULL, NULL, NULL, '2022-02-03', '2021-06-07', 'RESIDENT', 1, '2021-06-07 08:14:19'),
(40, 'STED01', 'ST8J688LmmhaE', 'Steenkamp', 'Doreen', NULL, NULL, NULL, NULL, NULL, '2022-02-03', '2021-10-04', 'RESIDENT', 1, '2021-10-04 18:50:53'),
(41, 'WOOD01', 'WOPy51Qw1mRkI', 'WOOD', 'DON', NULL, NULL, NULL, NULL, NULL, '2022-02-04', '2021-05-21', 'RESIDENT', 1, '2021-05-21 14:59:31'),
(42, 'SHED01', 'SHYI9.D28X9q6', 'SHEARD', 'DAVID', NULL, NULL, NULL, NULL, NULL, '2022-02-04', '2021-02-04', 'RESIDENT', 1, '2021-02-04 12:44:25'),
(43, 'AYLJ01', 'AYwQXmQtETyjE', 'AYLWARD', 'JANET', NULL, NULL, NULL, NULL, NULL, '2022-02-05', '2021-10-30', 'RESIDENT', 1, '2021-10-30 13:30:44'),
(44, 'MOOD01', 'MOFileN8fPF1w', 'MOORE', 'DERMOT', NULL, NULL, NULL, NULL, NULL, '2022-02-05', '2022-01-25', 'RESIDENT', 1, '2022-01-25 07:25:41'),
(45, 'MARI02', 'macUJTImuGfBY', 'Marais', 'Irene', NULL, NULL, NULL, NULL, NULL, '2022-02-05', '2021-11-26', 'RESIDENT', 1, '2021-11-26 06:33:49'),
(46, 'THOD02', 'THe0z5ALOZnqM', 'Thompson', 'Derek', NULL, NULL, NULL, NULL, NULL, '2022-02-05', '2021-02-05', 'RESIDENT', 13, '2021-09-23 12:59:54'),
(47, 'CLAG01', 'CLyaLJLcDuR06', 'Clark', 'Glenys', NULL, NULL, NULL, NULL, NULL, '2022-02-10', '2021-02-10', 'RESIDENT', 1, '2021-02-10 08:02:38'),
(48, 'SIGS01', 'siyIE5ZrbVhqY', 'Sigunyela', 'Sandile', NULL, NULL, NULL, NULL, NULL, '2022-02-10', '2022-01-27', 'STAFF', 1, '2022-01-27 05:42:21'),
(49, 'DAYL01', 'dasFjzboaDobI', 'Day', 'Lyn', NULL, NULL, NULL, NULL, NULL, '2022-02-11', '2021-02-11', 'RESIDENT', 1, '2021-02-11 12:58:36'),
(50, 'SNOR01', 'SNX4n.C4yfn3A', 'Snodgrass', 'Robert', NULL, NULL, NULL, NULL, NULL, '2022-02-12', '2021-03-19', 'RESIDENT', 1, '2021-03-19 12:47:07'),
(51, 'BRAH01', 'brsFH0l8XZ3pM', 'Bramwell', 'Horace', NULL, NULL, NULL, NULL, NULL, '2022-02-18', '2022-01-12', 'RESIDENT', 1, '2022-01-12 15:51:30'),
(52, 'HOSE01', 'HoBXNSHbvbNi.', 'HOSECK', 'EDDIE', NULL, NULL, NULL, NULL, NULL, '2022-02-18', '2022-01-26', 'RESIDENT', 1, '2022-01-26 15:03:12'),
(53, 'ARMD01', 'ARidWejAZomGE', 'Armstrong', 'Don', NULL, NULL, NULL, NULL, NULL, '2022-02-19', '2021-03-08', 'RESIDENT', 1, '2021-03-08 10:19:38'),
(54, 'rowena@settlerspark.co.za', 'rozTRCUfieusc', 'Elnagar', 'Erin', '', '', 'ccreception@settlerspark.co.za', 530, NULL, '2022-02-26', '2022-01-25', 'STAFF', 13, '2022-01-25 14:10:58'),
(55, 'erica', 'ereokoWXwG.es', 'Botha', 'Erica', '046 604 0201', '072 855 8229', '', 569, NULL, '2022-02-26', '2022-01-21', 'STAFF', 13, '2022-01-21 08:24:36'),
(56, 'naydeen@settlerspark.co.za', 'naR66qdaJYuZw', 'Swartz', 'Naydeen', '046 604 0212', '078 161 9518', '', 561, NULL, '2022-02-26', '2021-02-26', 'STAFF', 1, '2021-02-26 04:50:38'),
(57, 'PELC01', 'Pel7AxSi5mzZU', 'PELLEW', 'CHARLES', NULL, NULL, NULL, NULL, NULL, '2022-03-01', '2021-09-09', 'RESIDENT', 1, '2021-09-09 11:10:03'),
(58, 'SCHP01', 'SC9dbC5M0AXpw', 'Schoning', 'Peter', NULL, NULL, NULL, NULL, NULL, '2022-03-02', '2021-12-30', 'RESIDENT', 1, '2021-12-30 01:41:38'),
(59, 'elspeth', 'elrSRQEPchgBk', 'Witthuhn', 'Elspeth', '046 604 0523', '078 603 4096', '', 518, NULL, '2022-03-10', '2021-04-29', 'STAFF', 1, '2021-04-29 09:08:50'),
(60, 'CLOH01', 'CLPfcUshm/9v6', 'CLOHESSY', 'HELEN', NULL, NULL, NULL, NULL, NULL, '2022-03-31', '2021-04-06', 'RESIDENT', 1, '2021-04-06 09:09:03'),
(61, 'REYL01', 'REusWs4RtUVRw', 'REYNOLDS', 'LINDA', NULL, NULL, NULL, NULL, NULL, '2022-04-01', '2021-09-22', 'RESIDENT', 1, '2021-09-22 06:37:32'),
(62, 'FRAG01', 'FRCS8jBM/XN.2', 'FRASER', 'GAVIN', NULL, NULL, NULL, NULL, NULL, '2022-04-05', '2022-01-25', 'RESIDENT', 1, '2022-01-25 15:57:10'),
(63, 'CLAS01', 'CL3.4Wb3FBf8s', 'CLARKE', 'STUDLEY', NULL, NULL, NULL, NULL, NULL, '2022-04-09', '2021-04-09', 'RESIDENT', 1, '2021-04-09 07:36:55'),
(64, 'RADB01', 'RANmC3XgdnUoo', 'Radue', 'Beverley', NULL, NULL, NULL, NULL, NULL, '2022-04-12', '2021-08-26', 'RESIDENT', 1, '2021-08-26 12:53:17'),
(65, 'naas', 'nal6cITY6fVXM', 'Ferreira', 'Naas', '', '083 253 6862', 'naas.ferreira@wellcapital.co.za', 1214, NULL, '2022-05-06', '2021-05-07', 'STAFF', 1, '2021-05-07 07:27:16'),
(66, 'MOSJ01', 'MOLcWVkY/Y1/Y', 'Moss', 'John', NULL, NULL, NULL, NULL, NULL, '2022-05-09', '2021-06-14', 'RESIDENT', 1, '2021-06-14 11:09:46'),
(67, 'MERG01', 'MElY5sunS3YbU', 'VAN DER MERWE', 'GERT', NULL, NULL, NULL, NULL, NULL, '2022-05-21', '2021-05-21', 'RESIDENT', 1, '2021-05-21 14:51:23'),
(68, 'ALSA01', 'alhvLL/h50jCs', 'ALSTON', 'ARNOLD', NULL, NULL, NULL, NULL, NULL, '2022-05-21', '2021-05-21', 'RESIDENT', 1, '2021-05-21 15:16:44'),
(69, 'SPIF01', 'SPgZCtrchPCdE', 'SPIEKER', 'FRANSJE', NULL, NULL, NULL, NULL, NULL, '2022-05-22', '2021-05-22', 'RESIDENT', 1, '2021-05-22 07:01:39'),
(70, 'BROC01', 'BRRqLpmwhF8ks', 'Brown', 'Cynthia', NULL, NULL, NULL, NULL, NULL, '2022-05-23', '2021-05-23', 'RESIDENT', 1, '2021-05-23 08:29:57'),
(71, 'UYSG01', 'UYucnL0zUY0nw', 'Uys', 'Gillian', NULL, NULL, NULL, NULL, NULL, '2022-05-23', '2021-05-23', 'RESIDENT', 1, '2021-05-23 10:04:15'),
(72, 'COGM01', 'COd/NufAf4ZOs', 'COGHLAN', 'MAUDE', NULL, NULL, NULL, NULL, NULL, '2022-05-23', '2021-05-23', 'RESIDENT', 1, '2021-05-23 14:26:56'),
(73, 'SOUJ01', 'SO1wQ9tfZRfwo', 'Southey', 'Juan', NULL, NULL, NULL, NULL, NULL, '2022-05-23', '2022-01-11', 'RESIDENT', 1, '2022-01-11 04:30:15'),
(74, 'NEWM01', 'NE/JRD1ubRxv2', 'NEWLANDS', 'MIKE', NULL, NULL, NULL, NULL, NULL, '2022-05-24', '2021-05-24', 'RESIDENT', 1, '2021-05-24 08:59:18'),
(75, 'CLOP01', 'CLf97.ogmYwZc', 'CLOUGH', 'PAT', NULL, NULL, NULL, NULL, NULL, '2022-05-24', '2021-05-24', 'RESIDENT', 1, '2021-05-24 11:43:51'),
(76, 'LANT01', 'LA3.GGKNcBsvk', 'LANGLEY', 'TREVOR', NULL, NULL, NULL, NULL, NULL, '2022-05-27', '2021-12-29', 'RESIDENT', 1, '2021-12-29 05:59:31'),
(77, 'sally', 'sajCt9SdIU7sQ', 'Wormald', 'Selma', '046 604 0602', '064 909 1654', 'creditors@settlerspark.co.za', 1223, NULL, '2022-05-31', '2021-11-29', 'STAFF', 1, '2021-11-29 11:28:52'),
(78, 'RUSP01', 'RUAUpMI.gNZF2', 'Russell', 'Phyllis', NULL, NULL, NULL, NULL, NULL, '2022-06-02', '2021-08-01', 'RESIDENT', 1, '2021-08-01 12:29:59'),
(79, 'GLEH02', 'GLvSkq28yi6L.', 'Glennie', 'Helena', NULL, NULL, NULL, NULL, NULL, '2022-06-08', '2021-06-15', 'RESIDENT', 1, '2021-06-15 07:13:11'),
(80, 'DICQ01', 'diz8sUmbydca2', 'Dick', 'Quinton', NULL, NULL, NULL, NULL, NULL, '2022-07-19', '2021-07-19', 'RESIDENT', 1, '2021-07-19 08:14:30'),
(81, 'danielle', 'da.w8zGvAlTcI', 'Fourie', 'Danielle', '046 604 0526', '', '', 528, NULL, '2022-07-22', '2022-01-08', 'STAFF', 1, '2022-01-08 08:57:48'),
(82, 'BAIP01', 'BA4lGoK/1nQic', 'Bailes', 'Patricia', NULL, NULL, NULL, NULL, NULL, '2022-07-23', '2022-01-17', 'RESIDENT', 1, '2022-01-17 08:26:05'),
(83, 'ronelle', 'roFwXlP1udAsU', 'Botha', 'Ronelle', '046 604 0517', '072 419 3822', 'housekeeping@settlerspark.co.za', 534, '', '2022-08-02', '2021-08-02', 'Staff', 13, '2021-08-02 07:31:52'),
(84, 'MOFS01', 'MOAHoLIIsJHm2', 'Moffat', 'Sarah', NULL, NULL, NULL, NULL, NULL, '2022-08-02', '2021-12-31', 'RESIDENT', 1, '2021-12-31 11:03:45'),
(85, 'HEFR01', 'HE1SMFCTQqG1.', 'Heffer', 'Robert', NULL, NULL, NULL, NULL, NULL, '2022-10-20', '2021-12-06', 'RESIDENT', 1, '2021-12-06 05:46:29'),
(86, 'HOWG01', 'HOdX4Vz21D2R.', 'Howes', 'Godfrey', NULL, NULL, NULL, NULL, NULL, '2022-10-21', '2021-10-21', 'RESIDENT', 1, '2021-10-21 13:16:56'),
(87, 'ARMG01', 'AR8wqvgwJRTa.', 'Armstrong', 'Gillian', NULL, NULL, NULL, NULL, NULL, '2022-11-10', '2021-11-10', 'RESIDENT', 1, '2021-11-10 08:02:30'),
(88, 'FRAC01', 'fraV2TyxyfdZU', 'Fraser', 'Claire', NULL, NULL, NULL, 246, NULL, '2023-01-08', '2022-01-26', 'RESIDENT', 1, '2022-01-26 07:17:26'),
(89, 'THOH01', 'th4KJ7e0p9Yoo', 'Thompson', 'Helen', NULL, NULL, NULL, 127, NULL, '2023-01-08', '2022-01-09', 'RESIDENT', 1, '2022-01-09 05:04:11');

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_id` int(8) NOT NULL,
  `role_id` int(8) NOT NULL,
  `role_expiry` date DEFAULT NULL,
  `changed_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE TABLE `user_roles`;
INSERT INTO `user_roles` (`user_id`, `role_id`, `role_expiry`, `changed_id`, `changed`) VALUES
(88, 8, '2023-01-08', 1, '2022-01-08 19:58:05'),
(1, 1, '2049-05-26', 1, '2022-01-08 19:33:55'),
(12, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(13, 1, '2025-01-01', 1, '2021-07-18 08:14:01'),
(15, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(88, 25, '2023-01-08', 1, '2022-01-08 19:58:05'),
(17, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(18, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(19, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(20, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(48, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(24, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(46, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(30, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(17, 11, '2025-01-01', 1, '2021-07-18 08:14:01'),
(15, 14, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 2, '2049-05-26', 1, '2022-01-08 19:33:55'),
(13, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 4, '2022-01-08', 1, '2022-01-08 19:33:55'),
(13, 4, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 5, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 8, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 9, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 9, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 10, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 11, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 11, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 13, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 13, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 14, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 14, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 15, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 15, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 16, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 16, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 17, '2023-01-08', 1, '2022-01-08 19:33:55'),
(13, 17, '2025-01-01', 1, '2021-07-18 08:14:01'),
(1, 23, '2022-01-08', 1, '2022-01-08 19:33:55'),
(13, 23, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 1, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 9, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 11, '2025-01-01', 1, '2021-07-18 08:14:01'),
(45, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 13, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 14, '2025-01-01', 1, '2021-07-18 08:14:01'),
(12, 15, '2025-01-01', 1, '2021-07-18 08:14:01'),
(18, 9, '2025-01-01', 1, '2021-07-18 08:14:01'),
(19, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(20, 9, '2025-01-01', 1, '2021-07-18 08:14:01'),
(23, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(23, 14, '2025-01-01', 1, '2021-07-18 08:14:01'),
(24, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(25, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(26, 15, '2025-01-01', 1, '2021-07-18 08:14:01'),
(26, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(27, 15, '2025-01-01', 1, '2021-07-18 08:14:01'),
(27, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(29, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(28, 8, '2025-01-01', 1, '2021-07-18 08:14:01'),
(48, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(51, 15, '2025-01-01', 1, '2021-07-18 08:14:01'),
(51, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(51, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(54, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(55, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(56, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(56, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(54, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(55, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(59, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(59, 5, '2025-01-01', 1, '2021-07-18 08:14:01'),
(65, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(65, 10, '2025-01-01', 1, '2021-07-18 08:14:01'),
(77, 2, '2025-01-01', 1, '2021-07-18 08:14:01'),
(77, 9, '2025-01-01', 1, '2021-07-18 08:14:01'),
(81, 2, '2048-12-10', 1, '2021-07-25 14:12:57'),
(81, 13, '2022-07-25', 1, '2021-07-25 14:12:57'),
(83, 5, '2022-08-02', 13, '2021-08-02 07:31:52'),
(83, 2, '2048-12-18', 13, '2021-08-02 07:31:52'),
(1, 7, '2023-01-08', 1, '2022-01-08 19:33:55'),
(1, 6, '2023-01-08', 1, '2022-01-08 19:33:55'),
(1, 25, '2023-01-08', 1, '2022-01-08 19:33:55'),
(89, 25, '2023-01-08', 1, '2022-01-08 19:58:40'),
(89, 8, '2023-01-08', 1, '2022-01-08 19:58:40');

DROP TABLE IF EXISTS `valid_accounts`;
CREATE TABLE `valid_accounts` (
  `acc` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `f3` varchar(20) DEFAULT NULL,
  `f4` varchar(20) DEFAULT NULL,
  `f5` varchar(20) DEFAULT NULL,
  `f6` varchar(20) DEFAULT NULL,
  `f7` varchar(20) DEFAULT NULL,
  `f8` varchar(20) DEFAULT NULL,
  `f9` varchar(20) DEFAULT NULL,
  `f10` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `valid_accounts`;
INSERT INTO `valid_accounts` (`acc`, `name`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`, `f10`) VALUES
('ABBW01', 'Aab  Mr W.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ACHJ01', 'Acheson  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ADDN01', 'Adderley  Mrs N.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ALDB01', 'Aldis  Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ALSA01', 'Alston  Mr & Mrs A', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ARCD01', 'Archer  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ARMD01', 'Armstrong  Mr & Mrs D. I.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ARMG01', 'Armstrong Mrs G.M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ATKP01', 'Atkinson  Mr P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ATKR01', 'Atkinson  Mr & Mrs R. H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('AYLB01', 'Aylward  Mr & Mrs B. T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BAIP01', 'Bailes  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BARL01', 'Bartlett  Mr & Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BARP01', 'Barclay  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BASL01', 'Basson  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BAWM01', 'Bawden  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BEAP01', 'Beaumont  Mr P.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('BELS01', 'Bellingan  Mr S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BENG01', 'Bentley  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BERD01', 'Beresford Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BERJ01', 'Berry  Dr. J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BLAE01', 'Blackbeard  Mrs. E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BODM01', 'Bodill  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BORT01', 'Border  Mr & Mrs T.A.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('BOTE01', 'Botha  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BOTJ01', 'Bothomley  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BOYD01', 'Boyd  Mr D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BOYR01', 'Boyce Mr & Mrs R.L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BRAH01', 'Bramwell  Mr & Mrs H', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BRAI01', 'Brans  Mrs I.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BRAM01', 'Bradfield  Mr M.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('BREG01', 'Breeden  Mr G. W.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BREM01', 'Bredenkamp  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BROC01', 'Brown  Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BROM01', 'Brown  Mr & Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BROP01', 'Brown  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BRUB01', 'Bruton  Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BUIG01', 'Buisson-Street Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BURR01', 'Burgess  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BUSP01', 'Bushell  Mr R', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('BUTR01', 'Butcher  Mrs. R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CANA01', 'Canny  Mr A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CHAD01', 'Chaston  Mr & Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CHAD02', 'Chandler  Mr & Mrs D.B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CHAL01', 'Charter  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CHRM01', 'Christie Mr & Mrs M', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CHUI01', 'Chunnett  Mr & Mrs I.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('CLAG01', 'Clark  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLAM01', 'Hill  Mr M Clayton  & Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLAS01', 'Clarke  Mr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLEM01', 'Cleugh  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLER01', 'Clegg  Mr R.G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLOH01', 'Clohessy  Mrs H. M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CLOP01', 'Clough  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('COEM01', 'Coetzer  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COGM01', 'Coghlan  Mrs M.J.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('COLR01', 'Collett  Miss. R', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COLT01', 'Collett   Mr & Mrs T.E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COLT02', 'Collett  Mr T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COME01', 'Combrink  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COOL01', 'Cooper  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COSJ01', 'Coster  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COUC01', 'Coulter  Mrs C. S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('COWD01', 'Cowie  Mr & Mrs W.D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('CROR01', 'Crothall  Mr & Mrs R', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DANB01', 'Danilatos  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DAYL01', 'Day  Mrs L. C', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DENR01', 'Denis  Mr & Mrs M. R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DICD01', 'Dicken  Mr & Mrs M', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DOYT01', 'Doyle  Mr T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DUGB01', 'Duggan  Mr E.R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DUGV01', 'Dugmore  Mrs V.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('DULD01', 'Dullabh  Mr D.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('DYEL01', 'Dyer Mrs L.E & Oosthuizen Mr J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FEAJ01', 'Feather Mr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FINC01', 'Findlay  Mr C', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FLAH01', 'De Flamingh  Mrs H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FLEC01', 'Fletcher  Mr & Mrs C.M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FORG01', 'Ford  Mrs G', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FORJ01', 'Forster  Mr J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FOSC01', 'Foster   Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FOWC01', 'Fowler  Mrs C. M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FOWF01', 'Fowler   Mrs F.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FOXJ01', 'Fox  Mr J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FRAG01', 'Fraser  Prof. & Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('FRIP01', 'Fricker  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GADM01', 'Gadd  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GALK01', 'Gallagher  Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GEOY01', 'George  Mrs Y.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GERW01', 'Gericke  Mrs W.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GIFJ01', 'Gifford  Mr J.R. & Mrs H. A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GILA01', 'Gill  Mr & Mrs A J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GILE01', 'Gilfillan  Mr & Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GLENSD', 'GLENS DEN', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GLER01', 'Glennie  Mr & Mrs H R', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GLIH01', 'Glisson  Mrs H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GOEE01', 'Goetze  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GOLM01', 'Golding  Mrs W.J', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('GRAR01', 'Gradwell  Mr & Mrs R.G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HAMC01', 'Hammond  Mr C.G.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('HARJ01', 'Hart  Mrs J.M.L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HARM01', 'Harman  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HASC01', 'Van Hassalt  Mr C', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HENM01', 'Hendry  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HENR01', 'Henshall  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HILDST', 'Hill  Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HILM01', 'Hilton-Barber  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HOBM01', 'Hobbs  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HOSE01', 'Hoseck   Mr & Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('HOWG01', 'Howes  Mr & Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('IMPT01', 'Impey  Mrs T.J.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('JACJ01', 'Jacobs  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('JAEK01', 'De Jager  Mr & Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('JONJ01', 'Jones   Mr R.J.W.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('JUDM01', 'Judge  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('KELD01', 'Kelly  Mr D', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('KEMC01', 'Kemp  Mr & Mrs C.A.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('KIEE01', 'Kietzman  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('KOLL01', 'Kolesky  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('KREL01', 'Krein  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('LAMS01', 'Lampier Grist  Mrs S. P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LANT01', 'Langley  Mr & Mrs T. A.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('LANT02', 'Lansdell  Mr & Mrs T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LAUD01', 'Laubscher  Mr D H & Mrs G.M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LEAJ01', 'Lear  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LEAP01', 'Lear  Mr P.N.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('LEER01', 'Leeming  Mr R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LELM01', 'Lello  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LEOM01', 'Leonard  Mr & Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LINB01', 'Linforth  Mr & Mrs M.A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LLOJ01', 'Lloyd  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LOBJ01', 'Lobban  Mr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LONP01', 'Long  Mrs P', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LOUJ01', 'Louw  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('LUCB01', 'Luckman  Mr B', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MACI01', 'Macpherson  Mr I.R & Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MANT01', 'Mann  Mr T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MANV01', 'Mansfield  Mrs. V.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MARM01', 'Marshall  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MARW01', 'Martin  Mr & Mrs W.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCCT01', 'McCarthy  Mr & Mrs T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCGR01', 'Mcghie  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCLB01', 'Mclean  Mr & Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCLM01', 'Mcleod  Mrs M. L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCLR01', 'Mclean  Mr R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MCPM01', 'McPhee  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MEIC01', 'Meiring  Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MERD01', 'Van der Merwe  Mrs D.B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MERG01', 'Van Der Merwe  Mr & Mrs G.J', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MERM01', 'van der Merwe  Dr & Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MERR01', 'Van der Merwe  Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MEYG01', 'Meyer  Mrs G. H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MEYN01', 'Meyer  Mrs N.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MILE01', 'Milln   Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MILJ01', 'Mildenhall  Mr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MITT01', 'Mitchell  Mr A.P & Mrs P.J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MOFS01', 'Moffat  Mrs S', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MOOD01', 'Moore  Dr & Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MOOE01', 'Moorcroft  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MOOO01', 'Moore  Mr & Mrs O.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MORC01', 'Morris  Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('MOSJ01', 'Moss  Mr J', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('NEAS01', 'Neame  Miss S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('NEIM01', 'Van Lier  Mrs G.M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('NELD01', 'Nelson  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('NELP01', 'Nel  Mrs P', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('NEWM01', 'Newlands  Mr M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('NORG01', 'Norman  Mr & Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('O\'RM01', 'O\'Reilly  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('OLIJ01', 'Oliver  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('OOSA01', 'Oosthuizen  Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PACB01', 'Pachonick  Mr & Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PAIC01', 'Painter  Mr & Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PAPA01', 'Papenhuijzen   Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PEAP01', 'Peacock  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PELC01', 'Pellew  Mr & Mrs C.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PHII01', 'Phillips  Mr & Mrs. I', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('PHIP01', 'Phillips Mr & Mrs P. T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PIQY01', 'Piguet  Mrs Y .E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('POEA01', 'Van der Poel  Mr & Mrs A.D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('POHL01', 'Pohl  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PROP01', 'Mr P. Probert & Mrs Y. Surtees', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PROW01', 'Probert  Mrs M Konig & Mr W.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('PURH01', 'Purdon  Mrs H', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('QUIR01', 'Quin  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('RANC01', 'Randall  Mr C.S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('RATN01', 'Rathbone  Mrs N', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('REIA01', 'Reijman  Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('REYG01', 'Reynolds Mr & Mrs G.W.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('RICM01', 'Richardson  Mrs M', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('RIMP01', 'Rimmer  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ROBL01', 'Roberts  Mrs L.E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('RODR01', 'Rodrigues  Mr R.J. & Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ROLS01', 'Roll  Mrs S . M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ROOJ01', 'Roos Dr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('ROXG01', 'Roxburgh  Mr & Mrs G L', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('RUSP01', 'Russell  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SANK01', 'Sansom  Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SANR01', 'Sandilands  Mr R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SCAD01', 'Scarterfield  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SCHL01', 'Scheepers  Mrs L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SCHM01', 'Schorn  Mr & Mrs M. A', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SCHP01', 'Schoning  Mr & Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SCOB01', 'Scoble  Miss B.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('SCOBCA', 'Scoble  Miss B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SHED01', 'Sheard  Mr D & Mrs C. G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SHEG01', 'Shelver  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SIMR01', 'Simpson  Mr & Mrs R', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SIMS01', 'Simpkins  Mrs S.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('SKEP01', 'Skelton  Mr & Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SKIT01', 'Skipper  Mr & Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SLAM01', 'Slater Mr M. and Mogilnicka Mrs E', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SMEP01', 'Smethurst  Mr & Mrs  P.J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SMID01', 'Smit  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SMIR01', 'Smith  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SMIR02', 'Smith  Mr & Mrs R.F', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SNOR01', 'Snodgrass Mr & Mrs R. G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SOIP01', 'Soine  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SOUJ01', 'Southey  Mr & Mrs J', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SPAR01', 'Sparks  Mr & Mrs R. P.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('SPAR02', 'Spavins  Mr & Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SPEM01', 'Spearman   Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SPIF01', 'Spieker  Mrs F.S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SPIS01', 'Spies  Mrs S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('STAK01', 'Stavridis  Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('STAM01', 'Stas  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('STED01', 'Steenkamp Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('STUL01', 'Stuart  Mrs L', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('STYK01', 'Stylianou  Mrs K.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SUMM01', 'Summers  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SURA01', 'Surmon  Mrs A.M', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('SUTE01', 'Sutton  Mrs E. M.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('SVEE01', 'Svendsen  Mr K.E', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SWAC01', 'Swart  Mr C.J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('SWAD01', 'Swanepoel  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TARU01', 'Tarr  Mrs U.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TAUI01', 'Taute  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TAYP01', 'Taylor  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TENC01', 'Tennant  Mr C. & Mrs H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('THAJ01', 'Thatcher  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('THAM01', 'Thackwray  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('THOH01', 'Thompson  Mrs H', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TILE01', 'Tilly  Mrs E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TIPG01', 'Tipper  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TRU56A', 'Trust Cottage Bedsitter', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TRUC56', 'TRUST COTTAGE', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('TRUC57', 'TRUST COTTAGE', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('TRUJ01', 'Truscott  Mr & Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('TRUM01', 'Truscott  Mrs M.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('TRUS01', 'Trust Shop', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('UYSG01', 'Uys  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('VERA01', 'Versfeld  Mr & Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('VORS01', 'Vorster  Mrs H.A.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('VROR01', 'Vroom  Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WALJ01', 'Wallace  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WALL01', 'Van der Walt  Mr L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WATD01', 'Watson  Mrs D.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WEBR01', 'Weber  Mrs R.E.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WEBU01', 'Webber  Miss U.L.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WERF01', 'Werner  Mrs. F.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('WESB01', 'Wesson  Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WESG01', 'Westley  Miss V   Williams  & Miss G', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WESM01', 'West  Mrs M', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WEST01', 'West  Mr T.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WHEJ01', 'Wheelwright  Mrs J.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WIBS01', 'Wiblin  Mrs S.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WIGJ01', 'Wight  Mrs J.H.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WILB01', 'Wilmot  Mr B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WILB02', 'Williams  Mr & Mrs B.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WILG02', 'Wilson  Mrs G.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('WILP01', 'Wilson  Mrs P.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WILR01', 'Wilkins  Mr R.', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WINR01', 'Winter  Mrs R.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('WOOD01', 'Wood  Mr DT & Mrs RA', 'B/F', '0', '0', '1', '', '0', '1', 'No'),
('WORA01', 'Wormald  Mrs A.', 'B/F', '0', '0', '1', '', '0', '1', 'Yes'),
('WORJ01', 'Worrall  Mrs K.J.', 'B/F', '0', '0', '1', '', '0', '1', 'No');

DROP TABLE IF EXISTS `veh01`;
CREATE TABLE `veh01` (
  `surname` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `regno` varchar(20) DEFAULT NULL,
  `cottage` varchar(30) DEFAULT NULL,
  `people_id` int(8) DEFAULT NULL,
  `people_cottage` varchar(10) DEFAULT NULL,
  `vehicle_id` int(8) DEFAULT NULL,
  `id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `veh01`;
INSERT INTO `veh01` (`surname`, `name`, `regno`, `cottage`, `people_id`, `people_cottage`, `vehicle_id`, `id`) VALUES
('Aab', 'Willie', 'HWD892EC', '19', 21, '19', 2, 16),
('Acheson', 'Jacquie', 'HVT505EC', '117', 152, '117', 3, 123),
('Aldis', 'Peter', 'FNZ137EC', '33', 40, '33', 5, 37),
('Aldis', 'Babs', 'FNZ137EC', '33', 41, '33', 5, 38),
('Alston', 'Arnold', 'HKM920EC', '111', 143, '111', 6, 114),
('Alston', 'Marcia', 'HKM920EC', '111', 144, '111', 6, 115),
('Archer', 'Daphne', 'HBH017EC', '135', 182, '135', 8, 145),
('Armstrong', 'Gillian', 'CAP22EC', '92', 109, '92', 9, 88),
('Armstrong ', 'Don', 'DMH510EC', '245', 337, '245', 10, 288),
('Armstrong ', 'Helen', 'DMH510EC', '245', 338, '245', 10, 289),
('Atkinson ', 'Rob', 'FDL396EC', '128A', 170, '128A', 12, 138),
('Atkinson ', 'Jean', 'FDL396EC', '128A', 173, '128A', 12, 141),
('Aylward', 'Brian', 'HYC082EC', '82', 96, '82', 13, 76),
('Aylward', 'Janet', 'HYC082EC', '82', 97, '82', 13, 77),
('Bailes ', 'Pat', 'FSW620EC', '193', 257, '193', 14, 210),
('Bartlett', 'Lyndon', 'FZF804EC', '85', 102, '85', 15, 80),
('Bartlett', 'Marion', 'FZF804EC', '85', 101, '85', 15, 79),
('Basson', 'Lynette', 'FRG451EC', '215', 296, '215', 16, 253),
('Beaumont', 'Peter ', 'HTD748EC', '67', 80, '67', 17, 63),
('Bentley', 'Glenys', 'JBH661EC', '137', 184, '137', 18, 147),
('Beresford', 'Denise', 'FFY672EC', '11', 13, '11', 19, 12),
('Blackbeard', 'Edith', 'FMJ915EC', '114', 148, '114', 20, 119),
('Bodill', 'Meryl', 'FZD836EC', '84', 100, '84', 21, 78),
('Border', 'Tony', 'FPH303EC', '75', 87, '75', 22, 69),
('Border', 'Tricia', 'FPH303EC', '75', 88, '75', 22, 70),
('Botha', 'Liz', 'HJM399EC', '44B', 55, NULL, 23, 46),
('Bothomley', 'Jean', 'CZY893EC', '73', 86, '73', 24, 68),
('Boyce', 'Robert', 'DGJ454EC', '160', 211, '160', 25, 169),
('Boyce', 'Jenne', 'DGJ454EC', '160', 210, '160', 25, 168),
('Boyd', 'David', 'BLB147EC', '206', 283, '206', 26, 240),
('Bradfield', 'Maurice', 'DWT148EC', '120', 156, '120', 27, 126),
('Bradfield', 'Maurice', 'BMF136EC', '120', 156, '120', 28, 127),
('Bramwell ', 'Horace', 'JDB165EC', '226', 310, '226', 29, 264),
('Bramwell ', 'Sharon', 'JDB165EC', '226', 311, '226', 29, 265),
('Brans', 'Irene', 'FGJ798EC', '238', 329, '238', 30, 280),
('Bredenkamp', 'Mary', 'DJN689EC', '88', 105, '88', 31, 83),
('Brown', 'Mike', 'DVF420EC', '212', 293, '212', 32, 250),
('Brown', 'Jan', 'DVF430EC', '212', 292, '212', 33, 249),
('Brown', 'Cindy', 'FRR272EC', '247', 341, NULL, 34, 292),
('Bruton', 'Betty', 'DZ2G72EC', '86', 103, '86', 35, 81),
('Buisson-Street', 'Greta', 'CMG469EC', '116', 151, '116', 36, 122),
('Burgess', 'Roy', 'DTV045EC', '237', 328, '237', 37, 279),
('Bushell', 'Peter', 'HZW854EC', 'H1', 381, 'H1', 38, 301),
('Canny', 'Athol', 'CSD865EC', '213', 294, '213', 39, 251),
('Canny', 'Cynthia', 'DHM898EC', '213', 295, '213', 40, 252),
('Chandler', 'Dennis', 'CX4503', '232', 321, '232', 41, 272),
('Chandler', 'Sue', 'CX4503', '232', 320, '232', 41, 271),
('Chaston', 'Dave', 'JMK756EC', '24', 26, NULL, 42, 21),
('Chaston', 'Jenny', 'JMK756EC', '24', 27, NULL, 42, 22),
('Chunnett', 'Ivo', 'HSM656EC', '126', 164, '126', 43, 134),
('Chunnett', 'Tessa', 'HSM656EC', '126', 165, '126', 43, 135),
('Clark', 'Glenys', 'JDT641EC', '66', 52, NULL, 44, 44),
('Clarke', 'Studley', 'CNJ663EC', '113', 146, '113', 45, 117),
('Clarke', 'Joanne', 'CNJ663EC', '113', 147, '113', 45, 118),
('Clayton', 'Mike', 'FLJ399EC', '100', 123, '100', 46, 97),
('Cleugh', 'Marian', 'DSH543EC', '156', 207, '156', 47, 166),
('Clohessy', 'Helen', 'FVF834EC', '68', 81, '68', 48, 64),
('Clough', 'Pat', 'HCR861EC', '235', 326, '235', 49, 278),
('Coetzer', 'Mabel', 'HFN409EC', '203', 278, '203', 50, 234),
('Coghlan', 'Maude', 'HFS156EC', '105', 134, '105', 51, 106),
('Collett', 'Trevor', 'DHV036EC', '107', 137, '107', 52, 109),
('Collett', 'Winsome', 'DHV036EC', '107', 138, '107', 52, 110),
('Collett ', 'Robin', 'DSG636EC', '22', 24, '22', 53, 19),
('Collett ', 'Trevor', 'HXD953EC', '201', 275, '201', 54, 231),
('Cooper', 'Liz', 'FND961EC', '178', 235, '178', 55, 191),
('Coster', 'Joy', 'FMK656EC', '6', 7, '6', 56, 8),
('Cowie', 'Dallas', 'DLT894EC', '99', 121, '99', 57, 95),
('Cowie', 'Helen', 'DVW529EC', '99', 122, '99', 58, 96),
('Crothall', 'Rob ', 'HHL175EC', '195', 260, NULL, 59, 213),
('Crothall', 'Gwynn', 'HKR226EC', '195', 261, NULL, 60, 214),
('Danilatos', 'Bessie', 'HTW372EC', '55', 68, '55', 61, 53),
('Day', 'LYN', 'DTG813EC', '52', 64, NULL, 62, 49),
('De Jaeger ', 'Karel', 'HDM396EC', '60', 72, '60', 63, 56),
('De Jaeger ', 'Ems', 'HDM464EC', '60', 73, '60', 64, 57),
('Denis', 'Rene', 'FDL674EC', '144', 191, '144', 66, 153),
('Denis', 'Eileen', 'DVZ396EC', '144', 192, '144', 67, 154),
('Dicken', 'David', 'CZC234EC', '200C', 273, '200C', 68, 229),
('Dicken', 'Christiane', 'FDF451EC', '200C', 274, '200C', 69, 230),
('Doyle', 'Trevor', 'CXW747EC', '62', 75, '62', 70, 59),
('Duggan', 'Bob ', 'DTT765EC', '197', 264, '197', 71, 217),
('Duggan', 'Bob ', 'FTW297EC', '197', 264, '197', 72, 218),
('Duggan', 'Bob ', 'HYX106EC', '197', 264, '197', 73, 219),
('Dugmore ', 'Val', 'DPX378EC', '36', 44, '36', 74, 39),
('Feather', 'John', 'FXB228MP', '233', 322, '233', 75, 273),
('Feather', 'Eileen', 'HDL539MP', '233', 323, '233', 76, 274),
('Findlay', 'Colin', 'FYN457EC', '32', 39, NULL, 77, 36),
('Ford', 'Gay', 'BJP334EC', '200', 269, '200', 78, 224),
('Ford', 'Gay', 'DYM006EC', '200', 269, '200', 79, 225),
('Forster ', 'John', 'FZG584EC', '87', 104, '87', 80, 82),
('Forward', 'Des', 'HRV885EC', '185', 247, '185', 81, 201),
('Fowler', 'Flo', 'DWT779EC', '54', 67, '54', 82, 52),
('Fowler', 'Christine', 'DGT489EC', '165', 219, '165', 83, 177),
('Fox', 'Jim', 'CLG264EC', '104', 130, '104', 84, 104),
('Fricker', 'Paddy', 'NY141021', '38', 46, '38', 85, 41),
('Gadd', 'Marion', 'HMK262EC', '217', 298, '217', 86, 254),
('Gallagher', 'KRIS', 'FSD562EC', '207', 284, '207', 87, 241),
('George', 'Yvonne', 'JJK241EC', '20', 22, '20', 88, 17),
('Gericke', 'Wilma', 'JCH026EC', '7', 8, NULL, 89, 9),
('Gething', 'Peggy', 'JJL820EC', 'D4', 357, 'D4', 90, 297),
('Gie', 'John', '001GIEEC', '150', 199, '150', 91, 158),
('Gie', 'John', 'ECGIE001', '150', 199, '150', 92, 159),
('Gifford', 'James', 'JLZ480EC', '202', 276, '202', 93, 232),
('Gifford', 'Helen', 'JLZ480EC', '202', 277, '202', 93, 233),
('Gill', 'Ant', 'HJD761EC', '221', 304, '221', 94, 257),
('Gill', 'Ant', 'FTW975EC', '221', 304, '221', 95, 258),
('Gill', 'Penny', 'FNJ397EC', '221', 305, '221', 96, 259),
('Glisson', 'Hilary', 'DFS501EC', '5', 6, '5', 97, 6),
('Glisson', 'Hilary', 'HRB336EC', '5', 6, '5', 98, 7),
('Goetze', 'Eris', 'DTR954EC', '138', 185, '138', 99, 148),
('Gradwell ', 'Rod ', 'FLV535EC', '220', 303, '220', 100, 256),
('Hammond', 'Chris', 'CXG893EC', '12', 14, '12', 101, 13),
('Hart', 'June', 'DRK467EC', '175', 231, '175', 102, 186),
('Hendry', 'Margie', 'JBZ364EC', '121', 157, '121', 103, 128),
('Henshall', 'Richard', 'HDK664EC', '231', 319, '231', 104, 270),
('Henshall', 'Judy', 'FSR967EC', '231', 318, '231', 105, 269),
('Hill', 'Carole', '-', '100', 124, '100', 106, 98),
('Hilton-Barber', 'Moira', 'FMW483EC', '118', 153, '118', 107, 124),
('Hilton-Barber', 'Moira', 'DHD031EC', '118', 153, '118', 108, 125),
('Hoseck', 'Eddie', 'DRP429EC', '205', 282, '205', 110, 239),
('Hoseck', 'Jenny', 'DRP429EC', '205', 281, '205', 110, 238),
('Howes', 'Godfrey', 'FFG466EC', '64', 77, '64', 111, 61),
('Howes', 'Meryl', 'FFG466EC', '64', 78, '64', 111, 62),
('Jacobs', 'Joan', 'JCX425EC', '44', 53, '44', 112, 45),
('Jones', 'Jos', 'HDY029EC', '208', 285, '208', 113, 242),
('Judge', 'Marge', 'HNZ741EC', '222', 306, '222', 114, 260),
('Kelly ', 'Don', 'HKW620EC', '181', 241, '181', 115, 197),
('Kelly ', 'Micky', 'HKW620EC', '181', 240, '181', 115, 196),
('Kemp', 'Clifford', 'HBJ932EC', '225', 308, '225', 116, 262),
('Kemp', 'Beryl', 'HBN828EC', '225', 309, '225', 117, 263),
('Kietzmann ', 'Elize', 'JBP806EC', '241', 332, NULL, 118, 283),
('Kolesky', 'Lyn', 'HZS047EC', '139', 186, '139', 119, 149),
('Konig', 'Marion', 'FPD642EC', '134', 181, '134', 120, 144),
('Lampier Grist', 'Suzette', 'DKY056EC', '1', 1, '1', 121, 1),
('Langley', 'Trevor', 'HLD245EC', '29', 34, '29', 122, 30),
('Langley', 'Sue', 'HLD245EC', '29', 35, '29', 122, 31),
('Lansdell', 'Terrence', 'HMF549EC', '77', 90, '77', 123, 71),
('Lansdell', 'Helen', 'HMF549EC', '77', 91, '77', 123, 72),
('Lapham', 'Lyn', 'HZB251EC', '243', 334, '243', 124, 285),
('Laubscher', 'Dennis', 'FTH243EC', '115', 149, '115', 125, 120),
('Laubscher', 'Gwendoline', 'FTH243EC', '115', 150, '115', 125, 121),
('Lear', 'Peter', 'HNJ236EC', '189', 252, '189', 126, 205),
('Lear', 'June', 'CX27232', '187', 250, '187', 127, 203),
('Leeming', 'Roy', 'FRW646EC', '104A', 131, '104A', 128, 105),
('Lello', 'Margaret', 'WDF620GP', '70', 83, '70', 129, 65),
('Leonard', 'Martin', 'DKC858EC', '234', 325, '234', 130, 276),
('Leonard', 'Wendy', 'HNR102EC', '234', 324, '234', 131, 275),
('Leonard', 'Martin', 'FLT416EC', '234', 325, '234', 132, 277),
('Linforth', 'Brian', 'HVG646EC', '25', 28, '25', 133, 23),
('Linforth', 'Mo', 'HWW265EC', '25', 29, '25', 134, 24),
('Lloyd', 'Joy', 'JCS969EC', '78', 92, '78', 135, 73),
('Long', 'Phyll', 'PGR286EC', '63', 76, '63', 136, 60),
('Louw', 'Jenny', 'FRF778EC', '72', 85, NULL, 137, 67),
('Macpherson', 'Ian', 'FGW141EC', '26', 30, '26', 138, 25),
('Macpherson', 'Marion', 'FGW141EC', '26', 31, '26', 138, 26),
('Mann', 'Tony', 'FGX124EC', '21', 23, '21', 139, 18),
('Marshall', 'Marguerite', 'DYF699EC', '185', 248, '185', 140, 202),
('McCarthy', 'Terence', 'FTN657EC', '249', 344, '249', 141, 295),
('McCarthy', 'Doreen', 'FXG672EC', '249', 345, '249', 142, 296),
('McGhie', 'Richard', 'BTZ165EC', '194', 258, '194', 143, 211),
('McGhie', 'Mary', 'DMT062EC', '194', 259, '194', 144, 212),
('McLean', 'Brian', 'HLB113EC', '154', 204, '154', 145, 164),
('McLean', 'Mary', 'HLB113EC', '154', 205, '154', 145, 165),
('McLeod', 'Marion', 'CGG981EC', '152', 201, '152', 146, 161),
('McPhee', 'Mirelle', 'CZZ821EC', '242', 333, '242', 147, 284),
('Meyer', 'Nancy', 'DFR717EC', '151', 200, '151', 148, 160),
('Mildenhall', 'Justin', 'HHR178EC', '200B', 271, '200B', 149, 227),
('Mildenhall', 'Eleanor', 'HHR178EC', '200B', 272, '200B', 149, 228),
('Milln', 'Elisabeth', 'FCJ370EC', '172', 228, '172', 150, 183),
('Mitchell', 'Tony', 'HXH954EC', '198', 265, '198', 151, 220),
('Mitchell', 'Trish', 'HVT172EC', '198', 266, '198', 152, 221),
('Moffat', 'Sally', 'FNW428EC', '200A', 270, NULL, 153, 226),
('Mogilnicka', 'Eva', 'HGB310EC', '4', 4, '4', 154, 4),
('Moorcroft', 'Eulalie', 'CNH875EC', '2', 2, '2', 155, 2),
('Moore', 'Dermot ', 'JMT392EC', '127', 166, '127', 156, 136),
('Moore', 'Margie', 'CXT166EC', '127', 167, '127', 157, 137),
('Moore', 'Owen', 'DRW043EC', '145', 193, '145', 158, 155),
('Moore', 'Colleen', 'HXT453EC', '145', 194, '145', 159, 156),
('Neame', 'Sue', 'DYR125EC', '101', 125, '101', 161, 99),
('Nel', 'Priscilla', 'HWF756EC', '240', 331, '240', 162, 282),
('Nelson', 'Dawn', 'FFR691EC', '188', 251, '188', 163, 204),
('Newlands', 'Mike', 'HBD923EC', '91', 108, '91', 164, 86),
('Newlands', 'Mike', 'DPC026EC', '91', 108, '91', 165, 87),
('Norman', 'Graham', 'CVJ098EC', '128C', 171, '128C', 166, 139),
('Norman', 'Joan', 'CVJ098EC', '128C', 172, '128C', 166, 140),
('Oliver', 'Janet', 'HYJ269EC', '40', 48, '40', 167, 43),
('Oosthuizen', 'Averil', 'JCH190EC', '37', 45, '37', 168, 40),
('O\'Reilly', 'Marge', 'JMB956EC', '17', 19, '17', 169, 14),
('Painter', 'Cliff', 'HBR392EC', '53', 65, '53', 170, 50),
('Painter', 'Pam', 'HBR392EC', '53', 66, '53', 170, 51),
('Pellew', 'Charles ', 'HYF935EC', '248', 342, '248', 171, 293),
('Pellew', 'Myrna', 'JHZ915EC', '248', 343, '248', 172, 294),
('Phillips', 'Peter', 'FYG082EC', '94', 112, '94', 173, 90),
('Phillips', 'Cecile', 'HKG093EC', '94', 113, '94', 174, 91),
('Phillips', 'Ivor', 'CVS875EC', '122', 158, '122', 175, 129),
('Phillips', 'Leslie-Anne', 'HBL099EC', '122', 159, '122', 176, 130),
('Piquet', 'Yvonne', 'HLS197EC', '80', 94, '80', 177, 74),
('Pohl', 'Lodene', 'FDL578EC', '59', 71, '59', 178, 55),
('Probert', 'Paul', 'DVH443EC', '109', 139, '109', 179, 111),
('Purdon', 'Herma', 'BTP200EC', '177', 234, '177', 180, 189),
('Quin', 'Reg', 'HXM508EC', '176', 232, '176', 181, 187),
('Quin', 'Ron', 'JGM099EC', '176', 233, '176', 182, 188),
('Randall ', 'Charles', 'CYR617EC', '31', 38, '31', 183, 34),
('Randall ', 'Charles', 'DYR165EC', '31', 38, '31', 184, 35),
('Reijman', 'Andrea', 'HLF437EC', '168', 222, '168', 185, 178),
('Reynolds', 'Gordon', 'HFM893EC', '209', 286, '209', 186, 243),
('Reynolds', 'Linda', 'HFM893EC', '209', 287, '209', 186, 244),
('Richardson', 'John', 'FKL369EC', '106', 135, '106', 187, 107),
('Richardson', 'Margie', 'FKL369EC', '106', 136, '106', 187, 108),
('Rodrigues', 'Ricardo', 'FZX734EC', '246', 339, '246', 188, 290),
('Rodrigues', 'Elzabe', 'FWD117EC', '246', 340, '246', 189, 291),
('Roll', 'Sue', 'FRB204EC', '223', 307, '223', 190, 261),
('Roos', 'Johan', 'DSY521EC', '10', 11, '10', 191, 10),
('Roos', 'Anne', 'DSY521EC', '10', 12, '10', 191, 11),
('Russell', 'Phyl', 'FDS959EC', '161', 212, NULL, 192, 170),
('Sandilands ', 'Robert', 'DJM134EC', '199', 267, '199', 193, 222),
('Sandilands ', 'Marlene', 'DJM134EC', '199', 268, '199', 193, 223),
('Sansom', 'Kathleen', 'FWH707EC', '81', 95, '81', 194, 75),
('Scarterfield', 'Delene', 'CLR019EC', '46', 58, '46', 195, 48),
('Scheepers', 'Lucille', 'DGW047EC', '95', 114, '95', 196, 92),
('Schoning', 'Peter', 'HJF512EC', '196', 262, '196', 197, 215),
('Schoning', 'Lynda', 'HJF512EC', '196', 263, '196', 197, 216),
('Schorn', 'Mike', 'CX19808', '179', 236, '179', 198, 192),
('Schorn', 'Joan', 'CX19808', '179', 237, '179', 198, 193),
('Sheard', 'David ', 'HLV153EC', '96', 118, '96', 199, 93),
('Skipper', 'Tony', 'FVR827EC', '162', 214, '162', 200, 172),
('Skipper', 'Bonny', 'FVR827EC', '162', 213, '162', 200, 171),
('Slater', 'Malcolm', 'HGB310EC', '4', 5, '4', 154, 5),
('Smethurst', 'Peter', 'HKV728EC', '103', 128, '103', 201, 102),
('Smethurst', 'Edna', 'CXS985EC', '103', 129, '103', 202, 103),
('Smidt', 'Maria', 'FWB872EC', 'F5', 375, 'F5', 203, 299),
('Smit', 'Doreen', 'DWC032EC', '149', 198, '149', 204, 157),
('Smith', 'Ronnie', 'FKJ051EC', '163', 215, '163', 205, 173),
('Smith', 'Junette', 'FBT315EC', '163', 216, '163', 206, 174),
('Smith', 'Rod', 'FF43BDGP', '204', 279, '204', 207, 235),
('Smith', 'Rod', 'WBJ410GP', '204', 279, '204', 208, 236),
('Smith', 'Hillary', 'WBJ410GP', '204', 280, '204', 208, 237),
('Smith', 'Kay', 'JHS950EC', 'G1', 377, NULL, 209, 300),
('Snodgrass', 'Robert', 'DML026EC', '153', 202, '153', 210, 162),
('Snodgrass', 'Margaret', 'DML026EC', '153', 203, '153', 210, 163),
('Soine', 'Patricia', 'FVD586', '124', 161, '124', 211, 131),
('Sparks', 'George', 'DLW025EC', '30', 36, '30', 212, 32),
('Sparks', 'Marlene', 'DLW025EC', '30', 37, '30', 212, 33),
('Sparks', 'Rob', 'DMK357EC', '170', 225, NULL, 213, 181),
('Sparks', 'Marj', 'DMK357EC', '170', 226, '170', 213, 182),
('Spavins', 'Roy', 'HSR513EC', '183', 244, '183', 214, 200),
('Spavins', 'Val', 'HNB434EC', '183', 243, '183', 215, 199),
('Spieker', 'Fransje', 'DZB269EC', '158', 209, '158', 216, 167),
('Stavridis', 'Kay', 'HRS307EC', '89', 106, '89', 217, 84),
('Stuart', 'Andy', 'HKT336EC', 'E2', 360, NULL, 218, 298),
('Stuart', 'Lesley', 'HKT336EC', '93', 110, '93', 218, 89),
('Stylianou', 'Kathy', 'HSJ748EC', '190', 253, '190', 219, 206),
('Summers', 'Margaret', 'WYH956GP', '136', 183, '136', 220, 146),
('Surmon', 'Alma', 'CRW946EC', '133', 179, '133', 221, 143),
('Surtees', 'Yvonne', 'DNZ760EC', '109', 140, '109', 222, 112),
('Svendsen', 'Eddie', 'HHF724EC', '142', 189, '142', 223, 152),
('Swart', 'Carel', 'DFR918EC', '141', 188, '141', 224, 151),
('Tarr', 'Una ', 'BLY517EC', '23', 25, '23', 225, 20),
('Tennant', 'Cecil', 'CCT222EC', '210', 288, '210', 226, 245),
('Tennant', 'Heather', 'CCT222EC', '210', 289, '210', 226, 246),
('Thackwray', 'Mary', 'HHR230EC', '230', 317, '230', 227, 268),
('Thatcher', 'Janet', 'XWY287GP', '239', 330, '239', 228, 281),
('Thompson ', 'Allen', 'DJY206EC', '102', 126, '102', 229, 100),
('Thompson ', 'Helen', 'DJY206EC', '102', 127, '102', 229, 101),
('Tilly', 'Eileen', 'CXC724EC', '97', 119, '97', 230, 94),
('Tipper', 'Gay', 'HLT258EC', '182', 242, '182', 231, 198),
('Truscott', 'Martie', 'JGK003EC', '71', 84, '71', 232, 66),
('Truscott', 'Jim', 'FCW319EC', '227', 312, '227', 233, 266),
('Truscott', 'Maureen', 'FCW319EC', '227', 313, '227', 233, 267),
('Van der Merwe', 'Rina', 'CLL533EC', '130', 176, '130', 234, 142),
('Van der Merwe', 'Gert', 'FVV734EC', '164', 217, '164', 235, 175),
('Van der Merwe', 'Jean', 'FVV734EC', '164', 218, '164', 235, 176),
('Van der Merwe', 'Mauritz', 'FGC630EC', '244', 335, '244', 236, 286),
('Van der Merwe', 'Ria', 'FGC630EC', '244', 336, '244', 236, 287),
('Van der Poel', 'Athol', 'HNJ570EC', '211', 290, '211', 237, 247),
('Van der Poel', 'Glenda', 'FMM987EC', '211', 291, '211', 238, 248),
('Van der Walt', 'Louis', 'DKF218EC', '27', 32, '27', 239, 27),
('Van der Walt', 'Louis', 'HNJ570EC', '27', 32, '27', 237, 28),
('Van Hasselt', 'Conrad', 'HLV805EC', '90', 107, '90', 240, 85),
('Van Zyl', 'Annette', 'HLV805EC', '58', 69, '58', 240, 54),
('Versfeld', 'Tony', 'DWT499EC', '169', 223, NULL, 241, 179),
('Versfeld', 'Trish', 'DWT499EC', '169', 224, NULL, 241, 180),
('Vorster', 'Sterna', 'CNN446EC', '218', 300, '218', 242, 255),
('Wallace', 'Jenny', 'JHD643EC', '18', 20, '18', 243, 15),
('Watson', 'Daphne', 'HYY712EC', '28', 33, '28', 244, 29),
('Webber', 'Una ', 'FRR810EC', '39', 47, '39', 245, 42),
('Weber', 'Rita', 'DXX471EC', '45D', 57, '45D', 246, 47),
('Werner', 'Flo', 'CYL047EC', '112', 145, NULL, 247, 116),
('Westley', 'Garnett', 'FTK576EC', '110', 142, NULL, 248, 113),
('Wheelwright', 'June', 'HZZ746EC', '192', 256, '192', 249, 209),
('Wiblin', 'Sandra', 'HSF132EC', '61', 74, '61', 250, 58),
('Wight', 'Jean', 'DMR169EC', '140', 187, '140', 251, 150),
('Wilkins', 'Roy', 'FYC950EC', '173', 229, '173', 252, 184),
('Wilkins', 'Roy', 'FYC619EC', '173', 229, '173', 253, 185),
('Williams', 'Bruce', 'FHS788EC', '125', 163, '125', 254, 133),
('Williams', 'Joy', 'FHS788EC', '125', 162, '125', 254, 132),
('Wilmot', 'Brian', 'HWT059EC', '3', 3, '3', 255, 3),
('Wood', 'Don', 'HBD296EC', '191', 254, '191', 256, 207),
('Wood', 'Rosemary', 'HBD296EC', '191', 255, '191', 256, 208);

DROP TABLE IF EXISTS `veh01_bak`;
CREATE TABLE `veh01_bak` (
  `surname` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cottage_no` varchar(20) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `regno` varchar(20) DEFAULT NULL,
  `cottage` varchar(30) DEFAULT NULL,
  `people_id` int(8) DEFAULT NULL,
  `people_cottage` varchar(10) DEFAULT NULL,
  `vehicle_id` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `veh01_bak`;
INSERT INTO `veh01_bak` (`surname`, `name`, `cottage_no`, `suffix`, `regno`, `cottage`, `people_id`, `people_cottage`, `vehicle_id`) VALUES
('Surname', 'Name', 'CottageNo', 'Suffix', 'VehicleRegNo', 'Cottage', NULL, NULL, NULL),
('Aab', 'Willie', '19', '', 'HWD892EC', '19', 21, '19', 2),
('Acheson', 'Jacquie', '117', '', 'HVT505EC', '117', 152, '117', 3),
('Adderley', 'Nora', '15', '', NULL, '15', 17, '15', NULL),
('Aldis', 'Peter', '33', '', 'FNZ137EC', '33', 40, '33', 5),
('Aldis', 'Babs', '33', '', 'FNZ137EC', '33', 41, '33', 5),
('Alston', 'Arnold', '111', '', 'HKM920EC', '111', 143, '111', 6),
('Alston', 'Marcia', '111', '', 'HKM920EC', '111', 144, '111', 6),
('Andrews', 'Wyn', '83', '', 'HKZ579EC', '83', NULL, NULL, 7),
('Archer', 'Daphne', '135', '', 'HBH017EC', '135', 182, '135', 8),
('Armstrong', 'Gillian', '92', '', 'CAP22EC', '92', 109, '92', 9),
('Armstrong ', 'Don', '245', '', 'DMH510EC', '245', 337, '245', 10),
('Armstrong ', 'Helen', '245', '', 'DMH510EC', '245', 338, '245', 10),
('Atkinson', 'Patrick', '128', 'B', 'DXN521EC', '128B', NULL, NULL, 11),
('Atkinson ', 'Rob', '128', 'A', 'FDL396EC', '128A', 170, '128A', 12),
('Atkinson ', 'Jean', '128', 'A', 'FDL396EC', '128A', 173, '128A', 12),
('Aylward', 'Brian', '82', '', 'HYC082EC', '82', 96, '82', 13),
('Aylward', 'Janet', '82', '', 'HYC082EC', '82', 97, '82', 13),
('Bailes ', 'Pat', '193', '', 'FSW620EC', '193', 257, '193', 14),
('Barclay', 'Pamela', 'H', '4', NULL, 'H4', 383, 'H4', NULL),
('Barnes', 'June', '65', '', NULL, '65', 79, '65', NULL),
('Bartlett', 'Lyndon', '85', '', 'FZF804EC', '85', 102, '85', 15),
('Bartlett', 'Marion', '85', '', 'FZF804EC', '85', 101, '85', 15),
('Basson', 'Lynette', '215', '', 'FRG451EC', '215', 296, '215', 16),
('Bawden', 'Maureen', '14', '', NULL, '14', 16, '14', NULL),
('Beaumont', 'Peter ', '67', '', 'HTD748EC', '67', 80, '67', 17),
('Beaumont', 'Mike', '217', '', NULL, '217', 299, '217', NULL),
('Bellingan', 'Stan', 'F', '4', NULL, 'F4', NULL, NULL, NULL),
('Bentley', 'Glenys', '137', '', 'JBH661EC', '137', 184, '137', 18),
('Beresford', 'Denise', '11', '', 'FFY672EC', '11', 13, '11', 19),
('Berry', 'Jessie', 'C', '1', NULL, 'C1', 349, 'C1', NULL),
('Blackbeard', 'Edith', '114', '', 'FMJ915EC', '114', 148, '114', 20),
('Bodill', 'Meryl', '84', '', 'FZD836EC', '84', 100, '84', 21),
('Bodill', 'Harold', 'E', '2', NULL, 'E2', NULL, NULL, NULL),
('Border', 'Tony', '75', '', 'FPH303EC', '75', 87, '75', 22),
('Border', 'Tricia', '75', '', 'FPH303EC', '75', 88, '75', 22),
('Botha', 'Liz', '44', 'B', 'HJM399EC', '44B', 55, NULL, 23),
('Bothomley', 'Jean', '73', '', 'CZY893EC', '73', 86, '73', 24),
('Bowen', 'Dot', 'B', '5', NULL, 'B5', NULL, NULL, NULL),
('Boyce', 'Robert', '160', '', 'DGJ454EC', '160', 211, '160', 25),
('Boyce', 'Jenne', '160', '', 'DGJ454EC', '160', 210, '160', 25),
('Boyd', 'David', '206', '', 'BLB147EC', '206', 283, '206', 26),
('Bradfield', 'Maurice', '120', '', 'DWT148EC', '120', 156, '120', 27),
('Bradfield', 'Maurice', '120', '', 'BMF136EC', '120', 156, '120', 28),
('Bramwell ', 'Horace', '226', '', 'JDB165EC', '226', 310, '226', 29),
('Bramwell ', 'Sharon', '226', '', 'JDB165EC', '226', 311, '226', 29),
('Brans', 'Irene', '238', '', 'FGJ798EC', '238', 329, '238', 30),
('Bredenkamp', 'Mary', '88', '', 'DJN689EC', '88', 105, '88', 31),
('Breeden', 'Gavin', '42', '', NULL, '42', 51, '42', NULL),
('Brown', 'Pauline', '44', 'A', NULL, '44A', 54, '44A', NULL),
('Brown', 'Mike', '212', '', 'DVF420EC', '212', 293, '212', 32),
('Brown', 'Jan', '212', '', 'DVF430EC', '212', 292, '212', 33),
('Brown', 'Cindy', '247', '', 'FRR272EC', '247', 341, NULL, 34),
('Bruton', 'Betty', '86', '', 'DZ2G72EC', '86', 103, '86', 35),
('Buisson-Street', 'Greta', '116', '', 'CMG469EC', '116', 151, '116', 36),
('Burgess', 'Roy', '237', '', 'DTV045EC', '237', 328, '237', 37),
('Bushell', 'Peter', 'H', '1', 'HZW854EC', 'H1', 381, 'H1', 38),
('Butcher', 'Raye', '123', '', NULL, '123', 160, '123', NULL),
('Canny', 'Athol', '213', '', 'CSD865EC', '213', 294, '213', 39),
('Canny', 'Cynthia', '213', '', 'DHM898EC', '213', 295, '213', 40),
('Chandler', 'Dennis', '232', '', 'CX4503', '232', 321, '232', 41),
('Chandler', 'Sue', '232', '', 'CX4503', '232', 320, '232', 41),
('Charter', 'Lyn', '171', '', NULL, '171', 227, '171', NULL),
('Chaston', 'Dave', '24', '', 'JMK756EC', '24', 26, NULL, 42),
('Chaston', 'Jenny', '24', '', 'JMK756EC', '24', 27, NULL, 42),
('Chunnett', 'Ivo', '126', '', 'HSM656EC', '126', 164, '126', 43),
('Chunnett', 'Tessa', '126', '', 'HSM656EC', '126', 165, '126', 43),
('Clark', 'Glenys', '66', '', 'JDT641EC', '66', 52, NULL, 44),
('Clarke', 'Studley', '113', '', 'CNJ663EC', '113', 146, '113', 45),
('Clarke', 'Joanne', '113', '', 'CNJ663EC', '113', 147, '113', 45),
('Clayton', 'Mike', '100', '', 'FLJ399EC', '100', 123, '100', 46),
('Clegg', 'Ralph', 'E', '6', NULL, 'E6', 363, 'E6', NULL),
('Cleugh', 'Marian', '156', '', 'DSH543EC', '156', 207, '156', 47),
('Clohessy', 'Helen', '68', '', 'FVF834EC', '68', 81, '68', 48),
('Clough', 'Pat', '235', '', 'HCR861EC', '235', 326, '235', 49),
('Coetzer', 'Mabel', '203', '', 'HFN409EC', '203', 278, '203', 50),
('Coghlan', 'Maude', '105', '', 'HFS156EC', '105', 134, '105', 51),
('Collett', 'Trevor', '107', '', 'DHV036EC', '107', 137, '107', 52),
('Collett', 'Winsome', '107', '', 'DHV036EC', '107', 138, '107', 52),
('Collett ', 'Robin', '22', '', 'DSG636EC', '22', 24, '22', 53),
('Collett ', 'Trevor', '201', '', 'HXD953EC', '201', 275, '201', 54),
('Combrink', 'Elizabeth', '35', '', NULL, '35', 43, '35', NULL),
('Cooper', 'Liz', '178', '', 'FND961EC', '178', 235, '178', 55),
('Coster', 'Joy', '6', '', 'FMK656EC', '6', 7, '6', 56),
('Coulter', 'Christine', 'F', '7', NULL, 'F7', 376, 'F7', NULL),
('Cowie', 'Dallas', '99', '', 'DLT894EC', '99', 121, '99', 57),
('Cowie', 'Helen', '99', '', 'DVW529EC', '99', 122, '99', 58),
('Crothall', 'Rob ', '195', '', 'HHL175EC', '195', 260, NULL, 59),
('Crothall', 'Gwynn', '195', '', 'HKR226EC', '195', 261, NULL, 60),
('Dalgety', 'Jenny', 'C', '3', NULL, 'C3', 351, 'C3', NULL),
('Danilatos', 'Bessie', '55', '', 'HTW372EC', '55', 68, '55', 61),
('Day', 'LYN', '52', '', 'DTG813EC', '52', 64, NULL, 62),
('De Flamingh', 'Hannie', '148', '', NULL, '148', 197, '148', NULL),
('De Jaeger ', 'Karel', '60', '', 'HDM396EC', '60', 72, '60', 63),
('De Jaeger ', 'Ems', '60', '', 'HDM464EC', '60', 73, '60', 64),
('De Wet', 'Piet', '58', 'A', 'JGD497EC', '58A', NULL, NULL, 65),
('Denis', 'Rene', '144', '', 'FDL674EC', '144', 191, '144', 66),
('Denis', 'Eileen', '144', '', 'DVZ396EC', '144', 192, '144', 67),
('Dicken', 'David', '200', 'C', 'CZC234EC', '200C', 273, '200C', 68),
('Dicken', 'Christiane', '200', 'C', 'FDF451EC', '200C', 274, '200C', 69),
('Doyle', 'Trevor', '62', '', 'CXW747EC', '62', 75, '62', 70),
('Duggan', 'Bob ', '197', '', 'DTT765EC', '197', 264, '197', 71),
('Duggan', 'Bob ', '197', '', 'FTW297EC', '197', 264, '197', 72),
('Duggan', 'Bob ', '197', '', 'HYX106EC', '197', 264, '197', 73),
('Dugmore ', 'Val', '36', '', 'DPX378EC', '36', 44, '36', 74),
('Dullabh', 'Dhirajlal', 'E', '8', NULL, 'E8', 365, 'E8', NULL),
('Dyer', 'Liane', '131', '', NULL, '131', 177, '131', NULL),
('Feather', 'John', '233', '', 'FXB228MP', '233', 322, '233', 75),
('Feather', 'Eileen', '233', '', 'HDL539MP', '233', 323, '233', 76),
('Findlay', 'Colin', '32', '', 'FYN457EC', '32', 39, NULL, 77),
('Ford', 'Gay', '200', '', 'BJP334EC', '200', 269, '200', 78),
('Ford', 'Gay', '200', '', 'DYM006EC', '200', 269, '200', 79),
('Forster ', 'John', '87', '', 'FZG584EC', '87', 104, '87', 80),
('Forward', 'Des', '185', '', 'HRV885EC', '185', 247, '185', 81),
('Foster', 'Charl', '167', '', NULL, '167', 221, '167', NULL),
('Fowler', 'Flo', '54', '', 'DWT779EC', '54', 67, '54', 82),
('Fowler', 'Christine', '165', '', 'DGT489EC', '165', 219, '165', 83),
('Fox', 'Jim', '104', '', 'CLG264EC', '104', 130, '104', 84),
('Fricker', 'Paddy', '38', '', 'NY141021', '38', 46, '38', 85),
('Gadd', 'Marion', '217', '', 'HMK262EC', '217', 298, '217', 86),
('Gallagher', 'KRIS', '207', '', 'FSD562EC', '207', 284, '207', 87),
('George', 'Yvonne', '20', '', 'JJK241EC', '20', 22, '20', 88),
('Gericke', 'Wilma', '7', '', 'JCH026EC', '7', 8, NULL, 89),
('Gething', 'Peggy', 'D4', '', 'JJL820EC', 'D4', 357, 'D4', 90),
('Gie', 'John', '150', '', '001GIEEC', '150', 199, '150', 91),
('Gie', 'John', '150', '', 'ECGIE001', '150', 199, '150', 92),
('Gifford', 'James', '202', '', 'JLZ480EC', '202', 276, '202', 93),
('Gifford', 'Helen', '202', '', 'JLZ480EC', '202', 277, '202', 93),
('Gilfillan', 'Ted', '129', '', NULL, '129', NULL, NULL, NULL),
('Gilfillan', 'Rem', '129', '', NULL, '129', NULL, NULL, NULL),
('Gill', 'Ant', '221', '', 'HJD761EC', '221', 304, '221', 94),
('Gill', 'Ant', '221', '', 'FTW975EC', '221', 304, '221', 95),
('Gill', 'Penny', '221', '', 'FNJ397EC', '221', 305, '221', 96),
('Glisson', 'Hilary', '5', '', 'DFS501EC', '5', 6, '5', 97),
('Glisson', 'Hilary', '5', '', 'HRB336EC', '5', 6, '5', 98),
('Goetze', 'Eris', '138', '', 'DTR954EC', '138', 185, '138', 99),
('Golding', 'Miemie', '174', '', NULL, '174', 230, '174', NULL),
('Gradwell ', 'Rod ', '220', '', 'FLV535EC', '220', 303, '220', 100),
('Gradwell ', 'Lyn', '220', '', NULL, '220', 302, '220', NULL),
('Haig', 'Doug', 'D', '3a', NULL, 'D3a', NULL, NULL, NULL),
('Haig', 'Jann', 'D', '3b', NULL, 'D3b', NULL, NULL, NULL),
('Hammond', 'Chris', '12', '', 'CXG893EC', '12', 14, '12', 101),
('Harman', 'Marygold', '216', '', NULL, '216', 297, '216', NULL),
('Hart', 'June', '175', '', 'DRK467EC', '175', 231, '175', 102),
('Hendry', 'Margie', '121', '', 'JBZ364EC', '121', 157, '121', 103),
('Henshall', 'Richard', '231', '', 'HDK664EC', '231', 319, '231', 104),
('Henshall', 'Judy', '231', '', 'FSR967EC', '231', 318, '231', 105),
('Hill', 'Carole', '100', '', '-', '100', 124, '100', 106),
('Hill', 'Kathie', '214', '', NULL, '214', NULL, NULL, NULL),
('Hilton-Barber', 'Moira', '118', '', 'FMW483EC', '118', 153, '118', 107),
('Hilton-Barber', 'Moira', '118', '', 'DHD031EC', '118', 153, '118', 108),
('Hobbs', 'Bob', '180', '', 'HSR455EC', '180', 238, '180', 109),
('Hobbs', 'Bob', '180', '', 'HSR455EC', '180', 238, '180', 109),
('Hopper', 'Sally', 'C', '5', NULL, 'C5', 63, '51B', NULL),
('Hoseck', 'Eddie', '205', '', 'DRP429EC', '205', 282, '205', 110),
('Hoseck', 'Jenny', '205', '', 'DRP429EC', '205', 281, '205', 110),
('Howes', 'Godfrey', '64', '', 'FFG466EC', '64', 77, '64', 111),
('Howes', 'Meryl', '64', '', 'FFG466EC', '64', 78, '64', 111),
('Impey', 'Teresa', 'B', '2', NULL, 'B2', 346, 'B2', NULL),
('Jacobs', 'Joan', '44', '', 'JCX425EC', '44', 53, '44', 112),
('Jones', 'Jos', '208', '', 'HDY029EC', '208', 285, '208', 113),
('Judge', 'Marge', '222', '', 'HNZ741EC', '222', 306, '222', 114),
('Kelly ', 'Don', '181', '', 'HKW620EC', '181', 241, '181', 115),
('Kelly ', 'Micky', '181', '', 'HKW620EC', '181', 240, '181', 115),
('Kemp', 'Clifford', '225', '', 'HBJ932EC', '225', 308, '225', 116),
('Kemp', 'Beryl', '225', '', 'HBN828EC', '225', 309, '225', 117),
('Kietzmann ', 'Elize', '241', '', 'JBP806EC', '241', NULL, NULL, 118),
('Kolesky', 'Lyn', '139', '', 'HZS047EC', '139', 186, '139', 119),
('Konig', 'Marion', '134', '', 'FPD642EC', '134', 181, '134', 120),
('Krein', 'Loretta', '132', '', NULL, '132', 178, '132', NULL),
('Lampier Grist', 'Suzette', '1', '', 'DKY056EC', '1', 1, '1', 121),
('Langley', 'Trevor', '29', '', 'HLD245EC', '29', 34, '29', 122),
('Langley', 'Sue', '29', '', 'HLD245EC', '29', 35, '29', 122),
('Lansdell', 'Terrence', '77', '', 'HMF549EC', '77', 90, '77', 123),
('Lansdell', 'Helen', '77', '', 'HMF549EC', '77', 91, '77', 123),
('Lapham', 'Lyn', '243', '', 'HZB251EC', '243', 334, '243', 124),
('Laubscher', 'Dennis', '115', '', 'FTH243EC', '115', 149, '115', 125),
('Laubscher', 'Gwendoline', '115', '', 'FTH243EC', '115', 150, '115', 125),
('Lear', 'Peter', '189', '', 'HNJ236EC', '189', 252, '189', 126),
('Lear', 'June', '187', '', 'CX27232', '187', 250, '187', 127),
('Leeming', 'Roy', '104', 'A', 'FRW646EC', '104A', 131, '104A', 128),
('Lello', 'Margaret', '70', '', 'WDF620GP', '70', 83, '70', 129),
('Leonard', 'Martin', '234', '', 'DKC858EC', '234', 325, '234', 130),
('Leonard', 'Wendy', '234', '', 'HNR102EC', '234', 324, '234', 131),
('Leonard', 'Martin', '234', '', 'FLT416EC', '234', 325, '234', 132),
('Linforth', 'Brian', '25', '', 'HVG646EC', '25', 28, '25', 133),
('Linforth', 'Mo', '25', '', 'HWW265EC', '25', 29, '25', 134),
('Lloyd', 'Joy', '78', '', 'JCS969EC', '78', 92, '78', 135),
('Lobban', 'James', '146', '', NULL, '146', 195, '146', NULL),
('Lobban', 'Rona', '146', '', NULL, '146', 196, '146', NULL),
('Long', 'Phyll', '63', '', 'PGR286EC', '63', 76, '63', 136),
('Louw', 'Jenny', '72', '', 'FRF778EC', '72', 85, NULL, 137),
('Macpherson', 'Ian', '26', '', 'FGW141EC', '26', 30, '26', 138),
('Macpherson', 'Marion', '26', '', 'FGW141EC', '26', 31, '26', 138),
('Mann', 'Tony', '21', '', 'FGX124EC', '21', 23, '21', 139),
('Mansfield', 'Veronica', '49', '', NULL, '49', 59, '49', NULL),
('Marshall', 'Marguerite', '185', '', 'DYF699EC', '185', 248, '185', 140),
('McCarthy', 'Terence', '249', '', 'FTN657EC', '249', 344, '249', 141),
('McCarthy', 'Doreen', '249', '', 'FXG672EC', '249', 345, '249', 142),
('McGhie', 'Richard', '194', '', 'BTZ165EC', '194', 258, '194', 143),
('McGhie', 'Mary', '194', '', 'DMT062EC', '194', 259, '194', 144),
('McLean', 'Robin', 'F', '1', NULL, 'F1', NULL, NULL, NULL),
('McLean', 'Brian', '154', '', 'HLB113EC', '154', 204, '154', 145),
('McLean', 'Mary', '154', '', 'HLB113EC', '154', 205, '154', 145),
('McLeod', 'Marion', '152', '', 'CGG981EC', '152', 201, '152', 146),
('McPhee', 'Mirelle', '242', '', 'CZZ821EC', '242', 333, '242', 147),
('Meiring', 'Claire', 'G', '4', NULL, 'G4', 380, 'G4', NULL),
('Meyer', 'Gwen', '98', '', NULL, '98', 120, '98', NULL),
('Meyer', 'Nancy', '151', '', 'DFR717EC', '151', 200, '151', 148),
('Mildenhall', 'Justin', '200', 'B', 'HHR178EC', '200B', 271, '200B', 149),
('Mildenhall', 'Eleanor', '200', 'B', 'HHR178EC', '200B', 272, '200B', 149),
('Milln', 'Elisabeth', '172', '', 'FCJ370EC', '172', 228, '172', 150),
('Mitchell', 'Tony', '198', '', 'HXH954EC', '198', 265, '198', 151),
('Mitchell', 'Trish', '198', '', 'HVT172EC', '198', 266, '198', 152),
('Moffat', 'Sally', '200', 'A', 'FNW428EC', '200A', 270, NULL, 153),
('Mogilnicka', 'Eva', '4', '', 'HGB310EC', '4', 4, '4', 154),
('Moorcroft', 'Eulalie', '2', '', 'CNH875EC', '2', 2, '2', 155),
('Moore', 'Dermot ', '127', '', 'JMT392EC', '127', 166, '127', 156),
('Moore', 'Margie', '127', '', 'CXT166EC', '127', 167, '127', 157),
('Moore', 'Owen', '145', '', 'DRW043EC', '145', 193, '145', 158),
('Moore', 'Colleen', '145', '', 'HXT453EC', '145', 194, '145', 159),
('Morris', 'Cecile', '9', '', NULL, '9', 10, '9', NULL),
('Naude', 'Burg', '224', '', 'HML163EC', '224', NULL, NULL, 160),
('Naude', 'Arleen', '224', '', 'HML163EC', '224', NULL, NULL, 160),
('Neame', 'Sue', '101', '', 'DYR125EC', '101', 125, '101', 161),
('Neigh van Lier', 'Margie', '76', '', NULL, '76', 89, '76', NULL),
('Nel', 'Priscilla', '240', '', 'HWF756EC', '240', 331, '240', 162),
('Nelson', 'Dawn', '188', '', 'FFR691EC', '188', 251, '188', 163),
('Newlands', 'Mike', '91', '', 'HBD923EC', '91', 108, '91', 164),
('Newlands', 'Mike', '91', '', 'DPC026EC', '91', 108, '91', 165),
('Norman', 'Graham', '128', 'C', 'CVJ098EC', '128C', 171, '128C', 166),
('Norman', 'Joan', '128', 'C', 'CVJ098EC', '128C', 172, '128C', 166),
('Oliver', 'Janet', '40', '', 'HYJ269EC', '40', 48, '40', 167),
('Oosthuizen', 'Averil', '37', '', 'JCH190EC', '37', 45, '37', 168),
('O\'Reilly', 'Marge', '17', '', 'JMB956EC', '17', 19, '17', 169),
('Painter', 'Cliff', '53', '', 'HBR392EC', '53', 65, '53', 170),
('Painter', 'Pam', '53', '', 'HBR392EC', '53', 66, '53', 170),
('Papenhuijzen', 'Astrid', '79', '', NULL, '79', 93, '79', NULL),
('Peacock', 'Prue', '236', '', NULL, '236', NULL, NULL, NULL),
('Pellew', 'Charles ', '248', '', 'HYF935EC', '248', 342, '248', 171),
('Pellew', 'Myrna', '248', '', 'JHZ915EC', '248', 343, '248', 172),
('Phillips', 'Peter', '94', '', 'FYG082EC', '94', 112, '94', 173),
('Phillips', 'Cecile', '94', '', 'HKG093EC', '94', 113, '94', 174),
('Phillips', 'Ivor', '122', '', 'CVS875EC', '122', 158, '122', 175),
('Phillips', 'Leslie-Anne', '122', '', 'HBL099EC', '122', 159, '122', 176),
('Piquet', 'Yvonne', '80', '', 'HLS197EC', '80', 94, '80', 177),
('Pohl', 'Lodene', '59', '', 'FDL578EC', '59', 71, '59', 178),
('Probart ', 'Walter', '134', '', NULL, '134', 180, '134', NULL),
('Probert', 'Paul', '109', '', 'DVH443EC', '109', 139, '109', 179),
('Purdon', 'Herma', '177', '', 'BTP200EC', '177', 234, NULL, 180),
('Purdon', 'Herma', '177', '', 'BTP200EC', '177', 234, '177', 180),
('Quin', 'Reg', '176', '', 'HXM508EC', '176', 232, '176', 181),
('Quin', 'Ron', '176', '', 'JGM099EC', '176', 233, '176', 182),
('Randall ', 'Charles', '31', '', 'CYR617EC', '31', 38, '31', 183),
('Randall ', 'Charles', '31', '', 'DYR165EC', '31', 38, '31', 184),
('Rautenbach', 'Gillian', 'F', '2', NULL, 'F2', NULL, NULL, NULL),
('Reijman', 'Andrea', '168', '', 'HLF437EC', '168', 222, '168', 185),
('Reynolds', 'Gordon', '209', '', 'HFM893EC', '209', 286, '209', 186),
('Reynolds', 'Linda', '209', '', 'HFM893EC', '209', 287, '209', 186),
('Richardson', 'John', '106', '', 'FKL369EC', '106', 135, '106', 187),
('Richardson', 'Margie', '106', '', 'FKL369EC', '106', 136, '106', 187),
('Rimmer', 'Pat', '13', '', NULL, '13', 15, '13', NULL),
('Roberts', 'Lynn', '16', '', NULL, '16', 18, '16', NULL),
('Rodrigues', 'Ricardo', '246', '', 'FZX734EC', '246', 339, '246', 188),
('Rodrigues', 'Elzabe', '246', '', 'FWD117EC', '246', 340, '246', 189),
('Roll', 'Sue', '223', '', 'FRB204EC', '223', 307, '223', 190),
('Roos', 'Johan', '10', '', 'DSY521EC', '10', 11, '10', 191),
('Roos', 'Anne', '10', '', 'DSY521EC', '10', 12, '10', 191),
('Roxburgh', 'Gerald', '104', 'B', NULL, '104B', 132, '104B', NULL),
('Roxburgh', 'Jeni', '104', 'B', NULL, '104B', NULL, NULL, NULL),
('Russell', 'Phyl', '161', '', 'FDS959EC', '161', 212, NULL, 192),
('Sandilands ', 'Robert', '199', '', 'DJM134EC', '199', 267, '199', 193),
('Sandilands ', 'Marlene', '199', '', 'DJM134EC', '199', 268, '199', 193),
('Sansom', 'Kathleen', '81', '', 'FWH707EC', '81', 95, '81', 194),
('Scarterfield', 'Delene', '46', '', 'CLR019EC', '46', 58, '46', 195),
('Scheepers', 'Lucille', '95', '', 'DGW047EC', '95', 114, '95', 196),
('Schoning', 'Peter', '196', '', 'HJF512EC', '196', 262, '196', 197),
('Schoning', 'Lynda', '196', '', 'HJF512EC', '196', 263, '196', 197),
('Schorn', 'Mike', '179', '', 'CX19808', '179', 236, '179', 198),
('Schorn', 'Joan', '179', '', 'CX19808', '179', 237, '179', 198),
('Scoble', 'Bev', 'C', '4', NULL, 'C4', NULL, NULL, NULL),
('Sheard', 'David ', '96', '', 'HLV153EC', '96', 118, '96', 199),
('Sheard', 'Carol', '96', '', NULL, '96', 117, '96', NULL),
('Shelver', 'Georgie', 'C', '2', NULL, 'C2', 350, 'C2', NULL),
('Simpkins', 'Sue', 'E', '3&4', NULL, 'E3&4', 361, 'E3&4', NULL),
('Skipper', 'Tony', '162', '', 'FVR827EC', '162', 214, '162', 200),
('Skipper', 'Bonny', '162', '', 'FVR827EC', '162', 213, '162', 200),
('Slater', 'Malcolm', '4', '', 'HGB310EC', '4', 5, '4', 154),
('Smethurst', 'Peter', '103', '', 'HKV728EC', '103', 128, '103', 201),
('Smethurst', 'Edna', '103', '', 'CXS985EC', '103', 129, '103', 202),
('Smidt', 'Maria', 'F', '5', 'FWB872EC', 'F5', 375, 'F5', 203),
('Smit', 'Doreen', '149', '', 'DWC032EC', '149', 198, '149', 204),
('Smith', 'Ronnie', '163', '', 'FKJ051EC', '163', 215, '163', 205),
('Smith', 'Junette', '163', '', 'FBT315EC', '163', 216, '163', 206),
('Smith', 'Rod', '204', '', 'FF43BDGP', '204', 279, '204', 207),
('Smith', 'Rod', '204', '', 'WBJ410GP', '204', 279, '204', 208),
('Smith', 'Hillary', '204', '', 'WBJ410GP', '204', 280, '204', 208),
('Smith', 'Kay', 'G', '1', 'JHS950EC', 'G1', 377, NULL, 209),
('Snodgrass', 'Robert', '153', '', 'DML026EC', '153', 202, '153', 210),
('Snodgrass', 'Margaret', '153', '', 'DML026EC', '153', 203, '153', 210),
('Soine', 'Patricia', '124', '', 'FVD586', '124', 161, '124', 211),
('Sparks', 'George', '30', '', 'DLW025EC', '30', 36, '30', 212),
('Sparks', 'Marlene', '30', '', 'DLW025EC', '30', 37, '30', 212),
('Sparks', 'Rob', '170', '', 'DMK357EC', '170', 225, NULL, 213),
('Sparks', 'Marj', '170', '', 'DMK357EC', '170', 226, '170', 213),
('Spavins', 'Roy', '183', '', 'HSR513EC', '183', 244, '183', 214),
('Spavins', 'Val', '183', '', 'HNB434EC', '183', 243, '183', 215),
('Spearman', 'Maureen', '166', '', NULL, '166', 220, '166', NULL),
('Spieker', 'Fransje', '158', '', 'DZB269EC', '158', 209, '158', 216),
('Spies', 'Sue', '50', 'B', NULL, '50B', NULL, NULL, NULL),
('Stas', 'Margaret', '155', '', NULL, '155', 206, '155', NULL),
('Stavridis', 'Kay', '89', '', 'HRS307EC', '89', 106, '89', 217),
('Steenkamp', 'Doreen', '186', '', NULL, '186', 70, '58A', NULL),
('Stuart', 'Andy', '93', '', 'HKT336EC', 'E2', 360, NULL, 218),
('Stuart', 'Lesley', '93', '', 'HKT336EC', '93', 110, '93', 218),
('Stylianou', 'Kathy', '190', '', 'HSJ748EC', '190', 253, '190', 219),
('Summers', 'Margaret', '136', '', 'WYH956GP', '136', 183, '136', 220),
('Surmon', 'Alma', '133', '', 'CRW946EC', '133', 179, '133', 221),
('Surtees', 'Yvonne', '109', '', 'DNZ760EC', '109', 140, '109', 222),
('Sutton', 'Elizabeth', 'B', '3', NULL, 'B3', 347, 'B3', NULL),
('Svendsen', 'Eddie', '142', '', 'HHF724EC', '142', 189, '142', 223),
('Swanepoel ', 'Danielle', '157', '', NULL, '157', 208, '157', NULL),
('Swanepoel ', 'Andy ', 'F', '3', NULL, 'F3', NULL, NULL, NULL),
('Swart', 'Carel', '141', '', 'DFR918EC', '141', 188, '141', 224),
('Tarr', 'Una ', '23', '', 'BLY517EC', '23', 25, '23', 225),
('Taute', 'Isobel', 'E', '7', NULL, 'E7', 364, 'E7', NULL),
('Taylor', 'Pam', '74', '', NULL, '74', 61, '50C', NULL),
('Tennant', 'Cecil', '210', '', 'CCT222EC', '210', 288, '210', 226),
('Tennant', 'Heather', '210', '', 'CCT222EC', '210', 289, '210', 226),
('Thackwray', 'Mary', '230', '', 'HHR230EC', '230', 317, '230', 227),
('Thatcher', 'Janet', '239', '', 'XWY287GP', '239', 330, '239', 228),
('Thompson ', 'Allen', '102', '', 'DJY206EC', '102', 126, '102', 229),
('Thompson ', 'Helen', '102', '', 'DJY206EC', '102', 127, '102', 229),
('Tilly', 'Eileen', '97', '', 'CXC724EC', '97', 119, '97', 230),
('Tipper', 'Gay', '182', '', 'HLT258EC', '182', 242, '182', 231),
('Truscott', 'Martie', '71', '', 'JGK003EC', '71', 84, '71', 232),
('Truscott', 'Jim', '227', '', 'FCW319EC', '227', 312, '227', 233),
('Truscott', 'Maureen', '227', '', 'FCW319EC', '227', 313, '227', 233),
('Turner', 'Kathie', '45', '', NULL, '45', 56, '45', NULL),
('Van der Merwe', 'Denise', '34', '', NULL, '34', 42, '34', NULL),
('Van der Merwe', 'Rina', '130', '', 'CLL533EC', '130', 176, '130', 234),
('Van der Merwe', 'Gert', '164', '', 'FVV734EC', '164', 217, '164', 235),
('Van der Merwe', 'Jean', '164', '', 'FVV734EC', '164', 218, '164', 235),
('Van der Merwe', 'Mauritz', '244', '', 'FGC630EC', '244', 335, '244', 236),
('Van der Merwe', 'Ria', '244', '', 'FGC630EC', '244', 336, '244', 236),
('Van der Poel', 'Athol', '211', '', 'HNJ570EC', '211', 290, '211', 237),
('Van der Poel', 'Glenda', '211', '', 'FMM987EC', '211', 291, '211', 238),
('Van der Walt', 'Louis', '27', '', 'DKF218EC', '27', 32, '27', 239),
('Van der Walt', 'Louis', '27', '', 'HNJ570EC', '27', 32, '27', 237),
('Van Hasselt', 'Conrad', '90', '', 'HLV805EC', '90', 107, '90', 240),
('Van Niekerk', 'Stefanus', 'E', '9', NULL, 'E9', NULL, NULL, NULL),
('Van Zyl', 'Annette', '58', '', 'HLV805EC', '58', 69, '58', 240),
('Versfeld', 'Tony', '169', '', 'DWT499EC', '169', 223, NULL, 241),
('Versfeld', 'Trish', '169', '', 'DWT499EC', '169', 224, NULL, 241),
('Verwey', 'Erda', 'C', '6', NULL, 'C6', 354, 'C6', NULL),
('Vorster', 'Sterna', '218', '', 'CNN446EC', '218', 300, '218', 242),
('Vroom', 'Renee', '228', '', NULL, '228', 314, '228', NULL),
('Walker', 'Maureen', 'D', '8', NULL, 'D8', NULL, NULL, NULL),
('Wallace', 'Jenny', '18', '', 'JHD643EC', '18', 20, '18', 243),
('Watson', 'Daphne', '28', '', 'HYY712EC', '28', 33, '28', 244),
('Webber', 'Una ', '39', '', 'FRR810EC', '39', 47, '39', 245),
('Weber', 'Rita', '45', 'D', 'DXX471EC', '45D', 57, '45D', 246),
('Werner', 'Flo', '112', '', 'CYL047EC', '112', 145, NULL, 247),
('Werner', 'Doreen', 'D', '6', NULL, 'D6', 358, 'D6', NULL),
('Wesson', 'Barbara', 'E', '1', NULL, 'E1', 359, 'E1', NULL),
('West', 'Terry', '41', '', NULL, '41', 49, '41', NULL),
('West', 'Margaret', 'E', '13b', NULL, 'E13b', 50, '41', NULL),
('Westley', 'Garnett', '110', '', 'FTK576EC', '110', 142, NULL, 248),
('Wheelwright', 'June', '192', '', 'HZZ746EC', '192', 256, '192', 249),
('White', 'Brian', '8', '', NULL, '8', NULL, NULL, NULL),
('Wiblin', 'Sandra', '61', '', 'HSF132EC', '61', 74, '61', 250),
('Wight', 'Jean', '140', '', 'DMR169EC', '140', 187, '140', 251),
('Wilkins', 'Roy', '173', '', 'FYC950EC', '173', 229, '173', 252),
('Wilkins', 'Roy', '173', '', 'FYC619EC', '173', 229, '173', 253),
('Williams', 'Val', '110', '', NULL, '110', 141, '110', NULL),
('Williams', 'Bruce', '125', '', 'FHS788EC', '125', 163, '125', 254),
('Williams', 'Joy', '125', '', 'FHS788EC', '125', 162, '125', 254),
('Wilmot', 'Brian', '3', '', 'HWT059EC', '3', 3, '3', 255),
('Wilmot', 'Amy', 'E', '13a', NULL, 'E13a', 368, 'E13A', NULL),
('Wilson', 'Pat', '143', '', NULL, '143', NULL, NULL, NULL),
('Wilson', 'Jill', 'E', '5', NULL, 'E5', 362, 'E5', NULL),
('Winter', 'Rosita', 'G', '2', NULL, 'G2', 378, 'G2', NULL),
('Wiseman', 'Elsabe', 'E', '12', NULL, 'E12', NULL, NULL, NULL),
('Wood', 'Don', '191', '', 'HBD296EC', '191', 254, '191', 256),
('Wood', 'Rosemary', '191', '', 'HBD296EC', '191', 255, '191', 256),
('Wormald', 'Agnes', '219', '', NULL, '219', 301, '219', NULL),
('Worrall', 'Jennifer', 'G', '3', NULL, 'G3', 379, 'G3', NULL);

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `id` int(8) NOT NULL,
  `reg_no` varchar(12) NOT NULL,
  `model` int(8) DEFAULT NULL,
  `colour` int(8) DEFAULT NULL,
  `license` varchar(20) DEFAULT NULL,
  `license_exp` date DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `vehicle`;
INSERT INTO `vehicle` (`id`, `reg_no`, `model`, `colour`, `license`, `license_exp`, `user_id`, `changed`) VALUES
(2, 'HWD892EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(3, 'HVT505EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(5, 'FNZ137EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(6, 'HKM920EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(7, 'HKZ579EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(8, 'HBH017EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(9, 'CAP22EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(10, 'DMH510EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(11, 'DXN521EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(12, 'FDL396EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(13, 'HYC082EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(14, 'FSW620EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(15, 'FZF804EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(16, 'FRG451EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(17, 'HTD748EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(18, 'JBH661EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(19, 'FFY672EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(20, 'FMJ915EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(21, 'FZD836EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(22, 'FPH303EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(23, 'HJM399EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(24, 'CZY893EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(25, 'DGJ454EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(26, 'BLB147EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(27, 'DWT148EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(28, 'BMF136EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(29, 'JDB165EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(30, 'FGJ798EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(31, 'DJN689EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(32, 'DVF420EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(33, 'DVF430EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(34, 'FRR272EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(35, 'DZ2G72EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(36, 'CMG469EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(37, 'DTV045EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(38, 'HZW854EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(39, 'CSD865EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(40, 'DHM898EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(41, 'CX4503', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(42, 'JMK756EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(43, 'HSM656EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(44, 'JDT641EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(45, 'CNJ663EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(46, 'FLJ399EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(47, 'DSH543EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(48, 'FVF834EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(49, 'HCR861EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(50, 'HFN409EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(51, 'HFS156EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(52, 'DHV036EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(53, 'DSG636EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(54, 'HXD953EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(55, 'FND961EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(56, 'FMK656EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(57, 'DLT894EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(58, 'DVW529EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(59, 'HHL175EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(60, 'HKR226EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(61, 'HTW372EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(62, 'DTG813EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(63, 'HDM396EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(64, 'HDM464EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(65, 'JGD497EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(66, 'FDL674EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(67, 'DVZ396EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(68, 'CZC234EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(69, 'FDF451EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(70, 'CXW747EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(71, 'DTT765EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(72, 'FTW297EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(73, 'HYX106EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(74, 'DPX378EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(75, 'FXB228MP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(76, 'HDL539MP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(77, 'FYN457EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(78, 'BJP334EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(79, 'DYM006EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(80, 'FZG584EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(81, 'HRV885EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(82, 'DWT779EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(83, 'DGT489EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(84, 'CLG264EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(85, 'NY141021', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(86, 'HMK262EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(87, 'FSD562EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(88, 'JJK241EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(89, 'JCH026EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(90, 'JJL820EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(91, '001GIEEC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(92, 'ECGIE001', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(93, 'JLZ480EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(94, 'HJD761EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(95, 'FTW975EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(96, 'FNJ397EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(97, 'DFS501EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(98, 'HRB336EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(99, 'DTR954EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(100, 'FLV535EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(101, 'CXG893EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(102, 'DRK467EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(103, 'JBZ364EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(104, 'HDK664EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(105, 'FSR967EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(106, '-', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(107, 'FMW483EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(108, 'DHD031EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(109, 'HSR455EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(110, 'DRP429EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(111, 'FFG466EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(112, 'JCX425EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(113, 'HDY029EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(114, 'HNZ741EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(115, 'HKW620EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(116, 'HBJ932EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(117, 'HBN828EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(118, 'JBP806EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(119, 'HZS047EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(120, 'FPD642EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(121, 'DKY056EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(122, 'HLD245EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(123, 'HMF549EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(124, 'HZB251EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(125, 'FTH243EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(126, 'HNJ236EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(127, 'CX27232', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(128, 'FRW646EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(129, 'WDF620GP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(130, 'DKC858EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(131, 'HNR102EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(132, 'FLT416EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(133, 'HVG646EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(134, 'HWW265EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(135, 'JCS969EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(136, 'PGR286EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(137, 'FRF778EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(138, 'FGW141EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(139, 'FGX124EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(140, 'DYF699EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(141, 'FTN657EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(142, 'FXG672EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(143, 'BTZ165EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(144, 'DMT062EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(145, 'HLB113EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(146, 'CGG981EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(147, 'CZZ821EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(148, 'DFR717EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(149, 'HHR178EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(150, 'FCJ370EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(151, 'HXH954EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(152, 'HVT172EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(153, 'FNW428EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(154, 'HGB310EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(155, 'CNH875EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(156, 'JMT392EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(157, 'CXT166EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(158, 'DRW043EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(159, 'HXT453EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(160, 'HML163EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(161, 'DYR125EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(162, 'HWF756EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(163, 'FFR691EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(164, 'HBD923EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(165, 'DPC026EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(166, 'CVJ098EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(167, 'HYJ269EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(168, 'JCH190EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(169, 'JMB956EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(170, 'HBR392EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(171, 'HYF935EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(172, 'JHZ915EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(173, 'FYG082EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(174, 'HKG093EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(175, 'CVS875EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(176, 'HBL099EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(177, 'HLS197EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(178, 'FDL578EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(179, 'DVH443EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(180, 'BTP200EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(181, 'HXM508EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(182, 'JGM099EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(183, 'CYR617EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(184, 'DYR165EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(185, 'HLF437EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(186, 'HFM893EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(187, 'FKL369EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(188, 'FZX734EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(189, 'FWD117EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(190, 'FRB204EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(191, 'DSY521EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(192, 'FDS959EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(193, 'DJM134EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(194, 'FWH707EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(195, 'CLR019EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(196, 'DGW047EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(197, 'HJF512EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(198, 'CX19808', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(199, 'HLV153EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(200, 'FVR827EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(201, 'HKV728EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(202, 'CXS985EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(203, 'FWB872EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(204, 'DWC032EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(205, 'FKJ051EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(206, 'FBT315EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(207, 'FF43BDGP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(208, 'WBJ410GP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(209, 'JHS950EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(210, 'DML026EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(211, 'FVD586', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(212, 'DLW025EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(213, 'DMK357EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(214, 'HSR513EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(215, 'HNB434EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(216, 'DZB269EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(217, 'HRS307EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(218, 'HKT336EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(219, 'HSJ748EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(220, 'WYH956GP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(221, 'CRW946EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(222, 'DNZ760EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(223, 'HHF724EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(224, 'DFR918EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(225, 'BLY517EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(226, 'CCT222EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(227, 'HHR230EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(228, 'XWY287GP', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(229, 'DJY206EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(230, 'CXC724EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(231, 'HLT258EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(232, 'JGK003EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(233, 'FCW319EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(234, 'CLL533EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(235, 'FVV734EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(236, 'FGC630EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(237, 'HNJ570EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(238, 'FMM987EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(239, 'DKF218EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(240, 'HLV805EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(241, 'DWT499EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(242, 'CNN446EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(243, 'JHD643EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(244, 'HYY712EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(245, 'FRR810EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(246, 'DXX471EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(247, 'CYL047EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(248, 'FTK576EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(249, 'HZZ746EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(250, 'HSF132EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(251, 'DMR169EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(252, 'FYC950EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(253, 'FYC619EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(254, 'FHS788EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(255, 'HWT059EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28'),
(256, 'HBD296EC', NULL, NULL, NULL, NULL, 1, '2020-05-09 20:47:28');

DROP TABLE IF EXISTS `vehicle_make`;
CREATE TABLE `vehicle_make` (
  `id` int(8) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `vehicle_make`;
INSERT INTO `vehicle_make` (`id`, `manufacturer`, `user_id`, `changed`) VALUES
(1, 'Audi', 1, '2020-05-09 10:12:10'),
(2, 'BMW', 1, '2020-05-09 10:12:10'),
(3, 'Ford', 1, '2020-05-09 10:12:44'),
(4, 'Volkswagen', 1, '2020-05-09 10:12:44'),
(5, 'Honda', 1, '2020-05-09 10:13:14'),
(6, 'Mercedes Benz', 1, '2020-05-09 10:13:14');

DROP TABLE IF EXISTS `vehicle_model`;
CREATE TABLE `vehicle_model` (
  `id` int(8) NOT NULL,
  `model_name` varchar(20) NOT NULL,
  `make` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE TABLE `vehicle_model`;
INSERT INTO `vehicle_model` (`id`, `model_name`, `make`, `user_id`, `changed`) VALUES
(1, 'Focus', 3, 1, '2020-05-09 10:14:21'),
(2, 'Jazz', 5, 1, '2020-05-09 10:14:55');


ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `address_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ass01`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ass02`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ass03`
  ADD PRIMARY KEY (`email`);

ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `asset_phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

ALTER TABLE `asset_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `atthegate2`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_pgm_i1` (`program`);

ALTER TABLE `colour`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_idx` (`country`);

ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dept_role`
  ADD PRIMARY KEY (`user_id`,`dept_id`) USING BTREE;

ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `electricity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Electricity2` (`meter`,`reading_date`) USING BTREE;

ALTER TABLE `emp01`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks_hist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks_history`
  ADD PRIMARY KEY (`id`,`changed`);

ALTER TABLE `logon_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `med_history`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `med_procedures`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_id` (`people_id`,`group_id`),
  ADD KEY `group_id_const` (`group_id`);

ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `news_users`
  ADD UNIQUE KEY `news_users_u` (`news_id`,`users_id`);

ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Occupation` (`occupation`);

ALTER TABLE `parms_char`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parms_char_name` (`parm_name`);

ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `People_Payments` (`people_id`);

ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_account_ui` (`account_no`);

ALTER TABLE `people_asset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `People_Asset_UI` (`asset_id`,`people_id`);

ALTER TABLE `people_bak`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `people_discipline`
  ADD UNIQUE KEY `people_id` (`people_id`,`discipline_id`);

ALTER TABLE `people_tasks`
  ADD UNIQUE KEY `task_id` (`task_id`,`people_id`);

ALTER TABLE `people_log`
  ADD PRIMARY KEY (`id`,`changed`);

ALTER TABLE `people_news`
  ADD UNIQUE KEY `People_news` (`people_id`,`news_id`);

ALTER TABLE `people_related`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `people_roles`
  ADD UNIQUE KEY `people_id` (`people_id`,`role_id`);

ALTER TABLE `people_rs`
  ADD PRIMARY KEY (`people_id`);

ALTER TABLE `people_skills`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `people_vehicle`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_idx` (`place`);

ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_idx` (`region`);

ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `res01`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `res02`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `rs_members`
  ADD PRIMARY KEY (`rs_id`);

ALTER TABLE `rs_reps`
  ADD UNIQUE KEY `resident_idx` (`resident`);

ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sql_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

ALTER TABLE `user_roles`
  ADD UNIQUE KEY `user_roles_ui` (`user_id`,`role_id`);

ALTER TABLE `valid_accounts`
  ADD PRIMARY KEY (`acc`);

ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vehicle_make`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `address`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `address_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `ass01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

ALTER TABLE `ass02`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

ALTER TABLE `asset`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

ALTER TABLE `asset_phone`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `asset_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `atthegate2`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

ALTER TABLE `audit`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `colour`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `company`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `countries`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `dates`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `dept`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `docs`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `electricity`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17130;

ALTER TABLE `emp01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

ALTER TABLE `groups`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `history`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `tasks`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5470;

ALTER TABLE `tasks_hist`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `logon_log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4733;

ALTER TABLE `med_history`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

ALTER TABLE `med_procedures`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `memberships`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

ALTER TABLE `news`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `occupation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

ALTER TABLE `parms_char`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

ALTER TABLE `payments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `people`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1311;

ALTER TABLE `people_asset`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `people_bak`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

ALTER TABLE `people_related`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

ALTER TABLE `people_rs`
  MODIFY `people_id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `people_skills`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `people_vehicle`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

ALTER TABLE `places`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

ALTER TABLE `projects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

ALTER TABLE `regions`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `relationships`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `res01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

ALTER TABLE `res02`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

ALTER TABLE `roles`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `rs_members`
  MODIFY `rs_id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `skills`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `sql_log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

ALTER TABLE `vehicle`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

ALTER TABLE `vehicle_make`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `vehicle_model`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
