<?php
header('Access-Control-Allow-Methods: GET, POST');  
include("functions.php");

if(isset($_POST['roomName']) && isset($_POST['size']) && isset($_POST['beds'])){
	
$roomName = $_POST['roomName'];
$size = $_POST['size'];
$beds = $_POST['beds'];

addRoom($roomName,$size,$beds);
}
?>