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

  CREATE DATABASE IF NOT EXISTS `manaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
  USE `manaDB`;

  CREATE USER 'manaSystem'@'localhost' IDENTIFIED BY 'SMevHZxMEJVfv4Kc';

  GRANT ALL PRIVILEGES ON manaDB.* TO 'manaSystem'@'localhost';

  FLUSH PRIVILEGES;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 09:38 PM
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

  DROP TABLE IF EXISTS `ALMarks`;
  CREATE TABLE IF NOT EXISTS `ALMarks` (
    `IndexNo` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) DEFAULT NULL,
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`IndexNo`,`SubjectID`),
    KEY `AdmissionNo` (`AdmissionNo`),
    KEY `SubjectID` (`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ApplyLeave`
--

  DROP TABLE IF EXISTS `ApplyLeave`;
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

  DROP TABLE IF EXISTS `Attendance`;
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

  DROP TABLE IF EXISTS `Blacklist`;
  CREATE TABLE IF NOT EXISTS `Blacklist` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `ListContributor` varchar(5) NOT NULL DEFAULT '',
    `EnterDate` date NOT NULL DEFAULT '0000-00-00',
    `Reason` varchar(255) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`,`ListContributor`,`EnterDate`),
    KEY `fk003` (`ListContributor`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ClassInformation`
--

  DROP TABLE IF EXISTS `ClassInformation`;
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

  DROP TABLE IF EXISTS `Event`;
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

-- --------------------------------------------------------

--
-- Table structure for table `EventManager`
--

  DROP TABLE IF EXISTS `EventManager`;
  CREATE TABLE IF NOT EXISTS `EventManager` (
    `EventID` int(11) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`EventID`,`StaffID`),
    KEY `fk022` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Holiday`
--

  DROP TABLE IF EXISTS `Holiday`;
  CREATE TABLE IF NOT EXISTS `Holiday` (
    `Year` int(11) NOT NULL DEFAULT '0',
    `Day` date NOT NULL DEFAULT '0000-00-00',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Year`,`Day`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Invitee`
--

  DROP TABLE IF EXISTS `Invitee`;
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

  DROP TABLE IF EXISTS `IsSubstituted`;
  CREATE TABLE IF NOT EXISTS `IsSubstituted` (
    `StaffID` varchar(5) DEFAULT NULL,
    `Grade` int(11) DEFAULT NULL,
    `Class` char(2) DEFAULT NULL,
    `Day` int(11) DEFAULT NULL,
    `Position` int(11) DEFAULT NULL,
    `SubjectID` int(11) DEFAULT NULL,
    `Date` date DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    KEY `fk015` (`StaffID`),
    KEY `fk016` (`Grade`,`Class`,`Day`,`Position`,`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LabelLanguage`
--

  DROP TABLE IF EXISTS `LabelLanguage`;
  CREATE TABLE IF NOT EXISTS `LabelLanguage` (
    `Label` varchar(50) NOT NULL DEFAULT '',
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(200) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Label`,`Language`),
    KEY `fk004` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LabelLanguage`
--

  INSERT INTO `LabelLanguage` VALUES('addmanager', 0, 'Add Event Managers ', 0);
  INSERT INTO `LabelLanguage` VALUES('addmanager', 1, 'සිදුවීම් කළමනාකරුවන් එක් කරන්න ', 0);
  INSERT INTO `LabelLanguage` VALUES('applyForLeave', 0, 'Apply for Leave', 0);
  INSERT INTO `LabelLanguage` VALUES('applyForLeave', 1, 'නිවාඩු ඉල්ලීම්කිරීම', 0);
  INSERT INTO `LabelLanguage` VALUES('approveLeave', 0, 'Approve Leave', 0);
  INSERT INTO `LabelLanguage` VALUES('approveLeave', 1, 'නිවාඩු අනුමතකිරීම', 0);
  INSERT INTO `LabelLanguage` VALUES('createTimetableByClass', 0, 'Create Timetable by Class', 0);
  INSERT INTO `LabelLanguage` VALUES('createTimetableByClass', 1, 'පන්තිය විසින් කාලසටහන සැකසුම', 0);
  INSERT INTO `LabelLanguage` VALUES('createTimetableByTeacher', 0, 'Create Timetable by Teacher', 0);
  INSERT INTO `LabelLanguage` VALUES('createTimetableByTeacher', 1, 'ගුරුවරයා විසින් කාලසටහන සැකසුම', 0);
  INSERT INTO `LabelLanguage` VALUES('date', 0, 'Date', 0);
  INSERT INTO `LabelLanguage` VALUES('date', 1, 'දිනය', 0);
  INSERT INTO `LabelLanguage` VALUES('description', 0, 'Description', 0);
  INSERT INTO `LabelLanguage` VALUES('description', 1, 'විස්තරය', 0);
  INSERT INTO `LabelLanguage` VALUES('endtime', 0, 'End Time', 0);
  INSERT INTO `LabelLanguage` VALUES('endtime', 1, 'අවසන් වන වෙලාව', 0);
  INSERT INTO `LabelLanguage` VALUES('eventcreator', 0, 'Event Creator', 0);
  INSERT INTO `LabelLanguage` VALUES('eventcreator', 1, 'සිදුවීම් නිර්මාණකරු', 0);
  INSERT INTO `LabelLanguage` VALUES('eventid', 0, 'Event ID', 0);
  INSERT INTO `LabelLanguage` VALUES('eventid', 1, 'සිදුවීම් අංකය', 0);
  INSERT INTO `LabelLanguage` VALUES('eventManagement', 0, 'Event Management', 0);
  INSERT INTO `LabelLanguage` VALUES('eventManagement', 1, 'උත්සවය කළමනාකරණය', 0);
  INSERT INTO `LabelLanguage` VALUES('eventtype', 0, 'Event Type', 0);
  INSERT INTO `LabelLanguage` VALUES('eventtype', 1, 'සිදුවීම් වර්ගය', 0);
  INSERT INTO `LabelLanguage` VALUES('leaveManagement', 0, 'Leave Management', 0);
  INSERT INTO `LabelLanguage` VALUES('leaveManagement', 1, 'නිවාඩුව කළමනාකරණය', 0);
  INSERT INTO `LabelLanguage` VALUES('location', 0, 'Location', 0);
  INSERT INTO `LabelLanguage` VALUES('location', 1, 'ස්ථානය', 0);
  INSERT INTO `LabelLanguage` VALUES('name', 0, 'Name', 0);
  INSERT INTO `LabelLanguage` VALUES('name', 1, 'සිදුවීම', 0);
  INSERT INTO `LabelLanguage` VALUES('prizegiving', 0, 'Prize Giving Ceremony', 0);
  INSERT INTO `LabelLanguage` VALUES('prizegiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය', 0);
  INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 0, 'Register Staff Member', 0);
  INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 1, 'කාර්යමණ්ඩලය වාර්තාකරන්න', 0);
  INSERT INTO `LabelLanguage` VALUES('saveevent', 0, 'Save Event', 0);
  INSERT INTO `LabelLanguage` VALUES('saveevent', 1, 'සිදුවීම සුරකින්න', 0);
  INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 0, 'Search Staff Member', 0);
  INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 1, 'කාර්යමණ්ඩලය සෙවීම', 0);
  INSERT INTO `LabelLanguage` VALUES('sportmeet', 0, 'Sports Meet', 0);
  INSERT INTO `LabelLanguage` VALUES('sportmeet', 1, 'ක්‍රීඩා උත්සවය', 0);
  INSERT INTO `LabelLanguage` VALUES('staffManagement', 0, 'Staff Management', 0);
  INSERT INTO `LabelLanguage` VALUES('staffManagement', 1, 'කාර්යමණ්ඩලය කළමනාකරණය', 0);
  INSERT INTO `LabelLanguage` VALUES('starttime', 0, 'Start Time ', 0);
  INSERT INTO `LabelLanguage` VALUES('starttime', 1, 'ආරම්භක වෙලාව ', 0);
  INSERT INTO `LabelLanguage` VALUES('status', 0, 'Status', 0);
  INSERT INTO `LabelLanguage` VALUES('status', 1, 'තත්වය', 0);
  INSERT INTO `LabelLanguage` VALUES('teacherday', 0, 'Teacher''s Day', 0);
  INSERT INTO `LabelLanguage` VALUES('teacherday', 1, 'ගුරු දිනය', 0);
  INSERT INTO `LabelLanguage` VALUES('timetables', 0, 'Timetables', 0);
  INSERT INTO `LabelLanguage` VALUES('timetables', 1, 'කාලසටහන', 0);
  INSERT INTO `LabelLanguage` VALUES('viewLeaveHistory', 0, 'View Leave History', 0);
  INSERT INTO `LabelLanguage` VALUES('viewLeaveHistory', 1, 'ඉකුත් වූ නිවාඩු', 0);

  INSERT INTO `LabelLanguage` VALUES('keepAttendance', 0, 'Keep Attendance', 0);
  INSERT INTO `LabelLanguage` VALUES('keepAttendance', 1, 'පැමිණීමේ වාර්තාව ', 0);
  INSERT INTO `LabelLanguage` VALUES('grade', 0, ' Grade', 0);
  INSERT INTO `LabelLanguage` VALUES('grade', 1, 'වසර', 0);
  INSERT INTO `LabelLanguage` VALUES('week', 0, ' Week', 0);
  INSERT INTO `LabelLanguage` VALUES('week', 1, 'සතිය', 0);
  INSERT INTO `LabelLanguage` VALUES('admissionNo', 0, 'Admission No', 0);
  INSERT INTO `LabelLanguage` VALUES('admissionNo', 1, 'ඇතුලත්විමෙ අංකය ', 0);
  INSERT INTO `LabelLanguage` VALUES('monday', 0, 'M', 0);
  INSERT INTO `LabelLanguage` VALUES('monday',1 , 'ස', 0);
  INSERT INTO `LabelLanguage` VALUES('tuesday', 0, 'T', 0);
  INSERT INTO `LabelLanguage` VALUES('tuesday', 1, 'අ', 0);
  INSERT INTO `LabelLanguage` VALUES('wednesday', 0, 'W', 0);
  INSERT INTO `LabelLanguage` VALUES('wednesday', 1, 'බ', 0);
  INSERT INTO `LabelLanguage` VALUES('thursday', 0, 'T', 0);
  INSERT INTO `LabelLanguage` VALUES('thursday', 1, '', 0);
  INSERT INTO `LabelLanguage` VALUES('friday', 0, 'F', 0);
  INSERT INTO `LabelLanguage` VALUES('friday', 1, 'සි', 0);

  INSERT INTO `LabelLanguage` VALUES('classwiseattendancereport', 0, 'Class-wise Attendance Report', 0);
  INSERT INTO `LabelLanguage` VALUES('classwiseattendancereport', 1, 'පන්ති මට්ටමේ පැමිණීමේ වාර්තාව', 0);
  INSERT INTO `LabelLanguage` VALUES('classwisereport', 1, 'Class-wise Report', 0);
  INSERT INTO `LabelLanguage` VALUES('classwisereport', 1, '', 0);
  INSERT INTO `LabelLanguage` VALUES('grade', 0, 'Grade', 0);
  INSERT INTO `LabelLanguage` VALUES('grade', 1, 'වසර', 0);
  INSERT INTO `LabelLanguage` VALUES('class', 0, 'Class', 0);
  INSERT INTO `LabelLanguage` VALUES('class', 1, 'පන්තිය', 0);
  INSERT INTO `LabelLanguage` VALUES('dateFrom', 0, 'Date From', 0);
  INSERT INTO `LabelLanguage` VALUES('dateFrom', 1, 'දින සිට', 0);
  INSERT INTO `LabelLanguage` VALUES('dateTo', 0, 'Date To', 0);
  INSERT INTO `LabelLanguage` VALUES('dateTo', 1, 'දින දක්වා', 0);

  INSERT INTO `LabelLanguage` VALUES('studentwiseattendancereport', 0, 'Student-wise Attendance Report', 0);
  INSERT INTO `LabelLanguage` VALUES('studentwiseattendancereport', 1, 'පන්ති මට්ටමේ පැමිණීමේ වාර්තාව', 0);
  INSERT INTO `LabelLanguage` VALUES('studentwisereport', 1, 'Student-wise Report', 0);
  INSERT INTO `LabelLanguage` VALUES('studentwisereport', 1, 'පන්ති මට්ටමේ වාර්තාව', 0);
  INSERT INTO `LabelLanguage` VALUES('studentName', 0, 'Student Name', 0);
  INSERT INTO `LabelLanguage` VALUES('studentName', 1, 'ශිෂ්‍යාගේ නම', 0);

  INSERT INTO `LabelLanguage` VALUES('viewattendance', 0, 'View Attendance', 0);
  INSERT INTO `LabelLanguage` VALUES('viewattendance', 1, 'පැමිණීම පරික්ෂා කිරීම', 0);
  INSERT INTO `LabelLanguage` VALUES('viewattendancedetails', 0, 'View Attendance Details', 0);
  INSERT INTO `LabelLanguage` VALUES('viewattendancedetails', 1, 'පැමිණීම පරික්ෂා කිරීමේ තොරතුරු', 0);


-- --------------------------------------------------------

--
-- Table structure for table `Language`
--

  DROP TABLE IF EXISTS `Language`;
  CREATE TABLE IF NOT EXISTS `Language` (
    `Language` int(11) NOT NULL DEFAULT '0',
    `Value` varchar(20) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Language`
--

  INSERT INTO `Language` VALUES(0, 'English', 0);
  INSERT INTO `Language` VALUES(1, 'Sinhala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `LanguageGroup`
--

  DROP TABLE IF EXISTS `LanguageGroup`;
  CREATE TABLE IF NOT EXISTS `LanguageGroup` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `GroupName` varchar(50) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`GroupNo`),
    KEY `fk005` (`GroupName`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LanguageOption`
--

  DROP TABLE IF EXISTS `LanguageOption`;
  CREATE TABLE IF NOT EXISTS `LanguageOption` (
    `GroupNo` int(11) NOT NULL DEFAULT '0',
    `OptionNo` int(11) NOT NULL DEFAULT '0',
    `Language` int(11) DEFAULT NULL,
    `Value` varchar(200) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`GroupNo`,`OptionNo`),
    KEY `fk006` (`Language`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LeaveData`
--

  DROP TABLE IF EXISTS `LeaveData`;
  CREATE TABLE IF NOT EXISTS `LeaveData` (
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `OfficialLeave` int(11) DEFAULT NULL,
    `MaternityLeave` int(11) DEFAULT NULL,
    `OtherLeave` int(11) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `OLMarks`
--

  DROP TABLE IF EXISTS `OLMarks`;
  CREATE TABLE IF NOT EXISTS `OLMarks` (
    `IndexNo` int(11) NOT NULL DEFAULT '0',
    `AdmissionNo` varchar(5) DEFAULT NULL,
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`IndexNo`,`SubjectID`),
    KEY `AdmissionNo` (`AdmissionNo`),
    KEY `SubjectID` (`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -- --------------------------------------------------------

  --
  -- Table structure for table `ParentsInformation`
  --

  DROP TABLE IF EXISTS `ParentsInformation`;
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

  DROP TABLE IF EXISTS `Staff`;
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

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

  DROP TABLE IF EXISTS `Student`;
  CREATE TABLE IF NOT EXISTS `Student` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `NameWithInitials` varchar(50) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `Student_Subject_Grade`
--

  DROP TABLE IF EXISTS `Student_Subject_Grade`;
  CREATE TABLE IF NOT EXISTS `Student_Subject_Grade` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`SubjectID`),
    KEY `fk025` (`SubjectID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Subject_Grade`
--

  DROP TABLE IF EXISTS `Subject_Grade`;
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

  DROP TABLE IF EXISTS `Teaches`;
  CREATE TABLE IF NOT EXISTS `Teaches` (
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) NOT NULL DEFAULT '',
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`SubjectID`,`StaffID`),
    KEY `fk009` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TermMarks`
--

  DROP TABLE IF EXISTS `TermMarks`;
  CREATE TABLE IF NOT EXISTS `TermMarks` (
    `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `Term` int(11) NOT NULL DEFAULT '0',
    `Mark` int(11) DEFAULT NULL,
    `Remarks` varchar(127) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`AdmissionNo`,`SubjectID`,`Term`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

  DROP TABLE IF EXISTS `Timetable`;
  CREATE TABLE IF NOT EXISTS `Timetable` (
    `Grade` int(11) NOT NULL DEFAULT '0',
    `Class` char(2) NOT NULL DEFAULT '',
    `Day` int(11) NOT NULL DEFAULT '0',
    `Position` int(11) NOT NULL DEFAULT '0',
    `SubjectID` int(11) NOT NULL DEFAULT '0',
    `StaffID` varchar(5) DEFAULT NULL,
    `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`Grade`,`Class`,`Day`,`Position`,`SubjectID`),
    KEY `fk010` (`SubjectID`),
    KEY `fk011` (`StaffID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

  DROP TABLE IF EXISTS `Transaction`;
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

  DROP TABLE IF EXISTS `User`;
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

  INSERT INTO `User` VALUES('a', '$2y$10$/2q2Bgdr7L2ocN1HE56GueofwhPfK/i4KJX/cEj.ISY4mhfbRq8E2', 1, 0);
  INSERT INTO `User` VALUES('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 0);
  INSERT INTO `User` VALUES('arabic@gmail.com', '$2y$10$PvG7wnmtFqMvSj0CQhhKEeAg6COM2fzGs6JCA17Imp9SUY2TpsY22', 1, 0);
  INSERT INTO `User` VALUES('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 0);
  INSERT INTO `User` VALUES('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 0);
  INSERT INTO `User` VALUES('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 0);
  INSERT INTO `User` VALUES('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 0);
  INSERT INTO `User` VALUES('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 0);
  INSERT INTO `User` VALUES('madusha.1@sliit.lk', '$2y$10$oqSMJ39w6AWsz1eklYz1eeIVh8YonMDapF..F70P62oWfFwMTQNJi', 2, 0);
  INSERT INTO `User` VALUES('red@blue.org', '$2y$10$c1sE8j/pzNlA14fUOLNmve8LaGX9jutVMJsCbST2QVkVg7vn4FORy', 1, 0);
  INSERT INTO `User` VALUES('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 0);
  INSERT INTO `User` VALUES('y', '$2y$10$/2q2Bgdr7L2ocN1HE56GueofwhPfK/i4KJX/cEj.ISY4mhfbRq8E2', 1, 0);
  INSERT INTO `User` VALUES('yazdaan.alimudeen@gmail.com', '$2y$10$U5A51bsgew2WjQ8LbQHPMuLChxkBFjFKwjLYJr0GdV7otPLoNi1L.', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ALMarks`
--
ALTER TABLE `ALMarks`
  ADD CONSTRAINT `ALMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`),
  ADD CONSTRAINT `ALMarks_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `Subject_Grade` (`SubjectID`);

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
  ADD CONSTRAINT `Blacklist_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`),
  ADD CONSTRAINT `Blacklist_ibfk_2` FOREIGN KEY (`ListContributor`) REFERENCES `Staff` (`StaffID`);

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
  ADD CONSTRAINT `IsSubstituted_ibfk_2` FOREIGN KEY (`Grade`, `Class`, `Day`, `Position`, `SubjectID`) REFERENCES `Timetable` (`Grade`, `Class`, `Day`, `Position`, `SubjectID`);

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
  ADD CONSTRAINT `OLMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`),
  ADD CONSTRAINT `OLMarks_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `Subject_Grade` (`SubjectID`);

--
-- Constraints for table `ParentsInformation`
--
ALTER TABLE `ParentsInformation`
  ADD CONSTRAINT `ParentsInformation_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`);

--
-- Constraints for table `Student_Subject_Grade`
--
ALTER TABLE `Student_Subject_Grade`
  ADD CONSTRAINT `Student_Subject_Grade_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `Student` (`AdmissionNo`),
  ADD CONSTRAINT `Student_Subject_Grade_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `Subject_Grade` (`SubjectID`);

--
-- Constraints for table `Teaches`
--
ALTER TABLE `Teaches`
  ADD CONSTRAINT `Teaches_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `Subject_Grade` (`SubjectID`),
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

  --
  -- Constraints for table `TermMarks`
  --
  ALTER TABLE `TermMarks`
  ADD CONSTRAINT `TermMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`, `SubjectID`) REFERENCES `Student_Subject_Grade` (`AdmissionNo`, `SubjectID`);

  --
  -- Constraints for table `Timetable`
  --
  ALTER TABLE `Timetable`
  ADD CONSTRAINT `Timetable_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `Subject_Grade` (`SubjectID`),
  ADD CONSTRAINT `Timetable_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

  --
  -- Constraints for table `Transaction`
  --
  ALTER TABLE `Transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `Event` (`EventID`);
  COMMIT;

  ALTER TABLE `event` CHANGE `EventCreator` `EventCreator` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;


