-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2016 at 04:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupevent`
--

CREATE TABLE IF NOT EXISTS `groupevent` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `group_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `groupevent`
--

INSERT INTO `groupevent` (`index`, `group_name`, `group_id`, `user_id`) VALUES
(1, 'manali', 1, 10),
(3, 'manali', 1, 12),
(4, 'Udaipur', 2, 14),
(5, 'Udaipur', 2, 32),
(6, 'Udaipur', 2, 53),
(8, 'Goa', 3, 3),
(9, 'Goa', 3, 4),
(20, 'udaipur', 4, 3),
(21, 'udaipur', 4, 7),
(22, 'Rajasthan', 5, 12),
(23, 'Rajasthan', 5, 8),
(24, 'Rajasthan', 5, 11),
(25, 'Manipur', 6, 11),
(26, 'Manipur', 6, 12),
(27, 'Shillong', 7, 7),
(28, 'Shillong', 7, 11),
(29, 'Shillong', 7, 12),
(30, 'Diu', 8, 12),
(31, 'Diu', 8, 3),
(32, 'Diu', 8, 11),
(44, 'Agra', 9, 4),
(45, 'Agra', 9, 8),
(46, 'Agra', 9, 12),
(47, 'Quebec', 10, 3),
(48, 'Quebec', 10, 7),
(49, 'Quebec', 10, 8),
(50, 'Quebec', 10, 11),
(51, 'London', 11, 8),
(52, 'London', 11, 13),
(53, 'London', 11, 12),
(54, 'London', 11, 7),
(55, 'Imagica', 12, 12),
(56, 'Imagica', 12, 7),
(57, 'Imagica', 12, 8),
(58, 'Imagica', 12, 13),
(59, 'Abc', 13, 0),
(60, 'Abc', 13, 7),
(61, 'Abc', 13, 8),
(62, 'Delhi', 14, 7),
(63, 'Delhi', 14, 3),
(64, 'Delhi', 14, 8),
(65, 'Goa', 15, 0),
(66, 'Goa', 15, 0),
(67, 'Goa', 15, 0),
(68, 'Kashmir', 16, 13),
(69, 'Kashmir', 16, 3),
(70, 'Shimla', 17, 3),
(71, 'Shimla', 17, 13),
(72, 'kerala', 18, 3),
(73, 'kerala', 18, 13),
(74, 'wer', 19, 13),
(75, 'wer', 19, 16),
(76, 'iop', 20, 13),
(77, 'iop', 20, 16),
(78, 'Beijing', 21, 13),
(79, 'Beijing', 21, 16),
(80, 'asdf', 22, 16),
(81, 'asdf', 22, 3),
(82, 'asdf', 22, 11),
(83, 'sdfg', 23, 16),
(84, 'sdfg', 23, 13),
(85, 'sdfg', 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `singleevent`
--

CREATE TABLE IF NOT EXISTS `singleevent` (
  `client_id` int(255) NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(300) NOT NULL,
  `expense` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `exp_limit` int(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `singleevent`
--

INSERT INTO `singleevent` (`client_id`, `no`, `note`, `expense`, `date`, `exp_limit`) VALUES
(13, 2, '', 0, '', 150),
(13, 4, 'fruits', 30, '03/14/2016', 150),
(13, 5, 'xyz', 20, '03/14/2016', 150),
(13, 8, 'foodmart', 30, '03/15/2016', 150),
(3, 10, '', 0, '', 200),
(13, 11, 'travel', 40, '03/15/2016', 150),
(15, 12, '', 0, '', 250),
(15, 13, 'movie', 200, '03/15/2016', 250),
(11, 14, '', 0, '', 120),
(11, 15, 'movie', 100, '03/15/2016', 120),
(13, 16, 'lunch', 100, '03/16/2016', 150),
(13, 17, 'xerox', 40, '03/15/2016', 150),
(13, 18, 'puff', 10, '03/15/2016', 150),
(13, 19, 'coke', 10, '03/15/2016', 150),
(13, 20, 'xyz', 5, '03/15/2016', 150),
(13, 22, 'def', 10, '03/23/2016', 150),
(13, 23, 'puff', 10, '03/24/2016', 150),
(13, 24, 'cheese puff', 20, '03/25/2016', 150),
(13, 25, 'bhel', 50, '03/17/2016', 150),
(13, 27, 'movie', 180, '03/08/2016', 150),
(12, 28, '', 0, '', 100),
(12, 29, 'fruits', 75, '03/16/2016', 100),
(12, 30, 'xerox', 15, '03/16/2016', 100),
(13, 31, 'colddrinks', 120, '03/30/2016', 150),
(13, 32, 'colddrinks', 35, '03/16/2016', 150),
(12, 33, 'lunch', 50, '03/16/2016', 100),
(13, 38, 'pasta', 50, '03/18/2016', 150),
(13, 39, 'chips', 20, '03/17/2016', 150),
(13, 40, 'rolls', 60, '03/18/2016', 150),
(13, 41, 'lunch', 120, '03/19/2016', 150),
(17, 46, '', 0, '', 150),
(4, 47, '', 0, '', 150);

-- --------------------------------------------------------

--
-- Table structure for table `split_settle`
--

CREATE TABLE IF NOT EXISTS `split_settle` (
  `user_id` int(255) NOT NULL,
  `index` int(255) NOT NULL AUTO_INCREMENT,
  `group_id` int(255) NOT NULL,
  `owe_id` int(255) NOT NULL,
  `money` float NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `split_settle`
--

INSERT INTO `split_settle` (`user_id`, `index`, `group_id`, `owe_id`, `money`) VALUES
(4, 3, 0, 13, 150),
(3, 15, 12, 12, 32.5),
(3, 16, 12, 7, 50),
(3, 17, 12, 8, 62.5),
(3, 18, 12, 13, 75),
(12, 19, 12, 3, 25),
(3, 20, 8, 12, 43.75),
(3, 21, 8, 11, 43.75),
(13, 45, 3, 3, 70),
(4, 53, 3, 13, 70),
(13, 54, 22, 16, 12.5),
(13, 55, 22, 3, 12.5),
(13, 56, 22, 11, 12.5),
(16, 57, 22, 3, 15),
(16, 58, 22, 11, 15),
(16, 59, 23, 13, 14.1667),
(16, 60, 23, 3, 17.5),
(13, 61, 23, 3, 3.33333),
(0, 62, 3, 3, 27),
(0, 63, 3, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `test_table_db`
--

CREATE TABLE IF NOT EXISTS `test_table_db` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_table_db`
--

INSERT INTO `test_table_db` (`username`, `password`) VALUES
('asdf', 'password'),
('ravinder', 'singh'),
('rchs', 'sdfghm,');

-- --------------------------------------------------------

--
-- Table structure for table `usersdb`
--

CREATE TABLE IF NOT EXISTS `usersdb` (
  `name` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `client_id` int(255) NOT NULL AUTO_INCREMENT,
  `contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `usersdb`
--

INSERT INTO `usersdb` (`name`, `username`, `password`, `client_id`, `contact`, `email`) VALUES
('vaibhav', 'vj', 'joshi01', 3, 7874829992, 'qwertyu@yahoo.com'),
('raju', 'rajeshb', 'bhanu296', 4, 456781526, 'xcvbn@gmail.com'),
('harshal', 'hs', 'sheth23', 7, 9375670407, 'vbnm,12@gmail.com'),
('rishi', 'rishis', 'sheth27', 8, 58213219511, 'ftrvbhjiugvtbhj@yahoo.in'),
('harsh', 'sodi', 'sodi21', 11, 21541554942, 'weqweq@gmail.com'),
('akshit', 'akki', 'asdfg', 12, 15184512313, 'bhdah@hotmail.com'),
('Ravinder', 'rvsingh', 'abcd', 13, 8460348865, 'ravindersingh3104.rs@gmail.com'),
('davinder', 'davindersingh', 'xcfg', 14, 8866505109, 'davindersingh@gmail.com'),
('Keyur', 'kd', 'kd123', 15, 8460348865, 'keyurdhanesha@gmail.com'),
('jay', 'jaygoku', 'joshi123', 16, 9426288882, 'jaygoku@gmail.com'),
('Khushi', 'khush', 'desai', 17, 1234543665, 'nsfkdsfm@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
