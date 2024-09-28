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