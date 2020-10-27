-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2020 at 02:57 PM
-- Server version: 5.7.31-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-13+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptask`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_credentials`
--

CREATE TABLE `admin_user_credentials` (
  `admin_user_id` int(11) NOT NULL,
  `admin_user_name` varchar(255) NOT NULL,
  `admin_user_email` varchar(255) NOT NULL,
  `admin_user_pwd` varchar(255) NOT NULL,
  `admi_user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_credentials`
--

INSERT INTO `admin_user_credentials` (`admin_user_id`, `admin_user_name`, `admin_user_email`, `admin_user_pwd`, `admi_user_created`) VALUES
(1, 'admin', 'admin@yopmail.com', '21232f297a57a5a743894a0e4a801fc3', '2020-10-27 04:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_no` varchar(150) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_latitude` varchar(100) NOT NULL,
  `user_longitude` varchar(100) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0 - active , 1 - deleted user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `user_email`, `user_phone_no`, `user_gender`, `user_latitude`, `user_longitude`, `user_created`, `user_modified`, `user_deleted`) VALUES
(1, 'Radha', 'radha@yopmail.com', '9876543213', 'male', '18.78997', '19.88787', '2020-10-26 19:17:49', NULL, 0),
(2, 'Radha', 'sradha@yopmail.com', '9876543213', 'male', '18.78997', '19.88787', '2020-10-26 19:24:15', NULL, 0),
(3, 'Mukil', 'radhamukil@yopmail.com', '9876543217', 'male', '18.234325', '87.23436', '2020-10-26 19:31:20', '2020-10-27 09:08:37', 0),
(4, 'Prithivi', 'prithivi@yopmail.com', '9876543214', 'male', '18.98989', '76.989998', '2020-10-26 19:35:10', NULL, 0),
(5, 'Puvi', 'ruadha@yopmail.com', '9876543214', 'male', '19.7788', '76.98798', '2020-10-26 19:37:41', '2020-10-27 09:06:38', 0),
(6, 'Jeni', 'jeni@yopmail.com', '9876543212', 'female', '18.234323', '87.23434', '2020-10-26 19:39:41', '2020-10-27 09:05:46', 0),
(7, 'Vicky', 'vicky@yopmail.com', '7896543213', 'female', '18.78997', '87.23434', '2020-10-27 09:10:43', NULL, 0),
(8, 'vinoth', 'radha23@yopmail.com', '9876598763', 'male', '12.123123', '78.234', '2020-10-27 09:23:24', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user_credentials`
--
ALTER TABLE `admin_user_credentials`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
