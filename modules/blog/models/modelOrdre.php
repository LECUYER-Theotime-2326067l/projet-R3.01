<?php
class modelOrdre{
    private $conn;
    
    public $ordreID = 1;
    public $clubID;
    public $userID;
    public $lieuID;
    public $repasID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addOnOrdre(){
		$query = "INSERT INTO ORDRE (ordreID, clubID, userID, lieuID, repasID) 
				  VALUES (:ordreID, :clubID, :userID, :lieuID, :repasID);";
		 $stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(':ordreID', $this->ordreID);	
		$stmt->bindParam(':clubID', $this->clubID);	
		$stmt->bindParam(':userID', $this->userID);	
		$stmt->bindParam(':lieuID', $this->lieuID);	
		$stmt->bindParam(':repasID', $this->repasID);	

        if($stmt->execute())
            return true;
        return false;
	}
	
    public function updateOrdre(){
        $query = "UPDATE ORDRE 
                  SET ordreID = :ordreID,
                      clubID = :clubID,
                      userID = :userID,
                      lieuID = :lieuID,
                      repasID = :repasID;";
        $stmt = $this->conn->prepare($query);
		
        $stmt->bindParam(':ordreID', $this->ordreID);	
        $stmt->bindParam(':clubID', $this->clubID);	
        $stmt->bindParam(':userID', $this->userID);	
        $stmt->bindParam(':lieuID', $this->lieuID);	
        $stmt->bindParam(':repasID', $this->repasID);	
 
        if($stmt->execute())
             return true;
        return false;
    }

    public function deleteOrdre(){
        $query = "DELETE FROM ORDRE WHERE ordreID = :ordreID;";

        $stmt = $this->conn->prepare($query);

        $this->ordreID = htmlspecialchars(strip_tags($this->ordreID));

        $stmt->bindParam(':ordreID', $this->ordreID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>