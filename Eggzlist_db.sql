-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 08:58 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Eggzlist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE IF NOT EXISTS `Notifications` (
  `noteID` int(11) NOT NULL,
  `toUserID` int(11) NOT NULL,
  `fromUserID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `posted` datetime NOT NULL,
  `eggs` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`noteID`, `toUserID`, `fromUserID`, `type`, `subject`, `message`, `posted`, `eggs`) VALUES
(4, 1, 7, 2, 'Omelette Wednesdays', 'I would love to have 10 of your delicious eggs so I could make omelettes myself', '2015-11-27 18:50:16', 10),
(5, 1, 4, 2, 'Team Work', 'I''d like 5 of your eggs, where would be a good place to meet up?', '2015-11-28 12:14:16', 5),
(6, 1, 5, 2, 'Hey Ben!', 'I''d love some of your eggs for a breakfast party I am planning. Can we meet up wednesday at noon?', '2015-11-28 12:15:19', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`noteID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
