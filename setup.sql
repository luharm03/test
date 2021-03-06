-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 07:49 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `setup`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `numofuser` int(10) NOT NULL,
  `file` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES
(1, 'Room1379154980', 2, 'Room1379154980.txt'),
(2, 'Room1379154988', 2, 'Room1379154988.txt'),
(3, 'Room1379172726', 2, 'Room1379172726.txt'),
(4, 'Room1379174216', 2, 'Room1379174216.txt'),
(5, 'Room1379402539', 2, 'Room1379402539.txt'),
(6, 'Room1379479984', 2, 'Room1379479984.txt');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE IF NOT EXISTS `chat_users` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_mod` int(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`id`, `username`, `status`, `time_mod`, `login_time`) VALUES
(1, 'deepti', 1, 1379483347, '2013-09-18 11:19:07'),
(2, 'geetka', 1, 1379154942, '0000-00-00 00:00:00'),
(3, 'MUMMY', 1, 1379154961, '0000-00-00 00:00:00'),
(4, 'sid', 1, 1379431012, '2013-09-17 20:46:52'),
(5, 'fds', 1, 1379174211, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_users_rooms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `mod_time` int(40) NOT NULL,
  `uesrname2` varchar(22) NOT NULL,
  `last_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `chat_users_rooms`
--

INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`, `uesrname2`, `last_time`) VALUES
(1, 'geetka', 'Room1379154980', 1379154980, 'deepti', '2013-09-18'),
(2, 'deepti', 'Room1379154980', 1379483347, 'geetka', '2013-09-18'),
(3, 'deepti', 'Room1379154988', 1379405507, 'MUMMY', '2013-09-17'),
(4, 'MUMMY', 'Room1379154988', 1379154988, 'deepti', '0000-00-00'),
(5, 'deepti', 'Room1379172726', 1379402716, 'sid', '0000-00-00'),
(6, 'sid', 'Room1379172726', 1379402540, 'deepti', '0000-00-00'),
(7, 'deepti', 'Room1379174216', 1379174216, 'fds', '0000-00-00'),
(8, 'fds', 'Room1379174216', 1379174216, 'deepti', '0000-00-00'),
(9, 'MUMMY', 'Room1379402539', 1379402539, 'sid', '0000-00-00'),
(10, 'sid', 'Room1379402539', 1379431012, 'MUMMY', '0000-00-00'),
(11, 'geetka', 'Room1379479984', 1379479984, '', '2013-09-18'),
(12, '', 'Room1379479984', 1379479984, 'geetka', '2013-09-18');
