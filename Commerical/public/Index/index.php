<?php

session_start();

require '../functions/loadTemplate.php';
require '../classes/databaseTable.php';
require '../RMS/controllers/controller.php';

/*
require '../classes/assignment.php';
require '../classes/attendanceLog.php';
require '../classes/chatLog.php';
require '../classes/courseModule.php';
require '../classes/course.php';
require '../classes/emergencyContact.php';
require '../classes/moduleAssignment.php';
require '../classes/module.php';
require '../classes/personalTutorial.php';
require '../classes/recordStatus.php';
require '../classes/staff.php';
require '../classes/studentAssignment.php';
require '../classes/student.php';
require '../classes/ticket.php';
require '../classes/timetableSlot.php';
*/

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

/*
$assignmentsTable =  new \CSY2089\databaseTable($pdo, 'assignments', 'assignment_id', '\assignment1\Entity\assignment', []);;
$attendanceTable = new \CSY2089\databaseTable($pdo, 'attendance', 'attendance_id', '\WUC\Entity\attendance', []);
$chatlogsTable = new \CSY2089\databaseTable($pdo, 'chat_logs', 'message_id', '\WUC\Entity\chatLog', []);
$courseModulesLinkTable =  = new \CSY2089\databaseTable($pdo, 'course_modules', ['course_id', 'module_id'], '\WUC\Entity\courseModule', []);
$coursesTable =  new \CSY2089\databaseTable($pdo, 'courses', 'course_id', '\WUC\Entity\course', []);
$emergencyContactsTable = new \CSY2089\databaseTable($pdo, 'emergency_contacts', 'contact_id', '\WUC\Entity\emergencyContact', []);
$moduleAssignmentsTable = new \CSY2089\databaseTable($pdo, 'module_assignments', ['module_id', 'assignment_id'], '\WUC\Entity\moduleAssignment', []);;
$modulesTable = new \CSY2089\databaseTable($pdo, 'modules', 'module_id', '\WUC\Entity\module', []);
$personalTutorialsTable = new \CSY2089\databaseTable($pdo, 'personal_tutorials', ['student_id', 'tutor_id'], '\WUC\Entity\personalTutorial', []);
$recordStatusesTable = new \CSY2089\databaseTable($pdo, 'record_statuses', 'status_id', '\WUC\Entity\recordStatus', []);
$staffTable = new \CSY2089\databaseTable($pdo, 'staff', 'staff_id', '\WUC\Entity\staff', []);
$studentAssignmentsTable = new \CSY2089\databaseTable($pdo, 'student_assignments', ['student_id', 'assignmentID'], '\WUC\Entity\studentAssignment', []);
$studentsTable = new \CSY2089\databaseTable($pdo, 'student', 'student_id', '\WUC\Entity\student', []);
$ticketsTable = new \CSY2089\databaseTable($pdo, 'tickets', 'ticket_id', '\WUC\Entity\ticket', []);
$timetable = new \CSY2089\databaseTable($pdo, 'timetable', 'timetable_id', '\WUC\Entity\timetableSlot', []);

$controller = new \CSY2089\controller($assignmentsTable, $attendanceTable, $chatlogsTable, $courseModulesLinkTable, $coursesTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable);
*/


if ($_SERVER['REQUEST_URI'] !== '/') {

    $functionCall = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
    $page = $controller->$functionCall();

}

else {

    $page = $controller->home();

}




