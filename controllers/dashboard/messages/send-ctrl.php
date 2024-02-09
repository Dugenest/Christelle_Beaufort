<?php

require_once __DIR__ . '/../../../models/Messages.php';
require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';


// Initialisation des tableaux pour les messages d'erreur
$error = [];
$msg = [];

try {
    $title = 'Description d\'un message';
    $result = Message::getAll();

    $id_message = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $idMessage = Message::getId($id_message);


    Message::getRead($id_message, 1);

    // Utilisation de sessions pour stocker temporairement les messages
    $_SESSION['success'] = $msg;
    $_SESSION['error'] = $error;

    header('Location: /controllers/dashboard/messages/list-ctrl.php');
    exit;
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/messages/messageDescription.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
