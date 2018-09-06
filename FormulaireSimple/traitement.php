<?php
require_once('cnx.php');

// filtre des validations des données insérées dans les inputs
$filtres = array(
	'nom' => FILTER_SANITIZE_STRING,
	'prenom' => FILTER_SANITIZE_STRING,
	'mail' => FILTER_VALIDATE_EMAIL,
);

$result = filter_input_array(INPUT_POST, $filtres);

?>
<!doctype html> 
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire</title>
</head>

<body>
<h1 align="center">
<?php
$controle_presence = 0; // si un des champs est vide alors on va incrémenter dans le foreach
$controle_filtres = 0; // si un des champs est non valide alors on va incrémenter dans le foreach

foreach($filtres as $key => $value){
	if(empty($_POST[$key])){
		echo $key. ' est vide.<br>';
		$controle_presence++;
	} elseif($result[$key] === false){
		echo $key. ' est pas valide.<br>' ;
		$controle_filtres++;
	}
};	

// Lorsque tout est contrôle alors on INSERT dans la db vérifier si controle_presence et controle_filtre sont tjs à 0
if(($controle_presence == 0) &&($controle_filtres == 0)){
	$sql = "INSERT INTO internaute (nom, prenom, email, dateInscription) VALUES (:nom, :prenom, :email, now())";
	
	// Préparation de l'envoi des données et contrôle qualité des informations reçues avec bindValue	
	$rs_insert  = $cnx->prepare($sql);

	$rs_insert->bindValue(':nom', trim($result['nom']), PDO::PARAM_STR);
	$rs_insert->bindValue(':prenom', trim($result['prenom']), PDO::PARAM_STR);
	$rs_insert->bindValue(':email', trim($result['mail']), PDO::PARAM_STR);

	$rs_insert->execute();
	
	echo 'Insertion ok !';
}
	
?>
</h1>
</body>
</html>