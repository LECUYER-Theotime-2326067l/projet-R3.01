<?php
$css_file = "homepage.css";
include __DIR__ . '/header.php';
headerPage("Acceuil", $css_file);
?>

<!DOCTYPE html>
<html lang="fr">
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
		$requete = $connection->prepare("SELECT * FROM USER WHERE userEmail = :email");
		$requete->bindParam(':email', $email);
		$requete->execute();
		$result = $requete->fetch(PDO::FETCH_ASSOC);
		
		if ($result) {
		// Vérifions ce qui est récupéré depuis la base de données
		echo '<pre>';
		print_r($result);
		echo '</pre>';
}

		if ($result && password_verify($password, $result['userPassword'])) { 
			header('Location: chat.php');
			exit();
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
		<?php
		if ($message) {
			echo "<p>$message</p>";
		}
		?>
		<p>Pas encore de compte ? <a href="inscription.php">Contactez-nous</a></p>
	</form>
</body>
</html>
