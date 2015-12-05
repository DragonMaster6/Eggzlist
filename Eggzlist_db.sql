-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2015 at 04:04 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Listings`
--

INSERT INTO `Listings` (`listID`, `sellerID`, `title`, `description`, `pickup`, `price`, `status`, `start`, `finish`, `rating`, `inventory`, `private`) VALUES
(3, 15, 'Fresh Eggs from the Springs', 'Hello one and all! I have some fresh eggs here for our Omelette wednesdays so come one, come all!<br>\r\n\r\nEdit: We are running out! Come quick!\r\n<br>\r\n<br>\r\nWe have more now', 1, 5, 0, '2015-11-30 20:12:47', NULL, 0, 39, 0),
(4, 16, 'Fresh eggz as of 12/1', 'Our chickens have just laid so come get them while they are fresh! Forget Omelette Wednesdays come to Egg Tuesdays!', 1, 4, 0, '2015-12-01 09:57:12', NULL, 0, 24, 0),
(5, 17, 'Eggs for sale', 'These are magic eggs... :)', 1, 4, 0, '2015-12-01 17:20:40', NULL, 0, 35, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`noteID`, `toUserID`, `fromUserID`, `type`, `subject`, `message`, `posted`, `eggs`) VALUES
(2, 20, 21, 2, 'MAGIC EGGS', 'I WANT YOUR MAGIC EGGS!', '2015-12-01 17:31:08', 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sellers`
--

INSERT INTO `Sellers` (`sellerID`, `numChick`, `feed`, `eggrate`, `breeds`, `street`, `city`, `state`, `pcode`, `xroad`, `lat`, `lng`, `rating`) VALUES
(15, 2, 'pikes beak', 14, 'leg horn', 'dublin', 'colorado springs', 'CO', 80927, 'markshaffel and dublin', 38.833358, -104.820851, 0),
(16, 5, 'pikes beak', 28, 'marans,leg horn', '104th Drive', 'westminster', 'co', 80021, '100th Ave and Wadsworth Parkway', 39.920491, -105.087725, 0),
(17, 6, 'pikes beak', 35, 'silky', 'uccs', 'colorado springs', 'co', 80919, 'austin bluffs', 38.833358, -104.820851, 0),
(18, 8, 'ASLDFJKASDF', 24, 'ASL;FDJAS;DKFLJ;', 'KINGS ROAD', 'ADA', 'OK', 74820, 'KINGS ROAD AND BROADWAY', 34.771926, -96.680535, 0),
(19, 2, 'pikes beak', 14, 'other', 'streetName', 'CS', 'CO', 80000, 'asdfghj ggjygc hhyf', 38.833358, -104.820851, 0);

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
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `sellerID`, `fname`, `lname`, `dname`, `pass`, `email`, `phone`) VALUES
(16, NULL, 'JANET', 'ATKINS', 'JATKINS', 'iyaayas.', 'janet_atkins11@hotmail.com', '2108420138'),
(18, 15, 'RICH', 'ATKINS', 'RATKINS', 'iyaayas.', 'janet_atkins11@hotmail.com', '2108420138'),
(19, 16, 'Ben', 'Matson', 'TheEggMaster', 'dragon', 'dragonmaster1694@gmail.com', '3036192400'),
(20, 17, 'karlie', 'van arnam', 'karlie', 'password', 'fake@gmail.com', '7196600718'),
(21, NULL, 'ROB', 'BRUNK', 'ROB', 'PASSWORD', 'ASFDASDF', '469.525.12'),
(22, 18, 'R', 'BRUNK', 'ROBSTER', 'PASSWORD', 'ERADSFASFD', '235423423'),
(23, 19, 'firstName', 'lastName', 'asdf', 'pass', 'fake@fake.com', '0123456789');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WaitLists`
--

INSERT INTO `WaitLists` (`waitID`, `listID`, `userID`, `start`, `finish`) VALUES
(1, 3, 20, '2015-12-01 17:16:45', NULL),
(2, 5, 21, '2015-12-01 17:31:08', NULL);

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
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Sellers`
--
ALTER TABLE `Sellers`
  MODIFY `sellerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `WaitLists`
--
ALTER TABLE `WaitLists`
  MODIFY `waitID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
