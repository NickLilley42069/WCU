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

    public function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /home');
            exit;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login_type = $_POST['login_type'] ?? 'student';
            $email      = trim($_POST['email'] ?? '');
            $password   = $_POST['password'] ?? '';

            if ($login_type === 'student') {
                $results = $this->studentsTable->find('email', $email);
                if (!empty($results)) {
                    $user = $results[0];
                    if ($user->password_hash && password_verify($password, $user->password_hash)) {
                        session_regenerate_id(true);
                        $_SESSION['user_id']   = $user->student_id;
                        $_SESSION['user_name'] = $user->first_name . ' ' . $user->surname;
                        $_SESSION['user_type'] = 'student';
                        header('Location: /home');
                        exit;
                    }
                }
                $error = 'Invalid email or password.';
            }
        }

        $output = loadTemplate(__DIR__ . '/../templates/login.html.php', ['error' => $error]);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Login', 'output' => $output]);
    }

    public function logout() {
        session_destroy();
        header('Location: /home');
        exit;
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
        $currentCourses = $this->coursesTable->findLike("course_title", $searchTerm);
    } else {
        $currentCourses = $this->coursesTable->findAll();
    }

    $departments = $this->departmentsTable->findAll();

    $deptNameMap = [];
    foreach ($departments as $dept) {
        $deptNameMap[(int)$dept->department_id] = $dept->department_name;
    }

    $coursesArray  = [];
    $courseDataMap = [];

    foreach ($currentCourses as $course) {
        $courseID = $course->course_id;
        $currentCourseModules = $this->courseModulesLinkTable->find('course_id', $courseID);
        $modulesArray = [];
        $moduleNames  = [];

        foreach ($currentCourseModules as $courseModule) {
            $moduleID = $courseModule->module_id;
            $currentModules = $this->modulesTable->find('module_id', $moduleID);
            foreach ($currentModules as $module) {
                $moduleNames[] = $module->module_description;
                array_push($modulesArray, loadTemplate(__DIR__ . '/../templates/module.html.php', ['moduleName' => $module->module_description]));
            }
        }

        $moduleOutput = implode(" ", $modulesArray);

        $courseDataMap[$courseID] = [
            'title'              => $course->course_title,
            'description'        => $course->course_description,
            'department'         => $deptNameMap[(int)$course->department_id] ?? '',
            'modules'            => $moduleNames,
            'course_id'          => $courseID,
            'award_type'         => $course->award_type ?? '',
            'duration'           => $course->duration ?? '',
            'study_mode'         => $course->study_mode ?? '',
            'entry_requirements' => $course->entry_requirements ?? '',
        ];

        array_push($coursesArray, loadTemplate(__DIR__ . '/../templates/course.html.php', [
            'courseID' => $course->course_id,
            'courseTitle' => $course->course_title,
            'courseDescription' => $course->course_description,
            'departmentID' => $course->department_id,
            'moduleOutput' => $moduleOutput
        ]));
    }

    $courseOutput = implode(" ", $coursesArray);

    $allCourses = $currentCourses;

    $output = loadTemplate(__DIR__ . '/../templates/allCourses.html.php', [
        'output' => $courseOutput,
        'searchTerm'    => $searchTerm,
        'departments'   => $departments,
        'allCourses'    => $allCourses,
        'courseDataMap' => $courseDataMap,
    ]);

    echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Subjects', 'output' => $output]);
}

    public function study() {
        $output = loadTemplate(__DIR__ . '/../templates/study/Website-Study.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Study', 'output' => $output]);
    }

    public function atWoodlands() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-AtWoodlands.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => "At Woodland's", 'output' => $output]);
    }

    public function studentLife() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-Student Life.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Student Life', 'output' => $output]);
    }

    public function accommodation() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-Accomodation.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Accommodation', 'output' => $output]);
    }

    public function support() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-Support.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Support', 'output' => $output]);
    }

    public function studentUnion() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-StudentUnion.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Student Union', 'output' => $output]);
    }

    public function openDays() {
        $output = loadTemplate(__DIR__ . '/../templates/life/Website-OpenDays.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Open Days', 'output' => $output]);
    }

    public function aboutWoodlands() {
        $output = loadTemplate(__DIR__ . '/../templates/about/Website-AboutWoodlands.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => "About Woodland's", 'output' => $output]);
    }

    public function news() {
        $output = loadTemplate(__DIR__ . '/../templates/about/Website-News.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'News', 'output' => $output]);
    }

    public function awards() {
        $output = loadTemplate(__DIR__ . '/../templates/about/Website-Awards.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Awards', 'output' => $output]);
    }

    public function services() {
        $output = loadTemplate(__DIR__ . '/../templates/about/Website-Services.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Services', 'output' => $output]);
    }

    public function research() {
        $output = loadTemplate(__DIR__ . '/../templates/about/Website-Research.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Research', 'output' => $output]);
    }

    public function contact() {
        $output = loadTemplate(__DIR__ . '/../templates/contact/Website-Contact.html.php', []);
        echo loadTemplate(__DIR__ . '/../templates/layout.html.php', ['title' => 'Contact', 'output' => $output]);
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