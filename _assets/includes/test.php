<?php
    //inclure les fichiers necessaire
    include_once 'database.php';
    include_once 'user.php';
	include_once 'tenracBase.php';
    include_once 'tableMess.php';

     //connexion à la base de données
     $database = new database();
     $db = $database->getConnection();
 
     //initialisation de l'objet utilisateur
     $user = new user($db);
    
     $user->createTableUser();

     $user->userName = 'Killian Gurrea';
     $user->userEmail = 'killian.gurrea@etu.univ-amu.fr';
     $user->userPassword = 'Killian-gurrea-69';
     $user->userGender = 'homme';
     $user->userGrade = 'Grand Croix';
     $user->userRank = 'Compagnon';
     
     //     test de la class user   //

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

   /*  	//affichage des user
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
	
	//		test de la classe tenracBase		//
*/
    $TB = new tenracBase($db);
/*
    //création des differentes table

    if($TB->createTableAllergie())
    echo "table allergie créer<br>";
else 
    echo "probleme de création de la table allergie<br>";

if($TB->createTableCroyance())
    echo "table croyance créer<br>";
else
    echo "probleme de création de la table <br>";

if($TB->createtableConviction())
    echo "table conviction créer<br>";
else
    echo "probleme de création de la table <br>";

    if($TB->createTableIngredient())
    echo "table ingredient créer<br>";
else 
    echo "probleme de création de la table ingredient<br>";
    
    
    if($TB->createTablePlat())
    echo "table plat créer<br>";
else 
    echo "probleme de création de la table plat<br>";

    if($TB->createTableRepas())
    echo "table repas créer<br>";
else
    echo "probleme de création de la table repas<br>";
    
    if($TB->createTableLieu())
    echo "table lieu créer<br>";
else
    echo "probleme de création de la table lieu<br>";

    if($TB->createTableClub())
        echo "table club créer<br>";
    else   
        echo "probleme de création la table club<br>";

    if($TB->createTableOrdre())
        echo "table ordre créer<br>";
    else
        echo "probleme de création de ordre<br>";
    $TB->ingredientName = 'pasta';
    $TB->alimentPoids = null;
    $TB->alimentQuantity = null;
    $TB->platID = 1;
    $TB->platName = 'Carbonara';
    $TB->addIngredient();
    $TB->addPlat();*/

	//		test de la classe table	MESSAGES	//
	/*
	 $message = new TableMess($db);

	if ($message->createTableMessage())
		 echo '<br>table message créer<br>';
	else
		 echo '<br>table message pas créer<br>';
	
	$message->txtMessage = 'bienvenu sur le site des tenracs';
	$message->userID = 6;
	
	if($message->addNewPostMessage())
		echo 'nouveau message <br>';
	else
		echo 'pas de nouveau message<br>';
	
	/*$messData = $message->readMessage($message->userID);
	if ($messData) {
    echo "Nom de l'utilisateur : " . $messData['userName'] . "<br>";
    echo "Message : " . $messData['txtMessage'];
} else {
    echo "aucun message de cette utilisateur ou id inconnu";
}

	$messData = $message->readMessageAll();
	if($messData){
		foreach ($messData as $row) {
			echo "Nom de l'utilisateur : " . $row['userName'] . "<br>";
			echo "Message : " . $row['txtMessage'] . "<br><br>"; 
		}
	} else {
		echo "aucun message de cette utilisateur ou id inconnu";
	}
	/*$TB->tableName = 'PLAT';
	$TB->delTable();
*/

?>