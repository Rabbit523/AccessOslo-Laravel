-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 08:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accessoslo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts_cars`
--

CREATE TABLE `aircrafts_cars` (
  `id` mediumint(9) NOT NULL,
  `partner_name` varchar(30) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aircrafts_cars`
--

INSERT INTO `aircrafts_cars` (`id`, `partner_name`, `type`, `capacity`, `created_at`, `updated_at`, `img`) VALUES
(1, 'Royal Jet Group', 'Challenger 300 Sirius', '4', '2018-04-26 17:57:41', '2018-05-04 00:05:29', 'http://localhost/assets/uploads/aircrafts/y9sk08VFA3clmIgVWFdM4pKLzchHdAzmnhSyLoni.png'),
(13, 'Fly Emirates', 'Challenger 350', '15', '2018-04-26 18:00:11', '2018-05-03 22:34:27', 'http://localhost/assets/uploads/aircrafts/lw8MV7Gi2oyFLAU2Fd6yyl8QGiWU4JN81MIy2xqi.jpeg'),
(14, 'Arab Emirates', 'Challenger 300', '6', '2018-04-26 18:02:15', '2018-05-03 22:38:53', '/assets/uploads/aircrafts/QLTFL69xO8vtWHnYBokNKTajxZZ7dX5QX1IQFDDk.jpeg'),
(15, 'Royal Jet Group', 'Challenger 350', '10', '2018-04-26 18:10:11', '2018-04-27 13:15:31', 'http://yuri.accessoslo.no/assets/uploads/aircrafts/O9xkMhbfOCrrGbXN9f4Vt1xSLNjyZKC2JyMSTQL5.jpeg'),
(43, 'Royal Jet Group', 'Challenger 300', '5', '2018-04-26 19:28:50', '2018-04-27 13:26:19', 'http://yuri.accessoslo.no/assets/uploads/aircrafts/W7OZVBGERhImZEdo83MF5Zl0xAwfL6A6wIRPArcc.jpeg'),
(64, 'Royal Jet Group', 'Challenger 300 Sirius', '13', '2018-04-27 09:13:07', '2018-04-27 13:26:48', 'http://yuri.accessoslo.no/assets/uploads/aircrafts/kBPjc2HOY4TxBV3GjStnuKf6J1XtYvQkoheEQAVm.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts_images`
--

CREATE TABLE `aircrafts_images` (
  `id` mediumint(9) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `parent_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aircrafts_images`
--

INSERT INTO `aircrafts_images` (`id`, `url`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/1MhKJZyfUYkogFwxJBxfd6E1ADrIZ0F7zATBDzOm.png', '2018-04-27 07:29:47', '2018-04-27 07:29:47', '1'),
(33, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/ry0jOQ6dIxcY3rMKUiY4LhA80EqjmlQyjophdxkj.png', '2018-04-27 07:29:55', '2018-04-27 07:29:55', '1'),
(34, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/XpoZotoJH1H54kP0MTQJ73EB6jVwozpbS4GnHm2H.jpeg', '2018-04-27 09:13:13', '2018-04-27 09:13:13', '64'),
(36, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/YwX8pGFZDCfTW2MjU2YBOSZJJmF4SkWD07NSsEvF.jpeg', '2018-04-27 12:50:53', '2018-04-27 12:50:53', '1'),
(37, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/YrU3XSzApMrlFJSbs9VMRPAYKmsxj3T2Dpyfcvkr.jpeg', '2018-04-27 13:13:58', '2018-04-27 13:13:58', '14'),
(38, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/DKsMqXsZLf4TeVpdb2k8pGKzsxRpsNi82rX25Owq.png', '2018-04-27 13:14:08', '2018-04-27 13:14:08', '15'),
(39, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/eEqI1OymiRuyZ2GiI1PyN0YTOTzEzwk1zX0LOxQQ.png', '2018-04-27 13:14:43', '2018-04-27 13:14:43', '43'),
(40, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/1ezpGAmZT8cJRy75oZRgBjxchaQjqchyfHTD141C.png', '2018-04-27 13:15:15', '2018-04-27 13:15:15', '14'),
(41, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/O9xkMhbfOCrrGbXN9f4Vt1xSLNjyZKC2JyMSTQL5.jpeg', '2018-04-27 13:15:31', '2018-04-27 13:15:31', '15'),
(42, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/JEXe9eeVzfGKbgt6dMpjAQVlf8qXULu5MeBT7dP1.jpeg', '2018-04-27 13:25:15', '2018-04-27 13:25:15', '43'),
(43, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/W7OZVBGERhImZEdo83MF5Zl0xAwfL6A6wIRPArcc.jpeg', '2018-04-27 13:26:16', '2018-04-27 13:26:16', '43'),
(44, 'http://yuri.accessoslo.no/assets/uploads/aircrafts/kBPjc2HOY4TxBV3GjStnuKf6J1XtYvQkoheEQAVm.jpeg', '2018-04-27 13:26:43', '2018-04-27 13:26:43', '64'),
(45, 'http://localhost/assets/uploads/aircrafts/xW06irdsr3k9Nh78cXMhBv614d1BAW9LLoURxb9J.jpeg', '2018-05-03 22:33:01', '2018-05-03 22:33:01', '1'),
(46, 'http://localhost/assets/uploads/aircrafts/wljhhpCLUIM0AWjfWpvnt5eUdt30p8OWXmJwBNzO.jpeg', '2018-05-03 22:33:49', '2018-05-03 22:33:49', '1'),
(47, 'http://localhost/assets/uploads/aircrafts/lw8MV7Gi2oyFLAU2Fd6yyl8QGiWU4JN81MIy2xqi.jpeg', '2018-05-03 22:34:27', '2018-05-03 22:34:27', '13'),
(48, 'http://localhost/assets/uploads/aircrafts/QLTFL69xO8vtWHnYBokNKTajxZZ7dX5QX1IQFDDk.jpeg', '2018-05-03 22:38:53', '2018-05-03 22:38:53', '14'),
(49, 'http://localhost/assets/uploads/aircrafts/y9sk08VFA3clmIgVWFdM4pKLzchHdAzmnhSyLoni.png', '2018-05-04 00:05:30', '2018-05-04 00:05:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `airpassenger_tax`
--

CREATE TABLE `airpassenger_tax` (
  `id` mediumint(9) NOT NULL,
  `company` varchar(30) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `approx_no` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airpassenger_tax`
--

INSERT INTO `airpassenger_tax` (`id`, `company`, `country`, `contact_person`, `phone`, `email`, `approx_no`, `created_at`, `updated_at`, `is_added`, `member_notice`) VALUES
(1, 'Olive', 'British', 'Yuri Ivanov', '3293939932', 'asd@123.com', '12', '2018-04-11 18:01:44', '2018-04-11 18:01:44', 0, 0),
(2, 'Fantasylab', 'Norway', 'Nohman Janjua', '38383821', 'nohman@123.com', '332', '2018-04-11 18:03:44', '2018-04-11 18:03:44', 0, 0),
(3, 'Olive', 'Russia', 'alex', '338392', 'alex@123.com', '2', '2018-04-11 18:07:56', '2018-04-11 18:07:56', 0, 0),
(4, 'asd', 'Spain', 'asd', '123213', 'ads@123.com', '213', '2018-04-11 18:08:30', '2018-04-11 18:08:30', 0, 0),
(5, 'asd', 'Sweden', 'asd', '398212', 'asd@12.com', '322', '2018-04-11 18:10:38', '2018-04-11 18:10:38', 0, 0),
(14, 'Olive', 'Russia', 'alexandra', '39382', '32@32.com', '3211', '2018-04-11 18:39:29', '2018-04-11 18:39:29', 0, 0),
(21, 'FantasyLab', 'Norway', 'Farhood Reclies', '393838292', 'Farhood@rec.com', '322', '2018-04-12 14:52:18', '2018-04-24 09:50:26', 0, 0),
(22, 'FantasyLab', 'Norway', 'Yuri Ivanov', '+4745494649', 'yuiiwanov523@gmail.com', '222', '2018-06-09 04:57:47', '2018-06-09 06:17:06', 0, 1),
(23, 'FantasyLab', 'Norway', 'Yuri Ivanov', '+4745494649', 'yuiiwanov523@gmail.com', '222', '2018-06-09 04:59:36', '2018-06-09 06:17:06', 0, 1),
(24, 'Olive', 'Norway', 'Yuri Ivanov', '+4740612345', 'yuiiwanov523@gmail.com', '222', '2018-06-09 05:00:12', '2018-06-09 06:17:06', 0, 1),
(25, 'FantasyLab', 'Norway', 'Yuri Ivanov', '+4740612345', 'yuiiwanov523@gmail.com', '2222', '2018-06-09 05:01:11', '2018-06-09 06:17:06', 0, 1),
(26, 'Olive', 'Russian Federation', 'Yuri Ivanov', '+4740612345', 'yuiiwanov523@gmail.com', '33', '2018-06-10 04:40:25', '2018-06-10 05:20:30', 0, 1),
(27, 'FantasyLab', 'Norway', 'Nohman Janjua', '+4740612345', 'yuiiwanov523@gmail.com', '222', '2018-06-10 04:42:01', '2018-06-10 05:20:30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_cargo`
--

CREATE TABLE `booking_cargo` (
  `id` mediumint(9) NOT NULL,
  `company` varchar(30) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cargo_type` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_danger` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `depth` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_charters`
--

CREATE TABLE `booking_charters` (
  `id` mediumint(9) NOT NULL,
  `booking_type` varchar(30) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `flight_type` varchar(255) NOT NULL,
  `travellers` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `member_notice` int(11) DEFAULT '0',
  `bonus` float DEFAULT '0',
  `currency` varchar(255) DEFAULT 'EUR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_charters`
--

INSERT INTO `booking_charters` (`id`, `booking_type`, `departure`, `destination`, `contact_person`, `date`, `flight_type`, `travellers`, `created_at`, `updated_at`, `status`, `phone`, `email`, `company`, `is_added`, `total_cost`, `aircraft`, `partner_name`, `member_notice`, `bonus`, `currency`) VALUES
(74, 'executive', 'Oslo', 'Paris', 'Tom Cruise', '31/08/2018', 'One Way', 'Evelyn M. Laird', '2018-08-24 06:17:31', '2018-08-24 07:58:35', 'paid', '+4740612345', 'user@mail.com', 'WIE', 0, '822.78', 'Challenger 300 Sirius', 'Royal Jet Group', 0, 0, 'EUR');

-- --------------------------------------------------------

--
-- Table structure for table `booking_emptyleg`
--

CREATE TABLE `booking_emptyleg` (
  `id` mediumint(9) NOT NULL,
  `partner_name` varchar(30) NOT NULL,
  `flight_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_limousine`
--

CREATE TABLE `booking_limousine` (
  `id` mediumint(9) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type_car` varchar(255) NOT NULL,
  `type_flight` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `zone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_limousine`
--

INSERT INTO `booking_limousine` (`id`, `contact_person`, `phone`, `email`, `company`, `date`, `type_car`, `type_flight`, `from_address`, `to_address`, `comments`, `created_at`, `updated_at`, `status`, `is_added`, `total_cost`, `partner_name`, `aircraft`, `member_notice`, `zone`) VALUES
(36, 'Nohman Janjua', '+4740612345', 'user@mail.com', 'Fantasylab', '08/30/2018', 'Viano', 'One Way', 'Gardermoen, Norway', 'Asker, Norway', 'wowowo', '2018-08-24 04:46:36', '2018-08-24 05:02:36', 'paid', 1, 227, NULL, NULL, 1, 'OsloToOSL');

-- --------------------------------------------------------

--
-- Table structure for table `booking_meet`
--

CREATE TABLE `booking_meet` (
  `id` mediumint(9) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `flight_number` varchar(255) NOT NULL,
  `airline` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `luggage` varchar(255) NOT NULL,
  `travelers` varchar(255) NOT NULL,
  `booking_reference` varchar(255) NOT NULL,
  `meet_service` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `departure_time` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `connect_flight_number` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `total_cost` float DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_travels`
--

CREATE TABLE `booking_travels` (
  `id` mediumint(9) NOT NULL,
  `travel_type` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `total_cost` float DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `charters`
--

CREATE TABLE `charters` (
  `id` mediumint(9) NOT NULL,
  `author` varchar(30) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estimate_cost` varchar(255) NOT NULL,
  `additional_fee` varchar(255) NOT NULL,
  `total_cost` varchar(255) NOT NULL,
  `charter_type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `charter_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charters`
--

INSERT INTO `charters` (`id`, `author`, `contact_person`, `email`, `estimate_cost`, `additional_fee`, `total_cost`, `charter_type`, `created_at`, `updated_at`, `aircraft`, `charter_id`) VALUES
(78, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '1996', '23', '2261.28', 'group charter', '2018-06-09 13:05:01', '2018-06-09 14:37:26', 'Challenger 300 Sirius', '38'),
(79, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '22', '22', '49.28', 'group charter', '2018-06-09 13:09:15', '2018-06-09 13:09:15', 'Challenger 350', '35'),
(80, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '11', '11', '24.64', 'group charter', '2018-06-09 13:09:52', '2018-06-09 13:09:52', 'Challenger 300 Sirius', '36'),
(81, 'Alexander Alanda', 'JohnSmi Kort', 'john@21.com', '22', '55', '86.24', 'group charter', '2018-06-09 13:10:19', '2018-06-09 13:10:19', 'Challenger 300', '26'),
(82, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '31', '31', '69.44', 'executive charter', '2018-06-09 13:16:08', '2018-06-09 13:16:08', 'Challenger 300 Sirius', '37'),
(83, 'Alexander Alanda', 'Ellena Barasova', 'ellena@barasova.com', '22', '22', '49.28', 'executive charter', '2018-06-09 13:16:52', '2018-06-09 13:16:52', 'Challenger 300', '25'),
(84, 'Alexander Alanda', 'Leo Luzin', 'leo23@luzin.com', '132', '444', '645.12', 'executive charter', '2018-06-09 13:17:15', '2018-06-09 13:17:15', 'Challenger 300', '30'),
(85, 'Alexander Alanda', 'Nohman Janjua', 'user@mail.com', '33', '55', '67.86', 'executive charter', '2018-06-09 13:19:50', '2018-06-09 13:19:50', 'Challenger 350', '11'),
(86, 'Alexander Alanda', 'Nohman Janjua', 'user@mail.com', '4000', '4000', '8927.1', 'executive charter', '2018-06-09 13:20:22', '2018-08-19 13:36:25', 'Challenger 300', '32'),
(87, 'Alexander Alanda', 'Yuri Ivanov', 'yuri@mail.ru', '333', '333', '745.92', 'helicopter charter', '2018-06-09 13:41:35', '2018-06-09 13:41:35', 'Challenger 300', '2'),
(88, 'Alexander Alanda', 'Yuri Ivanov', 'user@mail.com', '444', '111', '621.6', 'helicopter charter', '2018-06-09 13:41:57', '2018-06-09 13:42:10', 'Challenger 300', '9'),
(89, 'Alexander Alanda', 'Johnhatan Kery', 'john@21.com', '123', '321', '497.28', 'helicopter charter', '2018-06-09 13:46:27', '2018-06-09 13:46:27', 'Challenger 300', '27'),
(90, 'Alexander Alanda', 'Nohman Janjua', 'yuiiwanov523@gmail.com', '474', '345', '917.28', 'cargo charter', '2018-06-09 14:02:07', '2018-06-09 14:02:07', 'Challenger 350', '15'),
(91, 'Alexander Alanda', 'Alexay Yudin', 'alexay@123.com', '999', '111', '1243.2', 'cargo charter', '2018-06-09 14:13:15', '2018-06-09 14:13:15', 'Challenger 350', '14'),
(92, 'Alexander Alanda', 'Vitaly Voronina', 'user@mail.com', '23', '523', '578.62', 'meet charter', '2018-06-09 14:21:18', '2018-06-09 14:21:18', 'Challenger 300 Sirius', '4'),
(93, 'Alexander Alanda', 'Nohman Janjua', 'user@mail.com', '333', '333', '713.02', 'meet charter', '2018-06-09 14:22:01', '2018-06-09 14:25:31', 'Challenger 300', '1'),
(94, 'Alexander Alanda', 'Nikolay Muravyov', 'user@mail.com', '13', '232', '241.49999999999997', 'limousine transport', '2018-06-09 15:00:25', '2018-06-09 15:00:25', 'Challenger 300 Sirius', '27'),
(95, 'Alexander Alanda', 'Yuri Ivanov', 'user@mail.com', '415', '425', '907.9', 'limousine transport', '2018-06-09 15:03:42', '2018-06-09 15:03:42', 'Challenger 300 Sirius', '26'),
(96, 'Alexander Alanda', 'Nohman Janjua', 'user@mail.com', '332', '221', '586.46', 'handling request', '2018-06-09 15:18:56', '2018-06-09 15:18:56', 'Challenger 350', '7'),
(97, 'Alexander Alanda', 'Nohman Janjua', 'nohman@janjua.net', '22', '222', '273.28', 'destination oslo', '2018-06-09 20:18:44', '2018-06-09 20:18:44', 'Challenger 300 Sirius', '20'),
(98, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '23', '523', '611.52', 'destination oslo', '2018-06-09 20:19:46', '2018-06-09 20:19:46', 'Challenger 300 Sirius', '25'),
(99, 'Alexander Alanda', 'Yuri Ivanov', 'yuri@123.com', '227', '727', '1068.48', 'destination oslo', '2018-06-09 20:23:29', '2018-06-09 20:23:29', 'Challenger 300', '1'),
(100, 'Alexander Alanda', 'Yuri Ivanov', 'yuiiwanov523@gmail.com', '676', '343', '1141.28', 'event and group', '2018-06-09 20:31:43', '2018-06-09 20:31:43', 'Challenger 300 Sirius', '26'),
(101, 'Alexander Alanda', 'Natalia Panas', 'natalia@mail.com', '321', '321', '719.04', 'event and group', '2018-06-10 01:57:09', '2018-06-10 01:57:09', 'Challenger 300 Sirius', '12'),
(102, 'Alexander Alanda', 'Ihbrahimobic Zulatan', 'Ibrahimobic@mail.com', '555', '3211', '4217.92', 'event and group', '2018-06-10 02:01:12', '2018-06-10 02:01:12', 'Challenger 300 Sirius', '14'),
(103, 'Alexander Alanda', 'Nohman Janjua', 'yuiiwanov523@gmail.com', '2321', '22', '2624.16', 'handling request', '2018-06-10 05:17:45', '2018-06-10 05:17:45', 'Challenger 300', '15'),
(104, 'Alexander Alanda', 'Tom Cruise', 'user@mail.com', '532', '231', '822.1', 'executive charter', '2018-08-24 07:00:29', '2018-08-24 07:10:38', 'Challenger 300 Sirius', '74');

-- --------------------------------------------------------

--
-- Table structure for table `handling_request`
--

CREATE TABLE `handling_request` (
  `id` mediumint(9) NOT NULL,
  `airport` varchar(30) NOT NULL,
  `company` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `crew_config1` varchar(255) NOT NULL,
  `crew_config2` varchar(255) NOT NULL,
  `flight_type` varchar(255) NOT NULL,
  `hotac` varchar(255) NOT NULL,
  `catering` varchar(255) NOT NULL,
  `person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inbound_flight` varchar(255) NOT NULL,
  `inbound_date` varchar(255) NOT NULL,
  `inbound_orig` varchar(255) NOT NULL,
  `inbound_captain` varchar(255) NOT NULL,
  `inbound_utc` varchar(255) NOT NULL,
  `inbound_pax` varchar(255) NOT NULL,
  `outbound_flight` varchar(255) NOT NULL,
  `outbound_date` varchar(255) NOT NULL,
  `outbound_orig` varchar(255) NOT NULL,
  `outbound_captain` varchar(255) NOT NULL,
  `outbound_utc` varchar(255) NOT NULL,
  `outbound_pax` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `handling_request`
--

INSERT INTO `handling_request` (`id`, `airport`, `company`, `aircraft`, `crew_config1`, `crew_config2`, `flight_type`, `hotac`, `catering`, `person`, `phone`, `fax`, `email`, `inbound_flight`, `inbound_date`, `inbound_orig`, `inbound_captain`, `inbound_utc`, `inbound_pax`, `outbound_flight`, `outbound_date`, `outbound_orig`, `outbound_captain`, `outbound_utc`, `outbound_pax`, `comments`, `created_at`, `updated_at`, `status`, `is_added`, `total_cost`, `partner_name`, `member_notice`) VALUES
(7, 'Oslo', 'FantasyLab', 'Challenger 350', 'crew1', 'crew2', 'private', 'yes', 'no', 'Nohman Janjua', '47 343939', 'fax', 'user@mail.com', 'DF 498JSO', '04/18/2018', 'orig', 'Nohman Janjua', 'sta', 'pax', 'DF489JSO', '04/25/2018', 'dest', 'Nohman Janjua', 'std', 'pax', '', '2018-04-12 16:15:52', '2018-06-11 03:32:05', 'paid', 0, '553', 'Fly Emirates', 0),
(9, 'Vladivostok', 'Olive', 'Chanllenger300', 'cre1', 'cr2', 'comercial', 'no', 'no', 'Yuri Ivanov', '+73232321234', 'asd', 'asd@123.com', 'DF392JSO', '04/19/2018', 'asd', 'Yuri Ivanov', 'asd', 'ew', 'DF489JSO', '04/30/2018', 'asd', 'Yuri Ivanov', 'asd', 'we', 'wdq', '2018-04-14 12:14:50', '2018-04-24 09:50:17', 'paid', 0, NULL, NULL, 0),
(15, 'Oslo Gadmon', 'FantasyLab', 'Challenger 300', '123', '123', 'comercial', 'no', 'yes', 'Nohman Janjua', '+4745494649', '123', 'yuiiwanov523@gmail.com', '123', '06/20/2018', '123', '123', '123', '123', '123', '06/19/2018', '123', '123', '123', '123', '123123123', '2018-06-10 05:11:21', '2018-06-12 15:06:14', 'sent', 0, '2624.16', 'Arab Emirates', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` mediumint(9) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `page_title_plain` varchar(255) NOT NULL,
  `extra_content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_content`, `author`, `published_date`, `status`, `meta_title`, `meta_description`, `banner_img`, `created_at`, `updated_at`, `page_title_plain`, `extra_content`) VALUES
(1, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">PASSENGER AIRCRAFT CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><h1><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/air-charter/passenger-charter\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p></h1>', 'Alexander Alanda', '2018.04.20 04:05:02pm', 'published', 'Access Oslo | Passenger Aircraft Charter', '', '/assets/uploads/pages/25ccfr3JnGZ4ROZaydS27mpbUXAQpqkfGKaDZiZO.png', '2018-04-20 13:23:25', '2018-06-11 14:19:52', 'PASSENGER AIRCRAFT CHARTER', NULL),
(2, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">EXECUTIVE CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">EXPERIENCE THE LUXURY AND EFFECTIVENESS OF PRIVATE AIR TRAVEL</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost-effective aircraft charter service that matches your needs.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>', 'Alexander Alanda', '2018.04.20 04:03:53pm', 'published', 'Access Oslo | Executive Charter', '', 'http://yuri.accessoslo.no/assets/uploads/pages/78JgnE9Doh77DjY5Xf3iPlL9QfpgMI4fRQ5OyqRV.jpeg', '2018-04-11 18:01:44', '2018-06-11 14:19:25', 'EXECUTIVE CHARTER', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">WHY CHARTER AN AIRCRAFT?</h3><h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(95, 96, 98); font-size: 16px; text-transform: none;\"><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Point-to-Point Travel</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Fly when you want to fly</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Land at airports closer to your destination</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Save valuable time – Avoid lengthy check-in process</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Privacy - Get the entire aircraft to yourselves – or share it with friends and colleagues</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Enjoy personal privacy – work or relaxation</li></ul></h3>'),
(3, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">GROUP CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">EXPERIENCE THE LUXURY AND EFFECTIVENESS OF PRIVATE AIR TRAVEL</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>', 'Alexander Alanda', '2018.04.20 04:06:32pm', 'published', 'Access Oslo | Group Charter', '', 'http://yuri.accessoslo.no/assets/uploads/pages/uenIVgYnkqevU1x1tPfXdbVhHAzqz0Bs9qnOJ3NZ.jpeg', '2018-04-11 18:01:44', '2018-06-11 14:19:03', 'GROUP CHARTER', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">WHY CHARTER AN AIRCRAFT?</h3><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(95, 96, 98);\"><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Point-to-Point Travel</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Fly when you want to fly</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Land at airports closer to your destination</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Save valuable time – Avoid lengthy check-in process</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Privacy - Get the entire aircraft to yourselves – or share it with friends and colleagues</li><li style=\"display: block; font-family: Gotham-book; font-size: 12px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 10px;\">Enjoy personal privacy – work or relaxation</li></ul>'),
(4, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">CARGO &amp; SPECIAL CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">NEED TO LAND OUTSIDE AN AIRFIELD?</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\">Helicopter is a fast, safe and efficient tool for transport. Helicopter suits best for 1-6 passengers</span>&nbsp;<br><br>We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to rofessional pilots keeping in mind the safety aspect.&nbsp;<br><br>Fly away to your cabin, go hunting or just for sightseeing? We have a solution for your need. Our partners operate safe, single and twin engine turbine helicopters with experienced crew onboard. Making sure you have a safe journey.&nbsp;<br><br>Please&nbsp;<a href=\"\" style=\"color: rgb(194, 152, 52);\">contact us</a>&nbsp;for a free quote.</p>', 'Alexander Alanda', '2018.06.11 01:50:51pm', 'published', 'Access Oslo | Cargo &amp; Special Charter', '', '', '2018-04-11 18:01:44', '2018-06-11 14:17:44', 'CARGO & SPECIAL CHARTER', NULL),
(5, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">HELICOPTER CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">NEED TO LAND OUTSIDE AN AIRFIELD?</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Helicopter is a fast, safe and efficient tool for transport. Helicopter suits best for 1-6 passengers</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to rofessional pilots keeping in mind the safety aspect.&nbsp;<br><br>Fly away to your cabin, go hunting or just for sightseeing? We have a solution for your need. Our partners operate safe, single and twin engine turbine helicopters with experienced crew onboard. Making sure you have a safe journey.&nbsp;<br><br>Please&nbsp;<a href=\"http://localhost/air-charter/helicopter-charter\" style=\"color: rgb(194, 152, 52);\">contact</a>&nbsp;us for a free quote.</p>', 'Alexander Alanda', '2018.06.11 01:57:26pm', 'published', 'Access Oslo | Helicopter Charter', '', '', '2018-04-11 18:01:44', '2018-06-11 14:18:30', 'HELICOPTER CHARTER', NULL),
(6, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">MEET &amp; GREET</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 20px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</span>', 'Alexander Alanda', '2018.06.11 02:07:16pm', 'published', 'Access Oslo | Meet &amp; Greet', '', '', '2018-04-11 18:01:44', '2018-06-11 14:09:52', 'MEET & GREET', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;\">MEET &amp; GREET AIRPORT SERVICE</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Our mission is to make the experience at the airport as easy, efficient and stress free for the customer as possible.&nbsp;<br><br>The service is available at departure, arrival and when connecting flights at Oslo Airport.</span></p><h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;\">MEET &amp; GREET - CHECK-IN</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\">Be greeted by our Concierge when you arrive at the airport, and get personalized service with the check-in process and your luggage.</p><h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;\">MEET &amp; GREET - DEPARTURE</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\">Be greeted by our Concierge when you arrive at the airport.&nbsp;<br><br>We meet you at the entrance door, and escort you all the way through the airport and out to the gate where your flight departs from.</p><h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;\">MEET &amp; GREET - TRANSFER</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\">Be greeted by our Concierge when you arrive at OSL.&nbsp;<br><br>We will meet you at the gate, and escort you all the way through the airport and out to the new gate where your next flight departs from.If you need to go through check-in again, or you need to drop off your bag, we will ofcourse assist you with this.</p><h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;\">MEET &amp; GREET - ARRIVAL</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\">Be greeted by our Concierge when you arrive at OSL. Our Concierge will meet you at the gate and escort you to the arrival hall and out of the terminal building. We also assist with the retrieval of your luggage from the baggage belts​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​.</p>'),
(7, '<h1 style=\"text-align: center; font-size: 45px; font-family: Gotham-Book; text-transform: uppercase;\"><span style=\"color: rgb(255, 255, 255);\">LIMOUSINE TRANSPORT</span></h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; text-transform: uppercase;\">WE CAN PICK YOU UP</h3><h4 style=\"font-family: Gotham; color: rgb(108, 108, 108); margin-bottom: 20px;\">Wherever you are - we can pick you up in our BMW-7 series, Mercedes S-class or Mercedes Viano executive.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Safe, smooth and on time VIP-transport wen you need it. Just give us a call, send in information by the form below or drop us an email.&nbsp;<br><br>We are here for you 24/7.</p>', 'Alexander Alanda', '2018.06.11 02:15:34pm', 'published', 'Access Oslo | Limousine Transport', '', '', '2018-04-11 18:01:44', '2018-06-11 14:16:13', 'LIMOUSINE TRANSPORT', NULL),
(8, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">HANDLING&nbsp;<br>REQUEST</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</span>', 'Alexander Alanda', '2018.06.11 02:25:22pm', 'published', 'Access Oslo | Handling Request', '', '', '2018-04-11 18:01:44', '2018-06-11 14:28:34', 'HANDLING REQUEST', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; text-transform: uppercase;\">OPERATIONS CONTACT</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Access Oslo AS</span></p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Headquarters:&nbsp;</span><br>Hans Gaarders Veg, 2060&nbsp;<br>Gardermoen, Norway</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Post Address:&nbsp;</span><br>PO Box 34&nbsp;<br>Snarøya, Norway&nbsp;<br></p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Phone:&nbsp;</span><br>H24 +47 91 222 999</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">General Inquiries:&nbsp;</span><br>contact@accessoslo.com</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; line-height: 24px;\"><span style=\"font-weight: 700;\">Operations:</span>&nbsp;<br>ops@accessoslo.com</p>'),
(9, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 40px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">OSLO</span>&nbsp;FBO (OSL/ENGM)</h1>', '<h2 style=\"font-family: Gotham; color: rgb(95, 96, 98); background-color: rgb(248, 246, 240);\">DRIVING DIRECTIONS FOR OSLO AIRPORT</h2><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); background-color: rgb(248, 246, 240);\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi. This is just a dummy tekst.</h3><p style=\"color: rgb(95, 96, 98); background-color: rgb(248, 246, 240);\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>', 'Alexander Alanda', '2018.06.11 02:22:20pm', 'published', 'Access Oslo | Oslo FBO (OSL/ENGM)', '', '', '2018-04-11 18:01:44', '2018-06-11 20:50:20', 'OSLO FBO (OSL/ENGM)', NULL),
(10, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 35px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">SANDEFJORD</span>FBO (TRF/ENTO)</h1>', '<h2 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; text-transform: uppercase;\">DRIVING DIRECTIONS FOR OSLO AIRPORT</h2><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); font-size: 15px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi. This is just a dummy tekst.</h3><p style=\"font-family: Gotham-book; font-size: 12px; color: rgb(95, 96, 98); line-height: 24px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>', 'Alexander Alanda', '2018.06.11 08:46:59pm', 'published', 'Access Oslo | Sandefjord FBO', '', '', '2018-04-11 18:01:44', '2018-06-11 20:50:41', 'SANDEFJORDFBO (TRF/ENTO)', NULL),
(11, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 40px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">FBO</span>SERVICES</h1>', 'FBO SERVICES', 'Alexander Alanda', '2018.06.11 08:57:05pm', 'published', 'Access Oslo | FBO Services', '', '', '2018-04-11 18:01:44', '2018-06-11 20:57:29', 'FBOSERVICES', NULL),
(12, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">SUPERVISION</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/fbo/supervision\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p>', 'Alexander Alanda', '2018.06.11 09:03:48pm', 'published', 'Access Oslo | Supervision', '', '', '2018-04-11 18:01:44', '2018-06-11 21:03:48', 'SUPERVISION', NULL),
(13, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">VIP CARTERING</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/fbo/vip-catering\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p>', 'Alexander Alanda', '2018.06.11 09:03:55pm', 'published', 'Access Oslo | Vip Catering', '', '', '2018-04-11 18:01:44', '2018-06-11 21:04:15', 'VIP CARTERING', NULL),
(14, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">AIR PASSENGER TAX</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</span>', 'Alexander Alanda', '2018.06.11 09:07:13pm', 'published', 'Access Oslo | Air Passenger Tax', '', '', '2018-04-11 18:01:44', '2018-06-11 21:19:05', 'AIR PASSENGER TAX', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; text-transform: uppercase;\">NORWEGIAN AIR PASSENGER TAX</h3><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">From 1st of June 2016, the Norwegian government implemented a mandatory&nbsp;<span class=\"tax-bold\">Air Passenger Tax</span>&nbsp;on all flights leaving Norwegian airports with passengers.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">As there is only Norwegian companies that are able to report these taxes, all foreign companies are required to sign up with a Norwegian representative.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Access Oslo is registered as a representative by the Tax Administration Norway (Skatteetaten) and we would be happy to handle the tax reporting on your behalf.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">The tax amount is NOK 80 per passenger for departures from Norwegian airports.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">For more information or to register for the Air Passenger Tax please contact us at&nbsp;<a href=\"mailto:accounting@accessoslo.no\">accounting@accessoslo.no</a>&nbsp;or fill out the form on the right side.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">To read the information provided from Tax Administration Norway in detail, please click on the buttons below to be redirected;</p>'),
(15, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">DESTINATION OSLO</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to. Destination Oslo charter</span>', 'Alexander Alanda', '2018.06.11 09:08:48pm', 'published', 'Access Oslo | Destination Oslo', '', '', '2018-04-11 18:01:44', '2018-06-11 21:18:57', 'DESTINATION OSLO', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; text-transform: uppercase;\">WHY CHARTER AN AIRCRAFT?</h3><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(95, 96, 98);\"><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Point-to-Point Travel</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Fly when you want to fly</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Land at airports closer to your destination</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Save valuable time – Avoid lengthy check-in process</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Privacy - Get the entire aircraft to yourselves – or share it with friends and colleagues</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Enjoy personal privacy – work or relaxation</li></ul>'),
(16, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">EVENT &amp; GROUP TRAVEL</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</span>', 'Alexander Alanda', '2018.06.11 09:20:39pm', 'published', 'Access Oslo | Event &amp; Group Travel', '', '', '2018-04-11 18:01:44', '2018-06-11 21:23:37', 'EVENT & GROUP TRAVEL', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 30px; text-transform: uppercase;\">WHY EVENT &amp; GROUP TRAVEL?</h3><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(95, 96, 98);\"><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Point-to-Point Travel</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Fly when you want to fly</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Land at airports closer to your destination</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Save valuable time – Avoid lengthy check-in process</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Privacy - Get the entire aircraft to yourselves – or share it with friends and colleagues</li><li style=\"display: block; font-family: Gotham-book; font-size: 14px; line-height: 20px; position: relative; padding-left: 15px; margin-bottom: 15px;\">Enjoy personal privacy – work or relaxation</li></ul>'),
(17, '<h1 style=\"font-size: 30px; font-family: Gotham-book; color: rgb(97, 72, 14); text-transform: uppercase; border-bottom: 2px solid rgb(255, 255, 255); padding: 20px;\">ACCESS LOYALTY PROGRAM</h1>', 'LOG IN', 'Alexander Alanda', '2018.06.11 09:24:32pm', 'published', 'Access Oslo | Login', '', '', '2018-04-11 18:01:44', '2018-06-11 21:24:32', 'ACCESS LOYALTY PROGRAM', NULL),
(18, '<h1 style=\"margin-top: 0px; font-size: 35px; font-family: Gotham-Book; color: rgb(97, 72, 14); text-transform: uppercase; text-align: center;\">BECOME A MEMBER</h1>', 'SIGN UP', 'Alexander Alanda', '2018.06.11 09:25:18pm', 'published', 'Access Oslo | Sign up', '', '', '2018-04-11 18:01:44', '2018-06-11 21:25:18', 'BECOME A MEMBER', NULL),
(19, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 35px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">GENERAL</span>CONTACT INFORMATION</h1>', 'CONTACT US', 'Alexander Alanda', '2018.06.11 09:26:17pm', 'published', 'Access Oslo | Contact US', '', '', '2018-04-11 18:01:44', '2018-06-11 21:26:17', 'GENERALCONTACT INFORMATION', NULL),
(20, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">WHY US</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/about/why-us\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p>', 'Alexander Alanda', '2018.06.11 09:28:53pm', 'published', 'Access Oslo | Why Us', '', '', '2018-04-11 18:01:44', '2018-06-11 21:30:00', 'WHY US', NULL),
(21, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 35px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">MEET&nbsp;</span>THE DEDICATED TEAM</h1>', '<h2 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 20px; font-size: 24px; text-transform: uppercase;\">THIS IS A H2 TITLE</h2><h4 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 0px; margin-bottom: 20px;\">Lorem ipsum is simply a dummy text of the printing and typeseting industry.</h4><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 30px; margin-bottom: 20px; font-size: 20px;\">Lorem ipsum dolor H3</h3><p class=\"text-justify\" style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 30px; margin-bottom: 20px; font-size: 20px;\">Lorem ipsum dolor H3</h3><p class=\"text-justify\" style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>', 'Alexander Alanda', '2018.06.11 09:30:47pm', 'published', 'Access Oslo | Our Team', '', '', '2018-04-11 18:01:44', '2018-06-11 21:30:47', 'MEET THE DEDICATED TEAM', NULL),
(22, '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">SAFETY</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/about/safety\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p>', 'Alexander Alanda', '2018.06.11 09:31:45pm', 'published', 'Access Oslo | Safety', '', '', '2018-04-11 18:01:44', '2018-06-11 21:31:45', 'SAFETY', NULL),
(23, '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 40px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">PARTNERS</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to read meanwhile we are working on new text. Lorem ipsum dolor sit amet consectetur.</span>', 'Alexander Alanda', '2018.06.11 09:32:28pm', 'published', 'Access Oslo | Our Partners', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-11 21:32:28', 'PARTNERS', NULL),
(24, '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); font-size: 22px; margin-left: 200px;\">Access Oslo News</h3>', 'LASTEST NEWS', 'Alexander Alanda', '2018.06.11 09:35:21pm', 'published', 'Access Oslo | Latest News', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-11 21:35:21', 'Access Oslo News', NULL),
(25, '<span style=\"color: rgb(66, 66, 66);\">Dashboard</span>', '<span style=\"color: rgb(156, 156, 148);\">Dashboard</span>', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | User Dashboard', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:31:37', 'Dashboard', NULL),
(26, '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">UPCOMING REQUESTS</h1>', 'UPCOMING REQUEST', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | Upcoming Request', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:31:49', 'UPCOMING REQUESTS', NULL),
(27, '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">REQUEST HISTORY</h1>', 'REQUEST HISTORY', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | Request History', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:32:08', 'REQUEST HISTORY', NULL),
(29, '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">EMPTY LEG CHARTER FLIGHTS</h1>', 'EMPTY LEG CHARTER FLIGHTS', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | User Emptyleg', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:32:20', 'EMPTY LEG CHARTER FLIGHTS', NULL),
(30, '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">COMPLETE YOUR PROFILE</h1>', 'COMPLETE YOUR PROFILE', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | User Profile', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:32:40', 'COMPLETE YOUR PROFILE', NULL),
(31, '<h1 style=\"margin-left: 80px; font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">ADD NEW PASSENGERS</h1>', 'ADD PASSENGERS', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | User Passengers', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:32:56', 'ADD NEW PASSENGERS', NULL),
(32, '<h1 style=\"margin-left: 80px; font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">MANAGE YOUR ACCOUNT</h1>', 'MANAGE YOUR ACCOUNT', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | User Manage Account', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2018-06-18 12:33:09', 'MANAGE YOUR ACCOUNT', NULL),
(36, '<p>Login&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'Login', 'Alexander Alanda', '2018.06.18 09:16:08am', 'published', 'Access Oslo | Login', 'new page description', '/assets/uploads/pages/K2U4pqkGNEubAfSX3fTCvEDVDmJJFQh7w1FAtTwm.png', '2018-05-17 20:11:45', '2018-06-18 09:16:08', 'Login    ', NULL),
(37, '<p>Sign up&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'Sign up&nbsp; &nbsp;&nbsp;', 'Alexander Alanda', 'saved', 'saved', 'Access Oslo | Sign up', 'new page meta description', '/assets/uploads/pages/Vckp6li0ysJftun7UxBzToyE1wMzxm1qEoMVYjkf.png', '2018-05-17 20:13:04', '2018-06-18 09:21:16', 'Sign up    ', NULL),
(38, '<p>Latest News</p>', '<p>Latest News<br></p>', 'Alexander Alanda', '2018.06.18 09:41:58am', 'published', 'Access Oslo | Latest News', '<p>Latest News</p>', '', '2018-06-18 09:41:40', '2018-06-18 09:48:55', 'Latest News', '<p><br></p>'),
(40, '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">MAKE A NEW REQUEST</h1>', '<p><span style=\"color: rgb(95, 96, 98); font-family: gotham-book; font-size: 14px; font-weight: 600;\">WE LOOK FORWARD TO HAVE YOU ON BOARD.</span><br></p>', 'Alexander Alanda', '2018.06.18 01:06:39pm', 'published', 'Access Oslo | Make New Request', 'new', '', '2018-06-18 12:34:03', '2018-06-18 12:35:18', 'MAKE A NEW REQUEST', '<p><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` mediumint(9) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_audit` varchar(30) NOT NULL,
  `coverage` varchar(255) NOT NULL,
  `average_flight` varchar(255) NOT NULL,
  `operate_since` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `valid` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `post_box` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `user_id`, `partner_name`, `contact_person`, `phone`, `email`, `last_audit`, `coverage`, `average_flight`, `operate_since`, `permission`, `valid`, `created_at`, `updated_at`, `post_box`, `site_url`) VALUES
(1, '84', 'Fly Emirates', 'Yuri Ivanov', '+79990580789', 'yuri@ivanov.com', '05/05/2018', 'coverage', '55', '2004', 'true', 'yes', '2018-04-17 15:50:19', '2018-04-17 15:50:19', '60666, Abu Dhabi, United Arab Emirates', 'www.royaljetgroup.com'),
(2, '85', 'Royal Jet Group', 'Janruis Buffon', '+393123232903', 'buffon@juventus.com', '05/01/2018', '233', '22', '2002', 'false', 'no', '2018-04-17 15:54:18', '2018-04-17 15:54:18', '60666, Abu Dhabi, United Arab Emirates', 'www.royaljetgroup.com'),
(3, '86', 'United Arab Emirates (UAE)', 'Zinedin Zidan', '+33134777079', 'info@royaljetgroup.com', '04/30/2018', '32', '32', '2013', 'true', 'yes', '2018-04-17 15:55:44', '2018-04-17 15:55:44', '60666, Abu Dhabi, United Arab Emirates', 'www.royaljetgroup.com');

-- --------------------------------------------------------

--
-- Table structure for table `partner_rate`
--

CREATE TABLE `partner_rate` (
  `id` mediumint(9) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `total_rate` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `highlight` varchar(255) DEFAULT NULL,
  `atmosphere` varchar(255) DEFAULT NULL,
  `testimonial` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `data_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner_rate`
--

INSERT INTO `partner_rate` (`id`, `partner_name`, `total_rate`, `created_at`, `updated_at`, `highlight`, `atmosphere`, `testimonial`, `customer_name`, `data_id`) VALUES
(4, 'Royal Jet Group', '4.5', '2018-05-23 05:25:52', '2018-05-23 20:03:55', 'wonderful trip', 'perfect!!!', '5', 'Nohman Janjua', '11'),
(7, 'Arab Emirates', '4.5', '2018-05-23 09:19:27', '2018-05-23 21:38:06', 'good', 'good', '4.5', 'Nohman Janjua', '9');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` mediumint(9) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `user_id`, `gender`, `first_name`, `last_name`, `birth`, `nationality`, `created_at`, `updated_at`) VALUES
(2, '35', 'Miss', 'Evelyn', 'M. Laird', '07/29/1993', 'United Kingdom', '2018-04-21 14:30:30', '2018-04-21 14:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` mediumint(9) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `single_img` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_date` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_description`, `meta_title`, `meta_description`, `post_img`, `single_img`, `status`, `author`, `published_date`, `created_at`, `updated_at`) VALUES
(8, 'First Nordic IS-BAH Certified FBO', 'Access Oslo Executive Handling is proud to announce that we have been awarded the prestigious International Standard for Business Aircraft Handling(IS-BAH)certification - the first in the Nordics.', 'First Flight Test Server', 'Did you know Access Oslo Executive handling does initial and recurrent training with NATA\'s safety 1st program?', '', '', 'published', 'Alexander Alanda', '2018.05.02', '2018-05-02 20:08:03', '2018-05-03 22:45:15'),
(12, 'First Nordic IS-BAH Certified FBO', 'Access Oslo Executive Handling is proud to announce that we have been awarded the prestigious International Standard for Business Aircraft Handling(IS-BAH)certification - the first in the Nordics.', 'First Flight Test Server', 'Did you know Access Oslo Executive handling does initial and recurrent training with NATA\'s safety 1st program?', 'http://localhost/assets/uploads/posts/3w9I6pXg73f0LUou9OZsbE4AYPqLXBdOPLUhyLWt.jpeg', 'http://localhost/assets/uploads/posts/pNZKUmf89yDSUyJow1Xk3UVh2U7j6ITL7vZ1fizD.jpeg', 'published', 'Alexander Alanda', '2018.05.03', '2018-05-03 01:22:15', '2018-05-03 01:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` mediumint(9) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `date_birth` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL,
  `business_phone` varchar(30) NOT NULL,
  `mobile_type` varchar(255) NOT NULL,
  `addInfo_address1` varchar(255) NOT NULL,
  `addInfo_address2` varchar(255) NOT NULL,
  `addInfo_city` varchar(255) NOT NULL,
  `addInfo_region` varchar(255) NOT NULL,
  `addInfo_code` varchar(255) NOT NULL,
  `addInfo_country` varchar(255) NOT NULL,
  `billInfo_address1` varchar(255) DEFAULT NULL,
  `billInfo_address2` varchar(255) DEFAULT NULL,
  `billInfo_city` varchar(255) DEFAULT NULL,
  `billInfo_region` varchar(255) DEFAULT NULL,
  `billInfo_code` varchar(255) DEFAULT NULL,
  `billInfo_country` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `date_birth`, `company`, `job`, `home_phone`, `mobile_phone`, `business_phone`, `mobile_type`, `addInfo_address1`, `addInfo_address2`, `addInfo_city`, `addInfo_region`, `addInfo_code`, `addInfo_country`, `billInfo_address1`, `billInfo_address2`, `billInfo_city`, `billInfo_region`, `billInfo_code`, `billInfo_country`, `created_at`, `updated_at`, `gender`, `first_name`, `last_name`, `email`) VALUES
(1, '35', '05/02/2018', 'FantasyLab', 'Desinger', '+4740612345', '+4740612345', '+79990587777', 'apple', 'Norway Oslo', 'Norway Oslo', 'Oslo', 'Oslo', '333333', 'Norway', 'Norway Oslo', 'Norway Oslo', 'Oslo', 'Oslo', '3939393', 'Norway', '2018-04-17 15:26:23', '2018-04-28 20:41:04', 'Mr', 'Nohman', 'Janjua', 'user@mail.com'),
(2, '213', '06/25/1996', 'Olive', 'Developer', '+79990580789', '+79990580789', '+79990580789', 'apple', 'Khabarovsk', 'Khabarovsk', 'Khabarovsk', 'Khabarovsk', '680033', 'Russian Federation', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-12 15:02:05', '2018-06-12 15:02:05', 'Mr', 'Yuri', 'Ivanov', 'yuiiwanov523@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `id` mediumint(9) NOT NULL,
  `user_id` int(50) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `pwd_que1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `pwd_que2` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`id`, `user_id`, `question1`, `pwd_que1`, `question2`, `pwd_que2`, `created_at`, `updated_at`) VALUES
(1, 35, 'question1', 'nohman', 'question2', 'janjua', '2018-04-21 13:54:17', '2018-04-21 13:54:17'),
(2, 35, 'question1', 'nohman', 'question2', 'janjua', '2018-04-21 13:57:57', '2018-04-21 13:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `configuration` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `configuration`, `created_at`, `updated_at`) VALUES
(1, '{\"free_shipping\":true,\"notification_bar\":{\"on\":false,\"message\":\"Great app\"}}', '2018-04-01 00:00:00', '2018-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profile_complete` varchar(20) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `bonus` varchar(255) DEFAULT '0',
  `verification_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `country`, `city`, `email`, `phone`, `password`, `created_at`, `updated_at`, `role_id`, `remember_token`, `gender`, `profile_complete`, `img`, `bonus`, `verification_code`) VALUES
(30, 'Alexander', 'Dakahashi', 'Norway', 'Oslo', 'partner@mail.com', '+819012349324', '$2y$10$yOsHaNQLWVaUOzgSqo3NfuzaF.TnVvgfo1Mb3e24xUnf30Gd8h/oG', '2018-04-10 16:36:29', '2018-04-28 17:25:00', 1, 'O6lCRiPHJDt2IwL46LTYwoOEkw54wvioKbhQU5OmO5NLZCaWAKBfpOGdtK3k', 'Mr', 'false', 'http://yuri.accessoslo.no/assets/uploads/users/u2hDGszLF6przOIQVfIx1NiGdHFqcKapDHB79hf5.jpeg', '0', NULL),
(34, 'Alexander', 'Alanda', 'Russia', 'Khavarobsk', 'admin@mail.com', '+4740612345', '$2y$10$YRsrnECt5cA6HBGoxNd4dO6RQzFQ.KSVRenm6ul2S4s6InLMO4ViS', '2018-04-11 12:01:09', '2018-08-18 12:53:59', 0, 'mZO22EvtrALgR0GcQMTKzVNVmGR83l3sk9bgfdQElSwC3DcKdS2hWsaKJ7Yu', 'Mr', 'false', '/assets/uploads/users/TCEGSymv9o64DQCjjPwuLpDK2VmMLn5FW0buHwtE.jpeg', '0', '735812'),
(35, 'Nohman', 'Janjua', 'Norway', 'Oslo', 'user@mail.com', '11111111111111111', '$2y$10$JGeueJwgHYpSCE4MN0uoIuUZbpWcd1tkptf2mFRWKINrUTyQLXZua', '2018-04-11 12:02:15', '2018-06-09 13:34:36', 2, 'm1YjOwMuKyEguXcmkkEa7MnMdNtTsK6YO7fYpx7n8Cr3hrDM99NvLPChKL69', 'Mr', 'true', '', '329', NULL),
(213, 'Yuri', 'Ivanov', 'Russian Federation', 'Khabarovsk', 'yuiiwanov5213@gmail.com', '+79990580789', '$2y$10$01Id202TpSsbalMG7XZVou/f3BVkNMOha7cSgvdS6PPMx88FUzL7q', '2018-06-12 12:49:35', '2018-06-12 15:02:05', 2, 'ZCjndMnrVT6j7OuCPAIaF9gRpzcd1EgBCAnLyuG4TPm5hHqKyBk8xj2HIn2s', 'Mr', 'true', '', '56', NULL),
(214, 'Roger', 'Ferder', '', '', 'yuiiwanov523@gmail.com', '+4740612345', '$2y$10$SZNrEgVsHpkRHpc8WoZLnO6PMpUUDIXr5v591t5vonQYSPrZTKlDC', '2018-06-13 07:51:06', '2018-06-13 07:51:06', 2, '0kCBxhbKwsuRHNjqYLv4HX17WkCzYBrKj30Wyi7sn7alI99VokCQRvPVfVWE', 'Mr', 'false', '', '0', NULL),
(223, 'Ronaldo', 'Christiano', 'Protugal', 'Lisbon', 'Christiano@gmail.com', '+4745494649', '$2y$10$jHmykhgliGeOQlNJePPlJeSNo1g3AbMOOfvRXYW.AixDiyPOQVEZi', '2018-06-17 16:22:14', '2018-06-17 16:22:39', 2, '', 'Mr', 'false', '', '1', '774766'),
(253, 'Nohman', 'Janjua', '', '', 'nohman@janjua.com', '+4740612345', '$2y$10$Ba5XLWDPwKKe6Y7l4hTyieSQZ.5w2eb.tJv7GwChsvInRkmvd1NlS', '2018-08-23 17:06:49', '2018-08-23 17:06:49', 2, '', NULL, 'false', '', '0', NULL),
(268, 'Nohman', 'Janjua', '', '', 'nohman@janjua.net', '+4740612345', '$2y$10$QpRamUyi21SeZzHk/o6rZOS22hoCFaVs.Wp50kMvkBgJ3TCm9fM1e', '2018-08-24 04:25:58', '2018-08-24 04:25:58', 2, '', NULL, 'false', '', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_emptyleg`
--

CREATE TABLE `user_emptyleg` (
  `id` mediumint(9) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'awaiting',
  `is_added` varchar(255) DEFAULT '1',
  `departure` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `member_notice` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircrafts_cars`
--
ALTER TABLE `aircrafts_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aircrafts_images`
--
ALTER TABLE `aircrafts_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airpassenger_tax`
--
ALTER TABLE `airpassenger_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cargo`
--
ALTER TABLE `booking_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_charters`
--
ALTER TABLE `booking_charters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_emptyleg`
--
ALTER TABLE `booking_emptyleg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_limousine`
--
ALTER TABLE `booking_limousine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_meet`
--
ALTER TABLE `booking_meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_travels`
--
ALTER TABLE `booking_travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charters`
--
ALTER TABLE `charters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `handling_request`
--
ALTER TABLE `handling_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_rate`
--
ALTER TABLE `partner_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_emptyleg`
--
ALTER TABLE `user_emptyleg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircrafts_cars`
--
ALTER TABLE `aircrafts_cars`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `aircrafts_images`
--
ALTER TABLE `aircrafts_images`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `airpassenger_tax`
--
ALTER TABLE `airpassenger_tax`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `booking_cargo`
--
ALTER TABLE `booking_cargo`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_charters`
--
ALTER TABLE `booking_charters`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `booking_emptyleg`
--
ALTER TABLE `booking_emptyleg`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_limousine`
--
ALTER TABLE `booking_limousine`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `booking_meet`
--
ALTER TABLE `booking_meet`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_travels`
--
ALTER TABLE `booking_travels`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charters`
--
ALTER TABLE `charters`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `handling_request`
--
ALTER TABLE `handling_request`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partner_rate`
--
ALTER TABLE `partner_rate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `user_emptyleg`
--
ALTER TABLE `user_emptyleg`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
