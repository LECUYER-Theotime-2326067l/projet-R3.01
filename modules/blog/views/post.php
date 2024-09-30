<?php

$css_file = "post.css";
include constants::directoryViews() . '/header.php';
headerPage("Post", $css_file);
?>
<meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
<main>
<h1>
    Les Post du jour !
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
</main>

<?php include 'footer.php'?>