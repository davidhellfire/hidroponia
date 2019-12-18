<?php
require_once("conecta.php");
require_once("banco-medicoes.php");
require_once("logica-usuario.php");

verificaUsuario();

   $dados = json_encode($results);//repassa valores do array $results em string para $dados
  // $dados_js = json_encode($results,JSON_FORCE_OBJECT);//repassa valores do array $results em String JSON para $dados_js
  // var_dump($dados_js);
   echo "<input type='hidden' class='results' value='".$dados."'>";

  //variaveis globais de recuperacao do ultimo valor salvo no BD
   $last_ph = end($results);
   $last_ph = $last_ph["ph"];
   echo "<input type='hidden' id='last_ph' value='".$last_ph."'>";
 //  var_dump($last_ph);
  // echo "</br>";

   $last_us = end($results);
   $last_us = $last_us["us"];
   echo "<input type='hidden' id='last_us' value='".$last_us."'>";
  // var_dump($last_us);
  // echo "</br>";

   $last_umi = end($results);
   $last_umi = $last_umi["umi"];
   echo "<input type='hidden' id='last_umi' value='".$last_umi."'>";
  // var_dump($last_umi);
  // echo "</br>";

   $last_temp = end($results);
   $last_temp = $last_temp["temp"];
   echo "<input type='hidden' id='last_temp' value='".$last_temp."'>";
  // var_dump($last_temp);

  // echo "</br>";
   ?>
   
   <!DOCTYPE html>
   <html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <title>DASHBOARD</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--Grafico uS-->
    <script src="js/trend_us.js"></script>

    <!--Grafico pH-->
    <script src="js/trend_ph.js"></script>

    <!-- relogio pH -->
    <script src="js/gauge_ph.js"></script>

    <!-- relogio condutividade -->
    <script src="js/gauge_us.js"></script>

    <!-- relogio temperatura -->
    <script src="js/gauge_temp.js"></script>

    <!-- relogio umidade -->
    <script src="js/gauge_umi.js"> </script>

    <?php include 'cabecalho.php';?>

    <div class="title">
      <h3 align="center">DASHBOARD SISTEMA DE IRRIGAÇÃO</h3>
      <p class="text-success" align="center">Você está logado como <?= usuarioLogado() ?> <a href="logout.php">Deslogar</a></p>
      <h3>
        <div id="data-hora" align="center"></div>
        <script src="js/data_hora_user.js"></script>
      </h3>
    </div>


    <div class="container-fluid" align="center">
      <div class="row">
        <div class="col-md-12">
          <div id="grafico_uS" ></div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div id="grafico_pH" ></div>
        </div>
      </div>


      <div class="row"> 
        <div class="col-sm-3" align="center" style="width: 300px; height: 200px;">
         <div id="gauge_ph" style="width: 150px; height: 200px;"></div>
       </div>


       <div class="col-sm-3" align="center"style="width: 300px; height: 200px;">
         <div id="gauge_uS" style="width: 150px; height: 200px;"></div>
       </div>


       <div class="col-sm-3" align="center" style="width: 300px; height: 200px;">
         <div id="gauge_temp" style="width: 150px; height: 200px;"></div>
       </div>


       <div class="col-sm-3" align="center" style="width: 300px; height: 200px;">
        <div id="gauge_umi" style="width: 150px; height: 200px;"></div>
      </div>
    </div>
  </div>  
  <?php include("rodape.php"); ?>