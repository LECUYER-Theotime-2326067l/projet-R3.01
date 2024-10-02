<?php
class modelUser{
    private $conn;
        public $table = 'USER';
       
        public $tableName; 
        public $userID;
        public $userName;
        public $userEmail;
        public $userPassword;
        public $userGender;
        public $userGrades;
        public $userRank;
        public $userTitre;
        public $userDignite;

        public function __construct($db){
            $this->conn = $db;
        }

        //fonction pour creer un nouvel utilisateur
        public function createNewUser(){
			if($this->emailExist()){
				echo "cette email existe deja";
				return false;
			}
            $query = "INSERT INTO " . $this->table . "(userName, userEmail, userPassword, userGender, userGrades, userRank, userTitre, userDignite) 
            VALUES(:userName, :userEmail, :userPassword,:userGender, :userGrades, :userRank, :userTitre, :userDignite)";

            $stmt = $this->conn->prepare($query);

            //nettoyer les données
            $this->userName = htmlspecialchars(strip_tags($this->userName));
            $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
            $this->userGender = htmlspecialchars(strip_tags($this->userGender));
            $this->userGrades = htmlspecialchars(strip_tags($this->userGrades));
            $this->userRank = htmlspecialchars(strip_tags($this->userRank));
            $this->userTitre = htmlspecialchars(strip_tags($this->userTitre));
            $this->userDignite = htmlspecialchars(strip_tags($this->userDignite));

			$userPasswordHash = password_hash($this->userPassword, PASSWORD_DEFAULT);
			
            //lier les paramètres
            $stmt->bindParam(':userName', $this->userName);
            $stmt->bindParam(':userEmail', $this->userEmail);
            $stmt->bindParam(':userPassword', $userPasswordHash);
            $stmt->bindParam(':userGender', $this->userGender);
            $stmt->bindParam(':userGrades', $this->userGrades);
            $stmt->bindParam(':userRank', $this->userRank);
            $stmt->bindParam(':userTitre', $this->userTitre);
            $stmt->bindParam(':userDignite', $this->userDignite);

            // exécuter la requête
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // fonction pour lire tous les utilisateurs
        public function read(){
            $query = "SELECT userID, userName, userEmail, userPassword, userGender, userGrades, userRank, userTitre, userDignite, userCreationDate
                      FROM " . $this->table;
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        // fonction pour lire un utilisateur par ID
        public function readOneById(){
            $query = "SELECT userID, userName, userEmail, userPassword, userGender, userGrades, userRank, userTitre, userDignite, userCreationDate
                      FROM " . $this->table . " WHERE userID = ?;";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->userID);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                return $row;
            }
            return null;
        }

        public function getUserName(){
            $query = "SELECT userName FROM USER WHERE userEmail = :userEmail;";

            $stmt = $this->conn->prepare($query);

            if ($stmt->execute())
                return $stmt;
            return null;
        }

        public function updateUser(){
			if($this->emailExist()){
				echo "cette email existe deja";
				return false;
			}
            $query = "UPDATE " . $this->table . "
                      SET userName = :userName,
                          userEmail = :userEmail,
                          userPassword = :userPassword,
                          userGender = :userGender,
                          userGrades = :userGrades,
                          userRank = :userRank,
                          userDignite = :userDignite
                      WHERE userID = :userID;";
            
            $stmt = $this->conn->prepare($query);

            //nettoyer les données
            $this->userName = htmlspecialchars(strip_tags($this->userName));
            $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
            $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
            $this->userGender = htmlspecialchars(strip_tags($this->userGender));
            $this->userGrades = htmlspecialchars(strip_tags($this->userGrades));
            $this->userID = htmlspecialchars(strip_tags($this->userID));
            $this->userRank = htmlspecialchars(strip_tags($this->userRank));
            $this->userTitre = htmlspecialchars(strip_tags($this->userTitre));
            $this->userDignite = htmlspecialchars(strip_tags($this->userDignite));

            $userPasswordHash = password_hash($this->userPassword, PASSWORD_DEFAULT);

            //lier les parametres
            $stmt->bindParam(':userName', $this->userName);
            $stmt->bindParam(':userEmail', $this->userEmail);
            $stmt->bindParam(':userPassword', $this->userPasswordHash);
            $stmt->bindParam(':userID', $this->userID);
            $stmt->bindParam(':userGender', $this->userGender);
            $stmt->bindParam(':userGrades', $this->userGrades);
            $stmt->bindParam(':userRank', $this->userRank);
            $stmt->bindParam(':userTitre', $this->userTitre);
            $stmt->bindParam(':userDignite', $this->userDignite);


            //executer la requete
            if ($stmt->execute()){
                return true;
            }
            return false;
        }

        // suprimer un utilisateur
        public function deleteUser(){
            $query = "DELETE FROM " . $this->table . " WHERE userID = :userID";

            $stmt = $this->conn->prepare($query);

            // nettoyer id
            $this->userID = htmlspecialchars(strip_tags($this->userID));

            // id a suprimer
            $stmt->bindParam(':userID', $this->userID);

            // lancer la requête
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
        public function emailExist(){
			$query = "SELECT userID FROM " . $this->table . " WHERE userEmail = :userEmail LIMIT 1";
    
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':userEmail', $this->userEmail);
			$stmt->execute();
			
			if($stmt->rowCount() > 0){
				return true;
			}
			return false;
		}
}
?>