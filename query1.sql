CREATE TABLE IF NOT EXISTS course (
course_id varchar(10) NOT NULL,
course_name varchar(50) NOT NULL,
semester int NOT NULL,
division varchar(20) NOT NULL,
faculty_id varchar(20) NOT NULL,
PRIMARY KEY (course_id)
);


INSERT INTO course (course_id, course_name,semester, division, faculty_id) VALUES
('116U01C305', 'DM', 3, 'C1', '101');

INSERT INTO course (course_id, course_name,semester, division, faculty_id) VALUES
('143U01D305', 'DS', 3, 'C1', '103');

INSERT INTO course (course_id, course_name,semester, division, faculty_id) VALUES
('156Y01C390', 'OOPM', 3, 'C1', '109');

SELECT * 
FROM course;

CREATE TABLE IF NOT EXISTS faculty (
faculty_id int NOT NULL,
faculty_name varchar(50) NOT NULL,
PRIMARY KEY (faculty_id)
);


INSERT INTO faculty (faculty_id, faculty_name) VALUES
(101, 'MGK');

INSERT INTO faculty (faculty_id, faculty_name) VALUES
(103, 'AGM');

INSERT INTO faculty (faculty_id, faculty_name) VALUES
(109, 'PRG');

SELECT * 
FROM faculty;

CREATE TABLE IF NOT EXISTS timetable (
timetable_id int NOT NULL,
course_name varchar(40) NOT NULL,
semester varchar(20) NOT NULL,
PRIMARY KEY (timetable_id)
) ;

INSERT INTO timetable (timetable_id,course_name,semester) VALUES
(184839, 'Discrete Mathematics','3');

SELECT * 
FROM timetable;

CREATE TABLE IF NOT EXISTS timing (
id int NOT NULL,
first varchar(20) NOT NULL,
second varchar(20) NOT NULL,
third varchar(20) NOT NULL,
fourth varchar(20) NOT NULL,
fifth varchar(20) NOT NULL,
sixth varchar(20) NOT NULL,
seventh varchar(20) NOT NULL,
eigth varchar(20) NOT NULL,
PRIMARY KEY (id)
) ;

INSERT INTO timing (id,first, second, third, fourth, fifth, sixth, seventh, eigth) VALUES
(3, '9:30-10:30', '10:30-11:30', '11:30-12:30', '12:30-1:15','1:15-2:15', '2:15-3:15', '3:15-4:15', '4:15-5:15');

INSERT INTO timing (id,first, second, third, fourth, fifth, sixth, seventh, eigth) VALUES
(4, '8:15-9:15', '9:15-10:15', '10:15-11:15', '11:15-12:15','12:15-1:15', '1:15-2:30', '2:30-3:45', '3:45-5:00');

SELECT * 
FROM timing;




CREATE TABLE admin (
name varchar(30) NOT NULL,
password varchar(10) NOT NULL
);


INSERT INTO admin (name, password) VALUES
('admin1', 'pass123');

INSERT INTO admin (name, password) VALUES
('admin2', 'pass456');

INSERT INTO admin (name, password) VALUES
('admin3', 'pass789');

SELECT * 
FROM admin;



CREATE TABLE classrooms(
name varchar(30) NOT NULL
);

INSERT INTO classrooms (name) VALUES
('B109'),
('B117'),
('B115');

SELECT * 
FROM classrooms;


CREATE TABLE semester4 (
day varchar(15) NOT NULL,
first varchar(30) NOT NULL,
second varchar(30) NOT NULL,
third varchar(30) NOT NULL,
fourth varchar(30) NOT NULL,
fifth varchar(30) NOT NULL,
sixth varchar(30) NOT NULL,
seventh varchar(30) NOT NULL,
eigth varchar(30) NOT NULL
);

DROP TABLE semester4;
INSERT INTO semester4 (day, first, second, third, fourth, fifth, sixth, seventh, eigth) VALUES
('Monday', '','PSOT_RBSL', 'TAC_SDC', 'LUNCH BREAK','WPL_GSS','WPL_GSS', 'PSOT_DPS',''),
('Tuesday', '', 'RDBMS_BPK', 'RDBMS_BPK', 'LUNCH BREAK','TAC_AYN', 'RDBMS_BHN', 'AOA_SRS', 'MP_SUK'),
('Wednesday', 'H-CSFC_ZSS', 'AOA_SRS', 'AOA_SRS', 'LUNCH BREAK', 'TAC_AYN', 'PSOT_DPS', 'AOA_SRS',''),
('Thursday', 'H-CSFC_ZSS','WPL_GSS','WPL_GSS','LUNCH BREAK' ,'TAC_AYN','AOA_SRS', 'RDBMS_BHN',''),
('Friday', 'H-CSFC_ZSS', 'MP_SUK', 'MP_SUK', 'LUNCH BREAK' ,'PSOT_DPS', 'RDBMS_BHN', 'H-ADS', 'H-ADS');

SELECT * 
FROM semester4;