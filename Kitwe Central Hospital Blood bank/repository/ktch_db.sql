-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 06:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktch_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `donor_id` int(100) NOT NULL,
  `blood_group` text NOT NULL,
  `donation_date` date NOT NULL,
  `results_id` int(11) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `blood_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`donor_id`, `blood_group`, `donation_date`, `results_id`, `quantity`, `blood_id`) VALUES
(22576, 'A+', '2022-01-12', 49, 500, 48),
(22746, 'A+', '2022-09-05', 50, 700, 49),
(22400, 'B+', '2022-05-05', 51, 700, 50),
(22400, 'B+', '2022-09-11', 53, 470, 51),
(22746, 'A+', '2022-09-11', 52, 470, 52);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `id` int(100) NOT NULL,
  `blood_group` text NOT NULL,
  `date` date NOT NULL,
  `quantity` int(100) NOT NULL,
  `operation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`id`, `blood_group`, `date`, `quantity`, `operation`) VALUES
(1, 'A+', '2022-07-25', 470, 'fill'),
(4, 'A+', '2022-08-02', 480, 'dispense'),
(7, 'A+', '2022-08-15', 470, 'fill'),
(8, 'A+', '2022-08-15', 490, 'fill'),
(14, 'A+', '2022-08-24', 500, 'dispense'),
(15, 'A+', '2022-08-24', 1000, 'dispense'),
(17, 'B+', '2022-08-26', 470, 'fill'),
(18, 'B+', '2022-08-26', 1500, 'fill'),
(19, 'B+', '2022-08-26', 100, 'dispense'),
(20, 'B+', '2022-08-26', 20, 'dispense'),
(32, 'B+', '2022-09-11', 470, 'fill');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` varchar(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `first_name`, `last_name`, `gender`, `dob`, `blood_group`, `phone_number`, `weight`, `user_name`, `password`) VALUES
('22400', 'jen ', 'phiri', 'Female', '1993-12-12', 'B+', '+260955338884', 60, 'jen ', 1234),
('22576', 'mathews', 'banda', 'Male', '2022-12-16', 'A+', '+260971813861', 50, 'mat250', 1234),
('22746', 'martha ', 'banda', 'Female', '1998-12-12', 'A+', '+260971813861', 50, 'martha90', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `results_id` int(100) NOT NULL,
  `blood_id` int(100) NOT NULL,
  `Hiv` text NOT NULL,
  `Hepatitis_A` text NOT NULL,
  `Hepatitis_B` text NOT NULL,
  `Hepatitis_C` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`results_id`, `blood_id`, `Hiv`, `Hepatitis_A`, `Hepatitis_B`, `Hepatitis_C`) VALUES
(23, 21, 'Positive', 'Negative', 'Negative', 'Negative'),
(24, 22, 'Negative', 'Negative', 'Negative', 'Negative'),
(25, 23, 'Positive', 'Negative', 'Negative', 'Negative'),
(26, 24, 'Negative', 'Positive', 'Positive', 'Negative'),
(27, 25, 'Positive', 'Positive', 'Positive', 'Positive'),
(28, 26, 'Negative', 'Negative', 'Negative', 'Negative'),
(34, 33, 'Hiv', 'Negative', 'Negative', 'Negative'),
(43, 42, 'Negative', 'Negative', 'Negative', 'Negative'),
(44, 43, 'Negative', 'Negative', 'Negative', 'Negative'),
(45, 44, 'Negative', 'Negative', 'Negative', 'Negative'),
(46, 45, 'Negative', 'Negative', 'Negative', 'Negative'),
(47, 46, 'Negative', 'Negative', 'Negative', 'Negative'),
(48, 47, 'Negative', 'Positive', 'Positive', 'Positive'),
(49, 48, 'Negative', 'Negative', 'Negative', 'Negative'),
(50, 49, 'Negative', 'Negative', 'Negative', 'Negative'),
(51, 50, 'Negative', 'Negative', 'Negative', 'Negative'),
(52, 52, 'Positive', 'Positive', 'Negative', 'Positive'),
(53, 51, 'Negative', 'Negative', 'Negative', 'Negative');

-- --------------------------------------------------------

--
-- Table structure for table `sms_status`
--

CREATE TABLE `sms_status` (
  `id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_status`
--

INSERT INTO `sms_status` (`id`, `status`) VALUES
(1, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `password`, `role`) VALUES
(129044, 'john', 'chipate', 1234, 'ADMIN'),
(17112275, 'mwamba', 'chipate', 1234, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`results_id`);

--
-- Indexes for table `sms_status`
--
ALTER TABLE `sms_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `results_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
