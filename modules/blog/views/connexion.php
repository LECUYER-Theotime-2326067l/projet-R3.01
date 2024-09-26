<?php

$css_file = "homepage.css";
include __DIR__ . '/header.php';
headerPage("Acceuil", $css_file);
?>
<body>
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
</body>
<?php include 'footer.php'?>
