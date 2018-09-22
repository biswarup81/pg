-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2012 at 05:55 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `email` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(8) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `f_name`, `l_name`, `email`, `username`, `password`, `status`, `date_added`) VALUES
(1, 'admin', 'admin', 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2012-03-21'),
(2, 'member', 'member', 0, 'member', 'aa08769cdcb26674c6706093503ff0a3', '2', '2012-03-21'),
(3, 'Pravin', 'Thakur', 0, 'pravin', '52c48d91323beb43f52025dde4f8ee99', '2', '2012-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `v_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `complain_no` int(11) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `pin` int(9) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `land_mark` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `label` varchar(8) NOT NULL,
  `date_added` datetime NOT NULL,
  `assigned_date` datetime NOT NULL,
  `resloved_date` datetime NOT NULL,
  `closed_date` datetime NOT NULL,
  `assigned_by` tinyint(4) NOT NULL,
  `assigned_to` tinyint(4) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`v_id`, `complain_no`, `f_name`, `l_name`, `email`, `address1`, `address2`, `pin`, `city`, `state`, `phone_no`, `mobile_no`, `land_mark`, `text`, `label`, `date_added`, `assigned_date`, `resloved_date`, `closed_date`, `assigned_by`, `assigned_to`) VALUES
(7, 0, 'asjlfjaslk', '', 'ajsdlflasjfl', '', '', 0, '', '', '', '', '', 'kajlsdfjlaksf', 'close', '2012-03-21 15:08:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 0, 'Chandan', '', 'bidyutwd@gamil.com', '', '', 0, '', '', '', '', '', 'This is testing.', 'assign', '2012-03-21 19:24:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 0, 'wretwet', '', 'rdsfgsdf@fg.df', '', '', 0, '', '', '', '', '', 'dfghdfghdfhgdfhg', 'close', '2012-03-21 19:48:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 0, 'Bidyut', 'Biswas', 'pginfo.dev1@gmail.com', 'Gari Station', 'Bolpur', 731201, 'Kolkata', 'WB', '', '9432189588', '', 'jsakjajsdfofjkf sdjflsajdf sadfjlasdjf sd fdjlf jdsflk', 'close', '2012-03-22 12:01:52', '2012-03-23 10:51:52', '2012-03-23 11:08:51', '2012-03-23 11:09:14', 1, 0),
(18, 0, 'Bidyut', 'Biswas', 'pginfo.dev1@gmail.com', 'Gari Station', 'Bolpur', 731201, 'Kolkata', 'WB', '', '9432189588', 'station', 'jsakjajsdfofjkf sdjflsajdf sadfjlasdjf sd fdjlf jdsflk', 'close', '2012-03-22 12:02:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-03-22 16:17:49', 0, 0),
(19, 0, 'sadfsafsfd', 'asdf', '', 'asdf', '', 0, '', 'WB', '', '', '', '', 'close', '2012-03-22 12:34:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-03-22 20:42:09', 0, 0),
(20, 0, 'Barack', 'Obama', 'obama@gandu.com', 'White House', '', 763876382, 'New York', 'WB', '6878786', '5878768', '', 'Make my sites color some birght', 'close', '2012-03-23 11:03:22', '2012-03-23 11:17:24', '2012-03-23 11:18:00', '2012-03-23 11:18:25', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
