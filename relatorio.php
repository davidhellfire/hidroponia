<?php
if( isset($_POST['culturaPlantada']) && isset($_POST['dataini']) && isset($_POST['datafim'])){
  if($_POST['dataini']<=$_POST['datafim']){
    $idplantio = $_POST['culturaPlantada'];
    $dataini = $_POST['dataini'];
    $datafim = $_POST['datafim'];
    /*var_dump($idplantio);
    var_dump($dataini);
    var_dump($datafim);*/
   $aux_filtro = true;//variavel para conferir se houve intencao de buscar
  }else{
    $aux_filtro = false;
    echo "<script> alert('Datas incoerentes');</script>";
  }
}

require_once("banco-relatorios.php");
require_once("logica-usuario.php");
verificaUsuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
	<title>Relatorio</title>

  <?php include 'cabecalho.php';?>

  <div class="title">
    <h1 align="center">Relatório</h1>
  </div>

  <div class="container-fluid">
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">

      <div align="center" >

        <label for="col-sm-2 control-label"><b>Plantio</b></label>
        <select class="form-control"  id="comboplantio" name="culturaPlantada">
          <?php 
          $culturasPlantadas = listaCulturasPlantadas($conn);
          foreach ($culturasPlantadas as $cultura) :
            ?>
            <option value="<?=$cultura['idplantio']?>" ><?=$cultura['nome']?> - <?=$cultura['dthplantio']?></option>
          <?php endforeach ?>
        </select>


        <label class="col-sm-2 control-label" for="formGroupInputLarge"><b>Data Inicial</b></label>
        <input type="date" class="form-control"  name="dataini" value="" id="dataini" required>

        <label class="col-sm-2 control-label" for="formGroupInputLarge"><b>Data Final</b></label>
        <input type="date" class="form-control"  name="datafim" value="" id="datafim" required>


        <button type="submit" class="btn btn-primary btn-lg">Exibir</button>

      </div>


    </form>

    <div class="table-responsive text-nowrap">

      <table class="table table-striped table-bordered">
        <?php
        if($aux_filtro){ ?>
          <tr align="center">
            <td><b>Medicao</b></td>
            <td><b>Plantio <?= $medicao['dthplantio'] ?></b></td>
            <td><b>Temp.</b></td>
            <td><b>Umid.</b></td>
            <td><b>pH</b></td>
            <td><b>uS</b></td>
            <td><b>Data Hora</b></td>
          </tr>
          <?php
          $medicoesFiltro = listaMedicoesData($conn,$dataini,$datafim,$idplantio);
          foreach($medicoesFiltro as $medicao) :
            ?>
            <tr align="center">
              <td><?= $medicao['idmedicao'] ?></td>
              <td><?= $medicao['idplantio'] ?></td>
              <td><?= $medicao['temp']?></td>
              <td><?= $medicao['umi']?></td>
              <td><?= $medicao['ph']?></td>
              <td><?= $medicao['us']?></td>
              <td><?= $medicao['dthmedicao']?></td>
        </tr>
        <?php
      endforeach?>
    <?php }?>
  </  table>
</div>


 <!--<script>
    function validaData(input){ 
      if (document.getElementById('dataini').value <= input.value) {
        input.setCustomValidity('Datas incoerentes');
    } 
  </script>-->
  <?php include("rodape.php"); ?>
