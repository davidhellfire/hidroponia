<?php
require_once("conecta.php");


 	
 $stmt = $conn->prepare("SELECT *FROM medicoes WHERE dthmedicao <= now() AND dthmedicao >= (SELECT DATE_ADD('2019-11-21 00:00:00', INTERVAL -1440 MINUTE)) ORDER BY dthmedicao ");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//return $results;

?>