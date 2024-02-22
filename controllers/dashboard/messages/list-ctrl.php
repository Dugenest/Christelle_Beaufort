<?php


require_once __DIR__ . '/../../../helpers/auth.php';
require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../models/Messages.php';
require_once __DIR__ . '/../../../config/init.php';

//Vérification si l'utilisateur est un admin
Auth::check();

try 
{
    $title = 'Liste des messages';
    $result = Message::getAll();

    // Utilisation de sessions pour récupérer les messages
    $msg = $_SESSION['msg'] ?? [];
    $error = $_SESSION['error'] ?? [];


    // Effacer les messages après les avoir affichés
    unset($_SESSION['msg']);
    unset($_SESSION['error']);


} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/messages/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
