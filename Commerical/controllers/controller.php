<?php
namespace WUC;

class controllerCommercial {

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

        $output = loadTemplate(__DIR__ . '/../templates/index.html.php', []);

        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Home', 'output' => $output]);

    }

    public function search() {
        
        $courseName = $_GET['searchBar'];

        $courseNameText = "<h1>$courseName</h1>";

        $currentCourses = $this->coursesTable->find("course_title", $courseName);

        $coursesArray = [];

        foreach ($currentCourses as $course) {

            $courseID = $course->course_id;

            $currentCourseModules = $this->courseModulesLinkTable->find('course_id', $courseID);

            $courseModulesArray = [];

            $modulesArray = [];


            foreach ($currentCourseModules as $courseModule) {

                $moduleID = $courseModule->module_id;

                $currentModules = $this->modulesTable->find('module_id', $moduleID);

                foreach ($currentModules as $module) {

                    array_push($modulesArray, loadTemplate(__DIR__ . '/../templates/module.html.php', ['moduleName' => $module->module_description]));
 
                }

            }

            $moduleOutput = implode(" ", $modulesArray);

            
            array_push($coursesArray, loadTemplate(__DIR__ . '/../templates/course.html.php', ['courseID' => $course->course_id, 'courseTitle' => $course->course_title, 'courseDescription' => $course->course_description, 'departmentID' => $course->department_id, 'moduleOutput' => $moduleOutput]) );


        }

        $courseOutput = implode(" ", $coursesArray);
        
        $output = loadTemplate(__DIR__ . '/../templates/search.html.php', ['title' => 'Home', 'output' => $courseOutput]);

        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Home', 'output' => $output]);

    }

public function downloadAwardMap() {

    $course = $this->coursesTable->find('course_id', $_GET['course_id'])[0];

    $data = $course->award_map;

    while (ob_get_level()) {
        ob_end_clean();
    }

    header("Content-Type: image/png");
    header("Content-Disposition: attachment; filename=\"image-test.png\"");
    header("Content-Length: " . strlen($data));

    echo $data;
    exit;
}

public function subjects() {
        
    $searchTerm = $_GET['searchBar'] ?? null;
    if ($searchTerm) {
        $currentCourses = $this->coursesTable->find("course_title", $searchTerm);
    } else {
        $currentCourses = $this->coursesTable->findAll();
    }

    $departments = [];

    foreach ($currentCourses as $course) {
        $courseID = $course->course_id;
        $departmentID = $course->department_id;

        // Fetch modules for this course
        $currentCourseModules = $this->courseModulesLinkTable->find('course_id', $courseID);
        $modulesArray = [];
        foreach ($currentCourseModules as $courseModule) {
            $moduleID = $courseModule->module_id;
            $currentModules = $this->modulesTable->find('module_id', $moduleID);
            foreach ($currentModules as $module) {
                $modulesArray[] = $module->module_description;
            }
        }

        // Fetch department info if not already loaded
        if (!isset($departments[$departmentID])) {
            $departmentData = $this->departmentsTable->find('department_id', $departmentID);
            foreach ($departmentData as $dept) {
                $departments[$departmentID] = [
                    'name'        => $dept->department_name,
                    'description' => $dept->department_description,
                    'courses'     => []
                ];
            }
        }

        // Add course under its department
        $departments[$departmentID]['courses'][] = [
            'id'          => $course->course_id,
            'name'        => $course->course_title,
            'description' => $course->course_description,
            'modules'     => $modulesArray,
            'url'         => '/index.php/subjects/' . $course->course_id
        ];
    }

    $output = loadTemplate(__DIR__ . '/../templates/allCourses.html.php', [
        'title'       => 'Subjects',
        'searchTerm'  => $searchTerm,
        'departments' => $departments
    ]);

    echo loadTemplate(__DIR__ . '/../templates/layout.html.php', [
        'title'  => 'Subjects',
        'output' => $output
    ]);
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

}