<?php
require_once('cnx.php');

$filtres = array(
	'nom' => FILTER_SANITIZE_STRING,
	'prenom' => FILTER_SANITIZE_STRING,
	'tel' => array(
		'filter' => FILTER_VALIDATE_REGEXP,
		'options' => array('regexp'=>'#^[0-9]{10}$#')
	),
	'date' => FILTER_SANITIZE_STRING,
	// Les données pour heure et coiffeuse pas utile car champ pré-rempli
);

$result = filter_input_array(INPUT_POST, $filtres);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire résultat</title>
</head>

<body>
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
	$sql = "INSERT INTO rdv (nom, prenom, tel, date_rdv, heure_rdv, coiffeuse) VALUES (:nom, :prenom, :tel, :date_rdv, :heure_rdv, :coiffeuse)";

	$rs_insert = $cnx->prepare($sql);

	$rs_insert->bindValue(':nom', trim($result['nom']), PDO::PARAM_STR);
	$rs_insert->bindValue(':prenom', trim($result['prenom']), PDO::PARAM_STR);
	$rs_insert->bindValue(':tel', trim($result['tel']), PDO::PARAM_STR);
	$rs_insert->bindValue(':date_rdv', $result['date'], PDO::PARAM_STR);
	$rs_insert->bindValue(':heure_rdv', $_POST['heure'], PDO::PARAM_STR); // $_POST parce que il n'est pas dans la variable $result
	$rs_insert->bindValue(':coiffeuse', $_POST['coiffeuse'], PDO::PARAM_STR); // $_POST parce que il n'est pas dans la variable $result

	$rs_insert->execute();
	
	echo '<h1>Insertion ok !</h1>';
}
?>
</body>
</html>