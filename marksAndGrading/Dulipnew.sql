-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 05:56 PM
-- Server version: 5.5.37
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `manadb`
--

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

--
-- Dumping data for table `olmarks`
--

INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Commerce', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'English Language', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'English Literature', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'History', 'B');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Information Technology', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Mathematics', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Religion', 'B');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Science and Technology', 'A');
INSERT INTO `olmarks` VALUES(12, '1', 2014, 'Sinhala Language', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Commerce', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'English Language', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'History', 'C');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Information Technology', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Mathematics', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Religion', 'B');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Science and Technology', 'A');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Sinhala Language', 'B');
INSERT INTO `olmarks` VALUES(13, '12325', 2014, 'Sinhala Literature', 'C');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Commerce', 'B');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Drama', 'A');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'English Language', 'A');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'History', 'A');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Home Science', 'A');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Mathematics', 'B');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Religion', 'A');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Science and Technology', 'B');
INSERT INTO `olmarks` VALUES(14, '12345', 2014, 'Sinhala Language', 'A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `olmarks`
--
ALTER TABLE `olmarks`
  ADD CONSTRAINT `OLMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);


-------------------------------------------------------------------------------------------------

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 05:59 PM
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
  `Island_Rank` int(20) DEFAULT NULL,
  `District_Rank` int(20) DEFAULT NULL,
  PRIMARY KEY (`IndexNo`,`Subject_1`),
  KEY `AdmissionNo` (`AdmissionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `almarks`
--

INSERT INTO `almarks` VALUES(21, '1', 2014, 'Combined Mathematics', 'Physics', 'Chemistry', 'A', 'A', 'A', 'B', 65, 3.18, 20, 5);
INSERT INTO `almarks` VALUES(22, '12325', 2013, 'Economics', 'Accounting', 'Business Studies', 'A', 'A', 'A', 'B', 56, 2.16, 2555, 236);
INSERT INTO `almarks` VALUES(23, '12345', 2012, 'Logic', 'Buddhist Culture', 'Economics', 'A', 'B', 'C', 'S', 54, 1.69, 254444, 2456);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `almarks`
--
ALTER TABLE `almarks`
  ADD CONSTRAINT `ALMarks_ibfk_1` FOREIGN KEY (`AdmissionNo`) REFERENCES `student` (`AdmissionNo`);
