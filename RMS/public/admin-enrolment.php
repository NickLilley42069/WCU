<?php

session_start();

require __DIR__ . '/../functions/loadTemplate.php';
require __DIR__ . '/../classes/databaseTable.php';
require __DIR__ . '/../classes/student.php';
require __DIR__ . '/../classes/recordStatus.php';

$pdo = new PDO('mysql:host=mysql;dbname=wuc-schema;charset=utf8', 'root', 'root');

$record_statuses_table = new \CSY2089\databaseTable($pdo, 'record_statuses', 'statusID', '\WUC\Entity\recordStatus', []);
$students_table = new \CSY2089\databaseTable($pdo, 'student', 'studentID', '\WUC\Entity\student', []);

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? null;
    $decision = $_POST['decision'] ?? null;
    $offer_letter_blob = null;

    if (isset($_FILES['offer_letter']) && $_FILES['offer_letter']['error'] === UPLOAD_ERR_OK) {
        $offer_letter_blob = file_get_contents($_FILES['offer_letter']['tmp_name']);
    }

    if ($student_id && $decision) {
        $students = $students_table->find('studentID', $student_id);
        if (!empty($students)) {
            $record_status = new \WUC\Entity\recordStatus();
            $record_status->status = $decision === 'accept' ? 'accepted' : 'rejected';
            $record_status->dateAdded = date('Y-m-d H:i:s');

            $status_id = $record_statuses_table->insertRecord(get_object_vars($record_status));
            if ($status_id) {
                $students_table->updateRecord('recordStatus', $status_id, 'studentID', $student_id);
                if ($offer_letter_blob !== null) {
                    $students_table->updateRecord('offerLetter', $offer_letter_blob, 'studentID', $student_id);
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
