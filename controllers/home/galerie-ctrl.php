<?php

try
{
    $title = 'Galerie';

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/galerie.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
