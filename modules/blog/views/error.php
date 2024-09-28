<<<<<<< HEAD
<?php

$css_file = "error.css";
include __DIR__ . '/header.php';
headerPage("Erreur", $css_file);
?>
<main>
<body>
    <div class="error-container">
        <h1>Oups, nos poulets se sont échappés ! </h1>
        <p><?php echo htmlspecialchars($errorMessage); ?></p>
        <a href="index.php?action=homepage&id=1" class="btn">Retour à la page d'accueil</a>
    </div>
</body>
</main>
<?php include 'footer.php'?>
=======
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #e74c3c;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Une erreur est survenue</h1>
        <p><?= htmlspecialchars($errorMessage) ?></p>
        <p><a href="/index.php">Retour à la page d'accueil</a></p>
    </div>
</body>
</html>
>>>>>>> main
