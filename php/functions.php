<?php
include("conn.php");

function addRoom($naziv, $broj_kreveta, $broj_kvadrata){
	global $conn;
	$ar = array();
	$stmt = $conn->prepare("INSERT INTO sobe (naziv, broj_kreveta, broj_kvadrata) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $naziv, $broj_kreveta, $broj_kvadrata);
	if($stmt->execute()){
		$ar['success'] = "Add room OK";
	}else{
		$ar['error'] = "Error";
	}
	return json_encode($ar);
}

function addHotel($naziv, $adresa, $broj_soba){
	global $conn;
	$ar = array();
	$stmt = $conn->prepare("INSERT INTO hoteli (naziv, adresa, broj_soba) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $naziv, $adresa, $broj_soba);
	if($stmt->execute()){
		$ar['success'] = "Add hotel OK";
	}else{
		$ar['error'] = "Error";
	}
	return json_encode($ar);
}


?>