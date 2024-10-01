<?php
include_once constants::directoryModels().'/modelMessage.php';

class controllerMessage{
    private $conn;

    public $table = 'MESSAGES';
    public $messageID;
    public $userID;
    public $txtMessage;
    public $createdAt;

    public function __construct($db){
        $this->conn = $db;
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