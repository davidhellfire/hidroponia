<?php
require_once("conecta.php");


function listaUsuarios($conn){
	//$usuarios = array();

	$stmt = $conn->prepare("select *from usuarios");
	$stmt->execute();

	$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	return $usuarios;
}

function insereUsuario($conn, $cpf, $nome, $email, $senha, $tipousuario) {
	$senhamd5 = md5($senha);
	$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, cpf, tipousuario) VALUES (:NOME, :EMAIL, :SENHA,:CPF,:TIPOUSUARIO)");

	$stmt->bindParam(":NOME",$nome);
	$stmt->bindParam(":EMAIL",$email);
	$stmt->bindParam(":SENHA",$senhamd5);
	$stmt->bindParam(":CPF",$cpf);
	$stmt->bindParam(":TIPOUSUARIO",$tipousuario);

	return $stmt->execute();
}

function alteraUsuario($conn, $cpf, $nome, $email, $tipousuario,$idusuario) {
	
	$stmt = $conn->prepare("UPDATE usuarios SET nome=:NOME, email=:EMAIL , cpf=:CPF, tipousuario=:TIPOUSUARIO WHERE idusuario=:IDUSUARIO");

	$stmt->bindParam(":NOME",$nome);
	$stmt->bindParam(":EMAIL",$email);
	$stmt->bindParam(":CPF",$cpf);
	$stmt->bindParam(":TIPOUSUARIO",$tipousuario);
	$stmt->bindParam(":IDUSUARIO",$idusuario);

	return $stmt->execute();
}

function deletaUsuario($conn, $idusuario) {
	
	$stmt = $conn->prepare("DELETE FROM usuarios WHERE idusuario=:IDUSUARIO");

	$stmt->bindParam(":IDUSUARIO",$idusuario);

	return $stmt->execute();
}

function buscaUsuario($conn,$idusuario){
	$stmt = $conn->prepare("select cpf, nome, email, tipousuario from usuarios where idusuario = {$idusuario}");

	$stmt->execute();

	$usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if($usuario!=null){return $usuario[0];}
	
}

function buscarUsuario($conn,$email,$senha){
	$senhamd5 = md5($senha);
	$stmt = $conn->prepare("select * from usuarios where email='{$email}' and senha='{$senhamd5}'");

	$stmt->execute();

	$usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	return $usuario[0];
	
}

?>