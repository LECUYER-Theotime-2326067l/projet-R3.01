<?php
include_once constants::directoryCore().'database.php';

$db = new database();
$connection = getConnection();

if (isset($_FILES['image'])) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
    $max_size = 5 * 1024 * 1024; // 5 MB

    // Vérifier le type MIME avec FileInfo
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
    finfo_close($finfo);

    if (!in_array($file_mime, $allowed_types)) {
        echo "Le fichier n'est pas un type d'image valide.";
        exit;
    }

    // Vérifier l'extension du fichier
    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_exts)) {
        echo "Seules les extensions JPG, JPEG, PNG et GIF sont autorisées.";
        exit;
    }

    // Vérifier la taille du fichier
    if ($_FILES['image']['size'] > $max_size) {
        echo "Le fichier est trop volumineux.";
        exit;
    }

    // Vérifier si c'est bien une image avec getimagesize()
    $image_info = getimagesize($_FILES['image']['tmp_name']);
    if ($image_info === false) {
        echo "Le fichier n'est pas une image valide.";
        exit;
    }

    // Renommer le fichier pour éviter les conflits
    $target_dir = "uploads/";
    $new_filename = uniqid() . "." . $file_ext;
    $target_file = $target_dir . $new_filename;

    // Déplacer le fichier vers le répertoire de destination
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo "L'image a été téléchargée avec succès.";
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>