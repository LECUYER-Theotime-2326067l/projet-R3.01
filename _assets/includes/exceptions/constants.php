<?php

final class Constants
{
    // Les constantes relatives aux chemins

    const DIR_VIEWS        = '/modules/blog/views';

    const DIR_MODEL      = '/modules/blog/models';

    const DIR_ASSETS       = '/_assets';

    const DIR_EXCEPTIONS  = '/_assets/includes/exceptions';

    const DIR_CONTROL = '/modules/blog/controllers';


    public static function directoryRoot() {  // fonction pour acceder repertoire root
        return realpath(__DIR__ . '/../../../');
    }

    public static function directoryCore() {  // fonction pour acceder repertoire noyau(assets)
        return self::directoryRoot() . self::DIR_ASSETS;
    }

    public static function directoryExceptions() { // fonction pour acceder repertoire exceptions
        return self::directoryRoot() . self::DIR_EXCEPTIONS;
    }

    public static function directoryViews() { // fonction pour acceder repertoire des vues
        return self::directoryRoot() . self::DIR_VIEWS;
    }

    public static function directoryModel() { // fonction pour acceder repertoire des models
        return self::directoryRoot() . self::DIR_MODEL;
    }

    public static function directoryControl() { // fonction pour acceder repertoire des controlleurs
        return self::directoryRoot() . self::DIR_CONTROL;
    }
}