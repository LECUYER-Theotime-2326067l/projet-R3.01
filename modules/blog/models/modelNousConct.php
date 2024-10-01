<?php
class modelNousConct {
    private $db;

    public function __construct($connection) {
        $this->db = $connection;
    }

    public function sendContactForm($name, $email, $message) {
        // Préparer et exécuter la requête pour insérer le message dans la base de données
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        return $stmt->execute();
    }
}
