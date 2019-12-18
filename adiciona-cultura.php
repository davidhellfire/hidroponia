<?php 
require_once("banco-culturas.php"); 


//Validando a existência dos dados
if(isset($_POST["nome"]) && isset($_POST["descr"]) && isset($_POST["semanas"]))
{

	$nome = $_POST['nome'];
	$descr = $_POST['descr'];
	$semanas = $_POST['semanas'];
	var_dump($nome);
	var_dump($descr);
	var_dump($semanas);
	var_dump($_GET['idcultura']);

	if(isset($_GET["idcultura"])){
		var_dump($_GET["idcultura"]);
		$idcultura = $_GET["idcultura"];
		alteraCultura($conn,$nome,$descr,$semanas,$idcultura);
		echo "cultura alterada com sucesso";
	}else if(insereCultura($conn,$nome,$descr,$semanas)){
		$sucesso = 'Dados inseridos com sucesso!'; 
	}else{
		$erro = 'Não foi possivel inserir cultura';
	}
}
//header("Location: cultura.php");
/*var_dump($nome);
var_dump($descr);
var_dump($semanas);
var_dump($imagem);
var_dump($tamanho);
var_dump($tipo);
var_dump($name);*/