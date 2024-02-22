<?php

require_once __DIR__ . '/../../models/Pictures.php';
require_once __DIR__ . '/../../models/Categories.php';
require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Portfolio';

// appel de la methode getAll pour afficher toutes les categories
    $categories = Category::getAll();


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/portfolio.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
