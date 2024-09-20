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

    //creer un utilisateur
    if($user->createNewUser()){
        echo "Utilisateur créé avec succès !";
    }   else{
        echo "Erreur lors de la création de l'utilisateur.";
    }
?>