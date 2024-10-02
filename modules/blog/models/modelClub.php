<?php
class modelClub{
    private $conn;

    public $clubID;
    public $userID;
    public $lieuID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addClub(){
		if($this->clubNameExist()){
			echo "nom de club existant";
			return false;
		}
		$query = "INSERT INTO CLUB (clubName, userID, lieuID) 
				  VALUES (:clubName, :userID, :lieuID);";
		$stmt = $this->conn->prepare($query);
		
        $this->clubName = htmlspecialchars(strip_tags($this->clubName));
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->lieuID = htmlspecialchars(strip_tags($this->lieuID));
          
		$stmt->bindParam(':clubName', $this->clubName);	
		$stmt->bindParam(':userID', $this->userID);	
		$stmt->bindParam(':lieuID', $this->lieuID);	

        if ($stmt->execute())
            return true;
        return false;
	}
	public function clubNameExist(){
		$query = "SELECT clubName FROM CLUB WHERE clubName = :clubName LIMIT 1;";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':clubName', $this->clubName);
		$stmt->execute();
		if($stmt->rowCount() > 0)
			return true;
		return false;
	}

    public function updateClub(){
        if (clubNameExist()){
            echo "nom de club existant";
            return false;
        }

        $query = "UPDATE CLUB 
                  SET clubName = :clubName,
                      userID = :userID,
                      lieuID = :lieuID;";
        $stmt = $this->conn->prepare($query);

        $this->clubName = htmlspecialchars(strip_tags($this->clubName));
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->lieuID = htmlspecialchars(strip_tags($this->lieuID));
          
		$stmt->bindParam(':clubName', $this->clubName);	
		$stmt->bindParam(':userID', $this->userID);	
		$stmt->bindParam(':lieuID', $this->lieuID);	

        if ($stmt->execute())
            return true;
        return false;
    }

    public function readAllClub(){
        $query = "SELECT CLUB.clubName, USER.userName FROM CLUB JOIN USER ON CLUB.userID = USER.userID";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($row)
            return $row;
        return null;
    }

    public function deleteClub(){
        $query = "DELETE FROM CLUB WHERE clubID = :clubID;";

        $stmt = $this->conn->prepare($query);

        $this->clubID = htmlspecialchars(strip_tags($this->clubID));

        $stmt->bindParam(':clubID', $this->clubID);

        if ($stmt->execute())
            return true;
        return false;
    }

    public function readAllClub(){
        $query = "SELECT CLUB.clubName, USER.userName FROM CLUB JOIN USER ON CLUB.userID = USER.userID";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

//        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        if($row)
//            return $row;
//        return null;
        return $stmt;
    }
}
?>