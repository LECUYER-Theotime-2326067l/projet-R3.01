<?php
require __DIR__ . '/../_assets/includes/autoloader.php';

try {
    $action = filter_input(INPUT_GET, 'action') ?? 'homepage';  // Par défaut, action est 'homepage'

    if ($action === 'homepage') {
        (new homepageController())->execute();
    }
    elseif ($action === 'post') {
        if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
            (new postController())->execute($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($action === 'connexion') {
        if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
            (new connexionController())->execute($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($action === 'structure') {
        if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
            (new structureController())->execute($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($action === 'repas') {
        if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
            (new repasController())->execute($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } 
    elseif ($action === 'mdp_oublier'){
        if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0){
            (new oubliermdpController())->execute($_GET['id']);
        } else{
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($action === 'nousContacter'){
        if (filter_input(INPUT_GET,'id')&& $_GET['id']>0){
            (new nousConctController())->execute($_GET['id']);
        }else{
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    elseif ($action === 'logout'){
        (new logoutController())->execute();
    }
    else {
        throw new Exception('La page que vous recherchez n\'existe pas');
    }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require constants::directoryViews() . 'error.php';  // Appel à la vue d'erreur avec le message
}
