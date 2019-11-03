-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 09:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `departments`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'Management'),
(2, 'IT services'),
(3, 'Accounting'),
(4, 'Massage services'),
(5, 'Laundry services'),
(6, 'Room services');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `hiring_date` date NOT NULL,
  `department` varchar(24) NOT NULL,
  `post` text NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `hiring_date`, `department`, `post`, `salary`) VALUES
(1, 'Temporary', 'User', 'temp', '$2y$10$MjDfB5.7mh8Kvm6s1K5xeOhw0O0Rz1wn1ORXY/ZljRZZm7zHYt58y', 'temp@sierrahotels.com', '9191919191', '2019-06-21', 'Management', 'Manager', 40000),
(2, 'Ashish', 'Shetty', 'ashish', '$2y$10$.F9mHEazoZm5Kty.ZOHIh.VrSOrG5PxtpkWkDKpjfnBnrgM5i6//G', 'shettyashish@sierrahotels.com', '9874561235', '2019-06-21', 'Management', 'Manager', 50000),
(3, 'Cosmo', 'Kramer', 'kramer', '$2y$10$72yUdT/dWZT8xlhSQK7jIuRP32pGw3FQ4/Fd7cQrxFh6fUVnW/A1G', 'kramer@gmail.com', '+123564578', '2019-06-21', 'Room services', 'Cleaner', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
