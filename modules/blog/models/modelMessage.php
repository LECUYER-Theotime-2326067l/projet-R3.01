<?php
class modelMessage{
    private $conn;

    public $table = 'MESSAGES';
    public $messageID;
    public $userID;
    public $txtMessage;
    public $createdAt;

    public function __construct($db){
        $this->conn = $db;
    }

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

    public function readMessage($id){
        $query = "SELECT USER.userName, MESSAGES.txtMessage FROM MESSAGES 
                  JOIN USER ON MESSAGES.userID = :userID;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userID', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row)
            return $row;
        return null;
    }

    public function readMessageAll(){
        $query = "SELECT USER.userName, MESSAGES.txtMessage FROM MESSAGES 
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