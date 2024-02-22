<?php


require_once __DIR__ . '/../../../models/Performances.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer un tarif';
    $msg = [];

    // Vérifiez si l'ID du tarif à supprimer est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_performance = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $deleteResult = Performance::delete($id_performance);

        if ($deleteResult) {
            $msg[$delete] = 'Suppression réussie';
        } else {
            $msg[$delete] = 'Erreur lors de la suppression';
        }
    } else {
        $msg = 'ID du tarif non spécifié';
    }

    // Utilisation de sessions pour stocker temporairement les messages
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des tarifs après la suppression
    header("Location:/controllers/dashboard/performances/list-ctrl.php");
    exit();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
