DROP TABLE IF EXISTS `StaffMain`;
CREATE TABLE IF NOT EXISTS `StaffMain` (
  `StaffID`                    VARCHAR(5) NOT NULL,
  `SignatureNo`                VARCHAR(10) DEFAULT NULL, -- EmployeeID Given My Ministry
  `SerialNo`                   VARCHAR(10) DEFAULT NULL, -- StaffNo Changes Every Year
  `PersonalFileNo`             VARCHAR(20) DEFAULT NULL,
  `NameWithInitials`           VARCHAR(60) DEFAULT NULL,
  `Gender`                     INT(11) DEFAULT NULL,
  `Section`                    INT(11) DEFAULT NULL,
  `teacherRegisterNo`          VARCHAR(30) DEFAULT NULL,
  `NICNumber`                  VARCHAR(10) DEFAULT NULL,
  `PermanentAddress`           VARCHAR(200) DEFAULT NULL, -- Mail Delivery Address
  `WAndOPNo`                   VARCHAR(20) DEFAULT NULL, -- No idea what this is
  `Service`                    INT(11) DEFAULT NULL, -- Part of Service Grade
  `Grade`                      INT(11) DEFAULT NULL, -- Part of Service Grade
  `NatureOfAppointment`        VARCHAR(40) DEFAULT NULL, -- Nature of Appointment (Degree/Diploma/Trained/Other)
  `SubjectAppointed`           VARCHAR(40) DEFAULT NULL,
  `SubjectTeaching`            VARCHAR(40) DEFAULT NULL, -- Subject and Grades Teaching at Present School
  `EducationQualifications`    VARCHAR(50) DEFAULT NULL,
  `ProfessionalQualifications` VARCHAR(50) DEFAULT NULL,
  `Medium`                     INT(11) DEFAULT NULL,
  `FirstAppointmentDate`       DATE DEFAULT NULL, -- Date Appointed to Post
    -- Promotions
  `Promotion1`                 DATE DEFAULT NULL, -- SLTS 3-11
  `Promotion2`                 DATE DEFAULT NULL, -- SLEAS 111 /SLPS 2=11 / SLTS 3-1
  `Promotion3`                 DATE DEFAULT NULL, -- SLEAS 11/ SLPS 1 / SLTS 2-1
  `Promotion4`                 DATE DEFAULT NULL, -- SLEAS 1 / SLPS 1 / SLTS 2-1
  `Promotion5`                 DATE DEFAULT NULL, -- SLTS 1
  `IncrementDate`              DATE DEFAULT NULL, -- Just a day and a month, no year
  `DutyAssumeDateToSchool`     DATE DEFAULT NULL, -- Date Joined this School
    -- Contact No
  `ContactMobile`              VARCHAR(15) DEFAULT NULL, -- Contact Number
  `ContactResidence`           VARCHAR(15) DEFAULT NULL,
  `DateOfBirth`                DATE DEFAULT NULL,
  `DuePensionDate`             DATE DEFAULT NULL,
  `Remarks`                    VARCHAR(200) DEFAULT NULL, -- Mail Delivery Address

  `Race`                       INT(11) DEFAULT NULL

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

DROP VIEW IF EXISTS `vwStaff`;
CREATE VIEW `vwStaff` AS
  SELECT
    `s`.`StaffID`                 AS `StaffID`,
    `s`.`NameWithInitials`        AS `NamewithInitials`,
    `s`.`DateOfBirth`             AS `DateofBirth`,
    `s`.`Gender`                  AS `Gender`,
    `s`.`Race`                    AS `Race`,
    `s`.`Religion`                AS `Religion`,
    `s`.`CivilStatus`             AS `CivilStatus`,
    `s`.`NICNumber`               AS `NICNumber`,
    `s`.`PermanentAddress`        AS `MailDeliveryAddress`,
    `s`.`ContactMobile`           AS `ContactNumber`,
    `s`.`FirstAppointmentDate`    AS `DateAppointedastoPost`,
    `s`.`DutyAssumeDateToSchool`  AS `DateJoinedthisSchool`,
    `s`.`EmploymentStatus`        AS `EmploymentStatus`,
    `s`.`Medium`                  AS `Medium`,
    `s`.`Designation`             AS `Designation`,
    `s`.`Section`                 AS `Section`,
    `s`.`SubjectMostTaught`       AS `SubjectMostTaught`,
    `s`.`SubjectSecondMostTaught` AS `SubjectSecondMostTaught`,
    `s`.`Service`                 AS `ServiceGrade`, -- Wrong
    `s`.`Salary`                  AS `Salary`,
    `s`.`isDeleted`               AS `isDeleted`,
    `s`.`SerialNo`                AS `StaffNo`
  FROM `StaffMain` `s`
  WHERE (`s`.`isDeleted` = 0);


INSERT INTO `StaffMain` (
  `StaffID`,
  `NameWithInitials`,
  `DateOfBirth`,
  `Gender`,
  `Race`,
  `Religion`,
  `CivilStatus`,
  `SignatureNo`,
  `SerialNo`,
  `PersonalFileNo`,
  `Section`,
  `teacherRegisterNo`,
  `NICNumber`,
  `PermanentAddress`,
  `WAndOPNo`,
  `Service`,
  `Grade`,
  `NatureOfAppointment`,
  `SubjectAppointed`,
  `SubjectTeaching`,
  `EducationQualifications`,
  `ProfessionalQualifications`,
  `Medium`,
  `FirstAppointmentDate`,
  `Promotion1`,
  `Promotion2`,
  `Promotion3`,
  `Promotion4`,
  `Promotion5`,
  `IncrementDate`,
  `DutyAssumeDateToSchool`,
  `ContactMobile`,
  `ContactResidence`,
  `DuePensionDate`,
  `Remarks`,
  `EmploymentStatus`,
  `Designation`,
  `SubjectMostTaught`,
  `SubjectSecondMostTaught`,
  `Salary`,
  `isDeleted`
)
VALUES (
  [VALUE -1],
  [VALUE -2],
  [VALUE -3],
  [VALUE-4],
  [VALUE -5],
  [VALUE -6],
  [VALUE -7],
  [VALUE -8],
  [VALUE-9],
  [VALUE -10],
  [VALUE -11],
  [VALUE -12],
  [VALUE -13],
  [VALUE-14],
  [VALUE -15],
  [VALUE -16],
  [VALUE -17],
  [VALUE -18],
  [VALUE-19],
  [VALUE -20],
  [VALUE -21],
  [VALUE -22],
  [VALUE -23],
  [VALUE-24],
  [VALUE -25],
  [VALUE -26],
  [VALUE -27],
  [VALUE -28],
  [VALUE-29],
  [VALUE -30],
  [VALUE -31],
  [VALUE -32],
  [VALUE -33],
  [VALUE-34],
  [VALUE -35],
  [VALUE -36],
  [VALUE -37],
  [VALUE -38],
  [VALUE-39],
  [VALUE -40],
  [VALUE -41]
);






































