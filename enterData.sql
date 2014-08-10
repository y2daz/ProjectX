USE manaDB;

DROP TABLE IF EXISTS User;

CREATE  TABLE IF NOT EXISTS User(
  userEmail varchar(50) primary key,
  userPassword varchar(80),
  accessLevel INTEGER DEFAULT 2 #Where 1 is administrator. 2 is teacher.
);

Use manaDB;

INSERT INTO User values ('a', '$2y$10$/2q2Bgdr7L2ocN1HE56GueofwhPfK/i4KJX/cEj.ISY4mhfbRq8E2', 1);
INSERT INTO User values ('y', '$2y$10$/2q2Bgdr7L2ocN1HE56GueofwhPfK/i4KJX/cEj.ISY4mhfbRq8E2', 1);

DROP TABLE LanguageOption;
DROP TABLE LanguageGroup;
DROP TABLE LabelLanguage;

CREATE  TABLE IF NOT EXISTS Language(
  Language integer,
  Value VARCHAR(20),

  PRIMARY KEY (Language)
);

CREATE  TABLE IF NOT EXISTS LabelLanguage(
  Label VARCHAR(50),
  Language integer,
  Value VARCHAR(200),

  PRIMARY KEY (Label, Language),
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

INSERT INTO Language VALUES (0, "English");
INSERT INTO Language VALUES (1, "Sinhala");

INSERT INTO LabelLanguage VALUES ("staffManagement", 0, "Staff Management");
INSERT INTO LabelLanguage VALUES ("leaveManagement", 0, "Leave Management");
INSERT INTO LabelLanguage VALUES ("timetables", 0, "Timetables");
INSERT INTO LabelLanguage VALUES ("eventManagement", 0, "Event Management");
INSERT INTO LabelLanguage VALUES ("registerStaffMember", 0, "Register Staff Member");
INSERT INTO LabelLanguage VALUES ("searchStaffMember", 0, "Search Staff Member");
INSERT INTO LabelLanguage VALUES ("applyForLeave", 0, "Apply for Leave");
INSERT INTO LabelLanguage VALUES ("approveLeave", 0, "Approve Leave");
INSERT INTO LabelLanguage VALUES ("viewLeaveHistory", 0, "View Leave History");
INSERT INTO LabelLanguage VALUES ("createTimetableByTeacher", 0, "Create Timetable by Teacher");
INSERT INTO LabelLanguage VALUES ("createTimetableByClass", 0, "Create Timetable by Class");

INSERT INTO LabelLanguage VALUES ("staffManagement", 1, "කාර්යමණ්ඩලය කළමනාකරණය");
INSERT INTO LabelLanguage VALUES ("leaveManagement", 1, "නිවාඩුව කළමනාකරණය");
INSERT INTO LabelLanguage VALUES ("timetables", 1, "කාලසටහන");
INSERT INTO LabelLanguage VALUES ("eventManagement", 1, "උත්සවය කළමනාකරණය");
INSERT INTO LabelLanguage VALUES ("registerStaffMember", 1, "කාර්යමණ්ඩලය වාර්තාකරන්න");
INSERT INTO LabelLanguage VALUES ("searchStaffMember", 1, "කාර්යමණ්ඩලය සෙවීම");
INSERT INTO LabelLanguage VALUES ("applyForLeave", 1, "නිවාඩු ඉල්ලීම්කිරීම");
INSERT INTO LabelLanguage VALUES ("approveLeave", 1, "නිවාඩු අනුමතකිරීම");
INSERT INTO LabelLanguage VALUES ("viewLeaveHistory", 1, "ඉකුත් වූ නිවාඩු");
INSERT INTO LabelLanguage VALUES ("createTimetableByTeacher", 1, "ගුරුවරයා විසින් කාලසටහන සැකසුම");
INSERT INTO LabelLanguage VALUES ("createTimetableByClass", 1, "පන්තිය විසින් කාලසටහන සැකසුම");

INSERT INTO LabelLanguage VALUES ("eventid", 0, "Event ID");
INSERT INTO LabelLanguage VALUES ("name", 0, "Name");
INSERT INTO LabelLanguage VALUES ("description", 0, "Description");
INSERT INTO LabelLanguage VALUES ("location", 0, "Location");
INSERT INTO LabelLanguage VALUES ("eventtype", 0, "Event Type");
INSERT INTO LabelLanguage VALUES ("status", 0, "Status");
INSERT INTO LabelLanguage VALUES ("date", 0, "Date");
INSERT INTO LabelLanguage VALUES ("eventcreator", 0, "Event Creator");
INSERT INTO LabelLanguage VALUES ("starttime", 0, "Start Time ");
INSERT INTO LabelLanguage VALUES ("endtime", 0, "End Time");
INSERT INTO LabelLanguage VALUES ("addmanager", 0, "Add Event Managers ");
INSERT INTO LabelLanguage VALUES ("saveevent", 0, "Save Event");
INSERT INTO LabelLanguage VALUES ("prizegiving", 0, "Prize Giving Ceremony");
INSERT INTO LabelLanguage VALUES ("sportmeet", 0, "Sports Meet");
INSERT INTO LabelLanguage VALUES ("teacherday", 0, "Teacher's Day");

INSERT INTO LabelLanguage VALUES ("eventid", 1, "සිදුවීම් අංකය");
INSERT INTO LabelLanguage VALUES ("name", 1, "සිදුවීම");
INSERT INTO LabelLanguage VALUES ("description", 1, "විස්තරය");
INSERT INTO LabelLanguage VALUES ("location", 1, "ස්ථානය");
INSERT INTO LabelLanguage VALUES ("eventtype", 1, "සිදුවීම් වර්ගය");
INSERT INTO LabelLanguage VALUES ("status", 1, "තත්වය");
INSERT INTO LabelLanguage VALUES ("date", 1, "දිනය");
INSERT INTO LabelLanguage VALUES ("eventcreator", 1, "සිදුවීම් නිර්මාණකරු");
INSERT INTO LabelLanguage VALUES ("starttime", 1, "ආරම්භක වෙලාව ");
INSERT INTO LabelLanguage VALUES ("endtime", 1, "අවසන් වන වෙලාව");
INSERT INTO LabelLanguage VALUES ("addmanager", 1, "සිදුවීම් කළමනාකරුවන් එක් කරන්න ");
INSERT INTO LabelLanguage VALUES ("saveevent", 1, "සිදුවීම සුරකින්න");
INSERT INTO LabelLanguage VALUES ("prizegiving", 1, "ත්‍යාග ප්‍රධානෝත්සවය");
INSERT INTO LabelLanguage VALUES ("sportmeet", 1, "ක්‍රීඩා උත්සවය");
INSERT INTO LabelLanguage VALUES ("teacherday", 1, "ගුරු දිනය");