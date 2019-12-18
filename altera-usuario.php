<?php 
require_once("banco-usuarios.php"); 


//Validando a existência dos dados
if(isset($_POST["cpf"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["usuario"]) && isset($idusuario))
{
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];

	
	if(alteraUsuario($conn,$cpf,$nome,$email,$usuario,$idusuario)){
		$sucesso = 'Dados alterados com sucesso!'; 
		//header("Location:usuario-lista.php");
	}else{
		$erro = 'Não foi possivel inserir usuario';
	}
}