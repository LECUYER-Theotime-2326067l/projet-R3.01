<?php
class modelIngredient{
    private $conn;

    public $ingredientID;
    public $ingredientName;
    public $alimentQuantity;
    public $alimentPoids;
    public $allergieID;
    public $croyanceID;
    public $convictionID;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addIngredient(){
		$query = "INSERT INTO INGREDIENT (ingredientName, alimentQuantity, alimentPoids, allergieID, croyanceID, convictionID)
				  VALUES (:ingredientName, :alimentQuantity, :alimentPoids, :allergieID, :croyanceID, :convictionID);";
		$stmt = $this->conn->prepare($query);
		
		$this->ingredientName = htmlspecialchars(strip_tags($this->ingredientName));
        $this->alimentQuantity = htmlspecialchars(strip_tags($this->alimentQuantity));
        $this->alimentPoids = htmlspecialchars(strip_tags($this->alimentPoids));
        $this->allergieID = htmlspecialchars(strip_tags($this->allergieID));
        $this->croyanceID = htmlspecialchars(strip_tags($this->croyanceID));
        $this->convictionID = htmlspecialchars(strip_tags($this->convictionID));
     
        
        $stmt->bindParam(':ingredientName', $this->ingredientName);		
		$stmt->bindParam(':alimentQuantity', $this->alimentQuantity);		
		$stmt->bindParam(':alimentPoids', $this->alimentPoids);		
		$stmt->bindParam(':allergieID', $this->allergieID);		
		$stmt->bindParam(':croyanceID', $this->croyanceID);		
		$stmt->bindParam(':convictionID', $this->convictionID);
		
        if($stmt->execute())
            return true;
        return false;
	}

    public function updateIngredient(){
        $query = "UPDATE INGREDIENT 
                 SET ingredientName = :ingredientName,
                     alimentQuantity = :alimentQuantity,
                     alimentPoids = :alimentPoids,
                     allergieID = :allergieID,
                     croyanceID = :croyanceID,
                     convictionID = :convictionID;";
        $stmt = $this->conn->prepare($query);

        $this->ingredientName = htmlspecialchars(strip_tags($this->ingredientName));
        $this->alimentQuantity = htmlspecialchars(strip_tags($this->alimentQuantity));
        $this->alimentPoids = htmlspecialchars(strip_tags($this->alimentPoids));
        $this->allergieID = htmlspecialchars(strip_tags($this->allergieID));
        $this->croyanceID = htmlspecialchars(strip_tags($this->croyanceID));
        $this->convictionID = htmlspecialchars(strip_tags($this->convictionID));
     
        
        $stmt->bindParam(':ingredientName', $this->ingredientName);		
		$stmt->bindParam(':alimentQuantity', $this->alimentQuantity);		
		$stmt->bindParam(':alimentPoids', $this->alimentPoids);		
		$stmt->bindParam(':allergieID', $this->allergieID);		
		$stmt->bindParam(':croyanceID', $this->croyanceID);		
		$stmt->bindParam(':convictionID', $this->convictionID);

        if($stmt->execute())
            return true;
        return false;
    }

    public function deleteIngredient(){
        $query = "DELETE FROM INGREDIENT WHERE ingredientID = :ingredientID;";

        $stmt = $this->conn->prepare($query);

        $this->ingredientID = htmlspecialchars(strip_tags($this->ingredientID));

        $stmt->bindParam(':ingredientID', $this->ingredientID);

        if ($stmt->execute())
            return true;
        return false;
    }
}
?>