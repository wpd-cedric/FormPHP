<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire</title>
</head>

<body>
	<h1>Mon formulaire</h1>
	<form method="post" action="traitement.php">
		<fieldset>
			<legend>Vos coordonnées</legend>
			<p class="formulaire">
				<label for="prenom">Prénom :</label>
				<input type="text" id="prenom" name="prenom" placeholder="Votre prénom">
			</p>
			<p class="formulaire">
				<label for="nom">Nom :</label>
				<input type="text" id="nom" name="nom" placeholder="Votre nom">
			</p>
			<p class="formulaire">
				<label>Email :</label>
				<input type="text" id="mail" name="mail" placeholder="Votre Email">
			</p>
		</fieldset>
		<p align="center">
			<input type="submit" value="Envoyer">
		</p>
	</form>
</body>
</html>