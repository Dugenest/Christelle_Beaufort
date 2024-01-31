<?php

session_start();

require_once __DIR__ . '/../../../models/Comments.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer un commentaire';
    $msg = [];

    // Vérifiez si l'ID de l'utilisateur à supprimer est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_comment = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $deleteResult = Comment::delete($id_comment);

        if ($deleteResult) {
            $msg[$delete] = 'Suppression réussie';
        } else {
            $msg[$delete] = 'Erreur lors de la suppression';
        }
    } else {
        $msg = 'ID du commentaire non spécifié';
    }

    // Utilisation de sessions pour stocker temporairement les messages
    session_start();
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des catégories après la suppression
    header("Location:/controllers/dashboard/comments/list-ctrl.php");
    exit();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
