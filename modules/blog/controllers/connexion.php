<?php
namespace modules\blog\controllers;
class connexion {
    public function execute() {
        $fichierPhp =  'blog/views/connexion.php';

        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
}