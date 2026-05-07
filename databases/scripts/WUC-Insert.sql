-- @C:\databases\scripts\WUC-Insert.sql

-- Key Sequences:

CREATE SEQUENCE seq_record_statuses
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_courses
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_assignments
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_timetable
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_tickets
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_messages
INCREMENT BY 1
START WITH 1;

CREATE SEQUENCE seq_attendance
INCREMENT BY 1
START WITH 1;

-- Record Status Inserts:

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 1

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 2

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 3

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 4

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 5

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 6

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 7

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 8

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 9

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 10

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 11

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 12

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 13

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 14

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 15

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 16

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 17

INSERT INTO record_statuses (status_id, status, date_added)
VALUES (seq_record_statuses.NEXTVAL, TRUE, NOW()); -- 18

-- Emergency Contact Inserts:

INSERT INTO emergency_contacts (contact_id, first_name, middle_name, surname, phone_number, record_status)
VALUES (00001226, 'Placeholder', '', 'Contact', '+44 1234', 15);

-- Department Inserts:

INSERT INTO departments (department_id, department_name)
VALUES (0101, "Department of Arts and Humanities")
INSERT INTO departments (department_id, department_name)
VALUES (0102, "Department of Social Sciences")
INSERT INTO departments (department_id, department_name)
VALUES (0103, "Department of Science and Engineering")
INSERT INTO departments (department_id, department_name)
VALUES (0104, "Department of Business and Management")
INSERT INTO departments (department_id, department_name)
VALUES (0105, "Department of Health Sciences")
INSERT INTO departments (department_id, department_name)
VALUES (0106, "Department of Technology")
INSERT INTO departments (department_id, department_name)
VALUES (0107, "Department of Education")

-- Courses Inserts:

-- Department of Arts and Humanities
INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1001, 'English Literature', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1002, 'History', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1003, 'Nursing', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1004, 'Fine Arts', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1005, 'Music', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1006, 'Theatre Studies', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1007, 'Linguistics', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1008, 'Cultural Studies', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1009, 'Creative Writing', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1010, 'Anthropology', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1011, 'Religious Studies', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1012, 'Anthropology', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1013, 'Archaeology', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1014, 'Media Studies', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1015, 'Media Studies', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1016, 'Graphic Design', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (1017, 'Digital Media', "", 0101, LOAD_FILE('C:/databases/files/image-test.png'));

-- Department of Social Sciences
INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2001, 'Psychology', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2002, 'Sociology', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2003, 'Economics', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2004, 'Sociology', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2005, 'Political Science', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2006, 'Anthropology', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2007, 'Geography', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2008, 'International Relations', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2009, 'Criminology', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2010, 'Social Work', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2011, 'Communications', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2012, 'Development Studies', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2013, 'Public Administration', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2014, 'Environmental Studies', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2015, 'Urban Planning', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (2016, 'Gender Studies', "", 0102, LOAD_FILE('C:/databases/files/image-test.png'));

-- Department of Science and Engineering

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3001, 'Physics', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3002, 'Chemistry', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3003, 'Biology', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3004, 'Mathematics', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3005, 'Civil Engineering', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3006, 'Mechanical Engineering', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3007, 'Electrical Engineering', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3008, 'Chemical Engineering', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3009, 'Information Technology', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3010, 'Environmental Science', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3011, 'Geology', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3012, 'Astronomy', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3013, 'Nanotechnology', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (3014, 'Robotics', "", 0103, LOAD_FILE('C:/databases/files/image-test.png'));

-- Department of Business and Management

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4001, 'Business Administration', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4002, 'Marketing', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4003, 'Finance', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4004, 'Human Resource Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4005, 'International Business', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4006, 'Entrepreneurship', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4007, 'Supply Chain Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4008, 'Organizational Behavior', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4009, 'Project Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4010, 'Retail Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4011, 'Hospitality Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4010, 'Event Management', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (4011, 'E-commerce', "", 0104, LOAD_FILE('C:/databases/files/image-test.png'));

-- Department of Health Sciences
INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5001, 'Nursing', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5002, 'Medicine', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5003, 'Pharmacy', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5004, 'Dentistry', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5005, 'Nutrition', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5006, 'Public Health', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5007, 'Physiotherapy', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5008, 'Occupational Therapy', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5009, 'Speech Therapy', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5010, 'Medical Laboratory Science', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5011, 'Radiography', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5012, 'Health Informatics', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5013, 'Biomedical Science', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5014, 'Health Administration', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (5015, 'Health Education', "", 0105, LOAD_FILE('C:/databases/files/image-test.png'));


-- Department of Technology
INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6001, 'Computing', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6002, 'Software Engineering', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6003, 'Information Systems', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6004, 'Computer Networking', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6005, 'Cybersecurity', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6006, 'Data Science', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6007, 'Artificial Intelligence', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6008, 'Web Development', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6009, 'Mobile App Development', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6010, 'Cloud Computing', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6011, 'Internet of Things', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6012, 'Game Development', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6013, 'Artificial Intelligence', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6014, 'Web Development', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6015, 'Augmented Reality', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6016, 'Virtual Reality', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (6017, 'Blockchain Technology', "", 0106, LOAD_FILE('C:/databases/files/image-test.png'));

-- Department of Education
INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7001, 'Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7002, 'Early Childhood Studies', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7003, 'Special Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7004, 'Educational Psychology', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7005, 'Educational Leadership', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7006, 'Adult Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7007, 'Higher Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7008, 'Distance Learning', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7009, 'Educational Technology', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7010, 'Language Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7011, 'Mathematics Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7011, 'Mathematics Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7012, 'Science Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7013, 'Arts Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO courses (course_id, course_title, course_description, department_id, award_map)
VALUES (7014, 'Physical Education', "", 0107, LOAD_FILE('C:/databases/files/image-test.png'));

-- Modules Inserts:

INSERT INTO modules (module_id, module_description, award_map)
VALUES (2087, 'Data Structures and Algorithms', LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO modules (module_id, module_description, award_map)
VALUES (2088, 'Group Project', LOAD_FILE('C:/databases/files/image-test.png'));

INSERT INTO modules (module_id, module_description, award_map)
VALUES (2091, 'Mobile Application Development', LOAD_FILE('C:/databases/files/image-test.png'));

-- Staff Inserts:

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100012, 'Simon', '', 'White', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'CL/ML/PT', 'C2004/C3004', 'Software Engineering', 00001226, 1);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100101, 'David', '', 'Adams', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C2001/C3001', 'Software Engineering', 00001226, 2);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100190, 'Daniel', '', 'Barnes', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C1005', 'Software Engineering', 00001226, 3);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100279, 'Andrew', '', 'Fletcher', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C2003/C3002', 'Software Engineering', 00001226, 4);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100368, 'Ryan', '', 'Hickman', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C3003', 'Software Engineering', 00001226, 5);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100457, 'Paul', '', 'Jones', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C3005', 'Software Engineering', 00001226, 6);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100546, 'Matthew', '', 'Smith', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C2006', 'Software Engineering', 00001226, 7);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100635, 'Mark', '', 'Neal', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C2005', 'Software Engineering', 00001226, 8);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100724, 'Julie', '', 'Neech', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C1006', 'Software Engineering', 00001226, 9);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100813, 'Daniel', '', 'Osborne', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C1002', 'Software Engineering', 00001226, 10);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99100902, 'Thomas', '', 'Redmond', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C1003', 'Software Engineering', 00001226, 11);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (99101080, 'Raja', '', 'Patel', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'C1004/C1001', 'Software Engineering', 00001226, 12);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, specialism, emergency_contact, record_status)
VALUES (00001226, 'Adam', '', 'Blake', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'AD', 'Administration', 00001226, 13);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (00002226, 'Raj', '', 'Singh', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'ML/PT', 'PLACEHOLDER', 'PLACEHOLDER', 00001226, 14);

INSERT INTO staff (staff_id, first_name, middle_name, surname, current_address, email, phone_number, role, mod_leader, specialism, emergency_contact, record_status)
VALUES (00003226, 'Test', '', 'Staff', 'placeholderAddress', 'placeholder@gmail.com', '+44 01234', 'AD', 'PLACEHOLDER', 'PLACEHOLDER', 00001226, 18);

-- Student Inserts:

INSERT INTO students (student_id, first_name, middle_name, surname, year_of_study, current_address, home_address, phone_number, email, offer_letter, emergency_contact, record_status, course_id)
VALUES (00001226, 'Mark', '', 'Williams', 3, 'placeholderAddress', '', '+44 01234', 'placeholder@gmail.com', LOAD_FILE('C:/databases/docs/document-test.docx'), 00001226, 16, 0001);

INSERT INTO students (student_id, first_name, middle_name, surname, year_of_study, current_address, home_address, phone_number, email, offer_letter, emergency_contact, record_status, course_id)
VALUES (00002226, 'Test', '', 'Student', 2, 'placeholderAddress', '', '+44 01234', 'placeholder@gmail.com', LOAD_FILE('C:/databases/docs/document-test.docx'), 00001226, 17, 0001);

-- Assignment Inserts:

INSERT INTO assignments (assignment_id, assignment_brief, pass_grade, total_marks, examiner)
VALUES (seq_assignments.NEXTVAL, LOAD_FILE('C:/databases/docs/document-test.docx'), 40.00, 100.00, 00002226);

-- Ticket Inserts:

INSERT INTO tickets (ticket_id, problem, solved_bool, student_id, admin_id)
VALUES (seq_tickets.NEXTVAL, 'This problem should be unsolved', FALSE, 00001226, 00001226);

INSERT INTO tickets (ticket_id, problem, solved_bool, student_id, admin_id)
VALUES (seq_tickets.NEXTVAL, 'This problem should be solved', TRUE, 00002226, 00001226);

-- Chat Log Inserts:

INSERT INTO chat_logs(message_id, message, staff_id)
VALUES (seq_messages.NEXTVAL, 'This is a test message', 00003226);

-- Timetable Inserts:

INSERT INTO timetable (timetable_id, room_number, start_time, end_time, description, reg_code, module_code)
VALUES (seq_timetable.NEXTVAL, 'LH311', '2026-03-28 12:00:00', '2026-03-28 15:00:00', 'Group Project Demo', 123456, 2088);

INSERT INTO timetable (timetable_id, room_number, start_time, end_time, description, module_code)
VALUES (seq_timetable.NEXTVAL, 'Main Hall', '2026-05-18 9:00:00', '2026-05-18 11:00:00', 'Graduations', 2087);

INSERT INTO timetable (timetable_id, room_number, start_time, end_time, description, module_code)
VALUES (seq_timetable.NEXTVAL, 'Waterside Bar', '2026-04-24 9:00:00', '2026-04-24 12:00:00', 'PT Meeting', 0001);


-- Personal Tutorial Inserts:

INSERT INTO personal_tutorials (student_id, tutor_id, complete_bool, timetable_slot, documentation)
VALUES (00002226, 00003226, TRUE, 0003, LOAD_FILE('C:/databases/docs/document-test.docx'));

-- Attendance Inserts:

INSERT INTO attendance (attendance_id, attendance_bool, late_log, student_id, timetable_slot)
VALUES (seq_attendance.NEXTVAL, FALSE, TRUE, 00002226, 00001);

-- Course Module Inserts:

INSERT INTO course_modules (course_id, module_id)
VALUES (0001, 2087);

INSERT INTO course_modules (course_id, module_id)
VALUES (0001, 2088);

INSERT INTO course_modules (course_id, module_id)
VALUES (0001, 2091);

-- Module Assignment Inserts:

INSERT INTO module_assignments(module_id, assignment_id, deadline)
VALUES (2087, 0001, '2026-05-22 11:59:59');

-- Student Assignment Inserts:

INSERT INTO student_assignments(
VALUES (0001, LOAD_FILE('C:/databases/docs/document-test.docx'), 75.00, '2026-06-22 11:59:59');

