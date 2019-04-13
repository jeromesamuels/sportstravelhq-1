-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 11:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `agreement_forms` (
  `id` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `agreement_forms`
--

INSERT INTO `agreement_forms` (`id`, `sender_id`, `reciever_id`, `reciever_group`, `coordinator_id`, `reciever_email`, `hotel_name`, `hotel_details`, `file`, `agreement_text`, `for_rfp`, `downloaded`, `agreement_sent`, `coordinator_sign`, `hotel_sign`, `created_at`, `updated_at`) VALUES
(10, 3, 4, 5, 3, 'manager@usdevco.com', 'Marriott Miami Beach', 'Miami Beach, FL, USA', NULL, 'test', 10, NULL, '2019-04-09 10:29:00', NULL, NULL, '2019-04-09 10:29:00', NULL),
(20, 3, 175, 5, 3, 'websitedesignanddeveloper@gmail.com', 'IHG (Holiday Inn) Miami Beach', 'Miami Beach, FL, USA', NULL, '', 20, NULL, '2019-04-13 09:17:00', NULL, NULL, '2019-04-13 09:17:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporate_user`
--

CREATE TABLE `corporate_user` (
  `id` int(11) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporate_user`
--

INSERT INTO `corporate_user` (`id`, `group_id`, `username`, `password`, `email`, `phone_number`, `first_name`, `last_name`, `avatar`, `active`, `login_attempt`, `last_login`, `created_at`, `updated_at`, `reminder`, `activation`, `remember_token`, `last_activity`, `config`, `hotel_id`, `entry_by`) VALUES
(1, 6, 'corporate1', '12345', 'test@gmail.com', '12345678', 'test', 'test', NULL, 0, 0, NULL, '2019-01-31 06:18:33', NULL, NULL, NULL, NULL, NULL, NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel_code` varchar(20) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `zip` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `logo` varchar(555) NOT NULL,
  `property` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IATA_number` int(11) NOT NULL,
  `blackout_start` varchar(255) NOT NULL,
  `blackout_end` varchar(255) NOT NULL,
  `blackout_reason` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_code`, `service_type`, `name`, `address`, `city`, `zip`, `type`, `domain`, `logo`, `property`, `rating`, `active`, `created_at`, `updated_at`, `IATA_number`, `blackout_start`, `blackout_end`, `blackout_reason`, `test`) VALUES
(1, '33112', '2', 'Hilton Miami Beach', 'Miami Beach, FL, USA', 'Miami', 33112, 'hilton', 'hilton', 'HiltonLogo_Black_HR.png', 'Pasted File at February 10, 2019 11_31 PM.png', 4, 1, '2019-02-11 12:47:31', '2019-02-11 13:13:27', 11725383, '', '', '', ''),
(2, '33234', '1', 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'Miami', 33234, 'marriott', 'marriott', 'Marriott_Logo.jpg', 'Pasted File at February 10, 2019 11_31 PM (2).png', 4, 1, '2019-02-11 12:49:18', '2019-04-10 12:12:42', 11725383, '04/18/2019', '05/16/2019', 'Spring Break', ''),
(3, '34567', '2', 'IHG (Holiday Inn) Miami Beach', 'Miami Beach, FL, USA', 'Miami', 34567, 'ihg', 'ihg', 'Holiday_Inn_logo.png', 'Pasted File at February 10, 2019 11_33 PM(3).png', 4, 1, '2019-02-11 12:51:12', '2019-02-11 13:14:36', 11725383, '', '', '', ''),
(47, 'H123456', '1', '', '585 Main St Miami Fl 33196', '', 0, 'hilton', '', '', '', 0, 0, '2019-04-05 04:41:54', '2019-04-05 04:41:54', 0, '', '', '', ''),
(55, '345677', '1', '', 'Miami Beach Liquor Store, 13th Street, Miami Beach, FL, USA', '', 0, 'ihg', '', '', '', 0, 0, '2019-04-08 05:13:19', '2019-04-08 05:13:19', 0, '', '', '', ''),
(56, '1344H', '1', '', '7544 SW 157 Place', '', 0, 'hilton', '', '', '', 0, 0, '2019-04-08 11:59:52', '2019-04-08 11:59:52', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_amenities`
--

CREATE TABLE `hotel_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_amenities`
--

INSERT INTO `hotel_amenities` (`id`, `title`, `slug`, `disabled`) VALUES
(1, 'Free Breakfast', 'free-breakfast', 0),
(2, 'Free Wifi', 'free-wifi', 0),
(3, 'Free Parking', 'free-parking', 0),
(4, 'Sleeper Sofa', 'sleeper_sofa', 0),
(5, 'Gym', 'gym', 0),
(6, 'Airport Pickup', 'airport-pickup', 0),
(8, 'Dining', 'dining', 0),
(9, 'Meeting Room ', 'Meeting Room ', 0),
(10, 'Pool', 'pool', 0);

-- --------------------------------------------------------

--
-- Table structure for table `h_amenity_pivot`
--

CREATE TABLE `h_amenity_pivot` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `h_amenity_pivot`
--

INSERT INTO `h_amenity_pivot` (`id`, `hotel_id`, `amenity_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 1),
(8, 1, 3),
(9, 1, 4),
(10, 2, 2),
(11, 2, 3),
(12, 2, 6),
(13, 2, 7),
(14, 3, 5),
(15, 3, 6),
(16, 3, 7),
(17, 3, 8),
(18, 15, 1),
(19, 15, 2),
(20, 15, 5),
(21, 15, 6),
(22, 16, 1),
(23, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Not Registered, 1:Registered '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `email`, `group_id`, `sent`, `status`) VALUES
(1, 'eric@heatandcool.com', 4, '2019-02-02 03:59:31', 0),
(2, 'ericgildeveloper@gmail.com', 4, '2019-02-02 04:15:37', 0),
(8, 'websitedesignanddeveloper@gmail.com', 5, '2019-04-13 09:15:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `trip_status` tinyint(4) NOT NULL COMMENT '1:Confirmed ,2:Completed, 3:Cancelled',
  `trip_name` varchar(255) NOT NULL,
  `trip_address` varchar(255) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `rfp_id` int(10) UNSIGNED NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_add` varchar(256) NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `hotel_manager` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `total_room` tinyint(3) UNSIGNED NOT NULL,
  `room_rate` smallint(5) UNSIGNED NOT NULL,
  `actualized_room_count` tinyint(3) UNSIGNED NOT NULL,
  `commissoin_rate` tinyint(3) UNSIGNED NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Pending,1:Completed',
  `due_date` date NOT NULL,
  `est_amt_due` smallint(6) NOT NULL,
  `amt_paid` smallint(5) UNSIGNED NOT NULL,
  `payment_mode` tinyint(4) NOT NULL COMMENT '1:check, 2: direct deposit ',
  `payment_ref_num` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `invoice_file` varchar(555) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `trip_status`, `trip_name`, `trip_address`, `check_in`, `check_out`, `rfp_id`, `hotel_name`, `hotel_add`, `hotel_type`, `hotel_manager`, `email`, `phone`, `total_room`, `room_rate`, `actualized_room_count`, `commissoin_rate`, `payment_status`, `due_date`, `est_amt_due`, `amt_paid`, `payment_mode`, `payment_ref_num`, `notes`, `invoice_file`, `created_at`, `updated_at`, `entry_by`) VALUES
(1, 918992, 6, '4/32019-8nights-test', 'Maison Grande Condominium, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 1, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '670-7878-9876', 43, 100, 3, 10, 0, '0000-00-00', 12, 20, 0, '34534', '', '', '2019-04-03 11:40:04', '2019-04-09 10:17:39', 3),
(2, 425068, 6, 'test4-4/3/-19', 'Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 4, 'Hilton Miami Beach', 'Miami Beach, FL, USA', 'hilton', 'test test', 'manager_test@hilton.com', '15017122661', 48, 100, 4, 10, 0, '0000-00-00', 0, 800, 0, '', '', '', '2019-04-03 13:33:40', '2019-04-03 13:33:40', 3),
(3, 548617, 6, 'test4-4/3/-19', 'Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 4, 'Hilton Miami Beach', 'Miami Beach, FL, USA', 'hilton', 'Root Admin', 'superadmin@usdevco.com', '', 48, 100, 4, 10, 0, '0000-00-00', 0, 800, 0, '', '', '', '2019-04-03 14:05:34', '2019-04-03 14:05:34', 3),
(4, 262155, 6, 'test4-4/3/-19', 'Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 4, 'Hilton Miami Beach', 'Miami Beach, FL, USA', 'hilton', 'Root Admin', 'superadmin@usdevco.com', '', 48, 100, 4, 10, 0, '0000-00-00', 0, 800, 0, '', '', '', '2019-04-03 14:16:34', '2019-04-03 14:16:34', 3),
(5, 577254, 6, 'test2-4/3', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 2, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '670-7878-9876', 18, 100, 4, 10, 0, '0000-00-00', 100, 600, 0, '34565', '', '', '2019-04-03 14:28:08', '2019-04-09 10:17:54', 3),
(6, 435555, 6, '4/32019-8nights-test', 'Maison Grande Condominium, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 1, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '670-7878-9876', 43, 90, 10, 10, 0, '0000-00-00', 0, 900, 0, '', '', '', '2019-04-03 16:17:47', '2019-04-03 16:17:47', 3),
(7, 675167, 6, '4/32019-8nights-test', 'Maison Grande Condominium, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 1, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 43, 100, 4, 10, 0, '0000-00-00', 0, 600, 0, '', '', '', '2019-04-08 05:26:07', '2019-04-08 05:26:07', 3),
(8, 882701, 6, 'test2-4/3', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 2, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 18, 100, 3, 10, 0, '0000-00-00', 0, 900, 0, '', '', '', '2019-04-08 05:27:24', '2019-04-08 05:27:24', 3),
(9, 330647, 6, 'test2-4/3', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 2, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 18, 100, 3, 10, 0, '0000-00-00', 0, 900, 0, '', '', '', '2019-04-08 06:19:06', '2019-04-08 06:19:06', 3),
(10, 899196, 6, '05/24/2019 - Miami Fl', '16956 Northwest 55th Avenue, Miami Gardens, FL, USA', '0000-00-00', '0000-00-00', 8, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 6, 100, 5, 10, 0, '0000-00-00', 0, 500, 0, '', '', 'guitar.jpeg', '2019-04-08 12:34:12', '2019-04-08 12:34:12', 3),
(11, 952333, 6, '05/01/2019 - MLS Championship', '58 Collins Avenue, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 6, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 6, 100, 10, 10, 0, '0000-00-00', 0, 100, 0, '', '', '', '2019-04-08 12:43:40', '2019-04-08 12:43:40', 3),
(12, 185866, 6, '05/24/2019 - Miami Fl', '16956 Northwest 55th Avenue, Miami Gardens, FL, USA', '0000-00-00', '0000-00-00', 8, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 6, 100, 2, 10, 0, '0000-00-00', 0, 900, 0, '', '', 'logo_blue.png', '2019-04-08 13:48:00', '2019-04-08 13:48:00', 3),
(13, 921751, 6, 'test-4-3-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', '0000-00-00', '0000-00-00', 3, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 21, 100, 12, 10, 0, '0000-00-00', 0, 800, 0, '', '', 'logo_blue.png', '2019-04-08 13:50:00', '2019-04-08 13:50:00', 3),
(14, 325512, 6, '05/24/2019 - Miami Fl', '16956 Northwest 55th Avenue, Miami Gardens, FL, USA', '04/10/2019', '04/17/2019', 8, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 6, 0, 0, 10, 0, '0000-00-00', 0, 0, 0, '', '', 'logo_blue.png', '2019-04-08 13:58:23', '2019-04-08 13:58:23', 3),
(15, 219931, 6, '05/24/2019 - Miami Fl', '16956 Northwest 55th Avenue, Miami Gardens, FL, USA', '04/10/2019', '04/17/2019', 8, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 6, 100, 4, 10, 0, '0000-00-00', 0, 800, 0, '', '', 'logo_blue.png', '2019-04-08 14:03:19', '2019-04-08 14:03:19', 3),
(16, 763756, 6, '04/24/2019 - Miami Championship Game', '7544 Southwest 157th Court, Miami, FL, USA', '04/10/2019', '04/17/2019', 7, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 9, 100, 5, 10, 0, '0000-00-00', 0, 600, 0, '', '', 'logo_blue.png', '2019-04-09 05:44:47', '2019-04-09 05:44:47', 3),
(17, 883475, 6, 'test-4-3-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', '04/16/2019', '05/15/2019', 3, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 21, 100, 3, 10, 0, '0000-00-00', 0, 900, 0, '', '', 'logo_blue.png', '2019-04-09 14:25:32', '2019-04-09 14:25:32', 3),
(18, 623665, 6, 'test-4-3-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', '04/16/2019', '05/15/2019', 3, 'Marriott Miami Beach', 'Miami Beach, FL, USA', 'marriott', 'Eric Manager', 'manager@usdevco.com', '3053008807', 21, 107, 19, 10, 0, '0000-00-00', 0, 900, 0, '', '', 'logo_blue.png', '2019-04-09 14:26:02', '2019-04-09 14:26:02', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_10_115303_trip_amenties', 1),
(2, '2019_02_04_072929_add_code_to_hotels_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rfps`
--

CREATE TABLE `rfps` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_trip_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `destination` varchar(512) NOT NULL,
  `hotel_information` varchar(512) NOT NULL,
  `distance_event` varchar(255) NOT NULL,
  `offer_rate` tinyint(4) NOT NULL,
  `cc_authorization` tinyint(1) NOT NULL,
  `offer_validity` date NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `sales_manager` varchar(128) NOT NULL,
  `king_beedrooms` tinyint(4) NOT NULL,
  `queen_beedrooms` tinyint(4) NOT NULL,
  `amenitie_ids` varchar(256) NOT NULL,
  `ramount` int(11) NOT NULL,
  `receipt` varchar(555) NOT NULL,
  `hotels_message` text NOT NULL,
  `decline_reason` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `roster` varchar(555) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfps`
--

INSERT INTO `rfps` (`id`, `user_trip_id`, `user_id`, `added`, `status`, `destination`, `hotel_information`, `distance_event`, `offer_rate`, `cc_authorization`, `offer_validity`, `check_in`, `check_out`, `sales_manager`, `king_beedrooms`, `queen_beedrooms`, `amenitie_ids`, `ramount`, `receipt`, `hotels_message`, `decline_reason`, `team`, `roster`, `created_at`, `updated_at`) VALUES
(1, 5, 4, '2019-04-03 11:32:20', 4, 'Miami Beach', '0', '3.79', 11, 1, '2019-04-19', '04/22/2019', '05/15/2019', 'Eric Manager', 22, 21, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-03 11:32:20', '2019-04-08 05:26:07'),
(2, 2, 4, '2019-04-03 11:32:47', 4, 'South Beach', '0', '0.62', 3, 1, '2019-04-26', '04/15/2019', '05/07/2019', 'Eric Manager', 15, 3, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-03 11:32:47', '2019-04-08 05:27:24'),
(3, 1, 4, '2019-04-03 11:39:45', 4, 'City Center', '0', '0.62', 3, 1, '2019-04-25', '04/16/2019', '05/15/2019', 'Eric Manager', 17, 4, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-03 11:39:45', '2019-04-09 14:25:32'),
(4, 4, 92, '2019-04-03 13:20:58', 5, 'Kendall', '0', '0.62', 4, 1, '2019-04-27', '2019-04-17', '2019-05-16', 'test test', 29, 19, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-03 13:20:58', '2019-04-03 16:06:02'),
(5, 8, 4, '2019-04-03 15:44:40', 1, 'Mid-Beach', '0', '3.6', 127, 1, '2019-10-10', '2019-04-17', '2019-04-26', 'Eric Manager', 5, 3, '[1,2]', 0, '', 'Were excited to have you', 0, '', '', '2019-04-03 15:44:40', '2019-04-03 15:44:40'),
(6, 9, 4, '2019-04-05 08:29:28', 4, 'Miami Beach', '0', '1.49', 125, 1, '2019-10-10', '2019-04-12', '2019-04-26', 'Eric Manager', 4, 2, '[1,2]', 0, '', 'great', 0, '', '', '2019-04-05 08:29:28', '2019-04-08 12:43:40'),
(7, 12, 4, '2019-04-08 12:10:13', 4, 'Miami', '0', '28.15', 4, 1, '2019-04-19', '2019-04-10', '2019-04-17', 'Eric Manager', 5, 4, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-08 12:10:13', '2019-04-09 05:44:48'),
(8, 13, 4, '2019-04-08 12:27:29', 2, 'Miami Gardens', '0', '20.01', 102, 1, '2019-10-10', '2019-04-10', '2019-04-17', 'Eric Manager', 4, 2, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-08 12:27:29', '2019-04-12 01:02:42'),
(9, 7, 4, '2019-04-08 14:11:10', 3, 'South Beach', '0', '5.03', 4, 1, '2019-04-18', '2019-04-04', '2019-04-11', 'Eric Manager', 5, 3, '[1,2]', 0, '', 'test', 2, '', '', '2019-04-08 14:11:10', '2019-04-09 14:14:15'),
(10, 3, 4, '2019-04-09 05:01:43', 6, 'South Beach', '0', '1.86', 4, 1, '2019-04-18', '2019-04-15', '2019-05-14', 'Eric Manager', 22, 4, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-09 05:01:43', '2019-04-12 01:04:05'),
(11, 11, 4, '2019-04-09 10:43:21', 3, 'City Center', '0', '0.62', 3, 1, '2019-04-19', '2019-04-03', '2019-05-01', 'Eric Manager', 63, 49, '[1,2,4]', 0, '', 'test', 0, '', '', '2019-04-09 10:43:21', '2019-04-09 12:21:18'),
(13, 6, 4, '2019-04-09 13:06:01', 1, 'South Beach', '0', '0.62', 3, 1, '2019-04-20', '2019-04-16', '2019-05-13', 'Eric Manager', 21, 4, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-09 13:06:01', '2019-04-09 13:06:01'),
(14, 10, 92, '2019-04-09 13:58:19', 1, 'City Center', '0', '0.62', 3, 1, '2019-04-19', '2019-04-16', '2019-05-17', 'test test', 5, 3, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-09 13:58:19', '2019-04-09 13:58:19'),
(15, 15, 4, '2019-04-12 01:00:58', 1, 'City Center', '0', '0.56', 125, 1, '2019-10-10', '2019-07-18', '2019-08-13', 'Eric Manager', 5, 5, '[1,2]', 0, '', '', 0, '', '', '2019-04-12 01:00:58', '2019-04-12 01:00:58'),
(20, 48, 175, '2019-04-13 09:17:16', 2, 'West Palm Beach', '0', '2', 3, 1, '2019-04-27', '2019-04-22', '2019-05-27', 'testtest', 18, 4, '[1,2]', 0, '', 'test', 0, '', '', '2019-04-13 09:17:16', '2019-04-13 09:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `rfps2`
--

CREATE TABLE `rfps2` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_trip_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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
  `decline_reason` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfps2`
--

INSERT INTO `rfps2` (`id`, `user_trip_id`, `user_id`, `added`, `status`, `destination`, `hotel_information`, `distance_event`, `offer_rate`, `cc_authorization`, `offer_validity`, `check_in`, `check_out`, `sales_manager`, `king_beedrooms`, `queen_beedrooms`, `amenitie_ids`, `hotels_message`, `decline_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-12-27 17:09:02', 1, '18800 Vista Park Blvd Tampa, FL 33332 ', 'Hilton Tampa Downtown - 211 N Tampa St, Tampa, FL 33602', 5, 123, 1, '2018-12-01', '2018-12-26', '2018-12-28', 'Sarah Barnes', 8, 10, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 1, '2018-12-27 18:45:29', 1, '19900 Vista Park Blvd Tampa, FL 33333 ', 'Hilton Tampa Downtown - 222 N Tampa St, Tampa, FL 33603', 6, 124, 1, '2018-12-02', '2018-12-28', '2018-12-31', 'Richard Martin', 6, 7, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 1, '2018-12-27 18:47:48', 1, '2225 N Lois Ave, Tampa, FL, 33607', 'Hilton Tampa Airport Westshore', 6, 118, 1, '2018-12-02', '2018-12-28', '2018-12-31', 'Rebecca Wordsmith', 6, 7, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 18, 36, '2018-12-27 17:09:02', 1, '18800 Vista Park Blvd Tampa, FL 33332 ', 'Hilton Tampa Downtown - 211 N Tampa St, Tampa, FL 33602', 5, 123, 1, '2018-12-01', '2018-12-26', '2018-12-28', 'Sarah Barnes', 8, 10, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 18, 36, '2018-12-27 18:45:29', 1, '19900 Vista Park Blvd Tampa, FL 33333 ', 'Hilton Tampa Downtown - 222 N Tampa St, Tampa, FL 33603', 6, 124, 1, '2018-12-02', '2018-12-28', '2018-12-31', 'Richard Martin', 6, 7, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 19, 36, '2018-12-27 18:47:48', 2, '2225 N Lois Ave, Tampa, FL, 33607', 'Hilton Tampa Airport Westshore', 6, 118, 1, '2018-12-02', '2018-12-28', '2018-12-31', 'Rebecca Wordsmith', 6, 7, '', 'Please see our hotel availability, rates and amenities below for your requested dates.  ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 26, 41, '2019-02-12 05:25:23', 1, 'Test City', 'Hilton', 3, 3, 1, '2019-02-20', '2019-01-20', '2019-02-21', 'hotel manager', 4, 3, '[]', 'test', 0, '2019-02-12 05:25:23', '2019-02-12 05:25:23'),
(8, 26, 41, '2019-02-12 05:25:52', 1, 'Test City', 'Hilton', 3, 3, 1, '2019-02-20', '2019-01-20', '2019-02-21', 'hotel manager', 4, 3, '[]', 'test', 0, '2019-02-12 05:25:52', '2019-02-12 05:25:52'),
(9, 26, 41, '2019-02-12 05:27:56', 1, 'Test City', 'Hilton', 3, 3, 1, '2019-02-20', '2019-01-20', '2019-02-21', 'hotel manager', 4, 3, '[]', 'test', 0, '2019-02-12 05:27:56', '2019-02-12 05:27:56'),
(10, 27, 41, '2019-02-12 05:32:32', 1, 'london', 'Hilton', 2, 4, 1, '2019-02-13', '2019-02-18', '2019-02-25', 'hotel manager', 3, 3, '[1,6,7]', 'test', 0, '2019-02-12 05:32:32', '2019-02-12 05:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `roomlistings`
--

CREATE TABLE `roomlistings` (
  `id` int(11) NOT NULL,
  `cordinator_id` int(11) NOT NULL,
  `hmanager_id` int(11) NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomlistings`
--

INSERT INTO `roomlistings` (`id`, `cordinator_id`, `hmanager_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'exportTripDetails (1).csv', '2019-04-05 15:16:25', '2019-04-05 15:16:25'),
(2, 3, 4, 'exportTripDetails (1).csv', '2019-04-05 11:58:40', '2019-04-05 11:58:40'),
(3, 3, 4, 'exportTripDetails (1).csv', '2019-04-05 15:04:26', '2019-04-05 15:04:26'),
(7, 3, 4, 'exportTripDetails (1).csv', '2019-04-05 15:28:11', '2019-04-05 15:28:11'),
(8, 3, 4, 'exportTripDetails (1).csv', '2019-04-05 16:58:52', '2019-04-05 16:58:52'),
(9, 3, 4, 'exportTripDetails (3) (2).csv', '2019-04-05 17:27:01', '2019-04-05 17:27:01'),
(10, 3, 4, 'exportTripDetails (3) (1).csv', '2019-04-05 17:33:25', '2019-04-05 17:33:25'),
(11, 3, 4, 'export.csv', '2019-04-08 05:22:54', '2019-04-08 05:22:54'),
(12, 3, 4, '', '2019-04-08 06:37:38', '2019-04-08 06:37:38'),
(13, 3, 4, 'mimes:csv', '2019-04-08 06:40:36', '2019-04-08 06:40:36'),
(14, 3, 4, 'export.csv', '2019-04-08 08:22:21', '2019-04-08 08:22:21'),
(15, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 08:26:22', '2019-04-08 08:26:22'),
(16, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 08:36:13', '2019-04-08 08:36:13'),
(17, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 08:41:11', '2019-04-08 08:41:11'),
(18, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 08:44:20', '2019-04-08 08:44:20'),
(19, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:44:43', '2019-04-08 08:44:43'),
(20, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:45:08', '2019-04-08 08:45:08'),
(21, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:46:28', '2019-04-08 08:46:28'),
(22, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:47:15', '2019-04-08 08:47:15'),
(23, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:47:51', '2019-04-08 08:47:51'),
(24, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:48:48', '2019-04-08 08:48:48'),
(25, 3, 4, 'exportTripDetails (2).csv', '2019-04-08 08:49:39', '2019-04-08 08:49:39'),
(26, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 09:42:24', '2019-04-08 09:42:24'),
(27, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 09:43:01', '2019-04-08 09:43:01'),
(28, 3, 4, 'exportTripDetails (3) (2).csv', '2019-04-08 09:47:48', '2019-04-08 09:47:48'),
(29, 3, 4, 'exportTripDetails (1).csv', '2019-04-08 12:32:39', '2019-04-08 12:32:39'),
(30, 3, 4, 'export.csv', '2019-04-08 13:48:38', '2019-04-08 13:48:38'),
(31, 3, 4, 'exportTripDetails (1) (1).csv', '2019-04-08 14:00:26', '2019-04-08 14:00:26'),
(32, 3, 4, 'exportTripDetails (1) (1).csv', '2019-04-09 05:12:35', '2019-04-09 05:12:35'),
(33, 3, 4, 'exportTripDetails.csv', '2019-04-09 13:07:08', '2019-04-09 13:07:08'),
(34, 3, 4, 'exportTripDetails (1) (1).csv', '2019-04-09 14:24:49', '2019-04-09 14:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `room_qty`
--

CREATE TABLE `room_qty` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(10) NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_qty`
--

INSERT INTO `room_qty` (`id`, `title`, `disable`) VALUES
(1, '1', 0),
(2, '2', 0),
(3, '3', 0),
(4, '4', 0),
(5, '5', 0),
(6, '6', 0),
(7, '7', 0),
(8, '8', 0),
(9, '9', 0),
(10, '10', 0),
(11, '11', 0),
(12, '12', 0),
(13, '13', 0),
(14, '14', 0),
(15, '15', 0),
(16, '16', 0),
(17, '17', 0),
(18, '18', 0),
(19, '19', 0),
(20, '20', 0),
(21, '21', 0),
(22, '22', 0),
(23, '23', 0),
(24, '24', 0),
(25, '25', 0),
(26, '26', 0),
(27, '27', 0),
(28, '28', 0),
(29, '29', 0),
(30, '30', 0),
(31, '31', 0),
(32, '32', 0),
(33, '33', 0),
(34, '34', 0),
(35, '35', 0),
(36, '36', 0),
(37, '37', 0),
(38, '38', 0),
(39, '39', 0),
(40, '40', 0),
(41, '41', 0),
(42, '42', 0),
(43, '43', 0),
(44, '44', 0),
(45, '45', 0),
(46, '46', 0),
(47, '47', 0),
(48, '48', 0),
(49, '49', 0),
(50, '50', 0),
(51, '51', 0),
(52, '52', 0),
(53, '53', 0),
(54, '54', 0),
(55, '55', 0),
(56, '56', 0),
(57, '57', 0),
(58, '58', 0),
(59, '59', 0),
(60, '60', 0),
(61, '61', 0),
(62, '62', 0),
(63, '63', 0),
(64, '64', 0),
(65, '65', 0),
(66, '66', 0),
(67, '67', 0),
(68, '68', 0),
(69, '69', 0),
(70, '70', 0),
(71, '71', 0),
(72, '72', 0),
(73, '73', 0),
(74, '74', 0),
(75, '75', 0),
(76, '76', 0),
(77, '77', 0),
(78, '78', 0),
(79, '79', 0),
(80, '80', 0),
(81, '81', 0),
(82, '82', 0),
(83, '83', 0),
(84, '84', 0),
(85, '85', 0),
(86, '86', 0),
(87, '87', 0),
(88, '88', 0),
(89, '89', 0),
(90, '90', 0),
(91, '91', 0),
(92, '92', 0),
(93, '93', 0),
(94, '94', 0),
(95, '95', 0),
(96, '96', 0),
(97, '97', 0),
(98, '98', 0),
(99, '99', 0),
(100, '100', 0),
(101, '101', 0),
(102, '102', 0),
(103, '103', 0),
(104, '104', 0),
(105, '105', 0),
(106, '106', 0),
(107, '107', 0),
(108, '108', 0),
(109, '109', 0),
(110, '110', 0),
(111, '111', 0),
(112, '112', 0),
(113, '113', 0),
(114, '114', 0),
(115, '115', 0),
(116, '116', 0),
(117, '117', 0),
(118, '118', 0),
(119, '119', 0),
(120, '120', 0),
(121, '121', 0),
(122, '122', 0),
(123, '123', 0),
(124, '124', 0),
(125, '125', 0),
(126, '126', 0),
(127, '127', 0),
(128, '128', 0),
(129, '129', 0),
(130, '130', 0),
(131, '131', 0),
(132, '132', 0),
(133, '133', 0),
(134, '134', 0),
(135, '135', 0),
(136, '136', 0),
(137, '137', 0),
(138, '138', 0),
(139, '139', 0),
(140, '140', 0),
(141, '141', 0),
(142, '142', 0),
(143, '143', 0),
(144, '144', 0),
(145, '145', 0),
(146, '146', 0),
(147, '147', 0),
(148, '148', 0),
(149, '149', 0),
(150, '150', 0),
(151, '151', 0),
(152, '152', 0),
(153, '153', 0),
(154, '154', 0),
(155, '155', 0),
(156, '156', 0),
(157, '157', 0),
(158, '158', 0),
(159, '159', 0),
(160, '160', 0),
(161, '161', 0),
(162, '162', 0),
(163, '163', 0),
(164, '164', 0),
(165, '165', 0),
(166, '166', 0),
(167, '167', 0),
(168, '168', 0),
(169, '169', 0),
(170, '170', 0),
(171, '171', 0),
(172, '172', 0),
(173, '173', 0),
(174, '174', 0),
(175, '175', 0),
(176, '176', 0),
(177, '177', 0),
(178, '178', 0),
(179, '179', 0),
(180, '180', 0),
(181, '181', 0),
(182, '182', 0),
(183, '183', 0),
(184, '184', 0),
(185, '185', 0),
(186, '186', 0),
(187, '187', 0),
(188, '188', 0),
(189, '189', 0),
(190, '190', 0),
(191, '191', 0),
(192, '192', 0),
(193, '193', 0),
(194, '194', 0),
(195, '195', 0),
(196, '196', 0),
(197, '197', 0),
(198, '198', 0),
(199, '199', 0),
(200, '200', 0),
(201, '201', 0),
(202, '202', 0),
(203, '203', 0),
(204, '204', 0),
(205, '205', 0),
(206, '206', 0),
(207, '207', 0),
(208, '208', 0),
(209, '209', 0),
(210, '210', 0),
(211, '211', 0),
(212, '212', 0),
(213, '213', 0),
(214, '214', 0),
(215, '215', 0),
(216, '216', 0),
(217, '217', 0),
(218, '218', 0),
(219, '219', 0),
(220, '220', 0),
(221, '221', 0),
(222, '222', 0),
(223, '223', 0),
(224, '224', 0),
(225, '225', 0),
(226, '226', 0),
(227, '227', 0),
(228, '228', 0),
(229, '229', 0),
(230, '230', 0),
(231, '231', 0),
(232, '232', 0),
(233, '233', 0),
(234, '234', 0),
(235, '235', 0),
(236, '236', 0),
(237, '237', 0),
(238, '238', 0),
(239, '239', 0),
(240, '240', 0),
(241, '241', 0),
(242, '242', 0),
(243, '243', 0),
(244, '244', 0),
(245, '245', 0),
(246, '246', 0),
(247, '247', 0),
(248, '248', 0),
(249, '249', 0),
(250, '250', 0),
(251, '251', 0),
(252, '252', 0),
(253, '253', 0),
(254, '254', 0),
(255, '255', 0),
(256, '256', 0),
(257, '257', 0),
(258, '258', 0),
(259, '259', 0),
(260, '260', 0),
(261, '261', 0),
(262, '262', 0),
(263, '263', 0),
(264, '264', 0),
(265, '265', 0),
(266, '266', 0),
(267, '267', 0),
(268, '268', 0),
(269, '269', 0),
(270, '270', 0),
(271, '271', 0),
(272, '272', 0),
(273, '273', 0),
(274, '274', 0),
(275, '275', 0),
(276, '276', 0),
(277, '277', 0),
(278, '278', 0),
(279, '279', 0),
(280, '280', 0),
(281, '281', 0),
(282, '282', 0),
(283, '283', 0),
(284, '284', 0),
(285, '285', 0),
(286, '286', 0),
(287, '287', 0),
(288, '288', 0),
(289, '289', 0),
(290, '290', 0),
(291, '291', 0),
(292, '292', 0),
(293, '293', 0),
(294, '294', 0),
(295, '295', 0),
(296, '296', 0),
(297, '297', 0),
(298, '298', 0),
(299, '299', 0),
(300, '300', 0),
(301, '301', 0),
(302, '302', 0),
(303, '303', 0),
(304, '304', 0),
(305, '305', 0),
(306, '306', 0),
(307, '307', 0),
(308, '308', 0),
(309, '309', 0),
(310, '310', 0),
(311, '311', 0),
(312, '312', 0),
(313, '313', 0),
(314, '314', 0),
(315, '315', 0),
(316, '316', 0),
(317, '317', 0),
(318, '318', 0),
(319, '319', 0),
(320, '320', 0),
(321, '321', 0),
(322, '322', 0),
(323, '323', 0),
(324, '324', 0),
(325, '325', 0),
(326, '326', 0),
(327, '327', 0),
(328, '328', 0),
(329, '329', 0),
(330, '330', 0),
(331, '331', 0),
(332, '332', 0),
(333, '333', 0),
(334, '334', 0),
(335, '335', 0),
(336, '336', 0),
(337, '337', 0),
(338, '338', 0),
(339, '339', 0),
(340, '340', 0),
(341, '341', 0),
(342, '342', 0),
(343, '343', 0),
(344, '344', 0),
(345, '345', 0),
(346, '346', 0),
(347, '347', 0),
(348, '348', 0),
(349, '349', 0),
(350, '350', 0),
(351, '351', 0),
(352, '352', 0),
(353, '353', 0),
(354, '354', 0),
(355, '355', 0),
(356, '356', 0),
(357, '357', 0),
(358, '358', 0),
(359, '359', 0),
(360, '360', 0),
(361, '361', 0),
(362, '362', 0),
(363, '363', 0),
(364, '364', 0),
(365, '365', 0),
(366, '366', 0),
(367, '367', 0),
(368, '368', 0),
(369, '369', 0),
(370, '370', 0),
(371, '371', 0),
(372, '372', 0),
(373, '373', 0),
(374, '374', 0),
(375, '375', 0),
(376, '376', 0),
(377, '377', 0),
(378, '378', 0),
(379, '379', 0),
(380, '380', 0),
(381, '381', 0),
(382, '382', 0),
(383, '383', 0),
(384, '384', 0),
(385, '385', 0),
(386, '386', 0),
(387, '387', 0),
(388, '388', 0),
(389, '389', 0),
(390, '390', 0),
(391, '391', 0),
(392, '392', 0),
(393, '393', 0),
(394, '394', 0),
(395, '395', 0),
(396, '396', 0),
(397, '397', 0),
(398, '398', 0),
(399, '399', 0),
(400, '400+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `abbr` varchar(2) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `abbr`, `name`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AZ', 'Arizona'),
(4, 'AR', 'Arkansas'),
(5, 'CA', 'California'),
(6, 'CO', 'Colorado'),
(7, 'CT', 'Connecticut'),
(8, 'DE', 'Delaware'),
(9, 'DC', 'District of Columbia'),
(10, 'FL', 'Florida'),
(11, 'GA', 'Georgia'),
(12, 'HI', 'Hawaii'),
(13, 'ID', 'Idaho'),
(14, 'IL', 'Illinois'),
(15, 'IN', 'Indiana'),
(16, 'IA', 'Iowa'),
(17, 'KS', 'Kansas'),
(18, 'KY', 'Kentucky'),
(19, 'LA', 'Louisiana'),
(20, 'ME', 'Maine'),
(21, 'MD', 'Maryland'),
(22, 'MA', 'Massachusetts'),
(23, 'MI', 'Michigan'),
(24, 'MN', 'Minnesota'),
(25, 'MS', 'Mississippi'),
(26, 'MO', 'Missouri'),
(27, 'MT', 'Montana'),
(28, 'NE', 'Nebraska'),
(29, 'NV', 'Nevada'),
(30, 'NH', 'New Hampshire'),
(31, 'NJ', 'New Jersey'),
(32, 'NM', 'New Mexico'),
(33, 'NY', 'New York'),
(34, 'NC', 'North Carolina'),
(35, 'ND', 'North Dakota'),
(36, 'OH', 'Ohio'),
(37, 'OK', 'Oklahoma'),
(38, 'OR', 'Oregon'),
(39, 'PA', 'Pennsylvania'),
(40, 'RI', 'Rhode Island'),
(41, 'SC', 'South Carolina'),
(42, 'SD', 'South Dakota'),
(43, 'TN', 'Tennessee'),
(44, 'TX', 'Texas'),
(45, 'UT', 'Utah'),
(46, 'VT', 'Vermont'),
(47, 'VA', 'Virginia'),
(48, 'WA', 'Washington'),
(49, 'WV', 'West Virginia'),
(50, 'WI', 'Wisconsin'),
(51, 'WY', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `commentID` int(11) NOT NULL,
  `pageID` int(6) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `comments` longtext,
  `posted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`commentID`, `pageID`, `userID`, `comments`, `posted`) VALUES
(10, 50, 1, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', '2016-09-02 12:45:14'),
(9, 47, 1, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2016-08-31 02:33:19'),
(5, 47, 1, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2016-08-29 13:14:15'),
(8, 48, 4, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2016-08-30 01:23:22'),
(13, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lectus elit, tincidunt nec turpis sed, accumsan iaculis ipsum. Nulla at augue auctor, tristique erat in, ultricies nunc. Mauris eget metus leo. Ut in mi lacinia, mattis nisl non, ultrices risus. Vestibulum aliquet aliquam ipsu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_forms`
--

CREATE TABLE `tb_forms` (
  `formID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `method` enum('eav','table','email') DEFAULT 'table',
  `tablename` varchar(50) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `configuration` longtext,
  `success` text,
  `failed` text,
  `redirect` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forms`
--

INSERT INTO `tb_forms` (`formID`, `name`, `method`, `tablename`, `email`, `configuration`, `success`, `failed`, `redirect`) VALUES
(2, 'Contact Us', 'email', '', 'myemail@mail.com', '{\"surname\":{\"title\":\"Surname\",\"validation\":\"required\",\"type\":\"text\",\"param\":\"\"},\"email\":{\"title\":\"Email Address\",\"validation\":\"required|email\",\"type\":\"text\",\"param\":\"\"},\"subject\":{\"title\":\"Subject\",\"validation\":\"\",\"type\":\"text\",\"param\":\"\"},\"message\":{\"title\":\"Message\",\"validation\":\"required\",\"type\":\"textarea\",\"param\":\"\"}}', 'Thanks for your submission', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_groups`
--

CREATE TABLE `tb_groups` (
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `level` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_groups`
--

INSERT INTO `tb_groups` (`group_id`, `name`, `description`, `level`) VALUES
(1, 'Superadmin', 'Root Superadmin , should be as top level groups', 1),
(2, 'Administrator', 'Administrator level, level No 23', 2),
(3, 'Users', 'Users as registered / member', 3),
(4, 'Travel Coordinator', 'Travel Coordinator', 4),
(5, 'Hotel Manager', 'Hotel Manager', 5),
(6, 'Corporate', 'Corporate', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_groups_access`
--

CREATE TABLE `tb_groups_access` (
  `id` int(6) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `module_id` int(6) DEFAULT NULL,
  `access_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_groups_access`
--

INSERT INTO `tb_groups_access` (`id`, `group_id`, `module_id`, `access_data`) VALUES
(424, 1, 1, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(425, 2, 1, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(426, 3, 1, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(430, 1, 2, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(431, 2, 2, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(432, 3, 2, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(439, 1, 11, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(440, 2, 11, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(441, 3, 11, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(460, 1, 8, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(461, 2, 8, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(462, 3, 8, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(463, 1, 26, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(464, 2, 26, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(465, 3, 26, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(466, 1, 24, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(467, 2, 24, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(468, 3, 24, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(538, 1, 21, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(539, 2, 21, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(540, 3, 21, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"1\",\"is_excel\":\"0\"}'),
(550, 1, 53, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(551, 2, 53, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(552, 3, 53, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(586, 1, 25, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(587, 2, 25, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(588, 3, 25, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(598, 1, 7, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(599, 2, 7, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(600, 3, 7, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(604, 1, 55, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(605, 2, 55, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(606, 3, 55, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(619, 1, 57, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(620, 2, 57, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(621, 3, 57, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(622, 4, 57, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(629, 1, 58, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(630, 2, 58, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"1\",\"is_remove\":\"0\",\"is_excel\":\"1\"}'),
(631, 3, 58, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(632, 4, 58, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(633, 5, 58, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(634, 6, 58, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"1\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(677, 1, 62, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(678, 2, 62, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"0\",\"is_edit\":\"1\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(679, 3, 62, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(680, 4, 62, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(681, 5, 62, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(682, 6, 62, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(689, 1, 63, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(690, 2, 63, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"1\"}'),
(691, 3, 63, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(692, 4, 63, '{\"is_global\":\"0\",\"is_view\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(693, 5, 63, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(694, 6, 63, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(695, 1, 64, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(696, 2, 64, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(697, 3, 64, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(698, 4, 64, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(699, 5, 64, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(700, 6, 64, '{\"is_global\":\"1\",\"is_view\":\"1\",\"is_detail\":\"1\",\"is_add\":\"1\",\"is_edit\":\"1\",\"is_remove\":\"1\",\"is_excel\":\"1\"}'),
(702, 1, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(703, 2, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(704, 3, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(705, 4, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(706, 5, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}'),
(707, 6, 65, '{\"is_global\":\"0\",\"is_view\":\"1\",\"is_detail\":\"0\",\"is_add\":\"0\",\"is_edit\":\"0\",\"is_remove\":\"0\",\"is_excel\":\"0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `auditID` int(20) NOT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `task` varchar(50) DEFAULT NULL,
  `note` text,
  `logdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_logs`
--

INSERT INTO `tb_logs` (`auditID`, `ipaddress`, `user_id`, `module`, `task`, `note`, `logdate`) VALUES
(1, '73.179.237.188', 91, 'invoices', NULL, 'Data with ID 4 Has been Updated !', '2019-03-31 00:41:57'),
(2, '73.179.237.188', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-08 12:42:38'),
(3, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:07:26'),
(4, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:08:03'),
(5, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:12:27'),
(6, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:14:28'),
(7, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:14:40'),
(8, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:14:46'),
(9, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:14:51'),
(10, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:15:32'),
(11, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 07:17:26'),
(12, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 09:42:13'),
(13, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 09:44:48'),
(14, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 09:45:00'),
(15, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 09:47:44'),
(16, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 09:47:53'),
(17, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-09 10:01:30'),
(18, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-09 10:09:33'),
(19, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-09 10:09:48'),
(20, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-09 10:17:13'),
(21, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 1 Has been Updated !', '2019-04-09 10:17:39'),
(22, '13.92.240.159', 4, 'invoices', NULL, 'Data with ID 5 Has been Updated !', '2019-04-09 10:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_type` char(10) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `deep` smallint(2) DEFAULT NULL,
  `ordering` int(6) DEFAULT NULL,
  `position` enum('top','sidebar','both') DEFAULT NULL,
  `menu_icons` varchar(30) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '1',
  `access_data` text,
  `allow_guest` enum('0','1') DEFAULT '0',
  `menu_lang` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`menu_id`, `parent_id`, `module`, `url`, `menu_name`, `menu_type`, `role_id`, `deep`, `ordering`, `position`, `menu_icons`, `active`, `access_data`, `allow_guest`, `menu_lang`) VALUES
(1, 0, 'trips', 'http://13.92.240.159/demo/public/trips', 'Trips', 'external', NULL, NULL, 1, 'sidebar', 'mdi mdi-google-maps fa-fw', '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(27, 0, 'teams', 'http://13.92.240.159/demo/public/teams', 'Teams', 'external', NULL, NULL, 2, 'sidebar', 'mdi mdi-google-maps fa-fw', '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(28, 0, 'preferences', NULL, 'Preferences', 'external', NULL, NULL, 3, 'sidebar', 'mdi mdi-google-maps fa-fw', '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(32, 0, NULL, NULL, 'Invite Users', 'external', NULL, NULL, 1, 'sidebar', 'fa fa-handshake-o', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(33, 32, NULL, 'http://13.92.240.159/demo/public/core/users/coordinator', 'Travel Coordinator', 'external', NULL, NULL, 0, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(34, 32, NULL, 'http://13.92.240.159/demo/public/core/users/hotelmanager', 'Hotel Manager', 'external', NULL, NULL, 1, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(35, 0, NULL, 'http://13.92.240.159/demo/public/corporate', 'Corporate', 'external', NULL, NULL, 2, 'sidebar', 'fa fa-building', '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(36, 0, NULL, '#', 'Hotels', 'external', NULL, NULL, 3, 'sidebar', 'fa fa-hotel', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(37, 0, NULL, 'http://13.92.240.159/demo/public/invoices', 'Invoices', 'external', NULL, NULL, 4, 'sidebar', 'fa fa-print', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"1\",\"6\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(38, 0, NULL, '#', 'Support Ticket', 'external', NULL, NULL, 6, 'sidebar', 'fa fa-support', '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(39, 0, NULL, 'http://13.92.240.159/demo/public/user/logout', 'Logout', 'external', NULL, NULL, 7, 'sidebar', 'fa fa-sign-out', '1', '{\"1\":\"0\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\"}', NULL, NULL),
(40, 32, NULL, 'http://13.92.240.159/demo/public/core/users/corporate', 'Corporate', 'external', NULL, NULL, 2, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, NULL),
(41, 0, NULL, 'http://13.92.240.159/demo/public/core/users', 'Users', 'external', NULL, NULL, 0, 'sidebar', 'fa fa-users', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"1\",\"6\":\"0\"}', NULL, NULL),
(42, 36, NULL, 'http://13.92.240.159/demo/public/systemadmin/hotels', 'View Hotels', 'external', NULL, NULL, 0, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"0\",\"5\":\"1\",\"6\":\"0\"}', NULL, NULL),
(43, 36, NULL, 'http://13.92.240.159/demo/public/systemadmin/hotels/create', 'Create Hotel', 'external', NULL, NULL, 1, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', NULL, NULL),
(44, 45, 'tripstatussettings', 'http://13.92.240.159/demo/public/tripstatussettings', 'Status Settings', 'internal', NULL, NULL, 0, 'sidebar', 'fa fa-suitcase', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(45, 0, NULL, '#', 'Trips', 'external', NULL, NULL, 5, 'sidebar', 'fa fa-suitcase', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, NULL),
(46, 45, 'tripstatuslogs', NULL, 'Logs', 'internal', NULL, NULL, 1, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, NULL),
(48, 0, NULL, 'http://13.92.240.159/demo/public/corporate/user', 'Corporate ', 'external', NULL, NULL, 5, 'sidebar', 'fa fa-users', '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(49, 0, NULL, 'http://13.92.240.159/demo/public/hotelmanager/trips', 'Trips', 'external', NULL, NULL, NULL, 'sidebar', 'fa fa-suitcase', '1', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"1\",\"6\":\"1\"}', NULL, NULL),
(50, 0, NULL, 'http://13.92.240.159/demo/public/hotelmanager/agreements', 'Agreements', 'external', NULL, NULL, 4, 'sidebar', 'fa fa-handshake-o', '1', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\"}', NULL, NULL),
(51, 0, 'invoices', 'http://13.92.240.159/demo/public/revenue', 'Revenue', 'external', NULL, NULL, NULL, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(52, 0, NULL, 'http://13.92.240.159/demo/public/booking', 'Booking', 'external', NULL, NULL, NULL, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"1\"}', NULL, '{\"title\":{\"id\":\"\"}}'),
(53, 0, NULL, 'http://13.92.240.159/demo/public/client', 'Client', 'external', NULL, NULL, NULL, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', '0', '{\"title\":{\"id\":\"\"}}'),
(54, 0, 'trips', 'http://13.92.240.159/demo/public/compare', 'compare', 'external', NULL, NULL, 1, 'sidebar', NULL, '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', '0', '{\"title\":{\"id\":\"\"}}'),
(55, 0, NULL, 'http://13.92.240.159/demo/public/hotelmanager/room-listing', 'room-listing', 'external', NULL, NULL, 5, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"1\",\"6\":\"0\"}', '0', '{\"title\":{\"id\":\"\"}}'),
(56, 0, NULL, 'http://13.92.240.159/demo/public/hotelmanager/blackout', 'Blackout-dates', 'external', NULL, NULL, 6, 'sidebar', NULL, '1', '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"1\",\"6\":\"1\"}', '0', '{\"title\":{\"id\":\"\"}}'),
(57, 0, NULL, 'http://13.92.240.159/demo/public/hotelmanager/blackoutReport', 'Blackout-Report', 'external', NULL, NULL, 10, 'sidebar', NULL, '1', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', '0', '{\"title\":{\"id\":\"\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_module`
--

CREATE TABLE `tb_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(100) DEFAULT NULL,
  `module_title` varchar(100) DEFAULT NULL,
  `module_note` varchar(255) DEFAULT NULL,
  `module_author` varchar(100) DEFAULT NULL,
  `module_created` timestamp NULL DEFAULT NULL,
  `module_desc` text,
  `module_db` varchar(255) DEFAULT NULL,
  `module_db_key` varchar(100) DEFAULT NULL,
  `module_type` char(20) DEFAULT 'native',
  `module_config` longtext,
  `module_lang` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_module`
--

INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(1, 'users', 'User Lists', 'View All Users', 'Mango Tm', '2013-07-10 15:46:46', NULL, 'tb_users', 'id', 'core', 'eyJ0YWJsZV9kY4oIonR4XgVzZXJzo4w4cHJ1bWFyeV9rZXk4O4JlciVyXi3ko4w4Zp9ybV9jbixlbWa4OjosopZvcplfbGFmbgV0oj17opNvbHVtb4oIM4w4dG30bGU4O4JVciVycyxEYXRho4w4Zp9ybWF0oj24ZgJ1ZCosopR1cgBsYXk4O4J2bgJ1ep9udGFson0sonNxbF9zZWx3YgQ4O4JTRUxFQlQ5oHR4XgVzZXJzL42soCB0Y39ncp9lcHMubpFtZSBcbkZST005dGJfdXN3cnM5TEVGVCBKT03OoHR4XidybgVwcyBPT4B0Y39ncp9lcHMuZgJvdXBf6WQ5PSB0Y39lciVycymncp9lcF91ZCosonNxbF9g6GVyZSoIo4A5oFdoRVJFoHR4XgVzZXJzLp3koCE9Jyc5oCosonNxbF9ncp9lcCoIo4A5oCA4LCJpbgJtcyoIWgs4Zp33bGQ4O4J1ZCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4owo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopdybgVwXi3ko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RgJvdXA5XC85TGViZWw4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24cpVxdW3yZWQ4LCJi6WVgoj2xLCJ0eXB3oj24ciVsZWN0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24ZXh0ZXJuYWw4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4J0Y39ncp9lcHM4LCJsbi9rdXBf6iVmoj24ZgJvdXBf6WQ4LCJsbi9rdXBfdpFsdWU4O4JuYWl3o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JlciVybpFtZSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3VzZXJuYWl3o4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jp6XJzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Rp3ycgQ5TpFtZSosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojM4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGFzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TGFzdCBOYWl3o4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4o0o4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopVtYW3so4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RWlh6Ww4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24ZWlh6Ww4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4olo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonBhcgNgbgJko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGFzcgdvcpQ4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oio4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jsbid1b39hdHR3bXB0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TG9n6Wa5QXR0ZWlwdCosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojc4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGFzdF9sbid1b4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5TG9n6Wa4LCJpbgJtXidybgVwoj24MSosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oao4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhdpF0YXo4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JBdpF0YXo4LCJpbgJtXidybgVwoj24MSosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4omo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24XC9lcGxvYWRzXC9lciVyclwvo4w4cpVz6X13Xgd1ZHR2oj24o4w4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epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEzo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWN06XZhdG3vb4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFjdG3iYXR1bia4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxNCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJ3bWVtYpVyXgRv6iVu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bHV3oj24on0seyJp6WVsZCoIopFiYXRhc4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFiYXRhc4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MzA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIop3tYWd3o4w4Zp9ybWF0XgZhbHV3oj24XC9lcGxvYWRzXC9lciVyclwvon0seyJp6WVsZCoIopdybgVwXi3ko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RgJvdXA4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MyosopNvbpa4Ons4dpFs6WQ4O4oxo4w4ZGo4O4J0Y39ncp9lcHM4LCJrZXk4O4Jncp9lcF91ZCosopR1cgBsYXk4O4JuYWl3on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JuYWl3o4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokdybgVwo4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JlciVybpFtZSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3VzZXJuYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojU4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jp6XJzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Rp3ycgQ5TpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TGFzdCBOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J3bWF1bCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokVtYW3so4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIoj54LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JwYXNzdi9yZCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3BhcgNgbgJko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojk4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jsbid1b39hdHR3bXB0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TG9n6Wa5QXR0ZWlwdCosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMCosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNyZWF0ZWRfYXQ4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JDcpVhdGVkoEF0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojExo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9sbid1b4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5TG9n6Wa4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTo4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JlcGRhdGVkXiF0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VXBkYXR3ZCBBdCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMyosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonJ3bW3uZGVyo4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UpVt6WmkZXo4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTM4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWN06XZhdG3vb4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFjdG3iYXR1bia4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTQ4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWN06XZ3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWN06XZ3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE0o4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4JpdWmjdG3vb4osopZvcplhdF9iYWxlZSoIo3N1dGVoZWxwZXJzfHVzZXJTdGF0dXN8YWN06XZ3on0seyJp6WVsZCoIonJ3bWVtYpVyXgRv6iVuo4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UpVtZWl4ZXo5VG9rZWa4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTU4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9hYgR1dp30eSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5QWN06XZ1dHk4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24Yi9uZp3no4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qi9uZp3no4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEgo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldfQ==', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}'),
(2, 'groups', 'Users Group', 'View All', 'Mango Tm', '2013-07-10 06:45:14', NULL, 'tb_groups', 'group_id', 'core', 'eyJ0YWJsZV9kY4oIonR4XidybgVwcyosonBy6Wlhcn3f6iVmoj246WQ4LCJzcWxfciVsZWN0oj24U0VMRUNUoCBcb3x0dGJfZgJvdXBzLpdybgVwXi3kLFxuXHR0Y39ncp9lcHMubpFtZSxcb3x0dGJfZgJvdXBzLpR3ciNy6XB06W9uLFxuXHR0Y39ncp9lcHMubGViZWxcb3xuXGmGUk9NoHR4XidybgVwcyA4LCJzcWxfdih3cpU4O4o5oFdoRVJFoHR4XidybgVwcymncp9lcF91ZCBJUyBOTlQ5T3VMTCA4LCJzcWxfZgJvdXA4O4o5oCosopdy6WQ4O3t7opZ1ZWxkoj24ZgJvdXBf6WQ4LCJhbG3hcyoIonR4XidybgVwcyosopxhYpVsoj24SUQ4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4owo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopmhbWU4LCJhbG3hcyoIonR4XidybgVwcyosopxhYpVsoj24TpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIo4osonNvcnRs6XN0oj24MSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JkZXNjcp3wdG3vb4osopFs6WFzoj24dGJfZgJvdXBzo4w4bGF4ZWw4O4JEZXNjcp3wdG3vb4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIo4osonNvcnRs6XN0oj24M4osopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JsZXZ3bCosopFs6WFzoj24dGJfZgJvdXBzo4w4bGF4ZWw4O4JMZXZ3bCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojM4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fV0sopZvcplzoj1beyJp6WVsZCoIopdybgVwXi3ko4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokdybgVwoE3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J26WRkZWa4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojA4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bpFtZSosopFs6WFzoj24dGJfZgJvdXBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JOYWl3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24cpVxdW3yZWQ4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4oxo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopR3ciNy6XB06W9uo4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokR3ciNy6XB06W9uo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JsZXZ3bCosopFs6WFzoj24dGJfZgJvdXBzo4w4bGF4ZWw4O4JMZXZ3bCosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsopVk6XQ4OjEsonN3YXJj6CoIojE4LCJz6X13oj24o4w4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIbnVsbCw4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj1udWxsLCJsbi9rdXBf6iVmoj1udWxsLCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj1udWxsLCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj1udWxsLCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1udWxsLCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4osonByZWZ1eCoIo4osonNlZp3aoj24onl9XX0=', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}'),
(4, 'module', 'Module Management', 'All module applications', 'Mango Tm', '2013-08-25 04:58:43', NULL, 'tb_module', 'module_id', 'core', 'eyJ0YWJsZV9kY4oIonR4XilvZHVsZSosonBy6Wlhcn3f6iVmoj24bW9kdWx3Xi3ko4w4cgFsXgN3bGVjdCoIo3NFTEVDVCB0Y39tbiRlbGUubW9kdWx3Xi3kLHR4XilvZHVsZSmtbiRlbGVfbpFtZSx0Y39tbiRlbGUubW9kdWx3XgR1dGx3LHR4XilvZHVsZSmtbiRlbGVfbp90ZSx0Y39tbiRlbGUubW9kdWx3XiFldGhvc4x0Y39tbiRlbGUubW9kdWx3XiNyZWF0ZWQsdGJfbW9kdWx3LplvZHVsZV9kZXNjLHR4XilvZHVsZSmtbiRlbGVfZGosdGJfbW9kdWx3LplvZHVsZV9kY39rZXksdGJfbW9kdWx3LplvZHVsZV90eXB3LHR4XilvZHVsZSmncp9lcF91ZCx0Y39tbiRlbGUubW9kdWx3XgBhdG55oEZST005dGJfbW9kdWx3oCosonNxbF9g6GVyZSoIo4A5oFdoRVJFoHR4XilvZHVsZSmtbiRlbGVf6WQ5SVM5Tk9UoEmVTEw5QUmEoGlvZHVsZV9uYWl3oCE9JilvZHVsZSc5oCosonNxbF9ncp9lcCoIo4A5oCA4LCJpbgJtcyoIWgs4Zp33bGQ4O4JtbiRlbGVf6WQ4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oE3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J26WRkZWa4LCJhZGQ4OpZhbHN3LCJ3ZG30oj1pYWxzZSw4ciVhcpN2oj2wLCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4O4owo4w4bgB06W9uoj17op9wdF90eXB3oj1pYWxzZSw4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIZpFsciUsopxvbitlcF9iYWxlZSoIZpFsciUsop3zXiR3cGVuZGVuYgk4OpZhbHN3LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4OpZhbHN3LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1pYWxzZSw4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3XimhbWU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oEmhbWU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4O4o4LCJ3ZG30oj24o4w4ciVhcpN2oj2xLCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjEsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtbiRlbGVfdG30bGU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oFR1dGx3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MSosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj24o4w4ZWR1dCoIo4osonN3YXJj6CoIMSw4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2yLCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4owo4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3XimvdGU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oEmvdGU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi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dGVuZF9jbGFzcyoIo4J9fV0sopdy6WQ4O3t7opZ1ZWxkoj24bW9kdWx3Xi3ko4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIoklvZHVsZSBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XgBhdG54LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24QXBwcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XimhbWU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24Qi9udHJvbGx3c4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojM4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XgR1dGx3o4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIoklvZHVsZSBOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEyMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtbiRlbGVfbp90ZSosopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JObgR3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojElMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtbiRlbGVfYXV06G9yo4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIokFldGhvc4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojY4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XiNyZWF0ZWQ4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24QgJ3YXR3ZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XiR3ciM4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oER3ciM4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oao4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV9kY4osopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JNbiRlbGU5RGo4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4omo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV9kY39rZXk4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oER4oEt3eSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEwo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV90eXB3o4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIo3RmcGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4Jncp9lcF91ZCosopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JHcp9lcCBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fXldfQ==', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(7, 'menu', 'Menu Management', 'Manage All Menu', 'Mango Tm', '2014-01-06 07:50:29', NULL, 'tb_menu', 'menu_id', 'core', 'eyJ0YWJsZV9kY4oIonR4Xil3bnU4LCJwcp3tYXJmXit3eSoIopl3bnVf6WQ4LCJzcWxfciVsZWN0oj24U0VMRUNUoHR4Xil3bnUuK4A5R3JPTSB0Y39tZWmloCosonNxbF9g6GVyZSoIo4BXSEVSRSB0Y39tZWmlLpl3bnVf6WQ5SVM5Tk9UoEmVTEw4LCJzcWxfZgJvdXA4O4o4LCJncp3koj1beyJp6WVsZCoIopl3bnVf6WQ4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokl3bnU5SWQ4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24MCosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIonBhcpVudF91ZCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24UGFyZWm0oE3ko4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4oxMDA4LCJzbgJ0bG3zdCoIojE4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JtbiRlbGU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIoklvZHVsZSosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTUwo4w4ci9ydGx1cgQ4O4ozo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24dXJso4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JVcpw4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24MyosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopl3bnVfbpFtZSosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24TWVudSBOYWl3o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4ozMDA4LCJzbgJ0bG3zdCoIojo4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JtZWmlXgRmcGU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokl3bnU5VH3wZSosonZ1ZXc4O4owo4w4ZGV0YW3soj24MCosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4olo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24cp9sZV91ZCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24Up9sZSBJZCosonZ1ZXc4O4owo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4oio4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24ZGV3cCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24RGV3cCosonZ1ZXc4O4owo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4ogo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24bgJkZXJ1bpc4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIok9yZCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24NTA4LCJzbgJ0bG3zdCoIoj54LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JwbgN1dG3vb4osopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24UG9z6XR1bia4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24OSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopl3bnVf6WNvbnM4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo4BJYi9uo4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4olMCosonNvcnRs6XN0oj24MTA4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JhYgR1dpU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokFjdG3iZSosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosond1ZHR2oj24NTA4LCJhbG3nb4oIopN3bnR3c4osonNvcnRs6XN0oj24NyosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0onldLCJpbgJtcyoIWgs4Zp33bGQ4O4JtZWmlXi3ko4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloE3ko4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3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bG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bWVudV90eXB3o4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloFRmcGU4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJvbGVf6WQ4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo3JvbGU5SWQ4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIN4w4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopR3ZXA4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokR3ZXA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINyw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIop9yZGVy6Wmno4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JPcpR3cp3uZyosonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2aLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cG9z6XR1bia4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo3Bvci306W9uo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjksopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZWmlXi3jbimzo4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloE3jbimzo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjEwLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWN06XZ3o4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JBYgR1dpU4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTEsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XX0=', NULL),
(8, 'pages', 'Pages CMS', 'View all static pages', 'Mango Tm', '2014-03-25 22:33:41', NULL, 'tb_pages', 'pageID', 'core', 'eyJ0YWJsZV9kY4oIonR4XgBhZiVzo4w4cHJ1bWFyeV9rZXk4O4JwYWd3SUQ4LCJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39wYWd3cyaqoEZST005dGJfcGFnZXM5o4w4cgFsXgd2ZXJ3oj24oFdoRVJFoHR4XgBhZiVzLnBhZiVJRCBJUyBOTlQ5T3VMTCosonNxbF9ncp9lcCoIo4osopdy6WQ4O3t7opZ1ZWxkoj24cGFnZU3Eo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JQYWd3SUQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MSosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonR1dGx3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JU6XRsZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oyo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Tp90ZSosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWx1YXM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3NsdWc5XC85QWx1YXM4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopZ1bGVuYWl3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JG6Wx3bpFtZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4olo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24cgRhdHVzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JTdGF0dXM4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24N4osopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopFjYiVzcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QWNjZXNzo4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JjcpVhdGVko4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JDcpVhdGVko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIoj54LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JhbGxvdl9ndWVzdCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QWxsbgc5RgV3cgQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24OSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JlcGRhdGVko4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JVcGRhdGVko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojk4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J0ZWlwbGF0ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VGVtcGxhdGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bWV0YWt3eSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24TWV0YWt3eSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JtZXRhZGVzYyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24TWV0YWR3ciM4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZGVpYXVsdCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24SG9tZXBhZiU5PyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9XSw4Zp9ybXM4O3t7opZ1ZWxkoj24cGFnZU3Eo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGFnZU3Eo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J26WRkZWa4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojE4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JU6XRsZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhbG3hcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFs6WFzo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24YWxwYSosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9k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XiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J0ZWlwbGF0ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3R3bXBsYXR3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24MTA4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bWV0YWt3eSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokl3dGFrZXk4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxMSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZXRhZGVzYyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokl3dGFkZXNjo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24MTo4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZGVpYXVsdCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokR3ZpFlbHQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIopN2ZWNrYp9ao4w4YWRkoj2xLCJ3ZG30oj2xLCJzZWFyYi54O4owo4w4ci3IZSoIo4osonNvcnRs6XN0oj24MTM4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24ZGF0YWx1cgQ4LCJsbi9rdXBfcXV3cnk4O4oxO333cyosopxvbitlcF90YWJsZSoIbnVsbCw4bG9v6gVwXit3eSoIbnVsbCw4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIbnVsbCw4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIbnVsbCw4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIbnVsbCw4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4LCJwcpVp6X54O4o4LCJzdWZ1eCoIo4J9fVl9', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}'),
(11, 'logs', 'Logs', 'Users Activity Log', 'Mango Tm', '2014-04-21 22:59:43', NULL, 'tb_logs', 'auditID', 'core', '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ZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4OjUsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w46XNfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIoplvZHVsZSosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNbiRlbGU4LCJpbgJtXidybgVwoj2xLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4OjYsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w46XNfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fXldLCJncp3koj1beyJp6WVsZCoIopxvZiRhdGU4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24TG9nZGF0ZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24ZGF0ZSosopZvcplhdF9iYWxlZSoIopRcLilcLlk4fSx7opZ1ZWxkoj24YXVk6XRJRCosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JBdWR1dE3Eo4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj246XBhZGRyZXNzo4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3QcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonVzZXJf6WQ4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VXN3cnM4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4oxo4w4ZGo4O4J0Y39lciVycyosopt3eSoIop3ko4w4ZG3zcGxheSoIopZ1cnN0XimhbWU4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIoplvZHVsZSosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNbiRlbGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J0YXNro4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3Rhcis4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24N4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JubgR3o4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokmvdGU4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9XX0=', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}'),
(21, 'notification', 'Notification', 'View my notification', 'Mango Tm', '2015-07-09 05:20:42', NULL, 'tb_notification', 'id', 'core', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39ubgR1Zp3jYXR1biauK4BGUk9NoHR4XimvdG3p6WNhdG3vb4A4LCJzcWxfdih3cpU4O4o5V0hFUkU5dGJfbp906WZ1YiF06W9uLp3koE3ToEmPVCBOVUxMo4w4cgFsXidybgVwoj24o4w4dGF4bGVfZGo4O4J0Y39ubgR1Zp3jYXR1bia4LCJwcp3tYXJmXit3eSoIop3ko4w4ZgJ1ZCoIWgs4Zp33bGQ4O4J1ZCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3ko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dXN3cp3ko4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VXN3cp3ko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dXJso4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VXJso4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokmvdGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JjcpVhdGVko4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24RGF0ZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIop3jbia4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJYi9uo4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj246XNfcpVhZCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3zoFJ3YWQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9XSw4Zp9ybXM4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJZCosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24MSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4LCJwcpVp6X54O4o4LCJzdWZ1eCoIo4J9fSx7opZ1ZWxkoj24dXN3cp3ko4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VXN3cp3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oyo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4osonByZWZ1eCoIo4osonNlZp3aoj24onl9LHs4Zp33bGQ4O4Jlcpw4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JVcpw4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojQ4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24o4w4cHJ3Zp3aoj24o4w4cgVp6X54O4o4fX0seyJp6WVsZCoIopmvdGU4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JObgR3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojU4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24o4w4cHJ3Zp3aoj24o4w4cgVp6X54O4o4fX0seyJp6WVsZCoIopNyZWF0ZWQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhYpVsoj24RGF0ZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadF9kYXR3o4w4YWRkoj2xLCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci3IZSoIo4osonNvcnRs6XN0oj24Myosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4OpmlbGwsopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIbnVsbCw4bG9v6gVwXit3eSoIbnVsbCw4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIbnVsbCw4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIbnVsbCw4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIbnVsbCw4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4LCJwcpVp6X54O4o4LCJzdWZ1eCoIo4J9fSx7opZ1ZWxkoj246WNvb4osopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3jbia4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojY4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24o4w4cHJ3Zp3aoj24o4w4cgVp6X54O4o4fX0seyJp6WVsZCoIop3zXgJ3YWQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJcyBSZWFko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4ogo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4osonByZWZ1eCoIo4osonNlZp3aoj24onl9XX0=', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(24, 'posts', 'Posts Articles', 'View All', 'Mango Tm', '2016-08-19 23:14:44', NULL, 'tb_pages', 'pageID', 'core', 'eyJ0YWJsZV9kY4oIonR4XgBhZiVzo4w4cHJ1bWFyeV9rZXk4O4JwYWd3SUQ4LCJpbgJtXiNvbHVtb4oIM4w4Zp9ybV9sYX3vdXQ4Ons4Yi9sdWluoj2yLCJ06XRsZSoIo3BvcgQ5Qi9udGVudCxQbgN0oER3dGF1bCosopZvcplhdCoIopdy6WQ4LCJk6XNwbGFmoj24dpVydG3jYWw4fSw4cgFsXgN3bGVjdCoIo4BTRUxFQlQ5dGJfcGFnZXMuK4AsoENPVUmUKGNvbWl3bnRJRCk5QVM5Yi9tbWVudHM5R3JPTSB0Y39wYWd3cyBcc3xuoExFR3Q5Sk9JT4B0Y39jbiltZWm0cyBPT4B0Y39jbiltZWm0cymwYWd3SUQ5PSB0Y39wYWd3cymwYWd3SUQ4LCJzcWxfdih3cpU4O4o5V0hFUkU5dGJfcGFnZXMucGFnZU3EoE3ToEmPVCBOVUxMoEFORCBwYWd3dH3wZSA9oCdwbgN0JyosonNxbF9ncp9lcCoIokdSTlVQoEJZoHR4XgBhZiVzLnBhZiVJRCosopdy6WQ4O3t7opZ1ZWxkoj24YgJ3YXR3ZCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24RGF0ZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24ZGF0ZSosopZvcplhdF9iYWxlZSoIok05ZCxZon0seyJp6WVsZCoIonBhZiVJRCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24UGFnZU3Eo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3R1dGx3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojM4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWx1YXM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokFs6WFzo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Tp90ZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4olo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonVwZGF0ZWQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3VwZGF0ZWQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24N4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jp6Wx3bpFtZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Rp3sZWmhbWU4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JzdGF0dXM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3N0YXRlcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oao4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopFjYiVzcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QWNjZXNzo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojk4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWxsbgdfZgV3cgQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokFsbG9goEdlZXN0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonR3bXBsYXR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JUZWlwbGF0ZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JtZXRh6iVmo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNZXRh6iVmo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopl3dGFkZXNjo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNZXRhZGVzYyosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JkZWZhdWx0o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JEZWZhdWx0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonBhZiV0eXB3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JQYWd3dH3wZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxNSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Ji6WVgcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Vp33dgM4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MjA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGF4ZWxzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JMYWJ3bHM4LCJi6WVgoj2xLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dXN3cp3ko4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JBdXR2bgo4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTc4LCJjbimuoj17onZhbG3koj24MSosopR4oj24dGJfdXN3cnM4LCJrZXk4O4J1ZCosopR1cgBsYXk4O4JlciVybpFtZSJ9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj246WlhZiU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3tYWd3o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEao4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNvbWl3bnRzo4w4YWx1YXM4O4o4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Qi9tbWVudChzKSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxOSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9XSw4Zp9ybXM4O3t7opZ1ZWxkoj24cGFnZU3Eo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGFnZU3Eo4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JU6XRsZSosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopFs6WFzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWx1YXM4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokmvdGU4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojQ4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jp6Wx3bpFtZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokZ1bGVuYWl3o4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24NSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopFsbG9gXidlZXN0o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWxsbgc5RgV3cgQ4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oio4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bWV0YWt3eSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokl3dGFrZXk4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4ogo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bWV0YWR3ciM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JNZXRhZGVzYyosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oao4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZGVpYXVsdCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokR3ZpFlbHQ4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4omo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGF4ZWxzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TGF4ZWxzo4w4Zp9ybV9ncp9lcCoIojE4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadGFyZWE4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24MTA4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JjcpVhdGVko4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QgJ3YXR3ZCosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRfZGF0ZXR1bWU4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojExo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dXBkYXR3ZCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3VwZGF0ZWQ4LCJpbgJtXidybgVwoj24MSosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0XiRhdGV06Wl3o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxM4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopFjYiVzcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFjYiVzcyosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEzo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cGFnZXRmcGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JQYWd3dH3wZSosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxNCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonN0YXRlcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3N0YXRlcyosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojElo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dGVtcGxhdGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JUZWlwbGF0ZSosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEio4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dXN3cp3ko4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VXN3cp3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxNyosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIop3tYWd3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24SWlhZiU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIopZ1bGU4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEao4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24XC9lcGxvYWRzXC91bWFnZXNcLyosonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIop3tYWd3o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dp33dgM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JW6WVgcyosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadGFyZWE4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEmo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fVl9', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}'),
(25, 'post', 'Post', 'View All', 'Mango Tm', '2016-08-22 16:20:42', NULL, 'tb_pages', 'pageID', 'core', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39wYWd3cyaqoEZST005dGJfcGFnZXM5o4w4cgFsXgd2ZXJ3oj24oFdoRVJFoHR4XgBhZiVzLnBhZiVJRCBJUyBOTlQ5T3VMTCosonNxbF9ncp9lcCoIo4osonRhYpx3XiR4oj24dGJfcGFnZXM4LCJwcp3tYXJmXit3eSoIonBhZiVJRCosopdy6WQ4O3t7opZ1ZWxkoj24cGFnZU3Eo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24UGFnZU3Eo4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoIMCw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JU6XRsZSosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4OjEsond1ZHR2oj24MTAwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopFs6WFzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24QWx1YXM4LCJsYWmndWFnZSoIWl0sonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJhbG3nb4oIopx3ZnQ4LCJi6WVgoj24MSosopR3dGF1bCoIojE4LCJzbgJ0YWJsZSoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosonNvcnRs6XN0oj2yLCJg6WR06CoIojEwMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JubgR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24Tp90ZSosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4OjMsond1ZHR2oj24MTAwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNyZWF0ZWQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JDcpVhdGVko4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoINCw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dXBkYXR3ZCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3VwZGF0ZWQ4LCJsYWmndWFnZSoIWl0sonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJhbG3nb4oIopx3ZnQ4LCJi6WVgoj24MSosopR3dGF1bCoIojE4LCJzbgJ0YWJsZSoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosonNvcnRs6XN0oj2lLCJg6WR06CoIojEwMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jp6Wx3bpFtZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokZ1bGVuYWl3o4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoIN4w4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24cgRhdHVzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24UgRhdHVzo4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoINyw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWNjZXNzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24QWNjZXNzo4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoIOCw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWxsbgdfZgV3cgQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JBbGxvdyBHdWVzdCosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4Ojksond1ZHR2oj24MTAwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonR3bXBsYXR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24VGVtcGxhdGU4LCJsYWmndWFnZSoIWl0sonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJhbG3nb4oIopx3ZnQ4LCJi6WVgoj24MSosopR3dGF1bCoIojE4LCJzbgJ0YWJsZSoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosonNvcnRs6XN0oj2xMCw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bWV0YWt3eSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokl3dGFrZXk4LCJsYWmndWFnZSoIWl0sonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJhbG3nb4oIopx3ZnQ4LCJi6WVgoj24MSosopR3dGF1bCoIojE4LCJzbgJ0YWJsZSoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosonNvcnRs6XN0oj2xMSw4di3kdG54O4oxMDA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bWV0YWR3ciM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JNZXRhZGVzYyosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4OjEyLCJg6WR06CoIojEwMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JkZWZhdWx0o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24RGVpYXVsdCosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4OjEzLCJg6WR06CoIojEwMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JwYWd3dH3wZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3BhZiV0eXB3o4w4bGFuZgVhZiU4O3tdLCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJzbgJ0bG3zdCoIMTQsond1ZHR2oj24MTAwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4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cF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonVwZGF0ZWQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JVcGRhdGVko4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0XiRhdGV06Wl3o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jp6Wx3bpFtZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokZ1bGVuYWl3o4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIN4w4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoI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ZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZXRh6iVmo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24TWV0YWt3eSosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjExLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopl3dGFkZXNjo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24TWV0YWR3ciM4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHRhcpVho4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTosopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZGVpYXVsdCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokR3ZpFlbHQ4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2xMyw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JwYWd3dH3wZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3BhZiV0eXB3o4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTQsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGF4ZWxzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24TGF4ZWxzo4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjElLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonZ1ZXdzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24Vp33dgM4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2xN4w4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XX0=', NULL),
(26, 'forms', 'Form Generator', 'View All', NULL, '2016-09-07 17:24:05', NULL, 'tb_forms', 'formID', 'core', 'eyJ0YWJsZV9kY4oIonR4XiZvcplzo4w4cHJ1bWFyeV9rZXk4O4JpbgJtSUQ4LCJpbgJtXiNvbHVtb4oIM4w4Zp9ybV9sYX3vdXQ4Ons4Yi9sdWluoj2yLCJ06XRsZSoIokJhci3joEZvcp0sTWVzciFnZSBObgR3o4w4Zp9ybWF0oj24ZgJ1ZCosopR1cgBsYXk4O4JiZXJ06WNhbCJ9LCJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39pbgJtcyaqoEZST005dGJfZp9ybXM5o4w4cgFsXgd2ZXJ3oj24oFdoRVJFoHR4XiZvcplzLpZvcplJRCBJUyBOTlQ5T3VMTCosonNxbF9ncp9lcCoIo4osopdy6WQ4O3t7opZ1ZWxkoj24Zp9ybU3Eo4w4YWx1YXM4O4J0Y39pbgJtcyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JGbgJtSUQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4osonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopmhbWU4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokmhbWU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4osonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopl3dGhvZCosopFs6WFzoj24dGJfZp9ybXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24TWV06G9ko4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4J0YWJsZWmhbWU4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3RhYpx3bpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24o4w4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24ZWlh6Ww4LCJhbG3hcyoIonR4XiZvcplzo4w4bGF4ZWw4O4JFbWF1bCosopxhbpdlYWd3oj1bXSw4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopFs6Wduoj24bGVpdCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4ci9ydGx1cgQ4OjQsond1ZHR2oj24MTAwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNvbpZ1ZgVyYXR1bia4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokNvbpZ1ZgVyYXR1bia4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4osonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIonNlYiN3cgM4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3NlYiN3cgM4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4osonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopZh6Wx3ZCosopFs6WFzoj24dGJfZp9ybXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24RpF1bGVko4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JyZWR1cpVjdCosopFs6WFzoj24dGJfZp9ybXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24UpVk6XJ3YgQ4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4osonRmcGU4O4J0ZXh0onldLCJpbgJtcyoIWgs4Zp33bGQ4O4JpbgJtSUQ4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokZvcplJRCosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIoph1ZGR3b4osopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24MCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopmhbWU4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokZvcp05TpFtZSosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZXR2biQ4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3N0bgJ3ZCBNZXR2biQ4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24cpVxdW3yZWQ4LCJi6WVgoj2xLCJ0eXB3oj24cpFk6W84LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4JkYXRhbG3zdCosopxvbitlcF9xdWVyeSoIopVhdj1FbnR3eSBBdHRy6WJldGU5VpFsdWV8dGF4bGUIQpFzZWQ5RnJvbSBEYXRhYpFzZSosopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dGF4bGVuYWl3o4w4YWx1YXM4O4J0Y39pbgJtcyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JUYWJsZWmhbWU4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24Yi9uZp3ndXJhdG3vb4osopFs6WFzoj24dGJfZp9ybXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24Qi9uZp3ndXJhdG3vb4osopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojQ4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J3bWF1bCosopFs6WFzoj24dGJfZp9ybXM4LCJsYWJ3bCoIokVtYW3so4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci3IZSoIo4osonNvcnRs6XN0oj24NCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4OpmlbGwsopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIbnVsbCw4bG9v6gVwXit3eSoIbnVsbCw4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIbnVsbCw4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIbnVsbCw4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIbnVsbCw4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonNlYiN3cgM4LCJhbG3hcyoIonR4XiZvcplzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3NlYiN3cgN3ZCBObgR3o4w4Zp9ybV9ncp9lcCoIojE4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4olo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZpF1bGVko4w4YWx1YXM4O4J0Y39pbgJtcyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JGYW3sZWQ5Tp90ZSosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24N4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJ3ZG3yZWN0o4w4YWx1YXM4O4J0Y39pbgJtcyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JSZWR1cpVjdCosopZvcplfZgJvdXA4O4oxo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojc4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XX0=', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(53, 'rac', 'RestAPI Client', 'Data', NULL, '2016-11-24 00:57:36', NULL, 'tb_restapi', 'id', 'core', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39yZXN0YXB1L425R3JPTSB0Y39yZXN0YXB1oCosonNxbF9g6GVyZSoIo4BXSEVSRSB0Y39yZXN0YXB1Lp3koE3ToEmPVCBOVUxMo4w4cgFsXidybgVwoj24o4w4dGF4bGVfZGo4O4J0Y39yZXN0YXB1o4w4cHJ1bWFyeV9rZXk4O4J1ZCosopdy6WQ4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonR4XgJ3cgRhcGk4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24SWQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JhcG3lciVyo4w4YWx1YXM4O4J0Y39yZXN0YXB1o4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIok3Eo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24MSosopR4oj24dGJfdXN3cnM4LCJrZXk4O4J1ZCosopR1cgBsYXk4O4J3bWF1bCJ9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YXB16iVmo4w4YWx1YXM4O4J0Y39yZXN0YXB1o4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokt3eSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNyZWF0ZWQ4LCJhbG3hcyoIonR4XgJ3cgRhcGk4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QgJ3YXR3ZCosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIoplvZHVsZXM4LCJhbG3hcyoIonR4XgJ3cgRhcGk4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QWNjZXNzoFRvoD24LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9XSw4Zp9ybXM4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonR4XgJ3cgRhcGk4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J26WRkZWa4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojA4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24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dGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIoplvZHVsZXM4LCJhbG3hcyoIonR4XgJ3cgRhcGk4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIoklvZHVsZXM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonN3bGVjdCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24NCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4J3eHR3cpmhbCosopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIonR4XilvZHVsZSosopxvbitlcF9rZXk4O4JtbiRlbGVfbpFtZSosopxvbitlcF9iYWxlZSoIoplvZHVsZV906XRsZSosop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4oxo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XX0=', NULL),
(55, 'hotelamenities', 'Hotel Amenities', 'hotel_amenities', NULL, '2018-12-22 07:53:46', NULL, 'hotel_amenities', 'id', 'native', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB2bgR3bF9hbWVu6XR1ZXMuK4BGUk9NoGhvdGVsXiFtZWm1dG33cyA4LCJzcWxfdih3cpU4O4o5V0hFUkU56G90ZWxfYWl3bp306WVzLp3koE3ToEmPVCBOVUxMo4w4cgFsXidybgVwoj24o4w4dGF4bGVfZGo4O4J2bgR3bF9hbWVu6XR1ZXM4LCJwcp3tYXJmXit3eSoIop3ko4w4Zp9ybXM4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIophvdGVsXiFtZWm1dG33cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24SWQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4owo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIophvdGVsXiFtZWm1dG33cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VG30bGU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4oxo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cixlZyosopFs6WFzoj246G90ZWxfYWl3bp306WVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JTbHVno4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopR1ciF4bGVko4w4YWx1YXM4O4J2bgR3bF9hbWVu6XR1ZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokR1ciF4bGVko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMSw4dH3wZSoIopN2ZWNrYp9ao4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojM4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XSw4ciV0dG3uZyoIeyJncp3kdH3wZSoIo4osop9yZGVyYnk4O4J1ZCosop9yZGVydH3wZSoIopFzYyosonB3cnBhZiU4O4oxMCosopZybg13b4oIopZhbHN3o4w4Zp9ybSltZXR2biQ4O4JtbiRhbCosonZ1ZXctbWV06G9koj24bW9kYWw4LCJ1bpx1bpU4O4JpYWxzZSJ9LCJncp3koj1beyJp6WVsZCoIop3ko4w4YWx1YXM4O4J2bgR3bF9hbWVu6XR1ZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIophvdGVsXiFtZWm1dG33cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VG30bGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JzbHVno4w4YWx1YXM4O4J2bgR3bF9hbWVu6XR1ZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3NsdWc4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24M4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jk6XNhYpx3ZCosopFs6WFzoj246G90ZWxfYWl3bp306WVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JE6XNhYpx3ZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldLCJzdWJncp3koj1beyJ06XRsZSoIokhvdGVsQWl3bp306WVzo4w4bWFzdGVyoj246G90ZWxhbWVu6XR1ZXM4LCJtYXN0ZXJf6iVmoj246WQ4LCJtbiRlbGU4O4J2bgR3bGFtZWm1dG33cyosonRhYpx3oj246G90ZWxfYWl3bp306WVzo4w46iVmoj246WQ4fVl9', NULL),
(57, 'usertrips', 'Book a hotel now!', 'Booking Hotels  for Sports Team  Made Easy', NULL, '2018-12-22 08:22:46', NULL, 'user_trips', 'id', 'native', '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XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG9fYWRkcpVzcl8xo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JBZGRyZXNzoDE4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4ogo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG9fYi30eSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qi30eSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIoj54LCJs6Wl1dGVkoj24o4w4bgB0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cGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jj6GVj6l9vdXQ4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokN2ZWNroE9ldCosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24MTo4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J4dWRnZXRfZnJvbSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QnVkZiV0oEZybi04LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojEzo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YnVkZiV0XgRvo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JCdWRnZXQ5VG84LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE0o4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZG9lYpx3XgFlZWVuXgF0eSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RG9lYpx3oFFlZWVuoFJvbilzo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24cpVxdW3yZWQ4LCJi6WVgoj2xLCJ0eXB3oj24ciVsZWN0o4w4YWRkoj2xLCJz6X13oj24MCosopVk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ZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhZGR3ZCosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWRkZWQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojEmo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cgRhdHVzo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JTdGF0dXM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojowo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fV0sopdy6WQ4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZWm0cn3fYnk4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokVudHJmoEJmo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4JkYXRhYpFzZSosopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J0cp3wXimhbWU4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3Ry6XA5TpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopZybilfYWRkcpVzcl8xo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JGcp9toEFkZHJ3cgM5MSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4o0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopZybilfYi30eSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RnJvbSBD6XRmo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojU4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZnJvbV9zdGF0ZV91ZCosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RnJvbSBTdGF0ZSBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopZybilfep3wo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JGcp9toF11cCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ogo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonRvXiFkZHJ3cgNfMSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VG85QWRkcpVzcyAxo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIoj54LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dG9fYi30eSosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VG85Qi30eSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4omo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonRvXgN0YXR3Xi3ko4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JUbyBTdGF0ZSBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J0bl9I6XA4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3RvoF11cCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jj6GVj6l91b4osopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qih3Yis5SWa4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24Yih3YitfbgV0o4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JD6GVj6yBPdXQ4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTM4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YnVkZiV0XiZybi04LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokJlZGd3dCBGcp9to4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopJlZGd3dF90byosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QnVkZiV0oFRvo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojElo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopRvdWJsZV9xdWV3b39xdHk4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokRvdWJsZSBRdWV3b4BRdHk4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZG9lYpx3Xit1bpdfcXRmo4w4YWx1YXM4O4JlciVyXgRy6XBzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JEbgV4bGU5Si3uZyBRdHk4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTc4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWl3bp30eV91ZHM4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFtZWm1dHk5SWRzo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEao4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNvbWl3bnQ4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokNvbWl3bnQ4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTk4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWRkZWQ4LCJhbG3hcyoIonVzZXJfdHJ1cHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFkZGVko4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojowo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonN0YXRlcyosopFs6WFzoj24dXN3c390cp3wcyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UgRhdHVzo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojoxo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldLCJzZXR06Wmnoj17opdy6WR0eXB3oj24o4w4bgJkZXJ4eSoIop3ko4w4bgJkZXJ0eXB3oj24YXNjo4w4cGVycGFnZSoIojowo4w4ZnJvepVuoj24ZpFsciU4LCJpbgJtLWl3dGhvZCoIopmhdG3iZSosonZ1ZXctbWV06G9koj24bpF06XZ3o4w46Wms6Wm3oj24ZpFsciU4fX0=', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(58, 'invoices', 'Invoices', 'invoices', NULL, '2019-01-19 11:48:01', NULL, 'invoices', 'id', 'native', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB1bnZv6WN3cyaqoEZST0056Wmibi3jZXM5o4w4cgFsXgd2ZXJ3oj24oFdoRVJFoG3udp91YiVzLp3koE3ToEmPVCBOVUxMo4w4cgFsXidybgVwoj24o4w4dGF4bGVfZGo4O4J1bnZv6WN3cyosonBy6Wlhcn3f6iVmoj246WQ4LCJpbgJtcyoIWgs4Zp33bGQ4O4J1ZCosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMSw4dH3wZSoIoph1ZGR3b4osopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24MCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonRy6XBfcgRhdHVzo4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VHJ1cCBTdGF0dXM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24ciVsZWN0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIopRhdGFs6XN0o4w4bG9v6gVwXgFlZXJmoj24MT1Dbimp6XJtZWR8Mj1DbilwbGV0ZWR8Mz1DYWmjZWxsZWQ4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopN2ZWNrXi3uo4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qih3Yis5SWa4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadF9kYXR3o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oyo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24Yih3YitfbgV0o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qih3Yis5TgV0o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMSw4dH3wZSoIonR3eHRfZGF0ZSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cpZwXi3ko4w4YWx1YXM4O4J1bnZv6WN3cyosopxhYpVsoj24VHJ1cCBSZXFlZXN0oCM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj24ciVsZWN0o4w4YWRkoj2xLCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci3IZSoIo4osonNvcnRs6XN0oj24NCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4J3eHR3cpmhbCosopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIonJpcHM4LCJsbi9rdXBf6iVmoj246WQ4LCJsbi9rdXBfdpFsdWU4O4J1ZCosop3zXiR3cGVuZGVuYgk4OpmlbGwsonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1udWxsLCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4osonByZWZ1eCoIo4osonNlZp3aoj24onl9LHs4Zp33bGQ4O4J2bgR3bF9uYWl3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24SG90ZWw5TpFtZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojU4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J2bgR3bF9hZGQ4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JobgR3bCBBZGQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4oio4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj246G90ZWxfbWFuYWd3c4osopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokhvdGVsoElhbpFnZXo4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24Nyosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopVtYW3so4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RWlh6Ww4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24OCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonB2bim3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGhvbpU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24OSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonRvdGFsXgJvbi04LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JUbgRhbCBSbi9to4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEwo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cp9vbV9yYXR3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Up9vbSBSYXR3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojExo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWN0dWFs6X13ZF9ybi9tXiNvdWm0o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWN0dWFs6X13ZCBSbi9toENvdWm0o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEyo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24Yi9tbW3zci91b39yYXR3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qi9tbW3zci91b4BSYXR3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEzo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cGFmbWVudF9zdGF0dXM4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JQYX3tZWm0oFN0YXRlcyosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE0o4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZHV3XiRhdGU4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JEdWU5RGF0ZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxNSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4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ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JwYX3tZWm0XgJ3Z39udW04LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JQYX3tZWm0oFJ3Z4BOdW04LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4oxOSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopmvdGVzo4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Tp90ZXM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadGFyZWE4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojowo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWRkZWQ4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JBZGR3ZCosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjAsonRmcGU4O4J0ZXh0XiRhdGV06Wl3o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oyMSosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonVwZGF0ZWQ4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JVcGRhdGVko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMCw4dH3wZSoIonR3eHRfZGF0ZXR1bWU4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojoyo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fV0sopdy6WQ4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4owo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonRy6XBfcgRhdHVzo4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VHJ1cCBTdGF0dXM4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIonJhZG3vo4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopN2ZWNrXi3uo4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qih3Yis5SWa4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24M4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIopRhdGU4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24Yih3YitfbgV0o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qih3Yis5TgV0o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojM4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4JkYXR3o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonJpcF91ZCosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3Ry6XA5UpVxdWVzdCAjo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24MSosopR4oj24cpZwcyosopt3eSoIop3ko4w4ZG3zcGxheSoIop3kon0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J2bgR3bF9uYWl3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWRkcpVzcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4olo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIophvdGVsXiFkZCosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokhvdGVsoEFkZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIophvdGVsXilhbpFnZXo4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JobgR3bCBNYWmhZiVyo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZWlh6Ww4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JFbWF1bCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oao4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonB2bim3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGhvbpU4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24OSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J0bgRhbF9ybi9to4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VG90YWw5Up9vbSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jybi9tXgJhdGU4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JSbi9toFJhdGU4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWN0dWFs6X13ZF9ybi9tXiNvdWm0o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWN0dWFs6X13ZCBSbi9toENvdWm0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNvbWl1cgNv6WmfcpF0ZSosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokNvbWl1cgNv6Wa5UpF0ZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JwYX3tZWm0XgN0YXRlcyosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3BheWl3bnQ5UgRhdHVzo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopRlZV9kYXR3o4w4YWx1YXM4O4J1bnZv6WN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RHV3oERhdGU4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTU4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZXN0XiFtdF9kdWU4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JFcgQ5QWl0oERlZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxN4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JhbXRfcGF1ZCosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFtdCBQYW3ko4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEgo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonBheWl3bnRfbW9kZSosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3BheWl3bnQ5TW9kZSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxOCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JwYX3tZWm0XgJ3Z39udW04LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JQYX3tZWm0oFJ3Z4BOdW04LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTk4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bp90ZXM4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JObgR3cyosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oyMCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JhZGR3ZCosopFs6WFzoj246Wmibi3jZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFkZGVko4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojoxo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonVwZGF0ZWQ4LCJhbG3hcyoIop3udp91YiVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JVcGRhdGVko4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojoyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldfQ==', NULL),
(62, 'tripstatussettings', 'Trip Status Settings', 'Trip Status Settings', NULL, '2019-01-26 18:35:48', NULL, 'trip_statuses', 'id', 'native', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB0cp3wXgN0YXRlciVzL425R3JPTSB0cp3wXgN0YXRlciVzoCosonNxbF9g6GVyZSoIo4BXSEVSRSB0cp3wXgN0YXRlciVzLp3koE3ToEmPVCBOVUxMo4w4cgFsXidybgVwoj24o4w4dGF4bGVfZGo4O4J0cp3wXgN0YXRlciVzo4w4cHJ1bWFyeV9rZXk4O4J1ZCosopdy6WQ4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3R1dGx3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24cgR3cCosopFs6WFzoj24dHJ1cF9zdGF0dXN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UgR3cCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNvbG9yo4w4YWx1YXM4O4J0cp3wXgN0YXRlciVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JDbixvc4osonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopR3ciNy6XB06W9uo4w4YWx1YXM4O4J0cp3wXgN0YXRlciVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JEZXNjcp3wdG3vb4osonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4o0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIoplh6Ww4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIoklh6Ww4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JtYW3sXgNlYp13YgQ4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIoklh6Ww5UgV46pVjdCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopdybgVwXix3dpVso4w4YWx1YXM4O4J0cp3wXgN0YXRlciVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JHcp9lcCBMZXZ3bCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ogo4w4Yi9ub4oIeyJiYWx1ZCoIojE4LCJkY4oIonR4XidybgVwcyosopt3eSoIopdybgVwXi3ko4w4ZG3zcGxheSoIopmhbWU4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldLCJpbgJtcyoIWgs4Zp33bGQ4O4J1ZCosopFs6WFzoj24dHJ1cF9zdGF0dXN3cyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24SWQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3R1dGx3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24o4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24NCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonN0ZXA4LCJhbG3hcyoIonRy6XBfcgRhdHVzZXM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3N0ZXA4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi6WVgoj2wLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopNvbG9yo4w4YWx1YXM4O4J0cp3wXgN0YXRlciVzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JDbixvc4osopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIo4osonZ1ZXc4OjEsonRmcGU4O4Jjbixvc4osopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4ozo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3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', NULL),
(63, 'tripstatuslogs', 'Trip Status Logs', 'Trip Status Logs', NULL, '2019-01-26 13:30:18', NULL, 'trip_status_logs', '', 'report', 'eyJzcWxfciVsZWN0oj24oFNFTEVDVCB0cp3wXgN0YXRlcl9sbidzL425R3JPTSB0cp3wXgN0YXRlcl9sbidzoCosonNxbF9g6GVyZSoIo4osonNxbF9ncp9lcCoIo4osonRhYpx3XiR4oj24dHJ1cF9zdGF0dXNfbG9ncyosonBy6Wlhcn3f6iVmoj24o4w4Zp9ybXM4O3t7opZ1ZWxkoj24dHJ1cF91ZCosopFs6WFzoj24dHJ1cF9zdGF0dXNfbG9ncyosopxhYpVsoj24VHJ1cCBJZCosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4o4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMCw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JlciVyXi3ko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGF4ZWw4O4JVciVyoE3ko4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIo4osonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2xLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJpcF91ZCosopFs6WFzoj24dHJ1cF9zdGF0dXNfbG9ncyosopxhYpVsoj24UpZwoE3ko4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIo4osonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2yLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonRy6XBfcgRhdHVzXi3ko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGF4ZWw4O4JUcp3woFN0YXRlcyBJZCosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4o4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMyw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JnZWm3cpF0ZWRfdG30bGU4LCJhbG3hcyoIonRy6XBfcgRhdHVzXixvZgM4LCJsYWJ3bCoIokd3bpVyYXR3ZCBU6XRsZSosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4o4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINCw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JnZWm3cpF0ZWRfZGVzYgJ1cHR1bia4LCJhbG3hcyoIonRy6XBfcgRhdHVzXixvZgM4LCJsYWJ3bCoIokd3bpVyYXR3ZCBEZXNjcp3wdG3vb4osopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4o4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JnZWm3cpF0ZWRfbWF1bCosopFs6WFzoj24dHJ1cF9zdGF0dXNfbG9ncyosopxhYpVsoj24RiVuZXJhdGVkoElh6Ww4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24o4w4dp33dyoIojE4LCJ0eXB3oj24dGVadGFyZWE4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2iLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopFkZGVko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGF4ZWw4O4JBZGR3ZCosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4o4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0XiRhdGV06Wl3o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINyw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XSw4ZgJ1ZCoIWgs4Zp33bGQ4O4J0cp3wXi3ko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JUcp3woE3ko4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojA4LCJjbimuoj17onZhbG3koj24MSosopR4oj24dXN3c390cp3wcyosopt3eSoIop3ko4w4ZG3zcGxheSoIonRy6XBfbpFtZSJ9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24dXN3c391ZCosopFs6WFzoj24dHJ1cF9zdGF0dXNfbG9ncyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VXN3c4BJZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxo4w4Yi9ub4oIeyJiYWx1ZCoIojE4LCJkY4oIonR4XgVzZXJzo4w46iVmoj246WQ4LCJk6XNwbGFmoj24Zp3ycgRfbpFtZXxsYXN0XimhbWU4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonJpcF91ZCosopFs6WFzoj24dHJ1cF9zdGF0dXNfbG9ncyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UpZwoE3ko4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MSosopR4oj24cpZwcyosopt3eSoIop3ko4w4ZG3zcGxheSoIophvdGVsXi3uZp9ybWF06W9ufG9pZpVyXgJhdGU4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonRy6XBfcgRhdHVzXi3ko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JUcp3woFN0YXRlcyBJZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojE4LCJkY4oIonRy6XBfcgRhdHVzZXM4LCJrZXk4O4J1ZCosopR1cgBsYXk4O4J06XRsZXxkZXNjcp3wdG3vb4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24ZiVuZXJhdGVkXgR1dGx3o4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JHZWm3cpF0ZWQ5VG30bGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JnZWm3cpF0ZWRfZGVzYgJ1cHR1bia4LCJhbG3hcyoIonRy6XBfcgRhdHVzXixvZgM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokd3bpVyYXR3ZCBEZXNjcp3wdG3vb4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4olo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopd3bpVyYXR3ZF9tYW3so4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JHZWm3cpF0ZWQ5TWF1bCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopFkZGVko4w4YWx1YXM4O4J0cp3wXgN0YXRlcl9sbidzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JBZGR3ZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ogo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldfQ==', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(64, 'corporate_user', 'Corporate User', 'Corporate User', NULL, '2019-01-29 11:48:01', NULL, 'Corporate_User', 'id', 'native', 'eyJ0YWJsZV9kY4oIonR4XgVzZXJzo4w4cHJ1bWFyeV9rZXk4O4JlciVyXi3ko4w4Zp9ybV9jbixlbWa4OjosopZvcplfbGFmbgV0oj17opNvbHVtb4oIM4w4dG30bGU4O4JVciVycyxEYXRho4w4Zp9ybWF0oj24ZgJ1ZCosopR1cgBsYXk4O4J2bgJ1ep9udGFson0sonNxbF9zZWx3YgQ4O4JTRUxFQlQ5oHR4XgVzZXJzL42soCB0Y39ncp9lcHMubpFtZSBcbkZST005dGJfdXN3cnM5TEVGVCBKT03OoHR4XidybgVwcyBPT4B0Y39ncp9lcHMuZgJvdXBf6WQ5PSB0Y39lciVycymncp9lcF91ZCosonNxbF9g6GVyZSoIo4A5oFdoRVJFoHR4XgVzZXJzLp3koCE9Jyc5oCosonNxbF9ncp9lcCoIo4A5oCA4LCJpbgJtcyoIWgs4Zp33bGQ4O4J1ZCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIok3ko4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4owo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopdybgVwXi3ko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RgJvdXA5XC85TGViZWw4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24cpVxdW3yZWQ4LCJi6WVgoj2xLCJ0eXB3oj24ciVsZWN0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24ZXh0ZXJuYWw4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4J0Y39ncp9lcHM4LCJsbi9rdXBf6iVmoj24ZgJvdXBf6WQ4LCJsbi9rdXBfdpFsdWU4O4JuYWl3o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JlciVybpFtZSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3VzZXJuYWl3o4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jp6XJzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Rp3ycgQ5TpFtZSosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojM4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGFzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TGFzdCBOYWl3o4w4Zp9ybV9ncp9lcCoIojA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4o0o4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopVtYW3so4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RWlh6Ww4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24ZWlh6Ww4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4olo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24o4w46WlhZiVfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonBhcgNgbgJko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UGFzcgdvcpQ4LCJpbgJtXidybgVwoj24MCosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oio4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jsbid1b39hdHR3bXB0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TG9n6Wa5QXR0ZWlwdCosopZvcplfZgJvdXA4O4owo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojc4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4o4LCJ1bWFnZV9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bGFzdF9sbid1b4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5TG9n6Wa4LCJpbgJtXidybgVwoj24MSosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oao4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIo4osop3tYWd3XillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhdpF0YXo4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JBdpF0YXo4LCJpbgJtXidybgVwoj24MSosonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4omo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24XC9lcGxvYWRzXC9lciVyclwvo4w4cpVz6X13Xgd1ZHR2oj24o4w4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epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojEzo4w4bG3t6XR3ZCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWN06XZhdG3vb4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFjdG3iYXR1bia4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4O4oxNCosopx1bW30ZWQ4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJ3bWVtYpVyXgRv6iVu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bHV3oj24on0seyJp6WVsZCoIopFiYXRhc4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFiYXRhc4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MzA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIop3tYWd3o4w4Zp9ybWF0XgZhbHV3oj24XC9lcGxvYWRzXC9lciVyclwvon0seyJp6WVsZCoIopdybgVwXi3ko4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24RgJvdXA4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MyosopNvbpa4Ons4dpFs6WQ4O4oxo4w4ZGo4O4J0Y39ncp9lcHM4LCJrZXk4O4Jncp9lcF91ZCosopR1cgBsYXk4O4JuYWl3on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JuYWl3o4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokdybgVwo4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JlciVybpFtZSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3VzZXJuYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojU4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jp6XJzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Rp3ycgQ5TpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9uYWl3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TGFzdCBOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4J3bWF1bCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokVtYW3so4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIoj54LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JwYXNzdi9yZCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIo3BhcgNgbgJko4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojk4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4Jsbid1b39hdHR3bXB0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24TG9n6Wa5QXR0ZWlwdCosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMCosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIopNyZWF0ZWRfYXQ4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGFuZgVhZiU4Ons46WQ4O4o4fSw4bGF4ZWw4O4JDcpVhdGVkoEF0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojExo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9sbid1b4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5TG9n6Wa4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTo4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopZvcplhdF9hcyoIo4osopZvcplhdF9iYWxlZSoIo4J9LHs4Zp33bGQ4O4JlcGRhdGVkXiF0o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24VXBkYXR3ZCBBdCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4bG3t6XR3ZCoIo4osond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMyosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24on0seyJp6WVsZCoIonJ3bW3uZGVyo4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UpVt6WmkZXo4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTM4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWN06XZhdG3vb4osopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokFjdG3iYXR1bia4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTQ4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24YWN06XZ3o4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24QWN06XZ3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE0o4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4JpdWmjdG3vb4osopZvcplhdF9iYWxlZSoIo3N1dGVoZWxwZXJzfHVzZXJTdGF0dXN8YWN06XZ3on0seyJp6WVsZCoIonJ3bWVtYpVyXgRv6iVuo4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24UpVtZWl4ZXo5VG9rZWa4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTU4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24bGFzdF9hYgR1dp30eSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWmndWFnZSoIeyJ1ZCoIo4J9LCJsYWJ3bCoIokxhcgQ5QWN06XZ1dHk4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsopx1bW30ZWQ4O4o4LCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTY4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJpbgJtYXRfYXM4O4o4LCJpbgJtYXRfdpFsdWU4O4o4fSx7opZ1ZWxkoj24Yi9uZp3no4w4YWx1YXM4O4J0Y39lciVycyosopxhbpdlYWd3oj17op3koj24on0sopxhYpVsoj24Qi9uZp3no4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJs6Wl1dGVkoj24o4w4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEgo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4Zp9ybWF0XiFzoj24o4w4Zp9ybWF0XgZhbHV3oj24onldfQ==', '{\"title\":{\"id\":\"\"},\"note\":{\"id\":\"\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `icon` char(20) DEFAULT NULL,
  `is_read` enum('0','1') DEFAULT '0',
  `postedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notification`
--

INSERT INTO `tb_notification` (`id`, `userid`, `url`, `title`, `note`, `created`, `icon`, `is_read`, `postedBy`) VALUES
(1, 1, '#', 'tester', NULL, '2017-11-28 14:14:03', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pages`
--

CREATE TABLE `tb_pages` (
  `pageID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `sinopsis` varchar(250) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `status` enum('enable','disable') DEFAULT 'enable',
  `access` text,
  `allow_guest` enum('0','1') DEFAULT '0',
  `template` enum('frontend','backend') DEFAULT 'frontend',
  `metakey` varchar(255) DEFAULT NULL,
  `metadesc` text,
  `default` enum('0','1') DEFAULT '0',
  `pagetype` enum('page','post') DEFAULT NULL,
  `labels` text,
  `views` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pages`
--

INSERT INTO `tb_pages` (`pageID`, `title`, `alias`, `sinopsis`, `note`, `created`, `updated`, `filename`, `status`, `access`, `allow_guest`, `template`, `metakey`, `metadesc`, `default`, `pagetype`, `labels`, `views`, `userid`, `image`) VALUES
(1, 'Homepage', 'home', '', '[sc:Sximo fnc=showForm|id=usertrips] [/sc]', '1970-01-01 00:00:00', '2017-10-10 03:29:00', 'homepage', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\"}', '1', 'frontend', 'tet', 'tetet', '1', 'page', '', 0, 0, ''),
(29, 'How it Works', 'how-it-works', '', '<section class=\"section\">\r\n	<div class=\"container clearfix\">\r\n		<div class=\"col-md-4 \">\r\n			<div class=\"feature-box media-box\">\r\n				<div class=\"fbox-media\">\r\n					<img src=\"./uploads/images/services/1.jpg\" alt=\"Why choose Us?\">\r\n				</div>\r\n				<div class=\"fbox-desc\">\r\n					<h3>Why choose Us.<span class=\"subtitle\">Because we are Reliable.</span></h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n		<div class=\"col-md-4 \">\r\n			<div class=\"feature-box media-box\">\r\n				<div class=\"fbox-media\">\r\n					<img src=\"./uploads/images/services/2.jpg\" alt=\"Why choose Us?\">\r\n				</div>\r\n				<div class=\"fbox-desc\">\r\n					<h3>Our Mission.<span class=\"subtitle\">To Redefine your Brand.</span></h3>\r\n					<p>Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque tempora ullam. Vitae delectus quia, consequuntur rerum molestias quo.</p>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n		<div class=\"col-md-4  col_last\">\r\n			<div class=\"feature-box media-box\">\r\n				<div class=\"fbox-media\">\r\n					<img src=\"./uploads/images/services/3.jpg\" alt=\"Why choose Us?\">\r\n				</div>\r\n				<div class=\"fbox-desc\">\r\n					<h3>What we Do.<span class=\"subtitle\">Make our Customers Happy.</span></h3>\r\n					<p>Porro repellat vero sapiente amet vitae quibusdam necessitatibus consectetur, labore totam. Accusamus perspiciatis asperiores labore esse ab accusantium ea modi ut.</p>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n	</div>\r\n</section>	\r\n<section class=\"section bg-gray\">\r\n\r\n	<div class=\"container clearfix\">\r\n\r\n		<div class=\"section-title\">\r\n			Easy Configurable Options			\r\n		</div>\r\n\r\n		<div class=\"section-subcontent text-center\">\r\n                      Choose from a wide array of Options for your best matched Customizations\r\n\r\n		</div>\r\n<div class=\"text-center\">\r\n			<img data-animate=\"fadeIn\" class=\"aligncenter fadeIn animated\" src=\"./uploads/images/services/macbook.png\" alt=\"Macbook\">\r\n</div>\r\n\r\n\r\n		<div class=\"col-md-4\">\r\n\r\n			<div class=\"feature-box fbox-plain\">\r\n				<div class=\"fbox-icon\">\r\n					<a href=\"#\"><i class=\"i-alt\">1.</i></a>\r\n				</div>\r\n				<h3>Choose a Product.</h3>\r\n				<p>Perferendis, nam. Eum aperiam vel animi beatae corporis dignissimos, molestias, placeat, maxime optio ipsam nostrum atque quidem.</p>\r\n			</div>\r\n\r\n		</div>\r\n\r\n		<div class=\"col-md-4\">\r\n\r\n			<div class=\"feature-box fbox-plain\">\r\n				<div class=\"fbox-icon\">\r\n					<a href=\"#\"><i class=\"i-alt\">2.</i></a>\r\n				</div>\r\n				<h3>Enter Shipping Info.</h3>\r\n				<p>Saepe qui enim at animi. Repellendus, blanditiis doloremque asperiores reprehenderit deleniti. Ipsam nam accusantium ex!</p>\r\n			</div>\r\n\r\n		</div>\r\n\r\n		<div class=\"col-md-4 col_last\">\r\n\r\n			<div class=\"feature-box fbox-plain\">\r\n				<div class=\"fbox-icon\">\r\n					<a href=\"#\"><i class=\"i-alt\">3.</i></a>\r\n				</div>\r\n				<h3>Complete your Payment.</h3>\r\n				<p>Necessitatibus accusamus, inventore atque commodi, animi architecto ea sed, suscipit tempora ex deleniti quae. Consectetur, sint velit.</p>\r\n			</div>\r\n\r\n		</div>\r\n\r\n	</div>\r\n\r\n</section>', '1970-01-01 00:00:00', '2017-11-03 10:16:43', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 42, 0, ''),
(27, 'Why Choose Us ?', 'why-choose-us', '', '	<div class=\"row\">\r\n		<div class=\"col-sm-6 col-md-6\">\r\n			<div>\r\n				<h4>Valuable counselling requires insight.</h4>\r\n				<p>We take the time to understand our clients businesses.</p>\r\n				<p>Brandt & Lauritzen is a specialised Danish law firm with business-minded attorneys.</p>\r\n				<p>We ensure value-creating counselling by combining our in-depth knowledge of the legal framework in Denmark and our understanding of the business side of the matters. We believe valuable counselling requires more than simply an understanding of the legal issues at hand,\r\n				it also requires insight into our clients industries in a commercial context.</p>\r\n			</div>\r\n		</div>\r\n		<div class=\"col-sm-6 col-md-6\">\r\n			<div class=\"ab1-img\">\r\n				<img src=\"http://release.sximo5.net/uploads/images/services/img1.jpg\" alt=\"Image\">\r\n			</div>\r\n		</div>\r\n	</div>\r\n', '1970-01-01 00:00:00', '2017-11-04 00:27:32', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 60, 0, ''),
(26, 'Contact Us', 'contact-us', '', '<section class=\" section bg-gray text-center\" id=\"contact\">\r\n	<div class=\"container\">\r\n		<h1 class=\"\"> Contact Us </h1>	\r\n		<p class=\"lead\"> Write desctiption here ... </p>\r\n			<div style=\"text-align:left\">\r\n				[sc:Form fnc=render|id=2] [/sc] \r\n			</div><br>\r\n		<p><strong>© 2015 Company Name</strong><br> consectetur adipisicing elit. Aut eaque, laboriosam veritatis,</p><p> quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>            \r\n	</div>\r\n</section>', '1970-01-01 00:00:00', '2017-11-03 07:41:11', 'fullpage', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 46, 0, ''),
(46, 'Privacy Policy', 'privacy', '', '[sc:Sximo fnc=render|id=comment] [/sc]<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id mauris vulputate, luctus erat et, porttitor mauris. Cras ultricies tortor tempus orci aliquam, congue congue urna molestie. Integer tristique ac sem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. <br>oncus molestie. Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. <br></p><br>Morbi rutrum ante hendrerit, vehicula dolor at, suscipit elit. Vestibulum a mauris tristique, fermentum est nec, rutrum nibh. Duis in semper metus. Nunc maximus, ex id fringilla sagittis, nisl metus bibendum lacus, quis placerat diam quam sed justo. Nullam varius dapibus purus, et malesuada ipsum pulvinar posuere. Fusce sit amet sem tincidunt, suscipit dolor at, bibendum est. Vivamus porta in lectus sed ultrices. Nam viverra mauris a hendrerit posuere. <br><br>Donec elementum velit nisi, a eleifend augue blandit hendrerit. Donec id pulvinar est.Integer vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, pretium mauris eu, pretium eros. Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. <br><br>Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. Aliquam blandit libero nunc, nec rutrum mi lacinia eget. <p></p><br><p></p>', '1970-01-01 00:00:00', '2017-11-03 13:18:42', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 58, 0, ''),
(70, 'New Ultimate Blog ( Powefull CMS )', 'new-ultimate-blog-powefull-cms', '', '<p><img style=\"width: 443.656px; height: 332.733px; float: left; margin:0 15px 0 0;\" src=\"http://localhost/bitbucket/ultimate/public//uploads\\dropzone\\image10.jpg\" class=\"note-float-left\"></p><h3>Introducing Me<br></h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id mauris \r\nvulputate, luctus erat et, porttitor mauris. Cras ultricies tortor \r\ntempus orci aliquam, congue congue urna molestie. Integer tristique ac \r\nsem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, \r\ntortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam \r\nelementum quam et condimentum tempor. Quisque dignissim leo imperdiet \r\nsollicitudin sollicitudin. <br>oncus molestie. Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. <br></p>', '2017-11-02 09:30:39', '2018-12-17 13:27:32', '', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', '', '', '', '0', 'post', 'ultimate , crud , admin', 5, 0, '4.jpg'),
(45, 'Term Of Condition', 'toc', '', '<div class=\"section-title\">Term Of Condition</div><p>Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris</p><blockquote><p>consectetur adipiscing elit. Ut id mauris vulputate, luctus erat et, porttitor mauris. </p></blockquote><p>Cras ultricies tortor tempus orci aliquam, congue congue urna molestie. Integer tristique ac sem sed tincidunt. Suspendisse mattis, tortor a elementum ullamcorper, tortor elit vestibulum mauris, quis mattis leo lorem vel quam. Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. Praesent laoreet nisl at dolor pharetra consequat. Morbi condimentum egestas nisi, efficitur placerat augue posuere id. Vivamus mattis dolor a urna elementum fermentum. Etiam auctor elementum consectetur.In id neque vel tellus rhoncus molestie. </p><blockquote><p>Nulla interdum semper magna, eu gravida lorem mollis eget. In sed viverra velit. Morbi rutrum ante hendrerit, vehicula dolor at, suscipit elit. Vestibulum a mauris tristique, fermentum est nec, rutrum nibh. Duis in semper metus. Nunc maximus, ex id fringilla sagittis, nisl metus bibendum lacus, quis placerat diam quam sed justo. Nullam varius dapibus purus, et malesuada ipsum pulvinar posuere. Fusce sit amet sem tincidunt, suscipit dolor at, bibendum est. Vivamus porta in lectus sed ultrices. Nam viverra mauris a hendrerit posuere. Donec elementum velit nisi, a eleifend augue blandit hendrerit. Donec id pulvinar est.Integer vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, pretium mauris eu, pretium eros. </p></blockquote><p><br></p><p>Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. Aliquam blandit libero nunc, nec rutrum mi lacinia eget. Aenean ultricies, quam ut ultricies ullamcorper, nibh dolor viverra ipsum, ac vestibulum purus ante a massa.Nulla bibendum, lectus eget lobortis vehicula, lectus ante congue augue, in tempus tellus tortor et diam. Phasellus lorem dolor, rutrum sit amet dapibus et, malesuada venenatis enim. Donec tincidunt turpis quam, a convallis eros scelerisque a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus eget mi ipsum. Donec non lorem sem. Phasellus sed tortor non ligula congue faucibus vitae imperdiet nisl. </p><p><br></p><p>Cras dolor ante, condimentum at elementum mollis, hendrerit in lorem. Phasellus eu enim ante. Cras erat dui, cursus suscipit sem sit amet, congue varius enim. Nam purus sem, gravida non lacus eget, porta fringilla nibh. Praesent egestas felis at risus ullamcorper, at condimentum mauris scelerisque. Etiam eget eros laoreet, vestibulum dui eu, vehicula leo. Nulla sagittis nibh nibh, sit amet interdum ligula feugiat eget. Aliquam vitae ex tincidunt, facilisis massa ut, viverra sem.Praesent diam justo, fermentum in maximus vitae, tristique vel orci. Integer a facilisis neque. Nunc eu justo urna. Praesent commodo eget diam a commodo. Nulla viverra pulvinar justo sed auctor. Maecenas rutrum tincidunt hendrerit. Nunc fringilla sem id sem suscipit tincidunt. Donec condimentum lobortis sem eget blandit.</p>', '1970-01-01 00:00:00', '2017-11-03 13:20:26', '', 'enable', '', '1', 'frontend', '', '', '0', 'page', '', 2, 0, ''),
(47, 'Printing And Typesetting Industries', 'printing-and-typesetting-industry', '', 'printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br>printing and typesetting industry Lorem Ipsum has been the industry\'s \r\nstandard dummy text ever since the 1500s, when an unknown printer took a\r\n galley of type and scrambled it to make a type specimen book.<br><hr>\r\n\r\n<div class=\"someclass\" id=\"someid\" markdown=\"1\">\r\n    Insert markdown here greate !<br></div>\r\n\r\nclass PostsController extends Controller<br><br>printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br><pre>class PostsController extends Controller {\r\n\r\n	protected $layout = \"layouts.main\";\r\n	protected $data = array();	\r\n	public $module = \'posts\';\r\n	static $per_page	= \'10\';\r\n	public function __construct()\r\n	{\r\n        }\r\n}\r\n\r\n</pre>\r\n\r\n\r\n <br><br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nis simply dummy text of the <br><span style=\"font-weight: bold;\"><br>printing and typesetting industry</span><br><br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\n It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-04-22 00:00:00', '2017-11-04 00:31:28', '', 'enable', '', '1', '', 'printing and typesetting industry Lorem', 'printing ,and typesetting, industry, Lorem,', '0', 'post', 'Finance , Accounting', 12, 0, '1.jpg'),
(48, 'New Blog Post Sept 2016', 'new-blog-post-sept-2016', '', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><hr><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2017-05-07 00:00:00', '2018-12-17 13:26:19', '', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', '', '', '', '0', 'post', 'Finance , Accounting', 12, 0, '2.jpg'),
(50, 'Remaining essentially unchanged', '-remaining-essentially-unchanged', '', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p><hr><p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>[mpro id=\"2\"] test cotent here [/mpro]', '2017-09-03 00:00:00', '2017-11-01 11:34:16', '', 'enable', '', '1', '', '', '', '0', 'post', 'Finance , Accounting', 8, 0, '3.jpg'),
(53, 'Backend Page', 'page-backend', '', '<p></p><div style=\"text-align: center;\">I<span style=\"font-size: 18px;\">nteger vitae orci sapien. Integer at urna lorem. Praesent nec ante suscipit, </span></div><div style=\"text-align: center;\"><span style=\"font-size: 18px;\">tincidunt nibh quis, dapibus tellus. Curabitur quis odio faucibus, </span></div><div style=\"text-align: center;\"><span style=\"font-size: 18px;\">pretium mauris eu, pretium eros.</span> <br></div><br>Morbi nec nibh ullamcorper, dignissim arcu sit amet, lobortis ligula. Duis fermentum, quam vel sollicitudin rutrum, ex risus ornare dolor, eget volutpat velit purus a purus. Nullam sed iaculis enim. Aenean ac pellentesque sem. <br><p></p><p><br>&nbsp;Nullam elementum quam et condimentum tempor. Quisque dignissim leo imperdiet sollicitudin sollicitudin. </p><br><p><br></p>', '1970-01-01 00:00:00', '2017-10-10 03:28:34', 'backend', 'enable', '', '1', 'backend', '', '', '0', 'page', '', 0, 0, ''),
(69, 'Screenshots', 'screenshots', '', '<ul class=\"thumbs\">            <li><a href=\"#thumb1\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/1.jpg\')\">                <h4>Web development</h4><span class=\"description\">Get the latest technologies</span></a>            </li>            <li>                <a href=\"#thumb2\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/2.jpg\')\"><h4>SEO</h4><span class=\"description\">Fast and reliable performance</span></a>            </li>            <li>                <a href=\"#thumb3\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/3.jpg\')\"><h4>Web design</h4><span class=\"description\">Slick and responsive website</span></a>            </li>            <li>                <a href=\"#thumb4\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/4.jpg\')\"><h4>Project management</h4><span class=\"description\">Reduce costs and increase productivity</span></a>            </li>            <li>                <a href=\"#thumb5\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/5.jpg\')\"><h4>Graphic design</h4><span class=\"description\">Brochures, logos, banners</span></a>            </li>            <li>                <a href=\"#thumb6\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/6.jpg\')\"><h4>SEO</h4><span class=\"description\">Nunc condimentum magna</span></a>            </li>            <li>                <a href=\"#thumb7\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/7.jpg\')\"><h4>Graphic design</h4><span class=\"description\">Nunc condimentum magna</span></a>            </li>            <li>                <a href=\"#thumb8\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/8.jpg\')\"><h4>Graphic design</h4><span class=\"description\">Morbi pellentesque quam vitae</span></a>            </li>            <li>                <a href=\"#thumb9\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/9.jpg\')\"><h4>Web development</h4><span class=\"description\">Phasellus ultrices, dolor sit amet dapibus</span></a>            </li>            <li>                <a href=\"#thumb10\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/10.jpg\')\"><h4>Web design</h4><span class=\"description\">Vivamus massa dolor, commodo</span></a>            </li>            <li>                <a href=\"#thumb11\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/11.jpg\')\"><h4>Graphic design</h4><span class=\"description\">Sed lobortis at nisl non pellentesque</span></a>            </li>            <li>                <a href=\"#thumb12\" class=\"thumbnail\" style=\"background-image: url(\'./uploads/images/portfolio/9.jpg\')\"><h4>Fron-end development</h4><span class=\"description\">Proin lorem est, rhoncus ullamcorper </span></a>            </li>        </ul>        <div class=\"portfolio-content\">            <div id=\"thumb1\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/1.jpg\"></div>                <h1>Web development</h1>                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis nisi sit amet metus venenatis, ut congue turpis aliquet. Pellentesque eget elit sollicitudin, feugiat felis in, ornare diam. Morbi blandit sapien nibh, eu pulvinar tortor luctus nec. Aenean lobortis lacus cursus gravida adipiscing. Praesent in odio porta, placerat felis id, viverra est. Nam magna quam, tincidunt eget augue in, aliquet tristique ipsum.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb2\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/2.jpg\"></div>                <h1>SEO</h1>                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Integer a posuere tortor. Praesent malesuada mauris massa, non blandit neque tempus nec. Quisque fermentum nunc non hendrerit tempus.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb3\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/3.jpg\"></div>                <h1>Web design</h1>                <p>Ut condimentum eros bibendum metus lacinia, ac condimentum justo faucibus. Nam nec dui convallis, sodales sapien in, gravida justo. Pellentesque pulvinar massa a nisl iaculis, quis iaculis elit tincidunt.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb4\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/4.jpg\"></div>                <h1>Project management</h1>                <p>Suspendisse cursus commodo elit, at tempus felis hendrerit vel. Cras condimentum aliquam mauris at blandit. Pellentesque ac velit iaculis, lobortis nibh id, ultricies ante. Fusce vel urna justo. Maecenas rhoncus vel ligula eget feugiat. Maecenas blandit risus eros, vel imperdiet augue dapibus vitae.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb5\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/5.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb6\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/6.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb7\">                <div class=\" media\" =\"\"=\"\"><img src=\"./uploads/images/portfolio/7.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb8\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/8.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb9\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/9.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb10\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/10.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb11\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/11.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div>            <div id=\"thumb12\">                <div class=\"media\"><img src=\"./uploads/images/portfolio/10.jpg\"></div>                <h1>Graphic design</h1>                <p>Vestibulum gravida, ante ut consectetur dictum, dolor sapien pretium elit, sed tincidunt augue sem a lorem. Vivamus quis neque pharetra, consequat dolor vel, venenatis urna. Praesent diam quam, fermentum vel tortor eget, pulvinar tincidunt velit.</p>                <a href=\"#\" class=\"btn btn-primary\">Learn More</a>            </div></div>', '1970-01-01 00:00:00', '2017-11-03 07:42:43', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 12, 0, ''),
(71, 'FAQ', 'faq', '', '<ul id=\"portfolio-filter\" class=\"portfolio-filter clearfix\">\r\n\r\n	<li class=\"active\"><a href=\"#\" data-filter=\"all\">All</a></li>\r\n	<li class=\"\"><a href=\"#\" data-filter=\".faq-marketplace\">Marketplace</a></li>\r\n	<li class=\"\"><a href=\"#\" data-filter=\".faq-authors\">Authors</a></li>\r\n	<li><a href=\"#\" data-filter=\".faq-legal\">Legal</a></li>\r\n	<li><a href=\"#\" data-filter=\".faq-itemdiscussion\">Item Discussion</a></li>\r\n	<li><a href=\"#\" data-filter=\".faq-affiliates\">Affiliates</a></li>\r\n	<li><a href=\"#\" data-filter=\".faq-miscellaneous\">Miscellaneous</a></li>\r\n\r\n</ul>\r\n\r\n<div class=\"clear mb-20\"></div>\r\n\r\n<div id=\"faqs\" class=\"faqs\">\r\n\r\n	<div class=\"toggle faq faq-marketplace faq-authors\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> How do I become an author?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-authors faq-miscellaneous\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> Helpful Resources for Authors</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-miscellaneous\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> How much money can I make?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-authors faq-legal faq-itemdiscussion\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> Can I offer my items for free on a promotional basis?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-marketplace faq-authors\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> An Introduction to the Marketplaces for Authors</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-affiliates faq-miscellaneous\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> How does the Tuts+ Premium affiliate program work?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-legal faq-itemdiscussion\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> What Images, Videos, Code or Music Can I Use in my Items?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-legal faq-authors faq-itemdiscussion\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> Can I use trademarked names in my items?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-affiliates\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> Tips for Increasing Your Referral Income</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-authors faq-itemdiscussion\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> How can I get support for an item which isn\'t working correctly?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n	<div class=\"toggle faq faq-marketplace faq-itemdiscussion\" style=\"\">\r\n		<div class=\"togglet\"><i class=\"fa fa-question-sign\"></i> How do I pay for items on the Marketplaces?</div>\r\n		<div class=\"togglec\" style=\"display: none;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>\r\n	</div>\r\n\r\n</div>\r\n', '1970-01-01 00:00:00', '2017-11-04 03:04:17', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 27, 0, ''),
(74, 'Galleries', 'galleries', 'Galleries with mansonry plugins', '<div class=\"clearfix\">\r\n<div class=\"portfolio-mansonry-grid\" id=\"portfolio-mansonry-grid\">	\r\n\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/1.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/2.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/3.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/4.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/5.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/6.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/7.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/8.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/9.jpg\" alt=\"Open Imagination\">\r\n	</div>\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/10.jpg\" alt=\"Open Imagination\">\r\n	</div>		\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/11.jpg\" alt=\"Open Imagination\">\r\n	</div>	\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/12.jpg\" alt=\"Open Imagination\">\r\n	</div>	\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/7.jpg\" alt=\"Open Imagination\">\r\n	</div>	\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/11.jpg\" alt=\"Open Imagination\">\r\n	</div>	\r\n	<div class=\"item\">\r\n		<img src=\"./uploads/images/portfolio/4/mixed/12.jpg\" alt=\"Open Imagination\">\r\n	</div>	\r\n		\r\n</div>\r\n</div>', '1970-01-01 00:00:00', '2017-11-04 08:33:10', 'fullpage', 'enable', '', '1', 'frontend', '', '', '0', 'page', '', 27, 0, ''),
(72, 'Pricing', 'pricing', 'Here are a few sample from our works', '<br><div><div class=\"section\"><div class=\"container\"><p align=\"center\">This is simple gallery mosaic , you can manage image via Backend CMS <br></p>\r\n	[sc:cms fnc=gallery|id=7 ] [/sc]\r\n\r\n	</div><p></p>\r\n</div>	</div>', '1970-01-01 00:00:00', '2017-11-04 03:52:43', 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', '1', 'frontend', '', '', '0', 'page', '', 26, 0, ''),
(73, 'Team', 'team', '', '<div class=\"row teams clearfix\">\r\n	\r\n	<div class=\"container-title title-border mb-40\">\r\n		<h4> 3 Columns </h4>\r\n	</div>\r\n\r\n	<div class=\"col-md-4\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/2.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Mangopik </h4>\r\n			<span> CEO Sximo NET </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"col-md-4\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/3.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Ivan </h4>\r\n			<span> Senior Programmer </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"col-md-4\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/4.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Santo </h4>\r\n			<span> Creative Design </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"container-title title-border mb-40\">\r\n		<h4> 4 Columns </h4>\r\n	</div>\r\n\r\n	<div class=\"col-md-3\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/2.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Mangopik </h4>\r\n			<span> CEO Sximo NET </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"col-md-3\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/3.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Ivan </h4>\r\n			<span> Senior Programmer </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"col-md-3\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/4.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Santo </h4>\r\n			<span> Creative Design </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-3\">\r\n		<div class=\"image\">\r\n			<img src=\"./uploads/images/team/8.jpg\">\r\n		</div>\r\n		<div class=\"info\">\r\n			<h4> Margareta </h4>\r\n			<span> Finance </span>\r\n			<div class=\"social\">\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-facebook\"></i>\r\n					<i class=\"fa fa-facebook\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon \">\r\n					<i class=\"fa fa-twitter\"></i>\r\n					<i class=\"fa fa-twitter\"></i>\r\n				</a>\r\n				<a href=\"#\" class=\"social-icon\">\r\n					<i class=\"fa fa-google\"></i>\r\n					<i class=\"fa fa-google\"></i>\r\n				</a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>		', '1970-01-01 00:00:00', '2017-11-04 02:12:18', 'page', 'enable', '', '1', 'frontend', '', '', '0', 'page', '', 17, 0, ''),
(80, 'Preferences ', 'preferences', NULL, 'This is preferences page', NULL, NULL, 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', NULL, 'frontend', NULL, NULL, '0', NULL, NULL, 35, NULL, NULL),
(78, 'Trips', 'trips', NULL, '[sc:Sximo fnc=render|id=usertrips] [/sc]', NULL, NULL, 'page', 'enable', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"0\",\"4\":\"1\"}', NULL, 'frontend', NULL, NULL, '0', NULL, NULL, 1887, NULL, NULL),
(79, 'Teams', 'teams', NULL, 'This is teams page . . .', NULL, NULL, 'page', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"}', NULL, 'frontend', NULL, NULL, '0', NULL, NULL, 85, NULL, NULL),
(81, 'Book a Hotel', 'book-a-hotel', NULL, '[sc:Sximo fnc=showForm|id=usertrips] [/sc]', NULL, NULL, 'homepage', 'enable', '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"1\",\"5\":\"0\",\"6\":\"0\"}', NULL, 'frontend', NULL, NULL, '0', NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_restapi`
--

CREATE TABLE `tb_restapi` (
  `id` int(11) NOT NULL,
  `apiuser` int(11) DEFAULT NULL,
  `apikey` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modules` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_restapi`
--

INSERT INTO `tb_restapi` (`id`, `apiuser`, `apikey`, `created`, `modules`) VALUES
(1, 1, 'vbzt9Q-mZT7K-G8fTmm-pKezp', '2017-11-22', 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
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
  `entry_by` int(11) NOT NULL,
  `user_type` varchar(555) NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `hotel_code` varchar(255) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `service_type` int(11) NOT NULL,
  `o_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `group_id`, `username`, `password`, `email`, `phone_number`, `first_name`, `last_name`, `avatar`, `active`, `login_attempt`, `last_login`, `created_at`, `updated_at`, `reminder`, `activation`, `remember_token`, `last_activity`, `config`, `hotel_id`, `entry_by`, `user_type`, `hotel_type`, `hotel_code`, `hotel_address`, `service_type`, `o_name`) VALUES
(1, 1, 'superadmin', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'superadmin@usdevco.com', '3053008807', 'Root', 'Admin', 'user4.jpg', 1, 12, '2019-04-13 06:05:30', '2014-03-12 09:18:46', '2017-05-05 05:01:33', 'SNLyM4Smv12Ck8jyopZJMfrypTbEDtVhGT5PMRzxs', '4454914', '17uWY7s8Ly3VMCtkEtpAwVNZ0B21F5cPGEMj0XD1laSopbN50XO5RAYt6LNt', 1485431605, NULL, 1, 0, '', '', '', '', 0, ''),
(2, 2, 'admin', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'admin@usdevco.com', '3053008807', 'Eric', 'Admin', NULL, 1, 0, '2019-02-20 09:48:35', '2018-12-17 18:15:19', NULL, NULL, NULL, 'ZnFMUriRNnS8sro36u09gChfbK3GRXSn7ET2BUmdVIWXlt71NTctZ7ReV5aH', NULL, NULL, 1, 0, '', '', '', '', 0, ''),
(3, 4, 'coordinator', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'coordinator@usdevco.com', '3053008807', 'Eric', 'Coordinator', '5.png', 1, 0, '2019-04-13 07:14:54', '2018-12-18 04:20:04', '2018-12-18 04:20:04', NULL, '5717886', '5CICBRNfQBKYTcLFGgaxAvhAxE7KqL3EMaVF4pVVQvd5ggB6Per8IeAwf1MC', NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(4, 5, 'manager', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'manager@usdevco.com', '3053008807', 'Eric', 'Manager', '5.png', 1, 0, '2019-04-12 05:48:18', '2018-12-18 04:21:22', '2018-12-18 04:21:22', NULL, '4217898', 'ScngvXMXDyPLTQL96LBQYmX171oR88EHYexLgU815Qfsek8e1mGBxg0baXjh', NULL, NULL, 2, 0, '', '', '', '', 0, ''),
(5, 6, 'corporate', '$2y$10$xRZW6STnwneDrSjVnwPScucZASq4BIAJRrSGUY/JZjhOYYMgwhIli', 'corporate@usdevco.com', '3053008807', 'Eric', 'Corporate', '1.jpg', 1, 0, '2019-04-11 10:42:25', '2018-12-18 15:26:55', '2019-01-25 14:47:54', NULL, '348890', 'mhKAZF7225ZXE9AK52JNAbIZlCjd0YGctmCexuOA3n70Nq7hy4Wgr0Ijt4TC', NULL, NULL, 2, 0, '', '', '', '', 0, ''),
(6, 2, 'ericgiljr', '$2y$10$ZO.bfwpnQ2aY9aezk.mT3OYzj63Gxi9qSQwHNc/t6QaE8lEKThtYu', 'ericgildeveloper@gmail.com', '', 'Eric', 'Gil', '1.jpg', 1, 0, NULL, '2018-02-09 15:26:23', '2019-03-23 17:27:52', 'FvV6tH7nL9OeujWSCf05wN2ylyvqsXpMuqQabq1J', NULL, NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(7, 2, 'ericgiljrdeveloper', '$2y$10$hbg7rletCM3qytHC2J0MfeHwre1R2FV3LZcqqtUItqON2TiPtB9/W', 'ericgiljr@gmail.com', '', 'Eric', 'Gil', NULL, 1, 0, NULL, '2019-02-09 15:29:25', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(8, 2, 'ericjr', '$2y$10$gUfPL/b6tRL8fPvUu7qka.gmPfUotEpWxFnafr45F9JYyhuSiL4pu', 'ericjrdeveloper@gmail.com', '', 'Eric', 'Gil', '8.jpeg', 1, 0, NULL, '2019-02-09 15:34:42', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(29, 3, 'bdcreativestudio', '$2y$10$HwKk4yDDGbeVvsvp21zCreO89XZjdwAvbvQh6GDK0qSCGUfb.rksq', 'info@bdcreativestudio.com', '7863938945', 'Javier', 'Gonzalez', NULL, 1, 0, '2019-02-20 16:51:25', '2019-02-20 16:50:18', '2019-02-20 16:50:18', NULL, '', '1nhYKLFGehsZ4m7IFMVc8x9eEdqJ17F3EjVoTP33PWSW29utz7HU3vpMbUOy', NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(72, 4, 'oliveromg', '$2y$10$knxTnw9ep0zJpoJR5rH8beyuU0kRZCRnQ4GO8shLBcpnyIvCml906', 'omgolivermasongil@gmail.com', '3058503519', 'Oliver', 'Gil', NULL, 1, 0, '2019-03-20 22:06:02', '2019-03-20 22:03:50', '2019-03-20 22:03:50', NULL, '', 'YjdvD9UG5OSMc6TExNE1SvDooUiRxAu5pxXJs4tzPJACUDQ6iS5XHjOVOOIY', NULL, NULL, 0, 0, '', '', '', '', 1, 'Oliver Team Systems'),
(73, 4, 'coordinator_test', '$2y$10$VMtPHJ/ITJRFu10PDV3ZjeAWZB9/JA5iYJaenYfOYSFOU7Lu.K1qW', 'coordinator_test@gmail.com', '15017122661', 'test', 'test', '73.jpg', 1, 0, '2019-03-21 14:50:34', '2019-03-21 04:26:57', '2019-03-21 04:26:57', NULL, '1600497', 'YmdjXWPAyXCfiuJy89nIGFMnOvHfrTXs2byr8YRI07O8laMl4tNSPhnBudEK', NULL, NULL, 0, 0, '', '', '', '', 1, 'test_organization'),
(80, 5, 'elizabethgil', '$2y$10$xhsng4roBiRWjEZrz9Z2ZeoVIf6Z.dlFR8Y6P3AIrLVp04PKQHV3m', 'elizgil.01@hilton.com', '7863124386', 'Elizabeth', 'Gil', NULL, 0, 0, NULL, '2019-03-24 23:05:52', '2019-03-24 23:05:52', NULL, '9448078', NULL, NULL, NULL, 1, 0, '', 'hilton', '1212', '7801 NW 37th St Miami Fl 33166', 1, ''),
(90, 5, 'manager-IHG', '$2y$10$osnBzqTY60yCiGTy7jFd9Of4iitph7Wm8vCv07.hPkOhFBmCnVol.', 'test@ihg.com', '15017122661', 'test', 'test', NULL, 1, 0, '2019-04-02 06:43:47', '2019-03-29 13:47:20', '2019-03-29 13:47:20', NULL, '2369955', 'Ggaks8aEjNx9LcR98rEnrV69mZ60QgjeBCRlgrjA83GgosXwlIHrqvTEEhWP', NULL, NULL, 0, 0, '', 'ihg', '45545', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', 1, ''),
(91, 5, 'lizzy', '$2y$10$m8jMqdmkoYecugsxw6wrYufYdRIS9qNN5z0YRgzbmNHulO5ZniP3C', 'jimmy@hilton.com', '7863124386', 'Elizabeth', 'Jones', NULL, 1, 0, '2019-03-31 00:39:05', '2019-03-31 00:37:37', '2019-03-31 00:37:37', NULL, '', 'gLVyCSlCUaKOYL90qs0MKbuFhE3LlxEgen9F17TopSYbHyecFZM52u6G9h6i', NULL, NULL, 0, 0, '', 'hilton', '1010', '2516 SW 147 Path', 1, ''),
(92, 5, 'manager_test', '$2y$10$OfbapiAv.MLRZdPKHSZ05.FcMvuprUtD.NBqeP7qwP29Hl4WR0zWO', 'manager_test@ihg.com', '3053008807', 'test', 'test', NULL, 1, 0, '2019-04-12 06:17:01', '2019-04-01 05:12:01', '2019-04-01 05:12:01', NULL, '2660543', 'TnPtvvsZVSpTK3ZsyjiiQ9yD8MpJaHrQ5mVW68Uu0K2WihqKxGMd3jp8dDE8', NULL, NULL, 1, 0, '', 'hilton', '5454645', 'Miami Beach Liquor Store, 13th Street, Miami Beach, FL, USA', 1, ''),
(93, 6, 'corporateUser', '$2y$10$7nEkIBlhktdCXmhACojn1.fDbdN8shAhI/NZlN71VV01.taxHOu/G', 'corporate_user@gmail.com', '', 'test', 'test', '93.png', 1, 0, '2019-04-03 12:20:52', '2019-04-02 04:28:06', NULL, NULL, NULL, 'N71hy2vna9TpX8161GnbDe1cMjC3GCwrplm12iXbxXgv0n3gGSjdXYb5NcIk', NULL, NULL, 3, 0, '', '', '', '', 0, ''),
(94, 6, 'corporate1', '$2y$10$0/eQJRZHgiqBBFcwFd.D7eN3LylWEPczeJwP9SFBvdpuC07j10bLm', 'corporate1@gmail.com', '', 'test1', 'test1', NULL, 1, 0, '2019-04-02 12:32:03', '2019-04-02 12:30:27', NULL, NULL, NULL, 'aXqFFuTGe6q8tdXb5NOOqPiZWkZzYGC0qoo72ahUfw0IHXz8lARVDkm67MxG', NULL, NULL, 1, 0, '', '', '', '', 0, ''),
(96, 5, 'testManger', '$2y$10$IGUlkTd7irUqhrfOdZvzzux5co5D9mJU4GiDkyWRZMCFAzKhZVTPu', 'developer123@gmail.com', '15017122661', 'test', 'test', NULL, 1, 0, NULL, '2019-04-02 14:01:59', '2019-04-02 14:01:59', NULL, '', NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(101, 4, 'testOrganization', '$2y$10$mxeuAeMrxaLd.83k/0hGtOGKdl5lxOGUrCyq9Yx2vbgPFFqVdXTXi', 'testOrganization@gmail.com', '7863124386', 'test', 'test', NULL, 1, 0, '2019-04-03 13:04:44', '2019-04-03 13:03:37', '2019-04-03 13:03:37', NULL, '', 'qEwICaPwJM4hETvXFNiErHMDYSTVQe3IU0jv3n6igM4tYC5s4JKAX14BNdHn', NULL, NULL, 22, 0, '', '', '', '', 0, 'testOrganization'),
(102, 4, 'jerome123', '$2y$10$HDxoJB4EUScoCXyYDxtyZO4EgyMrbxo9/xhNIEfC0NwddRb5lPkka', 'jerome@123.com', '7706539706', 'Jerome', 'Samuels', NULL, 1, 0, '2019-04-03 15:32:39', '2019-04-03 15:31:08', '2019-04-03 15:31:08', NULL, '', 'ZZGerhgptpWNcWXZFqWO8k8D9PJJIN3iDWcCO7zV2YOnuo8DrDA4Gc7mLDaM', NULL, NULL, 23, 0, '', '', '', '', 0, 'Miami Champions'),
(126, 5, 'hiltonhm', '$2y$10$iE5ClyWUYI9yOpcSxFRXxOf94ToezpeOc569HgK/iwS.CuPlq00bW', 'nelson@hilton.com', '3053008807', 'Nelson', 'Gil', NULL, 0, 0, NULL, '2019-04-05 04:41:54', '2019-04-05 04:41:54', NULL, '9113480', NULL, NULL, NULL, 47, 0, '', 'hilton', 'H123456', '585 Main St Miami Fl 33196', 1, ''),
(131, 4, 'testOorganization', '$2y$10$pv0jnmFcwqLfOp5nRTn0hufOjoephXFcDxtzWhQ0R1opOE1qcSjYG', 'websited@gmail.com', '3053008807', 'test', 'test', NULL, 1, 0, NULL, '2019-04-08 05:11:13', '2019-04-08 05:11:13', NULL, '', NULL, NULL, NULL, 0, 0, '', '', '', '', 0, 'testOorganization'),
(133, 5, 'hmanager', '$2y$10$GRgz62OLMGT3p90xRCZW8OiLU74cEZhwaKRVr3scZBcvOArZA.hUa', 'hotemanager@hilton.com', '7863124386', 'Hotel', 'Manager', NULL, 0, 0, NULL, '2019-04-08 11:59:52', '2019-04-08 11:59:52', NULL, '5726925', '0EN0CngwUjK8xbcNYHQwIXmdzDukwk9bfdIbrmUvWGSPBeMZdxUON00IWnEM', NULL, NULL, 56, 0, '', 'hilton', '1344H', '7544 SW 157 Place', 1, ''),
(134, 3, 'user', '$2y$10$ocohwAUV7ENmkx14xEUMOeMbXuK7xtccOhW7Ms9E/T/n73/.Pvmsi', 'website123@gmail.com', '7863124386', 'test', 'test', NULL, 0, 0, NULL, '2019-04-09 11:41:48', '2019-04-09 11:41:48', NULL, '5076922', NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(165, NULL, 'mangernewtest', '$2y$10$rfImBmo7/lu3/RWxrxr7ee8Y9cOOvzlNzkNWnteq2bmLEyaL7Pjxa', 'mangertest@ihg.com', '3053008807', 'test', 'test', NULL, 0, 0, NULL, '2019-04-13 05:12:36', '2019-04-13 05:12:36', NULL, '2778348', NULL, NULL, NULL, 0, 0, '', '', '', '', 0, ''),
(175, 5, 'testManhgerNew', '$2y$10$qOWTgNFMBqZbGdeUlUR3oOcTGC5d29CBWZ4Dr3wILk76fJIKaPrgG', 'websitedesignanddeveloper@gmail.com', '3053008807', 'test', 'test', NULL, 1, 0, '2019-04-13 09:37:13', '2019-04-13 09:19:12', '2019-04-13 09:19:12', NULL, '1942022', 'p1eVK0FR7nJ1CGgRC8sTi2vPnkH35YxQQDribbuWGsn7wAu7nIpw4knKgZCu', NULL, NULL, 3, 0, '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `age_group` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `age_group`, `gender`, `updated_at`, `created_at`) VALUES
(1, 'Team A', 'U17', '1', '2019-02-19 12:29:26', '2019-02-19 12:29:26'),
(2, 'Team B', 'U10', '0', '2019-02-19 12:29:39', '2019-02-19 12:29:39'),
(3, 'Team C', 'U6', '1', '2019-02-19 12:29:53', '2019-02-19 12:29:53'),
(4, 'Tophat', '2004', '0', '2019-03-12 15:14:33', '2019-03-12 15:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `trip_amenities`
--

CREATE TABLE `trip_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trip_amenities`
--

INSERT INTO `trip_amenities` (`id`, `trip_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(90, 17, 1, NULL, NULL),
(91, 17, 2, NULL, NULL),
(92, 17, 3, NULL, NULL),
(93, 18, 1, NULL, NULL),
(94, 18, 2, NULL, NULL),
(95, 18, 3, NULL, NULL),
(96, 19, 1, NULL, NULL),
(97, 19, 2, NULL, NULL),
(98, 19, 3, NULL, NULL),
(102, 21, 1, NULL, NULL),
(103, 21, 2, NULL, NULL),
(104, 22, 1, NULL, NULL),
(105, 22, 2, NULL, NULL),
(113, 28, 1, NULL, NULL),
(114, 28, 3, NULL, NULL),
(115, 122, 1, NULL, NULL),
(116, 123, 1, NULL, NULL),
(117, 124, 1, NULL, NULL),
(118, 125, 1, NULL, NULL),
(119, 126, 1, NULL, NULL),
(120, 127, 1, NULL, NULL),
(121, 128, 1, NULL, NULL),
(122, 129, 1, NULL, NULL),
(123, 130, 1, NULL, NULL),
(124, 131, 1, NULL, NULL),
(125, 132, 1, NULL, NULL),
(126, 133, 1, NULL, NULL),
(127, 134, 1, NULL, NULL),
(128, 134, 2, NULL, NULL),
(129, 135, 1, NULL, NULL),
(130, 135, 2, NULL, NULL),
(131, 136, 1, NULL, NULL),
(132, 137, 1, NULL, NULL),
(133, 138, 1, NULL, NULL),
(134, 138, 2, NULL, NULL),
(135, 139, 1, NULL, NULL),
(136, 139, 2, NULL, NULL),
(137, 140, 1, NULL, NULL),
(138, 140, 2, NULL, NULL),
(139, 141, 1, NULL, NULL),
(140, 141, 2, NULL, NULL),
(141, 142, 1, NULL, NULL),
(142, 142, 2, NULL, NULL),
(143, 143, 1, NULL, NULL),
(144, 143, 2, NULL, NULL),
(145, 144, 1, NULL, NULL),
(146, 145, 1, NULL, NULL),
(147, 146, 1, NULL, NULL),
(148, 147, 1, NULL, NULL),
(149, 148, 1, NULL, NULL),
(150, 148, 2, NULL, NULL),
(151, 149, 1, NULL, NULL),
(152, 149, 2, NULL, NULL),
(153, 150, 1, NULL, NULL),
(154, 150, 2, NULL, NULL),
(155, 151, 1, NULL, NULL),
(156, 151, 2, NULL, NULL),
(157, 152, 1, NULL, NULL),
(158, 152, 2, NULL, NULL),
(159, 153, 1, NULL, NULL),
(160, 153, 2, NULL, NULL),
(161, 153, 4, NULL, NULL),
(162, 154, 1, NULL, NULL),
(163, 154, 2, NULL, NULL),
(164, 154, 4, NULL, NULL),
(165, 156, 1, NULL, NULL),
(166, 156, 2, NULL, NULL),
(167, 156, 4, NULL, NULL),
(168, 155, 1, NULL, NULL),
(169, 155, 2, NULL, NULL),
(170, 155, 4, NULL, NULL),
(171, 157, 1, NULL, NULL),
(172, 157, 2, NULL, NULL),
(173, 157, 4, NULL, NULL),
(174, 158, 1, NULL, NULL),
(175, 158, 2, NULL, NULL),
(176, 158, 4, NULL, NULL),
(177, 159, 1, NULL, NULL),
(178, 159, 2, NULL, NULL),
(179, 159, 4, NULL, NULL),
(180, 160, 1, NULL, NULL),
(181, 160, 2, NULL, NULL),
(182, 160, 4, NULL, NULL),
(183, 161, 1, NULL, NULL),
(184, 161, 2, NULL, NULL),
(185, 161, 4, NULL, NULL),
(186, 162, 1, NULL, NULL),
(187, 162, 2, NULL, NULL),
(188, 162, 4, NULL, NULL),
(189, 163, 1, NULL, NULL),
(190, 163, 2, NULL, NULL),
(191, 163, 4, NULL, NULL),
(192, 164, 1, NULL, NULL),
(193, 164, 2, NULL, NULL),
(194, 164, 4, NULL, NULL),
(195, 165, 1, NULL, NULL),
(196, 165, 2, NULL, NULL),
(197, 165, 4, NULL, NULL),
(198, 166, 1, NULL, NULL),
(199, 166, 2, NULL, NULL),
(200, 166, 4, NULL, NULL),
(201, 167, 1, NULL, NULL),
(202, 167, 2, NULL, NULL),
(203, 167, 4, NULL, NULL),
(204, 168, 1, NULL, NULL),
(205, 168, 2, NULL, NULL),
(206, 168, 4, NULL, NULL),
(207, 169, 1, NULL, NULL),
(208, 169, 2, NULL, NULL),
(209, 169, 4, NULL, NULL),
(210, 170, 1, NULL, NULL),
(211, 170, 2, NULL, NULL),
(212, 170, 4, NULL, NULL),
(213, 171, 1, NULL, NULL),
(214, 171, 2, NULL, NULL),
(215, 171, 4, NULL, NULL),
(216, 172, 1, NULL, NULL),
(217, 172, 2, NULL, NULL),
(218, 172, 4, NULL, NULL),
(219, 173, 1, NULL, NULL),
(220, 173, 2, NULL, NULL),
(221, 173, 4, NULL, NULL),
(222, 174, 1, NULL, NULL),
(223, 174, 2, NULL, NULL),
(224, 174, 4, NULL, NULL),
(225, 175, 1, NULL, NULL),
(226, 175, 2, NULL, NULL),
(227, 175, 4, NULL, NULL),
(228, 176, 1, NULL, NULL),
(229, 176, 2, NULL, NULL),
(230, 176, 4, NULL, NULL),
(231, 177, 1, NULL, NULL),
(232, 177, 2, NULL, NULL),
(233, 177, 4, NULL, NULL),
(234, 178, 1, NULL, NULL),
(235, 178, 2, NULL, NULL),
(236, 178, 4, NULL, NULL),
(237, 179, 1, NULL, NULL),
(238, 179, 2, NULL, NULL),
(239, 179, 4, NULL, NULL),
(240, 187, 1, NULL, NULL),
(241, 187, 2, NULL, NULL),
(242, 187, 4, NULL, NULL),
(243, 188, 1, NULL, NULL),
(244, 188, 2, NULL, NULL),
(245, 188, 4, NULL, NULL),
(246, 186, 1, NULL, NULL),
(247, 186, 2, NULL, NULL),
(248, 186, 4, NULL, NULL),
(249, 189, 1, NULL, NULL),
(250, 189, 2, NULL, NULL),
(251, 189, 4, NULL, NULL),
(252, 190, 1, NULL, NULL),
(253, 190, 2, NULL, NULL),
(254, 190, 4, NULL, NULL),
(255, 191, 1, NULL, NULL),
(256, 191, 2, NULL, NULL),
(257, 191, 4, NULL, NULL),
(258, 192, 1, NULL, NULL),
(259, 192, 2, NULL, NULL),
(260, 192, 4, NULL, NULL),
(261, 194, 1, NULL, NULL),
(262, 194, 2, NULL, NULL),
(263, 194, 4, NULL, NULL),
(264, 194, 8, NULL, NULL),
(265, 194, 9, NULL, NULL),
(266, 195, 1, NULL, NULL),
(267, 195, 2, NULL, NULL),
(268, 195, 4, NULL, NULL),
(269, 195, 8, NULL, NULL),
(270, 195, 9, NULL, NULL),
(271, 193, 1, NULL, NULL),
(272, 193, 2, NULL, NULL),
(273, 193, 4, NULL, NULL),
(274, 193, 8, NULL, NULL),
(275, 193, 9, NULL, NULL),
(276, 196, 1, NULL, NULL),
(277, 196, 2, NULL, NULL),
(278, 196, 4, NULL, NULL),
(279, 196, 8, NULL, NULL),
(280, 196, 9, NULL, NULL),
(281, 197, 1, NULL, NULL),
(282, 197, 2, NULL, NULL),
(283, 198, 1, NULL, NULL),
(284, 198, 2, NULL, NULL),
(285, 199, 1, NULL, NULL),
(286, 199, 2, NULL, NULL),
(287, 200, 1, NULL, NULL),
(288, 200, 2, NULL, NULL),
(289, 201, 1, NULL, NULL),
(290, 201, 2, NULL, NULL),
(291, 201, 4, NULL, NULL),
(292, 202, 1, NULL, NULL),
(293, 202, 2, NULL, NULL),
(294, 202, 3, NULL, NULL),
(295, 202, 4, NULL, NULL),
(296, 202, 5, NULL, NULL),
(297, 203, 1, NULL, NULL),
(298, 203, 2, NULL, NULL),
(299, 203, 5, NULL, NULL),
(300, 204, 1, NULL, NULL),
(301, 204, 2, NULL, NULL),
(302, 205, 1, NULL, NULL),
(303, 205, 2, NULL, NULL),
(304, 206, 1, NULL, NULL),
(305, 206, 2, NULL, NULL),
(306, 207, 1, NULL, NULL),
(307, 207, 2, NULL, NULL),
(308, 208, 1, NULL, NULL),
(309, 208, 2, NULL, NULL),
(310, 209, 1, NULL, NULL),
(311, 209, 2, NULL, NULL),
(312, 211, 1, NULL, NULL),
(313, 211, 2, NULL, NULL),
(314, 213, 1, NULL, NULL),
(315, 213, 2, NULL, NULL),
(316, 216, 1, NULL, NULL),
(317, 216, 2, NULL, NULL),
(318, 217, 1, NULL, NULL),
(319, 217, 2, NULL, NULL),
(320, 218, 1, NULL, NULL),
(321, 218, 2, NULL, NULL),
(322, 219, 1, NULL, NULL),
(323, 219, 2, NULL, NULL),
(324, 220, 1, NULL, NULL),
(325, 220, 3, NULL, NULL),
(326, 221, 1, NULL, NULL),
(327, 221, 2, NULL, NULL),
(328, 221, 3, NULL, NULL),
(329, 221, 4, NULL, NULL),
(330, 239, 1, NULL, NULL),
(331, 239, 2, NULL, NULL),
(332, 240, 1, NULL, NULL),
(333, 240, 2, NULL, NULL),
(334, 251, 1, NULL, NULL),
(335, 252, 1, NULL, NULL),
(336, 252, 2, NULL, NULL),
(337, 253, 1, NULL, NULL),
(338, 253, 2, NULL, NULL),
(339, 254, 1, NULL, NULL),
(340, 254, 2, NULL, NULL),
(341, 254, 3, NULL, NULL),
(342, 255, 1, NULL, NULL),
(343, 255, 2, NULL, NULL),
(344, 256, 1, NULL, NULL),
(345, 256, 2, NULL, NULL),
(346, 257, 1, NULL, NULL),
(347, 257, 2, NULL, NULL),
(348, 258, 1, NULL, NULL),
(349, 258, 2, NULL, NULL),
(350, 259, 1, NULL, NULL),
(351, 259, 2, NULL, NULL),
(352, 260, 1, NULL, NULL),
(353, 260, 2, NULL, NULL),
(354, 261, 1, NULL, NULL),
(355, 261, 2, NULL, NULL),
(356, 262, 1, NULL, NULL),
(357, 262, 2, NULL, NULL),
(358, 262, 4, NULL, NULL),
(359, 263, 1, NULL, NULL),
(360, 263, 2, NULL, NULL),
(361, 1, 1, NULL, NULL),
(362, 1, 2, NULL, NULL),
(363, 2, 1, NULL, NULL),
(364, 2, 2, NULL, NULL),
(365, 3, 1, NULL, NULL),
(366, 3, 2, NULL, NULL),
(367, 4, 1, NULL, NULL),
(368, 4, 2, NULL, NULL),
(369, 5, 1, NULL, NULL),
(370, 5, 2, NULL, NULL),
(371, 6, 1, NULL, NULL),
(372, 6, 2, NULL, NULL),
(373, 7, 1, NULL, NULL),
(374, 7, 2, NULL, NULL),
(375, 8, 1, NULL, NULL),
(376, 8, 2, NULL, NULL),
(377, 9, 1, NULL, NULL),
(378, 9, 2, NULL, NULL),
(379, 10, 1, NULL, NULL),
(380, 10, 2, NULL, NULL),
(381, 11, 1, NULL, NULL),
(382, 11, 2, NULL, NULL),
(383, 11, 4, NULL, NULL),
(384, 12, 1, NULL, NULL),
(385, 12, 2, NULL, NULL),
(386, 13, 1, NULL, NULL),
(387, 13, 2, NULL, NULL),
(388, 14, 1, NULL, NULL),
(389, 14, 2, NULL, NULL),
(390, 15, 1, NULL, NULL),
(391, 15, 2, NULL, NULL),
(392, 16, 1, NULL, NULL),
(393, 16, 2, NULL, NULL),
(394, 20, 1, NULL, NULL),
(395, 20, 2, NULL, NULL),
(396, 23, 1, NULL, NULL),
(397, 23, 2, NULL, NULL),
(398, 24, 1, NULL, NULL),
(399, 24, 2, NULL, NULL),
(400, 25, 1, NULL, NULL),
(401, 25, 2, NULL, NULL),
(402, 26, 1, NULL, NULL),
(403, 26, 2, NULL, NULL),
(404, 27, 1, NULL, NULL),
(405, 27, 2, NULL, NULL),
(406, 42, 1, NULL, NULL),
(407, 42, 2, NULL, NULL),
(408, 43, 1, NULL, NULL),
(409, 43, 2, NULL, NULL),
(410, 44, 1, NULL, NULL),
(411, 44, 2, NULL, NULL),
(412, 45, 1, NULL, NULL),
(413, 45, 2, NULL, NULL),
(414, 46, 1, NULL, NULL),
(415, 46, 2, NULL, NULL),
(416, 47, 1, NULL, NULL),
(417, 47, 2, NULL, NULL),
(418, 48, 1, NULL, NULL),
(419, 48, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trip_statuses`
--

CREATE TABLE `trip_statuses` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL,
  `color` varchar(10) NOT NULL,
  `description` varchar(256) NOT NULL,
  `mail` text NOT NULL,
  `mail_subject` varchar(512) NOT NULL,
  `group_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trip_statuses`
--

INSERT INTO `trip_statuses` (`id`, `title`, `step`, `color`, `description`, `mail`, `mail_subject`, `group_level`) VALUES
(1, 'Sent', 1, '008000', '{coordinator_name} just added the trip: <b>{trip_title}</b>', 'Hello {coordinator_name}, Thankyou! for adding the trip <b>{trip_title}</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', 4),
(2, 'Pending Review', 1, '800080', 'all managers received the notification about the new trip Hello {manager_name}, A new trip has beed added by {coordinator_name} <br />\n<b>{trip_title}</b>', 'Hello {manager_name}, A new trip request is added by {coordinator_name}. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/{trip_id}\">here</a> for submitting your proposal.', 'A New Trip Added ', 5),
(3, 'Bid Sent', 2, '000080', 'Hotel Manager {manager_name} sees and send the RFP/Bid on {trip_title}', 'Thankyou {manager_name} for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', 5),
(4, 'Bid Received', 2, '800000', 'Coordinator received the bid from {manager_name}', 'Hello {coordinator_name}, A new bid is sent by {manager_name} on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', 4),
(5, 'Decline', 3, '333333', 'Coordinator has declined this Bid', 'You\'ve declined the bid ...', 'Declined Bid', 4),
(6, 'Declined', 3, '666666', 'Your Bid has beed declined by the coordinator.', 'Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.', 'Bid has beed declined', 5),
(7, 'Accept', 4, '999999', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', 4),
(8, 'Accepted', 4, 'CCCCCC', 'Hotel Manager {manager_name}\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator {coordinator_name}', 'Congratulations! Your Bid has been accepted', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trip_status_logs`
--

CREATE TABLE `trip_status_logs` (
  `trip_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rfp_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `trip_status_id` tinyint(3) UNSIGNED NOT NULL,
  `generated_title` varchar(100) NOT NULL,
  `generated_description` varchar(256) NOT NULL,
  `generated_mail` text NOT NULL,
  `generated_mailsubject` varchar(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(555) NOT NULL,
  `country` varchar(255) NOT NULL,
  `location` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trip_status_logs`
--

INSERT INTO `trip_status_logs` (`trip_id`, `user_id`, `rfp_id`, `trip_status_id`, `generated_title`, `generated_description`, `generated_mail`, `generated_mailsubject`, `reason`, `added`, `ip`, `country`, `location`) VALUES
(6, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>4/3/2019-test-2019</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>4/3/2019-test-2019</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-03 11:50:26', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(6, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello test test, A new trip has beed added by Eric Coordinator <br />\n<b>4/3/2019-test-2019</b>', 'Hello test test, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/6\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-03 11:50:26', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(4, 92, 4, 3, 'Bid Sent', 'Hotel Manager test test sees and send the RFP/Bid on test4-4/3/-19', 'Thankyou test test for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-03 13:20:58', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(4, 3, 4, 4, 'Bid Received', 'Coordinator received the bid from test test', 'Hello Eric Coordinator, A new bid is sent by test test on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-03 13:20:58', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(4, 3, 4, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-03 13:27:57', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(4, 92, 4, 8, 'Accepted', 'Hotel Manager test test\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-03 13:27:57', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(7, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>04/18/2019 - Meeting of Champion - Miami Beach</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>04/18/2019 - Meeting of Champion - Miami Beach</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-03 13:46:22', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(7, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello test test, A new trip has beed added by Eric Coordinator <br />\n<b>04/18/2019 - Meeting of Champion - Miami Beach</b>', 'Hello test test, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/7\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-03 13:46:22', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(8, 102, 0, 1, 'Sent', 'Jerome Samuels just added the trip: <b>04/17/2019 - Miami, Fl - Hall of Champions</b>', 'Hello Jerome Samuels, Thankyou! for adding the trip <b>04/17/2019 - Miami, Fl - Hall of Champions</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-03 15:39:10', '99.169.153.172', 'US', 'Florida <br> Miami , 33133'),
(8, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello test test, A new trip has beed added by Jerome Samuels <br />\n<b>04/17/2019 - Miami, Fl - Hall of Champions</b>', 'Hello test test, A new trip request is added by Jerome Samuels. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/8\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-03 15:39:10', '99.169.153.172', 'US', 'Florida <br> Miami , 33133'),
(8, 4, 5, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 04/17/2019 - Miami, Fl - Hall of Champions', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-03 15:44:40', '99.169.153.172', 'US', 'Florida <br> Miami , 33133'),
(8, 102, 5, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Jerome Samuels, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-03 15:44:40', '99.169.153.172', 'US', 'Florida <br> Miami , 33133'),
(9, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>05/01/2019 - MLS Championship</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>05/01/2019 - MLS Championship</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-05 08:27:05', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(9, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Nelson Gil, A new trip has beed added by Eric Coordinator <br />\n<b>05/01/2019 - MLS Championship</b>', 'Hello Nelson Gil, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/9\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-05 08:27:05', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(9, 4, 6, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 05/01/2019 - MLS Championship', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-05 08:29:33', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(9, 3, 6, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-05 08:29:33', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(9, 3, 6, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-05 08:30:52', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(9, 4, 6, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-05 08:30:52', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(1, 3, 3, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-05 12:05:01', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(1, 4, 3, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-05 12:05:01', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(10, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>test-8/4-test</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>test-8/4-test</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-08 11:46:28', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(10, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello test test, A new trip has beed added by Eric Coordinator <br />\n<b>test-8/4-test</b>', 'Hello test test, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/10\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-08 11:46:28', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>8-4-2019-test-3 nigts</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>8-4-2019-test-3 nigts</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-08 11:47:41', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello test test, A new trip has beed added by Eric Coordinator <br />\n<b>8-4-2019-test-3 nigts</b>', 'Hello test test, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/11\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-08 11:47:41', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>04/24/2019 - Miami Championship Game</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>04/24/2019 - Miami Championship Game</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-08 12:09:08', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(12, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>04/24/2019 - Miami Championship Game</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/12\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-08 12:09:08', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(12, 4, 7, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 04/24/2019 - Miami Championship Game', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-08 12:10:18', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 3, 7, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-08 12:10:18', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(13, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>05/24/2019 - Miami Fl</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>05/24/2019 - Miami Fl</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-08 12:16:54', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(13, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>05/24/2019 - Miami Fl</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/13\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-08 12:16:54', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(13, 4, 8, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 05/24/2019 - Miami Fl', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-08 12:27:36', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(13, 3, 8, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-08 12:27:36', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(13, 3, 8, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-08 12:28:57', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(13, 4, 8, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-08 12:28:57', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(7, 4, 9, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 04/18/2019 - Meeting of Champion - Miami Beach', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-08 14:11:16', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(7, 3, 9, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-08 14:11:16', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(7, 3, 9, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-08 14:19:02', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(7, 4, 9, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-08 14:19:02', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(1, 3, 3, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-08 14:45:48', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(1, 4, 3, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-08 14:45:48', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 3, 7, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-08 15:15:44', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 4, 7, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-08 15:15:44', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(3, 4, 10, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on test3-4/3-5nights', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 05:01:51', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(3, 3, 10, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 05:01:51', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(3, 3, 10, 7, 'Accept', 'Coordinator has accepted this bid', 'Thank you! for accepting this bid, we\'d like to serve you best.', 'Thankyou for Accepting Bid', '..', '2019-04-09 10:29:22', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(3, 4, 10, 8, 'Accepted', 'Hotel Manager Eric Manager\'s Bid has beed accepted', 'Congratulations! Your Bid has been accepted by travel coordinator Eric Coordinator', 'Congratulations! Your Bid has been accepted', '..', '2019-04-09 10:29:22', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 4, 11, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 8-4-2019-test-3 nigts', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 10:43:26', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 3, 11, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 10:43:26', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 4, 12, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 8-4-2019-test-3 nigts', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 10:43:30', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(11, 3, 12, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 10:43:30', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 3, 12, 5, 'Decline', 'Coordinator has declined this Bid', 'You\'ve declined the bid ...', 'Declined Bid', 'Budget too low', '2019-04-09 10:44:10', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(12, 4, 12, 6, 'Declined', 'Your Bid has beed declined by the coordinator.', 'Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.', 'Bid has beed declined', 'Budget too low', '2019-04-09 10:44:10', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(6, 4, 13, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on 4/3/2019-test-2019', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 13:06:10', '203.194.99.244', 'IN', 'Maharashtra <br> Malad , 400064'),
(6, 3, 13, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 13:06:10', '203.194.99.244', 'IN', 'Maharashtra <br> Malad , 400064'),
(10, 92, 14, 3, 'Bid Sent', 'Hotel Manager test test sees and send the RFP/Bid on test-8/4-test', 'Thankyou test test for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 13:58:24', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(10, 3, 14, 4, 'Bid Received', 'Coordinator received the bid from test test', 'Hello Eric Coordinator, A new bid is sent by test test on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 13:58:24', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(10, 4, 15, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on test-8/4-test', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-09 13:58:51', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(10, 3, 15, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-09 13:58:51', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(9, 3, 9, 5, 'Decline', 'Coordinator has declined this Bid', 'You\'ve declined the bid ...', 'Declined Bid', 'Budget too low', '2019-04-09 14:14:24', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(9, 4, 9, 6, 'Declined', 'Your Bid has beed declined by the coordinator.', 'Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.', 'Bid has beed declined', 'Budget too low', '2019-04-09 14:14:24', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(9, 3, 9, 5, 'Decline', 'Coordinator has declined this Bid', 'You\'ve declined the bid ...', 'Declined Bid', 'Budget too low', '2019-04-09 14:14:30', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(9, 4, 9, 6, 'Declined', 'Your Bid has beed declined by the coordinator.', 'Your Bid has beed declined by the coordinator. Thank you for you efforts keep bidding with us.', 'Bid has beed declined', 'Budget too low', '2019-04-09 14:14:30', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(14, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>test-11-4</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>test-11-4</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-11 07:54:14', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(14, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>test-11-4</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/14\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-11 07:54:14', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(15, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>xcvb</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>xcvb</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-11 10:43:05', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(15, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>xcvb</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/15\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-11 10:43:05', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(15, 4, 15, 3, 'Bid Sent', 'Hotel Manager Eric Manager sees and send the RFP/Bid on xcvb', 'Thankyou Eric Manager for sending your proposal you will get another notification if your bid is accepted/rejected by the coordinator', 'Thankyou! for Submitting your Bid', '..', '2019-04-12 01:01:03', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(15, 3, 15, 4, 'Bid Received', 'Coordinator received the bid from Eric Manager', 'Hello Eric Coordinator, A new bid is sent by Eric Manager on your trip: {trip_name}. you can click here for review.  ', 'A new bid received on your trip: {trip_name}', '..', '2019-04-12 01:01:03', '73.179.237.188', 'US', 'Florida <br> Miami , 33175'),
(16, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>trip-12/4/2019</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>trip-12/4/2019</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 06:15:37', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(16, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>trip-12/4/2019</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/16\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 06:15:37', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(20, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>test_guest</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>test_guest</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 06:50:33', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(20, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>test_guest</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/20\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 06:50:33', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(23, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>10/24/19-trip-5 nights</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>10/24/19-trip-5 nights</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 08:50:50', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(23, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>10/24/19-trip-5 nights</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/23\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 08:50:50', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(24, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>trip-test-trip</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>trip-test-trip</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 08:53:53', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(24, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>trip-test-trip</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/24\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 08:53:53', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(25, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>gfhg</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>gfhg</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 09:05:38', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(25, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>gfhg</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/25\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 09:05:38', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(26, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>dzsdf</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>dzsdf</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 09:19:23', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(26, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>dzsdf</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/26\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 09:19:23', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(27, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>ddfs</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>ddfs</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 09:28:09', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(27, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>ddfs</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/27\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 09:28:09', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(42, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>dfhj,</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>dfhj,</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 10:36:57', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(42, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>dfhj,</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/42\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 10:36:57', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(43, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>sefsefdf</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>sefsefdf</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-12 11:11:52', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(43, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>sefsefdf</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/43\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-12 11:11:52', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(44, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>13/4/2019-test</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>13/4/2019-test</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-13 07:16:36', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(44, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>13/4/2019-test</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/44\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-13 07:16:36', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(45, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>13/4/2019-test-5nights</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>13/4/2019-test-5nights</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-13 07:26:04', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(45, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>13/4/2019-test-5nights</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/45\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-13 07:26:04', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(46, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>nhsfjsshf</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>nhsfjsshf</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-13 08:45:06', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(46, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>nhsfjsshf</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/46\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-13 08:45:06', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(47, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>nhsfjsshf</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>nhsfjsshf</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-13 08:45:15', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(47, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>nhsfjsshf</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/47\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-13 08:45:15', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(48, 3, 0, 1, 'Sent', 'Eric Coordinator just added the trip: <b>trip2345</b>', 'Hello Eric Coordinator, Thankyou! for adding the trip <b>trip2345</b>.. our hotel managers will contact you shortly. \r\n<a href=\"http://13.92.240.159/demo/public/\">Click here to view details</a>', 'Thankyou! for Adding Trip', '..', '2019-04-13 09:16:59', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960'),
(48, 0, 0, 2, 'Pending Review', 'all managers received the notification about the new trip Hello Hotel Manager, A new trip has beed added by Eric Coordinator <br />\n<b>trip2345</b>', 'Hello Hotel Manager, A new trip request is added by Eric Coordinator. you can click <a href=\"http://13.92.240.159/demo/public/hotelmanager/trips/48\">here</a> for submitting your proposal.', 'A New Trip Added ', '..', '2019-04-13 09:16:59', '13.92.240.159', 'US', 'Virginia <br> Prospect , 23960');

-- --------------------------------------------------------

--
-- Table structure for table `user_trips`
--

CREATE TABLE `user_trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_by` int(10) UNSIGNED NOT NULL,
  `trip_name` varchar(256) NOT NULL,
  `from_address_1` varchar(256) NOT NULL,
  `from_city` varchar(100) NOT NULL,
  `from_state_id` varchar(255) NOT NULL,
  `from_zip` varchar(10) NOT NULL,
  `to_address_1` varchar(256) NOT NULL,
  `to_city` varchar(256) NOT NULL,
  `to_state_id` int(10) UNSIGNED NOT NULL,
  `to_zip` varchar(10) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `budget_from` int(11) NOT NULL,
  `budget_to` int(11) NOT NULL,
  `double_queen_qty` tinyint(4) NOT NULL,
  `double_king_qty` tinyint(4) NOT NULL,
  `amenity_ids` varchar(256) NOT NULL,
  `comment` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `invoice_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_trips`
--

INSERT INTO `user_trips` (`id`, `entry_by`, `trip_name`, `from_address_1`, `from_city`, `from_state_id`, `from_zip`, `to_address_1`, `to_city`, `to_state_id`, `to_zip`, `check_in`, `check_out`, `budget_from`, `budget_to`, `double_queen_qty`, `double_king_qty`, `amenity_ids`, `comment`, `added`, `status`, `invoice_status`) VALUES
(1, 3, 'test-4-3-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', 'City Center', 'Miami-Dade County', '43423', '', '', 0, '', '04/16/2019', '05/15/2019', 70, 370, 4, 17, '', 'test', '2019-04-03 11:24:17', 6, 0),
(2, 3, 'test2-4/3', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', 'South Beach', 'Miami-Dade County', '45345', '', '', 0, '', '04/15/2019', '05/07/2019', 70, 350, 3, 15, '', 'test', '2019-04-03 11:24:56', 6, 0),
(3, 3, 'test3-4/3-5nights', 'Miami Beach Marina, Alton Road, Miami Beach, FL, USA', 'South Beach', 'Miami-Dade County', '53454', '', '', 0, '', '04/15/2019', '05/14/2019', 70, 350, 4, 22, '', 'test', '2019-04-03 11:25:43', 6, 0),
(4, 3, 'test4-4/3/-19', 'Miami Beach, FL, USA', 'Kendall', 'Florida', '88888', '', '', 0, '', '04/17/2019', '05/16/2019', 70, 350, 19, 29, '', 'test', '2019-04-03 11:26:41', 6, 0),
(5, 3, '4/32019-8nights-test', 'Maison Grande Condominium, Collins Avenue, Miami Beach, FL, USA', 'Miami Beach', 'Florida', '33140', '', '', 0, '', '04/22/2019', '05/15/2019', 70, 350, 21, 22, '', 'test', '2019-04-03 11:27:36', 6, 0),
(6, 3, '4/3/2019-test-2019', 'Miami Beach International Hostel, Collins Avenue, Miami Beach, FL, USA', 'South Beach', 'Miami-Dade County', '34345', '', '', 0, '', '04/16/2019', '05/13/2019', 70, 350, 4, 21, '', 'test', '2019-04-03 11:50:24', 6, 0),
(7, 3, '04/18/2019 - Meeting of Champion - Miami Beach', '525 Collins Avenue, Miami Beach, FL, USA', 'South Beach', 'Miami-Dade County', '33196', '', '', 0, '', '04/04/2019', '04/11/2019', 70, 350, 3, 5, '', 'test', '2019-04-03 13:46:19', 6, 0),
(8, 102, '04/17/2019 - Miami, Fl - Hall of Champions', '5857 Collins Avenue, Miami Beach, FL, USA', 'Mid-Beach', 'Miami-Dade County', '33196', '', '', 0, '', '04/17/2019', '04/26/2019', 70, 350, 3, 5, '', 'Nothing missed', '2019-04-03 15:39:09', 6, 0),
(9, 3, '05/01/2019 - MLS Championship', '58 Collins Avenue, Miami Beach, FL, USA', 'Miami Beach', 'Florida', '33139', '', '', 0, '', '04/12/2019', '04/26/2019', 70, 350, 2, 4, '', '', '2019-04-05 08:26:46', 6, 0),
(10, 3, 'test-8/4-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', 'City Center', 'Miami-Dade County', '3456', '1991 Northwest 27th Avenue, Miami, FL, USA', 'Miami', 0, '33125', '04/16/2019', '05/17/2019', 70, 350, 3, 5, '', 'test', '2019-04-08 11:46:05', 6, 0),
(11, 3, '8-4-2019-test-3 nigts', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', 'City Center', 'Miami-Dade County', '43567', '', '', 0, '', '04/03/2019', '05/01/2019', 70, 410, 49, 63, '', 'test', '2019-04-08 11:47:18', 6, 0),
(12, 3, '04/24/2019 - Miami Championship Game', '7544 Southwest 157th Court, Miami, FL, USA', 'Miami', 'Florida', '33196', '', '', 0, '', '04/10/2019', '04/17/2019', 70, 320, 4, 5, '', 'Awesome', '2019-04-08 12:08:43', 6, 0),
(13, 3, '05/24/2019 - Miami Fl', '16956 Northwest 55th Avenue, Miami Gardens, FL, USA', 'Miami Gardens', 'Florida', '33196', '', '', 0, '', '04/10/2019', '04/17/2019', 70, 350, 2, 4, '', '', '2019-04-08 12:16:19', 6, 0),
(14, 3, 'test-11-4', 'Mia\'s Brooklyn Bakery, Smith Street, Brooklyn, NY, USA', 'Boerum Hill', 'Kings County', '1111', '', '', 0, '', '04/08/2019', '06/07/2019', 70, 350, 4, 5, '', 'testt', '2019-04-11 07:54:13', 6, 0),
(15, 3, 'xcvb', 'BCBGeneration, Meridian Avenue, Miami Beach, FL, USA', 'City Center', 'Miami-Dade County', '43534', '', '', 0, '', '07/18/2019', '08/13/2019', 70, 350, 5, 5, '', 'test', '2019-04-11 10:43:04', 6, 0),
(16, 3, 'trip-12/4/2019', 'Miami Shores, FL, USA', 'miami', 'ME Maine', '33344', '', '', 0, '', '04/23/2019', '05/22/2019', 70, 350, 4, 3, '', 'test', '2019-04-12 06:15:00', 0, 0),
(17, 3, 'test_guest', 'XCVI Shop, South Hope Avenue, Santa Barbara, CA, USA', 'North State', 'Santa Barbara County', '43587', '', '', 0, '', '04/22/2019', '05/17/2019', 70, 350, 4, 22, '', 'test', '2019-04-12 06:47:44', 0, 0),
(18, 3, 'test_guest', 'XCVI Shop, South Hope Avenue, Santa Barbara, CA, USA', 'North State', 'Santa Barbara County', '43587', '', '', 0, '', '04/22/2019', '05/17/2019', 70, 350, 4, 22, '', 'test', '2019-04-12 06:48:12', 0, 0),
(19, 3, 'test_guest', 'XCVI Shop, South Hope Avenue, Santa Barbara, CA, USA', 'North State', 'Santa Barbara County', '43587', '', '', 0, '', '04/22/2019', '05/17/2019', 70, 350, 4, 22, '', 'test', '2019-04-12 06:48:49', 0, 0),
(20, 3, 'test_guest', 'XCVI Shop, South Hope Avenue, Santa Barbara, CA, USA', 'North State', 'Santa Barbara County', '43587', '', '', 0, '', '04/22/2019', '05/17/2019', 70, 350, 4, 22, '', 'test', '2019-04-12 06:50:07', 0, 0),
(21, 3, '10/24/19-trip-5 nights', 'dfgd, Piedecuesta, Santander, Colombia', 'Mid-Beach', 'Miami-Dade County', '33344', '', '', 0, '', '04/15/2019', '05/14/2019', 70, 430, 25, 28, '', 'test', '2019-04-12 08:46:51', 0, 0),
(22, 3, '10/24/19-trip-5 nights', 'dfgd, Piedecuesta, Santander, Colombia', 'Mid-Beach', 'Miami-Dade County', '33344', '', '', 0, '', '04/15/2019', '05/14/2019', 70, 430, 25, 28, '', 'test', '2019-04-12 08:47:26', 0, 0),
(23, 3, '10/24/19-trip-5 nights', 'dfgd, Piedecuesta, Santander, Colombia', 'Mid-Beach', 'Miami-Dade County', '33344', '', '', 0, '', '04/15/2019', '05/14/2019', 70, 430, 25, 28, '', 'test', '2019-04-12 08:50:22', 0, 0),
(24, 3, 'trip-test-trip', 'Miami Gardens, FL, USA', 'Mid-Beach', 'Miami-Dade County', '3456', '', '', 0, '', '04/23/2019', '05/21/2019', 70, 350, 4, 24, '', 'test', '2019-04-12 08:53:25', 0, 0),
(25, 3, 'gfhg', 'GFHD Surgical Associates, Shore Road, Somers Point, NJ, USA', 'South Beach', 'Miami-Dade County', '11111', '', '', 0, '', '04/23/2019', '05/24/2019', 70, 350, 4, 26, '', 'testt', '2019-04-12 09:05:11', 0, 0),
(26, 3, 'dzsdf', 'DFS Designs, Northwest 41st Street, Doral, FL, USA', 'miami', 'ME Maine', '33344', '', '', 0, '', '04/08/2019', '05/05/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 09:18:56', 0, 0),
(27, 3, 'ddfs', 'dfsdff, Ulitsa Sovetskaya, Tambov, Russia', 'Tambov', 'Tambovskaya oblast\'', '34256', '', '', 0, '', '04/16/2019', '05/20/2019', 70, 350, 3, 4, '', 'test', '2019-04-12 09:27:42', 0, 0),
(28, 3, 'fdgdfgd', 'MiaGola Caffè Torino - Via Bogino, Via Giambattista Bogino, Turin, Metropolitan City of Turin, Italy', 'Torino', 'Città Metropolitana di Torino', '34567', '', '', 0, '', '04/22/2019', '05/23/2019', 70, 350, 4, 10, '', 'testt', '2019-04-12 10:02:48', 0, 0),
(29, 3, 'fdgdfgd', 'MiaGola Caffè Torino - Via Bogino, Via Giambattista Bogino, Turin, Metropolitan City of Turin, Italy', 'Torino', 'Città Metropolitana di Torino', '34567', '', '', 0, '', '04/22/2019', '05/23/2019', 70, 350, 4, 10, '', 'testt', '2019-04-12 10:07:25', 0, 0),
(30, 3, 'fdgdfgd', 'MiaGola Caffè Torino - Via Bogino, Via Giambattista Bogino, Turin, Metropolitan City of Turin, Italy', 'Torino', 'Città Metropolitana di Torino', '34567', '', '', 0, '', '04/22/2019', '05/23/2019', 70, 350, 4, 10, '', 'testt', '2019-04-12 10:11:54', 0, 0),
(31, 3, 'dfsdf', 'Mirandela 9, Bogota, Colombia', 'Suba', 'Bogotá', '34567', '', '', 0, '', '04/16/2019', '05/12/2019', 70, 350, 4, 21, '', 'test', '2019-04-12 10:13:19', 0, 0),
(32, 3, 'dfsdf', 'Mirandela 9, Bogota, Colombia', 'Suba', 'Bogotá', '34567', '', '', 0, '', '04/16/2019', '05/12/2019', 70, 350, 4, 21, '', 'test', '2019-04-12 10:16:37', 0, 0),
(33, 3, 'dfsdf', 'Mirandela 9, Bogota, Colombia', 'Suba', 'Bogotá', '34567', '', '', 0, '', '04/16/2019', '05/12/2019', 70, 350, 4, 21, '', 'test', '2019-04-12 10:18:26', 0, 0),
(34, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:21:17', 0, 0),
(35, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:25:57', 0, 0),
(36, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:28:17', 0, 0),
(37, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:31:09', 0, 0),
(38, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:32:42', 0, 0),
(39, 3, 'sfg', 'DICK\'S Sporting Goods, Biscayne Boulevard, Aventura, FL, USA', 'Aventura', 'Florida', '2456', '', '', 0, '', '04/15/2019', '05/08/2019', 70, 350, 3, 5, '', 'test', '2019-04-12 10:33:31', 0, 0),
(40, 3, 'dfhj,', 'DSF4 - Amazon Distribution Center, Beecher Street, San Leandro, CA, USA', 'San Leandro', 'California', '94577', '', '', 0, '', '04/16/2019', '05/15/2019', 70, 350, 4, 4, '', 'test', '2019-04-12 10:34:12', 0, 0),
(41, 3, 'dfhj,', 'DSF4 - Amazon Distribution Center, Beecher Street, San Leandro, CA, USA', 'San Leandro', 'California', '94577', '', '', 0, '', '04/16/2019', '05/15/2019', 70, 350, 4, 4, '', 'test', '2019-04-12 10:35:05', 0, 0),
(42, 3, 'dfhj,', 'DSF4 - Amazon Distribution Center, Beecher Street, San Leandro, CA, USA', 'San Leandro', 'California', '94577', '', '', 0, '', '04/16/2019', '05/15/2019', 70, 350, 4, 4, '', 'test', '2019-04-12 10:36:10', 0, 0),
(43, 3, 'sefsefdf', 'Testa Rosa Motors, Southwest 67th Avenue, Miami, FL, USA', 'Miami', 'Florida', '2345', '', '', 0, '', '04/09/2019', '05/15/2019', 70, 350, 13, 20, '', 'test', '2019-04-12 11:11:26', 0, 0),
(44, 3, '13/4/2019-test', 'Miami Beach Convention Center, Convention Center Drive, Miami Beach, FL, USA', 'City Center', 'Miami-Dade County', '34567', '', '', 0, '', '04/23/2019', '05/23/2019', 70, 350, 4, 25, '', 'test', '2019-04-13 07:15:49', 0, 0),
(45, 3, '13/4/2019-test-5nights', 'Michigan Avenue, Miami Beach, FL, USA', 'Miami Beach', 'Florida', '23456', '', '', 0, '', '04/23/2019', '05/25/2019', 70, 350, 4, 22, '', 'test', '2019-04-13 07:25:20', 0, 0),
(46, 3, 'nhsfjsshf', 'DSFederal Inc, Research Boulevard, Rockville, MD, USA', 'Rockville', 'Montgomery County', '2346', '', '', 0, '', '04/15/2019', '05/23/2019', 70, 350, 3, 18, '', 'test', '2019-04-13 08:44:43', 0, 0),
(47, 3, 'nhsfjsshf', 'DSFederal Inc, Research Boulevard, Rockville, MD, USA', 'Rockville', 'Montgomery County', '2346', '', '', 0, '', '04/15/2019', '05/23/2019', 70, 350, 3, 18, '', 'test', '2019-04-13 08:44:52', 0, 0),
(48, 3, 'trip2345', 'Dollar Financial Group, Forum Place, West Palm Beach, FL, USA', 'West Palm Beach', 'Florida', '33401', '', '', 0, '', '04/22/2019', '05/27/2019', 70, 350, 4, 18, '', 'test', '2019-04-13 09:16:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_trips2`
--

CREATE TABLE `user_trips2` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_by` int(10) UNSIGNED NOT NULL,
  `trip_name` varchar(256) NOT NULL,
  `from_address_1` varchar(256) NOT NULL,
  `from_city` varchar(100) NOT NULL,
  `from_state_id` int(10) UNSIGNED NOT NULL,
  `from_zip` varchar(10) NOT NULL,
  `to_address_1` varchar(256) NOT NULL,
  `to_city` varchar(256) NOT NULL,
  `to_state_id` int(10) UNSIGNED NOT NULL,
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
-- Dumping data for table `user_trips2`
--

INSERT INTO `user_trips2` (`id`, `entry_by`, `trip_name`, `from_address_1`, `from_city`, `from_state_id`, `from_zip`, `to_address_1`, `to_city`, `to_state_id`, `to_zip`, `check_in`, `check_out`, `budget_from`, `budget_to`, `double_queen_qty`, `double_king_qty`, `amenity_ids`, `comment`, `added`, `status`) VALUES
(1, 33, 'Basketball tournament', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2018-12-26', '2019-01-29', 120, 580, 2, 1, '', '', '2018-12-26 20:11:23', 0),
(3, 33, 'Basketball tournament', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2018-12-26', '2018-12-29', 120, 500, 2, 2, '', '', '2018-12-26 20:12:26', 0),
(7, 33, 'baseball championship', '7801 NW 37th St', 'Doral', 10, '33165', '', '', 0, '', '2018-12-29', '2018-12-31', 20, 380, 3, 4, '', '', '2018-12-26 20:14:52', 0),
(8, 33, 'Basketball tournament', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2018-12-26', '2018-12-29', 20, 450, 3, 3, '', '', '2018-12-26 20:47:48', 0),
(9, 33, 'Eric Gil', '7801 NW 37th St', 'Doral', 10, '33165', '', '', 0, '', '2018-12-26', '2018-12-30', 60, 450, 1, 2, '', '', '2018-12-26 20:48:34', 0),
(10, 5, 'World Series', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2018-12-26', '2019-01-04', 20, 490, 3, 2, '', 'Testing commnets', '2018-12-26 21:11:46', 0),
(11, 33, 'football championship', '7801 nw 37 st', 'Koliganek', 2, '99576', '', '', 0, '', '2018-12-26', '2018-12-31', 20, 450, 1, 2, '', '', '2018-12-26 21:51:59', 0),
(12, 5, 'World Series', '1260 Security Rd', 'Hagerstown', 21, '21742-4159', '', '', 0, '', '0000-00-00', '0000-00-00', 500, 2500, 2, 1, '3', 'test', '2018-12-24 14:43:15', 0),
(13, 5, 'World Series', '16956 SW 92 St', 'miami', 10, '33196', '', '', 0, '', '2019-01-01', '2019-01-04', 20, 450, 1, 2, '', 'test', '2018-12-31 17:33:47', 0),
(14, 5, 'World Series', '16956 SW 92 St', 'miami', 10, '33196', '', '', 0, '', '2019-01-02', '2019-02-08', 20, 450, 3, 4, '', 'test', '2019-01-01 18:15:48', 0),
(15, 5, 'Western Conference', '16956 SW 92 St', 'miami', 10, '33196', '', '', 0, '', '2019-01-02', '2019-01-12', 20, 450, 2, 2, '', 'test', '2019-01-01 18:32:27', 0),
(16, 0, 'Senior Trip', '16956 SW 92', 'Miami', 10, '33196`', '', '', 0, '', '2019-01-05', '2019-01-12', 20, 450, 4, 3, '', 'test', '2019-01-01 18:33:37', 0),
(17, 5, 'Western World Series', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2019-01-12', '2019-01-19', 20, 450, 5, 6, '', 'test', '2019-01-01 18:38:07', 0),
(18, 36, 'Western Finals', '16956 SW 92 St', 'Miami', 10, '33196', '', '', 0, '', '2019-01-04', '2019-01-11', 20, 450, 2, 3, '', 'test', '2019-01-01 18:39:22', 0),
(19, 36, 'John  Doe', '1260 Security Rd', 'Hagerstown', 21, '21742-4159', '', '', 0, '', '2019-01-18', '2019-01-27', 20, 450, 4, 4, '', 'Test', '2019-01-03 04:21:35', 0),
(20, 36, 'John  Doe', '1260 Security Rd', 'Hagerstown', 21, '21742-4159', '', '', 0, '', '2019-01-26', '2019-01-28', 20, 450, 2, 3, '', 'test', '2019-01-03 16:31:14', 0),
(21, 36, 'John  Doe', '1260 Security Rd', 'Hagerstown', 21, '21742-4159', '', '', 0, '', '2019-01-26', '2019-02-19', 20, 450, 3, 2, '', 'test', '2019-01-03 16:50:13', 0),
(22, 36, 'World Series Miami', '1689 NW 72 Ave', 'miami', 10, '33196', '', '', 0, '', '2019-01-18', '2019-02-05', 20, 320, 4, 5, '', 'Testing Reception to Corporate', '2019-01-07 20:35:18', 0),
(23, 37, 'Trip to Europe', 'Location 1', 'City 1', 45, '40100', '', '', 0, '', '2019-01-13', '2019-02-12', 110, 670, 2, 2, '', 'No Thanks', '2019-01-09 10:35:45', 0),
(24, 40, 'Trip to Europe', 'Location 1', 'City 1', 46, '40100', '', '', 0, '', '2019-01-12', '2019-01-18', 10, 450, 1, 1, '', 'asdsadsa', '2019-01-09 10:45:42', 0),
(25, 40, 'Trip To Brooklyn', '42 Ocean Street', 'New York', 33, '11201', '', '', 0, '', '2019-01-13', '2019-02-13', 10, 300, 2, 4, '', 'No Extra Comments', '2019-01-10 11:35:25', 0),
(26, 40, 'Test Trip', 'Test Adress', 'Test City', 46, '40100', '', '', 0, '', '2019-01-20', '2019-02-21', 160, 650, 3, 4, '', '123123123', '2019-01-10 12:28:35', 0),
(27, 37, 'jolly', 'london', 'london', 2, '12345', '', '', 0, '', '2019-02-18', '2019-02-25', 20, 450, 3, 3, '', 'test', '2019-02-12 05:31:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corporate_user`
--
ALTER TABLE `corporate_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_amenities`
--
ALTER TABLE `hotel_amenities`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfps`
--
ALTER TABLE `rfps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfps2`
--
ALTER TABLE `rfps2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomlistings`
--
ALTER TABLE `roomlistings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_qty`
--
ALTER TABLE `room_qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `tb_forms`
--
ALTER TABLE `tb_forms`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `tb_groups`
--
ALTER TABLE `tb_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tb_groups_access`
--
ALTER TABLE `tb_groups_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`auditID`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tb_module`
--
ALTER TABLE `tb_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `tb_restapi`
--
ALTER TABLE `tb_restapi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_amenities`
--
ALTER TABLE `trip_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_statuses`
--
ALTER TABLE `trip_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_trips`
--
ALTER TABLE `user_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_trips2`
--
ALTER TABLE `user_trips2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corporate_user`
--
ALTER TABLE `corporate_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hotel_amenities`
--
ALTER TABLE `hotel_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `h_amenity_pivot`
--
ALTER TABLE `h_amenity_pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rfps`
--
ALTER TABLE `rfps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rfps2`
--
ALTER TABLE `rfps2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roomlistings`
--
ALTER TABLE `roomlistings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `room_qty`
--
ALTER TABLE `room_qty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_forms`
--
ALTER TABLE `tb_forms`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_groups`
--
ALTER TABLE `tb_groups`
  MODIFY `group_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_groups_access`
--
ALTER TABLE `tb_groups_access`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `auditID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_module`
--
ALTER TABLE `tb_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_restapi`
--
ALTER TABLE `tb_restapi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip_amenities`
--
ALTER TABLE `trip_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `trip_statuses`
--
ALTER TABLE `trip_statuses`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_trips`
--
ALTER TABLE `user_trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_trips2`
--
ALTER TABLE `user_trips2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
