<?php
require_once("logica-usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
	<title>Area de Acesso</title>

 <?php include 'cabecalho.php';?>
 <div class="title"">
   <h1 align="center">Área de Acesso</h1>
 </div>

 <?php if(usuarioEstaLogado()) {?>
 <p class="text-success" align="center">Você está logado como <?= usuarioLogado() ?> <a href="logout.php">Deslogar</a></p>
 <?php } else {?>


 <form action="login.php" method="POST">

  <div class="form-group form-group-lg">
   <label class="col-sm-2 control-label" for="formGroupInputLarge">Login</label>
   <input type="text" class="form-control input-lg"  placeholder="e-mail"  name="email"></br>
 </div>

 <div class="form-group form-group-lg">

   <label class="col-sm-2 control-label" for="formGroupInputLarge">Senha</label>
   <input type="password" class="form-control input-lg"  placeholder="senha" minlength="8" name="senha" required></br>
 </div>

 <div class="text-center">
   <button type="submit" class="btn btn-primary btn-lg" >Entrar</button>
   <button type="button" class="btn btn-warning btn-lg">Esqueceu?</button>
 </div>

</form>

<?php } ?>
<?php include("rodape.php"); ?>