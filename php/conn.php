<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "it255";


$conn = new mysqli($server, $user, $pass, $database);
	if (!$conn->set_charset("utf8")) {
		printf("Error: %s\n", $mysqli->error);
		exit();
	} 

?>