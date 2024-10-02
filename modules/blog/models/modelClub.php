<?php
class modelClub {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function createClub($clubName) {
        $query = "INSERT INTO CLUB (clubName) VALUES (:clubName)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':clubName', $clubName);
        if ($stmt->execute()) {
            echo "<p>Le club a été créé avec succès.</p>";
        } else {
            echo "<p>Erreur lors de la création du club.</p>";
        }
    }

    public function readAllClub() {
        $query = "SELECT userName, clubName FROM CLUB LEFT JOIN USER ON CLUB.userID = USER.userID";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>