-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2013 at 04:00 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES
(1, 'Room1379154980', 2, 'Room1379154980.txt'),
(2, 'Room1379154988', 2, 'Room1379154988.txt'),
(3, 'Room1379172726', 2, 'Room1379172726.txt'),
(4, 'Room1379174216', 2, 'Room1379174216.txt');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE IF NOT EXISTS `chat_users` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_mod` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`id`, `username`, `status`, `time_mod`) VALUES
(1, 'deepti', 1, 1379154926),
(2, 'geetka', 1, 1379154942),
(3, 'MUMMY', 1, 1379154961),
(4, 'sid', 1, 1379172704),
(5, 'fds', 1, 1379174211);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat_users_rooms`
--

INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`, `uesrname2`) VALUES
(1, 'geetka', 'Room1379154980', 1379154980, 'deepti'),
(2, 'deepti', 'Room1379154980', 1379154980, 'geetka'),
(3, 'deepti', 'Room1379154988', 1379154988, 'MUMMY'),
(4, 'MUMMY', 'Room1379154988', 1379154988, 'deepti'),
(5, 'deepti', 'Room1379172726', 1379172726, 'sid'),
(6, 'sid', 'Room1379172726', 1379172726, 'deepti'),
(7, 'deepti', 'Room1379174216', 1379174216, 'fds'),
(8, 'fds', 'Room1379174216', 1379174216, 'deepti');
