<?php

require_once __DIR__ . '/../config/init.php';

class Database {
    public static function connect () 
    {
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        return $pdo;
    }
}