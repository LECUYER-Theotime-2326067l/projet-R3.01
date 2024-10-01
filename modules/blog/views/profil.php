<?php
$css_file = "profil.css";
include constants::directoryViews() . '/header.php';
headerPage("Profil", $css_file);
$isLoggedIn = isset($_SESSION['user']);
$userName = $isLoggedIn ? $_SESSION['user']['name'] : null;
$userID = $isLoggedIn ? $_SESSION['user']['id'] : null;
$userEmail = $isLoggedIn ? $_SESSION['user']['email'] : null;
?>
<meta name="description" content="Cette page est le profil utilisateur">
<main>
    <div class="prof">
    <h1>
        Votre profil :
    </h1>
    <h2>
        Nom : <?php echo htmlspecialchars($userName); ?> <br>
        Email : <?php echo htmlspecialchars($userEmail); ?>
        <?php echo htmlspecialchars($userID); ?>
    </h2>
    </div>
</main>
