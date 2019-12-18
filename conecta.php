<?php
$username = "root";
$pass = "";
try{
	$conn = new PDO('mysql:host=localhost;dbname=hidroponia', $username, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

?>