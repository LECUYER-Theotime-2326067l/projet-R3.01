<?php
session_start();
function headerPage($page_title = "Titre par Défaut", $css_file = "Titre par défaut")
{
?>
    <!DOCTYPE HTMl>
    <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/<?php echo $css_file; ?>">

    <title><?php echo $page_title; ?></title>
</head>
<body>
<header>
<<<<<<< Updated upstream
    <a href="" class="btn">acceuil</a>
    <a href="" class="btn">repas</a>
    <a href="" class="btn">structure</a>
    <a href="" class="btn">plat</a>
    <button class="btn">
        +
    </button>
=======
    <img src="blog/views/css/logo.png" class="logo" alt="logo">
    <a href="index.php?action=homepage" class="btn">Accueil</a>
    <?php if(isset($_SESSION['USER'])):?>
        <a href="index.php?action=repas&id=1" class="btn">Repas</a>
        <a href="index.php?action=ordre&id=2" class="btn">Structure</a>
        <a href="index.php?action=post&id=3" class="btn">Post</a>
    <?php endif; ?>
    <a href="index.php?action=connexion&id=4" class="btn">
    +
    </a>
>>>>>>> Stashed changes
</header>
</body>

</html>
<?php
}
?>