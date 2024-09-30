<?php
class modelConviction{
    private $conn;

    public $convictionID;
    public $convictionCategory;

    public function __construct($db){
        $this->conn = $db;
    }
    
    public function addConviction(){
		$query = "INSERT INTO CONVICTION(convictionCategory)
				VALLUES(:convictionCategory);";
		$stmt = $this->conn->prepare($query);
		
        $this->convictionID = htmlspecialchars(strip_tags($this->convictionID));

		$stmt->bindParam(':convictionCategory', $this->convictionCategory);
        
        if ($stmt->execute())
            return true;
        return false;
	}
    public function deleteConviction(){
        $query = "DELETE FROM CONVICTION WHERE convictionID = :convictionID;";

        $stmt = $this->conn->prepare($query);

        $this->convictionID = htmlspecialchars(strip_tags($this->convictionID));

        $stmt->bindParam(':convictionID', $this->convictionID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>