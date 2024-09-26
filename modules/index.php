<?php
require __DIR__ . '/../_assets/includes/autoloader.php';

try {
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] === 'homepage') {
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
                (new homepage())->execute($_GET['id']);
            }
            throw new ControllerException('Aucun identifiant de billet envoyé');
        }
        if ($_GET['action'] === 'post'){
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0) {
                (new \modules\blog\controllers\post())->execute($_GET['id']);
            } 
            throw new ControllerException('Aucun identifiant de billet envoyé');
        }
        if ($_GET['action'] === ''){
            if (filter_input(INPUT_GET, 'id') && $_GET['id'] > 0){
                //(new \modules\blog\controllers\);
            }
        }
        throw new ControllerException('La page que vous recherchez n\'existe pas');
    }
    (new homepageController())->execute();
} catch (ControllerException $e) {
    (new \modules\blog\views\error($e->getMessage()))->show();
}