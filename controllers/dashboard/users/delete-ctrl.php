<?php

session_start();

require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer un utilisateur';
    $msg = [];

    // Vérifiez si l'ID de l'utilisateur à supprimer est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $deleteResult = User::delete($id_user);

        if ($deleteResult) {
            $msg[$delete] = 'Suppression réussie';
        } else {
            $msg[$delete] = 'Erreur lors de la suppression';
        }
    } else {
        $msg = 'ID de l\'utilisateur non spécifié';
    }

    // Utilisation de sessions pour stocker temporairement les messages
    session_start();
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des catégories après la suppression
    header("Location:/controllers/dashboard/users/list-ctrl.php");
    exit();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
