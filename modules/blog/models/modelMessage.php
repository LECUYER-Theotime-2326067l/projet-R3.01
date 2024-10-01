<?php
class modelMessage{

     //ajouter un message dans un post
     public function addNewPostMessage(){
        $query = "INSERT INTO " . $this->table . "(userID, txtMessage) 
                  VALUES(:userID, :txtMessage);";
        $stmt = $this->conn->prepare($query);

        //nettoyer les données
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->txtMessage = htmlspecialchars(strip_tags($this->txtMessage));

        //lier les paramètres
        $stmt->bindParam(':userID', $this->userID);
        $stmt->bindParam(':txtMessage', $this->txtMessage);

        if($stmt->execute())
            return true;
        return false;
    }
}
?>