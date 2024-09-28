<?php

require __DIR__ . '\constants.php';

final class autoloader //fonction pour les chargements
{
    public static function loadClassCore ($S_nameClasse) // fonction pour charger  le noyaux, le S_ est pour dire qu'elle est static
    {
        $S_file = constants::directoryCore() . "$S_nameClasse.php";   // Construit le chemin complet vers la classe du noyau à partir du nom de classe
        return static::_load($S_file); // Appelle la méthode privée _load pour inclure le fichier
    }
    
    public static function loadClassesException ($S_nameClasse) // Méthode pour charger les classes
    {
        $S_file = constants::directoryExceptions() . "$S_nameClasse.php"; // Construit le chemin complet vers la classe d'exception à partir du nom de classe
        
        return static::_load($S_file);
    }
    
    public static function loadClassesModels ($S_nameClasse)
    {
        $S_file = constants::directoryModels() . "$S_nameClasse.php"; // Construit le chemin complet vers la classe model à partir du nom de classe
        return static::_load($S_file);
    }
    
    
    public static function loadClassesViews ($S_nameClasse)
    {
        $S_file = constants::directoryViews() . "$S_nameClasse.php";// Construit le chemin complet vers la classe views à partir du nom de classe
        return static::_load($S_file);
    }
    public static function loadClassesControllers ($S_nameClasse)
    {
        $S_file = constants::directoryControllers() . "$S_nameClasse.php";     
        return static::_load($S_file);
    }
    
    private static function _load ($S_fileToLoad)  // Méthode privée qui fait réellement l'inclusion des fichiers
    {   
        // echo $S_fileToLoad;
        // echo "<br>";

        if (is_readable($S_fileToLoad)) // Vérifie si le fichier est lisible et existant avant de l'inclure
        {
            // echo "j'ai trouvé<br>";
            require $S_fileToLoad; // Inclus le fichier de la classe correspondante
        }
    }
}

// Enregistre les méthodes de chargement automatique pour les différentes catégories de classes
spl_autoload_register('autoloader::loadClassCore'); // Charge les classes du noyau
spl_autoload_register('autoloader::loadClassesException'); // Charge les classes d'exception
spl_autoload_register('autoloader::loadClassesModels'); // Charge les classes de model
spl_autoload_register('autoloader::loadClassesViews'); // Charge les classes de views
spl_autoload_register('autoloader::loadClassesControllers'); // Charge les classes de Controllers