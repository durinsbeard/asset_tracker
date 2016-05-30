-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2014 at 08:30 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asset_tracking_sandbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_first_name` varchar(15) NOT NULL,
  `employee_last_name` varchar(15) NOT NULL,
  `department_id` int(11) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `reports_to` int(11) NOT NULL,
  `staff_level` int(11) NOT NULL,
  `password_encrypted` tinytext NOT NULL,
  `employee_title` tinytext NOT NULL,
  `hire_date` int(11) NOT NULL,
  `termination_date` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`employee_id`, `employee_first_name`, `employee_last_name`, `department_id`, `email_address`, `username`, `password`, `active`, `reports_to`, `staff_level`, `password_encrypted`, `employee_title`, `hire_date`, `termination_date`) VALUES
(1, 'Daniel', 'Moore', 2, 'dmoore@srclogisticinc.com', 'dmoore', 'dmoore', 1, 0, 1, 'dmoore', 'PC/Network Technician', 0, 0),
(2, 'Dustin', 'Riggs', 2, 'driggs@srclogisticsinc.com', 'driggs', 'driggs', 1, 0, 0, 'driggs', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
