<?php
include_once 'database.php';
class tenracBase{
    private $conn;
    
    public $tableName;

    public function __construct($db){
        $this->conn = $db;
    }

	// 		fonction ORDRE 		//
	public $ordreID = 1;
    //création de la table ORDRE
    public function createTableOrdre(){
        $query = "CREATE TABLE IF NOT EXISTS ORDRE(ordreID INT PRIMARY KEY,
                                                   clubID INT,
                                                   userID INT,
                                                   lieuID INT,
                                                   repasID INT);
                                                   ALTER TABLE ORDRE ADD FOREIGN KEY (clubID) REFERENCES CLUB(clubID);
                                                   ALTER TABLE ORDRE ADD FOREIGN KEY (userID) REFERENCES USER(userID);
                                                   ALTER TABLE ORDRE ADD FOREIGN KEY (lieuID) REFERENCES LIEU(lieuID);
                                                   ALTER TABLE ORDRE ADD FOREIGN KEY (repasID) REFERENCES REPAS(repasID);";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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

	//		fonction CLUB		//
	public $clubName;
	public $lieuID;
    //création de la table CLUB
    public function createTableClub(){
        $query = "CREATE TABLE IF NOT EXISTS CLUB(clubID INT AUTO_INCREMENT PRIMARY KEY,
                                                  clubName VARCHAR(20),
                                                  userID INT,
                                                  lieuID INT,
                                                  FOREIGN KEY (userID) REFERENCES USER(userID),
                                                  FOREIGN KEY (lieuID) REFERENCES USER(userID))";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute())
            return true;
        return false;
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

    public function deleteClub(){
        $query = "DELETE FROM CLUB WHERE clubID = :clubID;";

        $stmt = $this->conn->prepare($query);

        $this->clubID = htmlspecialchars(strip_tags($this->clubID));

        $stmt->bindParam(':clubID', $this->clubID);

        if ($stmt->execute())
            return true;
        return false;
    }
	
	// 		fonction LIEU		//
	public $lieuAdress;
	public $repasID;
    //création de la table LIEU
    public function createTableLieu(){
        $query = "CREATE TABLE IF NOT EXISTS LIEU(lieuID INT AUTO_INCREMENT PRIMARY KEY,
                                                  lieuAdress VARCHAR(80),
                                                  repasID INT,
                                                  FOREIGN KEY (repasID) REFERENCES REPAS(repasID));";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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

	//		fonction REPAS		//
	public $repasName;
	public $platID;
	public $userID;
    //création de la table REPAS
    public function createTableRepas(){
        $query = "CREATE TABLE IF NOT EXISTS REPAS(repasID INT AUTO_INCREMENT PRIMARY KEY,
                                                   repasName VARCHAR(20),
                                                   platID INT,
                                                   userID INT,
                                                   FOREIGN KEY (platID) REFERENCES PLAT(platID),
                                                   FOREIGN KEY (userID) REFERENCES USER(userID));";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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
	
	//		fonction PLAT 		//
	public $platName;
	public $ingredientID;
    //création de la table PLAT
    public function createTablePlat(){
        $query = "CREATE TABLE IF NOT EXISTS PLAT(platID INT PRIMARY KEY,
                                                  platName VARCHAR(20),
                                                  ingredientID INT
                                                  );
                                                  ALTER TABLE PLAT ADD FOREIGN KEY (alimentID) REFERENCES ALIMENT(alimentID);";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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

	//		fonction INGREDIENT		//
	public $ingredientName;
	public $alimentQuantity;
	public $alimentPoids;
	public $allergieID;
	public $convictionID;
	public $croyanceID;
    //création de la table INGREDIENT
    public function createTableIngredient(){
    $query = "CREATE TABLE IF NOT EXISTS INGREDIENT (
                ingredientID INT AUTO_INCREMENT PRIMARY KEY,
                ingredientName VARCHAR(30),
                alimentQuantity INT,
                alimentPoids INT,
                allergieID INT,
                croyanceID INT,
                convictionID INT
              );
				ALTER TABLE INGREDIENT ADD FOREIGN KEY (allergieID) REFERENCES ALLERGIE(allergieID);
                ALTER TABLE INGREDIENT ADD FOREIGN KEY (croyanceID) REFERENCES CROYANCE(croyanceID);
                ALTER TABLE INGREDIENT ADD FOREIGN KEY (convictionID) REFERENCES CONVICTION(convictionID);";

    $stmt = $this->conn->prepare($query);

    if($stmt->execute())
        return true;
    return false;
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

	//		fonction ALLERGIE		//
	public $allergieCategory;
    //création de la table ALLERGIE
    public function createTableAllergie(){
        $query = "CREATE TABLE IF NOT EXISTS ALLERGIE(allergieID INT AUTO_INCREMENT PRIMARY KEY,
                                                      allergieCategory VARCHAR(25));";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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

	//		fonction CROYANCE		//
	public $croyanceCategory;
    //création de la table CROYANCE
    public function createTableCroyance(){
        $query = "CREATE TABLE IF NOT EXISTS CROYANCE(croyanceID INT AUTO_INCREMENT PRIMARY KEY,
                                                      croyanceCategory VARCHAR(25));";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return true;
        return false;
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

	//		fonction CONVICTION		//
	public $convictionCategory;
    //création de la table CONVICTION
    public function createtableConviction(){
        $query = "CREATE TABLE IF NOT EXISTS CONVICTION(convictionID INT AUTO_INCREMENT PRIMARY KEY,
                                                        convictionCategory VARCHAR(25))";
        
        $stmt = $this->conn->prepare($query);
        
        if ($stmt->execute())
            return true;
        return false;
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
    
    // suprimer une table
    public function delTable(){
		$query = "DROP TABLE " . $this->tableName;
		
		$stmt = $this->conn->prepare($query);
		
		if ($stmt->execute())
			return true;
		return false;
	}
}
?>