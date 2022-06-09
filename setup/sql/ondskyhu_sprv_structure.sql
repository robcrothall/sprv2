-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2022 at 05:07 AM
-- Server version: 5.7.35
-- PHP Version: 7.2.30

--
-- SPRV Structure Only
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ondskyhu_sprv`
--
CREATE DATABASE IF NOT EXISTS `ondskyhu_sprv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ondskyhu_sprv`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--
-- Creation: May 09, 2020 at 08:26 AM
-- Last update: May 09, 2020 at 08:26 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `addr_type` int(8) NOT NULL,
  `addr_line` varchar(50) NOT NULL,
  `addr_line2` varchar(50) DEFAULT NULL,
  `place_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address_type`
--
-- Creation: Jun 15, 2021 at 01:00 PM
-- Last update: Jan 11, 2022 at 08:53 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `address_type`;
CREATE TABLE `address_type` (
  `id` int(8) NOT NULL,
  `addr_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ass01`
--
-- Creation: Apr 18, 2020 at 08:47 AM
-- Last update: Apr 18, 2020 at 10:08 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `ass01`;
CREATE TABLE `ass01` (
  `id` int(8) NOT NULL,
  `old_acc_no` varchar(8) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `initials` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  `pcode` varchar(20) DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ass02`
--
-- Creation: Apr 18, 2020 at 10:13 AM
-- Last update: Apr 18, 2020 at 10:31 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `ass02`;
CREATE TABLE `ass02` (
  `id` int(8) NOT NULL,
  `old_acc_no` varchar(8) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `initials` varchar(50) DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ass03`
--
-- Creation: Dec 24, 2020 at 01:19 PM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `ass03`;
CREATE TABLE `ass03` (
  `email` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--
-- Creation: Sep 12, 2020 at 02:15 PM
-- Last update: Jan 19, 2022 at 07:30 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `asset`;
CREATE TABLE `asset` (
  `id` int(8) NOT NULL,
  `asset_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `asset_seq` int(8) DEFAULT '0',
  `asset_type` int(8) NOT NULL DEFAULT '1',
  `asset_type_char` varchar(20) CHARACTER SET utf8 NOT NULL,
  `asset_no` int(8) DEFAULT NULL,
  `asset_suffix` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `asset_size` decimal(8,3) DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_phone`
--
-- Creation: May 23, 2021 at 02:31 PM
-- Last update: May 23, 2021 at 02:45 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `asset_phone`;
CREATE TABLE `asset_phone` (
  `id` int(8) NOT NULL,
  `asset_id` int(8) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `descr` varchar(50) DEFAULT NULL,
  `account_no` varchar(10) DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Unattended phones in buildings';

-- --------------------------------------------------------

--
-- Table structure for table `asset_type`
--
-- Creation: May 09, 2020 at 07:24 AM
-- Last update: Jul 01, 2020 at 10:00 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `asset_type`;
CREATE TABLE `asset_type` (
  `id` int(8) NOT NULL,
  `description` varchar(20) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atthegate`
--
-- Creation: May 30, 2020 at 07:29 AM
-- Last update: May 30, 2020 at 07:49 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `atthegate`;
CREATE TABLE `atthegate` (
  `direction` varchar(10) DEFAULT NULL,
  `license` varchar(150) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `dr_license` varchar(50) DEFAULT NULL,
  `creation` varchar(20) DEFAULT NULL,
  `recdate` varchar(10) DEFAULT NULL,
  `rectime` varchar(10) DEFAULT NULL,
  `profile` varchar(20) DEFAULT NULL,
  `incidents` varchar(150) DEFAULT NULL,
  `dr_name` varchar(50) DEFAULT NULL,
  `name_in` varchar(50) DEFAULT NULL,
  `name_out` varchar(50) DEFAULT NULL,
  `going` varchar(50) DEFAULT NULL,
  `company2` varchar(50) DEFAULT NULL,
  `visiting` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atthegate2`
--
-- Creation: May 30, 2020 at 08:42 AM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `atthegate2`;
CREATE TABLE `atthegate2` (
  `id` int(8) NOT NULL,
  `id_no` varchar(13) DEFAULT NULL,
  `lic_no` varchar(20) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `company_id` int(8) DEFAULT NULL,
  `visiting` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `profile` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--
-- Creation: Aug 04, 2020 at 11:39 AM
-- Last update: Aug 04, 2020 at 11:39 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE `audit` (
  `id` int(8) NOT NULL,
  `program` varchar(50) CHARACTER SET utf8 NOT NULL,
  `field` varchar(50) CHARACTER SET utf8 NOT NULL,
  `old` varchar(255) CHARACTER SET utf8 NOT NULL,
  `new` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--
-- Creation: May 09, 2020 at 10:06 AM
-- Last update: May 09, 2020 at 10:06 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `colour`;
CREATE TABLE `colour` (
  `id` int(8) NOT NULL,
  `colour_name` varchar(20) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--
-- Creation: Mar 16, 2021 at 01:41 PM
-- Last update: Dec 15, 2021 at 02:06 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(8) NOT NULL,
  `co_name` varchar(80) CHARACTER SET utf8 NOT NULL,
  `co_address` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `notes` text CHARACTER SET utf8,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(8) NOT NULL,
  `country` varchar(50) NOT NULL,
  `notes` text,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--
-- Creation: Jun 12, 2020 at 10:29 AM
-- Last update: Jun 12, 2020 at 10:29 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE `dates` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `date_type` varchar(20) NOT NULL,
  `actual_date` date NOT NULL,
  `notes` varchar(60) DEFAULT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--
-- Creation: Jan 13, 2021 at 01:14 PM
-- Last update: Oct 19, 2021 at 02:20 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `id` int(8) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_manager_id` int(8) DEFAULT NULL,
  `task_email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dept_role`
--
-- Creation: May 03, 2020 at 09:05 PM
-- Last update: Oct 26, 2021 at 01:14 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `dept_role`;
CREATE TABLE `dept_role` (
  `user_id` int(8) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `changed_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--
-- Creation: May 05, 2021 at 06:37 PM
-- Last update: May 05, 2021 at 06:43 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE `docs` (
  `id` int(8) NOT NULL,
  `doc_group` varchar(50) CHARACTER SET utf8 NOT NULL,
  `doc_subgroup` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `doc_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `doc_file` varchar(250) CHARACTER SET utf8 NOT NULL,
  `submitted` date NOT NULL,
  `approved` date DEFAULT NULL,
  `review` date DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `electricity`
--
-- Creation: Sep 30, 2020 at 05:23 AM
-- Last update: Jan 25, 2022 at 10:27 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `electricity`;
CREATE TABLE `electricity` (
  `id` int(8) NOT NULL,
  `cottage` varchar(20) DEFAULT NULL,
  `meter` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `open_reading` int(8) DEFAULT NULL,
  `close_reading` int(8) DEFAULT NULL,
  `reading_date` date DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(8) DEFAULT '1',
  `changed` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `elec_load`
--
-- Creation: Jul 27, 2020 at 07:46 PM
-- Last update: Jul 27, 2020 at 07:48 PM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `elec_load`;
CREATE TABLE `elec_load` (
  `cottage` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `meter_start` int(8) DEFAULT NULL,
  `meter_end` int(8) DEFAULT NULL,
  `reading_date` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp01`
--
-- Creation: Apr 13, 2020 at 12:12 PM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `emp01`;
CREATE TABLE `emp01` (
  `id` int(8) NOT NULL,
  `emp_no` varchar(6) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `drivers_lic` varchar(20) DEFAULT NULL,
  `vehicle_reg` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--
-- Creation: Jan 07, 2022 at 08:55 AM
-- Last update: Jan 07, 2022 at 08:55 AM
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(8) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `fee_reqd` enum('Y','N') NOT NULL DEFAULT 'N',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `duration_in_months` int(8) NOT NULL DEFAULT '12',
  `start_month` int(8) NOT NULL DEFAULT '3',
  `description` text NOT NULL,
  `welcome_email` text NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--
-- Creation: May 19, 2020 at 12:42 PM
-- Last update: Sep 07, 2021 at 01:07 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `event_date` date NOT NULL,
  `place_id` int(8) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--
-- Creation: May 07, 2021 at 02:55 PM
-- Last update: Jan 26, 2022 at 02:16 PM
-- Last check: Sep 07, 2021 at 01:53 PM
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(8) NOT NULL,
  `originator_id` int(8) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `severity` varchar(20) NOT NULL DEFAULT '"02 - Low"' COMMENT 'Low, Normal, Urgent, Critical',
  `subject` varchar(120) NOT NULL,
  `description` varchar(750) NOT NULL,
  `criteria` varchar(750) DEFAULT NULL,
  `asset_id` int(8) NOT NULL,
  `discipline` varchar(20) NOT NULL DEFAULT '"Not specified"' COMMENT 'Not specified,Carpenter,Electrical,Painter,Plumber,External',
  `type` varchar(25) NOT NULL DEFAULT '"Material Failure"' COMMENT 'Planned Maintenance,Material Failure,Change request,Enhancement',
  `create_id` int(8) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `read_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `assigned_to` int(8) NOT NULL DEFAULT '0',
  `date_assigned` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estimated_hours` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sched_date` date NOT NULL DEFAULT '0000-00-00',
  `sched_time` time NOT NULL DEFAULT '00:00:00',
  `actual_date` date NOT NULL DEFAULT '0000-00-00',
  `actual_time` time NOT NULL DEFAULT '00:00:00',
  `closed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actual_hours` decimal(5,2) NOT NULL DEFAULT '0.00',
  `project_id` int(8) NOT NULL DEFAULT '0',
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_hist`
--
-- Creation: Nov 26, 2020 at 07:24 AM
-- Last update: Nov 26, 2020 at 07:24 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `tasks_hist`;
CREATE TABLE `tasks_hist` (
  `id` int(8) NOT NULL,
  `field` varchar(30) NOT NULL,
  `value` varchar(750) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_history`
--
-- Creation: Nov 26, 2020 at 07:23 AM
-- Last update: Oct 27, 2021 at 05:37 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `tasks_history`;
CREATE TABLE `tasks_history` (
  `id` int(8) NOT NULL,
  `originator_id` int(8) NOT NULL,
  `dept_id` int(8) NOT NULL,
  `severity` varchar(20) NOT NULL COMMENT 'Low, Normal, Urgent, Critical',
  `subject` varchar(80) NOT NULL,
  `description` varchar(750) NOT NULL,
  `asset_id` int(8) NOT NULL,
  `discipline` varchar(20) NOT NULL COMMENT 'Not specified,Carpenter,Electrical,Painter,Plumber,External',
  `type` varchar(25) NOT NULL COMMENT 'Planned Maintenance,Material Failure,Change request,Enhancement',
  `create_id` int(8) NOT NULL,
  `create_date` timestamp NOT NULL,
  `read_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `assigned_to` int(8) NOT NULL DEFAULT '0',
  `date_assigned` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estimated_hours` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sched_date` date NOT NULL DEFAULT '0000-00-00',
  `sched_time` time NOT NULL DEFAULT '00:00:00',
  `actual_date` date NOT NULL DEFAULT '0000-00-00',
  `actual_time` time NOT NULL DEFAULT '00:00:00',
  `closed` date NOT NULL DEFAULT '0000-00-00',
  `actual_hours` decimal(5,2) NOT NULL DEFAULT '0.00',
  `project_id` int(8) NOT NULL DEFAULT '0',
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logon_log`
--
-- Creation: Sep 07, 2021 at 01:27 PM
-- Last update: Jan 26, 2022 at 03:03 PM
--

DROP TABLE IF EXISTS `logon_log`;
CREATE TABLE `logon_log` (
  `id` int(8) NOT NULL,
  `user_name_given` varchar(255) DEFAULT NULL,
  `password_given` varchar(50) DEFAULT NULL,
  `success` tinyint(1) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `med_history`
--
-- Creation: Jun 16, 2020 at 09:47 AM
-- Last update: Jan 17, 2022 at 10:21 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `med_history`;
CREATE TABLE `med_history` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `proc_date` date NOT NULL,
  `med_proc_id` int(8) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `value` varchar(20) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_procedures`
--
-- Creation: Feb 06, 2021 at 09:13 AM
-- Last update: Jan 17, 2022 at 10:23 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `med_procedures`;
CREATE TABLE `med_procedures` (
  `id` int(8) NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL,
  `category` int(8) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `notes` text CHARACTER SET utf8,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--
-- Creation: Jan 07, 2022 at 09:46 AM
-- Last update: Jan 15, 2022 at 01:01 PM
--

DROP TABLE IF EXISTS `memberships`;
CREATE TABLE `memberships` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `group_id` int(8) NOT NULL,
  `is_manager` enum('Y','N') NOT NULL DEFAULT 'N',
  `join_date` date NOT NULL DEFAULT '1900-01-01',
  `expiry_date` date NOT NULL DEFAULT '1900-01-01',
  `status` enum('Validated','Terminated','Excluded') NOT NULL DEFAULT 'Validated',
  `status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Membership of Groups';

-- --------------------------------------------------------

--
-- Table structure for table `news`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(8) NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `effective_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_id` int(8) NOT NULL DEFAULT '0',
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_users`
--
-- Creation: Sep 07, 2021 at 01:27 PM
-- Last update: Jan 17, 2022 at 12:50 PM
--

DROP TABLE IF EXISTS `news_users`;
CREATE TABLE `news_users` (
  `news_id` int(8) NOT NULL,
  `users_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `occupation`;
CREATE TABLE `occupation` (
  `id` int(8) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `notes` text,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parms_char`
--
-- Creation: Feb 06, 2021 at 09:30 AM
-- Last update: Dec 05, 2021 at 10:06 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `parms_char`;
CREATE TABLE `parms_char` (
  `id` int(8) NOT NULL,
  `parm_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user_local_id` int(8) DEFAULT NULL,
  `parm_value` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parm_num` decimal(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` date NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--
-- Creation: Sep 25, 2021 at 01:35 PM
-- Last update: Jan 25, 2022 at 01:27 PM
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(8) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `marital_status` varchar(1) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `status_date` date DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `account_no` varchar(10) DEFAULT NULL,
  `acc_pref` int(2) NOT NULL DEFAULT '0',
  `old_account_no` varchar(10) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `bd_disclose` enum('Y','N','?') DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `hp_disclose` enum('Y','N','?') NOT NULL DEFAULT 'Y',
  `work_phone` varchar(20) DEFAULT NULL,
  `wp_disclose` enum('Y','N','?') NOT NULL DEFAULT 'Y',
  `mobile_phone` varchar(20) DEFAULT NULL,
  `mp_disclose` enum('Y','N','?') DEFAULT NULL,
  `whatsapp` varchar(1) DEFAULT NULL,
  `work_email` varchar(50) DEFAULT NULL,
  `home_email` varchar(50) DEFAULT NULL,
  `he_disclose` enum('Y','N','?') DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `driver_lic` varchar(20) DEFAULT NULL,
  `driver_expiry` date DEFAULT NULL,
  `company_id` int(8) DEFAULT '0',
  `occupation_id` int(8) DEFAULT '0',
  `race` varchar(20) DEFAULT NULL,
  `rs_rep` int(8) DEFAULT '0',
  `cottage` varchar(10) DEFAULT NULL,
  `cottage_id` int(8) NOT NULL DEFAULT '0',
  `an_disclose` enum('Y','N','?') NOT NULL DEFAULT '?' COMMENT 'Disclose Aniversary',
  `checked` varchar(6) DEFAULT 'N',
  `notes` text,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_asset`
--
-- Creation: Oct 28, 2020 at 11:46 AM
-- Last update: Oct 29, 2020 at 09:13 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_asset`;
CREATE TABLE `people_asset` (
  `id` int(8) NOT NULL,
  `asset_id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_bak`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_bak`;
CREATE TABLE `people_bak` (
  `id` int(8) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `marital_status` varchar(1) DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `account_no` varchar(10) DEFAULT NULL,
  `old_account_no` varchar(10) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `work_phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(1) DEFAULT NULL,
  `work_email` varchar(50) DEFAULT NULL,
  `home_email` varchar(50) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `driver_lic` varchar(20) DEFAULT NULL,
  `driver_expiry` date DEFAULT NULL,
  `company_id` int(8) NOT NULL DEFAULT '0',
  `occupation_id` int(8) NOT NULL DEFAULT '0',
  `rs_rep` int(8) NOT NULL DEFAULT '0',
  `cottage` varchar(10) DEFAULT NULL,
  `checked` varchar(6) DEFAULT 'N',
  `notes` text,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_discipline`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_discipline`;
CREATE TABLE `people_discipline` (
  `people_id` int(8) NOT NULL,
  `discipline_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_tasks`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_tasks`;
CREATE TABLE `people_tasks` (
  `task_id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `planned hours` decimal(7,2) NOT NULL DEFAULT '0.00',
  `actual_hours` decimal(7,2) NOT NULL DEFAULT '0.00',
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_log`
--
-- Creation: Sep 25, 2021 at 02:57 PM
-- Last update: Jan 25, 2022 at 01:27 PM
--

DROP TABLE IF EXISTS `people_log`;
CREATE TABLE `people_log` (
  `id` int(8) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `marital_status` varchar(1) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `status_date` date DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `account_no` varchar(10) DEFAULT NULL,
  `acc_pref` int(2) NOT NULL DEFAULT '0',
  `old_account_no` varchar(10) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `bd_disclose` enum('Y','N','?') DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `hp_disclose` enum('Y','N','?') NOT NULL DEFAULT 'Y',
  `work_phone` varchar(20) DEFAULT NULL,
  `wp_disclose` enum('Y','N','?') NOT NULL DEFAULT 'Y',
  `mobile_phone` varchar(20) DEFAULT NULL,
  `mp_disclose` enum('Y','N','?') DEFAULT NULL,
  `whatsapp` varchar(1) DEFAULT NULL,
  `work_email` varchar(50) DEFAULT NULL,
  `home_email` varchar(50) DEFAULT NULL,
  `he_disclose` enum('Y','N','?') DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `driver_lic` varchar(20) DEFAULT NULL,
  `driver_expiry` date DEFAULT NULL,
  `company_id` int(8) DEFAULT '0',
  `occupation_id` int(8) DEFAULT '0',
  `race` varchar(20) DEFAULT NULL,
  `rs_rep` int(8) DEFAULT '0',
  `cottage` varchar(10) DEFAULT NULL,
  `cottage_id` int(8) NOT NULL DEFAULT '0',
  `an_disclose` enum('Y','N','?') NOT NULL DEFAULT '?',
  `checked` varchar(6) DEFAULT 'N',
  `notes` text,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_news`
--
-- Creation: Oct 04, 2020 at 07:02 AM
-- Last update: Oct 04, 2020 at 07:02 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `people_news`;
CREATE TABLE `people_news` (
  `people_id` int(8) NOT NULL,
  `news_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_related`
--
-- Creation: Oct 18, 2020 at 09:41 AM
-- Last update: Jan 20, 2022 at 06:28 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_related`;
CREATE TABLE `people_related` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `related_id` int(8) NOT NULL,
  `relationship` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'Spouse',
  `relationship_date` date NOT NULL DEFAULT '1900-01-01',
  `notes` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_roles`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_roles`;
CREATE TABLE `people_roles` (
  `people_id` int(8) NOT NULL,
  `role_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_rs`
--
-- Creation: May 09, 2020 at 10:26 AM
-- Last update: May 09, 2020 at 10:26 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `people_rs`;
CREATE TABLE `people_rs` (
  `people_id` int(8) NOT NULL,
  `rs_id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_skills`
--
-- Creation: May 09, 2020 at 09:50 AM
-- Last update: May 09, 2020 at 09:50 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `people_skills`;
CREATE TABLE `people_skills` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `skill_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people_trips`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_trips`;
CREATE TABLE `people_trips` (
  `people_id` int(8) NOT NULL,
  `trips` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_vehicle`
--
-- Creation: May 09, 2020 at 10:04 AM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `people_vehicle`;
CREATE TABLE `people_vehicle` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `vehicle_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(8) NOT NULL,
  `place` varchar(50) NOT NULL,
  `postal_code` varchar(12) DEFAULT NULL,
  `notes` text,
  `region_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--
-- Creation: Aug 03, 2020 at 08:25 PM
-- Last update: Nov 01, 2021 at 09:48 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(8) NOT NULL,
  `proj_name` varchar(80) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(8) NOT NULL,
  `region` varchar(50) NOT NULL,
  `notes` text,
  `country_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--
-- Creation: Apr 20, 2020 at 01:43 PM
-- Last update: Apr 20, 2020 at 01:43 PM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `relationships`;
CREATE TABLE `relationships` (
  `id` int(8) NOT NULL,
  `people_id` int(8) NOT NULL,
  `other_id` int(8) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `res01`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `res01`;
CREATE TABLE `res01` (
  `id` int(8) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `account_id` varchar(8) DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `physical_address` varchar(50) DEFAULT NULL,
  `postal_address` varchar(50) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `work_phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(1) DEFAULT NULL,
  `work_email` varchar(50) DEFAULT NULL,
  `home_email` varchar(50) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `driver_lic` varchar(20) DEFAULT NULL,
  `driver_expiry` date DEFAULT NULL,
  `company_id` int(8) DEFAULT NULL,
  `occupation_id` int(8) DEFAULT NULL,
  `rs_rep_name` varchar(50) DEFAULT NULL,
  `rs_rep` int(8) DEFAULT NULL,
  `cottage` varchar(10) DEFAULT NULL,
  `people_id` int(8) DEFAULT NULL,
  `checked` varchar(6) DEFAULT 'N',
  `notes` text,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `res02`
--
-- Creation: Apr 12, 2020 at 08:20 PM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `res02`;
CREATE TABLE `res02` (
  `id` int(8) NOT NULL,
  `cottage` varchar(8) DEFAULT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `id_no` varchar(15) DEFAULT NULL,
  `marital_status` varchar(2) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Jul 18, 2020 at 09:14 AM
-- Last update: Jan 08, 2022 at 07:32 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(8) NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role_days` smallint(6) NOT NULL DEFAULT '0',
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs_members`
--
-- Creation: May 09, 2020 at 10:23 AM
-- Last update: May 09, 2020 at 10:23 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `rs_members`;
CREATE TABLE `rs_members` (
  `rs_id` int(8) NOT NULL,
  `role_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs_reps`
--
-- Creation: Apr 13, 2020 at 07:23 AM
-- Last update: Apr 13, 2020 at 07:23 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

DROP TABLE IF EXISTS `rs_reps`;
CREATE TABLE `rs_reps` (
  `resident` int(8) NOT NULL,
  `rs_rep` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--
-- Creation: May 09, 2020 at 09:46 AM
-- Last update: May 09, 2020 at 09:47 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id` int(8) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sql_log`
--
-- Creation: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `sql_log`;
CREATE TABLE `sql_log` (
  `id` int(8) NOT NULL,
  `cmd` varchar(255) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `user_id` int(8) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 07, 2021 at 01:27 PM
-- Last update: Jan 26, 2022 at 03:03 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--
-- Creation: Dec 27, 2020 at 09:10 AM
-- Last update: Jan 08, 2022 at 07:58 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_id` int(8) NOT NULL,
  `role_id` int(8) NOT NULL,
  `role_expiry` date DEFAULT NULL,
  `changed_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `valid_accounts`
--
-- Creation: Aug 29, 2020 at 10:32 AM
-- Last update: Aug 29, 2020 at 10:35 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

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

-- --------------------------------------------------------

--
-- Table structure for table `veh01`
--
-- Creation: May 10, 2020 at 07:51 AM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

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

-- --------------------------------------------------------

--
-- Table structure for table `veh01_bak`
--
-- Creation: May 10, 2020 at 07:20 AM
-- Last update: May 10, 2020 at 07:20 AM
-- Last check: Sep 07, 2021 at 01:26 PM
--

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

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--
-- Creation: May 09, 2020 at 10:00 AM
-- Last update: Sep 07, 2021 at 01:27 PM
-- Last check: Sep 07, 2021 at 01:27 PM
--

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

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--
-- Creation: May 09, 2020 at 10:11 AM
-- Last update: May 09, 2020 at 10:13 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `vehicle_make`;
CREATE TABLE `vehicle_make` (
  `id` int(8) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--
-- Creation: May 09, 2020 at 10:09 AM
-- Last update: May 09, 2020 at 10:14 AM
-- Last check: Sep 07, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `vehicle_model`;
CREATE TABLE `vehicle_model` (
  `id` int(8) NOT NULL,
  `model_name` varchar(20) NOT NULL,
  `make` int(8) NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '1',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_type`
--
ALTER TABLE `address_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass01`
--
ALTER TABLE `ass01`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass02`
--
ALTER TABLE `ass02`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass03`
--
ALTER TABLE `ass03`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_phone`
--
ALTER TABLE `asset_phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `asset_type`
--
ALTER TABLE `asset_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atthegate2`
--
ALTER TABLE `atthegate2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_pgm_i1` (`program`);

--
-- Indexes for table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_idx` (`country`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_role`
--
ALTER TABLE `dept_role`
  ADD PRIMARY KEY (`user_id`,`dept_id`) USING BTREE;

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricity`
--
ALTER TABLE `electricity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Electricity2` (`meter`,`reading_date`) USING BTREE;

--
-- Indexes for table `emp01`
--
ALTER TABLE `emp01`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_hist`
--
ALTER TABLE `tasks_hist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_history`
--
ALTER TABLE `tasks_history`
  ADD PRIMARY KEY (`id`,`changed`);

--
-- Indexes for table `logon_log`
--
ALTER TABLE `logon_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_history`
--
ALTER TABLE `med_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_procedures`
--
ALTER TABLE `med_procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_id` (`people_id`,`group_id`),
  ADD KEY `group_id_const` (`group_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_users`
--
ALTER TABLE `news_users`
  ADD UNIQUE KEY `news_users_u` (`news_id`,`users_id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Occupation` (`occupation`);

--
-- Indexes for table `parms_char`
--
ALTER TABLE `parms_char`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parms_char_name` (`parm_name`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `People_Payments` (`people_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_account_ui` (`account_no`);

--
-- Indexes for table `people_asset`
--
ALTER TABLE `people_asset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `People_Asset_UI` (`asset_id`,`people_id`);

--
-- Indexes for table `people_bak`
--
ALTER TABLE `people_bak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_discipline`
--
ALTER TABLE `people_discipline`
  ADD UNIQUE KEY `people_id` (`people_id`,`discipline_id`);

--
-- Indexes for table `people_tasks`
--
ALTER TABLE `people_tasks`
  ADD UNIQUE KEY `task_id` (`task_id`,`people_id`);

--
-- Indexes for table `people_log`
--
ALTER TABLE `people_log`
  ADD PRIMARY KEY (`id`,`changed`);

--
-- Indexes for table `people_news`
--
ALTER TABLE `people_news`
  ADD UNIQUE KEY `People_news` (`people_id`,`news_id`);

--
-- Indexes for table `people_related`
--
ALTER TABLE `people_related`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_roles`
--
ALTER TABLE `people_roles`
  ADD UNIQUE KEY `people_id` (`people_id`,`role_id`);

--
-- Indexes for table `people_rs`
--
ALTER TABLE `people_rs`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `people_skills`
--
ALTER TABLE `people_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_vehicle`
--
ALTER TABLE `people_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_idx` (`place`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_idx` (`region`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res01`
--
ALTER TABLE `res01`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res02`
--
ALTER TABLE `res02`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_members`
--
ALTER TABLE `rs_members`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `rs_reps`
--
ALTER TABLE `rs_reps`
  ADD UNIQUE KEY `resident_idx` (`resident`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sql_log`
--
ALTER TABLE `sql_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD UNIQUE KEY `user_roles_ui` (`user_id`,`role_id`);

--
-- Indexes for table `valid_accounts`
--
ALTER TABLE `valid_accounts`
  ADD PRIMARY KEY (`acc`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_type`
--
ALTER TABLE `address_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass01`
--
ALTER TABLE `ass01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass02`
--
ALTER TABLE `ass02`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_phone`
--
ALTER TABLE `asset_phone`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_type`
--
ALTER TABLE `asset_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atthegate2`
--
ALTER TABLE `atthegate2`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colour`
--
ALTER TABLE `colour`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electricity`
--
ALTER TABLE `electricity`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp01`
--
ALTER TABLE `emp01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks_hist`
--
ALTER TABLE `tasks_hist`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logon_log`
--
ALTER TABLE `logon_log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_history`
--
ALTER TABLE `med_history`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_procedures`
--
ALTER TABLE `med_procedures`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parms_char`
--
ALTER TABLE `parms_char`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_asset`
--
ALTER TABLE `people_asset`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_bak`
--
ALTER TABLE `people_bak`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_related`
--
ALTER TABLE `people_related`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_rs`
--
ALTER TABLE `people_rs`
  MODIFY `people_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_skills`
--
ALTER TABLE `people_skills`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_vehicle`
--
ALTER TABLE `people_vehicle`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res01`
--
ALTER TABLE `res01`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res02`
--
ALTER TABLE `res02`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_members`
--
ALTER TABLE `rs_members`
  MODIFY `rs_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sql_log`
--
ALTER TABLE `sql_log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `group_id_const` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `people_id_const` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `People_Payments` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
