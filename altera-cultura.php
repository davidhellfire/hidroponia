<?php 
require_once("banco-culturas.php"); 


//Validando a existência dos dados
if(isset($_POST["nome"]) && isset($_POST["descr"]) && isset($_POST["semanas"] && isset($_POST["idcultura"]))
{
	$nome = $_POST['nome'];
	$descr = $_POST['descr'];
	$semanas = $_POST['semanas'];
	$idcultura = $_POST['idcultura'];

	
	if(alteraCultura($conn,$nome,$descr,$semanas,$idcultura)){
		$sucesso = 'Dados alterados com sucesso!'; 
	}else{
		$erro = 'Não foi possivel alteracao usuario';
	}
}
header("Location: cultura.php");