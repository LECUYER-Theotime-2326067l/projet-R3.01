<?php
    //inclure les fichiers necessaire
    include_once 'database.php';
    include_once 'user.php';
    include_once 'tableexist.php';

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
           echo "Utilisateur créé avec succès !";
       }   else{
           echo "Erreur lors de la création de l'utilisateur.";
       }
?>