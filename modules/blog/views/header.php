<?php
function headerPage($page_title = "Titre par Défaut", $css_file = "Titre par défaut")
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $isLoggedIn = isset($_SESSION['user']);
    $userEmail = $isLoggedIn ? $_SESSION['user']['email'] : null;
    $userName = $isLoggedIn ? $_SESSION['user']['name'] : null; // Assurez-vous d'obtenir le nom
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="blog/views/css/<?php echo $css_file; ?>">
    <link rel="icon" href="blog/views/css/logo.png">
    <title><?php echo $page_title; ?></title>
</head>
<body>
<header>
    <img src="blog/views/css/logo.png" class="logo" alt="logo">
    <a href="index.php?action=homepage" class="btn">Accueil</a>
    <a href="index.php?action=repas&id=1" class="btn">Repas</a>
    <a href="index.php?action=structure&id=2" class="btn">Structure</a>
    <a href="index.php?action=post&id=3" class="btn">Post</a>
    
    <?php if ($isLoggedIn): ?>
        <a href="index.php?action=profil" class="btn"><?php echo htmlspecialchars($userName); ?></a> <!-- Utiliser le nom de l'utilisateur -->
        <a href="index.php?action=logout" class="btn">Déconnexion</a>
    <?php else: ?>
        <a href="index.php?action=connexion&id=4" class="btn">Connexion</a>
    <?php endif; ?>
</header>
</body>
</html>
<?php
}
