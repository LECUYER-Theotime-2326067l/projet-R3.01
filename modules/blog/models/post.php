<?php
session_start();
INCLUDE_ONCE constants::directoryCore().'tableMess.php';

    $serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
    $db = "lecuyer-theotime-2326067l_tenrac";
    $user = "343207";
    $pass = "tenraczebi";

// Connexion à la base de données
$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
$tm = new tableMess($connection);

if(isset($_POST['valider'])){
    if(!empty($_POST['message'])){
        $userID = $_SESSION['user']['id'];
        $message = nl2br(htmlspecialchars($_POST['message']));

        // On lie le message à l'utilisateur connecté
        $tm->txtMessage = $message;
        $tm->userID = $userID; 
        $tm->addNewPostMessage();
    } else{
        echo "Veuillez entrer un message.";
    }
}

// $requete = $connection->prepare("SELECT FROM USER WHERE userEmail = :email");
//             $requete->bindParam(':email', $email);
//             $requete->execute();
//             $result = $requete->fetch(PDO::FETCH_ASSOC);
//             if ($result) {
//                 // Vérification du mot de passe
//                 if (password_verify($password, $result['userPassword'])) { 
//                     $_SESSION['user'] = [
//                         'id' => $result['userID'],
//                         'email' => $result['userEmail'],
//                         'name' => $result['userName'] // Récupérer le nom de l'utilisateur
//                     ];
//                     header('Location: index.php?action=repas&id=1');
//                     exit();
//                 }
//             }
?>