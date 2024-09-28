<?php

 class postController {
    public function execute() {
        $fichierPhp = constants::directoryViews() . 'post.php';

        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
 }