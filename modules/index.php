<?php

require '_assets/includes/autoloader';

try {
    if (filter_input(INPUT_GET, 'action')) { // Vérifie si une action a été transmise via l'URL en utilisant la méthode GET
        if ($_GET['action'] === 'post') {  // Si l'action est 'post', l'application doit afficher un article de blog spécifique
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {   // Vérifie si un identifiant 'id' a été passé via l'URL et si cet identifiant est supérieur à 0
                (new \modules\blog\controllers\post())->execute($_GET['id']); // Si un ID valide est fourni, on appelle le contrôleur 'post' et on exécute l'action avec l'ID
            }
            throw new ControllerException('Aucun identifiant de billet envoyé'); // Si l'ID n'est pas fourni ou invalide, on lève une exception pour indiquer qu'aucun billet n'a été envoyé
        }
        throw new ControllerException('La page que vous recherchez n\'existe pas'); // Si l'action transmise via l'URL n'est pas reconnue (autre que 'post'), on lève une exception pour indiquer
        // que la page n'existe pas
    }
    (new \modules\blog\controllers\homepage())->execute(); // Si aucune action n'est spécifiée dans l'URL, exécute la page d'accueil du blog
} catch (ControllerException $e) {
    (new \modules\blog\views\error($e->getMessage()))->show(); // Si une exception de type 'ControllerException' est attrapée, on affiche une page d'erreur avec le message correspondant
}