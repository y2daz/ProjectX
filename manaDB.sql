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

CREATE  TABLE IF NOT EXISTS User(
	userEmail varchar(50) primary key,
    userPassword varchar(50)
);

Use manaDB;

INSERT INTO User values ('y', (SELECT PASSWORD('a')));
INSERT INTO User values ('a', (SELECT PASSWORD('a')));



CREATE  TABLE IF NOT EXISTS Staff(
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

CREATE  TABLE IF NOT EXISTS ClassInformation(
  StaffID varchar(5),
  Grade INTEGER,
  Class char(2),

  FOREIGN KEY fk001 (StaffID) REFERENCES Staff(StaffID),
  PRIMARY KEY (Grade, Class)
);

/*SPORTS ACHIEVEMENTS*/

CREATE  TABLE IF NOT EXISTS Blacklist(
  StaffID varchar(5),
  ListContributor varchar(5),
  EnterDate DATE,
  Reason varchar(255),

  FOREIGN KEY fk002 (StaffID) REFERENCES Staff(StaffID),
  FOREIGN KEY fk003 (ListContributor) REFERENCES Staff(StaffID),

  PRIMARY KEY (StaffID, ListContributor, EnterDate)
);


CREATE  TABLE IF NOT EXISTS Language(
  Language integer,
  Value VARCHAR(20),

  PRIMARY KEY (Language)
);
CREATE  TABLE IF NOT EXISTS LabelLanguage(
  Label VARCHAR(50),
  Language integer,
  Value VARCHAR(200),

  PRIMARY KEY (Label),
  FOREIGN KEY fk004 (Language) REFERENCES Language(Language)
);
CREATE  TABLE IF NOT EXISTS LanguageGroup(
  GroupNo integer,
  GroupName VARCHAR(50),

  PRIMARY KEY (GroupNo),
  FOREIGN KEY fk005 (GroupName) REFERENCES LabelLanguage(Label)
);
CREATE  TABLE IF NOT EXISTS LanguageOption(
  GroupNo integer,
  OptionNo integer,
  Language integer,
  Value VARCHAR(200),

  PRIMARY KEY (GroupNo, OptionNo),
  FOREIGN KEY fk005 (GroupNo) REFERENCES LanguageGroup(GroupNo),
  FOREIGN KEY fk006 (Language) REFERENCES Language(Language)
);


CREATE  TABLE IF NOT EXISTS Subject_Grade(
  SubjectID Integer,
  Grade integer,
  Subject varchar(30),
  Medium integer,

  PRIMARY KEY (SubjectID),
  FOREIGN KEY fk007 (Medium) REFERENCES Language(Language)
);
CREATE  TABLE IF NOT EXISTS Teaches(
  SubjectID Integer,
  StaffID varchar(5),

  PRIMARY KEY (SubjectID, StaffID),
  FOREIGN KEY fk008 (SubjectID) REFERENCES Subject_Grade(SubjectID),
  FOREIGN KEY fk009 (StaffID) REFERENCES Staff(StaffID)
);

CREATE  TABLE IF NOT EXISTS Timetable(
  Grade integer,
  Class Char(2),
  Day integer,
  Position integer,
  SubjectID INTEGER,
  StaffID varchar(5),

  PRIMARY KEY (Grade, Class, Day, Position, SubjectID),
  FOREIGN KEY fk010 (SubjectID) REFERENCES Subject_Grade(SubjectID),
  FOREIGN KEY fk011 (StaffID) REFERENCES Staff(StaffID)
);

CREATE  TABLE IF NOT EXISTS ApplyLeave(
  StaffID VARCHAR(5),
  RequestDate Date, 
  StartDate Date, 
  EndDate Date, 
  LeaveType INTEGER,
  /*TimePeriod Integer,*/
  OtherInformation VARCHAR(200),
  Status INTEGER,
  ReviewedBy VARCHAR(5), /*Approved/reject*/
  ReviewedDate Date,

  PRIMARY KEY (StaffID, StartDate),
  FOREIGN KEY fk012 (StaffID) REFERENCES Staff(StaffID),
  FOREIGN KEY fk013 (ReviewedBy) REFERENCES Staff(StaffID)
);
CREATE  TABLE IF NOT EXISTS LeaveData(
  StaffID VARCHAR(5),
  OfficialLeave Integer,
  MaternityLeave Integer,
  OtherLeave Integer,

  PRIMARY KEY (StaffID),
  FOREIGN KEY fk014 (StaffID) REFERENCES Staff(StaffID)
);
CREATE  TABLE IF NOT EXISTS IsSubstituted(
  StaffID VARCHAR(5),
  Grade integer,
  Class Char(2),
  Day integer,
  Position integer,
  SubjectID INTEGER,
  Date DATE,

  FOREIGN KEY fk015 (StaffID) REFERENCES Staff(StaffID),
  FOREIGN KEY fk016 (Grade, Class, Day, Position, SubjectID) REFERENCES Timetable(Grade, Class, Day, Position, SubjectID)
  /*We have Day in the foreign key. Not sure about having that if we have Date.*/
);

CREATE  TABLE IF NOT EXISTS Student(
  AdmissionNo varchar(5),
  NameWithInitials Varchar(50),
  Nationality_Race Integer,
  Religion Integer,
  Medium Integer,
  Address varchar(100),
  Grade Integer,
  Class char(2),
  House varchar(20),

  PRIMARY KEY (AdmissionNo)
);
CREATE TABLE IF NOT EXISTS ParentsInformation(
  AdmissionNo varchar(5),
  NamewithInitials Varchar(50),
  Parent_Guardian BIT, /*0 for parent. 1 for guardian */
  Occupation Varchar(50),
  PhoneLand VARCHAR(15),
  PhoneMobile VARCHAR(15),
  HomeAddress VARCHAR(100),
  OfficeAddress VARCHAR(100),

  PRIMARY KEY (AdmissionNo, NamewithInitials),
  FOREIGN KEY fk017 (AdmissionNo) REFERENCES Student(AdmissionNo)
);

CREATE TABLE IF NOT EXISTS Event(
  EventID INTEGER,
  Name varCHAR(50),
  Description VARCHAR(200),
  Location VARCHAR(50),
  Status integer, /*Postponed, cancelled, due, pending*/
  EventDate Date,
  EventCreator VARCHAR(5),
  StartTime TIME,
  EndTime TIME,

  PRIMARY KEY (EventID),
  FOREIGN KEY fk018 (EventCreator) REFERENCES Staff(StaffID)
);
CREATE TABLE IF NOT EXISTS Invitee(
  EventID INTEGER,
  AdmissionNo varchar(5),
  ParentName Varchar(50),

  PRIMARY KEY (EventID, AdmissionNo, ParentName),
  FOREIGN KEY fk019 (EventID) REFERENCES Event(EventID),
  FOREIGN KEY fk020 (AdmissionNo, ParentName) REFERENCES ParentsInformation(AdmissionNo, NamewithInitials)
);
CREATE TABLE IF NOT EXISTS EventManager(
  EventID INTEGER,
  StaffID varchar(5),

  PRIMARY KEY (EventID, StaffID),
  FOREIGN KEY fk021 (EventID) REFERENCES Event(EventID),
  FOREIGN KEY fk022 (StaffID) REFERENCES Staff(StaffID)
);
CREATE TABLE IF NOT EXISTS Transaction(
  EventID INTEGER,
  TransactionID INTEGER,
  TransactionDate Date,
  TransactionType BIT, /*Income, Expenditure*/
  Amount FLOAT,
  Description VARCHAR (200),

  PRIMARY KEY (EventID, TransactionID),
  FOREIGN KEY fk023 (EventID) REFERENCES Event(EventID)
);

CREATE TABLE IF NOT EXISTS Student_Subject_Grade(
  AdmissionNo VARCHAR(5),
  SubjectID INTEGER,

  PRIMARY KEY (AdmissionNo, SubjectID),
  FOREIGN KEY fk024 (AdmissionNo) REFERENCES Student(AdmissionNo),
  FOREIGN KEY fk025 (SubjectID) REFERENCES Subject_Grade(SubjectID)
);
CREATE TABLE IF NOT EXISTS TermMarks(
  AdmissionNo VARCHAR(5),
  SubjectID INTEGER,
  Term INTEGER,
  Mark INTEGER,
  Remarks VARCHAR(127),

  PRIMARY KEY (AdmissionNo, SubjectID, Term),
  FOREIGN KEY fk026 (AdmissionNo, SubjectID) REFERENCES Student_Subject_Grade(AdmissionNo, SubjectID)
);

# delimiter #
# create procedure load_foo_test_data()
#   begin
#
#     declare v_max int unsigned default 260;
#     declare v_counter int unsigned default 0;
#
#     truncate table Attendance;
#     start transaction;
#     while v_counter < v_max do
#       alter table Attendance (add column v_counter integer);
#       set v_counter=v_counter+1;
#     end while;
#     commit;
#   end #
#
# delimiter ;
#
# call load_foo_test_data();

CREATE TABLE IF NOT EXISTS OLMarks(
  IndexNo INTEGER,
  AdmissionNo VARCHAR (5),
  SubjectID integer,

  PRIMARY KEY (IndexNo, SubjectID),
  FOREIGN KEY (AdmissionNo) references Student(AdmissionNo),
  FOREIGN KEY (SubjectID) references Subject_Grade(SubjectID)
 );

CREATE TABLE IF NOT EXISTS ALMarks(
  IndexNo INTEGER,
  AdmissionNo VARCHAR (5),
  SubjectID integer,

  PRIMARY KEY (IndexNo, SubjectID),
  FOREIGN KEY (AdmissionNo) references Student(AdmissionNo),
  FOREIGN KEY (SubjectID) references Subject_Grade(SubjectID)
);

CREATE TABLE IF NOT EXISTS Holiday(
  Year INTEGER,
  Day Date, /*Might store as integer*/

  PRIMARY KEY (Year, Day)
);

CREATE TABLE IF NOT EXISTS Attendance(
  AdmissionNo VARCHAR(5),
  Year INTEGER,

  PRIMARY KEY (AdmissionNo, Year),
  FOREIGN KEY (AdmissionNo) references Student(AdmissionNo)
);