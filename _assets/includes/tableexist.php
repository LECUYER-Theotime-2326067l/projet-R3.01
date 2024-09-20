<?php
    class tableexist{
        function tableExiste($conn, $nameTable) {
            try {
                $query = "SELECT 1 FROM information_schema.tables WHERE table_schema = :db_name AND table_name = :nomTable LIMIT 1";
                $stmt = $conn->prepare($query);
                
                // Lier les paramètres
                $dbName = 'BaseDonne';
                $stmt->bindParam(':db_name', $dbName);
                $stmt->bindParam(':nomTable', $nameTable);
                
                $stmt->execute();
                
                // Vérifier si la table existe
                return $stmt->rowCount() > 0;
                
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        
        
        // Utilisation
        if (tableExiste($conn, 'User')) {
            echo "La table existe déjà.";
        } else {
            echo "La table n'existe pas.";
        }
        }
    }
?>