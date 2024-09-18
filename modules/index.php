<?php

$user = '343207';
$pass = 'tenraczebi';


try {
    // essaye de se connecter à la base de données (BD)
    $connection = new PDO ('mysql:host=$host; dbname=User', $user, $pwd);
    // Selectionne la ligne userID de la BD et l'affiche
    foreach ($connection->query('SELECT * FROM userID') as $key) {
        print_r($row);
    }
} 
// Si échoue à se connecté à la BD
catch (PDOException $e) {
    // Affiche un message d'erreur
    print "Erreur :" . -$e->getMessage() . "<br/r>";
    die;
}