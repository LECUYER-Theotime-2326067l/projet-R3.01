<?php
$css_file = "connexion.css";
include __DIR__ . '/header.php';
headerPage("Connexion", $css_file);
?>
<meta name="description" content="Cette page est la page pour se connecter a notre site">

<form method="post" action="connexion.php" id="connect" class="connect">
    <div class="mail">
        <libellé>
            Email :
        </libellé>
        <input type="email" name="email" class="inpo" required> <br>
    </div>
    <div class="mdp">
        <libellé>
            Mot de Passe :
        </libellé>
        <input type="password" name="password" class="inpo" required> <br>
    </div>
<input type="submit" class="but" value="Connexion">
</form>

<?php include 'footer.php'?>
