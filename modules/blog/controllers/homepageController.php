<?php

 class homepageController {
   
    public function execute() {
        $fichierPhp = constants::directoryViews() . 'homepage.php';

        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
 }