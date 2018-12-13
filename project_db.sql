-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 06:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital_table`
--

CREATE TABLE `hospital_table` (
  `id` int(11) NOT NULL,
  `hospital_id` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `hospital_phone` varchar(255) NOT NULL,
  `hospital_admin_phone` varchar(255) NOT NULL,
  `hospital_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_table`
--

INSERT INTO `hospital_table` (`id`, `hospital_id`, `hospital_name`, `hospital_address`, `hospital_phone`, `hospital_admin_phone`, `hospital_img`) VALUES
(10, '1101', 'Radium Diagnostic Center', 'Shib-Bari, Joydebpur Gazipur', '02 9263797', '', ''),
(11, '1102', 'Orient Diagnostics', 'Joydebpur, Gazipur', '23432423', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'patient',
  `hospital_id` varchar(255) DEFAULT NULL,
  `is_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `firstname`, `lastname`, `email`, `phone`, `user_name`, `password`, `position`, `hospital_id`, `is_deleted`) VALUES
(1, 'Faisal', 'Hossain', 'faisal@xfaisal.com', 0, 'a', '1', 'sadmin', NULL, NULL),
(4, 'Faisal', 'Ahamed', 'sdfg@gmail.com', 0, 'b', '1', 'hadmin', NULL, NULL),
(5, 'sdf', 'sdfg', 'ab@c.com', 1234, '', '1', 'patient', NULL, NULL),
(6, 'sdf', 'a', 'a@g.com', 1234, '', '1', 'patient', NULL, NULL),
(7, 'a', 'a', 'kana@k.com', 1, 'c', '1', 'patient', NULL, NULL),
(8, 'a', 'a', 'a@d.com', 123456, 'd', 'd', 'patient', NULL, NULL),
(9, 'Hoapital', 'Admin', 'hospital@admin.com', 12345, 'ha', '1', 'patient', NULL, NULL),
(10, 'z', 'sdfg', 'sdfg@gmail.co', 567456, 's', 's', 'patient', '1101', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital_table`
--
ALTER TABLE `hospital_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital_table`
--
ALTER TABLE `hospital_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
