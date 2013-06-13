-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2013 at 06:51 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(4) NOT NULL,
  `max_std` int(1) NOT NULL,
  `count` int(1) NOT NULL,
  `table` int(1) NOT NULL,
  `chair` int(1) NOT NULL,
  `bed` int(1) NOT NULL,
  `locker` int(1) NOT NULL,
  `lamp` int(1) NOT NULL,
  `floor` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `max_std`, `count`, `table`, `chair`, `bed`, `locker`, `lamp`, `floor`, `block`) VALUES
(103, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(105, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(107, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(108, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(110, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(111, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(112, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(201, 4, 0, 0, 0, 0, 0, 0, 'north', 'north'),
(211, 4, 0, 2, 4, 4, 4, 1, '1', 'north');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` varchar(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dept` varchar(5) NOT NULL,
  `level` int(1) NOT NULL,
  `term` int(1) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `room` int(4) NOT NULL DEFAULT '0',
  `messcard` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`, `type`) VALUES
(3, 'muntakim', '55a97c07d20c0bb5b1e457633bd74d93', ''),
(4, 'taksir', 'e98cfee35e5999380b0aec094b48f803', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
