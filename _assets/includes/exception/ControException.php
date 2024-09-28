<?php
// exceptions/ControllerException.php

// La classe ControllerException hérite de la classe Exception native de PHP
class ControException extends Exception
{
    // Vous pouvez personnaliser le constructeur si besoin
    public function __construct($message = "", $code = 0, Exception $previous = null) {
        // Appel au constructeur parent pour initialiser l'exception
        parent::__construct($message, $code, $previous);
    }

    // Méthode personnalisée pour afficher les erreurs sous une forme spécifique
    public function errorMessage() {
        // Le message d'erreur personnalisé
        return "Erreur dans le contrôleur: " . $this->getMessage();
    }
}
