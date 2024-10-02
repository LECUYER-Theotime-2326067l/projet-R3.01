<?php
class modelImage{
    private $conn;
	
	public $imageID;
	public $imageName;
	public $typeMime;
	public $imageWeight;
	public $imageData;
	public $messageID;
	
	public function __construct($db){
		$this->conn = $db;
	}

    public function addNewImage(){
        $query = "INSERT INTO IMAGES (imageName, typeMime, imageWeight, imageData, messageID)
                  VALUES (:imageName, :typeMime, :imageWeight, :imageData, :messageID);";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':imageName', $this->imageName);
        $stmt->bindParam(':typeMime', $this->typeMime);
        $stmt->bindParam(':imageWeight', $this->imageWeight);
        $stmt->bindParam(':imageData', $this->imageData, PDO::PARAM_LOB);
        $stmt->bindParam(':messageID', $this->messageID);
    
        if($stmt->execute())
            return true;
        return false;
    }
    
        
        public function deteleImage(){
            $query = "DELETE FROM IMAGES WHERE imageID = :imageID;";
                    $stmt = $this->conn->prepare($query);
            
            if($stmt->execute())
                return true;
            return false;
        }
    
        public function affImage(){
            $query = "SELECT USER.userName, MESSAGES.txtMessage, IMAGES.imageData FROM IMAGES 
                        JOIN MESSAGES ON IMAGES.messageID = MESSAGES.messageID 
                            JOIN USER ON MESSAGES.userID = USER.userID;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if($row)
                return $row;
            return null;
        }
}
?>