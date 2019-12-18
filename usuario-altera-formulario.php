<?php
$id=0;
if(isset($_GET['idusuario'])){
  $idusuario = $_GET['idusuario'];
}else{
  $id = -1;
}

include "altera-usuario.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
	<title>Alterar Usuário</title>

  <?php
  require_once("cabecalho.php"); 
  require_once("banco-usuarios.php");


  ?>

  <div class="title">
    <h1 align="center" >Alteração de Usuário</h1>
  </div>
  <?php
  if(isset($erro))
    echo '<div style="color:#F00" align="center"><b>'.$erro.'</b></div><br/><br/>';
  else
    if(isset($sucesso))
      echo '<div style="color:#00f" align="center"><b>'.$sucesso.'</b></div><br/><br/>';
    ?>
    <form action="usuario-altera-formulario.php?idusuario=<?=$idusuario?>" method="POST">

      <?php 
      if($id === -1 ){
        $usuario['nome'] = "";
        $usuario['email'] = "";
        $usuario['cpf'] = "";
        $usuario['tipousuario'] = 0;
        
      }else if(buscaUsuario($conn,$idusuario)!=null){
       $usuario = array();
       $usuario = buscaUsuario($conn,$idusuario);
     }else{
      $usuario['nome'] = "";
      $usuario['email'] = "";
      $usuario['cpf'] = "";
      $usuario['tipousuario'] = 0;
      echo '<div style="color:#F00" align="center"><b>Usuario com id: '.$idusuario.' não encontrado</b></div><br/><br/>';
    }

    include 'usuario-formulario-base-alterar.php';?>

    <div class="text-center">
      <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
    </div>

  </div>
</form>

<?php include("rodape.php"); ?>
