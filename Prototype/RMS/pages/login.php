<?php

session_start();

require '../functions/connectToDB.php';
require '../classes/loginDetails.php';

$output = loadTemplate('../templates/login.html.php', []);

echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Home', 'output' => $output]);

$pdo = connectToDB('mysql', 'student', 'student', 'assignment1');

$loginTable = new \CSY2089\DatabaseTable($pdo, 'logins', 'userID', '\assignment1\Entity\loginDetails', []);

/*
if (isset( $_POST['email'] , $_POST['password'], $_POST['submitLoginDetails'] ) ) {

    $userDetails = $loginTable->find('email', $_POST['email']);

    //echo var_dump($userDetails);
   
    if ($userDetails == false) {echo 'Error: Something is not right with your details';}

    else {

        $passwordState = password_verify($_POST['email'] . $_POST['password'], $userDetails[0]->password);

        if ($passwordState == true) {

            $_SESSION['user'] =        $userDetails[0]->username;
            $_SESSION['accessLevel'] = $userDetails[0]->accessLevel;

            $output = loadTemplate('../templates/loginOutcome.html.php', ['loginStatus' => 'in']);  
        
            echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Home', 'output' => $output]);


        }

        else { echo 'Error: Something is not right with your details';}

    }

}*/


/*
    $storedDetails = findRecord($pdo, 'email, username, password, accessLevel', 'logins', 'email', $_POST['email'] );

    if ($storedDetails == false) {echo 'Login is incorrect/does not exist';}

    else {

        $passwordState = password_verify($_POST['email'] . $_POST['password'], $storedDetails['password']);

        if ($passwordState == true) {

            $_SESSION['user'] = $storedDetails['username'];

            $_SESSION['accessLevel'] = $storedDetails['accessLevel'];

            $mainOutput = loadFile('../templates/loginTemplate.html.php', ['loginStatus' => 'in']);
        
        }
        else 
            {echo 'Login is incorrect/does not exist';}

    }

}


*/


?>