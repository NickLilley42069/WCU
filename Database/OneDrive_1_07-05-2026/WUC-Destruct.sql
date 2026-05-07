-- @C:\databases\scripts\WUC-Destruct.sql

-- Tables

/*
The deletion order is as follows:


- student_assignments
- module_assignments
- course_modules
- attendance
- personal_tutorials
- timetable
- chat_logs
- tickets
- assignments
- staff
- students
- modules
- courses
- emergency_contacts
- record_statuses

*/

/*
We will drop in this order:

-- Sequences
-- FKs
-- PKs
-- Tables
*/

-- Sequences

DROP SEQUENCE seq_step_one;

-- FKs

ALTER TABLE student_assignments
DROP FOREIGN KEY fk_a_student_assignments;

ALTER TABLE student_assignments
DROP FOREIGN KEY fk_stu_student_assignments;

ALTER TABLE module_assignments
DROP FOREIGN KEY fk_m_module_assignments;

ALTER TABLE module_assignments
DROP FOREIGN KEY fk_a_module_assignments;

ALTER TABLE course_modules
DROP FOREIGN KEY fk_c_course_modules;

ALTER TABLE course_modules
DROP FOREIGN KEY fk_m_course_modules;

ALTER TABLE attendance
DROP FOREIGN KEY fk_stu_attendance;

ALTER TABLE attendance
DROP FOREIGN KEY fk_tim_attendance;

ALTER TABLE personal_tutorials
DROP FOREIGN KEY fk_stu_personal_tutorials;

ALTER TABLE personal_tutorials
DROP FOREIGN KEY fk_sta_personal_tutorials;

ALTER TABLE personal_tutorials
DROP FOREIGN KEY fk_tim_personal_tutorials;

ALTER TABLE timetable
DROP FOREIGN KEY fk_m_timetable;

ALTER TABLE chat_logs
DROP FOREIGN KEY fk_sta_chat_logs;

ALTER TABLE tickets
DROP FOREIGN KEY fk_stu_tickets;

ALTER TABLE tickets
DROP FOREIGN KEY fk_sta_tickets;

ALTER TABLE assignments
DROP FOREIGN KEY fk_sta_assignments;

ALTER TABLE staff
DROP FOREIGN KEY fk_ec_staff;

ALTER TABLE staff
DROP FOREIGN KEY fk_rs_staff;

ALTER TABLE students
DROP FOREIGN KEY fk_ec_students;

ALTER TABLE students
DROP FOREIGN KEY fk_rs_students;

ALTER TABLE students
DROP FOREIGN KEY fk_c_students;

-- PKs

ALTER TABLE student_assignments
DROP PRIMARY KEY;

ALTER TABLE module_assignments
DROP PRIMARY KEY;

ALTER TABLE course_modules
DROP PRIMARY KEY;

ALTER TABLE attendance
DROP PRIMARY KEY;

ALTER TABLE personal_tutorials
DROP PRIMARY KEY;

ALTER TABLE timetable
DROP PRIMARY KEY;

ALTER TABLE chat_logs
DROP PRIMARY KEY;

ALTER TABLE tickets
DROP PRIMARY KEY;

ALTER TABLE assignments
DROP PRIMARY KEY;

ALTER TABLE staff
DROP PRIMARY KEY;

ALTER TABLE students
DROP PRIMARY KEY;

ALTER TABLE modules
DROP PRIMARY KEY;

ALTER TABLE courses
DROP PRIMARY KEY;

ALTER TABLE emergency_contacts
DROP PRIMARY KEY;

ALTER TABLE record_statuses
DROP PRIMARY KEY;

-- Tables

DROP TABLE student_assignments;

DROP TABLE module_assignments;

DROP TABLE course_modules;

DROP TABLE attendance;

DROP TABLE personal_tutorials;

DROP TABLE timetable;

DROP TABLE chat_logs;

DROP TABLE tickets;

DROP TABLE assignments;

DROP TABLE staff;

DROP TABLE students;

DROP TABLE modules;

DROP TABLE courses;

DROP TABLE emergency_contacts;

DROP TABLE record_statuses;

-- Save Changes

COMMIT;