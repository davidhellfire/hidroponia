<?php
require_once("conecta.php");

function listaCulturas($conn){
	//$usuarios = array();

	$stmt = $conn->prepare("select *from culturas");
	$stmt->execute();

	$culturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	return $culturas;
}

function insereCultura($conn, $nome, $descr, $semanas) {
	$stmt = $conn->prepare("INSERT INTO culturas (nome, descr, semanas) VALUES (:NOME, :DESCR, :SEMANAS)");

	$stmt->bindParam(":NOME",$nome);
	$stmt->bindParam(":DESCR",$descr);
	$stmt->bindParam(":SEMANAS",$semanas);
	

	return $stmt->execute();
}

function alteraCultura($conn, $nome, $descr, $semanas, $idcultura) {
	
	$stmt = $conn->prepare("UPDATE culturas SET nome=:NOME, descr=:DESCR , semanas=:SEMANAS WHERE idcultura=:IDCULTURA");

	$stmt->bindParam(":NOME",$nome);
	$stmt->bindParam(":DESCR",$descr);
	$stmt->bindParam(":SEMANAS",$semanas);
	$stmt->bindParam(":IDCULTURA",$idcultura);

	return $stmt->execute();
}

function deletaCultura($conn, $idcultura) {
	
	$stmt = $conn->prepare("DELETE FROM culturas WHERE idcultura=:IDCULTURA");

	$stmt->bindParam(":IDCULTURA",$idcultura);

	return $stmt->execute();
}

function buscaCultura($conn,$idcultura){
	$stmt = $conn->prepare("SELECT nome, descr, semanas FROM culturas WHERE idcultura={$idcultura}");

	$stmt->execute();

	$cultura = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if($cultura!=null){return $cultura[0];}
	
}

function iniciarPlantio($conn,$idcultura){
	$stmt = $conn->prepare("INSERT INTO plantios (idcultura,dthplantio) VALUE(:IDCULTURA,now())");

	$stmt->bindParam(":IDCULTURA",$idcultura);

	return $stmt->execute();
}

function buscaCulturaPlantada($conn,$idcultura){
	$stmt = $conn->prepare("SELECT *FROM plantios AS p, culturas AS c WHERE p.idcultura=c.idcultura AND c.idcultura=:IDCULTURA");

	$stmt->bindParam(":IDCULTURA",$idcultura);
	$stmt->execute();

	$busca = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if($busca!=null){return $busca;}
	 
}