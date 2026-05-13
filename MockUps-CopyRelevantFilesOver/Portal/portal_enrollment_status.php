<?php

session_start();

require __DIR__ . '/../../RMS/functions/loadTemplate.php';
require __DIR__ . '/../../RMS/classes/databaseTable.php';
require __DIR__ . '/../../RMS/classes/student.php';
require __DIR__ . '/../../RMS/classes/recordStatus.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$record_statuses_table = new \WUC\databaseTable($pdo, 'record_statuses', 'status_id', '\WUC\Entity\recordStatus', []);
$students_table = new \WUC\databaseTable($pdo, 'student', 'student_id', '\WUC\Entity\student', []);

$enrollment_status = null;
$student_id = $_SESSION['student_id'] ?? null;

if ($student_id) {
    $students = $students_table->find('student_id', $student_id);
    if (!empty($students)) {
        $student = $students[0];
        $status_id = $student->record_status ?? null;

        if ($status_id) {
            $statuses = $record_statuses_table->find('status_id', $status_id);
            if (!empty($statuses)) {
                $enrollment_status = $statuses[0];
            }
        }
    }
}

echo loadTemplate(__DIR__ . '/templates/portal_enrollment_status.html.php', ['enrollment_status' => $enrollment_status, 'student_id' => $student_id]);
