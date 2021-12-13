-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 09:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wl_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(255) NOT NULL,
  `whatsapp` int(255) NOT NULL,
  `total_income` int(255) NOT NULL,
  `phone` int(15) NOT NULL DEFAULT '0',
  `real_name` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `facke_name` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `gender` tinyint(2) NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `start_work` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `end_work` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `status` int(10) NOT NULL DEFAULT '0',
  `rate` int(10) NOT NULL DEFAULT '1',
  `pay_way` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `transfer` varchar(255) NOT NULL DEFAULT 'لا يوجد',
  `active_days` int(50) NOT NULL DEFAULT '0',
  `active_hours` int(50) NOT NULL DEFAULT '0',
  `target_sys` varchar(5) NOT NULL DEFAULT 'sys1',
  `target` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL DEFAULT '0',
  `taxes` int(255) NOT NULL DEFAULT '8',
  `bonuses` int(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `id_image1` varchar(255) NOT NULL DEFAULT 'default_id.jpg',
  `id_image2` varchar(255) NOT NULL DEFAULT 'default_id.jpg',
  `additional_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'additional_image.jpg',
  `transfer_image` varchar(255) NOT NULL DEFAULT 'transfer_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `whatsapp`, `total_income`, `phone`, `real_name`, `facke_name`, `gender`, `address`, `start_work`, `end_work`, `status`, `rate`, `pay_way`, `transfer`, `active_days`, `active_hours`, `target_sys`, `target`, `discount`, `taxes`, `bonuses`, `image`, `id_image1`, `id_image2`, `additional_image`, `transfer_image`) VALUES
(1, 4444, 0, 3333, 'معاذ سلوم', '34344', 1, '4444', '12/1/2019', '2/2/2020', 1, 4, '', 'لا يوجد', 0, 0, 'sys1', 'sys1_10000', 0, 8, 0, '904658795865916_image_1.jpg', 'default_id.jpg', 'default_id.jpg', 'add.jpg', 'transfer.jpg'),
(87, 9877777, 0, 962804965, 'عدنان محمود', 'سليم', 1, 'اللاذقية مشقيتا', '', '', 0, 1, '', 'لا يوجد', 0, 0, 'sys1', 'sys1_10000', 0, 8, 0, '87712703837697_image_87.jpg', 'default_id.jpg', 'default_id.jpg', 'add.jpg', 'transfer.jpg'),
(454, 962804965, 0, 962804965, 'محمد الحسين', 'محمد', 1, 'حماة السقيلبية', '1/1/2020', '20/3/2020', 1, 5, 'الهرم', 'لا يوجد', 88, 22322, 'sys2', 'sys2_50000', 2000, 8, 1000, '258917080229861_image_454.jpg', '759127360582427_id1_454.jpg', '304750985994122_id2_454.jpg', '170872791882499_transfer_image_454.jpg', '333196369539708_transfer_image_454.jpg'),
(455, 955555566, 0, 9666666, 'صبحي العبدالله', 'صبحي  صح', 1, '', '', '', 1, 1, '', 'لا يوجد', 0, 0, 'sys2', 'sys2_200000', 0, 8, 0, '678307034306604_image_455.jpg', '320398037292161_id1_455.jpg', 'default_id.jpg', 'add.jpg', 'transfer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
