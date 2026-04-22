<?php
namespace CSY2089;

class controller {

    private $loginTable;
    private $modulesTable;
    private $courses_modules_linkTable;
    private $coursesTable;


    // Home Page

    public function __construct($loginTable, $modulesTable, $courses_modules_linkTable, $coursesTable) {

        $this->loginTable = $loginTable;
        $this->modulesTable = $modulesTable;
        $this->coursesTable = $coursesTable;
        $this->courses_modules_linkTable = $courses_modules_linkTable;


    }


    public function home() {

        $linkOutput = $this->getSubjectLinks();


        // If logged in

        if (isset($_SESSION['user'])) {

            // If superadmin

            if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 'SUPERADMIN') {

                $loginLinkOutput = '<a href="logout">Log out</a>';
                $managementOutput = '<a href="adminTools">Manage the database</a>';

            }

            // If standard user

            else {
               
                $loginLinkOutput = '<a href="logout">Log out</a>';
                $managementOutput = '';

            }

        }

        // If not logged in

        else {

            $loginLinkOutput = '<a href="login">Log in</a>';
            $managementOutput = '';

        }


        // Load the page

        echo loadTemplate('../templates/layout.html.php', [
        'title' => 'UON Home',
        'linkOutput' => $linkOutput,
        'subjectSearch' => '',
        'output' => loadTemplate('../templates/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [

            'loginLinkOutput' => $loginLinkOutput,
            'managementOutput' => $managementOutput

        ])]);

    }

    public function login() {

        $linkOutput = $this->getSubjectLinks();

        // Load the initial template
        
        echo loadTemplate('../templates/layout.html.php', [
        'title' => 'UON Login',
        'linkOutput' => $linkOutput,
        'subjectSearch' => '',
        'output' => loadTemplate('../templates/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.html.php', [])]);

        // Check for login details

        if (isset( $_POST['email'] , $_POST['password'], $_POST['submitLoginDetails'] ) ) {

            $userDetails = $this->loginTable->find('email', $_POST['email']);
   
            if ($userDetails == false) {echo 'Error: Something is not right with your details';}

            else {

                $passwordState = password_verify($_POST['email'] . $_POST['password'], $userDetails[0]->password);

                if ($passwordState == true) {

                    $_SESSION['user'] =        $userDetails[0]->username;
                    $_SESSION['accessLevel'] = $userDetails[0]->accessLevel;

                    $output = loadTemplate('../templates/loginOutcome.html.php', ['loginStatus' => 'in']);  
                
                    echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Login', 'linkOutput' => $linkOutput, 'subjectSearch' => '', 'output' => $output]);


                }

                else { echo 'Error: Something is not right with your details';}

            }

        }             

    }

    public function logout() {

        $linkOutput = $this->getSubjectLinks();

        unset($_SESSION['user'], $_SESSION['accessLevel']);

        $output = loadTemplate('../templates/loginOutcome.html.php', ['loginStatus' => 'out']);  

        echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Logout', 'linkOutput' => $linkOutput, 'subjectSearch' => '', 'output' => $output]);
        
    }
