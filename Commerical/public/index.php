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



$pdo = new PDO('mysql:host=host.docker.internal;dbname=wuc-schema;charset=utf8', 'root', 'root');

$assignmentsTable = new \WUC\databaseTable($pdo, 'assignments', 'assignment_id', 'stdClass', []);
$attendanceTable = new \WUC\databaseTable($pdo, 'attendance', 'attendance_id', 'stdClass', []);
$chatlogsTable = new \WUC\databaseTable($pdo, 'chat_logs', 'message_id', 'stdClass', []);
$courseModulesLinkTable = new \WUC\databaseTable($pdo, 'course_modules', ['course_id', 'module_id'], 'stdClass', []);
$coursesTable = new \WUC\databaseTable($pdo, 'courses', 'course_id', 'stdClass', []);
$departmentsTable = new \WUC\databaseTable($pdo, 'departments', 'department_id', 'stdClass', []);
$emergencyContactsTable = new \WUC\databaseTable($pdo, 'emergency_contacts', 'contact_id', 'stdClass', []);
$moduleAssignmentsTable = new \WUC\databaseTable($pdo, 'module_assignments', ['module_id', 'assignment_id'], 'stdClass', []);
$modulesTable = new \WUC\databaseTable($pdo, 'modules', 'module_id', 'stdClass', []);
$personalTutorialsTable = new \WUC\databaseTable($pdo, 'personal_tutorials', ['student_id', 'tutor_id'], 'stdClass', []);
$recordStatusesTable = new \WUC\databaseTable($pdo, 'record_statuses', 'status_id', 'stdClass', []);
$staffTable = new \WUC\databaseTable($pdo, 'staff', 'staff_id', 'stdClass', []);
$studentAssignmentsTable = new \WUC\databaseTable($pdo, 'student_assignments', ['student_id', 'assignmentID'], 'stdClass', []);
$studentsTable = new \WUC\databaseTable($pdo, 'student', 'student_id', 'stdClass', []);
$ticketsTable = new \WUC\databaseTable($pdo, 'tickets', 'ticket_id', 'stdClass', []);
$timetable = new \WUC\databaseTable($pdo, 'timetable', 'timetable_id', 'stdClass', []);

$controller = new \WUC\controllerCommercial($assignmentsTable, $attendanceTable, $chatlogsTable, $courseModulesLinkTable, $coursesTable, $departmentsTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable);




$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$uri = trim($uri, '/');

// remove index.php if present
if (str_starts_with($uri, 'index.php/')) {
    $uri = substr($uri, strlen('index.php/'));
}

if ($uri && method_exists($controller, $uri)) {

    $page = $controller->$uri();

    if ($page !== null) {
        echo $page;
    }

}
else {
    echo $controller->home();
}





