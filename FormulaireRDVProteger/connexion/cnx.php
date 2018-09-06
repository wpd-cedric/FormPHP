<?php
$dsn = "mysql:host=localhost;dbname=form;charset=utf8";
$user = "root";
$pass = "root";

try{
	$cnx = new PDO($dsn, $user, $pass);
} catch(PDOException $e){
	echo 'Une erreur est survenue';
}
?>