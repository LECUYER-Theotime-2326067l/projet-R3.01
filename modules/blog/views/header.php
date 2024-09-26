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
    <a href="homepage.php" class="btn">acceuil</a>
    <a href="Repas.php" class="btn">repas</a>
    <a href="ordre.php" class="btn">structure</a>
    <a href="" class="btn">plat</a>
    <button class="btn">
        +
    </button>
</header>
</body>

</html>
<?php
}
?>