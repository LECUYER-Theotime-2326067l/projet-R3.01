<?php
$css_file = "profil.css";
include constants::directoryViews() . '/header.php';
headerPage("Profil", $css_file);
$isLoggedIn = isset($_SESSION['user']);
$userName = $isLoggedIn ? $_SESSION['user']['name'] : null;
$userID = $isLoggedIn ? $_SESSION['user']['ID'] : null;
?>
<meta name="description" content="Cette page est le profil utilisateur">
<main>
    <div class="prof">
    <h1>
        Votre profil :
    </h1>
    <h2>
        <?php echo htmlspecialchars($userName); ?> <br>
        <?php echo htmlspecialchars($userID); ?>
    </h2>
    </div>
</main>
