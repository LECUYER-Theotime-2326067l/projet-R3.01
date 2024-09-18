<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title> Formulaire </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link rel="stylesheet" href="../../../_assets/styles/connexionform.css">
</head>

<body>
  <div class="contoure">
    <form action="">
      <h1 aria-label="Formulaire">Connexion</h1>
      <div class="cartouche">
        <input type="texte" aria-label="Identifiant" placeholder="Identifiant" required>
      </div>
      <div class="cartouche">
        <input type="password" aria-label="Password" placeholder="Mot de passe" required>
      </div>
      <div class="cartouche">
        <input type="reset" value="Effacer" aria-label="effacer">
      </div>
      <div class="cartouche">
        <button aria-label="bouton"><input type="button" value="Envoyer" aria-label="Envoyer"></button>
      </div>
    </form>
  </div>
</body>

</html>