<?php

$css_file = "repas.css";
include constants::directoryViews() . '/header.php';
headerPage("repas", $css_file);
?>
<meta name="description" content="Cette page liste les repas de l'ordre des tenrac">
<main>
<h1>
    Repas
</h1>
    <div class="box">
        Adresse : <br>
        Date : <br>
        Gérant : <br>
    </div>
    <div class="box">
        list2
    </div>
    <div class="box">
        list3
    </div>
</main>

<?php include 'footer.php'?>