<?php 
require_once("conecta.php");


 /*
 $id = 1;
 $data = $conn->query('SELECT * FROM usuarios WHERE idusuario = ' . $conn->quote($id));
  
    foreach($data as $row) {
        print_r($row); 
        echo "</br>";
    } sem prepare */

   /* $stmt = $conn->prepare('SELECT * FROM usuarios ORDER BY idusuario');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results);

    echo "</br>";retorna todos usuarios*/

   // $us = rand(0,6000);/*script para gerar valor de condutividade(uS) aleatorio*/

if(isset($_POST['us'])) {
        $us = $_POST['us'];
        var_dump($us);
        echo "</br>";
    }elseif (isset($_GET['us'])) {
        $us = $_GET['us'];
        echo $us;
        echo "</br>";
    }

    if(isset($_POST['ph'])) {
    	$ph = $_POST['ph'];
    	var_dump($ph);
    	echo "</br>";
    }elseif (isset($_GET['ph'])) {
    	$ph = $_GET['ph'];
    	echo $ph;
    	echo "</br>";
    }

    if(isset($_POST['umi'])) {
    	$umidade = $_POST['umi'];
    	var_dump($umidade);
    	echo "</br>";
    }elseif (isset($_GET['umi'])) {
    	$umidade = $_GET['umi'];
    	echo $umidade;
    	echo "</br>";
    }

    if(isset($_POST['temp'])){
    	$temp = $_POST['temp'];
    	var_dump($temp);
    }elseif (isset($_GET['temp'])) {
    	$temp = $_GET['temp'];
    	echo $temp;
    }

    $stmt = $conn->prepare("INSERT INTO medicoes (idplantio,temp,umi,ph,us,dthmedicao) VALUES(1,:TEMPERATURA,:UMIDADE,:PH,:US,now())");

    $stmt->bindParam(":TEMPERATURA",$temp);
    $stmt->bindParam(":UMIDADE",$umidade);
    $stmt->bindParam(":PH",$ph);
    $stmt->bindParam(":US",$us);

    $stmt->execute();

    echo "</br>Medicao Inserida!";

    ?>
    <script type="text/javascript">//script redireciona para servidor web do arduino
    	setTimeout(function() {
    		window.location.href = "http://192.168.1.88";
    	}, 150000);
    </script>