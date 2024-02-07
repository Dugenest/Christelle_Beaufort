<?php


require_once __DIR__ . '/../../../config/auth.php';
require_once __DIR__ . '/../../../models/Comments.php';
require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';

// if(empty($_SESSION['user']) || $_SESSION['user']->role != 1) {
//     header('location: /controllers/home/connexion-ctrl.php');
//     exit;
// } 

Auth::check();

try 
{
    $title = 'Liste des commentaires';

    // Utilisation de sessions pour récupérer les messages
    $msg = $_SESSION['msg'] ?? [];
    $error = $_SESSION['error'] ?? [];


    // Effacer les messages après les avoir affichés
    unset($_SESSION['msg']);
    unset($_SESSION['error']);

    $result = Comment::getAll();
    $user = User::getAll();
    
} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/comments/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
