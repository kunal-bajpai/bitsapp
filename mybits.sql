-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.79
-- Generation Time: Mar 13, 2014 at 04:19 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mybits`
--
CREATE DATABASE `mybits` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mybits`;

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `ID` int(11) NOT NULL auto_increment,
  `circleID` int(11) default NULL,
  `userID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` VALUES(1, 2, 4);
INSERT INTO `Admins` VALUES(34, 2, 20);
INSERT INTO `Admins` VALUES(38, 2, 26);
INSERT INTO `Admins` VALUES(36, 16, 26);

-- --------------------------------------------------------

--
-- Table structure for table `AppAdmin`
--

CREATE TABLE `AppAdmin` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `AppAdmin`
--

INSERT INTO `AppAdmin` VALUES(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `CircleUpdate`
--

CREATE TABLE `CircleUpdate` (
  `ID` int(11) NOT NULL auto_increment,
  `circleID` int(11) default NULL,
  `updateID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `CircleUpdate`
--

INSERT INTO `CircleUpdate` VALUES(9, 4, 9);
INSERT INTO `CircleUpdate` VALUES(10, 5, 10);
INSERT INTO `CircleUpdate` VALUES(7, 2, 7);
INSERT INTO `CircleUpdate` VALUES(8, 2, 8);
INSERT INTO `CircleUpdate` VALUES(11, 2, 11);
INSERT INTO `CircleUpdate` VALUES(12, 2, 12);
INSERT INTO `CircleUpdate` VALUES(13, 2, 13);
INSERT INTO `CircleUpdate` VALUES(14, 2, 14);
INSERT INTO `CircleUpdate` VALUES(15, 1, 15);
INSERT INTO `CircleUpdate` VALUES(16, 1, 16);
INSERT INTO `CircleUpdate` VALUES(17, 1, 17);
INSERT INTO `CircleUpdate` VALUES(18, 5, 18);
INSERT INTO `CircleUpdate` VALUES(19, 5, 19);
INSERT INTO `CircleUpdate` VALUES(20, 1, 20);
INSERT INTO `CircleUpdate` VALUES(21, 2, 21);
INSERT INTO `CircleUpdate` VALUES(22, 2, 22);
INSERT INTO `CircleUpdate` VALUES(23, 1, 23);
INSERT INTO `CircleUpdate` VALUES(24, 1, 24);
INSERT INTO `CircleUpdate` VALUES(25, 5, 25);
INSERT INTO `CircleUpdate` VALUES(26, 5, 26);
INSERT INTO `CircleUpdate` VALUES(27, 2, 27);
INSERT INTO `CircleUpdate` VALUES(28, 1, 28);
INSERT INTO `CircleUpdate` VALUES(29, 1, 29);
INSERT INTO `CircleUpdate` VALUES(30, 1, 30);
INSERT INTO `CircleUpdate` VALUES(31, 1, 31);
INSERT INTO `CircleUpdate` VALUES(32, 2, 32);
INSERT INTO `CircleUpdate` VALUES(33, 2, 33);
INSERT INTO `CircleUpdate` VALUES(34, 2, 34);
INSERT INTO `CircleUpdate` VALUES(35, 2, 35);
INSERT INTO `CircleUpdate` VALUES(36, 2, 36);
INSERT INTO `CircleUpdate` VALUES(37, 2, 37);
INSERT INTO `CircleUpdate` VALUES(38, 5, 38);
INSERT INTO `CircleUpdate` VALUES(39, 5, 39);
INSERT INTO `CircleUpdate` VALUES(40, 5, 40);
INSERT INTO `CircleUpdate` VALUES(41, 2, 41);
INSERT INTO `CircleUpdate` VALUES(42, 2, 42);
INSERT INTO `CircleUpdate` VALUES(43, 2, 43);
INSERT INTO `CircleUpdate` VALUES(44, 2, 44);
INSERT INTO `CircleUpdate` VALUES(45, 2, 45);
INSERT INTO `CircleUpdate` VALUES(46, 2, 46);
INSERT INTO `CircleUpdate` VALUES(47, 4, 47);
INSERT INTO `CircleUpdate` VALUES(48, 4, 48);
INSERT INTO `CircleUpdate` VALUES(49, 4, 49);
INSERT INTO `CircleUpdate` VALUES(50, 4, 50);
INSERT INTO `CircleUpdate` VALUES(51, 4, 51);
INSERT INTO `CircleUpdate` VALUES(52, 4, 52);
INSERT INTO `CircleUpdate` VALUES(53, 4, 53);
INSERT INTO `CircleUpdate` VALUES(54, 4, 54);
INSERT INTO `CircleUpdate` VALUES(55, 4, 55);
INSERT INTO `CircleUpdate` VALUES(56, 4, 56);
INSERT INTO `CircleUpdate` VALUES(57, 4, 57);
INSERT INTO `CircleUpdate` VALUES(58, 4, 58);
INSERT INTO `CircleUpdate` VALUES(59, 2, 59);
INSERT INTO `CircleUpdate` VALUES(60, 2, 60);
INSERT INTO `CircleUpdate` VALUES(61, 2, 61);
INSERT INTO `CircleUpdate` VALUES(62, 2, 62);
INSERT INTO `CircleUpdate` VALUES(63, 2, 63);
INSERT INTO `CircleUpdate` VALUES(64, 2, 64);
INSERT INTO `CircleUpdate` VALUES(65, 2, 65);
INSERT INTO `CircleUpdate` VALUES(66, 4, 66);
INSERT INTO `CircleUpdate` VALUES(67, 4, 67);
INSERT INTO `CircleUpdate` VALUES(68, 2, 68);
INSERT INTO `CircleUpdate` VALUES(69, 2, 69);
INSERT INTO `CircleUpdate` VALUES(70, 2, 70);
INSERT INTO `CircleUpdate` VALUES(71, 2, 71);
INSERT INTO `CircleUpdate` VALUES(72, 2, 72);
INSERT INTO `CircleUpdate` VALUES(73, 2, 73);
INSERT INTO `CircleUpdate` VALUES(74, 2, 74);
INSERT INTO `CircleUpdate` VALUES(75, 2, 75);
INSERT INTO `CircleUpdate` VALUES(76, 2, 76);
INSERT INTO `CircleUpdate` VALUES(77, 2, 77);
INSERT INTO `CircleUpdate` VALUES(78, 2, 78);
INSERT INTO `CircleUpdate` VALUES(79, 2, 79);
INSERT INTO `CircleUpdate` VALUES(80, 2, 80);
INSERT INTO `CircleUpdate` VALUES(81, 4, 81);
INSERT INTO `CircleUpdate` VALUES(82, 2, 82);
INSERT INTO `CircleUpdate` VALUES(83, 2, 83);
INSERT INTO `CircleUpdate` VALUES(84, 2, 84);
INSERT INTO `CircleUpdate` VALUES(85, 4, 85);
INSERT INTO `CircleUpdate` VALUES(86, 2, 86);
INSERT INTO `CircleUpdate` VALUES(87, 2, 87);
INSERT INTO `CircleUpdate` VALUES(88, 2, 88);
INSERT INTO `CircleUpdate` VALUES(89, 2, 89);
INSERT INTO `CircleUpdate` VALUES(90, 2, 90);
INSERT INTO `CircleUpdate` VALUES(91, 2, 91);
INSERT INTO `CircleUpdate` VALUES(92, 2, 92);
INSERT INTO `CircleUpdate` VALUES(93, 2, 93);
INSERT INTO `CircleUpdate` VALUES(94, 16, 94);
INSERT INTO `CircleUpdate` VALUES(95, 1, 95);
INSERT INTO `CircleUpdate` VALUES(96, 1, 96);
INSERT INTO `CircleUpdate` VALUES(97, 2, 97);
INSERT INTO `CircleUpdate` VALUES(98, 2, 98);
INSERT INTO `CircleUpdate` VALUES(99, 2, 99);
INSERT INTO `CircleUpdate` VALUES(100, 1, 100);
INSERT INTO `CircleUpdate` VALUES(101, 1, 101);
INSERT INTO `CircleUpdate` VALUES(102, 2, 102);
INSERT INTO `CircleUpdate` VALUES(103, 2, 103);
INSERT INTO `CircleUpdate` VALUES(104, 2, 104);
INSERT INTO `CircleUpdate` VALUES(105, 1, 105);
INSERT INTO `CircleUpdate` VALUES(106, 1, 106);
INSERT INTO `CircleUpdate` VALUES(107, 1, 107);
INSERT INTO `CircleUpdate` VALUES(108, 1, 108);
INSERT INTO `CircleUpdate` VALUES(109, 1, 109);
INSERT INTO `CircleUpdate` VALUES(110, 1, 110);
INSERT INTO `CircleUpdate` VALUES(111, 1, 111);
INSERT INTO `CircleUpdate` VALUES(112, 1, 112);
INSERT INTO `CircleUpdate` VALUES(113, 2, 113);
INSERT INTO `CircleUpdate` VALUES(114, 2, 114);
INSERT INTO `CircleUpdate` VALUES(115, 2, 115);
INSERT INTO `CircleUpdate` VALUES(116, 1, 116);
INSERT INTO `CircleUpdate` VALUES(117, 1, 117);
INSERT INTO `CircleUpdate` VALUES(118, 1, 118);
INSERT INTO `CircleUpdate` VALUES(119, 1, 119);
INSERT INTO `CircleUpdate` VALUES(120, 1, 120);
INSERT INTO `CircleUpdate` VALUES(121, 1, 121);
INSERT INTO `CircleUpdate` VALUES(122, 1, 122);
INSERT INTO `CircleUpdate` VALUES(123, 1, 123);
INSERT INTO `CircleUpdate` VALUES(124, 1, 124);
INSERT INTO `CircleUpdate` VALUES(125, 2, 125);
INSERT INTO `CircleUpdate` VALUES(126, 1, 126);
INSERT INTO `CircleUpdate` VALUES(127, 1, 127);
INSERT INTO `CircleUpdate` VALUES(128, 1, 128);
INSERT INTO `CircleUpdate` VALUES(129, 1, 129);
INSERT INTO `CircleUpdate` VALUES(130, 1, 130);
INSERT INTO `CircleUpdate` VALUES(131, 1, 131);
INSERT INTO `CircleUpdate` VALUES(132, 1, 132);
INSERT INTO `CircleUpdate` VALUES(133, 1, 133);
INSERT INTO `CircleUpdate` VALUES(134, 1, 134);
INSERT INTO `CircleUpdate` VALUES(135, 1, 135);
INSERT INTO `CircleUpdate` VALUES(136, 1, 136);
INSERT INTO `CircleUpdate` VALUES(137, 1, 137);
INSERT INTO `CircleUpdate` VALUES(138, 1, 138);
INSERT INTO `CircleUpdate` VALUES(139, 2, 139);
INSERT INTO `CircleUpdate` VALUES(140, 18, 140);
INSERT INTO `CircleUpdate` VALUES(141, 1, 141);
INSERT INTO `CircleUpdate` VALUES(142, 2, 142);
INSERT INTO `CircleUpdate` VALUES(143, 1, 143);
INSERT INTO `CircleUpdate` VALUES(144, 1, 144);
INSERT INTO `CircleUpdate` VALUES(145, 1, 145);
INSERT INTO `CircleUpdate` VALUES(146, 1, 146);
INSERT INTO `CircleUpdate` VALUES(147, 1, 147);
INSERT INTO `CircleUpdate` VALUES(148, 1, 148);
INSERT INTO `CircleUpdate` VALUES(149, 1, 149);
INSERT INTO `CircleUpdate` VALUES(150, 1, 150);
INSERT INTO `CircleUpdate` VALUES(151, 1, 151);
INSERT INTO `CircleUpdate` VALUES(152, 1, 152);
INSERT INTO `CircleUpdate` VALUES(153, 1, 153);
INSERT INTO `CircleUpdate` VALUES(154, 2, 154);
INSERT INTO `CircleUpdate` VALUES(155, 1, 155);
INSERT INTO `CircleUpdate` VALUES(156, 1, 156);
INSERT INTO `CircleUpdate` VALUES(157, 1, 157);
INSERT INTO `CircleUpdate` VALUES(158, 1, 158);
INSERT INTO `CircleUpdate` VALUES(159, 1, 159);
INSERT INTO `CircleUpdate` VALUES(160, 1, 160);
INSERT INTO `CircleUpdate` VALUES(161, 1, 161);
INSERT INTO `CircleUpdate` VALUES(162, 1, 162);
INSERT INTO `CircleUpdate` VALUES(163, 1, 163);
INSERT INTO `CircleUpdate` VALUES(164, 1, 164);
INSERT INTO `CircleUpdate` VALUES(165, 1, 165);
INSERT INTO `CircleUpdate` VALUES(166, 1, 166);
INSERT INTO `CircleUpdate` VALUES(167, 1, 167);
INSERT INTO `CircleUpdate` VALUES(168, 1, 168);
INSERT INTO `CircleUpdate` VALUES(169, 1, 169);
INSERT INTO `CircleUpdate` VALUES(170, 1, 170);
INSERT INTO `CircleUpdate` VALUES(171, 1, 171);
INSERT INTO `CircleUpdate` VALUES(172, 1, 172);
INSERT INTO `CircleUpdate` VALUES(173, 2, 173);
INSERT INTO `CircleUpdate` VALUES(174, 16, 174);
INSERT INTO `CircleUpdate` VALUES(175, 16, 175);
INSERT INTO `CircleUpdate` VALUES(176, 16, 176);

-- --------------------------------------------------------

--
-- Table structure for table `Circles`
--

CREATE TABLE `Circles` (
  `ID` int(11) NOT NULL auto_increment,
  `circleNick` varchar(20) default NULL,
  `circleName` varchar(100) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Circles`
--

INSERT INTO `Circles` VALUES(1, 'all', 'All Students');
INSERT INTO `Circles` VALUES(2, 'xyzclub', 'xyzclub');
INSERT INTO `Circles` VALUES(18, 'abcclub', 'abc club');
INSERT INTO `Circles` VALUES(16, 'mac', 'mob');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `facultyID` int(11) NOT NULL auto_increment,
  `userName` varchar(20) default NULL,
  `firstName` varchar(20) default NULL,
  `lastName` varchar(20) default NULL,
  `password` text,
  `regID` text,
  `uniqueCode` varchar(20) default NULL,
  PRIMARY KEY  (`facultyID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Faculty`
--


-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `ID` int(11) NOT NULL auto_increment,
  `userID` int(11) default NULL,
  `circleID` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` VALUES(82, 20, 16);
INSERT INTO `Members` VALUES(68, 20, 18);

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `ID` int(11) NOT NULL auto_increment,
  `mess` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` VALUES(2, 1, 'Monday', 'A Monday Breakfast', 'A Monday Lunch', 'A Monday Snacks', 'A Monday Dinner');
INSERT INTO `Menu` VALUES(3, 1, 'Tuesday', 'A Tuesday Breakfast', 'A Tuesday Lunch', 'A Tuesday Snacks', 'A Tuesday Dinner');
INSERT INTO `Menu` VALUES(4, 1, 'Wednesday', 'A Wednesday Breakfast', 'A Wednesday Lunch', 'A Wednesday Snacks', 'A Wednesday Dinner');
INSERT INTO `Menu` VALUES(5, 1, 'Thursday', 'A Thursday Breakfast', 'A Thursday Lunch', 'A Thursday Snacks', 'A Thursday Dinner');
INSERT INTO `Menu` VALUES(6, 1, 'Friday', 'A Friday Breakfast', 'A Friday Lunch', 'A Friday Snacks', 'A Friday Dinner');
INSERT INTO `Menu` VALUES(7, 1, 'Saturday', 'A Saturday Breakfast', 'A Saturday Lunch', 'A Saturday Snacks', 'A Saturday Dinner');
INSERT INTO `Menu` VALUES(8, 1, 'Sunday', 'A Sunday Breakfast', 'A Sunday Lunch', 'A Sunday Snacks', 'A Sunday Dinner');
INSERT INTO `Menu` VALUES(9, 2, 'Monday', 'C Monday Breakfast', 'C Monday Lunch', 'C Monday Snacks', 'C Monday Dinner');
INSERT INTO `Menu` VALUES(10, 2, 'Tuesday', 'C Tuesday Breakfast', 'C Tuesday Lunch', 'C Tuesday Snacks', 'C Tuesday Dinner');
INSERT INTO `Menu` VALUES(11, 2, 'Wednesday', 'C Wednesday Breakfast', 'C Wednesday Lunch', 'C Wednesday Snacks', 'C Wednesday Dinner');
INSERT INTO `Menu` VALUES(12, 2, 'Thursday', 'C Thursday Breakfast', 'C Thursday Lunch', 'C Thursday Snacks', 'C Thursday Dinner');
INSERT INTO `Menu` VALUES(13, 2, 'Friday', 'C Friday Breakfast', 'C Friday Lunch', 'C Friday Snacks', 'C Friday Dinner');
INSERT INTO `Menu` VALUES(14, 2, 'Saturday', 'C Saturday Breakfast', 'C Saturday Lunch', 'C Saturday Snacks', 'C Saturday Dinner');
INSERT INTO `Menu` VALUES(15, 2, 'Sunday', 'C Sunday Breakfast', 'C Sunday Lunch', 'C Sunday Snacks', 'C Sunday Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `Mess`
--

CREATE TABLE `Mess` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Mess`
--

INSERT INTO `Mess` VALUES(1, 'amess', 'amess');
INSERT INTO `Mess` VALUES(2, 'cmess', 'cmess');
INSERT INTO `Mess` VALUES(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `SpecialAdmins`
--

CREATE TABLE `SpecialAdmins` (
  `userID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SpecialAdmins`
--

INSERT INTO `SpecialAdmins` VALUES(20);

-- --------------------------------------------------------

--
-- Table structure for table `Statuses`
--

CREATE TABLE `Statuses` (
  `ID` int(11) NOT NULL auto_increment,
  `statusName` varchar(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Statuses`
--

INSERT INTO `Statuses` VALUES(3, 'Rejected');
INSERT INTO `Statuses` VALUES(2, 'Pending');
INSERT INTO `Statuses` VALUES(1, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `Updates`
--

CREATE TABLE `Updates` (
  `ID` int(11) NOT NULL auto_increment,
  `updateHead` varchar(50) default NULL,
  `updateBody` varchar(120) default NULL,
  `updateAuthor` varchar(20) default NULL,
  `updateStatus` int(11) default NULL,
  `timestamp` varchar(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `Updates`
--

INSERT INTO `Updates` VALUES(10, 'Head 2', 'Body 2', 'pqr', 1, '1376644984');
INSERT INTO `Updates` VALUES(8, 'Head 2', 'Body 2', 'pqr', 1, '1376568378');
INSERT INTO `Updates` VALUES(7, 'pqrHead', 'pqrBody', 'pqr', 1, '1376550436');
INSERT INTO `Updates` VALUES(9, 'Head 2', 'Body 2', 'pqr', 1, '1376588175');
INSERT INTO `Updates` VALUES(11, 'Head 2', 'Body 2', 'pqr', 3, '1376645159');
INSERT INTO `Updates` VALUES(12, 'Head 2', 'Body 2', 'pqr', 3, '1376649044');
INSERT INTO `Updates` VALUES(13, 'Head 2', 'Body 2', 'pqr', 1, '1376649099');
INSERT INTO `Updates` VALUES(14, 'Head', 'Body', 'f2012087', 1, '1377371541');
INSERT INTO `Updates` VALUES(15, 'allHead', 'allBody', 'abc', 1, '1377970302');
INSERT INTO `Updates` VALUES(16, 'BITSApp test', 'BITSApp is under construction', 'abc', 1, '1378031907');
INSERT INTO `Updates` VALUES(17, 'Dd', 'S', 'f2012087', 1, '1378910767');
INSERT INTO `Updates` VALUES(18, 'Gg', 'Gg', 'f2012087', 1, '1378911133');
INSERT INTO `Updates` VALUES(19, 'G', 'D', 'f2012087', 1, '1378911432');
INSERT INTO `Updates` VALUES(20, 'G', 'G', 'f2012087', 1, '1378911679');
INSERT INTO `Updates` VALUES(21, 'Ss', 'A', 'f2012087', 1, '1378976166');
INSERT INTO `Updates` VALUES(22, 'Sd', 'Aa', 'f2012087', 1, '1378976289');
INSERT INTO `Updates` VALUES(23, 'Gg', 'Gg', 'f2012087', 1, '1378979074');
INSERT INTO `Updates` VALUES(24, 'Gf', 'Rr', 'f2012087', 1, '1378979212');
INSERT INTO `Updates` VALUES(25, 'Fg', 'Nn', 'f2012087', 1, '1378979300');
INSERT INTO `Updates` VALUES(26, 'Ff', 'Gg', 'f2012087', 1, '1378979410');
INSERT INTO `Updates` VALUES(27, 'M', 'N', 'f2012087', 1, '1378979433');
INSERT INTO `Updates` VALUES(28, 'G', 'F', 'f2012087', 1, '1378979801');
INSERT INTO `Updates` VALUES(29, 'Hs', 'Dh', 'f2012087', 1, '1378979868');
INSERT INTO `Updates` VALUES(30, 'T', 'G', 'f2012087', 1, '1378980000');
INSERT INTO `Updates` VALUES(31, 'T', 'G', 'f2012087', 1, '1378980042');
INSERT INTO `Updates` VALUES(32, 'BITSApp test', 'BITSApp is under construction', 'asdf', 1, '1379665167');
INSERT INTO `Updates` VALUES(33, 'BITSApp test', 'BITSApp is under construction', 'asdf', 1, '1379666012');
INSERT INTO `Updates` VALUES(34, 'BITSApp test', 'BITSApp is under construction', 'asdf', 3, '1379668203');
INSERT INTO `Updates` VALUES(35, 'BITSApp test', 'BITSApp is under construction', 'asdf', 3, '1379668603');
INSERT INTO `Updates` VALUES(36, 'BITSApp test', 'BITSApp is under construction', 'asdf', 3, '1379668853');
INSERT INTO `Updates` VALUES(37, 'BITSApp test', 'BITSApp is under construction', 'asdf', 1, '1379669151');
INSERT INTO `Updates` VALUES(38, 'Oops', 'Under', 'f2012087', 1, '1379746404');
INSERT INTO `Updates` VALUES(39, 'Oops', 'Under', 'f2012087', 1, '1379746410');
INSERT INTO `Updates` VALUES(40, 'Cc', 'Hv', 'f2012087', 1, '1379817550');
INSERT INTO `Updates` VALUES(41, 'BITSApp test 1', 'BITSApp is under construction', 'abc', 1, '1379917834');
INSERT INTO `Updates` VALUES(42, 'BITSApp test 2', 'BITSApp is under construction', 'abc', 1, '1379917853');
INSERT INTO `Updates` VALUES(43, 'BITSApp test 3', 'BITSApp is under construction', 'abc', 1, '1379917862');
INSERT INTO `Updates` VALUES(44, 'BITSApp test 1', 'BITSApp is under construction', 'abc', 1, '1379917992');
INSERT INTO `Updates` VALUES(45, 'BITSApp test 2', 'BITSApp is under construction', 'abc', 1, '1379917997');
INSERT INTO `Updates` VALUES(46, 'BITSApp test 3', 'BITSApp is under construction', 'abc', 1, '1379918001');
INSERT INTO `Updates` VALUES(47, 'BITSApp test 1', 'BITSApp is under construction', 'asdf', 3, '1379919227');
INSERT INTO `Updates` VALUES(48, 'BITSApp test 2', 'BITSApp is under construction', 'asdf', 1, '1379919233');
INSERT INTO `Updates` VALUES(49, 'BITSApp test 3', 'BITSApp is under construction', 'asdf', 2, '1379919238');
INSERT INTO `Updates` VALUES(50, 'BITSApp test 3', 'BITSApp is under construction', 'asdf', 1, '1379927354');
INSERT INTO `Updates` VALUES(51, 'BITSApp test 3', 'BITSApp is under construction', 'asdf', 1, '1379929312');
INSERT INTO `Updates` VALUES(52, 'BITSApp test 2', 'BITSApp is under construction', 'asdf', 3, '1379929560');
INSERT INTO `Updates` VALUES(53, 'BITSApp test 4', 'BITSApp is under construction', 'asdf', 1, '1379930100');
INSERT INTO `Updates` VALUES(54, 'BITSApp test 4', 'BITSApp is under construction', 'asdf', 1, '1379942526');
INSERT INTO `Updates` VALUES(55, 'BITSApp test 5', 'BITSApp is under construction', 'asdf', 3, '1379942901');
INSERT INTO `Updates` VALUES(56, 'BITSApp test 6', 'BITSApp is under construction', 'asdf', 1, '1379942906');
INSERT INTO `Updates` VALUES(57, 'BITSApp test 7', 'BITSApp is under construction', 'asdf', 1, '1379943181');
INSERT INTO `Updates` VALUES(58, 'BITSApp test 8', 'BITSApp is under construction', 'asdf', 3, '1379943187');
INSERT INTO `Updates` VALUES(59, 'Head 20', 'Body', 'f2012087', 1, '1380298526');
INSERT INTO `Updates` VALUES(60, 'G', 'T', 'f2012087', 1, '1380299021');
INSERT INTO `Updates` VALUES(61, 'F', 'F', 'f2012087', 1, '1380299038');
INSERT INTO `Updates` VALUES(62, 'F', 'C', 'f2012087', 1, '1380299060');
INSERT INTO `Updates` VALUES(63, 'Using a really long heading', 'Testing with a really really really long body.', 'f2012087', 1, '1380305687');
INSERT INTO `Updates` VALUES(64, 'Using a very big and long heading possible in the', 'Using a very big and long heading possible in the Using a very big and long heading possible in the Using a very big and', 'f2012087', 1, '1380305790');
INSERT INTO `Updates` VALUES(65, 'Update 9/10', 'Update 9/10', 'f2012087', 1, '1381341135');
INSERT INTO `Updates` VALUES(66, 'Update 8', 'Body 8', 'f2012087', 1, '1381341770');
INSERT INTO `Updates` VALUES(67, 'Update 9', 'Body 9', 'f2012087', 1, '1381378609');
INSERT INTO `Updates` VALUES(68, 'Update 9', 'Body 9', 'f2012087', 1, '1381378805');
INSERT INTO `Updates` VALUES(69, 'Gidaddy', 'Test', 'f2012087', 1, '1384709977');
INSERT INTO `Updates` VALUES(70, 'asknlf', 'aklsnfnl', 'f2012087', 1, '1384712802');
INSERT INTO `Updates` VALUES(71, 'asknlf', 'aklsnfnl', 'f2012087', 1, '1384712903');
INSERT INTO `Updates` VALUES(72, 'aslf', 'alksnf', 'f2012087', 1, '1384756747');
INSERT INTO `Updates` VALUES(73, 'aslf', 'alksnf', 'f2012087', 1, '1384757023');
INSERT INTO `Updates` VALUES(74, 'aslf', 'alksnf', 'f2012087', 1, '1384757106');
INSERT INTO `Updates` VALUES(75, 'aslf', 'alksnf', 'f2012087', 1, '1384757183');
INSERT INTO `Updates` VALUES(76, 'aslf', 'alksnf', 'f2012087', 1, '1384757342');
INSERT INTO `Updates` VALUES(77, 'aslf', 'alksnf', 'f2012087', 1, '1384757445');
INSERT INTO `Updates` VALUES(78, 'sajfvh', 'askhvfabf', 'f2012087', 1, '1384871247');
INSERT INTO `Updates` VALUES(79, 'ajsbf', 'alsbf', 'f2012087', 1, '1384872221');
INSERT INTO `Updates` VALUES(80, 'any head', 'anybody', 'f2012087', 1, '1384872845');
INSERT INTO `Updates` VALUES(81, 'any head', 'anybody', 'f2012087', 1, '1384872845');
INSERT INTO `Updates` VALUES(82, 'please go', 'ja', 'f2012087', 1, '1384873216');
INSERT INTO `Updates` VALUES(83, 'please go', 'any bodu', 'f2012087', 1, '1384873392');
INSERT INTO `Updates` VALUES(84, 'anyhhead', 'askhf', 'f2012087', 1, '1384873787');
INSERT INTO `Updates` VALUES(85, 'Head test', 'Body test', 'f2012087', 1, '1384960334');
INSERT INTO `Updates` VALUES(86, 'Head', 'Body', 'f2012087', 1, '1384966453');
INSERT INTO `Updates` VALUES(87, 'Head', 'Body', 'f2012087', 1, '1385113921');
INSERT INTO `Updates` VALUES(88, 'Head', 'Body', 'f2012087', 1, '1385215673');
INSERT INTO `Updates` VALUES(89, 'Ghanta', 'Body', 'f2012087', 1, '1385216203');
INSERT INTO `Updates` VALUES(90, 'Head', 'Body', 'f2012087', 1, '1385216747');
INSERT INTO `Updates` VALUES(91, 'new update', 'new body', 'f2012087', 1, '1385217461');
INSERT INTO `Updates` VALUES(92, 'new update', 'new body', 'f2012087', 1, '1385217651');
INSERT INTO `Updates` VALUES(93, 'Head test', 'Body test', 'f2012087', 1, '1385217916');
INSERT INTO `Updates` VALUES(94, 'Head', 'Body', 'f2012087', 1, '1385281583');
INSERT INTO `Updates` VALUES(95, 'Heading', 'Body', 'f2012087', 1, '1385281649');
INSERT INTO `Updates` VALUES(96, 'Hj', 'Dd', 'f2012087', 1, '1385282623');
INSERT INTO `Updates` VALUES(97, 'anything', 'anythingnew', 'f2012087', 1, '1385307591');
INSERT INTO `Updates` VALUES(98, 'Head', 'Body', 'f2012087', 1, '1385333233');
INSERT INTO `Updates` VALUES(99, 'Test head', 'Body', 'f2012087', 1, '1385348975');
INSERT INTO `Updates` VALUES(100, 'Head', 'Body', 'f2012087', 1, '1385349790');
INSERT INTO `Updates` VALUES(101, 'Using a really really long heading. Just for tests', 'Lauda lasun lauda lasun lauda lasun Lauda lasun lauda lasun lauda lasun Lauda lasun lauda lasun lauda lasun Lauda lasun', 'f2012087', 1, '1386121435');
INSERT INTO `Updates` VALUES(102, 'Head', 'Body', 'f2012087', 1, '1386135312');
INSERT INTO `Updates` VALUES(103, 'Head', 'Body', 'f2012087', 1, '1386135784');
INSERT INTO `Updates` VALUES(104, 'Head', 'Body', 'f2012087', 1, '1386178856');
INSERT INTO `Updates` VALUES(105, 'Head gen', 'Body gen', 'f2012087', 1, '1386179035');
INSERT INTO `Updates` VALUES(106, 'Big notif test', 'This is some stupid notification test', 'f2012087', 1, '1390153280');
INSERT INTO `Updates` VALUES(107, 'Stupid head', 'Testing long notification body', 'f2012087', 1, '1390154851');
INSERT INTO `Updates` VALUES(108, 'Heading', 'Testing long notification body', 'f2012087', 1, '1390156233');
INSERT INTO `Updates` VALUES(109, 'Glory glory man united', 'Jai Mata Di', 'f2012087', 1, '1391540464');
INSERT INTO `Updates` VALUES(110, 'Glory glory man united', 'Jai Mata Di', 'f2012087', 1, '1391540776');
INSERT INTO `Updates` VALUES(111, 'Head', 'Body', 'f2012087', 1, '1391802401');
INSERT INTO `Updates` VALUES(112, 'Head', 'Body', 'f2012087', 1, '1391876085');
INSERT INTO `Updates` VALUES(113, 'HeadC', 'Body', 'f2012087', 1, '1391876188');
INSERT INTO `Updates` VALUES(114, 'Head', 'Body', 'f2012694', 3, '1391879333');
INSERT INTO `Updates` VALUES(115, 'Head', 'Body', 'f2012694', 1, '1391879559');
INSERT INTO `Updates` VALUES(116, 'Head', 'Body', 'f2012087', 1, '1391896243');
INSERT INTO `Updates` VALUES(117, 'Fgcc', 'Xx', 'f2012087', 1, '1391906893');
INSERT INTO `Updates` VALUES(118, 'Fgv', 'Xx', 'f2012087', 1, '1391907016');
INSERT INTO `Updates` VALUES(119, 'Hdj', 'Gdh', 'f2012087', 1, '1391907209');
INSERT INTO `Updates` VALUES(120, 'Dhd', 'Hshs', 'f2012087', 1, '1391907390');
INSERT INTO `Updates` VALUES(121, 'Hdhd', 'Hs', 'f2012087', 1, '1391907523');
INSERT INTO `Updates` VALUES(122, 'Hdhd', 'Hs', 'f2012087', 1, '1391907554');
INSERT INTO `Updates` VALUES(123, 'Gg', 'Fg', 'f2012087', 1, '1391907755');
INSERT INTO `Updates` VALUES(124, 'D', 'G', 'f2012087', 1, '1391907905');
INSERT INTO `Updates` VALUES(125, 'Ga', 'Gd', 'f2012087', 1, '1391908013');
INSERT INTO `Updates` VALUES(126, 'Fh', 'Fg', 'f2012087', 1, '1391908458');
INSERT INTO `Updates` VALUES(127, 'Hshs', 'Jzjd', 'f2012087', 1, '1391908953');
INSERT INTO `Updates` VALUES(128, 'Udjd', 'Hh', 'f2012087', 1, '1391908985');
INSERT INTO `Updates` VALUES(129, 'Hzjz', 'Bxb', 'f2012087', 1, '1391909022');
INSERT INTO `Updates` VALUES(130, 'Hh', 'Gh', 'f2012087', 1, '1391909466');
INSERT INTO `Updates` VALUES(131, 'Dg', 'Se', 'f2012087', 1, '1391910784');
INSERT INTO `Updates` VALUES(132, 'Dg', 'Cc', 'f2012087', 1, '1391911424');
INSERT INTO `Updates` VALUES(133, 'Vh', 'Cc', 'f2012087', 1, '1391911494');
INSERT INTO `Updates` VALUES(134, 'Dg', 'Ss', 'f2012087', 1, '1391911617');
INSERT INTO `Updates` VALUES(135, 'Vg', 'Fg', 'f2012087', 1, '1391912824');
INSERT INTO `Updates` VALUES(136, 'Zx', 'Xc', 'f2012087', 1, '1391912966');
INSERT INTO `Updates` VALUES(137, 'Dr', 'Ee', 'f2012087', 1, '1391913173');
INSERT INTO `Updates` VALUES(138, 'Ed', 'Cg', 'f2012087', 1, '1391914633');
INSERT INTO `Updates` VALUES(139, 'Ddrf', 'Xc', 'f2012087', 1, '1391914907');
INSERT INTO `Updates` VALUES(140, 'G', 'Xf', 'f2012087', 1, '1391915058');
INSERT INTO `Updates` VALUES(141, 'Fh', 'Gkk', 'f2012087', 1, '1391915696');
INSERT INTO `Updates` VALUES(142, 'Gjj', 'Hhj', 'f2012087', 1, '1391915716');
INSERT INTO `Updates` VALUES(143, 'Fgdjss', 'Xdg', 'f2012087', 1, '1392860061');
INSERT INTO `Updates` VALUES(144, 'Dgv', 'Sxx', 'f2012087', 1, '1392860080');
INSERT INTO `Updates` VALUES(145, 'Dd', 'Sdf', 'f2012087', 1, '1392860096');
INSERT INTO `Updates` VALUES(146, 'Dvb', 'Sx', 'f2012087', 1, '1392860113');
INSERT INTO `Updates` VALUES(147, 'Df', 'Dd', 'f2012087', 1, '1392860127');
INSERT INTO `Updates` VALUES(148, 'Dch', 'Dxb', 'f2012087', 1, '1392860162');
INSERT INTO `Updates` VALUES(149, 'Dc', 'D', 'f2012087', 1, '1392860191');
INSERT INTO `Updates` VALUES(150, 'Gh', 'Hh', 'f2012087', 1, '1392865113');
INSERT INTO `Updates` VALUES(151, 'Hsjd', 'Dj', 'f2012087', 1, '1392874008');
INSERT INTO `Updates` VALUES(152, 'Ed', 'Rf', 'f2012087', 1, '1392874689');
INSERT INTO `Updates` VALUES(153, 'Vb', 'X', 'f2012087', 1, '1392940452');
INSERT INTO `Updates` VALUES(154, 'Nn', 'Vv', 'f2012087', 1, '1392940491');
INSERT INTO `Updates` VALUES(155, 'Bs', 'Bd', 'f2012087', 1, '1392945363');
INSERT INTO `Updates` VALUES(156, 'Jsjs', 'Fgs', 'f2012087', 1, '1393435197');
INSERT INTO `Updates` VALUES(157, 'Dc', 'Dc', 'f2012087', 1, '1393435328');
INSERT INTO `Updates` VALUES(158, 'Dfvnjd', 'Dghh', 'f2012087', 1, '1393435341');
INSERT INTO `Updates` VALUES(159, 'Rc', 'Ffj', 'f2012087', 1, '1393435356');
INSERT INTO `Updates` VALUES(160, 'Dvjjcs', 'Tgv', 'f2012087', 1, '1393435377');
INSERT INTO `Updates` VALUES(161, 'Vgd', 'Jlvf', 'f2012087', 1, '1393436576');
INSERT INTO `Updates` VALUES(162, 'Sd', 'Dd', 'f2012087', 1, '1393455781');
INSERT INTO `Updates` VALUES(163, 'Dd', 'Ddfgsdg', 'f2012087', 1, '1393455793');
INSERT INTO `Updates` VALUES(164, 'Fhj', 'Fgh', 'f2012087', 1, '1393455844');
INSERT INTO `Updates` VALUES(165, 'Ffd', 'C', 'f2012087', 1, '1393476588');
INSERT INTO `Updates` VALUES(166, 'Fbn', 'Fh', 'f2012087', 1, '1393477056');
INSERT INTO `Updates` VALUES(167, 'Test', 'By ayush', 'f2012694', 1, '1393478329');
INSERT INTO `Updates` VALUES(168, 'Gndkd', 'Ydh', 'f2012087', 1, '1393887773');
INSERT INTO `Updates` VALUES(169, 'Hbg', 'Gjiotff', 'f2012087', 1, '1393887789');
INSERT INTO `Updates` VALUES(170, 'Fbjkide', 'Fgh', 'f2012087', 1, '1393887814');
INSERT INTO `Updates` VALUES(171, 'Fddhiiugfrg', 'FD', 'f2012087', 1, '1393887833');
INSERT INTO `Updates` VALUES(172, 'Tgfffgyu', 'G', 'f2012087', 1, '1393887844');
INSERT INTO `Updates` VALUES(173, 'Test long heading', 'Another test body. Let\\''s see how the update looks like. This is a long body. A very long body. A very very  long body!!', 'f2012694', 1, '1394339680');
INSERT INTO `Updates` VALUES(174, 'Test heading', 'Test body', 'f2012694', 1, '1394339705');
INSERT INTO `Updates` VALUES(175, 'Test heading', 'Let\\''s test some msg/message.\n\\"Testing\\".', 'f2012694', 1, '1394349672');
INSERT INTO `Updates` VALUES(176, 'Test', 'Test \\"again\\".\n\\''Again\\''/again', 'f2012694', 1, '1394349748');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `serial` text NOT NULL,
  `firstName` varchar(20) default NULL,
  `lastName` varchar(20) default NULL,
  `password` text,
  `regIDGeneral` text,
  `regIDCircle` text NOT NULL,
  `regIDRest` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` VALUES(32, 'f2012408', '', 'Prabhat', 'Choudhary', '', 'APA91bGDnM_X-Xl2CKP4bThxwvlTtlIAqvVLbkw0fkBYot3FUpc6h07KcwxkupwpsUAWd4xkgxLxt4h7ObppiGnajjoUOPL3gfRtWuB3bEbGNJI32JU1CtKe4GyzJztNrsXtNC9WZWHogG5_Aa0PaqAKR4_izeF4rjpQICSiMNYwat-qSzlCnoE', 'APA91bHbPGskFVi8Z2t_daWCV1DgQo1SbNA8KzVDh662qP68gprBT_Q1QCLv9VhAse3JMMx5a4KzusjZlvIl4l6-uZ0Tb6-rOZl6O6_NykmEJT-yXvmcI2-KmAwvQw3aETW7xgDi-UwD3fKSaL05gHbyXvSbuyRBcdzg0xzneUQZgF2RkEG9cVc', 'APA91bEcp0oQXPKLpf21-FY82KMPXR1QT7q9Q1N9jRBddiqB-lBEUd1puWguU9O8g6qvcLWueKZhKBNzzXE4Wx1QS9fnDqiX5jweh9vJNz1fGNhsakvgZEwNsj9DV2lWj7jKc0mOEQvhgMogbseZhnbNSDLpsyILitvIeI6ZSivEP7_Qmp9mXR8');
INSERT INTO `Users` VALUES(20, 'f2012087', '123f2e7629e3595076ed87bf411e2c4dc0c7164a', 'Nisarg', 'Thakkar', '', 'APA91bHANzJ1hQ4W7ZhEDNdpHw1GsGoydC21iLbzGLlY7U5didb_r1FawMyvYcBh8MO_4aHemU-s2f9gX19u0IvAcrtrZtusbOVgphg66hiJna0OyOFsHyfI29zpo8EmhAdk9yp0SsmzYREauaJ9Ow_f975mwmersANPkPl1UxGLmtwk2ggx1wNxOvY3UGScMVOKNX8JJBFJ', 'APA91bHANzJ1hQ4W7ZhEDNdpHw1GsGoydC21iLbzGLlY7U5didb_r1FawMyvYcBh8MO_4aHemU-s2f9gX19u0IvAcrtrZtusbOVgphg66hiJna0OyOFsHyfI29zpo8EmhAdk9yp0SsmzYREauaJ9Ow_f975mwmersANPkPl1UxGLmtwk2ggx1wNxOvY3UGScMVOKNX8JJBFJ', 'APA91bHANzJ1hQ4W7ZhEDNdpHw1GsGoydC21iLbzGLlY7U5didb_r1FawMyvYcBh8MO_4aHemU-s2f9gX19u0IvAcrtrZtusbOVgphg66hiJna0OyOFsHyfI29zpo8EmhAdk9yp0SsmzYREauaJ9Ow_f975mwmersANPkPl1UxGLmtwk2ggx1wNxOvY3UGScMVOKNX8JJBFJ');
INSERT INTO `Users` VALUES(26, 'f2012694', '10e8f13b128fe7701b1b6146b0f42c3c52a6fd2e', 'Ayush', 'Kumar', '', 'APA91bE47lWwhoLThuZvDAs7FUFKBpY2nYhkuDNscAlfZgI6v03w3ytbJ2KEpWRGG_LIqPUfyeMySLkXVUYRmmjKSLuZAwJ7I4wvheSfWzu9oL7lNxNFUN5xtgdMZOaNxVZprs6sXw53H9EQmWV-p_H7FMIUJFGcJcWaKWScYF08aQM_ZmciOaA2SQy_c9TG3TwPzHiMHxPS', 'APA91bE47lWwhoLThuZvDAs7FUFKBpY2nYhkuDNscAlfZgI6v03w3ytbJ2KEpWRGG_LIqPUfyeMySLkXVUYRmmjKSLuZAwJ7I4wvheSfWzu9oL7lNxNFUN5xtgdMZOaNxVZprs6sXw53H9EQmWV-p_H7FMIUJFGcJcWaKWScYF08aQM_ZmciOaA2SQy_c9TG3TwPzHiMHxPS', 'APA91bE47lWwhoLThuZvDAs7FUFKBpY2nYhkuDNscAlfZgI6v03w3ytbJ2KEpWRGG_LIqPUfyeMySLkXVUYRmmjKSLuZAwJ7I4wvheSfWzu9oL7lNxNFUN5xtgdMZOaNxVZprs6sXw53H9EQmWV-p_H7FMIUJFGcJcWaKWScYF08aQM_ZmciOaA2SQy_c9TG3TwPzHiMHxPS');
INSERT INTO `Users` VALUES(27, 'f2012075', '', 'Kunal', 'Bajpai', '635147', '', '', '');
INSERT INTO `Users` VALUES(33, 'f2012553', '', 'Abhilash', 'Kumar', '', 'APA91bGVPFsfUaIs2AWzHE8mrjMkUlTpcuBxtFmuWhcowfa0NUZwb_eg4oH5tYDHVq-WvvtsSHrpvIMlOa0byLXEtAydXj2T1PqruPtyVUgcSQM-MhU-VCvH0oYj1YUf9adzcgVP5uGcN_gWFMrgnA2L20yovcPwQ6MzpE3SVYJVnkqZJxFpVVc', 'APA91bGIH59aAtnXZwqmXVKL2iPejKfj_KtvWeI-LNs1-sSkXgQ4IAwsXDkqhC8ow06M5ncoGwCsdmK4HVKwVI7tZPU9IhS4WEtSdkAsdMoU9ct4y4m0epH4-uhNYTSU5Q7btRkUVDemS9m1F1QHfoWt914HrzzjVyEeaj8OFaML7SFUlwgYYZc', 'APA91bEGWIePeJYzHgBtCMuSCSVPopNSARaIQfHz0hK4Jrf1Kh82bje9zYHt2R7KAQFVGZeTXRVuqbRv6zHRr22pQwYeIeM6Eq-TJlS56q_Qkek0U_4E1lB-fdaozeP2UaZKlXBXU_au5MuhoBrZecMt8qcVaMllj1pm1YRMPXx58RJY-x2eSfY');
