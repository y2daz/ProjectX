-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 11:39 AM
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
-- Dumping data for table `student`
--

INSERT INTO `Student` (`AdmissionNo`, `NameWithInitials`, `DateOfBirth`, `Nationality_Race`, `Religion`, `Medium`, `Address`, `Grade`, `Class`, `House`, `isDeleted`) VALUES
('1', 'Madusha', '2000-12-12', 1, 1, 1, 'Here', 12, 'B', 'Blue', 0),
('12325', 'B.T.M Mendia', '1993-12-01', 1, 1, 1, 'Moratuwa', 11, 'A', 'Shantha', 0),
('12345', 'J.A.I Jayakody', '1993-12-31', 1, 1, 1, 'Colombo', 11, 'A', 'Surya', 0),
('19642', 'Madhushan G.L.N.A.M', '1990-07-27', 1, 4, 0, 'negombo', 1, 'A', 'Blue', 0),
('2', 'Peiris M.S.E', '1993-09-03', 1, 1, 1, 'kolpity', 11, 'C', 'Green', 0),
('23247', 'Sanchayan Balayan', '1991-01-01', 1, 1, 1, 'Wellawattha', 11, 'B', 'Surya', 0),
('23415', 'Upeka tisser', '1990-12-23', 1, 1, 1, 'Wadduwa', 11, 'B', 'Surya', 0),
('24242', 'Yazdaan Mohamed', '1995-12-30', 4, 3, 1, 'Nugegoda', 11, 'B', 'Shantha', 0),
('3', 'Isuru Jayakody', '1993-01-21', 1, 1, 1, 'Kollupitiya', 11, 'A', 'Blue', 0),
('32424', 'sahan tissera', '1991-12-02', 1, 1, 1, 'Angoda', 11, 'B', 'Shantha', 0),
('43435', 'Venusha Ranaviraj', '1993-12-21', 1, 1, 1, 'Ganemulla', 11, 'A', 'veera', 0),
('43536', 'Dulip Rathnayaka', '1991-12-31', 1, 1, 1, 'Kottawa', 11, 'A', 'Su', 0),
('43568', 'M.C Liyanage', '1994-12-31', 1, 1, 1, 'Borella', 11, 'B', 'veera', 0),
('45678', 'Janith Heshan', '1989-12-31', 1, 1, 1, 'Rajagiriya', 11, 'A', 'Surya', 0),
('54645', 'Darsha Fonseka', '1989-12-31', 1, 1, 1, 'kolpity', 11, 'B', 'Methta', 0),
('54646', 'Devni Indula', '1991-11-28', 1, 1, 1, 'Panadura', 11, 'B', 'Surya', 0),
('64558', 'Niruthi Yogalingam', '1995-12-30', 1, 1, 1, 'negombo', 11, 'B', 'Shantha', 0),
('65578', ' Sampath Jayasundara', '1991-12-01', 1, 1, 1, 'negombo', 11, 'A', 'Methta', 0),
('65758', 'Ashan Asela', '2005-01-31', 1, 1, 1, 'Dehiwala', 11, 'B', 'Surya', 0),
('65784', 'Mevanka Roshali', '1993-11-30', 1, 1, 1, 'Dehiwala', 11, 'A', 'veera', 0),
('75638', 'Jane Arathy', '1993-11-29', 1, 1, 1, 'Kotahena', 11, 'B', 'Methta', 0),
('75857', 'Gihan Jayawardena', '1988-12-31', 1, 1, 1, 'kolpity', 11, 'A', 'Methta', 0),
('76954', 'Raneesha Peiries', '1994-12-31', 1, 1, 1, 'Wellawattha', 11, 'A', 'Shantha', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
