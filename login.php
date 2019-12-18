<?php 
  require_once ("banco-usuarios.php");
  require_once("logica-usuario.php");

$email = $_POST["email"];
$senha = $_POST["senha"];
$usuario = buscarUsuario($conn,$email,$senha);
if($usuario == null) {
  $_SESSION["danger"] = "Usuário ou senha inválido.";
  header("Location: index.php");
} else {
  $_SESSION["success"] = "Usuário logado com sucesso.";
  logaUsuario($usuario["email"]);
  $_SESSION["nivel"] = $usuario["tipousuario"];
  header("Location: index.php");
}
die();