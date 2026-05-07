-- @C:\databases\scripts\WUC-Construct.sql

-- Tables


/*
The insertion order is as follows:

- record_statuses
- emergency_contacts
- courses
- modules
- staff
- students
- assignments
- timetable
- tickets
- chat_logs
- personal_tutorials
- attendance
- course_modules
- module_assignments
- student_assignments

*/


-- Table: record_statuses
	
	-- Create Command

	CREATE TABLE record_statuses (
	status_id INT(7) NOT NULL,
	status BOOLEAN NOT NULL,
	date_added DATETIME NOT NULL
	);
	
	-- PK Dependency
	
	ALTER TABLE record_statuses
	ADD CONSTRAINT pk_record_statuses
	PRIMARY KEY (status_id);
	
-- Table: emergency_contacts

	-- Create Command

	CREATE TABLE emergency_contacts (
	contact_id INT(8) NOT NULL,
	first_name VARCHAR(25) NOT NULL,
	middle_name VARCHAR(25),
	surname VARCHAR(25) NOT NULL,
	phone_number VARCHAR(20) NOT NULL,
	record_status INT(7) NOT NULL
	);
	
	-- PK Dependency
	
	ALTER TABLE emergency_contacts
	ADD CONSTRAINT pk_emergency_contacts
	PRIMARY KEY (contact_id);
		
	-- FK Dependencies
	
	ALTER TABLE emergency_contacts
	ADD CONSTRAINT fk_rs_emergency_contacts
	FOREIGN KEY (record_status)
	REFERENCES record_statuses(status_id);
		
-- Table: courses

	-- Create Command

	CREATE TABLE courses (
	course_id INT(4) NOT NULL,
	course_description VARCHAR(255) NOT NULL,
	award_map BLOB NOT NULL
	);

	-- PK Dependency

	ALTER TABLE courses
	ADD CONSTRAINT pk_courses
	PRIMARY KEY (course_id);

-- Table: modules

	-- Create Command

	CREATE TABLE modules (
	module_id INT(4) NOT NULL,
	module_description VARCHAR(255) NOT NULL,
	roadmap BLOB NOT NULL
	);

	-- PK Dependency

	ALTER TABLE modules
	ADD CONSTRAINT pk_modules
	PRIMARY KEY (module_id);

-- Table: students

	-- Create Command
	
	CREATE TABLE students (
	student_id INT(8) NOT NULL,
	first_name VARCHAR(25) NOT NULL,
	middle_name VARCHAR(25),
	surname VARCHAR(25) NOT NULL,
	year_of_study INT(1),
	current_address VARCHAR(40) NOT NULL,
	home_address VARCHAR(40),
	phone_number VARCHAR(20) NOT NULL,
	email VARCHAR(254) NOT NULL,
	offer_letter BLOB NOT NULL,
	degree_classification DECIMAL(5,2) NOT NULL,
	emergency_contact INT(8) NOT NULL,
	record_status INT(7) NOT NULL,
	course_id INT(4) NOT NULL
	);	
	
	-- PK Dependency

	ALTER TABLE students
	ADD CONSTRAINT pk_students
	PRIMARY KEY (student_id);
	
	-- FK Dependencies

	ALTER TABLE students
	ADD CONSTRAINT fk_ec_students
	FOREIGN KEY (emergency_contact)
	REFERENCES emergency_contacts(contact_id);
	
	ALTER TABLE students
	ADD CONSTRAINT fk_rs_students
	FOREIGN KEY (record_status)
	REFERENCES record_statuses(status_id);
	
	ALTER TABLE students
	ADD CONSTRAINT fk_c_students
	FOREIGN KEY (course_id)
	REFERENCES courses(course_id);

-- Table: staff

	-- Create Command	
	
 	CREATE TABLE staff (
	staff_id INT(8) NOT NULL,
	first_name VARCHAR(25) NOT NULL,
	middle_name VARCHAR(25),
	surname VARCHAR(25) NOT NULL,
	current_address VARCHAR(40) NOT NULL,
	email VARCHAR(254) NOT NULL,
	phone_number VARCHAR(20) NOT NULL,
	mod_leader VARCHAR(17),
	role VARCHAR(8) NOT NULL,
	entry_qualifications BLOB,
	specialism VARCHAR(50) NOT NULL,
	emergency_contact INT(8) NOT NULL,
	record_status INT(7) NOT NULL
	);

	-- PK Dependency
	
	ALTER TABLE staff
	ADD CONSTRAINT pk_staff
	PRIMARY KEY (staff_id);
	
	-- FK Dependencies

	ALTER TABLE staff
	ADD CONSTRAINT fk_ec_staff
	FOREIGN KEY (emergency_contact)
	REFERENCES emergency_contacts(contact_id);
	
	ALTER TABLE staff
	ADD CONSTRAINT fk_rs_staff
	FOREIGN KEY (record_status)
	REFERENCES record_statuses(status_id);
	
-- Table: assignments

	-- Create Command
	
	CREATE TABLE assignments (
	assignment_id INT(4) NOT NULL,
	assignment_brief BLOB NOT NULL,
	pass_grade DECIMAL(5,2) NOT NULL,
	total_marks DECIMAL(5,2) NOT NULL,
	examiner INT(8) NOT NULL
	);

	-- PK Dependency

	ALTER TABLE assignments
	ADD CONSTRAINT pk_assignments
	PRIMARY KEY (assignment_id);
	
	-- FK Dependencies
	
	ALTER TABLE assignments
	ADD CONSTRAINT fk_sta_assignments
	FOREIGN KEY (examiner)
	REFERENCES staff(staff_id);
		
-- Table: tickets

	-- Create Command	

	CREATE TABLE tickets (
	ticket_id INT(7) NOT NULL,
	problem VARCHAR(255) NOT NULL,
	solved_bool BOOLEAN NOT NULL,
	student_id INT(8) NOT NULL,
	admin_id INT(8) NOT NULL
	);

	-- PK Dependency

	ALTER TABLE tickets
	ADD CONSTRAINT pk_tickets
	PRIMARY KEY (ticket_id);
	
	-- FK Dependencies
	
	ALTER TABLE tickets
	ADD CONSTRAINT fk_stu_tickets
	FOREIGN KEY (student_id)
	REFERENCES students(student_id);
	
	ALTER TABLE tickets
	ADD CONSTRAINT fk_sta_tickets
	FOREIGN KEY (admin_id)
	REFERENCES staff(staff_id);
	
-- Table: chat_logs

	-- Create Command
	
	CREATE TABLE chat_logs (
	message_id INT(4) NOT NULL,
	message VARCHAR(255) NOT NULL,
	staff_id INT(8) NOT NULL
	);

	-- PK Dependency

	ALTER TABLE chat_logs
	ADD CONSTRAINT pk_chat_logs
	PRIMARY KEY (message_id);
	
	-- FK Dependencies
	
	ALTER TABLE chat_logs
	ADD CONSTRAINT fk_sta_chat_logs
	FOREIGN KEY (staff_id)
	REFERENCES staff(staff_id);
	
-- Table: timetable

	-- Create Command
	
	CREATE TABLE timetable (
	timetable_id INT(5) NOT NULL,
	room_number VARCHAR(30) NOT NULL,
	start_time DATETIME NOT NULL,
	end_time DATETIME NOT NULL,
	description VARCHAR(255) NOT NULL,
	reg_code INT(6),
	module_code INT(4) NOT NULL
	);
	
	-- PK Dependency
	
	ALTER TABLE timetable
	ADD CONSTRAINT pk_timetable
	PRIMARY KEY (timetable_id);
	
	-- FK Dependencies
	
	ALTER TABLE timetable
	ADD CONSTRAINT fk_m_timetable
	FOREIGN KEY (module_code)
	REFERENCES modules(module_id);
	
-- Table: personal_tutorials

	-- Create Command
	
	CREATE TABLE personal_tutorials (
	student_id INT(8) NOT NULL,
	tutor_id INT(8) NOT NULL,
	complete_bool BOOLEAN NOT NULL,
	timetable_slot INT(5) NOT NULL,
	documentation BLOB
	);
	
	-- PK Dependencies
	
	ALTER TABLE personal_tutorials
	ADD CONSTRAINT pk_personal_tutorials
	PRIMARY KEY (student_id, tutor_id);
	
	-- FK Dependencies
	
	ALTER TABLE personal_tutorials
	ADD CONSTRAINT fk_stu_personal_tutorials
	FOREIGN KEY (student_id)
	REFERENCES students(student_id);
	
	ALTER TABLE personal_tutorials
	ADD CONSTRAINT fk_sta_personal_tutorials
	FOREIGN KEY (tutor_id)
	REFERENCES staff(staff_id);
	
	ALTER TABLE personal_tutorials
	ADD CONSTRAINT fk_tim_personal_tutorials
	FOREIGN KEY (timetable_slot)
	REFERENCES timetable(timetable_id);
	
-- Table: attendance

	-- Create Command

	CREATE TABLE attendance (
	attendance_id INT(5) NOT NULL,
	attendance_bool BOOLEAN NOT NULL,
	late_log BOOLEAN NOT NULL,
	student_id INT(8) NOT NULL,
	timetable_slot INT(5) NOT NULL
	);

	-- PK Dependency

	ALTER TABLE attendance
	ADD CONSTRAINT pk_attendance
	PRIMARY KEY (attendance_id);
	
	-- FK Dependencies
	
	ALTER TABLE attendance
	ADD CONSTRAINT fk_stu_attendance
	FOREIGN KEY (student_id)
	REFERENCES students(student_id);
	
	ALTER TABLE attendance
	ADD CONSTRAINT fk_tim_attendance
	FOREIGN KEY (timetable_slot)
	REFERENCES timetable(timetable_id);
	
-- Table: course_modules

	-- Create Command

	CREATE TABLE course_modules (
	course_id INT(4) NOT NULL,
	module_id INT(4) NOT NULL
	);

	-- PK Dependencies

	ALTER TABLE course_modules
	ADD CONSTRAINT pk_course_modules
	PRIMARY KEY (course_id, module_id);
	
	-- FK Dependencies

	ALTER TABLE course_modules
	ADD CONSTRAINT fk_c_course_modules
	FOREIGN KEY (course_id)
	REFERENCES courses(course_id);
	
	ALTER TABLE course_modules
	ADD CONSTRAINT fk_m_course_modules
	FOREIGN KEY (module_id)
	REFERENCES modules(module_id);
	
-- Table: module_assignments

	-- Create Command
	
	CREATE TABLE module_assignments (
	module_id INT(4) NOT NULL,
	assignment_id INT(4) NOT NULL,
	deadline DATETIME NOT NULL
	);
	
	-- PK Dependencies
	
	ALTER TABLE module_assignments
	ADD CONSTRAINT pk_module_assignments
	PRIMARY KEY (module_id, assignment_id);
	
	-- FK Dependencies
	
	ALTER TABLE module_assignments
	ADD CONSTRAINT fk_m_module_assignments
	FOREIGN KEY (module_id)
	REFERENCES modules(module_id);
	
	ALTER TABLE module_assignments
	ADD CONSTRAINT fk_a_module_assignments
	FOREIGN KEY (assignment_id)
	REFERENCES assignments(assignment_id);
	
-- Table: student_assignments

	-- Create Command
	
	CREATE TABLE student_assignments (
	student_id INT(8) NOT NULL,
	assignment_id INT(4) NOT NULL,
	submission BLOB,
	grade DECIMAL(5,2),
	date_of_return DATETIME
	);
	
	-- PK Dependency
	
	ALTER TABLE student_assignments
	ADD CONSTRAINT pk_student_assignments
	PRIMARY KEY (student_id, assignment_id);
	
	-- FK Dependencies
	
	ALTER TABLE student_assignments
	ADD CONSTRAINT fk_stu_student_assignments
	FOREIGN KEY (student_id)
	REFERENCES students(student_id);
	
	ALTER TABLE student_assignments
	ADD CONSTRAINT fk_a_student_assignments
	FOREIGN KEY (assignment_id)
	REFERENCES assignments(assignment_id);
	
	
-- Save Changes 

COMMIT;