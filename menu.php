<?php 
require_once("logica-usuario.php");
require_once("banco-usuarios.php");
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="gauge_google.php"><img src="logo_hidroponia.png" style="max-width: 150px; height: 150px; margin: 0;"></a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">

        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
    <div >
      <ul class="nav navbar-nav">

        <li class="active"><a href="gauge_google.php">Dashboard</a></li>
        <?php if($_SESSION["nivel"]){ ?>
          <li><a href="cadastro.php">Cadastro Usuários</a></li>
          <li><a href="usuario-lista.php">Listar Usuários</a></li>
          <li><a href="cultura.php">Culturas</a></li>
        <?php } ?>

          <li><a href="relatorio.php">Relatórios</a></li>
          <?php if(!usuarioEstaLogado()){
           $estadoLogin="Login";
           $pageLink = "index.php";
         } else{
          $estadoLogin="Logout";
          $pageLink = "logout.php";
        } 
        ?>
        <li><a href="<?=$pageLink;?>"><?=$estadoLogin;?></a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Dropdown<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Ação</a></li>
                  <li><a href="#">Outra ação</a></li>
                  <li><a href="#">Qualquer coisa</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Outra categoria</li>
                  <li><a href="#">Link separado</a></li>
                  <li><a href="#">Outro link separado</a></li>
                </ul>
              </li>-->
            </ul>
           <!-- <form class="navbar-form navbar-right">
              <div class="form-group">
               <input type="text" class="form-control" placeholder="Pesquisar">
              </div>
          <button type="submit" class="btn btn-default">Pesquisar</button>
        </form>-->
      </div>
    </div>
  </nav>