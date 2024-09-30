<?php
class logoutController {
    public function execute() {
        session_start(); // Démarrer la session

        // Vérifier si une session existe
        if (isset($_SESSION['user'])) {
            session_unset(); // Supprimer toutes les variables de session
            session_destroy(); // Détruire la session
        }

        // Rediriger vers la page de connexion ou d'accueil
        header('Location: index.php?action=homepage');
        exit();
    }
}
