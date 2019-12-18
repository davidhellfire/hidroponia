<?php 
require_once("banco-usuarios.php"); 


//Validando a existência dos dados
if(isset($_POST["cpf"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["usuario"]) && isset($_POST["senha"]) && isset($_POST["senha2"]))
{
	
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$senha2 = $_POST['senha2'];

		if(insereUsuario($conn,$cpf,$nome,$email,$senha,$usuario)){
			$sucesso = 'Dados inseridos com sucesso!'; 
		}else{
			$erro = 'Não foi possivel inserir usúario';
		}

}

/*var_dump($cpf);
echo '</br>';
var_dump($nome);
echo '</br>';
var_dump($email);
echo '</br>';
var_dump($usuario);
echo '</br>';
var_dump($senha);
echo '</br>';
var_dump($senha2);*/
