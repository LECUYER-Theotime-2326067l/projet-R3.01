<?php
INCLUDE_ONCE 'tableMess.php';

	$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
	$db = "lecuyer-theotime-2326067l_tenrac";
	$user = "343207";
	$pass = "tenraczebi";

// Connexion à la base de données
$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
$tm = new tableMess($connection);

if(isset($_POST['valider'])){
	if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$message = nl2br(htmlspecialchars($_POST['message']));
		$tm->userID = $pseudo;
		$tm->txtMessage = $message;
		$tm->addNewPostMessage();
	} else{
		echo "ça marche pas";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
	</head>
	<body>
		<form method="POST" action="" align="center">
			<input type="text" name ="pseudo" placeholder="Rentre un id !">
			<br>
			<textarea name="message" placeholder="Rentre mnt un txtMessage !"></textarea>
			<br>
			<input type="submit" name="valider">
		</form>
		<section id="message"></section>
		
		<script>
			// sert à refresh la page toute les 500ms
			setInterval('load_message()', 500);
			function load_message(){
				$('#message').load('loadMessage.php');
			}
		</script>
		
	</body>
</html>
