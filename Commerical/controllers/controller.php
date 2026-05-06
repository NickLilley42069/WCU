<?php
namespace WUC;

class controllerCommercial {

    private $assignmentsTable;
    private $attendanceTable;
    private $chatlogsTable;
    private $courseModulesLinkTable;
    private $coursesTable;
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

    public function __construct($assignmentsTable, $attendanceTable, $chatlogsTable, $coursesModulesLinkTable, $coursesTable, $emergencyContactsTable, $moduleAssignmentsTable, $modulesTable, $personalTutorialsTable, $recordStatusesTable, $staffTable, $studentAssignmentsTable, $studentsTable, $ticketsTable, $timetable) {

        $this->assignmentsTable = $assignmentsTable;
        $this->attendanceTable = $attendanceTable;
        $this->chatlogsTable = $chatlogsTable;
        $this->courseModulesLinkTable = $courseModulesLinkTable;
        $this->coursesTable = $coursesTable;
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

    public function Home() {

    echo loadTemplate('../templates/index.html.php', [
        'title' => 'Home',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput
        
        ])]);
    }

    public function About() {
        echo loadTemplate('../Templates/About/Website-AboutWoodlands.html.php', [
            'title' => 'About Woodlands',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/About/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Awards() {
        echo loadTemplate('../Templates/About/Website-Awards.html.php', [
            'title' => 'Awards',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/About/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function News() {
        echo loadTemplate('../Templates/About/Website-News.html.php', [
            'title' => 'News',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/About/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Research() {
        echo loadTemplate('../Templates/About/Website-Research.html.php', [
            'title' => 'Research',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/About/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Services() {
        echo loadTemplate('../Templates/About/Website-Services.html.php', [
            'title' => 'Services',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/About/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Contact() {
        echo loadTemplate('../Templates/Contact/Website-Contact.html.php', [
            'title' => 'Contact',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Contact/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Accommodation() {
        echo loadTemplate('../Templates/Life/Website-Accommodation.html.php',[
            'title' => 'Accommodation',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function AtWoodlands() {
        echo loadTemplate('../Templates/Life/Website-AtWoodlands.html.php',[
            'title' => 'At Woodlands',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function OpenDays() {
        echo loadTemplate('../Templates/Life/Website-OpenDays.html.php',[
            'title' => 'Open Days',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function StudentLife() {
        echo loadTemplate('../Templates/Life/Website-Student-Life.html.php',[
            'title' => 'Student Life',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function StudentUnion() {
        echo loadTemplate('../Templates/Life/Website-StudentUnion.html.php',[
            'title' => 'Student Union',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Support() {
        echo loadTemplate('../Templates/Life/Webiste-Support.html.php',[
            'title' => 'Support',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Life/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Course() {


        echo loadTemplate('../Templates/Study/Website-Course.html.php', [
            'title' => 'Courses',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Study/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Study() {
        echo loadTemplate('../Templates/Study/Website-Study.html.php', [
            'title' => 'Study',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Study/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
    }

    public function Subjects() {


        echo loadTemplate('../Templates/Study/Website-Subjects.html.php', [
            'title' => 'Subjects',
            'linkOutput' => $linkOutput,
            'subjectSearch' => '',

            'output' => loadTemplate('../Templates/Study/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

                'loginLinkOutput' => $loginLinkOutput,
                'managementOutput' => $managementOutput

        ])]);
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
