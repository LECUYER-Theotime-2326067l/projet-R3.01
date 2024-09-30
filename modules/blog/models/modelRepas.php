<?php
class modelRepas{
    private $conn;

    public $repasID;
    public $repasName;
    public $platID;
    public $userID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addRepas(){
		$query = "INSERT INTO REPAS (repasName, platID, userID) 
				  VALUES (:repasName, :platID, :userID);";
		$stmt = $this->conn->prepare($query);
		
        $this->repasName = htmlspecialchars(strip_tags($this->repasName));
        $this->platID = htmlspecialchars(strip_tags($this->platID));
        $this->userID = htmlspecialchars(strip_tags($this->userID));      

		$stmt->bindParam(':repasName', $this->repasName);	
		$stmt->bindParam(':platID', $this->platID);	
		$stmt->bindParam(':userID', $this->userID);	

        if($stmt->execute())
            return true;
        return false;
	}

    public function updateRepas(){
        $query = "UPDATE REPAS 
                  SET repasName = :repasName,
                      platID = :platID,
                      userID = :userID;";
        $stmt = $this->conn->prepare($query);

        $this->repasName = htmlspecialchars(strip_tags($this->repasName));
        $this->platID = htmlspecialchars(strip_tags($this->platID));
        $this->userID = htmlspecialchars(strip_tags($this->userID));      

		$stmt->bindParam(':repasName', $this->repasName);	
		$stmt->bindParam(':platID', $this->platID);	
		$stmt->bindParam(':userID', $this->userID);	

        if($stmt->execute())
            return true;
        return false;
    }

    public function deleteRepas(){
        $query = "DELETE FROM REPAS WHERE repasID = :repasID;";

        $stmt = $this->conn->prepare($query);

        $this->repasID = htmlspecialchars(strip_tags($this->repasID));

        $stmt->bindParam(':repasID', $this->repasID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>