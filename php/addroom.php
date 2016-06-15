<?php
include("functions.php");

if(isset($_POST['naziv']) && isset($_POST['broj_kreveta']) && isset($_POST['broj_kvadrata'])){
	
	$naziv = $_POST['naziv'];
	$broj_kreveta = $_POST['broj_kreveta'];
	$broj_kvadrata = $_POST['broj_kvadrata'];

	addRoom($naziv,$broj_kreveta,$broj_kvadrata);
	
}

?>