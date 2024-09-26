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