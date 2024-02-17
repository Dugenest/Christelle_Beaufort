<?php

require_once __DIR__ . '/../../models/Performances.php';
require_once __DIR__ . '/../../models/Categories.php';

try
{
    $title = 'Tarif';

    // Utilisation de sessions pour récupérer les messages
    $msg = $_SESSION['msg'] ?? [];
    $error = $_SESSION['error'] ?? [];


    // Effacer les messages après les avoir affichés
    unset($_SESSION['msg']);
    unset($_SESSION['error']);

    $categories = Category::getAll();
    $result = Performance::getAll();


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/tarif.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';