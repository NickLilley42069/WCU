<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/assignment.php';
require __DIR__ . '/../classes/studentAssignment.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$assignments_table = new \CSY2089\databaseTable($pdo, 'assignments', 'assignmentID', '\WUC\Entity\assignment', []);
$student_assignments_table = new \CSY2089\databaseTable($pdo, 'student_assignments', ['studentID', 'assignmentID'], '\WUC\Entity\studentAssignment', []);

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? null;
    $assignment_id = $_POST['assignment_id'] ?? null;

    if ($student_id && $assignment_id) {
        $student_assignments = $student_assignments_table->find(['studentID', 'assignmentID'], [$student_id, $assignment_id]);
        $assignments = $assignments_table->find('assignmentID', $assignment_id);

        if (!empty($student_assignments) && !empty($assignments)) {
            $student_assignment = $student_assignments[0];
            $assignment = $assignments[0];

            if (is_numeric($student_assignment->grade) && is_numeric($assignment->passGrade) && $student_assignment->grade >= $assignment->passGrade) {
                $student_assignments_table->updateRecordByCriteria(
                    ['dateOfReturn'],
                    [date('Y-m-d')],
                    ['studentID', 'assignmentID'],
                    [$student_id, $assignment_id]
                );
                $message = 'Grade approved.';
            } else {
                $message = 'Grade not approved or grade is missing.';
            }
        } else {
            $message = 'Student assignment or assignment not found.';
        }
    } else {
        $message = 'Student ID and assignment ID are required.';
    }
}

echo loadTemplate(__DIR__ . '/../templates/admin-grade.html.php', ['message' => $message]);
