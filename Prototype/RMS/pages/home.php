<?php

session_start();

echo loadTemplate('../templates/layout.html.php', ['title' => 'UON Home', 'output' => $output]);

?>

