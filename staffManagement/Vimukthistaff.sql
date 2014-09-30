-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 08:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manadb`
--

--
-- Truncate table before insert `staff`
--

TRUNCATE TABLE `staff`;
--
-- Dumping data for table `staff`
--

INSERT INTO `staff` VALUES('1', 'Vimukthi Joseph', '2014-08-13', 1, 3, 1, 1, '123456789V', 'Makola', '0714569232', '2014-08-18', '2014-08-19', 2, 3, 1, 1, 1, 1, 1, 25000, 1, 1, 1, 0);
INSERT INTO `staff` VALUES('10', 'Amritha Alston', '2014-08-26', 2, 4, 1, 1, '123456789V', 'Makola', '0756489326', '2014-08-06', '2014-08-30', 3, 1, 5, 6, 1, 1, 2, 70000, 2, 2, 2, 0);
INSERT INTO `staff` VALUES('11', 'Bihara De Silva', '2014-08-26', 2, 2, 1, 1, '923578963V', 'Kollupitiya', '0785693214', '2014-08-25', '2014-08-03', 2, 2, 1, 1, 1, 1, 1, 45000, 3, 3, 3, 0);
INSERT INTO `staff` VALUES('12', 'Chathuri Perera', '0081-08-02', 2, 1, 3, 3, '814562395V', 'Negombo', '0774379658', '2014-08-26', '2014-08-23', 2, 2, 2, 2, 1, 1, 5, 28000, 5, 5, 51, 0);
INSERT INTO `staff` VALUES('13', 'Anthony Ashan', '1987-01-21', 1, 1, 2, 1, '123456789V', 'Negombo', '0777777777', '2014-08-07', '2014-08-14', 1, 1, 1, 1, 1, 1, 1, 123, 1, 12, 55, 0);
INSERT INTO `staff` VALUES('14', 'Tharindu Madusha Mendis', '1993-02-03', 1, 1, 4, 1, '543345543V', 'Kollupitiya', '098789123', '2000-08-02', '2001-09-09', 1, 1, 6, 19, 2, 3, 13, 17000, 3, 18, 41, 0);
INSERT INTO `staff` VALUES('15', 'Sahan Malinga Tissera', '1993-02-02', 1, 1, 4, 1, '932470039V', 'Kollupitiya', '0712624222', '2012-08-01', '2014-08-31', 1, 1, 7, 1, 6, 5, 13, 17000, 3, 19, 17, 0);
INSERT INTO `staff` VALUES('16', 'Amritha Maria Alston', '1993-11-01', 2, 1, 4, 1, '932470032V', 'Kollupitiya', '0776536611', '2011-12-01', '2014-12-01', 1, 1, 1, 14, 3, 7, 4, 25000, 4, 1, 19, 0);
INSERT INTO `staff` VALUES('17', '      Ashani G.H.L.N          ', '2014-09-03', NULL, 4, 4, 4, '917894561v', '18/A Nawam Mawatha,Bellanwila', '0784561231', '2014-09-30', '2014-09-30', 1, 1, 7, 8, 1, 1, 6, 33000, 6, 6, 65, 0);
INSERT INTO `staff` VALUES('18', 'Devindi U.K.A.', '1987-06-23', 2, 1, 1, 1, '917894561v', '253/16/b Makola south,Makola', '0114562398', '2012-08-17', '2014-09-04', 2, 1, 1, 3, 4, 2, 4, 15000, 5, 6, 11, 0);
INSERT INTO `staff` VALUES('19', 'Prabuddhi D.V.M.', '1998-08-05', 2, 3, 3, 3, '923570039v', '13/M gangarama rd,kollupitiya', '0774563219', '2014-09-03', '2014-09-10', 4, 3, 4, 4, 4, 4, 1, 28000, 1, 2, 3, 0);
INSERT INTO `staff` VALUES('2', 'Dulip Rathnayake', '2014-08-13', 1, 2, 3, 2, '912587692V', 'kottawa', '07145236', '2014-08-19', '2014-08-14', 1, 2, 2, 2, 2, 2, 0, 30000, 1, 2, 2, 0);
INSERT INTO `staff` VALUES('20', 'Kavindi Weerakkodi', '1992-12-18', 2, 2, 2, 1, '123456789v', '85/a Dehiwala Rd, Dehiwala', '0774561234', '2014-09-24', '2014-09-25', 2, 2, 2, 3, 2, 1, 1, 14000, 4, 4, 4, 0);
INSERT INTO `staff` VALUES('21', 'Peiries M.S.E', '2014-09-03', 1, 3, 3, 3, '958964521V', '234/45 Galle rd,Wellawattha', '0774896532', '2014-09-18', '2014-10-25', 1, 1, 1, 7, 3, 3, 3, 12000, 3, 3, 3, 0);
INSERT INTO `staff` VALUES('22', 'Amarasinghe Bella', '1987-08-19', 2, 2, 2, 2, '874561239v', '56/A Mahara rd,Kadawatha', '0114567892', '2014-09-03', '2014-09-04', 4, 3, 4, 4, 4, 4, 4, 22000, 4, 4, 78, 0);
INSERT INTO `staff` VALUES('23', 'Samarakoon W.A', '2014-09-17', NULL, 1, 1, 2, '896532147v', '54/k Kalubowila rd,Kalubowila', '0779632141', '2014-08-20', '2014-09-03', 1, 2, 2, 20, 1, 2, 2, 37000, 2, 2, 2, 0);
INSERT INTO `staff` VALUES('24', 'Rupasinghe Q.L', '2014-09-18', NULL, 1, 1, 1, '945263879v', '89/B Mahara,Kadawatha', '0714562395', '2014-09-25', '2014-09-11', 2, 2, 2, 20, 2, 2, 3, 18000, 5, 5, 4, 0);
INSERT INTO `staff` VALUES('25', 'Samarasinghe V.V.M', '2003-01-11', 1, 1, 1, 1, '917894561v', '89/B Mahara,Kadawatha', '0774896532', '2014-09-11', '2014-09-27', 3, 2, 3, 3, 3, 3, 3, 26000, 1, 1, 25, 0);
INSERT INTO `staff` VALUES('26', 'Mendis M.Q.A', '2014-09-03', 2, 1, 1, 1, '896547891V', '59/Anuradapura Rd,Sigiriya', '0112365478', '2014-09-03', '2014-09-03', 2, 2, 2, 1, 2, 2, 2, 28000, 4, 5, 6, 0);
INSERT INTO `staff` VALUES('27', 'Dissanayake M..N', '2014-09-24', 2, 1, 3, 3, '936541278v', '64/shanthi mawatha,kiribathgoda', '0119632478', '2014-09-03', '2014-09-03', 2, 2, 2, 2, 2, 2, 2, 23500, 5, 8, 21, 0);
INSERT INTO `staff` VALUES('28', 'Perera T.M', '2014-09-03', NULL, 3, 3, 2, '963214587v', '123/23/G Havelock rd,nugegoda', '0112365894', '2014-09-10', '2014-09-27', 2, 2, 2, 2, 2, 2, 2, 45000, 5, 9, 5, 0);
INSERT INTO `staff` VALUES('29', 'Fernando M.K.L.A', '2014-09-04', 2, 2, 2, 4, '923568741v', '123/23/G Havelock rd,nugegoda', '0714562395', '2014-09-03', '2014-09-25', 2, 1, 2, 20, 2, 3, 2, 20000, 1, 1, 1, 0);
INSERT INTO `staff` VALUES('3', 'Isuru jayakody', '2014-08-13', 1, 3, 3, 3, '936257891V', 'narammala', '0714563298', '2014-08-05', '2014-08-07', 4, 3, 4, 4, 2, 1, 0, 35000, 2, 2, 4, 0);
INSERT INTO `staff` VALUES('30', 'Jayawardena Mahela', '2014-09-19', 1, 1, 1, 1, '887456321v', '56/A Mahara rd,Kadawatha', '0112365892', '2014-09-02', '2014-09-18', 2, 2, 2, 2, 2, 2, 2, 20000, 1, 1, 17, 0);
INSERT INTO `staff` VALUES('4', 'Madhusha Mendis', '2014-08-27', 2, 1, 1, 1, '936541278V', 'moratuwa paradai', '0711701236', '2014-09-12', '2014-08-02', 5, 1, 5, 5, 3, 3, 0, 96000, 1, 10, 57, 0);
INSERT INTO `staff` VALUES('5', 'Manoj Liyanage', '2014-08-13', 1, 2, 1, 1, '945263879V', 'kurunegala', '011296875', '2014-08-27', '2014-08-29', 2, 2, 2, 2, 2, 2, 2, 45000, 1, 10, 10, 0);
INSERT INTO `staff` VALUES('6', 'Shavin Peiries', '2014-08-30', 1, 3, 2, 1, '958964525V', 'wellawattha', '071456932', '2014-08-13', '2014-08-22', 5, 3, 1, 1, 1, 1, 1, 98623, 3, 4, 10, 0);
INSERT INTO `staff` VALUES('7', 'Madhushan G.L.N.A.M', '2014-08-06', 2, 2, 3, 1, '932568745V', 'meegamuwa', '078256314', '2014-08-21', '2014-08-30', 3, 2, 6, 1, 1, 1, 1, 10000, 3, 7, 45, 0);
INSERT INTO `staff` VALUES('8', 'Yazdaan M.A.', '2014-08-20', 1, 3, 1, 1, '923570039V', 'Nugegoda', '012236598', '2014-07-09', '2014-08-15', 3, 3, 2, 2, 3, 1, 1, 201369, 2, 1, 33, 0);
INSERT INTO `staff` VALUES('9', 'Niruthi Yogalingam', '2014-08-13', 2, 3, 2, 2, '456321845V', 'wellawattha', '0112968756', '2014-08-20', '2014-08-29', 4, 3, 6, 6, 2, 2, 5, 45000, 4, 6, 8, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
//