<?php
INCLUDE_ONCE constants::directoryCore().'tableMess.php';

$css_file = "post.css";

$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
$db = "lecuyer-theotime-2326067l_tenrac";
$user = "343207";
$pass = "tenraczebi";

// Connexion à la base de données
$connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
$tm = new tableMess($connection);

$messages = $tm->readMessageAll();
if ($messages) {
    $messages = array_reverse($messages);
    foreach ($messages as $row) {
        extract($row);
        ?>
        <head>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_file; ?>">
        </head>
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