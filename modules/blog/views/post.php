<?php
$css_file = "post.css";
include constants::directoryViews() . '/header.php';
include constants::directoryModels() . '/post.php';
include constants::directoryModels() . '/modelImage.php';
headerPage("Post", $css_file);

$conn = new database();
$db = $conn->getConnection();
$mi = new modelImage($db);

// Appel de la méthode pour récupérer les images
$images = $mi->affImage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
    <link rel="stylesheet" type="text/css" href="<?php echo $css_file; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Chat</title>
</head>
<body>
    <main>
        <div>
            <form method="POST" action="">
                <textarea name="message" placeholder="Veuillez entrer un message..."></textarea>
                <br>
                <input type="submit" name="valider">
            </form>  
        </div>
    </main>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </form>

    <div>
        <?php if ($images): ?>
            <?php foreach ($images as $image): ?>
                <?php if (isset($image['imageData'], $image['imageName'])): ?>
                    <img src="data:<?= htmlspecialchars($image['imageData']) ?>" alt="<?= htmlspecialchars($image['imageName']) ?>">
                <?php else: ?>
                    <p>Image ou nom d'image manquant.</p>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune image trouvée.</p>
        <?php endif; ?>
    </div>

    <script>
        // Rafraîchit les messages toutes les 500ms
        setInterval(load_messages, 500);
        function load_messages() {
            $('#message').load('loadMessages.php');
        }
    </script>
</body>
</html>

<?php include constants::directoryModels() . '/loadMessages.php'; ?>
<?php include 'footer.php'; ?>
