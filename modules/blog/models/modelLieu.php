<?php
class modelLieu{
    private $conn;

    public $lieuID;
    public $lieuAdress;
    public $repasID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addLieu(){
		$query = "INSERT INTO LIEU (lieuAdress, repasID)
				  VALUES (:lieuAdress, :repasID);";
		$stmt = $this->conn->prepare($query);
		
        $this->lieuAdress = htmlspecialchars(strip_tags($this->lieuAdress));
        $this->repasID = htmlspecialchars(strip_tags($this->repasID));

		$stmt->bindParam(':lieuAdress', $this->lieuAdress);	
		$stmt->bindParam(':repasID', $this->repasID);	

        if($stmt->execute())
            return true;
        return false;
	}

    public function updateLieu(){
        $query = "UPDATE LIEU 
                  SET lieuAdress = :lieuAdress,
                      repasID = :repasID;";
        $stmt = $this->conn->prepare($query);

        $this->lieuAdress = htmlspecialchars(strip_tags($this->lieuAdress));
        $this->repasID = htmlspecialchars(strip_tags($this->repasID));

		$stmt->bindParam(':lieuAdress', $this->lieuAdress);	
		$stmt->bindParam(':repasID', $this->repasID);	

        if($stmt->execute())
            return true;
        return false;
    }

    public function deleteLieu(){
        $query = "DELETE FROM LIEU WHERE lieuID = :lieuID;";

        $stmt = $this->conn->prepare($query);

        $this->lieuID = htmlspecialchars(strip_tags($this->lieuID));

        $stmt->bindParam(':lieuID', $this->lieuID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>