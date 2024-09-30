<<<<<<< Updated upstream
=======
<?php

$css_file = "post.css";
include constants::directoryViews() . '/header.php';
headerPage("Post", $css_file);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
	<meta charset="utf-8">
    <meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<main>
<h1>
    Les Posts du jour !
</h1>
    <div class="box">
        Personne1 : <br>
        Image : <br>
        etc : <br>
    </div>
    <div class="box">
        list2
    </div>
    <div class="box">
        list3
    </div>
    <script>
		// sert à refresh la page toute les 500ms
		setInterval('load_message()', 500);
		function load_message(){
		    $('#message').load('loadMessage.php');
		}
	</script>
</main>
<?php include 'footer.php'?>

</html>


<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<meta charset="utf-8">
        <meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
	</head>
	<main>
		<form method="POST" action="">
			<input type="text" name ="pseudo" placeholder="Rentre un id !">
			<br>
			<textarea name="message" placeholder="Rentre mnt un txtMessage !"></textarea>
			<br>
			<input type="submit" name="valider">
		</form>
		<section id="message"></section>
		
		<script>
			// sert à refresh la page toute les 500ms
			setInterval('load_message()', 500);
			function load_message(){
				$('#message').load('loadMessage.php');
			}
		</script>
		
        </main>
</html>
>>>>>>> Stashed changes
