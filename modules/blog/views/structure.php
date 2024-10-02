<?php

$css_file = "structure.css";
include constants::directoryViews() . '/header.php';
include constants::directoryCore() . '/database.php';

headerPage("Structure", $css_file);

$db = new database();
$connection = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clubName'])) {
    $clubName = trim($_POST['clubName']);
    
    if (!empty($clubName)) {
        $clubModel = new modelClub($connection);
        $clubModel->createClub($clubName);
    } else {
        echo "<p>Le nom du club ne peut pas être vide.</p>";
    }
}
?>
<body>
<?php
    if (isset($_SESSION['user'])) {
    ?>
    <h2>Créer un nouveau club</h2>
    <form method="POST" action="">
        <input type="text" id="clubName" name="clubName" placeholder="Entrez le nom du club" required>
        <button type="submit">Créer le club</button>
    </form>
    <?php
} else {
                    echo "<p>Veuillez vous connecter pour envoyer un message.</p>";
                }
            ?>

    <h2>Liste des utilisateurs</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Rôle</th>
                <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = new modelUser($connection);
            $userList = $users->read();

            foreach ($userList as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['userName']) . "</td>";
                echo "<td>" . htmlspecialchars($user['userRank']) . "</td>";
                echo "<td>" . htmlspecialchars($user['userGrades']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Liste des clubs</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Membre</th>
                <th scope="col">Nom du club</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clubs = new modelClub($connection);
            $clubList = $clubs->readAllClub();

            foreach ($clubList as $club) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($club['userName']) . "</td>";
                echo "<td>" . htmlspecialchars($club['clubName']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>
<?php include 'footer.php'; ?>
