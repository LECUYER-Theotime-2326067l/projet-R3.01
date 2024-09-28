<<<<<<< HEAD
<?php

 class repasController {
    public function execute() {
        $fichierPhp = constants::directoryViews() . 'repas.php';

        if (file_exists($fichierPhp)) {
            require_once $fichierPhp;
        } else {
            echo "Le fichier PHP n'a pas été trouvé.";
        }
    }
 }
=======
<?php 
require_once 'models/RepasModels';

class repasController{
    public function execute(){
        $repasModel = new RepasModel();
        $repas = $repasModel->getAllRepas();

        require_once 'view/repas.php';
    }
}

?>
>>>>>>> main
