<?php
$dsn = "mysql:host=localhost;dbname=form;charset=utf8"; // ou IP du serveur
$user = "root"; // login d'accès à la db
$pass = "root"; // mot de passe pour l'accès à la db

try {
	$cnx = new PDO($dsn, $user, $pass);
} catch(PDOException $e){
	echo 'Erreur de connexion à la base de donnée';
}

?>