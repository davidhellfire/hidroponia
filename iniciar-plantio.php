<?php 
require_once("banco-culturas.php"); 


//Validando a existência dos dados
if(isset($_GET["idcultura"]))
{

	$idcultura = $_GET["idcultura"];

 if(iniciarPlantio($conn,$idcultura)){
		$sucesso = 'Dados inseridos com sucesso!'; 
	}else{
		$erro = 'Não foi possivel inserir cultura';
	}
}
header("Location:cultura.php");