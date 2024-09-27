<?php

$css_file = "homepage.css";
include __DIR__ . '/header.php';
headerPage("Acceuil", $css_file);



?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" />
	<meta name="generator" content="Geany 2.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_file; ?>">
    <title>Inscription</title>
</head>

<body>
	<form method="POST" action="traitementInscription.php" id="connect" class="connect">
		<div class="pseudo">
			<input type="text" id="pseudo" name="pseudo" placeholder="Entrez le pseudo" class="inpo" required> <br>
		</div>
		<div class="email">
			<input type="email" placeholder="Email" name="email" class="inpo" required> <br>
		</div>
		<div class="mdp">
			<input type="password" placeholder="Mot de passe" name="password" class="inpo" required> <br>
		</div>
		<div class="gender">
				<p>Selectionnez le genre :
			<select name="gender">
				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
			</select>
			</p>
		</div>
		<div class="grade">
				<p>Selectionnez le grade :
			<select name="grade">
				<option value="Homme">Affilié</option>
				<option value="Femme">Sympathisant</option>
				<option value="Homme">Adhérant</option>
				<option value="Femme">Chevalier</option>
				<option value="Homme">Dame</option>
				<option value="Femme">Grand Chevalier</option>
				<option value="Homme">Haute Dame</option>
				<option value="Femme">Commander</option>
				<option value="Homme">Grand'Croix</option>
			</select> 
			</div>
		<button type="submit" name="envoyer" class="but">Insciption</button>
</body>
</html>