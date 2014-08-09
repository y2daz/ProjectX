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