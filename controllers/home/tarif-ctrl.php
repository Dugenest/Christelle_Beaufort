<?php

try
{
    $title = 'Tarif';

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/tarif.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';