<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire de rendez-vous</title>
	<script src="js/jquery-3.3.1-min.js"></script>
	<style>
		.contenair{ position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: grey;}
		.box{ width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: green;}
		.box2{ width: 100%; height: 100%; position: absolute; left: 0; top: 100%; background: red; z-index: 2;}
		.box3{ width: 100%; height: 100%; position: absolute; left: 0; top: 100%; background: yellow; z-index: 2;}
		#first.go{ animation: 2s slideUpFirst forwards; -webkit-animation: 2s slideUpFirst forwards; -moz-animation: 2s slideUpFirst forwards; -o-animation: 2s slideUpFirst forwards;}
		#second.go, #third.go{ animation: 2s slideUp forwards; -webkit-animation: 2s slideUp forwards;	-moz-animation: 2s slideUp forwards; -o-animation: 2s slideUp forwards;}
		#second.go2{ animation: 2s slideUpFirst forwards; -webkit-animation: 2s slideUpFirst forwards; -moz-animation: 2s slideUpFirst forwards; -o-animation: 2s slideUpFirst forwards;}
		@keyframes slideUpFirst{
			0%{ top: 0;}
			100%{ top: -100%;}
		}
		@keyframes slideUp{
			0%{ top: 100%;}
			100%{ top: 0;}
		}
		.hide{ display: none;}
		.show{ display: block; background: red; width: 100%;}
	</style>
</head>

<body>
	<div class="contenair">
		<h1>Salon de coiffure</h1>
		<form method="post" action="traitement.php" id="formulaire">
			<div id="first" class="box">
				<fieldset>
					<legend>Données du client</legend>
					<p><input type="text" name="nom" id="nom" /></p>
				</fieldset>
				<a href="#" id="btn">Prochain</a>
			</div>
			<div id="second" class="box2">
				<fieldset>
					<legend>Contact</legend>
					<p><input type="text" name="mail" id="mail" /></p>
				</fieldset>
				<a href="#" id="btn2">Prochain</a>
			</div>
			<div id="third" class="box3">
				<input type="submit" value="Envoyer" id="send">
			</div>
		</form>
	
	</div><!-- End of contenair -->
	 
	<script>
		$(document).ready(function(){
			$('#btn').click(function(){
				var result = true;
				if($('#nom').val()==''){
					result = false;
					$('#nom').css('border-color', 'red');
				 } else{
				   result = false;
				   $('#first').addClass('go');
				   $('#second').addClass('go');
					
				 }
				  return result;
			});
			$('#btn2').click(function(){
				var result = true;
				if($('#mail').val()==''){
					result = false;
					$('#mail').css('border-color', 'green');
				 } else{
				   result = false;
				   $('#second').addClass('go2');
				   $('#third').addClass('go');
				 }
				  return result;
			});
		});
	</script>
</body>
</html>