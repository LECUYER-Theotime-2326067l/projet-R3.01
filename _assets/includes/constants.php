<?php
final class Constants
{
    // Chemins relatifs
    const DIR_VIEWS        = '/modules/blog/views/';
    const DIR_MODELS       = '/modules/blog/models/';
    const DIR_CONTROLLERS  = '/modules/blog/controllers/';
    const DIR_INCLUDES     = '/_assets/includes/';
    const DIR_EXCEPTIONS   = '/_assets/includes/exceptions/';

    // Méthodes pour obtenir les chemins complets
    public static function directoryRoot() {
        return realpath(__DIR__ . '/../../'); // Chemin vers le répertoire racine
    }

    public static function directoryCore(){
        return self::directoryRoot() . self::DIR_INCLUDES;
    }

    public static function directoryViews() {
        return self::directoryRoot() . self::DIR_VIEWS;
    }

    public static function directoryModels() {
        return self::directoryRoot() . self::DIR_MODELS;
    }

    public static function directoryControllers() {
        return self::directoryRoot() . self::DIR_CONTROLLERS;
    }

    public static function directoryExceptions(){

        return self::directoryRoot() . self::DIR_EXCEPTIONS;
    }
}