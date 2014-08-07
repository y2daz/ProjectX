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
CREATE DATABASE IF NOT EXISTS `manaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manaDB`;

CREATE USER 'manaSystem'@'localhost' IDENTIFIED BY 'SMevHZxMEJVfv4Kc';

GRANT ALL PRIVILEGES ON * . * TO 'manaSystem'@'localhost';
	
GRANT ALL PRIVILEGES ON manaDB.* TO 'manaSystem'@'localhost';

FLUSH PRIVILEGES;

use manaDB;

CREATE TABLE User(
	userEmail varchar(50) primary key,
    userPassword varchar(50)
);

Use manaDB;

INSERT INTO User values ('y', (SELECT PASSWORD('a')));
INSERT INTO User values ('a', (SELECT PASSWORD('a')));



CREATE TABLE Staff(
  StaffID varchar(5) primary key,
  NamewithInitials varchar(60),
  DateofBirth date,
  Gender INTEGER,
  Nationality_Race INTEGER,
  Religion Integer,
  CivilStatus INTEGER,
  NICNumber varchar(10),
  MailDeliveryAddress varchar(100),
  ContactNumber varchar(15),
  DateAppointedastoPost DATE, /*Appointed as Teacher/Principal*/
  DateJoinedthisSchool Date,
  EmploymentStatus Integer,
  Medium Integer,
  PositioninSchool Integer,
  Section Integer,
  SubjectMostTaught Integer,
  SubjectSecondMostTaught Integer,
  ServiceGrade Integer, /*Grade at Sri Lanka Teacher Association/ Principal Association, etc.*/
  Salary float,
  HighestEducationalQualification Integer,
  HighestProfessionalQualification Integer,
  CourseofStudy Integer
);

CREATE TABLE ClassInformation(
  StaffID varchar(5),
  Grade INTEGER,
  Class char(2),

  FOREIGN KEY fk001 (StaffID) REFERENCES Staff(StaffID),
  PRIMARY KEY (Grade, Class)
);

/*SPORTS ACHIEVEMENTS*/

CREATE TABLE Blacklist(
  StaffID varchar(5),
  ListContributor varchar(5),
  EnterDate DATE,
  Reason varchar(255),

  FOREIGN KEY fk002 (StaffID) REFERENCES Staff(StaffID),
  FOREIGN KEY fk003 (ListContributor) REFERENCES Staff(StaffID),

  PRIMARY KEY (StaffID, ListContributor, EnterDate)
);




CREATE TABLE LabelLanguage();