<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Démarrer la session
}

$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
$db = "lecuyer-theotime-2326067l_tenrac";
$user = "343207";
$pass = "tenraczebi";

$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        
    // Préparation de la requête avec des paramètres
        $requete = $connection->prepare("SELECT * FROM USER WHERE userEmail = :email");
        $requete->bindParam(':email', $email);
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['userPassword'])) { 
            $_SESSION['user'] = [
                'id' => $result['userID'],
                'email' => $result['userEmail']
            ];
            header('Location: index.php?action=repas&id=1');
            exit();
        } else {
            $message = "Email ou mot de passe incorrect !";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}
?>