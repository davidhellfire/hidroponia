<?php
require_once("cabecalho.php");
require_once("banco-usuarios.php");
// require_once("logica-usuario.php");

$idusuario = $_POST['idusuario'];
?>

<script text="javascript">
    var x = confirm("Deseja realmente excluir usuario?");
	if(x == true ){
		<?=
		deletaUsuario($conn, $idusuario);
		header("Location: usuario-lista.php");
		?>
	}else if(x != true ){
		
		header("Location: usuario-lista.php");

	}
</script>



