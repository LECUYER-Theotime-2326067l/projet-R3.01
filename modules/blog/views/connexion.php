<?php
$css_file = "connexion.css";
include constants::directoryModels() . '/connexionModels.php';
include constants::directoryViews() . '/header.php';
headerPage("Connexion", $css_file);

if (isset($_SESSION['USER'])) {
    header('Location: index.php?action=homepage');
}
?>

<meta name="description" content="Cette page est la page pour se connecter a notre site">
<body>
<main>
    <form method="post"  id="connect" class="connect">
        <p>Connexion</p>

        <div class="mail">
            <label> Email : </label>
            <input type="email" placeholder="Email" name="email" class="inpo" required> <br>
        </div>
        <div class="mdp">
            <label> Mot de passe : </label>
            <input type="password" placeholder="Mot de passe" name="password" class="inpo" required> <br>
        </div>
        <input type="submit" class="but" value="Connexion">
        <p>Pas encore de compte ? <a href="inscription.php">Contactez-nous</a></p>
    </form>
</main>
</body>

<?php include 'footer.php'; ?>