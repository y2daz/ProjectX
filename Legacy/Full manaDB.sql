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
-- Generation Time: Sep 30, 2014 at 11:17 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `Subject_1` varchar(63) NOT NULL DEFAULT '0',
  `Subject_2` varchar(63) DEFAULT NULL,
  `Subject_3` varchar(63) DEFAULT NULL,
  `Grade_1` varchar(3) DEFAULT NULL,
  `Grade_2` varchar(3) DEFAULT NULL,
  `Grade_3` varchar(3) DEFAULT NULL,
  `Gen_Eng_Grade` varchar(3) DEFAULT NULL,
  `Cmn_Gen_Mark` int(3) DEFAULT NULL,
  `Z_Score` float DEFAULT NULL,
  `Island_Rank` int(20) DEFAULT NULL,
  `District_Rank` int(20) DEFAULT NULL,
  PRIMARY KEY (`IndexNo`,`Subject_1`),
  KEY `AdmissionNo` (`AdmissionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ALMarks`
--

INSERT INTO `ALMarks` VALUES(2, '12345', 2012, 'Mathematics', 'Arts', 'Physics', 'A', 'D', 'C', 'D', 70, 2.22, 7650, 1212);
INSERT INTO `ALMarks` VALUES(21, '1', 2014, 'Combined Mathematics', 'Physics', 'Chemistry', 'A', 'A', 'A', 'B', 65, 3.18, 20, 5);
INSERT INTO `ALMarks` VALUES(22, '12325', 2013, 'Economics', 'Accounting', 'Business Studies', 'A', 'A', 'A', 'B', 56, 2.16, 2555, 236);
INSERT INTO `ALMarks` VALUES(23, '12345', 2012, 'Logic', 'Buddhist Culture', 'Economics', 'A', 'B', 'C', 'S', 54, 1.69, 254444, 2456);

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

--
-- Dumping data for table `ApplyLeave`
--

INSERT INTO `ApplyLeave` VALUES('13', '2014-09-22', '2014-09-26', '2014-09-26', 1, '', 1, NULL, '2014-09-30', 0);
INSERT INTO `ApplyLeave` VALUES('20', '2014-09-30', '2014-10-02', '2014-10-02', 2, '', 1, NULL, '2014-09-30', 0);
INSERT INTO `ApplyLeave` VALUES('21', '2014-09-30', '2014-10-01', '2014-11-01', 3, '', 0, NULL, NULL, 0);
INSERT INTO `ApplyLeave` VALUES('4', '2014-09-30', '2014-09-30', '2014-10-02', 3, '', 1, NULL, '2014-09-30', 0);
INSERT INTO `ApplyLeave` VALUES('7', '2014-09-30', '2014-10-02', '2014-10-18', 3, '', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE IF NOT EXISTS `Attendance` (
  `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `isPresent` bit(1) DEFAULT b'0',
  PRIMARY KEY (`AdmissionNo`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` VALUES('12325', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-03-17', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-03-20', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-15', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-16', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-17', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-19', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-26', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-29', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('12325', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('12325', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-03-18', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-03-20', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-09-29', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('12345', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('12345', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-02-12', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-03-19', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-03', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-09-30', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('3', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('3', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-17', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-19', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-09-30', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('43435', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('43435', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-03-21', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-03', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-24', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('43536', '2014-10-01', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('43536', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-02-10', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-03-20', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-09-24', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('45678', '2014-10-01', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('45678', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-03-19', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-03', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-16', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('65578', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('65578', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-03-18', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-16', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('65784', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('65784', '2014-10-03', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-02-10', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-03-17', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-03-18', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-03-19', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-03', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-15', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-16', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-26', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('75857', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('75857', '2014-10-03', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-02-10', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-02-12', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-02-13', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-03-17', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-03-18', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-03-19', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-03-20', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-03-21', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-04-07', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-04-08', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-04-09', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-04-10', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-02', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-12', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-13', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-14', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-15', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-05-16', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-03', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-05', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-08', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-09', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-10', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-11', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-12', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-15', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-16', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-17', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-18', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-19', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-22', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-23', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-24', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-25', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-09-26', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-29', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-09-30', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-10-01', b'1');
INSERT INTO `Attendance` VALUES('76954', '2014-10-02', b'0');
INSERT INTO `Attendance` VALUES('76954', '2014-10-03', b'0');

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

--
-- Dumping data for table `ClassInformation`
--

INSERT INTO `ClassInformation` VALUES('6', 0, 'B', 2);
INSERT INTO `ClassInformation` VALUES('7', 7, 'A', 0);
INSERT INTO `ClassInformation` VALUES('5', 8, 'B', 2);
INSERT INTO `ClassInformation` VALUES('5', 10, 'A', 0);
INSERT INTO `ClassInformation` VALUES('1', 10, 'C', 0);
INSERT INTO `ClassInformation` VALUES('13', 11, 'A', 0);
INSERT INTO `ClassInformation` VALUES('14', 11, 'B', 0);
INSERT INTO `ClassInformation` VALUES('12', 11, 'C', 0);
INSERT INTO `ClassInformation` VALUES('3', 11, 'D', 0);

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
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EventID`,`StaffID`),
  KEY `fk022` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EventManager`
--

INSERT INTO `EventManager` VALUES(4, '2', 0);

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
INSERT INTO `Holiday` VALUES(2014, '2014-02-11');
INSERT INTO `Holiday` VALUES(2014, '2014-02-14');
INSERT INTO `Holiday` VALUES(2014, '2014-02-27');
INSERT INTO `Holiday` VALUES(2014, '2014-04-11');
INSERT INTO `Holiday` VALUES(2014, '2014-04-14');
INSERT INTO `Holiday` VALUES(2014, '2014-04-15');
INSERT INTO `Holiday` VALUES(2014, '2014-04-16');
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
INSERT INTO `Holiday` VALUES(2014, '2014-05-06');
INSERT INTO `Holiday` VALUES(2014, '2014-06-12');
INSERT INTO `Holiday` VALUES(2014, '2014-07-29');
INSERT INTO `Holiday` VALUES(2014, '2014-08-07');
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
INSERT INTO `Holiday` VALUES(2014, '2014-09-04');
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
INSERT INTO `LabelLanguage` VALUES('addnewEvent', 0, 'Add New Event');
INSERT INTO `LabelLanguage` VALUES('addnewEvent', 1, 'නව සිදුවීමක් එකතු කරන්න');
INSERT INTO `LabelLanguage` VALUES('Address', 0, 'Postal Address');
INSERT INTO `LabelLanguage` VALUES('Address', 1, 'ලිපිනය');
INSERT INTO `LabelLanguage` VALUES('addTransaction', 0, 'Add Transaction');
INSERT INTO `LabelLanguage` VALUES('addTransaction', 1, 'ගනුදෙනුව එකතු කරන්න');
INSERT INTO `LabelLanguage` VALUES('AdmissionNo', 0, 'Admission No');
INSERT INTO `LabelLanguage` VALUES('AdmissionNo', 1, 'ඇතුලත්වීමේ අංකය');
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
INSERT INTO `LabelLanguage` VALUES('amount', 0, 'Amount');
INSERT INTO `LabelLanguage` VALUES('amount', 1, 'මුදල');
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
INSERT INTO `LabelLanguage` VALUES('BABScBEd', 0, ' BA, BSc, BEd');
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
INSERT INTO `LabelLanguage` VALUES('bNIEBEd', 0, 'BNIE, BEd');
INSERT INTO `LabelLanguage` VALUES('bNIEBEd', 1, 'හෝ විශ්ව.වි අද්යපනවේදී උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinAgriculture', 0, 'BSc in Agriculture');
INSERT INTO `LabelLanguage` VALUES('bscinAgriculture', 1, 'කෘෂි විද්‍යා උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinBiology', 0, 'BSc in Biology');
INSERT INTO `LabelLanguage` VALUES('bscinBiology', 1, 'ජීව විද්‍යා උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinCombinedMathematics', 0, 'BSc in Combined Mathematics');
INSERT INTO `LabelLanguage` VALUES('bscinCombinedMathematics', 1, 'සංයුක්ත ගණිතය');
INSERT INTO `LabelLanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 0, 'BSc in Commerce Business Mgmt Accounting or equivalent Dip');
INSERT INTO `LabelLanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 1, 'වානිජ්‍ය/ව්‍යාපාර පරිපාලනය/ගණකාධිකරණය උපාධි හා සමාන උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinEducation', 0, 'BSc in Education');
INSERT INTO `LabelLanguage` VALUES('bscinEducation', 1, 'අධ්‍යාපනවේදී උපාධි(විශ්ව විද්‍යාලයිය)');
INSERT INTO `LabelLanguage` VALUES('bscinHomeScience', 0, 'BSc in Home Science');
INSERT INTO `LabelLanguage` VALUES('bscinHomeScience', 1, 'ගෘහ විද්‍යා උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinIT', 0, 'BSc in IT');
INSERT INTO `LabelLanguage` VALUES('bscinIT', 1, 'තොරතුරු තාක්ෂණය');
INSERT INTO `LabelLanguage` VALUES('bscinPhysics', 0, 'BSc in Physics');
INSERT INTO `LabelLanguage` VALUES('bscinPhysics', 1, 'භාව්තීය විද්‍යා උපාධි');
INSERT INTO `LabelLanguage` VALUES('bscinSocialScience', 0, 'Bscin Social Science');
INSERT INTO `LabelLanguage` VALUES('bscinSocialScience', 1, 'සමාජ විද්‍යා උපාධි');
INSERT INTO `LabelLanguage` VALUES('bScspecialisationinMathematics', 0, 'BSc Specialisation in Mathematics');
INSERT INTO `LabelLanguage` VALUES('bScspecialisationinMathematics', 1, 'විශේෂ ගණිත උපාධි');
INSERT INTO `LabelLanguage` VALUES('bTecConstruction', 0, 'BTec Construction');
INSERT INTO `LabelLanguage` VALUES('bTecConstruction', 1, 'ඉදිකිරීම් තාක්ෂණය');
INSERT INTO `LabelLanguage` VALUES('bTecElectronicandElectrical', 0, 'BTec Electronic and Electrical');
INSERT INTO `LabelLanguage` VALUES('bTecElectronicandElectrical', 1, 'විදුලිය හා ඉලෙක්ට්‍රොනික තාක්ෂණය');
INSERT INTO `LabelLanguage` VALUES('bTecMechanical', 0, 'BTec Mechanical');
INSERT INTO `LabelLanguage` VALUES('bTecMechanical', 1, 'යාන්ත්‍රික තාක්ෂණය');
INSERT INTO `LabelLanguage` VALUES('buddhism', 0, 'Buddhism');
INSERT INTO `LabelLanguage` VALUES('buddhism', 1, 'බෞද්ධ');
INSERT INTO `LabelLanguage` VALUES('byClass', 0, 'by Class');
INSERT INTO `LabelLanguage` VALUES('byClass', 1, 'පන්ති මට්ටමින්');
INSERT INTO `LabelLanguage` VALUES('byTeacher', 0, 'by Teacher');
INSERT INTO `LabelLanguage` VALUES('byTeacher', 1, 'ගුරුවරයාගේ නමින්');
INSERT INTO `LabelLanguage` VALUES('catholic', 0, 'Catholicism');
INSERT INTO `LabelLanguage` VALUES('catholic', 1, 'කතෝලික');
INSERT INTO `LabelLanguage` VALUES('certinLibrary', 0, 'Cert. in Library');
INSERT INTO `LabelLanguage` VALUES('certinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති සහතිකපත්‍ර පාඨමාලාව');
INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingAway', 0, 'Cert. in Teacher Training (Away)');
INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingAway', 1, 'ගුරු පුහුණු සහතිකය-දුරස්ථ');
INSERT INTO `LabelLanguage` VALUES('certinTeacherTrainingInstitute', 0, 'Cert. in Teacher Training (Institute)');
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
INSERT INTO `LabelLanguage` VALUES('delete', 0, 'Delete');
INSERT INTO `LabelLanguage` VALUES('delete', 1, 'ඉවත්කරන්න');
INSERT INTO `LabelLanguage` VALUES('deputyPrincipal', 0, 'Deputy Principal');
INSERT INTO `LabelLanguage` VALUES('deputyPrincipal', 1, 'නියෝජ්‍ය විදුහල්පති');
INSERT INTO `LabelLanguage` VALUES('description', 0, 'Description');
INSERT INTO `LabelLanguage` VALUES('description', 1, 'විස්තරය');
INSERT INTO `LabelLanguage` VALUES('dipinAgriculture', 0, 'Dip in Agriculture');
INSERT INTO `LabelLanguage` VALUES('dipinAgriculture', 1, 'කෘෂි අද්‍යාපනය පිළිබද ඩිප්ලෝමාව');
INSERT INTO `LabelLanguage` VALUES('dipinEASL', 0, 'Dip in EASL');
INSERT INTO `LabelLanguage` VALUES('dipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ ඩිප්ලෝමා');
INSERT INTO `LabelLanguage` VALUES('dipinEd', 0, 'Dip in Ed');
INSERT INTO `LabelLanguage` VALUES('dipinEd', 1, 'පශ්චාත් උපාධි අධ්‍යාපන ඩිප්ලෝමාව');
INSERT INTO `LabelLanguage` VALUES('dipinLibrary', 0, 'Dip in Library');
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
INSERT INTO `LabelLanguage` VALUES('eventList', 0, 'Event List');
INSERT INTO `LabelLanguage` VALUES('eventList', 1, 'සිදුවීම් ලැයිස්තුව');
INSERT INTO `LabelLanguage` VALUES('eventManagement', 0, 'Event Management');
INSERT INTO `LabelLanguage` VALUES('eventManagement', 1, 'උත්සවය කළමනාකරණය');
INSERT INTO `LabelLanguage` VALUES('eventName', 0, 'EventName');
INSERT INTO `LabelLanguage` VALUES('eventName', 1, 'සිදුවීම');
INSERT INTO `LabelLanguage` VALUES('eventType', 0, 'Event Type');
INSERT INTO `LabelLanguage` VALUES('eventType', 1, 'සිදුවීම් වර්ගය');
INSERT INTO `LabelLanguage` VALUES('expand', 0, 'Expand');
INSERT INTO `LabelLanguage` VALUES('expand', 1, 'වැඩි විස්තර');
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
INSERT INTO `LabelLanguage` VALUES('gradeclass', 0, 'Grade and Class');
INSERT INTO `LabelLanguage` VALUES('gradeclass', 1, 'වසර සහ පන්තිය');
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
INSERT INTO `LabelLanguage` VALUES('House', 0, 'House');
INSERT INTO `LabelLanguage` VALUES('House', 1, 'නිවාසය');
INSERT INTO `LabelLanguage` VALUES('indianTamil', 0, 'Indian Tamil');
INSERT INTO `LabelLanguage` VALUES('indianTamil', 1, 'ඉන්දියානු  දෙමළ');
INSERT INTO `LabelLanguage` VALUES('informationTechnology', 0, 'Information Technology');
INSERT INTO `LabelLanguage` VALUES('informationTechnology', 1, 'තොරතරු තාක්ෂනය');
INSERT INTO `LabelLanguage` VALUES('interval', 0, 'INTERVAL');
INSERT INTO `LabelLanguage` VALUES('interval', 1, 'විවේක කාලය');
INSERT INTO `LabelLanguage` VALUES('invitees', 0, 'Invitees');
INSERT INTO `LabelLanguage` VALUES('invitees', 1, 'ආරාධිතයින්');
INSERT INTO `LabelLanguage` VALUES('inviteesList', 0, 'Invitees List');
INSERT INTO `LabelLanguage` VALUES('inviteesList', 1, 'ආරාධිත ලැයිස්තුව');
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
INSERT INTO `LabelLanguage` VALUES('mailDeliveryAddress', 0, 'Postal Address');
INSERT INTO `LabelLanguage` VALUES('mailDeliveryAddress', 1, 'ලිපිනය');
INSERT INTO `LabelLanguage` VALUES('mAinEd', 0, 'MA in Ed');
INSERT INTO `LabelLanguage` VALUES('mAinEd', 1, 'අධ්‍යාපනය පිළිබද ශ්‍රාස්ත්‍රපති උපාධිය');
INSERT INTO `LabelLanguage` VALUES('malay', 0, 'Malay');
INSERT INTO `LabelLanguage` VALUES('malay', 1, 'මෞලවි');
INSERT INTO `LabelLanguage` VALUES('male', 0, 'Male');
INSERT INTO `LabelLanguage` VALUES('male', 1, 'පිරිමි');
INSERT INTO `LabelLanguage` VALUES('MAMScMEd', 0, ' MA, MSc, MEd');
INSERT INTO `LabelLanguage` VALUES('MAMScMEd', 1, 'ශාස්ත්‍රපති හා ඊට සමාන්තර');
INSERT INTO `LabelLanguage` VALUES('manage', 0, 'Manage');
INSERT INTO `LabelLanguage` VALUES('manage', 1, 'කළමනාකරණය');
INSERT INTO `LabelLanguage` VALUES('manageEvents', 0, 'Manage Events');
INSERT INTO `LabelLanguage` VALUES('manageEvents', 1, 'සිදුවීම් කළමනාකරණය');
INSERT INTO `LabelLanguage` VALUES('management', 0, 'Management');
INSERT INTO `LabelLanguage` VALUES('management', 1, 'පරිපාලනය');
INSERT INTO `LabelLanguage` VALUES('managerList', 0, 'Event Manager List');
INSERT INTO `LabelLanguage` VALUES('managerList', 1, 'සිදුවීම් කළමනාකරුවන් ලැයිස්තුව');
INSERT INTO `LabelLanguage` VALUES('managerName', 0, 'Manager Name');
INSERT INTO `LabelLanguage` VALUES('managerName', 1, 'කළමනාකරුගේ නම');
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
INSERT INTO `LabelLanguage` VALUES('MPhil', 0, 'MPhil');
INSERT INTO `LabelLanguage` VALUES('MPhil', 1, 'දර්ශනපති හා ඊට සමාන්තර');
INSERT INTO `LabelLanguage` VALUES('mPhilEd', 0, 'MPhil Ed');
INSERT INTO `LabelLanguage` VALUES('mPhilEd', 1, 'දර්ශනපති -අධ්‍යාපනය පිළිබද');
INSERT INTO `LabelLanguage` VALUES('mScinEdMgmt', 0, 'MSc in Ed Mgmt');
INSERT INTO `LabelLanguage` VALUES('mScinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද විද්‍යාපති');
INSERT INTO `LabelLanguage` VALUES('mScinLibrary', 0, 'MSc in Library');
INSERT INTO `LabelLanguage` VALUES('mScinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති විද්‍යාපති උපාධිය');
INSERT INTO `LabelLanguage` VALUES('name', 0, 'Name');
INSERT INTO `LabelLanguage` VALUES('name', 1, 'සිදුවීම');
INSERT INTO `LabelLanguage` VALUES('nameInFull', 0, 'Name in Full');
INSERT INTO `LabelLanguage` VALUES('nameInFull', 1, 'සම්පුර්ණ නම');
INSERT INTO `LabelLanguage` VALUES('nameWithInitials', 0, 'Name with Initials');
INSERT INTO `LabelLanguage` VALUES('nameWithInitials', 1, 'නම් මුලකුරු සමඟ');
INSERT INTO `LabelLanguage` VALUES('natDipinTeaching', 0, 'Nat Dip in Teaching');
INSERT INTO `LabelLanguage` VALUES('natDipinTeaching', 1, 'ජාතික ශික්ෂණ විද්‍යා ඩිප්ලෝමාව');
INSERT INTO `LabelLanguage` VALUES('nationalityRace', 0, 'Race');
INSERT INTO `LabelLanguage` VALUES('nationalityRace', 1, 'ජනවර්ගය');
INSERT INTO `LabelLanguage` VALUES('nicNumber', 0, 'NIC Number');
INSERT INTO `LabelLanguage` VALUES('nicNumber', 1, 'ජාතික හැඳුනුම් පත් අංකය');
INSERT INTO `LabelLanguage` VALUES('none', 0, 'None');
INSERT INTO `LabelLanguage` VALUES('none', 1, 'ව්හුර්තීය සුදුසුකම් ලබා නොමැති');
INSERT INTO `LabelLanguage` VALUES('nonRomanCatholicism', 0, 'Non Roman Catholicism');
INSERT INTO `LabelLanguage` VALUES('nonRomanCatholicism', 1, 'රෝමානු කතෝලික නොවන ක්‍රිස්තියානි');
INSERT INTO `LabelLanguage` VALUES('noofinvitees', 0, 'No Of Invitees');
INSERT INTO `LabelLanguage` VALUES('noofinvitees', 1, 'ආරාධිතයින් ගණන');
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
INSERT INTO `LabelLanguage` VALUES('pGDipinEASL', 0, 'PG Dip in EASL');
INSERT INTO `LabelLanguage` VALUES('pGDipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ පශ්චාත් උපාධිඩිප්ලෝමාව');
INSERT INTO `LabelLanguage` VALUES('pGDipinEdMgmt', 0, 'PG Dip in Ed Mgmt');
INSERT INTO `LabelLanguage` VALUES('pGDipinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද පශ්චාත් උපාධිඩිප්ලෝමාව');
INSERT INTO `LabelLanguage` VALUES('pGDipinLibraryScience', 0, 'PG Dip in Library Science');
INSERT INTO `LabelLanguage` VALUES('pGDipinLibraryScience', 1, 'ගුරු පුස්තකාල විද්‍යා පශ්චාත් උපාධි ඩිප්ලෝමා පාඨමාලාව');
INSERT INTO `LabelLanguage` VALUES('phd', 0, 'PhD');
INSERT INTO `LabelLanguage` VALUES('phd', 1, 'දර්ශනශුරී උපාධිහා ඊට සමාන්තර');
INSERT INTO `LabelLanguage` VALUES('phDEd', 0, 'PhD Ed');
INSERT INTO `LabelLanguage` VALUES('phDEd', 1, 'දර්ශනශුරි - අධ්‍යාපනය පිළිබදව');
INSERT INTO `LabelLanguage` VALUES('pname', 0, 'Parent Name');
INSERT INTO `LabelLanguage` VALUES('pname', 1, 'මව/පියා  ගේ නම');
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
INSERT INTO `LabelLanguage` VALUES('printTransction', 0, 'Print Transaction Report');
INSERT INTO `LabelLanguage` VALUES('printTransction', 1, 'ගනුදෙනු වාර්තාව මුද්‍රණය කරන්න');
INSERT INTO `LabelLanguage` VALUES('prizeGiving', 0, 'Prize Giving Ceremony');
INSERT INTO `LabelLanguage` VALUES('prizeGiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය');
INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 0, 'Register Staff Member');
INSERT INTO `LabelLanguage` VALUES('registerStaffMember', 1, 'කාර්යමණ්ඩලය ලියාපදිංචිය');
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
INSERT INTO `LabelLanguage` VALUES('search', 0, 'Search');
INSERT INTO `LabelLanguage` VALUES('search', 1, 'සොයන්න');
INSERT INTO `LabelLanguage` VALUES('searchBy', 0, 'Search By');
INSERT INTO `LabelLanguage` VALUES('searchBy', 1, '');
INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 0, 'Search and Update Details');
INSERT INTO `LabelLanguage` VALUES('searchStaffMember', 1, 'තොරතුරු සෙවීම හා යාවත්කාලීන කිරීම');
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
INSERT INTO `LabelLanguage` VALUES('sid', 0, 'Admission No');
INSERT INTO `LabelLanguage` VALUES('sid', 1, 'ඇතුලත්වීමේ අංකය');
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
INSERT INTO `LabelLanguage` VALUES('Staffallocation', 0, 'Class Teacher Allocation');
INSERT INTO `LabelLanguage` VALUES('Staffallocation', 1, 'පන්ති භාර ගුරු භවතුන්');
INSERT INTO `LabelLanguage` VALUES('staffID', 0, 'Staff ID');
INSERT INTO `LabelLanguage` VALUES('staffID', 1, 'අනුක්‍රමික අංකය');
INSERT INTO `LabelLanguage` VALUES('staffManagement', 0, 'Staff Details');
INSERT INTO `LabelLanguage` VALUES('staffManagement', 1, 'කාර්යමණ්ඩල තොරතුරු');
INSERT INTO `LabelLanguage` VALUES('staffregistrationform', 0, 'Staff Registration Form');
INSERT INTO `LabelLanguage` VALUES('staffregistrationform', 1, 'පාසලේ අධ්‍යන කාර්ය මණ්ඩලවල තොරතුරු');
INSERT INTO `LabelLanguage` VALUES('staffTimetable', 0, 'Teacher''s Timetable');
INSERT INTO `LabelLanguage` VALUES('staffTimetable', 1, 'ගුරුවරුන්ගේ කාලසටහන');
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
INSERT INTO `LabelLanguage` VALUES('Teachersid', 0, 'Teachers ID');
INSERT INTO `LabelLanguage` VALUES('Teachersid', 1, 'අනුක්‍රමික අංකය');
INSERT INTO `LabelLanguage` VALUES('teachersName', 0, 'Teacher''s Name');
INSERT INTO `LabelLanguage` VALUES('teachersName', 1, 'ගුරුවරයාගේ නම');
INSERT INTO `LabelLanguage` VALUES('technology', 0, 'Technology');
INSERT INTO `LabelLanguage` VALUES('technology', 1, 'තාක්ෂණය');
INSERT INTO `LabelLanguage` VALUES('th', 0, 'T');
INSERT INTO `LabelLanguage` VALUES('th', 1, 'බ්‍ර');
INSERT INTO `LabelLanguage` VALUES('theatreandDrama', 0, 'Theatre and Drama');
INSERT INTO `LabelLanguage` VALUES('theatreandDrama', 1, 'නාට්‍ය හා රංග කලාව');
INSERT INTO `LabelLanguage` VALUES('thursday', 0, 'Thursday');
INSERT INTO `LabelLanguage` VALUES('thursday', 1, 'බ්‍රහස්පතින්දා');
INSERT INTO `LabelLanguage` VALUES('tid', 0, 'Transaction ID');
INSERT INTO `LabelLanguage` VALUES('tid', 1, 'ගනුදෙනු අංකය');
INSERT INTO `LabelLanguage` VALUES('time', 0, 'Time');
INSERT INTO `LabelLanguage` VALUES('time', 1, 'වේලාව');
INSERT INTO `LabelLanguage` VALUES('Timetables', 0, 'Timetables');
INSERT INTO `LabelLanguage` VALUES('Timetables', 1, 'කාලසටහන');
INSERT INTO `LabelLanguage` VALUES('tlog', 0, 'Transaction Log');
INSERT INTO `LabelLanguage` VALUES('tlog', 1, 'ගනුදෙනු සටහන');
INSERT INTO `LabelLanguage` VALUES('trecieved', 0, 'Total Recieved');
INSERT INTO `LabelLanguage` VALUES('trecieved', 1, 'ලබාගත් මුළු මුදල');
INSERT INTO `LabelLanguage` VALUES('tspent', 0, 'Total Spent');
INSERT INTO `LabelLanguage` VALUES('tspent', 1, 'වියදම් කල මුළු මුදල');
INSERT INTO `LabelLanguage` VALUES('tu', 0, 'T');
INSERT INTO `LabelLanguage` VALUES('tu', 1, 'අ');
INSERT INTO `LabelLanguage` VALUES('tuesday', 0, 'Tuesday');
INSERT INTO `LabelLanguage` VALUES('tuesday', 1, 'අගහරුවදා');
INSERT INTO `LabelLanguage` VALUES('type', 0, 'Type');
INSERT INTO `LabelLanguage` VALUES('type', 1, 'වර්ගය');
INSERT INTO `LabelLanguage` VALUES('unmarried', 0, 'Not Married');
INSERT INTO `LabelLanguage` VALUES('unmarried', 1, 'අවිවාහක');
INSERT INTO `LabelLanguage` VALUES('update', 0, 'Update');
INSERT INTO `LabelLanguage` VALUES('update', 1, 'යාවත්කාලින කරන්න');
INSERT INTO `LabelLanguage` VALUES('viewInvitees', 0, 'View Invitees List');
INSERT INTO `LabelLanguage` VALUES('viewInvitees', 1, 'ආරාධිත ලැයිස්තුව බලන්න');
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

INSERT INTO `LeaveData` VALUES('1', 0, 0, 0, 0);
INSERT INTO `LeaveData` VALUES('10', -1, -1, -15, 0);
INSERT INTO `LeaveData` VALUES('11', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('12', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('13', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('14', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('15', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('16', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('18', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('2', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('20', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('21', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('3', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('31', 15, 90, 15, 0);
INSERT INTO `LeaveData` VALUES('4', 15, 90, 13, 0);
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

--
-- Dumping data for table `OLMarks`
--

INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Commerce', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'English Language', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'English Literature', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'History', 'B');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Information Technology', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Mathematics', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Religion', 'B');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Science and Technology', 'A');
INSERT INTO `OLMarks` VALUES(12, '1', 2014, 'Sinhala Language', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Commerce', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'English Language', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'History', 'C');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Information Technology', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Mathematics', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Religion', 'B');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Science and Technology', 'A');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Sinhala Language', 'B');
INSERT INTO `OLMarks` VALUES(13, '12325', 2014, 'Sinhala Literature', 'C');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Commerce', 'B');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Drama', 'A');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'English Language', 'A');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'History', 'A');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Home Science', 'C');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Mathematics', 'B');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Religion', 'A');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Science and Technology', 'B');
INSERT INTO `OLMarks` VALUES(14, '12345', 2014, 'Sinhala Language', 'A');

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

--
-- Dumping data for table `ParentsInformation`
--

INSERT INTO `ParentsInformation` VALUES('1', 'Madhu De Silva', b'1', 'Teacher', '0312285596', '0773432532', 'Moratuwa', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('12325', 'Shavin', b'1', 'Banker', '0117272111', '0712323232', 'Kadirana', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('1234', 'Mark Weather', b'1', 'Chef', '0112887898', '0777777854', 'Nugegoda', 'Nedimala', 0);
INSERT INTO `ParentsInformation` VALUES('12345', 'Milan', b'1', 'Teacher', '0312283234', '0771211212', 'katana', 'negombo', 0);
INSERT INTO `ParentsInformation` VALUES('19642', 'Dilani', b'1', 'Teacher', '0117272111', '0782323233', 'Negombo', 'Kotuwa', 0);
INSERT INTO `ParentsInformation` VALUES('19642', 'Dulip De Silva', b'1', 'Teacher', '0117272111', '0726262837', 'negombo', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('2', 'Madusha Perera', b'1', 'Salesrep', '0117272111', '0726262837', 'Negombo', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('23247', 'joseph', b'1', 'Anta', '0312228721', '0712323232', 'Colombo', 'Bamba', 0);
INSERT INTO `ParentsInformation` VALUES('23415', 'Nimal', b'1', 'Banker', '0117272111', '0782323233', 'Moratuwa', 'Dehiwela Colombo', 0);
INSERT INTO `ParentsInformation` VALUES('24242', 'Kamal', b'1', 'Engineer', '0117272111', '0726262837', 'Negombo', 'Dehiwa', 0);
INSERT INTO `ParentsInformation` VALUES('3', 'yazdan Jayakodi', b'1', 'Manager ', '0312228721', '0771123243', 'Negombo', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('32424', 'Upeka', b'1', 'Merchent', '0117272111', '0726262837', 'Colombo', 'Bamba', 0);
INSERT INTO `ParentsInformation` VALUES('43435', 'Kalum', b'1', 'Lecturer', '0117272111', '0726262837', 'Negombo', 'Bamba', 0);
INSERT INTO `ParentsInformation` VALUES('43536', 'Vasantha', b'1', 'Business', '0312228721', '0712323232', 'Colombo', 'Kottawa', 0);
INSERT INTO `ParentsInformation` VALUES('43568', 'john', b'1', 'Business', '0117272111', '0782323233', 'Kurunagala', 'colombo', 0);
INSERT INTO `ParentsInformation` VALUES('45678', 'Srikantha', b'1', 'Teacher', '0312285596', '0726262837', 'Moratuwa', 'negombo', 0);
INSERT INTO `ParentsInformation` VALUES('54645', 'Fonseka', b'1', 'Teacher', '0312285596', '0712323232', 'kolpity', 'Dehiwela Colombo', 0);
INSERT INTO `ParentsInformation` VALUES('54646', 'Dinal', b'1', 'Pilot', '0312228721', '0712323232', 'Colombo', 'Dehiwela Colombo', 0);
INSERT INTO `ParentsInformation` VALUES('64558', 'Malki', b'1', 'Banker', '0117272111', '0782323233', 'Moratuwa', 'Bamba', 0);
INSERT INTO `ParentsInformation` VALUES('65578', 'Amrasena', b'1', 'Driver', '0312228721', '0726262837', 'Negombo', 'Galle', 0);
INSERT INTO `ParentsInformation` VALUES('65758', 'Madusha', b'1', 'Teacher', '0117272111', '0782323233', 'Moratuwa', 'Bamba', 0);
INSERT INTO `ParentsInformation` VALUES('65784', 'Sri', b'1', 'CEO', '0117272111', '0782323233', 'Negombo', 'Dehiwela Colombo', 0);
INSERT INTO `ParentsInformation` VALUES('75638', 'Arathy', b'1', 'Banker', '0117272111', '0712323232', 'Colombo', 'Dehiwa', 0);
INSERT INTO `ParentsInformation` VALUES('75857', 'Kalum', b'1', 'Business', '0312283234', '0712323232', 'kolpity', 'Dehiwela Colombo', 0);
INSERT INTO `ParentsInformation` VALUES('76954', 'Shevon', b'1', 'Manager ', '0312228721', '0712323232', 'Negombo', 'Bamba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `permId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permDesc` varchar(50) NOT NULL,
  `orderKey` int(11) DEFAULT '0',
  PRIMARY KEY (`permId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Permissions`
--

INSERT INTO `Permissions` VALUES(1, 'Administration Panel', 70);
INSERT INTO `Permissions` VALUES(2, 'Staff Details System', 0);
INSERT INTO `Permissions` VALUES(3, 'Leave Management System', 10);
INSERT INTO `Permissions` VALUES(4, 'Leave Application', 11);
INSERT INTO `Permissions` VALUES(5, 'Leave Approval', 11);
INSERT INTO `Permissions` VALUES(6, 'Timetables System', 20);
INSERT INTO `Permissions` VALUES(7, 'Classteacher Allocation', 21);
INSERT INTO `Permissions` VALUES(8, 'Substitute Teacher', 21);
INSERT INTO `Permissions` VALUES(9, 'Student Information System', 30);
INSERT INTO `Permissions` VALUES(10, 'Student Registration', 31);
INSERT INTO `Permissions` VALUES(11, 'Search Student', 31);
INSERT INTO `Permissions` VALUES(12, 'Event Management System', 40);
INSERT INTO `Permissions` VALUES(13, 'Add Event', 41);
INSERT INTO `Permissions` VALUES(14, 'Attendance System', 50);
INSERT INTO `Permissions` VALUES(15, 'Keep Attendance', 51);
INSERT INTO `Permissions` VALUES(16, 'View Attendance', 51);
INSERT INTO `Permissions` VALUES(17, 'Marks and Grading System', 60);
INSERT INTO `Permissions` VALUES(18, 'Enter O/A Level Examination Grades', 61);
INSERT INTO `Permissions` VALUES(19, 'Enter Term Test Marks', 61);
INSERT INTO `Permissions` VALUES(20, 'Search Grades', 61);
INSERT INTO `Permissions` VALUES(21, 'Staff Report', 1);
INSERT INTO `Permissions` VALUES(22, 'Manage Users', 71);
INSERT INTO `Permissions` VALUES(23, 'Change Staff Details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RolePerm`
--

CREATE TABLE IF NOT EXISTS `RolePerm` (
  `roleId` int(10) unsigned NOT NULL,
  `permId` int(10) unsigned NOT NULL,
  KEY `roleId` (`roleId`),
  KEY `permId` (`permId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RolePerm`
--

INSERT INTO `RolePerm` VALUES(4, 13);
INSERT INTO `RolePerm` VALUES(4, 14);
INSERT INTO `RolePerm` VALUES(4, 19);
INSERT INTO `RolePerm` VALUES(4, 12);
INSERT INTO `RolePerm` VALUES(4, 15);
INSERT INTO `RolePerm` VALUES(4, 4);
INSERT INTO `RolePerm` VALUES(4, 3);
INSERT INTO `RolePerm` VALUES(4, 17);
INSERT INTO `RolePerm` VALUES(4, 20);
INSERT INTO `RolePerm` VALUES(4, 11);
INSERT INTO `RolePerm` VALUES(4, 9);
INSERT INTO `RolePerm` VALUES(4, 6);
INSERT INTO `RolePerm` VALUES(4, 16);
INSERT INTO `RolePerm` VALUES(3, 2);
INSERT INTO `RolePerm` VALUES(3, 21);
INSERT INTO `RolePerm` VALUES(3, 3);
INSERT INTO `RolePerm` VALUES(3, 4);
INSERT INTO `RolePerm` VALUES(3, 5);
INSERT INTO `RolePerm` VALUES(3, 6);
INSERT INTO `RolePerm` VALUES(3, 7);
INSERT INTO `RolePerm` VALUES(3, 8);
INSERT INTO `RolePerm` VALUES(3, 9);
INSERT INTO `RolePerm` VALUES(3, 11);
INSERT INTO `RolePerm` VALUES(3, 12);
INSERT INTO `RolePerm` VALUES(3, 13);
INSERT INTO `RolePerm` VALUES(3, 14);
INSERT INTO `RolePerm` VALUES(3, 16);
INSERT INTO `RolePerm` VALUES(3, 17);
INSERT INTO `RolePerm` VALUES(3, 20);
INSERT INTO `RolePerm` VALUES(1, 2);
INSERT INTO `RolePerm` VALUES(1, 23);
INSERT INTO `RolePerm` VALUES(1, 21);
INSERT INTO `RolePerm` VALUES(1, 3);
INSERT INTO `RolePerm` VALUES(1, 4);
INSERT INTO `RolePerm` VALUES(1, 5);
INSERT INTO `RolePerm` VALUES(1, 6);
INSERT INTO `RolePerm` VALUES(1, 8);
INSERT INTO `RolePerm` VALUES(1, 7);
INSERT INTO `RolePerm` VALUES(1, 9);
INSERT INTO `RolePerm` VALUES(1, 10);
INSERT INTO `RolePerm` VALUES(1, 11);
INSERT INTO `RolePerm` VALUES(1, 12);
INSERT INTO `RolePerm` VALUES(1, 13);
INSERT INTO `RolePerm` VALUES(1, 14);
INSERT INTO `RolePerm` VALUES(1, 15);
INSERT INTO `RolePerm` VALUES(1, 16);
INSERT INTO `RolePerm` VALUES(1, 17);
INSERT INTO `RolePerm` VALUES(1, 20);
INSERT INTO `RolePerm` VALUES(1, 19);
INSERT INTO `RolePerm` VALUES(1, 18);
INSERT INTO `RolePerm` VALUES(1, 1);
INSERT INTO `RolePerm` VALUES(1, 22);
INSERT INTO `RolePerm` VALUES(2, 2);
INSERT INTO `RolePerm` VALUES(2, 23);
INSERT INTO `RolePerm` VALUES(2, 21);
INSERT INTO `RolePerm` VALUES(2, 3);
INSERT INTO `RolePerm` VALUES(2, 4);
INSERT INTO `RolePerm` VALUES(2, 5);
INSERT INTO `RolePerm` VALUES(2, 6);
INSERT INTO `RolePerm` VALUES(2, 8);
INSERT INTO `RolePerm` VALUES(2, 7);
INSERT INTO `RolePerm` VALUES(2, 1);
INSERT INTO `RolePerm` VALUES(2, 22);
INSERT INTO `RolePerm` VALUES(5, 2);
INSERT INTO `RolePerm` VALUES(5, 23);
INSERT INTO `RolePerm` VALUES(5, 21);
INSERT INTO `RolePerm` VALUES(5, 3);
INSERT INTO `RolePerm` VALUES(5, 4);
INSERT INTO `RolePerm` VALUES(5, 6);
INSERT INTO `RolePerm` VALUES(5, 8);
INSERT INTO `RolePerm` VALUES(5, 7);
INSERT INTO `RolePerm` VALUES(5, 9);
INSERT INTO `RolePerm` VALUES(5, 10);
INSERT INTO `RolePerm` VALUES(5, 11);
INSERT INTO `RolePerm` VALUES(5, 12);
INSERT INTO `RolePerm` VALUES(5, 13);
INSERT INTO `RolePerm` VALUES(5, 14);
INSERT INTO `RolePerm` VALUES(5, 15);
INSERT INTO `RolePerm` VALUES(5, 16);
INSERT INTO `RolePerm` VALUES(5, 17);
INSERT INTO `RolePerm` VALUES(5, 20);
INSERT INTO `RolePerm` VALUES(5, 19);
INSERT INTO `RolePerm` VALUES(5, 18);
INSERT INTO `RolePerm` VALUES(5, 1);
INSERT INTO `RolePerm` VALUES(6, 2);
INSERT INTO `RolePerm` VALUES(6, 23);
INSERT INTO `RolePerm` VALUES(6, 21);
INSERT INTO `RolePerm` VALUES(6, 3);
INSERT INTO `RolePerm` VALUES(6, 4);
INSERT INTO `RolePerm` VALUES(6, 5);
INSERT INTO `RolePerm` VALUES(6, 6);
INSERT INTO `RolePerm` VALUES(6, 8);
INSERT INTO `RolePerm` VALUES(6, 7);
INSERT INTO `RolePerm` VALUES(6, 9);
INSERT INTO `RolePerm` VALUES(6, 10);
INSERT INTO `RolePerm` VALUES(6, 11);
INSERT INTO `RolePerm` VALUES(6, 12);
INSERT INTO `RolePerm` VALUES(6, 13);
INSERT INTO `RolePerm` VALUES(6, 14);
INSERT INTO `RolePerm` VALUES(6, 15);
INSERT INTO `RolePerm` VALUES(6, 16);
INSERT INTO `RolePerm` VALUES(6, 17);
INSERT INTO `RolePerm` VALUES(6, 20);
INSERT INTO `RolePerm` VALUES(6, 19);
INSERT INTO `RolePerm` VALUES(6, 18);
INSERT INTO `RolePerm` VALUES(6, 1);
INSERT INTO `RolePerm` VALUES(6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `roleId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` VALUES(1, 'Full Control');
INSERT INTO `Roles` VALUES(2, 'Single User');
INSERT INTO `Roles` VALUES(3, 'Principal');
INSERT INTO `Roles` VALUES(4, 'Teacher');
INSERT INTO `Roles` VALUES(5, 'Data Entry Operator');
INSERT INTO `Roles` VALUES(6, 'Administrator');

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

INSERT INTO `Staff` VALUES('1', 'Vimukthi Joseph', '2014-08-13', 1, 3, 1, 1, '123456789V', 'Makola', '0714569232', '2014-08-18', '2014-08-19', 2, 3, 1, 1, 1, 1, 1, 10000, 1, 1, 1, 0);
INSERT INTO `Staff` VALUES('10', 'Amritha Alston', '2014-08-26', 2, 4, 1, 1, '123456789V', 'Makola', '0756489326', '2014-08-06', '2014-08-30', 3, 1, 5, 6, 1, 1, 2, 70000, 2, 2, 2, 0);
INSERT INTO `Staff` VALUES('11', 'Bihara De Silva', '2014-08-26', 2, 2, 1, 1, '923578963V', 'Kollupitiya', '0785693214', '2014-08-25', '2014-08-03', 2, 2, 1, 1, 1, 1, 1, 45000, 3, 3, 3, 0);
INSERT INTO `Staff` VALUES('12', 'Chathuri Perera', '0081-08-02', 2, 1, 3, 3, '814562395V', 'Negombo', '0774379658', '2014-08-26', '2014-08-23', 2, 2, 2, 2, 1, 1, 5, 28000, 5, 5, 51, 0);
INSERT INTO `Staff` VALUES('13', 'Anthony Ashan', '1987-01-21', 1, 1, 2, 1, '123456789V', 'Negombo', '0777777777', '2014-08-07', '2014-08-14', 1, 1, 1, 1, 2, 1, 1, 12334, 2, 12, 55, 0);
INSERT INTO `Staff` VALUES('14', 'Tharindu Madusha Mendis', '1993-02-03', 1, 1, 4, 1, '543345543V', 'Kollupitiya', '098789123', '2000-08-02', '2001-09-09', 1, 1, 6, 19, 2, 3, 13, 17000, 3, 18, 41, 0);
INSERT INTO `Staff` VALUES('15', 'Sahan Malinga Tissera', '1993-02-02', 1, 1, 4, 1, '932470039V', 'Kollupitiya', '0712624222', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 17000, 3, 19, 17, 0);
INSERT INTO `Staff` VALUES('16', 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '0776536611', '2011-12-01', '2014-12-01', 1, 1, 1, 14, 3, 7, 4, 25000, 4, 1, 19, 0);
INSERT INTO `Staff` VALUES('17', 'Ashani G.H.L.N          ', '2014-09-03', NULL, 4, 4, 4, '917894561v', '18/A Nawam Mawatha,Bellanwila', '0784561231', '2014-09-30', '2014-09-30', 1, 1, 7, 8, 1, 1, 6, 33000, 6, 6, 65, 0);
INSERT INTO `Staff` VALUES('18', 'Devindi U.K.A.', '1987-06-23', 2, 1, 1, 1, '917894561v', '253/16/b Makola south,Makola', '0114562398', '2012-08-17', '2014-09-04', 2, 1, 1, 3, 4, 2, 4, 15000, 5, 6, 11, 0);
INSERT INTO `Staff` VALUES('19', 'Prabuddhi D.V.M.', '1998-08-05', 2, 3, 3, 3, '923570039v', '13/M gangarama rd,kollupitiya', '0774563219', '2014-09-03', '2014-09-10', 4, 3, 4, 4, 4, 4, 1, 28000, 1, 2, 3, 0);
INSERT INTO `Staff` VALUES('2', 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '912587692V', 'kottawa', '07145236', '2014-08-19', '2014-08-14', 1, 2, 2, 2, 2, 2, 0, 30000, 1, 2, 2, 0);
INSERT INTO `Staff` VALUES('20', 'Kavindi Weerakkodi', '1992-12-18', 2, 2, 2, 1, '123456789v', '85/a Dehiwala Rd, Dehiwala', '0774561234', '2014-09-24', '2014-09-25', 2, 2, 2, 3, 2, 1, 1, 14000, 4, 4, 4, 0);
INSERT INTO `Staff` VALUES('21', 'Peiries M.S.E', '2014-09-03', 1, 3, 3, 3, '958964521V', '234/45 Galle rd,Wellawattha', '0774896532', '2014-09-18', '2014-10-25', 1, 1, 1, 7, 3, 3, 3, 12000, 3, 3, 3, 0);
INSERT INTO `Staff` VALUES('22', 'Amarasinghe Bella', '1987-08-19', 2, 2, 2, 2, '874561239v', '56/A Mahara rd,Kadawatha', '0114567892', '2014-09-03', '2014-09-04', 4, 3, 4, 4, 4, 4, 4, 22000, 4, 4, 78, 0);
INSERT INTO `Staff` VALUES('23', 'Samarakoon W.A', '2014-09-17', NULL, 1, 1, 2, '896532147v', '54/k Kalubowila rd,Kalubowila', '0779632141', '2014-08-20', '2014-09-03', 1, 2, 2, 20, 1, 2, 2, 37000, 2, 2, 2, 0);
INSERT INTO `Staff` VALUES('24', 'Rupasinghe Q.L', '2014-09-18', NULL, 1, 1, 1, '945263879v', '89/B Mahara,Kadawatha', '0714562395', '2014-09-25', '2014-09-11', 2, 2, 2, 20, 2, 2, 3, 18000, 5, 5, 4, 0);
INSERT INTO `Staff` VALUES('25', 'Samarasinghe V.V.M', '2003-01-11', 1, 1, 1, 1, '917894561v', '89/B Mahara,Kadawatha', '0774896532', '2014-09-11', '2014-09-27', 3, 2, 3, 3, 3, 3, 3, 26000, 1, 1, 25, 0);
INSERT INTO `Staff` VALUES('26', 'Mendis M.Q.A', '2014-09-03', 2, 1, 1, 1, '896547891V', '59/Anuradapura Rd,Sigiriya', '0112365478', '2014-09-03', '2014-09-03', 2, 2, 2, 1, 2, 2, 2, 28000, 4, 5, 6, 0);
INSERT INTO `Staff` VALUES('27', 'Dissanayake M..N', '2014-09-24', 2, 1, 3, 3, '936541278v', '64/shanthi mawatha,kiribathgoda', '0119632478', '2014-09-03', '2014-09-03', 2, 2, 2, 2, 2, 2, 2, 23500, 5, 8, 21, 0);
INSERT INTO `Staff` VALUES('28', 'Perera T.M', '2014-09-03', NULL, 3, 3, 2, '963214587v', '123/23/G Havelock rd,nugegoda', '0112365894', '2014-09-10', '2014-09-27', 2, 2, 2, 2, 2, 2, 2, 45000, 5, 9, 5, 0);
INSERT INTO `Staff` VALUES('29', 'Fernando M.K.L.A', '2014-09-04', 2, 2, 2, 4, '923568741v', '123/23/G Havelock rd,nugegoda', '0714562395', '2014-09-03', '2014-09-25', 2, 1, 2, 20, 2, 3, 2, 20000, 1, 1, 1, 0);
INSERT INTO `Staff` VALUES('3', 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '936257891V', 'narammala', '0714563298', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 35000, 2, 2, 4, 0);
INSERT INTO `Staff` VALUES('30', 'Jayawardena Mahela', '2014-09-19', 1, 1, 1, 1, '887456321v', '56/A Mahara rd,Kadawatha', '0112365892', '2014-09-02', '2014-09-18', 2, 2, 2, 2, 2, 2, 2, 20000, 1, 1, 17, 0);
INSERT INTO `Staff` VALUES('31', 'Superman', '2014-09-16', 1, 1, 1, 1, '123456789v', 'asd', '1234567890', '2014-09-02', '2014-09-23', 1, 1, 1, 1, 1, 1, 1, 12345, 1, 2, 1, 0);
INSERT INTO `Staff` VALUES('4', 'Madhusha Mendis', '2014-08-27', 2, 1, 1, 1, '936541278V', 'moratuwa paradai', '0711701236', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 96000, 1, 10, 57, 0);
INSERT INTO `Staff` VALUES('5', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879V', 'kurunegala', '011296875', '2014-08-27', '2014-08-29', 2, 2, 2, 2, 2, 2, 2, 45000, 1, 10, 10, 0);
INSERT INTO `Staff` VALUES('6', 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '958964525V', 'wellawattha', '07145693', '2014-08-13', '2014-08-22', 5, 3, 1, 1, 1, 1, 1, 98623, 3, 4, 10, 0);
INSERT INTO `Staff` VALUES('7', 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745V', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 6, 1, 1, 1, 1, 10000, 3, 7, 45, 0);
INSERT INTO `Staff` VALUES('8', 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '012236598', '2014-07-09', '2014-08-15', 3, 3, 2, 2, 3, 1, 1, 201369, 2, 1, 33, 0);
INSERT INTO `Staff` VALUES('9', 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '456321845V', 'wellawattha', '0112968756', '2014-08-20', '2014-08-29', 4, 3, 6, 6, 2, 2, 5, 45000, 4, 6, 8, 0);

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
INSERT INTO `Student` VALUES('1234', 'Alimudeen P.N', '2000-06-06', 1, 1, 0, 'sada', 4, 'c', 'blue', 0);
INSERT INTO `Student` VALUES('12345', 'J.A.I Jayakody', '1993-12-31', 1, 1, 1, 'Colombo', 11, 'A', 'Surya', 0);
INSERT INTO `Student` VALUES('19642', 'Madhushan G.L.N.A.M', '1990-07-27', 1, 4, 0, 'negombo', 1, 'A', 'Blue', 0);
INSERT INTO `Student` VALUES('2', 'Peiris M.S.E', '1993-09-03', 1, 1, 1, 'kolpity', 11, 'C', 'Green', 0);
INSERT INTO `Student` VALUES('23247', 'Sanchayan Balayan', '1991-01-01', 1, 1, 1, 'Wellawattha', 11, 'B', 'Surya', 0);
INSERT INTO `Student` VALUES('23415', 'Upeka tisser', '1990-12-23', 1, 1, 1, 'Wadduwa', 11, 'B', 'Surya', 0);
INSERT INTO `Student` VALUES('24242', 'Yazdaan Mohamed', '1995-12-30', 4, 3, 1, 'Nugegoda', 11, 'B', 'Shantha', 0);
INSERT INTO `Student` VALUES('3', 'Isuru Jayakody', '1993-01-21', 1, 1, 1, 'Kollupitiya', 11, 'A', 'Blue', 0);
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
-- Table structure for table `Subject`
--

CREATE TABLE IF NOT EXISTS `Subject` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` VALUES(1, 'Business Studies');
INSERT INTO `Subject` VALUES(2, 'Chemistry');
INSERT INTO `Subject` VALUES(3, 'English');
INSERT INTO `Subject` VALUES(4, 'History');
INSERT INTO `Subject` VALUES(5, 'Information Technology');
INSERT INTO `Subject` VALUES(6, 'Maths');
INSERT INTO `Subject` VALUES(7, 'Mechanics');
INSERT INTO `Subject` VALUES(8, 'Physics');
INSERT INTO `Subject` VALUES(9, 'Science');
INSERT INTO `Subject` VALUES(10, 'Sinhala');

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
  `Year` int(11) NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  `Remarks` varchar(128) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AdmissionNo`,`Subject`,`Term`,`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TermMarks`
--

INSERT INTO `TermMarks` VALUES('12325', 'Maths', 0, 2014, 78, '', 0);
INSERT INTO `TermMarks` VALUES('12345', 'Maths', 0, 2014, 63, '', 0);
INSERT INTO `TermMarks` VALUES('3', 'Maths', 0, 2014, 55, 'Good', 0);
INSERT INTO `TermMarks` VALUES('43435', 'Maths', 0, 2014, 75, 'Not bad', 0);
INSERT INTO `TermMarks` VALUES('43536', 'Maths', 0, 2014, 99, 'Can do better', 0);
INSERT INTO `TermMarks` VALUES('45678', 'Maths', 0, 2014, 78, '', 0);
INSERT INTO `TermMarks` VALUES('65578', 'Maths', 0, 2014, 100, 'Should try harder', 0);
INSERT INTO `TermMarks` VALUES('65784', 'Maths', 0, 2014, 65, '', 0);
INSERT INTO `TermMarks` VALUES('75857', 'Maths', 0, 2014, 43, 'Brilliant', 0);
INSERT INTO `TermMarks` VALUES('76954', 'Maths', 0, 2014, 44, '', 0);

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
INSERT INTO `Timetable` VALUES(1, 'B', 0, 2, 'English', '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '1', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '1', 0);
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
INSERT INTO `Timetable` VALUES(10, 'C', 0, 2, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 3, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 4, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 4, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 6, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 1, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 6, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 7, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 2, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 3, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 4, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 1, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 2, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 3, 'Business Studies', '11', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '11', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 5, 'Business Studies', '11', 0);
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
INSERT INTO `Timetable` VALUES(11, 'B', 0, 0, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 0, 1, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 0, 2, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 0, 3, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 0, 4, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 0, 5, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 1, 0, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 1, 5, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 1, 6, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 1, 7, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 2, 2, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 2, 3, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 3, 3, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 3, 4, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 3, 5, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 4, 1, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 4, 2, 'Mechanics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 4, 4, 'Physics', '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '13', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 0, 2, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 0, 3, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 0, 4, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 0, 5, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 1, 1, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 1, 2, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 1, 6, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 1, 7, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 2, 0, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 2, 1, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 2, 4, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 2, 5, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 3, 0, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'B', 3, 1, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 3, 2, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'A', 3, 3, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 4, 0, 'Chemistry', '14', 0);
INSERT INTO `Timetable` VALUES(11, 'C', 4, 1, 'Chemistry', '14', 0);
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
INSERT INTO `Timetable` VALUES(10, 'A', 0, 0, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 1, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 4, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 5, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 6, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 0, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 1, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 4, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 0, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 3, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 5, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 0, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 2, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 3, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 4, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 0, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 4, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '2', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 7, 'Maths', '2', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '23', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '24', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '25', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '29', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 0, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 2, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 3, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 0, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 1, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 5, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 7, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 0, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 3, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 6, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 0, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 1, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 2, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 6, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 7, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 0, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 3, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 6, 'Sinhala', '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '3', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '31', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '31', 0);
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
INSERT INTO `Timetable` VALUES(10, 'B', 0, 1, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 3, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 6, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 7, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 2, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 3, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 6, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 7, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 1, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 2, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 4, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 7, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 4, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 5, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 7, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 1, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 2, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 5, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 6, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 7, 'History', '5', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 2, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 5, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 6, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 7, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 1, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 2, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 3, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 5, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 2, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 3, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 4, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 5, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 6, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 7, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 1, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 3, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 5, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 6, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 4, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '6', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 6, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 7, 'English', '6', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 0, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 1, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 4, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 5, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 7, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 0, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 1, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 2, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 3, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 4, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 5, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 6, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 7, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 0, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 1, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 2, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 4, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 5, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 0, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 1, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 5, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 6, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 7, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 0, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 1, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 2, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 3, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 4, 'Information Technology', '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 5, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 6, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 7, NULL, '7', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 0, 0, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 1, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 2, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 3, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 4, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 0, 5, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 0, 6, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 0, 7, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 0, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 1, 1, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 1, 2, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 3, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 4, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 5, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 1, 6, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 1, 7, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 0, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 2, 1, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 2, 2, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 3, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 4, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 2, 5, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 6, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 2, 7, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 3, 0, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 3, 1, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 2, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 3, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 4, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 5, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 3, 6, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 3, 7, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'C', 4, 0, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 1, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(10, 'A', 4, 2, 'Science', '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 3, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(NULL, NULL, 4, 4, NULL, '8', 0);
INSERT INTO `Timetable` VALUES(10, 'B', 4, 5, 'Science', '8', 0);
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

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` VALUES(2, 1, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 2, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 3, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 4, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 5, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 6, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 7, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(2, 8, '0000-00-00', b'0', 0, '', 0);
INSERT INTO `Transaction` VALUES(4, 1, '0000-00-00', b'0', 10000, 'mhh', 0);
INSERT INTO `Transaction` VALUES(4, 2, '0000-00-00', b'0', 0, '', 0);

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

INSERT INTO `User` VALUES('1', '$2y$10$ITa1DX.IR57egONMAFcQuOVPXycANGqfFchP6nTiEYlkTfoFQwaam', 1, 0);
INSERT INTO `User` VALUES('2', '$2y$10$Z4hLXwEmV7qZSXxH8lSoY.R4BRXji51YRxGfkdco.2V6LOKPsVtC6', 2, 0);
INSERT INTO `User` VALUES('22', '$2y$10$iCRtx31Ie73wtbrq.1Sulue/3dFLByKPOOlVVoeoc1e/hwBJTpW5C', 2, 2);
INSERT INTO `User` VALUES('3', '$2y$10$1T0ZymlVYB8qKgN/B853SO9pptD02f3DrPf98NhJZ0IwdA8.gb4tu', 3, 0);
INSERT INTO `User` VALUES('4', '$2y$10$kGrSp.K0fcM6XFO5RRXMxeP6Xq/HuYLkSdLZqjsoi4QjBBo9lhsd.', 4, 0);
INSERT INTO `User` VALUES('5', '$2y$10$l8JhKd0.s3VRR0zTEMc6JexC4lqCe2OzO54Rd468z6ttrniCJGLVC', 5, 0);
INSERT INTO `User` VALUES('6', '$2y$10$HV2SfdLnz5GSLvtNANPR5.4Ihk4IO.imENY44kMUmtOSXyKaDspFC', 6, 0);
INSERT INTO `User` VALUES('a', '$2y$10$h01VyUflSOarmJs5H98.Wem2.0UIj8WdUC/Sayxa8BVKAOBvUFUfm', 1, 2);
INSERT INTO `User` VALUES('ab', '$2y$10$8Az470QmxIuRqy5a6TNmfOiYKvPoJmUSvo08m9CfC6F6PpXKyWEoe', 2, 2);
INSERT INTO `User` VALUES('abc', '$2y$10$3TeoYC5i/ROkO.ZC6nomLeniQ/PYn1jbkxw4hKm5wbO8LZoduMshK', 1, 2);
INSERT INTO `User` VALUES('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 2);
INSERT INTO `User` VALUES('apple', '$2y$10$X67s43KjvUygW5GVeoStCOFVylBbXsUeyD2e6EKCMMUEjxqcEsIFa', 1, 2);
INSERT INTO `User` VALUES('arabic@gmail.com', '$2y$10$hVONYOoTGLmmG.dfVBJm1.DuPsUTlhJhIqvsYSkQC3KNr0JzDb5bO', 1, 2);
INSERT INTO `User` VALUES('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 2);
INSERT INTO `User` VALUES('b', '$2y$10$ujaPveBM11/hXY6caye3f.nQYKlnVcdrQGZWksMm9lVk5oYlj4RmO', 2, 2);
INSERT INTO `User` VALUES('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 2);
INSERT INTO `User` VALUES('blue', '$2y$10$FV/zw6c6WkCfHgALLROEmOnjDaiE9ARHAqcHdoQkll3lzPCVqeck.', 1, 2);
INSERT INTO `User` VALUES('blue table', '$2y$10$nACqSmTdjU/VZp4Oae3d2.pzSw1MxI1hEcOpG79WxbtId5uj9GPmq', 1, 2);
INSERT INTO `User` VALUES('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 2);
INSERT INTO `User` VALUES('cd', '$2y$10$amqd2LCh9Bk65mwfgaG8LO42NZrk798.HN9Ng0T1JYF1ckPJ4UUM2', 1, 2);
INSERT INTO `User` VALUES('chair', '$2y$10$c6d3EBGdek9QN9y5pN33oeU3P1xpTbVbJQixQXS.BW0VD1mJfL.vO', 1, 2);
INSERT INTO `User` VALUES('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 2);
INSERT INTO `User` VALUES('free', '$2y$10$05tBD.F8Nxi45Ww7oiTUdOeV/qYsk2Dyaa0a8gKWfQrK3PZitmi0y', 1, 2);
INSERT INTO `User` VALUES('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 2);
INSERT INTO `User` VALUES('isuru@sliit.lk', '$2y$10$7kD7JsAbPk5fSgIVfnqyguoDlFJML9uBVb12UZ3aqXOEJkze7EHcC', 1, 0);
INSERT INTO `User` VALUES('IT13001308', '$2y$10$uaNWXELT/WbmBZsyLi4gae6mIkVVYleRH2inqtAE8YavmQU9eVwTG', 1, 0);
INSERT INTO `User` VALUES('IT13006426', '$2y$10$NqCLCny59SCxkegqqik2yep7eZvL/wrzP2K/WzorW9JE6UL8Oa7CC', 1, 0);
INSERT INTO `User` VALUES('IT13008338', '$2y$10$84xtndo0WnKjrrCJukUO3ecnHZxJ9UePxU8vlGBnw70AXqPTQSRz2', 1, 0);
INSERT INTO `User` VALUES('IT13013424', '$2y$10$sQT1wVw5LqeroKEDiNJjhu5r755pG6jjFvUNqflTfibjDyzOuE0JS', 1, 0);
INSERT INTO `User` VALUES('IT13014650', '$2y$10$AcDiHK25rLRomS.rLkbPRe8558LOGSiacPumJNxdeKlIYlwZrnMMC', 1, 0);
INSERT INTO `User` VALUES('IT13024000', '$2y$10$APNgCTivQk1uS9jzczbRi.e.fQUw1eMmSeRMEghlbwQz1bSCQ8EMO', 1, 0);
INSERT INTO `User` VALUES('IT13028206', '$2y$10$elZ28Kvg3d0NIXLcUMcXo.3WVYBLR4Mo1DVRs0iOoktP8XL5b/G26', 1, 0);
INSERT INTO `User` VALUES('IT13031312', '$2y$10$i3MU2aeGIZzU8zvfdnTqcuMXrmUhwFHIErS7FSvwIg9Hz.5mBThLa', 1, 0);
INSERT INTO `User` VALUES('madusha.1@sliit.lk', '$2y$10$oqSMJ39w6AWsz1eklYz1eeIVh8YonMDapF..F70P62oWfFwMTQNJi', 2, 0);
INSERT INTO `User` VALUES('red@blue.org', '$2y$10$GTAR2ISrSJc/3E7pqclth.gLbyYlnar3FHubs5tJ66opJ7.gMYlgy', 1, 2);
INSERT INTO `User` VALUES('s', '$2y$10$5Dr1zqERyeGwod5i5nrQv.m0xBCpUNKOvYJ/q9KOCEx7AQV3ThvIi', 2, 2);
INSERT INTO `User` VALUES('sh', '$2y$10$k6WWAhhSBD7UkvbcHDQVj.l6zLYTBpwuyCrO8a2o10qhTR.6gJBKe', 1, 2);
INSERT INTO `User` VALUES('shavin47', '$2y$10$QmPP8f1zzx0qW6b3v.h.X.Fox.FyA3mLwy7LrlzkJHdhF8D3srp5.', 1, 2);
INSERT INTO `User` VALUES('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 2);
INSERT INTO `User` VALUES('viim@ubuntu.org', '$2y$10$voK79P1GEwkSeEnvPwcSr.kvBMfyDHnL9ErDVDP9CkoyWHWZSgMru', 2, 2);
INSERT INTO `User` VALUES('y', '$2y$10$VKCBn2MD5Q4hifDqhlbPWO.J7hYmW.VNU2oi7lWwoPmH76mSr/Z3e', 1, 2);
INSERT INTO `User` VALUES('yazdaan.alimudeen@gmail.com', '$2y$10$PbyD11uQUq0dQMLbidQAr.R3N/HY.Kg..GEkk3QXBvlL2mQ1tDXr6', 1, 2);

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
-- ALTER TABLE `Blacklist`
-- ADD CONSTRAINT `Blacklist_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

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
-- Constraints for table `RolePerm`
--
ALTER TABLE `RolePerm`
ADD CONSTRAINT `RolePerm_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `Roles` (`roleId`),
ADD CONSTRAINT `RolePerm_ibfk_2` FOREIGN KEY (`permId`) REFERENCES `Permissions` (`permId`);

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