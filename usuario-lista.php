<?php
require_once("logica-usuario.php");
require_once("banco-usuarios.php");

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
	<title>Lista de Usuários</title>

  <?php include 'cabecalho.php';?>
  

  <div class="title">
    <h1 align="center">Usuários</h1>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-striped table-bordered">
      <tr>
        <td><b>Nome</b></td>
        <td><b>e-mail</b></td>
        <td><b>CPF</b></td>
        <td><b>Tipo de Usuário</b></td>
      </tr>
      <?php
      $usuarios = listaUsuarios($conn);
      foreach($usuarios as $usuario) :
        if(intval($usuario['tipousuario'])){
          $tipousuario = 'Administrador';
        }else{
          $tipousuario = 'Usuario';
        }
        ?>
        <tr>
          <td><?= $usuario['nome'] ?></td>
          <td><?= $usuario['email'] ?></td>
          <td><?= $usuario['cpf']?></td>
          <td><?= $tipousuario?></td>
          <td><a class="btn btn-primary" href="usuario-altera-formulario.php?idusuario=<?=$usuario['idusuario']?>">alterar</a></td>
          <td>
            <form action="remove-usuario.php" method="post">
              <input type="hidden" name="idusuario" value="<?=$usuario['idusuario']?>">
              <button class="btn btn-danger">remover</button>
            </form>
          </td>
        </tr>
        <?php
        endforeach
        ?>
      </table>
    </div>
    <?php include("rodape.php"); ?>