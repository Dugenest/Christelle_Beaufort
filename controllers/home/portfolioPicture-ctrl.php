<?php

require_once __DIR__ . '/../../models/Pictures.php';
require_once __DIR__ . '/../../models/Categories.php';
require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Photos';

    //Récupération de l'id_category dans l'url
    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $pictures = Picture::getIdCat($id_category);


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/portfolioPicture.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
