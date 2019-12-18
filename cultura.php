<?php
$id=0;
if(isset($_GET['idcultura'])){
  $idcultura = $_GET['idcultura'];
}else{
  $id = -1;
}

require_once 'banco-culturas.php';  
require_once("logica-usuario.php");
//ob_start();
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
  <title>Cadastro de Cultura</title>
  <?php require_once 'cabecalho.php';?>
  <div class="title">
    <h1 align="center" >Cadastro de Cultura</h1>
  </div>
  <?php
   if($id === -1 ){//novo usuario
    $cultura['nome'] = "";
    $cultura['descr'] = "";
    $cultura['semanas'] = "";
    $link = "adiciona-cultura.php";

  }else if(buscaCultura($conn,$idcultura)!=null){//usuario selecionado
   $cultura = array();
   $cultura = buscaCultura($conn,$idcultura);
   var_dump($cultura['nome']);
   var_dump($cultura['descr']);
   var_dump($cultura['semanas']);
   $link = "adiciona-cultura.php?idcultura=$idcultura";

 }else{//id usuario nao encontrado
  $cultura['nome'] = "";
  $cultura['descr'] = "";
  $cultura['semana'] = "";?>
  <div style="color:#F00" align="center"><b>Cultura com id: <?=$idcultura?> não encontrada</b></div><br/><br/>
<?php }
require_once("cultura-formulario-base.php");
?>
<form action="<?=$link?>" method="POST">


  <div class="text-center">
   <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
 </div>

</form>
</br>
<div class="table-responsive text-nowrap">

  <table class="table table-striped table-bordered">
    <tr align="center">
      <td><b>Nome</b></td>
      <td><b>Descricao</b></td>
      <td><b>Semanas</b></td>
    </tr>
    <?php
   $culturas = listaCulturas($conn);

   foreach ($culturas as $cultura) :

   ?>
   <tr align="center">
    <td><?= $cultura['nome'] ?></td>
    <td><?= $cultura['descr'] ?></td>
    <td><?= $cultura['semanas']?></td>
    <?php 

    if(buscaCulturaPlantada($conn,$cultura['idcultura'])){//se nao retornar cultura plantada
      $btplantio="#";
      $bttexto="finalizar plantio";
      $btclass="secondary";
    }else{
     $btplantio="iniciar-plantio.php?idcultura={$cultura['idcultura']}";
     $bttexto="iniciar plantio";
     $btclass="success";
   }  ?>
    <td><a class="btn btn-<?=$btclass?>" href="<?=$btplantio?>"><?=$bttexto?></a>
      <td><a class="btn btn-primary" href="cultura.php?idcultura=<?=$cultura['idcultura']?>">alterar</a></td>
    </td>
    <td>
      <form action="remove-cultura.php" method="post">
        <input type="hidden" name="idcultura" value="<?=$cultura['idcultura']?>">
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