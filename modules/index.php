<?php
$serveur = 'mysql-lecuyer-theotime-2326067l.alwaysdata.net';
$db = 'lecuyer-theotime-2326067l_testmabite';
$user = '343207';
$pass = 'tenraczebi';


try 
{
    // essaye de se connecter à la base de données (BD)
    $connection = new PDO('mysql:host='.$serveur.';dbname='.$db.'', $user, $pass);
    // Selectionne la table userID de la BD et l'affiche
    foreach ($connection->query('SELECT * FROM userID') as $row) 
    {
        print_r($row);
    }
}
// Si échoue à se connecté à la BD
catch (PDOException $e) 
{
    //Envoie un message d'erreur si peut pas se connecter
    echo 'Erreur de connexion : ' . $e->getMessage();
    die;
}
?>