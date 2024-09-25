<?php
class user{
    //Prorpiétés
    private $conn;
    private $table = 'USER'; // Nom de la table
    
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

    //creer la table user
    public function createTableUser(){
        $query = "CREATE TABLE IF NOT EXISTS USER (userID INT AUTO_INCREMENT PRIMARY KEY, 
                                                   userName VARCHAR(20),
                                                   userEmail VARCHAR(40),
                                                   userPassword VARCHAR(40),
                                                      userGender VARCHAR(10),
                                                      userGrade VARCHAR(20)
                                                     );";									 
        $stmt = $this->conn->prepare($query);
        
        if ($stmt->execute()){
            return true;
        }
        return false;
    }
    
    //modif la table user
    public function updateTableUser(){
        $query = "ALTER TABLE " . $this->table . " MODIFY userID INT(8) AUTO_INCREMENT;";
        
        $stmt = $this->conn->prepare($query);
        
        if ($stmt->execute()){
            return true;
        }
        return false;
    }
    
    //delete la table user
    public function deleteTableUser(){
        $query = "DROP TABLE " . $this->table;
        
        $stmt = $this->conn->prepare($query);
        
        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    //Fonction pour creer un nouvel utilisateur
    public function createNewUser(){
        if($this->emailExist()){
            echo "cette email existe deja";
            return false;
        }
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
                  FROM " . $this->table . " WHERE userID = ? LIMIT 0,1";
        
        $stmt = $this->conn>prepare($query);
        $stmt->bindParam(1, $this->userID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            return $row;
        }
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