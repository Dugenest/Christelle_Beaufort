<?php


require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer une catégorie';
    $msg = [];

    // Vérifiez si l'ID de la catégorie à supprimer est présent dans l'URL
    if (isset($_GET['id'])) {
        $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $deleteResult = Category::delete($id_category);

        if ($deleteResult) {
            $msg[$delete] = 'Suppression réussie';
        } else {
            $msg[$delete] = 'Erreur lors de la suppression';
        }
    } else {
        $msg = 'ID de la catégorie non spécifié';
    }

    // Utilisation de sessions pour stocker temporairement les messages
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des catégories après la suppression
    header("Location:/controllers/dashboard/categories/list-ctrl.php");
    exit();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
