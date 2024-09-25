<?php
    //inclure les fichiers necessaire
    include_once 'database.php';
    include_once 'user.php';

     //connexion à la base de données
     $database = new database();
     $db = $database->getConnection();
 
     //initialisation de l'objet utilisateur
     $user = new user($db);
 
     $user->createTableUser();
 
     $user->userName = 'Killian Gurrea';
     $user->userEmail = 'killiangurrea@gmail.com';
     $user->userPassword = '1234';
     $user->userGender = 'homme';
     $user->userGrade = 'Grand Maître';
     
     //suprimer un utilisateur
     /*
     if($user->deleteUser()){
         echo "killian a été suprimer";
     } else {
         echo "erreur de supression";
     }
     */

     //mettre a jour un utilisateur
     /*
     if($user->updateUser()){
         echo "user killian a jour";
     } else {
         echo "probleme de mise a jour";
     }*/
 
     //creer un utilisateur
     if($user->createNewUser()){
         echo "Utilisateur créé avec succès";
     }   else{
         echo "Erreur lors de la création de l'utilisateur";
     }
     
     //mettre a jour la table user
     /*if($user->updateTableUser()){
         echo "modif reussi";
     } else{
         echo "pas reussi a modif";
     }*/
     
     //suprimer la table user
     /*if($user->deleteTableUser()){
         echo "la table user a été surpimer";
     } else {
         echo "la table user n'a pas pu être suprimer";
     }*/

     	//affichage des user
	echo "Liste des utilisateurs";
	$stmt = $user->read();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		echo "<p>";
		echo "ID: {$userID} <br>";
		echo "Nom: {$userName} <br>";
		echo "Email: {$userEmail} <br>";
		echo "Mot de passe: {$userPassword} <br>";
		echo "Genre: {$userGender} <br>";
		echo "Grade: {$userGrade} <br>";
		echo "</p>";
	}

    // afficher utilisateur via l'id
	$userData = $user->readOneById();

	if ($userData) {
		echo "Détails de l'utilisateur";
		echo "<p>";
		echo "ID: {$userData['userID']} <br>";
		echo "Nom: {$userData['userName']} <br>";
		echo "Email: {$userData['userEmail']} <br>";
		echo "Mot de passe: {$userData['userPassword']} <br>";
		echo "Genre: {$userData['userGender']} <br>";
		echo "Grade: {$userData['userGrade']} <br>";
		echo "</p>";
	} else {
		echo "Aucun utilisateur trouvé avec cet ID.";
	}
?>