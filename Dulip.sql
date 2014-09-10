-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2014 at 08:30 AM
-- Server version: 5.5.37
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `manadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `almarks`
--

CREATE TABLE IF NOT EXISTS `almarks` (
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
  `Inland_Rank` int(20) DEFAULT NULL,
  `District_Rank` int(20) DEFAULT NULL,
  PRIMARY KEY (`IndexNo`,`Subject_1`),
  KEY `AdmissionNo` (`AdmissionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `almarks`
--

INSERT INTO `almarks` VALUES(1, '3', 2014, 'Chemistry', NULL, NULL, 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(1, '3', 2014, 'Combined Mathematics', NULL, NULL, 'C', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(1, '3', 2014, 'Physics', NULL, NULL, 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(33, '3', 2014, 'Economics', NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(33, '3', 2014, 'Science', NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(33, '3', 2014, 'Sinhala', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(44, '3680', 2014, 'Economics', NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(44, '3680', 2014, 'Information Technology', NULL, NULL, 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `almarks` VALUES(44, '3680', 2014, 'Sinhala', NULL, NULL, 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `almarks`
--
ALTER TABLE `almarks`
  ADD CONSTRAINT `ALMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);
