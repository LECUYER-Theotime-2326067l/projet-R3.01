<?php

	INCLUDE_ONCE 'database.php';
	INCLUDE_ONCE 'user.php';
	
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
	
	
	$user= new User($connection);

if(isset($_POST['envoyer'])){
	// A fuse avec le code Kilian
	$user->userName = $_POST['pseudo'];
	$user->userEmail = $_POST['email'];
	$user->userPassword = $_POST['password'];
	$user->userGender = $_POST['gender'];
	$user->userGrade = $_POST['grade'];
	if ($user->createNewUser()){
		echo "Cool ta vie";	
	}
	else {
		echo "Va mourrir";
	}
}
?>