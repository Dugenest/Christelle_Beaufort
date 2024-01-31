<?php

try
{
    $title = 'Christelle Beaufort';
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/home.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';