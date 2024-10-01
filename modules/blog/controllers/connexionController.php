<?php
include constants::directoryCore().'/database.php';
class connexionController {
    public function execute() {
        $fichierPhp =  constants::directoryViews().'connexion.php';
        $db = new database();
        $connection = $db->getConnection();
        $user = new modelUser($connection);

        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
}