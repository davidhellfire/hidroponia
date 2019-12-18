<?php

include "adiciona-usuario.php";
require_once("logica-usuario.php");


verificaUsuario();
verificaNivel();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
	<title>Cadastro de Usuários </title>

  <?php include 'cabecalho.php';?>

  <div class="title">
    <h1 align="center" >Cadastro de Usuário</h1>
  </div>
  <?php
  if(isset($erro))
    echo '<div style="color:#F00" align="center"><b>'.$erro.'</b></div><br/><br/>';
  else
    if(isset($sucesso))
      echo '<div style="color:#00f" align="center"><b>'.$sucesso.'</b></div><br/><br/>';
    ?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">

      <?php include 'usuario-formulario-base.php';?>

      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
      </div>

    </div>
  </form>

  <?php include("rodape.php"); ?>
  <script src="js/comparasenhas.js"></script>;