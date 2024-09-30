<?php
$css_file = "connexion.css";
include constants::directoryViews() . '/header.php';
headerPage("Connexion", $css_file);
?>
<?php
$serveur = "mysql-lecuyer-theotime-2326067l.alwaysdata.net";
$db = "lecuyer-theotime-2326067l_tenrac";
$user = "343207";
$pass = "tenraczebi";
$message = '';

try{
    $connection = new PDO("mysql:host=".$serveur.";dbname=".$db."", $user, $pass);
} catch(PDOException $e){
    echo "Erreur de connexion : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!empty($email) && !empty($password)) {

        // Préparation de la requête avec des paramètres
        $requete = $connection->prepare("SELECT * FROM USER WHERE userEmail = :email");
        $requete->bindParam(':email', $email);
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['userPassword'])) {
            header('Location: homepage.php');
            exit();
        } else {
            $message = "Email ou mot de passe incorrect !";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}
?>


<meta name="description" content="Cette page est la page pour se connecter a notre site">
<body>
<main>
    <form method="post"  id="connect" class="connect">
        <p>Connexion</p>

        <div class="mail">
            <label> Email : </label>
            <input type="email" placeholder="Email" name="email" class="inpo" required> <br>
        </div>
        <div class="mdp">
            <label> Mot de passe : </label>
            <input type="password" placeholder="Mot de passe" name="password" class="inpo" required> <br>
        </div>
        <?php
        if ($message) {
            echo "<p>$message</p>";
        }
        ?>
        <input type="submit" class="but" value="Connexion">
        <p>Pas encore de compte ? <a href="inscription.php">Contactez-nous</a></p>
    </form>
</main>
</body>

<?php include 'footer.php'; ?>