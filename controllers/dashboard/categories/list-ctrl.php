<?php

session_start();

require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Liste des catégories';

    // Afficher les messages s'ils existent
    // if (isset($_SESSION['msg'])) {
    //     $msg = $_SESSION['msg'];
    //     $error = $_SESSION['error'];
    
    //     if (isset($msg['success'])) {
    //         echo '<div class="success">' . $msg['success'] . '</div>';
    //     }
    
    //     if (isset($msg['error']) || (isset($error['name']))) {
    //         echo '<div class="error">' . $msg['error'] . '</div>';
    //         echo '<div class="error">' . $error['name'] . '</div>';
    //     }
    
    //     // Effacer les messages après les avoir affichés
    //     unset($_SESSION['msg']);
    //     unset($_SESSION['error']);
    // }

    //autre méthode pour afficher les messages
    $msg = filter_var(($_SESSION['msg'] ?? '') ,FILTER_SANITIZE_SPECIAL_CHARS);
    $error = filter_var(($_SESSION['error'] ?? '') ,FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($_SESSION['msg']) || isset($_SESSION['error'])) {
    unset($_SESSION['msg']);
    unset($_SESSION['error']);
    }


    $result = Category::getAll();
        
} catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
        }


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
