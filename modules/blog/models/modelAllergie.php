<?php
class modelAllergie{
    private $conn;

    public $allergieID;
    public $allergieCategory;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addAllergie(){
		$query = "INSERT INTO ALLERGIE (allergieCategory) 
				  VALUES (:allergieCategory);";
		 $stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(':allergieCategory', $this->allergieCategory);

        if($stmt->execute())
            return true;
        return false;
	}
    
    public function deleteAllergie(){
        $query = "DELETE FROM ALLERGIE WHERE allergieID = :allergieID;";

        $stmt = $this->conn->prepare($query);

        $this->allergieID = htmlspecialchars(strip_tags($this->allergieID));

        $stmt->bindParam(':allergieID', $this->allergieID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>