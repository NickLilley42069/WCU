<?php

session_start();


$output = loadTemplate('../templates/loginOutcome.html.php', ['loginStatus' => 'out']);  

echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Home', 'output' => $output]);
