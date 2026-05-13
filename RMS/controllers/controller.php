<?php
namespace WUC;

class controllerRMS {

    private $assignmentsTable;
    private $attendanceTable;
    private $chatlogsTable;
    private $courseModulesLinkTable;
    private $coursesTable;
    private $departmentsTable;
    private $emergencyContactsTable;
    private $moduleAssignmentsTable;
    private $modulesTable;
    private $personalTutorialsTable;
    private $recordStatusesTable;
    private $staffTable;
    private $studentAssignmentsTable;
    private $studentsTable;
    private $ticketsTable;
    private $timetable;
    private $pdo;


    // Main Constructor

    public function __construct($assignmentsTable, $attendanceTable, $chatlogsTable, $courseModulesLinkTable, $coursesTable, $departmentsTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable, $pdo = null) {

        $this->assignmentsTable = $assignmentsTable;
        $this->attendanceTable = $attendanceTable;
        $this->chatlogsTable = $chatlogsTable;
        $this->courseModulesLinkTable = $courseModulesLinkTable;
        $this->coursesTable = $coursesTable;
        $this->departmentsTable = $departmentsTable;
        $this->emergencyContactsTable = $emergencyContactsTable;
        $this->moduleAssignmentsTable = $moduleAssignmentsTable;
        $this->modulesTable = $modulesTable;
        $this->personalTutorialsTable = $personalTutorialsTable;
        $this->recordStatusesTable = $recordStatusesTable;
        $this->staffTable = $staffTable;
        $this->studentAssignmentsTable = $studentAssignmentsTable;
        $this->studentsTable = $studentsTable;
        $this->ticketsTable = $ticketsTable;
        $this->timetable = $timetable;
        $this->pdo = $pdo;

    }

    public function approveEnrolment($studentID, $decision, $offerLetterBlob = null) {
        if (!$this->studentsTable || !$this->recordStatusesTable) {
            return false;
        }

        $students = $this->studentsTable->find('student_id', $studentID);
        if (empty($students)) {
            return false;
        }

        $recordStatus = new \WUC\Entity\recordStatus();
        $recordStatus->status = $decision === 'accept' ? 'accepted' : 'rejected';
        $recordStatus->date_added = date('Y-m-d H:i:s');

        $statusId = $this->recordStatusesTable->insertRecord(['status' => $recordStatus->status, 'date_added' => $recordStatus->date_added]);
        if (!$statusId) {
            return false;
        }

        $this->studentsTable->updateRecord('record_status', $statusId, 'student_id', $studentID);
        if ($offerLetterBlob !== null) {
            $this->studentsTable->updateRecord('offer_letter', $offerLetterBlob, 'student_id', $studentID);
        }

        return true;
    }

    public function approveGrade($studentID, $assignmentID) {
        if (!$this->studentAssignmentsTable || !$this->assignmentsTable) {
            return false;
        }

        $studentAssignments = $this->studentAssignmentsTable->find(['student_id', 'assignment_id'], [$studentID, $assignmentID]);
        if (empty($studentAssignments)) {
            return false;
        }

        $studentAssignment = $studentAssignments[0];
        $assignments = $this->assignmentsTable->find('assignment_id', $assignmentID);
        if (empty($assignments)) {
            return false;
        }

        $assignment = $assignments[0];
        if (!is_numeric($studentAssignment->grade) || !is_numeric($assignment->pass_grade)) {
            return false;
        }

        if ($studentAssignment->grade >= $assignment->pass_grade) {
            $this->studentAssignmentsTable->updateRecordByCriteria(
                ['date_of_return'],
                [date('Y-m-d')],
                ['student_id', 'assignment_id'],
                [$studentID, $assignmentID]
            );
            return true;
        }

        return false;
    }

    public function adminEnrolment() {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'] ?? null;
            $decision = $_POST['decision'] ?? null;
            $offer_letter_blob = null;

            if (isset($_FILES['offer_letter']) && $_FILES['offer_letter']['error'] === UPLOAD_ERR_OK) {
                $offer_letter_blob = file_get_contents($_FILES['offer_letter']['tmp_name']);
            }

            if ($student_id && $decision) {
                $success = $this->approveEnrolment($student_id, $decision, $offer_letter_blob);
                $message = $success ? 'Enrolment processed successfully.' : 'Student not found or failed to save.';
            } else {
                $message = 'Student ID and decision are required.';
            }
        }

        $output = loadTemplate(__DIR__ . '/../templates/admin-enrolment.html.php', ['message' => $message]);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Admin Enrolment', 'output' => $output]);
    }

    public function adminGrade() {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'] ?? null;
            $assignment_id = $_POST['assignment_id'] ?? null;

            if ($student_id && $assignment_id) {
                $success = $this->approveGrade($student_id, $assignment_id);
                $message = $success ? 'Grade approved.' : 'Grade not approved — grade may be missing or below pass mark.';
            } else {
                $message = 'Student ID and assignment ID are required.';
            }
        }

        $output = loadTemplate(__DIR__ . '/../templates/admin-grade.html.php', ['message' => $message]);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Admin Grade Approval', 'output' => $output]);
    }

    public function studentRecords() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StudentRec.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Student Records', 'output' => $output]);
    }

    public function staffRecords() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StaffRec.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Records', 'output' => $output]);
    }

    public function courseRecords() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-CourseRec.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Courses', 'output' => $output]);
    }

    public function timetable() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Timetable.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Timetable', 'output' => $output]);
    }

    public function cabinet() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Document.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Cabinet', 'output' => $output]);
    }

    public function archive() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Archive.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Archive', 'output' => $output]);
    }

    public function stuApplication() {
        $output = loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuApplication.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Student Applications', 'output' => $output]);
    }

    public function stuCurrent() {
        $output = loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuCurrent.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Current Students', 'output' => $output]);
    }

    public function stuPast() {
        $output = loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuPast.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Past Students', 'output' => $output]);
    }

    public function studentProfile() {
        $output = loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StudentProfile.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Student Profile', 'output' => $output]);
    }

    public function staApplication() {
        $output = loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaApplication.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Applications', 'output' => $output]);
    }

    public function staCurrent() {
        $output = loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaCurrent.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Current Staff', 'output' => $output]);
    }

    public function staPast() {
        $output = loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaPast.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Past Staff', 'output' => $output]);
    }

    public function staffProfile() {
        $output = loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaffProfile.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Profile', 'output' => $output]);
    }

    public function attendance() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Attendance.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Attendance', 'output' => $output]);
    }

    public function course() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Course.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Course', 'output' => $output]);
    }

    public function pendingTickets() {
        $output = loadTemplate(__DIR__ . '/../templates/options/tickets/RMS-Mockup-PenTicket.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Pending Tickets', 'output' => $output]);
    }

    public function ongoingTickets() {
        $output = loadTemplate(__DIR__ . '/../templates/options/tickets/RMS-Mockup-OngTick.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Ongoing Tickets', 'output' => $output]);
    }

    public function closedTickets() {
        $output = loadTemplate(__DIR__ . '/../templates/options/tickets/RMS-Mockup-CloTick.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Closed Tickets', 'output' => $output]);
    }

    public function home() {


    $output = loadTemplate(__DIR__ . '/../templates/RMS-Mockup-Home.html.php', []);

    echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Home', 'output' => $output]);    
  
    }
    public function staffChat() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StaffChat.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Chat', 'output' => $output]);
    }

public function chat() {

    $tempSessionID = (int) "00003226";

    $chatLogs = $this->chatlogsTable->findAll();

    $messagesArray = [];

    foreach ($chatLogs as $log) {

        $isMine = ($log->staff_id === $tempSessionID);

        $wrapperClass = $isMine ? 'mine' : 'theirs';
        $bubbleClass  = $isMine ? 'bubbleMine' : 'bubbleTheirs';

        array_push($messagesArray, loadTemplate(
            __DIR__ . '/../templates/chatlog.html.php',
            [
                'wrapperClass' => $wrapperClass,
                'bubbleClass'  => $bubbleClass,
                'message'      => htmlspecialchars($log->message),
            ]
        ));
    }

    $messagesOutput = implode(" ", $messagesArray);

    $output = loadTemplate(__DIR__ . '/../templates/RMS-Mockup-Chatlog.html.php', ['messagesOutput' => $messagesOutput, 'tempSessionID' => $tempSessionID]);

    echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Chat', 'output' => $output]);

    }


    

public function send() {

    $message = $_POST['message'] ?? '';
    $tempSessionID = $_POST['tempSessionID'] ?? 0;

    if (!empty($message)) {
        $this->chatlogsTable->insertRecord([
            'message' => $message,
            'staff_id' => (int) $tempSessionID
        ]);
    }


    header('Location: /index.php/chat');
    exit;

}



}



/*

    An example of the loadTemplate function in action

        echo loadTemplate('../templates/layout.html.php', [
        'title' => 'UON Home',
        'linkOutput' => $linkOutput,
        'subjectSearch' => '',
        'output' => loadTemplate('../templates/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

            'loginLinkOutput' => $loginLinkOutput,
            'managementOutput' => $managementOutput

        ])]);

    Step 1: Pass the file location of the template in as the first argument in single quotes
    Step 2: Pass in variables that the template will need to load
    Step 3: Load subtemplates via the same method

    
*/