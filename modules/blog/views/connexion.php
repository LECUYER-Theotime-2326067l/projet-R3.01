<?php
$css_file = "connexion.css";
include constants::directoryViews() . '/header.php';
headerPage("Connexion", $css_file);

// Inclure le modèle pour traiter le formulaire
include constants::directoryModels() . '/connexionModels.php';
?>

<meta name="description" content="Cette page est la page pour se connecter à notre site">
<body>
<main>
    <form method="post" id="connect" class="connect">
        <p>Connexion</p>

        <div class="mail">
            <label>Email :</label>
            <input type="email" placeholder="Email" name="email" class="inpo" required><br>
        </div>
        <div class="mdp">
            <label>Mot de passe :</label>
            <input type="password" placeholder="Mot de passe" name="password" class="inpo" required><br>
        </div>
        <input type="submit" class="but" value="Connexion">
        <p>Pas encore de compte ? <a href="index.php?action=nousContacter&id=5">Contactez-nous</a></p>

        <?php if (isset($message)): ?>
            <p class="error-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
    </form>
</main>
</body>

<?php include 'footer.php'; ?>
