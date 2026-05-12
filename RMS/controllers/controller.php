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

        $students = $this->studentsTable->find('studentID', $studentID);
        if (empty($students)) {
            return false;
        }

        $recordStatus = new \WUC\Entity\recordStatus();
        $recordStatus->status = $decision === 'accept' ? 'accepted' : 'rejected';
        $recordStatus->dateAdded = date('Y-m-d H:i:s');

        $statusId = $this->recordStatusesTable->insertRecord(get_object_vars($recordStatus));
        if (!$statusId) {
            return false;
        }

        $this->studentsTable->updateRecord('recordStatus', $statusId, 'studentID', $studentID);
        if ($offerLetterBlob !== null) {
            $this->studentsTable->updateRecord('offerLetter', $offerLetterBlob, 'studentID', $studentID);
        }

        return true;
    }

    public function approveGrade($studentID, $assignmentID) {
        if (!$this->studentAssignmentsTable || !$this->assignmentsTable) {
            return false;
        }

        $studentAssignments = $this->studentAssignmentsTable->find(['studentID', 'assignmentID'], [$studentID, $assignmentID]);
        if (empty($studentAssignments)) {
            return false;
        }

        $studentAssignment = $studentAssignments[0];
        $assignments = $this->assignmentsTable->find('assignmentID', $assignmentID);
        if (empty($assignments)) {
            return false;
        }

        $assignment = $assignments[0];
        if (!is_numeric($studentAssignment->grade) || !is_numeric($assignment->passGrade)) {
            return false;
        }

        if ($studentAssignment->grade >= $assignment->passGrade) {
            $this->studentAssignmentsTable->updateRecordByCriteria(
                ['dateOfReturn'],
                [date('Y-m-d')],
                ['studentID', 'assignmentID'],
                [$studentID, $assignmentID]
            );
            return true;
        }

        return false;
    }

    public function home() {


    $output = loadTemplate(__DIR__ . '/../templates/RMS-Mockup-Home.html.php', []);

    echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Home', 'output' => $output]);    
  
    }
    public function staffChat() {
        $output = loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StaffChat.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Staff Chat', 'output' => $output]);
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