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

    
    private const int STATUS_LIVE        = 1;
    private const int STATUS_PROVISIONAL = 2;
    private const int STATUS_DORMANT     = 3;


    // Main Constructor

    public function __construct($assignmentsTable, $attendanceTable, $chatlogsTable, $courseModulesLinkTable, $coursesTable, $departmentsTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable) {

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


    }

    public function home() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Home',
            'output' => loadTemplate(__DIR__ . '/../templates/RMS-Mockup-Home.html.php', [])
        ]);
    }

    // --- Student routes ---

    public function students() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Student Records',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StudentRec.html.php', [
                'students' => $this->studentsTable->findAll()
            ])
        ]);
    }

    public function studentProfile() {
        
        $id = $_GET['id'] ?? null;
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Student Profile',
            'output' => loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StudentProfile.html.php', [
                'student' => $this->studentsTable->find('student_id', $id)
            ])
        ]);
    }

    public function currentStudents() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Current Students',
            'output' => loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuCurrent.html.php', [
                'students' => $this->studentsTable->find('record_status', self::STATUS_LIVE)
            ])
        ]);
    }

    public function pastStudents() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Past Students',
            'output' => loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuPast.html.php', [
                'students' => $this->studentsTable->find('record_status', self::STATUS_DORMANT)
            ])
        ]);
    }

    public function studentApplications() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Student Applications',
            'output' => loadTemplate(__DIR__ . '/../templates/options/studentRec/RMS-Mockup-StuApplication.html.php', [
                'students' => $this->studentsTable->find('record_status', self::STATUS_PROVISIONAL)
            ])
        ]);
    }

    // --- Staff routes ---

    public function staff() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Staff Records',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-StaffRec.html.php', [
                'staff' => $this->staffTable->findAll()
            ])
        ]);
    }

    public function staffProfile() {
        
        $id = $_GET['id'] ?? null;
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Staff Profile',
            'output' => loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaffProfile.html.php', [
                'staff' => $this->staffTable->find('staff_id', $id)
            ])
        ]);
    }

    public function currentStaff() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Current Staff',
            'output' => loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaCurrent.html.php', [
                'staff' => $this->staffTable->find('record_status', self::STATUS_LIVE)
            ])
        ]);
    }

    public function pastStaff() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Past Staff',
            'output' => loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaPast.html.php', [
                'staff' => $this->staffTable->find('record_status', self::STATUS_DORMANT)
            ])
        ]);
    }

    public function staffApplications() {
        
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Staff Applications',
            'output' => loadTemplate(__DIR__ . '/../templates/options/staffRec/RMS-Mockup-StaApplication.html.php', [
                'staff' => $this->staffTable->find('record_status', self::STATUS_PROVISIONAL)
            ])
        ]);
    }

    // --- Other routes ---

    public function attendance() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Attendance',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Attendance.html.php', [
                'attendance' => $this->attendanceTable->findAll()
            ])
        ]);
    }

    public function timetable() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Timetable',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Timetable.html.php', [
                'timetable' => $this->timetable->findAll()
            ])
        ]);
    }

    public function courses() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Courses',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-CourseRec.html.php', [
                'courses' => $this->coursesTable->findAll()
            ])
        ]);
    }

    public function archive() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Archive',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Archive.html.php', [
                'students' => $this->studentsTable->find('record_status', self::STATUS_DORMANT),
                'staff'    => $this->staffTable->find('record_status', self::STATUS_DORMANT),
            ])
        ]);
    }

    public function tickets() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Tickets',
            'output' => loadTemplate(__DIR__ . '/../templates/options/tickets/RMS-Mockup-PenTicket.html.php', [
                'openTickets'   => $this->ticketsTable->find('solved_bool', 0),
                'closedTickets' => $this->ticketsTable->find('solved_bool', 1),
            ])
        ]);
    }

    public function documents() {
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
            'title'  => 'Documents',
            'output' => loadTemplate(__DIR__ . '/../templates/options/RMS-Mockup-Document.html.php', [])
        ]);
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