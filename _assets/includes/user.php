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
            VALUES(:userName, :userEmail, :userPassword,:userGender, :userGrade)";

            $stmt = $this->conn->prepare($query);

            //nettoyer les données
            $this->userName = htmlspecialchars(strip_tags($this->userName));
            $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
            $this->userGender = htmlspecialchars(strip_tags($this->userGender));
            $this->userGrade = htmlspecialchars(strip_tags($this->userGrade));

            //lier les paramètres
            $stmt->bindParam(':userName', $this->userName);
            $stmt->bindParam(':userEmail', $this->userEmail);
            $stmt->bindParam(':userPassword', $this->userPassword);
            $stmt->bindParam(':userGender', $this->userGender);
            $stmt->bindParam(':userGrade', $this->userGrade);

            // exécuter la requête
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // fonction pour lire tous les utilisateurs
        public function read(){
            $query = "SELECT userID, userName, userEmail, userPassword, userGender, userGrade
                      FROM " . $this->table;
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        // fonction pour lire un utilisateur par ID
        public function readOneById(){
            $query = "SELECT userID, userName, userEmail, userPassword, userGender, userGrade
                      FROM " . $this->table . "WHERE userID = ? LIMIT 0,1";
            
            $stmt = $this->conn>prepare($query);
            $stmt->bindParam(1, $this->userID);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                //assigner les valeurs au propriété
                $this->userName = $row['userName'];
                $this->userEmail = $row['userEmail'];
                $this->userPassword = $row['userPassword'];
                $this->userGender = $row['userGender'];
                $this->userGrade = $row['userGrade'];
            }
        }

        public function updateUser(){
            $query = "UPDATE " . $thiss->table . "
                      SET userName = :userName,
                          userEmail = :userEmail
                          userPassword = :userPassword
                          userGender = :userGender
                          userGrade = :userGrade
                      WHERE userID = :userID";
            
            $stmt = $this->conn->prepare($query);

            //nettoyer les données
            $this->userName = htmlspecialchars(strip_tags($this->userName));
            $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
            $this->userGender = htmlspecialchars(strip_tags($this->userGender));
            $this->userGrade = htmlspecialchars(strip_tags($this->userGrade));
            $this->userID = htmlspecialchars(strip_tags($this->userID));

            //lier les parametres
            $stmt->bindParam(':userName', $this->userName);
            $stmt->bindParam(':userEmail', $this->userEmail);
            $stmt->bindParam(':userPassword', $this->userPassword);
            $stmt->bindParam(':userID', $this->userID);
            $stmt->bindParam(':userGender', $this->userGender);
            $stmt->bindParam(':userGrade', $this->userGrade);

            //executer la requete
            if ($stmt->execute()){
                return true;
            }
            return false;
        }

        // suprimer un utilisateur
        public function deleteUser(){
            $query = "DELETE FROM " . $this->table . "WHERE userID = :userID";

            $stmt = $this->conn->prepare($query);

            // nettoyer id
            $this->userID = htmlspecialchars(strip_tags($this->userID));

            // id a suprimer
            $stmt->bindParam(':userID', $this->userID);

            // lancer la requête
            if($stmt->execute){
                return true;
            }
            return false;
        }
    }
php?>