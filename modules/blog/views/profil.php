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
        <?php echo htmlspecialchars($_SESSION['user']['userName']); ?> <br>
        <?php echo htmlspecialchars($_SESSION['user']['userID']); ?>
    </h2>
    </div>
</main>
