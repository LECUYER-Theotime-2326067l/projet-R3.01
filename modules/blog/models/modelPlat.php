<?php
class modelPlat{
    private $conn;

    public $platID;
    public $platName;
    public $ingredientID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addPlat(){
		$query = "INSERT INTO PLAT (platID, platName, ingredientID) 
				  VALUES (:platID, :platName, :ingredientID);";
		$stmt = $this->conn->prepare($query);
		
        $this->platID = htmlspecialchars(strip_tags($this->platID));
        $this->platName = htmlspecialchars(strip_tags($this->platName));
        $this->ingredientID = htmlspecialchars(strip_tags($this->ingredientID));

		$stmt->bindParam(':platID', $this->platID);	
		$stmt->bindParam(':platName', $this->platName);	
		$stmt->bindParam(':ingredientID', $this->ingredientID);	

        if($stmt->execute())
            return true;
        return false;
	}

    public function updatePlat(){
        $query = "UPDATE PLAT 
                  SET platID = :platID,
                      platName = :platName,
                      ingredientID = :ingredientID;";

        $stmt = $this->conn->prepare($query);

        $this->platID = htmlspecialchars(strip_tags($this->platID));
        $this->platName = htmlspecialchars(strip_tags($this->platName));
        $this->ingredientID = htmlspecialchars(strip_tags($this->ingredientID));

		$stmt->bindParam(':platID', $this->platID);	
		$stmt->bindParam(':platName', $this->platName);	
		$stmt->bindParam(':ingredientID', $this->ingredientID);	

        if($stmt->execute())
            return true;
        return false;
    }

    public function deletePlat(){
        $query = "DELETE FROM PLAT WHERE platID = :platID;";

        $stmt = $this->conn->prepare($query);

        $this->platID = htmlspecialchars(strip_tags($this->platID));

        $stmt->bindParam(':platID', $this->platID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>