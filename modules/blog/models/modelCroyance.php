<?php
class modelCroyance{
    private $conn;

    public $croyanceID;
    public $croyanceCategory;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addCroyance(){
		$query = "INSERT INTO CROYANCE (croyanceCategory) 
				  VALUES (:croyanceCategory);";
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(':croyanceCategory', $this->croyanceCategory);
        
        if ($stmt->execute())
            return true;
        return false;
	}
    
    public function deleteCroyance(){
        $query = "DELETE FROM CROYANCE WHERE croyanceID = :croyanceID;";

        $stmt = $this->conn->prepare($query);

        $this->croyanceID = htmlspecialchars(strip_tags($this->croyanceID));

        $stmt->bindParam(':croyanceID', $this->croyanceID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>