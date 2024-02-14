<?php

require_once __DIR__ . '/../../models/Pictures.php';
require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Portfolio';
    $pictures = Picture::getAll();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/portfolio.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
