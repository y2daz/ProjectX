-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--

DROP DATABASE IF EXISTS `manaDB`;
DROP DATABASE IF EXISTS `ozekiSMS`;

#   GRANT USAGE ON *.* TO 'manaSystem'@'localhost' IDENTIFIED BY PASSWORD '*11D0781D755AF7279E36F7C6CF3A9A356C6B8C5A';
#
#   GRANT ALL PRIVILEGES ON `manaDB`.* TO 'manaSystem'@'localhost' WITH GRANT OPTION;
#
#   GRANT SELECT, INSERT, UPDATE ON `ozekiSMS`.* TO 'manaSystem'@'localhost';


#   CREATE USER 'ozekiSystem'@'localhost' IDENTIFIED BY 'wkbwD6PMPuGTSJx';
#
#   GRANT USAGE ON *.* TO 'ozekiSystem'@'localhost' IDENTIFIED BY PASSWORD '*5B78F2EB3BB94DECCB59DA8CB0DA415E3AC67E93';
#
#   GRANT SELECT, INSERT, UPDATE ON `ozekiSMS`.* TO 'ozekiSystem'@'localhost';

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2015 at 11:55 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

--
-- Database: `manaDB`
--
CREATE DATABASE IF NOT EXISTS `manaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manaDB`;

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

INSERT INTO `ClassInformation` (`StaffID`, `Grade`, `Class`, `isDeleted`) VALUES
  ('4', 0, '', 2),
  ('6', 0, 'B', 2),
  ('2', 2, 'B', 0),
  ('22', 2, 'C', 0),
  ('5', 4, 'A', 0),
  ('1', 6, 'A', 0),
  ('6', 7, 'A', 0),
  ('4', 7, 'C', 0),
  ('5', 8, 'B', 2),
  ('15', 10, 'A', 0),
  ('1', 10, 'C', 0),
  ('31', 11, 'A', 2),
  ('14', 11, 'B', 0),
  ('12', 11, 'C', 0),
  ('3', 11, 'D', 0);

-- --------------------------------------------------------

--
-- Table structure for table `CourseOfStudy`
--

CREATE TABLE IF NOT EXISTS `CourseOfStudy` (
  `StaffId` int(11) NOT NULL,
  `Course` int(11) NOT NULL,
  PRIMARY KEY (`StaffId`,`Course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CourseOfStudy`
--

INSERT INTO `CourseOfStudy` (`StaffId`, `Course`) VALUES
  (1, 1),
  (2, 2),
  (3, 4),
  (4, 57),
  (5, 10),
  (6, 10),
  (7, 45),
  (8, 33),
  (9, 8),
  (10, 2),
  (11, 3),
  (12, 2),
  (13, 55),
  (14, 41),
  (15, 17),
  (16, 19),
  (17, 65),
  (18, 11),
  (19, 3),
  (20, 3),
  (21, 3),
  (22, 78),
  (23, 2),
  (24, 4),
  (25, 25),
  (26, 6),
  (27, 21),
  (28, 5),
  (29, 1),
  (30, 17),
  (31, 1),
  (32, 1),
  (33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EduQualification`
--

CREATE TABLE IF NOT EXISTS `EduQualification` (
  `StaffId` int(11) NOT NULL,
  `Qualification` int(11) NOT NULL,
  `Highest` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffId`,`Qualification`),
  KEY `StaffId` (`StaffId`),
  KEY `Qualification` (`Qualification`),
  KEY `StaffId_2` (`StaffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EduQualification`
--

INSERT INTO `EduQualification` (`StaffId`, `Qualification`, `Highest`) VALUES
  (1, 1, 1),
  (2, 1, 1),
  (3, 2, 1),
  (4, 1, 1),
  (5, 1, 1),
  (6, 3, 1),
  (7, 3, 1),
  (8, 2, 1),
  (9, 4, 1),
  (10, 2, 1),
  (11, 3, 1),
  (12, 5, 1),
  (13, 2, 1),
  (14, 3, 1),
  (15, 3, 1),
  (16, 4, 1),
  (17, 6, 1),
  (18, 5, 1),
  (19, 1, 1),
  (20, 4, 1),
  (21, 3, 1),
  (22, 4, 1),
  (23, 2, 1),
  (24, 5, 1),
  (25, 1, 1),
  (26, 4, 1),
  (27, 5, 1),
  (28, 5, 1),
  (29, 1, 1),
  (30, 1, 1),
  (31, 1, 1),
  (32, 1, 1),
  (33, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EmpNo`
--

CREATE TABLE IF NOT EXISTS `EmpNo` (
  `staffID` varchar(5) NOT NULL,
  `EmpNo` int(11) NOT NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE KEY `EmpNo` (`EmpNo`),
  KEY `staffID` (`staffID`),
  KEY `EmpNo_2` (`EmpNo`),
  KEY `staffID_2` (`staffID`),
  KEY `EmpNo_3` (`EmpNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EmpNo`
--

INSERT INTO `EmpNo` (`staffID`, `EmpNo`) VALUES
  ('1', 4),
  ('2', 8),
  ('3', 12),
  ('4', 16),
  ('5', 20),
  ('6', 24),
  ('7', 28),
  ('8', 32),
  ('9', 36),
  ('10', 40),
  ('11', 44),
  ('12', 48),
  ('13', 52),
  ('14', 56),
  ('15', 60),
  ('16', 64),
  ('17', 68),
  ('18', 72),
  ('19', 76),
  ('20', 80),
  ('21', 84),
  ('22', 88),
  ('23', 92),
  ('24', 96),
  ('25', 100),
  ('26', 104),
  ('27', 108),
  ('28', 112),
  ('29', 116),
  ('30', 120),
  ('31', 124),
  ('32', 128),
  ('33', 132);

-- --------------------------------------------------------

--
-- Table structure for table `FormOption`
--

CREATE TABLE IF NOT EXISTS `FormOption` (
  `Label` varchar(80) NOT NULL DEFAULT '',
  `Number` varchar(50) NOT NULL DEFAULT '0',
  `Data` varchar(200) DEFAULT NULL,
  `OrderingGroup` varchar(50) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  PRIMARY KEY (`Label`,`Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FormOption`
--

INSERT INTO `FormOption` (`Label`, `Number`, `Data`, `OrderingGroup`, `Type`) VALUES
  ('civilStatus', '1', 'Married', NULL, NULL),
  ('civilStatus', '2', 'Not Married', NULL, NULL),
  ('civilStatus', '3', 'Widow', NULL, NULL),
  ('civilStatus', '4', 'Other', NULL, NULL),
  ('courseOfStudy', '1', 'BSc in Education', 'Graduate Teachers', NULL),
  ('courseOfStudy', '10', 'BSc in Commerce Business Mgmt Accounting or equivalent Dip', 'Graduate Teachers', NULL),
  ('courseOfStudy', '11', 'Bscin Social Science', 'Graduate Teachers', NULL),
  ('courseOfStudy', '12', 'BA in Eastern Music or equivalent Dip', 'Graduate Teachers', NULL),
  ('courseOfStudy', '13', 'BA in Arts', 'Graduate Teachers', NULL),
  ('courseOfStudy', '14', 'BA in Dancing or equivalent Dip', 'Graduate Teachers', NULL),
  ('courseOfStudy', '15', 'BA Degrees or equivalent', 'Graduate Teachers', NULL),
  ('courseOfStudy', '16', 'BA in English or equivalent', 'Graduate Teachers', NULL),
  ('courseOfStudy', '17', 'BA in a Foreign Language excluding English', 'Graduate Teachers', NULL),
  ('courseOfStudy', '19', 'IT', 'Trained Teachers', NULL),
  ('courseOfStudy', '2', 'BSc in Physics', 'Graduate Teachers', NULL),
  ('courseOfStudy', '20', 'English', 'Trained Teachers', NULL),
  ('courseOfStudy', '21', 'Maths', 'Trained Teachers', NULL),
  ('courseOfStudy', '22', 'Science', 'Trained Teachers', NULL),
  ('courseOfStudy', '23', 'Science And Maths', 'Trained Teachers', NULL),
  ('courseOfStudy', '24', 'Social Studies', 'Trained Teachers', NULL),
  ('courseOfStudy', '25', 'Commerce', 'Trained Teachers', NULL),
  ('courseOfStudy', '26', 'Home Science', 'Trained Teachers', NULL),
  ('courseOfStudy', '27', 'BTec Construction', 'Trained Teachers', NULL),
  ('courseOfStudy', '28', 'BTec Mechanical', 'Trained Teachers', NULL),
  ('courseOfStudy', '29', 'BTec Electronic and Electrical', 'Trained Teachers', NULL),
  ('courseOfStudy', '3', 'BSc in Biology', 'Graduate Teachers', NULL),
  ('courseOfStudy', '30', 'Arts', 'Trained Teachers', NULL),
  ('courseOfStudy', '31', 'Agriculture', 'Trained Teachers', NULL),
  ('courseOfStudy', '32', 'Western Music', 'Trained Teachers', NULL),
  ('courseOfStudy', '33', 'Eastern Music', 'Trained Teachers', NULL),
  ('courseOfStudy', '34', 'Arts Again', 'Trained Teachers', NULL),
  ('courseOfStudy', '35', 'Dancing', 'Trained Teachers', NULL),
  ('courseOfStudy', '36', 'Health and Physical Education', 'Trained Teachers', NULL),
  ('courseOfStudy', '37', 'Buddhism', 'Trained Teachers', NULL),
  ('courseOfStudy', '38', 'Hinduism', 'Trained Teachers', NULL),
  ('courseOfStudy', '39', 'Islam', 'Trained Teachers', NULL),
  ('courseOfStudy', '4', 'BSc in Combined Mathematics', 'Graduate Teachers', NULL),
  ('courseOfStudy', '40', 'Roman Catholicism', 'Trained Teachers', NULL),
  ('courseOfStudy', '41', 'Non Roman Catholicism', 'Trained Teachers', NULL),
  ('courseOfStudy', '42', 'Special Education', 'Trained Teachers', NULL),
  ('courseOfStudy', '43', 'Sinhala', 'Trained Teachers', NULL),
  ('courseOfStudy', '44', 'Tamil', 'Trained Teachers', NULL),
  ('courseOfStudy', '45', 'Arabic', 'Trained Teachers', NULL),
  ('courseOfStudy', '46', 'Primary General', 'Trained Teachers', NULL),
  ('courseOfStudy', '47', 'Library and Information Science', 'Trained Teachers', NULL),
  ('courseOfStudy', '48', 'Theatre and Drama', 'Trained Teachers', NULL),
  ('courseOfStudy', '49', 'Other', 'Trained Teachers', NULL),
  ('courseOfStudy', '5', 'BSc Specialisation in Mathematics', 'Graduate Teachers', NULL),
  ('courseOfStudy', '50', 'Maths', 'Untrained Teachers', NULL),
  ('courseOfStudy', '51', 'Science', 'Untrained Teachers', NULL),
  ('courseOfStudy', '52', 'Science And Maths', 'Untrained Teachers', NULL),
  ('courseOfStudy', '53', 'English', 'Untrained Teachers', NULL),
  ('courseOfStudy', '54', 'Primary', 'Untrained Teachers', NULL),
  ('courseOfStudy', '55', 'Religion', 'Untrained Teachers', NULL),
  ('courseOfStudy', '56', 'Social Studies', 'Untrained Teachers', NULL),
  ('courseOfStudy', '57', 'Commerce', 'Untrained Teachers', NULL),
  ('courseOfStudy', '58', 'Technology', 'Untrained Teachers', NULL),
  ('courseOfStudy', '59', 'Home Science', 'Untrained Teachers', NULL),
  ('courseOfStudy', '6', 'Passed Maths without a degree in science', 'Graduate Teachers', NULL),
  ('courseOfStudy', '60', 'Agriculture', 'Untrained Teachers', NULL),
  ('courseOfStudy', '61', 'Sinhala', 'Untrained Teachers', NULL),
  ('courseOfStudy', '62', 'Tamil', 'Untrained Teachers', NULL),
  ('courseOfStudy', '63', 'Western Music', 'Untrained Teachers', NULL),
  ('courseOfStudy', '64', 'Eastern Music', 'Untrained Teachers', NULL),
  ('courseOfStudy', '65', 'Dancing', 'Untrained Teachers', NULL),
  ('courseOfStudy', '66', 'Art', 'Untrained Teachers', NULL),
  ('courseOfStudy', '67', 'Foreign Language Excluding English', 'Untrained Teachers', NULL),
  ('courseOfStudy', '68', 'Malay', 'Untrained Teachers', NULL),
  ('courseOfStudy', '69', 'Other', 'Untrained Teachers', NULL),
  ('courseOfStudy', '7', 'BSc in Agriculture', 'Graduate Teachers', NULL),
  ('courseOfStudy', '75', 'Maths', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '76', 'Science', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '77', 'Science And Maths', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '78', 'English', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '79', 'Primary', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '8', 'BSc in Home Science', 'Graduate Teachers', NULL),
  ('courseOfStudy', '80', 'Religion', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '81', 'Social Studies', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '82', 'Commerce', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '83', 'Technology', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '84', 'Home Science', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '85', 'Agriculture', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '86', 'Sinhala', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '87', 'Tamil', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '88', 'Western Music', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '89', 'Eastern Music', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '9', 'BSc in IT', 'Graduate Teachers', NULL),
  ('courseOfStudy', '90', 'Dancing', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '91', 'Art', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '92', 'Foreign Language Excluding English', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '93', 'Malay', 'Newly appointed Teachers', NULL),
  ('courseOfStudy', '94', 'Other', 'Newly appointed Teachers', NULL),
  ('designation', '1', 'Principal', NULL, NULL),
  ('designation', '2', 'Acting Principal', NULL, NULL),
  ('designation', '3', 'Deputy Principal', NULL, NULL),
  ('designation', '4', 'Acting Deputy Principal', NULL, NULL),
  ('designation', '5', 'Assistant Principal', NULL, NULL),
  ('designation', '6', 'Acting Assistant Principal', NULL, NULL),
  ('designation', '7', 'Teacher', NULL, NULL),
  ('employmentStatus', '1', 'Full Time', NULL, NULL),
  ('employmentStatus', '2', 'Part Time', NULL, NULL),
  ('employmentStatus', '3', 'Full Time (Released to other School)', NULL, NULL),
  ('employmentStatus', '4', 'Full Time (Brought from other School)', NULL, NULL),
  ('employmentStatus', '5', 'On Contract (Government)', NULL, NULL),
  ('employmentStatus', '6', 'Paid from School Fees', NULL, NULL),
  ('employmentStatus', '7', 'Other Government Department', NULL, NULL),
  ('Gender', '1', 'Male', NULL, NULL),
  ('Gender', '2', 'Female', NULL, NULL),
  ('highestEducationalQualification', '1', 'Below O Level', NULL, NULL),
  ('highestEducationalQualification', '2', 'O Level', NULL, NULL),
  ('highestEducationalQualification', '3', 'A Level', NULL, NULL),
  ('highestEducationalQualification', '4', 'BA, BSc, BEd', NULL, NULL),
  ('highestEducationalQualification', '5', 'MA, MSc, MEd', NULL, NULL),
  ('highestEducationalQualification', '6', 'MPhil', NULL, NULL),
  ('highestEducationalQualification', '7', 'PhD', NULL, NULL),
  ('highestProfessionalQualification', '1', 'PhD Ed', NULL, NULL),
  ('highestProfessionalQualification', '10', 'Dip in EASL', NULL, NULL),
  ('highestProfessionalQualification', '11', 'Dip in Library', NULL, NULL),
  ('highestProfessionalQualification', '12', 'Cert. in Library', NULL, NULL),
  ('highestProfessionalQualification', '13', 'PG Dip in Library Science', NULL, NULL),
  ('highestProfessionalQualification', '14', 'MSc in Library', NULL, NULL),
  ('highestProfessionalQualification', '15', 'Dip in Agriculture', NULL, NULL),
  ('highestProfessionalQualification', '16', 'Cert. in Teacher Training (Institute)', NULL, NULL),
  ('highestProfessionalQualification', '17', 'Cert. in Teacher Training (Away)', NULL, NULL),
  ('highestProfessionalQualification', '18', 'Nat Dip in Teaching', NULL, NULL),
  ('highestProfessionalQualification', '19', 'None', NULL, NULL),
  ('highestProfessionalQualification', '2', 'MPhil Ed', NULL, NULL),
  ('highestProfessionalQualification', '3', 'M Ed', NULL, NULL),
  ('highestProfessionalQualification', '4', 'MA in Ed', NULL, NULL),
  ('highestProfessionalQualification', '5', 'Dip in Ed', NULL, NULL),
  ('highestProfessionalQualification', '6', 'MSc in Ed Mgmt', NULL, NULL),
  ('highestProfessionalQualification', '7', 'PG Dip in Ed Mgmt', NULL, NULL),
  ('highestProfessionalQualification', '8', 'PG Dip in EASL', NULL, NULL),
  ('highestProfessionalQualification', '9', 'BNIE, BEd', NULL, NULL),
  ('Medium', '1', 'Sinhala', NULL, NULL),
  ('Medium', '2', 'Tamil', NULL, NULL),
  ('Medium', '3', 'English', NULL, NULL),
  ('oldSection', '1', 'Primary Multiple', NULL, NULL),
  ('oldSection', '10', 'A Level Science Main', NULL, NULL),
  ('oldSection', '11', 'A Level Arts Commerce', NULL, NULL),
  ('oldSection', '12', 'A Level Technology', NULL, NULL),
  ('oldSection', '13', 'A Level Optional', NULL, NULL),
  ('oldSection', '14', 'Special Education', NULL, NULL),
  ('oldSection', '15', 'Information Technology', NULL, NULL),
  ('oldSection', '16', 'Primary Supervisor', NULL, NULL),
  ('oldSection', '17', 'Secondary Supervisor', NULL, NULL),
  ('oldSection', '18', 'A Level Supervisor', NULL, NULL),
  ('oldSection', '19', 'Counselling', NULL, NULL),
  ('oldSection', '2', 'Primary English', NULL, NULL),
  ('oldSection', '20', 'Library', NULL, NULL),
  ('oldSection', '21', 'Health and Physical Education', NULL, NULL),
  ('oldSection', '22', 'Optional', NULL, NULL),
  ('oldSection', '23', 'Management', NULL, NULL),
  ('oldSection', '24', 'Staff Advisor (Part-time)', NULL, NULL),
  ('oldSection', '25', 'Staff Advisor (Full-time)', NULL, NULL),
  ('oldSection', '26', 'Released To Other School', NULL, NULL),
  ('oldSection', '27', 'Released To Other Institute/Office/Service', NULL, NULL),
  ('oldSection', '28', 'On Paid Leave', NULL, NULL),
  ('oldSection', '3', 'Primary Second Language', NULL, NULL),
  ('oldSection', '4', 'Secondary Science Maths', NULL, NULL),
  ('oldSection', '5', 'Secondary English', NULL, NULL),
  ('oldSection', '6', 'Secondary Arts', NULL, NULL),
  ('oldSection', '7', 'Secondary Technology', NULL, NULL),
  ('oldSection', '8', 'Secondary Second Language', NULL, NULL),
  ('oldSection', '9', 'Secondary Multiple', NULL, NULL),
  ('race', '1', 'Sinhala', NULL, NULL),
  ('race', '2', 'Sri Lankan Tamil', NULL, NULL),
  ('race', '3', 'Indian Tamil', NULL, NULL),
  ('race', '4', 'Sri Lankan Muslim', NULL, NULL),
  ('race', '5', 'Other', NULL, NULL),
  ('religion', '1', 'Buddhism', NULL, NULL),
  ('religion', '2', 'Hinduism', NULL, NULL),
  ('religion', '3', 'Islam', NULL, NULL),
  ('religion', '4', 'Catholicism', NULL, NULL),
  ('religion', '5', 'Christianity', NULL, NULL),
  ('religion', '6', 'Other', NULL, NULL),
  ('searchStaff', 'CivilStatus', 'Civil Status', '6', 0),
  ('searchStaff', 'ContactNumber', 'Contact Number', '9', 1),
  ('searchStaff', 'DateAppointedastoPost', 'Date Appointed to Post', NULL, NULL),
  ('searchStaff', 'DateJoinedthisSchool', 'Date Joined this School', NULL, NULL),
  ('searchStaff', 'DateofBirth', 'Date of Birth', NULL, NULL),
  ('searchStaff', 'Designation', 'Designation', '14', 0),
  ('searchStaff', 'EmployeeID', 'Signature No', '2', 1),
  ('searchStaff', 'EmploymentStatus', 'Employment Status', '12', 0),
  ('searchStaff', 'Gender', 'Gender', '3', 0),
  ('searchStaff', 'isDeleted', 'isDeleted', NULL, NULL),
  ('searchStaff', 'MailDeliveryAddress', 'Postal Address', '8', 1),
  ('searchStaff', 'Medium', 'Medium', '13', 0),
  ('searchStaff', 'NamewithInitials', 'Name with Initials', '2', 1),
  ('searchStaff', 'NICNumber', 'NIC Number', '7', 1),
  ('searchStaff', 'race', 'Race', '4', 0),
  ('searchStaff', 'Religion', 'Religion', '5', 0),
  ('searchStaff', 'Salary', 'Salary', NULL, NULL),
  ('searchStaff', 'Section', 'Section', '15', 0),
  ('searchStaff', 'ServiceGrade', 'Service Grade', '18', 0),
  ('searchStaff', 'StaffNo', 'Serial No', '0', 1),
  ('searchStaff', 'SubjectMostTaught', 'Subject Most Taught', NULL, NULL),
  ('searchStaff', 'SubjectSecondMostTaught', 'Subject Second Most Taught', NULL, NULL),
  ('section', '1', '1/5', NULL, NULL),
  ('section', '2', '6/7', NULL, NULL),
  ('section', '3', '8/9', NULL, NULL),
  ('section', '4', '10/11', NULL, NULL),
  ('section', '5', 'AL SC', NULL, NULL),
  ('section', '6', 'ALC', NULL, NULL),
  ('Section', '7', 'Office', NULL, NULL),
  ('serviceGrade', '1', 'Sri Lanka Education Administrative Service I', NULL, NULL),
  ('serviceGrade', '10', 'Sri Lanka Teacher Service 2 I I', NULL, NULL),
  ('serviceGrade', '11', 'Sri Lanka Teacher Service 3 I', NULL, NULL),
  ('serviceGrade', '12', 'Sri Lanka Teacher Service 3 I I', NULL, NULL),
  ('serviceGrade', '13', 'Sri Lanka Teacher Service Pending', NULL, NULL),
  ('serviceGrade', '2', 'Sri Lanka Education Administrative Service I I', NULL, NULL),
  ('serviceGrade', '3', 'Sri Lanka Education Administrative Service I I I', NULL, NULL),
  ('serviceGrade', '4', 'Sri Lanka Principal Service I', NULL, NULL),
  ('serviceGrade', '5', 'Sri Lanka Principal Service 2 I', NULL, NULL),
  ('serviceGrade', '6', 'Sri Lanka Principal Service 2 I I', NULL, NULL),
  ('serviceGrade', '7', 'Sri Lanka Principal Service 3', NULL, NULL),
  ('serviceGrade', '8', 'Sri Lanka Teacher Service I', NULL, NULL),
  ('serviceGrade', '9', 'Sri Lanka Teacher Service 2 I', NULL, NULL),
  ('SubjectAppointed', '1', 'PRINCIPAL', NULL, NULL),
  ('SubjectAppointed', '10', 'PRIMARY', NULL, NULL),
  ('SubjectAppointed', '11', 'BUDDHIS', NULL, NULL),
  ('SubjectAppointed', '12', 'SCIENCE', NULL, NULL),
  ('SubjectAppointed', '13', 'WESTERN MUSIC', NULL, NULL),
  ('SubjectAppointed', '14', 'SCIENCE/MATHS', NULL, NULL),
  ('SubjectAppointed', '15', 'CHEMISTRY', NULL, NULL),
  ('SubjectAppointed', '16', 'SINHALA', NULL, NULL),
  ('SubjectAppointed', '17', 'SECOND LANGUAGE', NULL, NULL),
  ('SubjectAppointed', '18', 'BUDDHISM', NULL, NULL),
  ('SubjectAppointed', '19', 'PHYSICS', NULL, NULL),
  ('SubjectAppointed', '2', 'DEP.PRINCIPAL', NULL, NULL),
  ('SubjectAppointed', '20', 'BCOM', NULL, NULL),
  ('SubjectAppointed', '21', 'SPECIAL EDUCATION', NULL, NULL),
  ('SubjectAppointed', '22', 'ART', NULL, NULL),
  ('SubjectAppointed', '23', 'TECHNICAL - ELECTRONIC SCIENCE', NULL, NULL),
  ('SubjectAppointed', '24', 'AGRICULTURE', NULL, NULL),
  ('SubjectAppointed', '25', 'B. STUDIES', NULL, NULL),
  ('SubjectAppointed', '26', 'HOME.SCIENCE', NULL, NULL),
  ('SubjectAppointed', '27', 'ECONOMICS', NULL, NULL),
  ('SubjectAppointed', '28', 'DANCING', NULL, NULL),
  ('SubjectAppointed', '29', 'LIBRARY', NULL, NULL),
  ('SubjectAppointed', '3', 'ASS.PRINCIPAL', NULL, NULL),
  ('SubjectAppointed', '30', 'MUSIC', NULL, NULL),
  ('SubjectAppointed', '31', 'POLITICAL', NULL, NULL),
  ('SubjectAppointed', '32', 'ROMAN CATHOLIC', NULL, NULL),
  ('SubjectAppointed', '33', 'BIOLOGY', NULL, NULL),
  ('SubjectAppointed', '34', 'JAPANESE', NULL, NULL),
  ('SubjectAppointed', '35', 'SP.EDUCATION', NULL, NULL),
  ('SubjectAppointed', '36', 'BUS ST', NULL, NULL),
  ('SubjectAppointed', '37', 'POLITICAL SCIENCE', NULL, NULL),
  ('SubjectAppointed', '38', 'HINDU', NULL, NULL),
  ('SubjectAppointed', '39', 'TAMIL', NULL, NULL),
  ('SubjectAppointed', '4', 'BSC', NULL, NULL),
  ('SubjectAppointed', '40', 'FRENCH', NULL, NULL),
  ('SubjectAppointed', '41', 'SOCIAL SCIENCE', NULL, NULL),
  ('SubjectAppointed', '42', 'SECOND LANGUAGE - SINHALA', NULL, NULL),
  ('SubjectAppointed', '43', 'SPECIAL EDUCATION - MATHS', NULL, NULL),
  ('SubjectAppointed', '44', 'DRAMA', NULL, NULL),
  ('SubjectAppointed', '45', 'ICT', NULL, NULL),
  ('SubjectAppointed', '46', 'ACCOUNTS', NULL, NULL),
  ('SubjectAppointed', '47', 'GEOGRAPHY', NULL, NULL),
  ('SubjectAppointed', '48', 'BUSINESS STUDIES', NULL, NULL),
  ('SubjectAppointed', '49', 'SCIENCE/ MATHS', NULL, NULL),
  ('SubjectAppointed', '5', 'P.T', NULL, NULL),
  ('SubjectAppointed', '50', 'BA - FINE ART', NULL, NULL),
  ('SubjectAppointed', '51', 'HISTORY', NULL, NULL),
  ('SubjectAppointed', '52', 'COUNCELING', NULL, NULL),
  ('SubjectAppointed', '53', 'DANCE - BARATHAM', NULL, NULL),
  ('SubjectAppointed', '54', 'BUDHIST CULTURE', NULL, NULL),
  ('SubjectAppointed', '55', 'LOGIC', NULL, NULL),
  ('SubjectAppointed', '56', 'ENGLISH LITERATURE', NULL, NULL),
  ('SubjectAppointed', '57', 'HINDUSIM', NULL, NULL),
  ('SubjectAppointed', '58', 'INFORMATION TECHNOLOGY', NULL, NULL),
  ('SubjectAppointed', '59', 'DRAMA & THEATRE', NULL, NULL),
  ('SubjectAppointed', '6', 'MATHS', NULL, NULL),
  ('SubjectAppointed', '60', 'BUS.STUDIES', NULL, NULL),
  ('SubjectAppointed', '61', 'COMMERCE', NULL, NULL),
  ('SubjectAppointed', '62', 'PHYSICAL EDUCATION', NULL, NULL),
  ('SubjectAppointed', '63', 'IT', NULL, NULL),
  ('SubjectAppointed', '64', 'HEALTH & P.EDU.', NULL, NULL),
  ('SubjectAppointed', '65', 'ENGLISH & ICT', NULL, NULL),
  ('SubjectAppointed', '66', 'TAMIL LANGUAGE', NULL, NULL),
  ('SubjectAppointed', '7', 'SOCIAL STUDIES', NULL, NULL),
  ('SubjectAppointed', '8', 'ENGLISH', NULL, NULL),
  ('SubjectAppointed', '9', 'BA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `FullLeave`
--

CREATE TABLE IF NOT EXISTS `FullLeave` (
  `StaffID` varchar(5) NOT NULL DEFAULT '',
  `NoOfCasual` int(11) NOT NULL DEFAULT '0',
  `NoOfMedical` int(11) NOT NULL DEFAULT '0',
  `NoOfDuty` int(11) NOT NULL DEFAULT '0',
  `NoOfNoPay` int(11) NOT NULL DEFAULT '0',
  `RequestDate` date DEFAULT NULL,
  `StartDate` date NOT NULL DEFAULT '0000-00-00',
  `EndDate` date DEFAULT NULL,
  `AddressOnLeave` varchar(100) DEFAULT NULL,
  `Reason` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `ReviewedBy` varchar(5) DEFAULT NULL,
  `ReviewedDate` date DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffID`,`StartDate`),
  KEY `fk013` (`ReviewedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FullLeave`
--

INSERT INTO `FullLeave` (`StaffID`, `NoOfCasual`, `NoOfMedical`, `NoOfDuty`, `NoOfNoPay`, `RequestDate`, `StartDate`, `EndDate`, `AddressOnLeave`, `Reason`, `Status`, `ReviewedBy`, `ReviewedDate`, `isDeleted`) VALUES
  ('11', 2, 0, 0, 0, '2015-02-04', '2015-02-04', '2015-02-06', '', '', 1, NULL, '2015-02-04', 0),
  ('13', 0, 1, 0, 0, '2014-09-22', '2014-09-26', '2014-09-26', NULL, '', 0, NULL, NULL, 0),
  ('17', 2, 0, 0, 0, '2014-10-01', '2014-10-15', '2014-10-17', NULL, 'Testing', 1, NULL, '2014-10-01', 0),
  ('20', 2, 0, 0, 0, '2014-09-30', '2014-10-02', '2014-10-02', NULL, '', 1, NULL, '2014-09-30', 0),
  ('21', 0, 0, 3, 0, '2014-09-30', '2014-10-01', '2014-11-01', NULL, '', 1, NULL, '2015-02-04', 0),
  ('3', 2, 0, 2, 0, '2014-11-13', '2014-11-19', '2014-11-28', NULL, '', 1, NULL, '2015-02-04', 0),
  ('4', 0, 0, 3, 0, '2014-11-23', '2014-01-15', '2014-01-20', '', '', 1, NULL, '2014-11-23', 0),
  ('4', 0, 2, 0, 0, '2014-11-23', '2014-02-05', '2014-02-07', '', '', 0, NULL, NULL, 0),
  ('4', 2, 2, 1, 0, '2014-11-23', '2014-05-12', '2014-05-19', '', '', 1, NULL, '2014-11-23', 0),
  ('4', 0, 2, 0, 0, '2014-11-23', '2014-06-30', '2014-07-01', '', '', 1, NULL, '2014-11-23', 0),
  ('4', 0, 0, 1, 0, '2014-11-24', '2014-07-31', '2014-07-31', '', '', 1, NULL, '2015-02-04', 0),
  ('4', 0, 0, 1, 1, '2014-11-23', '2014-09-09', '2014-09-11', '', '', 2, NULL, '2015-02-04', 0),
  ('4', 2, 0, 0, 0, '2014-09-30', '2014-09-30', '2014-10-02', NULL, '', 1, NULL, '2014-09-30', 0),
  ('4', 2, 1, 0, 0, '2014-10-01', '2014-10-04', '2014-10-07', NULL, 'Testing', 1, NULL, '2014-10-01', 0),
  ('4', 0, 2, 4, 0, '2014-10-21', '2014-10-22', '2014-10-24', NULL, '', 1, NULL, '2014-10-21', 0),
  ('4', 2, 0, 0, 0, '2014-11-19', '2014-11-24', '2014-11-29', '', '', 0, NULL, NULL, 0),
  ('4', 0, 0, 2, 0, '2014-11-19', '2014-11-29', '2014-11-30', 'I feel bad', NULL, 1, NULL, '2014-11-19', 0),
  ('4', 0, 1, 0, 2, '2014-11-19', '2014-12-08', '2014-12-11', 'there', 'old', 1, NULL, '2014-11-19', 0),
  ('7', 1, 0, 0, 0, '2014-10-01', '2014-10-01', '2014-10-03', NULL, 'Reason', 1, NULL, '2014-10-21', 0),
  ('7', 0, 3, 0, 0, '2014-09-30', '2014-10-02', '2014-10-18', NULL, '', 0, NULL, NULL, 0),
  ('7', 0, 0, 2, 0, '2014-10-01', '2014-10-03', '2014-10-05', NULL, '', 1, NULL, '2014-11-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Holiday`
--

CREATE TABLE IF NOT EXISTS `Holiday` (
  `Year` int(11) NOT NULL DEFAULT '0',
  `Day` date NOT NULL,
  `dayType` int(11) DEFAULT '0',
  `description` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`Year`,`Day`),
  KEY `Day` (`Day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Holiday`
--

INSERT INTO `Holiday` (`Year`, `Day`, `dayType`, `description`) VALUES
  (2014, '2014-01-02', NULL, NULL),
  (2014, '2014-01-03', NULL, NULL),
  (2014, '2014-02-12', NULL, NULL),
  (2014, '2014-02-13', NULL, NULL),
  (2014, '2014-02-27', NULL, NULL),
  (2014, '2014-03-28', NULL, NULL),
  (2014, '2014-04-07', NULL, NULL),
  (2014, '2014-04-08', NULL, NULL),
  (2014, '2014-04-09', NULL, NULL),
  (2014, '2014-04-10', NULL, NULL),
  (2014, '2014-04-11', NULL, NULL),
  (2014, '2014-04-14', NULL, NULL),
  (2014, '2014-04-15', NULL, NULL),
  (2014, '2014-04-16', NULL, NULL),
  (2014, '2014-04-17', NULL, NULL),
  (2014, '2014-04-18', NULL, NULL),
  (2014, '2014-04-21', NULL, NULL),
  (2014, '2014-04-22', NULL, NULL),
  (2014, '2014-04-23', NULL, NULL),
  (2014, '2014-04-24', NULL, NULL),
  (2014, '2014-04-25', NULL, NULL),
  (2014, '2014-05-01', NULL, NULL),
  (2014, '2014-07-29', NULL, NULL),
  (2014, '2014-08-07', NULL, NULL),
  (2014, '2014-08-08', NULL, NULL),
  (2014, '2014-08-11', NULL, NULL),
  (2014, '2014-08-12', NULL, NULL),
  (2014, '2014-08-13', NULL, NULL),
  (2014, '2014-08-14', NULL, NULL),
  (2014, '2014-08-15', NULL, NULL),
  (2014, '2014-08-18', NULL, NULL),
  (2014, '2014-08-19', NULL, NULL),
  (2014, '2014-08-20', NULL, NULL),
  (2014, '2014-08-21', NULL, NULL),
  (2014, '2014-08-22', NULL, NULL),
  (2014, '2014-08-25', NULL, NULL),
  (2014, '2014-08-26', NULL, NULL),
  (2014, '2014-08-27', NULL, NULL),
  (2014, '2014-08-28', NULL, NULL),
  (2014, '2014-08-29', NULL, NULL),
  (2014, '2014-09-01', NULL, NULL),
  (2014, '2014-09-02', NULL, NULL),
  (2014, '2014-09-03', NULL, NULL),
  (2014, '2014-09-22', NULL, NULL),
  (2014, '2014-09-23', NULL, NULL),
  (2014, '2014-10-02', NULL, NULL),
  (2014, '2014-10-08', NULL, NULL),
  (2014, '2014-11-06', NULL, NULL),
  (2014, '2014-11-20', NULL, NULL),
  (2014, '2014-11-21', NULL, NULL),
  (2014, '2014-12-22', NULL, NULL),
  (2014, '2014-12-23', NULL, NULL),
  (2014, '2014-12-24', NULL, NULL),
  (2014, '2014-12-25', NULL, NULL),
  (2014, '2014-12-26', NULL, NULL),
  (2014, '2014-12-29', NULL, NULL),
  (2014, '2014-12-30', NULL, NULL),
  (2014, '2014-12-31', NULL, NULL);

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

--
-- Dumping data for table `IsSubstituted`
--

INSERT INTO `IsSubstituted` (`StaffID`, `Grade`, `Class`, `Day`, `Position`, `Date`, `SubsttitutedTeachedID`, `isDeleted`) VALUES
  ('1', NULL, NULL, 1, 0, '2014-10-07', '4', 0),
  ('23', NULL, NULL, 0, 2, '2014-10-27', '13', 0),
  ('12', NULL, NULL, 2, 4, '2014-11-19', '14', 0);

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

INSERT INTO `LabelLanguage` (`Label`, `Language`, `Value`) VALUES
  ('actingAssistantPrincipal', 0, 'Acting Assistant Principal'),
  ('actingAssistantPrincipal', 1, 'වැඩබලන සහකාර විදුහල්පති'),
  ('actingDeputyPrincipal', 0, 'Acting Deputy Principal'),
  ('actingDeputyPrincipal', 1, 'වැඩබලන නියෝජ්‍ය විදුහල්පති'),
  ('actingPrincipal', 0, 'Acting Principal'),
  ('actingPrincipal', 1, 'වැඩබලන විදුහල්පති'),
  ('addManager', 0, 'Add Event Managers '),
  ('addManager', 1, 'සිදුවීම් කළමනාකරුවන් එක් කරන්න '),
  ('addnewEvent', 0, 'Add New Event'),
  ('addnewEvent', 1, 'නව සිදුවීමක් එකතු කරන්න'),
  ('Address', 0, 'Postal Address'),
  ('Address', 1, 'ලිපිනය'),
  ('addTransaction', 0, 'Add Transaction'),
  ('addTransaction', 1, 'ගනුදෙනුව එකතු කරන්න'),
  ('AdmissionNo', 0, 'Admission No'),
  ('AdmissionNo', 1, 'ඇතුලත්වීමේ අංකය'),
  ('agriculture', 0, 'Agriculture'),
  ('agriculture', 1, 'කෘෂිකර්මය'),
  ('ALevel', 0, ' A Level'),
  ('ALevel', 1, '"අ.පො.ස(උ.පෙ)/හෝ සමාන(A/L)'),
  ('ALevelArtsCommerce', 0, ' A Level Arts Commerce'),
  ('ALevelArtsCommerce', 1, 'උ.පෙළ (12-13) කල/වාණිජ  ප්‍රදාන විෂයයන්'),
  ('ALevelOptional', 0, ' A Level Optional'),
  ('ALevelOptional', 1, 'උ.පෙළ (12-13) අතිරේක විෂයයන්'),
  ('ALevelScienceMain', 0, ' A Level Science Main'),
  ('ALevelScienceMain', 1, 'උ.පෙළ (12-13) විද්‍යා ප්‍රදාන විෂයයන් '),
  ('ALevelSupervisor', 0, 'A Level Supervisor'),
  ('ALevelSupervisor', 1, 'උ.පෙළ (12-13) අධීක්ෂණ ගුරු'),
  ('ALevelTechnology', 0, ' A Level Technology'),
  ('ALevelTechnology', 1, 'උ.පෙළ (12-13) තාක්ෂණික ප්‍රදාන විෂයයන්'),
  ('amount', 0, 'Amount'),
  ('amount', 1, 'මුදල'),
  ('applyForLeave', 0, 'Apply for Leave'),
  ('applyForLeave', 1, 'නිවාඩු ඉල්ලීම්කිරීම'),
  ('approveLeave', 0, 'Approve Leave'),
  ('approveLeave', 1, 'නිවාඩු අනුමතකිරීම'),
  ('arabic', 0, 'Arabic'),
  ('arabic', 1, 'අරාබි'),
  ('art', 0, 'Art'),
  ('art', 1, 'චිත්‍ර'),
  ('arts', 0, 'Arts'),
  ('arts', 1, 'කලා ශිල්ප'),
  ('artsAgain', 0, 'Arts Again'),
  ('artsAgain', 1, 'චිත්‍ර'),
  ('assistantPrincipal', 0, 'Assistant Principal'),
  ('assistantPrincipal', 1, 'සහකාර විදුහල්පති'),
  ('BABScBEd', 0, ' BA, BSc, BEd'),
  ('BABScBEd', 1, 'උපාධි හා ඊට සමාන'),
  ('bADegreesorequivalent', 0, 'BA Degrees or equivalent'),
  ('bADegreesorequivalent', 1, 'කල උපාධි හා සමාන උපාධි'),
  ('bAinaForeignLanguageexcludingEnglish', 0, 'BA in a Foreign Language excluding English'),
  ('bAinaForeignLanguageexcludingEnglish', 1, 'විදේශ භාෂා  (ඉංග්‍රීසි හැර)උපාධි'),
  ('bAinArts', 0, 'BA in Arts'),
  ('bAinArts', 1, 'චිත්‍ර කලා උපාධි හා සමාන  ඩිප්ලෝමා'),
  ('bAinDancingorequivalentDip', 0, 'BA in Dancing or equivalent Dip'),
  ('bAinDancingorequivalentDip', 1, 'නැටුම් උපාධි හා සමාන ඩිප්ලෝමා'),
  ('bAinEasternMusicorequivalentDip', 0, 'BA in Eastern Music or equivalent Dip'),
  ('bAinEasternMusicorequivalentDip', 1, 'පෙරදිග සංගීත උපාධි හා සමාන ඩිප්ලෝමා'),
  ('bAinEnglishorequivalent', 0, 'BA in English or equivalent'),
  ('bAinEnglishorequivalent', 1, 'ඉංග්‍රීසි/ඉංග්‍රීසි  විෂයක් ලෙස සමත් උපාධි'),
  ('belowOLevel', 0, 'Below O Level'),
  ('belowOLevel', 1, 'අ.පො.ස(සා.පෙ) ට අඩු'),
  ('bNIEBEd', 0, 'BNIE, BEd'),
  ('bNIEBEd', 1, 'හෝ විශ්ව.වි අද්යපනවේදී උපාධි'),
  ('bscinAgriculture', 0, 'BSc in Agriculture'),
  ('bscinAgriculture', 1, 'කෘෂි විද්‍යා උපාධි'),
  ('bscinBiology', 0, 'BSc in Biology'),
  ('bscinBiology', 1, 'ජීව විද්‍යා උපාධි'),
  ('bscinCombinedMathematics', 0, 'BSc in Combined Mathematics'),
  ('bscinCombinedMathematics', 1, 'සංයුක්ත ගණිතය'),
  ('bscinCommerceBusinessMgmtAccountingorequivalentDip', 0, 'BSc in Commerce Business Mgmt Accounting or equivalent Dip'),
  ('bscinCommerceBusinessMgmtAccountingorequivalentDip', 1, 'වානිජ්‍ය/ව්‍යාපාර පරිපාලනය/ගණකාධිකරණය උපාධි හා සමාන උපාධි'),
  ('bscinEducation', 0, 'BSc in Education'),
  ('bscinEducation', 1, 'අධ්‍යාපනවේදී උපාධි(විශ්ව විද්‍යාලයිය)'),
  ('bscinHomeScience', 0, 'BSc in Home Science'),
  ('bscinHomeScience', 1, 'ගෘහ විද්‍යා උපාධි'),
  ('bscinIT', 0, 'BSc in IT'),
  ('bscinIT', 1, 'තොරතුරු තාක්ෂණය'),
  ('bscinPhysics', 0, 'BSc in Physics'),
  ('bscinPhysics', 1, 'භාව්තීය විද්‍යා උපාධි'),
  ('bscinSocialScience', 0, 'Bscin Social Science'),
  ('bscinSocialScience', 1, 'සමාජ විද්‍යා උපාධි'),
  ('bScspecialisationinMathematics', 0, 'BSc Specialisation in Mathematics'),
  ('bScspecialisationinMathematics', 1, 'විශේෂ ගණිත උපාධි'),
  ('bTecConstruction', 0, 'BTec Construction'),
  ('bTecConstruction', 1, 'ඉදිකිරීම් තාක්ෂණය'),
  ('bTecElectronicandElectrical', 0, 'BTec Electronic and Electrical'),
  ('bTecElectronicandElectrical', 1, 'විදුලිය හා ඉලෙක්ට්‍රොනික තාක්ෂණය'),
  ('bTecMechanical', 0, 'BTec Mechanical'),
  ('bTecMechanical', 1, 'යාන්ත්‍රික තාක්ෂණය'),
  ('buddhism', 0, 'Buddhism'),
  ('buddhism', 1, 'බෞද්ධ'),
  ('byClass', 0, 'by Class'),
  ('byClass', 1, 'පන්ති මට්ටමින්'),
  ('byTeacher', 0, 'by Teacher'),
  ('byTeacher', 1, 'ගුරුවරයාගේ නමින්'),
  ('catholic', 0, 'Catholicism'),
  ('catholic', 1, 'කතෝලික'),
  ('certinLibrary', 0, 'Cert. in Library'),
  ('certinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති සහතිකපත්‍ර පාඨමාලාව'),
  ('certinTeacherTrainingAway', 0, 'Cert. in Teacher Training (Away)'),
  ('certinTeacherTrainingAway', 1, 'ගුරු පුහුණු සහතිකය-දුරස්ථ'),
  ('certinTeacherTrainingInstitute', 0, 'Cert. in Teacher Training (Institute)'),
  ('certinTeacherTrainingInstitute', 1, 'ගුරු පුහුණු සහතිකය-ආයතනික'),
  ('chooseOption', 0, 'Choose Option'),
  ('chooseOption', 1, 'විකල්පය තෝරගන්න'),
  ('christianity', 0, 'Christianity'),
  ('christianity', 1, 'ක්‍රිස්තියානි'),
  ('civilStatus', 0, 'Civil Status'),
  ('civilStatus', 1, 'විවාහක /අවිවාහක බව'),
  ('class', 0, 'Class'),
  ('class', 1, 'පන්තිය'),
  ('commerce', 0, 'Commerce'),
  ('commerce', 1, 'වාණිජ්‍ය'),
  ('contactNumber', 0, 'Contact Number'),
  ('contactNumber', 1, 'දුරකථන අංකය'),
  ('contactNumberForEmergency', 0, 'Contact Number for Emergency'),
  ('contactNumberForEmergency', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය'),
  ('contactPersonForEmergency', 0, 'Contact Person for Emergency'),
  ('contactPersonForEmergency', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම'),
  ('contractBasedandOther', 0, 'Contract Based and Other'),
  ('contractBasedandOther', 1, 'කොන්ත්‍රාත් පදනම හා වෙනත් මාර්ග වලින් දීමන ලබන ගුරුවරු'),
  ('counselling', 0, 'Counselling'),
  ('counselling', 1, 'උපදේශනය'),
  ('courseOfStudy', 0, 'Course of Study'),
  ('courseOfStudy', 1, 'වර්ගමාන පත්වීමේ වර්ගීකරණය'),
  ('createTimetableByClass', 0, 'Create Timetable by Class'),
  ('createTimetableByClass', 1, 'පන්තිය විසින් කාලසටහන සැකසුම'),
  ('createTimetableByTeacher', 0, 'Create Timetable by Teacher'),
  ('createTimetableByTeacher', 1, 'ගුරුවරයා විසින් කාලසටහන සැකසුම'),
  ('dancing', 0, 'Dancing'),
  ('dancing', 1, 'නැටුම්'),
  ('date', 0, 'Date'),
  ('date', 1, 'දිනය'),
  ('dateAppointedAsTeacher', 0, 'Date Appointed as Teacher/Principal'),
  ('dateAppointedAsTeacher', 1, 'සේවයට පත්වූ වර්ෂය හා මාසය'),
  ('dateJoinedSchool', 0, 'Date Joined this School'),
  ('dateJoinedSchool', 1, 'මෙම විදුහලේ පත්වීම භාරගත් වර්ෂය හා මාසය'),
  ('dateOfBirth', 0, 'Date of Birth'),
  ('dateOfBirth', 1, 'උපන් දිනය'),
  ('delete', 0, 'Delete'),
  ('delete', 1, 'ඉවත්කරන්න'),
  ('deputyPrincipal', 0, 'Deputy Principal'),
  ('deputyPrincipal', 1, 'නියෝජ්‍ය විදුහල්පති'),
  ('description', 0, 'Description'),
  ('description', 1, 'විස්තරය'),
  ('designation', 0, 'Designation'),
  ('designation', 1, 'පාසලේ දරන තනතුර'),
  ('dipinAgriculture', 0, 'Dip in Agriculture'),
  ('dipinAgriculture', 1, 'කෘෂි අද්‍යාපනය පිළිබද ඩිප්ලෝමාව'),
  ('dipinEASL', 0, 'Dip in EASL'),
  ('dipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ ඩිප්ලෝමා'),
  ('dipinEd', 0, 'Dip in Ed'),
  ('dipinEd', 1, 'පශ්චාත් උපාධි අධ්‍යාපන ඩිප්ලෝමාව'),
  ('dipinLibrary', 0, 'Dip in Library'),
  ('dipinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති ඩිප්ලෝමා පාඨමාලාව'),
  ('easternMusic', 0, 'Eastern Music'),
  ('easternMusic', 1, 'සංගීතය-අපරදිග'),
  ('educationInformation', 0, 'Education Information'),
  ('educationInformation', 1, 'අධ්‍යාපනික තොරතුරු'),
  ('emergencyContact', 0, 'Emergency Contact''s Name'),
  ('emergencyContact', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම'),
  ('emergencyContactNumber', 0, 'Emergency Contact''s Name'),
  ('emergencyContactNumber', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය'),
  ('employment', 0, 'Employment'),
  ('employment', 1, ''),
  ('employmentInformation', 0, 'Employment Information'),
  ('employmentInformation', 1, 'සේවයේ තොරතුරු'),
  ('employmentStatus', 0, 'Employment Status'),
  ('employmentStatus', 1, 'පාසලට පතවීමේ ස්වභාවය'),
  ('endTime', 0, 'End Time'),
  ('endTime', 1, 'අවසන් වන වෙලාව'),
  ('english', 0, 'English'),
  ('english', 1, 'ඉංග්‍රීසි 2001 ට පසු'),
  ('eventCreator', 0, 'Event Creator'),
  ('eventCreator', 1, 'සිදුවීම් නිර්මාණකරු'),
  ('eventId', 0, 'Event ID'),
  ('eventId', 1, 'සිදුවීම් අංකය'),
  ('eventList', 0, 'Event List'),
  ('eventList', 1, 'සිදුවීම් ලැයිස්තුව'),
  ('eventManagement', 0, 'Event Management'),
  ('eventManagement', 1, 'උත්සවය කළමනාකරණය'),
  ('eventName', 0, 'EventName'),
  ('eventName', 1, 'සිදුවීම'),
  ('eventType', 0, 'Event Type'),
  ('eventType', 1, 'සිදුවීම් වර්ගය'),
  ('expand', 0, 'Expand'),
  ('expand', 1, 'වැඩි විස්තර'),
  ('female', 0, 'Female'),
  ('female', 1, 'ගැහැණු'),
  ('foreignLanguageExcludingEnglish', 0, 'Foreign Language Excluding English'),
  ('foreignLanguageExcludingEnglish', 1, 'විදේශ භාෂා (ඉංගිසි හැර)'),
  ('fr', 0, 'F'),
  ('fr', 1, 'සි'),
  ('friday', 0, 'Friday'),
  ('friday', 1, 'සිකුරාදා'),
  ('fullTime', 0, 'Full Time'),
  ('fullTime', 1, 'මෙම පාසලින් වැටුප් ලබනහ පාසලේ පුර්ණ කාලීනව සේවය කරන'),
  ('fullTime_BroughtFromOtherSchool', 0, 'Full Time (Brought from other School)'),
  ('fullTime_BroughtFromOtherSchool', 1, 'වෙනත් පාසලකින් වැටුප් ලබා මෙම පාසලේ පුර්නකලිනවා සේවය කරන '),
  ('fullTime_ReleasedToOtherSchool', 0, 'Full Time (Released to other School)'),
  ('fullTime_ReleasedToOtherSchool', 1, 'මෙම පාසලින් වැටුප් ලබන හා පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට පුර්නකලිනව නිදහස් කර ඇති'),
  ('gender', 0, 'Gender'),
  ('gender', 1, 'ස්ත්‍රී/පුරුෂ භාවය'),
  ('generalInformation', 0, 'General Information'),
  ('generalInformation', 1, 'සාමාන්‍ය තොරතුරු'),
  ('grade', 0, ' Grade'),
  ('grade', 1, 'වසර'),
  ('gradeclass', 0, 'Grade and Class'),
  ('gradeclass', 1, 'වසර සහ පන්තිය'),
  ('graduates', 0, 'Graduates'),
  ('graduates', 1, 'උපාධි'),
  ('healthAndPE', 0, 'Health and P.E.'),
  ('healthAndPE', 1, 'ශාරීරික අද්‍යාපනය'),
  ('healthandPhysicalEducation', 0, 'Health and Physical Education'),
  ('healthandPhysicalEducation', 1, 'ශාරීරික අද්‍යාපනය'),
  ('highestEducationalQualification', 0, 'Highest Educational Qualification'),
  ('highestEducationalQualification', 1, 'ඉහලම අධ්‍යාපන සුදුසුකම'),
  ('highestProfessionalQualification', 0, 'Highest Professional Qualification'),
  ('highestProfessionalQualification', 1, 'ඉහලම වෘත්තීය සුදුසුකම'),
  ('hinduism', 0, 'Hinduism'),
  ('hinduism', 1, 'හින්දු'),
  ('homeScience', 0, 'Home Science'),
  ('homeScience', 1, 'ගෘහ විද්‍යාව'),
  ('House', 0, 'House'),
  ('House', 1, 'නිවාසය'),
  ('indianTamil', 0, 'Indian Tamil'),
  ('indianTamil', 1, 'ඉන්දියානු  දෙමළ'),
  ('informationTechnology', 0, 'Information Technology'),
  ('informationTechnology', 1, 'තොරතරු තාක්ෂනය'),
  ('interval', 0, 'INTERVAL'),
  ('interval', 1, 'විවේක කාලය'),
  ('invitees', 0, 'Invitees'),
  ('invitees', 1, 'ආරාධිතයින්'),
  ('inviteesList', 0, 'Invitees List'),
  ('inviteesList', 1, 'ආරාධිත ලැයිස්තුව'),
  ('islam', 0, 'Islam'),
  ('islam', 1, 'ඉස්ලාම්'),
  ('iT', 0, 'IT'),
  ('iT', 1, 'තොරතුරු තාක්ෂණය'),
  ('keepAttendance', 0, 'Keep Attendance'),
  ('keepAttendance', 1, 'පැමිණීමේ වාර්තාව '),
  ('leaveManagement', 0, 'Leave Management'),
  ('leaveManagement', 1, 'නිවාඩුව කළමනාකරණය'),
  ('library', 0, 'Library'),
  ('library', 1, 'පුස්තකාල'),
  ('libraryandInformationScience', 0, 'Library and Information Science'),
  ('libraryandInformationScience', 1, 'පුස්තකාල හා තොරතරු විද්‍යාව'),
  ('location', 0, 'Location'),
  ('location', 1, 'ස්ථානය'),
  ('mailDeliveryAddress', 0, 'Postal Address'),
  ('mailDeliveryAddress', 1, 'ලිපිනය'),
  ('mAinEd', 0, 'MA in Ed'),
  ('mAinEd', 1, 'අධ්‍යාපනය පිළිබද ශ්‍රාස්ත්‍රපති උපාධිය'),
  ('malay', 0, 'Malay'),
  ('malay', 1, 'මෞලවි'),
  ('male', 0, 'Male'),
  ('male', 1, 'පිරිමි'),
  ('MAMScMEd', 0, ' MA, MSc, MEd'),
  ('MAMScMEd', 1, 'ශාස්ත්‍රපති හා ඊට සමාන්තර'),
  ('manage', 0, 'Manage'),
  ('manage', 1, 'කළමනාකරණය'),
  ('manageEvents', 0, 'Manage Events'),
  ('manageEvents', 1, 'සිදුවීම් කළමනාකරණය'),
  ('management', 0, 'Management'),
  ('management', 1, 'පරිපාලනය'),
  ('managerList', 0, 'Event Manager List'),
  ('managerList', 1, 'සිදුවීම් කළමනාකරුවන් ලැයිස්තුව'),
  ('managerName', 0, 'Manager Name'),
  ('managerName', 1, 'කළමනාකරුගේ නම'),
  ('married', 0, 'Married'),
  ('married', 1, 'විවාහක'),
  ('maths', 0, 'Maths'),
  ('maths', 1, 'ගණිතය'),
  ('mEd', 0, 'M Ed'),
  ('mEd', 1, 'අධ්‍යාපනපති උපාධි'),
  ('medium', 0, 'Medium'),
  ('medium', 1, 'පත්වීම ලද මාධ්‍යය'),
  ('mo', 0, 'M'),
  ('mo', 1, 'ස'),
  ('monday', 0, 'Monday'),
  ('monday', 1, 'සදුදා'),
  ('MPhil', 0, 'MPhil'),
  ('MPhil', 1, 'දර්ශනපති හා ඊට සමාන්තර'),
  ('mPhilEd', 0, 'MPhil Ed'),
  ('mPhilEd', 1, 'දර්ශනපති -අධ්‍යාපනය පිළිබද'),
  ('mScinEdMgmt', 0, 'MSc in Ed Mgmt'),
  ('mScinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද විද්‍යාපති'),
  ('mScinLibrary', 0, 'MSc in Library'),
  ('mScinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති විද්‍යාපති උපාධිය'),
  ('name', 0, 'Name'),
  ('name', 1, 'සිදුවීම'),
  ('nameInFull', 0, 'Name in Full'),
  ('nameInFull', 1, 'සම්පුර්ණ නම'),
  ('nameWithInitials', 0, 'Name with Initials'),
  ('nameWithInitials', 1, 'නම් මුලකුරු සමඟ'),
  ('natDipinTeaching', 0, 'Nat Dip in Teaching'),
  ('natDipinTeaching', 1, 'ජාතික ශික්ෂණ විද්‍යා ඩිප්ලෝමාව'),
  ('nationalityRace', 0, 'Race'),
  ('nationalityRace', 1, 'ජනවර්ගය'),
  ('nicNumber', 0, 'NIC Number'),
  ('nicNumber', 1, 'ජාතික හැඳුනුම් පත් අංකය'),
  ('none', 0, 'None'),
  ('none', 1, 'ව්හුර්තීය සුදුසුකම් ලබා නොමැති'),
  ('nonRomanCatholicism', 0, 'Non Roman Catholicism'),
  ('nonRomanCatholicism', 1, 'රෝමානු කතෝලික නොවන ක්‍රිස්තියානි'),
  ('noofinvitees', 0, 'No Of Invitees'),
  ('noofinvitees', 1, 'ආරාධිතයින් ගණන'),
  ('OLevel', 0, ' O Level'),
  ('OLevel', 1, 'අ.පො.ස(සා.පෙ)/හෝ සමාන(O/L)'),
  ('OLevelandOther', 0, ' O Level and Other'),
  ('OLevelandOther', 1, 'අ.පො.ස (ස.පෙ)/වෙනත්'),
  ('onContract_Government', 0, 'On Contract (Government)'),
  ('onContract_Government', 1, 'රජයෙන් වැටුප් ලබන කොන්ත්‍රාත් පදනම මත සේවයට බදවාගත් '),
  ('onPaidLeave', 0, 'On Paid Leave'),
  ('onPaidLeave', 1, 'වැටුප් සහිත පුර්නකාලින අද්යන නිවාඩු'),
  ('optional', 0, 'Optional'),
  ('optional', 1, 'අතිරේක'),
  ('other', 0, 'Other'),
  ('other', 1, 'වෙනත්'),
  ('otherGovernmentDepartment', 0, 'Other Government Department'),
  ('otherGovernmentDepartment', 1, 'වෙනත් රාජ්‍ය ආයතන වලින් පත්කළ(පොලිස් උපසේවය සමුර්ද්දී,මහවැලි හා දක්ෂිණ ලංකා සංවර්දන අදිකාරී වැනි'),
  ('paidFromSchoolFees', 0, 'Paid from School Fees'),
  ('paidFromSchoolFees', 1, 'පහසුකම් ගාස්තු/ වෙනත් මාර්ග වලින් දීමනා ලබන'),
  ('partTime', 0, 'Part Time'),
  ('partTime', 1, 'මෙම පාසලින් වැටුප් ලබන පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට අර්ධකලිනවා නිදහස් කර ඇති'),
  ('passedMathswithoutadegreeinscience', 0, 'Passed Maths without a degree in science'),
  ('passedMathswithoutadegreeinscience', 1, 'ගණිතය විෂයක් ලෙස සමත් වු විද්‍යා නොවන උපාධි'),
  ('pGDipinEASL', 0, 'PG Dip in EASL'),
  ('pGDipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ පශ්චාත් උපාධිඩිප්ලෝමාව'),
  ('pGDipinEdMgmt', 0, 'PG Dip in Ed Mgmt'),
  ('pGDipinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද පශ්චාත් උපාධිඩිප්ලෝමාව'),
  ('pGDipinLibraryScience', 0, 'PG Dip in Library Science'),
  ('pGDipinLibraryScience', 1, 'ගුරු පුස්තකාල විද්‍යා පශ්චාත් උපාධි ඩිප්ලෝමා පාඨමාලාව'),
  ('phd', 0, 'PhD'),
  ('phd', 1, 'දර්ශනශුරී උපාධිහා ඊට සමාන්තර'),
  ('phDEd', 0, 'PhD Ed'),
  ('phDEd', 1, 'දර්ශනශුරි - අධ්‍යාපනය පිළිබදව'),
  ('pname', 0, 'Parent Name'),
  ('pname', 1, 'මව/පියා  ගේ නම'),
  ('primary', 0, 'Primary'),
  ('primary', 1, 'ප්‍රාථමික'),
  ('primaryEnglish', 0, 'Primary English'),
  ('primaryEnglish', 1, 'ප්‍රාථමික ඉංග්‍රීසි'),
  ('primaryGeneral', 0, 'Primary General'),
  ('primaryGeneral', 1, 'ප්‍රාථමික/සාමාන්‍ය'),
  ('primaryMultiple', 0, 'Primary Multiple'),
  ('primaryMultiple', 1, 'ප්‍රාථමික පොදු'),
  ('primarySecondLanguage', 0, 'Primary Second Language'),
  ('primarySecondLanguage', 1, 'ප්‍රාථමික දෙවන බස'),
  ('primarySupervisor', 0, 'Primary Supervisor'),
  ('primarySupervisor', 1, 'ප්‍රාථමික (1-5) අධීක්ෂණ ගුරු'),
  ('principal', 0, 'Principal'),
  ('principal', 1, 'විදුහල්පති'),
  ('printTransction', 0, 'Print Transaction Report'),
  ('printTransction', 1, 'ගනුදෙනු වාර්තාව මුද්‍රණය කරන්න'),
  ('prizeGiving', 0, 'Prize Giving Ceremony'),
  ('prizeGiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය'),
  ('registerStaffMember', 0, 'Register Staff Member'),
  ('registerStaffMember', 1, 'කාර්යමණ්ඩලය ලියාපදිංචිය'),
  ('releasedToOtherInstituteOfficeService', 0, 'Released To Other Institute/Office/Service'),
  ('releasedToOtherInstituteOfficeService', 1, 'වෙනත් ආයතනයකට/කාර්යාලයකට/සේවයකට'),
  ('releasedToOtherSchool', 0, 'Released To Other School'),
  ('releasedToOtherSchool', 1, 'වෙනත් පාසලකට නිදහස් කල'),
  ('religion', 0, 'Religion'),
  ('religion', 1, 'ආගම'),
  ('romanCatholicism', 0, 'Roman Catholicism'),
  ('romanCatholicism', 1, 'රෝමානු කතෝලික'),
  ('salary', 0, 'Salary'),
  ('salary', 1, 'මුළු වැටුප'),
  ('saveEvent', 0, 'Save Event'),
  ('saveEvent', 1, 'සිදුවීම සුරකින්න'),
  ('science', 0, 'Science'),
  ('science', 1, 'විද්‍යාව'),
  ('scienceAndMaths', 0, 'Science And Maths'),
  ('scienceAndMaths', 1, 'විද්‍යා -ගණිත'),
  ('search', 0, 'Search'),
  ('search', 1, 'සොයන්න'),
  ('searchBy', 0, 'Search By'),
  ('searchBy', 1, ''),
  ('searchStaffMember', 0, 'Search and Update Details'),
  ('searchStaffMember', 1, 'තොරතුරු සෙවීම හා යාවත්කාලීන කිරීම'),
  ('secondaryArts', 0, 'Secondary Arts'),
  ('secondaryArts', 1, 'ද්විතීයික (6-11) සෞන්දර්ය'),
  ('secondaryEnglish', 0, 'Secondary English'),
  ('secondaryEnglish', 1, 'ද්විතීයික (6-11) ඉංග්‍රීසි'),
  ('secondaryMultiple', 0, 'Secondary Multiple'),
  ('secondaryMultiple', 1, 'ද්විතීයික (6-11) පොදු'),
  ('secondaryScienceMaths', 0, 'Secondary Science Maths'),
  ('secondaryScienceMaths', 1, 'ද්විතීයික (6-11) විද්‍යා/ගණිත'),
  ('secondarySecondLanguage', 0, 'Secondary Second Language'),
  ('secondarySecondLanguage', 1, 'ද්විතීයික (6-11) දෙවන බස'),
  ('secondarySupervisor', 0, 'Secondary Supervisor'),
  ('secondarySupervisor', 1, 'ද්විතීයික (6-11) අධීක්ෂණ ගුරු'),
  ('secondaryTechnology', 0, 'Secondary Technology'),
  ('secondaryTechnology', 1, 'ද්විතීයික (6-11)තාක්ෂණික'),
  ('section', 0, 'Section'),
  ('section', 1, 'නිරතවන කාර්යය'),
  ('serviceGrade', 0, 'Service Grade'),
  ('serviceGrade', 1, 'අදාල සේවය/ශ්‍රේණිය'),
  ('sid', 0, 'Admission No'),
  ('sid', 1, 'ඇතුලත්වීමේ අංකය'),
  ('sinhala', 0, 'Sinhala'),
  ('sinhala', 1, 'සිංහල'),
  ('socialStudies', 0, 'Social Studies'),
  ('socialStudies', 1, 'සමාජ අධ්‍යනය'),
  ('specialEducation', 0, 'Special Education'),
  ('specialEducation', 1, 'විශේෂ අධ්‍යාපනය'),
  ('sportMeet', 0, 'Sports Meet'),
  ('sportMeet', 1, 'ක්‍රීඩා උත්සවය'),
  ('sriLankaEducationAdministrativeServiceI', 0, 'Sri Lanka Education Administrative Service I'),
  ('sriLankaEducationAdministrativeServiceI', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ I(SLEAS I)'),
  ('sriLankaEducationAdministrativeServiceII', 0, 'Sri Lanka Education Administrative Service I I'),
  ('sriLankaEducationAdministrativeServiceII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ II(SLEAS II)'),
  ('SriLankaEducationAdministrativeServiceIII', 0, ' Sri Lanka Education Administrative Service I I I'),
  ('SriLankaEducationAdministrativeServiceIII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ III(SLEAS III)'),
  ('srilankanMuslim', 0, 'Sri Lankan Muslim'),
  ('srilankanMuslim', 1, 'ශ්‍රී ලාංකික මුස්ලිම්'),
  ('srilankanTamil', 0, 'Sri Lankan Tamil'),
  ('srilankanTamil', 1, 'ශ්‍රී ලාංකික දෙමළ'),
  ('sriLankaPrincipalService2I', 0, 'Sri Lanka Principal Service 2 I'),
  ('sriLankaPrincipalService2I', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-I(SLPS 2-I)'),
  ('sriLankaPrincipalService2II', 0, 'Sri Lanka Principal Service 2 I I'),
  ('sriLankaPrincipalService2II', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-II(SLPS 2-II)'),
  ('sriLankaPrincipalService3', 0, 'Sri Lanka Principal Service 3'),
  ('sriLankaPrincipalService3', 1, 'ශ්‍රී ලංකා විහාල්පති සේ.3(SLPS 3)'),
  ('sriLankaPrincipalServiceI', 0, 'Sri Lanka Principal Service I'),
  ('sriLankaPrincipalServiceI', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. I(SLPS I)'),
  ('sriLankaTeacherService2I', 0, 'Sri Lanka Teacher Service 2 I'),
  ('sriLankaTeacherService2I', 1, 'ශ්‍රී ලංකා ගුරු සේ  2-I'),
  ('sriLankaTeacherService2II', 0, 'Sri Lanka Teacher Service 2 I I'),
  ('sriLankaTeacherService2II', 1, 'ශ්‍රී ලංකා ගුරු සේ 2-II'),
  ('sriLankaTeacherService3I', 0, 'Sri Lanka Teacher Service 3 I'),
  ('sriLankaTeacherService3I', 1, 'ශ්‍රී ලංකා ගුරු සේ  3-I'),
  ('sriLankaTeacherService3II', 0, 'Sri Lanka Teacher Service 3 I I'),
  ('sriLankaTeacherService3II', 1, 'ශ්‍රී ලංකා ගුරු සේ 3-II'),
  ('sriLankaTeacherServiceI', 0, 'Sri Lanka Teacher Service I'),
  ('sriLankaTeacherServiceI', 1, 'ශ්‍රී ලංකා ගුරු සේ I '),
  ('sriLankaTeacherServicePending', 0, 'Sri Lanka Teacher Service Pending'),
  ('sriLankaTeacherServicePending', 1, 'ශ්‍රී ලංකා ගුරු සේවයට අන්තර්ග්‍රහණය කර නොමැත'),
  ('staffAdvisorFullTime', 0, 'Staff Advisor (Full-Time)'),
  ('staffAdvisorFullTime', 1, 'ගුරු උපදේශක (පුර්නකාලින)'),
  ('staffAdvisorPartTime', 0, 'Staff Advisor (Part-Time)'),
  ('staffAdvisorPartTime', 1, 'ගුරු උපදේශක (අර්ධකාලින)'),
  ('Staffallocation', 0, 'Class Teacher Allocation'),
  ('Staffallocation', 1, 'පන්ති භාර ගුරු භවතුන්'),
  ('staffID', 0, 'Serial No'),
  ('staffID', 1, ''),
  ('staffManagement', 0, 'Staff Details'),
  ('staffManagement', 1, 'කාර්යමණ්ඩල තොරතුරු'),
  ('staffregistrationform', 0, 'Staff Registration Form'),
  ('staffregistrationform', 1, 'පාසලේ අධ්‍යන කාර්ය මණ්ඩලවල තොරතුරු'),
  ('staffTimetable', 0, 'Teacher''s Timetable'),
  ('staffTimetable', 1, 'ගුරුවරුන්ගේ කාලසටහන'),
  ('startTime', 0, 'Start Time '),
  ('startTime', 1, 'ආරම්භක වෙලාව '),
  ('status', 0, 'Status'),
  ('status', 1, 'තත්වය'),
  ('subjectMostTaught', 0, 'Subject Most Taught'),
  ('subjectMostTaught', 1, 'වැඩිම කාලයක් උගන්වන විෂයය'),
  ('subjectSecondMostTaught', 0, 'Subject Second Most Taught'),
  ('subjectSecondMostTaught', 1, 'දෙවනුව වැඩි කාලයක් උගන්වන විෂයය'),
  ('submit', 0, 'Submit'),
  ('submit', 1, 'තහවුරු කරන්න'),
  ('tamil', 0, 'Tamil'),
  ('tamil', 1, 'දෙමළ'),
  ('teacher', 0, 'Teacher'),
  ('teacher', 1, 'ගුරුවරයා'),
  ('teacherDay', 0, 'Teacher''s Day'),
  ('teacherDay', 1, 'ගුරු දිනය'),
  ('Teachersid', 0, 'Teachers ID'),
  ('Teachersid', 1, 'අනුක්‍රමික අංකය'),
  ('teachersName', 0, 'Teacher''s Name'),
  ('teachersName', 1, 'ගුරුවරයාගේ නම'),
  ('technology', 0, 'Technology'),
  ('technology', 1, 'තාක්ෂණය'),
  ('th', 0, 'T'),
  ('th', 1, 'බ්‍ර'),
  ('theatreandDrama', 0, 'Theatre and Drama'),
  ('theatreandDrama', 1, 'නාට්‍ය හා රංග කලාව'),
  ('thursday', 0, 'Thursday'),
  ('thursday', 1, 'බ්‍රහස්පතින්දා'),
  ('tid', 0, 'Transaction ID'),
  ('tid', 1, 'ගනුදෙනු අංකය'),
  ('time', 0, 'Time'),
  ('time', 1, 'වේලාව'),
  ('Timetables', 0, 'Timetables'),
  ('Timetables', 1, 'කාලසටහන'),
  ('tlog', 0, 'Transaction Log'),
  ('tlog', 1, 'ගනුදෙනු සටහන'),
  ('trecieved', 0, 'Total Recieved'),
  ('trecieved', 1, 'ලබාගත් මුළු මුදල'),
  ('tspent', 0, 'Total Spent'),
  ('tspent', 1, 'වියදම් කල මුළු මුදල'),
  ('tu', 0, 'T'),
  ('tu', 1, 'අ'),
  ('tuesday', 0, 'Tuesday'),
  ('tuesday', 1, 'අගහරුවදා'),
  ('type', 0, 'Type'),
  ('type', 1, 'වර්ගය'),
  ('unmarried', 0, 'Not Married'),
  ('unmarried', 1, 'අවිවාහක'),
  ('update', 0, 'Update'),
  ('update', 1, 'යාවත්කාලින කරන්න'),
  ('viewInvitees', 0, 'View Invitees List'),
  ('viewInvitees', 1, 'ආරාධිත ලැයිස්තුව බලන්න'),
  ('viewLeaveHistory', 0, 'View Leave History'),
  ('viewLeaveHistory', 1, 'ඉකුත් වූ නිවාඩු'),
  ('we', 0, 'W'),
  ('we', 1, 'බ'),
  ('wednesday', 0, 'Wednesday'),
  ('wednesday', 1, 'බදාදා'),
  ('week', 0, ' Week'),
  ('week', 1, 'සතිය'),
  ('westernMusic', 0, 'Western Music'),
  ('westernMusic', 1, 'සංගීතය-පෙරදිග'),
  ('widow', 0, 'Widow'),
  ('widow', 1, 'වැන්දබු');

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

INSERT INTO `Language` (`Language`, `Value`) VALUES
  (0, 'English'),
  (1, 'Sinhala');

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
  `CasualLeave` int(11) DEFAULT NULL,
  `MedicalLeave` int(11) DEFAULT NULL,
  `DutyLeave` int(11) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LeaveData`
--

INSERT INTO `LeaveData` (`StaffID`, `CasualLeave`, `MedicalLeave`, `DutyLeave`, `isDeleted`) VALUES
  ('1', 0, 0, 0, 0),
  ('10', 4, 4, 15, 0),
  ('11', 15, 90, 14, 0),
  ('12', 15, 90, 15, 0),
  ('13', 15, 90, 15, 0),
  ('14', 1, 52, 2, 0),
  ('15', 15, 90, 15, 0),
  ('16', 15, 90, 0, 0),
  ('17', 13, 90, 15, 0),
  ('18', 15, 90, 15, 0),
  ('2', 15, 90, 15, 0),
  ('20', 14, 3, 0, 0),
  ('21', 15, 90, 8, 0),
  ('25', 15, 90, 15, 0),
  ('3', 12, 90, 15, 0),
  ('30', 15, 90, 15, 0),
  ('31', 15, 90, 15, 0),
  ('32', 15, 90, 15, 0),
  ('33', 15, 90, 15, 0),
  ('4', 14, 90, 5, 0),
  ('5', 15, 90, 15, 0),
  ('6', 14, 90, 15, 0),
  ('7', 13, 90, -1, 0),
  ('8', 6, 90, 15, 0),
  ('9', 15, 90, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `OtherLeave`
--

CREATE TABLE IF NOT EXISTS `OtherLeave` (
  `StaffID` varchar(5) NOT NULL DEFAULT '',
  `LeaveType` int(11) NOT NULL DEFAULT '0',
  `RequestDate` date DEFAULT NULL,
  `LeaveDate` date NOT NULL DEFAULT '0000-00-00',
  `Reason` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `ReviewedBy` varchar(5) DEFAULT NULL,
  `ReviewedDate` date DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffID`,`LeaveDate`),
  KEY `OtherLeave_ibfk_2` (`ReviewedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OtherLeave`
--

INSERT INTO `OtherLeave` (`StaffID`, `LeaveType`, `RequestDate`, `LeaveDate`, `Reason`, `Status`, `ReviewedBy`, `ReviewedDate`, `isDeleted`) VALUES
  ('11', 3, '2015-02-04', '0000-00-00', '', 0, NULL, NULL, 0),
  ('11', 1, '2015-02-03', '2015-02-03', '', 0, NULL, NULL, 0),
  ('13', 1, '2015-02-04', '2015-02-04', '', 0, NULL, NULL, 0),
  ('2', 1, '2014-12-17', '2014-12-17', '', 0, NULL, NULL, 0),
  ('25', 1, '2015-01-04', '2015-01-04', 'Tired.', 0, NULL, NULL, 0),
  ('4', 3, '2014-11-26', '0000-00-00', '', 0, NULL, NULL, 0),
  ('4', 1, '2014-11-24', '2014-10-15', '', 0, NULL, NULL, 0),
  ('4', 3, '2014-11-24', '2014-11-07', '', 0, NULL, NULL, 0),
  ('4', 1, '2014-11-19', '2014-11-19', 'Hangover.', 0, NULL, NULL, 0),
  ('4', 1, '2014-11-19', '2014-11-20', 'Last morning''s hangover..', 0, NULL, NULL, 0),
  ('4', 3, '2014-11-19', '2014-11-25', '"Doctor''s" appointment. ;)', 0, NULL, NULL, 0),
  ('4', 2, '2014-11-19', '2014-11-28', 'Couldn''t take it.', 0, NULL, NULL, 0),
  ('4', 3, '2014-11-19', '2014-11-30', 'Okay, not a doctor.', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `permId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permDesc` varchar(50) NOT NULL,
  `orderKey` int(11) DEFAULT '0',
  PRIMARY KEY (`permId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Permissions`
--

INSERT INTO `Permissions` (`permId`, `permDesc`, `orderKey`) VALUES
  (1, 'Administration Panel', 70),
  (2, 'Staff Details System', 0),
  (3, 'Leave Management System', 10),
  (4, 'Leave Application', 11),
  (5, 'Leave Approval', 11),
  (6, 'Timetables System', 20),
  (7, 'Classteacher Allocation', 21),
  (8, 'Substitute Teacher', 21),
  (9, 'Student Information System', 30),
  (10, 'Student Registration', 31),
  (11, 'Search Student', 31),
  (12, 'Event Management System', 40),
  (13, 'Add Event', 41),
  (14, 'Attendance System', 50),
  (15, 'Keep Attendance', 51),
  (16, 'View Attendance', 51),
  (17, 'Marks and Grading System', 60),
  (18, 'Enter O/A Level Examination Grades', 61),
  (19, 'Enter Term Test Marks', 61),
  (20, 'Search Grades', 61),
  (21, 'Staff Report', 1),
  (22, 'Manage Users', 71),
  (23, 'Change Staff Details', 1),
  (24, 'Manage Permissions', 72),
  (25, 'System Configuration', 73),
  (26, 'SMS System', 80);

-- --------------------------------------------------------

--
-- Table structure for table `ProQualification`
--

CREATE TABLE IF NOT EXISTS `ProQualification` (
  `StaffId` int(11) NOT NULL,
  `Qualification` int(11) NOT NULL,
  `Highest` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffId`,`Qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ProQualification`
--

INSERT INTO `ProQualification` (`StaffId`, `Qualification`, `Highest`) VALUES
  (1, 1, 1),
  (2, 2, 1),
  (3, 2, 1),
  (4, 10, 1),
  (5, 10, 1),
  (6, 4, 1),
  (7, 7, 1),
  (8, 1, 1),
  (9, 6, 1),
  (10, 2, 1),
  (11, 3, 1),
  (12, 5, 1),
  (13, 12, 1),
  (14, 18, 1),
  (15, 19, 1),
  (16, 1, 1),
  (17, 6, 1),
  (18, 6, 1),
  (19, 2, 1),
  (20, 4, 1),
  (21, 3, 1),
  (22, 4, 1),
  (23, 2, 1),
  (24, 5, 1),
  (25, 1, 1),
  (26, 5, 1),
  (27, 8, 1),
  (28, 9, 1),
  (29, 1, 1),
  (30, 1, 1),
  (31, 2, 1),
  (32, 10, 1),
  (33, 10, 1);

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

INSERT INTO `RolePerm` (`roleId`, `permId`) VALUES
  (6, 2),
  (6, 21),
  (6, 23),
  (6, 3),
  (6, 4),
  (6, 5),
  (6, 6),
  (6, 7),
  (6, 8),
  (6, 9),
  (6, 11),
  (6, 10),
  (6, 12),
  (6, 13),
  (6, 14),
  (6, 15),
  (6, 16),
  (6, 17),
  (6, 18),
  (6, 19),
  (6, 20),
  (6, 1),
  (6, 22),
  (6, 24),
  (6, 25),
  (1, 2),
  (1, 21),
  (1, 23),
  (1, 3),
  (1, 4),
  (1, 5),
  (1, 6),
  (1, 7),
  (1, 8),
  (1, 9),
  (1, 11),
  (1, 10),
  (1, 12),
  (1, 13),
  (1, 14),
  (1, 16),
  (1, 15),
  (1, 17),
  (1, 18),
  (1, 19),
  (1, 20),
  (1, 1),
  (1, 22),
  (1, 24),
  (1, 25),
  (1, 26),
  (2, 2),
  (2, 21),
  (2, 23),
  (2, 3),
  (2, 4),
  (2, 5),
  (2, 6),
  (2, 7),
  (2, 8),
  (2, 1),
  (2, 22),
  (2, 24),
  (2, 25),
  (2, 26),
  (4, 2),
  (4, 3),
  (4, 4),
  (4, 6),
  (4, 8),
  (5, 2),
  (5, 21),
  (5, 23),
  (5, 3),
  (5, 4),
  (5, 6),
  (5, 7),
  (5, 8),
  (5, 1),
  (5, 25),
  (3, 2),
  (3, 21),
  (3, 23),
  (3, 3),
  (3, 4),
  (3, 5),
  (3, 6),
  (3, 7),
  (3, 8),
  (3, 26);

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

INSERT INTO `Roles` (`roleId`, `roleName`) VALUES
  (1, 'Full Control'),
  (2, 'Single User'),
  (3, 'Principal'),
  (4, 'Teacher'),
  (5, 'Data Entry Operator'),
  (6, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `StaffID` varchar(5) NOT NULL,
  `EmployeeID` varchar(10) DEFAULT NULL,
  `NamewithInitials` varchar(60) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Race` int(11) DEFAULT NULL,
  `Religion` int(11) DEFAULT NULL,
  `CivilStatus` int(11) DEFAULT NULL,
  `NICNumber` varchar(10) DEFAULT NULL,
  `MailDeliveryAddress` varchar(100) DEFAULT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `DateAppointedastoPost` date DEFAULT NULL,
  `DateJoinedthisSchool` date DEFAULT NULL,
  `EmploymentStatus` int(11) DEFAULT NULL,
  `Medium` int(11) DEFAULT NULL,
  `Designation` int(11) DEFAULT NULL,
  `Section` int(11) DEFAULT NULL,
  `SubjectMostTaught` int(11) DEFAULT NULL,
  `SubjectSecondMostTaught` int(11) DEFAULT NULL,
  `ServiceGrade` int(11) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffID`),
  UNIQUE KEY `EmployeeID` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`StaffID`, `EmployeeID`, `NamewithInitials`, `DateofBirth`, `Gender`, `Race`, `Religion`, `CivilStatus`, `NICNumber`, `MailDeliveryAddress`, `ContactNumber`, `DateAppointedastoPost`, `DateJoinedthisSchool`, `EmploymentStatus`, `Medium`, `Designation`, `Section`, `SubjectMostTaught`, `SubjectSecondMostTaught`, `ServiceGrade`, `Salary`, `isDeleted`) VALUES
  ('1', NULL, 'Bihara De Silva', '2014-08-20', 2, 3, 1, 1, '923570039V', 'Nugegoda', '078569321', '2014-07-09', '2014-08-15', 3, 3, 7, 2, 3, 1, 1, 201, 0),
  ('10', NULL, 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '912587692V', 'kottawa', '0779320816', '2014-08-19', '2014-08-14', 1, 2, 7, 2, 2, 2, 0, 300, 0),
  ('11', '3', 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '0775087168', '2014-07-09', '2014-08-15', 3, 3, 7, 2, 3, 1, 0, 201, 0),
  ('12', NULL, 'Felony E.S.N.', '2014-08-20', 2, 3, 1, 1, '923570039V', 'Nugegodaa', '077885522', '2014-07-09', '2014-08-15', 3, 3, 7, 2, 3, 1, 1, 201, 0),
  ('13', NULL, 'Anthony Ashan', '1987-01-21', 1, 1, 2, 1, '123456789V', 'Negombo', '077777777', '2014-08-07', '2014-08-14', 1, 1, 7, 1, 2, 1, 1, 123, 0),
  ('14', NULL, 'Anthony P.D', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '077885522', '2014-07-09', '2014-08-15', 3, 3, 7, 2, 3, 1, 1, 201, 0),
  ('15', NULL, 'Sahan Malinga Tissera', '1993-02-02', 1, 1, 4, 1, '932470039V', 'Kollupitiya', '071262422', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 170, 0),
  ('16', NULL, 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '077653661', '2011-12-01', '2014-12-01', 1, 1, 7, 14, 3, 7, 4, 250, 0),
  ('17', NULL, 'Ashani G.H.L.N          ', '2014-09-03', 2, 4, 4, 4, '917894561v', '18/A Nawam Mawatha,Bellanwila', '078456123', '2014-09-30', '2014-09-30', 1, 1, 7, 8, 1, 1, 6, 330, 0),
  ('18', NULL, 'Devindi U.K.A.', '1987-06-23', 2, 1, 1, 1, '917894561v', '253/16/b Makola south,Makola', '011456239', '2012-08-17', '2014-09-04', 2, 1, 7, 3, 4, 2, 4, 150, 0),
  ('19', NULL, 'Prabuddhi D.V.M.', '1998-08-05', 2, 3, 3, 3, '923570039v', '13/M gangarama rd,kollupitiya', '077456321', '2014-09-03', '2014-09-10', 4, 3, 4, 4, 4, 4, 1, 280, 0),
  ('2', NULL, 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '912587692V', 'kottawa', '077932081', '2014-08-19', '2014-08-14', 1, 2, 7, 2, 2, 2, 0, 300, 0),
  ('20', NULL, 'Kavindi Weerakkodi', '1992-12-18', 2, 2, 2, 1, '123456789V', '85/a Dehiwala Rd, Dehiwala', '077456123', '2014-09-24', '2014-09-25', 2, 2, 7, 3, 2, 1, 1, 140, 0),
  ('21', NULL, 'Peiries M.S.E', '2014-09-03', 1, 3, 3, 3, '958964521V', '234/45 Galle rd,Wellawattha', '077489653', '2014-09-18', '2014-10-25', 1, 1, 7, 7, 3, 3, 3, 120, 0),
  ('22', NULL, 'Amarasinghe Bella', '1987-08-19', 2, 2, 2, 2, '874561239v', '56/A Mahara rd,Kadawatha', '011456789', '2014-09-03', '2014-09-04', 4, 3, 4, 4, 4, 4, 4, 220, 0),
  ('23', NULL, 'Samarakoon W.A', '2014-09-17', 2, 1, 1, 2, '896532147v', '54/k Kalubowila rd,Kalubowila', '077963214', '2014-08-20', '2014-09-03', 1, 2, 7, 20, 1, 2, 2, 185, 0),
  ('24', NULL, 'Rupasinghe Q.L', '2014-09-18', 2, 1, 1, 1, '945263879v', '89/B Mahara,Kadawatha', '071456239', '2014-09-25', '2014-09-11', 2, 2, 7, 20, 2, 2, 3, 180, 2),
  ('25', NULL, 'Samarasinghe V.V.M', '2003-01-11', 1, 1, 1, 4, '917894561V', '89/B Mahara,Kadawatha', '077489653', '2014-09-11', '2014-09-27', 3, 2, 3, 3, 3, 3, 3, 260, 0),
  ('26', NULL, 'Mendis M.Q.A', '2014-09-03', 2, 1, 1, 1, '896547891V', '59/Anuradapura Rd,Sigiriya', '011236547', '2014-09-03', '2014-09-03', 2, 2, 7, 1, 2, 2, 2, 280, 0),
  ('27', NULL, 'Dissanayake M..N', '2014-09-24', 2, 1, 3, 3, '936541278v', '64/shanthi mawatha,kiribathgoda', '011963247', '2014-09-03', '2014-09-03', 2, 2, 7, 2, 2, 2, 2, 235, 0),
  ('28', NULL, 'Perera T.M', '2014-09-03', 2, 3, 3, 2, '963214587v', '123/23/G Havelock rd,nugegoda', '011236589', '2014-09-10', '2014-09-27', 2, 2, 7, 2, 2, 2, 2, 450, 0),
  ('29', NULL, 'Fernando M.K.L.A', '2014-09-04', 2, 2, 2, 4, '923568741v', '123/23/G Havelock rd,nugegoda', '071456239', '2014-09-03', '2014-09-25', 2, 1, 7, 20, 2, 3, 2, 200, 2),
  ('3', NULL, 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '936257891V', 'narammala', '071456329', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 275, 0),
  ('30', NULL, 'Jayawardena Mahela', '2014-09-19', 1, 1, 1, 1, '887456321v', '56/A Mahara rd,Kadawatha', '011236589', '2014-09-02', '2014-09-18', 2, 2, 7, 2, 2, 2, 2, 200, 0),
  ('31', '', 'S. Padmanaban', '2014-09-16', 1, 1, 1, 1, '123456789V', 'asd', '123456789', '2014-09-02', '2014-09-23', 1, 1, 7, 1, 1, 1, 1, 123, 0),
  ('32', NULL, 'isuru A.N', '2014-10-02', 1, 1, 1, 1, '123456789v', 'makola', '011296232', '2014-10-09', '2014-10-09', 1, 1, 7, 1, 6, 2, 1, 200, 0),
  ('33', NULL, 'Dulip R.M', '2014-10-02', 2, 1, 1, 1, '123456789V', 'kottawa', '011296232', '2014-10-09', '2014-10-31', 1, 1, 7, 10, 1, 1, 1, 200, 0),
  ('34', '54885', 'Nicolas Flamel', '1988-01-02', 1, 5, 6, 4, '885474125v', 'Privet Drive', '055348330', '2014-12-18', '2014-12-18', 1, 3, 7, 4, 2, 2, NULL, 111, 0),
  ('4', '445', 'Madhusha Mendis', '2014-08-27', 1, 1, 1, 1, '936541278V', 'Moratuwa', '0712624225', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 224, 0),
  ('5', '2', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879V', 'kurunegala', '077508716', '2014-08-27', '2014-08-29', 2, 2, 7, 2, 2, 2, 2, 120, 0),
  ('6', NULL, 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '958964525V', 'wellawattha', '071456934', '2014-08-13', '2014-08-22', 5, 3, 7, 1, 1, 1, 1, 234, 0),
  ('7', NULL, 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745V', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 7, 1, 1, 1, 1, 100, 0),
  ('8', NULL, 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '012236598', '2014-07-09', '2014-08-15', 3, 3, 7, 2, 3, 1, 1, 201, 0),
  ('9', NULL, 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '456321845V', 'wellawattha', '011296875', '2014-08-20', '2014-08-29', 4, 3, 7, 6, 2, 2, 5, 450, 0);

-- --------------------------------------------------------

--
-- Table structure for table `StaffMain`
--

CREATE TABLE IF NOT EXISTS `StaffMain` (
  `StaffID` varchar(5) NOT NULL,
  `SignatureNo` varchar(10) DEFAULT NULL,
  `SerialNo` varchar(10) DEFAULT NULL,
  `PersonalFileNo` varchar(20) DEFAULT NULL,
  `NameWithInitials` varchar(60) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Section` int(11) DEFAULT NULL,
  `teacherRegisterNo` varchar(30) DEFAULT NULL,
  `NICNumber` varchar(10) DEFAULT NULL,
  `PermanentAddress` varchar(200) DEFAULT NULL,
  `WAndOPNo` varchar(20) DEFAULT NULL,
  `Service` int(11) DEFAULT NULL,
  `Grade` int(11) DEFAULT NULL,
  `NatureOfAppointment` varchar(40) DEFAULT NULL,
  `SubjectAppointed` varchar(40) DEFAULT NULL,
  `SubjectTeaching` varchar(40) DEFAULT NULL,
  `EducationQualifications` varchar(50) DEFAULT NULL,
  `ProfessionalQualifications` varchar(50) DEFAULT NULL,
  `Medium` int(11) DEFAULT NULL,
  `FirstAppointmentDate` date DEFAULT NULL,
  `Promotion1` date DEFAULT NULL,
  `Promotion2` date DEFAULT NULL,
  `Promotion3` date DEFAULT NULL,
  `Promotion4` date DEFAULT NULL,
  `Promotion5` date DEFAULT NULL,
  `IncrementDate` date DEFAULT NULL,
  `DutyAssumeDateToSchool` date DEFAULT NULL,
  `ContactMobile` varchar(15) DEFAULT NULL,
  `ContactResidence` varchar(15) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `DuePensionDate` date DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Race` int(11) DEFAULT NULL,
  `Religion` int(11) DEFAULT NULL,
  `CivilStatus` int(11) DEFAULT NULL,
  `EmploymentStatus` int(11) DEFAULT NULL,
  `Designation` int(11) DEFAULT NULL,
  `SubjectMostTaught` int(11) DEFAULT NULL,
  `SubjectSecondMostTaught` int(11) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StaffID`),
  UNIQUE KEY `EmployeeID` (`SignatureNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `StaffNo`
--

CREATE TABLE IF NOT EXISTS `StaffNo` (
  `staffID` varchar(5) NOT NULL,
  `staffNo` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`staffID`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StaffNo`
--

INSERT INTO `StaffNo` (`staffID`, `staffNo`, `year`) VALUES
  ('1', 12, 2012),
  ('1', 12, 2013),
  ('1', 12, 2014),
  ('10', 7, 2012),
  ('10', 7, 2013),
  ('10', 7, 2014),
  ('11', 1, 2012),
  ('11', 1, 2013),
  ('11', 1, 2014),
  ('12', 14, 2012),
  ('12', 14, 2013),
  ('12', 14, 2014),
  ('13', 9, 2012),
  ('13', 9, 2013),
  ('13', 9, 2014),
  ('14', 8, 2012),
  ('14', 8, 2013),
  ('14', 8, 2014),
  ('15', 18, 2012),
  ('15', 18, 2013),
  ('15', 18, 2014),
  ('16', 31, 2012),
  ('16', 33, 2013),
  ('16', 33, 2014),
  ('17', 27, 2012),
  ('17', 29, 2013),
  ('17', 29, 2014),
  ('18', 22, 2012),
  ('18', 22, 2013),
  ('18', 22, 2014),
  ('19', 5, 2012),
  ('19', 5, 2013),
  ('19', 5, 2014),
  ('2', 10, 2012),
  ('2', 10, 2013),
  ('2', 10, 2014),
  ('20', 25, 2012),
  ('20', 27, 2013),
  ('20', 27, 2014),
  ('21', 29, 2012),
  ('21', 31, 2013),
  ('21', 31, 2014),
  ('22', 4, 2012),
  ('22', 4, 2013),
  ('22', 4, 2014),
  ('23', 19, 2012),
  ('23', 19, 2013),
  ('23', 19, 2014),
  ('25', 2, 2012),
  ('25', 2, 2013),
  ('25', 2, 2014),
  ('26', 20, 2012),
  ('26', 20, 2013),
  ('26', 20, 2014),
  ('27', 21, 2012),
  ('27', 21, 2013),
  ('27', 21, 2014),
  ('28', 26, 2012),
  ('28', 28, 2013),
  ('28', 28, 2014),
  ('3', 3, 2012),
  ('3', 3, 2013),
  ('3', 3, 2014),
  ('30', 23, 2012),
  ('30', 24, 2013),
  ('30', 24, 2014),
  ('31', 24, 2012),
  ('31', 25, 2013),
  ('31', 25, 2014),
  ('32', 28, 2012),
  ('32', 30, 2013),
  ('32', 30, 2014),
  ('33', 30, 2012),
  ('33', 32, 2013),
  ('33', 32, 2014),
  ('34', 34, 2014),
  ('4', 6, 2012),
  ('4', 6, 2013),
  ('4', 6, 2014),
  ('5', 15, 2012),
  ('5', 15, 2013),
  ('5', 15, 2014),
  ('6', 13, 2012),
  ('6', 13, 2013),
  ('6', 13, 2014),
  ('7', 17, 2012),
  ('7', 17, 2013),
  ('7', 17, 2014),
  ('8', 11, 2012),
  ('8', 11, 2013),
  ('8', 11, 2014),
  ('9', 16, 2012),
  ('9', 16, 2013),
  ('9', 16, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE IF NOT EXISTS `Subject` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`Number`, `Name`) VALUES
  (1, 'Business Studies'),
  (2, 'Chemistry'),
  (3, 'English'),
  (4, 'History'),
  (5, 'Information Technology'),
  (6, 'Maths'),
  (7, 'Mechanics'),
  (8, 'Physics'),
  (9, 'Science'),
  (10, 'Sinhala');

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

INSERT INTO `Timetable` (`Grade`, `Class`, `Day`, `Position`, `Subject`, `StaffID`, `isDeleted`) VALUES
  (1, 'A', 0, 0, 'Science', '1', 0),
  (1, 'A', 0, 1, 'Science', '1', 0),
  (1, 'B', 0, 2, 'English', '1', 0),
  (NULL, NULL, 0, 3, NULL, '1', 0),
  (NULL, NULL, 0, 4, NULL, '1', 0),
  (NULL, NULL, 0, 5, NULL, '1', 0),
  (NULL, NULL, 0, 6, NULL, '1', 0),
  (NULL, NULL, 0, 7, NULL, '1', 0),
  (NULL, NULL, 1, 0, NULL, '1', 0),
  (NULL, NULL, 1, 1, NULL, '1', 0),
  (NULL, NULL, 1, 2, NULL, '1', 0),
  (NULL, NULL, 1, 3, NULL, '1', 0),
  (NULL, NULL, 1, 4, NULL, '1', 0),
  (NULL, NULL, 1, 5, NULL, '1', 0),
  (NULL, NULL, 1, 6, NULL, '1', 0),
  (NULL, NULL, 1, 7, NULL, '1', 0),
  (NULL, NULL, 2, 0, NULL, '1', 0),
  (NULL, NULL, 2, 1, NULL, '1', 0),
  (NULL, NULL, 2, 2, NULL, '1', 0),
  (NULL, NULL, 2, 3, NULL, '1', 0),
  (NULL, NULL, 2, 4, NULL, '1', 0),
  (NULL, NULL, 2, 5, NULL, '1', 0),
  (NULL, NULL, 2, 6, NULL, '1', 0),
  (NULL, NULL, 2, 7, NULL, '1', 0),
  (NULL, NULL, 3, 0, NULL, '1', 0),
  (NULL, NULL, 3, 1, NULL, '1', 0),
  (NULL, NULL, 3, 2, NULL, '1', 0),
  (NULL, NULL, 3, 3, NULL, '1', 0),
  (NULL, NULL, 3, 4, NULL, '1', 0),
  (NULL, NULL, 3, 5, NULL, '1', 0),
  (NULL, NULL, 3, 6, NULL, '1', 0),
  (NULL, NULL, 3, 7, NULL, '1', 0),
  (NULL, NULL, 4, 0, NULL, '1', 0),
  (NULL, NULL, 4, 1, NULL, '1', 0),
  (NULL, NULL, 4, 2, NULL, '1', 0),
  (NULL, NULL, 4, 3, NULL, '1', 0),
  (NULL, NULL, 4, 4, NULL, '1', 0),
  (NULL, NULL, 4, 5, NULL, '1', 0),
  (NULL, NULL, 4, 6, NULL, '1', 0),
  (NULL, NULL, 4, 7, NULL, '1', 0),
  (NULL, NULL, 0, 0, NULL, '10', 0),
  (NULL, NULL, 0, 1, NULL, '10', 0),
  (NULL, NULL, 0, 2, NULL, '10', 0),
  (NULL, NULL, 0, 3, NULL, '10', 0),
  (NULL, NULL, 0, 4, NULL, '10', 0),
  (NULL, NULL, 0, 5, NULL, '10', 0),
  (NULL, NULL, 0, 6, NULL, '10', 0),
  (NULL, NULL, 0, 7, NULL, '10', 0),
  (NULL, NULL, 1, 0, NULL, '10', 0),
  (NULL, NULL, 1, 1, NULL, '10', 0),
  (NULL, NULL, 1, 2, NULL, '10', 0),
  (NULL, NULL, 1, 3, NULL, '10', 0),
  (NULL, NULL, 1, 4, NULL, '10', 0),
  (NULL, NULL, 1, 5, NULL, '10', 0),
  (NULL, NULL, 1, 6, NULL, '10', 0),
  (NULL, NULL, 1, 7, NULL, '10', 0),
  (NULL, NULL, 2, 0, NULL, '10', 0),
  (NULL, NULL, 2, 1, NULL, '10', 0),
  (NULL, NULL, 2, 2, NULL, '10', 0),
  (NULL, NULL, 2, 3, NULL, '10', 0),
  (NULL, NULL, 2, 4, NULL, '10', 0),
  (NULL, NULL, 2, 5, NULL, '10', 0),
  (NULL, NULL, 2, 6, NULL, '10', 0),
  (NULL, NULL, 2, 7, NULL, '10', 0),
  (NULL, NULL, 3, 0, NULL, '10', 0),
  (NULL, NULL, 3, 1, NULL, '10', 0),
  (NULL, NULL, 3, 2, NULL, '10', 0),
  (NULL, NULL, 3, 3, NULL, '10', 0),
  (NULL, NULL, 3, 4, NULL, '10', 0),
  (NULL, NULL, 3, 5, NULL, '10', 0),
  (NULL, NULL, 3, 6, NULL, '10', 0),
  (NULL, NULL, 3, 7, NULL, '10', 0),
  (NULL, NULL, 4, 0, NULL, '10', 0),
  (NULL, NULL, 4, 1, NULL, '10', 0),
  (NULL, NULL, 4, 2, NULL, '10', 0),
  (NULL, NULL, 4, 3, NULL, '10', 0),
  (NULL, NULL, 4, 4, NULL, '10', 0),
  (NULL, NULL, 4, 5, NULL, '10', 0),
  (NULL, NULL, 4, 6, NULL, '10', 0),
  (NULL, NULL, 4, 7, NULL, '10', 0),
  (NULL, NULL, 0, 0, NULL, '11', 0),
  (NULL, NULL, 0, 1, NULL, '11', 0),
  (10, 'C', 0, 2, 'Business Studies', '11', 0),
  (10, 'B', 0, 3, 'Business Studies', '11', 0),
  (10, 'A', 0, 4, 'Business Studies', '11', 0),
  (NULL, NULL, 0, 5, NULL, '11', 0),
  (NULL, NULL, 0, 6, NULL, '11', 0),
  (NULL, NULL, 0, 7, NULL, '11', 0),
  (NULL, NULL, 1, 0, NULL, '11', 0),
  (NULL, NULL, 1, 1, NULL, '11', 0),
  (NULL, NULL, 1, 2, NULL, '11', 0),
  (NULL, NULL, 1, 3, NULL, '11', 0),
  (10, 'C', 1, 4, 'Business Studies', '11', 0),
  (NULL, NULL, 1, 5, NULL, '11', 0),
  (10, 'B', 1, 6, 'Business Studies', '11', 0),
  (NULL, NULL, 1, 7, NULL, '11', 0),
  (NULL, NULL, 2, 0, NULL, '11', 0),
  (10, 'B', 2, 1, 'Business Studies', '11', 0),
  (NULL, NULL, 2, 2, NULL, '11', 0),
  (NULL, NULL, 2, 3, NULL, '11', 0),
  (NULL, NULL, 2, 4, NULL, '11', 0),
  (NULL, NULL, 2, 5, NULL, '11', 0),
  (10, 'C', 2, 6, 'Business Studies', '11', 0),
  (10, 'A', 2, 7, 'Business Studies', '11', 0),
  (NULL, NULL, 3, 0, NULL, '11', 0),
  (NULL, NULL, 3, 1, NULL, '11', 0),
  (10, 'A', 3, 2, 'Business Studies', '11', 0),
  (10, 'A', 3, 3, 'Business Studies', '11', 0),
  (10, 'B', 3, 4, 'Business Studies', '11', 0),
  (NULL, NULL, 3, 5, NULL, '11', 0),
  (NULL, NULL, 3, 6, NULL, '11', 0),
  (NULL, NULL, 3, 7, NULL, '11', 0),
  (NULL, NULL, 4, 0, NULL, '11', 0),
  (10, 'C', 4, 1, 'Business Studies', '11', 0),
  (10, 'C', 4, 2, 'Business Studies', '11', 0),
  (10, 'B', 4, 3, 'Business Studies', '11', 0),
  (NULL, NULL, 4, 4, NULL, '11', 0),
  (10, 'A', 4, 5, 'Business Studies', '11', 0),
  (NULL, NULL, 4, 6, NULL, '11', 0),
  (NULL, NULL, 4, 7, NULL, '11', 0),
  (NULL, NULL, 0, 0, NULL, '12', 0),
  (NULL, NULL, 0, 1, NULL, '12', 0),
  (NULL, NULL, 0, 2, NULL, '12', 0),
  (NULL, NULL, 0, 3, NULL, '12', 0),
  (NULL, NULL, 0, 4, NULL, '12', 0),
  (NULL, NULL, 0, 5, NULL, '12', 0),
  (NULL, NULL, 0, 6, NULL, '12', 0),
  (NULL, NULL, 0, 7, NULL, '12', 0),
  (NULL, NULL, 1, 0, NULL, '12', 0),
  (NULL, NULL, 1, 1, NULL, '12', 0),
  (NULL, NULL, 1, 2, NULL, '12', 0),
  (NULL, NULL, 1, 3, NULL, '12', 0),
  (NULL, NULL, 1, 4, NULL, '12', 0),
  (NULL, NULL, 1, 5, NULL, '12', 0),
  (NULL, NULL, 1, 6, NULL, '12', 0),
  (NULL, NULL, 1, 7, NULL, '12', 0),
  (NULL, NULL, 2, 0, NULL, '12', 0),
  (NULL, NULL, 2, 1, NULL, '12', 0),
  (NULL, NULL, 2, 2, NULL, '12', 0),
  (NULL, NULL, 2, 3, NULL, '12', 0),
  (NULL, NULL, 2, 4, NULL, '12', 0),
  (NULL, NULL, 2, 5, NULL, '12', 0),
  (NULL, NULL, 2, 6, NULL, '12', 0),
  (NULL, NULL, 2, 7, NULL, '12', 0),
  (NULL, NULL, 3, 0, NULL, '12', 0),
  (NULL, NULL, 3, 1, NULL, '12', 0),
  (NULL, NULL, 3, 2, NULL, '12', 0),
  (NULL, NULL, 3, 3, NULL, '12', 0),
  (NULL, NULL, 3, 4, NULL, '12', 0),
  (NULL, NULL, 3, 5, NULL, '12', 0),
  (NULL, NULL, 3, 6, NULL, '12', 0),
  (NULL, NULL, 3, 7, NULL, '12', 0),
  (NULL, NULL, 4, 0, NULL, '12', 0),
  (NULL, NULL, 4, 1, NULL, '12', 0),
  (NULL, NULL, 4, 2, NULL, '12', 0),
  (NULL, NULL, 4, 3, NULL, '12', 0),
  (NULL, NULL, 4, 4, NULL, '12', 0),
  (NULL, NULL, 4, 5, NULL, '12', 0),
  (NULL, NULL, 4, 6, NULL, '12', 0),
  (NULL, NULL, 4, 7, NULL, '12', 0),
  (11, 'B', 0, 0, 'Physics', '13', 0),
  (11, 'B', 0, 1, 'Biology', '13', 0),
  (11, 'B', 0, 2, 'Biology', '13', 0),
  (11, 'B', 0, 3, 'Biology', '13', 0),
  (11, 'B', 0, 4, 'Biology', '13', 0),
  (11, 'B', 0, 5, 'Biology', '13', 0),
  (NULL, NULL, 0, 6, NULL, '13', 0),
  (NULL, NULL, 0, 7, NULL, '13', 0),
  (11, 'B', 1, 0, 'Biology', '13', 0),
  (11, 'B', 1, 1, 'Biology', '13', 0),
  (NULL, NULL, 1, 2, NULL, '13', 0),
  (NULL, NULL, 1, 3, NULL, '13', 0),
  (NULL, NULL, 1, 4, NULL, '13', 0),
  (11, 'B', 1, 5, 'Biology', '13', 0),
  (11, 'B', 1, 6, 'Biology', '13', 0),
  (11, 'B', 1, 7, 'Biology', '13', 0),
  (NULL, NULL, 2, 0, NULL, '13', 0),
  (NULL, NULL, 2, 1, NULL, '13', 0),
  (11, 'B', 2, 2, 'Biology', '13', 0),
  (11, 'B', 2, 3, 'Biology', '13', 0),
  (NULL, NULL, 2, 4, NULL, '13', 0),
  (NULL, NULL, 2, 5, NULL, '13', 0),
  (NULL, NULL, 2, 6, NULL, '13', 0),
  (NULL, NULL, 2, 7, NULL, '13', 0),
  (NULL, NULL, 3, 0, NULL, '13', 0),
  (NULL, NULL, 3, 1, NULL, '13', 0),
  (NULL, NULL, 3, 2, NULL, '13', 0),
  (11, 'B', 3, 3, 'Biology', '13', 0),
  (11, 'B', 3, 4, 'Biology', '13', 0),
  (11, 'B', 3, 5, 'Biology', '13', 0),
  (NULL, NULL, 3, 6, NULL, '13', 0),
  (NULL, NULL, 3, 7, NULL, '13', 0),
  (NULL, NULL, 4, 0, NULL, '13', 0),
  (11, 'B', 4, 1, 'Biology', '13', 0),
  (11, 'B', 4, 2, 'Biology', '13', 0),
  (NULL, NULL, 4, 3, NULL, '13', 0),
  (11, 'B', 4, 4, 'Biology', '13', 0),
  (NULL, NULL, 4, 5, NULL, '13', 0),
  (NULL, NULL, 4, 6, NULL, '13', 0),
  (NULL, NULL, 4, 7, NULL, '13', 0),
  (NULL, NULL, 0, 0, NULL, '14', 0),
  (NULL, NULL, 0, 1, NULL, '14', 0),
  (11, 'C', 0, 2, 'Chemistry', '14', 0),
  (11, 'C', 0, 3, 'Chemistry', '14', 0),
  (11, 'A', 0, 4, 'Chemistry', '14', 0),
  (11, 'A', 0, 5, 'Chemistry', '14', 0),
  (NULL, NULL, 0, 6, NULL, '14', 0),
  (NULL, NULL, 0, 7, NULL, '14', 0),
  (NULL, NULL, 1, 0, NULL, '14', 0),
  (11, 'B', 1, 1, 'Chemistry', '14', 0),
  (11, 'B', 1, 2, 'Chemistry', '14', 0),
  (NULL, NULL, 1, 3, NULL, '14', 0),
  (NULL, NULL, 1, 4, NULL, '14', 0),
  (NULL, NULL, 1, 5, NULL, '14', 0),
  (11, 'C', 1, 6, 'Chemistry', '14', 0),
  (11, 'C', 1, 7, 'Chemistry', '14', 0),
  (11, 'A', 2, 0, 'Chemistry', '14', 0),
  (11, 'A', 2, 1, 'Chemistry', '14', 0),
  (NULL, NULL, 2, 2, NULL, '14', 0),
  (NULL, NULL, 2, 3, NULL, '14', 0),
  (11, 'B', 2, 4, 'Chemistry', '14', 0),
  (11, 'B', 2, 5, 'Chemistry', '14', 0),
  (NULL, NULL, 2, 6, NULL, '14', 0),
  (NULL, NULL, 2, 7, NULL, '14', 0),
  (11, 'B', 3, 0, 'Chemistry', '14', 0),
  (11, 'B', 3, 1, 'Chemistry', '14', 0),
  (11, 'A', 3, 2, 'Chemistry', '14', 0),
  (11, 'A', 3, 3, 'Chemistry', '14', 0),
  (NULL, NULL, 3, 4, NULL, '14', 0),
  (NULL, NULL, 3, 5, NULL, '14', 0),
  (NULL, NULL, 3, 6, NULL, '14', 0),
  (NULL, NULL, 3, 7, NULL, '14', 0),
  (11, 'C', 4, 0, 'Chemistry', '14', 0),
  (11, 'C', 4, 1, 'Chemistry', '14', 0),
  (NULL, NULL, 4, 2, NULL, '14', 0),
  (NULL, NULL, 4, 3, NULL, '14', 0),
  (NULL, NULL, 4, 4, NULL, '14', 0),
  (NULL, NULL, 4, 5, NULL, '14', 0),
  (NULL, NULL, 4, 6, NULL, '14', 0),
  (NULL, NULL, 4, 7, NULL, '14', 0),
  (NULL, NULL, 0, 0, NULL, '15', 0),
  (NULL, NULL, 0, 1, NULL, '15', 0),
  (NULL, NULL, 0, 2, NULL, '15', 0),
  (NULL, NULL, 0, 3, NULL, '15', 0),
  (NULL, NULL, 0, 4, NULL, '15', 0),
  (NULL, NULL, 0, 5, NULL, '15', 0),
  (NULL, NULL, 0, 6, NULL, '15', 0),
  (NULL, NULL, 0, 7, NULL, '15', 0),
  (NULL, NULL, 1, 0, NULL, '15', 0),
  (NULL, NULL, 1, 1, NULL, '15', 0),
  (NULL, NULL, 1, 2, NULL, '15', 0),
  (NULL, NULL, 1, 3, NULL, '15', 0),
  (NULL, NULL, 1, 4, NULL, '15', 0),
  (NULL, NULL, 1, 5, NULL, '15', 0),
  (NULL, NULL, 1, 6, NULL, '15', 0),
  (NULL, NULL, 1, 7, NULL, '15', 0),
  (NULL, NULL, 2, 0, NULL, '15', 0),
  (NULL, NULL, 2, 1, NULL, '15', 0),
  (NULL, NULL, 2, 2, NULL, '15', 0),
  (NULL, NULL, 2, 3, NULL, '15', 0),
  (NULL, NULL, 2, 4, NULL, '15', 0),
  (NULL, NULL, 2, 5, NULL, '15', 0),
  (NULL, NULL, 2, 6, NULL, '15', 0),
  (NULL, NULL, 2, 7, NULL, '15', 0),
  (NULL, NULL, 3, 0, NULL, '15', 0),
  (NULL, NULL, 3, 1, NULL, '15', 0),
  (NULL, NULL, 3, 2, NULL, '15', 0),
  (NULL, NULL, 3, 3, NULL, '15', 0),
  (NULL, NULL, 3, 4, NULL, '15', 0),
  (NULL, NULL, 3, 5, NULL, '15', 0),
  (NULL, NULL, 3, 6, NULL, '15', 0),
  (NULL, NULL, 3, 7, NULL, '15', 0),
  (NULL, NULL, 4, 0, NULL, '15', 0),
  (NULL, NULL, 4, 1, NULL, '15', 0),
  (NULL, NULL, 4, 2, NULL, '15', 0),
  (NULL, NULL, 4, 3, NULL, '15', 0),
  (NULL, NULL, 4, 4, NULL, '15', 0),
  (NULL, NULL, 4, 5, NULL, '15', 0),
  (NULL, NULL, 4, 6, NULL, '15', 0),
  (NULL, NULL, 4, 7, NULL, '15', 0),
  (NULL, NULL, 0, 0, NULL, '16', 0),
  (NULL, NULL, 0, 1, NULL, '16', 0),
  (NULL, NULL, 0, 2, NULL, '16', 0),
  (NULL, NULL, 0, 3, NULL, '16', 0),
  (NULL, NULL, 0, 4, NULL, '16', 0),
  (NULL, NULL, 0, 5, NULL, '16', 0),
  (NULL, NULL, 0, 6, NULL, '16', 0),
  (NULL, NULL, 0, 7, NULL, '16', 0),
  (NULL, NULL, 1, 0, NULL, '16', 0),
  (NULL, NULL, 1, 1, NULL, '16', 0),
  (NULL, NULL, 1, 2, NULL, '16', 0),
  (NULL, NULL, 1, 3, NULL, '16', 0),
  (NULL, NULL, 1, 4, NULL, '16', 0),
  (NULL, NULL, 1, 5, NULL, '16', 0),
  (NULL, NULL, 1, 6, NULL, '16', 0),
  (NULL, NULL, 1, 7, NULL, '16', 0),
  (NULL, NULL, 2, 0, NULL, '16', 0),
  (NULL, NULL, 2, 1, NULL, '16', 0),
  (NULL, NULL, 2, 2, NULL, '16', 0),
  (NULL, NULL, 2, 3, NULL, '16', 0),
  (NULL, NULL, 2, 4, NULL, '16', 0),
  (NULL, NULL, 2, 5, NULL, '16', 0),
  (NULL, NULL, 2, 6, NULL, '16', 0),
  (NULL, NULL, 2, 7, NULL, '16', 0),
  (NULL, NULL, 3, 0, NULL, '16', 0),
  (NULL, NULL, 3, 1, NULL, '16', 0),
  (NULL, NULL, 3, 2, NULL, '16', 0),
  (NULL, NULL, 3, 3, NULL, '16', 0),
  (NULL, NULL, 3, 4, NULL, '16', 0),
  (NULL, NULL, 3, 5, NULL, '16', 0),
  (NULL, NULL, 3, 6, NULL, '16', 0),
  (NULL, NULL, 3, 7, NULL, '16', 0),
  (NULL, NULL, 4, 0, NULL, '16', 0),
  (NULL, NULL, 4, 1, NULL, '16', 0),
  (NULL, NULL, 4, 2, NULL, '16', 0),
  (NULL, NULL, 4, 3, NULL, '16', 0),
  (NULL, NULL, 4, 4, NULL, '16', 0),
  (NULL, NULL, 4, 5, NULL, '16', 0),
  (NULL, NULL, 4, 6, NULL, '16', 0),
  (NULL, NULL, 4, 7, NULL, '16', 0),
  (NULL, NULL, 0, 0, NULL, '19', 0),
  (NULL, NULL, 0, 1, NULL, '19', 0),
  (NULL, NULL, 0, 2, NULL, '19', 0),
  (NULL, NULL, 0, 3, NULL, '19', 0),
  (NULL, NULL, 0, 4, NULL, '19', 0),
  (NULL, NULL, 0, 5, NULL, '19', 0),
  (NULL, NULL, 0, 6, NULL, '19', 0),
  (NULL, NULL, 0, 7, NULL, '19', 0),
  (NULL, NULL, 1, 0, NULL, '19', 0),
  (NULL, NULL, 1, 1, NULL, '19', 0),
  (NULL, NULL, 1, 2, NULL, '19', 0),
  (NULL, NULL, 1, 3, NULL, '19', 0),
  (NULL, NULL, 1, 4, NULL, '19', 0),
  (NULL, NULL, 1, 5, NULL, '19', 0),
  (NULL, NULL, 1, 6, NULL, '19', 0),
  (NULL, NULL, 1, 7, NULL, '19', 0),
  (NULL, NULL, 2, 0, NULL, '19', 0),
  (NULL, NULL, 2, 1, NULL, '19', 0),
  (NULL, NULL, 2, 2, NULL, '19', 0),
  (NULL, NULL, 2, 3, NULL, '19', 0),
  (NULL, NULL, 2, 4, NULL, '19', 0),
  (NULL, NULL, 2, 5, NULL, '19', 0),
  (NULL, NULL, 2, 6, NULL, '19', 0),
  (NULL, NULL, 2, 7, NULL, '19', 0),
  (NULL, NULL, 3, 0, NULL, '19', 0),
  (NULL, NULL, 3, 1, NULL, '19', 0),
  (NULL, NULL, 3, 2, NULL, '19', 0),
  (NULL, NULL, 3, 3, NULL, '19', 0),
  (NULL, NULL, 3, 4, NULL, '19', 0),
  (NULL, NULL, 3, 5, NULL, '19', 0),
  (NULL, NULL, 3, 6, NULL, '19', 0),
  (NULL, NULL, 3, 7, NULL, '19', 0),
  (NULL, NULL, 4, 0, NULL, '19', 0),
  (NULL, NULL, 4, 1, NULL, '19', 0),
  (NULL, NULL, 4, 2, NULL, '19', 0),
  (NULL, NULL, 4, 3, NULL, '19', 0),
  (NULL, NULL, 4, 4, NULL, '19', 0),
  (NULL, NULL, 4, 5, NULL, '19', 0),
  (NULL, NULL, 4, 6, NULL, '19', 0),
  (NULL, NULL, 4, 7, NULL, '19', 0),
  (10, 'A', 0, 0, 'Maths', '2', 2),
  (10, 'A', 0, 1, 'Maths', '2', 2),
  (NULL, NULL, 0, 2, NULL, '2', 2),
  (NULL, NULL, 0, 3, NULL, '2', 2),
  (10, 'C', 0, 4, 'Maths', '2', 2),
  (10, 'C', 0, 5, 'Maths', '2', 2),
  (10, 'B', 0, 6, 'Maths', '2', 2),
  (NULL, NULL, 0, 7, NULL, '2', 2),
  (10, 'A', 1, 0, 'Maths', '2', 2),
  (10, 'C', 1, 1, 'Maths', '2', 2),
  (NULL, NULL, 1, 2, NULL, '2', 2),
  (NULL, NULL, 1, 3, NULL, '2', 2),
  (10, 'B', 1, 4, 'Maths', '2', 2),
  (NULL, NULL, 1, 5, NULL, '2', 2),
  (NULL, NULL, 1, 6, NULL, '2', 2),
  (NULL, NULL, 1, 7, NULL, '2', 2),
  (10, 'A', 2, 0, 'Maths', '2', 2),
  (NULL, NULL, 2, 1, NULL, '2', 2),
  (NULL, NULL, 2, 2, NULL, '2', 2),
  (10, 'B', 2, 3, 'Maths', '2', 2),
  (NULL, NULL, 2, 4, NULL, '2', 2),
  (10, 'C', 2, 5, 'Maths', '2', 2),
  (NULL, NULL, 2, 6, NULL, '2', 2),
  (NULL, NULL, 2, 7, NULL, '2', 2),
  (10, 'A', 3, 0, 'Maths', '2', 2),
  (NULL, NULL, 3, 1, NULL, '2', 2),
  (10, 'B', 3, 2, 'Maths', '2', 2),
  (10, 'B', 3, 3, 'Maths', '2', 2),
  (10, 'C', 3, 4, 'Maths', '2', 2),
  (NULL, NULL, 3, 5, NULL, '2', 2),
  (NULL, NULL, 3, 6, NULL, '2', 2),
  (NULL, NULL, 3, 7, NULL, '2', 2),
  (10, 'A', 4, 0, 'Maths', '2', 2),
  (NULL, NULL, 4, 1, NULL, '2', 2),
  (NULL, NULL, 4, 2, NULL, '2', 2),
  (NULL, NULL, 4, 3, NULL, '2', 2),
  (10, 'C', 4, 4, 'Maths', '2', 2),
  (NULL, NULL, 4, 5, NULL, '2', 2),
  (NULL, NULL, 4, 6, NULL, '2', 2),
  (10, 'B', 4, 7, 'Maths', '2', 2),
  (NULL, NULL, 0, 0, NULL, '22', 0),
  (NULL, NULL, 0, 1, NULL, '22', 0),
  (NULL, NULL, 0, 2, NULL, '22', 0),
  (NULL, NULL, 0, 3, NULL, '22', 0),
  (NULL, NULL, 0, 4, NULL, '22', 0),
  (NULL, NULL, 0, 5, NULL, '22', 0),
  (NULL, NULL, 0, 6, NULL, '22', 0),
  (NULL, NULL, 0, 7, NULL, '22', 0),
  (NULL, NULL, 1, 0, NULL, '22', 0),
  (NULL, NULL, 1, 1, NULL, '22', 0),
  (NULL, NULL, 1, 2, NULL, '22', 0),
  (NULL, NULL, 1, 3, NULL, '22', 0),
  (NULL, NULL, 1, 4, NULL, '22', 0),
  (NULL, NULL, 1, 5, NULL, '22', 0),
  (NULL, NULL, 1, 6, NULL, '22', 0),
  (NULL, NULL, 1, 7, NULL, '22', 0),
  (NULL, NULL, 2, 0, NULL, '22', 0),
  (NULL, NULL, 2, 1, NULL, '22', 0),
  (NULL, NULL, 2, 2, NULL, '22', 0),
  (NULL, NULL, 2, 3, NULL, '22', 0),
  (NULL, NULL, 2, 4, NULL, '22', 0),
  (NULL, NULL, 2, 5, NULL, '22', 0),
  (NULL, NULL, 2, 6, NULL, '22', 0),
  (NULL, NULL, 2, 7, NULL, '22', 0),
  (NULL, NULL, 3, 0, NULL, '22', 0),
  (NULL, NULL, 3, 1, NULL, '22', 0),
  (NULL, NULL, 3, 2, NULL, '22', 0),
  (NULL, NULL, 3, 3, NULL, '22', 0),
  (NULL, NULL, 3, 4, NULL, '22', 0),
  (NULL, NULL, 3, 5, NULL, '22', 0),
  (NULL, NULL, 3, 6, NULL, '22', 0),
  (NULL, NULL, 3, 7, NULL, '22', 0),
  (NULL, NULL, 4, 0, NULL, '22', 0),
  (NULL, NULL, 4, 1, NULL, '22', 0),
  (NULL, NULL, 4, 2, NULL, '22', 0),
  (NULL, NULL, 4, 3, NULL, '22', 0),
  (NULL, NULL, 4, 4, NULL, '22', 0),
  (NULL, NULL, 4, 5, NULL, '22', 0),
  (NULL, NULL, 4, 6, NULL, '22', 0),
  (NULL, NULL, 4, 7, NULL, '22', 0),
  (NULL, NULL, 0, 0, NULL, '23', 0),
  (NULL, NULL, 0, 1, NULL, '23', 0),
  (NULL, NULL, 0, 2, NULL, '23', 0),
  (NULL, NULL, 0, 3, NULL, '23', 0),
  (NULL, NULL, 0, 4, NULL, '23', 0),
  (NULL, NULL, 0, 5, NULL, '23', 0),
  (NULL, NULL, 0, 6, NULL, '23', 0),
  (NULL, NULL, 0, 7, NULL, '23', 0),
  (NULL, NULL, 1, 0, NULL, '23', 0),
  (NULL, NULL, 1, 1, NULL, '23', 0),
  (NULL, NULL, 1, 2, NULL, '23', 0),
  (NULL, NULL, 1, 3, NULL, '23', 0),
  (NULL, NULL, 1, 4, NULL, '23', 0),
  (NULL, NULL, 1, 5, NULL, '23', 0),
  (NULL, NULL, 1, 6, NULL, '23', 0),
  (NULL, NULL, 1, 7, NULL, '23', 0),
  (NULL, NULL, 2, 0, NULL, '23', 0),
  (NULL, NULL, 2, 1, NULL, '23', 0),
  (NULL, NULL, 2, 2, NULL, '23', 0),
  (NULL, NULL, 2, 3, NULL, '23', 0),
  (NULL, NULL, 2, 4, NULL, '23', 0),
  (NULL, NULL, 2, 5, NULL, '23', 0),
  (NULL, NULL, 2, 6, NULL, '23', 0),
  (NULL, NULL, 2, 7, NULL, '23', 0),
  (NULL, NULL, 3, 0, NULL, '23', 0),
  (NULL, NULL, 3, 1, NULL, '23', 0),
  (NULL, NULL, 3, 2, NULL, '23', 0),
  (NULL, NULL, 3, 3, NULL, '23', 0),
  (NULL, NULL, 3, 4, NULL, '23', 0),
  (NULL, NULL, 3, 5, NULL, '23', 0),
  (NULL, NULL, 3, 6, NULL, '23', 0),
  (NULL, NULL, 3, 7, NULL, '23', 0),
  (NULL, NULL, 4, 0, NULL, '23', 0),
  (NULL, NULL, 4, 1, NULL, '23', 0),
  (NULL, NULL, 4, 2, NULL, '23', 0),
  (NULL, NULL, 4, 3, NULL, '23', 0),
  (NULL, NULL, 4, 4, NULL, '23', 0),
  (NULL, NULL, 4, 5, NULL, '23', 0),
  (NULL, NULL, 4, 6, NULL, '23', 0),
  (NULL, NULL, 4, 7, NULL, '23', 0),
  (NULL, NULL, 0, 0, NULL, '24', 0),
  (NULL, NULL, 0, 1, NULL, '24', 0),
  (NULL, NULL, 0, 2, NULL, '24', 0),
  (NULL, NULL, 0, 3, NULL, '24', 0),
  (NULL, NULL, 0, 4, NULL, '24', 0),
  (NULL, NULL, 0, 5, NULL, '24', 0),
  (NULL, NULL, 0, 6, NULL, '24', 0),
  (NULL, NULL, 0, 7, NULL, '24', 0),
  (NULL, NULL, 1, 0, NULL, '24', 0),
  (NULL, NULL, 1, 1, NULL, '24', 0),
  (NULL, NULL, 1, 2, NULL, '24', 0),
  (NULL, NULL, 1, 3, NULL, '24', 0),
  (NULL, NULL, 1, 4, NULL, '24', 0),
  (NULL, NULL, 1, 5, NULL, '24', 0),
  (NULL, NULL, 1, 6, NULL, '24', 0),
  (NULL, NULL, 1, 7, NULL, '24', 0),
  (NULL, NULL, 2, 0, NULL, '24', 0),
  (NULL, NULL, 2, 1, NULL, '24', 0),
  (NULL, NULL, 2, 2, NULL, '24', 0),
  (NULL, NULL, 2, 3, NULL, '24', 0),
  (NULL, NULL, 2, 4, NULL, '24', 0),
  (NULL, NULL, 2, 5, NULL, '24', 0),
  (NULL, NULL, 2, 6, NULL, '24', 0),
  (NULL, NULL, 2, 7, NULL, '24', 0),
  (NULL, NULL, 3, 0, NULL, '24', 0),
  (NULL, NULL, 3, 1, NULL, '24', 0),
  (NULL, NULL, 3, 2, NULL, '24', 0),
  (NULL, NULL, 3, 3, NULL, '24', 0),
  (NULL, NULL, 3, 4, NULL, '24', 0),
  (NULL, NULL, 3, 5, NULL, '24', 0),
  (NULL, NULL, 3, 6, NULL, '24', 0),
  (NULL, NULL, 3, 7, NULL, '24', 0),
  (NULL, NULL, 4, 0, NULL, '24', 0),
  (NULL, NULL, 4, 1, NULL, '24', 0),
  (NULL, NULL, 4, 2, NULL, '24', 0),
  (NULL, NULL, 4, 3, NULL, '24', 0),
  (NULL, NULL, 4, 4, NULL, '24', 0),
  (NULL, NULL, 4, 5, NULL, '24', 0),
  (NULL, NULL, 4, 6, NULL, '24', 0),
  (NULL, NULL, 4, 7, NULL, '24', 0),
  (NULL, NULL, 0, 0, NULL, '25', 0),
  (NULL, NULL, 0, 1, NULL, '25', 0),
  (NULL, NULL, 0, 2, NULL, '25', 0),
  (NULL, NULL, 0, 3, NULL, '25', 0),
  (NULL, NULL, 0, 4, NULL, '25', 0),
  (NULL, NULL, 0, 5, NULL, '25', 0),
  (NULL, NULL, 0, 6, NULL, '25', 0),
  (NULL, NULL, 0, 7, NULL, '25', 0),
  (NULL, NULL, 1, 0, NULL, '25', 0),
  (NULL, NULL, 1, 1, NULL, '25', 0),
  (NULL, NULL, 1, 2, NULL, '25', 0),
  (NULL, NULL, 1, 3, NULL, '25', 0),
  (NULL, NULL, 1, 4, NULL, '25', 0),
  (NULL, NULL, 1, 5, NULL, '25', 0),
  (NULL, NULL, 1, 6, NULL, '25', 0),
  (NULL, NULL, 1, 7, NULL, '25', 0),
  (NULL, NULL, 2, 0, NULL, '25', 0),
  (NULL, NULL, 2, 1, NULL, '25', 0),
  (NULL, NULL, 2, 2, NULL, '25', 0),
  (NULL, NULL, 2, 3, NULL, '25', 0),
  (NULL, NULL, 2, 4, NULL, '25', 0),
  (NULL, NULL, 2, 5, NULL, '25', 0),
  (NULL, NULL, 2, 6, NULL, '25', 0),
  (NULL, NULL, 2, 7, NULL, '25', 0),
  (NULL, NULL, 3, 0, NULL, '25', 0),
  (NULL, NULL, 3, 1, NULL, '25', 0),
  (NULL, NULL, 3, 2, NULL, '25', 0),
  (NULL, NULL, 3, 3, NULL, '25', 0),
  (NULL, NULL, 3, 4, NULL, '25', 0),
  (NULL, NULL, 3, 5, NULL, '25', 0),
  (NULL, NULL, 3, 6, NULL, '25', 0),
  (NULL, NULL, 3, 7, NULL, '25', 0),
  (NULL, NULL, 4, 0, NULL, '25', 0),
  (NULL, NULL, 4, 1, NULL, '25', 0),
  (NULL, NULL, 4, 2, NULL, '25', 0),
  (NULL, NULL, 4, 3, NULL, '25', 0),
  (NULL, NULL, 4, 4, NULL, '25', 0),
  (NULL, NULL, 4, 5, NULL, '25', 0),
  (NULL, NULL, 4, 6, NULL, '25', 0),
  (NULL, NULL, 4, 7, NULL, '25', 0),
  (NULL, NULL, 0, 0, NULL, '29', 0),
  (NULL, NULL, 0, 1, NULL, '29', 0),
  (NULL, NULL, 0, 2, NULL, '29', 0),
  (NULL, NULL, 0, 3, NULL, '29', 0),
  (NULL, NULL, 0, 4, NULL, '29', 0),
  (NULL, NULL, 0, 5, NULL, '29', 0),
  (NULL, NULL, 0, 6, NULL, '29', 0),
  (NULL, NULL, 0, 7, NULL, '29', 0),
  (NULL, NULL, 1, 0, NULL, '29', 0),
  (NULL, NULL, 1, 1, NULL, '29', 0),
  (NULL, NULL, 1, 2, NULL, '29', 0),
  (NULL, NULL, 1, 3, NULL, '29', 0),
  (NULL, NULL, 1, 4, NULL, '29', 0),
  (NULL, NULL, 1, 5, NULL, '29', 0),
  (NULL, NULL, 1, 6, NULL, '29', 0),
  (NULL, NULL, 1, 7, NULL, '29', 0),
  (NULL, NULL, 2, 0, NULL, '29', 0),
  (NULL, NULL, 2, 1, NULL, '29', 0),
  (NULL, NULL, 2, 2, NULL, '29', 0),
  (NULL, NULL, 2, 3, NULL, '29', 0),
  (NULL, NULL, 2, 4, NULL, '29', 0),
  (NULL, NULL, 2, 5, NULL, '29', 0),
  (NULL, NULL, 2, 6, NULL, '29', 0),
  (NULL, NULL, 2, 7, NULL, '29', 0),
  (NULL, NULL, 3, 0, NULL, '29', 0),
  (NULL, NULL, 3, 1, NULL, '29', 0),
  (NULL, NULL, 3, 2, NULL, '29', 0),
  (NULL, NULL, 3, 3, NULL, '29', 0),
  (NULL, NULL, 3, 4, NULL, '29', 0),
  (NULL, NULL, 3, 5, NULL, '29', 0),
  (NULL, NULL, 3, 6, NULL, '29', 0),
  (NULL, NULL, 3, 7, NULL, '29', 0),
  (NULL, NULL, 4, 0, NULL, '29', 0),
  (NULL, NULL, 4, 1, NULL, '29', 0),
  (NULL, NULL, 4, 2, NULL, '29', 0),
  (NULL, NULL, 4, 3, NULL, '29', 0),
  (NULL, NULL, 4, 4, NULL, '29', 0),
  (NULL, NULL, 4, 5, NULL, '29', 0),
  (NULL, NULL, 4, 6, NULL, '29', 0),
  (NULL, NULL, 4, 7, NULL, '29', 0),
  (10, 'B', 0, 0, 'Sinhala', '3', 2),
  (NULL, NULL, 0, 1, NULL, '3', 2),
  (10, 'A', 0, 2, 'Sinhala', '3', 2),
  (10, 'C', 0, 3, 'Sinhala', '3', 2),
  (NULL, NULL, 0, 4, NULL, '3', 2),
  (NULL, NULL, 0, 5, NULL, '3', 2),
  (NULL, NULL, 0, 6, NULL, '3', 2),
  (NULL, NULL, 0, 7, NULL, '3', 2),
  (10, 'B', 1, 0, 'Sinhala', '3', 2),
  (10, 'B', 1, 1, 'Business Studies', '3', 2),
  (NULL, NULL, 1, 2, NULL, '3', 2),
  (NULL, NULL, 1, 3, NULL, '3', 2),
  (NULL, NULL, 1, 4, NULL, '3', 2),
  (10, 'C', 1, 5, 'Sinhala', '3', 2),
  (NULL, NULL, 1, 6, NULL, '3', 2),
  (10, 'A', 1, 7, 'Sinhala', '3', 2),
  (10, 'B', 2, 0, 'Sinhala', '3', 2),
  (10, 'B', 2, 1, 'Business Studies', '3', 2),
  (NULL, NULL, 2, 2, NULL, '3', 2),
  (10, 'C', 2, 3, 'Sinhala', '3', 2),
  (NULL, NULL, 2, 4, NULL, '3', 2),
  (NULL, NULL, 2, 5, NULL, '3', 2),
  (10, 'A', 2, 6, 'Sinhala', '3', 2),
  (NULL, NULL, 2, 7, NULL, '3', 2),
  (10, 'B', 3, 0, 'Sinhala', '3', 2),
  (10, 'C', 3, 1, 'Sinhala', '3', 2),
  (10, 'C', 3, 2, 'Sinhala', '3', 2),
  (NULL, NULL, 3, 3, NULL, '3', 2),
  (NULL, NULL, 3, 4, NULL, '3', 2),
  (NULL, NULL, 3, 5, NULL, '3', 2),
  (10, 'A', 3, 6, 'Sinhala', '3', 2),
  (10, 'A', 3, 7, 'Sinhala', '3', 2),
  (10, 'B', 4, 0, 'Sinhala', '3', 2),
  (NULL, NULL, 4, 1, NULL, '3', 2),
  (NULL, NULL, 4, 2, NULL, '3', 2),
  (10, 'C', 4, 3, 'Sinhala', '3', 2),
  (NULL, NULL, 4, 4, NULL, '3', 2),
  (NULL, NULL, 4, 5, NULL, '3', 2),
  (10, 'A', 4, 6, 'Sinhala', '3', 2),
  (NULL, NULL, 4, 7, NULL, '3', 2),
  (NULL, NULL, 0, 0, NULL, '31', 0),
  (NULL, NULL, 0, 1, NULL, '31', 0),
  (NULL, NULL, 0, 2, NULL, '31', 0),
  (NULL, NULL, 0, 3, NULL, '31', 0),
  (NULL, NULL, 0, 4, NULL, '31', 0),
  (NULL, NULL, 0, 5, NULL, '31', 0),
  (NULL, NULL, 0, 6, NULL, '31', 0),
  (NULL, NULL, 0, 7, NULL, '31', 0),
  (NULL, NULL, 1, 0, NULL, '31', 0),
  (NULL, NULL, 1, 1, NULL, '31', 0),
  (NULL, NULL, 1, 2, NULL, '31', 0),
  (NULL, NULL, 1, 3, NULL, '31', 0),
  (NULL, NULL, 1, 4, NULL, '31', 0),
  (NULL, NULL, 1, 5, NULL, '31', 0),
  (NULL, NULL, 1, 6, NULL, '31', 0),
  (NULL, NULL, 1, 7, NULL, '31', 0),
  (NULL, NULL, 2, 0, NULL, '31', 0),
  (NULL, NULL, 2, 1, NULL, '31', 0),
  (NULL, NULL, 2, 2, NULL, '31', 0),
  (NULL, NULL, 2, 3, NULL, '31', 0),
  (NULL, NULL, 2, 4, NULL, '31', 0),
  (NULL, NULL, 2, 5, NULL, '31', 0),
  (NULL, NULL, 2, 6, NULL, '31', 0),
  (NULL, NULL, 2, 7, NULL, '31', 0),
  (NULL, NULL, 3, 0, NULL, '31', 0),
  (NULL, NULL, 3, 1, NULL, '31', 0),
  (NULL, NULL, 3, 2, NULL, '31', 0),
  (NULL, NULL, 3, 3, NULL, '31', 0),
  (NULL, NULL, 3, 4, NULL, '31', 0),
  (NULL, NULL, 3, 5, NULL, '31', 0),
  (NULL, NULL, 3, 6, NULL, '31', 0),
  (NULL, NULL, 3, 7, NULL, '31', 0),
  (NULL, NULL, 4, 0, NULL, '31', 0),
  (NULL, NULL, 4, 1, NULL, '31', 0),
  (NULL, NULL, 4, 2, NULL, '31', 0),
  (NULL, NULL, 4, 3, NULL, '31', 0),
  (NULL, NULL, 4, 4, NULL, '31', 0),
  (NULL, NULL, 4, 5, NULL, '31', 0),
  (NULL, NULL, 4, 6, NULL, '31', 0),
  (NULL, NULL, 4, 7, NULL, '31', 0),
  (NULL, NULL, 0, 0, NULL, '32', 0),
  (NULL, NULL, 0, 1, NULL, '32', 0),
  (NULL, NULL, 0, 2, NULL, '32', 0),
  (NULL, NULL, 0, 3, NULL, '32', 0),
  (NULL, NULL, 0, 4, NULL, '32', 0),
  (NULL, NULL, 0, 5, NULL, '32', 0),
  (NULL, NULL, 0, 6, NULL, '32', 0),
  (NULL, NULL, 0, 7, NULL, '32', 0),
  (NULL, NULL, 1, 0, NULL, '32', 0),
  (NULL, NULL, 1, 1, NULL, '32', 0),
  (NULL, NULL, 1, 2, NULL, '32', 0),
  (NULL, NULL, 1, 3, NULL, '32', 0),
  (NULL, NULL, 1, 4, NULL, '32', 0),
  (NULL, NULL, 1, 5, NULL, '32', 0),
  (NULL, NULL, 1, 6, NULL, '32', 0),
  (NULL, NULL, 1, 7, NULL, '32', 0),
  (NULL, NULL, 2, 0, NULL, '32', 0),
  (NULL, NULL, 2, 1, NULL, '32', 0),
  (NULL, NULL, 2, 2, NULL, '32', 0),
  (NULL, NULL, 2, 3, NULL, '32', 0),
  (NULL, NULL, 2, 4, NULL, '32', 0),
  (NULL, NULL, 2, 5, NULL, '32', 0),
  (NULL, NULL, 2, 6, NULL, '32', 0),
  (NULL, NULL, 2, 7, NULL, '32', 0),
  (NULL, NULL, 3, 0, NULL, '32', 0),
  (NULL, NULL, 3, 1, NULL, '32', 0),
  (NULL, NULL, 3, 2, NULL, '32', 0),
  (NULL, NULL, 3, 3, NULL, '32', 0),
  (NULL, NULL, 3, 4, NULL, '32', 0),
  (NULL, NULL, 3, 5, NULL, '32', 0),
  (NULL, NULL, 3, 6, NULL, '32', 0),
  (NULL, NULL, 3, 7, NULL, '32', 0),
  (NULL, NULL, 4, 0, NULL, '32', 0),
  (NULL, NULL, 4, 1, NULL, '32', 0),
  (NULL, NULL, 4, 2, NULL, '32', 0),
  (NULL, NULL, 4, 3, NULL, '32', 0),
  (NULL, NULL, 4, 4, NULL, '32', 0),
  (NULL, NULL, 4, 5, NULL, '32', 0),
  (NULL, NULL, 4, 6, NULL, '32', 0),
  (NULL, NULL, 4, 7, NULL, '32', 0),
  (NULL, NULL, 0, 0, NULL, '33', 0),
  (NULL, NULL, 0, 1, NULL, '33', 0),
  (NULL, NULL, 0, 2, NULL, '33', 0),
  (NULL, NULL, 0, 3, NULL, '33', 0),
  (NULL, NULL, 0, 4, NULL, '33', 0),
  (NULL, NULL, 0, 5, NULL, '33', 0),
  (NULL, NULL, 0, 6, NULL, '33', 0),
  (NULL, NULL, 0, 7, NULL, '33', 0),
  (NULL, NULL, 1, 0, NULL, '33', 0),
  (NULL, NULL, 1, 1, NULL, '33', 0),
  (NULL, NULL, 1, 2, NULL, '33', 0),
  (NULL, NULL, 1, 3, NULL, '33', 0),
  (NULL, NULL, 1, 4, NULL, '33', 0),
  (NULL, NULL, 1, 5, NULL, '33', 0),
  (NULL, NULL, 1, 6, NULL, '33', 0),
  (NULL, NULL, 1, 7, NULL, '33', 0),
  (NULL, NULL, 2, 0, NULL, '33', 0),
  (NULL, NULL, 2, 1, NULL, '33', 0),
  (NULL, NULL, 2, 2, NULL, '33', 0),
  (NULL, NULL, 2, 3, NULL, '33', 0),
  (NULL, NULL, 2, 4, NULL, '33', 0),
  (NULL, NULL, 2, 5, NULL, '33', 0),
  (NULL, NULL, 2, 6, NULL, '33', 0),
  (NULL, NULL, 2, 7, NULL, '33', 0),
  (NULL, NULL, 3, 0, NULL, '33', 0),
  (NULL, NULL, 3, 1, NULL, '33', 0),
  (NULL, NULL, 3, 2, NULL, '33', 0),
  (NULL, NULL, 3, 3, NULL, '33', 0),
  (NULL, NULL, 3, 4, NULL, '33', 0),
  (NULL, NULL, 3, 5, NULL, '33', 0),
  (NULL, NULL, 3, 6, NULL, '33', 0),
  (NULL, NULL, 3, 7, NULL, '33', 0),
  (NULL, NULL, 4, 0, NULL, '33', 0),
  (NULL, NULL, 4, 1, NULL, '33', 0),
  (NULL, NULL, 4, 2, NULL, '33', 0),
  (NULL, NULL, 4, 3, NULL, '33', 0),
  (NULL, NULL, 4, 4, NULL, '33', 0),
  (NULL, NULL, 4, 5, NULL, '33', 0),
  (NULL, NULL, 4, 6, NULL, '33', 0),
  (NULL, NULL, 4, 7, NULL, '33', 0),
  (NULL, NULL, 0, 0, NULL, '34', 0),
  (NULL, NULL, 0, 1, NULL, '34', 0),
  (NULL, NULL, 0, 2, NULL, '34', 0),
  (NULL, NULL, 0, 3, NULL, '34', 0),
  (NULL, NULL, 0, 4, NULL, '34', 0),
  (NULL, NULL, 0, 5, NULL, '34', 0),
  (NULL, NULL, 0, 6, NULL, '34', 0),
  (NULL, NULL, 0, 7, NULL, '34', 0),
  (NULL, NULL, 1, 0, NULL, '34', 0),
  (NULL, NULL, 1, 1, NULL, '34', 0),
  (NULL, NULL, 1, 2, NULL, '34', 0),
  (NULL, NULL, 1, 3, NULL, '34', 0),
  (NULL, NULL, 1, 4, NULL, '34', 0),
  (NULL, NULL, 1, 5, NULL, '34', 0),
  (NULL, NULL, 1, 6, NULL, '34', 0),
  (NULL, NULL, 1, 7, NULL, '34', 0),
  (NULL, NULL, 2, 0, NULL, '34', 0),
  (NULL, NULL, 2, 1, NULL, '34', 0),
  (NULL, NULL, 2, 2, NULL, '34', 0),
  (NULL, NULL, 2, 3, NULL, '34', 0),
  (NULL, NULL, 2, 4, NULL, '34', 0),
  (NULL, NULL, 2, 5, NULL, '34', 0),
  (NULL, NULL, 2, 6, NULL, '34', 0),
  (NULL, NULL, 2, 7, NULL, '34', 0),
  (NULL, NULL, 3, 0, NULL, '34', 0),
  (NULL, NULL, 3, 1, NULL, '34', 0),
  (NULL, NULL, 3, 2, NULL, '34', 0),
  (NULL, NULL, 3, 3, NULL, '34', 0),
  (NULL, NULL, 3, 4, NULL, '34', 0),
  (NULL, NULL, 3, 5, NULL, '34', 0),
  (NULL, NULL, 3, 6, NULL, '34', 0),
  (NULL, NULL, 3, 7, NULL, '34', 0),
  (NULL, NULL, 4, 0, NULL, '34', 0),
  (NULL, NULL, 4, 1, NULL, '34', 0),
  (NULL, NULL, 4, 2, NULL, '34', 0),
  (NULL, NULL, 4, 3, NULL, '34', 0),
  (NULL, NULL, 4, 4, NULL, '34', 0),
  (NULL, NULL, 4, 5, NULL, '34', 0),
  (NULL, NULL, 4, 6, NULL, '34', 0),
  (NULL, NULL, 4, 7, NULL, '34', 0),
  (11, 'A', 0, 0, 'Maths', '4', 0),
  (NULL, NULL, 0, 1, NULL, '4', 0),
  (NULL, NULL, 0, 2, NULL, '4', 0),
  (NULL, NULL, 0, 3, NULL, '4', 0),
  (NULL, NULL, 0, 4, NULL, '4', 0),
  (NULL, NULL, 0, 5, NULL, '4', 0),
  (NULL, NULL, 0, 6, NULL, '4', 0),
  (NULL, NULL, 0, 7, NULL, '4', 0),
  (11, 'C', 1, 0, 'Maths', '4', 0),
  (NULL, NULL, 1, 1, NULL, '4', 0),
  (NULL, NULL, 1, 2, NULL, '4', 0),
  (NULL, NULL, 1, 3, NULL, '4', 0),
  (NULL, NULL, 1, 4, NULL, '4', 0),
  (NULL, NULL, 1, 5, NULL, '4', 0),
  (NULL, NULL, 1, 6, NULL, '4', 0),
  (NULL, NULL, 1, 7, NULL, '4', 0),
  (NULL, NULL, 2, 0, NULL, '4', 0),
  (NULL, NULL, 2, 1, NULL, '4', 0),
  (11, 'D', 2, 2, 'Science', '4', 0),
  (NULL, NULL, 2, 3, NULL, '4', 0),
  (NULL, NULL, 2, 4, NULL, '4', 0),
  (NULL, NULL, 2, 5, NULL, '4', 0),
  (NULL, NULL, 2, 6, NULL, '4', 0),
  (NULL, NULL, 2, 7, NULL, '4', 0),
  (NULL, NULL, 3, 0, NULL, '4', 0),
  (NULL, NULL, 3, 1, NULL, '4', 0),
  (NULL, NULL, 3, 2, NULL, '4', 0),
  (NULL, NULL, 3, 3, NULL, '4', 0),
  (NULL, NULL, 3, 4, NULL, '4', 0),
  (NULL, NULL, 3, 5, NULL, '4', 0),
  (NULL, NULL, 3, 6, NULL, '4', 0),
  (NULL, NULL, 3, 7, NULL, '4', 0),
  (NULL, NULL, 4, 0, NULL, '4', 0),
  (NULL, NULL, 4, 1, NULL, '4', 0),
  (NULL, NULL, 4, 2, NULL, '4', 0),
  (NULL, NULL, 4, 3, NULL, '4', 0),
  (NULL, NULL, 4, 4, NULL, '4', 0),
  (NULL, NULL, 4, 5, NULL, '4', 0),
  (NULL, NULL, 4, 6, NULL, '4', 0),
  (NULL, NULL, 4, 7, NULL, '4', 0),
  (NULL, NULL, 0, 0, NULL, '5', 0),
  (10, 'B', 0, 1, 'History', '5', 0),
  (NULL, NULL, 0, 2, NULL, '5', 0),
  (10, 'A', 0, 3, 'History', '5', 0),
  (NULL, NULL, 0, 4, NULL, '5', 0),
  (NULL, NULL, 0, 5, NULL, '5', 0),
  (10, 'C', 0, 6, 'History', '5', 0),
  (NULL, NULL, 0, 7, NULL, '5', 0),
  (NULL, NULL, 1, 0, NULL, '5', 0),
  (NULL, NULL, 1, 1, NULL, '5', 0),
  (10, 'A', 1, 2, 'History', '5', 0),
  (10, 'A', 1, 3, 'History', '5', 0),
  (NULL, NULL, 1, 4, NULL, '5', 0),
  (NULL, NULL, 1, 5, NULL, '5', 0),
  (10, 'C', 1, 6, 'History', '5', 0),
  (10, 'B', 1, 7, 'History', '5', 0),
  (NULL, NULL, 2, 0, NULL, '5', 0),
  (10, 'A', 2, 1, 'History', '5', 0),
  (NULL, NULL, 2, 2, NULL, '5', 0),
  (NULL, NULL, 2, 3, NULL, '5', 0),
  (10, 'B', 2, 4, 'History', '5', 0),
  (NULL, NULL, 2, 5, NULL, '5', 0),
  (NULL, NULL, 2, 6, NULL, '5', 0),
  (10, 'C', 2, 7, 'History', '5', 0),
  (NULL, NULL, 3, 0, NULL, '5', 0),
  (NULL, NULL, 3, 1, NULL, '5', 0),
  (NULL, NULL, 3, 2, NULL, '5', 0),
  (NULL, NULL, 3, 3, NULL, '5', 0),
  (10, 'A', 3, 4, 'History', '5', 0),
  (10, 'B', 3, 5, 'History', '5', 0),
  (NULL, NULL, 3, 6, NULL, '5', 0),
  (10, 'C', 3, 7, 'History', '5', 0),
  (NULL, NULL, 4, 0, NULL, '5', 0),
  (10, 'B', 4, 1, 'History', '5', 0),
  (10, 'B', 4, 2, 'History', '5', 0),
  (NULL, NULL, 4, 3, NULL, '5', 0),
  (NULL, NULL, 4, 4, NULL, '5', 0),
  (10, 'C', 4, 5, 'History', '5', 0),
  (10, 'C', 4, 6, 'History', '5', 0),
  (10, 'A', 4, 7, 'History', '5', 0),
  (NULL, NULL, 0, 0, NULL, '6', 0),
  (NULL, NULL, 0, 1, NULL, '6', 0),
  (10, 'B', 0, 2, 'English', '6', 0),
  (NULL, NULL, 0, 3, NULL, '6', 0),
  (NULL, NULL, 0, 4, NULL, '6', 0),
  (NULL, NULL, 0, 5, NULL, '6', 0),
  (10, 'A', 0, 6, 'English', '6', 0),
  (10, 'C', 0, 7, 'English', '6', 0),
  (NULL, NULL, 1, 0, NULL, '6', 0),
  (10, 'A', 1, 1, 'English', '6', 0),
  (10, 'C', 1, 2, 'English', '6', 0),
  (10, 'C', 1, 3, 'English', '6', 0),
  (NULL, NULL, 1, 4, NULL, '6', 0),
  (10, 'B', 1, 5, 'English', '6', 0),
  (NULL, NULL, 1, 6, NULL, '6', 0),
  (NULL, NULL, 1, 7, NULL, '6', 0),
  (NULL, NULL, 2, 0, NULL, '6', 0),
  (NULL, NULL, 2, 1, NULL, '6', 0),
  (10, 'A', 2, 2, 'English', '6', 0),
  (10, 'A', 2, 3, 'English', '6', 0),
  (10, 'C', 2, 4, 'English', '6', 0),
  (NULL, NULL, 2, 5, NULL, '6', 0),
  (10, 'B', 2, 6, 'English', '6', 0),
  (10, 'B', 2, 7, 'English', '6', 0),
  (NULL, NULL, 3, 0, NULL, '6', 0),
  (NULL, NULL, 3, 1, NULL, '6', 0),
  (NULL, NULL, 3, 2, NULL, '6', 0),
  (10, 'C', 3, 3, 'English', '6', 0),
  (NULL, NULL, 3, 4, NULL, '6', 0),
  (10, 'A', 3, 5, 'English', '6', 0),
  (10, 'B', 3, 6, 'English', '6', 0),
  (NULL, NULL, 3, 7, NULL, '6', 0),
  (NULL, NULL, 4, 0, NULL, '6', 0),
  (NULL, NULL, 4, 1, NULL, '6', 0),
  (NULL, NULL, 4, 2, NULL, '6', 0),
  (NULL, NULL, 4, 3, NULL, '6', 0),
  (10, 'A', 4, 4, 'English', '6', 0),
  (NULL, NULL, 4, 5, NULL, '6', 0),
  (10, 'B', 4, 6, 'English', '6', 0),
  (10, 'C', 4, 7, 'English', '6', 0),
  (NULL, NULL, 0, 0, NULL, '7', 0),
  (10, 'C', 0, 1, 'Information Technology', '7', 0),
  (NULL, NULL, 0, 2, NULL, '7', 0),
  (NULL, NULL, 0, 3, NULL, '7', 0),
  (NULL, NULL, 0, 4, NULL, '7', 0),
  (10, 'A', 0, 5, 'Information Technology', '7', 0),
  (NULL, NULL, 0, 6, NULL, '7', 0),
  (10, 'B', 0, 7, 'Information Technology', '7', 0),
  (NULL, NULL, 1, 0, NULL, '7', 0),
  (NULL, NULL, 1, 1, NULL, '7', 0),
  (NULL, NULL, 1, 2, NULL, '7', 0),
  (10, 'B', 1, 3, 'Information Technology', '7', 0),
  (10, 'A', 1, 4, 'Information Technology', '7', 0),
  (10, 'A', 1, 5, 'Information Technology', '7', 0),
  (NULL, NULL, 1, 6, NULL, '7', 0),
  (10, 'C', 1, 7, 'Information Technology', '7', 0),
  (NULL, NULL, 2, 0, NULL, '7', 0),
  (NULL, NULL, 2, 1, NULL, '7', 0),
  (10, 'C', 2, 2, 'Information Technology', '7', 0),
  (NULL, NULL, 2, 3, NULL, '7', 0),
  (10, 'A', 2, 4, 'Information Technology', '7', 0),
  (10, 'B', 2, 5, 'Information Technology', '7', 0),
  (NULL, NULL, 2, 6, NULL, '7', 0),
  (NULL, NULL, 2, 7, NULL, '7', 0),
  (NULL, NULL, 3, 0, NULL, '7', 0),
  (10, 'B', 3, 1, 'Information Technology', '7', 0),
  (NULL, NULL, 3, 2, NULL, '7', 0),
  (NULL, NULL, 3, 3, NULL, '7', 0),
  (NULL, NULL, 3, 4, NULL, '7', 0),
  (10, 'C', 3, 5, 'Information Technology', '7', 0),
  (10, 'C', 3, 6, 'Information Technology', '7', 0),
  (NULL, NULL, 3, 7, NULL, '7', 0),
  (NULL, NULL, 4, 0, NULL, '7', 0),
  (NULL, NULL, 4, 1, NULL, '7', 0),
  (NULL, NULL, 4, 2, NULL, '7', 0),
  (10, 'A', 4, 3, 'Information Technology', '7', 0),
  (10, 'B', 4, 4, 'Information Technology', '7', 0),
  (NULL, NULL, 4, 5, NULL, '7', 0),
  (NULL, NULL, 4, 6, NULL, '7', 0),
  (NULL, NULL, 4, 7, NULL, '7', 0),
  (10, 'C', 0, 0, 'Science', '8', 0),
  (NULL, NULL, 0, 1, NULL, '8', 0),
  (NULL, NULL, 0, 2, NULL, '8', 0),
  (NULL, NULL, 0, 3, NULL, '8', 0),
  (10, 'B', 0, 4, 'Science', '8', 0),
  (10, 'B', 0, 5, 'Science', '8', 0),
  (NULL, NULL, 0, 6, NULL, '8', 0),
  (10, 'A', 0, 7, 'Science', '8', 0),
  (10, 'C', 1, 0, 'Science', '8', 0),
  (10, 'C', 1, 1, 'Science', '8', 0),
  (10, 'B', 1, 2, 'Science', '8', 0),
  (NULL, NULL, 1, 3, NULL, '8', 0),
  (NULL, NULL, 1, 4, NULL, '8', 0),
  (NULL, NULL, 1, 5, NULL, '8', 0),
  (10, 'A', 1, 6, 'Science', '8', 0),
  (NULL, NULL, 1, 7, NULL, '8', 0),
  (10, 'C', 2, 0, 'Science', '8', 0),
  (10, 'C', 2, 1, 'Science', '8', 0),
  (10, 'B', 2, 2, 'Science', '8', 0),
  (NULL, NULL, 2, 3, NULL, '8', 0),
  (NULL, NULL, 2, 4, NULL, '8', 0),
  (10, 'A', 2, 5, 'Science', '8', 0),
  (NULL, NULL, 2, 6, NULL, '8', 0),
  (NULL, NULL, 2, 7, NULL, '8', 0),
  (10, 'C', 3, 0, 'Science', '8', 0),
  (10, 'A', 3, 1, 'Science', '8', 0),
  (NULL, NULL, 3, 2, NULL, '8', 0),
  (NULL, NULL, 3, 3, NULL, '8', 0),
  (NULL, NULL, 3, 4, NULL, '8', 0),
  (NULL, NULL, 3, 5, NULL, '8', 0),
  (NULL, NULL, 3, 6, NULL, '8', 0),
  (10, 'B', 3, 7, 'Science', '8', 0),
  (10, 'C', 4, 0, 'Science', '8', 0),
  (10, 'A', 4, 1, 'Science', '8', 0),
  (10, 'A', 4, 2, 'Science', '8', 0),
  (NULL, NULL, 4, 3, NULL, '8', 0),
  (NULL, NULL, 4, 4, NULL, '8', 0),
  (10, 'B', 4, 5, 'Science', '8', 0),
  (NULL, NULL, 4, 6, NULL, '8', 0),
  (NULL, NULL, 4, 7, NULL, '8', 0),
  (NULL, NULL, 0, 0, NULL, '9', 0),
  (NULL, NULL, 0, 1, NULL, '9', 0),
  (NULL, NULL, 0, 2, NULL, '9', 0),
  (NULL, NULL, 0, 3, NULL, '9', 0),
  (NULL, NULL, 0, 4, NULL, '9', 0),
  (NULL, NULL, 0, 5, NULL, '9', 0),
  (NULL, NULL, 0, 6, NULL, '9', 0),
  (NULL, NULL, 0, 7, NULL, '9', 0),
  (NULL, NULL, 1, 0, NULL, '9', 0),
  (NULL, NULL, 1, 1, NULL, '9', 0),
  (NULL, NULL, 1, 2, NULL, '9', 0),
  (NULL, NULL, 1, 3, NULL, '9', 0),
  (NULL, NULL, 1, 4, NULL, '9', 0),
  (NULL, NULL, 1, 5, NULL, '9', 0),
  (NULL, NULL, 1, 6, NULL, '9', 0),
  (NULL, NULL, 1, 7, NULL, '9', 0),
  (NULL, NULL, 2, 0, NULL, '9', 0),
  (NULL, NULL, 2, 1, NULL, '9', 0),
  (NULL, NULL, 2, 2, NULL, '9', 0),
  (NULL, NULL, 2, 3, NULL, '9', 0),
  (NULL, NULL, 2, 4, NULL, '9', 0),
  (NULL, NULL, 2, 5, NULL, '9', 0),
  (NULL, NULL, 2, 6, NULL, '9', 0),
  (NULL, NULL, 2, 7, NULL, '9', 0),
  (NULL, NULL, 3, 0, NULL, '9', 0),
  (NULL, NULL, 3, 1, NULL, '9', 0),
  (NULL, NULL, 3, 2, NULL, '9', 0),
  (NULL, NULL, 3, 3, NULL, '9', 0),
  (NULL, NULL, 3, 4, NULL, '9', 0),
  (NULL, NULL, 3, 5, NULL, '9', 0),
  (NULL, NULL, 3, 6, NULL, '9', 0),
  (NULL, NULL, 3, 7, NULL, '9', 0),
  (NULL, NULL, 4, 0, NULL, '9', 0),
  (NULL, NULL, 4, 1, NULL, '9', 0),
  (NULL, NULL, 4, 2, NULL, '9', 0),
  (NULL, NULL, 4, 3, NULL, '9', 0),
  (NULL, NULL, 4, 4, NULL, '9', 0),
  (NULL, NULL, 4, 5, NULL, '9', 0),
  (NULL, NULL, 4, 6, NULL, '9', 0),
  (NULL, NULL, 4, 7, NULL, '9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(80) DEFAULT NULL,
  `accessLevel` int(10) unsigned DEFAULT '2',
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userEmail`),
  KEY `User_ibfk_1` (`accessLevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userEmail`, `userPassword`, `accessLevel`, `isDeleted`) VALUES
  ('1', '$2y$10$ITa1DX.IR57egONMAFcQuOVPXycANGqfFchP6nTiEYlkTfoFQwaam', 1, 0),
  ('2', '$2y$10$Z4hLXwEmV7qZSXxH8lSoY.R4BRXji51YRxGfkdco.2V6LOKPsVtC6', 2, 0),
  ('22', '$2y$10$iCRtx31Ie73wtbrq.1Sulue/3dFLByKPOOlVVoeoc1e/hwBJTpW5C', 2, 2),
  ('3', '$2y$10$In6BRx4TXPyHVlPGvlpKN.7jjkSkBi/87Gc9fqNZatPq3btSBmdYu', 3, 0),
  ('4', '$2y$10$kGrSp.K0fcM6XFO5RRXMxeP6Xq/HuYLkSdLZqjsoi4QjBBo9lhsd.', 4, 0),
  ('5', '$2y$10$fr/e4cfyCmhH3YN0F5d3m.pNaDq/2itqC5q.ya0K/zthNVnWf7X9q', 5, 0),
  ('6', '$2y$10$HV2SfdLnz5GSLvtNANPR5.4Ihk4IO.imENY44kMUmtOSXyKaDspFC', 6, 0),
  ('a', '$2y$10$h01VyUflSOarmJs5H98.Wem2.0UIj8WdUC/Sayxa8BVKAOBvUFUfm', 1, 2),
  ('ab', '$2y$10$8Az470QmxIuRqy5a6TNmfOiYKvPoJmUSvo08m9CfC6F6PpXKyWEoe', 2, 2),
  ('abc', '$2y$10$3TeoYC5i/ROkO.ZC6nomLeniQ/PYn1jbkxw4hKm5wbO8LZoduMshK', 1, 2),
  ('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 2),
  ('apple', '$2y$10$X67s43KjvUygW5GVeoStCOFVylBbXsUeyD2e6EKCMMUEjxqcEsIFa', 1, 2),
  ('arabic@gmail.com', '$2y$10$hVONYOoTGLmmG.dfVBJm1.DuPsUTlhJhIqvsYSkQC3KNr0JzDb5bO', 1, 2),
  ('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 2),
  ('b', '$2y$10$ujaPveBM11/hXY6caye3f.nQYKlnVcdrQGZWksMm9lVk5oYlj4RmO', 2, 2),
  ('batman', '$2y$10$Q7tggvIDnma7LOFmBzukHeGawelfGYwF.gyN7.gfnt8r.z2kFhNRy', 4, 2),
  ('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 2),
  ('blue', '$2y$10$FV/zw6c6WkCfHgALLROEmOnjDaiE9ARHAqcHdoQkll3lzPCVqeck.', 1, 2),
  ('blue table', '$2y$10$nACqSmTdjU/VZp4Oae3d2.pzSw1MxI1hEcOpG79WxbtId5uj9GPmq', 1, 2),
  ('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 2),
  ('cd', '$2y$10$amqd2LCh9Bk65mwfgaG8LO42NZrk798.HN9Ng0T1JYF1ckPJ4UUM2', 1, 2),
  ('chair', '$2y$10$c6d3EBGdek9QN9y5pN33oeU3P1xpTbVbJQixQXS.BW0VD1mJfL.vO', 1, 2),
  ('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 2),
  ('free', '$2y$10$05tBD.F8Nxi45Ww7oiTUdOeV/qYsk2Dyaa0a8gKWfQrK3PZitmi0y', 1, 2),
  ('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 2),
  ('isuru@sliit.lk', '$2y$10$7kD7JsAbPk5fSgIVfnqyguoDlFJML9uBVb12UZ3aqXOEJkze7EHcC', 1, 2),
  ('IT13001308', '$2y$10$uaNWXELT/WbmBZsyLi4gae6mIkVVYleRH2inqtAE8YavmQU9eVwTG', 1, 2),
  ('IT13006426', '$2y$10$NqCLCny59SCxkegqqik2yep7eZvL/wrzP2K/WzorW9JE6UL8Oa7CC', 1, 2),
  ('IT13008338', '$2y$10$84xtndo0WnKjrrCJukUO3ecnHZxJ9UePxU8vlGBnw70AXqPTQSRz2', 1, 2),
  ('IT13013424', '$2y$10$sQT1wVw5LqeroKEDiNJjhu5r755pG6jjFvUNqflTfibjDyzOuE0JS', 1, 2),
  ('IT13014650', '$2y$10$AcDiHK25rLRomS.rLkbPRe8558LOGSiacPumJNxdeKlIYlwZrnMMC', 1, 2),
  ('IT13024000', '$2y$10$APNgCTivQk1uS9jzczbRi.e.fQUw1eMmSeRMEghlbwQz1bSCQ8EMO', 1, 2),
  ('IT13028206', '$2y$10$elZ28Kvg3d0NIXLcUMcXo.3WVYBLR4Mo1DVRs0iOoktP8XL5b/G26', 1, 2),
  ('IT13031312', '$2y$10$i3MU2aeGIZzU8zvfdnTqcuMXrmUhwFHIErS7FSvwIg9Hz.5mBThLa', 1, 2),
  ('madusha.1@sliit.lk', '$2y$10$6PTBBHqrng.3cH3bbGJhreQe6KNOD5jOwmpO9WbflzlOueYkpAAaW', 2, 0),
  ('mark.one@localhost.com', '$2y$10$3uLtNkciTqFy5ZmXQPh8L.e62CnQq45smsA9Vqf3syUCXPAEeD.sG', 2, 0),
  ('red@blue.org', '$2y$10$GTAR2ISrSJc/3E7pqclth.gLbyYlnar3FHubs5tJ66opJ7.gMYlgy', 1, 2),
  ('s', '$2y$10$5Dr1zqERyeGwod5i5nrQv.m0xBCpUNKOvYJ/q9KOCEx7AQV3ThvIi', 2, 2),
  ('sh', '$2y$10$k6WWAhhSBD7UkvbcHDQVj.l6zLYTBpwuyCrO8a2o10qhTR.6gJBKe', 1, 2),
  ('shavin47', '$2y$10$QmPP8f1zzx0qW6b3v.h.X.Fox.FyA3mLwy7LrlzkJHdhF8D3srp5.', 1, 2),
  ('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 2),
  ('viim@ubuntu.org', '$2y$10$voK79P1GEwkSeEnvPwcSr.kvBMfyDHnL9ErDVDP9CkoyWHWZSgMru', 2, 2),
  ('y', '$2y$10$VKCBn2MD5Q4hifDqhlbPWO.J7hYmW.VNU2oi7lWwoPmH76mSr/Z3e', 1, 2),
  ('yazdaan.alimudeen@gmail.com', '$2y$10$PbyD11uQUq0dQMLbidQAr.R3N/HY.Kg..GEkk3QXBvlL2mQ1tDXr6', 1, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `VwCurrentStaffNo`
--
CREATE TABLE IF NOT EXISTS `VwCurrentStaffNo` (
   `StaffID` varchar(5)
  ,`NamewithInitials` varchar(60)
  ,`DateofBirth` date
  ,`Gender` int(11)
  ,`Race` int(11)
  ,`Religion` int(11)
  ,`CivilStatus` int(11)
  ,`NICNumber` varchar(10)
  ,`MailDeliveryAddress` varchar(100)
  ,`ContactNumber` varchar(15)
  ,`DateAppointedastoPost` date
  ,`DateJoinedthisSchool` date
  ,`EmploymentStatus` int(11)
  ,`Medium` int(11)
  ,`Designation` int(11)
  ,`Section` int(11)
  ,`SubjectMostTaught` int(11)
  ,`SubjectSecondMostTaught` int(11)
  ,`ServiceGrade` int(11)
  ,`Salary` float
  ,`isDeleted` tinyint(4)
  ,`StaffNo` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `VwLeaveNumbers`
--
CREATE TABLE IF NOT EXISTS `VwLeaveNumbers` (
   `StaffID` varchar(5)
  ,`OtherLeave` decimal(33,0)
  ,`DutyLeave` decimal(32,0)
  ,`MedicalLeave` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vwStaff`
--
CREATE TABLE IF NOT EXISTS `vwStaff` (
   `StaffID` varchar(5)
  ,`NamewithInitials` varchar(60)
  ,`DateofBirth` date
  ,`Gender` int(11)
  ,`Race` int(11)
  ,`Religion` int(11)
  ,`CivilStatus` int(11)
  ,`NICNumber` varchar(10)
  ,`MailDeliveryAddress` varchar(200)
  ,`ContactNumber` varchar(15)
  ,`DateAppointedastoPost` date
  ,`DateJoinedthisSchool` date
  ,`EmploymentStatus` int(11)
  ,`Medium` int(11)
  ,`Designation` int(11)
  ,`Section` int(11)
  ,`SubjectMostTaught` int(11)
  ,`SubjectSecondMostTaught` int(11)
  ,`ServiceGrade` int(11)
  ,`Salary` float
  ,`isDeleted` tinyint(4)
  ,`StaffNo` varchar(10)
);
-- --------------------------------------------------------

--
-- Structure for view `VwCurrentStaffNo`
--
DROP TABLE IF EXISTS `VwCurrentStaffNo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manaSystem`@`localhost` SQL SECURITY DEFINER VIEW `VwCurrentStaffNo` AS select `s`.`StaffID` AS `StaffID`,`s`.`NamewithInitials` AS `NamewithInitials`,`s`.`DateofBirth` AS `DateofBirth`,`s`.`Gender` AS `Gender`,`s`.`Race` AS `Race`,`s`.`Religion` AS `Religion`,`s`.`CivilStatus` AS `CivilStatus`,`s`.`NICNumber` AS `NICNumber`,`s`.`MailDeliveryAddress` AS `MailDeliveryAddress`,`s`.`ContactNumber` AS `ContactNumber`,`s`.`DateAppointedastoPost` AS `DateAppointedastoPost`,`s`.`DateJoinedthisSchool` AS `DateJoinedthisSchool`,`s`.`EmploymentStatus` AS `EmploymentStatus`,`s`.`Medium` AS `Medium`,`s`.`Designation` AS `Designation`,`s`.`Section` AS `Section`,`s`.`SubjectMostTaught` AS `SubjectMostTaught`,`s`.`SubjectSecondMostTaught` AS `SubjectSecondMostTaught`,`s`.`ServiceGrade` AS `ServiceGrade`,`s`.`Salary` AS `Salary`,`s`.`isDeleted` AS `isDeleted`,`sn`.`staffNo` AS `StaffNo` from (`Staff` `s` left join `StaffNo` `sn` on((`s`.`StaffID` = `sn`.`staffID`))) where ((`s`.`isDeleted` = 0) and (`sn`.`year` = '2014'));

-- --------------------------------------------------------

--
-- Structure for view `VwLeaveNumbers`
--
DROP TABLE IF EXISTS `VwLeaveNumbers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VwLeaveNumbers` AS select `f`.`StaffID` AS `StaffID`,ifnull((sum(`f`.`NoOfCasual`) + sum(`f`.`NoOfNoPay`)),0) AS `OtherLeave`,ifnull(sum(`f`.`NoOfDuty`),0) AS `DutyLeave`,ifnull(sum(`f`.`NoOfMedical`),0) AS `MedicalLeave` from `FullLeave` `f` where ((`f`.`isDeleted` = 0) and (`f`.`Status` = 1)) group by `f`.`StaffID` order by (`f`.`StaffID` + 0);

-- --------------------------------------------------------

--
-- Structure for view `vwStaff`
--
DROP TABLE IF EXISTS `vwStaff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwStaff` AS select `s`.`StaffID` AS `StaffID`,`s`.`NameWithInitials` AS `NamewithInitials`,`s`.`DateOfBirth` AS `DateofBirth`,`s`.`Gender` AS `Gender`,`s`.`Race` AS `Race`,`s`.`Religion` AS `Religion`,`s`.`CivilStatus` AS `CivilStatus`,`s`.`NICNumber` AS `NICNumber`,`s`.`PermanentAddress` AS `MailDeliveryAddress`,`s`.`ContactMobile` AS `ContactNumber`,`s`.`FirstAppointmentDate` AS `DateAppointedastoPost`,`s`.`DutyAssumeDateToSchool` AS `DateJoinedthisSchool`,`s`.`EmploymentStatus` AS `EmploymentStatus`,`s`.`Medium` AS `Medium`,`s`.`Designation` AS `Designation`,`s`.`Section` AS `Section`,`s`.`SubjectMostTaught` AS `SubjectMostTaught`,`s`.`SubjectSecondMostTaught` AS `SubjectSecondMostTaught`,`s`.`Service` AS `ServiceGrade`,`s`.`Salary` AS `Salary`,`s`.`isDeleted` AS `isDeleted`,`s`.`SerialNo` AS `StaffNo` from `StaffMain` `s` where (`s`.`isDeleted` = 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ClassInformation`
--
ALTER TABLE `ClassInformation`
ADD CONSTRAINT `ClassInformation_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `EmpNo`
--
ALTER TABLE `EmpNo`
ADD CONSTRAINT `EmpNo_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `FullLeave`
--
ALTER TABLE `FullLeave`
ADD CONSTRAINT `FullLeave_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`),
ADD CONSTRAINT `FullLeave_ibfk_2` FOREIGN KEY (`ReviewedBy`) REFERENCES `Staff` (`StaffID`);

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
-- Constraints for table `OtherLeave`
--
ALTER TABLE `OtherLeave`
ADD CONSTRAINT `OtherLeave_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`),
ADD CONSTRAINT `OtherLeave_ibfk_2` FOREIGN KEY (`ReviewedBy`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `RolePerm`
--
ALTER TABLE `RolePerm`
ADD CONSTRAINT `RolePerm_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `Roles` (`roleId`),
ADD CONSTRAINT `RolePerm_ibfk_2` FOREIGN KEY (`permId`) REFERENCES `Permissions` (`permId`);

--
-- Constraints for table `StaffNo`
--
ALTER TABLE `StaffNo`
ADD CONSTRAINT `StaffNo_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `Staff` (`StaffID`);

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
-- Constraints for table `User`
--
ALTER TABLE `User`
ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`accessLevel`) REFERENCES `Roles` (`roleId`);
--
-- Database: `ozekiSMS`
--
CREATE DATABASE IF NOT EXISTS `ozekiSMS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ozekiSMS`;

-- --------------------------------------------------------

--
-- Table structure for table `ozekimessagein`
--

CREATE TABLE IF NOT EXISTS `ozekimessagein` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ozekimessagein`
--

INSERT INTO `ozekimessagein` (`id`, `sender`, `receiver`, `msg`, `senttime`, `receivedtime`, `operator`, `msgtype`, `reference`, `status`) VALUES
  (1, '+94779320817', '+94775087168', 'Hello Ozeki.', '2014-12-17 14:36:22', '2014-12-17 14:36:25', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (2, '+94779320816', '+94775087168', 'I am comng late today.', '2014-12-17 14:49:39', '2014-12-17 14:49:44', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (3, '+94712624225', '+94775087168', 'No he didn''t reply ', '2014-12-17 23:06:16', '2014-12-17 23:06:21', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (4, '+94712624225', '+94775087168', 'No ', '2014-12-17 23:07:35', '2014-12-17 23:07:42', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (5, '+94712624225', '+94775087168', 'I can''t reach him ', '2014-12-17 23:08:06', '2014-12-17 23:08:12', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (6, '+94712624225', '+94775087168', 'Are you using dongle now \nYour line is busy ', '2014-12-17 23:10:57', '2014-12-17 23:11:03', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (7, '+94712624225', '+94775087168', 'Okay can you call me ', '2014-12-17 23:12:25', '2014-12-17 23:12:30', 'YAZDAAN-DIALOG', 'SMS:TEXT', NULL, 'read'),
  (8, '+94773767296', '+94779320816', 'PETIKIRIGE PUBUDU SAHAN KUMARA', '2014-12-08 14:09:45', '2015-01-04 21:21:03', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (9, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:36. Log in for more info.', '2014-12-09 08:36:10', '2015-01-04 21:21:03', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (10, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:31. Log in for more info.', '2014-12-10 08:31:06', '2015-01-04 21:21:03', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (11, 'Star Points', '+94779320816', 'Spend your Star Points before 31/12/14. Dial #141# to check your Star Points Balance/Special Offers/Points which will expire by 31/12. Visit our merchants now! ', '2014-12-11 08:36:13', '2015-01-04 21:21:03', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (14, '+971559890062', '+94779320816', 'Did u collect the phone and the bus card fr shahid', '2014-12-11 21:31:46', '2015-01-04 21:21:03', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (15, 'Alert', '+94779320816', '1 Missed call(s) from 97155989062 on 14-Dec-14 08:51 AM.\n*7days FREE! Watch TV on mobile. www.dz.dialog.lk/gold*', '2014-12-14 08:50:56', '2015-01-04 21:21:04', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (16, '+94773767296', '+94779320816', 'PETIKIRIGE PUBUDU SAHAN KUMARA', '2014-12-08 14:09:45', '2015-01-04 21:21:04', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (17, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:36. Log in for more info.', '2014-12-09 08:36:11', '2015-01-04 21:21:04', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (18, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:31. Log in for more info.', '2014-12-10 08:31:06', '2015-01-04 21:21:04', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (19, 'Star Points', '+94779320816', 'Spend your Star Points before 31/12/14. Dial #141# to check your Star Points Balance/Special Offers/Points which will expire by 31/12. Visit our merchants now! ', '2014-12-11 08:36:13', '2015-01-04 21:21:04', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (22, '+971559890062', '+94779320816', 'Did u collect the phone and the bus card fr shahid', '2014-12-11 21:31:47', '2015-01-04 21:21:05', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (23, 'Alert', '+94779320816', '1 Missed call(s) from 97155989062 on 14-Dec-14 08:51 AM.\n*7days FREE! Watch TV on mobile. www.dz.dialog.lk/gold*', '2014-12-14 08:50:56', '2015-01-04 21:21:05', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (24, 'Dialog', '+94779320816', 'Witness the official WC SONG presented to our SL Cricket Team and also a musical show featuring famous artists at CR & FC Grounds on 15Dec @ 5pm, Entrance FREE ', '2014-12-14 17:35:04', '2015-01-04 21:21:05', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (25, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:58. Log in for more info.', '2014-12-17 08:58:37', '2015-01-04 21:21:05', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (26, '+94773767296', '+94779320816', 'PETIKIRIGE PUBUDU SAHAN KUMARA', '2014-12-08 14:09:45', '2015-01-04 21:21:06', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (27, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:36. Log in for more info.', '2014-12-09 08:36:11', '2015-01-04 21:21:07', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (28, '32665', '+94779320816', 'Your Facebook account was accessed from Chrome on Windows at 08:31. Log in for more info.', '2014-12-10 08:31:06', '2015-01-04 21:21:07', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (29, 'Star Points', '+94779320816', 'Spend your Star Points before 31/12/14. Dial #141# to check your Star Points Balance/Special Offers/Points which will expire by 31/12. Visit our merchants now! ', '2014-12-11 08:36:13', '2015-01-04 21:21:08', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (31, '+94723542405', '+94779320816', '', '2014-12-11 11:43:59', '2015-01-04 21:21:09', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (32, '+971559890062', '+94779320816', 'Did u collect the phone and the bus card fr shahid', '2014-12-11 21:31:47', '2015-01-04 21:21:09', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (33, 'Alert', '+94779320816', '1 Missed call(s) from 97155989062 on 14-Dec-14 08:51 AM.\n*7days FREE! Watch TV on mobile. www.dz.dialog.lk/gold*', '2014-12-14 08:50:56', '2015-01-04 21:21:10', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (34, 'Alert', '+94779320816', '1 Missed call(s) from 112822379 on 17-Dec-14 11:13 AM.\n*7days FREE! Watch TV on mobile. www.dz.dialog.lk/gold*', '2014-12-17 11:13:42', '2015-01-04 21:21:10', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (35, 'Alert', '+94779320816', '1 Missed call(s) from 112822379 on 17-Dec-14 11:14 AM.\n*7days FREE! Watch TV on mobile. www.dz.dialog.lk/gold*', '2014-12-17 11:14:07', '2015-01-04 21:21:11', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (36, 'D2D Reload', '+94779320816', 'You have recieved 5.00 from 775087168 Msg: ', '2015-01-04 21:57:23', '2015-01-04 22:00:08', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (37, '5555', '+94779320816', 'Dear customer, you have successfully recharged your account with Rs. 5.00, You have an available balance of Rs. 5.00. valid till 03/10/2015.', '2015-01-04 21:57:23', '2015-01-04 22:00:09', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (38, '+94775087168', '+94779320816', 'I want to apply for leave today.\r', '2015-01-05 17:42:29', '2015-01-05 17:42:37', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (39, '+971559890062', '+94779320816', 'Call me', '2015-02-02 10:05:53', '2015-02-04 23:46:06', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (40, '5555', '+94779320816', 'Dear customer, you have successfully recharged your account with Rs. 5.00, You have an available balance of Rs. 9.36. valid till 03/10/2015.', '2015-02-04 23:47:32', '2015-02-04 23:47:36', 'DIALOG', 'SMS:TEXT', NULL, 'read'),
  (41, 'D2D Reload', '+94779320816', 'You have recieved 5.00 from 775087168 Msg: ', '2015-02-04 23:47:32', '2015-02-04 23:48:36', 'DIALOG', 'SMS:TEXT', NULL, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `ozekimessageout`
--

CREATE TABLE IF NOT EXISTS `ozekimessageout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `errormsg` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ozekimessageout`
--

INSERT INTO `ozekimessageout` (`id`, `sender`, `receiver`, `msg`, `senttime`, `receivedtime`, `reference`, `status`, `msgtype`, `operator`, `errormsg`) VALUES
  (1, 'manaSystem', '+94779320816', 'Lalala', '2014-12-17 21:16:02', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (2, 'manaSystem', '+94779320816', 'Ozeki test message.', '2014-12-17 21:35:13', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (3, 'manaSystem', '+94779320816', 'another message,', '2014-12-17 21:45:54', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (4, 'manaSystem', '+94779320816', 'this is number 4', '2014-12-17 21:46:25', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (5, 'manaSystem', '+94712624225', 'Have you confirmed with sir we don''t have the meeting tomorrow? (Reply by SMS)', '2014-12-17 23:05:04', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (6, 'manaSystem', '+94712624225', 'Have you confirmed with Sir we don''t have the meeting tomorrow?', '2014-12-17 23:06:55', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (7, 'manaSystem', '+94712624225', 'Okay. No meeting tomorrow. Try to call him in the morning...', '2014-12-17 23:09:16', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (8, 'manaSystem', '+94712624225', 'Yeah, using the dongle and Ozeki to send SMS... :D', '2014-12-17 23:11:57', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (9, 'manaSystem', '+94712624225', 'Yeah... Wait until I put the SIM back into the phone... ', '2014-12-17 23:13:18', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (30, 'manaSystem', '+94775087168', 'Test message; please acknowledge. 7', '2015-01-04 22:01:19', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (31, 'manaSystem', '+94712624225', 'Hello', '2015-01-05 17:01:00', NULL, NULL, 'delivered', NULL, NULL, NULL),
  (32, 'manaSystem', '+94712624225', 'Your leave starting on 2014-11-24 has been approved. -Staff Management System', NULL, NULL, NULL, 'delivered', NULL, NULL, NULL),
  (33, 'manaSystem', '+94712624225', 'Your leave starting on 2014-09-09 has not been approved. -Staff Management System', NULL, NULL, NULL, 'delivered', NULL, NULL, NULL),
  (34, 'manaSystem', '+94775087168', 'Your leave starting on 2015-02-04 has been approved. -Staff Management System', '2015-02-04 23:50:18', NULL, NULL, 'delivered', NULL, NULL, NULL);
COMMIT;
