<?php

$user = '343207';
$pwd = 'tenraczebi';


try {
    // essaye de se connecter à la base de données (BD)
    $connection = new PDO ('mysql:host=mysql-lecuyer-theotime-2326067l.alwaysdata.net;dbname=lecuyer-theotime-2326067l_tenrac', $user, $pwd);
    // Selectionne la ligne userID de la BD et l'affiche
    foreach ($connection->query('SHOW TABLES') as $row) {
        print_r($row);
    }
}
// Si échoue à se connecté à la BD
catch (PDOException $e) {
    // Affiche un message d'erreur
    print "Erreur :" . $e->getMessage() . "<br/r>";
    die;
}
?>