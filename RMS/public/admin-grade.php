<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/assignment.php';
require __DIR__ . '/../classes/studentAssignment.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$assignmentsTable = new \CSY2089\databaseTable($pdo, 'assignments', 'assignmentID', '\WUC\Entity\assignment', []);
$studentAssignmentsTable = new \CSY2089\databaseTable($pdo, 'student_assignments', ['studentID', 'assignmentID'], '\WUC\Entity\studentAssignment', []);

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = $_POST['studentID'] ?? null;
    $assignmentID = $_POST['assignmentID'] ?? null;

    if ($studentID && $assignmentID) {
        $studentAssignments = $studentAssignmentsTable->find(['studentID', 'assignmentID'], [$studentID, $assignmentID]);
        $assignments = $assignmentsTable->find('assignmentID', $assignmentID);

        if (!empty($studentAssignments) && !empty($assignments)) {
            $studentAssignment = $studentAssignments[0];
            $assignment = $assignments[0];

            if (is_numeric($studentAssignment->grade) && is_numeric($assignment->passGrade) && $studentAssignment->grade >= $assignment->passGrade) {
                $studentAssignmentsTable->updateRecordByCriteria(
                    ['dateOfReturn'],
                    [date('Y-m-d')],
                    ['studentID', 'assignmentID'],
                    [$studentID, $assignmentID]
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
