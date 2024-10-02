<?php
include constants::directoryCore().'/database.php';
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
            $query = "SELECT imageData FROM IMAGES where imageName = imageName;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if($row)
                return $row;
            return null;
        }
}

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        // 1. Vérifier la taille du fichier (par exemple, max 5 Mo)
        $maxFileSize = 5 * 1024 * 1024;
        if ($_FILES['image']['size'] > $maxFileSize) {
            die("Erreur : La taille de l'image dépasse la limite de 5 Mo.");
        }

        // 2. Vérifier le type MIME du fichier pour accepter uniquement des images
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $imageType = mime_content_type($_FILES['image']['tmp_name']);
        if (!in_array($imageType, $allowedMimeTypes)) {
            die("Erreur : Seuls les fichiers JPG, PNG, et GIF sont autorisés.");
        }

        // 3. Vérifier si le fichier est bien une image avec getimagesize()
        $imageInfo = getimagesize($_FILES['image']['tmp_name']);
        if ($imageInfo === false) {
            die("Erreur : Le fichier n'est pas une image valide.");
        }

        // 4. Vérification de l'extension du fichier
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (!in_array($imageExtension, $allowedExtensions)) {
            die("Erreur : Extension de fichier non autorisée.");
        }

        // 5. Renommer l'image pour éviter les conflits et caractères dangereux
        $newFileName = uniqid('image_', true) . '.' . $imageExtension;

        // 6. Préparer les données pour l'insertion
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageData = file_get_contents($imageTmpName); // Lire les données binaires

        $conn = new database();
        $db = $conn->getConnection();

        // Créer une instance de la classe
        $img = new modelImage($db);

        // Affecter les valeurs aux propriétés
        $img->imageName = $newFileName;  // Utilise le nom généré pour plus de sécurité
        $img->typeMime = $imageType;
        $img->imageWeight = $imageSize;
        $img->imageData = $imageData;
        $img->messageID = null;

        // 7. Appeler la méthode pour ajouter l'image à la base de données
        if ($img->addNewImage()) {
            echo "L'image a été uploadée et enregistrée avec succès.";
        } else {
            echo "Erreur lors de l'upload de l'image.";
        }
    } else {
        echo "Erreur : Aucun fichier ou problème lors de l'upload.";
    }
?>