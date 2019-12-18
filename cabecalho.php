<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("mostra-alerta.php");
?>
<!-- Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
<!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
     <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
     <!-- menu da pagina -->
     <?php require_once 'menu.php';?>
     <div class='container'>
     <div class='principal'>
			   <?php setlocale(LC_ALL, "pt_BR","pt_BR.uft-8","portuguese");
         mostraAlerta("success");
		     mostraAlerta("danger");?>