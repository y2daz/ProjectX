  -- phpMyAdmin SQL Dump
  -- version 4.0.10deb1
  -- http://www.phpmyadmin.net
  --
  -- Host: localhost
  -- Generation Time: Aug 06, 2014 at 02:10 PM
  -- Server version: 5.5.38-0ubuntu0.14.04.1
  -- PHP Version: 5.5.9-1ubuntu4.3

  DROP DATABASE IF EXISTS `manaDB`;

#   CREATE USER 'manaSystem'@'localhost' IDENTIFIED BY 'SMevHZxMEJVfv4Kc';
#
#   GRANT ALL PRIVILEGES ON manaDB.* TO 'manaSystem'@'localhost';
#
#   FLUSH PRIVILEGES;

#   CREATE USER 'manaReporting'@'localhost' IDENTIFIED BY 'eveA0njJ7pYsFC1M';
#
#   GRANT SELECT, FILE, CREATE TEMPORARY TABLES, CREATE VIEW, SHOW VIEW ON manaDB.* TO 'manaReporting'@'localhost' IDENTIFIED BY 'eveA0njJ7pYsFC1M' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
#
#   FLUSH PRIVILEGES;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2014 at 11:06 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET AUTOCOMMIT = 0;
  START TRANSACTION;
  SET time_zone = "+00:00";

--
-- Database: `manaDB`
--
CREATE DATABASE IF NOT EXISTS `manaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
  USE `manaDB`;

-- --------------------------------------------------------

--
-- Table structure for table `ALMarks`
--

  CREATE TABLE IF NOT EXISTS `ALMarks` (
    `IndexNo` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) DEFAULT NULL,
    `Year` int(11) NOT NULL,
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `Grade` varchar(2) DEFAULT NULL,
    PRIMARY KEY (`IndexNo`,`Subject`),
    KEY `AdmissionNo` (`AdmissionNo`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ApplyLeave`
--

  CREATE TABLE IF NOT EXISTS `ApplyLeave` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `RequestDate` date DEFAULT NULL,
    `StartDate` date NOT NULL DEFAULT '0000-00-00',
    `EndDate` date DEFAULT NULL,
    `LeaveType` int(11) DEFAULT NULL,
    `OtherInformation` varchar(200) DEFAULT NULL,
    `Status` int(11) DEFAULT NULL,
    `ReviewedBy` varchar(5) DEFAULT NULL,
    `ReviewedDate` date DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`,`StartDate`),
    KEY `fk013` (`ReviewedBy`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

  CREATE TABLE IF NOT EXISTS `Attendance` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `Year` int(11) NOT NULL DEFAULT '0',
    `A0` bit(1) DEFAULT NULL,
    `A1` bit(1) DEFAULT NULL,
    `A2` bit(1) DEFAULT NULL,
    `A3` bit(1) DEFAULT NULL,
    `A4` bit(1) DEFAULT NULL,
    `A5` bit(1) DEFAULT NULL,
    `A6` bit(1) DEFAULT NULL,
    `A7` bit(1) DEFAULT NULL,
    `A8` bit(1) DEFAULT NULL,
    `A9` bit(1) DEFAULT NULL,
    `A10` bit(1) DEFAULT NULL,
    `A11` bit(1) DEFAULT NULL,
    `A12` bit(1) DEFAULT NULL,
    `A13` bit(1) DEFAULT NULL,
    `A14` bit(1) DEFAULT NULL,
    `A15` bit(1) DEFAULT NULL,
    `A16` bit(1) DEFAULT NULL,
    `A17` bit(1) DEFAULT NULL,
    `A18` bit(1) DEFAULT NULL,
    `A19` bit(1) DEFAULT NULL,
    `A20` bit(1) DEFAULT NULL,
    `A21` bit(1) DEFAULT NULL,
    `A22` bit(1) DEFAULT NULL,
    `A23` bit(1) DEFAULT NULL,
    `A24` bit(1) DEFAULT NULL,
    `A25` bit(1) DEFAULT NULL,
    `B0` bit(1) DEFAULT NULL,
    `B1` bit(1) DEFAULT NULL,
    `B2` bit(1) DEFAULT NULL,
    `B3` bit(1) DEFAULT NULL,
    `B4` bit(1) DEFAULT NULL,
    `B5` bit(1) DEFAULT NULL,
    `B6` bit(1) DEFAULT NULL,
    `B7` bit(1) DEFAULT NULL,
    `B8` bit(1) DEFAULT NULL,
    `B9` bit(1) DEFAULT NULL,
    `B10` bit(1) DEFAULT NULL,
    `B11` bit(1) DEFAULT NULL,
    `B12` bit(1) DEFAULT NULL,
    `B13` bit(1) DEFAULT NULL,
    `B14` bit(1) DEFAULT NULL,
    `B15` bit(1) DEFAULT NULL,
    `B16` bit(1) DEFAULT NULL,
    `B17` bit(1) DEFAULT NULL,
    `B18` bit(1) DEFAULT NULL,
    `B19` bit(1) DEFAULT NULL,
    `B20` bit(1) DEFAULT NULL,
    `B21` bit(1) DEFAULT NULL,
    `B22` bit(1) DEFAULT NULL,
    `B23` bit(1) DEFAULT NULL,
    `B24` bit(1) DEFAULT NULL,
    `B25` bit(1) DEFAULT NULL,
    `C0` bit(1) DEFAULT NULL,
    `C1` bit(1) DEFAULT NULL,
    `C2` bit(1) DEFAULT NULL,
    `C3` bit(1) DEFAULT NULL,
    `C4` bit(1) DEFAULT NULL,
    `C5` bit(1) DEFAULT NULL,
    `C6` bit(1) DEFAULT NULL,
    `C7` bit(1) DEFAULT NULL,
    `C8` bit(1) DEFAULT NULL,
    `C9` bit(1) DEFAULT NULL,
    `C10` bit(1) DEFAULT NULL,
    `C11` bit(1) DEFAULT NULL,
    `C12` bit(1) DEFAULT NULL,
    `C13` bit(1) DEFAULT NULL,
    `C14` bit(1) DEFAULT NULL,
    `C15` bit(1) DEFAULT NULL,
    `C16` bit(1) DEFAULT NULL,
    `C17` bit(1) DEFAULT NULL,
    `C18` bit(1) DEFAULT NULL,
    `C19` bit(1) DEFAULT NULL,
    `C20` bit(1) DEFAULT NULL,
    `C21` bit(1) DEFAULT NULL,
    `C22` bit(1) DEFAULT NULL,
    `C23` bit(1) DEFAULT NULL,
    `C24` bit(1) DEFAULT NULL,
    `C25` bit(1) DEFAULT NULL,
    `D0` bit(1) DEFAULT NULL,
    `D1` bit(1) DEFAULT NULL,
    `D2` bit(1) DEFAULT NULL,
    `D3` bit(1) DEFAULT NULL,
    `D4` bit(1) DEFAULT NULL,
    `D5` bit(1) DEFAULT NULL,
    `D6` bit(1) DEFAULT NULL,
    `D7` bit(1) DEFAULT NULL,
    `D8` bit(1) DEFAULT NULL,
    `D9` bit(1) DEFAULT NULL,
    `D10` bit(1) DEFAULT NULL,
    `D11` bit(1) DEFAULT NULL,
    `D12` bit(1) DEFAULT NULL,
    `D13` bit(1) DEFAULT NULL,
    `D14` bit(1) DEFAULT NULL,
    `D15` bit(1) DEFAULT NULL,
    `D16` bit(1) DEFAULT NULL,
    `D17` bit(1) DEFAULT NULL,
    `D18` bit(1) DEFAULT NULL,
    `D19` bit(1) DEFAULT NULL,
    `D20` bit(1) DEFAULT NULL,
    `D21` bit(1) DEFAULT NULL,
    `D22` bit(1) DEFAULT NULL,
    `D23` bit(1) DEFAULT NULL,
    `D24` bit(1) DEFAULT NULL,
    `D25` bit(1) DEFAULT NULL,
    `E0` bit(1) DEFAULT NULL,
    `E1` bit(1) DEFAULT NULL,
    `E2` bit(1) DEFAULT NULL,
    `E3` bit(1) DEFAULT NULL,
    `E4` bit(1) DEFAULT NULL,
    `E5` bit(1) DEFAULT NULL,
    `E6` bit(1) DEFAULT NULL,
    `E7` bit(1) DEFAULT NULL,
    `E8` bit(1) DEFAULT NULL,
    `E9` bit(1) DEFAULT NULL,
    `E10` bit(1) DEFAULT NULL,
    `E11` bit(1) DEFAULT NULL,
    `E12` bit(1) DEFAULT NULL,
    `E13` bit(1) DEFAULT NULL,
    `E14` bit(1) DEFAULT NULL,
    `E15` bit(1) DEFAULT NULL,
    `E16` bit(1) DEFAULT NULL,
    `E17` bit(1) DEFAULT NULL,
    `E18` bit(1) DEFAULT NULL,
    `E19` bit(1) DEFAULT NULL,
    `E20` bit(1) DEFAULT NULL,
    `E21` bit(1) DEFAULT NULL,
    `E22` bit(1) DEFAULT NULL,
    `E23` bit(1) DEFAULT NULL,
    `E24` bit(1) DEFAULT NULL,
    `E25` bit(1) DEFAULT NULL,
    `F0` bit(1) DEFAULT NULL,
    `F1` bit(1) DEFAULT NULL,
    `F2` bit(1) DEFAULT NULL,
    `F3` bit(1) DEFAULT NULL,
    `F4` bit(1) DEFAULT NULL,
    `F5` bit(1) DEFAULT NULL,
    `F6` bit(1) DEFAULT NULL,
    `F7` bit(1) DEFAULT NULL,
    `F8` bit(1) DEFAULT NULL,
    `F9` bit(1) DEFAULT NULL,
    `F10` bit(1) DEFAULT NULL,
    `F11` bit(1) DEFAULT NULL,
    `F12` bit(1) DEFAULT NULL,
    `F13` bit(1) DEFAULT NULL,
    `F14` bit(1) DEFAULT NULL,
    `F15` bit(1) DEFAULT NULL,
    `F16` bit(1) DEFAULT NULL,
    `F17` bit(1) DEFAULT NULL,
    `F18` bit(1) DEFAULT NULL,
    `F19` bit(1) DEFAULT NULL,
    `F20` bit(1) DEFAULT NULL,
    `F21` bit(1) DEFAULT NULL,
    `F22` bit(1) DEFAULT NULL,
    `F23` bit(1) DEFAULT NULL,
    `F24` bit(1) DEFAULT NULL,
    `F25` bit(1) DEFAULT NULL,
    `G0` bit(1) DEFAULT NULL,
    `G1` bit(1) DEFAULT NULL,
    `G2` bit(1) DEFAULT NULL,
    `G3` bit(1) DEFAULT NULL,
    `G4` bit(1) DEFAULT NULL,
    `G5` bit(1) DEFAULT NULL,
    `G6` bit(1) DEFAULT NULL,
    `G7` bit(1) DEFAULT NULL,
    `G8` bit(1) DEFAULT NULL,
    `G9` bit(1) DEFAULT NULL,
    `G10` bit(1) DEFAULT NULL,
    `G11` bit(1) DEFAULT NULL,
    `G12` bit(1) DEFAULT NULL,
    `G13` bit(1) DEFAULT NULL,
    `G14` bit(1) DEFAULT NULL,
    `G15` bit(1) DEFAULT NULL,
    `G16` bit(1) DEFAULT NULL,
    `G17` bit(1) DEFAULT NULL,
    `G18` bit(1) DEFAULT NULL,
    `G19` bit(1) DEFAULT NULL,
    `G20` bit(1) DEFAULT NULL,
    `G21` bit(1) DEFAULT NULL,
    `G22` bit(1) DEFAULT NULL,
    `G23` bit(1) DEFAULT NULL,
    `G24` bit(1) DEFAULT NULL,
    `G25` bit(1) DEFAULT NULL,
    `H0` bit(1) DEFAULT NULL,
    `H1` bit(1) DEFAULT NULL,
    `H2` bit(1) DEFAULT NULL,
    `H3` bit(1) DEFAULT NULL,
    `H4` bit(1) DEFAULT NULL,
    `H5` bit(1) DEFAULT NULL,
    `H6` bit(1) DEFAULT NULL,
    `H7` bit(1) DEFAULT NULL,
    `H8` bit(1) DEFAULT NULL,
    `H9` bit(1) DEFAULT NULL,
    `H10` bit(1) DEFAULT NULL,
    `H11` bit(1) DEFAULT NULL,
    `H12` bit(1) DEFAULT NULL,
    `H13` bit(1) DEFAULT NULL,
    `H14` bit(1) DEFAULT NULL,
    `H15` bit(1) DEFAULT NULL,
    `H16` bit(1) DEFAULT NULL,
    `H17` bit(1) DEFAULT NULL,
    `H18` bit(1) DEFAULT NULL,
    `H19` bit(1) DEFAULT NULL,
    `H20` bit(1) DEFAULT NULL,
    `H21` bit(1) DEFAULT NULL,
    `H22` bit(1) DEFAULT NULL,
    `H23` bit(1) DEFAULT NULL,
    `H24` bit(1) DEFAULT NULL,
    `H25` bit(1) DEFAULT NULL,
    `I0` bit(1) DEFAULT NULL,
    `I1` bit(1) DEFAULT NULL,
    `I2` bit(1) DEFAULT NULL,
    `I3` bit(1) DEFAULT NULL,
    `I4` bit(1) DEFAULT NULL,
    `I5` bit(1) DEFAULT NULL,
    `I6` bit(1) DEFAULT NULL,
    `I7` bit(1) DEFAULT NULL,
    `I8` bit(1) DEFAULT NULL,
    `I9` bit(1) DEFAULT NULL,
    `I10` bit(1) DEFAULT NULL,
    `I11` bit(1) DEFAULT NULL,
    `I12` bit(1) DEFAULT NULL,
    `I13` bit(1) DEFAULT NULL,
    `I14` bit(1) DEFAULT NULL,
    `I15` bit(1) DEFAULT NULL,
    `I16` bit(1) DEFAULT NULL,
    `I17` bit(1) DEFAULT NULL,
    `I18` bit(1) DEFAULT NULL,
    `I19` bit(1) DEFAULT NULL,
    `I20` bit(1) DEFAULT NULL,
    `I21` bit(1) DEFAULT NULL,
    `I22` bit(1) DEFAULT NULL,
    `I23` bit(1) DEFAULT NULL,
    `I24` bit(1) DEFAULT NULL,
    `I25` bit(1) DEFAULT NULL,
    `J0` bit(1) DEFAULT NULL,
    `J1` bit(1) DEFAULT NULL,
    `J2` bit(1) DEFAULT NULL,
    `J3` bit(1) DEFAULT NULL,
    `J4` bit(1) DEFAULT NULL,
    `J5` bit(1) DEFAULT NULL,
    `J6` bit(1) DEFAULT NULL,
    `J7` bit(1) DEFAULT NULL,
    `J8` bit(1) DEFAULT NULL,
    `J9` bit(1) DEFAULT NULL,
    `J10` bit(1) DEFAULT NULL,
    `J11` bit(1) DEFAULT NULL,
    `J12` bit(1) DEFAULT NULL,
    `J13` bit(1) DEFAULT NULL,
    `J14` bit(1) DEFAULT NULL,
    `J15` bit(1) DEFAULT NULL,
    `J16` bit(1) DEFAULT NULL,
    `J17` bit(1) DEFAULT NULL,
    `J18` bit(1) DEFAULT NULL,
    `J19` bit(1) DEFAULT NULL,
    `J20` bit(1) DEFAULT NULL,
    `J21` bit(1) DEFAULT NULL,
    `J22` bit(1) DEFAULT NULL,
    `J23` bit(1) DEFAULT NULL,
    `J24` bit(1) DEFAULT NULL,
    `J25` bit(1) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`Year`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Blacklist`
--

  CREATE TABLE IF NOT EXISTS `Blacklist` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `EnterDate` date NOT NULL DEFAULT '0000-00-00',
    `Reason` varchar(255) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`,`EnterDate`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ClassInformation`
--

  CREATE TABLE IF NOT EXISTS `ClassInformation` (
    `StaffID` varchar(5) DEFAULT NULL,
    `Grade` int(11) NOT NULL DEFAULT '0',
    `Class` char(2) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Grade`,`Class`),
    KEY `fk001` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

  CREATE TABLE IF NOT EXISTS `Event` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `Name` varchar(50) DEFAULT NULL,
    `Description` varchar(200) DEFAULT NULL,
    `Location` varchar(50) DEFAULT NULL,
    `Status` int(11) DEFAULT NULL,
    `EventDate` date DEFAULT NULL,
    `EventCreator` varchar(5) DEFAULT NULL,
    `StartTime` time DEFAULT NULL,
    `EndTime` time DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`),
    KEY `fk018` (`EventCreator`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Event`
--

  INSERT INTO `Event` VALUES(1, 'Prize Giving', 'For O/Level examinations', 'Main Auditorium', 0, '2014-08-14', '2', '15:20:00', '17:50:00', 0);
  INSERT INTO `Event` VALUES(2, 'Sports Meet', 'Inter House sports meet', 'Sugathadasa Stadium', 0, '2014-08-13', '1', '15:00:00', '20:00:00', 0);
  INSERT INTO `Event` VALUES(3, 'Junior Concert', 'Grades 1 to 5. Chief Guest Mr. Liyanage', 'Main Auditorium', 0, '2014-08-21', '1', '18:00:00', '20:00:00', 0);
  INSERT INTO `Event` VALUES(4, 'Founder''s Day', 'Walk around the school', 'School', 0, '2014-08-13', '2', '08:00:00', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `EventManager`
--

  CREATE TABLE IF NOT EXISTS `EventManager` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `ManagerName` varchar(30) NOT NULL DEFAULT '',
    `ContactNo` int(10) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`,`StaffID`),
    KEY `fk022` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Holiday`
--

  CREATE TABLE IF NOT EXISTS `Holiday` (
    `Year` int(11) NOT NULL DEFAULT '0',
    `Day` date NOT NULL,
    PRIMARY KEY (`Year`,`Day`),
    KEY `Day` (`Day`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Holiday`
--

  INSERT INTO `Holiday` VALUES(2014, '2014-01-01');
  INSERT INTO `Holiday` VALUES(2014, '2014-01-02');
  INSERT INTO `Holiday` VALUES(2014, '2014-01-03');
  INSERT INTO `Holiday` VALUES(2014, '2014-02-04');
  INSERT INTO `Holiday` VALUES(2014, '2014-02-14');
  INSERT INTO `Holiday` VALUES(2014, '2014-02-27');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-11');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-14');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-15');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-16');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-17');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-18');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-21');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-22');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-23');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-24');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-25');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-28');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-29');
  INSERT INTO `Holiday` VALUES(2014, '2014-04-30');
  INSERT INTO `Holiday` VALUES(2014, '2014-05-01');
  INSERT INTO `Holiday` VALUES(2014, '2014-05-14');
  INSERT INTO `Holiday` VALUES(2014, '2014-05-15');
  INSERT INTO `Holiday` VALUES(2014, '2014-06-12');
  INSERT INTO `Holiday` VALUES(2014, '2014-07-29');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-08');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-11');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-12');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-13');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-14');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-15');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-18');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-19');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-20');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-21');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-22');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-25');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-26');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-27');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-28');
  INSERT INTO `Holiday` VALUES(2014, '2014-08-29');
  INSERT INTO `Holiday` VALUES(2014, '2014-09-01');
  INSERT INTO `Holiday` VALUES(2014, '2014-09-02');
  INSERT INTO `Holiday` VALUES(2014, '2014-09-22');
  INSERT INTO `Holiday` VALUES(2014, '2014-09-23');
  INSERT INTO `Holiday` VALUES(2014, '2014-10-08');
  INSERT INTO `Holiday` VALUES(2014, '2014-10-22');
  INSERT INTO `Holiday` VALUES(2014, '2014-11-06');
  INSERT INTO `Holiday` VALUES(2014, '2014-11-20');
  INSERT INTO `Holiday` VALUES(2014, '2014-11-21');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-10');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-11');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-12');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-15');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-16');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-17');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-18');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-19');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-23');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-24');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-25');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-26');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-30');
  INSERT INTO `Holiday` VALUES(2014, '2014-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `Invitee`
--

  CREATE TABLE IF NOT EXISTS `Invitee` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `ParentName` varchar(50) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`,`AdmissionNo`,`ParentName`),
    KEY `fk020` (`AdmissionNo`,`ParentName`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `IsSubstituted`
--

  CREATE TABLE IF NOT EXISTS `IsSubstituted` (
    `StaffID` varchar(5) DEFAULT NULL,
    `Grade` int(11) DEFAULT NULL,
    `Class` char(2) DEFAULT NULL,
    `Day` int(11) DEFAULT NULL,
    `Position` int(11) DEFAULT NULL,
    `Date` date DEFAULT NULL,
    `SubsttitutedTeachedID` varchar(5) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    KEY `fk015` (`StaffID`),
    KEY `fk016` (`SubsttitutedTeachedID`,`Grade`,`Class`,`Day`,`Position`),
    KEY `IsSubstituted_ibfk_2` (`SubsttitutedTeachedID`,`Day`,`Position`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LabelLanguage`
--

  CREATE TABLE IF NOT EXISTS `LabelLanguage` (
    `Label` varchar(50) NOT NULL DEFAULT '',
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`Label`,`Language`),
    KEY `fk004` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LabelLanguage`
--

  INSERT INTO `LabelLanguage` VALUES('actingAssistantPrincipal', 0, 'Acting Assistant Principal');
  INSERT INTO `LabelLanguage` VALUES('actingAssistantPrincipal', 1, 'වැඩබලන සහකාර විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('actingDeputyPrincipal', 0, 'Acting Deputy Principal');
  INSERT INTO `LabelLanguage` VALUES('actingDeputyPrincipal', 1, 'වැඩබලන නියෝජ්‍ය විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('actingPrincipal', 0, 'Acting Principal');
  INSERT INTO `LabelLanguage` VALUES('actingPrincipal', 1, 'වැඩබලන විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('addManager', 0, 'Add Event Managers ');
  INSERT INTO `LabelLanguage` VALUES('addManager', 1, 'සිදුවීම් කළමනාකරුවන් එක් කරන්න ');
  INSERT INTO `LabelLanguage` VALUES('agriculture', 0, 'Agriculture');
  INSERT INTO `LabelLanguage` VALUES('agriculture', 1, 'කෘෂිකර්මය');
  INSERT INTO `LabelLanguage` VALUES('ALevel', 0, ' A Level');
  INSERT INTO `LabelLanguage` VALUES('ALevel', 1, '"අ.පො.ස(උ.පෙ)/හෝ සමාන(A/L)');
  INSERT INTO `LabelLanguage` VALUES('ALevelArtsCommerce', 0, ' A Level Arts Commerce');
  INSERT INTO `LabelLanguage` VALUES('ALevelArtsCommerce', 1, 'උ.පෙළ (12-13) කල/වාණිජ  ප්‍රදාන විෂයයන්');
  INSERT INTO `LabelLanguage` VALUES('ALevelOptional', 0, ' A Level Optional');
  INSERT INTO `LabelLanguage` VALUES('ALevelOptional', 1, 'උ.පෙළ (12-13) අතිරේක විෂයයන්');
  INSERT INTO `LabelLanguage` VALUES('ALevelScienceMain', 0, ' A Level Science Main');
  INSERT INTO `LabelLanguage` VALUES('ALevelScienceMain', 1, 'උ.පෙළ (12-13) විද්‍යා ප්‍රදාන විෂයයන් ');
  INSERT INTO `LabelLanguage` VALUES('ALevelSupervisor', 0, 'A Level Supervisor');
  INSERT INTO `LabelLanguage` VALUES('ALevelSupervisor', 1, 'උ.පෙළ (12-13) අධීක්ෂණ ගුරු');
  INSERT INTO `LabelLanguage` VALUES('ALevelTechnology', 0, ' A Level Technology');
  INSERT INTO `LabelLanguage` VALUES('ALevelTechnology', 1, 'උ.පෙළ (12-13) තාක්ෂණික ප්‍රදාන විෂයයන්');
  INSERT INTO `LabelLanguage` VALUES('applyForLeave', 0, 'Apply for Leave');
  INSERT INTO `LabelLanguage` VALUES('applyForLeave', 1, 'නිවාඩු ඉල්ලීම්කිරීම');
  INSERT INTO `LabelLanguage` VALUES('approveLeave', 0, 'Approve Leave');
  INSERT INTO `LabelLanguage` VALUES('approveLeave', 1, 'නිවාඩු අනුමතකිරීම');
  INSERT INTO `LabelLanguage` VALUES('arabic', 0, 'Arabic');
  INSERT INTO `LabelLanguage` VALUES('arabic', 1, 'අරාබි');
  INSERT INTO `LabelLanguage` VALUES('art', 0, 'Art');
  INSERT INTO `LabelLanguage` VALUES('art', 1, 'චිත්‍ර');
  INSERT INTO `LabelLanguage` VALUES('arts', 0, 'Arts');
  INSERT INTO `LabelLanguage` VALUES('arts', 1, 'කලා ශිල්ප');
  INSERT INTO `LabelLanguage` VALUES('artsAgain', 0, 'Arts Again');
  INSERT INTO `LabelLanguage` VALUES('artsAgain', 1, 'චිත්‍ර');
  INSERT INTO `LabelLanguage` VALUES('assistantPrincipal', 0, 'Assistant Principal');
  INSERT INTO `LabelLanguage` VALUES('assistantPrincipal', 1, 'සහකාර විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('BABScBEd', 0, ' B A B Sc B Ed');
  INSERT INTO `LabelLanguage` VALUES('BABScBEd', 1, 'උපාධි හා ඊට සමාන');
  INSERT INTO `LabelLanguage` VALUES('bADegreesorequivalent', 0, 'BA Degrees or equivalent');
  INSERT INTO `LabelLanguage` VALUES('bADegreesorequivalent', 1, 'කල උපාධි හා සමාන උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bAinaForeignLanguageexcludingEnglish', 0, 'BA in a Foreign Language excluding English');
  INSERT INTO `LabelLanguage` VALUES('bAinaForeignLanguageexcludingEnglish', 1, 'විදේශ භාෂා  (ඉංග්‍රීසි හැර)උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bAinArts', 0, 'BA in Arts');
  INSERT INTO `LabelLanguage` VALUES('bAinArts', 1, 'චිත්‍ර කලා උපාධි හා සමාන  ඩිප්ලෝමා');
  INSERT INTO `LabelLanguage` VALUES('bAinDancingorequivalentDip', 0, 'BA in Dancing or equivalent Dip');
  INSERT INTO `LabelLanguage` VALUES('bAinDancingorequivalentDip', 1, 'නැටුම් උපාධි හා සමාන ඩිප්ලෝමා');
  INSERT INTO `LabelLanguage` VALUES('bAinEasternMusicorequivalentDip', 0, 'BA in Eastern Music or equivalent Dip');
  INSERT INTO `LabelLanguage` VALUES('bAinEasternMusicorequivalentDip', 1, 'පෙරදිග සංගීත උපාධි හා සමාන ඩිප්ලෝමා');
  INSERT INTO `LabelLanguage` VALUES('bAinEnglishorequivalent', 0, 'BA in English or equivalent');
  INSERT INTO `LabelLanguage` VALUES('bAinEnglishorequivalent', 1, 'ඉංග්‍රීසි/ඉංග්‍රීසි  විෂයක් ලෙස සමත් උපාධි');
  INSERT INTO `LabelLanguage` VALUES('belowOLevel', 0, 'Below O Level');
  INSERT INTO `LabelLanguage` VALUES('belowOLevel', 1, 'අ.පො.ස(සා.පෙ) ට අඩු');
  INSERT INTO `LabelLanguage` VALUES('bNIEBEd', 0, 'B N I E B Ed');
  INSERT INTO `LabelLanguage` VALUES('bNIEBEd', 1, 'හෝ විශ්ව.වි අද්යපනවේදී උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinAgriculture', 0, 'Bsc in Agriculture');
  INSERT INTO `LabelLanguage` VALUES('bscinAgriculture', 1, 'කෘෂි විද්‍යා උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinBiology', 0, 'Bsc in Biology');
  INSERT INTO `LabelLanguage` VALUES('bscinBiology', 1, 'ජීව විද්‍යා උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinCombinedMathematics', 0, 'Bsc in Combined Mathematics');
  INSERT INTO `LabelLanguage` VALUES('bscinCombinedMathematics', 1, 'සංයුක්ත ගණිතය');
  INSERT INTO `LabelLanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 0, 'Bsc in Commerce Business Mgmt Accounting or equivalent Dip');
  INSERT INTO `LabelLanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 1, 'වානිජ්‍ය/ව්‍යාපාර පරිපාලනය/ගණකාධිකරණය උපාධි හා සමාන උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinEducation', 0, 'Bsc in Education');
  INSERT INTO `LabelLanguage` VALUES('bscinEducation', 1, 'අධ්‍යාපනවේදී උපාධි(විශ්ව විද්‍යාලයිය)');
  INSERT INTO `LabelLanguage` VALUES('bscinHomeScience', 0, 'Bsc in Home Science');
  INSERT INTO `LabelLanguage` VALUES('bscinHomeScience', 1, 'ගෘහ විද්‍යා උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinIT', 0, 'Bsc in IT');
  INSERT INTO `LabelLanguage` VALUES('bscinIT', 1, 'තොරතුරු තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('bscinPhysics', 0, 'Bsc in Physics');
  INSERT INTO `LabelLanguage` VALUES('bscinPhysics', 1, 'භාව්තීය විද්‍යා උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bscinSocialScience', 0, 'Bs cin Social Science');
  INSERT INTO `LabelLanguage` VALUES('bscinSocialScience', 1, 'සමාජ විද්‍යා උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bScspecialisationinMathematics', 0, 'BSc Specialisation in Mathematics');
  INSERT INTO `LabelLanguage` VALUES('bScspecialisationinMathematics', 1, 'විශේෂ ගණිත උපාධි');
  INSERT INTO `LabelLanguage` VALUES('bTecConstruction', 0, 'B Tec Construction');
  INSERT INTO `LabelLanguage` VALUES('bTecConstruction', 1, 'ඉදිකිරීම් තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('bTecElectronicandElectrical', 0, 'B Tec Electronic and Electrical');
  INSERT INTO `LabelLanguage` VALUES('bTecElectronicandElectrical', 1, 'විදුලිය හා ඉලෙක්ට්‍රොනික තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('bTecMechanical', 0, 'B Tec Mechanical');
  INSERT INTO `LabelLanguage` VALUES('bTecMechanical', 1, 'යාන්ත්‍රික තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('buddhism', 0, 'Buddhism');
  INSERT INTO `LabelLanguage` VALUES('buddhism', 1, 'බෞද්ධ');
  INSERT INTO `LabelLanguage` VALUES('byClass', 0, 'by Class');
  INSERT INTO `LabelLanguage` VALUES('byClass', 1, 'පන්ති මට්ටමින්');
  INSERT INTO `LabelLanguage` VALUES('byTeacher', 0, 'by Teacher');
  INSERT INTO `LabelLanguage` VALUES('byTeacher', 1, 'ගුරුවරයාගේ නමින්');
  INSERT INTO `LabelLanguage` VALUES('catholic', 0, 'Catholic');
  INSERT INTO `LabelLanguage` VALUES('catholic', 1, 'කතෝලික');
  INSERT INTO `LabelLanguage` VALUES('certinLibrary', 0, 'Certin Library');
  INSERT INTO `LabelLanguage` VALUES('certinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති සහතිකපත්‍ර   පාඨමාලාව');
  INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingAway', 0, 'Certin Teacher Training Away');
  INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingAway', 1, 'ගුරු පුහුණු සහතිකය-දුරස්ථ');
  INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingInstitute', 0, 'Certin Teacher Training Institute');
  INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingInstitute', 1, 'ගුරු පුහුණු සහතිකය-ආයතනික');
  INSERT INTO `LabelLanguage` VALUES('chooseOption', 0, 'Choose Option');
  INSERT INTO `LabelLanguage` VALUES('chooseOption', 1, 'විකල්පය තෝරගන්න');
  INSERT INTO `LabelLanguage` VALUES('christianity', 0, 'Christianity');
  INSERT INTO `LabelLanguage` VALUES('christianity', 1, 'ක්‍රිස්තියානි');
  INSERT INTO `LabelLanguage` VALUES('civilStatus', 0, 'Civil Status');
  INSERT INTO `LabelLanguage` VALUES('civilStatus', 1, 'විවාහක /අවිවාහක බව');
  INSERT INTO `LabelLanguage` VALUES('class', 0, 'Class');
  INSERT INTO `LabelLanguage` VALUES('class', 1, 'පන්තිය');
  INSERT INTO `LabelLanguage` VALUES('commerce', 0, 'Commerce');
  INSERT INTO `LabelLanguage` VALUES('commerce', 1, 'වාණිජ්‍ය');
  INSERT INTO `LabelLanguage` VALUES('contactNumber', 0, 'Contact Number');
  INSERT INTO `LabelLanguage` VALUES('contactNumber', 1, 'දුරකථන අංකය');
  INSERT INTO `LabelLanguage` VALUES('contactNumberForEmergency', 0, 'Contact Number for Emergency');
  INSERT INTO `LabelLanguage` VALUES('contactNumberForEmergency', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය');
  INSERT INTO `LabelLanguage` VALUES('contactPersonForEmergency', 0, 'Contact Person for Emergency');
  INSERT INTO `LabelLanguage` VALUES('contactPersonForEmergency', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම');
  INSERT INTO `LabelLanguage` VALUES('contractBasedandOther', 0, 'Contract Based and Other');
  INSERT INTO `LabelLanguage` VALUES('contractBasedandOther', 1, 'කොන්ත්‍රාත් පදනම හා වෙනත් මාර්ග වලින් දීමන ලබන ගුරුවරු');
  INSERT INTO `LabelLanguage` VALUES('counselling', 0, 'Counselling');
  INSERT INTO `LabelLanguage` VALUES('counselling', 1, 'උපදේශනය');
  INSERT INTO `LabelLanguage` VALUES('courseOfStudy', 0, 'Course of Study');
  INSERT INTO `LabelLanguage` VALUES('courseOfStudy', 1, 'වර්ගමාන පත්වීමේ වර්ගීකරණය');
  INSERT INTO `LabelLanguage` VALUES('createTimetableByClass', 0, 'Create Timetable by Class');
  INSERT INTO `LabelLanguage` VALUES('createTimetableByClass', 1, 'පන්තිය විසින් කාලසටහන සැකසුම');
  INSERT INTO `LabelLanguage` VALUES('createTimetableByTeacher', 0, 'Create Timetable by Teacher');
  INSERT INTO `LabelLanguage` VALUES('createTimetableByTeacher', 1, 'ගුරුවරයා විසින් කාලසටහන සැකසුම');
  INSERT INTO `LabelLanguage` VALUES('dancing', 0, 'Dancing');
  INSERT INTO `LabelLanguage` VALUES('dancing', 1, 'නැටුම්');
  INSERT INTO `LabelLanguage` VALUES('date', 0, 'Date');
  INSERT INTO `LabelLanguage` VALUES('date', 1, 'දිනය');
  INSERT INTO `LabelLanguage` VALUES('dateAppointedAsTeacher', 0, 'Date Appointed as Teacher/Principal');
  INSERT INTO `LabelLanguage` VALUES('dateAppointedAsTeacher', 1, 'සේවයට පත්වූ වර්ෂය හා මාසය');
  INSERT INTO `LabelLanguage` VALUES('dateJoinedSchool', 0, 'Date Joined this School');
  INSERT INTO `LabelLanguage` VALUES('dateJoinedSchool', 1, 'මෙම විදුහලේ පත්වීම භාරගත් වර්ෂය හා මාසය');
  INSERT INTO `LabelLanguage` VALUES('dateOfBirth', 0, 'Date of Birth');
  INSERT INTO `LabelLanguage` VALUES('dateOfBirth', 1, 'උපන් දිනය');
  INSERT INTO `LabelLanguage` VALUES('deputyPrincipal', 0, 'Deputy Principal');
  INSERT INTO `LabelLanguage` VALUES('deputyPrincipal', 1, 'නියෝජ්‍ය විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('description', 0, 'Description');
  INSERT INTO `LabelLanguage` VALUES('description', 1, 'විස්තරය');
  INSERT INTO `LabelLanguage` VALUES('dipinAgriculture', 0, 'Dipin Agriculture');
  INSERT INTO `LabelLanguage` VALUES('dipinAgriculture', 1, 'කෘෂි අද්‍යාපනය පිළිබද ඩිප්ලෝමාව');
  INSERT INTO `LabelLanguage` VALUES('dipinEASL', 0, 'Dip in E A S L');
  INSERT INTO `LabelLanguage` VALUES('dipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ ඩිප්ලෝමා');
  INSERT INTO `LabelLanguage` VALUES('dipinEd', 0, 'Dipin Ed');
  INSERT INTO `LabelLanguage` VALUES('dipinEd', 1, 'පශ්චාත් උපාධි අධ්‍යාපන ඩිප්ලෝමාව');
  INSERT INTO `LabelLanguage` VALUES('dipinLibrary', 0, 'Dipin Library');
  INSERT INTO `LabelLanguage` VALUES('dipinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති ඩිප්ලෝමා පාඨමාලාව');
  INSERT INTO `LabelLanguage` VALUES('easternMusic', 0, 'Eastern Music');
  INSERT INTO `LabelLanguage` VALUES('easternMusic', 1, 'සංගීතය-අපරදිග');
  INSERT INTO `LabelLanguage` VALUES('educationInformation', 0, 'Education Information');
  INSERT INTO `LabelLanguage` VALUES('educationInformation', 1, 'අධ්‍යාපනික තොරතුරු');
  INSERT INTO `LabelLanguage` VALUES('emergencyContact', 0, 'Emergency Contact''s Name');
  INSERT INTO `LabelLanguage` VALUES('emergencyContact', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම');
  INSERT INTO `LabelLanguage` VALUES('emergencyContactNumber', 0, 'Emergency Contact''s Name');
  INSERT INTO `LabelLanguage` VALUES('emergencyContactNumber', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය');
  INSERT INTO `LabelLanguage` VALUES('employmentInformation', 0, 'Employment Information');
  INSERT INTO `LabelLanguage` VALUES('employmentInformation', 1, 'සේවයේ තොරතුරු');
  INSERT INTO `LabelLanguage` VALUES('employmentStatus', 0, 'Employment Status');
  INSERT INTO `LabelLanguage` VALUES('employmentStatus', 1, 'පාසලට පතවීමේ ස්වභාවය');
  INSERT INTO `LabelLanguage` VALUES('endTime', 0, 'End Time');
  INSERT INTO `LabelLanguage` VALUES('endTime', 1, 'අවසන් වන වෙලාව');
  INSERT INTO `LabelLanguage` VALUES('english', 0, 'English');
  INSERT INTO `LabelLanguage` VALUES('english', 1, 'ඉංග්‍රීසි 2001 ට පසු');
  INSERT INTO `LabelLanguage` VALUES('eventCreator', 0, 'Event Creator');
  INSERT INTO `LabelLanguage` VALUES('eventCreator', 1, 'සිදුවීම් නිර්මාණකරු');
  INSERT INTO `LabelLanguage` VALUES('eventId', 0, 'Event ID');
  INSERT INTO `LabelLanguage` VALUES('eventId', 1, 'සිදුවීම් අංකය');
  INSERT INTO `LabelLanguage` VALUES('eventManagement', 0, 'Event Management');
  INSERT INTO `LabelLanguage` VALUES('eventManagement', 1, 'උත්සවය කළමනාකරණය');
  INSERT INTO `LabelLanguage` VALUES('eventType', 0, 'Event Type');
  INSERT INTO `LabelLanguage` VALUES('eventType', 1, 'සිදුවීම් වර්ගය');
  INSERT INTO `LabelLanguage` VALUES('female', 0, 'Female');
  INSERT INTO `LabelLanguage` VALUES('female', 1, 'ගැහැණු');
  INSERT INTO `LabelLanguage` VALUES('foreignLanguageExcludingEnglish', 0, 'Foreign Language Excluding English');
  INSERT INTO `LabelLanguage` VALUES('foreignLanguageExcludingEnglish', 1, 'විදේශ භාෂා (ඉංගිසි හැර)');
  INSERT INTO `LabelLanguage` VALUES('fr', 0, 'F');
  INSERT INTO `LabelLanguage` VALUES('fr', 1, 'සි');
  INSERT INTO `LabelLanguage` VALUES('friday', 0, 'Friday');
  INSERT INTO `LabelLanguage` VALUES('friday', 1, 'සිකුරාදා');
  INSERT INTO `LabelLanguage` VALUES('fullTime', 0, 'Full Time');
  INSERT INTO `LabelLanguage` VALUES('fullTime', 1, 'මෙම පාසලින් වැටුප් ලබනහ පාසලේ පුර්ණ කාලීනව සේවය කරන');
  INSERT INTO `LabelLanguage` VALUES('fullTime_BroughtFromOtherSchool', 0, 'Full Time (Brought from other School)');
  INSERT INTO `LabelLanguage` VALUES('fullTime_BroughtFromOtherSchool', 1, 'වෙනත් පාසලකින් වැටුප් ලබා මෙම පාසලේ පුර්නකලිනවා සේවය කරන ');
  INSERT INTO `LabelLanguage` VALUES('fullTime_ReleasedToOtherSchool', 0, 'Full Time (Released to other School)');
  INSERT INTO `LabelLanguage` VALUES('fullTime_ReleasedToOtherSchool', 1, 'මෙම පාසලින් වැටුප් ලබන හා පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට පුර්නකලිනව නිදහස් කර ඇති');
  INSERT INTO `LabelLanguage` VALUES('gender', 0, 'Gender');
  INSERT INTO `LabelLanguage` VALUES('gender', 1, 'ස්ත්‍රී/පුරුෂ භාවය');
  INSERT INTO `LabelLanguage` VALUES('generalInformation', 0, 'General Information');
  INSERT INTO `LabelLanguage` VALUES('generalInformation', 1, 'සාමාන්‍ය තොරතුරු');
  INSERT INTO `LabelLanguage` VALUES('grade', 0, ' Grade');
  INSERT INTO `LabelLanguage` VALUES('grade', 1, 'වසර');
  INSERT INTO `LabelLanguage` VALUES('graduates', 0, 'Graduates');
  INSERT INTO `LabelLanguage` VALUES('graduates', 1, 'උපාධි');
  INSERT INTO `LabelLanguage` VALUES('healthAndPE', 0, 'Health and P.E.');
  INSERT INTO `LabelLanguage` VALUES('healthAndPE', 1, 'ශාරීරික අද්‍යාපනය');
  INSERT INTO `LabelLanguage` VALUES('healthandPhysicalEducation', 0, 'Health and Physical Education');
  INSERT INTO `LabelLanguage` VALUES('healthandPhysicalEducation', 1, 'ශාරීරික අද්‍යාපනය');
  INSERT INTO `LabelLanguage` VALUES('highestEducationalQualification', 0, 'Highest Educational Qualification');
  INSERT INTO `LabelLanguage` VALUES('highestEducationalQualification', 1, 'ඉහලම අධ්‍යාපන සුදුසුකම');
  INSERT INTO `LabelLanguage` VALUES('highestProfessionalQualification', 0, 'Highest Professional Qualification');
  INSERT INTO `LabelLanguage` VALUES('highestProfessionalQualification', 1, 'ඉහලම වෘත්තීය සුදුසුකම');
  INSERT INTO `LabelLanguage` VALUES('hinduism', 0, 'Hinduism');
  INSERT INTO `LabelLanguage` VALUES('hinduism', 1, 'හින්දු');
  INSERT INTO `LabelLanguage` VALUES('homeScience', 0, 'Home Science');
  INSERT INTO `LabelLanguage` VALUES('homeScience', 1, 'ගෘහ විද්‍යාව');
  INSERT INTO `LabelLanguage` VALUES('indianTamil', 0, 'Indian Tamil');
  INSERT INTO `LabelLanguage` VALUES('indianTamil', 1, 'ඉන්දියානු  දෙමළ');
  INSERT INTO `LabelLanguage` VALUES('informationTechnology', 0, 'Information Technology');
  INSERT INTO `LabelLanguage` VALUES('informationTechnology', 1, 'තොරතරු තාක්ෂනය');
  INSERT INTO `LabelLanguage` VALUES('interval', 0, 'INTERVAL');
  INSERT INTO `LabelLanguage` VALUES('interval', 1, 'විවේක කාලය');
  INSERT INTO `LabelLanguage` VALUES('islam', 0, 'Islam');
  INSERT INTO `LabelLanguage` VALUES('islam', 1, 'ඉස්ලාම්');
  INSERT INTO `LabelLanguage` VALUES('iT', 0, 'IT');
  INSERT INTO `LabelLanguage` VALUES('iT', 1, 'තොරතුරු තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('keepAttendance', 0, 'Keep Attendance');
  INSERT INTO `LabelLanguage` VALUES('keepAttendance', 1, 'පැමිණීමේ වාර්තාව ');
  INSERT INTO `LabelLanguage` VALUES('leaveManagement', 0, 'Leave Management');
  INSERT INTO `LabelLanguage` VALUES('leaveManagement', 1, 'නිවාඩුව කළමනාකරණය');
  INSERT INTO `LabelLanguage` VALUES('library', 0, 'Library');
  INSERT INTO `LabelLanguage` VALUES('library', 1, 'පුස්තකාල');
  INSERT INTO `LabelLanguage` VALUES('libraryandInformationScience', 0, 'Library and Information Science');
  INSERT INTO `LabelLanguage` VALUES('libraryandInformationScience', 1, 'පුස්තකාල හා තොරතරු විද්‍යාව');
  INSERT INTO `LabelLanguage` VALUES('location', 0, 'Location');
  INSERT INTO `LabelLanguage` VALUES('location', 1, 'ස්ථානය');
  INSERT INTO `LabelLanguage` VALUES('mailDeliveryAddress', 0, 'Mail Delivery Address');
  INSERT INTO `LabelLanguage` VALUES('mailDeliveryAddress', 1, 'ලිපිනය');
  INSERT INTO `LabelLanguage` VALUES('mAinEd', 0, 'M Ain Ed');
  INSERT INTO `LabelLanguage` VALUES('mAinEd', 1, 'අධ්‍යාපනය පිළිබද ශ්‍රාස්ත්‍රපති උපාධිය');
  INSERT INTO `LabelLanguage` VALUES('malay', 0, 'Malay');
  INSERT INTO `LabelLanguage` VALUES('malay', 1, 'මෞලවි');
  INSERT INTO `LabelLanguage` VALUES('male', 0, 'Male');
  INSERT INTO `LabelLanguage` VALUES('male', 1, 'පිරිමි');
  INSERT INTO `LabelLanguage` VALUES('MAMScMEd', 0, ' M A M Sc M Ed');
  INSERT INTO `LabelLanguage` VALUES('MAMScMEd', 1, 'ශාස්ත්‍රපති හා ඊට සමාන්තර');
  INSERT INTO `LabelLanguage` VALUES('management', 0, 'Management');
  INSERT INTO `LabelLanguage` VALUES('management', 1, 'පරිපාලනය');
  INSERT INTO `LabelLanguage` VALUES('married', 0, 'Married');
  INSERT INTO `LabelLanguage` VALUES('married', 1, 'විවාහක');
  INSERT INTO `LabelLanguage` VALUES('maths', 0, 'Maths');
  INSERT INTO `LabelLanguage` VALUES('maths', 1, 'ගණිතය');
  INSERT INTO `LabelLanguage` VALUES('mEd', 0, 'M Ed');
  INSERT INTO `LabelLanguage` VALUES('mEd', 1, 'අධ්‍යාපනපති උපාධි');
  INSERT INTO `LabelLanguage` VALUES('medium', 0, 'Medium');
  INSERT INTO `LabelLanguage` VALUES('medium', 1, 'පත්වීම ලද මාධ්‍යය');
  INSERT INTO `LabelLanguage` VALUES('mo', 0, 'M');
  INSERT INTO `LabelLanguage` VALUES('mo', 1, 'ස');
  INSERT INTO `LabelLanguage` VALUES('monday', 0, 'Monday');
  INSERT INTO `LabelLanguage` VALUES('monday', 1, 'සදුදා');
  INSERT INTO `LabelLanguage` VALUES('MPhil', 0, ' M Phil');
  INSERT INTO `LabelLanguage` VALUES('MPhil', 1, 'දර්ශනපති හා ඊට සමාන්තර');
  INSERT INTO `LabelLanguage` VALUES('mPhilEd', 0, 'M Phil Ed');
  INSERT INTO `LabelLanguage` VALUES('mPhilEd', 1, 'දර්ශනපති -අධ්‍යාපනය පිළිබද');
  INSERT INTO `LabelLanguage` VALUES('mScinEdMgmt', 0, 'M Scin Ed Mgmt');
  INSERT INTO `LabelLanguage` VALUES('mScinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද විද්‍යාපති');
  INSERT INTO `LabelLanguage` VALUES('mScinLibrary', 0, 'M Scin Library');
  INSERT INTO `LabelLanguage` VALUES('mScinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති විද්‍යාපති උපාධිය');
  INSERT INTO `LabelLanguage` VALUES('name', 0, 'Name');
  INSERT INTO `LabelLanguage` VALUES('name', 1, 'සිදුවීම');
  INSERT INTO `LabelLanguage` VALUES('nameInFull', 0, 'Name in Full');
  INSERT INTO `LabelLanguage` VALUES('nameInFull', 1, 'සම්පුර්ණ නම');
  INSERT INTO `LabelLanguage` VALUES('nameWithInitials', 0, 'Name with Initials');
  INSERT INTO `LabelLanguage` VALUES('nameWithInitials', 1, 'නම් මුලකුරු සමඟ');
  INSERT INTO `LabelLanguage` VALUES('natDipinTeaching', 0, 'Nat Dipin Teaching');
  INSERT INTO `LabelLanguage` VALUES('natDipinTeaching', 1, 'ජාතික ශික්ෂණ විද්‍යා ඩිප්ලෝමාව');
  INSERT INTO `LabelLanguage` VALUES('nationalityRace', 0, 'Nationality Race');
  INSERT INTO `LabelLanguage` VALUES('nationalityRace', 1, 'ජනවර්ගය');
  INSERT INTO `LabelLanguage` VALUES('nicNumber', 0, 'NIC Number');
  INSERT INTO `LabelLanguage` VALUES('nicNumber', 1, 'ජාතික හැඳුනුම් පත් අංකය');
  INSERT INTO `LabelLanguage` VALUES('none', 0, 'None');
  INSERT INTO `LabelLanguage` VALUES('none', 1, 'ව්හුර්තීය සුදුසුකම් ලබා නොමැති');
  INSERT INTO `LabelLanguage` VALUES('nonRomanCatholicism', 0, 'Non Roman Catholicism');
  INSERT INTO `LabelLanguage` VALUES('nonRomanCatholicism', 1, 'රෝමානු කතෝලික නොවන ක්‍රිස්තියානි');
  INSERT INTO `LabelLanguage` VALUES('OLevel', 0, ' O Level');
  INSERT INTO `LabelLanguage` VALUES('OLevel', 1, 'අ.පො.ස(සා.පෙ)/හෝ සමාන(O/L)');
  INSERT INTO `LabelLanguage` VALUES('OLevelandOther', 0, ' O Level and Other');
  INSERT INTO `LabelLanguage` VALUES('OLevelandOther', 1, 'අ.පො.ස (ස.පෙ)/වෙනත්');
  INSERT INTO `LabelLanguage` VALUES('onContract_Government', 0, 'On Contract (Government)');
  INSERT INTO `LabelLanguage` VALUES('onContract_Government', 1, 'රජයෙන් වැටුප් ලබන කොන්ත්‍රාත් පදනම මත සේවයට බදවාගත් ');
  INSERT INTO `LabelLanguage` VALUES('onPaidLeave', 0, 'On Paid Leave');
  INSERT INTO `LabelLanguage` VALUES('onPaidLeave', 1, 'වැටුප් සහිත පුර්නකාලින අද්යන නිවාඩු');
  INSERT INTO `LabelLanguage` VALUES('optional', 0, 'Optional');
  INSERT INTO `LabelLanguage` VALUES('optional', 1, 'අතිරේක');
  INSERT INTO `LabelLanguage` VALUES('other', 0, 'Other');
  INSERT INTO `LabelLanguage` VALUES('other', 1, 'වෙනත්');
  INSERT INTO `LabelLanguage` VALUES('otherGovernmentDepartment', 0, 'Other Government Department');
  INSERT INTO `LabelLanguage` VALUES('otherGovernmentDepartment', 1, 'වෙනත් රාජ්‍ය ආයතන වලින් පත්කළ(පොලිස් උපසේවය සමුර්ද්දී,මහවැලි හා දක්ෂිණ ලංකා සංවර්දන අදිකාරී වැනි');
  INSERT INTO `LabelLanguage` VALUES('paidFromSchoolFees', 0, 'Paid from School Fees');
  INSERT INTO `LabelLanguage` VALUES('paidFromSchoolFees', 1, 'පහසුකම් ගාස්තු/ වෙනත් මාර්ග වලින් දීමනා ලබන');
  INSERT INTO `LabelLanguage` VALUES('partTime', 0, 'Part Time');
  INSERT INTO `LabelLanguage` VALUES('partTime', 1, 'මෙම පාසලින් වැටුප් ලබන පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට අර්ධකලිනවා නිදහස් කර ඇති');
  INSERT INTO `LabelLanguage` VALUES('passedMathswithoutadegreeinscience', 0, 'Passed Maths without a degree in science');
  INSERT INTO `LabelLanguage` VALUES('passedMathswithoutadegreeinscience', 1, 'ගණිතය විෂයක් ලෙස සමත් වු විද්‍යා නොවන උපාධි');
  INSERT INTO `LabelLanguage` VALUES('pGDipinEASL', 0, 'PGDip in E A S L	');
  INSERT INTO `LabelLanguage` VALUES('pGDipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ පශ්චාත් උපාධිඩිප්ලෝමාව');
  INSERT INTO `LabelLanguage` VALUES('pGDipinEdMgmt', 0, 'P G Dipin Ed Mgmt');
  INSERT INTO `LabelLanguage` VALUES('pGDipinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද පශ්චාත් උපාධිඩිප්ලෝමාව');
  INSERT INTO `LabelLanguage` VALUES('pGDipinLibraryScience', 0, 'P G Dipin Library Science');
  INSERT INTO `LabelLanguage` VALUES('pGDipinLibraryScience', 1, 'ගුරු පුස්තකාල විද්‍යා පශ්චාත් උපාධි ඩිප්ලෝමා පාඨමාලාව');
  INSERT INTO `LabelLanguage` VALUES('PhD', 0, ' Ph D');
  INSERT INTO `LabelLanguage` VALUES('PhD', 1, 'දර්ශනශුරී උපාධිහා ඊට සමාන්තර');
  INSERT INTO `LabelLanguage` VALUES('phDEd', 0, 'Ph D Ed');
  INSERT INTO `LabelLanguage` VALUES('phDEd', 1, 'දර්ශනශුරි - අධ්‍යාපනය පිළිබදව');
  INSERT INTO `LabelLanguage` VALUES('positionInSchool', 0, 'Position in School');
  INSERT INTO `LabelLanguage` VALUES('positionInSchool', 1, 'පාසලේ දරන තනතුර');
  INSERT INTO `LabelLanguage` VALUES('primary', 0, 'Primary');
  INSERT INTO `LabelLanguage` VALUES('primary', 1, 'ප්‍රාථමික');
  INSERT INTO `LabelLanguage` VALUES('primaryEnglish', 0, 'Primary English');
  INSERT INTO `LabelLanguage` VALUES('primaryEnglish', 1, 'ප්‍රාථමික ඉංග්‍රීසි');
  INSERT INTO `LabelLanguage` VALUES('primaryGeneral', 0, 'Primary General');
  INSERT INTO `LabelLanguage` VALUES('primaryGeneral', 1, 'ප්‍රාථමික/සාමාන්‍ය');
  INSERT INTO `LabelLanguage` VALUES('primaryMultiple', 0, 'Primary Multiple');
  INSERT INTO `LabelLanguage` VALUES('primaryMultiple', 1, 'ප්‍රාථමික පොදු');
  INSERT INTO `LabelLanguage` VALUES('primarySecondLanguage', 0, 'Primary Second Language');
  INSERT INTO `LabelLanguage` VALUES('primarySecondLanguage', 1, 'ප්‍රාථමික දෙවන බස');
  INSERT INTO `LabelLanguage` VALUES('primarySupervisor', 0, 'Primary Supervisor');
  INSERT INTO `LabelLanguage` VALUES('primarySupervisor', 1, 'ප්‍රාථමික (1-5) අධීක්ෂණ ගුරු');
  INSERT INTO `LabelLanguage` VALUES('principal', 0, 'Principal');
  INSERT INTO `LabelLanguage` VALUES('principal', 1, 'විදුහල්පති');
  INSERT INTO `LabelLanguage` VALUES('prizeGiving', 0, 'Prize Giving Ceremony');
  INSERT INTO `LabelLanguage` VALUES('prizeGiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය');
  INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 0, 'Register Staff Member');
  INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 1, 'කාර්යමණ්ඩලය වාර්තාකරන්න');
  INSERT INTO `LabelLanguage` VALUES('releasedToOtherInstituteOfficeService', 0, 'Released To Other Institute/Office/Service');
  INSERT INTO `LabelLanguage` VALUES('releasedToOtherInstituteOfficeService', 1, 'වෙනත් ආයතනයකට/කාර්යාලයකට/සේවයකට');
  INSERT INTO `LabelLanguage` VALUES('releasedToOtherSchool', 0, 'Released To Other School');
  INSERT INTO `LabelLanguage` VALUES('releasedToOtherSchool', 1, 'වෙනත් පාසලකට නිදහස් කල');
  INSERT INTO `LabelLanguage` VALUES('religion', 0, 'Religion');
  INSERT INTO `LabelLanguage` VALUES('religion', 1, 'ආගම');
  INSERT INTO `LabelLanguage` VALUES('romanCatholicism', 0, 'Roman Catholicism');
  INSERT INTO `LabelLanguage` VALUES('romanCatholicism', 1, 'රෝමානු කතෝලික');
  INSERT INTO `LabelLanguage` VALUES('salary', 0, 'Salary');
  INSERT INTO `LabelLanguage` VALUES('salary', 1, 'මුළු වැටුප');
  INSERT INTO `LabelLanguage` VALUES('saveEvent', 0, 'Save Event');
  INSERT INTO `LabelLanguage` VALUES('saveEvent', 1, 'සිදුවීම සුරකින්න');
  INSERT INTO `LabelLanguage` VALUES('science', 0, 'Science');
  INSERT INTO `LabelLanguage` VALUES('science', 1, 'විද්‍යාව');
  INSERT INTO `LabelLanguage` VALUES('scienceAndMaths', 0, 'Science And Maths');
  INSERT INTO `LabelLanguage` VALUES('scienceAndMaths', 1, 'විද්‍යා -ගණිත');
  INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 0, 'Search Staff Member');
  INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 1, 'කාර්යමණ්ඩලය සෙවීම');
  INSERT INTO `LabelLanguage` VALUES('secondaryArts', 0, 'Secondary Arts');
  INSERT INTO `LabelLanguage` VALUES('secondaryArts', 1, 'ද්විතීයික (6-11) සෞන්දර්ය');
  INSERT INTO `LabelLanguage` VALUES('secondaryEnglish', 0, 'Secondary English');
  INSERT INTO `LabelLanguage` VALUES('secondaryEnglish', 1, 'ද්විතීයික (6-11) ඉංග්‍රීසි');
  INSERT INTO `LabelLanguage` VALUES('secondaryMultiple', 0, 'Secondary Multiple');
  INSERT INTO `LabelLanguage` VALUES('secondaryMultiple', 1, 'ද්විතීයික (6-11) පොදු');
  INSERT INTO `LabelLanguage` VALUES('secondaryScienceMaths', 0, 'Secondary Science Maths');
  INSERT INTO `LabelLanguage` VALUES('secondaryScienceMaths', 1, 'ද්විතීයික (6-11) විද්‍යා/ගණිත');
  INSERT INTO `LabelLanguage` VALUES('secondarySecondLanguage', 0, 'Secondary Second Language');
  INSERT INTO `LabelLanguage` VALUES('secondarySecondLanguage', 1, 'ද්විතීයික (6-11) දෙවන බස');
  INSERT INTO `LabelLanguage` VALUES('secondarySupervisor', 0, 'Secondary Supervisor');
  INSERT INTO `LabelLanguage` VALUES('secondarySupervisor', 1, 'ද්විතීයික (6-11) අධීක්ෂණ ගුරු');
  INSERT INTO `LabelLanguage` VALUES('secondaryTechnology', 0, 'Secondary Technology');
  INSERT INTO `LabelLanguage` VALUES('secondaryTechnology', 1, 'ද්විතීයික (6-11)තාක්ෂණික');
  INSERT INTO `LabelLanguage` VALUES('section', 0, 'Section');
  INSERT INTO `LabelLanguage` VALUES('section', 1, 'නිරතවන කාර්යය');
  INSERT INTO `LabelLanguage` VALUES('serviceGrade', 0, 'Service Grade');
  INSERT INTO `LabelLanguage` VALUES('serviceGrade', 1, 'අදාල සේවය/ශ්‍රේණිය');
  INSERT INTO `LabelLanguage` VALUES('sinhala', 0, 'Sinhala');
  INSERT INTO `LabelLanguage` VALUES('sinhala', 1, 'සිංහල');
  INSERT INTO `LabelLanguage` VALUES('socialStudies', 0, 'Social Studies');
  INSERT INTO `LabelLanguage` VALUES('socialStudies', 1, 'සමාජ අධ්‍යනය');
  INSERT INTO `LabelLanguage` VALUES('specialEducation', 0, 'Special Education');
  INSERT INTO `LabelLanguage` VALUES('specialEducation', 1, 'විශේෂ අධ්‍යාපනය');
  INSERT INTO `LabelLanguage` VALUES('sportMeet', 0, 'Sports Meet');
  INSERT INTO `LabelLanguage` VALUES('sportMeet', 1, 'ක්‍රීඩා උත්සවය');
  INSERT INTO `LabelLanguage` VALUES('sriLankaEducationAdministrativeServiceI', 0, 'Sri Lanka Education Administrative Service I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaEducationAdministrativeServiceI', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ I(SLEAS I)');
  INSERT INTO `LabelLanguage` VALUES('sriLankaEducationAdministrativeServiceII', 0, 'Sri Lanka Education Administrative Service I I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaEducationAdministrativeServiceII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ II(SLEAS II)');
  INSERT INTO `LabelLanguage` VALUES('SriLankaEducationAdministrativeServiceIII', 0, ' Sri Lanka Education Administrative Service I I I');
  INSERT INTO `LabelLanguage` VALUES('SriLankaEducationAdministrativeServiceIII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ III(SLEAS III)');
  INSERT INTO `LabelLanguage` VALUES('srilankanMuslim', 0, 'Sri Lankan Muslim');
  INSERT INTO `LabelLanguage` VALUES('srilankanMuslim', 1, 'ශ්‍රී ලාංකික මුස්ලිම්');
  INSERT INTO `LabelLanguage` VALUES('srilankanTamil', 0, 'Sri Lankan Tamil');
  INSERT INTO `LabelLanguage` VALUES('srilankanTamil', 1, 'ශ්‍රී ලාංකික දෙමළ');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService2I', 0, 'Sri Lanka Principal Service 2 I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService2I', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-I(SLPS 2-I)');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService2II', 0, 'Sri Lanka Principal Service 2 I I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService2II', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-II(SLPS 2-II)');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService3', 0, 'Sri Lanka Principal Service 3');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalService3', 1, 'ශ්‍රී ලංකා විහාල්පති සේ.3(SLPS 3)');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalServiceI', 0, 'Sri Lanka Principal Service I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaPrincipalServiceI', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. I(SLPS I)');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService2I', 0, 'Sri Lanka Teacher Service 2 I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService2I', 1, 'ශ්‍රී ලංකා ගුරු සේ  2-I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService2II', 0, 'Sri Lanka Teacher Service 2 I I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService2II', 1, 'ශ්‍රී ලංකා ගුරු සේ 2-II');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService3I', 0, 'Sri Lanka Teacher Service 3 I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService3I', 1, 'ශ්‍රී ලංකා ගුරු සේ  3-I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService3II', 0, 'Sri Lanka Teacher Service 3 I I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherService3II', 1, 'ශ්‍රී ලංකා ගුරු සේ 3-II');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherServiceI', 0, 'Sri Lanka Teacher Service I');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherServiceI', 1, 'ශ්‍රී ලංකා ගුරු සේ I ');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherServicePending', 0, 'Sri Lanka Teacher Service Pending');
  INSERT INTO `LabelLanguage` VALUES('sriLankaTeacherServicePending', 1, 'ශ්‍රී ලංකා ගුරු සේවයට අන්තර්ග්‍රහණය කර නොමැත');
  INSERT INTO `LabelLanguage` VALUES('staffAdvisorFullTime', 0, 'Staff Advisor (Full-Time)');
  INSERT INTO `LabelLanguage` VALUES('staffAdvisorFullTime', 1, 'ගුරු උපදේශක (පුර්නකාලින)');
  INSERT INTO `LabelLanguage` VALUES('staffAdvisorPartTime', 0, 'Staff Advisor (Part-Time)');
  INSERT INTO `LabelLanguage` VALUES('staffAdvisorPartTime', 1, 'ගුරු උපදේශක (අර්ධකාලින)');
  INSERT INTO `LabelLanguage` VALUES('staffID', 0, 'Staff ID');
  INSERT INTO `LabelLanguage` VALUES('staffID', 1, 'අනුක්‍රමික අංකය');
  INSERT INTO `LabelLanguage` VALUES('staffManagement', 0, 'Staff Management');
  INSERT INTO `LabelLanguage` VALUES('staffManagement', 1, 'කාර්යමණ්ඩලය කළමනාකරණය');
  INSERT INTO `LabelLanguage` VALUES('startTime', 0, 'Start Time ');
  INSERT INTO `LabelLanguage` VALUES('startTime', 1, 'ආරම්භක වෙලාව ');
  INSERT INTO `LabelLanguage` VALUES('status', 0, 'Status');
  INSERT INTO `LabelLanguage` VALUES('status', 1, 'තත්වය');
  INSERT INTO `LabelLanguage` VALUES('subjectMostTaught', 0, 'Subject Most Taught');
  INSERT INTO `LabelLanguage` VALUES('subjectMostTaught', 1, 'වැඩිම කාලයක් උගන්වන විෂයය');
  INSERT INTO `LabelLanguage` VALUES('subjectSecondMostTaught', 0, 'Subject Second Most Taught');
  INSERT INTO `LabelLanguage` VALUES('subjectSecondMostTaught', 1, 'දෙවනුව වැඩි කාලයක් උගන්වන විෂයය');
  INSERT INTO `LabelLanguage` VALUES('submit', 0, 'Submit');
  INSERT INTO `LabelLanguage` VALUES('submit', 1, 'තහවුරු කරන්න');
  INSERT INTO `LabelLanguage` VALUES('tamil', 0, 'Tamil');
  INSERT INTO `LabelLanguage` VALUES('tamil', 1, 'දෙමළ');
  INSERT INTO `LabelLanguage` VALUES('teacher', 0, 'Teacher');
  INSERT INTO `LabelLanguage` VALUES('teacher', 1, 'ගුරුවරයා');
  INSERT INTO `LabelLanguage` VALUES('teacherDay', 0, 'Teacher''s Day');
  INSERT INTO `LabelLanguage` VALUES('teacherDay', 1, 'ගුරු දිනය');
  INSERT INTO `LabelLanguage` VALUES('teachersName', 0, 'Teacher''s Name');
  INSERT INTO `LabelLanguage` VALUES('teachersName', 1, 'ගුරුවරයාගේ නම');
  INSERT INTO `LabelLanguage` VALUES('technology', 0, 'Technology');
  INSERT INTO `LabelLanguage` VALUES('technology', 1, 'තාක්ෂණය');
  INSERT INTO `LabelLanguage` VALUES('th', 0, 'T');
  INSERT INTO `LabelLanguage` VALUES('th', 1, '');
  INSERT INTO `LabelLanguage` VALUES('theatreandDrama', 0, 'Theatre and Drama');
  INSERT INTO `LabelLanguage` VALUES('theatreandDrama', 1, 'නාට්‍ය හා රංග කලාව');
  INSERT INTO `LabelLanguage` VALUES('thursday', 0, 'Thursday');
  INSERT INTO `LabelLanguage` VALUES('thursday', 1, 'බ්‍රහස්පතින්දා');
  INSERT INTO `LabelLanguage` VALUES('time', 0, 'Time');
  INSERT INTO `LabelLanguage` VALUES('time', 1, 'වේලාව');
  INSERT INTO `LabelLanguage` VALUES('Timetables', 0, 'Timetables');
  INSERT INTO `LabelLanguage` VALUES('Timetables', 1, 'කාලසටහන');
  INSERT INTO `LabelLanguage` VALUES('tu', 0, 'T');
  INSERT INTO `LabelLanguage` VALUES('tu', 1, 'අ');
  INSERT INTO `LabelLanguage` VALUES('tuesday', 0, 'Tuesday');
  INSERT INTO `LabelLanguage` VALUES('tuesday', 1, 'අගහරුවදා');
  INSERT INTO `LabelLanguage` VALUES('unmarried', 0, 'Not Married');
  INSERT INTO `LabelLanguage` VALUES('unmarried', 1, 'අවිවාහක');
  INSERT INTO `LabelLanguage` VALUES('viewLeaveHistory', 0, 'View Leave History');
  INSERT INTO `LabelLanguage` VALUES('viewLeaveHistory', 1, 'ඉකුත් වූ නිවාඩු');
  INSERT INTO `LabelLanguage` VALUES('we', 0, 'W');
  INSERT INTO `LabelLanguage` VALUES('we', 1, 'බ');
  INSERT INTO `LabelLanguage` VALUES('wednesday', 0, 'Wednesday');
  INSERT INTO `LabelLanguage` VALUES('wednesday', 1, 'බදාදා');
  INSERT INTO `LabelLanguage` VALUES('week', 0, ' Week');
  INSERT INTO `LabelLanguage` VALUES('week', 1, 'සතිය');
  INSERT INTO `LabelLanguage` VALUES('westernMusic', 0, 'Western Music');
  INSERT INTO `LabelLanguage` VALUES('westernMusic', 1, 'සංගීතය-පෙරදිග');
  INSERT INTO `LabelLanguage` VALUES('widow', 0, 'Widow');
  INSERT INTO `LabelLanguage` VALUES('widow', 1, 'වැන්දබු');

-- --------------------------------------------------------

--
-- Table structure for table `Language`
--

  CREATE TABLE IF NOT EXISTS `Language` (
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Language`
--

  INSERT INTO `Language` VALUES(0, 'English');
  INSERT INTO `Language` VALUES(1, 'Sinhala');

-- --------------------------------------------------------

--
-- Table structure for table `LanguageGroup`
--

  CREATE TABLE IF NOT EXISTS `LanguageGroup` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `GroupName` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`GroupNo`),
    KEY `fk005` (`GroupName`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LanguageGroup`
--

  INSERT INTO `LanguageGroup` VALUES(0, 'nationalityRace');

-- --------------------------------------------------------

--
-- Table structure for table `LanguageOption`
--

  CREATE TABLE IF NOT EXISTS `LanguageOption` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `OptionNo` int(11) NOT NULL DEFAULT '0',
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`GroupNo`,`OptionNo`,`Language`),
    KEY `fk006` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LanguageOption`
--

  INSERT INTO `LanguageOption` VALUES(0, 0, 0, 'Sinhala');
  INSERT INTO `LanguageOption` VALUES(0, 0, 1, 'සිංහල');

-- --------------------------------------------------------

--
-- Table structure for table `LeaveData`
--

  CREATE TABLE IF NOT EXISTS `LeaveData` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `OfficialLeave` int(11) DEFAULT NULL,
    `MaternityLeave` int(11) DEFAULT NULL,
    `OtherLeave` int(11) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LeaveData`
--

  INSERT INTO `LeaveData` VALUES('1', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('10', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('11', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('12', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('13', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('14', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('15', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('16', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('2', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('3', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('4', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('5', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('6', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('7', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('8', 15, 90, 15, 0);
  INSERT INTO `LeaveData` VALUES('9', 15, 90, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `OLMarks`
--

  CREATE TABLE IF NOT EXISTS `OLMarks` (
    `IndexNo` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) DEFAULT NULL,
    `Year` int(11) NOT NULL,
    `Subject` varchar(64) NOT NULL DEFAULT '',
    `Grade` varchar(2) DEFAULT NULL,
    PRIMARY KEY (`IndexNo`,`Subject`),
    KEY `AdmissionNo` (`AdmissionNo`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ParentsInformation`
--

  CREATE TABLE IF NOT EXISTS `ParentsInformation` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `NamewithInitials` varchar(50) NOT NULL DEFAULT '',
    `Parent_Guardian` bit(1) DEFAULT NULL,
    `Occupation` varchar(50) DEFAULT NULL,
    `PhoneLand` varchar(15) DEFAULT NULL,
    `PhoneMobile` varchar(15) DEFAULT NULL,
    `HomeAddress` varchar(100) DEFAULT NULL,
    `OfficeAddress` varchar(100) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`NamewithInitials`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

  CREATE TABLE IF NOT EXISTS `Staff` (
    `StaffID` varchar(5) NOT NULL,
    `NamewithInitials` varchar(60) DEFAULT NULL,
    `DateofBirth` date DEFAULT NULL,
    `Gender` int(11) DEFAULT NULL,
    `Nationality_Race` int(11) DEFAULT NULL,
    `Religion` int(11) DEFAULT NULL,
    `CivilStatus` int(11) DEFAULT NULL,
    `NICNumber` varchar(10) DEFAULT NULL,
    `MailDeliveryAddress` varchar(100) DEFAULT NULL,
    `ContactNumber` varchar(15) DEFAULT NULL,
    `DateAppointedastoPost` date DEFAULT NULL,
    `DateJoinedthisSchool` date DEFAULT NULL,
    `EmploymentStatus` int(11) DEFAULT NULL,
    `Medium` int(11) DEFAULT NULL,
    `PositioninSchool` int(11) DEFAULT NULL,
    `Section` int(11) DEFAULT NULL,
    `SubjectMostTaught` int(11) DEFAULT NULL,
    `SubjectSecondMostTaught` int(11) DEFAULT NULL,
    `ServiceGrade` int(11) DEFAULT NULL,
    `Salary` float DEFAULT NULL,
    `HighestEducationalQualification` int(11) DEFAULT NULL,
    `HighestProfessionalQualification` int(11) DEFAULT NULL,
    `CourseofStudy` int(11) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

  INSERT INTO `Staff` VALUES('1', 'Vimukthi Joseph', '2014-08-13', 1, 3, 1, 1, '123456789V', 'Makola', '071456923', '2014-08-18', '2014-08-19', 2, 3, 1, 1, 1, 1, 0, 10000, 1, 1, 1, 0);
  INSERT INTO `Staff` VALUES('10', 'Amritha Alston', '2014-08-26', 2, 4, 1, 1, '123456789V', 'Makola', '0756489326', '2014-08-06', '2014-08-30', 3, 1, 5, 6, 1, 1, 2, 70000, 2, 2, 2, 0);
  INSERT INTO `Staff` VALUES('11', 'Bihara De Silva', '2014-08-26', 2, 2, 1, 1, '923578963V', 'Kollupitiya', '0785693214', '2014-08-25', '2014-08-03', 2, 2, 1, 1, 1, 1, 1, 45000, 3, 3, 3, 0);
  INSERT INTO `Staff` VALUES('12', 'Chathuri Perera', '0081-08-02', 2, 2, 3, 3, '814562395V', 'Negombo', '0774379658', '2014-08-26', '2014-08-23', 2, 2, 2, 2, 1, 1, 5, 28000, 5, 5, 64, 0);
  INSERT INTO `Staff` VALUES('13', 'Mark All One', '1992-02-12', 1, 1, 2, 1, '123456789v', 'Negombo', '0777777777', '2014-08-07', '2014-08-14', 1, 1, 1, 1, 1, 1, 1, 1, 1, 12, 55, 0);
  INSERT INTO `Staff` VALUES('14', 'Tharindu Madusha Mendis', '1993-02-03', 1, 1, 4, 1, '543345543v', 'Kollupitiya', '098789123', '2000-08-02', '2001-09-09', 1, 1, 6, 19, 6, 5, 13, 17000, 3, 18, 41, 0);
  INSERT INTO `Staff` VALUES('15', 'Sahan Malinga Tissera', '1993-02-02', NULL, 1, 4, 1, '932470039V', 'Kollupitiya', '0712624222', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 17000, 3, 19, 18, 0);
  INSERT INTO `Staff` VALUES('16', 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '0776536611', '2011-12-01', '2014-12-01', 1, 1, 1, 14, 3, 7, 4, 25000, 4, 1, 18, 0);
  INSERT INTO `Staff` VALUES('2', 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '9125876923', 'kottawa', '07145236', '2014-08-19', '2014-08-14', 2, 2, 2, 2, 2, 2, 0, 30000, 1, 2, 2, 0);
  INSERT INTO `Staff` VALUES('3', 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '936257891V', 'narammala', '0714563298', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 35000, 2, 2, 4, 0);
  INSERT INTO `Staff` VALUES('4', 'Madhusha Mendis', '2014-08-27', 2, 1, 1, 1, '936541278', 'moratuwa paradai', '0711701236', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 96000, 1, 10, 57, 0);
  INSERT INTO `Staff` VALUES('5', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879', 'kurunegala', '011296875', '2014-08-27', '2014-08-29', 2, 2, 2, 2, 2, 2, 2, 45000, 1, 10, 10, 0);
  INSERT INTO `Staff` VALUES('6', 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '95896452', 'wellawattha', '071456932', '2014-08-13', '2014-08-22', 5, 3, 1, 1, 1, 1, 1, 98623, 3, 4, 10, 0);
  INSERT INTO `Staff` VALUES('7', 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 6, 1, 1, 1, 1, 10000, 3, 7, 45, 0);
  INSERT INTO `Staff` VALUES('8', 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '012236598', '2014-07-09', '2014-08-15', 3, 3, 2, 2, 3, 1, 1, 201369, 2, 1, 33, 0);
  INSERT INTO `Staff` VALUES('9', 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '4563218', 'wellawattha', '0112968756', '2014-08-20', '2014-08-29', 4, 3, 6, 6, 2, 2, 5, 45000, 4, 6, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

  CREATE TABLE IF NOT EXISTS `Student` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `NameWithInitials` varchar(50) DEFAULT NULL,
    `DateOfBirth` date NOT NULL,
    `Nationality_Race` int(11) DEFAULT NULL,
    `Religion` int(11) DEFAULT NULL,
    `Medium` int(11) DEFAULT NULL,
    `Address` varchar(100) DEFAULT NULL,
    `Grade` int(11) DEFAULT NULL,
    `Class` char(2) DEFAULT NULL,
    `House` varchar(20) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

  INSERT INTO `Student` VALUES('1', 'Madusha', '2000-12-12', 1, 1, 1, 'Here', 12, 'B', 'Blue', 0);
  INSERT INTO `Student` VALUES('12325', 'B.T.M Mendia', '1993-12-01', 1, 1, 1, 'Moratuwa', 11, 'A', 'Shantha', 0);
  INSERT INTO `Student` VALUES('12345', 'J.A.I Jayakody', '1993-12-31', 1, 1, 1, 'Colombo', 11, 'A', 'Surya', 0);
  INSERT INTO `Student` VALUES('2', 'Peiris M.S.E', '1993-09-03', 1, 1, 1, 'kolpity', 11, 'C', 'Green', 0);
  INSERT INTO `Student` VALUES('23247', 'Sanchayan Balayan', '1991-01-01', 1, 1, 1, 'Wellawattha', 11, 'B', 'Surya', 0);
  INSERT INTO `Student` VALUES('23415', 'Upeka tisser', '1990-12-23', 1, 1, 1, 'Wadduwa', 11, 'B', 'Surya', 0);
  INSERT INTO `Student` VALUES('24242', 'Yazdaan Mohamed', '1995-12-30', 4, 3, 1, 'Nugegoda', 11, 'B', 'Shantha', 0);
  INSERT INTO `Student` VALUES('3', 'jaya', '1993-01-21', 1, 1, 1, 'kolpity', 11, 'A', 'Blue', 0);
  INSERT INTO `Student` VALUES('32424', 'sahan tissera', '1991-12-02', 1, 1, 1, 'Angoda', 11, 'B', 'Shantha', 0);
  INSERT INTO `Student` VALUES('43435', 'Venusha Ranaviraj', '1993-12-21', 1, 1, 1, 'Ganemulla', 11, 'A', 'veera', 0);
  INSERT INTO `Student` VALUES('43536', 'Dulip Rathnayaka', '1991-12-31', 1, 1, 1, 'Kottawa', 11, 'A', 'Su', 0);
  INSERT INTO `Student` VALUES('43568', 'M.C Liyanage', '1994-12-31', 1, 1, 1, 'Borella', 11, 'B', 'veera', 0);
  INSERT INTO `Student` VALUES('45678', 'Janith Heshan', '1989-12-31', 1, 1, 1, 'Rajagiriya', 11, 'A', 'Surya', 0);
  INSERT INTO `Student` VALUES('54645', 'Darsha Fonseka', '1989-12-31', 1, 1, 1, 'kolpity', 11, 'B', 'Methta', 0);
  INSERT INTO `Student` VALUES('54646', 'Devni Indula', '1991-11-28', 1, 1, 1, 'Panadura', 11, 'B', 'Surya', 0);
  INSERT INTO `Student` VALUES('64558', 'Niruthi Yogalingam', '1995-12-30', 1, 1, 1, 'negombo', 11, 'B', 'Shantha', 0);
  INSERT INTO `Student` VALUES('65578', ' Sampath Jayasundara', '1991-12-01', 1, 1, 1, 'negombo', 11, 'A', 'Methta', 0);
  INSERT INTO `Student` VALUES('65758', 'Ashan Asela', '2005-01-31', 1, 1, 1, 'Dehiwala', 11, 'B', 'Surya', 0);
  INSERT INTO `Student` VALUES('65784', 'Mevanka Roshali', '1993-11-30', 1, 1, 1, 'Dehiwala', 11, 'A', 'veera', 0);
  INSERT INTO `Student` VALUES('75638', 'Jane Arathy', '1993-11-29', 1, 1, 1, 'Kotahena', 11, 'B', 'Methta', 0);
  INSERT INTO `Student` VALUES('75857', 'Gihan Jayawardena', '1988-12-31', 1, 1, 1, 'kolpity', 11, 'A', 'Methta', 0);
  INSERT INTO `Student` VALUES('76954', 'Raneesha Peiries', '1994-12-31', 1, 1, 1, 'Wellawattha', 11, 'A', 'Shantha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Student_Subject_Grade`
--

  CREATE TABLE IF NOT EXISTS `Student_Subject_Grade` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`Subject`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Subject_Grade`
--

  CREATE TABLE IF NOT EXISTS `Subject_Grade` (
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `Grade` int(11) DEFAULT NULL,
    `Subject` varchar(30) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Teaches`
--

  CREATE TABLE IF NOT EXISTS `Teaches` (
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Subject`,`StaffID`),
    KEY `fk009` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TermMarks`
--

  CREATE TABLE IF NOT EXISTS `TermMarks` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `Term` int(11) NOT NULL DEFAULT '0',
    `Mark` int(11) DEFAULT NULL,
    `Remarks` varchar(128) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`Subject`,`Term`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

  CREATE TABLE IF NOT EXISTS `Timetable` (
    `Grade` int(11) DEFAULT NULL,
    `Class` char(2) DEFAULT NULL,
    `Day` int(11) NOT NULL DEFAULT '0',
    `Position` int(11) NOT NULL DEFAULT '0',
    `Subject` varchar(64) DEFAULT NULL,
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`,`Day`,`Position`),
    KEY `fk011` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Timetable`
--

  INSERT INTO `Timetable` VALUES(1, 'A', 0, 0, 'Science', '1', 0);
  INSERT INTO `Timetable` VALUES(1, 'A', 0, 1, 'Science', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, '', '1', 0);
  INSERT INTO `Timetable` VALUES(2, NULL, 1, 0, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, '', '1', 0);
  INSERT INTO `Timetable` VALUES(1, 'B', 1, 5, '', '1', 0);
  INSERT INTO `Timetable` VALUES(1, 'B', 1, 6, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, '', '1', 0);
  INSERT INTO `Timetable` VALUES(4, NULL, 2, 0, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, '', '1', 0);
  INSERT INTO `Timetable` VALUES(1, 'E', 3, 2, 'Science', '1', 0);
  INSERT INTO `Timetable` VALUES(1, 'E', 3, 3, 'Science', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, '', '1', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '10', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '11', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '12', 0);
  INSERT INTO `Timetable` VALUES(4, 'B', 0, 0, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'B', 0, 1, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 0, 2, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 0, 3, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, '', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'C', 0, 6, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 0, 7, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(5, 'C', 1, 0, 'Science', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'C', 1, 2, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 1, 3, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 1, 5, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 1, 6, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, '', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 2, 1, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'E', 2, 2, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'E', 2, 4, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'E', 2, 5, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'C', 2, 6, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'C', 2, 7, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 3, 0, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 3, 1, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'B', 3, 2, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'B', 3, 3, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, '', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 3, 6, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'A', 3, 7, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, '', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 4, 2, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'D', 4, 3, 'English Literature', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, '', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'E', 4, 5, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(4, 'E', 4, 6, 'English', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, '', '13', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '14', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '15', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '16', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '2', 2);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '3', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '4', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '5', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, '', '6', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '7', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '8', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '9', 0);
  INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

  CREATE TABLE IF NOT EXISTS `Transaction` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `TransactionID` int(11) NOT NULL DEFAULT '0',
    `TransactionDate` date DEFAULT NULL,
    `TransactionType` bit(1) DEFAULT NULL,
    `Amount` float DEFAULT NULL,
    `Description` varchar(200) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`,`TransactionID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

  CREATE TABLE IF NOT EXISTS `User` (
    `userEmail` varchar(50) NOT NULL,
    `userPassword` varchar(80) DEFAULT NULL,
    `accessLevel` int(11) DEFAULT '2',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`userEmail`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `User`
  --

  INSERT INTO `User` VALUES('1', '$2y$10$bEOYHN38SCG2xjwgLBXude39avl5ohE/NeMl4UkmnK7/hCdpQS.l.', 1, 2);
  INSERT INTO `User` VALUES('a', '$2y$10$h01VyUflSOarmJs5H98.Wem2.0UIj8WdUC/Sayxa8BVKAOBvUFUfm', 1, 0);
  INSERT INTO `User` VALUES('ab', '$2y$10$8Az470QmxIuRqy5a6TNmfOiYKvPoJmUSvo08m9CfC6F6PpXKyWEoe', 2, 2);
  INSERT INTO `User` VALUES('abc', '$2y$10$3TeoYC5i/ROkO.ZC6nomLeniQ/PYn1jbkxw4hKm5wbO8LZoduMshK', 1, 2);
  INSERT INTO `User` VALUES('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 0);
  INSERT INTO `User` VALUES('apple', '$2y$10$X67s43KjvUygW5GVeoStCOFVylBbXsUeyD2e6EKCMMUEjxqcEsIFa', 1, 2);
  INSERT INTO `User` VALUES('arabic@gmail.com', '$2y$10$hVONYOoTGLmmG.dfVBJm1.DuPsUTlhJhIqvsYSkQC3KNr0JzDb5bO', 1, 0);
  INSERT INTO `User` VALUES('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 2);
  INSERT INTO `User` VALUES('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 0);
  INSERT INTO `User` VALUES('blue', '$2y$10$FV/zw6c6WkCfHgALLROEmOnjDaiE9ARHAqcHdoQkll3lzPCVqeck.', 1, 0);
  INSERT INTO `User` VALUES('blue table', '$2y$10$nACqSmTdjU/VZp4Oae3d2.pzSw1MxI1hEcOpG79WxbtId5uj9GPmq', 1, 0);
  INSERT INTO `User` VALUES('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 2);
  INSERT INTO `User` VALUES('cd', '$2y$10$blpnAfzAvx22sggBq4A2FO9b8AMlB8hlRB6a.eTJYwVcC//aV0zJ2', 1, 0);
  INSERT INTO `User` VALUES('chair', '$2y$10$c6d3EBGdek9QN9y5pN33oeU3P1xpTbVbJQixQXS.BW0VD1mJfL.vO', 1, 0);
  INSERT INTO `User` VALUES('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 2);
  INSERT INTO `User` VALUES('free', '$2y$10$05tBD.F8Nxi45Ww7oiTUdOeV/qYsk2Dyaa0a8gKWfQrK3PZitmi0y', 1, 2);
  INSERT INTO `User` VALUES('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 2);
  INSERT INTO `User` VALUES('isuru@sliit.lk', '$2y$10$7kD7JsAbPk5fSgIVfnqyguoDlFJML9uBVb12UZ3aqXOEJkze7EHcC', 1, 0);
  INSERT INTO `User` VALUES('madusha.1@sliit.lk', '$2y$10$oqSMJ39w6AWsz1eklYz1eeIVh8YonMDapF..F70P62oWfFwMTQNJi', 2, 0);
  INSERT INTO `User` VALUES('red@blue.org', '$2y$10$c1sE8j/pzNlA14fUOLNmve8LaGX9jutVMJsCbST2QVkVg7vn4FORy', 1, 0);
  INSERT INTO `User` VALUES('sh', '$2y$10$k6WWAhhSBD7UkvbcHDQVj.l6zLYTBpwuyCrO8a2o10qhTR.6gJBKe', 1, 2);
  INSERT INTO `User` VALUES('shavin47', '$2y$10$QmPP8f1zzx0qW6b3v.h.X.Fox.FyA3mLwy7LrlzkJHdhF8D3srp5.', 1, 0);
  INSERT INTO `User` VALUES('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 0);
  INSERT INTO `User` VALUES('viim@ubuntu.org', '$2y$10$UFAPQ5ujD/CMvgVBHSxOBeWtGScNAFajP1NG2yvxx/qtMz1SqUfUS', 2, 0);
  INSERT INTO `User` VALUES('y', '$2y$10$VKCBn2MD5Q4hifDqhlbPWO.J7hYmW.VNU2oi7lWwoPmH76mSr/Z3e', 1, 2);
  INSERT INTO `User` VALUES('yazdaan.alimudeen@gmail.com', '$2y$10$PbyD11uQUq0dQMLbidQAr.R3N/HY.Kg..GEkk3QXBvlL2mQ1tDXr6', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ALMarks`
--
ALTER TABLE `ALMarks`
  ADD CONSTRAINT `ALMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

--
-- Constraints for table `ApplyLeave`
--
ALTER TABLE `ApplyLeave`
  ADD CONSTRAINT `ApplyLeave_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`),
  ADD CONSTRAINT `ApplyLeave_ibfk_2` FOREIGN KEY (`ReviewedBy`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

--
-- Constraints for table `Blacklist`
--
ALTER TABLE `Blacklist`
  ADD CONSTRAINT `Blacklist_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

  --
  -- Constraints for table `ClassInformation`
  --
  ALTER TABLE `ClassInformation`
  ADD CONSTRAINT `ClassInformation_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `Event`
--
ALTER TABLE `Event`
  ADD CONSTRAINT `Event_ibfk_1` FOREIGN KEY (`EventCreator`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `EventManager`
--
ALTER TABLE `EventManager`
  ADD CONSTRAINT `EventManager_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `Event` (`EventID`),
  ADD CONSTRAINT `EventManager_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `Invitee`
--
ALTER TABLE `Invitee`
  ADD CONSTRAINT `Invitee_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `Event` (`EventID`),
  ADD CONSTRAINT `Invitee_ibfk_2` FOREIGN KEY (`AdmissionNo`, `ParentName`) REFERENCES `ParentsInformation` (`AdmissionNo`, `NamewithInitials`);

--
-- Constraints for table `IsSubstituted`
--
ALTER TABLE `IsSubstituted`
  ADD CONSTRAINT `IsSubstituted_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`),
  ADD CONSTRAINT `IsSubstituted_ibfk_2` FOREIGN KEY (`SubsttitutedTeachedID`, `Day`, `Position`) REFERENCES `Timetable` (`StaffID`, `Day`, `Position`);

--
-- Constraints for table `LabelLanguage`
--
ALTER TABLE `LabelLanguage`
  ADD CONSTRAINT `LabelLanguage_ibfk_1` FOREIGN KEY (`Language`) REFERENCES `Language` (`Language`);

--
-- Constraints for table `LanguageGroup`
--
ALTER TABLE `LanguageGroup`
  ADD CONSTRAINT `LanguageGroup_ibfk_1` FOREIGN KEY (`GroupName`) REFERENCES `LabelLanguage` (`Label`);

--
-- Constraints for table `LanguageOption`
--
ALTER TABLE `LanguageOption`
  ADD CONSTRAINT `LanguageOption_ibfk_1` FOREIGN KEY (`GroupNo`) REFERENCES `LanguageGroup` (`GroupNo`),
  ADD CONSTRAINT `LanguageOption_ibfk_2` FOREIGN KEY (`Language`) REFERENCES `Language` (`Language`);

--
-- Constraints for table `LeaveData`
--
ALTER TABLE `LeaveData`
  ADD CONSTRAINT `LeaveData_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `OLMarks`
--
ALTER TABLE `OLMarks`
  ADD CONSTRAINT `OLMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

  --
  -- Constraints for table `ParentsInformation`
  --
  ALTER TABLE `ParentsInformation`
  ADD CONSTRAINT `ParentsInformation_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

  --
  -- Constraints for table `Student_Subject_Grade`
  --
  ALTER TABLE `Student_Subject_Grade`
  ADD CONSTRAINT `Student_Subject_Grade_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

  --
  -- Constraints for table `Teaches`
  --
  ALTER TABLE `Teaches`
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

  --
  -- Constraints for table `Timetable`
  --
  ALTER TABLE `Timetable`
  ADD CONSTRAINT `Timetable_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

  --
  -- Constraints for table `Transaction`
  --
  ALTER TABLE `Transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `Event` (`EventID`);
  COMMIT;
