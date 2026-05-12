<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/assignment.php';
require __DIR__ . '/../classes/studentAssignment.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$assignments_table = new \CSY2089\databaseTable($pdo, 'assignments', 'assignmentID', '\WUC\Entity\assignment', []);
$student_assignments_table = new \CSY2089\databaseTable($pdo, 'student_assignments', ['studentID', 'assignmentID'], '\WUC\Entity\studentAssignment', []);

$approved_grades = [];
$student_id = $_SESSION['student_id'] ?? null;

if ($student_id) {
    $student_assignments = $student_assignments_table->find('studentID', $student_id);
    
    foreach ($student_assignments as $student_assignment) {
        if (!empty($student_assignment->dateOfReturn)) {
            $assignments = $assignments_table->find('assignmentID', $student_assignment->assignmentID);
            if (!empty($assignments)) {
                $approved_grades[] = [
                    'assignment' => $assignments[0],
                    'student_assignment' => $student_assignment
                ];
            }
        }
    }
}

echo loadTemplate(__DIR__ . '/../templates/portal_grade_status.html.php', ['approved_grades' => $approved_grades, 'student_id' => $student_id]);
