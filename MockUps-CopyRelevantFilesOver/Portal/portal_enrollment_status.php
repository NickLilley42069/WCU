<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/student.php';
require __DIR__ . '/../classes/recordStatus.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$record_statuses_table = new \CSY2089\databaseTable($pdo, 'record_statuses', 'statusID', '\WUC\Entity\recordStatus', []);
$students_table = new \CSY2089\databaseTable($pdo, 'student', 'studentID', '\WUC\Entity\student', []);

$enrollment_status = null;
$student_id = $_SESSION['student_id'] ?? null;

if ($student_id) {
    $students = $students_table->find('studentID', $student_id);
    if (!empty($students)) {
        $student = $students[0];
        $enrollment_status = $student->recordStatus ?? null;
        
        if ($enrollment_status) {
            $statuses = $record_statuses_table->find('statusID', $enrollment_status);
            if (!empty($statuses)) {
                $enrollment_status = $statuses[0];
            }
        }
    }
}

echo loadTemplate(__DIR__ . '/../templates/portal_enrollment_status.html.php', ['enrollment_status' => $enrollment_status, 'student_id' => $student_id]);
