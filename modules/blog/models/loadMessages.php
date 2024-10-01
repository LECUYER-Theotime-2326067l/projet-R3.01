<?php
INCLUDE_ONCE constants::directoryCore().'tableMess.php';
include constants::directoryViews() . '/post.php';
$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
$db = "lecuyer-theotime-2326067l_tenrac";
$user = "343207";
$pass = "tenraczebi";

// Connexion à la base de données
$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
$tm = new tableMess($connection);

$messages = $tm->readMessageAll();
if ($messages) {
    foreach ($messages as $row) {
        extract($row);
        ?>
        <div class="message">
        <h4><?php echo htmlspecialchars($userName); ?></h4>
        <p><?php echo nl2br(htmlspecialchars($txtMessage)); ?></p>
        </div>
        <?php
    }
} else {
    echo "Aucun message trouvé.";
}
?>
