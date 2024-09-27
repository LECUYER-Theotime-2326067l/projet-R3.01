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
    <link rel="stylesheet" type="text/css" href="blog/views/css/<?php echo $css_file; ?>">
    <link rel="icon" href="blog/views/css/logo.png">
    <title><?php echo $page_title; ?></title>
</head>
<body>
<header>
    <img src="blog/views/css/logo.png" class="logo" alt="logo">
    <a href="index.php?action=homepage&id=1" class="btn">Accueil</a>
    <a href="blog/views/Repas.php" class="btn">Repas</a>
    <a href="blog/views/ordre.php" class="btn">Structure</a>
    <a href="" class="btn">Plat</a>
    <a href="index.php?action=connexion&id=2" class="btn">

    +
    </a>
</header>
</body>

</html>
<?php
}
?>