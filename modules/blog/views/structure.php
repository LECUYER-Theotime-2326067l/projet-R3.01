<?php

$css_file = "structure.css";
include constants::directoryViews() . '/header.php';
include constants::directoryCore() . '/database.php';

headerPage("Structure", $css_file);

$db = new database();
$connection = $db->getConnection();
?>
<main>
    <table>
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Role</th>
                <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = new modelUser($connection);

            $userList = $users->read();

            foreach ($userList as $user) {
                echo "<tr>";
                echo "<td>" . $user['userName'] . "</td>";
                echo "<td>" . $user['userRank'] . "</td>";
                echo "<td>" . $user['userGrades'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
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
            echo "<td>" . $club['userName'] . "</td>";
            echo "<td>" . $club['clubName'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</main>

<?php include 'footer.php'?>

