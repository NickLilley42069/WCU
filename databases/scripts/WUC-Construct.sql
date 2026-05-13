
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

-- Default Engine for FK Compatibility
CREATE DATABASE IF NOT EXISTS `wuc-schema`;
USE `wuc-schema`;

-- Table: record_statuses
    
    -- Create Command

    CREATE TABLE record_statuses (
    status_id INT(7) NOT NULL AUTO_INCREMENT,
    status BOOLEAN NOT NULL,
    date_added DATETIME NOT NULL,
    PRIMARY KEY (status_id)
    )ENGINE=INNODB;

-- Table: emergency_contacts

    -- Create Command

    CREATE TABLE emergency_contacts (
    contact_id INT(8) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    middle_name VARCHAR(25),
    surname VARCHAR(25) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    record_status INT(7) NOT NULL,
    PRIMARY KEY (contact_id)
    )ENGINE=INNODB;

    -- FK Dependencies
    
    ALTER TABLE emergency_contacts
    ADD CONSTRAINT fk_rs_emergency_contacts
    FOREIGN KEY (record_status)
    REFERENCES record_statuses(status_id);
        
-- Table: Department

	-- Create Command

	CREATE TABLE departments (
	department_id INT(4) NOT NULL AUTO_INCREMENT,
	department_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (department_id)

	)ENGINE=INNODB;

-- Table: courses

    -- Create Command

    CREATE TABLE courses (
    course_id INT(4) NOT NULL AUTO_INCREMENT,
	course_title VARCHAR(40) NOT NULL,
    course_description VARCHAR(255) NOT NULL,
	department_id INT(4) NOT NULL,
    award_map LONGBLOB NULL,
    PRIMARY KEY (course_id)
    )ENGINE=INNODB;
    
    -- FK Dependencies

    ALTER TABLE courses
    ADD CONSTRAINT fk_d_courses
    FOREIGN KEY (department_id)
    REFERENCES departments(department_id);


-- Table: modules

    -- Create Command

    CREATE TABLE modules (
    module_id INT(4) NOT NULL,
    module_description VARCHAR(255) NOT NULL,
    award_map LONGBLOB NULL,
    PRIMARY KEY (module_id)
    )ENGINE=INNODB;


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
    offer_letter LONGBLOB NULL,
    degree_classification DECIMAL(5,2),
    emergency_contact INT(8) NOT NULL,
    record_status INT(7) NOT NULL,
    course_id INT(4) NOT NULL,
    PRIMARY KEY (student_id)
    )ENGINE=INNODB;

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
    entry_qualifications LONGBLOB,
    specialism VARCHAR(50) NOT NULL,
    emergency_contact INT(8) NOT NULL,
    record_status INT(7) NOT NULL,
    PRIMARY KEY (staff_id)
    )ENGINE=INNODB;

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
    assignment_id INT(4) NOT NULL AUTO_INCREMENT,
    assignment_brief LONGBLOB NULL,
    pass_grade DECIMAL(5,2) NOT NULL,
    total_marks DECIMAL(5,2) NOT NULL,
    examiner INT(8) NOT NULL,
    PRIMARY KEY (assignment_id)
    )ENGINE=INNODB;

    -- FK Dependencies
    
    ALTER TABLE assignments
    ADD CONSTRAINT fk_sta_assignments
    FOREIGN KEY (examiner)
    REFERENCES staff(staff_id);
        
-- Table: tickets

    -- Create Command    

    CREATE TABLE tickets (
    ticket_id INT(7) NOT NULL AUTO_INCREMENT,
    problem VARCHAR(255) NOT NULL,
    solved_bool BOOLEAN NOT NULL,
    student_id INT(8) NOT NULL,
    admin_id INT(8) NOT NULL,
    PRIMARY KEY (ticket_id)
    )ENGINE=INNODB;

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
    message_id INT(4) NOT NULL AUTO_INCREMENT,
    message VARCHAR(255) NOT NULL,
    staff_id INT(8) NOT NULL,
    PRIMARY KEY (message_id)
    )ENGINE=INNODB;

    -- FK Dependencies
    
    ALTER TABLE chat_logs
    ADD CONSTRAINT fk_sta_chat_logs
    FOREIGN KEY (staff_id)
    REFERENCES staff(staff_id);
    
-- Table: timetable

    -- Create Command
    
    CREATE TABLE timetable (
    timetable_id INT(5) NOT NULL AUTO_INCREMENT,
    room_number VARCHAR(30) NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    description VARCHAR(255) NOT NULL,
    reg_code INT(6),
    module_code INT(4) NOT NULL,
    PRIMARY KEY (timetable_id)
    )ENGINE=INNODB;

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
    documentation LONGBLOB
    )ENGINE=INNODB;

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
    attendance_id INT(5) NOT NULL AUTO_INCREMENT,
    attendance_bool BOOLEAN NOT NULL,
    late_log BOOLEAN NOT NULL,
    student_id INT(8) NOT NULL,
    timetable_slot INT(5) NOT NULL,
    PRIMARY KEY (attendance_id)
    )ENGINE=INNODB;

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
    )ENGINE=INNODB;

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
    )ENGINE=INNODB;

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
    submission LONGBLOB,
    grade DECIMAL(5,2),
    date_of_return DATETIME
    )ENGINE=INNODB;

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
