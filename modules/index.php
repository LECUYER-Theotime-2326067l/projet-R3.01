<?php
require __DIR__ . '/../_assets/includes/autoloader.php';
require __DIR__ . '/../modules/blog/controllers/homepage.php';

try {
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] === 'homepage') {
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
                (new \modules\blog\controllers\homepage())->execute($_GET['id']);
            }
            throw new ControllerException('Aucun identifiant de billet envoyé');
        }
        if ($_GET['action'] === 'post'){
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
                (new \modules\blog\controllers\PostController())->execute($_GET['id']);
            } 
            throw new ControllerException('Aucun identifiant de billet envoyé');
        }
<<<<<<< Updated upstream
        throw new ControllerException('La page que vous recherchez n\'existe pas');
    }
    (new \modules\blog\controllers\homepage())->execute();
} catch (ControllerException $e) {
    (new \modules\blog\views\error($e->getMessage()))->show();
}
=======
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
        else {
            throw new Exception('La page que vous recherchez n\'existe pas');
        }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require constants::directoryViews() . 'error.php';  // Appel à la vue d'erreur avec le message
}
>>>>>>> Stashed changes
