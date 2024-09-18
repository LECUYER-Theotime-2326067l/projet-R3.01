<?php

// Logique pour mettre à jour un commentaire
function update($id) {
    // Ici, on peut ajouter la logique pour traiter la mise à jour d'un commentaire avec $id
    echo "Mise à jour du commentaire avec l'ID : " . $id;
}

// Appeler la fonction directement si ce fichier est inclus via le routeur
update(isset($params[0]) ? $params[0] : null);