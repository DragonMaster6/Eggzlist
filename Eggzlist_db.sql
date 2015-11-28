-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 09:16 PM
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
  `title` varchar(1024) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `pickup` tinyint(1) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime DEFAULT NULL,
  `rating` int(10) unsigned NOT NULL,
  `inventory` int(11) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Listings`
--

INSERT INTO `Listings` (`listID`, `sellerID`, `title`, `description`, `pickup`, `price`, `status`, `start`, `finish`, `rating`, `inventory`, `private`) VALUES
(1, 1, 'Eggs for Sale near UCCS', 'Fresh Eggs every other day. Delicious Omelette Wednesdays', 0, 5, 0, '2015-10-28 00:00:00', NULL, 0, 36, 0),
(4, 1, '', '', 0, 6, 0, '2015-10-28 00:00:00', NULL, 0, 24, 1),
(5, 4, 'BUY MY EGGS!!', 'Excellent source of protein and fresh every day!', 1, 6, 1, '2015-11-04 00:00:00', NULL, 0, 12, 0),
(6, 4, 'This is a test Title', 'This is a test description of an egg listing post', 0, 6, 1, '2015-11-05 00:00:00', NULL, 0, 24, 0),
(7, 3, '', '', 1, 5, 1, '2015-11-06 00:00:00', NULL, 0, 24, 0),
(8, 3, '', '', 1, 5, 1, '2015-11-07 00:00:00', NULL, 0, 36, 0),
(9, 5, '', '', 1, 8, 1, '2015-11-08 00:00:00', NULL, 0, 18, 0),
(10, 5, '', '', 1, 8, 1, '2015-11-09 00:00:00', NULL, 0, 18, 0),
(11, 2, '', '', 0, 6, 1, '2015-11-11 00:00:00', NULL, 0, 12, 0),
(12, 2, '', '', 0, 6, 1, '2015-11-12 00:00:00', NULL, 0, 24, 0);

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
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sellers`
--

INSERT INTO `Sellers` (`sellerID`, `numChick`, `feed`, `eggrate`, `breeds`, `street`, `city`, `state`, `pcode`, `xroad`, `lat`, `lng`, `rating`) VALUES
(1, 5, 'pikes beak ', 28, 'Leghorn', '9398 west 104th drive', 'westminster', 'co', 80918, 'hen drive, rooster street', 39.882616, -105.103585, 0),
(2, 10, 'Organic', 63, 'Plymouth Rock', '3616 sheffield lane', 'colorado springs', 'co', 80907, NULL, 38.884279, -104.798245, 0),
(3, 5, 'Organic', 28, 'Long horn', '5061 perry street', 'denver', 'co', 80221, NULL, 39.788498, -105.039475, 0),
(4, 4, 'Organic', 21, 'marans,silkie', '2775 el capitan drive', 'colorado springs', 'co', 80918, NULL, 38.908058, -104.775224, 0),
(5, 9, 'Organic', 56, 'Silkie', '3705 windsor avenue', 'colorado springs', 'co', 80907, NULL, 38.88452, -104.794899, 0),
(6, 5, 'pikes beak', 28, 'long horn', '835 33rd Street', 'boulder', 'co', 80303, 'Aurora Ave and 30th Street', 40.002397, -105.250535, 0);

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
  `pass` varchar(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `sellerID`, `fname`, `lname`, `dname`, `pass`, `email`, `phone`) VALUES
(1, 1, 'Ben', 'Matson', 'DragonMaster', 'dragon', 'master6@pikesbeak.com', 1234567890),
(2, 2, 'Janet', 'Atkins', 'jatkins', 'pass', 'jatkins@pikesbeak.com', 2147483647),
(3, 4, 'Daniel', 'Taylor', 'dtaylor', 'pass', 'dtaylor@pikesbeak.com', 1472583696),
(4, 3, 'Patrick', 'Anderson', 'panderson', 'pass', 'panderson@pikesbeak.com', 147820369),
(5, 5, 'Kendra', 'Wilson', 'kwilson', 'pass', 'kwilson@pikesbeak.com', 1236547890),
(6, 6, 'Guest', 'Person', 'SecretShopper', 'secret', 'gperson@pikesbeak.com', 111222333),
(7, NULL, 'Bob', 'Hillson', 'SecretShopper2', 'pass', 'test@yahoo.com', 1111111111);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WaitLists`
--

INSERT INTO `WaitLists` (`waitID`, `listID`, `userID`, `start`, `finish`) VALUES
(14, 1, 7, '2015-11-27 18:50:16', NULL),
(15, 4, 4, '2015-11-28 12:14:16', NULL),
(16, 1, 5, '2015-11-28 12:15:19', NULL);

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
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `dname` (`dname`);

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
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Sellers`
--
ALTER TABLE `Sellers`
  MODIFY `sellerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `WaitLists`
--
ALTER TABLE `WaitLists`
  MODIFY `waitID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
