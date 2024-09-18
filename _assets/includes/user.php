<?php
    class User{
        //Prorpiétés
        private $conn;
        private $table = 'user'; // Nom de la table
        
        public $userID;
        public $userName;
        public $userEmail;
        public $userPassword;
        public $userGender;
        public $userGrade;

        //construtor avec connexion à la base de données
        public function __construct($db){
            $this->conn = $db;
        }

        //Fonction pour creer un nouvel utilisateur
        public function createNewUser(){
            $query = "INSERT INTO " . $this->table . "(userName, userEmail, userPassword, userGender, userGrade) 
            VALUES(:nameUser, :emailUser, :passwordUser,:genderUser, :GradeUser)";

            $stmt = $this->conn->prepare($query);

            //nettoyer les données
            $this->userName = htmlspecialchars(strip_tags($this->userName));
            $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
            $this->userGender = htmlspecialchars(strip_tags($this->userGender));
            $this->userGrade = htmlspecialchars(strip_tags($this->userGrade));

            //lier les paramètres
            $stmt->bindParam(':nameUser', $this->userName);
            $stmt->bindParam(':emailUser', $this->userEmail);
            $stmt->bindParam(':passwordUser', $this->userPassword);
            $stmt->bindParam(':genderUser', $this->userGender);
            $stmt->bindParam(':GradeUser', $this->userGrade);

            // exécuter la requête
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // suprimer un utilisateur
        public function deleteUser(){
            $query = "DELETE FROM " . $this->table . "WHERE userId = :idUser";

            $stmt = $this->conn->prepare($query);

            // nettoyer id
            $this->userId = htmlspecialchars(strip_tags($this->userId));

            // id a suprimer
            $stmt->bindParam(':idUser', $this->userID);

            // lancer la requête
            if($stmt->execute){
                return true;
            }
            return false;
        }
    }
php?>