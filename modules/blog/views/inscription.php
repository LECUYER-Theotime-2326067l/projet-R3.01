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
				<option value="Affilié">Affilié</option>
				<option value="Sympathisant">Sympathisant</option>
				<option value="Adhérant">Adhérant</option>
				<option value="Chevalier">Chevalier</option>
				<option value="Dame">Dame</option>
				<option value="Grand Chevalier">Grand Chevalier</option>
				<option value="Haute Dame">Haute Dame</option>
				<option value="Commander">Commander</option>
				<option value="Grand'Croix">Grand'Croix</option>
			</select> 
			</div>
		<button type="submit" name="envoyer" class="but">Insciption</button>
</body>
</html>