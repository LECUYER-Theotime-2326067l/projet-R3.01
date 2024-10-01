<?php
$css_file = "contact.css";
include constants::directoryViews() . '/header.php';
headerPage("Contactez-nous", $css_file);
?>

<meta name="description" content="Cette page est pour contacter notre équipe.">
<body>
<main>
    <form method="post" id="contact-form" class="contact-form">
        <h2>Nous Contacter</h2>

        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <input type="submit" value="Envoyer">
    </form>

    <?php if ($isSent): ?>
        <p>Votre message a été envoyé avec succès !</p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>Erreur lors de l'envoi de votre message. Veuillez réessayer.</p>
    <?php endif; ?>
</main>
</body>

<?php include constants::directoryViews() . '/footer.php'; ?>
