<?php

$css_file = "post.css";
//include constants::directoryModels() . '/post.php';
include constants::directoryViews() . '/header.php';
include constants::directoryModels() . '/post.php';
include constants::directoryModels() . '/loadMessages.php';
headerPage("Post", $css_file);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
        <meta charset="utf-8">
        <meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
        <link rel="stylesheet" type="text/css" href="<?php echo $css_file; ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
        <main>
        <form method="POST" action="">
            <textarea name="message" placeholder="Veuillez rentrer un message..."></textarea>
            <br>
            <input type="submit" name="valider">
        </form>
        <section id="message"></section>

        <script>
            // sert a refresh la page toute les 500ms
            setInterval('load_messages()', 500);
            function load_messages(){
                $('#message').load('loadMessages.php');
            }
        </script>
        </main>
    </body>
</html>
<?php include 'footer.php'?>