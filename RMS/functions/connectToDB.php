<?php

function connectToDB($server, $username, $password, $schema) {

    // A pdo instance is created, serving as our connection to the database.

    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
    
    // The pdo instance is then returned.

    return $pdo;
    
}

?>