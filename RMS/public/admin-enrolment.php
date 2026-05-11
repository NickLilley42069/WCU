<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/student.php';
require __DIR__ . '/../classes/recordStatus.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$recordStatusesTable = new \CSY2089\databaseTable($pdo, 'record_statuses', 'statusID', '\WUC\Entity\recordStatus', []);
$studentsTable = new \CSY2089\databaseTable($pdo, 'student', 'studentID', '\WUC\Entity\student', []);

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = $_POST['studentID'] ?? null;
    $decision = $_POST['decision'] ?? null;
    $offerLetterBlob = null;

    if (isset($_FILES['offerLetter']) && $_FILES['offerLetter']['error'] === UPLOAD_ERR_OK) {
        $offerLetterBlob = file_get_contents($_FILES['offerLetter']['tmp_name']);
    }

    if ($studentID && $decision) {
        $students = $studentsTable->find('studentID', $studentID);
        if (!empty($students)) {
            $recordStatus = new \WUC\Entity\recordStatus();
            $recordStatus->status = $decision === 'accept' ? 'accepted' : 'rejected';
            $recordStatus->dateAdded = date('Y-m-d H:i:s');

            $statusId = $recordStatusesTable->insertRecord(get_object_vars($recordStatus));
            if ($statusId) {
                $studentsTable->updateRecord('recordStatus', $statusId, 'studentID', $studentID);
                if ($offerLetterBlob !== null) {
                    $studentsTable->updateRecord('offerLetter', $offerLetterBlob, 'studentID', $studentID);
                }
                $message = 'Enrolment processed successfully.';
            } else {
                $message = 'Failed to save record status.';
            }
        } else {
            $message = 'Student not found.';
        }
    } else {
        $message = 'Student ID and decision are required.';
    }
}

echo loadTemplate(__DIR__ . '/../templates/admin-enrolment.html.php', ['message' => $message]);
