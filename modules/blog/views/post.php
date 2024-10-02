<?php

$css_file = "post.css";
include constants::directoryViews() . '/header.php';
include constants::directoryModels() . '/post.php';
headerPage("Post", $css_file);

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
        <main style="margin-top: 100px; display: flex; flex-direction: column; align-items: center;">
            <div style="width: 100%; max-width: 800px;">
                <form method="POST" action="">
                    <textarea name="message" placeholder="Veuillez entrer un message..." style="width: 100%;"></textarea>
                    <br>
                    <input type="submit" name="valider" style="width: 100px; padding: 10px;">
                </form>
            </div>
        </main>
         
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

