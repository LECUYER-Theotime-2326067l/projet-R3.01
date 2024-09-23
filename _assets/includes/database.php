<?php
     class database{
        private $host = 'mysql-lecuyer-theotime-2326067l.alwaysdata.net';
        private $dbname = 'lecuyer-theotime-2326067l_tenrac';
        private $username = '343207';
        private $password = 'tenraczebi';

        public $conn;

        //connexion à la base de données
        public function getConnection(){
            $this->conn;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
            } catch(PDOException $exception){
                echo 'Erreur de connexion : ' .$exception->getMessage();
            }

            return $this->conn;
        }
    }
?>