<?php

$css_file = "homepage.css";
include __DIR__ . '/header.php';
headerPage("Acceuil", $css_file);

?>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo $css_file; ?>">
    
</head>

<body>	
	<?php
	$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
	$db = "lecuyer-theotime-2326067l_tenrac";
	$user = "343207";
	$pass = "tenraczebi";
	$message = '';
	try{
		$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
	} catch(PDOException $e){
		echo "Erreur de connexion : " . $e->getMessage();
	}
	
	
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST["email"];
		$password = $_POST["password"];
		if (!empty($email) && !empty($password)) {
			
			// Préparation de la requête avec des paramètres
			$requete = $connection->prepare("SELECT * FROM USER WHERE userEmail = :email AND userPassword = :password");
			$requete->bindParam(':email', $email);
			$requete->bindParam(':password', $password);
			$requete->execute();
			$result = $requete->fetch(PDO::FETCH_ASSOC);
			
			if ($result) { // Vérifie si $result n'est pas vide
				
			} else {
				$message = "Email ou mot de passe incorrect !";
			}
		} else {
			$message = "Veuillez remplir tous les champs !";
		}
	}
	?>
	<form method="POST" action="" id="connect" class="connect">
		<div class="mail">
			<input type="email" placeholder="Email" name="email" class="inpo"> <br>
		</div>
		<div class="mdp">
			<input type="password" placeholder="Mot de passe" name="password" class="inpo"> <br>
		</div>
		<button type="submit" name="valider" class="but">Se connecter</button>		
		<p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
		<?php
		if ($message) {
			echo "<p>$message</p>";
		}
		?>
	</form>
</body>
</html>
