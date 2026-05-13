<?php

session_start();


require_once __DIR__ . '/../functions/connectToDB.php';
require_once __DIR__ . '/../functions/loadTemplate.php';
require_once __DIR__ . '/../classes/databaseTable.php';
require_once __DIR__ . '/../controllers/controller.php';

require_once __DIR__ . '/../classes/assignment.php';
require_once __DIR__ . '/../classes/attendanceLog.php';
require_once __DIR__ . '/../classes/chatLog.php';
require_once __DIR__ . '/../classes/courseModule.php';
require_once __DIR__ . '/../classes/course.php';
require_once __DIR__ . '/../classes/emergencyContact.php';
require_once __DIR__ . '/../classes/moduleAssignment.php';
require_once __DIR__ . '/../classes/module.php';
require_once __DIR__ . '/../classes/personalTutorial.php';
require_once __DIR__ . '/../classes/recordStatus.php';
require_once __DIR__ . '/../classes/staffMember.php';
require_once __DIR__ . '/../classes/studentAssignment.php';
require_once __DIR__ . '/../classes/student.php';
require_once __DIR__ . '/../classes/ticket.php';
require_once __DIR__ . '/../classes/timetableSlot.php';



$host = getenv('DB_HOST') ?: 'host.docker.internal';
$pdo = new PDO('mysql:host=' . $host . ';dbname=wuc-schema;charset=utf8', 'root', 'root');


$assignmentsTable =  new \WUC\databaseTable($pdo, 'assignments', 'assignment_id', '\assignment1\Entity\assignment', []);;
$attendanceTable = new \WUC\databaseTable($pdo, 'attendance', 'attendance_id', '\WUC\Entity\attendance', []);
$chatlogsTable = new \WUC\databaseTable($pdo, 'chat_logs', 'message_id', '\WUC\Entity\chatLog', []);
$courseModulesLinkTable = new \WUC\databaseTable($pdo, 'course_modules', ['course_id', 'module_id'], '\WUC\Entity\courseModule', []);
$coursesTable =  new \WUC\databaseTable($pdo, 'courses', 'course_id', '\WUC\Entity\course', []);
$departmentsTable =  new \WUC\databaseTable($pdo, 'departments', 'department_id', '\WUC\Entity\department', []);
$emergencyContactsTable = new \WUC\databaseTable($pdo, 'emergency_contacts', 'contact_id', '\WUC\Entity\emergencyContact', []);
$moduleAssignmentsTable = new \WUC\databaseTable($pdo, 'module_assignments', ['module_id', 'assignment_id'], '\WUC\Entity\moduleAssignment', []);;
$modulesTable = new \WUC\databaseTable($pdo, 'modules', 'module_id', '\WUC\Entity\module', []);
$personalTutorialsTable = new \WUC\databaseTable($pdo, 'personal_tutorials', ['student_id', 'tutor_id'], '\WUC\Entity\personalTutorial', []);
$recordStatusesTable = new \WUC\databaseTable($pdo, 'record_statuses', 'status_id', '\WUC\Entity\recordStatus', []);
$staffTable = new \WUC\databaseTable($pdo, 'staff', 'staff_id', '\WUC\Entity\staffMember', []);
$studentAssignmentsTable = new \WUC\databaseTable($pdo, 'student_assignments', ['student_id', 'assignment_id'], '\WUC\Entity\studentAssignment', []);
$studentsTable = new \WUC\databaseTable($pdo, 'students', 'student_id', '\WUC\Entity\student', []);
$ticketsTable = new \WUC\databaseTable($pdo, 'tickets', 'ticket_id', '\WUC\Entity\ticket', []);
$timetable = new \WUC\databaseTable($pdo, 'timetable', 'timetable_id', '\WUC\Entity\timetableSlot', []);

$controller = new \WUC\controllerRMS($assignmentsTable, $attendanceTable, $chatlogsTable, $courseModulesLinkTable, $coursesTable, $departmentsTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable);




$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$uri = trim($uri, '/');

// remove index.php if present
if (str_starts_with($uri, 'index.php/')) {
    $uri = substr($uri, strlen('index.php/'));
}

if ($uri && method_exists($controller, $uri)) {
    $page = $controller->$uri();
} else {
    $page = $controller->home();
}

echo $page;





