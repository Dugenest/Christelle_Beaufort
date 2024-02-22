<?php


require_once __DIR__ . '/../../../models/Messages.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer un message';
    $msg = [];

    // Vérifiez si l'ID du message à supprimer est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_message = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $deleteResult = Message::delete($id_message);

        if ($deleteResult) {
            $msg[$delete] = 'Suppression réussie';
        } else {
            $msg[$delete] = 'Erreur lors de la suppression';
        }
    } else {
        $msg = 'ID du message est non spécifié';
    }

    // Utilisation de sessions pour stocker temporairement les messages
    session_start();
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des messages après la suppression
    header("Location:/controllers/dashboard/messages/list-ctrl.php");
    exit();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
