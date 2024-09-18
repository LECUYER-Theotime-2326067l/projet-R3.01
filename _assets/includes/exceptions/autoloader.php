<?php

require '_assets/imcludes/exceptions/constants.php';

final class autoloader //fonction pour les chargements
{
    public static function loadClassCore ($S_nameClasse) // fonction pour charger  le noyaux, le S_ est pour dire qu'elle est static
    {
        $S_file = constants::directoryCore() . "$S_nameClasse.php";
        return static::_load($S_file);
    }

    public static function loadClassesException ($S_nameClasse)
    {
        $S_file = constants::directoryExceptions() . "$S_nameClasse.php";

        return static::_load($S_file);
    }

    public static function loadClassesModels ($S_nameClasse)
    {
        $S_file = constants::directoryModel() . "$S_nameClasse.php";

        return static::_load($S_file);
    }


    public static function loadClassesViews ($S_nameClasse)
    {
        $S_file = constants::directoryViews() . "$S_nameClasse.php";

        return static::_load($S_file);
    }

    public static function loadClassesControllers ($S_nameClasse)
    {
        $S_file = constants::directoryControl() . "$S_nameClasse.php";

        return static::_load($S_file);
    }

    private static function _load ($S_fileToLoad)
    {
        if (is_readable($S_fileToLoad))
        {
            require $S_fileToLoad;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('autoloader::loadClassCore');
spl_autoload_register('autoloader::loadClassesException');
spl_autoload_register('autoloader::loadClassesModels');
spl_autoload_register('autoloader::loadClassesViews');
spl_autoload_register('autoloader::loadClassesControllers');