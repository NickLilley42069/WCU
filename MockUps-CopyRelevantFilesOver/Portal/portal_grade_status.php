<?php

session_start();

require __DIR__ . '/../../RMS/functions/loadTemplate.php';
require __DIR__ . '/../../RMS/classes/databaseTable.php';
require __DIR__ . '/../../RMS/classes/assignment.php';
require __DIR__ . '/../../RMS/classes/studentAssignment.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$assignments_table = new \WUC\databaseTable($pdo, 'assignments', 'assignment_id', '\WUC\Entity\assignment', []);
$student_assignments_table = new \WUC\databaseTable($pdo, 'student_assignments', ['student_id', 'assignment_id'], '\WUC\Entity\studentAssignment', []);

$approved_grades = [];
$student_id = $_SESSION['student_id'] ?? null;

if ($student_id) {
    $student_assignments = $student_assignments_table->find('student_id', $student_id);

    foreach ($student_assignments as $student_assignment) {
        if (!empty($student_assignment->date_of_return)) {
            $assignments = $assignments_table->find('assignment_id', $student_assignment->assignment_id);
            if (!empty($assignments)) {
                $approved_grades[] = [
                    'assignment' => $assignments[0],
                    'student_assignment' => $student_assignment
                ];
            }
        }
    }
}

echo loadTemplate(__DIR__ . '/templates/portal_grade_status.html.php', ['approved_grades' => $approved_grades, 'student_id' => $student_id]);
