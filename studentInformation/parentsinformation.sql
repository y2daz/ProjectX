-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 11:40 AM
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
-- Dumping data for table `parentsinformation`
--

INSERT INTO `ParentsInformation` (`AdmissionNo`, `NamewithInitials`, `Parent_Guardian`, `Occupation`, `PhoneLand`, `PhoneMobile`, `HomeAddress`, `OfficeAddress`, `isDeleted`) VALUES
('1', 'Madhu De Silva', b'1', 'Teacher', '0312285596', '0773432532', 'Moratuwa', 'colombo', 0),
('12325', 'Shavin', b'1', 'Banker', '0117272111', '0712323232', 'Kadirana', 'colombo', 0),
('12345', 'Milan', b'1', 'Teacher', '0312283234', '0771211212', 'katana', 'negombo', 0),
('19642', 'Dilani', b'1', 'Teacher', '0117272111', '0782323233', 'Negombo', 'Kotuwa', 0),
('19642', 'Dulip De Silva', b'1', 'Teacher', '0117272111', '0726262837', 'negombo', 'colombo', 0),
('2', 'Madusha Perera', b'1', 'Salesrep', '0117272111', '0726262837', 'Negombo', 'colombo', 0),
('23247', 'joseph', b'1', 'Anta', '0312228721', '0712323232', 'Colombo', 'Bamba', 0),
('23415', 'Nimal', b'1', 'Banker', '0117272111', '0782323233', 'Moratuwa', 'Dehiwela Colombo', 0),
('24242', 'Kamal', b'1', 'Engineer', '0117272111', '0726262837', 'Negombo', 'Dehiwa', 0),
('3', 'yazdan Jayakodi', b'1', 'Manager ', '0312228721', '0771123243', 'Negombo', 'colombo', 0),
('32424', 'Upeka', b'1', 'Merchent', '0117272111', '0726262837', 'Colombo', 'Bamba', 0),
('43435', 'Kalum', b'1', 'Lecturer', '0117272111', '0726262837', 'Negombo', 'Bamba', 0),
('43536', 'Vasantha', b'1', 'Business', '0312228721', '0712323232', 'Colombo', 'Kottawa', 0),
('43568', 'john', b'1', 'Business', '0117272111', '0782323233', 'Kurunagala', 'colombo', 0),
('45678', 'Srikantha', b'1', 'Teacher', '0312285596', '0726262837', 'Moratuwa', 'negombo', 0),
('54645', 'Fonseka', b'1', 'Teacher', '0312285596', '0712323232', 'kolpity', 'Dehiwela Colombo', 0),
('54646', 'Dinal', b'1', 'Pilot', '0312228721', '0712323232', 'Colombo', 'Dehiwela Colombo', 0),
('64558', 'Malki', b'1', 'Banker', '0117272111', '0782323233', 'Moratuwa', 'Bamba', 0),
('65578', 'Amrasena', b'1', 'Driver', '0312228721', '0726262837', 'Negombo', 'Galle', 0),
('65758', 'Madusha', b'1', 'Teacher', '0117272111', '0782323233', 'Moratuwa', 'Bamba', 0),
('65784', 'Sri', b'1', 'CEO', '0117272111', '0782323233', 'Negombo', 'Dehiwela Colombo', 0),
('75638', 'Arathy', b'1', 'Banker', '0117272111', '0712323232', 'Colombo', 'Dehiwa', 0),
('75857', 'Kalum', b'1', 'Business', '0312283234', '0712323232', 'kolpity', 'Dehiwela Colombo', 0),
('76954', 'Shevon', b'1', 'Manager ', '0312228721', '0712323232', 'Negombo', 'Bamba', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
