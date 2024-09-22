<?php
 namespace modules\blog\controllers;

 class homepage {
    public function execute() {
        // Afficher un texte simple sur la page d'accueil
        echo "<h1>Bienvenue sur la page d'accueil de mon blog !</h1>";
        echo "<p>Ceci est un exemple simple d'une page d'accueil pour votre projet.</p>";
        echo "<p>Découvrez nos derniers articles et actualités en naviguant sur le blog.</p>";
    }
 }