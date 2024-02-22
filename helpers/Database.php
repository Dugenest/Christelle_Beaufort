<?php

require_once __DIR__ . '/../config/init.php';

//Classe pour la connexion à la base de données
class Database 
{
    public static function connect () 
    {
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        return $pdo;
    }
}