<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire de rendez-vous</title>
</head>

<body>
	<h1>Salon de coiffure</h1>
	<form method="post" action="traitement.php">
		<fieldset>
			<legend>Client</legend>
			<p><input type="text" name="nom" placeholder="Nom" autofocus /></p>
			<p><input type="text" name="prenom" placeholder="Prénom" autofocus /></p>
			<p><input type="tel" name="tel" placeholder="Tél." autofocus /></p>
		</fieldset>
		<fieldset>
			<legend>RDV</legend>
			<p><input type="date" name="date" /></p>
			<label for="heure">Heure</label><br>
			<select id="heure" name="heure">
				<option value="09:00:00">9H</option>
				<option value="10:00:00">10H</option>
				<option value="11:00:00">11H</option>
				<option value="14:00:00">14H</option>
				<option value="15:00:00">15H</option>
			</select>
			<label for="coiffeuse">Coiffeuse</label><br>
			<input type="radio" name="coiffeuse" id="coiffeuse1" value="Valérie">Valérie
			<input type="radio" name="coiffeuse" id="coiffeuse2" value="Nadine">Nadine
			<input type="radio" name="coiffeuse" id="coiffeuse3" value="Emilie">Emilie
		</fieldset>
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>