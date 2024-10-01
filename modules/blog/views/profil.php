<?php
$css_file = "profil.css";
include constants::directoryViews() . '/header.php';
headerPage("Profil", $css_file);
?>
<meta name="description" content="Cette page est le profil utilisateur">
<main>
    <div class="prof">
    <h1>
        Votre profil :
    </h1>
    <h2>
        <?php echo $_SESSION['user']['username']; ?> <br>
        <?php echo $_SESSION['user']['userID']; ?>
    </h2>
    </div>
</main>
