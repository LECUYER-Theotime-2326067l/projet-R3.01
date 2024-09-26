<?php
 namespace modules\blog\controllers;

 class homepage {
    public function execute() {
        $fichierPhp = __DIR__ . '/../views/homepage.php';


        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
 }