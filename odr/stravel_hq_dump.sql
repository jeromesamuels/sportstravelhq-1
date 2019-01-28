-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 05:34 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stravel_hq`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement_forms`
--

DROP TABLE IF EXISTS `agreement_forms`;
CREATE TABLE IF NOT EXISTS `agreement_forms` (
  `id` int(10) unsigned NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `reciever_group` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `reciever_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_details` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agreement_text` text COLLATE utf8_unicode_ci NOT NULL,
  `for_rfp` int(11) NOT NULL,
  `downloaded` tinyint(1) DEFAULT NULL,
  `agreement_sent` timestamp NULL DEFAULT NULL,
  `coordinator_sign` timestamp NULL DEFAULT NULL,
  `hotel_sign` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `zip` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `rating` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `h_amenity_pivot`
--

DROP TABLE IF EXISTS `h_amenity_pivot`;
CREATE TABLE IF NOT EXISTS `h_amenity_pivot` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

DROP TABLE IF EXISTS `invitations`;
CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(256) NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Not Registered, 1:Registered '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL,
  `trip_status` tinyint(4) NOT NULL COMMENT '1:Confirmed ,2:Completed, 3:Cancelled',
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rfp_id` int(10) unsigned NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_add` varchar(256) NOT NULL,
  `hotel_manager` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `total_room` tinyint(3) unsigned NOT NULL,
  `room_rate` smallint(5) unsigned NOT NULL,
  `actualized_room_count` tinyint(3) unsigned NOT NULL,
  `commissoin_rate` tinyint(3) unsigned NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Pending,1:Completed',
  `due_date` date NOT NULL,
  `est_amt_due` smallint(6) NOT NULL,
  `amt_paid` smallint(5) unsigned NOT NULL,
  `payment_mode` tinyint(4) NOT NULL COMMENT '1:check, 2: direct deposit ',
  `payment_ref_num` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rfps`
--

DROP TABLE IF EXISTS `rfps`;
CREATE TABLE IF NOT EXISTS `rfps` (
  `id` int(10) unsigned NOT NULL,
  `user_trip_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `destination` varchar(512) NOT NULL,
  `hotel_information` varchar(512) NOT NULL,
  `distance_event` tinyint(4) NOT NULL,
  `offer_rate` tinyint(4) NOT NULL,
  `cc_authorization` tinyint(1) NOT NULL,
  `offer_validity` date NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `sales_manager` varchar(128) NOT NULL,
  `king_beedrooms` tinyint(4) NOT NULL,
  `queen_beedrooms` tinyint(4) NOT NULL,
  `amenitie_ids` varchar(256) NOT NULL,
  `hotels_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roomlistings`
--

DROP TABLE IF EXISTS `roomlistings`;
CREATE TABLE IF NOT EXISTS `roomlistings` (
  `id` int(11) NOT NULL,
  `cordinator_id` int(11) NOT NULL,
  `hmanager_id` int(11) NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `login_attempt` tinyint(2) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reminder` varchar(64) DEFAULT NULL,
  `activation` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_activity` int(20) DEFAULT NULL,
  `config` text,
  `hotel_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `group_id`, `username`, `password`, `email`, `phone_number`, `first_name`, `last_name`, `avatar`, `active`, `login_attempt`, `last_login`, `created_at`, `updated_at`, `reminder`, `activation`, `remember_token`, `last_activity`, `config`, `hotel_id`, `entry_by`) VALUES
(1, 1, 'superadmin', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'superadmin@usdevco.com', '', 'Root', 'Admin', '1.jpg', 1, 12, '2019-01-28 17:34:17', '2014-03-12 09:18:46', '2017-05-05 05:01:33', 'SNLyM4Smv12Ck8jyopZJMfrypTbEDtVhGT5PMRzxs', NULL, 'pO8wY7VlyrjcON3SKmQvRjIWIiwaFWzzZcgC80LywWEqxh2ej3tjnvEx07bD', 1485431605, NULL, 0, 0),
(2, 2, 'admin', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'admin@usdevco.com', '', 'Eric', 'Admin', NULL, 1, 0, '2019-01-27 17:39:56', '2018-12-17 18:15:19', NULL, NULL, NULL, '1FhUqYJ6vIdGvLkTRCxpBj2m5NpuWO9McTdyHFtbHofvEu3m88zAnJ4updTq', NULL, NULL, 0, 0),
(3, 4, 'coordinator', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'coordinator@usdevco.com', '', 'Eric', 'Coordinator', NULL, 1, 0, '2019-01-28 14:08:00', '2018-12-18 04:20:04', '2018-12-18 04:20:04', NULL, '2994683', 'vPYgdFCdTpQIxLO99I2xMXTenZmsyMIWGEyPwVdJcuORKTppNthbZIKVjuV2', NULL, NULL, 0, 0),
(4, 5, 'manager', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'manager@usdevco.com', '', 'Eric', 'Manager', NULL, 1, 0, '2019-01-28 14:11:41', '2018-12-18 04:21:22', '2018-12-18 04:21:22', NULL, '3890393', 'I8f6gpK4bhbGQLVSzrVvv6gBiPU2MB3zBuIRYRyqezgVHn2X0KJAQAG7p9sV', NULL, NULL, 5, 0),
(5, 6, 'corporate', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'corporate@usdevco.com', '', 'Eric', 'Corporate', NULL, 1, 0, '2019-01-28 16:31:23', '2018-12-18 15:26:55', '2019-01-25 14:47:54', NULL, '', 'bbBMpMK06xPBYhhjOjGohj0ublsuacH5lZTaWR8sfQTfNOISfsWlOn2q06SN', NULL, NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip_amenities`
--

DROP TABLE IF EXISTS `trip_amenities`;
CREATE TABLE IF NOT EXISTS `trip_amenities` (
  `id` int(10) unsigned NOT NULL,
  `trip_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip_status_logs`
--

DROP TABLE IF EXISTS `trip_status_logs`;
CREATE TABLE IF NOT EXISTS `trip_status_logs` (
  `trip_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rfp_id` int(10) unsigned NOT NULL DEFAULT '0',
  `trip_status_id` tinyint(3) unsigned NOT NULL,
  `generated_title` varchar(100) NOT NULL,
  `generated_description` varchar(256) NOT NULL,
  `generated_mail` text NOT NULL,
  `generated_mailsubject` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_trips`
--

DROP TABLE IF EXISTS `user_trips`;
CREATE TABLE IF NOT EXISTS `user_trips` (
  `id` int(10) unsigned NOT NULL,
  `entry_by` int(10) unsigned NOT NULL,
  `trip_name` varchar(256) NOT NULL,
  `from_address_1` varchar(256) NOT NULL,
  `from_city` varchar(100) NOT NULL,
  `from_state_id` int(10) unsigned NOT NULL,
  `from_zip` varchar(10) NOT NULL,
  `to_address_1` varchar(256) NOT NULL,
  `to_city` varchar(256) NOT NULL,
  `to_state_id` int(10) unsigned NOT NULL,
  `to_zip` varchar(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `budget_from` int(11) NOT NULL,
  `budget_to` int(11) NOT NULL,
  `double_queen_qty` tinyint(4) NOT NULL,
  `double_king_qty` tinyint(4) NOT NULL,
  `amenity_ids` varchar(256) NOT NULL,
  `comment` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_amenity_pivot`
--
ALTER TABLE `h_amenity_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfps`
--
ALTER TABLE `rfps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomlistings`
--
ALTER TABLE `roomlistings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_amenities`
--
ALTER TABLE `trip_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_trips`
--
ALTER TABLE `user_trips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `h_amenity_pivot`
--
ALTER TABLE `h_amenity_pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rfps`
--
ALTER TABLE `rfps`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roomlistings`
--
ALTER TABLE `roomlistings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `trip_amenities`
--
ALTER TABLE `trip_amenities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_trips`
--
ALTER TABLE `user_trips`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
