-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 11:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epignosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`user_id`, `request_id`) VALUES
(8, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `request_date_from` date NOT NULL,
  `request_date_to` date NOT NULL,
  `request_reason` text NOT NULL,
  `request_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_date`, `request_date_from`, `request_date_to`, `request_reason`, `request_status`) VALUES
(5, '2019-07-03', '2019-07-08', '2019-07-12', 'I will be sick. Sorry!', 'approved'),
(6, '2019-07-03', '2019-07-08', '2019-07-12', 'I need to sleep all weak. Because reasons', 'rejected'),
(7, '2019-07-04', '2019-07-19', '2019-07-26', 'honey moon!', 'pending'),
(8, '2019-07-04', '2019-07-16', '2019-07-18', 'Pre honey moon', 'pending'),
(9, '2019-07-04', '2019-07-11', '2019-07-14', 'Wedding', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'Thomas', 'Tsartsarakis', 'thomas.tsartsarakis2@gmail.com', '1234', 'admin'),
(3, 'test', 'test', 'test@test', '1234', 'employee'),
(4, 'test2', 'test2', 'test2@test2', '1234', 'employee'),
(5, 'sdsa', 'sadsa', 'sadsad@asdsad', '$2a$16$thisisanexampleforthieCbEE3yXUC9FBWIYCxT1J6bfIw.dToUS', 'employee'),
(6, 'test3', 'test3', 'test3@test.com', '$2a$16$thisisanexampleforthieBKbZqzMcr.FPAIM2hEIjPFKDBTOuHD2', 'employee'),
(7, 'test3', 'test3', 'test3@test.com', '$2a$16$thisisanexampleforthieBKbZqzMcr.FPAIM2hEIjPFKDBTOuHD2', 'employee'),
(8, 'Thomas', 'Tsartsarakis', 'thomtsar@gmail.com', '$2a$16$thisisanexampleforthieBKbZqzMcr.FPAIM2hEIjPFKDBTOuHD2', 'admin'),
(9, 'test4', 'test4', 'test@test4', '$2a$16$thisisanexampleforthieBKbZqzMcr.FPAIM2hEIjPFKDBTOuHD2', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`user_id`,`request_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
