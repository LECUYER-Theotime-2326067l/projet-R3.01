<?php
include constants::directoryModels() . '/modelNousConct.php';

class nousConctController {
    public function execute() {
        $isSent = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            $db = new database();
            $connection = $db->getConnection();
            $model = new modelNousConct($connection);
            $isSent = $model->sendContactForm($name, $email, $message);
        }

        $fichierPhp = constants::directoryViews() . '/nousConctView.php';
        
        if (file_exists($fichierPhp)) {
            include $fichierPhp;
        } else {
            echo "Le fichier de la vue n'a pas été trouvé.";
        }
    }
}
