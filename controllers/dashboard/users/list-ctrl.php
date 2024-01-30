<?php

session_start();

require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';

try 
{
    $title = 'Liste des utilisateurs';

    // Utilisation de sessions pour récupérer les messages
    $msg = $_SESSION['msg'] ?? [];
    $error = $_SESSION['error'] ?? [];


    // Effacer les messages après les avoir affichés
    unset($_SESSION['msg']);
    unset($_SESSION['error']);

    $result = User::getAll();

} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/users/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
