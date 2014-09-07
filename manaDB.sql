  -- phpMyAdmin SQL Dump
  -- version 4.0.10deb1
  -- http://www.phpmyadmin.net
  --
  -- Host: localhost
  -- Generation Time: Aug 06, 2014 at 02:10 PM
  -- Server version: 5.5.38-0ubuntu0.14.04.1
  -- PHP Version: 5.5.9-1ubuntu4.3

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET time_zone = "+00:00";

  --
  -- Database: `manaDB`
  --
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
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2014 at 08:19 AM
-- Server version: 5.5.37
-- PHP Version: 5.5.12

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET time_zone = "+00:00";

--
-- Database: `manadb`
--
DROP DATABASE IF EXISTS manaDB;

  CREATE DATABASE IF NOT EXISTS `manadb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
  USE `manadb`;

-- --------------------------------------------------------

--
-- Table structure for table `almarks`
--

  CREATE TABLE IF NOT EXISTS `almarks` (
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
-- Table structure for table `applyleave`
--

  CREATE TABLE IF NOT EXISTS `applyleave` (
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
-- Table structure for table `attendance`
--

  CREATE TABLE IF NOT EXISTS `attendance` (
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
-- Table structure for table `blacklist`
--

  CREATE TABLE IF NOT EXISTS `blacklist` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `EnterDate` date NOT NULL DEFAULT '0000-00-00',
    `Reason` varchar(255) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`,`EnterDate`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classinformation`
--

  CREATE TABLE IF NOT EXISTS `classinformation` (
    `StaffID` varchar(5) DEFAULT NULL,
    `Grade` int(11) NOT NULL DEFAULT '0',
    `Class` char(2) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Grade`,`Class`),
    KEY `fk001` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

  CREATE TABLE IF NOT EXISTS `event` (
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
-- Dumping data for table `event`
--

  INSERT INTO `event` VALUES(1, 'Prize Giving', 'For O/Level examinations', 'Main Auditorium', 0, '2014-08-14', '2', '15:20:00', '17:50:00', 0);
  INSERT INTO `event` VALUES(2, 'Sports Meet', 'Inter House sports meet', 'Sugathadasa Stadium', 0, '2014-08-13', '1', '15:00:00', '20:00:00', 0);
  INSERT INTO `event` VALUES(3, 'Junior Concert', 'Grades 1 to 5. Chief Guest Mr. Liyanage', 'Main Auditorium', 0, '2014-08-21', '1', '18:00:00', '20:00:00', 0);
  INSERT INTO `event` VALUES(4, 'Founder''s Day', 'Walk around the school', 'School', 0, '2014-08-13', '2', '08:00:00', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventmanager`
--

  CREATE TABLE IF NOT EXISTS `eventmanager` (
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
-- Table structure for table `holiday`
--

  CREATE TABLE IF NOT EXISTS `holiday` (
    `Year` int(11) NOT NULL DEFAULT '0',
    `Day` date NOT NULL,
    PRIMARY KEY (`Year`,`Day`),
    KEY `Day` (`Day`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holiday`
--

  INSERT INTO `holiday` VALUES(2014, '2014-01-01');
  INSERT INTO `holiday` VALUES(2014, '2014-01-02');
  INSERT INTO `holiday` VALUES(2014, '2014-01-03');
  INSERT INTO `holiday` VALUES(2014, '2014-02-04');
  INSERT INTO `holiday` VALUES(2014, '2014-02-14');
  INSERT INTO `holiday` VALUES(2014, '2014-02-27');
  INSERT INTO `holiday` VALUES(2014, '2014-04-11');
  INSERT INTO `holiday` VALUES(2014, '2014-04-14');
  INSERT INTO `holiday` VALUES(2014, '2014-04-15');
  INSERT INTO `holiday` VALUES(2014, '2014-04-16');
  INSERT INTO `holiday` VALUES(2014, '2014-04-17');
  INSERT INTO `holiday` VALUES(2014, '2014-04-18');
  INSERT INTO `holiday` VALUES(2014, '2014-04-21');
  INSERT INTO `holiday` VALUES(2014, '2014-04-22');
  INSERT INTO `holiday` VALUES(2014, '2014-04-23');
  INSERT INTO `holiday` VALUES(2014, '2014-04-24');
  INSERT INTO `holiday` VALUES(2014, '2014-04-25');
  INSERT INTO `holiday` VALUES(2014, '2014-04-28');
  INSERT INTO `holiday` VALUES(2014, '2014-04-29');
  INSERT INTO `holiday` VALUES(2014, '2014-04-30');
  INSERT INTO `holiday` VALUES(2014, '2014-05-01');
  INSERT INTO `holiday` VALUES(2014, '2014-05-14');
  INSERT INTO `holiday` VALUES(2014, '2014-05-15');
  INSERT INTO `holiday` VALUES(2014, '2014-06-12');
  INSERT INTO `holiday` VALUES(2014, '2014-07-29');
  INSERT INTO `holiday` VALUES(2014, '2014-08-08');
  INSERT INTO `holiday` VALUES(2014, '2014-08-11');
  INSERT INTO `holiday` VALUES(2014, '2014-08-12');
  INSERT INTO `holiday` VALUES(2014, '2014-08-13');
  INSERT INTO `holiday` VALUES(2014, '2014-08-14');
  INSERT INTO `holiday` VALUES(2014, '2014-08-15');
  INSERT INTO `holiday` VALUES(2014, '2014-08-18');
  INSERT INTO `holiday` VALUES(2014, '2014-08-19');
  INSERT INTO `holiday` VALUES(2014, '2014-08-20');
  INSERT INTO `holiday` VALUES(2014, '2014-08-21');
  INSERT INTO `holiday` VALUES(2014, '2014-08-22');
  INSERT INTO `holiday` VALUES(2014, '2014-08-25');
  INSERT INTO `holiday` VALUES(2014, '2014-08-26');
  INSERT INTO `holiday` VALUES(2014, '2014-08-27');
  INSERT INTO `holiday` VALUES(2014, '2014-08-28');
  INSERT INTO `holiday` VALUES(2014, '2014-08-29');
  INSERT INTO `holiday` VALUES(2014, '2014-09-01');
  INSERT INTO `holiday` VALUES(2014, '2014-09-02');
  INSERT INTO `holiday` VALUES(2014, '2014-09-22');
  INSERT INTO `holiday` VALUES(2014, '2014-09-23');
  INSERT INTO `holiday` VALUES(2014, '2014-10-08');
  INSERT INTO `holiday` VALUES(2014, '2014-10-22');
  INSERT INTO `holiday` VALUES(2014, '2014-11-06');
  INSERT INTO `holiday` VALUES(2014, '2014-11-20');
  INSERT INTO `holiday` VALUES(2014, '2014-11-21');
  INSERT INTO `holiday` VALUES(2014, '2014-12-10');
  INSERT INTO `holiday` VALUES(2014, '2014-12-11');
  INSERT INTO `holiday` VALUES(2014, '2014-12-12');
  INSERT INTO `holiday` VALUES(2014, '2014-12-15');
  INSERT INTO `holiday` VALUES(2014, '2014-12-16');
  INSERT INTO `holiday` VALUES(2014, '2014-12-17');
  INSERT INTO `holiday` VALUES(2014, '2014-12-18');
  INSERT INTO `holiday` VALUES(2014, '2014-12-19');
  INSERT INTO `holiday` VALUES(2014, '2014-12-23');
  INSERT INTO `holiday` VALUES(2014, '2014-12-24');
  INSERT INTO `holiday` VALUES(2014, '2014-12-25');
  INSERT INTO `holiday` VALUES(2014, '2014-12-26');
  INSERT INTO `holiday` VALUES(2014, '2014-12-30');
  INSERT INTO `holiday` VALUES(2014, '2014-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `invitee`
--

  CREATE TABLE IF NOT EXISTS `invitee` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `ParentName` varchar(50) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`,`AdmissionNo`,`ParentName`),
    KEY `fk020` (`AdmissionNo`,`ParentName`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issubstituted`
--

  CREATE TABLE IF NOT EXISTS `issubstituted` (
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
-- Table structure for table `labellanguage`
--

  CREATE TABLE IF NOT EXISTS `labellanguage` (
    `Label` varchar(50) NOT NULL DEFAULT '',
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`Label`,`Language`),
    KEY `fk004` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labellanguage`
--

  INSERT INTO `labellanguage` VALUES('addManager', 0, 'Add Event Managers ');
  INSERT INTO `labellanguage` VALUES('addManager', 1, 'සිදුවීම් කළමනාකරුවන් එක් කරන්න ');
  INSERT INTO `labellanguage` VALUES('applyForLeave', 0, 'Apply for Leave');
  INSERT INTO `labellanguage` VALUES('applyForLeave', 1, 'නිවාඩු ඉල්ලීම්කිරීම');
  INSERT INTO `labellanguage` VALUES('approveLeave', 0, 'Approve Leave');
  INSERT INTO `labellanguage` VALUES('approveLeave', 1, 'නිවාඩු අනුමතකිරීම');
  INSERT INTO `labellanguage` VALUES('buddhism', 0, 'Buddhism');
  INSERT INTO `labellanguage` VALUES('buddhism', 1, 'බෞද්ධ');
  INSERT INTO `labellanguage` VALUES('byClass', 0, 'by Class');
  INSERT INTO `labellanguage` VALUES('byClass', 1, 'පන්ති මට්ටමින්');
  INSERT INTO `labellanguage` VALUES('byTeacher', 0, 'by Teacher');
  INSERT INTO `labellanguage` VALUES('byTeacher', 1, 'ගුරුවරයාගේ නමින්');
  INSERT INTO `labellanguage` VALUES('catholic', 0, 'Catholic');
  INSERT INTO `labellanguage` VALUES('catholic', 1, 'කතෝලික');
  INSERT INTO `labellanguage` VALUES('chooseOption', 0, 'Choose Option');
  INSERT INTO `labellanguage` VALUES('chooseOption', 1, 'විකල්පය තෝරගන්න');
  INSERT INTO `labellanguage` VALUES('christianity', 0, 'Christianity');
  INSERT INTO `labellanguage` VALUES('christianity', 1, 'ක්‍රිස්තියානි');
  INSERT INTO `labellanguage` VALUES('class', 0, 'Class');
  INSERT INTO `labellanguage` VALUES('class', 1, 'පන්තිය');
  INSERT INTO `labellanguage` VALUES('contactNumber', 0, 'Contact Number');
  INSERT INTO `labellanguage` VALUES('contactNumber', 1, 'දුරකථන අංකය');
  INSERT INTO `labellanguage` VALUES('courseOfStudy', 0, 'Course of Study');
  INSERT INTO `labellanguage` VALUES('courseOfStudy', 1, 'වර්ගමාන පත්වීමේ වර්ගීකරණය');
  INSERT INTO `labellanguage` VALUES('createTimetableByClass', 0, 'Create Timetable by Class');
  INSERT INTO `labellanguage` VALUES('createTimetableByClass', 1, 'පන්තිය විසින් කාලසටහන සැකසුම');
  INSERT INTO `labellanguage` VALUES('createTimetableByTeacher', 0, 'Create Timetable by Teacher');
  INSERT INTO `labellanguage` VALUES('createTimetableByTeacher', 1, 'ගුරුවරයා විසින් කාලසටහන සැකසුම');
  INSERT INTO `labellanguage` VALUES('date', 0, 'Date');
  INSERT INTO `labellanguage` VALUES('date', 1, 'දිනය');
  INSERT INTO `labellanguage` VALUES('dateAppointedAsTeacher', 0, 'Date Appointed as Teacher/Principal');
  INSERT INTO `labellanguage` VALUES('dateAppointedAsTeacher', 1, 'සේවයට පත්වූ වර්ෂය හා මාසය');
  INSERT INTO `labellanguage` VALUES('dateJoinedSchool', 0, 'Date Joined this School');
  INSERT INTO `labellanguage` VALUES('dateJoinedSchool', 1, 'මෙම විදුහලේ පත්වීම භාරගත් වර්ෂය හා මාසය');
  INSERT INTO `labellanguage` VALUES('dateOfBirth', 0, 'Date of Birth');
  INSERT INTO `labellanguage` VALUES('dateOfBirth', 1, 'උපන් දිනය');
  INSERT INTO `labellanguage` VALUES('description', 0, 'Description');
  INSERT INTO `labellanguage` VALUES('description', 1, 'විස්තරය');
  INSERT INTO `labellanguage` VALUES('educationInformation', 0, 'Education Information');
  INSERT INTO `labellanguage` VALUES('educationInformation', 1, 'අධ්‍යාපනික තොරතුරු');
  INSERT INTO `labellanguage` VALUES('emergencyContact', 0, 'Emergency Contact''s Name');
  INSERT INTO `labellanguage` VALUES('emergencyContact', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම');
  INSERT INTO `labellanguage` VALUES('emergencyContactNumber', 0, 'Emergency Contact''s Name');
  INSERT INTO `labellanguage` VALUES('emergencyContactNumber', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය');
  INSERT INTO `labellanguage` VALUES('employmentInformation', 0, 'Employment Information');
  INSERT INTO `labellanguage` VALUES('employmentInformation', 1, 'සේවයේ තොරතුරු');
  INSERT INTO `labellanguage` VALUES('employmentStatus', 0, 'Employment Status');
  INSERT INTO `labellanguage` VALUES('employmentStatus', 1, 'පාසලට පතවීමේ ස්වභාවය');
  INSERT INTO `labellanguage` VALUES('endTime', 0, 'End Time');
  INSERT INTO `labellanguage` VALUES('endTime', 1, 'අවසන් වන වෙලාව');
  INSERT INTO `labellanguage` VALUES('eventCreator', 0, 'Event Creator');
  INSERT INTO `labellanguage` VALUES('eventCreator', 1, 'සිදුවීම් නිර්මාණකරු');
  INSERT INTO `labellanguage` VALUES('eventId', 0, 'Event ID');
  INSERT INTO `labellanguage` VALUES('eventId', 1, 'සිදුවීම් අංකය');
  INSERT INTO `labellanguage` VALUES('eventManagement', 0, 'Event Management');
  INSERT INTO `labellanguage` VALUES('eventManagement', 1, 'උත්සවය කළමනාකරණය');
  INSERT INTO `labellanguage` VALUES('eventType', 0, 'Event Type');
  INSERT INTO `labellanguage` VALUES('eventType', 1, 'සිදුවීම් වර්ගය');
  INSERT INTO `labellanguage` VALUES('fr', 0, 'F');
  INSERT INTO `labellanguage` VALUES('fr', 1, 'සි');
  INSERT INTO `labellanguage` VALUES('friday', 0, 'Friday');
  INSERT INTO `labellanguage` VALUES('friday', 1, 'සිකුරාදා');
  INSERT INTO `labellanguage` VALUES('gender', 0, 'Gender');
  INSERT INTO `labellanguage` VALUES('gender', 1, 'ස්ත්‍රී/පුරුෂ භාවය');
  INSERT INTO `labellanguage` VALUES('generalInformation', 0, 'General Information');
  INSERT INTO `labellanguage` VALUES('generalInformation', 1, 'සාමාන්‍ය තොරතුරු');
  INSERT INTO `labellanguage` VALUES('grade', 0, ' Grade');
  INSERT INTO `labellanguage` VALUES('grade', 1, 'වසර');
  INSERT INTO `labellanguage` VALUES('highestEducationalQualification', 0, 'Highest Educational Qualification');
  INSERT INTO `labellanguage` VALUES('highestEducationalQualification', 1, 'ඉහලම අධ්‍යාපන සුදුසුකම');
  INSERT INTO `labellanguage` VALUES('highestProfessionalQualification', 0, 'Highest Professional Qualification');
  INSERT INTO `labellanguage` VALUES('highestProfessionalQualification', 1, 'ඉහලම වෘත්තීය සුදුසුකම');
  INSERT INTO `labellanguage` VALUES('indianTamil', 0, 'Indian Tamil');
  INSERT INTO `labellanguage` VALUES('indianTamil', 1, 'ඉන්දියානු  දෙමළ');
  INSERT INTO `labellanguage` VALUES('interval', 0, 'INTERVAL');
  INSERT INTO `labellanguage` VALUES('interval', 1, 'විවේක කාලය');
  INSERT INTO `labellanguage` VALUES('islam', 0, 'Islam');
  INSERT INTO `labellanguage` VALUES('islam', 1, 'ඉස්ලාම්');
  INSERT INTO `labellanguage` VALUES('keepAttendance', 0, 'Keep Attendance');
  INSERT INTO `labellanguage` VALUES('keepAttendance', 1, 'පැමිණීමේ වාර්තාව ');
  INSERT INTO `labellanguage` VALUES('leaveManagement', 0, 'Leave Management');
  INSERT INTO `labellanguage` VALUES('leaveManagement', 1, 'නිවාඩුව කළමනාකරණය');
  INSERT INTO `labellanguage` VALUES('location', 0, 'Location');
  INSERT INTO `labellanguage` VALUES('location', 1, 'ස්ථානය');
  INSERT INTO `labellanguage` VALUES('mailDeliveryAddress', 0, 'Mail Delivery Address');
  INSERT INTO `labellanguage` VALUES('mailDeliveryAddress', 1, 'ලිපිනය');
  INSERT INTO `labellanguage` VALUES('married', 0, 'Married');
  INSERT INTO `labellanguage` VALUES('married', 1, 'විවාහක');
  INSERT INTO `labellanguage` VALUES('medium', 0, 'Medium');
  INSERT INTO `labellanguage` VALUES('medium', 1, 'පත්වීම ලද මාධ්‍යය');
  INSERT INTO `labellanguage` VALUES('mo', 0, 'M');
  INSERT INTO `labellanguage` VALUES('mo', 1, 'ස');
  INSERT INTO `labellanguage` VALUES('monday', 0, 'Monday');
  INSERT INTO `labellanguage` VALUES('monday', 1, 'සදුදා');
  INSERT INTO `labellanguage` VALUES('name', 0, 'Name');
  INSERT INTO `labellanguage` VALUES('name', 1, 'සිදුවීම');
  INSERT INTO `labellanguage` VALUES('nameInFull', 0, 'Name in Full');
  INSERT INTO `labellanguage` VALUES('nameInFull', 1, 'සම්පුර්ණ නම');
  INSERT INTO `labellanguage` VALUES('nameWithInitials', 0, 'Name with Initials');
  INSERT INTO `labellanguage` VALUES('nameWithInitials', 1, 'නම් මුලකුරු සමඟ');
  INSERT INTO `labellanguage` VALUES('nationalityRace', 0, 'Nationality Race');
  INSERT INTO `labellanguage` VALUES('nationalityRace', 1, 'ජනවර්ගය');
  INSERT INTO `labellanguage` VALUES('other', 0, 'Other');
  INSERT INTO `labellanguage` VALUES('other', 1, 'වෙනත්');
  INSERT INTO `labellanguage` VALUES('positionInSchool', 0, 'Position in School');
  INSERT INTO `labellanguage` VALUES('positionInSchool', 1, 'පාසලේ දරන තනතුර');
  INSERT INTO `labellanguage` VALUES('prizeGiving', 0, 'Prize Giving Ceremony');
  INSERT INTO `labellanguage` VALUES('prizeGiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය');
  INSERT INTO `labellanguage` VALUES('registerStaffMember', 0, 'Register Staff Member');
  INSERT INTO `labellanguage` VALUES('registerStaffMember', 1, 'කාර්යමණ්ඩලය වාර්තාකරන්න');
  INSERT INTO `labellanguage` VALUES('salary', 0, 'Salary');
  INSERT INTO `labellanguage` VALUES('salary', 1, 'මුළු වැටුප');
  INSERT INTO `labellanguage` VALUES('saveEvent', 0, 'Save Event');
  INSERT INTO `labellanguage` VALUES('saveEvent', 1, 'සිදුවීම සුරකින්න');
  INSERT INTO `labellanguage` VALUES('searchStaffMember', 0, 'Search Staff Member');
  INSERT INTO `labellanguage` VALUES('searchStaffMember', 1, 'කාර්යමණ්ඩලය සෙවීම');
  INSERT INTO `labellanguage` VALUES('section', 0, 'Section');
  INSERT INTO `labellanguage` VALUES('section', 1, 'නිරතවන කාර්යය');
  INSERT INTO `labellanguage` VALUES('serviceGrade', 0, 'Service Grade');
  INSERT INTO `labellanguage` VALUES('serviceGrade', 1, 'අදාල සේවය/ශ්‍රේණිය');
  INSERT INTO `labellanguage` VALUES('sportMeet', 0, 'Sports Meet');
  INSERT INTO `labellanguage` VALUES('sportMeet', 1, 'ක්‍රීඩා උත්සවය');
  INSERT INTO `labellanguage` VALUES('srilankanMuslim', 0, 'Sri Lankan Muslim');
  INSERT INTO `labellanguage` VALUES('srilankanMuslim', 1, 'ශ්‍රී ලාංකික මුස්ලිම්');
  INSERT INTO `labellanguage` VALUES('srilankanTamil', 0, 'Sri Lankan Tamil');
  INSERT INTO `labellanguage` VALUES('srilankanTamil', 1, 'ශ්‍රී ලාංකික දෙමළ');
  INSERT INTO `labellanguage` VALUES('staffID', 0, 'Staff ID');
  INSERT INTO `labellanguage` VALUES('staffID', 1, 'අනුක්‍රමික අංකය');
  INSERT INTO `labellanguage` VALUES('staffManagement', 0, 'Staff Management');
  INSERT INTO `labellanguage` VALUES('staffManagement', 1, 'කාර්යමණ්ඩලය කළමනාකරණය');
  INSERT INTO `labellanguage` VALUES('startTime', 0, 'Start Time ');
  INSERT INTO `labellanguage` VALUES('startTime', 1, 'ආරම්භක වෙලාව ');
  INSERT INTO `labellanguage` VALUES('status', 0, 'Status');
  INSERT INTO `labellanguage` VALUES('status', 1, 'තත්වය');
  INSERT INTO `labellanguage` VALUES('subjectMostTaught', 0, 'Subject Most Taught');
  INSERT INTO `labellanguage` VALUES('subjectMostTaught', 1, 'වැඩිම කාලයක් උගන්වන විෂයය');
  INSERT INTO `labellanguage` VALUES('subjectSecondMostTaught', 0, 'Subject Second Most Taught');
  INSERT INTO `labellanguage` VALUES('subjectSecondMostTaught', 1, 'දෙවනුව වැඩි කාලයක් උගන්වන විෂයය');
  INSERT INTO `labellanguage` VALUES('submit', 0, 'Submit');
  INSERT INTO `labellanguage` VALUES('submit', 1, 'තහවුරු කරන්න');
  INSERT INTO `labellanguage` VALUES('teacherDay', 0, 'Teacher''s Day');
  INSERT INTO `labellanguage` VALUES('teacherDay', 1, 'ගුරු දිනය');
  INSERT INTO `labellanguage` VALUES('teachersName', 0, 'Teacher''s Name');
  INSERT INTO `labellanguage` VALUES('teachersName', 1, 'ගුරුවරයාගේ නම');
  INSERT INTO `labellanguage` VALUES('th', 0, 'T');
  INSERT INTO `labellanguage` VALUES('th', 1, '');
  INSERT INTO `labellanguage` VALUES('thursday', 0, 'Thursday');
  INSERT INTO `labellanguage` VALUES('thursday', 1, 'බ්‍රහස්පතින්දා');
  INSERT INTO `labellanguage` VALUES('time', 0, 'Time');
  INSERT INTO `labellanguage` VALUES('time', 1, 'වේලාව');
  INSERT INTO `labellanguage` VALUES('timetables', 0, 'Timetables');
  INSERT INTO `labellanguage` VALUES('timetables', 1, 'කාලසටහන');
  INSERT INTO `labellanguage` VALUES('tu', 0, 'T');
  INSERT INTO `labellanguage` VALUES('tu', 1, 'අ');
  INSERT INTO `labellanguage` VALUES('tuesday', 0, 'Tuesday');
  INSERT INTO `labellanguage` VALUES('tuesday', 1, 'අගහරුවදා');
  INSERT INTO `labellanguage` VALUES('unmarried', 0, 'Not Married');
  INSERT INTO `labellanguage` VALUES('unmarried', 1, 'අවිවාහක');
  INSERT INTO `labellanguage` VALUES('viewLeaveHistory', 0, 'View Leave History');
  INSERT INTO `labellanguage` VALUES('viewLeaveHistory', 1, 'ඉකුත් වූ නිවාඩු');
  INSERT INTO `labellanguage` VALUES('we', 0, 'W');
  INSERT INTO `labellanguage` VALUES('we', 1, 'බ');
  INSERT INTO `labellanguage` VALUES('wednesday', 0, 'Wednesday');
  INSERT INTO `labellanguage` VALUES('wednesday', 1, 'බදාදා');
  INSERT INTO `labellanguage` VALUES('week', 0, ' Week');
  INSERT INTO `labellanguage` VALUES('week', 1, 'සතිය');
  INSERT INTO `labellanguage` VALUES('widow', 0, 'Widow');
  INSERT INTO `labellanguage` VALUES('widow', 1, 'වැන්දබු');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

  CREATE TABLE IF NOT EXISTS `language` (
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

  INSERT INTO `language` VALUES(0, 'English');
  INSERT INTO `language` VALUES(1, 'Sinhala');

-- --------------------------------------------------------

--
-- Table structure for table `languagegroup`
--

  CREATE TABLE IF NOT EXISTS `languagegroup` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `GroupName` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`GroupNo`),
    KEY `fk005` (`GroupName`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languagegroup`
--

  INSERT INTO `languagegroup` VALUES(0, 'nationalityRace');

-- --------------------------------------------------------

--
-- Table structure for table `languageoption`
--

  CREATE TABLE IF NOT EXISTS `languageoption` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `OptionNo` int(11) NOT NULL DEFAULT '0',
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`GroupNo`,`OptionNo`,`Language`),
    KEY `fk006` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leavedata`
--

  CREATE TABLE IF NOT EXISTS `leavedata` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `OfficialLeave` int(11) DEFAULT NULL,
    `MaternityLeave` int(11) DEFAULT NULL,
    `OtherLeave` int(11) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `olmarks`
--

  CREATE TABLE IF NOT EXISTS `olmarks` (
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
-- Table structure for table `parentsinformation`
--

  CREATE TABLE IF NOT EXISTS `parentsinformation` (
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
-- Table structure for table `staff`
--

  CREATE TABLE IF NOT EXISTS `staff` (
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
-- Dumping data for table `staff`
--

  INSERT INTO `staff` VALUES('1', 'Vimukthi Joseph', '2014-08-13', 1, 3, 1, 1, '123456789v', 'makola', '071456923', '2014-08-18', '2014-08-19', 2, 3, 1, 1, 1, 1, 0, 10000, 1, 1, 1, 0);
  INSERT INTO `staff` VALUES('10', 'Amritha Alston', '2014-08-26', 2, 4, 1, 1, '123456789v', 'makola', '0756489326', '2014-08-06', '2014-08-30', 3, NULL, 5, 6, 1, 1, 2, 70000, 2, 2, 2, 0);
  INSERT INTO `staff` VALUES('11', 'Bihara De Silva', '2014-08-26', 2, 2, 1, 1, '923578963', 'kolpity', '0785693214', '2014-08-25', '2014-08-03', 2, 2, 1, 1, 1, 1, 1, 45000, 3, 3, 3, 0);
  INSERT INTO `staff` VALUES('12', 'Chathuri Perera', '0081-08-02', 2, 2, 3, 3, '81456239', 'negambo', '0774379658', '2014-08-26', '2014-08-23', 2, 2, 2, 2, 1, 1, 5, 28000, 5, 5, 64, 0);
  INSERT INTO `staff` VALUES('13', 'Mark All One', '1992-02-12', 1, 1, 2, 1, '123456789v', 'Negombo', '0777777777', '2014-08-07', '2014-08-14', 1, 1, 1, 1, 1, 1, 1, 1, 1, 12, 55, 0);
  INSERT INTO `staff` VALUES('14', 'Tharindu Madusha Mendis', '1993-02-03', 1, 1, 4, 1, '543345543v', 'Kollupitiya', '098789123', '2000-08-02', '2001-09-09', 1, 1, 6, 19, 6, 5, 13, 17000, 3, 18, 41, 0);
  INSERT INTO `staff` VALUES('15', 'Sahan Malinga Tissera', '1993-02-02', NULL, 1, 4, 1, '932470039V', 'Kollupitiya', '0712624222', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 17000, 3, 19, 18, 0);
  INSERT INTO `staff` VALUES('16', 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '0776536611', '2011-12-01', '2014-12-01', 1, 1, 1, 14, 3, 7, 4, 25000, 4, 1, 18, 0);
  INSERT INTO `staff` VALUES('2', 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '9125876923', 'kottawa', '07145236', '2014-08-19', '2014-08-14', 2, 2, 2, 2, 2, 2, 0, 30000, 1, 2, 2, 0);
  INSERT INTO `staff` VALUES('3', 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '93625789', 'narammala', '0714563298', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 35000, 2, 2, 4, 0);
  INSERT INTO `staff` VALUES('4', 'Madhusha Mendis', '2014-08-27', 2, 1, 1, 1, '936541278', 'moratuwa paradai', '0711701236', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 96000, 1, 10, 57, 0);
  INSERT INTO `staff` VALUES('5', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879', 'kurunegala', '011296875', '2014-08-27', '2014-08-29', 2, 2, 2, 2, 2, 2, 2, 45000, 1, 10, 10, 0);
  INSERT INTO `staff` VALUES('6', 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '95896452', 'wellawattha', '071456932', '2014-08-13', '2014-08-22', 5, 3, 1, 1, 1, 1, 1, 98623, 3, 4, 10, 0);
  INSERT INTO `staff` VALUES('7', 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 6, 1, 1, 1, 1, 10000, 3, 7, 45, 0);
  INSERT INTO `staff` VALUES('8', 'Yazdaan M.Y.', '2014-08-20', 1, 3, 1, 1, '923570039v', 'dehiwala', '012236598', '2014-07-09', '2014-08-15', 3, 3, 2, 2, 3, 1, 1, 201369, 2, 1, 33, 0);
  INSERT INTO `staff` VALUES('9', 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '4563218', 'wellawattha', '0112968756', '2014-08-20', '2014-08-29', 4, 3, 6, 6, 2, 2, 5, 45000, 4, 6, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

  CREATE TABLE IF NOT EXISTS `student` (
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
-- Dumping data for table `student`
--

  INSERT INTO `student` VALUES('1', 'Madushan G.LN.A.M', '2014-08-05', 1, 1, 1, 'Negomobo', 11, 'A', 'Blue', 0);
  INSERT INTO `student` VALUES('3', 'Isuru l.k', '2014-08-14', 1, 1, 2, 'negmbo', 11, 'A', 'Madura', 0);
  INSERT INTO `student` VALUES('3680', 'Alimudeen M.Y', '2011-11-22', 5, 5, 1, 'Here', 7, 'B', 'Blue', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_grade`
--

  CREATE TABLE IF NOT EXISTS `student_subject_grade` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`Subject`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject_grade`
--

  CREATE TABLE IF NOT EXISTS `subject_grade` (
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `Grade` int(11) DEFAULT NULL,
    `Subject` varchar(30) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

  CREATE TABLE IF NOT EXISTS `teaches` (
    `Subject` varchar(64) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Subject`,`StaffID`),
    KEY `fk009` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termmarks`
--

  CREATE TABLE IF NOT EXISTS `termmarks` (
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
-- Table structure for table `timetable`
--

  CREATE TABLE IF NOT EXISTS `timetable` (
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
-- Dumping data for table `timetable`
--

  INSERT INTO `timetable` VALUES(1, 'A', 0, 0, 'Science', '1', 0);
  INSERT INTO `timetable` VALUES(1, 'A', 0, 1, 'Science', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, '', '1', 0);
  INSERT INTO `timetable` VALUES(2, NULL, 1, 0, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, '', '1', 0);
  INSERT INTO `timetable` VALUES(1, 'B', 1, 5, '', '1', 0);
  INSERT INTO `timetable` VALUES(1, 'B', 1, 6, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, '', '1', 0);
  INSERT INTO `timetable` VALUES(4, NULL, 2, 0, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, '', '1', 0);
  INSERT INTO `timetable` VALUES(1, 'E', 3, 2, 'Science', '1', 0);
  INSERT INTO `timetable` VALUES(1, 'E', 3, 3, 'Science', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, '', '1', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '10', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '11', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '12', 0);
  INSERT INTO `timetable` VALUES(4, 'B', 0, 0, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'B', 0, 1, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 0, 2, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 0, 3, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, '', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'C', 0, 6, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 0, 7, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(5, 'C', 1, 0, 'Science', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'C', 1, 2, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 1, 3, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 1, 5, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 1, 6, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, '', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 2, 1, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'E', 2, 2, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'E', 2, 4, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'E', 2, 5, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'C', 2, 6, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'C', 2, 7, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 3, 0, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 3, 1, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'B', 3, 2, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'B', 3, 3, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, '', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 3, 6, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'A', 3, 7, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, '', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 4, 2, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'D', 4, 3, 'English Literature', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, '', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'E', 4, 5, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(4, 'E', 4, 6, 'English', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, '', '13', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '14', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '15', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '16', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '2', 2);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '3', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '4', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '5', 0);
  INSERT INTO `timetable` VALUES(NULL, '1', 0, 0, '', '6', 0);
  INSERT INTO `timetable` VALUES(1, 'A', 0, 1, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '1', 0, 2, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '1C', 0, 3, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 0, 4, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 0, 5, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 0, 6, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 0, 7, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 0, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 1, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 2, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 3, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 4, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 5, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 6, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 1, 7, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 0, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 1, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 2, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 3, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 4, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 5, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 6, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 2, 7, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 0, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 1, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 2, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 3, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 4, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 5, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 6, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 3, 7, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 0, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 1, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 2, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 3, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 4, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '', 4, 5, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '1', 4, 6, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, '1', 4, 7, '', '6', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '7', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '8', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '9', 0);
  INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '9', 0);

  -- --------------------------------------------------------

  --
  -- Table structure for table `transaction`
  --

  CREATE TABLE IF NOT EXISTS `transaction` (
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
-- Table structure for table `user`
--

  CREATE TABLE IF NOT EXISTS `user` (
    `userEmail` varchar(50) NOT NULL,
    `userPassword` varchar(80) DEFAULT NULL,
    `accessLevel` int(11) DEFAULT '2',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`userEmail`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

  INSERT INTO `user` VALUES('1', '$2y$10$bEOYHN38SCG2xjwgLBXude39avl5ohE/NeMl4UkmnK7/hCdpQS.l.', 1, 2);
  INSERT INTO `user` VALUES('a', '$2y$10$h01VyUflSOarmJs5H98.Wem2.0UIj8WdUC/Sayxa8BVKAOBvUFUfm', 1, 0);
  INSERT INTO `user` VALUES('ab', '$2y$10$8Az470QmxIuRqy5a6TNmfOiYKvPoJmUSvo08m9CfC6F6PpXKyWEoe', 2, 2);
  INSERT INTO `user` VALUES('abc', '$2y$10$3TeoYC5i/ROkO.ZC6nomLeniQ/PYn1jbkxw4hKm5wbO8LZoduMshK', 1, 2);
  INSERT INTO `user` VALUES('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 0);
  INSERT INTO `user` VALUES('apple', '$2y$10$X67s43KjvUygW5GVeoStCOFVylBbXsUeyD2e6EKCMMUEjxqcEsIFa', 1, 2);
  INSERT INTO `user` VALUES('arabic@gmail.com', '$2y$10$hVONYOoTGLmmG.dfVBJm1.DuPsUTlhJhIqvsYSkQC3KNr0JzDb5bO', 1, 0);
  INSERT INTO `user` VALUES('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 2);
  INSERT INTO `user` VALUES('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 0);
  INSERT INTO `user` VALUES('blue', '$2y$10$FV/zw6c6WkCfHgALLROEmOnjDaiE9ARHAqcHdoQkll3lzPCVqeck.', 1, 0);
  INSERT INTO `user` VALUES('blue table', '$2y$10$nACqSmTdjU/VZp4Oae3d2.pzSw1MxI1hEcOpG79WxbtId5uj9GPmq', 1, 0);
  INSERT INTO `user` VALUES('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 2);
  INSERT INTO `user` VALUES('cd', '$2y$10$blpnAfzAvx22sggBq4A2FO9b8AMlB8hlRB6a.eTJYwVcC//aV0zJ2', 1, 0);
  INSERT INTO `user` VALUES('chair', '$2y$10$c6d3EBGdek9QN9y5pN33oeU3P1xpTbVbJQixQXS.BW0VD1mJfL.vO', 1, 0);
  INSERT INTO `user` VALUES('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 2);
  INSERT INTO `user` VALUES('free', '$2y$10$05tBD.F8Nxi45Ww7oiTUdOeV/qYsk2Dyaa0a8gKWfQrK3PZitmi0y', 1, 2);
  INSERT INTO `user` VALUES('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 2);
  INSERT INTO `user` VALUES('isuru@sliit.lk', '$2y$10$7kD7JsAbPk5fSgIVfnqyguoDlFJML9uBVb12UZ3aqXOEJkze7EHcC', 1, 0);
  INSERT INTO `user` VALUES('madusha.1@sliit.lk', '$2y$10$oqSMJ39w6AWsz1eklYz1eeIVh8YonMDapF..F70P62oWfFwMTQNJi', 2, 0);
  INSERT INTO `user` VALUES('red@blue.org', '$2y$10$c1sE8j/pzNlA14fUOLNmve8LaGX9jutVMJsCbST2QVkVg7vn4FORy', 1, 0);
  INSERT INTO `user` VALUES('sh', '$2y$10$k6WWAhhSBD7UkvbcHDQVj.l6zLYTBpwuyCrO8a2o10qhTR.6gJBKe', 1, 2);
  INSERT INTO `user` VALUES('shavin47', '$2y$10$QmPP8f1zzx0qW6b3v.h.X.Fox.FyA3mLwy7LrlzkJHdhF8D3srp5.', 1, 0);
  INSERT INTO `user` VALUES('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 0);
  INSERT INTO `user` VALUES('viim@ubuntu.org', '$2y$10$UFAPQ5ujD/CMvgVBHSxOBeWtGScNAFajP1NG2yvxx/qtMz1SqUfUS', 2, 0);
  INSERT INTO `user` VALUES('y', '$2y$10$VKCBn2MD5Q4hifDqhlbPWO.J7hYmW.VNU2oi7lWwoPmH76mSr/Z3e', 1, 2);
  INSERT INTO `user` VALUES('yazdaan.alimudeen@gmail.com', '$2y$10$PbyD11uQUq0dQMLbidQAr.R3N/HY.Kg..GEkk3QXBvlL2mQ1tDXr6', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `almarks`
--
ALTER TABLE `almarks`
  ADD CONSTRAINT `ALMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);

--
-- Constraints for table `applyleave`
--
ALTER TABLE `applyleave`
  ADD CONSTRAINT `ApplyLeave_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `ApplyLeave_ibfk_2` FOREIGN KEY (`ReviewedBy`) REFERENCES `staff` (`StaffID`);

  --
  -- Constraints for table `attendance`
  --
  ALTER TABLE `attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);

--
-- Constraints for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `Blacklist_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `classinformation`
--
ALTER TABLE `classinformation`
  ADD CONSTRAINT `ClassInformation_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `Event_ibfk_1` FOREIGN KEY (`EventCreator`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `eventmanager`
--
ALTER TABLE `eventmanager`
  ADD CONSTRAINT `EventManager_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `EventManager_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `invitee`
--
ALTER TABLE `invitee`
  ADD CONSTRAINT `Invitee_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `Invitee_ibfk_2` FOREIGN KEY (`AdmissionNo`, `ParentName`) REFERENCES `parentsinformation` (`AdmissionNo`, `NamewithInitials`);

--
-- Constraints for table `issubstituted`
--
ALTER TABLE `issubstituted`
  ADD CONSTRAINT `IsSubstituted_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `IsSubstituted_ibfk_2` FOREIGN KEY (`SubsttitutedTeachedID`, `Day`, `Position`) REFERENCES `timetable` (`StaffID`, `Day`, `Position`);

--
-- Constraints for table `labellanguage`
--
ALTER TABLE `labellanguage`
  ADD CONSTRAINT `LabelLanguage_ibfk_1` FOREIGN KEY (`Language`) REFERENCES `language` (`Language`);

--
-- Constraints for table `languagegroup`
--
ALTER TABLE `languagegroup`
  ADD CONSTRAINT `LanguageGroup_ibfk_1` FOREIGN KEY (`GroupName`) REFERENCES `labellanguage` (`Label`);

--
-- Constraints for table `languageoption`
--
ALTER TABLE `languageoption`
  ADD CONSTRAINT `LanguageOption_ibfk_1` FOREIGN KEY (`GroupNo`) REFERENCES `languagegroup` (`GroupNo`),
  ADD CONSTRAINT `LanguageOption_ibfk_2` FOREIGN KEY (`Language`) REFERENCES `language` (`Language`);

  --
  -- Constraints for table `leavedata`
  --
  ALTER TABLE `leavedata`
  ADD CONSTRAINT `LeaveData_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

  --
  -- Constraints for table `olmarks`
  --
  ALTER TABLE `olmarks`
  ADD CONSTRAINT `OLMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);

  --
  -- Constraints for table `parentsinformation`
  --
  ALTER TABLE `parentsinformation`
  ADD CONSTRAINT `ParentsInformation_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);

  --
  -- Constraints for table `student_subject_grade`
  --
  ALTER TABLE `student_subject_grade`
  ADD CONSTRAINT `Student_Subject_Grade_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);

  --
  -- Constraints for table `teaches`
  --
  ALTER TABLE `teaches`
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

  --
  -- Constraints for table `timetable`
  --
  ALTER TABLE `timetable`
  ADD CONSTRAINT `Timetable_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

  --
  -- Constraints for table `transaction`
  --
  ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);
