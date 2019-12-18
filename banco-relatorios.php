<?php
require_once("conecta.php");

function listaCulturasPlantadas($conn){
	//$usuarios = array();

	$stmt = $conn->prepare("SELECT p.idplantio,p.dthplantio,c.idcultura, c.nome FROM culturas AS c,plantios AS p WHERE c.idcultura=p.idcultura");
	$stmt->execute();

	$culturasPlantadas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	return $culturasPlantadas;
}

function listaMedicoesData($conn,$dataini,$datafim,$idplantio){

	$stmt = $conn->prepare("SELECT *FROM medicoes AS m,plantios AS p WHERE m.dthmedicao <= :DATAFIM AND m.dthmedicao >= :DATAINI AND m.idplantio=p.idplantio AND m.idplantio=:IDPLANTIO ORDER BY m.dthmedicao;");
	
	$stmt->bindParam(":DATAFIM",$datafim);
	$stmt->bindParam(":DATAINI",$dataini);
	$stmt->bindParam(":IDPLANTIO",$idplantio);
	
	$stmt->execute();

	$medicoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	return $medicoes;
}
