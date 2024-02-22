<?php

require_once __DIR__ . '/../../../models/Messages.php';
require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Description d\'un message';

    // Récupération de l'id message dans l'url
    $id_message = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $idMessage = Message::getId($id_message);


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/messages/messageDescription.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
