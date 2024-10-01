<?php
INCLUDE_ONCE constants::directoryCore().'tableMess.php';

$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
$db = "lecuyer-theotime-2326067l_tenrac";
$user = "343207";
$pass = "tenraczebi";

try {
    // Connexion à la base de données
    $connection = new PDO("mysql:host=".$serveur.";dbname=".$db, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer les erreurs SQL

    $tm = new tableMess($connection);

    // Récupérer tous les messages
    $messages = $tm->readMessageAll();

    // Si des messages existent, les afficher
    if ($messages) {
        foreach ($messages as $row) {
            extract($row);  // Extraction des données du tableau associatif
            ?>
            <h4><?php echo htmlspecialchars($userName); ?></h4> <!-- Nom de l'utilisateur -->
            <p><?php echo htmlspecialchars($txtMessage); ?></p> <!-- Message posté -->
            <?php
        }
    } else {
        echo "Aucun message trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des messages : " . $e->getMessage();
}
?>
