-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
    -- Host: localhost
    -- Generation Time: Aug 06, 2014 at 02:10 PM
    -- Server version: 5.5.38-0ubuntu0.14.04.1
    -- PHP Version: 5.5.9-1ubuntu4.3

DROP DATABASE IF EXISTS `manaDB`;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 07:35 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `manadb`
--
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

INSERT INTO `almarks` VALUES(2, '12345', 2012, 'Mathematics', 'Arts', 'Physics', 'B', 'A', 'C', 'B', 70, 2.22, 7650, 1210);

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

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` VALUES('13', '2014-09-22', '2014-09-26', '2014-09-26', 1, '', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `AdmissionNo` varchar(5) NOT NULL DEFAULT '',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `isPresent` bit(1) DEFAULT b'0',
  PRIMARY KEY (`AdmissionNo`,`Date`)
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

--
-- Dumping data for table `classinformation`
--

INSERT INTO `classinformation` VALUES('6', 0, 'B', 2);
INSERT INTO `classinformation` VALUES('5', 10, 'A', 0);
INSERT INTO `classinformation` VALUES('8', 10, 'C', 0);
INSERT INTO `classinformation` VALUES('13', 11, 'A', 0);
INSERT INTO `classinformation` VALUES('14', 11, 'B', 0);
INSERT INTO `classinformation` VALUES('12', 11, 'C', 0);
INSERT INTO `classinformation` VALUES('3', 11, 'D', 0);

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
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EventID`,`StaffID`),
  KEY `fk022` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventmanager`
--

INSERT INTO `eventmanager` VALUES(4, '2', 0);

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
INSERT INTO `holiday` VALUES(2014, '2014-05-06');
INSERT INTO `holiday` VALUES(2014, '2014-06-12');
INSERT INTO `holiday` VALUES(2014, '2014-07-29');
INSERT INTO `holiday` VALUES(2014, '2014-08-07');
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
INSERT INTO `holiday` VALUES(2014, '2014-09-04');
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

INSERT INTO `labellanguage` VALUES('actingAssistantPrincipal', 0, 'Acting Assistant Principal');
INSERT INTO `labellanguage` VALUES('actingAssistantPrincipal', 1, 'වැඩබලන සහකාර විදුහල්පති');
INSERT INTO `labellanguage` VALUES('actingDeputyPrincipal', 0, 'Acting Deputy Principal');
INSERT INTO `labellanguage` VALUES('actingDeputyPrincipal', 1, 'වැඩබලන නියෝජ්‍ය විදුහල්පති');
INSERT INTO `labellanguage` VALUES('actingPrincipal', 0, 'Acting Principal');
INSERT INTO `labellanguage` VALUES('actingPrincipal', 1, 'වැඩබලන විදුහල්පති');
INSERT INTO `labellanguage` VALUES('addManager', 0, 'Add Event Managers ');
INSERT INTO `labellanguage` VALUES('addManager', 1, 'සිදුවීම් කළමනාකරුවන් එක් කරන්න ');
INSERT INTO `labellanguage` VALUES('addnewEvent', 0, 'Add New Event');
INSERT INTO `labellanguage` VALUES('addnewEvent', 1, 'නව සිදුවීමක් එකතු කරන්න');
INSERT INTO `labellanguage` VALUES('addTransaction', 0, 'Add Transaction');
INSERT INTO `labellanguage` VALUES('addTransaction', 1, 'ගනුදෙනුව එකතු කරන්න');
INSERT INTO `labellanguage` VALUES('agriculture', 0, 'Agriculture');
INSERT INTO `labellanguage` VALUES('agriculture', 1, 'කෘෂිකර්මය');
INSERT INTO `labellanguage` VALUES('ALevel', 0, ' A Level');
INSERT INTO `labellanguage` VALUES('ALevel', 1, '"අ.පො.ස(උ.පෙ)/හෝ සමාන(A/L)');
INSERT INTO `labellanguage` VALUES('ALevelArtsCommerce', 0, ' A Level Arts Commerce');
INSERT INTO `labellanguage` VALUES('ALevelArtsCommerce', 1, 'උ.පෙළ (12-13) කල/වාණිජ  ප්‍රදාන විෂයයන්');
INSERT INTO `labellanguage` VALUES('ALevelOptional', 0, ' A Level Optional');
INSERT INTO `labellanguage` VALUES('ALevelOptional', 1, 'උ.පෙළ (12-13) අතිරේක විෂයයන්');
INSERT INTO `labellanguage` VALUES('ALevelScienceMain', 0, ' A Level Science Main');
INSERT INTO `labellanguage` VALUES('ALevelScienceMain', 1, 'උ.පෙළ (12-13) විද්‍යා ප්‍රදාන විෂයයන් ');
INSERT INTO `labellanguage` VALUES('ALevelSupervisor', 0, 'A Level Supervisor');
INSERT INTO `labellanguage` VALUES('ALevelSupervisor', 1, 'උ.පෙළ (12-13) අධීක්ෂණ ගුරු');
INSERT INTO `labellanguage` VALUES('ALevelTechnology', 0, ' A Level Technology');
INSERT INTO `labellanguage` VALUES('ALevelTechnology', 1, 'උ.පෙළ (12-13) තාක්ෂණික ප්‍රදාන විෂයයන්');
INSERT INTO `labellanguage` VALUES('amount', 0, 'Amount');
INSERT INTO `labellanguage` VALUES('amount', 1, 'මුදල');
INSERT INTO `labellanguage` VALUES('applyForLeave', 0, 'Apply for Leave');
INSERT INTO `labellanguage` VALUES('applyForLeave', 1, 'නිවාඩු ඉල්ලීම්කිරීම');
INSERT INTO `labellanguage` VALUES('approveLeave', 0, 'Approve Leave');
INSERT INTO `labellanguage` VALUES('approveLeave', 1, 'නිවාඩු අනුමතකිරීම');
INSERT INTO `labellanguage` VALUES('arabic', 0, 'Arabic');
INSERT INTO `labellanguage` VALUES('arabic', 1, 'අරාබි');
INSERT INTO `labellanguage` VALUES('art', 0, 'Art');
INSERT INTO `labellanguage` VALUES('art', 1, 'චිත්‍ර');
INSERT INTO `labellanguage` VALUES('arts', 0, 'Arts');
INSERT INTO `labellanguage` VALUES('arts', 1, 'කලා ශිල්ප');
INSERT INTO `labellanguage` VALUES('artsAgain', 0, 'Arts Again');
INSERT INTO `labellanguage` VALUES('artsAgain', 1, 'චිත්‍ර');
INSERT INTO `labellanguage` VALUES('assistantPrincipal', 0, 'Assistant Principal');
INSERT INTO `labellanguage` VALUES('assistantPrincipal', 1, 'සහකාර විදුහල්පති');
INSERT INTO `labellanguage` VALUES('BABScBEd', 0, ' BA, BSc, BEd');
INSERT INTO `labellanguage` VALUES('BABScBEd', 1, 'උපාධි හා ඊට සමාන');
INSERT INTO `labellanguage` VALUES('bADegreesorequivalent', 0, 'BA Degrees or equivalent');
INSERT INTO `labellanguage` VALUES('bADegreesorequivalent', 1, 'කල උපාධි හා සමාන උපාධි');
INSERT INTO `labellanguage` VALUES('bAinaForeignLanguageexcludingEnglish', 0, 'BA in a Foreign Language excluding English');
INSERT INTO `labellanguage` VALUES('bAinaForeignLanguageexcludingEnglish', 1, 'විදේශ භාෂා  (ඉංග්‍රීසි හැර)උපාධි');
INSERT INTO `labellanguage` VALUES('bAinArts', 0, 'BA in Arts');
INSERT INTO `labellanguage` VALUES('bAinArts', 1, 'චිත්‍ර කලා උපාධි හා සමාන  ඩිප්ලෝමා');
INSERT INTO `labellanguage` VALUES('bAinDancingorequivalentDip', 0, 'BA in Dancing or equivalent Dip');
INSERT INTO `labellanguage` VALUES('bAinDancingorequivalentDip', 1, 'නැටුම් උපාධි හා සමාන ඩිප්ලෝමා');
INSERT INTO `labellanguage` VALUES('bAinEasternMusicorequivalentDip', 0, 'BA in Eastern Music or equivalent Dip');
INSERT INTO `labellanguage` VALUES('bAinEasternMusicorequivalentDip', 1, 'පෙරදිග සංගීත උපාධි හා සමාන ඩිප්ලෝමා');
INSERT INTO `labellanguage` VALUES('bAinEnglishorequivalent', 0, 'BA in English or equivalent');
INSERT INTO `labellanguage` VALUES('bAinEnglishorequivalent', 1, 'ඉංග්‍රීසි/ඉංග්‍රීසි  විෂයක් ලෙස සමත් උපාධි');
INSERT INTO `labellanguage` VALUES('belowOLevel', 0, 'Below O Level');
INSERT INTO `labellanguage` VALUES('belowOLevel', 1, 'අ.පො.ස(සා.පෙ) ට අඩු');
INSERT INTO `labellanguage` VALUES('bNIEBEd', 0, 'BNIE, BEd');
INSERT INTO `labellanguage` VALUES('bNIEBEd', 1, 'හෝ විශ්ව.වි අද්යපනවේදී උපාධි');
INSERT INTO `labellanguage` VALUES('bscinAgriculture', 0, 'BSc in Agriculture');
INSERT INTO `labellanguage` VALUES('bscinAgriculture', 1, 'කෘෂි විද්‍යා උපාධි');
INSERT INTO `labellanguage` VALUES('bscinBiology', 0, 'BSc in Biology');
INSERT INTO `labellanguage` VALUES('bscinBiology', 1, 'ජීව විද්‍යා උපාධි');
INSERT INTO `labellanguage` VALUES('bscinCombinedMathematics', 0, 'BSc in Combined Mathematics');
INSERT INTO `labellanguage` VALUES('bscinCombinedMathematics', 1, 'සංයුක්ත ගණිතය');
INSERT INTO `labellanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 0, 'BSc in Commerce Business Mgmt Accounting or equivalent Dip');
INSERT INTO `labellanguage` VALUES('bscinCommerceBusinessMgmtAccountingorequivalentDip', 1, 'වානිජ්‍ය/ව්‍යාපාර පරිපාලනය/ගණකාධිකරණය උපාධි හා සමාන උපාධි');
INSERT INTO `labellanguage` VALUES('bscinEducation', 0, 'BSc in Education');
INSERT INTO `labellanguage` VALUES('bscinEducation', 1, 'අධ්‍යාපනවේදී උපාධි(විශ්ව විද්‍යාලයිය)');
INSERT INTO `labellanguage` VALUES('bscinHomeScience', 0, 'BSc in Home Science');
INSERT INTO `labellanguage` VALUES('bscinHomeScience', 1, 'ගෘහ විද්‍යා උපාධි');
INSERT INTO `labellanguage` VALUES('bscinIT', 0, 'BSc in IT');
INSERT INTO `labellanguage` VALUES('bscinIT', 1, 'තොරතුරු තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('bscinPhysics', 0, 'BSc in Physics');
INSERT INTO `labellanguage` VALUES('bscinPhysics', 1, 'භාව්තීය විද්‍යා උපාධි');
INSERT INTO `labellanguage` VALUES('bscinSocialScience', 0, 'Bscin Social Science');
INSERT INTO `labellanguage` VALUES('bscinSocialScience', 1, 'සමාජ විද්‍යා උපාධි');
INSERT INTO `labellanguage` VALUES('bScspecialisationinMathematics', 0, 'BSc Specialisation in Mathematics');
INSERT INTO `labellanguage` VALUES('bScspecialisationinMathematics', 1, 'විශේෂ ගණිත උපාධි');
INSERT INTO `labellanguage` VALUES('bTecConstruction', 0, 'BTec Construction');
INSERT INTO `labellanguage` VALUES('bTecConstruction', 1, 'ඉදිකිරීම් තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('bTecElectronicandElectrical', 0, 'BTec Electronic and Electrical');
INSERT INTO `labellanguage` VALUES('bTecElectronicandElectrical', 1, 'විදුලිය හා ඉලෙක්ට්‍රොනික තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('bTecMechanical', 0, 'BTec Mechanical');
INSERT INTO `labellanguage` VALUES('bTecMechanical', 1, 'යාන්ත්‍රික තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('buddhism', 0, 'Buddhism');
INSERT INTO `labellanguage` VALUES('buddhism', 1, 'බෞද්ධ');
INSERT INTO `labellanguage` VALUES('byClass', 0, 'by Class');
INSERT INTO `labellanguage` VALUES('byClass', 1, 'පන්ති මට්ටමින්');
INSERT INTO `labellanguage` VALUES('byTeacher', 0, 'by Teacher');
INSERT INTO `labellanguage` VALUES('byTeacher', 1, 'ගුරුවරයාගේ නමින්');
INSERT INTO `labellanguage` VALUES('catholic', 0, 'Catholicism');
INSERT INTO `labellanguage` VALUES('catholic', 1, 'කතෝලික');
INSERT INTO `labellanguage` VALUES('certinLibrary', 0, 'Cert. in Library');
INSERT INTO `labellanguage` VALUES('certinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති සහතිකපත්‍ර පාඨමාලාව');
INSERT INTO `labellanguage` VALUES('certinTeacherTrainingAway', 0, 'Cert. in Teacher Training (Away)');
INSERT INTO `labellanguage` VALUES('certinTeacherTrainingAway', 1, 'ගුරු පුහුණු සහතිකය-දුරස්ථ');
INSERT INTO `labellanguage` VALUES('certinTeacherTrainingInstitute', 0, 'Cert. in Teacher Training (Institute)');
INSERT INTO `labellanguage` VALUES('certinTeacherTrainingInstitute', 1, 'ගුරු පුහුණු සහතිකය-ආයතනික');
INSERT INTO `labellanguage` VALUES('chooseOption', 0, 'Choose Option');
INSERT INTO `labellanguage` VALUES('chooseOption', 1, 'විකල්පය තෝරගන්න');
INSERT INTO `labellanguage` VALUES('christianity', 0, 'Christianity');
INSERT INTO `labellanguage` VALUES('christianity', 1, 'ක්‍රිස්තියානි');
INSERT INTO `labellanguage` VALUES('civilStatus', 0, 'Civil Status');
INSERT INTO `labellanguage` VALUES('civilStatus', 1, 'විවාහක /අවිවාහක බව');
INSERT INTO `labellanguage` VALUES('class', 0, 'Class');
INSERT INTO `labellanguage` VALUES('class', 1, 'පන්තිය');
INSERT INTO `labellanguage` VALUES('commerce', 0, 'Commerce');
INSERT INTO `labellanguage` VALUES('commerce', 1, 'වාණිජ්‍ය');
INSERT INTO `labellanguage` VALUES('contactNumber', 0, 'Contact Number');
INSERT INTO `labellanguage` VALUES('contactNumber', 1, 'දුරකථන අංකය');
INSERT INTO `labellanguage` VALUES('contactNumberForEmergency', 0, 'Contact Number for Emergency');
INSERT INTO `labellanguage` VALUES('contactNumberForEmergency', 1, 'හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය');
INSERT INTO `labellanguage` VALUES('contactPersonForEmergency', 0, 'Contact Person for Emergency');
INSERT INTO `labellanguage` VALUES('contactPersonForEmergency', 1, 'හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම');
INSERT INTO `labellanguage` VALUES('contractBasedandOther', 0, 'Contract Based and Other');
INSERT INTO `labellanguage` VALUES('contractBasedandOther', 1, 'කොන්ත්‍රාත් පදනම හා වෙනත් මාර්ග වලින් දීමන ලබන ගුරුවරු');
INSERT INTO `labellanguage` VALUES('counselling', 0, 'Counselling');
INSERT INTO `labellanguage` VALUES('counselling', 1, 'උපදේශනය');
INSERT INTO `labellanguage` VALUES('courseOfStudy', 0, 'Course of Study');
INSERT INTO `labellanguage` VALUES('courseOfStudy', 1, 'වර්ගමාන පත්වීමේ වර්ගීකරණය');
INSERT INTO `labellanguage` VALUES('createTimetableByClass', 0, 'Create Timetable by Class');
INSERT INTO `labellanguage` VALUES('createTimetableByClass', 1, 'පන්තිය විසින් කාලසටහන සැකසුම');
INSERT INTO `labellanguage` VALUES('createTimetableByTeacher', 0, 'Create Timetable by Teacher');
INSERT INTO `labellanguage` VALUES('createTimetableByTeacher', 1, 'ගුරුවරයා විසින් කාලසටහන සැකසුම');
INSERT INTO `labellanguage` VALUES('dancing', 0, 'Dancing');
INSERT INTO `labellanguage` VALUES('dancing', 1, 'නැටුම්');
INSERT INTO `labellanguage` VALUES('date', 0, 'Date');
INSERT INTO `labellanguage` VALUES('date', 1, 'දිනය');
INSERT INTO `labellanguage` VALUES('dateAppointedAsTeacher', 0, 'Date Appointed as Teacher/Principal');
INSERT INTO `labellanguage` VALUES('dateAppointedAsTeacher', 1, 'සේවයට පත්වූ වර්ෂය හා මාසය');
INSERT INTO `labellanguage` VALUES('dateJoinedSchool', 0, 'Date Joined this School');
INSERT INTO `labellanguage` VALUES('dateJoinedSchool', 1, 'මෙම විදුහලේ පත්වීම භාරගත් වර්ෂය හා මාසය');
INSERT INTO `labellanguage` VALUES('dateOfBirth', 0, 'Date of Birth');
INSERT INTO `labellanguage` VALUES('dateOfBirth', 1, 'උපන් දිනය');
INSERT INTO `labellanguage` VALUES('delete', 0, 'Delete');
INSERT INTO `labellanguage` VALUES('delete', 1, 'ඉවත්කරන්න');
INSERT INTO `labellanguage` VALUES('deputyPrincipal', 0, 'Deputy Principal');
INSERT INTO `labellanguage` VALUES('deputyPrincipal', 1, 'නියෝජ්‍ය විදුහල්පති');
INSERT INTO `labellanguage` VALUES('description', 0, 'Description');
INSERT INTO `labellanguage` VALUES('description', 1, 'විස්තරය');
INSERT INTO `labellanguage` VALUES('dipinAgriculture', 0, 'Dip in Agriculture');
INSERT INTO `labellanguage` VALUES('dipinAgriculture', 1, 'කෘෂි අද්‍යාපනය පිළිබද ඩිප්ලෝමාව');
INSERT INTO `labellanguage` VALUES('dipinEASL', 0, 'Dip in EASL');
INSERT INTO `labellanguage` VALUES('dipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ ඩිප්ලෝමා');
INSERT INTO `labellanguage` VALUES('dipinEd', 0, 'Dip in Ed');
INSERT INTO `labellanguage` VALUES('dipinEd', 1, 'පශ්චාත් උපාධි අධ්‍යාපන ඩිප්ලෝමාව');
INSERT INTO `labellanguage` VALUES('dipinLibrary', 0, 'Dip in Library');
INSERT INTO `labellanguage` VALUES('dipinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති ඩිප්ලෝමා පාඨමාලාව');
INSERT INTO `labellanguage` VALUES('easternMusic', 0, 'Eastern Music');
INSERT INTO `labellanguage` VALUES('easternMusic', 1, 'සංගීතය-අපරදිග');
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
INSERT INTO `labellanguage` VALUES('english', 0, 'English');
INSERT INTO `labellanguage` VALUES('english', 1, 'ඉංග්‍රීසි 2001 ට පසු');
INSERT INTO `labellanguage` VALUES('eventCreator', 0, 'Event Creator');
INSERT INTO `labellanguage` VALUES('eventCreator', 1, 'සිදුවීම් නිර්මාණකරු');
INSERT INTO `labellanguage` VALUES('eventId', 0, 'Event ID');
INSERT INTO `labellanguage` VALUES('eventId', 1, 'සිදුවීම් අංකය');
INSERT INTO `labellanguage` VALUES('eventList', 0, 'Event List');
INSERT INTO `labellanguage` VALUES('eventList', 1, 'සිදුවීම් ලැයිස්තුව');
INSERT INTO `labellanguage` VALUES('eventManagement', 0, 'Event Management');
INSERT INTO `labellanguage` VALUES('eventManagement', 1, 'උත්සවය කළමනාකරණය');
INSERT INTO `labellanguage` VALUES('eventName', 0, 'EventName');
INSERT INTO `labellanguage` VALUES('eventName', 1, 'සිදුවීම');
INSERT INTO `labellanguage` VALUES('eventType', 0, 'Event Type');
INSERT INTO `labellanguage` VALUES('eventType', 1, 'සිදුවීම් වර්ගය');
INSERT INTO `labellanguage` VALUES('expand', 0, 'Expand');
INSERT INTO `labellanguage` VALUES('expand', 1, 'වැඩි විස්තර');
INSERT INTO `labellanguage` VALUES('female', 0, 'Female');
INSERT INTO `labellanguage` VALUES('female', 1, 'ගැහැණු');
INSERT INTO `labellanguage` VALUES('foreignLanguageExcludingEnglish', 0, 'Foreign Language Excluding English');
INSERT INTO `labellanguage` VALUES('foreignLanguageExcludingEnglish', 1, 'විදේශ භාෂා (ඉංගිසි හැර)');
INSERT INTO `labellanguage` VALUES('fr', 0, 'F');
INSERT INTO `labellanguage` VALUES('fr', 1, 'සි');
INSERT INTO `labellanguage` VALUES('friday', 0, 'Friday');
INSERT INTO `labellanguage` VALUES('friday', 1, 'සිකුරාදා');
INSERT INTO `labellanguage` VALUES('fullTime', 0, 'Full Time');
INSERT INTO `labellanguage` VALUES('fullTime', 1, 'මෙම පාසලින් වැටුප් ලබනහ පාසලේ පුර්ණ කාලීනව සේවය කරන');
INSERT INTO `labellanguage` VALUES('fullTime_BroughtFromOtherSchool', 0, 'Full Time (Brought from other School)');
INSERT INTO `labellanguage` VALUES('fullTime_BroughtFromOtherSchool', 1, 'වෙනත් පාසලකින් වැටුප් ලබා මෙම පාසලේ පුර්නකලිනවා සේවය කරන ');
INSERT INTO `labellanguage` VALUES('fullTime_ReleasedToOtherSchool', 0, 'Full Time (Released to other School)');
INSERT INTO `labellanguage` VALUES('fullTime_ReleasedToOtherSchool', 1, 'මෙම පාසලින් වැටුප් ලබන හා පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට පුර්නකලිනව නිදහස් කර ඇති');
INSERT INTO `labellanguage` VALUES('gender', 0, 'Gender');
INSERT INTO `labellanguage` VALUES('gender', 1, 'ස්ත්‍රී/පුරුෂ භාවය');
INSERT INTO `labellanguage` VALUES('generalInformation', 0, 'General Information');
INSERT INTO `labellanguage` VALUES('generalInformation', 1, 'සාමාන්‍ය තොරතුරු');
INSERT INTO `labellanguage` VALUES('grade', 0, ' Grade');
INSERT INTO `labellanguage` VALUES('grade', 1, 'වසර');
INSERT INTO `labellanguage` VALUES('graduates', 0, 'Graduates');
INSERT INTO `labellanguage` VALUES('graduates', 1, 'උපාධි');
INSERT INTO `labellanguage` VALUES('healthAndPE', 0, 'Health and P.E.');
INSERT INTO `labellanguage` VALUES('healthAndPE', 1, 'ශාරීරික අද්‍යාපනය');
INSERT INTO `labellanguage` VALUES('healthandPhysicalEducation', 0, 'Health and Physical Education');
INSERT INTO `labellanguage` VALUES('healthandPhysicalEducation', 1, 'ශාරීරික අද්‍යාපනය');
INSERT INTO `labellanguage` VALUES('highestEducationalQualification', 0, 'Highest Educational Qualification');
INSERT INTO `labellanguage` VALUES('highestEducationalQualification', 1, 'ඉහලම අධ්‍යාපන සුදුසුකම');
INSERT INTO `labellanguage` VALUES('highestProfessionalQualification', 0, 'Highest Professional Qualification');
INSERT INTO `labellanguage` VALUES('highestProfessionalQualification', 1, 'ඉහලම වෘත්තීය සුදුසුකම');
INSERT INTO `labellanguage` VALUES('hinduism', 0, 'Hinduism');
INSERT INTO `labellanguage` VALUES('hinduism', 1, 'හින්දු');
INSERT INTO `labellanguage` VALUES('homeScience', 0, 'Home Science');
INSERT INTO `labellanguage` VALUES('homeScience', 1, 'ගෘහ විද්‍යාව');
INSERT INTO `labellanguage` VALUES('indianTamil', 0, 'Indian Tamil');
INSERT INTO `labellanguage` VALUES('indianTamil', 1, 'ඉන්දියානු  දෙමළ');
INSERT INTO `labellanguage` VALUES('informationTechnology', 0, 'Information Technology');
INSERT INTO `labellanguage` VALUES('informationTechnology', 1, 'තොරතරු තාක්ෂනය');
INSERT INTO `labellanguage` VALUES('interval', 0, 'INTERVAL');
INSERT INTO `labellanguage` VALUES('interval', 1, 'විවේක කාලය');
INSERT INTO `labellanguage` VALUES('invitees', 0, 'Invitees');
INSERT INTO `labellanguage` VALUES('invitees', 1, 'ආරාධිතයින්');
INSERT INTO `labellanguage` VALUES('inviteesList', 0, 'Invitees List');
INSERT INTO `labellanguage` VALUES('inviteesList', 1, 'ආරාධිත ලැයිස්තුව');
INSERT INTO `labellanguage` VALUES('islam', 0, 'Islam');
INSERT INTO `labellanguage` VALUES('islam', 1, 'ඉස්ලාම්');
INSERT INTO `labellanguage` VALUES('iT', 0, 'IT');
INSERT INTO `labellanguage` VALUES('iT', 1, 'තොරතුරු තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('keepAttendance', 0, 'Keep Attendance');
INSERT INTO `labellanguage` VALUES('keepAttendance', 1, 'පැමිණීමේ වාර්තාව ');
INSERT INTO `labellanguage` VALUES('leaveManagement', 0, 'Leave Management');
INSERT INTO `labellanguage` VALUES('leaveManagement', 1, 'නිවාඩුව කළමනාකරණය');
INSERT INTO `labellanguage` VALUES('library', 0, 'Library');
INSERT INTO `labellanguage` VALUES('library', 1, 'පුස්තකාල');
INSERT INTO `labellanguage` VALUES('libraryandInformationScience', 0, 'Library and Information Science');
INSERT INTO `labellanguage` VALUES('libraryandInformationScience', 1, 'පුස්තකාල හා තොරතරු විද්‍යාව');
INSERT INTO `labellanguage` VALUES('location', 0, 'Location');
INSERT INTO `labellanguage` VALUES('location', 1, 'ස්ථානය');
INSERT INTO `labellanguage` VALUES('mailDeliveryAddress', 0, 'Postal Address');
INSERT INTO `labellanguage` VALUES('mailDeliveryAddress', 1, 'ලිපිනය');
INSERT INTO `labellanguage` VALUES('mAinEd', 0, 'MA in Ed');
INSERT INTO `labellanguage` VALUES('mAinEd', 1, 'අධ්‍යාපනය පිළිබද ශ්‍රාස්ත්‍රපති උපාධිය');
INSERT INTO `labellanguage` VALUES('malay', 0, 'Malay');
INSERT INTO `labellanguage` VALUES('malay', 1, 'මෞලවි');
INSERT INTO `labellanguage` VALUES('male', 0, 'Male');
INSERT INTO `labellanguage` VALUES('male', 1, 'පිරිමි');
INSERT INTO `labellanguage` VALUES('MAMScMEd', 0, ' MA, MSc, MEd');
INSERT INTO `labellanguage` VALUES('MAMScMEd', 1, 'ශාස්ත්‍රපති හා ඊට සමාන්තර');
INSERT INTO `labellanguage` VALUES('manage', 0, 'Manage');
INSERT INTO `labellanguage` VALUES('manage', 1, 'කළමනාකරණය');
INSERT INTO `labellanguage` VALUES('manageEvents', 0, 'Manage Events');
INSERT INTO `labellanguage` VALUES('manageEvents', 1, 'සිදුවීම් කළමනාකරණය');
INSERT INTO `labellanguage` VALUES('management', 0, 'Management');
INSERT INTO `labellanguage` VALUES('management', 1, 'පරිපාලනය');
INSERT INTO `labellanguage` VALUES('managerList', 0, 'Event Manager List');
INSERT INTO `labellanguage` VALUES('managerList', 1, 'සිදුවීම් කළමනාකරුවන් ලැයිස්තුව');
INSERT INTO `labellanguage` VALUES('managerName', 0, 'Manager Name');
INSERT INTO `labellanguage` VALUES('managerName', 1, 'කළමනාකරුගේ නම');
INSERT INTO `labellanguage` VALUES('married', 0, 'Married');
INSERT INTO `labellanguage` VALUES('married', 1, 'විවාහක');
INSERT INTO `labellanguage` VALUES('maths', 0, 'Maths');
INSERT INTO `labellanguage` VALUES('maths', 1, 'ගණිතය');
INSERT INTO `labellanguage` VALUES('mEd', 0, 'M Ed');
INSERT INTO `labellanguage` VALUES('mEd', 1, 'අධ්‍යාපනපති උපාධි');
INSERT INTO `labellanguage` VALUES('medium', 0, 'Medium');
INSERT INTO `labellanguage` VALUES('medium', 1, 'පත්වීම ලද මාධ්‍යය');
INSERT INTO `labellanguage` VALUES('mo', 0, 'M');
INSERT INTO `labellanguage` VALUES('mo', 1, 'ස');
INSERT INTO `labellanguage` VALUES('monday', 0, 'Monday');
INSERT INTO `labellanguage` VALUES('monday', 1, 'සදුදා');
INSERT INTO `labellanguage` VALUES('MPhil', 0, 'MPhil');
INSERT INTO `labellanguage` VALUES('MPhil', 1, 'දර්ශනපති හා ඊට සමාන්තර');
INSERT INTO `labellanguage` VALUES('mPhilEd', 0, 'MPhil Ed');
INSERT INTO `labellanguage` VALUES('mPhilEd', 1, 'දර්ශනපති -අධ්‍යාපනය පිළිබද');
INSERT INTO `labellanguage` VALUES('mScinEdMgmt', 0, 'MSc in Ed Mgmt');
INSERT INTO `labellanguage` VALUES('mScinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද විද්‍යාපති');
INSERT INTO `labellanguage` VALUES('mScinLibrary', 0, 'MSc in Library');
INSERT INTO `labellanguage` VALUES('mScinLibrary', 1, 'ගුරු පුස්තකාලයාලධිපති විද්‍යාපති උපාධිය');
INSERT INTO `labellanguage` VALUES('name', 0, 'Name');
INSERT INTO `labellanguage` VALUES('name', 1, 'සිදුවීම');
INSERT INTO `labellanguage` VALUES('nameInFull', 0, 'Name in Full');
INSERT INTO `labellanguage` VALUES('nameInFull', 1, 'සම්පුර්ණ නම');
INSERT INTO `labellanguage` VALUES('nameWithInitials', 0, 'Name with Initials');
INSERT INTO `labellanguage` VALUES('nameWithInitials', 1, 'නම් මුලකුරු සමඟ');
INSERT INTO `labellanguage` VALUES('natDipinTeaching', 0, 'Nat Dip in Teaching');
INSERT INTO `labellanguage` VALUES('natDipinTeaching', 1, 'ජාතික ශික්ෂණ විද්‍යා ඩිප්ලෝමාව');
INSERT INTO `labellanguage` VALUES('nationalityRace', 0, 'Race');
INSERT INTO `labellanguage` VALUES('nationalityRace', 1, 'ජනවර්ගය');
INSERT INTO `labellanguage` VALUES('nicNumber', 0, 'NIC Number');
INSERT INTO `labellanguage` VALUES('nicNumber', 1, 'ජාතික හැඳුනුම් පත් අංකය');
INSERT INTO `labellanguage` VALUES('none', 0, 'None');
INSERT INTO `labellanguage` VALUES('none', 1, 'ව්හුර්තීය සුදුසුකම් ලබා නොමැති');
INSERT INTO `labellanguage` VALUES('nonRomanCatholicism', 0, 'Non Roman Catholicism');
INSERT INTO `labellanguage` VALUES('nonRomanCatholicism', 1, 'රෝමානු කතෝලික නොවන ක්‍රිස්තියානි');
INSERT INTO `labellanguage` VALUES('noofinvitees', 0, 'No Of Invitees');
INSERT INTO `labellanguage` VALUES('noofinvitees', 1, 'ආරාධිතයින් ගණන');
INSERT INTO `labellanguage` VALUES('OLevel', 0, ' O Level');
INSERT INTO `labellanguage` VALUES('OLevel', 1, 'අ.පො.ස(සා.පෙ)/හෝ සමාන(O/L)');
INSERT INTO `labellanguage` VALUES('OLevelandOther', 0, ' O Level and Other');
INSERT INTO `labellanguage` VALUES('OLevelandOther', 1, 'අ.පො.ස (ස.පෙ)/වෙනත්');
INSERT INTO `labellanguage` VALUES('onContract_Government', 0, 'On Contract (Government)');
INSERT INTO `labellanguage` VALUES('onContract_Government', 1, 'රජයෙන් වැටුප් ලබන කොන්ත්‍රාත් පදනම මත සේවයට බදවාගත් ');
INSERT INTO `labellanguage` VALUES('onPaidLeave', 0, 'On Paid Leave');
INSERT INTO `labellanguage` VALUES('onPaidLeave', 1, 'වැටුප් සහිත පුර්නකාලින අද්යන නිවාඩු');
INSERT INTO `labellanguage` VALUES('optional', 0, 'Optional');
INSERT INTO `labellanguage` VALUES('optional', 1, 'අතිරේක');
INSERT INTO `labellanguage` VALUES('other', 0, 'Other');
INSERT INTO `labellanguage` VALUES('other', 1, 'වෙනත්');
INSERT INTO `labellanguage` VALUES('otherGovernmentDepartment', 0, 'Other Government Department');
INSERT INTO `labellanguage` VALUES('otherGovernmentDepartment', 1, 'වෙනත් රාජ්‍ය ආයතන වලින් පත්කළ(පොලිස් උපසේවය සමුර්ද්දී,මහවැලි හා දක්ෂිණ ලංකා සංවර්දන අදිකාරී වැනි');
INSERT INTO `labellanguage` VALUES('paidFromSchoolFees', 0, 'Paid from School Fees');
INSERT INTO `labellanguage` VALUES('paidFromSchoolFees', 1, 'පහසුකම් ගාස්තු/ වෙනත් මාර්ග වලින් දීමනා ලබන');
INSERT INTO `labellanguage` VALUES('partTime', 0, 'Part Time');
INSERT INTO `labellanguage` VALUES('partTime', 1, 'මෙම පාසලින් වැටුප් ලබන පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට අර්ධකලිනවා නිදහස් කර ඇති');
INSERT INTO `labellanguage` VALUES('passedMathswithoutadegreeinscience', 0, 'Passed Maths without a degree in science');
INSERT INTO `labellanguage` VALUES('passedMathswithoutadegreeinscience', 1, 'ගණිතය විෂයක් ලෙස සමත් වු විද්‍යා නොවන උපාධි');
INSERT INTO `labellanguage` VALUES('pGDipinEASL', 0, 'PG Dip in EASL');
INSERT INTO `labellanguage` VALUES('pGDipinEASL', 1, 'දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ පශ්චාත් උපාධිඩිප්ලෝමාව');
INSERT INTO `labellanguage` VALUES('pGDipinEdMgmt', 0, 'PG Dip in Ed Mgmt');
INSERT INTO `labellanguage` VALUES('pGDipinEdMgmt', 1, 'අධ්‍යාපන කළමනාකරණය පිළිබද පශ්චාත් උපාධිඩිප්ලෝමාව');
INSERT INTO `labellanguage` VALUES('pGDipinLibraryScience', 0, 'PG Dip in Library Science');
INSERT INTO `labellanguage` VALUES('pGDipinLibraryScience', 1, 'ගුරු පුස්තකාල විද්‍යා පශ්චාත් උපාධි ඩිප්ලෝමා පාඨමාලාව');
INSERT INTO `labellanguage` VALUES('phd', 0, 'PhD');
INSERT INTO `labellanguage` VALUES('phd', 1, 'දර්ශනශුරී උපාධිහා ඊට සමාන්තර');
INSERT INTO `labellanguage` VALUES('phDEd', 0, 'PhD Ed');
INSERT INTO `labellanguage` VALUES('phDEd', 1, 'දර්ශනශුරි - අධ්‍යාපනය පිළිබදව');
INSERT INTO `labellanguage` VALUES('pname', 0, 'Parent Name');
INSERT INTO `labellanguage` VALUES('pname', 1, 'මව/පියා  ගේ නම');
INSERT INTO `labellanguage` VALUES('positionInSchool', 0, 'Position in School');
INSERT INTO `labellanguage` VALUES('positionInSchool', 1, 'පාසලේ දරන තනතුර');
INSERT INTO `labellanguage` VALUES('primary', 0, 'Primary');
INSERT INTO `labellanguage` VALUES('primary', 1, 'ප්‍රාථමික');
INSERT INTO `labellanguage` VALUES('primaryEnglish', 0, 'Primary English');
INSERT INTO `labellanguage` VALUES('primaryEnglish', 1, 'ප්‍රාථමික ඉංග්‍රීසි');
INSERT INTO `labellanguage` VALUES('primaryGeneral', 0, 'Primary General');
INSERT INTO `labellanguage` VALUES('primaryGeneral', 1, 'ප්‍රාථමික/සාමාන්‍ය');
INSERT INTO `labellanguage` VALUES('primaryMultiple', 0, 'Primary Multiple');
INSERT INTO `labellanguage` VALUES('primaryMultiple', 1, 'ප්‍රාථමික පොදු');
INSERT INTO `labellanguage` VALUES('primarySecondLanguage', 0, 'Primary Second Language');
INSERT INTO `labellanguage` VALUES('primarySecondLanguage', 1, 'ප්‍රාථමික දෙවන බස');
INSERT INTO `labellanguage` VALUES('primarySupervisor', 0, 'Primary Supervisor');
INSERT INTO `labellanguage` VALUES('primarySupervisor', 1, 'ප්‍රාථමික (1-5) අධීක්ෂණ ගුරු');
INSERT INTO `labellanguage` VALUES('principal', 0, 'Principal');
INSERT INTO `labellanguage` VALUES('principal', 1, 'විදුහල්පති');
INSERT INTO `labellanguage` VALUES('printTransction', 0, 'Print Transaction Report');
INSERT INTO `labellanguage` VALUES('printTransction', 1, 'ගනුදෙනු වාර්තාව මුද්‍රණය කරන්න');
INSERT INTO `labellanguage` VALUES('prizeGiving', 0, 'Prize Giving Ceremony');
INSERT INTO `labellanguage` VALUES('prizeGiving', 1, 'ත්‍යාග ප්‍රධානෝත්සවය');
INSERT INTO `labellanguage` VALUES('registerStaffMember', 0, 'Register Staff Member');
INSERT INTO `labellanguage` VALUES('registerStaffMember', 1, 'කාර්යමණ්ඩලය ලියාපදිංචිය');
INSERT INTO `labellanguage` VALUES('releasedToOtherInstituteOfficeService', 0, 'Released To Other Institute/Office/Service');
INSERT INTO `labellanguage` VALUES('releasedToOtherInstituteOfficeService', 1, 'වෙනත් ආයතනයකට/කාර්යාලයකට/සේවයකට');
INSERT INTO `labellanguage` VALUES('releasedToOtherSchool', 0, 'Released To Other School');
INSERT INTO `labellanguage` VALUES('releasedToOtherSchool', 1, 'වෙනත් පාසලකට නිදහස් කල');
INSERT INTO `labellanguage` VALUES('religion', 0, 'Religion');
INSERT INTO `labellanguage` VALUES('religion', 1, 'ආගම');
INSERT INTO `labellanguage` VALUES('romanCatholicism', 0, 'Roman Catholicism');
INSERT INTO `labellanguage` VALUES('romanCatholicism', 1, 'රෝමානු කතෝලික');
INSERT INTO `labellanguage` VALUES('salary', 0, 'Salary');
INSERT INTO `labellanguage` VALUES('salary', 1, 'මුළු වැටුප');
INSERT INTO `labellanguage` VALUES('saveEvent', 0, 'Save Event');
INSERT INTO `labellanguage` VALUES('saveEvent', 1, 'සිදුවීම සුරකින්න');
INSERT INTO `labellanguage` VALUES('science', 0, 'Science');
INSERT INTO `labellanguage` VALUES('science', 1, 'විද්‍යාව');
INSERT INTO `labellanguage` VALUES('scienceAndMaths', 0, 'Science And Maths');
INSERT INTO `labellanguage` VALUES('scienceAndMaths', 1, 'විද්‍යා -ගණිත');
INSERT INTO `labellanguage` VALUES('search', 0, 'Search');
INSERT INTO `labellanguage` VALUES('search', 1, 'සොයන්න');
INSERT INTO `labellanguage` VALUES('searchStaffMember', 0, 'Search and Update Details');
INSERT INTO `labellanguage` VALUES('searchStaffMember', 1, 'තොරතුරු සෙවීම හා යාවත්කාලීන කිරීම');
INSERT INTO `labellanguage` VALUES('secondaryArts', 0, 'Secondary Arts');
INSERT INTO `labellanguage` VALUES('secondaryArts', 1, 'ද්විතීයික (6-11) සෞන්දර්ය');
INSERT INTO `labellanguage` VALUES('secondaryEnglish', 0, 'Secondary English');
INSERT INTO `labellanguage` VALUES('secondaryEnglish', 1, 'ද්විතීයික (6-11) ඉංග්‍රීසි');
INSERT INTO `labellanguage` VALUES('secondaryMultiple', 0, 'Secondary Multiple');
INSERT INTO `labellanguage` VALUES('secondaryMultiple', 1, 'ද්විතීයික (6-11) පොදු');
INSERT INTO `labellanguage` VALUES('secondaryScienceMaths', 0, 'Secondary Science Maths');
INSERT INTO `labellanguage` VALUES('secondaryScienceMaths', 1, 'ද්විතීයික (6-11) විද්‍යා/ගණිත');
INSERT INTO `labellanguage` VALUES('secondarySecondLanguage', 0, 'Secondary Second Language');
INSERT INTO `labellanguage` VALUES('secondarySecondLanguage', 1, 'ද්විතීයික (6-11) දෙවන බස');
INSERT INTO `labellanguage` VALUES('secondarySupervisor', 0, 'Secondary Supervisor');
INSERT INTO `labellanguage` VALUES('secondarySupervisor', 1, 'ද්විතීයික (6-11) අධීක්ෂණ ගුරු');
INSERT INTO `labellanguage` VALUES('secondaryTechnology', 0, 'Secondary Technology');
INSERT INTO `labellanguage` VALUES('secondaryTechnology', 1, 'ද්විතීයික (6-11)තාක්ෂණික');
INSERT INTO `labellanguage` VALUES('section', 0, 'Section');
INSERT INTO `labellanguage` VALUES('section', 1, 'නිරතවන කාර්යය');
INSERT INTO `labellanguage` VALUES('serviceGrade', 0, 'Service Grade');
INSERT INTO `labellanguage` VALUES('serviceGrade', 1, 'අදාල සේවය/ශ්‍රේණිය');
INSERT INTO `labellanguage` VALUES('sid', 0, 'Admission No');
INSERT INTO `labellanguage` VALUES('sid', 1, 'ඇතුලත්වීමේ අංකය');
INSERT INTO `labellanguage` VALUES('sinhala', 0, 'Sinhala');
INSERT INTO `labellanguage` VALUES('sinhala', 1, 'සිංහල');
INSERT INTO `labellanguage` VALUES('socialStudies', 0, 'Social Studies');
INSERT INTO `labellanguage` VALUES('socialStudies', 1, 'සමාජ අධ්‍යනය');
INSERT INTO `labellanguage` VALUES('specialEducation', 0, 'Special Education');
INSERT INTO `labellanguage` VALUES('specialEducation', 1, 'විශේෂ අධ්‍යාපනය');
INSERT INTO `labellanguage` VALUES('sportMeet', 0, 'Sports Meet');
INSERT INTO `labellanguage` VALUES('sportMeet', 1, 'ක්‍රීඩා උත්සවය');
INSERT INTO `labellanguage` VALUES('sriLankaEducationAdministrativeServiceI', 0, 'Sri Lanka Education Administrative Service I');
INSERT INTO `labellanguage` VALUES('sriLankaEducationAdministrativeServiceI', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ I(SLEAS I)');
INSERT INTO `labellanguage` VALUES('sriLankaEducationAdministrativeServiceII', 0, 'Sri Lanka Education Administrative Service I I');
INSERT INTO `labellanguage` VALUES('sriLankaEducationAdministrativeServiceII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ II(SLEAS II)');
INSERT INTO `labellanguage` VALUES('SriLankaEducationAdministrativeServiceIII', 0, ' Sri Lanka Education Administrative Service I I I');
INSERT INTO `labellanguage` VALUES('SriLankaEducationAdministrativeServiceIII', 1, 'ශ්‍රී ලංකා අධ්‍යා. ප. සේ III(SLEAS III)');
INSERT INTO `labellanguage` VALUES('srilankanMuslim', 0, 'Sri Lankan Muslim');
INSERT INTO `labellanguage` VALUES('srilankanMuslim', 1, 'ශ්‍රී ලාංකික මුස්ලිම්');
INSERT INTO `labellanguage` VALUES('srilankanTamil', 0, 'Sri Lankan Tamil');
INSERT INTO `labellanguage` VALUES('srilankanTamil', 1, 'ශ්‍රී ලාංකික දෙමළ');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService2I', 0, 'Sri Lanka Principal Service 2 I');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService2I', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-I(SLPS 2-I)');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService2II', 0, 'Sri Lanka Principal Service 2 I I');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService2II', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. 2-II(SLPS 2-II)');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService3', 0, 'Sri Lanka Principal Service 3');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalService3', 1, 'ශ්‍රී ලංකා විහාල්පති සේ.3(SLPS 3)');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalServiceI', 0, 'Sri Lanka Principal Service I');
INSERT INTO `labellanguage` VALUES('sriLankaPrincipalServiceI', 1, 'ශ්‍රී ලංකා විහාල්පති සේ. I(SLPS I)');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService2I', 0, 'Sri Lanka Teacher Service 2 I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService2I', 1, 'ශ්‍රී ලංකා ගුරු සේ  2-I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService2II', 0, 'Sri Lanka Teacher Service 2 I I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService2II', 1, 'ශ්‍රී ලංකා ගුරු සේ 2-II');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService3I', 0, 'Sri Lanka Teacher Service 3 I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService3I', 1, 'ශ්‍රී ලංකා ගුරු සේ  3-I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService3II', 0, 'Sri Lanka Teacher Service 3 I I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherService3II', 1, 'ශ්‍රී ලංකා ගුරු සේ 3-II');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherServiceI', 0, 'Sri Lanka Teacher Service I');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherServiceI', 1, 'ශ්‍රී ලංකා ගුරු සේ I ');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherServicePending', 0, 'Sri Lanka Teacher Service Pending');
INSERT INTO `labellanguage` VALUES('sriLankaTeacherServicePending', 1, 'ශ්‍රී ලංකා ගුරු සේවයට අන්තර්ග්‍රහණය කර නොමැත');
INSERT INTO `labellanguage` VALUES('staffAdvisorFullTime', 0, 'Staff Advisor (Full-Time)');
INSERT INTO `labellanguage` VALUES('staffAdvisorFullTime', 1, 'ගුරු උපදේශක (පුර්නකාලින)');
INSERT INTO `labellanguage` VALUES('staffAdvisorPartTime', 0, 'Staff Advisor (Part-Time)');
INSERT INTO `labellanguage` VALUES('staffAdvisorPartTime', 1, 'ගුරු උපදේශක (අර්ධකාලින)');
INSERT INTO `labellanguage` VALUES('staffID', 0, 'Staff ID');
INSERT INTO `labellanguage` VALUES('staffID', 1, 'අනුක්‍රමික අංකය');
INSERT INTO `labellanguage` VALUES('staffManagement', 0, 'Staff Details');
INSERT INTO `labellanguage` VALUES('staffManagement', 1, 'කාර්යමණ්ඩල තොරතුරු');
INSERT INTO `labellanguage` VALUES('staffregistrationform', 0, 'Staff Registration Form');
INSERT INTO `labellanguage` VALUES('staffregistrationform', 1, 'පාසලේ අධ්‍යන කාර්ය මණ්ඩලවල තොරතුරු');
INSERT INTO `labellanguage` VALUES('staffTimetable', 0, 'Teacher''s Timetable');
INSERT INTO `labellanguage` VALUES('staffTimetable', 1, 'ගුරුවරුන්ගේ කාලසටහන');
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
INSERT INTO `labellanguage` VALUES('tamil', 0, 'Tamil');
INSERT INTO `labellanguage` VALUES('tamil', 1, 'දෙමළ');
INSERT INTO `labellanguage` VALUES('teacher', 0, 'Teacher');
INSERT INTO `labellanguage` VALUES('teacher', 1, 'ගුරුවරයා');
INSERT INTO `labellanguage` VALUES('teacherDay', 0, 'Teacher''s Day');
INSERT INTO `labellanguage` VALUES('teacherDay', 1, 'ගුරු දිනය');
INSERT INTO `labellanguage` VALUES('teachersName', 0, 'Teacher''s Name');
INSERT INTO `labellanguage` VALUES('teachersName', 1, 'ගුරුවරයාගේ නම');
INSERT INTO `labellanguage` VALUES('technology', 0, 'Technology');
INSERT INTO `labellanguage` VALUES('technology', 1, 'තාක්ෂණය');
INSERT INTO `labellanguage` VALUES('th', 0, 'T');
INSERT INTO `labellanguage` VALUES('th', 1, 'බ්‍ර');
INSERT INTO `labellanguage` VALUES('theatreandDrama', 0, 'Theatre and Drama');
INSERT INTO `labellanguage` VALUES('theatreandDrama', 1, 'නාට්‍ය හා රංග කලාව');
INSERT INTO `labellanguage` VALUES('thursday', 0, 'Thursday');
INSERT INTO `labellanguage` VALUES('thursday', 1, 'බ්‍රහස්පතින්දා');
INSERT INTO `labellanguage` VALUES('tid', 0, 'Transaction ID');
INSERT INTO `labellanguage` VALUES('tid', 1, 'ගනුදෙනු අංකය');
INSERT INTO `labellanguage` VALUES('time', 0, 'Time');
INSERT INTO `labellanguage` VALUES('time', 1, 'වේලාව');
INSERT INTO `labellanguage` VALUES('Timetables', 0, 'Timetables');
INSERT INTO `labellanguage` VALUES('Timetables', 1, 'කාලසටහන');
INSERT INTO `labellanguage` VALUES('tlog', 0, 'Transaction Log');
INSERT INTO `labellanguage` VALUES('tlog', 1, 'ගනුදෙනු සටහන');
INSERT INTO `labellanguage` VALUES('trecieved', 0, 'Total Recieved');
INSERT INTO `labellanguage` VALUES('trecieved', 1, 'ලබාගත් මුළු මුදල');
INSERT INTO `labellanguage` VALUES('tspent', 0, 'Total Spent');
INSERT INTO `labellanguage` VALUES('tspent', 1, 'වියදම් කල මුළු මුදල');
INSERT INTO `labellanguage` VALUES('tu', 0, 'T');
INSERT INTO `labellanguage` VALUES('tu', 1, 'අ');
INSERT INTO `labellanguage` VALUES('tuesday', 0, 'Tuesday');
INSERT INTO `labellanguage` VALUES('tuesday', 1, 'අගහරුවදා');
INSERT INTO `labellanguage` VALUES('type', 0, 'Type');
INSERT INTO `labellanguage` VALUES('type', 1, 'වර්ගය');
INSERT INTO `labellanguage` VALUES('unmarried', 0, 'Not Married');
INSERT INTO `labellanguage` VALUES('unmarried', 1, 'අවිවාහක');
INSERT INTO `labellanguage` VALUES('update', 0, 'Update');
INSERT INTO `labellanguage` VALUES('update', 1, 'යාවත්කාලින කරන්න');
INSERT INTO `labellanguage` VALUES('viewInvitees', 0, 'View Invitees List');
INSERT INTO `labellanguage` VALUES('viewInvitees', 1, 'ආරාධිත ලැයිස්තුව බලන්න');
INSERT INTO `labellanguage` VALUES('viewLeaveHistory', 0, 'View Leave History');
INSERT INTO `labellanguage` VALUES('viewLeaveHistory', 1, 'ඉකුත් වූ නිවාඩු');
INSERT INTO `labellanguage` VALUES('we', 0, 'W');
INSERT INTO `labellanguage` VALUES('we', 1, 'බ');
INSERT INTO `labellanguage` VALUES('wednesday', 0, 'Wednesday');
INSERT INTO `labellanguage` VALUES('wednesday', 1, 'බදාදා');
INSERT INTO `labellanguage` VALUES('week', 0, ' Week');
INSERT INTO `labellanguage` VALUES('week', 1, 'සතිය');
INSERT INTO `labellanguage` VALUES('westernMusic', 0, 'Western Music');
INSERT INTO `labellanguage` VALUES('westernMusic', 1, 'සංගීතය-පෙරදිග');
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

--
-- Dumping data for table `leavedata`
--

INSERT INTO `leavedata` VALUES('1', 0, 0, 0, 0);
INSERT INTO `leavedata` VALUES('10', -1, -1, -15, 0);
INSERT INTO `leavedata` VALUES('11', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('12', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('13', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('14', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('15', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('16', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('2', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('3', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('4', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('5', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('6', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('7', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('8', 15, 90, 15, 0);
INSERT INTO `leavedata` VALUES('9', 15, 90, 15, 0);

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
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permDesc` varchar(50) NOT NULL,
  `orderKey` int(11) DEFAULT '0',
  PRIMARY KEY (`permId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` VALUES(1, 'Administration Panel', 70);
INSERT INTO `permissions` VALUES(2, 'Staff Details System', 0);
INSERT INTO `permissions` VALUES(3, 'Leave Management System', 10);
INSERT INTO `permissions` VALUES(4, 'Leave Application', 11);
INSERT INTO `permissions` VALUES(5, 'Leave Approval', 11);
INSERT INTO `permissions` VALUES(6, 'Timetables System', 20);
INSERT INTO `permissions` VALUES(7, 'Classteacher Allocation', 21);
INSERT INTO `permissions` VALUES(8, 'Substitute Teacher', 21);
INSERT INTO `permissions` VALUES(9, 'Student Information System', 30);
INSERT INTO `permissions` VALUES(10, 'Student Registration', 31);
INSERT INTO `permissions` VALUES(11, 'Search Student', 31);
INSERT INTO `permissions` VALUES(12, 'Event Management System', 40);
INSERT INTO `permissions` VALUES(13, 'Add Event', 41);
INSERT INTO `permissions` VALUES(14, 'Attendance System', 50);
INSERT INTO `permissions` VALUES(15, 'Keep Attendance', 51);
INSERT INTO `permissions` VALUES(16, 'View Attendance', 51);
INSERT INTO `permissions` VALUES(17, 'Marks and Grading System', 60);
INSERT INTO `permissions` VALUES(18, 'Enter O/A Level Examination Grades', 61);
INSERT INTO `permissions` VALUES(19, 'Enter Term Test Marks', 61);
INSERT INTO `permissions` VALUES(20, 'Search Grades', 61);
INSERT INTO `permissions` VALUES(21, 'Staff Report', 1);
INSERT INTO `permissions` VALUES(22, 'Manage Users', 71);
INSERT INTO `permissions` VALUES(23, 'Change Staff Details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roleperm`
--

CREATE TABLE IF NOT EXISTS `roleperm` (
  `roleId` int(10) unsigned NOT NULL,
  `permId` int(10) unsigned NOT NULL,
  KEY `roleId` (`roleId`),
  KEY `permId` (`permId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roleperm`
--

INSERT INTO `roleperm` VALUES(4, 13);
INSERT INTO `roleperm` VALUES(4, 14);
INSERT INTO `roleperm` VALUES(4, 19);
INSERT INTO `roleperm` VALUES(4, 12);
INSERT INTO `roleperm` VALUES(4, 15);
INSERT INTO `roleperm` VALUES(4, 4);
INSERT INTO `roleperm` VALUES(4, 3);
INSERT INTO `roleperm` VALUES(4, 17);
INSERT INTO `roleperm` VALUES(4, 20);
INSERT INTO `roleperm` VALUES(4, 11);
INSERT INTO `roleperm` VALUES(4, 9);
INSERT INTO `roleperm` VALUES(4, 6);
INSERT INTO `roleperm` VALUES(4, 16);
INSERT INTO `roleperm` VALUES(3, 2);
INSERT INTO `roleperm` VALUES(3, 21);
INSERT INTO `roleperm` VALUES(3, 3);
INSERT INTO `roleperm` VALUES(3, 4);
INSERT INTO `roleperm` VALUES(3, 5);
INSERT INTO `roleperm` VALUES(3, 6);
INSERT INTO `roleperm` VALUES(3, 7);
INSERT INTO `roleperm` VALUES(3, 8);
INSERT INTO `roleperm` VALUES(3, 9);
INSERT INTO `roleperm` VALUES(3, 11);
INSERT INTO `roleperm` VALUES(3, 12);
INSERT INTO `roleperm` VALUES(3, 13);
INSERT INTO `roleperm` VALUES(3, 14);
INSERT INTO `roleperm` VALUES(3, 16);
INSERT INTO `roleperm` VALUES(3, 17);
INSERT INTO `roleperm` VALUES(3, 20);
INSERT INTO `roleperm` VALUES(1, 2);
INSERT INTO `roleperm` VALUES(1, 23);
INSERT INTO `roleperm` VALUES(1, 21);
INSERT INTO `roleperm` VALUES(1, 3);
INSERT INTO `roleperm` VALUES(1, 4);
INSERT INTO `roleperm` VALUES(1, 5);
INSERT INTO `roleperm` VALUES(1, 6);
INSERT INTO `roleperm` VALUES(1, 8);
INSERT INTO `roleperm` VALUES(1, 7);
INSERT INTO `roleperm` VALUES(1, 9);
INSERT INTO `roleperm` VALUES(1, 10);
INSERT INTO `roleperm` VALUES(1, 11);
INSERT INTO `roleperm` VALUES(1, 12);
INSERT INTO `roleperm` VALUES(1, 13);
INSERT INTO `roleperm` VALUES(1, 14);
INSERT INTO `roleperm` VALUES(1, 15);
INSERT INTO `roleperm` VALUES(1, 16);
INSERT INTO `roleperm` VALUES(1, 17);
INSERT INTO `roleperm` VALUES(1, 20);
INSERT INTO `roleperm` VALUES(1, 19);
INSERT INTO `roleperm` VALUES(1, 18);
INSERT INTO `roleperm` VALUES(1, 1);
INSERT INTO `roleperm` VALUES(1, 22);
INSERT INTO `roleperm` VALUES(2, 2);
INSERT INTO `roleperm` VALUES(2, 23);
INSERT INTO `roleperm` VALUES(2, 21);
INSERT INTO `roleperm` VALUES(2, 3);
INSERT INTO `roleperm` VALUES(2, 4);
INSERT INTO `roleperm` VALUES(2, 5);
INSERT INTO `roleperm` VALUES(2, 6);
INSERT INTO `roleperm` VALUES(2, 8);
INSERT INTO `roleperm` VALUES(2, 7);
INSERT INTO `roleperm` VALUES(2, 1);
INSERT INTO `roleperm` VALUES(5, 2);
INSERT INTO `roleperm` VALUES(5, 23);
INSERT INTO `roleperm` VALUES(5, 21);
INSERT INTO `roleperm` VALUES(5, 3);
INSERT INTO `roleperm` VALUES(5, 4);
INSERT INTO `roleperm` VALUES(5, 6);
INSERT INTO `roleperm` VALUES(5, 8);
INSERT INTO `roleperm` VALUES(5, 7);
INSERT INTO `roleperm` VALUES(5, 9);
INSERT INTO `roleperm` VALUES(5, 10);
INSERT INTO `roleperm` VALUES(5, 11);
INSERT INTO `roleperm` VALUES(5, 12);
INSERT INTO `roleperm` VALUES(5, 13);
INSERT INTO `roleperm` VALUES(5, 14);
INSERT INTO `roleperm` VALUES(5, 15);
INSERT INTO `roleperm` VALUES(5, 16);
INSERT INTO `roleperm` VALUES(5, 17);
INSERT INTO `roleperm` VALUES(5, 20);
INSERT INTO `roleperm` VALUES(5, 19);
INSERT INTO `roleperm` VALUES(5, 18);
INSERT INTO `roleperm` VALUES(5, 1);
INSERT INTO `roleperm` VALUES(6, 2);
INSERT INTO `roleperm` VALUES(6, 23);
INSERT INTO `roleperm` VALUES(6, 21);
INSERT INTO `roleperm` VALUES(6, 3);
INSERT INTO `roleperm` VALUES(6, 4);
INSERT INTO `roleperm` VALUES(6, 5);
INSERT INTO `roleperm` VALUES(6, 6);
INSERT INTO `roleperm` VALUES(6, 8);
INSERT INTO `roleperm` VALUES(6, 7);
INSERT INTO `roleperm` VALUES(6, 9);
INSERT INTO `roleperm` VALUES(6, 10);
INSERT INTO `roleperm` VALUES(6, 11);
INSERT INTO `roleperm` VALUES(6, 12);
INSERT INTO `roleperm` VALUES(6, 13);
INSERT INTO `roleperm` VALUES(6, 14);
INSERT INTO `roleperm` VALUES(6, 15);
INSERT INTO `roleperm` VALUES(6, 16);
INSERT INTO `roleperm` VALUES(6, 17);
INSERT INTO `roleperm` VALUES(6, 20);
INSERT INTO `roleperm` VALUES(6, 19);
INSERT INTO `roleperm` VALUES(6, 18);
INSERT INTO `roleperm` VALUES(6, 1);
INSERT INTO `roleperm` VALUES(6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` VALUES(1, 'Full Control');
INSERT INTO `roles` VALUES(2, 'Single User');
INSERT INTO `roles` VALUES(3, 'Principal');
INSERT INTO `roles` VALUES(4, 'Teacher');
INSERT INTO `roles` VALUES(5, 'Date Entry Operator');
INSERT INTO `roles` VALUES(6, 'Administrator');

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

INSERT INTO `staff` VALUES('1', 'Vimukthi Joseph', '2014-08-13', 1, 3, 1, 1, '123456789V', 'Makola', '0714569232', '2014-08-18', '2014-08-19', 2, 3, 1, 1, 1, 1, 1, 10000, 1, 1, 1, 0);
INSERT INTO `staff` VALUES('10', 'Amritha Alston', '2014-08-26', 2, 4, 1, 1, '123456789V', 'Makola', '0756489326', '2014-08-06', '2014-08-30', 3, 1, 5, 6, 1, 1, 2, 70000, 2, 2, 2, 0);
INSERT INTO `staff` VALUES('11', 'Bihara De Silva', '2014-08-26', 2, 2, 1, 1, '923578963V', 'Kollupitiya', '0785693214', '2014-08-25', '2014-08-03', 2, 2, 1, 1, 1, 1, 1, 45000, 3, 3, 3, 0);
INSERT INTO `staff` VALUES('12', 'Chathuri Perera', '0081-08-02', 2, 1, 3, 3, '814562395V', 'Negombo', '0774379658', '2014-08-26', '2014-08-23', 2, 2, 2, 2, 1, 1, 5, 28000, 5, 5, 51, 0);
INSERT INTO `staff` VALUES('13', 'Anthony Ashan', '1987-01-21', 1, 1, 2, 1, '123456789V', 'Negombo', '0777777777', '2014-08-07', '2014-08-14', 1, 1, 1, 1, 1, 1, 1, 123, 1, 12, 55, 0);
INSERT INTO `staff` VALUES('14', 'Tharindu Madusha Mendis', '1993-02-03', 1, 1, 4, 1, '543345543V', 'Kollupitiya', '098789123', '2000-08-02', '2001-09-09', 1, 1, 6, 19, 2, 3, 13, 17000, 3, 18, 41, 0);
INSERT INTO `staff` VALUES('15', 'Sahan Malinga Tissera', '1993-02-02', 1, 1, 4, 1, '932470039V', 'Kollupitiya', '0712624222', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 17000, 3, 19, 17, 0);
INSERT INTO `staff` VALUES('16', 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '0776536611', '2011-12-01', '2014-12-01', 1, 1, 1, 14, 3, 7, 4, 25000, 4, 1, 19, 0);
INSERT INTO `staff` VALUES('2', 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '912587692V', 'kottawa', '07145236', '2014-08-19', '2014-08-14', 1, 2, 2, 2, 2, 2, 0, 30000, 1, 2, 2, 0);
INSERT INTO `staff` VALUES('3', 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '936257891V', 'narammala', '0714563298', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 35000, 2, 2, 4, 0);
INSERT INTO `staff` VALUES('4', 'Madhusha Mendis', '2014-08-27', 2, 1, 1, 1, '936541278V', 'moratuwa paradai', '0711701236', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 96000, 1, 10, 57, 0);
INSERT INTO `staff` VALUES('5', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879V', 'kurunegala', '011296875', '2014-08-27', '2014-08-29', 2, 2, 2, 2, 2, 2, 2, 45000, 1, 10, 10, 0);
INSERT INTO `staff` VALUES('6', 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '958964525V', 'wellawattha', '071456932', '2014-08-13', '2014-08-22', 5, 3, 1, 1, 1, 1, 1, 98623, 3, 4, 10, 0);
INSERT INTO `staff` VALUES('7', 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745V', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 6, 1, 1, 1, 1, 10000, 3, 7, 45, 0);
INSERT INTO `staff` VALUES('8', 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '012236598', '2014-07-09', '2014-08-15', 3, 3, 2, 2, 3, 1, 1, 201369, 2, 1, 33, 0);
INSERT INTO `staff` VALUES('9', 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '456321845V', 'wellawattha', '0112968756', '2014-08-20', '2014-08-29', 4, 3, 6, 6, 2, 2, 5, 45000, 4, 6, 8, 0);

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

INSERT INTO `student` VALUES('1', 'Madusha', '2000-12-12', 1, 1, 1, 'Here', 12, 'B', 'Blue', 0);
INSERT INTO `student` VALUES('12325', 'B.T.M Mendia', '1993-12-01', 1, 1, 1, 'Moratuwa', 11, 'A', 'Shantha', 0);
INSERT INTO `student` VALUES('12345', 'J.A.I Jayakody', '1993-12-31', 1, 1, 1, 'Colombo', 11, 'A', 'Surya', 0);
INSERT INTO `student` VALUES('2', 'Peiris M.S.E', '1993-09-03', 1, 1, 1, 'kolpity', 11, 'C', 'Green', 0);
INSERT INTO `student` VALUES('23247', 'Sanchayan Balayan', '1991-01-01', 1, 1, 1, 'Wellawattha', 11, 'B', 'Surya', 0);
INSERT INTO `student` VALUES('23415', 'Upeka tisser', '1990-12-23', 1, 1, 1, 'Wadduwa', 11, 'B', 'Surya', 0);
INSERT INTO `student` VALUES('24242', 'Yazdaan Mohamed', '1995-12-30', 4, 3, 1, 'Nugegoda', 11, 'B', 'Shantha', 0);
INSERT INTO `student` VALUES('3', 'Isuru Jayakody', '1993-01-21', 1, 1, 1, 'Kollupitiya', 11, 'A', 'Blue', 0);
INSERT INTO `student` VALUES('32424', 'sahan tissera', '1991-12-02', 1, 1, 1, 'Angoda', 11, 'B', 'Shantha', 0);
INSERT INTO `student` VALUES('43435', 'Venusha Ranaviraj', '1993-12-21', 1, 1, 1, 'Ganemulla', 11, 'A', 'veera', 0);
INSERT INTO `student` VALUES('43536', 'Dulip Rathnayaka', '1991-12-31', 1, 1, 1, 'Kottawa', 11, 'A', 'Su', 0);
INSERT INTO `student` VALUES('43568', 'M.C Liyanage', '1994-12-31', 1, 1, 1, 'Borella', 11, 'B', 'veera', 0);
INSERT INTO `student` VALUES('45678', 'Janith Heshan', '1989-12-31', 1, 1, 1, 'Rajagiriya', 11, 'A', 'Surya', 0);
INSERT INTO `student` VALUES('54645', 'Darsha Fonseka', '1989-12-31', 1, 1, 1, 'kolpity', 11, 'B', 'Methta', 0);
INSERT INTO `student` VALUES('54646', 'Devni Indula', '1991-11-28', 1, 1, 1, 'Panadura', 11, 'B', 'Surya', 0);
INSERT INTO `student` VALUES('64558', 'Niruthi Yogalingam', '1995-12-30', 1, 1, 1, 'negombo', 11, 'B', 'Shantha', 0);
INSERT INTO `student` VALUES('65578', ' Sampath Jayasundara', '1991-12-01', 1, 1, 1, 'negombo', 11, 'A', 'Methta', 0);
INSERT INTO `student` VALUES('65758', 'Ashan Asela', '2005-01-31', 1, 1, 1, 'Dehiwala', 11, 'B', 'Surya', 0);
INSERT INTO `student` VALUES('65784', 'Mevanka Roshali', '1993-11-30', 1, 1, 1, 'Dehiwala', 11, 'A', 'veera', 0);
INSERT INTO `student` VALUES('75638', 'Jane Arathy', '1993-11-29', 1, 1, 1, 'Kotahena', 11, 'B', 'Methta', 0);
INSERT INTO `student` VALUES('75857', 'Gihan Jayawardena', '1988-12-31', 1, 1, 1, 'kolpity', 11, 'A', 'Methta', 0);
INSERT INTO `student` VALUES('76954', 'Raneesha Peiries', '1994-12-31', 1, 1, 1, 'Wellawattha', 11, 'A', 'Shantha', 0);

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
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` VALUES(1, 'Science');
INSERT INTO `subject` VALUES(2, 'English');
INSERT INTO `subject` VALUES(3, 'Physics');
INSERT INTO `subject` VALUES(4, 'Mechanics');
INSERT INTO `subject` VALUES(5, 'Chemistry');

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
INSERT INTO `timetable` VALUES(1, 'B', 0, 2, 'English', '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '1', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '1', 0);
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
INSERT INTO `timetable` VALUES(10, 'B', 0, 3, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 7, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 6, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 1, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 7, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 2, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 3, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 4, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 3, 'Business Studies', '11', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '11', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 5, 'Business Studies', '11', 0);
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
INSERT INTO `timetable` VALUES(11, 'B', 0, 0, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'B', 0, 1, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 0, 2, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 0, 3, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 0, 4, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 0, 5, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 1, 0, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 1, 5, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 1, 6, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'B', 1, 7, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 2, 2, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 2, 3, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'B', 3, 3, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'B', 3, 4, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'B', 3, 5, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 4, 1, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(11, 'C', 4, 2, 'Mechanics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '13', 0);
INSERT INTO `timetable` VALUES(11, 'A', 4, 4, 'Physics', '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '13', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 0, 2, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 0, 3, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 0, 4, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 0, 5, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 1, 1, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 1, 2, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 1, 6, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 1, 7, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 2, 0, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 2, 1, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 2, 4, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 2, 5, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 3, 0, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'B', 3, 1, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 3, 2, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'A', 3, 3, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '14', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 4, 0, 'Chemistry', '14', 0);
INSERT INTO `timetable` VALUES(11, 'C', 4, 1, 'Chemistry', '14', 0);
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
INSERT INTO `timetable` VALUES(10, 'A', 0, 0, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 1, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 0, 6, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 0, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 4, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 0, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 3, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 0, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 2, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 3, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 0, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '2', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 7, 'Maths', '2', 0);
INSERT INTO `timetable` VALUES(10, 'B', 0, 0, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 2, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 0, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 1, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 7, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 0, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 6, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 0, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 6, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 7, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 0, 'Sinhala', '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '3', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '3', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 6, 'Sinhala', '3', 0);
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
INSERT INTO `timetable` VALUES(10, 'B', 0, 1, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 3, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 2, 'History', '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 3, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 5, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 7, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 1, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 4, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 4, 'History', '5', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 5, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 1, 'History', '5', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 2, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 4, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 6, NULL, '5', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 7, 'History', '5', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 0, 2, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 5, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 6, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 7, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 1, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 3, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 4, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 5, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 2, 'English', '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 3, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 4, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 5, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 6, 'English', '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 7, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 1, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 3, 5, 'English', '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 6, '', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 3, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 4, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 5, NULL, '6', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 6, 'English', '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 7, NULL, '6', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 0, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 1, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 2, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 3, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 4, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'A', 0, 5, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 0, 6, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'B', 0, 7, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 0, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 1, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 2, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'B', 1, 3, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 4, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(10, 'A', 1, 5, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 6, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 1, 7, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 0, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 1, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 2, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 3, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'A', 2, 4, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(10, 'B', 2, 5, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 6, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 2, 7, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 0, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'B', 3, 1, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 1, NULL, '7', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 2, NULL, '7', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 3, 'Information Technology', '7', 0);
INSERT INTO `timetable` VALUES(10, 'B', 4, 4, 'Information Technology', '7', 0);
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
INSERT INTO `timetable` VALUES(10, 'A', 3, 1, 'Science', '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 2, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 3, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 4, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 5, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 6, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 3, 7, NULL, '8', 0);
INSERT INTO `timetable` VALUES(NULL, NULL, 4, 0, NULL, '8', 0);
INSERT INTO `timetable` VALUES(10, 'A', 4, 1, 'Science', '8', 0);
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

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` VALUES(4, 1, '0000-00-00', b'0', 10000, 'mhh', 0);

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
INSERT INTO `user` VALUES('2', '$2y$10$j2OPfAK2iscZeNekVZI.De0vU0mWM95twxpw3YR9vIh8WRdUTbcgy', 2, 0);
INSERT INTO `user` VALUES('3', '$2y$10$9TzLUSkZK//R2XZJ5g/v8.wqTOETyDvN2mFwZNZEzV8YULcbc5LVq', 3, 0);
INSERT INTO `user` VALUES('4', '$2y$10$r3ONGFKCYhWaKHdNoDxVvuTP6OfJWeIP0R7W0FCwcVjalqN5L56.y', 4, 0);
INSERT INTO `user` VALUES('5', '$2y$10$n1zZypLDD9B4dLij.5F4zOMKFAwXHs1dgCiAsLqw41mZ0e2yt8qkq', 5, 0);
INSERT INTO `user` VALUES('6', '$2y$10$bEEmPUWM39wrJZTqzMe.KeJHMrs15xiGsMhxipx31b20yAXaEo/la', 6, 0);
INSERT INTO `user` VALUES('a', '$2y$10$h01VyUflSOarmJs5H98.Wem2.0UIj8WdUC/Sayxa8BVKAOBvUFUfm', 1, 0);
INSERT INTO `user` VALUES('ab', '$2y$10$8Az470QmxIuRqy5a6TNmfOiYKvPoJmUSvo08m9CfC6F6PpXKyWEoe', 2, 2);
INSERT INTO `user` VALUES('abc', '$2y$10$3TeoYC5i/ROkO.ZC6nomLeniQ/PYn1jbkxw4hKm5wbO8LZoduMshK', 1, 2);
INSERT INTO `user` VALUES('alimudeen', '$2y$10$qu/g54MkhYm0ih3eB23HlujlRxIrJ7rEODi6tDkPO1dYMvS.5p5yq', 2, 0);
INSERT INTO `user` VALUES('apple', '$2y$10$X67s43KjvUygW5GVeoStCOFVylBbXsUeyD2e6EKCMMUEjxqcEsIFa', 1, 2);
INSERT INTO `user` VALUES('arabic@gmail.com', '$2y$10$hVONYOoTGLmmG.dfVBJm1.DuPsUTlhJhIqvsYSkQC3KNr0JzDb5bO', 1, 0);
INSERT INTO `user` VALUES('avd', '$2y$10$f3jufXzojZ1AgE0e5uTQGeJUi3ydJyv7QDT4popfq5K2sEGCjmbre', 4, 2);
INSERT INTO `user` VALUES('b', '$2y$10$ujaPveBM11/hXY6caye3f.nQYKlnVcdrQGZWksMm9lVk5oYlj4RmO', 2, 0);
INSERT INTO `user` VALUES('blacksheep.44@yahoo.com', '$2y$10$TRqmylBUWNmhWBwoldvAjOVBltTU4I54PjkYsNn9Av9NtYv3eQLSG', 2, 0);
INSERT INTO `user` VALUES('blue', '$2y$10$FV/zw6c6WkCfHgALLROEmOnjDaiE9ARHAqcHdoQkll3lzPCVqeck.', 1, 0);
INSERT INTO `user` VALUES('blue table', '$2y$10$nACqSmTdjU/VZp4Oae3d2.pzSw1MxI1hEcOpG79WxbtId5uj9GPmq', 1, 0);
INSERT INTO `user` VALUES('c', '$2y$10$qz4mVPkUBF8GPjOJQeClxOOEfNcOoe0R09M8yKwKNF7LbfNhEcUXK', 1, 2);
INSERT INTO `user` VALUES('cd', '$2y$10$amqd2LCh9Bk65mwfgaG8LO42NZrk798.HN9Ng0T1JYF1ckPJ4UUM2', 1, 0);
INSERT INTO `user` VALUES('chair', '$2y$10$c6d3EBGdek9QN9y5pN33oeU3P1xpTbVbJQixQXS.BW0VD1mJfL.vO', 1, 0);
INSERT INTO `user` VALUES('d', '$2y$10$LMTiPnchDfPE2x0SnHW4lev7la9THyPfZDnhUX4NofWXunu7IdLgu', 4, 2);
INSERT INTO `user` VALUES('free', '$2y$10$05tBD.F8Nxi45Ww7oiTUdOeV/qYsk2Dyaa0a8gKWfQrK3PZitmi0y', 1, 2);
INSERT INTO `user` VALUES('git', '$2y$10$Aan/40UqjW6tQq1frr7qmuKyH7CTVcMfIytE1KWMs5jx16mcjTSXe', 2, 2);
INSERT INTO `user` VALUES('isuru@sliit.lk', '$2y$10$7kD7JsAbPk5fSgIVfnqyguoDlFJML9uBVb12UZ3aqXOEJkze7EHcC', 1, 0);
INSERT INTO `user` VALUES('madusha.1@sliit.lk', '$2y$10$oqSMJ39w6AWsz1eklYz1eeIVh8YonMDapF..F70P62oWfFwMTQNJi', 2, 0);
INSERT INTO `user` VALUES('red@blue.org', '$2y$10$GTAR2ISrSJc/3E7pqclth.gLbyYlnar3FHubs5tJ66opJ7.gMYlgy', 1, 2);
INSERT INTO `user` VALUES('s', '$2y$10$5Dr1zqERyeGwod5i5nrQv.m0xBCpUNKOvYJ/q9KOCEx7AQV3ThvIi', 2, 0);
INSERT INTO `user` VALUES('sh', '$2y$10$k6WWAhhSBD7UkvbcHDQVj.l6zLYTBpwuyCrO8a2o10qhTR.6gJBKe', 1, 2);
INSERT INTO `user` VALUES('shavin47', '$2y$10$QmPP8f1zzx0qW6b3v.h.X.Fox.FyA3mLwy7LrlzkJHdhF8D3srp5.', 1, 2);
INSERT INTO `user` VALUES('temp@realorg.edu', '$2y$10$J1IivLPWM1F7Rc3qk2Ij4.2yT1mvHzfk/nSZ8hvmTjtb2X8ar4Ut2', 2, 0);
INSERT INTO `user` VALUES('viim@ubuntu.org', '$2y$10$voK79P1GEwkSeEnvPwcSr.kvBMfyDHnL9ErDVDP9CkoyWHWZSgMru', 2, 0);
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
-- Constraints for table `roleperm`
--
ALTER TABLE `roleperm`
ADD CONSTRAINT `RolePerm_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`),
ADD CONSTRAINT `RolePerm_ibfk_2` FOREIGN KEY (`permId`) REFERENCES `permissions` (`permId`);

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
COMMIT;
