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

if(isset($_POST['envoyer'])){
	// A fuse avec le code Kilian
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$grade = $_POST['grade'];
	
	$requete = $connection->prepare("INSERT INTO USER (userName, userEmail, userPassword, userGender, userGrade) VALUES (:userName, :userEmail, :userPassword, :userGender, :userGrade);");
	$requete->execute(
		[':userName' => $pseudo, ':userEmail' => $email, ':userPassword' => $password, ':userGender' => $gender, ':userGrade' => $grade]

	);
	$reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>