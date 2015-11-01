-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2015 at 07:51 PM
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
-- Table structure for table `Listings`
--

CREATE TABLE IF NOT EXISTS `Listings` (
  `listID` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `pickup` tinyint(1) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime DEFAULT NULL,
  `inventory` int(11) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Listings`
--

INSERT INTO `Listings` (`listID`, `sellerID`, `pickup`, `price`, `status`, `start`, `finish`, `inventory`, `private`) VALUES
(1, 1, 0, 5, 0, '2015-10-28 00:00:00', NULL, 36, 0),
(4, 1, 0, 6, 0, '2015-10-28 00:00:00', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE IF NOT EXISTS `Notifications` (
  `noteID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sellers`
--

CREATE TABLE IF NOT EXISTS `Sellers` (
  `sellerID` int(11) NOT NULL,
  `numChick` int(11) NOT NULL DEFAULT '1',
  `feed` varchar(128) DEFAULT NULL,
  `eggrate` int(11) NOT NULL,
  `breeds` varchar(512) NOT NULL,
  `street` varchar(512) NOT NULL,
  `city` varchar(512) NOT NULL,
  `state` varchar(2) NOT NULL,
  `pcode` int(5) NOT NULL,
  `xroad` varchar(1024) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sellers`
--

INSERT INTO `Sellers` (`sellerID`, `numChick`, `feed`, `eggrate`, `breeds`, `street`, `city`, `state`, `pcode`, `xroad`, `rating`) VALUES
(1, 5, 'pikes beak ', 28, 'Leghorn', '1010 austin bluffs parkway', 'colorado springs', 'co', 80918, 'hen drive, rooster street', 0),
(2, 10, 'Organic', 63, 'Plymouth Rock', '3616 sheffield lane', 'colorado springs', 'co', 80907, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `userID` int(11) NOT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `dname` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `sellerID`, `fname`, `lname`, `dname`, `email`, `phone`) VALUES
(1, 1, 'Ben', 'Matson', 'DragonMaster', 'master6@bogus.com', 1234567890),
(2, 2, 'Janet', 'Atkins', 'jatkins', 'jatkins@bogus.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `WaitLists`
--

CREATE TABLE IF NOT EXISTS `WaitLists` (
  `waitID` int(11) NOT NULL,
  `listID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Listings`
--
ALTER TABLE `Listings`
  ADD PRIMARY KEY (`listID`),
  ADD UNIQUE KEY `listID` (`listID`);

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`noteID`);

--
-- Indexes for table `Sellers`
--
ALTER TABLE `Sellers`
  ADD PRIMARY KEY (`sellerID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `WaitLists`
--
ALTER TABLE `WaitLists`
  ADD PRIMARY KEY (`waitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Listings`
--
ALTER TABLE `Listings`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Sellers`
--
ALTER TABLE `Sellers`
  MODIFY `sellerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `WaitLists`
--
ALTER TABLE `WaitLists`
  MODIFY `waitID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
