<?php

$css_file = "ordre.css";
include __DIR__ . '/header.php';
headerPage("Ordre", $css_file);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <link rel="stylesheet" href="/path/to/your/error.css"> <!-- Lien vers le fichier CSS pour la page d'erreur -->
</head>
<body>
    <div class="error-container">
        <h1>Oups, une erreur est survenue !</h1>
        <p><?php echo htmlspecialchars($errorMessage); ?></p>
        <a href="index.php?action=homepage&id=1">Retour à la page d'accueil</a>
    </div>
</body>
</html>
<?php include 'footer.php'?>
