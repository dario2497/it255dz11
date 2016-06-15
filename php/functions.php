<?php
include("conn.php");

function addRoom($naziv, $broj_kreveta, $broj_kvadrata){
	global $conn;
	$ar = array();
	$stmt = $conn->prepare("INSERT INTO sobe (naziv, broj_kreveta, broj_kvadrata) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $naziv, $broj_kreveta, $broj_kvadrata);
	if($stmt->execute()){
		$ar['sucess'] = "Add room OK";
	}else{
		$ar['error'] = "Error";
	}
	return json_encode($ar);
}


?>